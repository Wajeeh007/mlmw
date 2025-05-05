<?php
 
 
	function delete_lawyer_having_case($case_id,$lawyer_id){
	global $connection;
	$result_set=mysqli_query($connection, "DELETE FROM cases_has_lawyers WHERE lawyer_id ='$lawyer_id' AND case_id='$case_id'");
	confirm_query($result_set);
	return true;
	}
	 function count_all_lawyers(){
	global $connection;
	 $result = mysqli_query($connection, "SELECT * FROM lawyers");
	 $answer=0;
	 while($row = mysqli_fetch_array($result)){
	 $answer++;
	 }
	 return $answer;
	 }
	
 	function find_total_zero_status_lawyers(){
	global $connection;
	$result = mysqli_query($connection, "SELECT * FROM lawyers WHERE status=0") 
		or die(mysqli_error($connection)); 
		$answer=0; 
	while($row = mysqli_fetch_array($result)) {
	$answer++;
	}
	return $answer;
	}
	function find_all_zero_status_lawyers(){
	global $connection;
	$result_set = mysqli_query($connection, "SELECT * FROM lawyers WHERE status=0");
	confirm_query($result_set);
		return $result_set;

	}
	function allow_lawyer($id){
	global $connection;
	$result_set=mysqli_query($connection, "UPDATE lawyers SET status = '1' WHERE lawyer_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function block_lawyer($id){
	global $connection;
	$result_set=mysqli_query($connection, "UPDATE lawyers SET status = '0' WHERE lawyer_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function delete_lawyer_by_id($id){
	global $connection;
	
	// Delete from appointments related to this lawyer
	$result_set = mysqli_query($connection, "DELETE FROM appointments WHERE lawyer_id ='$id'");
	confirm_query($result_set);
	
	// Delete from messages related to this lawyer
	$result_set = mysqli_query($connection, "DELETE FROM messages WHERE lawyer_id ='$id'");
	confirm_query($result_set);
	
	// Delete from lawyers_has_clients
	$result_set = mysqli_query($connection, "DELETE FROM lawyers_has_clients WHERE lawyers_lawyer_id ='$id'");
	confirm_query($result_set);
	
	// Delete from cases_has_lawyers
	$result_set = mysqli_query($connection, "DELETE FROM cases_has_lawyers WHERE lawyer_id ='$id'");
	confirm_query($result_set);
	
	// Delete from our_team if lawyer is part of team
	$result_set = mysqli_query($connection, "DELETE FROM our_team WHERE lawyers_lawyer_id ='$id'");
	confirm_query($result_set);
	
	// Delete from personal_schedule
	$result_set = mysqli_query($connection, "DELETE FROM personal_schedule WHERE lawyer_id ='$id'");
	confirm_query($result_set);
	
	// Finally delete the lawyer
	$result_set = mysqli_query($connection, "DELETE FROM lawyers WHERE lawyer_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function all_lawyers(){
	global $connection;
	$result_set=mysqli_query($connection, "SELECT * FROM lawyers");
	confirm_query($result_set);
	return $result_set;
	}
	//using in manage_cases to find lawyer names for specific case
	function find_lawyer_name_by_case_id($id){
	global $connection;
	$query="SELECT l.name, l.lawyer_id FROM cases_has_lawyers chs, lawyers l WHERE chs.lawyer_id=l.lawyer_id AND chs.case_id='$id'";
	$result_set=mysqli_query($connection, $query);
	confirm_query($result_set);
	return $result_set;
	}
	// Client related functions
	
	 function count_all_clients(){
	 global $connection;
	 $result = mysqli_query($connection, "SELECT * FROM clients");
	 $answer=0;
	 while($row = mysqli_fetch_array($result)){
	 $answer++;
	 }
	 return $answer;
	 }
	 function find_total_zero_status_clients(){
	 global $connection;
	 $result = mysqli_query($connection, "SELECT * FROM clients WHERE status=0"); 
	 confirm_query($result);
		$answer=0; 
	while($row = mysqli_fetch_array($result)) {
	$answer++;
	}
	return $answer;
	}
	
 	function find_all_zero_status_clients(){
	global $connection;
	$result_set = mysqli_query($connection, "SELECT * FROM clients WHERE status=0"); 
	confirm_query($result_set);
		return $result_set;
	}
	
	function delete_client_by_id($id){
	global $connection;
	// First delete related appointments
	$result_set = mysqli_query($connection, "DELETE FROM appointments WHERE client_id ='$id'");
	confirm_query($result_set);
	
	// Find and delete any related records in lawyers_has_clients
	$result_set = mysqli_query($connection, "DELETE FROM lawyers_has_clients WHERE clients_client_id ='$id'");
	confirm_query($result_set);
	
	// Delete related messages
	$result_set = mysqli_query($connection, "DELETE FROM messages WHERE client_id ='$id'");
	confirm_query($result_set);
	
	// Find cases associated with this client
	$cases_result = mysqli_query($connection, "SELECT case_id FROM cases WHERE client_id ='$id'");
	confirm_query($cases_result);
	
	// For each case, delete related records in cases_has_lawyers and courts_has_cases
	while($case = mysqli_fetch_assoc($cases_result)) {
		$case_id = $case['case_id'];
		// Delete from cases_has_lawyers
		$result_set = mysqli_query($connection, "DELETE FROM cases_has_lawyers WHERE case_id ='$case_id'");
		confirm_query($result_set);
		
		// Delete from courts_has_cases
		$result_set = mysqli_query($connection, "DELETE FROM courts_has_cases WHERE cases_case_id ='$case_id' AND cases_client_id ='$id'");
		confirm_query($result_set);
	}
	
	// Now delete the cases
	$result_set = mysqli_query($connection, "DELETE FROM cases WHERE client_id ='$id'");
	confirm_query($result_set);
	
	// Then delete the client
	$result_set = mysqli_query($connection, "DELETE FROM clients WHERE client_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function allow_client($id){
	global $connection;
	$result_set=mysqli_query($connection, "UPDATE clients SET status = '1' WHERE client_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function block_client($id){
	global $connection;
	$result_set=mysqli_query($connection, "UPDATE clients SET status = '0' WHERE client_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function all_clients(){
	global $connection;
	$result_set=mysqli_query($connection, "SELECT * FROM clients");
	confirm_query($result_set);
	return $result_set;
	}
	function find_client_name_by_id($id){
	global $connection;
	$result_set=mysqli_query($connection, "SELECT name FROM clients WHERE client_id='$id' LIMIT 1");
	confirm_query($result_set);
	return $result_set;
	}
	// Courts related functions
	
	function find_total_courts(){
	global $connection;
	$result = mysqli_query($connection, "SELECT * FROM courts") 
		or die(mysqli_error($connection)); 
		$ans=0; 
	while($row = mysqli_fetch_array($result)) {
	$ans++;
	}
	return $ans++;
	}
	function find_all_courts(){
	global $connection;
	$result_set=mysqli_query($connection, "SELECT * FROM courts");
	confirm_query($result_set);
	return $result_set;
	}
	function find_court_by_id($id){
	global $connection;
	$query="SELECT * FROM courts WHERE court_id='$id' LIMIT 1";
	$result = mysqli_query($connection, $query);
	confirm_query($result);
	return $result;
	}
	function edit_court_by_id($id,$name){
	global $connection;
	$query="UPDATE courts SET name = '{$name}' WHERE court_id ='$id'";
	$result = mysqli_query($connection, $query);
	confirm_query($result);
	return true;
	}
	function add_new_court($name){
	global $connection;
	$query="INSERT courts SET name='$name'";
	$result = mysqli_query($connection, $query);
	confirm_query($result);
	return true;
	}
	function delete_court_by_id($id){
	global $connection;
	$result_set=mysqli_query($connection, "DELETE FROM courts WHERE court_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	
	
	// cases RELATED functions
	function find_total_cases(){
	global $connection;
	$result = mysqli_query($connection, "SELECT * FROM cases") 
		or die(mysqli_error($connection)); 
		$ans=0; 
	while($row = mysqli_fetch_array($result)) {
	$ans++;
	}
	return $ans;
	}
	function find_all_cases(){
	global $connection;
	$result_set=mysqli_query($connection, "SELECT * FROM cases");
	confirm_query($result_set);
	return $result_set;
	}
	function find_case_by_id($id){
	global $connection;
	$query="SELECT * FROM cases WHERE case_id='$id' LIMIT 1";
	$result = mysqli_query($connection, $query);
	confirm_query($result);
	return $result;
	}
	//step 1: performing step one of add-case.php
	function add_new_case($name,$description,$client){
	global $connection;
	$query="INSERT cases SET name='$name',description='$description',client_id='$client'";
	$result = mysqli_query($connection, $query);
	confirm_query($result);
	// Now Getting last inserted case id to make use in Step 3
	$result=mysqli_insert_id($connection); // function to return last inserted id
	return $result;
	}
	//step 2: performing step two of add-case.php
	function add_lawyers_has_clients($lawyer,$client){
	global $connection;
	$query="INSERT lawyers_has_clients SET lawyers_lawyer_id='$lawyer', clients_client_id='$client'";
	$result=mysqli_query($connection, $query);
	confirm_query($result);
	
	return true;
	}
	//step 3: performing step three of add-case.php
	function add_cases_has_lawyers($case,$lawyer){
	global $connection;
	$query="INSERT cases_has_lawyers SET case_id='$case', lawyer_id='$lawyer'";
	$result=mysqli_query($connection, $query);
	confirm_query($result);
	return true;
	}
    function redirect_to($new_location) {
	header("Location: " . $new_location);
	  exit;
	}
function confirm_query($result_set){
		if(!$result_set){
		die("database query faild");
		}
		}
	function form_errors($errors=array()) {
		$output = "";
		if (!empty($errors)) {
		  $output .= "<div class=\"error\">";
		  $output .= "Please fix the following errors:";
		  $output .= "<ul>";
		  foreach ($errors as $key => $error) {
		    $output .= "<li>";
				$output .= htmlentities($error);
				$output .= "</li>";
		  }
		  $output .= "</ul>";
		  $output .= "</div>";
		}
		return $output;
	}
	// Admin related Functions
	function count_all_admins(){
	global $connection;
	$result = mysqli_query($connection, "SELECT * FROM admins") 
		or die(mysqli_error($connection)); 
		$ans=0; 
	while($row = mysqli_fetch_array($result)) {
	$ans++;
	}
	return $ans;
	}
 function find_all_admins() {
		global $connection;
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "ORDER BY username ASC";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		return $admin_set;
	}
 function add_new_admin($username,$password){
 global $connection;
		
		 $query = "INSERT admins SET username='{$username}', hashed_password='$password'";
		 $result = mysqli_query($connection, $query);
	     confirm_query($result);
		 return $result;
 }
 function find_admin_by_id($admin_id) {
		global $connection;
		
		$safe_admin_id = mysqli_real_escape_string($connection, $admin_id);
		
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE id = {$safe_admin_id} ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
	}
 function find_admin_by_username($username) {
		global $connection;
		
		$safe_username = mysqli_real_escape_string($connection, $username);
		$v="tausif";
		$query  = "SELECT * ";
		$query .= "FROM admins ";
		$query .= "WHERE username = '{$safe_username}' ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return $v;
		}
	}
	
	
	//news related functions
	function count_all_news(){
	global $connection;
	$result = mysqli_query($connection, "SELECT * FROM news") 
		or die(mysqli_error($connection)); 
		$ans=0; 
	while($row = mysqli_fetch_array($result)) {
	$ans++;
	}
	return $ans;
	}
	
	// Notifications related functions
	function count_all_notifications(){
	global $connection;
	// Check if table exists first
	$table_check = mysqli_query($connection, "SHOW TABLES LIKE 'notifications'");
	if(mysqli_num_rows($table_check) == 0) {
		// Table doesn't exist, return 0
		return 0;
	}
	
	// If table exists, count records
	$result = mysqli_query($connection, "SELECT * FROM notifications") 
		or die(mysqli_error($connection)); 
	$ans=0; 
	while($row = mysqli_fetch_array($result)) {
		$ans++;
	}
	return $ans;
	}
	
	// Team related functions
	
	function update_team_record($member_no,$lawyer_id,$description){
	global $connection;
	$query="UPDATE our_team set lawyers_lawyer_id='$lawyer_id',description='{$description}' where our_team_id='$member_no'";
	$result=mysqli_query($connection, $query);
	confirm_query($result);
	return true;
	}
	
	function attempt_login($username, $password) {
		$admin = find_admin_by_username($username);
		if ($admin) {
			// found admin, now check password
			if (password_check($password, $admin["hashed_password"])) {
				// password matches
				return $admin;
			} else {
				// password does not match
				return false;
			}
		} else {
			// admin not found
			return false;
		}
	}

function password_check($password, $existing_hash) {
		// existing hash contains format and salt at start
	  $hash = crypt($password, $existing_hash);
	  if ($hash === $existing_hash) {
	    return true;
	  } else {
	    return false;
	  }
	}
	function logged_in() {
		return isset($_SESSION['user']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}

 ?>
 