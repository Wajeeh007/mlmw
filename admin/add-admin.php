<?php
// Start output buffering
ob_start();

include("view-admins.php");
?>
<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="view-admins.php?vie=vie">All Admins</a>
            </li>
			<li>
                <a href="add-admin.php">Add Admin</a>
            </li>
        </ul>
    </div>

<?php
/* 
 add-admin.PHP
 admin add new record in admin table
*/
 
 // creates the new record form
 // since this form is used multiple times in this file, I have made it a function that is easily reusable
 function renderForm($first, $last, $error)
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
 <p style="color:red">* required</p>
 <table>
	
 <strong><tr><td>Username: *</td><td></strong> <input type="text" name="firstname" value="" /></td></tr>
 <strong><tr><td>Password: *</td><td></strong> <input type="password" name="lastname" value="" /></td></tr>
 
<tr><td align="center" colspan="2"> <input type="submit" name="submit" value="Add Admin" class="btn btn-success"></td></tr>
</table>
 </form> 
 </body>
 </html>
 <?php 
 }
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 
 // check to make sure both fields are entered
 if ($firstname == '' || $lastname == '')
 {
 // generate error message
 $error = 'ERROR: Please fill in all required fields!';
 
 // if either field is blank, display the form again
 renderForm($firstname, $lastname, $error);
 }
 else
 {
 // save the data to the database
 $result=add_new_admin($firstname,$lastname);
 // once saved, redirect back to the view page

 header("Location: view-admins.php?vie=vie"); 
 exit(); // Make sure to exit after redirect
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','');
 }

// Flush the output buffer
ob_end_flush();
?>