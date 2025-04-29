<?php require('includes/php/header.php'); ?>

<?php
/* 
	manage cases.PHP
	Displays all data from 'cases' table
*/

    
	// connect to the database
	include('connect-db.php');
	//when admin clicks on add lawyer button
	if(isset($_GET['al'])){
	$case_id=$_GET['cid'];
	echo "case id: $case_id";
	echo 	$lawyer_id=$_POST['lawyer_id'];
		echo "in assign new lawyer coding";
	$result =add_cases_has_lawyers($case_id,$lawyer_id);
	if ($result==1){ ?>
	<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
	Record Added successfullly
	</div>
	<a href="manage_cases.php?mc=mc&id=<?php echo $case_id ?>">Go Back</a>
	<?php }
	}
	//when admin clicks on delete lawyer button 
	if(isset($_GET['dl'])){
	$case_id=$_GET['cid'];
	//echo "case id: $case_id";
	
	
	$lawyer_id=$_POST['lawyer_id'];
	
	$result=delete_lawyer_having_case($case_id,$lawyer_id);
	if($result==1){
	?>
	<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
	Record deleted successfullly
	</div>
	<a href="manage_cases.php?mc=mc&id=<?php echo $case_id ?>">Go Back</a>
	<?php } ?>
	
	<?php } 
	//when admin clicks on manage case button
	if(isset($_GET['mc'])){
	$case_id=$_GET['id'];
	?>
	<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="manage_cases.php?case=case">Manage Cases</a>
            </li>
        </ul>
    </div>
	<?php //echo $case_id; 
	?>
	
	
	
	<form method="post" action="manage_cases.php?dl=dl&cid=<?php echo $case_id ?> ">
	<?php 
		// display data in table
	echo "<table class=\"table table-striped table-bordered bootstrap-datatable datatable responsive\">";
	echo "<tr>  <th>Case</th><th>Client</th><th>Lawyer</th> <th></th><th></th> </tr>";

	// loop through results of database query, displaying them in the table
	$result=find_case_by_id($case_id);
	while($row = mysql_fetch_array( $result )) {
	$client_id=$row['client_id'];
	

    // getting client name to show in table using client id
	$client=find_client_name_by_id($client_id);
	     while($data=mysql_fetch_array($client)){
		 $client_name=$data['name'];
		 
		 }
		 
		// echo out the contents of each row into a table
		echo "<tr>";
		
		echo '<td>' . $row['name'] . '</td>';
		
		
		echo '<td>' . $client_name.'</td>';
		echo '<td>';
	$lawyer=find_lawyer_name_by_case_id($row['case_id']);	
		while($lawer=mysql_fetch_array($lawyer)){
		 echo $lawer['name'];
		 echo '<br/>';
		 }
		
		
		echo '</td>';
		echo '<td>'; 
		?>

		<select name="lawyer_id">
		<?php
  $lawyer=find_lawyer_name_by_case_id($case_id);
  		$lawyer_id='';	
		while($lawer=mysql_fetch_array($lawyer)){ 
		$lawyer_id=$lawer['lawyer_id']; 
		$name=$lawer['name']; ?>
		 <option value="<?php echo $lawyer_id ?>"><?php echo $name; ?></option>
		 
   <?php } ?>
 
</select>

	
		<!-- old coding 
		 echo '<a class="btn btn-danger" href="manage_cases.php?dl=dl&id='.$case_id.'">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Delete Lawyer
            </a>
			-->
	
		<?php echo '</td>'; ?>
		<?php if($lawyer_id !=''){ ?>
		<td><input type="submit" name="submit" value="Delete Lawyer" class="btn btn-danger"/></td>
		<?php } else { ?>
		<td><h6><font color="#0000FF" size="+1">0 Lawyers </font></h6></td>
		<?php } ?>
	<?php	echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
	echo "</form>";
	
	// get results from database
	
	
	
	//_____________Assign new Lawyer Coding Start_______________//
	
	echo " Assign new Lawyer ";
?>
<form method="post" action="manage_cases.php?al=al&cid=<?php echo $case_id ?> ">
<table><td>

		<select name="lawyer_id">
  <?php $lawyer_set=all_lawyers();?>
  <?php while($row=mysql_fetch_array($lawyer_set)){
  $lawyer_id=$row['lawyer_id'];
  $name=$row['name'];
  ?>
  <option value="<?php echo $lawyer_id ?>"><?php echo $name ?></option>
  <?php } ?>
 </td>
</select>

<td><input type="submit" name="submit" value="Add Lawyer" class="btn btn-success btn-lg"/></td>
</table>
</form>

<?php
	}//this bracket covers both froms and tables
	//_____________Assign new Lawyer Coding End_______________//
	
	
	
	
	
	
	
	
	
	if(isset($_GET['case'])){
	?>
	<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="manage_cases.php?case=case">Manage Cases</a>
            </li>
        </ul>
    </div>
	
	<?php
	
	 
		
	// display data in table
	echo "<p><b><a href='manage_cases.php?case=case'>All Cases</a></b></p>";
	
	echo "<table class=\"table table-striped table-bordered bootstrap-datatable datatable responsive\">";
	echo "<tr> <th>No.</th> <th>Case</th><th>Description</th><th>Reg. Date</th><th>Client</th><th>Lawyers</th>  <th></th> </tr>";

	// loop through results of database query, displaying them in the table
	$result=find_all_cases();
	
	while($row = mysql_fetch_array( $result )) {
	$client_id=$row['client_id'];
	
	
	
	
	
    // getting client name to show in table using client id
	$client=find_client_name_by_id($client_id);
	     while($data=mysql_fetch_array($client)){
		 $client_name=$data['name'];
		 
		 }
		 
		// echo out the contents of each row into a table
		echo "<tr>";
		echo '<td>' . $row['case_id'] . '</td>';
		echo '<td>' . $row['name'] . '</td>';
		echo '<td>' . $row['description'] . '</td>';
		echo '<td>' . $row['date'] . '</td>';
		echo '<td>' . $client_name.'</td>';
		echo '<td>';
		
	$lawyer=find_lawyer_name_by_case_id($row['case_id']);	
		while($lawer=mysql_fetch_array($lawyer)){
		 echo $lawer['name'];
		 
		 echo '<br/>';
		 }
		
		
		echo '</td>';
		echo '<td><a class="btn btn-success" href="manage_cases.php?mc=mc&id=' . $row['case_id'] . '">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Manage
            </a></td>';
		
			
			
		echo "</tr>"; 
	} 

	// close table>
	echo "</table>";
?>

<p><a class="btn btn-info" href="add-case.php">
                <i class="glyphicon glyphicon-user icon-white"></i>
                Add a new Case
            </a></p>
<?php require('includes/php/footer.php'); ?>
<?php }?>
