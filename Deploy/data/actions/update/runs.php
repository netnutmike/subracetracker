<?php

	$querytext = "Update Races set RaceID='" . $_POST['RaceID'] . "', TeamID='" . $_POST['TeamID'] . "', StartTime='" . $_POST['StartTime'] . 
	"', FinishTime='" . $_POST['FinishTime'] . "', Time1='" . $_POST['Time1'] . "', Time2='" . $_POST['Time2'] . "', Time3='" . $_POST['Time3']
                . "', Time4='" . $_POST['Time4'] . "', Status='" . $_POST['Status'] . "', Class='" . $_POST['Class'] . "', Notes='" . $_POST['Notes']
                . "', RaceDate='" . $_POST['RaceDate'] . "' where uid='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mssql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';


?>