<?php
		
    $beenhere = false;
	
    $query = "SELECT * from Races where Status = '4' ORDER BY RaceID";
                
    //echo $query;
    $request = mysql_query($query);

    echo "{\"totalCount\":[" . mysql_num_rows($request) . "],\"runtimes\":[";

    while ($rs = mysql_fetch_array($request)) {

        if ($beenhere)
                echo ",";

        $beenhere = true;

        echo "{";
        echo "\"RaceID\":\"" . $rs['RaceID'] . "\",";
        echo "\"BestSpeed\":\"" . $rs['BestSpeed'] . "\"";
        echo "}";
    }
    echo "]}";

?> 