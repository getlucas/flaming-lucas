<?php
// although POST requests should never be cached, sometimes they might be. 
header('Cache-Control: no-cache, no-store, must-revalidate'); // HTTP 1.1.
header('Pragma: no-cache'); // HTTP 1.0.

require_once('timezones.php');

$tz = date_default_timezone_get();

if(array_key_exists('tz', $_POST)){
	if(!$_POST['tz']){
		$tz = date_default_timezone_get();
	}else{
		$tz = urldecode((filter_var($_POST['tz'], FILTER_SANITIZE_STRING)));
	}
}

$diff = null;

if(array_key_exists('diff', $_POST)){
	if($_POST['diff'] == 'null'){
		$diff = null;
	}else{
		$diff = $_POST['diff'];
	}
}	

$fm = 'H';

if(array_key_exists('fm', $_POST)){
	$fm = $_POST['fm'];
}

$datetime = new Greenwich_time($tz,$diff,$fm);

$params = array();

$params['seconds'] = $datetime->get_seconds();
$params['minutes'] = $datetime->get_minutes();
$params['hours'] = $datetime->get_hours();
$params['date'] = $datetime->get_date();
$params['ampm'] = $datetime->get_ampm();
$params['offset'] = $datetime->get_offset();

echo json_encode($params);
