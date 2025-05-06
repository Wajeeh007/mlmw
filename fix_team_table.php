<?php
// Connect to the database
require_once("includes/config.php");

// Function to check if a table exists
function table_exists($table_name, $connection) {
    $result = mysqli_query($connection, "SHOW TABLES LIKE '$table_name'");
    return mysqli_num_rows($result) > 0;
}

// Check if the team table exists, if it does, drop it and recreate it
if (table_exists('team', $con)) {
    echo "<p>Dropping existing team table...</p>";
    
    if (mysqli_query($con, "DROP TABLE team")) {
        echo "<p>Team table dropped successfully.</p>";
    } else {
        echo "<p>Error dropping team table: " . mysqli_error($con) . "</p>";
        exit;
    }
}

// Create the team table with the correct structure
echo "<p>Creating team table with correct structure...</p>";

$team_table = "CREATE TABLE team (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    bio TEXT,
    image VARCHAR(255),
    email VARCHAR(100),
    phone VARCHAR(50),
    linkedin VARCHAR(255),
    twitter VARCHAR(255)
)";

if (mysqli_query($con, $team_table)) {
    echo "<p>Team table created successfully.</p>";
    
    // Insert sample data
    $sample_team = "INSERT INTO team (name, position, bio, image, email, phone, linkedin, twitter) VALUES
    ('John Smith', 'Senior Partner', 'John specializes in corporate law with over 15 years of experience in mergers and acquisitions.', 'img/team1.jpg', 'john@mylawyermyway.com', '+1-555-123-4567', 'https://linkedin.com/', 'https://twitter.com/'),
    ('Sarah Johnson', 'Managing Partner', 'Sarah is an expert in family law and has successfully handled hundreds of complex cases.', 'img/team2.jpg', 'sarah@mylawyermyway.com', '+1-555-234-5678', 'https://linkedin.com/', 'https://twitter.com/'),
    ('Michael Chen', 'Associate', 'Michael specializes in intellectual property law with particular expertise in patent litigation.', 'img/team3.jpg', 'michael@mylawyermyway.com', '+1-555-345-6789', 'https://linkedin.com/', 'https://twitter.com/'),
    ('Emily Rodriguez', 'Partner', 'Emily has extensive experience in real estate law and commercial property transactions.', 'img/team4.jpg', 'emily@mylawyermyway.com', '+1-555-456-7890', 'https://linkedin.com/', 'https://twitter.com/')";
    
    if (mysqli_query($con, $sample_team)) {
        echo "<p>Sample team data inserted successfully.</p>";
    } else {
        echo "<p>Error inserting sample team data: " . mysqli_error($con) . "</p>";
    }
} else {
    echo "<p>Error creating team table: " . mysqli_error($con) . "</p>";
}

echo "<p>Database fix complete. <a href='index.php'>Return to home page</a></p>";
?> 