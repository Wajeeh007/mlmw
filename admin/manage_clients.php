<?php require('includes/php/header.php'); ?>

<?php
/* 
	manage_clients.PHP
	Displays all data from 'client' table
*/

    
	// connect to the database
	include('connect-db.php');

	// get page name form header
	if(isset($_GET['client'])){
	?>
	<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="manage_clients.php?client=client">Manage clients</a>
            </li>
        </ul>
    </div>
	<?php
	
	 
		
	// display data in table
	echo "<p><b><a href='manage_clients.php?client=client'>UnAuthorized</a></b> | <a href='all_clients.php'>View All</a></p>";
	
	echo "<table class=\"table table-striped table-bordered bootstrap-datatable datatable responsive\">";
	echo "<tr> <th>No.</th> <th>Name</th><th>Email</th>  <th></th> </tr>";

	// loop through results of database query, displaying them in the table
	$result=find_all_zero_status_clients();
	while($row = mysqli_fetch_array($result)) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['client_id'] . '</td>';
		echo '<td>' . $row['name'] . '</td>';
		echo '<td>' . $row['email'] . '</td>';
		
		echo '<td><a class="btn btn-danger" href="allow_client.php?id=' . $row['client_id'] . '">
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
