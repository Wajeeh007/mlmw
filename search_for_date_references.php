<?php
// Output as plain text for easier reading
header('Content-Type: text/plain');

echo "Searching for SQL references to 'date' column...\n\n";

// Get all PHP files in the directory and subdirectories
function findPhpFiles($dir) {
    $result = array();
    $files = scandir($dir);
    
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        
        $path = $dir . '/' . $file;
        
        if (is_dir($path)) {
            $result = array_merge($result, findPhpFiles($path));
        } elseif (pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            $result[] = $path;
        }
    }
    
    return $result;
}

// Search for references to 'date' in SQL queries
function searchForDateReferences($file) {
    $content = file_get_contents($file);
    
    // Search for SQL queries that might reference 'date'
    $pattern = '/SELECT.*ORDER BY\s+date\b/i';
    
    if (preg_match_all($pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
        $results = array();
        
        foreach ($matches[0] as $match) {
            // Get the line number
            $lineNumber = substr_count(substr($content, 0, $match[1]), "\n") + 1;
            
            // Get the context (a few lines around the match)
            $contextStart = max(0, $match[1] - 200);
            $contextLength = min(strlen($content) - $contextStart, 400);
            $context = substr($content, $contextStart, $contextLength);
            
            $results[] = array(
                'line' => $lineNumber,
                'match' => $match[0],
                'context' => $context
            );
        }
        
        return $results;
    }
    
    return null;
}

// Start from the current directory
$phpFiles = findPhpFiles('.');
$foundReferences = false;

foreach ($phpFiles as $file) {
    $references = searchForDateReferences($file);
    
    if ($references !== null) {
        $foundReferences = true;
        echo "File: $file\n";
        
        foreach ($references as $reference) {
            echo "  Line {$reference['line']}: {$reference['match']}\n";
            echo "  Context:\n";
            echo "  " . str_replace("\n", "\n  ", $reference['context']) . "\n";
            echo "\n";
        }
        
        echo "---------------------------------------------------\n\n";
    }
}

if (!$foundReferences) {
    echo "No references to 'ORDER BY date' found in PHP files.\n";
    
    // If no direct references, search for any mention of 'date' in SQL
    echo "\nSearching for any SQL with 'date' column...\n\n";
    $foundAnyDateReferences = false;
    
    foreach ($phpFiles as $file) {
        $content = file_get_contents($file);
        
        // Search for SQL queries with date
        $pattern = '/\bdate\b.*FROM/i';
        
        if (preg_match_all($pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
            $foundAnyDateReferences = true;
            echo "File: $file\n";
            
            foreach ($matches[0] as $match) {
                $lineNumber = substr_count(substr($content, 0, $match[1]), "\n") + 1;
                
                $contextStart = max(0, $match[1] - 200);
                $contextLength = min(strlen($content) - $contextStart, 400);
                $context = substr($content, $contextStart, $contextLength);
                
                echo "  Line $lineNumber: {$match[0]}\n";
                echo "  Context:\n";
                echo "  " . str_replace("\n", "\n  ", $context) . "\n";
                echo "\n";
            }
            
            echo "---------------------------------------------------\n\n";
        }
    }
    
    if (!$foundAnyDateReferences) {
        echo "No references to 'date' column found in SQL queries.\n";
    }
}

echo "Search completed.";
?> 