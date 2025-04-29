<?php include("./includes/db_connection.php"); ?>
<?php 
//mlmw_lawyer_schedule.php
// 1. show Schedule page to Lawyer
// 2. Add new appointment with client
// 3. Add new Personal Schedule

?>
<h1 align="center"> My Schedule </h1>
<p align="center">
<a class="btn btn-primary btn-lg" href="mlmw_lawyer.php?schedule=schedule&vps=vps">View Personal Schedule</a>

<a class="btn btn-info btn-lg" href="mlmw_lawyer.php?schedule=schedule&mc=mc">New Appointment</a>
                   
					         <a class="btn btn-danger btn-lg" href="mlmw_lawyer.php?schedule=schedule&ps=ps">Personal Schedule</a>
							  <a class="btn btn-success btn-lg" href="mlmw_lawyer.php?schedule=schedule&va=va">View Appointments</a>
							  </p>
<hr />
<?php // step to add new appoint mint mc means New Appointment?>
<?php if(isset($_GET['mc'])){ ?>
<form method="post" action="mlmw_lawyer.php?schedule=schedule&save=save">
	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive"><tr><th>Choose Client</th><th>Choose Date</th><th>Choose Time</th><th>Description</th><th></th></tr>
	<tr>
<td>

<select name="client">
<?php 
$id=$_SESSION['lawyer_id']; 
$clients_set=lawyer_clients($id);
while ($row=mysqli_fetch_assoc($clients_set)){
$client_id=$row['client_id'];
$name=$row['name'];
?>
 <option value="<?php echo $client_id ?>"><?php echo $name ?></option>
<?php } ?>
</select>
</td>
<td><input type="date" name="date"/></td>
<td><input type="time" name="time"/></td>
<?php //find_case_name_by_lawyer_id ?>

<?php /* //OPTION of aslo choosing Case//
<td>
<select name="case">
<?php 
$id=$_SESSION['lawyer_id']; 
$case_set=find_case_name_by_lawyer_id ($id);
while ($row=mysqli_fetch_assoc($case_set)){
$case_id=$row['case_id'];
$name=$row['name'];
?>
 <option value="<?php echo $case_id ?>"><?php echo $name ?></option>
<?php } ?>
</select>
</td>
*/?>
<td><input type="text" name="description" value="" required/></td> 
<td><input type="submit" name="submit" class="btn btn-success"/></td>
</tr>
</table>
<form>
<?php } ?>

<?php 
//Next step to save the New Appointment Record
?>
<?php if(isset($_GET['save'])){
$lawyer_id=$_SESSION['lawyer_id'];
$client_id=$_POST['client'];
$date=$_POST['date'];
$time=$_POST['time'];
$description=$_POST['description'];
echo $description;
$result=add_new_appointment($lawyer_id,$client_id,$date,$time,$description);
if($result==1){
?>
<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  Record Added successfully
</div>
<?php
} else {
echo "problem in saving new appointment";
}
}
?>
<?php
//coding for Personal Schedule (Form for Personal Schedule)
 if(isset($_GET['ps'])){

 ?>
 <form method="post" name="personal_schedule" action="mlmw_lawyer.php?schedule=schedule&saveps=saveps" >
 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive"><th>Pick Date</th><th>Pick Time</th><th>Notes</th><th></th>
 <tr>
 <td><input type="date" name="date" value="ok" required/></td>
 <td><input type="time" name="time" required/></td>
 <td><input type="text" name="notes" required/></td>
 <td><input type="submit" name="submit" value="saveps" class="btn btn-success"/></td>
 </tr>
 </table>
 </form>
 <?php } ?>
 <?php
 //process personal schedule save request (saveps) means save personal_schedule
 if(isset($_GET['saveps'])){
 $date=$_POST['date'];
 $time=$_POST['time'];
 $notes=$_POST['notes'];
 echo $date;
 echo "<br/>";
 echo $time;
 echo "<br/>";
 echo $notes;
 $law_id=$_SESSION['lawyer_id'];
 $result=add_into_personal_schedule($law_id,$date,$time,$notes);
 if($result==1){
 echo "<h4>Record Successfully Added</h4>";
 } 
 else {
 echo "Record Not added Try Again";
 }
 
 } else if(isset($_GET['va'])){
 
 $lawyer_id = $_SESSION['lawyer_id'];
 $result= find_appointments_by_lawyer_id( $lawyer_id);
 ?>
 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
 <tr><th>No.</th><th>Appointment With </th><th> Agenda </th> <th> Date </th> <th> Time</th><th>Delete</th></tr>
 <?php 
 $number=1;
 while($row=mysqli_fetch_assoc($result)){
$appointment_id=$row['appointment_id'];
  $description=$row['Description'];
 $date=$row['Date'];
 $time=$row['Time'];
$client_id=$row['client_id'];
//return client name for Appointment With
$data=find_client_name_by_id($client_id);
while($dat=mysqli_fetch_assoc($data)){
$client_name=$dat['name'];
}
 ?>
 <tr><td><?php echo $number ?></td><td><?php echo $client_name ?></td><td><?php echo $description ?></td><td><?php echo $date ?></td><td><?php echo $time ?></td><td><a class="btn btn-danger" href="mlmw_lawyer.php?schedule=schedule&delete_appointment=delete_appointment&appointment_id=<?php echo $appointment_id ?>">Delete Appointment</a></td></tr>
 
  <?php 
  $number++;
  } 
  ?>
 
 
 
 </table>

 <?php

 }// view appointments completed
 else if(isset($_GET['delete_appointment'])){
 $appointment_id=$_GET['appointment_id'];
 $result=delete_appointment_by_id($appointment_id);
 if($result==1){
 ?>
 <div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  Appointment deleted successfully
</div>
<?php 
 } else {
 echo "Appointment can't be deleted";
 } }// delete appointments completed
	////////////////////////////////in vps( view personal schedule)/////////////////////
 else if(isset($_GET['vps'])){
 echo "<h3>Personal Schedule</h3>";
 $lawyer_id=$_SESSION['lawyer_id'];
 $result=find_personal_schedule_by_lawyer_id($lawyer_id); 
?>
 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
 <tr><th>No.</th><th>Notes </th><th> Date </th> <th> Time</th><th>Delete</th></tr>


 <?php 
$number=1;
while($row=mysqli_fetch_assoc($result)){
$ps_id=$row['ps_id'];
$date=$row['date'];
$time=$row['time'];
$notes=$row['notes'];
?>
<tr><td><?php echo $number ?></td><td><?php echo $notes ?></td><td><?php echo $date ?></td><td><?php echo $time ?></td><td><a class="btn btn-danger" href="mlmw_lawyer.php?schedule=schedule&delete_ps=delete_ps&ps_id=<?php echo $ps_id ?>">Delete Record</a></td></tr>
<?php 
$number++;
}
 ?>
 </table>
 <?php
 }// show personal schedule completed
  else if(isset($_GET['delete_ps'])){
  echo $schedule_id=$_GET['ps_id'];
  $lawyer_id=$_SESSION['lawyer_id'];
  $result=delete_from_personal_schedule_by_lawyer_id($schedule_id,$lawyer_id);
  if($result==1){
  ?>
  <div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  Record deleted successfully
</div>
  <?php
  }
  echo "delete personal Schedule";
  }
 ?>