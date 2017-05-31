<?php
	
	$querytext = "INSERT INTO Teams (TeamName, SchoolName, SubName, Status, Class, Notes) "
                . "VALUES ('" .
		$_POST['TeamName'] . "', '" . $_POST['SchoolName'] . "', '" . $_POST['SubName'] . "', '" . $_POST['Status'] . "', '" . $_POST['Class']
                . "', '" . $_POST['Notes'] . "')";
	
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';

?>