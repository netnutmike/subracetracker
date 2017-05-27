<?
		
	$beenhere = false;
	
	if (isset($_REQUEST['ShowID']) && trim($_REQUEST['ShowID']) != "")
		$queryEpisodes = "SELECT Shows.Name as ShowName, Episodes.* from Episodes, Shows where Shows.uid = Episodes.ShowID and ShowID='" . trim($_REQUEST['ShowID']) . "' order by PublishDate DESC";
	else
		$queryEpisodes = "SELECT Shows.Name as ShowName, Episodes.* from Episodes, Shows where Shows.uid = Episodes.ShowID order by PublishDate DESC";
		
	//echo $queryEpisodes;
	$request = mysql_query($queryEpisodes);
		
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"episodes\":[";
	
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
		echo "\"ShowName\":" . json_encode($rs['ShowName']) . ",";	
		echo "\"Description\":" . json_encode($rs['Description']) . ",";	
		echo "\"Hosts\":" . json_encode($rs['Hosts']) . ",";	
		echo "\"Guests\":" . json_encode($rs['Guests']) . ",";	
		echo "\"Duration\":" . json_encode($rs['Duration']) . ",";	
		echo "\"RecordedDateTime\":" . json_encode($rs['RecordedDateTime']) . ",";	
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
	echo "]}";
	
		?> 