<?php

	$querytext = "Delete from Teams where uid='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mysql_query($querytext) or   die(mysql_error());
        
        $querytext = "Delete from Participants where TeamID='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mysql_query($querytext) or   die(mysql_error());
        
        $querytext = "Delete from ParticipantHistory where TeamID='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mysql_query($querytext) or   die(mysql_error());
        
        $querytext = "Delete from Races where TeamID='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';

?>