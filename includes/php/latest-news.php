

<?php require_once("./includes/db_connection.php") 	?>
<?php require_once("./includes/functions.php") 	?>

 <?php 
 $news_set=find_news();
 ?>
 <?php
 // 3. Use returned data (if any)
 while ($news=mysqli_fetch_assoc($news_set)) {
 // out put data from each row
 
 print "<font size=4><a href=\"news.php\"><ul><li>".$news['news_heading']."</a></font>" . "&nbsp; &nbsp;";
print $news['news_date'] . "</li></ul><BR>";
print "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;".$news['news_detail'] . "<BR><hr />";
 }
 ?>
 <?php 
 // 4. Release the returned data
 mysqli_free_result($news_set);
 ?>
 

