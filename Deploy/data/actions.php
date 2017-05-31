<?php 
	include('functions.php'); 
	include('common.php'); 

	$ds = $_REQUEST['dataset'];
	$actn = $_REQUEST['action'];
	
	$logtext = "Action: " . $_REQUEST['action'] . "  Dataset: " . $_REQUEST['dataset'];
	
	if (isset($_POST['uid']) and trim($_POST['uid']) != "")
		$logtext = $logtext . "  uid: " . $_POST['uid'];
	
	//UserLogEntry($_POST['EID'], LOG_TRACKING, $logtext, LOG_API);
	//echo $ds;
        
        if ($_POST['ak'] != $auk)
            $ds = "Invalid Session";
        
	switch ($ds) {
	
		case "Invalid Session":
			//UserLogEntry($_REQUEST['EID'], LOG_SECURITYFAILURE, "Invalid Session", LOG_API);
			echo "Invalid Session";
			break;
		
		default:
			$flname = "actions/" . $actn . "/" . $ds . ".php";
			include($flname);
			break;
			
		}
		?>