<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>MLMW Mobile App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.js"></script>
</head>

<body id="MobileApp">
<div class="container">

    <!--row1 menubar-->
    <div class="row">
        <?php include("includes/php/menu-bar.php"); ?>
    </div>
    <!--menubar row end -->

    <!--slider area (future)-->
    <div class="row">
        <!-- slider code can go here later -->
    </div>
    <!--end slider row-->

    <!--jumbotron area-->
    <div class="row">
        <?php include("includes/php/mobile-app-jumbotron.php"); ?>
    </div>

    <!--contact us form and mobile app features-->
    <div class="row">
        <?php include("includes/php/mobile-body.php"); ?>
    </div>

    <!--footer area-->
    <?php include("includes/php/footer.php"); ?>

</div>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
