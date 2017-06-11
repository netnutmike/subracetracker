<?php

        $querytext = "select * from Options where uid='1'";	
//	echo $querytext;	
		
	$optionResults = mysql_query($querytext) or   die(mysql_error());
        $optionsRS = mysql_fetch_array($optionResults);
        
        //generate speeds for each time and total time for finish
        
	$querytext = "Update Races set StartTime='" . $_POST['StartTime'] . 
	"', FinishTime='" . $_POST['FinishTime'] . "', Time1='" . $_POST['Time1'] . "', Time2='" . $_POST['Time2'] . "', Time3='" . $_POST['Time3']
                . "', Time4='" . $_POST['Time4'] . "', Status='" . $_POST['Status'] . "', Notes='" . $_POST['Notes']
                . "' where uid='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mssql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';


?>