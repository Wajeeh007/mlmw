<!--latest news start-->
<div class="bg-primary">
<h3 style="color:#ffffFF" align="center"><div class="glyphicon glyphicon-arrow-down"></div> <b>Latest News</b></h3>
</div>
<hr />  

<div class="row">
<marquee direction="up" scrollamount="1">

<?php require_once("./includes/db_connection.php") 	?>
<?php require_once("./includes/functions.php") 	?>

 <?php 
 $news_set=find_news();
 ?>
 <?php
 // 3. Use returned data (if any)
 while ($news=mysqli_fetch_assoc($news_set)) {
 // out put data from each row
 ?>
 <div class="media">
 <div class="media-body">
 <?php
 $news_heading=$news['news_heading'];
  $news_date=$news['news_date'];
 $news_detail=$news['news_detail'] ;

?>

 <h4 class="media-heading"><a href="news.php"><?php echo $news_heading ?></a></h4>
    <?php echo $news_date ?><br />
	<?php echo $news_detail ?>
	
  </div>
  <a href="news.php"><button type="button" class="btn btn-success">View Detail <span class="glyphicon glyphicon-chevron-right"> </span></button></a><hr/> 	
</div>
<?php 
 }
 
 ?>
 
 <?php 
 // 4. Release the returned data
 mysqli_free_result($news_set);
 ?>
 

  
    
</marquee>
</div>
	<!--latest news end-->