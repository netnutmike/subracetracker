<?
		
	$beenhere = false;
	
	$queryEpisodes = "SELECT * from Networks order by Name";
		
	//echo $queryEpisodes;
	$request = mysql_query($queryEpisodes);
		
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"networks\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"uid\":" . $rs['uid'] . ",";
		echo "\"Name\":" . json_encode($rs['Name']);	
		echo "}";
	}
	echo "]}";
	
		?> 