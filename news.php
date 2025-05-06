<?php
require_once("includes/config.php");

// Set up pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$records_per_page = 5;
$offset = ($page - 1) * $records_per_page;

// Count total records for pagination
$count_query = "SELECT COUNT(*) as total FROM news";
$count_result = mysqli_query($con, $count_query);
$total_rows = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total_rows / $records_per_page);

// Fetch the news articles with pagination
$query = "SELECT * FROM news ORDER BY news_date DESC LIMIT $offset, $records_per_page";
$result = mysqli_query($con, $query);

// Set page title
$page_title = "News | My Lawyer My Way";

// Include header
include("includes/php/header.php");
?>

<div class="container mx-auto px-4 py-8">
    <div class="max-w-5xl mx-auto">
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
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">News</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Latest News</h1>
            <p class="mt-2 text-gray-600">Stay updated with the latest legal insights and company announcements</p>
        </div>

        <!-- News Articles -->
        <div class="space-y-8">
            <?php
            if (!$result || mysqli_num_rows($result) == 0) {
                echo '<div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">No news articles found at this time.</p>
                            </div>
                        </div>
                    </div>';
            } else {
                while ($news = mysqli_fetch_assoc($result)) {
                    // Format the date nicely
                    $formatted_date = date('F d, Y', strtotime($news['news_date']));
                    
                    // Truncate the detail text if it's too long
                    $detail = $news['news_detail'];
                    if(strlen($detail) > 200) {
                        $detail = substr($detail, 0, 200) . '...';
                    }
            ?>
            <article class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="md:flex">
                    <?php if (!empty($news['news_image'])): ?>
                    <div class="md:flex-shrink-0">
                        <img class="h-48 w-full object-cover md:w-48" src="<?php echo htmlspecialchars($news['news_image']); ?>" alt="<?php echo htmlspecialchars($news['news_heading']); ?>">
                    </div>
                    <?php else: ?>
                    <div class="md:flex-shrink-0 h-48 w-full md:w-48 bg-primary flex flex-col items-center justify-center text-white">
                        <div class="text-3xl mb-2"><i class="fas fa-newspaper"></i></div>
                        <div class="text-xs text-center px-2">Legal News</div>
                    </div>
                    <?php endif; ?>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-1">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span><?php echo $formatted_date; ?></span>
                            
                            <?php if (!empty($news['news_author'])): ?>
                            <span class="mx-2">•</span>
                            <span><?php echo htmlspecialchars($news['news_author']); ?></span>
                            <?php endif; ?>
                        </div>
                        <a href="news_detail.php?id=<?php echo $news['news_id']; ?>" class="block">
                            <h2 class="text-xl font-semibold text-gray-900 hover:text-blue-600 transition-colors duration-200"><?php echo htmlspecialchars($news['news_heading']); ?></h2>
                        </a>
                        <p class="mt-2 text-gray-600"><?php echo htmlspecialchars($detail); ?></p>
                        <div class="mt-4">
                            <a href="news_detail.php?id=<?php echo $news['news_id']; ?>" class="text-blue-600 hover:text-blue-800 transition-colors duration-200 inline-flex items-center">
                                Read more
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </article>
            <?php
                }
            }
            ?>
        </div>

        <!-- Pagination -->
        <?php if ($total_pages > 1): ?>
        <div class="mt-8 flex justify-center">
            <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <?php endif; ?>
                
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium <?php echo $i == $page ? 'text-blue-600 bg-blue-50' : 'text-gray-700 hover:bg-gray-50'; ?>">
                    <?php echo $i; ?>
                </a>
                <?php endfor; ?>
                
                <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <?php endif; ?>
            </nav>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php
// Include footer
include("includes/php/footer.php");

// Free the results
mysqli_free_result($result);
mysqli_free_result($count_result);
?>
