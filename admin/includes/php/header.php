<?php require_once("./includes/session.php") ?>
<?php require_once("db_connection.php")?>
<?php require_once("./includes/admin-functions.php") ?>
<!-- check weather admin login or not -->
<?php confirm_logged_in(); ?>
<!-- config.php have zone information-->
<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta name="author" content="My Lawyer My Way">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/custom.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>

    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>MLMW</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?php echo htmlentities($_SESSION['user']) ?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="view-admins.php?vie=vie">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- Welcome Message starts -->
			
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-setting btn-default">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Welcome</span>
                    
                </button>
            </div>
            <!-- Welcome Message ends -->

            <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                <li><a href="../index.php" target="_blank"><i class="glyphicon glyphicon-globe"></i> Visit Site</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> Manage <span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="view-admins.php?vie=vie">Admin</a></li>
                        <li><a href="manage_lawyers.php?lawyer=lawyer">Lawyer</a></li>
                        <li><a href="manage_cases?case=case.php">Cases</a></li>
                        <li><a href="manage_courts.php?court=court">courts</a></li>
                        
                        <li><a href="news.php?view=view">News</a></li>
                    </ul>
                </li>
                <li>
                    <form class="navbar-search pull-left">
                        <input placeholder="Search" class="search-query form-control col-md-10" name="query"
                               type="text">
                    </form>
                </li>
            </ul>

        </div>
    </div>
    <!-- topbar ends -->

<div class="ch-container">
    <div class="row">
        

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Admin </li>
						<!--ajax-link class is use to tilt little-->
                        <li><a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        <li><a class="ajax-link" href="view-admins.php?vie=vie"><i class="glyphicon glyphicon-eye-open"></i><span> Manage Admins</span></a>
                        </li>
						<li><a class="ajax-link" href="manage_lawyers.php?lawyer=lawyer"><i class="glyphicon glyphicon-user white"></i><span> Manage Lawyers</span></a>
                        </li>
						<li><a class="ajax-link" href="manage_clients.php?client=client"><i class="glyphicon glyphicon-picture"></i><span> Manage Clients</span></a>
                        </li>
                        <li><a class="ajax-link" href="manage_courts.php?court=court"><i
                                    class="glyphicon glyphicon-edit"></i><span> Manage Courts</span></a></li>
                        <li><a class="ajax-link" href="manage_cases.php?case=case"><i class="glyphicon glyphicon-list-alt"></i><span> Manage Cases</span></a>
                        </li>
                        
                        
                        <li class="nav-header hidden-md">Website Section</li>
                        <li><a class="ajax-link" href="news.php?view=view"><i
                                    class="glyphicon glyphicon-align-justify"></i><span> Manage News</span></a></li>
									<li><a class="ajax-link" href="team.php?team=team"><i
                                    class="glyphicon glyphicon-align-justify"></i><span> Manage Team</span></a></li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Jumbotron-Message</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Mobile jumbotron</a></li>
                                <li><a href="#">News jumbotron</a></li>
                            </ul>
                        </li>
                       
                       
                        <li><a href="../mobileapp.php" target="_blank"><i class="glyphicon glyphicon-globe"></i><span> Mobile App Version</span></a></li>
                        
                        
                        <li><a href="logout.php"><i class="glyphicon glyphicon-lock"></i><span> Log Out</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
        
