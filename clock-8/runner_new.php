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
$h = NULL;
$h = $_GET['tz'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript" src="calc.js"></script>
<script type="text/javascript" src="writer.js"></script>
<script type="text/javascript" src="request.js"></script>
<link href="clock.css" rel="stylesheet" type="text/css" media="all">

</head>
<body>
<div id="mybody"></div>
<script type="text/javascript">
	var df = null;
	var jt = null;
	var result = ajax_request();
	var ServerDSTCheck = new Date(parseFloat(<?php echo $time_this_server_javascript ?>)).getTime();
	function dst_check()
	{
		<?php
			include ("./clock_data_new.php");
		?>
		return df;
		return jt;
	}
	
	dst_check();
	var done = 0;

	creator("div","offset_label");
	creator("div","offset");
	creator("span","offset","ap_offset_value");
	creator("span","offset","ap_nice_offset");
	creator("span","offset","button_24");
	
	
	writer("offset_label",jt);
	writer("offset"," ","ap_offset_value");
	writer("offset","<button name='24_sw' id='24_sw' onclick='clockInstance.switch_time()'>Switch to 24 hour display</button>","button_24");
	
	var chgChk = new Date().getTime();
	var chgChkInt = new Date().getTime();
	var clockInstance = null;
	setInterval("wrapper()", 150);
	function wrapper()
	{
		chgChkInt = new Date().getTime();
		if ((chgChkInt < chgChk) || ((chgChkInt-chgChk) > 1000) || (chgChkInt == chgChk) || result == null)
		{
			result = ajax_request();
			clockInstance = null;
		}
		if (result != null && clockInstance == null)
		{
			var srv_mls = parseFloat(result);
			dst_check();
			clockInstance = new calc(srv_mls,df);
			clockInstance.nice_offset();
		}
		if (clockInstance != null)
		{
			ServerDSTCheck+=(chgChkInt-chgChk);
			var df_a = df;
			dst_check();
			var df_b = df - df_a
			if (df_b != 0)
			{
				clockInstance = null;
				result = null;
				return;
			}
			clockInstance.to_utc();
			clockInstance.offset_time();
			writer("offset_label",jt);
			writer("offset",clockInstance.apOffsetTime,"ap_offset_value");
			writer("offset",clockInstance.niceOffset,"ap_nice_offset");
		}
		chgChk = new Date().getTime();
	}
	wrapper();
</script>
</body>
</html>
