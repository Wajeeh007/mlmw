
<div class="container" id="cnt1">
    <div class="row feature">
<h2 align="center"><a href="#" class="btn btn-danger btn-lg">We're here to help</a></h2>
       
			
			
<?php $team_set=our_team(); 
while ($team=mysqli_fetch_assoc($team_set)) {
$id=$team['lawyers_lawyer_id'];
$image_c=find_lawyer_image_by_lawyer_id($id);

$img=mysqli_fetch_assoc($image_c);
$image=$img['image'];


$description=$team['description'];
$result=find_lawyer_by_id($id);
$result_lawyer=mysqli_fetch_assoc($result);
$name=$result_lawyer['name'];


?>

				 <div class="col-md-4">
            <div>
			
                
				
				<?php if($image != null){ ?>
	<img src="img/<?php echo $image ?>" class="img-circle  img-rounded" height="280" width="253" style="margin-top:1em" class="img-responsive"/>
	<?php } else { ?>
	<img src="img/default-user.png" class="img-circle img-thumbnail img-rounded" height="280" width="253" style="margin-top:1em" />
	<?php }?>
				
                <h2><?php echo $name; ?></h2>
                <p><?php echo $description ?>                  
                </p>
                <a href="lawyers.php" class="btn btn-success lower" >See Full Profile</a>
            </div>
        </div>
<?php
}
?>
        
</div>
</div>
	