<?php require('includes/php/header.php'); ?>

<?php
/* 
	news.PHP
	Displays all data from 'news' table
*/

    
	// connect to the database
	include('connect-db.php');

	// get results from database
	if(isset($_GET['view'])){
	?>
	<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="news.php?view=view">News</a>
            </li>
        </ul>
    </div>
	<?php
	
	$result = mysql_query("SELECT * FROM news") 
		or die(mysql_error());
		
	// display data in table
	echo "<p><b>View All</b> | <a href='view-paginated-news.php?page=1'>View Paginated</a></p>";
	
	echo "<table class=\"table table-striped table-bordered bootstrap-datatable datatable responsive\">";
	echo "<tr> <th>No.</th> <th>Posting DATE:Time</th><th>Headline</th> <th>Detail</th> <th></th> <th></th></tr>";

	// loop through results of database query, displaying them in the table
	while($row = mysql_fetch_array( $result )) {
		
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['news_id'] . '</td>';
		echo '<td>' . $row['news_date'] . '</td>';
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
?>
<p><a class="btn btn-success" href="add-news.php">
                <i class="glyphicon glyphicon-user icon-white"></i>
                Add a new News
            </a></p>
<?php require('includes/php/footer.php'); ?>
<?php }?>
