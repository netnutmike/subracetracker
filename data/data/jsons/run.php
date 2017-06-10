<?php
		
	$beenhere = false;
	
	if (isset($_REQUEST['uid']) && trim($_REQUEST['uid']) != "") {
		$query = "SELECT * from Races where uid='" . trim($_REQUEST['uid']) . "'";
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
                echo "\"RaceID\":\"" . $rs['RaceID'] . "\",";
                echo "\"TeamID\":\"" . $rs['TeamID'] . "\",";	
                echo "\"TeamName\":" . json_encode($teamRS['TeamName']) . ",";	
                echo "\"StartTime\":" . $rs['StartTime'] . ",";	
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

                echo "}";
        } else {
            echo '{
                    success: false,
                    errorMessage: "Missing RaceID"
                }';
        }
	
?> 