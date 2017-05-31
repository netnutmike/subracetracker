<?php
	$zooname = "HDQNCVMITSDBD1";
	$zoologin = "MalwareZoo";
	$zoopasswd = "2wsxRFV6yhn*IK";
	
	$zoodb = mssql_connect($zooname, $zoologin, $zoopasswd);
	mssql_select_db('malwarezoo');
	
?>