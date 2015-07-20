<?php

// simple class to return different times based on timezone
class Greenwich_time {

   var $datetime;
   //H = 24 hour format
   //h = 12 hour format
   var $format = 'H';
   var $diff = null;

   function __construct($tz,$diff=null,$fm='H') 
   {
       $this->diff = $diff;	
       $this->datetime = new DateTime();
	   if($this->diff){
	  	 $this->datetime->modify($this->diff.' hour');
	   }
	   $this->datetime->setTimezone(new DateTimeZone($tz));
       
	   $this->format = $fm;
   }

   function get_date() 
   {
       return $this->datetime->format('l, d F');
   }

   function get_hours() 
   {
       return $this->datetime->format($this->format);
   }
   
   function get_minutes() 
   {
       return $this->datetime->format('i');
   } 
   
   function get_seconds() 
   {
       return $this->datetime->format('s');
   } 
   
   function get_ampm()
   {
   	   return $this->datetime->format('a');
   } 
   
   function get_offset()
   {
   	   $offset = $this->datetime->getOffset();
	   if($this->diff){
	   	 $diff = '(GMT '.$this->diff.':00'.')'; 	
	     return $diff;
	   }
		
   	   $hours = floor($offset / 3600);
       $minutes = floor(($offset / 60) % 60);
	   if($hours > 0){
		  $hours = '+ ' . $hours;
	   }
	   $diff = '(GMT '.$hours.':'.sprintf('%02d', $minutes).')'; 	
	   return $diff;	
   }
   
   function get_raw_offset()
   {
   	   $offset = $this->datetime->getOffset();
	   return $offset;	
   }
   
   function get_raw_date()
   {
       $timestamp = $this->datetime->format('c');
	   return strval($timestamp);	
   }
} // end of class 


//some helper methods to make sure the timezone string is converted into correct format

function tz_format($tz){
	$tzs = strip_tz();
	$seperators = array("/", "-", "_");
	$tz = strtolower(str_replace($seperators, "", $tz));
	if(array_key_exists($tz, $tzs)){
		return $tzs[$tz];
	}
}

function strip_tz() {
	$zones = timezone_identifiers_list();
	
	$tzs = array();
	
	foreach ($zones as $zone) 
	{
	    $seperators = array("/", "-", "_");
		$key = strtolower(str_replace($seperators, "", $zone));
		$tzs[$key] = $zone;
	}
	return $tzs;
	
}

function get_time_diff($tz){
    $diff = str_ireplace('GMT', "", $tz);
	$diff = str_replace('_', "+", $diff);
	return $diff;
}

function contains($str, array $arr)
{
    foreach($arr as $a) {
        if (stripos($str,$a) !== false) return true;
    }
    return false;
}

/*
function check_tz_str($tz){
    //check if tz is just 'gmt'
    if (strlen($tz) == 3){
    	return 'GMT_0';
    }     
	//check tz is followed by '_' or '+'
	if(!contains($tz,array('_','-'))){
		echo 'here';
	    tz_error_log($tz);
    	return 'GMT_0';
	}  
	
	//check the last part is a number
	$nm = str_ireplace('GMT', "", $tz);
	$mn = str_replace('_', "+", $nm);
	if(!is_numeric($nm)){
		tz_error_log($tz);
    	return 'GMT_0';
	}
	
	return $tz;
	
}



function tz_error_log($tz){

    if(array_key_exists('HTTP_REFERER',$_SERVER)){
     $referer = $_SERVER['HTTP_REFERER'];
    }else{
     $referer = 'Call made via ajax refer to previous log entries to see the url';
    }
	error_log('WARNING: An error has occured due to incorrect tz querystring being sent. The clock was accessed via the following URL:
   '.$referer.' 
    The user has been presented with  the GMT timezone instead.');
}

*/

