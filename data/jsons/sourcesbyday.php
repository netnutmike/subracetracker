<?
	$days = $_REQUEST['days'] * 1;
	$newdate = strtotime("-" . $days . " days");
	$dtar = array();
			
	echo "{\"totalCount\":[" . ($days+1) . "],\"sources\":[";
	$beenhere = false;
	
	for ($l = $days; $l >= 0; --$l) {
		$newdate = strtotime("-" . $l . " days");
		$queryopendays = "SELECT count(*) as cnt, Source from Logs where DateTimeOfEvent >= '" . date("Y-m-d",$newdate) . 
		" 00:00:00' and DateTimeOfEvent <= '" . date("Y-m-d",$newdate) . 
		" 23:59:59'group by Source order by Source";
		
		$dtar[1] = '0';
		$dtar[2] = '0';
		$dtar[3] = '0';
		
		//echo $queryopendays;
		$request = mssql_query($queryopendays);
		while ($rs = mssql_fetch_array($request)) {
			$dtar[$rs['Source']] = $rs['cnt'];
		}
		
		//print_r($dtar);
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"Date\":\"" . date("m-d", $newdate) . "\",";
		echo "\"OfficeScan\":\"" . $dtar[2] . "\",";
		echo "\"CPM\":\"" . $dtar[1] . "\",";
		echo "\"DeepSecurity\":\"" . $dtar[3] . "\"";
		
		echo "}";
	}
	echo "]}";
	
		?> 