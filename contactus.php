<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>MLMW Contact-Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.js"></script>
</head>

<body id="ContactUs">
<div class="container">

    <!--menubar-->
    <div class="row">
        <?php include("includes/php/menu-bar.php"); ?>
    </div>

    <!--contact us jumbotron-->
    <?php include("includes/php/contactus-jumbotron.php"); ?>

    <!--contact us form-->
    <div class="row">
        <?php include("includes/php/contactus-contactusform-address.php"); ?>
    </div>

    <!--google map-->
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            function init_map1() {
                var myLocation = new google.maps.LatLng(38.885516, -77.09327200000001);
                var mapOptions = { center: myLocation, zoom: 16 };
                var marker = new google.maps.Marker({
                    position: myLocation,
                    title: "Property Location"
                });
                var map = new google.maps.Map(document.getElementById("map1"), mapOptions);
                marker.setMap(map);
            }
            init_map1();
        });
    </script>

    <!--Map styling-->
    <style>
        .map { min-width: 300px; min-height: 300px; width: 100%; height: 100%; }
        .header { background-color: #F5F5F5; color: #36A0FF; height: 70px; font-size: 27px; padding: 10px; }
    </style>

    <!--newsletter form-->
    <div class="row">
        <?php include("includes/php/news-letter.php"); ?>
    </div>

    <hr />

    <!--footer-->
    <?php include("includes/php/footer.php"); ?>

</div>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
