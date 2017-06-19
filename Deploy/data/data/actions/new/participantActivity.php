<?php
	
	$querytext = "INSERT INTO ParticipantHistory (TeamID, ParticipantID, Action, TrackedTime, Timestamp, RaceID) "
                . "VALUES ('" .
		$_POST['TeamID'] . "', '" . $_POST['ParticipantID'] . "', '" . $_POST['Action'] . "', '" . $_POST['TrackedTime'] . "', '" . $_POST['Timestamp']
                . "', '" . $_POST['RaceID'] . "')";
	
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';

?>