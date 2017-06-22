<?php

        include('../common.php');
        include('../functions.php');

        $query = "SELECT * from Teams";

        $request = mysql_query($query);

        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename="Teams-' . date("Ymd") . '.csv"');

        echo "\"uid\",";
        echo "\"TeamName\",";
        echo "\"SchoolName\",";
        echo "\"SubName\",";
        echo "\"Status\",";
        echo "\"Lane\",";
        echo "\"Class\",";
        echo "\"Notes\"\n\n";

        while ($rs = mysql_fetch_array($request)) {

            echo "\"" . $rs['uid'] . "\",";
            echo "\"" . $rs['TeamName'] . "\",";
            echo "\"" . $rs['SchoolName'] . "\",";
            echo "\"" . $rs['SubName'] . "\",";
            echo "\"" . GetListData(1, $rs['Status']) . "\",";
            echo "\"" . GetListData(8, $rs['Lane']) . "\",";
            echo "\"" . GetListData(6,$rs['Class']) . "\",";
            echo "\"" . $rs['Notes'] . "\"\n";

        }

  ?>