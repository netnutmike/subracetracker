<?
		
	$beenhere = false;
	
	if (isset($_REQUEST['NetworkID']) && trim($_REQUEST['NetworkID']) != "")
		$queryEpisodes = "SELECT * from Shows where NetworkID='" . trim($_REQUEST['NetworkID']) . "' order by Name";
	else
		$queryEpisodes = "SELECT * from Shows order by Name";
		
	//echo $queryEpisodes;
	$request = mysql_query($queryEpisodes);
		
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"shows\":[";
	
	echo "{";
	echo "\"uid\":\"0\",";
	echo "\"Name\":\"All Shows\",";	
	echo "\"RecordTime\":'',";	
	echo "\"RecordDay\":'',";	
	echo "\"Hosts\":'',";		
	echo "\"Description\":'',";		
	echo "\"CategoryName\":'',";	
	echo "\"ShowURL\":'',";	
	echo "\"Subtitle\":'',";	
	echo "\"ArtURL\":'',";	
	echo "\"Explicit\":'',";	
	echo "\"PublishDate\":'',";	
	echo "\"Keywords\":'',";	
	echo "\"ShortName\":'',";	
	echo "\"ShortCode\":'',";	
	echo "\"CategoryID\":'',";	
	echo "\"RokuGraphic\":'',";	
	echo "\"NetworkID\":'',";	
	echo "\"Status\":'',";	
	echo "\"StatusText\":'',";	
	echo "\"NetworkName\":'',";	
	echo "\"CategoryText\":'',";	
	echo "\"EpisodeCount\":'',";	
	echo "\"TotalViews\":'',";	
	echo "\"AverageViews\":'',";	
	echo "\"TotalSeconds\":'',";	
	echo "\"TotalTime\":'',";	
	echo "\"LiveEpisodeCount\":'',";	
	echo "\"EpisodeCountText\":'',";	
	echo "\"TotalFileSize\":'',";	
	echo "\"TotalFileSizeText\":''";	
	echo "}";
		
	while ($rs = mysql_fetch_array($request)) {
		
		//if ($beenhere)
			echo ",";
			
		//$beenhere = true;
		
		if ($rs['Status'] == "1") 
			$StatusText = "Published";
		else
			$StatusText = "Not Published";
		
		$queryval = "SELECT * from Networks where uid='" . $rs['NetworkID'] . "'";
		$valrequest = mysql_query($queryval);
		$valrs = mysql_fetch_array($valrequest);
		$NetworkName = $valrs['Name'];
		
		$queryval = "SELECT * from Categories where uid='" . $rs['CategoryID'] . "'";
		$valrequest = mysql_query($queryval);
		$valrs = mysql_fetch_array($valrequest);
		$CategoryName = $valrs['CategoryName'];
		
		
		echo "{";
		echo "\"uid\":" . $rs['uid'] . ",";
		echo "\"Name\":" . json_encode($rs['Name']) . ",";	
		echo "\"RecordTime\":" . json_encode($rs['RecordTime']) . ",";	
		echo "\"RecordDay\":" . json_encode($rs['RecordDay']) . ",";	
		echo "\"Hosts\":" . json_encode($rs['Hosts']) . ",";	
		echo "\"Description\":" . json_encode($rs['Description']) . ",";	
		echo "\"CategoryName\":" . json_encode($rs['CategoryName']) . ",";
		echo "\"ShowURL\":" . json_encode($rs['ShowURL']) . ",";	
		echo "\"Subtitle\":" . json_encode($rs['Subtitle']) . ",";
		echo "\"ArtURL\":" . json_encode($rs['ArtURL']) . ",";
		echo "\"Explicit\":" . json_encode($rs['Explicit']) . ",";	
		echo "\"PublishDate\":" . json_encode($rs['PublishDate']) . ",";
		echo "\"Keywords\":" . json_encode($rs['Keywords']) . ",";
		echo "\"ShortName\":\"" . $rs['ShortName'] . "\",";
		echo "\"ShortCode\":" . json_encode($rs['ShortCode']) . ",";
		echo "\"CategoryID\":\"" . $rs['CategoryID'] . "\",";
		echo "\"RokuGraphic\":" . json_encode($rs['RokuGraphic']) . ",";
		echo "\"NetworkID\":\"" . $rs['NetworkID'] . "\",";
		echo "\"Status\":\"" . $rs['Status'] . "\",";
		echo "\"StatusText\":\"" . $StatusText . "\",";
		echo "\"NetworkName\":\"" . $NetworkName . "\",";
		echo "\"CategoryText\":\"" . $CategoryName . "\",";
		echo "\"EpisodeCount\":\"" . $rs['EpisodeCount'] . "\",";
		echo "\"TotalViews\":\"" . $rs['TotalViews'] . "\",";
		echo "\"AverageViews\":\"" . $rs['AverageViews'] . "\",";
		echo "\"TotalSeconds\":\"" . $rs['TotalSeconds'] . "\",";
		echo "\"TotalTime\":\"" . $rs['TotalTime'] . "\",";
		echo "\"LiveEpisodeCount\":\"" . $rs['LiveEpisodeCount'] . "\",";
		echo "\"EpisodeCountText\":\"" . $rs['EpisodeCount'] . "/" . $rs['LiveEpisodeCount'] . "\",";
		echo "\"TotalFileSize\":\"" . $rs['TotalFileSize'] . "\",";
		echo "\"TotalFileSizeText\":\"" . toGig($rs['TotalFileSize']) . " GB\"";
		echo "}";
	}
	echo "]}";
	
		?> 