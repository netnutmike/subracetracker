<?php
			
	$beenhere = false;
	
	$query = "SELECT * from Lists order by ListName";
	
	//echo $query;
	$request = mysql_query($query);
	
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"lists\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"uid\":\"" . $rs['uid'] . "\",";
		echo "\"ListName\":\"" . $rs['ListName'] . "\",";	
		echo "\"SortBy\":\"" . $rs['SortBy'] . "\",";
                echo "\"SortOrder\":\"" . $rs['SortOrder'] . "\"";
		echo "}";
	}
	
	echo "]}";
	
		?> 
