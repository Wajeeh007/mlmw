<?php require('includes/php/header.php'); ?>

<?php
/* 
	manage lawyers.PHP
	Displays all data from 'lawyers' table
*/

    
	// connect to the database
	include('connect-db.php');

	// get results from database
	if(isset($_GET['lawyer'])){
	?>
	<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="manage_lawyers.php?lawyer=lawyer">Manage Lawyer</a>
            </li>
        </ul>
    </div>
	<?php
	
	 
		
	// display data in table
	echo "<p><b><a href='manage_lawyers.php?lawyer=lawyer'>UnAuthorized</a></b> | <a href='all_lawyers.php'>View All</a></p>";
	
	echo "<table class=\"table table-striped table-bordered bootstrap-datatable datatable responsive\">";
	echo "<tr> <th>No.</th> <th>Name</th><th>Email</th>  <th></th> </tr>";

	// loop through results of database query, displaying them in the table
	$result=find_all_zero_status_lawyers();
	while($row = mysqli_fetch_array($result)) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['lawyer_id'] . '</td>';
		echo '<td>' . $row['name'] . '</td>';
		echo '<td>' . $row['email'] . '</td>';
		
		echo '<td><a class="btn btn-danger" href="allow_lawyer.php?id=' . $row['lawyer_id'] . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Allow
            </a></td>';
		
			
			
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
?>


<?php require('includes/php/footer.php'); ?>
<?php }?>
