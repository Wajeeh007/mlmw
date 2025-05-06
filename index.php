<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Lawyer My Way | Professional Legal Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My Lawyer My Way - Professional legal services and representation">
    
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

<body class="font-sans text-gray-800 leading-relaxed">
    <!-- Navigation -->
    <?php include("includes/php/menu-bar.php"); ?>
    
    <!-- Hero Section -->
    <section class="relative h-screen min-h-[600px] bg-black overflow-hidden">
        <!-- Background Image with Zoom Animation -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat scale-100 animate-[zoom_20s_ease-in-out_infinite_alternate]" 
             style="background-image: url('img/law2.jpg');">
            <style>
                @keyframes zoom {
                    0% { transform: scale(1); }
                    100% { transform: scale(1.1); }
                }
            </style>
        </div>
        
        <!-- Dark Overlay -->
        <div class="absolute inset-0 bg-black bg-opacity-60 z-10"></div>
        
        <!-- Hero Content -->
        <div class="absolute inset-0 flex items-center justify-center z-20 px-4">
            <div class="text-center text-white">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold mb-6">Professional Legal Services</h1>
                <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">Dedicated to providing excellent legal representation with a focus on your needs</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="contactus.php" class="inline-block bg-primary hover:bg-primary-dark text-white font-semibold uppercase tracking-wider py-4 px-8 rounded transition duration-300">Get a Consultation</a>
                    <a href="lawyers.php" class="inline-block bg-transparent border-2 border-white text-white font-semibold uppercase tracking-wider py-4 px-8 rounded hover:bg-white hover:text-primary transition duration-300">Our Lawyers</a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-12">
                <div class="lg:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-serif font-bold mb-6">Welcome to My Lawyer My Way</h2>
                    <p class="text-xl text-gray-600 mb-6">A distinguished group of commercial law firms committed to excellence.</p>
                    <p class="mb-4">My Lawyer My Way comprises a distinguished group of commercial law firms across the globe and we are adding new excellent firms each year.</p>
                    <p class="mb-6">Our focus is on providing excellent service to our clients, and ensuring they have access to the best legal advice across the world for their international transactions. The My Lawyer My Way highlights the fact that we know and have worked with each other, we meet regularly to discuss matters of interest and new legal developments, and can provide a personalised service to our clients in other jurisdictions.</p>
                    <a href="#" class="inline-block bg-primary hover:bg-primary-dark text-white font-semibold py-3 px-6 rounded transition duration-300">Learn More About Us</a>
                </div>
                <div class="lg:w-1/2">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-white rounded-lg shadow-lg p-8 text-center transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                            <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center text-primary text-3xl mx-auto mb-6">
                                <i class="fas fa-balance-scale"></i>
                            </div>
                            <h4 class="text-xl font-serif font-bold mb-3">Experienced</h4>
                            <p class="text-gray-600">Our attorneys have decades of combined legal experience.</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-8 text-center transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                            <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center text-primary text-3xl mx-auto mb-6">
                                <i class="fas fa-gavel"></i>
                            </div>
                            <h4 class="text-xl font-serif font-bold mb-3">Dedicated</h4>
                            <p class="text-gray-600">We are committed to achieving the best results for our clients.</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-8 text-center transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                            <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center text-primary text-3xl mx-auto mb-6">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h4 class="text-xl font-serif font-bold mb-3">Trusted</h4>
                            <p class="text-gray-600">Known for our integrity and professional approach.</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-lg p-8 text-center transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                            <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center text-primary text-3xl mx-auto mb-6">
                                <i class="fas fa-globe"></i>
                            </div>
                            <h4 class="text-xl font-serif font-bold mb-3">Global Reach</h4>
                            <p class="text-gray-600">International network of legal professionals.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Practice Areas -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-bold mb-4">Our Practice Areas</h2>
                <p class="text-xl text-gray-600">Specialized legal expertise across multiple domains</p>
                <div class="w-20 h-1 bg-primary mx-auto mt-6"></div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <h4 class="text-xl font-serif font-bold mb-3">Corporate Law</h4>
                        <p class="text-gray-600 mb-4">We provide comprehensive legal services for all corporate matters, including formations, governance, and compliance.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#" class="text-primary hover:text-primary-dark font-semibold inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <h4 class="text-xl font-serif font-bold mb-3">Civil Litigation</h4>
                        <p class="text-gray-600 mb-4">Our experienced litigation team represents clients in a wide range of civil disputes and lawsuits.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#" class="text-primary hover:text-primary-dark font-semibold inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <h4 class="text-xl font-serif font-bold mb-3">Family Law</h4>
                        <p class="text-gray-600 mb-4">We handle divorce, child custody, support, and other sensitive family law matters with compassion.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#" class="text-primary hover:text-primary-dark font-semibold inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <h4 class="text-xl font-serif font-bold mb-3">Real Estate</h4>
                        <p class="text-gray-600 mb-4">Comprehensive legal services for all aspects of real estate transactions and disputes.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#" class="text-primary hover:text-primary-dark font-semibold inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <h4 class="text-xl font-serif font-bold mb-3">Criminal Defense</h4>
                        <p class="text-gray-600 mb-4">Strong and effective representation for those facing criminal charges.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#" class="text-primary hover:text-primary-dark font-semibold inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-6">
                        <h4 class="text-xl font-serif font-bold mb-3">Intellectual Property</h4>
                        <p class="text-gray-600 mb-4">Protection for your creative works, trademarks, patents, and trade secrets.</p>
                    </div>
                    <div class="px-6 pb-4">
                        <a href="#" class="text-primary hover:text-primary-dark font-semibold inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-bold mb-4">Our Legal Team</h2>
                <p class="text-xl text-gray-600">Meet our experienced attorneys</p>
                <div class="w-20 h-1 bg-primary mx-auto mt-6"></div>
            </div>
            <?php include("includes/php/our-team.php"); ?>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-5xl font-serif font-bold text-primary mb-4">500+</div>
                    <h4 class="text-xl font-semibold">Satisfied Clients</h4>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-serif font-bold text-primary mb-4">98%</div>
                    <h4 class="text-xl font-semibold">Success Rate</h4>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-serif font-bold text-primary mb-4">30+</div>
                    <h4 class="text-xl font-semibold">Expert Lawyers</h4>
                </div>
                <div class="text-center">
                    <div class="text-5xl font-serif font-bold text-primary mb-4">15+</div>
                    <h4 class="text-xl font-semibold">Years Experience</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-bold mb-4">Latest News & Updates</h2>
                <p class="text-xl text-gray-600">Stay informed with our latest articles and legal news</p>
                <div class="w-20 h-1 bg-primary mx-auto mt-6"></div>
            </div>
            <div class="flex flex-col lg:flex-row gap-12">
                <div class="lg:w-2/3">
                    <?php include("includes/php/news.php"); ?>
                </div>
                <div class="lg:w-1/3">
                    <?php include("includes/php/search-box.php"); ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="py-20 bg-primary text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-serif font-bold mb-6">Need Legal Assistance?</h2>
            <p class="text-xl mb-10 max-w-3xl mx-auto">Our team of experienced attorneys is ready to help you with your legal needs</p>
            <a href="contactus.php" class="inline-block bg-white text-primary hover:bg-gray-100 font-bold uppercase tracking-wider py-4 px-8 rounded-lg transition duration-300">Contact Us Today</a>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-20">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-serif font-bold mb-4">Get In Touch</h2>
                <p class="text-xl text-gray-600">We're here to help with any legal questions</p>
                <div class="w-20 h-1 bg-primary mx-auto mt-6"></div>
            </div>
            <div class="flex flex-wrap">
                <?php include("includes/php/contactus-mobile.php"); ?>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto text-center">
                <?php include("includes/php/news-letter.php"); ?>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include("includes/php/footer.php"); ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Add smooth scrolling
        $(document).ready(function() {
            $('a[href*="#"]:not([href="#"])').click(function() {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top - 70
                        }, 1000);
                        return false;
                    }
                }
            });
        });
    </script>
</body>
</html>
