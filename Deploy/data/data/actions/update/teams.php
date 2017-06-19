<?php

	$querytext = "Update Teams set TeamName='" . $_POST['TeamName'] . "', SchoolName='" . $_POST['SchoolName'] . "', SubName='" . $_POST['SubName'] . 
	"', Status='" . $_POST['Status'] . "', Lane='" . $_POST['Lane'] . "', Class='" . $_POST['Class'] . "', Notes='" . $_POST['Notes']
         . "' where uid='" . $_POST['uid'] . "'";	
//	echo $querytext;	
		
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';


?>