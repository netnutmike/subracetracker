<?php
	
	$querytext = "INSERT INTO Lists (ListName) VALUES ('" .
		$_POST['ListName'] . "')";
	//echo $querytext;
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';

?>