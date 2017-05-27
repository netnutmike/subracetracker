<?
		
	$beenhere = false;
	
	$queryopendays = "SELECT * from ComplianceTrackingTopMarshaSupportingData where Marsha='" . $_REQUEST['marsha'] . "'";
	$request = mssql_query($queryopendays);
		
	echo "{\"totalCount\":[" . mssql_num_rows($request) . "],\"machines\":[";
	
	while ($rs = mssql_fetch_array($request)) {

		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"Marsha\":" . json_encode(trim($rs['Marsha'])) . ",";
		echo "\"MachineName\":\"" . $rs['MachineName'] . "\",";	
		echo "\"EID\":\"" . $rs['EID'] . "\",";	
		echo "\"Name\":\"" . $rs['Name'] . "\",";	
		echo "\"Description\":\"" . $rs['Description'] . "\",";	
		echo "\"UserDomain\":\"" . $rs['UserDomain'] . "\",";	
		echo "\"EmailAddress\":\"" . $rs['EmailAddress'] . "\",";	
		echo "\"DeviceID\":\"" . $rs['DeviceID'] . "\",";	
		echo "\"DaysOutOfCompliance\":\"" . $rs['DaysOutOfCompliance'] . "\",";	
		echo "\"ComplianceReason\":\"" . $rs['ComplianceReason'] . "\",";	
		echo "\"LastLogin\":\"" . $rs['LastLogin'] . "\"";
		echo "}";
	}
	echo "]}";
	
		?> 