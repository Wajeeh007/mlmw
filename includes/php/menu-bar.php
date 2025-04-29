<!--header menu bar -->
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
	<div class="container">	
			<div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="glyphicon glyphicon-arrow-down" style="color:#FFFFFF"></span>
				 <span style="color:#FFFFFF"> MENU </span>
                </button>
			</div>
			<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
			 	<li><a href="index.php">Home</a></li>
				
				<li><a href="lawyers.php">Lawyers</a></li>
 			 	<li><a href="clients.php">Clients</a></li>
  				<li><a href="cases.php">Cases</a></li>
				<li><a href="courts.php">Courts</a></li>
  				<li><a href="news.php">News</a></li>
  				<li><a href="mobileapp.php">Mobile App</a></li>
  				<li><a href="contactus.php">Contact us</a></li>
				<li class="dropdown">
				
				<a href="register_lawyer.php" data-toggle="dropdown">Register <span class="caret"></span></a>
				<ul class="dropdown-menu">
				 <li><a href="register_lawyer.php">Lawyer</a></li>
				 <li><a href="register_client.php">Client</a></li>
				 </ul>
				
				</li>
				
				<?php require_once("includes/functions.php"); ?>

				<?php if(isset($_SESSION['lawyer_id'])){ ?>
				<li><a href="mlmw_lawyer.php?lawyer=lawyer">My Account</a></li>
				<li><a href="logout.php">Logout</a></li>
				<?php }else if (isset($_SESSION['client_id'])){ ?>
				<li><a href="mlmw_client.php?client=client">My Account</a></li>
				<li><a href="client_logout.php">Logout</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<?php }
				?>
				
			</ul>
			</div>
			<style>
		
			</style>
		</nav>	
		<!-- logo of MLMW 
		<div id="row">
		<div class="col col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-2">
		<img src="img/my-logo.jpg" onClick="index.php" height="165" width="170" style="margin-top:3em;"/>
		</div>
		</div>
		-->
		<div id="row">
		