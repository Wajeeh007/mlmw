<?php
// Start output buffering
ob_start();

include("manage_courts.php");
?>
<?php
if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];

 // update the entry
 
 $result=delete_court_by_id($id);
 // redirect back to the view page
header("Location: manage_courts.php?court=court");
exit(); // Make sure to exit after redirect
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: manage_courts.php?court=court");
exit(); // Make sure to exit after redirect
 }

// Flush the output buffer
ob_end_flush();
?>