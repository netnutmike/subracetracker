<?
	$days = $_REQUEST['days'] * 1;
	$newdate = strtotime("-" . $days . " days");
	
	$beenhere = false;
	
	$queryopendays = "SELECT * from ComplianceTracking where Date >= '" . date("Y-m-d",$newdate) . 
	"' and Date <= '" . date("Y-m-d") . 
	"' order by Date";
		
	//echo $queryopendays;
	$request = mssql_query($queryopendays);
		
	echo "{\"totalCount\":[" . mssql_num_rows($request) . "],\"officescan\":[";
	
	while ($rs = mssql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"Date\":\"" . date("m-d", strtotime($rs['Date'])) . "\",";
		echo "\"OfficeScan\":\"" . $rs['OfficeScan'] . "\"";	
		echo "}";
	}
	echo "]}";
	
		?> 