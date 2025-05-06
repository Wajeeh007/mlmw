<?php
// Database connection configuration
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "mlmw");

// Create a database connection
try {
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    // Remove the echo statement that was in the original file
} catch(mysqli_sql_exception $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Test if connection succeeded
if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
        mysqli_connect_error() . 
        " (" . mysqli_connect_errno() . ")"
    );
}
?> 