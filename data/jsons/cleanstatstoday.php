<?
	$days = $_REQUEST['days'] * 1;
	$newdate = strtotime("-" . $days . " days");
	$dtar = array();
			
	$beenhere = false;
	
	$queryopendays = "SELECT count(*) as cnt, ActionTaken, ActionTakenText, ActionTakenText2 from Logs where DateTimeOfEvent >= '" . date("Y-m-d", $newdate) . 
	" 00:00:00' and DateTimeOfEvent <= '" . date("Y-m-d H:i:s") . 
	"' group by ActionTaken, ActionTakenText, ActionTakenText2 order by cnt DESC";
	
	//echo $queryopendays;
	$request = mssql_query($queryopendays);
	
	echo "{\"totalCount\":[" . mssql_num_rows($request) . "],\"cleanstats\":[";
	
	while ($rs = mssql_fetch_array($request)) {
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		$actiontext = "";
		
		//if (trim($rs['ActionTaken']) != '')
		//	$actiontext .= "(" . $rs['ActionTaken'] . ")" . GetListData('2', $rs['ActionTaken']) . " ";
		
		if (trim($rs['ActionTakenText']) != '')
			$actiontext .= "(" . trim($rs['ActionTakenText']) . ")" . trim(GetListData('1', $rs['ActionTakenText'])) . " ";
		
		if (trim($rs['ActionResult']) != '')
			$actiontext .= "(" . trim($rs['ActionResult']) . ")" . trim(GetListData('2', $rs['ActionResult'])) . " ";
		
			
		echo "{";
		echo "\"ActionResult\":\"" . $actiontext . "\",";
		echo "\"Count\":\"" . $rs['cnt'] . "\"";		
		echo "}";
	}
	
	echo "]}";
	
		?> 