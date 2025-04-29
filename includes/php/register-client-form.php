<!-- lawyer registration form will be show up when new lawyer get registerd-->


<!-- form coding start -->
<form method="post" name="form" enctype="multipart/form-data" action="register_client.php">
		<table class="table table-striped table-bordered datatable responsive"> <!-- table start -->
			<tr><td colspan="2" align="center">
			<img src="img/signupnow.png" />
			</td></tr>
	<tr>
	<td align="right">Name:* </td><td><input type="text" name="name" placeholder="Full Name" required/></td>		
	</tr>
	
	<tr>
	<td align="right">Eamil:* </td><td><input type="text" name="email" placeholder="info@mlmw.com" required/></td>		
	</tr>
	
	<tr>
	<td align="right">Password:* </td><td><input type="password" name="password" 	 required/></td>		
	</tr>
	
	
	<tr><td align="right">Gender:*</td><td> <input type="radio" name="gender" value="male" checked>Male<br/>
	<input type="radio" name="gender" id="female" value="female">Female</td></tr>
	
	
	
	

	
	<tr>
	<td align="right">Phone:* </td><td><input type="text" name="phone" 	 paceholder="+92-XXX-XXXX-XXX" required/></td>		
	</tr>
	
	<tr>
	<td align="right">Fax: </td><td><input type="text" name="fax" 	 paceholder="+92-XXX-XXXX-XXX"/></td>		
	</tr>
	
	
	
	<tr>
	<td align="right">Facebook: </td><td><input type="text" name="facebook" 	placeholder="http://www.facebook.com/mlmw" /></td>		
	</tr>
	
	<tr>
	<td align="right">Address:* </td><td><input type="text" name="address" 	 placeholder="1440 E. Missouri Avenue, Suite C150" required/></td>		
	</tr>
	
	<tr>
	<td align="right">City:* </td><td><input type="text" name="city" 	 placeholder="Lahore" required/></td>		
	</tr>
	<tr>
	<td align="right">Country:* </td><td><input type="text" name="country" 	 placeholder="Pakistan" required /></td>		
	</tr>
			
			
			<tr><td colspan="2" align="center"><input type="file" name="image" /></td></tr>
<tr><td colspan="2" align="center">
<input type="submit" name="submit" />
</td></tr>
</table> <!-- table end -->
</form>
<!-- form coding end -->

<?php include("./includes/db_connection.php"); ?>

<!-- we insert record using a function called register-new-lawyer(parameters);-->

<?php 
//
if (isset($_POST['submit']) && ($_POST['name']!=''))
 { 
 
 // get form data, making sure it is valid
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password=$_POST['password'];
 $gender = $_POST['gender'];
 $phone=$_POST['phone'];
  $facebook=$_POST['facebook'];
    $address=$_POST['address'];
	 $city=$_POST['city'];
	 $country=$_POST['country'];
	 $image_name=$_FILES['image']['name'];
	 $image_type=$_FILES['image']['type'];
	 $image_size=$_FILES['image']['size'];
     $image_tmp=$_FILES['image']['tmp_name'];
			move_uploaded_file($image_tmp, "./img/$image_name");
		$query = "INSERT clients SET name='$name', email='$email', password='$password', gender='$gender', phone='$phone', facebook='$facebook',
		city='$city', address='$address', country='$country', image='$image_name'";
		
		$result = mysqli_query($connection, $query);
	     confirm_query($result);
		 ?>
		 
<script type='text/javascript'>
alert('Registration Successfull!');
</script>
		 
<?php 
 }
 else {
 
 }

?>
