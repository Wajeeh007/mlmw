<?php session_start(); ?>
<?php require_once("includes/functions.php"); ?>
<?php client_confirm_logged_in(); ?>

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

    <!-- row1 menubar -->
    <div class="row">
        <?php include("includes/php/menu-bar.php"); ?>
    </div>
    <!-- menubar row end -->

    <!-- Banner Image -->
    <div class="row">
        <img src="img/ban3.jpg" height="210" width="1200" style="padding-top:4em"/>
    </div>
    <!-- Banner Image end -->

    <!-- row nav+profile -->
    <div class="row">

        <div class="col-lg-3">
            <!-- aside navigation row -->
            <style> 
            .menu {
                list-style-type: none;
                margin-top: 15em;
            }
            .menu li {
                background-color: #0066FF;
                margin-bottom: 1px;
                text-align: center;
                height: 3em;
            }
            .menu li a {
                color: #FFFFFF;
                display: block;
                line-height: 3em;
            }
            </style>

            <ul class="menu"><br/>
                <li><a href="mlmw_client.php?client=client" class="active">View Profile</a></li>
                <li><a href="mlmw_client.php?edit=edit">Edit Profile</a></li>
                <li><a href="mlmw_client.php?lawyers=lawyers">Lawyers</a></li>
                <li><a href="mlmw_client.php?cases=cases">Cases</a></li>
                <li><a href="mlmw_client.php?appointments=appointments">Appointments</a></li>
                <li><a href="mlmw_client.php?message=message">Messages</a></li>
                <li><a href="client_logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="col-lg-9">
            <?php 
            if (isset($_GET['client'])) {
                include("includes/php/client-full-profile.php");
            } elseif (isset($_GET['edit'])) {
                include("includes/php/edit-client-form.php");
            } elseif (isset($_GET['lawyers'])) {
                include("includes/php/mlmw_client_lawyers.php");
            } elseif (isset($_GET['cases'])) {
                include("includes/php/mlmw_client_cases.php");
            } elseif (isset($_GET['appointments'])) {
                include("includes/php/mlmw_client_appointments.php");
            } elseif (isset($_GET['message'])) {
                echo '<img src="img/msg.jpg" align="middle" height="200">';
                include("includes/php/mlmw_client_messages.php");
            }
            ?>
        </div>

    </div><br><hr>
    <!-- row nav+profile end -->

    <!-- footer area start -->
    <div class="row">
        <div class="col-lg-12">
            <?php include("includes/php/footer.php"); ?>
        </div>
    </div>
    <!-- footer area end -->

</div>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
