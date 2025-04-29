<?php include("./includes/db_connection.php"); ?>
<?php 
if(isset($_GET['status'])){
echo "<h1>Case Detail</h1>";
$case_id=$_GET['case_id'];
//step 1 first find case details from cases table using case_id
$result=find_case_detail_by_case_id($case_id);
$row=mysqli_fetch_assoc($result);
 $case_name=$row['name'];
 $date=$row['date'];
 $client_id=$row['client_id'];
//step 2 find client name using client_id getted from cases table
$result_from_client=find_client_name_by_id($client_id);
//data is a variable to store row of client_name
$data=mysqli_fetch_assoc($result_from_client);
$client_name=$data['name'];
//find all lawyers name related to the current case by using case_id
$all_lawyers_result=find_lawyer_name_by_case_id($case_id);
?>
<table class="table table-striped table-bordered bootstrap-datatable datatable responsive"><th>Case Name</th><th>Client</th><th>Lawyers</th><th>Register Date: Time</th>
<tr><td><?php echo $case_name ?></td><td><?php echo $client_name ?></td>
<!-- showing all lawyers names here in this table data -->
<td>
<?php 
while ($lawyer_data=mysqli_fetch_assoc($all_lawyers_result)){
echo $lawyer_name=$lawyer_data['name'];
echo "<br/>";
} 

?>
</td>

<td><?php echo $date ?></td></tr>
</table>

<?php
//case detail code end here
//case peshi starts from here
 // case status end
?>
<h1>Court Appearances</h1>
<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<th align="center">No.</th><th>DATE</th><th> TIME </th><th> Court </th><th> Lawyer </th>
<?php 
// Process of finding court Appearances of the current Case from Courts_has_cases

$result=find_court_appearance_detail_by_case_id($case_id);
$number=1;
while($case_row=mysqli_fetch_assoc($result)){
$court_id=$case_row['court_id'];
//step 1 Find court Name in which case will be appeared
$result_for_court_name=find_court_name_by_court_id($court_id);
$result_name_row=mysqli_fetch_assoc($result_for_court_name);
$court_name=$result_name_row['name'];
//step 2 Find Lawyer Name who is going to be appear in court
$lawyer_id=$case_row['lawyer_id'];
$result_for_lawyer_name=find_lawyer_name_by_id($lawyer_id);
$result_lawyer_name_row=mysqli_fetch_assoc($result_for_lawyer_name);
$lawyer_name=$result_lawyer_name_row['name'];
$date=$case_row['date'];
$time=$case_row['time'];
?>
<tr>
<td><?php echo $number ?></td>
<td><?php echo $date?></td>
<td><?php echo $time?></td>
<td><?php echo $court_name ?></td>
<td><?php echo $lawyer_name ?></td></tr>
<?php
$number++;
}
?>

</table>
<?php
} else {
?>
<h1 align="center">My cases</h1><br/>
<?php 
$id=$_SESSION['client_id']; 
$case_set=find_case_name_by_client_id($id);
?>
<table class="table table-striped table-bordered bootstrap-datatable datatable responsive"><tr><th>Case Name</th><th></th></tr>
<?php 
while ($row=mysqli_fetch_assoc($case_set)){
$case_id=$row['case_id'];
$name=$row['name'];
?>
<tr><td><?php echo $name ?> </td><td>
<a href="mlmw_client.php?cases=cases&status=status&case_id=<?php echo $case_id?>"><button class="btn btn-info">Status</button></a></td></tr>
<?php 
} // whiel $case_set end
?>
</table>
<?php
} //else END
?>