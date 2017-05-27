<?

	$queryopendays = "SELECT * from MCARuns where Status <> '0' or Status = NULL";
	
	//echo $queryopendays;
	$request = mssql_query($queryopendays);
	
	echo "{\"totalCount\":[" . mssql_num_rows($request) . "],\"running\":[";
	
	while ($rs = mssql_fetch_array($request)) {
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		$actiontext = "";
		
		//if (trim($rs['ActionTaken']) != '')
		//	$actiontext .= "(" . $rs['ActionTaken'] . ")" . GetListData('2', $rs['ActionTaken']) . " ";
		
		if (trim($rs['ActionTakenText']) != '')
			$actiontext .= "(" . trim($rs['ActionTakenText']) . ")" . trim(GetListData('1', $rs['ActionTakenText'])) . " ";
		
		if (trim($rs['ActionResult']) != '')
			$actiontext .= "(" . trim($rs['ActionResult']) . ")" . trim(GetListData('2', $rs['ActionResult'])) . " ";
		
			
		echo "{";
		echo "\"Name\":\"" . $rs['MachineName'] . "\",";
		echo "\"Submitted\":\"" . $rs['Date'] . " " . $rs['Time'] . "\",";
		echo "\"Updated\":\"" . $rs['LastUpdate'] . "\",";
		echo "\"Status\":\"" . trim(GetListData('11', $rs['Status'])) . "\"";		
		echo "}";
	}
	
	echo "]}";
	
		?> 