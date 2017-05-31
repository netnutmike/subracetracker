<?php 

	include('database.php');
	include('common.php');
	include('functions.php'); 
	
	if (!isset($_POST['authenticity_token']))
	  	$authtok="";
	else 
		$authtok = $_POST['authenticity_token'];
	//echo $authtok . "...";
	
	if ($authtok == "KG4us46gpY8iuhDuuS/bLPC1yQ/uwBw5FEHr8w93oKs=" && isset($_POST['password']) && trim($_POST['password']) != '') {

		// using ldap bind
		$ldaprdn  = 'cn=' . $_POST['EID'] . ',ou=people,dc=marriott,dc=com';     // ldap rdn or dn
		$ldappass = $_POST['password'];  // associated password

		// connect to ldap server
		$ldapconn = ldap_connect("ldaps://marreds.marriott.com");
		ldap_set_option($ldapconn, LDAP_PROTOCOL_VERSION, 3);
		

		if ($ldapconn) {

    		// binding to ldap server
    		$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);

			if (!$ldapbind) {
				$ldaprdn  = 'cn=' . $_POST['EID'] . ',ou=consultants,ou=pseudo-accounts,dc=marriott,dc=com';     // ldap rdn or dn
				$ldappass = $_POST['password'];  // associated password
				
				$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
			}
			
			if (!$ldapbind) {
				$ldaprdn  = 'cn=' . $_POST['EID'] . ',ou=international,ou=people,dc=marriott,dc=com';     // ldap rdn or dn
				$ldappass = $_POST['password'];  // associated password
				
				$ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
			}
		
    		// verify binding
    		if ($ldapbind) {
        		setcookie("ValidEID", $_POST['EID'], time()+(60*60*2));
        		if ($_POST['remember'] == '1') {
        			setcookie("RememberEID", $_POST['EID'], time()+(60*60*72));
        		}
        		
        		//lookup the values for the user from LDAP
        		$filter="(objectclass=*)"; // this command requires some filter
  				$justthese = array("sn", "givenname", "mail"); //the attributes to pull, which is much more efficient than pulling all attributes if you don't do this
      			$sr=ldap_read($ldapconn, $ldaprdn, $filter, $justthese);
          		$entry = ldap_get_entries($ldapconn, $sr);

				setcookie("EIDMail", $entry[0]["mail"][0], time()+(60*60*3));
				setcookie("EIDSurname", $entry[0]["sn"][0], time()+(60*60*3));
				setcookie("EIDName", $entry[0]["givenname"][0], time()+(60*60*3));
				setcookie("SessionEnd", time()+(60*60*3), time()+(60*60*3));
					
				ldap_close($ldapconn);
				$query = "SELECT * FROM UserPreferences where EID='" . trim($_POST['EID']) . "'";		
//				echo $query;
				$request = mssql_query($query);
				
				$sessionstring = $_POST['password'] . $entry[0]["givenname"][0] . $entry[0]["sn"][0]. $entry[0]["mail"][0] . $_POST['EID'] . date('Ymdhis');
				$sessionid = md5($sessionstring);
				setcookie("SessionID", $sessionid, time() + 10800);
				setcookie("SessionID", $sessionid, time() + 10800, "/");
				
				
				$rs = mssql_fetch_array($request);
				if (mssql_num_rows($request) == '0') {
					UserLogEntry($_POST['EID'], LOG_AUTHENTICATION, "Login: Success - No Default View Configured, Defaulting to Main View", LOG_LOGIN);
					
					$query2 = "INSERT INTO UserPreferences (SessionID, EID, SessionIP, PresenceStatus, UserRealName, LastSeen) VALUES('" . $sessionid . "', '" . trim($_POST['EID']) . "', '" . 
					$_SERVER['REMOTE_ADDR'] . "', '1', '" . $entry[0]["givenname"][0] . " " . $entry[0]["sn"][0] . "', '" . date('Y-m-d h:i:s') . "')";		
					//echo $query2;
					$request2 = mssql_query($query2);
					
					//header( 'Location: /user2');
				} else {
				//	UserLogEntry($_POST['EID'], LOG_AUTHENTICATION, "Login: Success", LOG_LOGIN);
					$newpresence = $rs['PresenceStatus'];
					if ($newpresence == '6')
						$newpresence = '1';
					$query2 = "UPDATE UserPreferences set SessionID='" . $sessionid . "', SessionIP='" . $_SERVER['REMOTE_ADDR'] . 
					"', PresenceStatus='" . $newpresence . "', UserRealName='" . $entry[0]["givenname"][0] . " " . $entry[0]["sn"][0] . "', LastSeen = '" . date('Y-m-d h:i:s') . "' where EID='" . $_POST['EID'] . "'";		
//					echo $query;
					$request2 = mssql_query($query2);
				}
					
	
				
				
				setcookie("Pref_StartingPage", $rs['StartingPage'], time()+(60*60*72));
				setcookie("Pref_StartingTab", $rs['StartingTab'], time()+(60*60*72));
				//setcookie("Pref_Theme", $rs['Theme'], time()+(60*60*72));
	
				
				UserLogEntry($_POST['EID'], LOG_AUTHENTICATION, "Login: Success - Sending to Main Interface", LOG_LOGIN);
        		//header( 'Location: /user2/#dashboard');
        		header('Content-Type: application/json');
        		echo "{\"success\" : true, \"msg\" : \"Logged In\"}";
				
    		} else {
    			UserLogEntry($_POST['EID'], LOG_SECURITYFAILURE, "Login Failure: Access Denied", LOG_LOGIN);
				header('Content-Type: application/json');
				echo "{\"success\" : false, \"msg\" : \"Login Failure: Access Denied\"}";
    		}
		} else {
			UserLogEntry($_POST['EID'], LOG_ERROR, "Error: Unable To Connect To Authentication Server", LOG_LOGIN);
			header('Content-Type: application/json');
			echo "{\"success\" : false, \"msg\" : \"Unable To Connect To Authentication Server\"}";
		}
	} else if (trim($_REQUEST['authenticity_token']) != "") {
	
		//sign out
		UserLogEntry($_COOKIE['ValidEID'], LOG_LOGOUT, "Logout: Success", LOG_LOGIN);
		setcookie("ValidEID", "", time() - 3600);
		setcookie("EIDMail", "", time() - 3600);
		setcookie("EIDSurname", "", time() - 3600);
		setcookie("EIDName", "", time() - 3600);
		//setcookie("Pref_StartingPage", "", time() - 3600);
		//setcookie("Pref_StartingTab", "", time() - 3600);
		setcookie("Pref_Theme", "", time() - 3600);
		
		$msgtxt = "Logout Successful!";
		$msgtype = "success-box";
	}
	


?>