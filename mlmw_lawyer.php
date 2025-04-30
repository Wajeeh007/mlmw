<?php session_start() ?>

<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>My Lawyer My Way</title>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Stylesheets -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	 <link href="css/custom.css" rel="stylesheet">
    <script src="js/respond.js"></script>
	
</head>

<body id="Home">
	<div class="container">
	<!--row1 menubar-->
		<div class="row">
		<?php include("includes/php/menu-bar.php"); ?>
		
			</div>
			<!--menubar row end -->
			
		<!-- Banner Image -->
		<div class="row">
		<img src="img/ban3.jpg" height="210" width="1200" style="padding-top:4em"/>
		</div>
		
		<!-- Banner Image -->
		
		<!-- row nav+profile -->
		<div class="row">
		
		<div class="col-lg-3">
		<!-- aside navigation row -->
		<style> 
		.menu {
		list-style-type:none;
		margin-top:15em;
		}
		.menu li{
		background-color:#0066FF;
		margin-bottom:1px;
		text-align:center;
		
		height:3em;
		size:auto;
		
		}
		.menu li a {
		color:#FFFFFF;}
		
		
		</style>
		
		<ul class="menu"><br/>
		<li><a href="mlmw_lawyer.php?lawyer=lawyer" class="active">View Profile</a></li>
		<li><a href="mlmw_lawyer.php?edit=edit">Edit Profile</a></li>
		<li><a href="mlmw_lawyer.php?clients=clients">Clients</a></li>
		<li><a href="mlmw_lawyer.php?cases=cases">Cases</a></li>
		<li><a href="mlmw_lawyer.php?schedule=schedule">Schedule</a></li>
		<li><a href="mlmw_lawyer.php?message=message">Messages</li>
		<li><a href="logout.php">Logout</a></li>
		</ul>
		</div>
		
		
		<div class="col-lg-9"><hr />
		<?php 
		if(isset($_GET['lawyer'])){ ?>
		<?php include("includes/php/lawyer-full-profile.php"); ?>
		
		<?php } else if(isset($_GET['edit'])){ ?>
		<?php include("includes/php/edit-lawyer-form.php"); ?>
		
		<?php } else if(isset($_GET['clients'])) { ?>
		<?php include("includes/php/mlmw_lawyer_clients.php"); ?>
		
		
		<?php } else if(isset($_GET['cases'])){ ?>
		<?php include("includes/php/mlmw_lawyer_cases.php"); ?>
		<?php } else if (isset($_GET['schedule'])){?>
		<img src="img/schedule.jpg" height="200" width="900"/>
		<?php include("includes/php/mlmw_lawyer_schedule.php"); ?>
		<?php } else if(isset($_GET['message'])){ ?>
		<img src="img/law4.png" height="180" width="880">
		<?php include("includes/php/mlmw_lawyer_messages.php"); ?>
		<?php } ?>
		
		</div><br />	
		<!-- aside navigation end-->
		
		</div></div>

		<div id="row">
		<div class="col-lg-12">
			<!--footer area start-->
			<?php include("includes/php/footer.php"); ?>
			<!-- footer area end -->
		</div>
		</div>


</div>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

