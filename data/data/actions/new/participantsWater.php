<?php
	
        $querytext = "Select * from Participants where DiverID = '" . $_POST[DiverID] . "' LIMIT 1";
        $request = mysql_query($querytext) or   die(mysql_error());
        
        if (mysql_num_rows($request) > 0) {
        
            $rs = mysql_fetch_array($request);
                    
            $querytext = "INSERT INTO ParticipantHistory (TeamID, ParticipantID, Action, TrackedTime, Timestamp) "
                    . "VALUES ('" .
                    $rs['TeamID'] . "', '" . $rs['uid'] . "', '" . $_POST['DiverAction'] . "', '" . $_POST['TrackedTime'] . "', '" . date("Y-m-d H:i:s")
                    . "')";

            $result3 = mysql_query($querytext) or   die(mysql_error());

            $querytext = "UPDATE Participants set Status = '" . $_POST['DiverAction'] . "' where uid = '" . $rs['uid'] . "'";

            $result3 = mysql_query($querytext) or   die(mysql_error());

            echo '{"success" : true}';
        } else {
            echo '{"success" : false, "msg" : "Diver not found"}';
        }

?>