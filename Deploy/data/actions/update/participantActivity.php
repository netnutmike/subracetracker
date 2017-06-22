<?php

	$querytext = "Update ParticipantHistory set TeamID='" . $_POST['TeamID'] . "', ParticipantID='" . $_POST['ParticipantID'] . "', Action='" . $_POST['Action'] . 
	"', TrackedTime='" . $_POST['TrackedTime'] . "', TimeStamp='" . $_POST['TimeStamp'] . "', RaceID='" . $_POST['RaceID']  
                . "' where uid='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';


?>