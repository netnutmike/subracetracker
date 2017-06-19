<?php

        include('../common.php');
        include('../functions.php');

        $query = "SELECT * from Participants";

        $request = mysql_query($query);

        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename="Participants-' . date("Ymd") . '.csv"');

        echo "\"uid\",";
        echo "\"DiverID\",";
        echo "\"Team\",";
        echo "\"DiverName\",";
        echo "\"Status\"\n\n";

        while ($rs = mysql_fetch_array($request)) {

            $teamquery = "select TeamName from Teams where uid = '" . $rs['TeamID'] . "'";
            //echo $teamquery;
            $teamRequest = mysql_query($teamquery);
            $teamRS = mysql_fetch_array($teamRequest);
            
            echo "\"" . $rs['uid'] . "\",";
            echo "\"" . $rs['DiverID'] . "\",";
            echo "\"" . $teamRS['TeamName'] . "\",";
            echo "\"" . $rs['DiverName'] . "\",";
            echo "\"" . GetListData(2, $rs['Status']) . "\"\n";

        }

  ?>