
<!-- lawyer registration form will be show up when new lawyer get registerd-->
<?php include("./includes/db_connection.php"); ?>




<?php 
$id=$_SESSION['lawyer_id'];
$query="select * from lawyers where lawyer_id='$id' limit 1";
$result=mysqli_query($connection,$query);
confirm_query($result);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$password=$row['password'];
$experience=$row['experience'];
$school=$row['law_school'];
$practise=$row['practise_areas'];
$phone=$row['phone'];
$fax=$row['fax'];
$facebook=$row['facebook'];
$twitter=$row['twitter'];
$google=$row['google_plus'];
$website=$row['website'];
$languages=$row['languages'];
$address=$row['address'];
$city=$row['city'];
$country=$row['country'];

?>
<!-- form coding start -->
<form method="post" name="form" enctype="multipart/form-data" action="mlmw_lawyer.php?edit=edit">
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
	
	
	<tr><td align="right">Gender:*</td><td> <input type="radio" name="gender" value="male" checked>Male<br/>
	<input type="radio" name="gender" id="female" value="female">Female</td></tr>
	
	
	<tr>
	<td align="right">Experience: </td><td><input type="text" name="experience" 	value="<?php echo $experience; ?>" /></td>		
	</tr>
	
	<tr>
	<td align="right">Law School: </td><td><input type="text" name="law_school" 	value="<?php echo $school; ?>" /></td>		
	</tr>
	
	<tr>
	<td align="right">Practise Areas: </td><td><input type="text" name="practise_areas" 	value="<?php echo $practise; ?>" /></td>		
	</tr>
	
	

	
	<tr>
	<td align="right">Phone:* </td><td><input type="text" name="phone" 	 value="<?php echo $phone; ?>" required/></td>		
	</tr>
	
	<tr>
	<td align="right">Fax: </td><td><input type="text" name="fax" 	 value="<?php echo $fax; ?>"/></td>		
	</tr>
	
	
	
	<tr>
	<td align="right">Facebook: </td><td><input type="text" name="facebook" 	value="<?php echo $facebook; ?>" /></td>		
	</tr>
	
	<tr>
	<td align="right">Twitter: </td><td><input type="text" name="twitter" 	value="<?php echo $twitter; ?>" /></td>		
	</tr>
	
	<tr>
	<td align="right">Google Plus: </td><td><input type="text" name="google_plus" 	value="<?php echo $google; ?>" /></td>		
	</tr>
	<tr>
	<td align="right">Website: </td><td><input type="text" name="website" 	value="<?php echo $website; ?>" /></td>		
	</tr>
	
	<tr>
	<td align="right">Languages: </td><td><input type="text" name="languages" 	value="<?php echo $languages; ?>" /></td>		
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
 $gender = $_POST['gender'];
 if(isset($_POST['experience'])){
 $experience = $_POST['experience'];
  }
  else {
  $experience='';
  }
 $law_school = $_POST['law_school']; 
 $practise_areas=$_POST['practise_areas'];
 $phone=$_POST['phone'];
  $fax=$_POST['fax'];
  $facebook=$_POST['facebook'];
   $twitter=$_POST['twitter'];
   $google_plus=$_POST['google_plus'];
   $languages=$_POST['languages'];
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
			
		$query = "update lawyers SET name='$name', email='$email', password='$password', gender='$gender', experience='$experience', law_school='$law_school', practise_areas='$practise_areas', phone='$phone',
fax='$fax', facebook='$facebook',
		twitter='$twitter',
		google_plus='$google_plus', languages='$languages', address='$address', country='$country' ";
		if(isset($image_name)){
		$query .= " ,image='$image_name' "; 
		}
		$query .= "where lawyer_id='$id'";
		
		$result = mysqli_query($connection, $query);
	     confirm_query($result);
 echo "success"; 
  ?>
 
  <?php 
 }
 else {

 }

?>
