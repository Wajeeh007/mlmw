	<?php session_start() ?>

<?php require_once("includes/php/db_connection.php"); ?>
<?php require_once("includes/admin-functions.php"); ?>

<?php 

if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
global $connection;
$query="select username,hashed_password from admins where username=\"{$username}\"";

$result=mysqli_query($connection,$query);
confirm_query($result);
$row=mysqli_fetch_assoc($result);
$user=$row['username'];
$pass=$row['hashed_password'];
if(isset($user) && ($pass==$password)){
$_SESSION['user']=$user;
redirect_to("index.php");
}else { ?>
<script type='text/javascript'>
alert('Wroing Username or Password!');
</script>
<?php
}
}

?>



	<html>
	<body background="img/backgroundlogin.jpg">
	<style>
	body {
	background-repeat:no-repeat;}
	
	</style>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">

<!--login modal-->
	<br /> <br />
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
	  <h1 class="text-center"><img src="img/admin3.png" align="middle" height="200" width="200"/></h1> 
	  
	  <h1 class="text-center" style="font-family: 'Brush Script MT', cursive; color:#FF3366" > Login </h1>
  	  <h1 class="text-center" style="font-family: 'Brush Script MT', cursive; color:#0033FF"> My Lawyer My Way </h1>
         
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="post" action="login.php">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Username" name="username" required />
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
			<input type="submit" value="Sign In" name="submit" class="btn btn-primary btn-lg btn-block"/>
            
              
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <a href="../index.php" target="_blank"><button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Visit Site</button></a>
		  </div>	
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>