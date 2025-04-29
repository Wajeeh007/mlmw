<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>MLMW News</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.js"></script>
</head>

<body id="news">
<div class="container">

    <!--row1 navigation-->
    <div class="row">
        <?php include("includes/php/menu-bar.php"); ?>
    </div>
    <!--row1 end -->

    <!-- news jumbotron -->
    <?php include("includes/php/news-jumbotron.php"); ?>
    <!-- news jumbotron end -->

    <!--latest news start-->
    <marquee direction="left" scrollamount="3">
        <img src="img/news-animation.gif">&nbsp;&nbsp;
        latest news and breaking news about Pakistan, world, sports, cricket, education, lifestyle; opinion&nbsp;&nbsp;
        <img src="img/news-animation.gif">&nbsp;&nbsp;
        latest news and breaking news about Pakistan, world, sports, cricket, education, lifestyle; opinion&nbsp;&nbsp;
        <img src="img/news-animation.gif">&nbsp;&nbsp;
        latest news and breaking news about Pakistan, world, sports, cricket, education, lifestyle; opinion
    </marquee>

    <h1 style="color: red">
        <div class="glyphicon glyphicon-arrow-down"></div>
        <b>Latest News</b>
    </h1>  
    <hr />

    <div class="row">
        <?php include("includes/php/latest-news.php"); ?>
    </div>
    <!--latest news end-->

    <!-- subscribe for news -->
    <?php include("includes/php/news-letter.php"); ?>
    <!-- subscribe for news end -->

    <!-- footer start -->
    <?php include("includes/php/footer.php"); ?>
    <!-- footer end -->

</div>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
