<?
	$days = $_REQUEST['days'] * 1;
	$newdate = strtotime("-" . $days . " days");
	$dtar = array();
			
	$beenhere = false;
	
	$queryopendays = "SELECT count(*) as cnt, Feeds.Description from DownloadTracking, Links, Feeds where Links.uid = DownloadTracking.LinkID and Feeds.uid = Links.FeedID and DownloadTracking.Timestamp >= '" . date("Y-m-d",$newdate) . 
	" 00:00:00' and DownloadTracking.Timestamp <= '" . date("Y-m-d H:i:s") . 
	"' group by Description order by cnt DESC";
	
	//echo $queryopendays;
	$request = mysql_query($queryopendays);
	
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"downloadsbytype\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"TypeName\":\"" . trim($rs['Description']) . "\",";
		echo "\"Count\":\"" . $rs['cnt'] . "\"";		
		echo "}";
	}
	
	echo "]}";
	
		?> 