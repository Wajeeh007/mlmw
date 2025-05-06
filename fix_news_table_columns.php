<?php
// Connect to the database
require_once("includes/config.php");

// Function to check if a table exists
function table_exists($table_name, $connection) {
    $result = mysqli_query($connection, "SHOW TABLES LIKE '$table_name'");
    return mysqli_num_rows($result) > 0;
}

// Check if the news table exists, if it does, drop it and recreate it
if (table_exists('news', $con)) {
    echo "<p>Dropping existing news table...</p>";
    
    if (mysqli_query($con, "DROP TABLE news")) {
        echo "<p>News table dropped successfully.</p>";
    } else {
        echo "<p>Error dropping news table: " . mysqli_error($con) . "</p>";
        exit;
    }
}

// Create the news table with the correct structure matching what latest-news.php expects
echo "<p>Creating news table with correct structure...</p>";

$news_table = "CREATE TABLE news (
    news_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    news_heading VARCHAR(255) NOT NULL,
    news_detail TEXT NOT NULL,
    news_date DATE NOT NULL,
    news_author VARCHAR(100) NOT NULL,
    news_image VARCHAR(255)
)";

if (mysqli_query($con, $news_table)) {
    echo "<p>News table created successfully.</p>";
    
    // Insert sample data
    $current_date = date('Y-m-d');
    $one_week_ago = date('Y-m-d', strtotime('-7 days'));
    $two_weeks_ago = date('Y-m-d', strtotime('-14 days'));
    
    $sample_news = "INSERT INTO news (news_heading, news_detail, news_date, news_author, news_image) VALUES
    ('New Legal Precedent Set in International Disputes', 'A landmark case has established new precedents for how international business disputes will be handled. This case involved multiple jurisdictions and complex legal issues that required innovative approaches to resolve.', '$current_date', 'John Smith', 'img/news1.jpg'),
    ('Understanding Recent Changes to Privacy Law', 'Recent legislative changes have significantly impacted how businesses must handle customer data. Our legal team breaks down what these changes mean for businesses of all sizes and how to ensure compliance.', '$one_week_ago', 'Sarah Johnson', 'img/news2.jpg'),
    ('Corporate Compliance: What You Need to Know', 'Staying compliant with evolving regulations is challenging for many businesses. This article outlines key areas of focus for corporate legal departments and strategies for maintaining compliance.', '$two_weeks_ago', 'Michael Chen', 'img/news3.jpg')";
    
    if (mysqli_query($con, $sample_news)) {
        echo "<p>Sample news data inserted successfully.</p>";
    } else {
        echo "<p>Error inserting sample news data: " . mysqli_error($con) . "</p>";
    }
} else {
    echo "<p>Error creating news table: " . mysqli_error($con) . "</p>";
}

echo "<p>Database fix complete. <a href='index.php'>Return to home page</a></p>";
?> 