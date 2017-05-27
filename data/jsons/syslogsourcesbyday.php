<?
	
	
	//Define Zoo Database Credentials
//Define Syslog Database Credentials
	$DBHost = "lnxprd0272.marriott.com";
	$DBUser = "MalwareZoo";
	$DBPass = "2wsxRFV6yhn*IK";
	$DBName = "Syslog";
	mysql_pconnect("$DBHost","$DBUser","$DBPass");
	
	$days = $_REQUEST['hours'] * 1;
	$newdate = strtotime("-" . $days . " hours");
	$dtar = array();
			
	echo "{\"totalCount\":[" . ($days+1) . "],\"sources\":[";
	$beenhere = false;
	
	for ($l = $days; $l >= 0; --$l) {
		$newdate = strtotime("-" . $l . " hours");
		$newdate2 = strtotime("-" . ( $l - 1 ) . " hours");
		$queryopendays = "SELECT count(*) as cnt, FromHost from Syslog.SystemEvents where ReceivedAt >= '" . date("Y-m-d H:i:s", $newdate) . 
		"' and ReceivedAt <= '" . date("Y-m-d H:i:s", $newdate2) . "' group by FromHost order by FromHost";
		
		$dtar[1] = '0';
		$dtar['hdqncvmavfws1'] = '0';
		$dtar[3] = '0';
		
		//echo $queryopendays;
		$request = mysql_query($queryopendays);
		while ($rs = mysql_fetch_array($request)) {
			//print_r($rs);
			//echo "in";
			$dtar[$rs['FromHost']] = $rs['cnt'];
		}
		
		//print_r($dtar);
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"Date\":\"" . date("H", $newdate) . "\",";
		echo "\"OfficeScan\":\"0\",";
		echo "\"CPM\":\"" . $dtar['hdqncvmavfws1'] . "\",";
		echo "\"DeepSecurity\":\"" . $dtar[3] . "\"";
		
		echo "}";
	}
	echo "]}";
	
		?> 