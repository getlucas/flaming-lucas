<?php
		header('Content-type: application/json');
	    $url = 'http://maps.googleapis.com/maps/api/geocode/json?address='. urlencode($_GET['address']) .'&sensor=false';
		$str = file_get_contents($url);
		echo $str;
?>