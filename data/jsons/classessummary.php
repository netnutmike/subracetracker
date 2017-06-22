<?php
		
	$beenhere = false;
	$query = "SELECT count(*) as cnt, Class from Races GROUP BY Class order by Class";
                
	//echo $query . "<br>";
	$request = mysql_query($query);
        
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"classessummary\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"cnt\":\"" . $rs['cnt'] . "\",";	
		echo "\"Class\":\"" . $rs['Class'] . "\",";	
		echo "\"ClassText\":\"" . GetListData(6,$rs['Class']) . "\"";

		echo "}";
	}
	echo "]}";
	
		?> 