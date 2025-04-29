<?php include("./includes/db_connection.php"); ?>
<?php require_once("./includes/functions.php") 	?>

<?php echo "<h1>My clients</h1><br/>" ?>
<?php 
if(isset($_GET['cfp'])){
$client_id=$_GET['client_id'];
$query="select * from clients where client_id='$client_id'";
$result=mysqli_query($connection,$query);
confirm_query($result);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];
$facebook=$row['facebook'];
$image=$row['image'];
$address=$row['address'];
$city=$row['city'];
$country=$row['country'];
?>

		<div class="row">
		<div class="col-lg-4">
		<!-- fetching data from database-->
		<!-- fetching data from database end -->
		<h1 style="padding-top:4em"><?php echo $name; ?></h1><br/>
		<span class="glyphicon glyphicon-phone"></span>  <?php echo $phone; ?><br/>
		<span class="glyphicon glyphicon-envelope"></span>   <?php echo $email; ?>
		 </div>
		<div class="col-lg-2 col-lg-offset-4">
		<?php if($image!=null){ ?>
		<img src="img/<?php echo $image; ?>"  height="280" width="253" style="margin-top:1em"/>
		<?php } else {?>
		<img src="img/default-user.png" height="280" width="253" style="margin-top:1em" />
	
		<?php } ?>
		
		
		</div>
		</div>	
		
		
		<div class="row">
		
		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Social Media</h3>
  </div>
  <div class="panel-body">

<a href="<?php echo $facebook; ?>" target="_blank"><img src="img/fb.png"/></a>

  </div>
</div>
		
		
		</div>
		
		<div class="row">
		
		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Lawyers</h3>
  </div>
  <div class="panel-body">
    MLMW Lawyers
  </div>
</div>
		
		</div>
		
		
		<div class="row">
		
		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Location</h3>
  </div>
  <div class="panel-body">
<img src="img/location.jpg" />
  </div>
</div>
		
		</div>
<?php
echo "client Full Profile";

} else {
$id=$_SESSION['lawyer_id']; 
$clients_set=lawyer_clients($id);
while ($row=mysqli_fetch_assoc($clients_set)){
// out put data from each row
//echo $client_id=$row['cliens_client_id'];
$client_id=$row['clients_client_id'];
$client_name=$row['name'];

$address=$row['address'];

 $phone=$row['phone'];
 $email=$row['email'];
 $facebook=$row['facebook'];
$image=$row['image'];
 $city=$row['city'];
 $country=$row['country'];
"$client_name<hr/>";
?>

<!--clients short profile start-->

<style>
#ff {
margin-top:2em;
}
</style>

<div class="row"> 
	<div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-2 col-xs-offset-1">
	<?php if($image!=null){ ?>
		<img src="img/<?php echo $image; ?>"  height="280" width="200" style="margin-top:1em"/>
		<?php } else {?>
		<img src="img/default-user.png" height="280" width="200" style="margin-top:1em" />
	
		<?php } ?>
		
	</div>
	<div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-2 col-xs-offset-1">
	<h1><?php echo $client_name; ?></h1>

	Address:<br/><?php echo $address; ?><br />

Phone:   <?php echo $phone; ?> <br />
Email: <?php echo $email; ?> <br />
Social: <a href="<?php $facebook ?>" target="_blank"><img src="img/fb.png" /></a> <br />
<p><a class="btn btn-info " href="mlmw_lawyer.php?clients=clients&cfp=cfp&client_id=<?php echo $client_id ?>">
                <i class="glyphicon glyphicon-user icon-white">
View-Profile</i></a> <a class="btn btn-success" href="mlmw_lawyer.php?message=message&nmsg=nmsg">
                <i class="glyphicon glyphicon-envelope icon-white"> Send-Message</i></a></p>
				
	</div>
	</div>
	<hr />
<?php
}//loop completed
}// else completed
?>