<?php
		
	$beenhere = false;
	
	if (isset($_REQUEST['uid']) && trim($_REQUEST['uid']) != "") {
		$query = "SELECT * from Participants where uid='" . trim($_REQUEST['uid']) . "'";
                //echo $query;
                
                $request = mysql_query($query);

                echo "{success: true,";

                $rs = mysql_fetch_array($request);

                $teamquery = "select TeamName from Teams where uid = '" . $rs['TeamID'] . "'";
                //echo $teamquery;
                $teamRequest = mysql_query($teamquery);
                $teamRS = mysql_fetch_array($teamRequest);

                echo " data: {";
                echo "\"uid\":" . $rs['uid'] . ",";
                echo "\"DiverID\":\"" . $rs['DiverID'] . "\",";
                echo "\"TeamID\":\"" . $rs['TeamID'] . "\",";	
                echo "\"TeamName\":" . json_encode($teamRS['TeamName']) . ",";	
                echo "\"DiverName\":\"" . $rs['DiverName'] . "\",";	
                echo "\"Status\":\"" . $rs['Status'] . "\",";
                echo "\"StatusText\":\"" . GetListData(2, $rs['Status']) . "\"";
                echo "}";
                echo "}";
        } else {
            echo '{
                    success: false,
                    errorMessage: "Missing Participant ID"
                }';
        }
	
?> 