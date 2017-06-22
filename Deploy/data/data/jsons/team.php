<?php
		
	$beenhere = false;
	
	if (isset($_REQUEST['uid']) && trim($_REQUEST['uid']) != "") {
		$query = "SELECT * from Teams where uid='" . trim($_REQUEST['uid']) . "'";
                //echo $query;
                
                $request = mysql_query($query);

                echo "{success: true,";

                $rs = mysql_fetch_array($request);

                echo " data: {";
                echo "\"uid\":" . $rs['uid'] . ",";
                echo "\"TeamName\":\"" . $rs['TeamName'] . "\",";
                echo "\"SchoolName\":\"" . $rs['SchoolName'] . "\",";	
                echo "\"SubName\":\"" . $rs['SubName'] . "\",";	
                echo "\"Status\":\"" . $rs['Status'] . "\",";	
                echo "\"Lane\":\"" . $rs['Lane'] . "\",";	
                echo "\"Class\":\"" . $rs['Class'] . "\",";
                echo "\"BestSpeed\":\"" . $rs['BestSpeed'] . "\",";
                echo "\"BestRunID\":\"" . $rs['BestRunID'] . "\",";
                echo "\"Notes\":" . json_encode($rs['Notes']);
                echo "}";

                echo "}";
        } else {
            echo '{
                    success: false,
                    errorMessage: "Missing Team ID"
                }';
        }
	
?> 