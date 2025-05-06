<?php 
 	
		// lawyers related functions
		function find_lawyer_image_by_lawyer_id($id){
		global $connection;
		$query="select * from lawyers where lawyer_id='$id'";
		$set=mysqli_query($connection,$query);
		confirm_query($set);
		return $set;
		}
		
		function find_all_lawyers(){
		global $connection;
		 $query= "SELECT * FROM lawyers";
		 $news_set = mysqli_query($connection,$query);
	     confirm_query($news_set);
		 return $news_set;
		}
		function lawyer_clients($id){
		global $connection;
		$query="select * from lawyers_has_clients lhc,clients c where	  
		lhc.clients_client_id=c.client_id
		and lawyers_lawyer_id='$id'";
		$clients_set=mysqli_query($connection,$query);
		confirm_query($clients_set);
		return $clients_set;
		}
		function find_lawyer_name_by_case_id($id){
		global $connection;
	$query="select l.name,l.lawyer_id from cases_has_lawyers chs, lawyers l where     chs.lawyer_id=l.lawyer_id
	and chs.case_id='$id'";
	$result_set=mysqli_query($connection,$query);
	confirm_query($result_set);
	return $result_set;
	}
	function find_case_name_by_lawyer_id($id){
	$query="select c.name,c.case_id from cases_has_lawyers chs, cases c where        chs.case_id=c.case_id
	and chs.lawyer_id='$id'";
	global $connection;
	$result_set=mysqli_query($connection,$query);
	confirm_query($result_set);
	return $result_set;
	}
	function find_lawyer_by_id($id){
	$query="select * from lawyers where lawyer_id='$id'";
	global $connection;
	$result_set=mysqli_query($connection,$query);
	confirm_query($result_set);
	return $result_set;
	}
	function find_lawyer_name_by_id($id){
	$query="select name from lawyers where lawyer_id='$id'";
	global $connection;
	$result_set=mysqli_query($connection,$query);
	confirm_query($result_set);
	return $result_set;
	}
	// lawyer personal schedule related functions
	function add_into_personal_schedule($law_id,$date,$time,$notes){
	global $connection;
	$query="insert into personal_schedule(date,time,notes,lawyer_id) values('$date','$time','{$notes}','$law_id')";
	$result_set=mysqli_query($connection,$query);
	confirm_query($result_set);
	return true;
	}
	function find_personal_schedule_by_lawyer_id($lawyer_id){
	global $connection;
	$query="select * from personal_schedule where lawyer_id='$lawyer_id'";
	$result_set=mysqli_query($connection,$query);
	confirm_query($result_set);
	return $result_set;
	}
	function delete_from_personal_schedule_by_lawyer_id($schedule_id,$lawyer_id){
	global $connection;
	$query="delete from personal_schedule where ps_id='$schedule_id' AND lawyer_id='$lawyer_id'";
	$result_set=mysqli_query($connection,$query);
	confirm_query($result_set);
	return true;
	}
	// Lawyer Appointments related functions
	function find_appointments_by_lawyer_id($id){
	global $connection;
	$query="select * from appointments where lawyer_id='$id'";
	$result_set=mysqli_query($connection,$query);
	confirm_query($result_set);
	return $result_set;
	}
	function find_appointments_by_client_id($client_id){
	global $connection;
	$query="select * from appointments where client_id='$client_id'";
	$result_set=mysqli_query($connection,$query);
	confirm_query($result_set);
	return $result_set;
	}
		   ////////////////////////// Client related functions//////////////////////////////////
		
		function client_lawyers($id){
		global $connection;
		$query="select l.name,l.lawyer_id from lawyers_has_clients lhc, lawyers l where lhc.lawyers_lawyer_id=l.lawyer_id
		and clients_client_id='$id'";
		$lawyers_set=mysqli_query($connection,$query);
		confirm_query($lawyers_set);
		return $lawyers_set;
		}
		function find_case_name_by_client_id($id){
		global $connection;
		$query="select * from  cases where client_id='$id'";
		$case_set=mysqli_query($connection,$query);
		confirm_query($case_set);
		return $case_set;
		}
		function find_client_name_by_id($id){
	$query="select name from clients where client_id='$id'";
	global $connection;
	$result_set=mysqli_query($connection,$query);
	confirm_query($result_set);
	return $result_set;
	}
	
		////////////////////////// appointment related Functions/////////////////////////////
		
		function delete_appointment_by_id($appointment_id){
		$query="delete from appointments where appointment_id='$appointment_id'";
	global $connection;
	$result_set=mysqli_query($connection,$query);
	confirm_query($result_set);
	return true;
		}
		function add_new_appointment($lawyer_id,$client_id,$date,$time,$description){
		global $connection;
		$query="insert into appointments(date,time,description,client_id,lawyer_id) 	 
		values('$date','$time','$description','$client_id','$lawyer_id')";
		$result=mysqli_query($connection,$query);
		confirm_query($result);
		return true;
		}
		//////////////////////////case related functions ///////////////////////////
		function find_case_detail_by_case_id($case_id){
		global $connection;
		$query= "SELECT * from cases where case_id='$case_id'";
		$result=mysqli_query($connection,$query);
		confirm_query($result);
		return $result;
		}
		//Message related functions
		function send_lawyer_message_to_client($client_id,$lawyer_id,$message_title,$message,
		$file_name){
		global $connection;
		
		$query="insert into messages(client_id,lawyer_id,title,message,file_name,sender,receiver) 	
		values('$client_id','$lawyer_id','{$message_title}','{$message}','{$file_name}','lawyer'	,'client')";
		$result=mysqli_query($connection,$query);
		confirm_query($result);
		return true;
		}
		// 2.Message 
		function send_client_message_to_lawyer($client_id,$lawyer_id,$message_title,$message,$file_name){
		global $connection;
		$query="insert into messages(client_id,lawyer_id,title,message,file_name,sender,receiver) 	
		values('$client_id','$lawyer_id','{$message_title}','{$message}','{$file_name}','client'	,'lawyer')";
		$result=mysqli_query($connection,$query);
		confirm_query($result);
		return true;
		}
		// 3. Message Client Inbox
		function client_inbox($id){
		global $connection;
		$query="select * from messages where client_id='$id' AND receiver='client'";
		$result=mysqli_query($connection,$query);
		confirm_query($result);
		return $result;
		}
		// 3. Message lawyer Inbox
		function lawyer_inbox($id){
		global $connection;
		$query="select * from messages where lawyer_id='$id' AND receiver='lawyer'";
		$result=mysqli_query($connection,$query);
		confirm_query($result);
		return $result;
		}
		function lawyer_outbox($id){
		global $connection;
		$query="select * from messages where lawyer_id='$id' AND sender='lawyer'";
		$result=mysqli_query($connection,$query);
		confirm_query($result);
		return $result;
		}
		function client_outbox($id){
		global $connection;
		$query="select * from messages where client_id='$id' AND sender='client'";
		$result=mysqli_query($connection,$query);
		confirm_query($result);
		return $result;
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
		/////////////////////courts related function//////////////////////
		function find_court_appearance_detail_by_case_id($case_id){
		global $connection;
		$query="select * from court_appearances where case_id='$case_id'";
		$result=mysqli_query($connection,$query);
		confirm_query($result);
		return $result;
		}
		function find_court_name_by_court_id($court_id){
		global $connection;
		$query="select name from courts where court_id='$court_id'";
		$result=mysqli_query($connection,$query);
		confirm_query($result);
		return $result;
		}
		function find_all_courts(){
		global $connection;
		$query="select * from courts";
		$result=mysqli_query($connection,$query);
		confirm_query($result);
		return $result;
		}
		//////////////////////////Appearance related functions/////////////////////////////
		function add_appearance($case_id,$lawyer_id,$court_id,$date,$time){
		global $connection;
		$query="insert into court_appearances(case_id,lawyer_id,court_id,date,time) 
		values('$case_id','$lawyer_id','$court_id','$date','$time')";
		$result = mysqli_query($connection,$query);
	     confirm_query($result);
		 return true;
		}
		// News related functions
		function find_news(){
		global $connection;
		$query = "SELECT * FROM news ORDER BY news_date DESC";
		$news_set = mysqli_query($connection, $query);
		confirm_query($news_set);
		return $news_set;
		}
		//my Team related functioins
		function our_team(){
		global $connection;
		 $query= "SELECT * FROM our_team";
		 $team_set = mysqli_query($connection,$query);
	     confirm_query($team_set);
		 return $team_set;
		}
		
		function logged_in() {
		return isset($_SESSION['lawyer_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("login.php");
		}
	}
	function confirm_logged_in_check(){
	if (!logged_in()) {
			return 0;
		} else {
		return 1;
		}
	}
	function client_logged_in() {
		return isset($_SESSION['client_id']);
	}
	
	function client_confirm_logged_in() {
		if (!client_logged_in()) {
			redirect_to("login.php");
		}
	}
?>