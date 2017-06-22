<?php

    $query = "SELECT * from Options where uid='1'";
    //echo $query;

    $request = mysql_query($query);

    echo "{success: true,";

    $rs = mysql_fetch_array($request);

    echo " data: {";
    echo "\"uid\":" . $rs['uid'] . ",";
    echo "\"ZipCode\":\"" . $rs['ZipCode'] . "\",";
    echo "\"FPS\":\"" . $rs['FPS'] . "\",";	
    echo "\"MeasureMethod\":\"" . $rs['TeamName'] . "\",";	
    echo "\"TotalDistance\":\"" . $rs['TotalDistance'] . "\",";	
    echo "\"Time1Distance\":\"" . $rs['Time1Distance'] . "\",";	
    echo "\"Time2Distance\":\"" . $rs['Time2Distance'] . "\",";
    echo "\"Time3Distance\":\"" . $rs['Time3Distance'] . "\",";
    echo "\"Time4Distance\":\"" . $rs['Time4Distance'] . "\"";
    echo "}";

    echo "}";	
?> 