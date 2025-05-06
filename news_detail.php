<?php
require_once("includes/config.php");

// Get the news ID from the URL
$news_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// If no ID is provided or ID is invalid, redirect to home page
if ($news_id <= 0) {
    header("Location: index.php");
    exit;
}

// Fetch the news article
$query = "SELECT * FROM news WHERE news_id = $news_id";
$result = mysqli_query($con, $query);

// If the article doesn't exist, redirect to home page
if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: index.php");
    exit;
}

// Get the article data
$news = mysqli_fetch_assoc($result);

// Format the date nicely
$formatted_date = date('F d, Y', strtotime($news['news_date']));

// Page title
$page_title = $news['news_heading'] . " | My Lawyer My Way";

// Include header
include("includes/php/header.php");
?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-4xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="flex py-3 text-gray-700 border-b border-gray-200 mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="news.php" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2">News</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 truncate max-w-xs"><?php echo htmlspecialchars($news['news_heading']); ?></span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Article -->
        <article class="bg-white rounded-lg shadow-lg overflow-hidden">
            <?php if (!empty($news['news_image'])): ?>
            <div class="w-full h-64 md:h-96 bg-gray-300 overflow-hidden">
                <img src="<?php echo htmlspecialchars($news['news_image']); ?>" alt="<?php echo htmlspecialchars($news['news_heading']); ?>" class="w-full h-full object-cover">
            </div>
            <?php else: ?>
            <div class="w-full h-64 md:h-96 bg-primary flex flex-col items-center justify-center text-white">
                <div class="text-6xl mb-4"><i class="fas fa-newspaper"></i></div>
                <div class="text-2xl font-serif font-bold"><?php echo htmlspecialchars($news['news_heading']); ?></div>
            </div>
            <?php endif; ?>

            <div class="p-6 md:p-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4"><?php echo htmlspecialchars($news['news_heading']); ?></h1>
                
                <div class="flex items-center text-gray-500 text-sm mb-6">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span><?php echo $formatted_date; ?></span>
                    
                    <?php if (!empty($news['news_author'])): ?>
                    <span class="mx-2">•</span>
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span><?php echo htmlspecialchars($news['news_author']); ?></span>
                    <?php endif; ?>
                </div>
                
                <div class="prose max-w-none">
                    <?php 
                    // Display the news content with proper line breaks
                    echo nl2br(htmlspecialchars($news['news_detail'])); 
                    ?>
                </div>
            </div>
        </article>

        <!-- Back to news link -->
        <div class="mt-8 text-center">
            <a href="index.php" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Home
            </a>
        </div>
    </div>
</div>

<?php
// Include footer
include("includes/php/footer.php");

// Free the result
mysqli_free_result($result);
?> 