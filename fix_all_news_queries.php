<?php
// Output as plain text for easier reading
header('Content-Type: text/plain');

echo "News Query Checker\n";
echo "=================\n\n";

// Function to recursively find PHP files
function findPhpFiles($dir) {
    $result = [];
    $files = scandir($dir);
    
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') continue;
        
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        
        if (is_dir($path)) {
            $result = array_merge($result, findPhpFiles($path));
        } elseif (pathinfo($path, PATHINFO_EXTENSION) === 'php') {
            $result[] = $path;
        }
    }
    
    return $result;
}

// Function to check file for problematic patterns
function checkFileForProblematicPatterns($file) {
    $content = file_get_contents($file);
    $issues = [];
    
    // Pattern 1: Query using 'date' column in news table
    if (preg_match_all('/SELECT.*FROM\s+news.*ORDER BY\s+date\b/i', $content, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = substr_count(substr($content, 0, $match[1]), "\n") + 1;
            $issues[] = [
                'type' => 'ORDER BY date',
                'line' => $lineNumber,
                'match' => $match[0]
            ];
        }
    }
    
    // Pattern 2: Any reference to 'date' column in news table
    if (preg_match_all('/\bdate\b.*FROM\s+news\b/i', $content, $matches, PREG_OFFSET_CAPTURE)) {
        foreach ($matches[0] as $match) {
            $lineNumber = substr_count(substr($content, 0, $match[1]), "\n") + 1;
            $issues[] = [
                'type' => 'date reference',
                'line' => $lineNumber,
                'match' => $match[0]
            ];
        }
    }
    
    return $issues;
}

// Start from the current directory
$phpFiles = findPhpFiles('.');
$totalIssues = 0;
$problematicFiles = [];

echo "Checking " . count($phpFiles) . " PHP files for problematic news queries...\n\n";

foreach ($phpFiles as $file) {
    $issues = checkFileForProblematicPatterns($file);
    
    if (!empty($issues)) {
        $totalIssues += count($issues);
        $problematicFiles[] = [
            'file' => $file,
            'issues' => $issues
        ];
        
        echo "File: $file\n";
        echo str_repeat('-', strlen($file) + 6) . "\n";
        
        foreach ($issues as $issue) {
            echo "  Line {$issue['line']}: {$issue['type']} - {$issue['match']}\n";
        }
        
        echo "\n";
    }
}

echo "Summary:\n";
echo "-------\n";
echo "Total files checked: " . count($phpFiles) . "\n";
echo "Files with issues: " . count($problematicFiles) . "\n";
echo "Total issues found: $totalIssues\n\n";

if ($totalIssues === 0) {
    echo "No problematic news queries found. All queries seem to be using 'news_date' correctly.\n";
} else {
    echo "Found $totalIssues problematic queries. Please check the listed files and update them to use 'news_date' instead of 'date'.\n";
    
    echo "\nWould you like to automatically fix these issues? (This will create backup files)\n";
    echo "Run the script with ?autofix=true parameter to apply fixes automatically.\n";
    
    // Auto-fix functionality
    if (isset($_GET['autofix']) && $_GET['autofix'] === 'true') {
        echo "\nApplying fixes automatically...\n";
        
        foreach ($problematicFiles as $problemFile) {
            $filePath = $problemFile['file'];
            $content = file_get_contents($filePath);
            
            // Create backup
            $backupPath = $filePath . '.bak-' . date('YmdHis');
            file_put_contents($backupPath, $content);
            
            // Replace occurrences
            $newContent = preg_replace('/\bORDER BY\s+date\b/i', 'ORDER BY news_date', $content);
            $newContent = preg_replace('/\bWHERE\s+date\b/i', 'WHERE news_date', $newContent);
            $newContent = preg_replace('/\bdate\s*=\s*/i', 'news_date = ', $newContent);
            $newContent = preg_replace('/\bdate\s+FROM\s+news\b/i', 'news_date FROM news', $newContent);
            
            // Save changes
            file_put_contents($filePath, $newContent);
            echo "  Fixed: $filePath (backup created at $backupPath)\n";
        }
        
        echo "\nFixes applied. Please test your application to ensure everything works correctly.\n";
    }
}

echo "\nCheck completed.";
?> 