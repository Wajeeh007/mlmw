<footer class="bg-primary-dark text-white pt-16 pb-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <!-- About Column -->
            <div>
                <h5 class="text-xl font-serif font-bold mb-6">About Us</h5>
                <a href="index.php" class="inline-block mb-6">
                    <img src="img/footer-logo.png" alt="My Lawyer My Way" class="h-10">
                </a>
                <p class="text-gray-300 mb-6">
                    My Lawyer My Way comprises a distinguished group of commercial law firms across the globe committed to providing excellent legal services.
                </p>
                <div class="flex space-x-3">
                    <a href="#" class="w-9 h-9 rounded-full bg-white bg-opacity-10 flex items-center justify-center hover:bg-white hover:text-primary-dark transition duration-300">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white bg-opacity-10 flex items-center justify-center hover:bg-white hover:text-primary-dark transition duration-300">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white bg-opacity-10 flex items-center justify-center hover:bg-white hover:text-primary-dark transition duration-300">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-full bg-white bg-opacity-10 flex items-center justify-center hover:bg-white hover:text-primary-dark transition duration-300">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            
            <!-- Contact Info Column -->
            <div>
                <h5 class="text-xl font-serif font-bold mb-6">Contact Info</h5>
                <ul class="space-y-4">
                    <li class="flex">
                        <i class="fas fa-map-marker-alt mt-1 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">1234 Legal Street, Suite 500<br>New York, NY 10001</span>
                    </li>
                    <li class="flex">
                        <i class="fas fa-phone-alt mt-1 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">+1 (555) 123-4567</span>
                    </li>
                    <li class="flex">
                        <i class="fas fa-envelope mt-1 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">info@mylawyermyway.com</span>
                    </li>
                    <li class="flex">
                        <i class="fas fa-clock mt-1 mr-3 text-gray-400"></i>
                        <span class="text-gray-300">Mon-Fri: 9:00 AM - 5:00 PM</span>
                    </li>
                </ul>
            </div>
            
            <!-- Quick Links Column -->
            <div>
                <h5 class="text-xl font-serif font-bold mb-6">Quick Links</h5>
                <ul class="space-y-3">
                    <li><a href="index.php" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">Home</a></li>
                    <li><a href="about.php" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">About Us</a></li>
                    <li><a href="lawyers.php" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">Our Lawyers</a></li>
                    <li><a href="practice-areas.php" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">Practice Areas</a></li>
                    <li><a href="cases.php" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">Cases</a></li>
                    <li><a href="news.php" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">News</a></li>
                    <li><a href="contactus.php" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">Contact Us</a></li>
                </ul>
            </div>
            
            <!-- Practice Areas Column -->
            <div>
                <h5 class="text-xl font-serif font-bold mb-6">Practice Areas</h5>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">Corporate Law</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">Family Law</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">Civil Litigation</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">Criminal Defense</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">Real Estate Law</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition duration-300 inline-block pl-4 border-l-2 border-primary">Intellectual Property</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Divider -->
        <div class="border-t border-gray-700 pt-6">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    &copy; <?php echo date("Y"); ?> My Lawyer My Way. All Rights Reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition duration-300">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition duration-300">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition duration-300">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to top button -->
<a href="#" id="back-to-top" class="fixed bottom-6 right-6 w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center shadow-lg transform transition duration-300 hover:bg-primary-dark hover:scale-110 z-50 hidden">
    <i class="fas fa-chevron-up"></i>
</a>

<script>
    // Back to top button functionality
    document.addEventListener('DOMContentLoaded', function() {
        var backToTopButton = document.getElementById('back-to-top');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.remove('hidden');
            } else {
                backToTopButton.classList.add('hidden');
            }
        });
        
        backToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({top: 0, behavior: 'smooth'});
        });
    });
</script>

<?php
if(isset($connection)){
    mysqli_close($connection);
}
?>