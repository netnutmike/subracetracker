<?php

        $querytext = "select * from Options where uid='1'";	
		
	$optionResults = mysql_query($querytext) or   die(mysql_error());
        $optionsRS = mysql_fetch_array($optionResults);
        $MeasureMethod = $optionsRS['MeasureMethod'];
        $TotalDistance = $optionsRS['TotalDistance'];
        $Time1Distance = $optionsRS['Time1Distance'];
        $Time2Distance = $optionsRS['Time2Distance'];
        $Time3Distance = $optionsRS['Time3Distance'];
        $Time4Distance = $optionsRS['Time4Distance'];
        $FPS = $optionsRS['FPS'];
        
        //Calculate Frame counts based on time entered
        $time1frames = TimeToFrames(SeperateTimeHours($_POST['Time1']), SeperateTimeMinutes($_POST['Time1']), SeperateTimeSeconds($_POST['Time1']), $FPS) + SeperateTimeFrames($_POST['Time1']);
        $time2frames = TimeToFrames(SeperateTimeHours($_POST['Time2']), SeperateTimeMinutes($_POST['Time2']), SeperateTimeSeconds($_POST['Time2']), $FPS) + SeperateTimeFrames($_POST['Time2']);
        $time3frames = TimeToFrames(SeperateTimeHours($_POST['Time3']), SeperateTimeMinutes($_POST['Time3']), SeperateTimeSeconds($_POST['Time3']), $FPS) + SeperateTimeFrames($_POST['Time3']);
        $time4frames = TimeToFrames(SeperateTimeHours($_POST['Time4']), SeperateTimeMinutes($_POST['Time4']), SeperateTimeSeconds($_POST['Time4']), $FPS) + SeperateTimeFrames($_POST['Time4']);
        
        //calculate frames from start to first gate, frist gate to second gate, second gate to end and total frames from start to finish
        $framecnt[0] = $time4frames - $time1frames;     //Start to Finish
        $framecnt[1] = $time2frames - $time1frames;     //Start to first gate
        $framecnt[2] = $time3frames - $time2frames;    //Between Gates
        $framecnt[3] = $time4frames - $time3frames;     //Second Gate to End
        
        //Convert frames to speed
        $speed[0] = ($TotalDistance / ($framecnt[0] / $FPS)) * 1.94384;
        $speed[1] = ($Time1Distance / ($framecnt[1] / $FPS)) * 1.94384;
        $speed[2] = (($Time2Distance - $Time1Distance) / ($framecnt[2] / $FPS)) * 1.94384;
        $speed[3] = (($TotalDistance - $Time2Distance) / ($framecnt[3] / $FPS)) * 1.94384;
        
        $bestspeed = $speed[0];
        $lowestspeed = $speed[0];
        
        foreach ($speed as $spd) {
            if ($spd > $bestspeed) {
               $bestspeed = $spd; 
            }
            
            if ($spd < $lowestspeed)
            {
               $lowestspeed = $spd; 
            }
        } 
        
	$querytext = "Update Races set StartTime='" . $_POST['StartTime'] . 
	"', FinishTime='" . $_POST['FinishTime'] . "', Time1='" . $_POST['Time1'] . "', Time2='" . $_POST['Time2'] . "', Time3='" . $_POST['Time3']
                . "', Time4='" . $_POST['Time4'] . "', Status='" . $_POST['Status'] . "', Speed1='" . $speed[1] . "', Speed2='" .
                $speed[2] . "', Speed3='" . $speed[3] . "', TotalSpeed='" . $speed[0] . "', BestSpeed='" . $bestspeed . "', LowestSpeed='" .
                $lowestspeed . "', RaceHour='" . date("H") . "' where uid='" . $_POST['uid'] . "'";		
		
	$result3 = mysql_query($querytext) or   die(mysql_error());
        
        $querytext = "select * from Teams where uid='" . $_POST['TeamID'] . "'";		
		
	$teamResults = mysql_query($querytext) or   die(mysql_error());
        $teamRS = mysql_fetch_array($teamResults);
        
        if ($teamRS['BestSpeed'] == null || $teamRS['BestSpeed'] == 0 || $teamRS['BestSpeed'] < $bestspeed) {
            $querytext = "Update Teams set BestSpeed='" . $bestspeed . "', BestRunID='" . $_POST['uid'] . "' where uid='" . $_POST['TeamID'] . "'";
            $teamResults = mysql_query($querytext) or   die(mysql_error()); 
        }
	

        $querytext = "INSERT INTO ParticipantHistory (TeamID, Action, Timestamp, RaceID) "
                . "VALUES ('" .
		$_POST['TeamID'] . "', '" . $_POST['Status'] . "', '" .  date("Y-m-d H:i:s")
                . "', '" . $_POST['uid'] . "')";
	
	$result3 = mysql_query($querytext) or   die(mysql_error());
        
	echo '{"success" : true}';


?>