<?php

	$querytext = "Delete from Teams where uid='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';

?>