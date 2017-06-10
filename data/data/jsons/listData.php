<?php
			
	$beenhere = false;
	if (isset($_REQUEST['listid']) && trim($_REQUEST['listid']) != "")
		$query = "SELECT * from ListItems where ListID='" . $_REQUEST['listid'] . "' order by ListItem";
	else
		$query = "SELECT * from ListItems";
	
	//echo $queryopendays;
	$request = mysql_query($query);
	
	$rowcount = mysql_num_rows($request);
	
	if (isset($_REQUEST['defaulttext']) && isset($_REQUEST['defaultvalue']) && trim($_REQUEST['defaulttext']) != "" && trim($_REQUEST['defaultvalue']) != "") 
		$rowcount = $rowcount + 1;
	
	
	echo "{\"totalCount\":[" . $rowcount . "],\"listData\":[";
	
	if (isset($_REQUEST['defaulttext']) && isset($_REQUEST['defaultvalue']) && trim($_REQUEST['defaulttext']) != "" && trim($_REQUEST['defaultvalue']) != "") {
		$beenhere = true;
		
		echo "{";
		echo "\"uid\":\"0\",";
		echo "\"ListID\":\"" . $_REQUEST['listid'] . "\",";	
		echo "\"ListItem\":\"" . $_REQUEST['defaulttext'] . "\",";
		echo "\"IntValue\":\"" . $_REQUEST['defaultvalue'] . "\",";
                echo "\"CharVal\":\"\",";
                echo "\"Status\":\"1\",";
                echo "\"StatusText\":\"Enabled\"";
		
		echo "}";
	}
	
	while ($rs = mysql_fetch_array($request)) {
		if ($beenhere)
			echo ",";
			
		$beenhere = true;
		
		echo "{";
		echo "\"uid\":\"" . $rs['uid'] . "\",";
		echo "\"ListID\":\"" . $rs['ListID'] . "\",";	
		echo "\"ListItem\":\"" . $rs['ListItem'] . "\",";
		echo "\"IntValue\":\"" . $rs['IntValue'] . "\",";
		echo "\"CharVal\":\"" . $rs['CharVal'] . "\",";
		echo "\"Status\":\"" . $rs['Status'] . "\",";
                echo "\"StatusText\":\"" . GetListData(7, $rs['Status']) . "\"";
		
		echo "}";
	}
	
	echo "]}";
	
		?> 
