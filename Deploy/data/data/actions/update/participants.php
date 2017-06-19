<?php

	$querytext = "Update Participants set TeamID='" . $_POST['TeamID'] . "', DiverName='" . $_POST['DiverName'] . "', Status='" . $_POST['Status'] . 
                "', DiverID='" . $_POST['DiverID'] . "' where uid='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';


?>