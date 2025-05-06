<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>MLMW Lawyers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<!-- Favicon -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#1a365d',
                            dark: '#0d2240',
                        }
                    },
                    fontFamily: {
                        serif: ['Libre Baskerville', 'serif'],
                        sans: ['Open Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body class="font-sans bg-primary-dark text-white leading-relaxed">
    <!-- Navigation -->
    <div class="bg-primary-dark">
        <div class="w-full">
            <div class="mb-4">
                <?php include("includes/php/menu-bar.php"); ?>
            </div>

            <!-- Hero Section - Styled to match screenshot -->
            <div class="shadow-lg mb-8 mx-0 bg-gradient-to-r from-primary-dark to-blue-500">
                <div class="px-8 py-12 relative">
                    <div class="flex flex-col md:flex-row items-center justify-between">
                        <div class="w-full md:w-2/3 text-white z-10">
                            <h1 class="text-3xl md:text-4xl font-serif font-bold mb-6">Expert Lawyers, Trusted Guide</h1>
                            <div class="w-16 h-1 bg-white mb-6"></div>
                            <p class="text-lg text-blue-100 mb-8 max-w-2xl leading-relaxed">
                                Find the legal expertise you need with our exceptional team of attorneys. Our lawyers are specialized in various practice areas to provide you with the best legal representation.
                            </p>
                            <a href="contactus.php" class="inline-block bg-white text-blue-800 font-semibold px-6 py-3 rounded hover:bg-gray-100 transition duration-300">
                                Contact Us Today
                            </a>
                        </div>
                        <div class="w-full md:w-1/3 mt-8 md:mt-0 flex justify-center md:justify-end">
                            <div class="bg-white rounded-full shadow-xl overflow-hidden">
                                <img src="img/law19.png" alt="Legal Experts" class="h-40 w-40  object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white text-gray-800">
        <div class="w-full">
            <div class="py-8 px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-serif font-bold mb-8 relative inline-block">
                        Best Lawyers Around the Globe
                        <div class="w-20 h-1 bg-primary absolute left-1/2 transform -translate-x-1/2 bottom-[-10px]"></div>
                    </h2>
                    <p class="text-gray-600 text-lg max-w-3xl mx-auto mt-8">
                        Discover the most trusted legal experts from every corner of the world, providing exceptional legal services.
                    </p>
                </div>

                <!-- Lawyers Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-12 px-4 lg:px-8">
                    <!-- <?php include("includes/php/lawyer-short-profile.php"); ?> -->
                </div>
                
                <!-- Call to Action -->
                <div class="mt-16 bg-blue-50 rounded-lg shadow-lg p-8 text-center mx-4 lg:mx-8">
                    <h2 class="text-2xl font-serif font-bold text-primary-dark mb-4">Need Legal Assistance?</h2>
                    <p class="text-gray-600 mb-6">Our team of experienced lawyers is ready to help you with any legal challenge.</p>
                    <a href="contactus.php" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition duration-300 transform hover:scale-105">
                        Schedule a Consultation
                    </a>
                </div>
            </div>

            <!-- Subscribe for news -->
            <div class="bg-gray-100 py-12 px-4 my-0">
                <?php include("includes/php/news-letter.php"); ?>
            </div>
        </div>
    </div>

    <!-- Footer start -->
    <footer class="bg-primary-dark mt-0 pt-12 pb-6 text-white">
        <div class="w-full">
            <?php include("includes/php/footer.php"); ?>
        </div>
    </footer>
    <!-- Footer end -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <!-- Fix any connection issue messages -->
    <script>
        // Hide any "Connection successful" messages that might be visible
        document.addEventListener('DOMContentLoaded', function() {
            const connectionMessages = document.querySelectorAll(':contains("Connection successful")');
            connectionMessages.forEach(element => {
                if (element.textContent.trim() === 'Connection successful!') {
                    element.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
