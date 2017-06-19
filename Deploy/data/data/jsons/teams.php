<?php
		
	$beenhere = false;
	
	if (isset($_REQUEST['teamID']) && trim($_REQUEST['teamID']) != "")
		$query = "SELECT * from Teams where uid='" . trim($_REQUEST['teamID']) . "'";
	else
		$query = "SELECT * from Teams";
                
        if (isset($_REQUEST['sortBy']) && trim($_REQUEST['sortBy']) != "") {
            switch (trim($_REQUEST['sortBy'])) {
                case 'schoolName':
                    $query .= " ORDER BY SchoolName";
                    break;
                    
                case 'subName':
                    $query .= " ORDER BY SubName";
                    break;
                    
                case 'status':
                    $query .= " ORDER BY Status";
                    break;
                    
                default:
                    $query .= " ORDER BY TeamName";
                    break;
            }
        } else {
            $query .= " ORDER BY TeamName";
        }
		
	//echo $query . "<br>";
	$request = mysql_query($query);
		
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"teams\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"uid\":" . $rs['uid'] . ",";
		echo "\"TeamName\":" . json_encode($rs['TeamName']) . ",";	
		echo "\"SchoolName\":" . json_encode($rs['SchoolName']) . ",";	
		echo "\"SubName\":" . json_encode($rs['SubName']) . ",";	
		echo "\"Status\":\"" . $rs['Status'] . "\",";	
		echo "\"StatusText\":\"" . GetListData(1, $rs['Status']) . "\",";	
		echo "\"Lane\":\"" . $rs['Lane'] . "\",";
                echo "\"LaneText\":\"" . GetListData(8, $rs['Lane']) . "\",";
		echo "\"Class\":\"" . $rs['Class'] . "\",";	
		echo "\"ClassText\":\"" . GetListData(6,$rs['Class']) . "\",";
		echo "\"Notes\":" . json_encode($rs['Notes']);
		echo "}";
	}
	echo "]}";
	
		?> 