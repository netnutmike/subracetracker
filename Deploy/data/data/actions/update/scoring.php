<?php

        $querytext = "select * from Options where uid='1'";	
//	echo $querytext;	
		
	$optionResults = mysql_query($querytext) or   die(mysql_error());
        $optionsRS = mysql_fetch_array($optionResults);
        $MeasureMethod = $optionsRS['MeasureMethod'];
        $TotalDistance = $optionsRS['TotalDistance'];
        $Time1Distance = $optionsRS['Time1Distance'];
        $Time2Distance = $optionsRS['Time2Distance'];
        $Time3Distance = $optionsRS['Time3Distance'];
        $Time4Distance = $optionsRS['Time4Distance'];
        $FPS = $optionsRS['FPS'];
        
        //generate speeds for each time and total time for finish
        $time1frames = TimeToFrames(SeperateTimeHours($_POST['Time1']), SeperateTimeMinutes($_POST['Time1']), SeperateTimeSeconds($_POST['Time1']), $FPS) + SeperateTimeFrames($_POST['Time1']);
        $time2frames = TimeToFrames(SeperateTimeHours($_POST['Time2']), SeperateTimeMinutes($_POST['Time2']), SeperateTimeSeconds($_POST['Time2']), $FPS) + SeperateTimeFrames($_POST['Time2']);
        $time3frames = TimeToFrames(SeperateTimeHours($_POST['Time3']), SeperateTimeMinutes($_POST['Time3']), SeperateTimeSeconds($_POST['Time3']), $FPS) + SeperateTimeFrames($_POST['Time3']);
        $time4frames = TimeToFrames(SeperateTimeHours($_POST['Time4']), SeperateTimeMinutes($_POST['Time4']), SeperateTimeSeconds($_POST['Time4']), $FPS) + SeperateTimeFrames($_POST['Time4']);
        
	$querytext = "Update Races set StartTime='" . $_POST['StartTime'] . 
	"', FinishTime='" . $_POST['FinishTime'] . "', Time1='" . $_POST['Time1'] . "', Time2='" . $_POST['Time2'] . "', Time3='" . $_POST['Time3']
                . "', Time4='" . $_POST['Time4'] . "', Status='" . $_POST['Status'] . "', Notes='" . $_POST['Notes']
                . "' where uid='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';


?>