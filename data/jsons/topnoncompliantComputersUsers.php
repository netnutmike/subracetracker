<?
		
	$beenhere = false;
	
	$queryopendays = "SELECT * from ComplianceTrackingTopMarshaSupportingData where MachineName='" . $_REQUEST['machine'] . "'";
	$request = mssql_query($queryopendays);
		
	echo "{\"totalCount\":[" . mssql_num_rows($request) . "],\"users\":[";
	
	while ($rs = mssql_fetch_array($request)) {

		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"MachineName\":\"" . trim($rs['MachineName']) . "\",";	
		echo "\"EID\":\"" . trim($rs['EID']) . "\",";	
		echo "\"Name\":\"" . trim($rs['Name']) . "\",";	
		echo "\"Description\":\"" . trim($rs['Description']) . "\",";	
		echo "\"UserDomain\":\"" . trim($rs['UserDomain']) . "\",";	
		echo "\"EmailAddress\":\"" . trim($rs['EmailAddress']) . "\",";
		echo "\"LastLogin\":\"" . trim($rs['LastLogin']) . "\"";
		echo "}";
	}
	echo "]}";
	
		?> 