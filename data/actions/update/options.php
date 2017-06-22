<?php

	$querytext = "Update Options set Zipcode='" . $_POST['Zipcode'] . "', FPS='" . $_POST['FPS'] . "', MeasureMethod='" . $_POST['MeasureMethod'] . 
	"', TotalDistance='" . $_POST['TotalDistance'] . "', Time1Distance='" . $_POST['Time1Distance'] . "', Time2Distance='" . $_POST['Time2Distance'] . 
                "', Time3Distance='" . $_POST['Time3Distance'] . "', Time4Distance='" . $_POST['Time4Distance'] . "' where uid='1'";	
//	echo $querytext;	
		
	$result3 = mysql_query($querytext) or   die(mysql_error());
	
	echo '{"success" : true}';
?>