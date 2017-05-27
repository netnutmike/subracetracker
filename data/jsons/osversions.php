<?
	$days = $_REQUEST['days'] * 1;
	$newdate = strtotime("-" . $days . " days");
	
	$beenhere = false;
	
	$queryopendays = "SELECT * from ComplianceTracking where Date >= '" . date("Y-m-d",$newdate) . 
	"' and Date <= '" . date("Y-m-d") . 
	"' order by Date";
		
	//echo $queryopendays;
	$request = mssql_query($queryopendays);
		
	echo "{\"totalCount\":[" . mssql_num_rows($request) . "],\"versions\":[";
	
	while ($rs = mssql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"Date\":\"" . date("m-d", strtotime($rs['Date'])) . "\",";
		echo "\"WinXP\":\"" . $rs['WinXP'] . "\",";	
		echo "\"WinXPSP1\":\"" . $rs['WinXPSP1'] . "\",";	
		echo "\"WinXPSP2\":\"" . $rs['WinXPSP2'] . "\",";	
		echo "\"WinXPSP3\":\"" . $rs['WinXPSP3'] . "\",";	
		echo "\"Windows7\":\"" . $rs['Windows7'] . "\",";	
		echo "\"WindowsCE\":\"" . $rs['WindowsCE'] . "\",";	
		echo "\"Windows2000\":\"" . $rs['Windows2000'] . "\",";	
		echo "\"Windows2003\":\"" . $rs['Windows2003'] . "\",";	
		echo "\"Windows2003SP1\":\"" . $rs['Windows2003SP1'] . "\",";	
		echo "\"Windows2003SP2\":\"" . $rs['Windows2003SP2'] . "\",";	
		echo "\"Windows7SP1\":\"" . $rs['Windows7SP1'] . "\",";	
		echo "\"Windows2000SP1\":\"" . $rs['Windows2000SP1'] . "\",";	
		echo "\"Windows2000SP2\":\"" . $rs['Windows2000SP2'] . "\",";	
		echo "\"Windows2000SP3\":\"" . $rs['Windows2000SP3'] . "\",";	
		echo "\"Windows2000SP4\":\"" . $rs['Windows2000SP4'] . "\",";	
		echo "\"Windows2008\":\"" . $rs['Windows2008'] . "\"";	
		echo "}";
	}
	echo "]}";
	
		?> 