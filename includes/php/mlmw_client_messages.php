<?php include("./includes/db_connection.php"); ?><br />
<h1 align="center"> My Messages </h1>
<p align="center"><a class="btn btn-info btn-lg" href="mlmw_client.php?message=message&nmsg=nmsg">New Message</a>
                   
					         <a class="btn btn-success btn-lg" href="mlmw_client.php?message=message&sent=sent">Sent</a>
							 <a class="btn btn-danger btn-lg" href="mlmw_client.php?message=message&received=received">Received</a>
							 </p>
<hr />

<?php //new Message will be composed here (nmsg) stands for new message?>
<?php if(isset($_GET['nmsg'])){
echo "<h1>Compose Message</h1>"; ?>
<form method="post" action="mlmw_client.php?message=message&send=send" enctype="multipart/form-data">
 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
 <tr><td>Message Title:</td><td> <input type="text" name="title" required/></td></tr><td><br  /></td>
 <tr><td>Receiver:</td><td>
 <select name="lawyer">
<?php 
$id=$_SESSION['client_id']; 
$lawyers_set=client_lawyers($id);
while ($row=mysqli_fetch_assoc($lawyers_set)){
$lawyer_id=$row['lawyer_id'];
$name=$row['name'];
?>
 <option value="<?php echo $lawyer_id ?>"><?php echo $name ?></option>
<?php } ?>

 </select>
 </td></tr><td><br  /></td>
 <tr><td>Message:</td><td><textarea name="message" rows="20" cols="50" placeholder="welcome to My Lawyer My Way Application"></textarea></td></tr><td><br  /></td>
 <tr><td>File: </td><td><input type="file" name="file" value="choose File"  /></td></tr><td><br  /></td>
 
<tr><td colspan="2" align="center"> <input type="submit" name="send" value="send" class="btn btn-success btn-lg"/></td></tr>
 </table>
</form>
<?php
	} else if(isset($_GET['sent'])){
echo "<h1>Outbox<h4/>";
	$id=$_SESSION['client_id']; 
	$message_set=client_outbox($id);
	$number=1;
	?>
	
	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	<tr><td align="center">No.</td><td align="center">Receiver</td><td align="center">Message</td><td align="center">Date : Time</td></tr>
	<?php
	while ($row=mysqli_fetch_assoc($message_set)){

	$title=$row['title'];
	$message=$row['message'];
	$id=$row['lawyer_id'];
	$date=$row['date'];
	 $lawyer_set=find_lawyer_name_by_id($id);
	 //getting lawyer name for returned lawyer row
	 $data=mysqli_fetch_assoc($lawyer_set);
	 $lawyer_name=$data['name'];
	echo "<br/>";
	//outputting the inbox messages
	?>
	
	<tr><td><?php echo $number ?><td><?php echo $lawyer_name ?></td><td><?php echo $message ?></td>
	<td><?php echo $date ?></td>
	</tr>
	
	<?php
	$number++;
} 
?>
</table>

<?php 
	} else if(isset($_GET['received'])){
	echo "<h1>Inbox<h4/>";
	$id=$_SESSION['client_id']; 
	$message_set=client_inbox($id);
	$number=1;
	?>
	
	<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	<tr><td align="center">No.</td><td align="center">Sender</td><td align="center">Message</td><td align="center">Date : Time</td></tr>
	<?php
	while ($row=mysqli_fetch_assoc($message_set)){

	$title=$row['title'];
	$message=$row['message'];
	$id=$row['lawyer_id'];
	$date=$row['date'];
	 $lawyer_set=find_lawyer_name_by_id($id);
	 //getting lawyer name for returned lawyer row
	 $data=mysqli_fetch_assoc($lawyer_set);
	 $lawyer_name=$data['name'];
	echo "<br/>";
	//outputting the inbox messages
	?>
	
	<tr><td><?php echo $number ?><td><?php echo $lawyer_name ?></td><td><?php echo $message ?></td>
	<td><?php echo $date ?></td>
	</tr>
	
	<?php
	$number++;
} ?>
</table>
<?php
}?>
<?php //Message sending process start ?>
<?php if(isset($_GET['send'])){
$message_title=$_POST['title'];
$client_id=$_SESSION['client_id'];
//lawyer_id is coming from option Select tag
$lawyer_id=$_POST['lawyer'];
$message=$_POST['message'];
if(isset($_POST['file'])){
$file_name=$_POST['file'];
} else { $file_name='';
}
$result=send_client_message_to_lawyer($client_id,$lawyer_id,$message_title,$message,$file_name);
if($result==1){
echo "Message Sent";
} else {
echo "Message No Sent";
}
}
?>