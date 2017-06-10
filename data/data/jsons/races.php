<?php
		
	$beenhere = false;
	
	if (isset($_REQUEST['uid']) && trim($_REQUEST['uid']) != "")
            $query = "SELECT * from Races where uid='" . trim($_REQUEST['uid']) . "'";
	else if (isset($_REQUEST['class']) && trim($_REQUEST['class']) != "")
            $query = "SELECT * from Races where Class='" . trim($_REQUEST['class']) . "'";
        else if (isset($_REQUEST['status']) && trim($_REQUEST['status']) != "")
            $query = "SELECT * from Races where Status='" . trim($_REQUEST['status']) . "'";
        else if (isset($_REQUEST['teamID']) && trim($_REQUEST['teamID']) != "")
            $query = "SELECT * from Races where TeamID='" . trim($_REQUEST['teamID']) . "'";
        else if (isset($_REQUEST['date']) && trim($_REQUEST['date']) != "")
            $query = "SELECT * from Races where RaceDate='" . trim($_REQUEST['date']) . "'";
        else if (isset($_REQUEST['scored']) && trim($_REQUEST['scored']) != "")
            if (trim($_REQUEST['scored']) == "yes") {
		$query = "SELECT * from Races where Status = '4'";
            } else {
                $query = "SELECT * from Races where Status <> '4'";
            }
        else
		$query = "SELECT * from Races";
                
        if (isset($_REQUEST['sortBy']) && trim($_REQUEST['sortBy']) != "") {
            switch (trim($_REQUEST['sortBy'])) {
                case 'team':
                    $query .= " ORDER BY TeamID";
                    break;
                    
                case 'status':
                    $query .= " ORDER BY Status";
                    break;
                
                case 'class':
                    $query .= " ORDER BY Class";
                    break;
                
                case 'startTime':
                    $query .= " ORDER BY StartTime";
                    break;
                    
                default:
                    $query .= " ORDER BY RaceID";
                    break;
            }
        } else {
            $query .= " ORDER BY RaceID";
        }
		
	//echo $query;
	$request = mysql_query($query);
		
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"races\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
            $teamquery = "select TeamName from Teams where uid = '" . $rs['TeamID'] . "'";
            //echo $teamquery;
            $teamRequest = mysql_query($teamquery);
            $teamRS = mysql_fetch_array($teamRequest);
            
            if ($beenhere)
                    echo ",";

            $beenhere = true;

            echo "{";
            echo "\"uid\":\"" . $rs['uid'] . "\",";
            echo "\"RaceID\":\"" . $rs['RaceID'] . "\",";
            echo "\"TeamID\":\"" . $rs['TeamID'] . "\",";	
            echo "\"TeamName\":" . json_encode($teamRS['TeamName']) . ",";	
            echo "\"StartTime\":\"" . $rs['StartTime'] . "\",";	
            echo "\"FinishTime\":\"" . $rs['FinishTime'] . "\",";	
            echo "\"Time1\":\"" . $rs['Time1'] . "\",";
            echo "\"Time2\":\"" . $rs['Time2'] . "\",";
            echo "\"Time3\":\"" . $rs['Time3'] . "\",";
            echo "\"Time4\":\"" . $rs['Time4'] . "\",";
            echo "\"Status\":\"" . $rs['Status'] . "\",";
            echo "\"StatusText\":\"" . GetListData(3, $rs['Status']) . "\",";
            echo "\"Class\":\"" . $rs['Class'] . "\",";
            echo "\"ClassText\":\"" . GetListData(5, $rs['Class']) . "\",";
            echo "\"RaceDate\":\"" . $rs['RaceDate'] . "\",";
            echo "\"Notes\":\"" . $rs['Notes'] . "\"";
            echo "}";
	}
	echo "]}";
	
		?> 