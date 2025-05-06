<?php
// Connect to the database
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "mlmw";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}

echo "Checking news table structure...<br>";
$result = mysqli_query($con, "DESCRIBE news");

if (!$result) {
    die("Error getting table structure: " . mysqli_error($con));
}

$has_date_column = false;
$has_news_date_column = false;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['Field'] === 'date') {
        $has_date_column = true;
    }
    if ($row['Field'] === 'news_date') {
        $has_news_date_column = true;
    }
}

echo "News table has 'date' column: " . ($has_date_column ? 'Yes' : 'No') . "<br>";
echo "News table has 'news_date' column: " . ($has_news_date_column ? 'Yes' : 'No') . "<br><br>";

// Create a view that adds a 'date' alias for 'news_date'
if (!$has_date_column && $has_news_date_column) {
    echo "Creating a news_view with 'date' as an alias for 'news_date'...<br>";
    
    // Drop the view if it exists
    mysqli_query($con, "DROP VIEW IF EXISTS news_view");
    
    // Create the view
    $create_view_sql = "CREATE VIEW news_view AS 
                        SELECT 
                            news_id, 
                            news_heading, 
                            news_detail, 
                            news_date AS date, 
                            news_date,
                            news_author, 
                            news_image 
                        FROM news";
    
    if (mysqli_query($con, $create_view_sql)) {
        echo "Success! Created a view 'news_view' that has 'date' as an alias for 'news_date'.<br>";
        echo "You can now update your code to use 'news_view' instead of 'news' to fix any queries using 'date'.<br>";
    } else {
        echo "Error creating view: " . mysqli_error($con) . "<br>";
    }
}

// Alternatively, modify the news.php file to use try-catch
echo "<br>Also added try-catch error handling to includes/php/news.php to prevent crashes.<br>";

// Close connection
mysqli_close($con);
?> 