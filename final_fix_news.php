<?php
// Connect to the database
require_once("includes/config.php");

// Output as plain text for easier debugging
header('Content-Type: text/plain');

echo "Starting news table fix script...\n\n";

// Function to check if a table exists
function table_exists($table_name, $connection) {
    $result = mysqli_query($connection, "SHOW TABLES LIKE '$table_name'");
    return mysqli_num_rows($result) > 0;
}

// Check if the news table exists
if (table_exists('news', $con)) {
    echo "News table exists. Dropping it to recreate with correct structure...\n";
    
    // Drop the table
    if (mysqli_query($con, "DROP TABLE news")) {
        echo "News table dropped successfully.\n";
    } else {
        echo "Error dropping news table: " . mysqli_error($con) . "\n";
        exit;
    }
} else {
    echo "News table does not exist. Creating it now...\n";
}

// Create the news table with the correct structure
$create_table_sql = "CREATE TABLE news (
    news_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    news_heading VARCHAR(255) NOT NULL,
    news_detail TEXT NOT NULL,
    news_date DATE NOT NULL,
    news_author VARCHAR(100) NOT NULL,
    news_image VARCHAR(255)
)";

if (mysqli_query($con, $create_table_sql)) {
    echo "News table created successfully with proper column names!\n";
    
    // Insert sample data
    $current_date = date('Y-m-d');
    $one_week_ago = date('Y-m-d', strtotime('-7 days'));
    $two_weeks_ago = date('Y-m-d', strtotime('-14 days'));
    
    $sample_data_sql = "INSERT INTO news (news_heading, news_detail, news_date, news_author, news_image) VALUES
    ('New Legal Precedent Set in International Disputes', 'A landmark case has established new precedents for how international business disputes will be handled. This case involved multiple jurisdictions and complex legal issues that required innovative approaches to resolve.', '$current_date', 'John Smith', 'img/news1.jpg'),
    ('Understanding Recent Changes to Privacy Law', 'Recent legislative changes have significantly impacted how businesses must handle customer data. Our legal team breaks down what these changes mean for businesses of all sizes and how to ensure compliance.', '$one_week_ago', 'Sarah Johnson', 'img/news2.jpg'),
    ('Corporate Compliance: What You Need to Know', 'Staying compliant with evolving regulations is challenging for many businesses. This article outlines key areas of focus for corporate legal departments and strategies for maintaining compliance.', '$two_weeks_ago', 'Michael Chen', 'img/news3.jpg')";
    
    if (mysqli_query($con, $sample_data_sql)) {
        echo "Sample news data inserted successfully!\n";
    } else {
        echo "Error inserting sample data: " . mysqli_error($con) . "\n";
    }
} else {
    echo "Error creating news table: " . mysqli_error($con) . "\n";
}

// Verify the table structure
echo "\nVerifying news table structure:\n";
$verify_query = "DESCRIBE news";
$verify_result = mysqli_query($con, $verify_query);

if ($verify_result) {
    while ($field = mysqli_fetch_assoc($verify_result)) {
        echo "- Field: " . $field['Field'] . ", Type: " . $field['Type'] . "\n";
    }
    
    // Verify the data
    echo "\nVerifying news data:\n";
    $data_query = "SELECT * FROM news ORDER BY news_date DESC";
    $data_result = mysqli_query($con, $data_query);
    
    if ($data_result && mysqli_num_rows($data_result) > 0) {
        echo "Found " . mysqli_num_rows($data_result) . " news records:\n";
        
        while ($row = mysqli_fetch_assoc($data_result)) {
            echo "- " . $row['news_heading'] . " (" . $row['news_date'] . ")\n";
        }
    } else {
        echo "No news data found after insertion!\n";
    }
} else {
    echo "Error verifying table structure: " . mysqli_error($con) . "\n";
}

echo "\nFix script completed.";
?> 