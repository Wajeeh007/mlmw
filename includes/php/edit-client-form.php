<!-- lawyer registration form will be show up when new lawyer get registerd-->
<?php include("./includes/db_connection.php"); ?>




<?php 
$client_id=$_SESSION['client_id'];
$query="select * from clients where client_id='$client_id'";
$result=mysqli_query($connection,$query);
confirm_query($result);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$password=$row['password'];
$phone=$row['phone'];
$facebook=$row['facebook'];
$address=$row['address'];
$city=$row['city'];
$country=$row['country'];

?>
<!-- form coding start -->
<form method="post" name="form" enctype="multipart/form-data">
		<table class="table table-striped table-bordered datatable responsive"> <!-- table start -->
			<tr><td colspan="2" align="center"><h1><br />Edit</h1></td></tr>
	<tr>
	<td align="right">Name:* </td><td><input type="text" name="name" value="<?php echo $name; ?>" /></td>		
	</tr>
	
	<tr>
	<td align="right">Eamil:* </td><td><input type="text" name="email" value="<?php echo $email; ?>" required/></td>		
	</tr>
	
	<tr>
	<td align="right">Password:* </td><td><input type="password" name="password" value="<?php echo $password; ?>"	 required/></td>		
	</tr>
	
	
	<tr>
	<td align="right">Phone:* </td><td><input type="text" name="phone" 	 value="<?php echo $phone; ?>" required/></td>		
	</tr>
	
	
	
	<tr>
	<td align="right">Facebook: </td><td><input type="text" name="facebook" 	value="<?php echo $facebook; ?>" /></td>		
	</tr>
	
	<tr>
	<td align="right">Address:* </td><td><input type="text" name="address" 	 value="<?php echo $address; ?>" required/></td>		
	</tr>
	
	<tr>
	<td align="right">City:* </td><td><input type="text" name="city" 	 value="<?php echo $city; ?>" required/></td>		
	</tr>
	<tr>
	<td align="right">Country:* </td><td><input type="text" name="country" 	 value="<?php echo $country; ?>" required /></td>		
	</tr>
			
			
			<tr><td colspan="2" align="center"><input type="file" name="image" /></td></tr>
<tr><td colspan="2" align="center">
<input type="submit" name="submit" value="Update" />
</td></tr>
</table> <!-- table end -->
</form>
<!-- form coding end -->


<!-- we insert record using a function called register-new-lawyer(parameters);-->

<?php 
//
if (isset($_POST['submit']) && ($_POST['name']!=''))
 { 
 
 // get form data, making sure it is valid
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password=$_POST['password'];
 $phone=$_POST['phone'];
  $facebook=$_POST['facebook'];
    $address=$_POST['address'];
	 $city=$_POST['city'];
	 $country=$_POST['country'];
	  if($_FILES['image']['name']!=null){
	 $image_name=$_FILES['image']['name'];
	 $image_type=$_FILES['image']['type'];
	 $image_size=$_FILES['image']['size'];
     $image_tmp=$_FILES['image']['tmp_name'];
			move_uploaded_file($image_tmp, "./img/$image_name");
			}
		$query = "update clients SET name='$name', email='$email', password='$password',phone='$phone', facebook='$facebook',
		 address='$address', country='$country' ";
		 
		 if(isset($image_name)){
		$query .= " ,image='$image_name' "; 
		}
		
		 $query .= " where client_id='$client_id'";
		
		$result = mysqli_query($connection, $query);
	     confirm_query($result);
  
  ?> 
  
  <?php
 }

?>
