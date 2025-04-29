 <?php
 
 
	function delete_lawyer_having_case($case_id,$lawyer_id){
	$result_set=mysql_query("delete from cases_has_lawyers WHERE  lawyer_id ='$lawyer_id' and  
	case_id='$case_id'");
	confirm_query($result_set);
	return true;
	}
	 function count_all_lawyers(){
	
	 $result = mysql_query("select * from lawyers");
	 $answer=0;
	 while($row =mysql_fetch_array($result )){
	 $answer++;
	 }
	 return $answer;
	 }
	
 	function find_total_zero_status_lawyers(){
	$result = mysql_query("SELECT * FROM lawyers where status=0") 
		or die(mysql_error()); 
		$answer=0; 
	while($row = mysql_fetch_array( $result )) {
	$answer++;
	}
	return $answer;
	}
	function find_all_zero_status_lawyers(){

	$result_set = mysql_query("SELECT * FROM lawyers where status=0");
	confirm_query($result_set);
		return $result_set;

	}
	function allow_lawyer($id){
	$result_set=mysql_query("UPDATE  lawyers SET  status =  '1' WHERE  lawyer_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function block_lawyer($id){
	$result_set=mysql_query("UPDATE  lawyers SET  status =  '0' WHERE  lawyer_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function delete_lawyer_by_id($id){
	$result_set=mysql_query("delete from lawyers WHERE  lawyer_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function all_lawyers(){
	$result_set=mysql_query("select * from lawyers");
	confirm_query($result_set);
	return $result_set;
	}
	//using in manage_cases to find lawyer names for specific case
	function find_lawyer_name_by_case_id($id){
	$query="select l.name,l.lawyer_id from cases_has_lawyers chs, lawyers l where     chs.lawyer_id=l.lawyer_id
	and chs.case_id='$id'";
	$result_set=mysql_query($query);
	confirm_query($result_set);
	return $result_set;
	}
	// Client related functions
	
	 function count_all_clients(){
	 $result = mysql_query("select * from clients");
	 $answer=0;
	 while($row =mysql_fetch_array($result )){
	 $answer++;
	 }
	 return $answer;
	 }
	 function find_total_zero_status_clients(){
	 $result = mysql_query("SELECT * FROM clients where status=0"); 
	 confirm_query($result);
		$answer=0; 
	while($row = mysql_fetch_array( $result )) {
	$answer++;
	}
	return $answer;
	}
	
 	function find_all_zero_status_clients(){
	$result_set = mysql_query("SELECT * FROM clients where status=0"); 
	confirm_query($result_set);
		return $result_set;
	}
	
	function delete_client_by_id($id){
	$result_set=mysql_query("delete from clients WHERE  client_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function allow_client($id){
	$result_set=mysql_query("UPDATE  clients SET  status =  '1' WHERE  client_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function block_client($id){
	$result_set=mysql_query("UPDATE  clients SET  status =  '0' WHERE  client_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	function all_clients(){
	$result_set=mysql_query("select * from clients");
	confirm_query($result_set);
	return $result_set;
	}
	function find_client_name_by_id($id){
	$result_set=mysql_query("select name from clients where client_id='$id' limit 1");
	confirm_query($result_set);
	return $result_set;
	}
	// Courts related functions
	
	function find_total_courts(){
	$result = mysql_query("SELECT * FROM courts") 
		or die(mysql_error()); 
		$ans=0; 
	while($row = mysql_fetch_array( $result )) {
	$ans++;
	}
	return $ans++;
	}
	function find_all_courts(){
	$result_set=mysql_query("SELECT * from courts");
	confirm_query($result_set);
	return $result_set;
	}
	function find_court_by_id($id){
	$query="SELECT * FROM courts WHERE court_id='$id' limit 1";
 $result = mysql_query($query);
  confirm_query($result);
  return $result;
	}
	function edit_court_by_id($id,$name){
	$query="UPDATE  courts SET  name =  '{$name}' WHERE  court_id ='$id'";
 $result = mysql_query($query);
  confirm_query($result);
  return true;
	}
	function add_new_court($name){
	$query="INSERT courts SET name='$name'";
	$result = mysql_query($query);
	confirm_query($query);
	return true;
	}
	function delete_court_by_id($id){
	$result_set=mysql_query("delete from courts WHERE  court_id ='$id'");
	confirm_query($result_set);
	return true;
	}
	
	
	// cases RELATED functions
	function find_total_cases(){
	$result = mysql_query("SELECT * FROM cases") 
		or die(mysql_error()); 
		$ans=0; 
	while($row = mysql_fetch_array( $result )) {
	$ans++;
	}
	return $ans;
	}
	function find_all_cases(){
	$result_set=mysql_query("SELECT * from cases");
	confirm_query($result_set);
	return $result_set;
	}
	function find_case_by_id($id){
	$query="SELECT * FROM cases WHERE case_id='$id' limit 1";
 $result = mysql_query($query);
  confirm_query($result);
  return $result;
	}
	//step 1: performing step one of add-case.php
	function add_new_case($name,$description,$client){
	$query="INSERT cases SET name='$name',description='$description',client_id='$client'";
	$result = mysql_query($query);
	confirm_query($query);
	// Now Getting last inserted case id to make use in Step 3
	$result=MYSQL_INSERT_ID(); // function to return last inserted id to 
	return $result;
	}
	//step 2: performing step two of add-case.php
	function add_lawyers_has_clients($lawyer,$client){
	$query="insert lawyers_has_clients set lawyers_lawyer_id='$lawyer',clients_client_id='$client'";
	$result=mysql_query($query);
	confirm_query($query);
	
	return true;
	}
	//step 3: performing step three of add-case.php
	function add_cases_has_lawyers($case,$lawyer){
	$query="insert cases_has_lawyers set case_id='$case', lawyer_id='$lawyer'";
	$result=mysql_query($query);
	confirm_query($query);
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
	$result = mysql_query("SELECT * FROM admins") 
		or die(mysql_error()); 
		$ans=0; 
	while($row = mysql_fetch_array( $result )) {
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
	$result = mysql_query("SELECT * FROM news") 
		or die(mysql_error()); 
		$ans=0; 
	while($row = mysql_fetch_array( $result )) {
	$ans++;
	}
	return $ans;
	}
	
	// Team related functions
	
	function update_team_record($member_no,$lawyer_id,$description){
	$query="UPDATE our_team set lawyers_lawyer_id='$lawyer_id',description='{$description}' where our_team_id='$member_no'";
	$result=mysql_query($query);
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
 