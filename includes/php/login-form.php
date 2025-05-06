<?php 
// Don't call session_start() here - it causes headers already sent error
// This file is included after HTML output has started
require_once("./includes/db_connection.php"); 
require_once("./includes/functions.php"); 
?>

<!-- for lawyer login -->
<?php 

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    global $connection;
    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM lawyers WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($connection, $query);
    
    if($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $lawyer_id = $row['lawyer_id'];
            $stored_email = $row['email'];
            $pass = $row['password'];
            $name = $row['name'];
            $status = $row['status'];
            
            if($pass == $password && $status == 1){
                $_SESSION['name'] = $name;
                $_SESSION['lawyer_id'] = $lawyer_id;
                redirect_to("./mlmw_lawyer.php?lawyer=lawyer");
            } else if ($status == 0){
                echo '<div class="alert alert-warning">Your account has not been approved by Admin yet.</div>';
            } else {
                echo '<div class="alert alert-danger">Incorrect password.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">User not found.</div>';
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo '<div class="alert alert-danger">Database error. Please try again later.</div>';
    }
}

?>


<!-- for client login-->

<?php 

if(isset($_POST['client'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    global $connection;
    // Use prepared statement to prevent SQL injection
    $query = "SELECT * FROM clients WHERE email = ? LIMIT 1";
    $stmt = mysqli_prepare($connection, $query);
    
    if($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $client_id = $row['client_id'];
            $stored_email = $row['email'];
            $pass = $row['password'];
            $name = $row['name'];
            $status = $row['status'];
            
            if($pass == $password && $status == 1){
                $_SESSION['name'] = $name;
                $_SESSION['client_id'] = $client_id;
                redirect_to("./mlmw_client.php?client=client");
            } else if ($status == 0){
                echo '<div class="alert alert-warning">Your account has not been approved by Admin yet.</div>';
            } else {
                echo '<div class="alert alert-danger">Incorrect password.</div>';
            }
        } else {
            echo '<div class="alert alert-danger">User not found.</div>';
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo '<div class="alert alert-danger">Database error. Please try again later.</div>';
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