<?php session_start() ?>
<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/functions.php"); ?>

<!-- for lawyer login -->
<?php 

if(isset($_POST['submit'])){
$email=$_POST['email'];
$password=$_POST['password'];

global $connection;
$query="select * from lawyers where email=\"{$email}\" limit 1";

$result=mysqli_query($connection,$query);
confirm_query($result);
$row=mysqli_fetch_assoc($result);
$lawyer_id=$row['lawyer_id'];
$email=$row['email'];
$pass=$row['password'];
$name=$row['name'];
$status=$row['status'];
if(isset($email) && ($pass==$password)&& ($status==1)){
$_SESSION['name']=$name;
$_SESSION['lawyer_id']=$lawyer_id;
redirect_to("./mlmw_lawyer.php?lawyer=lawyer");

}else if ($status==0){
	echo "Your account has not Approved by Admin";

} else {
echo "User not found";
}
}

?>


<!-- for client login-->

<?php 

if(isset($_POST['client'])){



$email=$_POST['email'];
$password=$_POST['password'];

global $connection;
$query="select * from clients where email=\"{$email}\" limit 1";

$result=mysqli_query($connection,$query);
confirm_query($result);
$row=mysqli_fetch_assoc($result);
$client_id=$row['client_id'];
$email=$row['email'];
$pass=$row['password'];
$name=$row['name'];
$status=$row['status'];
if(isset($email) && ($pass==$password)&& ($status==1)){
$_SESSION['name']=$name;
$_SESSION['client_id']=$client_id;
redirect_to("./mlmw_client.php?client=client");

}else if ($status==0){
	echo "Your account has not Approved by Admin";

} 

else {

echo "User not found";
}



}

?>




<br/>
<br/>
<form method="post" action="login.php" class="form-horizontal">
<table align="center"  align="center">
<tr><td colspan="2" align="center">
<img src="img/Login.jpg" height="100px" width="250px" />
</td></tr>
<tr><td><br /></td></tr>

<tr><td>Email:</td><td><input type="text" name="email" /></td></tr><tr><td><br /></td></tr>
<tr><td>Password: </td><td><input type="password" name="password" /></td></tr><tr><td><br /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Lawyer"  class="btn btn-primary btn-lg"/></td></tr><tr><td><br /></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="client" value="Client" class="btn btn-success btn-lg"/></td></tr>


<br/><br /></table></form>
<br/><br /><br/><br />