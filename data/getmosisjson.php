<? 
	$DBHost = "marrwiki2.marriott.com";
  	$DBUser = "cmsdb";
  	$DBPass = "cmsdbpa55";
	
	$zoodb = mssql_connect($DBHost, $DBUser, $DBPass);
	mssql_select_db('malwarezoo');
	
	include('../functions.php');

	$ds = $_REQUEST['dataset'];

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
			include($flname);
			break;
			
		}
		?>