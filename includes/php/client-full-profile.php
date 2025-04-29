		<!-- This form will show full record of the lawyer sent by id-->
<?php include("./includes/db_connection.php"); ?>




<?php 
$id=$_SESSION['client_id'];
$query="select * from clients where client_id='$id'";
$result=mysqli_query($connection,$query);
confirm_query($result);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$phone=$row['phone'];
$facebook=$row['facebook'];

$address=$row['address'];
$city=$row['city'];
$country=$row['country'];
$image=$row['image'];
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
		
		<?php if($image != null){ ?>
	<img src="img/<?php echo $image ?>" class="img-rounded"  height="250px" width="250px" style="margin-top:1em" />
	<?php } else { ?>
	<img src="img/default-user.png" height="280" width="253" style="margin-top:1em" />
	<?php }?>
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
		
	