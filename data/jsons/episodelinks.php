<?
		
	$beenhere = false;
	
	$queryEpisodes = "SELECT Links.*, Feeds.Description from Links, Feeds where Feeds.uid = Links.FeedID and Links.EpisodeID='" . trim($_REQUEST['EpisodeID']) . "' order by Description";
			
	//echo $queryEpisodes;
	$request = mysql_query($queryEpisodes);
		
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"links\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		if ($rs['Status'] == "1") {
			if ($rs['PublishDate'] <= date("Y-m-d")) {
				$StatusText = "Published";
				$StatusVal = "1";
			} else {
				$StatusText = "Scheduled";
				$StatusVal = "2";
			}
		} else {
			$StatusText = "Not Published";
			$StatusVal = "0";
		}
		
		echo "{";
		echo "\"uid\":" . $rs['uid'] . ",";
		echo "\"ShowID\":\"" . $rs['ShowID'] . "\",";	
		echo "\"FeedID\":" . json_encode($rs['FeedID']) . ",";	
		echo "\"EpisodeID\":" . json_encode($rs['EpisodeID']) . ",";	
		echo "\"URL\":" . json_encode($rs['URL']) . ",";	
		echo "\"FileSize\":" . json_encode($rs['FileSize']) . ",";	
		echo "\"Duration\":" . json_encode($rs['Duration']) . ",";	
		echo "\"Type\":" . json_encode($rs['Type']) . ",";	
		echo "\"NetworkID\":" . json_encode($rs['NetworkID']) . ",";
		echo "\"Description\":" . json_encode($rs['Description']);
		echo "}";
	}
	echo "]}";
	
		?> 