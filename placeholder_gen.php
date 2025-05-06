<?php
// Set the content type header
header("Content-type: text/html");

// Function to create a simple placeholder image
function create_placeholder($filename, $width = 300, $height = 300, $text = "Placeholder") {
    // Create the image
    $image = imagecreatetruecolor($width, $height);
    
    // Colors
    $bg_color = imagecolorallocate($image, 240, 240, 240);
    $text_color = imagecolorallocate($image, 100, 100, 100);
    $border_color = imagecolorallocate($image, 200, 200, 200);
    
    // Fill the background
    imagefill($image, 0, 0, $bg_color);
    
    // Add a border
    imagerectangle($image, 0, 0, $width - 1, $height - 1, $border_color);
    
    // Add text
    $font_size = 5;
    $text_width = imagefontwidth($font_size) * strlen($text);
    $text_height = imagefontheight($font_size);
    
    $x = ($width - $text_width) / 2;
    $y = ($height - $text_height) / 2;
    
    imagestring($image, $font_size, $x, $y, $text, $text_color);
    
    // Save the image
    imagejpeg($image, "img/" . $filename, 90);
    
    // Free memory
    imagedestroy($image);
    
    echo "Created placeholder image: " . $filename . "<br>";
}

// Create team placeholders
create_placeholder("team1.jpg", 300, 300, "Team Member 1");
create_placeholder("team2.jpg", 300, 300, "Team Member 2");
create_placeholder("team3.jpg", 300, 300, "Team Member 3");
create_placeholder("team4.jpg", 300, 300, "Team Member 4");

// Create news placeholders
create_placeholder("news1.jpg", 800, 400, "News Article 1");
create_placeholder("news2.jpg", 800, 400, "News Article 2");
create_placeholder("news3.jpg", 800, 400, "News Article 3");

// Create post placeholders
create_placeholder("post1.jpg", 200, 200, "Post 1");
create_placeholder("post2.jpg", 200, 200, "Post 2");
create_placeholder("post3.jpg", 200, 200, "Post 3");

// Create other placeholders
create_placeholder("footer-logo.png", 300, 100, "Logo");

echo "<p>All placeholder images have been created. <a href='index.php'>Return to home page</a></p>";
?> 