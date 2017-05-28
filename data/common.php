<?php
  $DBHost = "localhost";
  $DBUser = "SubTrackerUsr";
  $DBPass = "7hf87ty34978D";
  $DBName = "SubRaceTracker";
  mysql_pconnect("$DBHost","$DBUser","$DBPass"); 
  mysql_select_db($DBName);
  
  $version="1.0.0";
  
  date_default_timezone_set("America/New_York");
  
  ?>
