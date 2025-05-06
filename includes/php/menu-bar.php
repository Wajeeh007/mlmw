<!-- Professional Navigation Bar with Tailwind CSS -->
<!-- Tailwind CSS CDN -->
<!-- <script src="https://cdn.tailwindcss.com"></script> -->

<nav class="fixed top-0 left-0 right-0 z-50 bg-indigo-900 shadow-md">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center justify-between py-3">
            <!-- Brand/Logo -->
            <a href="index.php" class="flex items-center text-white text-xl font-semibold">
                <img src="/admin/" alt="Logo" class="w-8 h-8 mr-2">
                <span>MLMW</span>
            </a>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="md:hidden flex items-center px-3 py-2 border rounded text-gray-200 border-gray-400 hover:text-white hover:border-white">
                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                </svg>
            </button>
            
            <!-- Navigation Links -->
            <div id="navbar-menu" class="hidden md:flex md:items-center w-full md:w-auto">
                <div class="md:flex">
                    <a href="index.php" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2 mr-1">Home</a>
                    <a href="lawyers.php" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2 mr-1">Lawyers</a>
                    <a href="clients.php" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2 mr-1">Clients</a>
                    <a href="cases.php" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2 mr-1">Cases</a>
                    <a href="courts.php" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2 mr-1">Courts</a>
                    <a href="news.php" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2 mr-1">News</a>
                    <a href="mobileapp.php" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2 mr-1">Mobile App</a>
                    <a href="contactus.php" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2 mr-1">Contact Us</a>
                </div>
                
                <div class="md:flex md:ml-4">
                    <!-- Register Dropdown -->
                    <div class="relative group">
                        <button class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2">
                            Register <span class="ml-1">▼</span>
                        </button>
                        <div class="absolute right-0 hidden group-hover:block bg-white shadow-lg w-48 z-10">
                            <a href="register_lawyer.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                <i class="fas fa-user-tie mr-2"></i> Lawyer Registration
                            </a>
                            <a href="register_client.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i> Client Registration
                            </a>
                        </div>
                    </div>
                    
                    <?php require_once("includes/functions.php"); ?>

                    <!-- Dynamic Login/Account Controls based on session -->
                    <?php if(isset($_SESSION['lawyer_id'])){ ?>
                    <a href="mlmw_lawyer.php?lawyer=lawyer" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2">
                        <i class="fas fa-user-circle"></i> My Account
                    </a>
                    <a href="logout.php" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <?php } else if (isset($_SESSION['client_id'])){ ?>
                    <a href="mlmw_client.php?client=client" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2">
                        <i class="fas fa-user-circle"></i> My Account
                    </a>
                    <a href="client_logout.php" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <?php } else { ?>
                    <a href="login.php" class="block mt-4 md:inline-block md:mt-0 text-gray-200 hover:text-white hover:bg-indigo-800 px-4 py-2">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- JavaScript for mobile menu toggle -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const navbarMenu = document.getElementById('navbar-menu');
        
        mobileMenuButton.addEventListener('click', function() {
            navbarMenu.classList.toggle('hidden');
        });
    });
</script>

<!-- Spacer to prevent content from being hidden under fixed navbar -->
<div class="pt-20"></div>
		<!-- logo of MLMW 
		<div id="row">
		<div class="col col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-2">
		<img src="img/my-logo.jpg" onClick="index.php" height="165" width="170" style="margin-top:3em;"/>
		</div>
		</div>
		-->
		<div id="row">
		