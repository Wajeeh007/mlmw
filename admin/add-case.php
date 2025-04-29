<?php include("manage_cases.php"); ?>

<?php if(isset($_POST['submit'])){

$name=$_POST['name'];
$description=$_POST['description'];
$client=$_POST['client'];
$lawyer=$_POST['lawyer'];
// To complete step 3: step 1 will help to get back last inserted case_id 
// step 1: New case is registerd in cases Table
$case_id=add_new_case($name,$description,$client);
//echo "case id $case_id";
// step 2: New entry in lawyers_has_clients
$result=add_lawyers_has_clients($lawyer,$client);
// step 3: New entry in case_has_lawyers (what happen if case_id not picked right suppose step 1 and step 2 completed but system fail until step 3 comes:: correct answer Transaction is it's solution we will apply it later any ways no need to apply because we are giving advance edit options after entry)
$result=add_cases_has_lawyers($case_id,$lawyer);
//redirect_to("manage_cases.php?case=case");
}
?>
<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="manage_cases.php?case=case">All Cases</a>
            </li>
			<li>
                <a href="add-case.php">Add Cases</a>
            </li>
        </ul>
    </div>
<?php include('connect-db.php') ?>
<?php 
/* 
 Add cases.PHP
 
*/

 
 ?>
 <form method="post" action="add-case.php">
 <h4 style="color:#0099FF">Enter New Case</h4><br />
 <p style="color:#66CC66"><b>! Case Client is Mandatory or you can choose MY LAWYER MY WAY as case client<br /></b> </p> 
 <p style="color:#66CC66"><b>! Case Laweyer/Lawyers are also mandatory or you ccan choose MLMW Lawyer as case lawyer</b></p>
 Name:<input type="text" placeholder="Bank Robbary" size="45" name="name"/> <br />
 Description:<br /><textarea cols="50" rows="15"  placeholder="This robbary takes place in HBL bank on last sunday." name="description"></textarea><br /><br />
 Client:
 <select name="client">
  <?php $client_set=all_clients();?>
  <?php while($row=mysql_fetch_array($client_set)){
  $id=$row['client_id'];
  $name=$row['name'];
  ?>
  <option value="<?php echo $id ?>"><?php echo $name ?></option>
  <?php } ?>
 
</select>

 
 
 <br /><br />
 Lawyer:
  <select name="lawyer">
  <?php $lawyer_set=all_lawyers();?>
  <?php while($row=mysql_fetch_array($lawyer_set)){
  $id=$row['lawyer_id'];
  $name=$row['name'];
  ?>
  <option value="<?php echo $id ?>"><?php echo $name ?></option>
  <?php } ?>
 
</select>
<br /><br />
 <input type="submit" name="submit" value="Add Case" class="btn btn-success"/>
 </form>
 
<?php require('includes/php/footer.php'); ?>