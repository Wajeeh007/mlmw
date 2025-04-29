<?php require('includes/php/header.php'); ?>

<?php
/* 
	manage_courts.PHP
	Displays all data from 'courts' table
*/

    
	// connect to the database
	include('connect-db.php');

	// get results from database
	if(isset($_GET['court'])){
	?>
	<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="manage_courts.php?lawyer=lawyer">Manage courts</a>
            </li>
        </ul>
    </div>
	<?php
	
	 
		
	// display data in table
	echo "<p><b><a href='manage_courts.php?court=court'>All Courts</a></b> </p>";
	
	echo "<table class=\"table table-striped table-bordered bootstrap-datatable datatable responsive\">";
	echo "<tr> <th>No.</th> <th>Name</th><th></th>  <th></th> </tr>";

	// loop through results of database query, displaying them in the table
	$result=find_all_courts();
	while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		$_SESSION['court_id']=$row['court_id'];
		echo '<td>' . $row['court_id'] . '</td>';
		echo '<td>' . $row['name'] . '</td>';
		
		
		echo '<td><a class="btn btn-info" href="edit-court.php?id=' . $row['court_id'] . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
               Edit
            </a></td>';
		
		echo '<td><a class="btn btn-danger" href="delete_court.php?id=' . $row['court_id'] . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
               Delete
            </a></td>';
			
			
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
?>
<p><a class="btn btn-success" href="add-court.php">
                <i class="glyphicon glyphicon-plus icon-white"></i>
                Add a new Court
            </a></p>

<?php require('includes/php/footer.php'); ?>
<?php }?>
