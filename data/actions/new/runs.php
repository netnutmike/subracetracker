<?php
	
	$querytext = "INSERT INTO Races (RaceID, TeamID, StartTime, FinishTime, Time1, Time2, Time3, Time4, Status, Class, Notes, RaceDate) "
                . "VALUES ('" .
		$_POST['RaceID'] . "', '" . $_POST['TeamID'] . "', '" . $_POST['StartTime'] . "', '" . $_POST['FinishTime'] . "', '" . $_POST['Time1']
                . "', '" . $_POST['Time2'] . "', '" . $_POST['Time3'] . "', '" . $_POST['Time4'] . "', '" . $_POST['Status'] . "', '" . $_POST['Class']
                . "', '" . $_POST['Notes'] . "', '" . $_POST['RaceDate'] . "')";
	
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';

?>