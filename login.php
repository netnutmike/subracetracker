<?php 

	include('data/common.php');
	include('data/functions.php'); 
	
	if (!isset($_POST['authenticity_token']))
	  	$authtok="";
	else 
		$authtok = $_POST['authenticity_token'];
	//echo $authtok . "...";
	
	echo $adminPass;
	if ($authtok == "KG4us46g8uj5tfuhDuuS/bLPC1yQ/uwBw5FEHr8w93oKs=" &&  trim($_POST['password']) == $adminPass) {

		$sessionstring = $_POST['password'] . date('Ymdhis');
		$sessionid = md5($sessionstring);
		setcookie("SID", $sessionid, time() + 10800);
		setcookie("SID", $sessionid, time() + 10800, "/");

		header('Content-Type: application/json');
		echo "{\"success\" : true, \"msg\" : \"Logged In\"}";
    		
		
	} else if (trim($_REQUEST['authenticity_token']) == "") {
	
		//sign out

		setcookie("SID", "", time());
		setcookie("SID", "", time(), "/");
				
		$msgtxt = "Logout Successful!";
		$msgtype = "success-box";
	} else {
		header('Content-Type: application/json');
		echo "{\"success\" : false, \"msg\" : \"Login Failure: Access Denied\"}";
	}
	


?>