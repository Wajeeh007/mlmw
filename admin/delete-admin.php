<?php include("view-admins.php") ?>
<?php
/* 
 delete-admin.PHP
 Deletes a specific entry from the 'admin' table
*/
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
 // get id value
 $id = $_GET['id'];
 
 // delete the entry
 global $connection;
 $query = "DELETE FROM admins WHERE id='$id'";
		 $result = mysqli_query($connection, $query);
	     confirm_query($result);
 
 
 // redirect back to the view page
 header("Location: view-admins.php?vie=vie");
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 header("Location: view-admins.php?vie=vie");
 }
 
?>