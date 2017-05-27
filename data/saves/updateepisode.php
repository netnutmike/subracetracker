<?php	
	include('common.php');	
	//include('../functions.php');
	
	//lookup the show id for the defaults and id
	$query = "SELECT * from Shows where uid = '" . $_REQUEST['ShowID'] . "'";
	$request = mysql_query($query);
	$Showrs = mysql_fetch_array($request);
	
	//insert the new episode
	
	if (!isset($_REQUEST['Keywords']) || trim($_REQUEST['Keywords']) == "" || trim($_REQUEST['Keywords']) == "Leave Blank For Default Keywords")
		$keywrds = $Showrs['Keywords'];
	else 
		$keywrds = $_REQUEST['Keywords'];
	
	if (!isset($_REQUEST['Hosts']) || trim($_REQUEST['Hosts']) == "" || trim($_REQUEST['Hosts']) == "Leave Blank For Default")
		$hosts = $Showrs['Hosts'];
	else 
		$hosts = $_REQUEST['Hosts'];
	
	if (!isset($_REQUEST['ImageURL']) || trim($_REQUEST['ImageURL']) == "" || trim($_REQUEST['ImageURL']) == "Leave Blank For Default Image")
		$imgurl = $Showrs['ArtURL'];
	else 
		$imgurl = $_REQUEST['ImageURL'];
	
	if (!isset($_REQUEST['Guests']) || trim($_REQUEST['Guests']) == "" || trim($_REQUEST['Guests']) == "Leave Blank For No Guests")
		$gsts = "";
	else 
		$gsts = $_REQUEST['Guests'];
	
	$query = "update Episodes set ShowID='" . $_REQUEST['ShowID'] . "', Description=" . json_encode($_REQUEST['Description']) . ", Hosts='" . $hosts . 
	"', Guests='" . $gsts . "', Duration='" . $_REQUEST['Duration'] . "', RecordedDateTime='" . date("Y-m-d h:i:s", strtotime($_REQUEST['RecordedDateTime'] . " 00:00:00")) . 
	"', LinkToShowNotes='" . $_REQUEST['LinkToShowNotes'] . "', Keywords=" . json_encode($keywrds) . ", Title='" . $_REQUEST['Title'] . 
	"', ImageURL='" . $imgurl . "', Explicit='" . $Showrs['Explicit'] . "', EpisodeNumber='" . $_REQUEST['EpisodeNumber'] . "', PublishDate='" .
	date("Y-m-d h:i:s", strtotime($_REQUEST['PublishDate'] )) . "' where uid='" . $_REQUEST['uid'] . "'";
	//echo $query;
	$request = mysql_query($query);
	
	echo '{"success" : true}';
	
	?>