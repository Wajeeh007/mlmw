<!doctype html> 
<html>
<head>
    <meta charset="utf-8">
    <title>My Lawyer My Way</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.js"></script>
</head>

<body id="Home">
<div class="container">  
    <!-- Row1 Menubar -->
    <div id="row">
        <?php include("includes/php/menu-bar.php"); ?>
    </div>
    <!-- Menubar row end -->

    <!-- Start row slider -->
    <?php include("includes/php/slider.php"); ?>
    <!-- End row slider -->

    <!-- Search form area -->
    <div class="row">
    </div>
    <!-- End row -->

    <!-- Row welcome message and news -->
    <div class="row">
        <article class="col-lg-8 col-sm-7">
            <?php include("includes/php/welcome-article.php"); ?>
        </article>
        <aside class="col-lg-3 col-lg-offset-1 col-sm-4 col-sm-offset-1">
            <?php include("includes/php/search-box.php"); ?>
            <?php include("includes/php/news.php"); ?>
        </aside>
    </div>
    <!-- End row welcome message and news -->

    <!-- Team start -->
    <?php include("includes/php/our-team.php"); ?>
    <!-- Team end -->

    <!-- Contact us form and mobile start -->
    <div class="row">
        <?php include("includes/php/contactus-mobile.php"); ?>
    </div>
    <!-- Contact us form and mobile end -->

    <!-- Newsletter start -->
    <div class="row">
        <?php include("includes/php/news-letter.php"); ?>
    </div>
    <!-- Newsletter end -->

    <!-- Footer area start -->
    <?php include("includes/php/footer.php"); ?>
    <!-- Footer area end -->

</div>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
