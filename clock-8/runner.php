<?php

require_once('timezones.php');
global $datetime;
global $diff;
$diff=null;
global $tz;

//guard against malicous script
if(!isset($_GET['convert'])){
    if(isset($_GET['tz']) || isset($_GET['convert'])) {
        $tz = urldecode((filter_var($_GET['tz'], FILTER_SANITIZE_STRING)));
        if (strpos($tz, 'gmt') !== FALSE)
        {
            if(strlen($tz) > 3)
            {
                if(!contains($tz,array('_','-')))
                {
                    return false;
                }
            }
        }
        else
        {
            $diff=null;
            $tz = tz_format($tz);
        }
        $datetime = new Greenwich_time($tz,$diff);
    }

    if(!isset($_GET['tz']) && !isset($_GET['convert']))
    {
        $tz = date_default_timezone_get();
        $diff=null;
        $datetime = new Greenwich_time($tz,$diff);
    }
    else
    {
        $tz = urldecode((filter_var($_GET['tz'], FILTER_SANITIZE_STRING)));
        if ($tz != 'gmt')
        {
            if (strpos($tz, 'gmt') !== FALSE)
            {
                $diff = get_time_diff($tz);
                $tz = 'Europe/London';
            }
            else
            {
                $diff=null;
                $tz = tz_format($tz);
            }
        }
        $datetime = new Greenwich_time($tz,$diff);
    }
}
global $datetimeTZ1;
global $datetimeTZ2;
global $difftz1;
global $difftz2;
global $tz1;
global $tz2;
global $tz3;
global $tz4;
global $tz5;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">

        <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
        Remove this if you use the .htaccess -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>HTML</title>
        <meta name="description" content="">
        <meta name="author" content="Greenwich 2000">
        <link href="timezones.css" rel="stylesheet" type="text/css" media="all">
        <script type="text/javascript" src="jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="jquery-clockpicker.min.css">
        <script type="text/javascript" src="jquery-clockpicker.min.js"></script>
        <script type="text/javascript" src="moment-with-locales.js"></script>
        <script type="text/javascript" src="moment-timezone-with-data-2010-2020.js"></script>
        <script type="text/javascript" src="timezones.full.min.js"></script>
        <link rel="stylesheet" type="text/css" href="select2.min.css">
        <script type="text/javascript" src="select2.full.min.js"></script>
        
        <link rel="icon" href="/images/favicons/favicon.ico">
        <link rel="apple-touch-icon" href="/images/favicons/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="57x57" href="/images/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/images/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/images/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/images/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/images/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/images/favicons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192" href="/images/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/images/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">
        <!-- MOBILE -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
        
        <script type="text/javascript">
            var offset_1 = null;
            var offset_2 = null;
            var diff1 = null;
            <?php if($diff) echo "diff1 = '".$diff."';"; ?>
            
            var diff = <?php echo (($diff) ? ("'".$diff."'") : "null").";\n";?>

            var format = 'H';
            $.ajaxSetup({ cache: false });
            
            <?php if(!isset($_GET['convert'])){
            
            $seconds = $datetime->get_seconds();
            $mins = $datetime->get_minutes();
            $hrs = $datetime->get_hours();
            $js = <<<HEREDOC
var seconds = $seconds;
            var mins = $mins;
            var hrs = $hrs;
            var data = {tz:'$tz',fm:format,diff:diff};
HEREDOC;
            echo($js);}
            ?>    
            
            
            <?php if(isset($_GET['convert'])){

            $js = <<<HEREDOC
            var tz1_hrs = null;
            var tz2_hrs = null;
            var tz1_min = null;
            var tz2_min = null;
            function getTZ1Tick(zone) {
                var data_convert = {tz:zone,fm:format,diff:diff};
                $.post('time_request.php', 
                    data_convert, 
                    function(response){
                        offset_1 = response.offset;
                        tz1_hrs = response.hours;
                        tz1_min = response.minutes;
                        tz1_date = response.date;
                        $('#input-a').val(''+tz1_hrs+':'+tz1_min);
                        $('#indate').html(tz1_date);
                    },
                    'json'
                );
                
            }
            function getTZ2Tick(zone) {
                var data_convert = {tz:zone,fm:format,diff:diff};
                $.post('time_request.php', 
                    data_convert, 
                    function(response){ 
                        offset_2 = response.offset;
                        tz2_hrs = response.hours;
                        tz2_min = response.minutes;
                        tz2_date = response.date;
                        $('#output-a').val(''+tz2_hrs+':'+tz2_min);
                        $('#outdate').html(tz2_date);
                    },
                    'json'
                );
            }
            
HEREDOC;
            echo($js);}
            else {
            $js = <<<HEREDOC
function getTick() {
                $.post('time_request.php', 
                    data, 
                    function(response){
                        $("#sec").html(response.seconds);
                        $("#min").html (response.minutes);
                        $("#hours").html(response.hours);
                        $("#Date").html(response.date);  
                        $(".GmtDiff").html(response.offset);
                    },
                    'json'
                );
            }
HEREDOC;
            echo($js);}
            ?>
<?php if(!isset($_GET['convert'])){
$seconds = ($datetime->get_seconds() + 15 ) % 60;
$js = <<<HEREDOC
$(document).ready(function() {
                setInterval(function() {
                    seconds = parseInt($("#sec").text()) +1;
                    if (seconds == $seconds) {
                        getTick();
                    }
                    if (seconds > 59) {
                        mins = parseInt($("#min").text()) + 1;
                        seconds = 0;
                        if (mins > 59) {
                            hrs = parseInt($("#hours").text()) + 1;
                            if (hrs > 23) {
                                hrs =  0;
                            }
                            $("#hours").html(( hrs < 10 ? "0" : "" ) + hrs);
                        }   
                        $("#min").html(( mins < 10 ? "0" : "" ) + mins);
                    }
                    $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
                    
                },1000);
                
                $( ".clockformat" ).click(function() {
                            format = $(this).data("format");
                            var data = {tz:'$tz',fm:format,diff:diff};
                            if(format == 'H'){
                                $(this).data("format",'h');
                                $(this).val("Switch to 12 hour clock");
                            }else{
                                $(this).data("format",'H');
                                $(this).val("Switch to 24 hour clock");
                            }
                            
                            $.post(
                               'time_request.php', 
                               data, 
                               function(response){
                                   seconds = response.seconds;
                                   $("#sec").html(seconds);
                                   $("#min").html (response.minutes);
                                   $("#hours").html(response.hours);
                                   $("#Date").html(response.date);
                                   if(format == 'h'){
                                     $("#ampm").html(response.ampm);
                                   }else{
                                    $("#ampm").html('');
                                   }    
                                   
                                   $(".GmtDiff").html(response.offset);
                                  
                               },
                               'json'
                            );  
                }); 
        });
        
HEREDOC;
echo($js);
}
?>   
    $(document).ready(function() {
    <?php if(isset($_GET['convert'])){
        $js = <<< HEREDOC
        tz_1_name = 'Europe/London';
        tz_2_name = 'Europe/Paris';
        var tz1_date_obj = moment.tz((new Date).getTime(),tz_1_name);
        var tz2_date_obj = moment.tz((new Date).getTime(),tz_2_name);

        function split(s) {
            var s = s.toString();
            var p = s.split(':');
            return p
        }

        tz1_curr = getTZ1Tick(tz_1_name);
        tz2_curr = getTZ2Tick(tz_2_name);
        var input = $('#input-a');
        var curr_hrs = null;
        var curr_min = null;
        
        var m_names = ["January", "February", "March", 
        "April", "May", "June", "July", "August", "September", 
        "October", "November", "December"];

        var d_names = ["Sunday","Monday", "Tuesday", "Wednesday", 
        "Thursday", "Friday", "Saturday"];
        
       
        
        input.clockpicker({
            autoclose: false,
            donetext: 'Done',
            afterDone: function() {
                tz1_date_obj.tz(tz_1_name);
                tz1_date_obj.hour(parseInt(split($('#input-a').val())[0]));
                tz1_date_obj.minute(parseInt(split($('#input-a').val())[1]));
                tz1_date_obj.tz(tz_2_name);
                var time=('0'  + tz1_date_obj.hour()).slice(-2)+':'+('0' + tz1_date_obj.minute()).slice(-2);
                $('#output-a').val(time);
                $('#outdate').html(d_names[tz1_date_obj.day()] + ", " + tz1_date_obj.date() + " "+ m_names[tz1_date_obj.month()]);
                
            }
        });

        // Manual operations
        $('#button-ia').click(function(e){
            // Have to stop propagation here
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'minutes');
        });
        $('#button-ib').click(function(e){
            // Have to stop propagation here
            e.stopPropagation();
            input.clockpicker('show').clockpicker('toggleView', 'hours');
        });
        $('#tz_1_picker').timezones();
        $("#tz_1_picker").prop("selectedIndex", 285); 
        $('#tz_1_picker').select2();
        $('#tz_2_picker').timezones();
        $("#tz_2_picker").prop("selectedIndex", 338);
        $('#tz_2_picker').select2();
        $('#tz_1_picker').on("select2:select", function(e) { 
            var location = e.params.data.text.split(' ')
            tz_1_name = location[2];
            tz1_date_obj.tz(tz_1_name);
            tz1_date_obj.hour(parseInt(split($('#input-a').val())[0]));
            tz1_date_obj.minute(parseInt(split($('#input-a').val())[1]));
            tz1_date_obj.tz(tz_2_name);
            var time=('0'  + tz1_date_obj.hour()).slice(-2)+':'+('0' + tz1_date_obj.minute()).slice(-2);
            $('#output-a').val(time);
            $('#outdate').html(d_names[tz1_date_obj.day()] + ", " + tz1_date_obj.date() + " "+ m_names[tz1_date_obj.month()]);
        });
        $('#tz_2_picker').on("select2:select", function(e) { 
            var location = e.params.data.text.split(' ')
            tz_2_name = location[2];
            tz1_date_obj.tz(tz_1_name);
            tz1_date_obj.hour(parseInt(split($('#input-a').val())[0]));
            tz1_date_obj.minute(parseInt(split($('#input-a').val())[1]));
            tz1_date_obj.tz(tz_2_name);
            var time=('0'  + tz1_date_obj.hour()).slice(-2)+':'+('0' + tz1_date_obj.minute()).slice(-2);
            $('#output-a').val(time);
            $('#outdate').html(d_names[tz1_date_obj.day()] + ", " + tz1_date_obj.date() + " "+ m_names[tz1_date_obj.month()]);
        });
        $('#input-a').val('12:00');

HEREDOC;
        echo($js);}
    ?>
    
    });
    </script>
    </head>
    <body class="old">
            <?php if(isset($_GET['convert'])){
            $html = <<<HEREDOC
<div class="GmtDiff clock-top"></div>
    <div class="clock">
        <div class="container">
                <select id="tz_1_picker" class="form-control"></select>
                <input id="input-a" value="" data-default="00:00"><span id='indate'></span>
        </div>
        <div class="TZ1GmtDiff clock-bottom"></div>

        <select id="tz_2_picker" class="form-control"></select>

        <input id="output-a" value="" data-default="00:00"><span id='outdate'></span>

        <div class="TZ2GmtDiff clock-bottom"></div>
    </div>
HEREDOC;
            echo($html);}

            else {
            $regular_diff = $datetime->get_offset();
            $regular_date = $datetime->get_date();
            $regular_hours = $datetime->get_hours();
            $regular_minutes = $datetime->get_minutes();
            $regular_seconds = $datetime->get_seconds();
            $html = <<<HEREDOC
<div class="GmtDiff clock-top">$regular_diff</div>
        <div class="clock">
            <div id="Date">$regular_date</div>
            <ul>
               <li id="hours">$regular_hours</li>
               <li id="point1">:</li>
               <li id="min">$regular_minutes</li>
               <li id="point2">:</li>
               <li id="sec">$regular_seconds</li>
               <li id="ampm"></li>
            </ul>
            <div class="GmtDiff clock-bottom">$regular_diff</div>           
        </div>
HEREDOC;
            echo($html);}
            ?>   
    </body>
</html>
