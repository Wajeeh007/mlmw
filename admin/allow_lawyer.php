<?php require_once("includes/admin-functions.php"); ?>
<?php
/* 
 allow_lawyer.PHP
 Deletes a specific entry from the 'players' table
*/

 // connect to the database
 include('connect-db.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];

 // update the entry
 
 $result=allow_lawyer($id);
 // redirect back to the view page
header("Location: manage_lawyers.php?lawyer=lawyer");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: manage_lawyers.php?lawyer=lawyer");
 }
 
?>