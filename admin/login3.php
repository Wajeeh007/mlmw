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
}else {

echo "User not found";
}
}

?>






<br/>
<br/>
<form method="post" action="login.php" class="form-horizontal">
Username: <input type="text" name="username" /><br/>
Password: <input type="password" name="password" /><br/>
<input type="submit" name="submit" value="submit"/>

</form>