<?php include("./includes/db_connection.php"); ?>
<?php require_once("./includes/functions.php") 	?>

<?php echo "<h1>My Lawyers</h1><br/>" ?>
<?php 
// lfp means lawyer full profile
if(isset($_GET['lfp'])){
$lawyer_id=$_GET['lawyer_id'];
$query="select * from lawyers where lawyer_id='$lawyer_id'";
$result=mysqli_query($connection,$query);
confirm_query($result);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$password=$row['password'];
$experience=$row['experience'];
$school=$row['law_school'];
$practise=$row['practise_areas'];
$phone=$row['phone'];
$fax=$row['fax'];
$facebook=$row['facebook'];
$twitter=$row['twitter'];
$google=$row['google_plus'];
$website=$row['website'];
$languages=$row['languages'];
$address=$row['address'];
$city=$row['city'];
$image=$row['image'];
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
		<img src="img/<?php echo $image; ?>"  height="300" width="253" style="margin-top:1em"/>
		<?php } else {?>
		<img src="img/default-user.png" height="300" width="253" style="margin-top:1em" />
	
		<?php } ?>
		
		
		
		</div>
		</div>	
		
		<div class="row">
		
		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">School</h3>
  </div>
  <div class="panel-body">
    <?php echo $school; ?>
  </div>
</div>
		
		
		</div>
		<div class="row">
		
		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Experience</h3>
  </div>
  <div class="panel-body">
    <?php echo $experience; ?>
  </div>
</div>
		
		
		</div>
		
		<div class="row">
		
		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Practise Areas</h3>
  </div>
  <div class="panel-body">
    <?php echo $practise; ?>
  </div>
</div>
		
		
		</div>
		<div class="row">
		
		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Languages</h3>
  </div>
  <div class="panel-body">
   <?php echo $languages; ?>
  </div>
</div>
		
		
		</div>
		
		<div class="row">
		
		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Social Media</h3>
  </div>
  <div class="panel-body">

<a href="<?php echo $facebook; ?>" target="_blank"><img src="img/fb.png"/></a>
<a href="<?php echo $twitter; ?>" target="_blank"><img src="img/twitter.png" /></a>
<a href="<?php echo $google; ?>" target="_blank"><img src="img/google.png" /></a>

  </div>
</div>
		
		
		</div>
		<div class="row">
		
		
		
		
		
		
		<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Website</h3>
  </div>
  <div class="panel-body">
    <a href="<?php echo $website; ?>">Link</a>
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
		
	
<?php // lawyer full profile coding ends here

// Lawyer Short Profile Coding Strats From here
} else {
$id=$_SESSION['client_id'];
 
$lawyers_set=client_lawyers($id);
while ($row=mysqli_fetch_assoc($lawyers_set)){
// out put data from each row

$lawyer_id=$row['lawyer_id'];
$result=find_lawyer_by_id($lawyer_id);
$data=mysqli_fetch_assoc($result);
$lawyer_name=$data['name'];

$address=$data['address'];

 $phone=$data['phone'];
 $email=$data['email'];
 $facebook=$data['facebook'];
 $image=$data['image'];
 $city=$data['city'];
 $country=$data['country'];

?>

<!--lawyers short profile start-->

<style>
#ff {
margin-top:2em;
}
</style>

<div class="row"> 
	<div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-2 col-xs-offset-1">
	
	<?php if($image!=null){ ?>
		<img src="img/<?php echo $image; ?>"  height="260" width="200" style="margin-top:1em"/>
		<?php } else {?>
		<img src="img/default-user.png" height="260" width="200" style="margin-top:1em" />
	
		<?php } ?>
	
	</div>
	<div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-2 col-xs-offset-1">
	<h1><?php echo $lawyer_name; ?></h1>

	Address:<br/><?php echo $address; ?><br />

Phone:   <?php echo $phone; ?> <br />
Email: <?php echo $email; ?> <br />
Social: <a href="<?php $facebook ?>" target="_blank"><img src="img/fb.png" /></a> <br />
<p><a class="btn btn-info " href="mlmw_client.php?lawyers=lawyers&lfp=lfp&lawyer_id=<?php echo $lawyer_id ?>">
                <i class="glyphicon glyphicon-user icon-white">
View-Profile</i></a> <a class="btn btn-success" href="mlmw_client.php?message=message&nmsg=nmsg">
                <i class="glyphicon glyphicon-envelope icon-white"> Send-Message</i></a></p>
				
	</div>
	</div>
	<hr />
<?php
}//loop completed
}// else completed
?>