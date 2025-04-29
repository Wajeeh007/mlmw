<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>MLMW LogIn</title>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.js"></script>
</head>

<body id="login">
    <div class="container">
        <!--row1 navigation-->
        <div id="row">
            <?php include("includes/php/menu-bar.php"); ?>
        </div>
        <!--row1 end -->

        <!-- news jumbotron -->
        <?php include("includes/php/login-jumbotron.php"); ?>
        <!-- news jumbotron end -->

        <!-- login form start-->
        <div class="row">
            <?php include("includes/php/login-form.php"); ?>
        </div>
        <!-- login form end-->

        <!-- footer start -->
        <?php include("includes/php/footer.php"); ?>
        <!-- footer end -->
    </div>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
