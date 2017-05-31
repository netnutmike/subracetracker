<?php	
include('data/common.php');	
include('data/functions.php'); 

//echo "." . $_SERVER["HTTP_HOST"] . "-" . $_SERVER["REQUEST_URI"];
if (trim($_COOKIE['SID']) == "" && !isset($_REQUEST["login"]) ) {
	
	header( 'Location: index.php?login=yes#login');
}



?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
 <title>International Submarine Race Tracker</title>

    
    <script type="text/javascript">
    var version = '<?= $version?>';
    
    //global variables
    var SID = '<?= $_COOKIE['SID'] ?>';
    var TimeNow;
    var DateNow;

    </script>
    
    <script type="text/javascript">
        var Ext = Ext || {}; // Ext namespace won't be defined yet...

        // This function is called by the Microloader after it has performed basic
        // device detection. The results are provided in the "tags" object. You can
        // use these tags here or even add custom tags. These can be used by platform
        // filters in your manifest or by platformConfig expressions in your app.
        //
        Ext.beforeLoad = function (tags) {
            var s = location.search,  // the query string (ex "?foo=1&bar")
                profile;

            // For testing look for "?classic" or "?modern" in the URL to override
            // device detection default.
            //
            if (s.match(/\bclassic\b/)) {
                profile = 'classic';
            }
            else if (s.match(/\bmodern\b/)) {
                profile = 'modern';
            }
            else {
                profile = tags.desktop ? 'classic' : 'modern';
                //profile = tags.phone ? 'modern' : 'classic';
            }

            Ext.manifest = profile; // this name must match a build profile name

            // This function is called once the manifest is available but before
            // any data is pulled from it.
            //
            //return function (manifest) {
                // peek at / modify the manifest object
            //};
        };
    </script>
    
    
    <!-- The line below must be kept intact for Sencha Cmd to build your application -->
    <script id="microloader" data-app="78d8a153-34cd-4ba9-9819-63a27fa9566a" type="text/javascript" src="bootstrap.js"></script>

</head>
<body></body>
</html>