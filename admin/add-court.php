<?php include("manage_courts.php"); ?>

<?php if(isset($_POST['submit'])){

$name=$_POST['name'];
$result=add_new_court($name);
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
                <a href="add-court.php">Add Courts</a>
            </li>
        </ul>
    </div>
<?php include('connect-db.php') ?>
<?php 
/* 
 Add court.PHP
 
*/

 
 ?>
 <form method="post" action="add-court.php">
 <h4 style="color:#0099FF">Enter New Court Name</h4><br />
 <input type="text" placeholder="High Court, Lahore" size="45" name="name"/> <br /><br />
 <input type="submit" name="submit" value="Add Court" class="btn btn-success"/>
 </form>
 
<?php require('includes/php/footer.php'); ?>