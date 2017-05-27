<?
		
	$beenhere = false;
	
	$queryopendays = "SELECT * from ComplianceTrackingTopMarshas2 where Date='" . date("Y-m-d") . "' order by Count DESC";
		
	//echo $queryopendays;
	$request = mssql_query($queryopendays);
		
	echo "{\"totalCount\":[" . mssql_num_rows($request) . "],\"marshas\":[";
	
	while ($rs = mssql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"Marsha\":" . json_encode(trim($rs['Marsha'])) . ",";
		echo "\"Count\":\"" . $rs['Count'] . "\",";	
		echo "\"Percentage\":\"" . $rs['Percentage'] . "\",";	
		echo "\"MissingAV\":\"" . $rs['MissingAV'] . "\",";	
		echo "\"MissingAVPercentage\":\"" . $rs['MissingAVPercentage'] . "\",";	
		echo "\"OldPattern\":\"" . $rs['OldPattern'] . "\",";	
		echo "\"OldPatternPercentage\":\"" . $rs['OldPatternPercentage'] . "\",";	
		echo "\"TotalCount\":\"" . $rs['TotalCount'] . "\",";
		echo "\"CountText\":\"" . $rs['Count'] . " (" . $rs['Percentage'] . "%)\",";
		echo "\"OldPatternText\":\"" . $rs['OldPattern'] . " (" . $rs['OldPatternPercentage'] . "%)\",";	
		echo "\"MissingAVText\":\"" . $rs['MissingAV'] . " (" . $rs['MissingAVPercentage'] . "%)\"";
		echo "}";
	}
	echo "]}";
	
		?> 