<?php
if (strtoupper(substr($_FILES['filename']['name'],-4)) == ".CSV") {

    $target_path = "/tmp/participantimport.csv";
    
    if(move_uploaded_file($_FILES['filename']['tmp_name'], $target_path)) {
        clearParticipants();
        importParticipants($target_path);
        echo '{"success" : true, "file" : "' . $_FILES['Filen']['name'] . '"}';
    } else {
        echo '{"success" : false, "error" : "Upload Failed!   Could Not Move Temporary Upload File Final Destination."}';
    }
} else {
    echo '{"success" : false, "error" : "Upload Failed!   Only .csv files can be uploaded. "' . $_FILES['filename']['tmp_name'] . ' }';
    }
    
function importParticipants($flpth) {
    $handle = fopen($flpth, "r");
    $beenhere = false;
    
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if ($beenhere == true) {
            //Get team ID and insert new team if it does not exist.
            $teamquery = "Select * from Teams where TeamName='" . mysql_real_escape_string($data[15]) . "'";
            $request = mysql_query($teamquery) or die(mysql_error());
            if (mysql_num_rows($request) == 0) {
                $teamquery = "Insert into Teams (TeamName, SchoolName, SubName, Status) values ('" . mysql_real_escape_string($data[15]) . "','" . mysql_real_escape_string($data[3]) .
                        "','" . mysql_real_escape_string($data[15]) . "','0')";
                //echo $teamquery . "\r\n";
                $request = mysql_query($teamquery) or die(mysql_error());
                
                $teamquery = "Select * from Teams where TeamName='" . $data[15] . "'";
                $request = mysql_query($teamquery) or die(mysql_error());
            }
            
            $teamRS = mysql_fetch_array($request);
            
            $name = mysql_real_escape_string(trim($data[2])) . " " . mysql_real_escape_string(trim($data[1]));
            $import="INSERT into Participants (DiverID, TeamID, DiverName, Status, RegistrationType, Color, Title) values ('" . mysql_real_escape_string(trim($data[21])) . "','" . $teamRS[uid] . "','" .
                    $name . "','0','" . $regType . "','" . $colorcode . "','" . mysql_real_escape_string(trim($data[0])) . "')";
            
            mysql_query($import) or die(mysql_error());
        }

        $beenhere = true;
    }

    fclose($handle);
}

function clearParticipants()
{
    $query = "Delete from Participants";
    mysql_query($query) or die(mysql_error());
    
    $query = "Delete from ParticipantHistory";
    mysql_query($query) or die(mysql_error());
    
    $query = "Delete from Teams";
    mysql_query($query) or die(mysql_error());
    
    $query = "Delete from Races";
    mysql_query($query) or die(mysql_error());
    
}
?>