<?php

	$query = "SELECT count(*) as cnt FROM Logs";
	//echo $query;
	$request = mssql_query($query);
	echo "({\"totalCount\":[9],\"stats\":[";
	
	$rs = mssql_fetch_array($request);
		
	echo "{";
	echo "\"Name\":\"Malware Log Entries\",";
	echo "\"Value\":\"" . $rs["cnt"] . "\"";
	
	echo "},";
	
	$query = "SELECT count(*) as cnt FROM Logs Where Source='1'";
	//echo $query;
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	echo "{";
	echo "\"Name\":\"   --CPM\",";
	echo "\"Value\":\"" . $rs["cnt"] . "\"";
	
	echo "},";
	
	$query = "SELECT count(*) as cnt FROM Logs Where Source='2'";
	//echo $query;
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	echo "{";
	echo "\"Name\":\"   --OfficeScan\",";
	echo "\"Value\":\"" . $rs["cnt"] . "\"";
	
	echo "},";
	
	$query = "SELECT count(*) as cnt FROM Logs Where Source='3'";
	//echo $query;
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	echo "{";
	echo "\"Name\":\"   --Deep Security\",";
	echo "\"Value\":\"" . $rs["cnt"] . "\"";
	
	echo "},";
	
	$query = "SELECT count(*) as cnt FROM Logs Where DateTimeOfEvent>='" . date("Y-m-d") . " 00:00:00' and DateTimeOfEvent <= '" . date("Y-m-d") . 
	" 23:59:59'";
	//echo $query;
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	echo "{";
	echo "\"Name\":\"New Log Entries Today\",";
	echo "\"Value\":\"" . $rs["cnt"] . "\"";
	
	echo "},";
	
	$query = "SELECT count(*) as cnt FROM Logs Where DateTimeOfEvent>='" . date("Y-m-d") . " 00:00:00' and DateTimeOfEvent <= '" . date("Y-m-d") . 
	" 23:59:59' and Source='1'";
	//echo $query;
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	echo "{";
	echo "\"Name\":\"   --CPM\",";
	echo "\"Value\":\"" . $rs["cnt"] . "\"";
	
	echo "},";
	
	$query = "SELECT count(*) as cnt FROM Logs Where DateTimeOfEvent>='" . date("Y-m-d") . " 00:00:00' and DateTimeOfEvent <= '" . date("Y-m-d") . 
	" 23:59:59' and Source='2'";
	//echo $query;
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	echo "{";
	echo "\"Name\":\"   --OfficeScan\",";
	echo "\"Value\":\"" . $rs["cnt"] . "\"";
	
	echo "},";
	
	$query = "SELECT count(*) as cnt FROM Logs Where DateTimeOfEvent>='" . date("Y-m-d") . " 00:00:00' and DateTimeOfEvent <= '" . date("Y-m-d") . 
	" 23:59:59' and Source='3'";
	//echo $query;
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	echo "{";
	echo "\"Name\":\"   --Deep Security\",";
	echo "\"Value\":\"" . $rs["cnt"] . "\"";
	
	echo "},";
	
	$query = "SELECT count(*) as cnt FROM Malware";
	//echo $query;
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	echo "{";
	echo "\"Name\":\"Malware Definitions\",";
	echo "\"Value\":\"" . $rs["cnt"] . "\"";
	
	echo "},";
		
	//Define Syslog Database Credentials
	$DBHost = "lnxprd0272.marriott.com";
	$DBUser = "MalwareZoo";
	$DBPass = "2wsxRFV6yhn*IK";
	$DBName = "Syslog";
	
	mysql_pconnect("$DBHost","$DBUser","$DBPass");
	$syslogsql = "Select count(*) as cnt from Syslog.SystemEvents where Handled <> '1' or Handled is NULL";
	$syslogrequest = mysql_query($syslogsql);
	$rs = mysql_fetch_array($syslogrequest);
	echo "{";
	echo "\"Name\":\"Import Queue\",";
	echo "\"Value\":\"" . $rs["cnt"] . "\"";
	
	echo "}";
	
	//$syslogsql = "Select ReceivedAt from Syslog.SystemEvents where Handled <> '1' or Handled is NULL LIMIT 1";
	//$syslogrequest = mysql_query($syslogsql);
	//$rs = mysql_fetch_array($syslogrequest);
	//echo "{";
	//echo "\"Name\":\"Importing Date\",";
	//echo "\"Value\":\"" . $rs["ReceivedAt"] . "\"";
	
	//echo "}";
	
	echo "]})";
	
		?>