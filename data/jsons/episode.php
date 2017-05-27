<?
	
	$queryEpisodes = "SELECT * from Episodes where uid = '" . $_REQUEST['id'] . "'";
		
	//echo $queryEpisodes;
	$request = mysql_query($queryEpisodes);
		
	echo "{success: true, data:";
	
	while ($rs = mysql_fetch_array($request)) {
		
		$queryshowname = "SELECT * FROM Shows where uid='" . $rs['ShowID'] . "'";
		$showrequest = mysql_query($queryshowname);
		$showrs = mysql_fetch_array($showrequest);
		$ShowName = $showrs['Name'];
		
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
		echo "\"ShowName\":" . json_encode($ShowName) . ",";	
		echo "\"Description\":" . json_encode($rs['Description']) . ",";	
		echo "\"Hosts\":" . json_encode($rs['Hosts']) . ",";	
		echo "\"Guests\":" . json_encode($rs['Guests']) . ",";	
		echo "\"Duration\":" . json_encode($rs['Duration']) . ",";	
		echo "\"RecordedDateTime\":" . json_encode(date("Y-m-d", strtotime($rs['RecordedDateTime']))) . ",";	
		echo "\"LinkToShowNotes\":" . json_encode($rs['LinkToShowNotes']) . ",";
		echo "\"Keywords\":" . json_encode($rs['Keywords']) . ",";
		echo "\"Title\":" . json_encode($rs['Title']) . ",";	
		echo "\"Subtitle\":" . json_encode($rs['Subtitle']) . ",";
		echo "\"ImageURL\":" . json_encode($rs['ImageURL']) . ",";
		echo "\"Explicit\":\"" . $rs['Explicit'] . "\",";
		echo "\"PublishDate\":" . json_encode($rs['PublishDate']) . ",";
		echo "\"EpisodeNumber\":\"" . $rs['EpisodeNumber'] . "\",";
		echo "\"RokuGraphic\":" . json_encode($rs['RokuGraphic']) . ",";
		echo "\"NetworkID\":\"" . $rs['NetworkID'] . "\",";
		echo "\"Status\":\"" . $StatusVal . "\",";
		echo "\"StatusText\":\"" . $StatusText . "\"";
		echo "}";
	}
	echo "}";
	
		?> 