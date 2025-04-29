<?php require_once("includes/admin-functions.php"); ?>
<?php
/* 
 allow_client.PHP
 
*/

 // connect to the database
 include('connect-db.php');
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];

 // update the entry
 
 $result=allow_client($id);
 // redirect back to the view page
header("Location: manage_clients.php?client=client");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: manage_client.php?client=client");
 }
 
?>