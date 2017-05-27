<?
		
	$beenhere = false;
	
	$queryEpisodes = "SELECT * from Categories order by CategoryName";
		
	//echo $queryEpisodes;
	$request = mysql_query($queryEpisodes);
		
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"categories\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		if ($rs['Status'] == "1") 
			$StatusText = "Active";
		else
			$StatusText = "Disabled";
		
		echo "{";
		echo "\"uid\":" . $rs['uid'] . ",";
		echo "\"CategoryName\":" . json_encode($rs['CategoryName']) . ",";	
		echo "\"OrderNum\":\"" . $rs['OrderNum'] . "\",";	
		echo "\"Description\":" . json_encode($rs['Description']) . ",";	
		echo "\"ImageURL\":" . json_encode($rs['ImageURL']) . ",";	
		echo "\"ImageURLHD\":" . json_encode($rs['ImageURLHD']) . ",";	
		echo "\"Status\":\"" . $rs['Status'] . "\",";
		echo "\"StatusText\":" . json_encode($StatusText) . ",";	
		echo "\"Network\":\"" . $rs['Network'] . "\",";
		echo "\"Networks\":" . json_encode($rs['Network']);
		echo "}";
	}
	echo "]}";
	
		?> 