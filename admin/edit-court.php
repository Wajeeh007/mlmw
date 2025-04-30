<?php
// Start output buffering
ob_start();

include("manage_courts.php");
?>

<?php if(isset($_POST['submit'])){
$id=$_SESSION['court_id'];
$name=$_POST['name'];

$result=edit_court_by_id($id,$name);
$_SESSION['court_id']='';
redirect_to("manage_courts.php?court=court");
}
?>
<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="manage_courts.php?court=court">All Courts</a>
            </li>
			<li>
                <a href="edit-courts.php">Edit Courts</a>
            </li>
        </ul>
    </div>
<?php include('connect-db.php') ?>
<?php 
/* 
 EDIT court.PHP
 court name edit
*/

 // creates the edit record form
 

 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 // query db
 $id = $_GET['id'];
 $result=find_court_by_id($id);
 $row = mysqli_fetch_assoc($result);
 $name=$row['name'];

 ?>
 <form method="post" action="edit-court.php">
  <h4 style="color:#0099FF">Edit Court</h4><br />
 <input type="text" value="<?php echo $name ?>" size="45" name="name"/> <br /><br />
 <input type="submit" name="submit" value="Update" class="btn btn-success"/>
 </form>
 <?php
 }

require('includes/php/footer.php');

// Flush the output buffer
ob_end_flush();
?>