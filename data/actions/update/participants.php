<?php

	$querytext = "Update Participants set TeamID='" . $_POST['TeamID'] . "', DiverName='" . $_POST['DiverName'] . "', Status='" . $_POST['Status'] . 
                "', RaceDate='" . $_POST['RaceDate'] . "' where uid='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mssql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';


?>