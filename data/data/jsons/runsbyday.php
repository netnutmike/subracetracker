<?php
		
	$beenhere = false;
	$query = "SELECT count(*) as cnt, RaceDate from Races GROUP BY RaceDate order by RaceDate";
                
	//echo $query . "<br>";
	$request = mysql_query($query);
        
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"runsbyday\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"cnt\":\"" . $rs['cnt'] . "\",";	
		echo "\"RaceDate\":\"" . $rs['RaceDate'] . "\"";	
		echo "}";
	}
	echo "]}";
	
		?> 