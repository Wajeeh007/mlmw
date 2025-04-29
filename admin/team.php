<?php require('includes/php/header.php'); ?>

<?php
/* 
	team.PHP
	Displays all data from 'our_team' table
*/

    
	// connect to the database
	include('connect-db.php');

	// get results from database
	if(isset($_GET['team'])){
	?>
	<div>
        <ul class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="team.php?team=team">team</a>
            </li>
        </ul>
    </div>
	
	<h1 align="center">Manage Our-Team</h1>
	<form method="post" name="form" action="team.php?save=save">
	<table >
	<tr><td>Choose Member</td><td>
	<select name="team">
	<option value="1" selected="selected" >Member 1</option>
	<option value="2">Member 2</option>
	<option value="3">Member 3</option>
	</select>
	
	</td></tr>
	<tr><td>Choose Lawyer</td><td>
	
	<select name="lawyer">
  <?php $lawyer_set=all_lawyers();?>
  <?php while($row=mysql_fetch_array($lawyer_set)){
  $id=$row['lawyer_id'];
  $name=$row['name'];
  ?>
  <option value="<?php echo $id ?>"><?php echo $name ?></option>
  <?php } ?>
 
</select>
</td>
	</tr>
	<tr><td>Description:</td></tr>
	<tr><td colspan="2" align="right">
	<textarea name="description" rows="20" cols="50" name="description"></textarea>
	</td></tr>
	<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Save" class="btn btn-success"/>
				
				</td></tr>
	
	</table>
	</form>
	
<?php }else if(isset($_GET['save'])){
$lawyer_id=$_POST['lawyer'];
$member_number=$_POST['team'];
$description=$_POST['description'];
$result=update_team_record($member_number,$lawyer_id,$description);
if($result==1){
?>
<div class="alert alert-success" role="alert">
  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
  <span class="sr-only">Success:</span>
 Record Updated successfully
</div>
<?php
}
}
?>
<?php require('includes/php/footer.php'); ?>

