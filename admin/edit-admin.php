<?php include("view-admins.php"); ?>
<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="view-admins.php?vie=vie">All Admins</a>
            </li>
			<li>
                <a href="edit-admin.php">Edit Admin</a>
            </li>
        </ul>
    </div>
<?php
/* 
 EDIT admin.PHP
 Allows user to edit specific entry in database
*/

 // creates the edit record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($id, $firstname, $lastname, $error)
 {
 ?>
 
 <?php 
 // if there are any errors, display them
 if ($error != '')
 {
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div><br />
 <p style="color:red">*required</p>
 <strong>Username: *</strong> <input type="text" name="firstname" value="<?php echo $firstname; ?>"/><br/><br />
 <strong>Password: *</strong> <input type="password" name="lastname" value="<?php echo $lastname; ?>"/><br/><br />
 <input type="submit" name="submit" value="Update" class="btn btn-success">
 </div>
 </form> 
 </body>
 </html> 
 <?php
 }



 
 // check if the form has been submitted. If it has, process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // confirm that the 'id' value is a valid integer before getting the form data
 if (is_numeric($_POST['id']))
 {
 // get form data, making sure it is valid
 $id = $_POST['id'];
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 
 // check that firstname/lastname fields are both filled in
 if ($firstname == '' || $lastname == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 //error, display form
 renderForm($id, $firstname, $lastname, $error);
 }
 else
 {
 global $connection;
 // save the data to the database
 mysqli_query($connection,"UPDATE admins SET username='$firstname', hashed_password='$lastname' WHERE id='$id'"); 
 
 // once saved, redirect back to the view page
 header("Location: view-admins.php?vie=vie"); 
 }
 }
 else
 {
 // if the 'id' isn't valid, display an error
 echo 'Error!';
 }
 }
 else
 // if the form hasn't been submitted, get the data from the db and display the form
 {
 
 // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
 $id = $_GET['id'];
 global $connection;
 $query="SELECT * FROM admins WHERE id=$id";
 $result = mysqli_query($connection,$query);
  confirm_query($result);
 $row = mysqli_fetch_assoc($result);
 
 // check that the 'id' matches up with a row in the databse
 if($row)
 {
 
 // get data from db
 $firstname = $row['username'];
 $lastname = $row['hashed_password'];
 
 // show form
 renderForm($id, $firstname, $lastname, '');
 }
 else
 // if no match, display result
 {
 echo "No results!";
 }
 }
 else
 // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error
 {
 echo 'Error!';
 }
 }
?>
<?php require('includes/php/footer.php'); ?>