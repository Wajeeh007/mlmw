<?php require_once("includes/config.php") ?>

<div class="bg-white rounded-lg shadow-lg p-6 mb-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-4 border-b pb-2">Latest News</h2>
    
    <?php 
    // Get the latest news items from the database, ordered by date
    $query = "SELECT * FROM news ORDER BY news_date DESC LIMIT 3";
    $news_set = mysqli_query($con, $query);
    
    if (!$news_set) {
        echo '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <p>Error: ' . mysqli_error($con) . '</p>
              </div>';
    } elseif (mysqli_num_rows($news_set) == 0) {
        echo '<div class="text-gray-600 italic">No news articles available at this time.</div>';
    } else {
        // Display each news item
        while ($news = mysqli_fetch_assoc($news_set)) {
            // Format the date nicely
            $formatted_date = date('M d, Y', strtotime($news['news_date']));
            
            // Display the news item
            echo '<div class="mb-6 border-b pb-4 last:border-0">';
            echo '  <a href="news_detail.php?id=' . $news['news_id'] . '" class="text-lg font-semibold text-blue-700 hover:text-blue-900 transition-colors duration-200">' . htmlspecialchars($news['news_heading']) . '</a>';
            echo '  <div class="text-sm text-gray-500 mb-2">' . $formatted_date . '</div>';
            
            // Truncate the detail text if it's too long
            $detail = $news['news_detail'];
            if(strlen($detail) > 150) {
                $detail = substr($detail, 0, 150) . '...';
            }
            
            echo '  <p class="text-gray-700">' . htmlspecialchars($detail) . '</p>';
            echo '  <a href="news_detail.php?id=' . $news['news_id'] . '" class="inline-block mt-2 text-sm text-blue-600 hover:text-blue-800 transition-colors duration-200">Read more &rarr;</a>';
            echo '</div>';
        }
    }
    
    // Release the returned data
    mysqli_free_result($news_set);
    ?>
    
    <div class="mt-4 text-right">
        <a href="news.php" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
            View All News
            <svg class="ml-2 -mr-1 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>
</div>

