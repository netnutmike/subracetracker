<?php
		
    $beenhere = false;
    $query = "SELECT * from Races where Status='6' order by RaceID";

    //echo $query . "<br>";
    $request = mysql_query($query);

    echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"readyqueue\":[";

    while ($rs = mysql_fetch_array($request)) {

        if ($beenhere)
                echo ",";

        $teamquery = "select TeamName from Teams where uid = '" . $rs['TeamID'] . "'";
        //echo $teamquery;
        $teamRequest = mysql_query($teamquery);
        $teamRS = mysql_fetch_array($teamRequest);
        $beenhere = true;

        echo "{";
        echo "\"RaceID\":" . $rs['RaceID'] . ",";
        echo "\"TeamName\":" . json_encode($teamRS['TeamName']);
        echo "}";
    }
    echo "]}";

?> 