<?
	$days = $_REQUEST['days'] * 1;
	$newdate = strtotime("-" . $days . " days");
	$dtar = array();
			
	$beenhere = false;
	
	$queryopendays = "SELECT TOP 10 count(*) as cnt, MalwareName from Logs where DateTimeOfEvent >= '" . date("Y-m-d",$newdate) . 
	" 00:00:00' and DateTimeOfEvent <= '" . date("Y-m-d H:i:s") . 
	"' and MalwareName not LIKE 'Possible_%' group by MalwareName order by cnt DESC";
	
	$queryopendays = "select Incidents.EventType, TableValues.ItemText, TableValues.ExtraNum, count(*) as cnt from CMSDB.Incidents, CMSDB.TableValues 
	where TableValues.ListID='30' and TableValues.Value=Incidents.EventType and DateOccured >= '" . $StartDate . "' AND DateOccured <= '" . $EndDate . 
	"' Group by EventType order by ExtraNum";
	
	//echo $queryopendays;
	$request = mssql_query($queryopendays);
	
	echo "{\"totalCount\":[" . mssql_num_rows($request) . "],\"EventTypes\":[";
	
	while ($rs = mssql_fetch_array($request)) {
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"Name\":\"" . $rs['ItemText'] . "\",";
		echo "\"Count\":\"" . $rs['cnt'] . "\"";		
		echo "}";
	}
	
	echo "]}";
	
		?> 