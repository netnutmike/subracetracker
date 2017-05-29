<?php
		
	$beenhere = false;
	
	if (isset($_REQUEST['uid']) && trim($_REQUEST['uid']) != "")
		$query = "SELECT * from ParticipantHistory where uid='" . trim($_REQUEST['uid']) . "'";
	else if (isset($_REQUEST['participantID']) && trim($_REQUEST['participantID']) != "")
		$query = "SELECT * from ParticipantHistory where ParticipantID='" . trim($_REQUEST['participantID']) . "'";
        else if (isset($_REQUEST['teamID']) && trim($_REQUEST['teamID']) != "")
		$query = "SELECT * from ParticipantHistory where TeamID='" . trim($_REQUEST['teamID']) . "'";
        else
		$query = "SELECT * from ParticipantHistory";
                
        if (isset($_REQUEST['sortBy']) && trim($_REQUEST['sortBy']) != "") {
            switch (trim($_REQUEST['sortBy'])) {
                case 'team':
                    $query .= " ORDER BY TeamID";
                    break;
                    
                case 'participant':
                    $query .= " ORDER BY ParticipantID";
                    break;
                
                case 'timestamp-asc':
                    $query .= " ORDER BY Timestamp";
                    break;
                    
                default:
                    $query .= " ORDER BY Timestamp DESC";
                    break;
            }
        } else {
            $query .= " ORDER BY Timestamp DESC";
        }
		
	//echo $query;
	$request = mysql_query($query);
		
	echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"participantActivity\":[";
	
	while ($rs = mysql_fetch_array($request)) {
		
            $teamquery = "select TeamName from Teams where uid = '" . $rs['TeamID'] . "'";
            //echo $teamquery;
            $teamRequest = mysql_query($teamquery);
            $teamRS = mysql_fetch_array($teamRequest);
            
            $diverquery = "select DiverName from Participants where uid = '" . $rs['ParticipantID'] . "'";
            //echo $teamquery;
            $diverRequest = mysql_query($diverquery);
            $diverRS = mysql_fetch_array($diverRequest);
            
            if ($beenhere)
                    echo ",";

            $beenhere = true;

            echo "{";
            echo "\"uid\":" . $rs['uid'] . ",";
            echo "\"TeamID\":\"" . $rs['TeamID'] . "\",";	
            echo "\"TeamName\":" . json_encode($teamRS['TeamName']) . ",";	
            echo "\"ParticipantID\":\"" . $rs['ParticipantID'] . "\",";	
            echo "\"ParticipantName\":" . json_encode($diverRS['DiverName']) . ",";
            echo "\"Action\":\"" . $rs['Status'] . "\",";	
            echo "\"ActionText\":\"" . GetListData(4, $rs['Status']) . "\",";
            echo "\"TrackedTime\":\"" . $rs['TrackedTime'] . "\",";
            echo "\"Timestamp\":\"" . $rs['Timestamp'] . "\",";
            echo "\"RaceID\":\"" . $rs['RaceID'] . "\"";
            echo "}";
	}
	echo "]}";
	
		?> 