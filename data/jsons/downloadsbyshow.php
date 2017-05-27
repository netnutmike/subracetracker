<?
	$days = $_REQUEST['days'] * 1;
	$newdate = strtotime("-" . $days . " days");
	$dtar = array();
	$showid = array();
	$showname = array();
			
	$showcountquery = "Select count(*) as cnt, sum(Downloads) as sm, ShowID from ShowTracking where Date >= '" . date("Y-m-d", $newdate) .
	"' and Date <= '" . date("Y-m-d") . "' Group by ShowID order by sm DESC";
	
	//echo $showcountquery;
	$request = mysql_query($showcountquery);
	if (mysql_num_rows($request) >= 13)
		$maxshowcount = 12;
	else 
		$maxshowcount = mysql_num_rows($request);
	
	//echo $maxshowcount . "<br>";
	for ($l = 0; $l < $maxshowcount; ++$l){
		$rs = mysql_fetch_array($request);
		$showid[$l] = $rs['ShowID'];
		$shownamequery = "Select Name from Shows where uid = '" . $rs['ShowID'] . "'";
		//echo $shownamequery;
		$request2 = mysql_query($shownamequery);
		$rs2 = mysql_fetch_array($request2);
		$showname[$l] = $rs2['Name'];
	}
	
	for (; $l < 13; ++$l) {
		$showid[$l] = 0;
		$showname[$l] = "";
	}
	
	echo "{\"totalCount\":[" . ($days+1) . "],\"downloadsbyshow\":[";
	$beenhere = false;
	
	
	for ($l = $days; $l >= 0; --$l) {
		$newdate = strtotime("-" . $l . " days");
		$queryopendays = "SELECT sum(Downloads) as cnt, ShowID from ShowTracking where Date >= '" . date("Y-m-d",$newdate) . 
		"' and Date <= '" . date("Y-m-d",$newdate) . "'";
		
		for ($l2 = 0; $l2 < 13; ++$l2) {
			if ($showid[$l2] != 0) {
				$nqueryopendays = $queryopendays . " and ShowID='" . $showid[$l2] . "'";
		
		
				//echo $nqueryopendays;
				$request = mysql_query($nqueryopendays);
				$rs = mysql_fetch_array($request);
				$dayshowvalue[$l2] = $rs['cnt'];
			} else {
				$dayshowvalue[$l2] = 0;
			}
		}
		
				
				
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"Date\":\"" . date("m-d", $newdate) . "\",";
		for ($l2 = 0; $l2 < 13; ++$l2) {
			echo "\"Name" . ($l2+1) . "\":\"" . $showname[$l2] . "\",";
			echo "\"Data" . ($l2+1) . "\":\"" . $dayshowvalue[$l2] . "\"";
			if ($l2 < 12)
				echo ",";
		}
		
				
		echo "}";
				
	}
	echo "]}";
	
		?> 