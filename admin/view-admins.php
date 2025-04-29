<?php require('includes/php/header.php'); ?>

<?php
/* 
	view-admins.PHP
	Displays all data from 'admins' table
*/


	// vie an id from view-admin header file
	if(isset($_GET['vie'])){
	?>
	<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="news.php?view=view">All Admins</a>
            </li>
        </ul>
    </div>
	<?php
	global $connection;
		
		 $result = find_all_admins();
	     confirm_query($result);
		 
		
	// display data in table
	
	
	echo "<table class=\"table table-striped table-bordered bootstrap-datatable datatable responsive\">";
	echo "<tr> <th>No.</th><th>Username</th> <th>Password</th> <th></th> <th></th></tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysqli_fetch_assoc( $result )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td align=\"center\">' . $row['id'] . '</td>';
		echo '<td>' . $row['username'] . '</td>';
		echo '<td>' . $row['hashed_password'] . '</td>';
		echo '<td><a class="btn btn-info" href="edit-admin.php?id=' . $row['id'] . '"><i class="glyphicon glyphicon-edit icon-white"></i>Edit</a></td>';
		echo '<td><a class="btn btn-danger" href="delete-admin.php?id=' . $row['id'] . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a></td>';
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
?>
<p><a class="btn btn-success" href="add-admin.php">
                <i class="glyphicon glyphicon-user icon-white"></i>
                Add a new Admin
            </a></p>
<?php require('includes/php/footer.php'); ?>
<?php }?>
