<?php
	
	$querytext = "INSERT INTO Participants (TeamID, DiverName, Status) VALUES ('" .
		$_POST['TeamID'] . "', '" . $_POST['DiverName'] . "', '" . $_POST['Status'] . "')";
	
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';

?>