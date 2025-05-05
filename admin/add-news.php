<?php
// Start output buffering to prevent "headers already sent" warning
ob_start();

include("news.php") 
?>
<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="news.php?view=view">News</a>
            </li>
			<li>
                <a href="add-news.php">Add News</a>
            </li>
        </ul>
    </div>

<?php
/* 
 add NEW.PHP
 Allows user to create a new entry in the database
*/
 
 // creates the new record form

 function renderForm($first, $last, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>New Record</title>
 </head>
 <body>
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
 
 <strong><tr><td>News Heading: *</td><td></strong> <input type="text" name="firstname" value="<?php echo $first; ?>" /></td></tr>
 <strong><tr><td>News Detail: *</td><td></strong> <textarea name="lastname" value="<?php echo $last; ?>" ></textarea></td></tr>
<tr><td colspan="2">
 <input type="submit" name="submit" value="Add News" class="btn btn-success">
</td></tr>
 </form> 
 </body>
 </html>
 <?php 
 }
 
 
 

 // connect to the database
 include('connect-db.php');
 
 // check if the form has been submitted. If it has, start to process the form and save it to the database
 if (isset($_POST['submit']))
 { 
 // get form data, making sure it is valid
 $firstname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['firstname']));
 $lastname = mysqli_real_escape_string($connection, htmlspecialchars($_POST['lastname']));
 
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
 mysqli_query($connection, "INSERT news SET news_heading='$firstname', news_detail='$lastname'")
 or die(mysqli_error($connection)); 
 
 // once saved, redirect back to the view page
 header("Location: news.php?view=view"); 
 }
 }
 else
 // if the form hasn't been submitted, display the form
 {
 renderForm('','','');
 }

// End output buffering and send all output to browser
ob_end_flush();
?>