<?php
		
	$beenhere = false;
	
	if (isset($_REQUEST['teamID']) && trim($_REQUEST['teamID']) != "")
		$query = "SELECT * from Teams where uid='" . trim($_REQUEST['participntID']) . "'";
	else
		$query = "SELECT * from Participants";
                
        if (isset($_REQUEST['sortBy']) && trim($_REQUEST['sortBy']) != "") {
            switch (trim($_REQUEST['sortBy'])) {
                case 'team':
                    $query .= " ORDER BY TeamID";
                    break;
                    
                case 'status':
                    $query .= " ORDER BY Status";
                    break;
                    
                default:
                    $query .= " ORDER BY DiverName";
                    break;
            }
        } else {
            $query .= " ORDER BY DiverName";
        }
		
	//echo $query;
	$request = mysql_query($query);
		
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"participants\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
            $teamquery = "select TeamName from Teams where uid = '" . $rs['TeamID'] . "'";
            //echo $teamquery;
            $teamRequest = mysql_query($teamquery);
            $teamRS = mysql_fetch_array($teamRequest);
            
            if ($beenhere)
                    echo ",";

            $beenhere = true;

            echo "{";
            echo "\"uid\":" . $rs['uid'] . ",";
            echo "\"TeamID\":\"" . $rs['TeamID'] . "\",";	
            echo "\"TeamName\":" . json_encode($teamRS['TeamName']) . ",";	
            echo "\"DiverName\":" . json_encode($rs['DiverName']) . ",";	
            echo "\"Status\":\"" . $rs['Status'] . "\",";	
            echo "\"StatusText\":\"" . GetListData(2, $rs['Status']) . "\",";
            echo "}";
	}
	echo "]}";
	
		?> 