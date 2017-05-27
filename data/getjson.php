<? 
	include('common.php');
	//include('../functions.php');

	$ds = $_REQUEST['dataset'];
	//echo $ds;
	
	switch ($ds) {
	
		case "Invalid Session":
			UserLogEntry($_REQUEST['UserID'], LOG_SECURITYFAILURE, "Invalid Session", LOG_API);
			echo "{\"totalCount\":[1],\"session\":[";
	
			echo "{";
			echo "\"good\":\"no\",";
			echo "\"message\":\"Invalid Session\"";
			echo "}";
			echo "]}";
			break; 
		
		default:
			$flname = "jsons/" . $ds . ".php";
			//echo $flname;
			include($flname);
			//echo "after file";
			break;
			
		}

		?>