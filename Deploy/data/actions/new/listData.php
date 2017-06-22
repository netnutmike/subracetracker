<?php
	
	$querytext = "INSERT INTO ListItems (ListID, ListItem, IntValue, CharVal, Status) VALUES ('" .
		$_POST['ListID'] . "', '" . $_POST['ListItem'] . "', '" . $_POST['IntValue'] . "', '" . $_POST['CharVal'] . 
                "', '" . $_POST['Status'] . "')";
	//echo $querytext;
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';

?>