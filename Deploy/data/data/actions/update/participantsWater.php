<?php

if (isset($_POST['DiverID']) && trim($_POST['DiverID']) != "") {
    $querytext = "Select * from Participants where DiverID ='" . $_POST['DiverID'] . "'";
    $result = mysql_query($querytext) or   die(mysql_error());

    if (mysql_num_rows($result) > 0) {

        $rs = mysql_fetch_array($result);

        if ($rs['Status'] == 0) {
            $newstatus = '1';
            $StatusText = 'In The water';
        } else {
            $newstatus = '0';
            $StatusText = "Out Of The Water";
        }

        $querytext = "UPDATE Participants set Status = '" . $newstatus . "' where uid = '" . $rs['uid'] . "'";

        $result3 = mysql_query($querytext) or   die(mysql_error());

        $querytext = "INSERT INTO ParticipantHistory (TeamID, ParticipantID, Action, Timestamp) "
                . "VALUES ('" .
                $rs['TeamID'] . "', '" . $rs['uid'] . "', '" . $newstatus . "', '" . date("Y-m-d H:i:s")
                . "')";

        $result3 = mysql_query($querytext) or   die(mysql_error());
        
        $teamquery = "select TeamName from Teams where uid = '" . $rs['TeamID'] . "'";
        //echo $teamquery;
        $teamRequest = mysql_query($teamquery);
        $teamRS = mysql_fetch_array($teamRequest);

        echo '{"success" : true, "DiverName": "' . $rs['DiverName'] . '", "StatusText":"' . $StatusText . '", "DiverID":"' . $_POST['DiverID'] . 
                '", "Status":"' . $newstatus . '", "TeamName":"' . $teamRS['TeamName'] . '"}';
    } else {
        returnError("Diver Not Found!");
    }

} else {
    returnError("Invalid Parameters Passed...");
}



function ReturnError($errorText) 
{
    	echo '{"success" : false, "msg": "' . $errorText . '"}';

}
?>