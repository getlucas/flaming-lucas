<?php 
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
function server_time() 
{ 
   list($usec, $sec) = explode(" ", microtime()); 
   return ((float)$usec + (float)$sec); 
} 
$time_this_server = server_time();
$time_this_server_javascript = ($time_this_server * 1000);
$num_cities = NULL;
$num_cities = $_GET['num'];
global $loc_list;
global $name_list;
$loc_list = array();
$name_list = array();
for ($loc=0;$loc<$num_cities;$loc++)
{
    $a_loc = NULL;
    $a_name = NULL;
    $a_loc = "loc_" . $loc;
    $a_name = "name_" . $loc;
    $loc_list[$loc] = $_GET[$a_loc];
    $name_list[$loc] = $_GET[$a_name];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="calc.js"></script>
<script type="text/javascript" src="writer.js"></script>
<script type="text/javascript" src="request.js"></script>
<link href="multiple.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<div id="mybody"></div>
<script type="text/javascript">
	var df = null;
	var jt = null;
    	var result = ajax_request();
    	ServerDSTCheck = new Date(parseFloat(<?php echo $time_this_server_javascript ?>)).getTime();
<?php
                for($i = 0, $size = sizeof($loc_list); $i < $size; ++$i)
                {
                  $fy = 'http://localhost/time/scripts/clock-8/clock_data_multiple.php?j='.$loc_list[$i];
		  $js_loc_var = "\n\tvar loc_" . $i . " = '\\\n";
                  print($js_loc_var);
		  include ($fy);
		  print("\t';\n\tcreator(\"div\",\"loc_" . $i ."\");\n\tcreator(\"span\",\"loc_" . $i ."\",\"name\");\n\tcreator(\"span\",\"loc_" . $i ."\",\"val\");\n\tcreator(\"span\",\"loc_" . $i ."\",\"noffset\");\n\tcreator(\"div\",\"loc_" . $i ."\",\"label\");\n");
                }
		
?>
	var f = null;
	var clockInstance_0 = null;
	var clockInstance_1 = null;
	function wrapper()
	{
	       if (result != null && clockInstance_0 == null)
	       {
		  var srv_mls = parseFloat(result);
<?php
               for($i = 0, $size = sizeof($loc_list); $i < $size; ++$i)
               {
		  print ("\n\t\t\teval(loc_" . $i . ");");
		  print ("\n\t\t\tclockInstance_" . $i ." = new calc(srv_mls,df,jt);\n\t\t\tclockInstance_" . $i . ".to_utc();");
		  print ("\n\t\t\tclockInstance_" . $i . ".nice_offset();\n");
	       }
		  
?>
	       }
	       if (clockInstance_0 != null)
	       {
<?php
               for($i = 0, $size = sizeof($loc_list); $i < $size; ++$i)
               {
		  print ("\n\t\t\tclockInstance_" . $i . ".offset_time();");
		  print ("\n\t\t\twriter(\"loc_" . $i . "\",clockInstance_" . $i . ".offsetTime,\"val\");");
		  print ("\n\t\t\twriter(\"loc_" . $i . "\",clockInstance_" . $i . ".niceOffset,\"noffset\");");
		  print ("\n\t\t\twriter(\"loc_" . $i . "\",clockInstance_" . $i . ".jt,\"label\");\n");
		  print ("\n\t\t\twriter(\"loc_" . $i . "\",\"" . $name_list[$i] . "\",\"name\");\n");
	       }
		  
?>
			setTimeout('wrapper()',250);
	       }
	       else
	       {
			setTimeout('wrapper()', 100);
	       }
	}
	wrapper();
</script>
</body>
</html>