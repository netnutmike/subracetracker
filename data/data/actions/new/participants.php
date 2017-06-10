<?php
	
	$querytext = "INSERT INTO Participants (TeamID, DiverName, Status, DiverID) VALUES ('" .
		$_POST['TeamID'] . "', '" . $_POST['DiverName'] . "', '" . $_POST['Status'] 
                . "', '" . $_POST['DiverID'] . "')";
	
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';

?>