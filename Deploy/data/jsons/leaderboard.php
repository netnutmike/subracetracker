<?php
		
	$beenhere = false;
	$query = "SELECT * from Teams where BestSpeed is not NULL and BestSpeed > 0 order by BestSpeed";
                
	//echo $query . "<br>";
	$request = mysql_query($query);
	
        $curpos = 0;
        
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"leaderboard\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
                $curpos += 1;
		
		echo "{";
		echo "\"uid\":" . $rs['uid'] . ",";
                echo "\"Position\":\"" . $curpos . "\",";
		echo "\"TeamName\":" . json_encode($rs['TeamName']) . ",";	
		echo "\"SchoolName\":" . json_encode($rs['SchoolName']) . ",";	
		echo "\"SubName\":" . json_encode($rs['SubName']) . ",";	
		echo "\"Status\":\"" . $rs['Status'] . "\",";	
		echo "\"StatusText\":\"" . GetListData(1, $rs['Status']) . "\",";	
		echo "\"Class\":\"" . $rs['Class'] . "\",";	
		echo "\"ClassText\":\"" . GetListData(6,$rs['Class']) . "\",";
                echo "\"BestSpeed\":\"" . $rs['BestSpeed'] . "\",";
                echo "\"BestRunID\":\"" . $rs['BestRunID'] . "\"";
		echo "}";
	}
	echo "]}";
	
		?> 