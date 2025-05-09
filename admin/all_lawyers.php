<?php include("manage_lawyers.php") ?>
<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
        </ul>
    </div>

<?php
/* 
	VIEW-PAGINATED-lawyers.PHP
	Displays all data from 'lawyers' table

*/

	// connect to the database
	include('connect-db.php');
	global $connection;
	
	// number of results to show per page
	$per_page = 10;
	
	// figure out the total pages in the database
	$result = mysqli_query($connection, "SELECT * FROM lawyers");
	$total_results = mysqli_num_rows($result);
	$total_pages = ceil($total_results / $per_page);

	// check if the 'page' variable is set in the URL (ex: view-paginated.php?page=1)
	if (isset($_GET['page']) && is_numeric($_GET['page']))
	{
		$show_page = $_GET['page'];
		
		// make sure the $show_page value is valid
		if ($show_page > 0 && $show_page <= $total_pages)
		{
			$start = ($show_page -1) * $per_page;
			$end = $start + $per_page; 
		}
		else
		{
			// error - show first set of results
			$start = 0;
			$end = $per_page; 
		}		
	}
	else
	{
		// if page isn't set, show first set of results
		$start = 0;
		$end = $per_page; 
	}
	
	// display pagination
	
	echo "<p><a href=manage_lawyers.php?lawyer=lawyer'>Un-Authorized</a> | <b>View Page:</b> ";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='all_lawyers.php?page=$i'>$i</a> ";
	}
	echo "</p>";
		
	// display data in table
	echo "<table border='0' cellpadding='10'>";
	echo "<tr> <th>lawyer_id</th> <th>Name</th> <th>Email</th> <th></th> <th></th></tr>";

	// loop through results of database query, displaying them in the table
	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	
	for ($i = $start; $i < $end; $i++)
	{
		// make sure that PHP doesn't try to show results that don't exist
		if ($i == $total_results) { break; }
	
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $rows[$i]['lawyer_id'] . '</td>';
		echo '<td>' . $rows[$i]['name'] . '</td>';
		echo '<td>' . $rows[$i]['email'] . '</td>';
		
		$status = $rows[$i]['status'];
		if($status==1){
		echo '<td><a class="btn btn-primary" href="block_lawyer.php?id=' . $rows[$i]['lawyer_id'] . '">
                <i class="glyphicon glyphicon-stop icon-white"></i>
                Block
            </a></td>';
		} else {
		echo '<td></td>';
		}
		echo '<td><a class="btn btn-danger" href="delete-lawyer.php?id=' . $rows[$i]['lawyer_id'] . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a></td>';
		
		
	
		echo "</tr>"; 
	}
	// close table>
	echo "</table>"; 
	
	// pagination
	
?>

