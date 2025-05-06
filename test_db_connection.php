<?php
// Testing direct database connection and query
echo "<h1>Database Connection Test</h1>";

// Direct database connection
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "mlmw";

echo "<p>Connecting to database: $db_name on $db_host...</p>";

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
}

echo "<p>Connected successfully!</p>";

// Try to query the news table
echo "<h2>Testing news table query:</h2>";

$test_query = "SELECT * FROM news ORDER BY news_date DESC LIMIT 1";
echo "<p>Query: $test_query</p>";

try {
    $result = mysqli_query($conn, $test_query);
    
    if (!$result) {
        echo "<p>Query failed: " . mysqli_error($conn) . "</p>";
    } else {
        $rows = mysqli_num_rows($result);
        echo "<p>Query successful! Found $rows rows.</p>";
        
        if ($rows > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<h3>Sample News Data:</h3>";
            echo "<ul>";
            foreach ($row as $key => $value) {
                echo "<li><strong>$key:</strong> $value</li>";
            }
            echo "</ul>";
        }
    }
} catch (Exception $e) {
    echo "<p>Exception: " . $e->getMessage() . "</p>";
}

echo "<h2>All Tables in Database:</h2>";
$tables_query = "SHOW TABLES";
$tables_result = mysqli_query($conn, $tables_query);

if ($tables_result) {
    echo "<ul>";
    while ($table = mysqli_fetch_array($tables_result)) {
        echo "<li>" . $table[0] . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Could not retrieve tables: " . mysqli_error($conn) . "</p>";
}

// Close connection
mysqli_close($conn);

echo "<p><a href='index.php'>Return to homepage</a></p>";
?> 