<?php
// Connect to the database
require_once("includes/config.php");

// Query to get the team members
$query = "SELECT * FROM team ORDER BY id LIMIT 4";
$result = mysqli_query($con, $query);
?>

<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
    <?php 
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="bg-white rounded-lg shadow-md p-6 text-center transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
        <div class="relative w-32 h-32 rounded-full overflow-hidden mx-auto mb-6">
            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" class="w-full h-full object-cover">
        </div>
        <h4 class="text-xl font-serif font-bold mb-2"><?php echo htmlspecialchars($row['name']); ?></h4>
        <p class="text-primary mb-4"><?php echo htmlspecialchars($row['position']); ?></p>
        <p class="text-gray-600 mb-5"><?php echo htmlspecialchars($row['bio']); ?></p>
        <div class="flex justify-center space-x-3">
            <?php if(!empty($row['email'])): ?>
            <a href="mailto:<?php echo htmlspecialchars($row['email']); ?>" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition duration-300">
                <i class="fas fa-envelope"></i>
            </a>
            <?php endif; ?>
            
            <?php if(!empty($row['phone'])): ?>
            <a href="tel:<?php echo htmlspecialchars($row['phone']); ?>" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition duration-300">
                <i class="fas fa-phone-alt"></i>
            </a>
            <?php endif; ?>
            
            <?php if(!empty($row['linkedin'])): ?>
            <a href="<?php echo htmlspecialchars($row['linkedin']); ?>" target="_blank" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition duration-300">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <?php endif; ?>
            
            <?php if(!empty($row['twitter'])): ?>
            <a href="<?php echo htmlspecialchars($row['twitter']); ?>" target="_blank" class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 hover:bg-primary hover:text-white transition duration-300">
                <i class="fab fa-twitter"></i>
            </a>
            <?php endif; ?>
        </div>
    </div>
    <?php 
        }
    } else {
    ?>
    <div class="col-span-full text-center">
        <p class="text-gray-500">No team members found.</p>
    </div>
    <?php 
    }
    ?>
</div>

<div class="text-center mt-12">
    <a href="lawyers.php" class="inline-block bg-primary hover:bg-primary-dark text-white font-semibold py-3 px-8 rounded transition duration-300">
        View All Attorneys
    </a>
</div>
	