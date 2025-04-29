<?php include("./includes/db_connection.php"); ?>
<?php 
//mlmw_client_appointments.php
// show client all his appointments with lawyers
?>
<h1 align="center"> My Appointments </h1>
<table class="table table-striped table-bordered bootstrap-datatable datatable responsive"><th>No.</th><th>Agenda</th><th>Date</th><th>Time</th><th> Appointmint With</th>
<?php $client_id=$_SESSION['client_id']; 
$result_set=find_appointments_by_client_id($client_id);
$number =1;
while($row=mysqli_fetch_assoc($result_set)){
$agenda=$row['Description'];
$date=$row['Date'];
$time=$row['Time'];
$lawyer_id=$row['lawyer_id'];
$lawyer_name_set=find_lawyer_name_by_id($lawyer_id);
$lawyer_ok=mysqli_fetch_assoc($lawyer_name_set);
$lawyer_name=$lawyer_ok['name'];
?>
<tr><td><?php echo $number++ ?></td><td><?php echo $agenda ?></td><td><?php echo $date ?></td><td><?php echo $time ?></td><td><?php echo $lawyer_name ?></td></tr>


<?php
}
?>

</table>
