<?php
// Connect to the database
require_once("includes/config.php");

// Function to check if a table exists
function table_exists($table_name, $connection) {
    $result = mysqli_query($connection, "SHOW TABLES LIKE '$table_name'");
    return mysqli_num_rows($result) > 0;
}

// Set up the team table
if (!table_exists('team', $con)) {
    echo "<p>Creating team table...</p>";
    
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
} else {
    echo "<p>Team table already exists.</p>";
}

// Set up the news table
if (!table_exists('news', $con)) {
    echo "<p>Creating news table...</p>";
    
    $news_table = "CREATE TABLE news (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        date DATE NOT NULL,
        author VARCHAR(100) NOT NULL,
        image VARCHAR(255)
    )";
    
    if (mysqli_query($con, $news_table)) {
        echo "<p>News table created successfully.</p>";
        
        // Insert sample data
        $current_date = date('Y-m-d');
        $one_week_ago = date('Y-m-d', strtotime('-7 days'));
        $two_weeks_ago = date('Y-m-d', strtotime('-14 days'));
        
        $sample_news = "INSERT INTO news (title, content, date, author, image) VALUES
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
} else {
    echo "<p>News table already exists.</p>";
}

echo "<p>Database setup complete. <a href='index.php'>Return to home page</a></p>";
?> 