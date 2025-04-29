<?php
	define("DB_SERVER", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "GGnika@007");
	define("DB_NAME", "php");

  // 1. Create a database connection
  try{
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    echo "Connection successful!";
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
