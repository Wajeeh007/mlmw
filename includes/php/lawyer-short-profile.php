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

<!-- Lawyer Card with Tailwind CSS - Professionally Styled -->
<div class="lawyer-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300">
    <div class="relative">
        <?php if($image != null){ ?>
            <img src="img/<?php echo $image ?>" alt="<?php echo $name ?>" class="w-full h-64 object-cover object-center capitalize">
        <?php } else { ?>
            <img src="img/default-user.png" alt="Default Profile" class="w-full h-64 object-cover object-center capitalize">
        <?php }?>
        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-gray-900 opacity-70 h-24"></div>
        <div class="absolute bottom-3 left-4 text-white">
            <h3 class="text-xl font-bold capitalize"><?php echo $name; ?></h3>
        </div>
    </div>
    
    <div class="p-6">
        <!-- <div class="mb-4 text-gray-600 text-sm space-y-2">
            <p class="flex items-start">
                <span class="text-primary-custom mt-1 mr-2">
                    <i class="fas fa-map-marker-alt"></i>
                </span>
                <span><?php echo $address; ?></span>
            </p>
            <p class="flex items-start">
                <span class="text-primary-custom mt-1 mr-2">
                    <i class="fas fa-phone"></i>
                </span>
                <span><?php echo $phone; ?></span>
            </p>
            <p class="flex items-start">
                <span class="text-primary-custom mt-1 mr-2">
                    <i class="fas fa-envelope"></i>
                </span>
                <span><?php echo $email; ?></span>
            </p>
        </div> -->
        
        <!-- <div class="flex space-x-3 mb-5 border-t pt-4">
            <?php if(!empty($facebook)): ?>
                <a href="<?php echo $facebook ?>" target="_blank" class="text-blue-600 hover:text-blue-800">
                    <i class="fab fa-facebook-f"></i>
                </a>
            <?php endif; ?>
            <?php if(!empty($twitter)): ?>
                <a href="<?php echo $twitter ?>" target="_blank" class="text-blue-400 hover:text-blue-600">
                    <i class="fab fa-twitter"></i>
                </a>
            <?php endif; ?>
            <?php if(!empty($google)): ?>
                <a href="<?php echo $google ?>" target="_blank" class="text-red-600 hover:text-red-800">
                    <i class="fab fa-google-plus-g"></i>
                </a>
            <?php endif; ?>
        </div> -->
        
        <a href="lawyer_detail.php?id=<?php echo $lawyer_id; ?>" class="inline-block w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition duration-300 text-center">
            View Profile
        </a>
    </div>
</div>

<?php 

 }
 ?>
 <?php 
 // 4. Release the returned data
 mysqli_free_result($lawyer_set);
 ?>


