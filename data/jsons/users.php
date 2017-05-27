<?
		
	$beenhere = false;
	
	$queryEpisodes = "SELECT * from Users order by Login";
		
	//echo $queryEpisodes;
	$request = mysql_query($queryEpisodes);
		
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"users\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;

		echo "{";
		echo "\"uid\":" . $rs['uid'] . ",";
		echo "\"Login\":" . json_encode($rs['Login']) . ",";	
		echo "\"Name\":" . json_encode($rs['Name']) . ",";	
		echo "\"Email\":" . json_encode($rs['Email']);	
		echo "}";
	}
	echo "]}";
	
		?> 