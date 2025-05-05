<?php
// Start output buffering to prevent "headers already sent" warning
ob_start();

/* 
 DELETE.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
 include('connect-db.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 $result = mysqli_query($connection, "DELETE FROM news WHERE news_id=$id")
 or die(mysqli_error($connection)); 
 
 // redirect back to the view page
 header("Location: news.php?view=view");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: news.php?view=view");
 }
 
// End output buffering and send all output to browser
ob_end_flush();
?>