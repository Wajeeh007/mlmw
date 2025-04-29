<?php require_once("./includes/db_connection.php") 	?>
<?php require_once("./includes/functions.php") 	?>
<?php 
 $lawyer_set=find_all_lawyers();
 ?>
 <?php
 // 3. Use returned data (if any)
 while ($lawyers=mysqli_fetch_assoc($lawyer_set)) {
 // out put data from each row
 $lawyer_id=$lawyers['lawyer_id'];
 
 $name=$lawyers['name'];

 $address=$lawyers['address'];

 $phone=$lawyers['phone'];
 $email=$lawyers['email'];
 $facebook=$lawyers['facebook'];

 $twitter=$lawyers['twitter'];
 $google=$lawyers['google_plus'];
 $image=$lawyers['image'];
?>


<!--lawyer profile start-->
 <!-- team start-->
<style>
#ff {
margin-top:2em;
}


</style>
	
	<div class="row"> 
	<div class="col-md-2 col-md-offset-3 col-sm-2 col-sm-offset-2 col-xs-offset-1">
	<?php if($image != null){ ?>
	<img src="img/<?php echo $image ?>" class="img-rounded" id="ff" height="250px" width="250px"/>
	<?php } else { ?>
	<img src="img/default-user.png" height="280" width="253" style="margin-top:1em" />
	<?php }?>
	</div>
	<div class="col-md-5 col-md-offset-1 col-sm-5 col-sm-offset-2 col-xs-offset-1">
	<h1><?php echo $name; ?></h1>

	Address:<br/><?php echo $address; ?><br />
Phone:   <?php echo $phone; ?> <br />
Email: <?php echo $email; ?> <br />
Social:<br /> <a href="<?php echo $facebook ?>" target="_blank"><img src="img/fb.png" /></a> 
        <a href="<?php echo $twitter ?>" target="_blank"><img src="img/twitter.png" /></a>
		<a href="<?php echo $google ?>" target="_blank"> <img src="img/google.png" /></a><br />
	</div>
	</div>
	<hr />
	 
 <?php 

 }
 ?>
 <?php 
 // 4. Release the returned data
 mysqli_free_result($lawyer_set);
 ?>


