<?php
	
        if (trim($_POST['RaceID']) == "") {
            $querytext = "Select RaceID from Races Order By RaceID Desc LIMIT 1";
            $request = mysql_query($querytext);
            if (mysql_num_rows($request) == 0) {
                $raceid = '1';
            } else {
                $rs = mysql_fetch_array($request);
                $raceid = $rs['RaceID'] + 1;
            }
            //echo "raceid: " . $raceid;
        } else {
            $raceid = $_POST['RaceID'];
        }
            
	$querytext = "INSERT INTO Races (RaceID, TeamID, StartTime, FinishTime, Time1, Time2, Time3, Time4, Status, Class, Notes, RaceDate) "
                . "VALUES ('" .
		$raceid . "', '" . $_POST['TeamID'] . "', '" . $_POST['StartTime'] . "', '" . $_POST['FinishTime'] . "', '" . $_POST['Time1']
                . "', '" . $_POST['Time2'] . "', '" . $_POST['Time3'] . "', '" . $_POST['Time4'] . "', '" . $_POST['Status'] . "', '" . $_POST['Class']
                . "', '" . $_POST['Notes'] . "', '" . date("Y-m-d H:i:s", strtotime($_POST['RaceDate'])) . "')";
	
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';

?>