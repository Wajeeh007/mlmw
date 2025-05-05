<?php include("news.php") ?>
<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="news.php?view=view">News</a>
            </li>
			<li>
                <a href="view-paginated-news.php?page=1">View Paginated</a>
            </li>
        </ul>
    </div>

<?php
/* 
	VIEW-PAGINATED.PHP
	Displays all data from 'players' table
	This is a modified version of view.php that includes pagination
*/

	// connect to the database
	include('connect-db.php');
	
	// number of results to show per page
	$per_page = 3;
	
	// figure out the total pages in the database
	$result = mysqli_query($connection, "SELECT * from news");
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
	
	echo "<p><a href='news.php?view=view'>View All</a> | <b>View Page:</b> ";
	for ($i = 1; $i <= $total_pages; $i++)
	{
		echo "<a href='view-paginated-news.php?page=$i'>$i</a> ";
	}
	echo "</p>";
	
	// Get the data again with a limit
	$result = mysqli_query($connection, "SELECT * FROM news LIMIT $start, $per_page");
		
	// display data in table
	echo "<table border='1' cellpadding='10'>";
	echo "<tr> <th>news_id</th> <th>news_heading</th> <th>news_detail</th> <th></th> <th></th></tr>";

	// loop through results of database query, displaying them in the table	
	while ($row = mysqli_fetch_assoc($result)) {
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['news_id'] . '</td>';
		echo '<td>' . $row['news_heading'] . '</td>';
		echo '<td>' . $row['news_detail'] . '</td>';
		
		
		echo '<td><a class="btn btn-info" href="edit-news.php?id=' . $row['news_id'] . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a></td>';
		
		
		echo '<td><a class="btn btn-danger" href="delete-news.php?id=' . $row['news_id'] . '">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a></td>';
	
		echo "</tr>"; 
	}
	// close table>
	echo "</table>"; 
	
	// pagination
	
?>
<p><p><a class="btn btn-success" href="add-news.php">
                <i class="glyphicon glyphicon-pencil icon-white"></i>
                Add a new News
            </a></p></p>
