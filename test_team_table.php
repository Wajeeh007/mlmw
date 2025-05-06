<?php
// Connect to the database
require_once("includes/config.php");

// Get table information
$query = "DESCRIBE team";
$result = mysqli_query($con, $query);

if ($result) {
    echo "<h2>Team Table Structure:</h2>";
    echo "<pre>";
    while ($row = mysqli_fetch_assoc($result)) {
        print_r($row);
    }
    echo "</pre>";
    
    // Check if there's any data in the table
    $data_query = "SELECT * FROM team LIMIT 1";
    $data_result = mysqli_query($con, $data_query);
    
    if (mysqli_num_rows($data_result) > 0) {
        echo "<h2>Sample Team Data:</h2>";
        echo "<pre>";
        print_r(mysqli_fetch_assoc($data_result));
        echo "</pre>";
    } else {
        echo "<h2>No data in team table.</h2>";
    }
} else {
    echo "<h2>Error:</h2> " . mysqli_error($con);
}
?> 