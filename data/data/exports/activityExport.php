<?php

        include('../common.php');
        include('../functions.php');

        $query = "SELECT * from ParticipantHistory";

        $request = mysql_query($query);

        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename="DiverActivity-' . date("Ymd") . '.csv"');

        echo "\"uid\",";
        echo "\"Team\",";
        echo "\"DiverName\",";
        echo "\"DiverID\",";
        echo "\"Action\",";
        echo "\"TrackedTime\",";
        echo "\"Timestamp\",";
        echo "\"RaceID\"\n\n";

        while ($rs = mysql_fetch_array($request)) {

            $teamquery = "select TeamName from Teams where uid = '" . $rs['TeamID'] . "'";
            //echo $teamquery;
            $teamRequest = mysql_query($teamquery);
            $teamRS = mysql_fetch_array($teamRequest);
            
            $diverquery = "select DiverName, DiverID from Participants where uid = '" . $rs['ParticipantID'] . "'";
            //echo $teamquery;
            $diverRequest = mysql_query($diverquery);
            $diverRS = mysql_fetch_array($diverRequest);
            
            echo "\"" . $rs['uid'] . "\",";
            echo "\"" . $teamRS['TeamName'] . "\",";
            echo "\"" . $diverRS['DiverName'] . "\",";
            echo "\"" . $diverRS['DiverID'] . "\",";
            echo "\"" . GetListData(4, $rs['Status']) . "\",";
            echo "\"" . $rs['TrackedTime'] . "\",";
            echo "\"" . $rs['Timestamp'] . "\",";
            echo "\"" . $rs['RaceID'] . "\"\n";
            

        }

  ?>