<?
		
	$beenhere = false;
	
	$queryopendays = "SELECT * from ComplianceTrackingTopMachines2 order by Days DESC";
		
	//echo $queryopendays;
	$request = mssql_query($queryopendays);
		
	echo "{\"totalCount\":[" . mssql_num_rows($request) . "],\"computers\":[";
	
	while ($rs = mssql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"MachineName\":" . json_encode(trim($rs['MachineName'])) . ",";
		echo "\"Days\":\"" . $rs['Days'] . "\",";
		echo "\"IPAddress\":\"" . $rs['IPAddress'] . "\"";	
		echo "}";
	}
	echo "]}";
	
		?> 