<?
	$days = $_REQUEST['days'] * 1;
	$newdate = strtotime("-" . $days . " days");
	
	$beenhere = false;
	$beenhere2 = false;
	
	$queryopendays = "SELECT * from ComplianceTrackingRegionNonCompliance where Date >= '" . date("Y-m-d",$newdate) . 
	"' and Date <= '" . date("Y-m-d") . 
	"' order by Date";
		
	//echo $queryopendays;
	$request = mssql_query($queryopendays);
	$lastdate = '';
		
	echo "{\"totalCount\":[" . $days . "],\"regions\":[";
	
	while ($rs = mssql_fetch_array($request)) {
		
		if ($rs['Date'] != $lastdate && $lastdate != '')
		{
			if ($beenhere)
				echo ",";
				
			$beenhere = true;
		
			echo "{";
			echo "\"Date\":\"" . $lastdate . "\",";
			
			foreach($compdata as $curv) 
			{
				if ($beenhere2)
					echo ",";
					
				$beenhere2 = true;
				echo "\"r" . $curv . "\":\"" . round($rval[$curv]) . "\"";
			}
			echo "}";
			
			$compdata="";
			$rval="";
			$beenhere2 = false;
			
		}
		$lastdate = $rs['Date'];
		$compdata[] = $rs['Region'];
		$rval[$rs['Region']] = $rs['Percentage'];
		
	}
	
	if ($beenhere)
		echo ",";
		
	$beenhere = true;
//print_r($compdata);
	echo "{";
	echo "\"Date\":\"" . $lastdate . "\",";
	foreach($compdata as $curv) 
	{
		if ($beenhere2)
			echo ",";
			
		$beenhere2 = true;
		echo "\"r" . $curv . "\":\"" . round($rval[$curv]) . "\"";
	}
	echo "}";
			
	echo "]}";
	
		?> 