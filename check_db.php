<?php
// Output as plain text for easier reading
header('Content-Type: text/plain');

echo "Database Structure Check\n";
echo "=======================\n\n";

// Connect to the database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "mlmw";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (mysqli_connect_errno()) {
    echo "Database connection failed: " . mysqli_connect_error();
    exit();
}

echo "Connected to database successfully.\n\n";

// Get table structure for news table
echo "Structure of 'news' table:\n";
echo "--------------------------\n";
$result = mysqli_query($con, "DESCRIBE news");

if (!$result) {
    echo "Error getting table structure: " . mysqli_error($con);
    exit();
}

while ($row = mysqli_fetch_assoc($result)) {
    echo $row['Field'] . " - " . $row['Type'] . " - " . ($row['Null'] === "YES" ? "NULL" : "NOT NULL") . 
         ($row['Key'] === "PRI" ? " - PRIMARY KEY" : "") . "\n";
}

echo "\n";

// Test the problematic query
echo "Testing query: SELECT * FROM news ORDER BY news_date DESC LIMIT 3\n";
echo "-----------------------------------------------------\n";
$query = "SELECT * FROM news ORDER BY news_date DESC LIMIT 3";
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Query Error: " . mysqli_error($con) . "\n";
} else {
    echo "Query executed successfully.\n";
    echo "Number of rows: " . mysqli_num_rows($result) . "\n\n";
    
    // Show sample data
    if (mysqli_num_rows($result) > 0) {
        echo "Sample data (first row):\n";
        $row = mysqli_fetch_assoc($result);
        foreach ($row as $key => $value) {
            echo "- " . $key . ": " . $value . "\n";
        }
    }
}

echo "\n";

// Try explicitly testing if there's a date column
echo "Testing if 'date' column exists...\n";
$query = "SELECT date FROM news LIMIT 1";
$result = mysqli_query($con, $query);

if (!$result) {
    echo "Result: 'date' column does not exist (" . mysqli_error($con) . ")\n";
} else {
    echo "Result: 'date' column exists\n";
}

// Close connection
mysqli_close($con);

echo "\nCheck completed.";
?> 