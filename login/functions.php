<?
include "utility/maillib.php";

function BuildPropertyList($propid) {
// Build list of hostnames for this property id 

	$queryfe = "SELECT * FROM Equipment where PropertyID='" . $propid . "' order by Name;";		

	$requestfe = mssql_query($queryfe);
	
	$beenhere = false;
	$HostNameList = "";
	
	while ($rsfe = mssql_fetch_array($requestfe)){
		if ($beenhere)
			$HostNameList = $HostNameList . ",";
		
		$HostNameList = $HostNameList . $rsfe["Name"];
		$beenhere = true;
		}
		
	return $HostNameList;
}

function LoadUserPreferences ($eid) {
	$query = "SELECT * FROM UserPreferences where EID='" . $eid . "'";		
//	echo $query;
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	
	setcookie("Pref_StartingPage", $rs['StartingPage'], time()+(60*60*72));
	setcookie("Pref_StartingTab", $rs['StartingTab'], time()+(60*60*72));
	setcookie("Pref_Theme", $rs['Theme'], time()+(60*60*72));
	
	echo "<script type=\"text/javascript\">";
	echo "StartingPage='" . $rs['StartingPage'] . "'";
	echo "</script>";
}

function UserLogEntry($eid, $activityType, $activityText, $interface, $propertyid="0", $deviceid="0") {

	global $version;

	$query = "INSERT INTO UserActivity (EID, DateTime, ActivityType, ActivityText, Version, Interface, PropertyID, DeviceID) VALUES ";
	$query .= "('" . $eid . "', '" . date("Y-m-d H:i:s") . "', '" . $activityType . "', '" . $activityText . "', '" . $version . "', '" . $interface . "', '" . $propertyid . "','" . $deviceid . "')";		
	//echo $query;
	$request = mssql_query($query);

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


function LoadPermissions($eid) {

	//load default permissions
	$query = "SELECT * FROM PermissionsList";		
	$request = mssql_query($query);
	while ($rs = mssql_fetch_array($request)) {
		$permission[$rs['PermissionCode']] = $rs['DefaultPermission'];
	}

	//read each role and replace the default permissions with anything that is overridden
	$query = "SELECT * FROM UserRoles where EID='" . $eid . "'";		
//	echo $query;
	$request = mssql_query($query);
	while ($rs = mssql_fetch_array($request)) {
		$query2 = "SELECT * FROM RolePermissions where RoleID='" . $rs['RoleID'] . "'";		
//		echo $query;
		$request2 = mssql_query($query2);
		while ($rs2 = mssql_fetch_array($request2)) {
			$permission[$rs2['PermissionCode']] = $rs2['Permission'];
		}
	}
	
	//output the permissions in a javascript array format
	
	$beenhere = false;
	
	echo "<script language=\"javascript\">";
	echo "var sla={";
	foreach ($permission as $key=>$value) {
		if ($beenhere)
			echo ", ";
			
		$beenhere = true;
		echo "'" . $key ."':'" . $value . "'";
	}
	
	echo "}";
	
	echo "</script>";
	
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

function Get_Property_Drawing($Marsha) {

	$queryurl = "http://cmsweb.marriott.com/Property/Drawings/" . strtoupper($Marsha) . ".pdf";
	$c = curl_init();
	curl_setopt($c, CURLOPT_URL, $queryurl);
	curl_setopt($c, CURLOPT_HEADER, false);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
	$page_data = curl_exec($c);
	curl_close($c);
	echo $page_data;
}

function Get_Property_Drawing_Name($Marsha) {

	$queryurl = "http://cmsweb.marriott.com/Property/Drawings/" . strtoupper($Marsha) . ".jpg";
	echo $queryurl;
}

function GetListData($ListID, $Value) {

    $lquery = "SELECT * FROM TableValues where ListID='" . $ListID . "' and Value='" . $Value . "'";
	$lresult = mssql_query($lquery) or die (mysql_error());

//	$num=mysql_num_rows($result);  
    $listdata = mssql_fetch_array($lresult);
    
    return $listdata['ItemText'];
}

function GetListValue($ListID, $Value) {

    $lquery = "SELECT * FROM TableValues where ListID='" . $ListID . "' and ItemText='" . $Value . "'";
	$lresult = mssql_query($lquery) or die (mysql_error());

//	$num=mysql_num_rows($result);  
    $listdata = mssql_fetch_array($lresult);
    
    return $listdata['Value'];
}

function GetListDataExtraStr($ListID, $Value) {

    $lquery = "SELECT * FROM TableValues where ListID='" . $ListID . "' and Value='" . $Value . "'";
	$lresult = mssql_query($lquery) or die (mysql_error());

//	$num=mysql_num_rows($result);  
    $listdata = mssql_fetch_array($lresult);
    
    return $listdata['ExtraStr'];
}

function Property_Drawing_Exists($Marsha) {

}

function CheckIfIRFA($eid) {
	$query = "SELECT * FROM SystemsManagers where EID='" . $eid . "'";		
//	echo $query;
	$request = mssql_query($query);
	if (mssql_num_rows($request) > 0)
		return true;
	else
		return false;
}

function LookupIRFAPreferences($eid) {

	$query = "SELECT * FROM UserPreferences where EID='" . $eid . "'";
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	
	return $rs;
}

function GetUserOptionChar($optioncode, $eid) {
	$query = "SELECT * FROM UserOptions where EID='" . $eid . "' and OptionCode='" . $optioncode . "'";
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	
	return $rs['OptionCharValue'];
}

function GetUserOptionInt($optioncode, $eid) {
	$query = "SELECT * FROM UserOptions where EID='" . $eid . "' and OptionCode='" . $optioncode . "'";
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	
	return $rs['OptionIntValue'];
}

function GetUserOptionText($optioncode, $eid) {
	$query = "SELECT * FROM UserOptions where EID='" . $eid . "' and OptionCode='" . $optioncode . "'";
	$request = mssql_query($query);
	$rs = mssql_fetch_array($request);
	
	return $rs['OptionText'];
}

function SetUserOptionChar($optioncode, $eid, $value) {
	$query = "SELECT * FROM UserOptions where EID='" . $eid . "' and OptionCode='" . $optioncode . "'";
	$request = mssql_query($query);
	
	if (mssql_num_rows($request) == 0) {
		$query = "INSERT INTO CMSDB.UserOptions (EID, OptionCode, OptionCharValue) VALUES ('" . $eid . "', '" . $optioncode . "', '" . $value . "')";
		$request = mssql_query($query);
	} else {
		$query = "UPDATE CMSDB.UserOptions set EID='" . $eid . "', OptionCode='" . $optioncode . "', OptionCharValue='" . $value ."' where uid='" . $rs['uid'] . "'";
		$request = mssql_query($query);
	}
	
	return;
}

function SetUserOptionInt($optioncode, $eid, $value) {
	$query = "SELECT * FROM UserOptions where EID='" . $eid . "' and OptionCode='" . $optioncode . "'";
	$request = mssql_query($query);
	
	if (mssql_num_rows($request) == 0) {
		$query = "INSERT INTO CMSDB.UserOptions (EID, OptionCode, OptionIntValue) VALUES ('" . $eid . "', '" . $optioncode . "', '" . $value . "')";
		$request = mssql_query($query);
	} else {
		$query = "UPDATE CMSDB.UserOptions set EID='" . $eid . "', OptionCode='" . $optioncode . "', OptionIntValue='" . $value ."' where uid='" . $rs['uid'] . "'";
		$request = mssql_query($query);
	}
	
	return;
}

function SetUserOptionText($optioncode, $eid, $value) {
	$query = "SELECT * FROM UserOptions where EID='" . $eid . "' and OptionCode='" . $optioncode . "'";
	$request = mssql_query($query);
	
	if (mssql_num_rows($request) == 0) {
		$query = "INSERT INTO CMSDB.UserOptions (EID, OptionCode, OptionText) VALUES ('" . $eid . "', '" . $optioncode . "', '" . $value . "')";
		$request = mssql_query($query);
	} else {
		$query = "UPDATE CMSDB.UserOptions set EID='" . $eid . "', OptionCode='" . $optioncode . "', OptionText='" . $value ."' where uid='" . $rs['uid'] . "'";
		$request = mssql_query($query);
	}
	
	return;
}

function jsonClean($input) {
	$newvar = json_encode($input);//, JSON_HEX_TAG|JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP);
	$newvar = str_replace("<?", "[[", $newvar);
	$newvar = str_replace("?>", "]]", $newvar);
	$newvar = str_replace("\\n", "\\n", $newvar);
	$newvar = str_replace("\\r", "", $newvar);
	
	return $newvar;
}

function InsertAlert($AlertType, $EID, $Device, $Summary, $severity=4, $tn="", $tblid=0, $Class=0) {
	$query = "INSERT INTO UserCurrentAlerts (DateTime, TrackingNumber, ReadStatus, TableID, AlertType, Status, Class, EID, Device, Summary, Severity) VALUES ('" . 
	date("YmdHim") . "', '" . $tn . "','0','" . $tblid . "','" . $AlertType . "','1','" . $Class . "','" . $EID . "','" . $Device . "','" . $Summary .
	"','" . $severity . "')";
	$request = mssql_query($query);
}

function SendGenericAlerts($eid, $sendtext) {
	
		//lookup user prefererences
		$query = "SELECT * FROM UserPreferences where EID='" . $eid . "'";
		//echo $query . "\r\n\r\n";
		$request = mssql_query($query);
		
		if (mssql_num_rows($request) == 0)
			return false;
		
		$rs = mssql_fetch_array($request);
		
		if ($rs['OnAlertDefaultText'] == '1') {
			$m=new Mail;
			$m->From("mosis-no-reply@marriott.com");
	
			switch ($row1["Carrier"]) {
				case 0:		//att
					$carrier="@txt.att.net";
					break;
				case 1:		//Verizon
					$carrier="@vtext.com";
					break;
				case 2:		//Sprint
					$carrier="@messaging.sprintpcs.com";
					break;
				case 4:		//Nextel
					$carrier="@messaging.nextel.com";
					break;
				case 3:		//T-Mobile
					$carrier="@tmomail.net";
					break;
				}
			//clean up phone number
			$NewNumber="";

			for ( $lc=0; $lc < strlen($rs["CellPhone"]); $lc = $lc + 1)
				{
//				echo "lc: " . $lc . "  substr: " . substr($row1["CellPhone"],$lc,1);
				if (substr($rs["CellPhone"],$lc,1) >= '0' && substr($rs["CellPhone"],$lc,1) <= '9')
					{
					$NewNumber = $NewNumber . substr($rs["CellPhone"],$lc,1);
					}
//				echo "  NewNumber: " . $NewNumber . "\r\n";
				}
			$emailaddress = $NewNumber . $carrier;
			//echo "to: " . $emailaddress . "\r\n\r\n";
			$m->Body($sendtext);
			$m->To($emailaddress);
			$m->Send();
   		}
   		
		if ($rs['OnAlertDefaultEmail'] == '1') {
			$m=new Mail;
			$m->From("mosis-no-reply@marriott.com");
			$m->Subject("New Alert In Mosis For You");
	
			$sendtext .= "\r\n\r\nDetails:\r\n\r\n";

			$sendtext .= "\r\n\r\n\r\nTo view all of your current alerts go to http://mosis.\r\n\r\nTo change your alerting preferences and to add or remove alerts, go to http://mosis and select Profile / Preferences on the status bar\r\n\r\n";
			$m->Body($sendtext);
			$m->To($rs['AlertEmail']);
			$m->Send();
			
			//echo "Just sent: " . $sendtext . " To " . $rs['AlertEmail'];
   		}
	
	}
?>