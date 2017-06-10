<?php 

function GetListData($ListID, $Value) {

    $lquery = "SELECT * FROM ListItems where ListID='" . $ListID . "' and IntValue='" . $Value . "'";
	$lresult = mysql_query($lquery);

//	$num=mysql_num_rows($result);  
    $listdata = mysql_fetch_array($lresult);
    
    return $listdata['ListItem'];
}

function UserLogEntry($eid, $activityType, $activityText, $interface, $propertyid="0", $deviceid="0") {

	global $version;

	$query = "INSERT INTO UserActivity (EID, DateTime, ActivityType, ActivityText, Version, Interface, PropertyID, DeviceID) VALUES ";
	$query .= "('" . $eid . "', '" . date("YmdHis") . "', '" . $activityType . "', '" . $activityText . "', '" . $version . "', '" . $interface . "', '" . $propertyid . "','" . $deviceid . "')";		
	//echo $query;
	//$request = mysql_query($query);

}

function ReverseDateToPrintable($dtstr) {

	if (strlen($dtstr) == 8) {
		$outstr = substr($dtstr,4,2) . "/" . substr($dtstr,6,2) . "/" . substr($dtstr,0,4);
	}
	
	if (strlen($dtstr) == 12) {
		$outstr = substr($dtstr,4,2) . "/" . substr($dtstr,6,2) . "/" . substr($dtstr,0,4);
		$outstr .= " " . substr($dtstr,8,2) . ":" . substr($dtstr,10,2);
	}
	
	if (strlen($dtstr) == 14) {
		$outstr = substr($dtstr,4,2) . "/" . substr($dtstr,6,2) . "/" . substr($dtstr,0,4);
		$outstr .= " " . substr($dtstr,8,2) . ":" . substr($dtstr,10,2) . ":" . substr($dtstr,12,4);
	}
	
	return $outstr;
}


function Get_Local_Time($City, $State) {

	if (($City == "") || is_null($City) || ($State == "") || is_null($State)) {
		echo "Missing City or State";
		return;
		}
		
	$queryurl = "http://www.google.com/search?q=time+in+" . str_replace(" ", "+", $City) . "+" . $State . "&ie=utf-8&oe=utf-8&aq=t";
//	echo $queryurl;
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, $queryurl);
	curl_setopt($c, CURLOPT_HEADER, false);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	$page_data = curl_exec($c);
	curl_close($c);
	
	$altclock=strpos($page_data, "alt=\"Clock\"");
	if ($altclock == 0)
		{
			echo "Local Time Not Found";
			return;
		}
	$timecolonpos = strpos($page_data, ":", $altclock);
//	echo "timecolonpos:" . $timecolonpos . "x";
	if (substr($page_data, ($timecolonpos - 2), 1) > '9' || substr($page_data, ($timecolonpos - 2), 1) < '0') {
		echo substr($page_data, ($timecolonpos - 1), (strpos($page_data, ")", $timecolonpos) - ($timecolonpos - 2)) );
		}
	else
		{
		echo substr($page_data, ($timecolonpos - 2), (strpos($page_data, ")", $timecolonpos) - ($timecolonpos - 3)) );
		}
}

function GetListDataold($ListID, $Value) {

    $lquery = "SELECT * FROM CMSDB.TableValues where ListID='" . $ListID . "' and Value='" . $Value . "'";
	$lresult = mysql_query($lquery) or die (mysql_error());

//	$num=mysql_num_rows($result);  
    $listdata = mysql_fetch_array($lresult);
    
    return $listdata['ItemText'];
}

function GetListDataExtraStr($ListID, $Value) {

    $lquery = "SELECT * FROM CMSDB.TableValues where ListID='" . $ListID . "' and Value='" . $Value . "'";
	$lresult = mysql_query($lquery) or die (mysql_error());

//	$num=mysql_num_rows($result);  
    $listdata = mysql_fetch_array($lresult);
    
    return $listdata['ExtraStr'];
}

function jsonClean($input) {
	$newvar = json_encode($input);//, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP);
	$newvar = str_replace("<?", "[[", $newvar);
	$newvar = str_replace("?>", "]]", $newvar);
	$newvar = str_replace("\\n", "\\n", $newvar);
	$newvar = str_replace("\\r", "", $newvar);
	
	return $newvar;
}
?>
