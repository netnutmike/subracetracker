<?php
		
	$beenhere = false;
	$query = "SELECT SUM(if(Status = '4',1,0)) as GoodRuns, SUM(if(Status = '3',1,0)) as BadRuns, RaceDate, RaceHour from Races GROUP BY RaceDate, RaceHour order by RaceDate, RaceHour";
                
	//echo $query . "<br>";
	$request = mysql_query($query);
        
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"runssummary\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"Time\":\"" . date("d", strtotime($rs['RaceDate'])) . "/" . $rs['RaceHour'] . "\",";	
		echo "\"GoodRuns\":\"" . $rs['GoodRuns'] . "\",";
                echo "\"BadRuns\":\"" . $rs['BadRuns'] . "\"";
		echo "}";
	}
	echo "]}";
	
		?> 