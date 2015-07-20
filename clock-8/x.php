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
echo $time_this_server_javascript;
?>
