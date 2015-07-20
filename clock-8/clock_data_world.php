
<?php

$tzone_choice = $GLOBALS['h'];

function timez($y)
{
	$e = $y;
	$f = intval($y);
	$v = null;
	if ($f > 0)
	{
		$v = "+";
	}
	elseif ($f < 0)
	{
		$v = "-";
	}
	$in_hrs = $f / 3600000;
	if ($in_hrs < 10 && $in_hrs > 0 || $in_hrs > -10 && $in_hrs <0)
	{
		if ($in_hrs < 0)
		{
			$in_hrs = $in_hrs - $in_hrs - $in_hrs;
		}
		
		if (strstr($in_hrs, ".25"))
		{
			$in_hrs = str_replace('.25', ':15', $in_hrs);
		}
		elseif (strstr($in_hrs, ".5"))
		{
			$in_hrs = str_replace('.5', ':30', $in_hrs);
		}
		elseif (strstr($in_hrs, ".75"))
		{
			$in_hrs = str_replace('.75', ':45', $in_hrs);
		}
		else
		{
			$in_hrs = $in_hrs . ":00";
		}
		$in_hrs = $in_hrs;
	}
	else
	{
		if ($in_hrs < 0)
		{
			$in_hrs = $in_hrs - $in_hrs - $in_hrs;
		}
	
		if (strstr($in_hrs, ".25"))
		{
			$in_hrs = str_replace('.25', ':15', $in_hrs);
		}
		elseif (strstr($in_hrs, ".5"))
		{
			$in_hrs = str_replace('.5', ':30', $in_hrs);
		}
		elseif (strstr($in_hrs, ".75"))
		{
			$in_hrs = str_replace('.75', ':45', $in_hrs);
		}
		else
		{
			$in_hrs = $in_hrs . ":00";
		}
		if ($in_hrs == 0)
		{
			$in_hrs = $in_hrs;
		}
	}
	echo '	df = ' . $f . ';
	jt = "Local Time = GMT ' . $v . ' ' . $in_hrs . ' (Standard Time)";
';
}


$gmttt = '	df = 0;
		jt = "GMT (Standard Time)";
';

switch($tzone_choice)
{
case 'us_central':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'nz_chat':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,14,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,8,26,14,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 49500000;
    jt =  'GMT + 13:45';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 45900000;
    jt =  'GMT + 12:45';
};";
break;

case 'america_bahia_banderas':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'atlantic_faroe':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'america_shiprock':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'pacific_chatham':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,14,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,8,26,14,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 49500000;
    jt =  'GMT + 13:45';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 45900000;
    jt =  'GMT + 12:45';
};";
break;

case 'america_cancun':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'america_iqaluit':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'brazil_east':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,1,22,2,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,18,3,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -7200000;
    jt =  'GMT - 02:00';
};";
break;

case 'gb':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'america_menominee':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'pacific_fiji':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,0,17,14,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,17,14,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 43200000;
    jt =  'GMT + 12:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 46800000;
    jt =  'GMT + 13:00';
};";
break;

case 'antarctica_palmer':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,15,3,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,11,4,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'europe_tallinn':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_santa_isabel':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,10,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,9,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'europe_warsaw':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_sitka':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,11,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,10,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -32400000;
    jt =  'GMT - 09:00';
};";
break;

case 'europe_berlin':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_pangnirtung':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'america_nassau':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'australia_melbourne':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 36000000;
    jt =  'GMT + 10:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 39600000;
    jt =  'GMT + 11:00';
};";
break;

case 'europe_bucharest':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'wet':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'africa_tripoli':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,27,0,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,30,0,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_vancouver':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,10,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,9,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'chile_easterisland':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,15,3,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,11,4,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'australia_hobart':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 36000000;
    jt =  'GMT + 10:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 39600000;
    jt =  'GMT + 11:00';
};";
break;

case 'america_miquelon':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,5,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,4,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -7200000;
    jt =  'GMT - 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
};";
break;

case 'eire':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'america_detroit':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'pst8pdt':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,10,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,9,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'europe_vienna':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'atlantic_faeroe':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'cuba':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,5,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,5,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'asia_tel_aviv':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,27,0,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,23,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_havana':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,5,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,5,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'europe_brussels':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'cet':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'asia_istanbul':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'europe_tirane':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_tijuana':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,10,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,9,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'navajo':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'europe_kiev':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'europe_london':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'australia_canberra':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 36000000;
    jt =  'GMT + 10:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 39600000;
    jt =  'GMT + 11:00';
};";
break;

case 'eet':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_st_johns':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,5,30,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,4,30,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -9000000;
    jt =  'GMT - 02:30';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -12600000;
    jt =  'GMT - 03:30';
};";
break;

case 'mst7mdt':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'australia_yancowinna':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,30,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,30,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 34200000;
    jt =  'GMT + 09:30';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 37800000;
    jt =  'GMT + 10:30';
};";
break;

case 'america_north_dakota_new_salem':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'europe_vaduz':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_moncton':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,6,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,5,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'arctic_longyearbyen':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'europe_bratislava':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'europe_monaco':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'atlantic_madeira':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'cst6cdt':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'america_dawson':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,10,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,9,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'mexico_general':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,8,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,7,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'europe_mariehamn':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'atlantic_jan_mayen':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_fort_wayne':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'europe_andorra':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'mexico_bajanorte':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,10,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,9,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'canada_yukon':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,10,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,9,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'iran':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,21,20,30,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,8,21,19,30,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 16200000;
    jt =  'GMT + 04:30';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 12600000;
    jt =  'GMT + 03:30';
};";
break;

case 'australia_sydney':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 36000000;
    jt =  'GMT + 10:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 39600000;
    jt =  'GMT + 11:00';
};";
break;

case 'mexico_bajasur':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,9,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,8,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'australia_lord_howe':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,15,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,15,30,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 37800000;
    jt =  'GMT + 10:30';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 39600000;
    jt =  'GMT + 11:00';
};";
break;

case 'europe_chisinau':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_yellowknife':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'america_indiana_vevay':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'europe_sofia':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'chile_continental':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,15,3,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,11,4,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'america_rankin_inlet':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'america_kentucky_louisville':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'america_chihuahua':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,9,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,8,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'europe_athens':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_indiana_vincennes':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'atlantic_bermuda':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,6,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,5,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'us_pacific':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,10,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,9,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'america_godthab':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -7200000;
    jt =  'GMT - 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
};";
break;

case 'america_indiana_indianapolis':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'canada_atlantic':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,6,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,5,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'america_cambridge_bay':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'gb_eire':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'europe_dublin':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'us_michigan':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'america_asuncion':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,12,3,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,4,4,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
};";
break;

case 'america_nome':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,11,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,10,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -32400000;
    jt =  'GMT - 09:00';
};";
break;

case 'america_ensenada':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,10,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,9,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'america_montevideo':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,4,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,4,5,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -7200000;
    jt =  'GMT - 02:00';
};";
break;

case 'canada_central':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'australia_lhi':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,15,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,15,30,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 37800000;
    jt =  'GMT + 10:30';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 39600000;
    jt =  'GMT + 11:00';
};";
break;

case 'est5edt':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'asia_damascus':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,26,22,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,29,21,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'met':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_thunder_bay':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'europe_vilnius':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'europe_guernsey':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'america_mexico_city':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'europe_budapest':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'libya':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,27,0,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,30,0,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'europe_stockholm':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'asia_beirut':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,28,22,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,24,21,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_sao_paulo':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,1,22,2,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,18,3,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -7200000;
    jt =  'GMT - 02:00';
};";
break;

case 'australia_victoria':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 36000000;
    jt =  'GMT + 10:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 39600000;
    jt =  'GMT + 11:00';
};";
break;

case 'america_araguaina':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,1,22,2,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,18,3,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -7200000;
    jt =  'GMT - 02:00';
};";
break;

case 'us_aleutian':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,12,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,11,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -32400000;
    jt =  'GMT - 09:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -36000000;
    jt =  'GMT - 10:00';
};";
break;

case 'us_mountain':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'europe_zaporozhye':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_toronto':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'canada_newfoundland':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,3,31,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,2,31,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -9000000;
    jt =  'GMT - 02:30';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -12600000;
    jt =  'GMT - 03:30';
};";
break;

case 'asia_amman':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,26,22,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,29,22,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'europe_jersey':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'america_boise':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'australia_adelaide':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,30,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,30,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 34200000;
    jt =  'GMT + 09:30';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 37800000;
    jt =  'GMT + 10:30';
};";
break;

case 'america_kentucky_monticello':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'america_indianapolis':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'europe_zagreb':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_ojinaga':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'america_thule':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,6,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,5,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'america_montreal':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'atlantic_azores':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -3600000;
    jt =  'GMT - 01:00';
};";
break;

case 'turkey':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'canada_eastern':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'europe_uzhgorod':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'europe_zurich':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'europe_skopje':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'europe_belgrade':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_indiana_marengo':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'america_merida':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'pacific_apia':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,14,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,8,26,14,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 46800000;
    jt =  'GMT + 13:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 50400000;
    jt =  'GMT + 14:00';
};";
break;

case 'asia_tehran':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,21,20,30,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,8,21,19,30,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 16200000;
    jt =  'GMT + 04:30';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 12600000;
    jt =  'GMT + 03:30';
};";
break;

case 'australia_broken_hill':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,30,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,30,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 34200000;
    jt =  'GMT + 09:30';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 37800000;
    jt =  'GMT + 10:30';
};";
break;

case 'america_indiana_petersburg':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'asia_jerusalem':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,27,0,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,23,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'asia_nicosia':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'israel':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,27,0,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,23,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_atka':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,12,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,11,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -32400000;
    jt =  'GMT - 09:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -36000000;
    jt =  'GMT - 10:00';
};";
break;

case 'us_pacific_new':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,10,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,9,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'europe_paris':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'atlantic_canary':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'america_edmonton':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'africa_windhoek':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,0,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,8,6,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_halifax':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,6,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,5,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'antarctica_mcmurdo':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,14,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,8,26,14,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 46800000;
    jt =  'GMT + 13:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 43200000;
    jt =  'GMT + 12:00';
};";
break;

case 'asia_baku':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,0,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,0,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 18000000;
    jt =  'GMT + 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 14400000;
    jt =  'GMT + 04:00';
};";
break;

case 'america_nipigon':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'europe_san_marino':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_north_dakota_center':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'europe_helsinki':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'europe_oslo':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'w_su':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,28,23,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,24,23,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 14400000;
    jt =  'GMT + 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
};";
break;

case 'australia_nsw':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 36000000;
    jt =  'GMT + 10:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 39600000;
    jt =  'GMT + 11:00';
};";
break;

case 'america_mazatlan':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,9,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,8,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'europe_vatican':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'europe_madrid':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'europe_lisbon':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'america_indiana_tell_city':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'america_juneau':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,11,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,10,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -32400000;
    jt =  'GMT - 09:00';
};";
break;

case 'europe_simferopol':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_indiana_winamac':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'europe_belfast':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'poland':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'europe_ljubljana':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'canada_mountain':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'america_adak':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,12,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,11,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -32400000;
    jt =  'GMT - 09:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -36000000;
    jt =  'GMT - 10:00';
};";
break;

case 'america_matamoros':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'america_rainy_river':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'pacific_auckland':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,14,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,8,26,14,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 46800000;
    jt =  'GMT + 13:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 43200000;
    jt =  'GMT + 12:00';
};";
break;

case 'us_alaska':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,11,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,10,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -32400000;
    jt =  'GMT - 09:00';
};";
break;

case 'portugal':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'america_whitehorse':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,10,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,9,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'canada_pacific':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,10,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,9,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'australia_tasmania':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 36000000;
    jt =  'GMT + 10:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 39600000;
    jt =  'GMT + 11:00';
};";
break;

case 'america_yakutat':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,11,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,10,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -32400000;
    jt =  'GMT - 09:00';
};";
break;

case 'america_campo_grande':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,1,22,3,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,18,4,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'antarctica_south_pole':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,14,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,8,26,14,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 46800000;
    jt =  'GMT + 13:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 43200000;
    jt =  'GMT + 12:00';
};";
break;

case 'europe_podgorica':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'europe_istanbul':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_resolute':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'europe_luxembourg':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'us_eastern':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'america_north_dakota_beulah':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'africa_ceuta':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'australia_south':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,30,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,30,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 34200000;
    jt =  'GMT + 09:30';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 37800000;
    jt =  'GMT + 10:30';
};";
break;

case 'america_anchorage':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,11,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,10,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -32400000;
    jt =  'GMT - 09:00';
};";
break;

case 'nz':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,14,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,8,26,14,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 46800000;
    jt =  'GMT + 13:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 43200000;
    jt =  'GMT + 12:00';
};";
break;

case 'australia_act':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 36000000;
    jt =  'GMT + 10:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 39600000;
    jt =  'GMT + 11:00';
};";
break;

case 'australia_currie':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,4,16,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,3,16,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 36000000;
    jt =  'GMT + 10:00';

}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 39600000;
    jt =  'GMT + 11:00';
};";
break;

case 'europe_tiraspol':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'europe_rome':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'europe_nicosia':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'america_louisville':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'america_inuvik':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'america_indiana_knox':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'europe_riga':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 10800000;
    jt =  'GMT + 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
};";
break;

case 'europe_gibraltar':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_cuiaba':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,1,22,3,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,18,4,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'pacific_easter':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,15,3,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,11,4,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'africa_casablanca':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,26,2,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,8,27,2,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'america_denver':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,9,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,8,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
};";
break;

case 'us_indiana_starke':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'america_los_angeles':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,10,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,9,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -25200000;
    jt =  'GMT - 07:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -28800000;
    jt =  'GMT - 08:00';
};";
break;

case 'america_new_york':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'america_goose_bay':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,6,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,5,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'america_monterrey':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,3,5,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'america_knox_in':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'europe_sarajevo':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_chicago':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'europe_isle_of_man':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
};";
break;

case 'europe_copenhagen':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_winnipeg':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,8,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,7,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -21600000;
    jt =  'GMT - 06:00';
};";
break;

case 'us_east_indiana':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,24));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,24));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'europe_amsterdam':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'europe_prague':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_santiago':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,15,3,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,11,4,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'europe_malta':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 7200000;
    jt =  'GMT + 02:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = 3600000;
    jt =  'GMT + 01:00';
};";
break;

case 'america_glace_bay':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,6,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,5,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -10800000;
    jt =  'GMT - 03:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
};";
break;

case 'america_grand_turk':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,8,7,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,10,1,6,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = -14400000;
    jt =  'GMT - 04:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -18000000;
    jt =  'GMT - 05:00';
};";
break;

case 'america_scoresbysund':
echo "
var Spring = new Date();
Spring.setTime(Date.UTC(2015,2,29,1,0,0));
GoSpring = Spring.getTime();  

var Fall = new Date();
Fall.setTime(Date.UTC(2015,9,25,1,0,0));
GoFall = Fall.getTime();
if (ServerDSTCheck >= GoSpring && ServerDSTCheck < GoFall)
{
    df = 0;
    jt =  'GMT + 00:00';
}
else if (ServerDSTCheck < GoSpring || ServerDSTCheck >= GoFall)
{
    df = -3600000;
    jt =  'GMT - 01:00';
};";
break;


case 'america_metlakatla':
echo timez('-28800000');
break;


case 'etc_gmt+8':
echo timez('-28800000');
break;


case 'pacific_pitcairn':
echo timez('-28800000');
break;


case 'antarctica_dumontdurville':
echo timez('36000000');
break;


case 'asia_yakutsk':
echo timez('36000000');
break;


case 'australia_brisbane':
echo timez('36000000');
break;


case 'australia_lindeman':
echo timez('36000000');
break;


case 'australia_queensland':
echo timez('36000000');
break;


case 'etc_gmt_10':
echo timez('36000000');
break;


case 'pacific_chuuk':
echo timez('36000000');
break;


case 'pacific_guam':
echo timez('36000000');
break;


case 'pacific_port_moresby':
echo timez('36000000');
break;


case 'pacific_saipan':
echo timez('36000000');
break;


case 'pacific_truk':
echo timez('36000000');
break;


case 'pacific_yap':
echo timez('36000000');
break;


case 'antarctica_macquarie':
echo timez('39600000');
break;


case 'asia_sakhalin':
echo timez('39600000');
break;


case 'asia_vladivostok':
echo timez('39600000');
break;


case 'etc_gmt_11':
echo timez('39600000');
break;


case 'pacific_efate':
echo timez('39600000');
break;


case 'pacific_guadalcanal':
echo timez('39600000');
break;


case 'pacific_kosrae':
echo timez('39600000');
break;


case 'pacific_noumea':
echo timez('39600000');
break;


case 'pacific_pohnpei':
echo timez('39600000');
break;


case 'pacific_ponape':
echo timez('39600000');
break;


case 'atlantic_cape_verde':
echo timez('-3600000');
break;


case 'etc_gmt+1':
echo timez('-3600000');
break;


case 'australia_darwin':
echo timez('34200000');
break;


case 'australia_north':
echo timez('34200000');
break;


case 'etc_gmt+9':
echo timez('-32400000');
break;


case 'pacific_gambier':
echo timez('-32400000');
break;


case 'pacific_norfolk':
echo timez('41400000');
break;


case 'antarctica_davis':
echo timez('25200000');
break;


case 'asia_bangkok':
echo timez('25200000');
break;


case 'asia_ho_chi_minh':
echo timez('25200000');
break;


case 'asia_hovd':
echo timez('25200000');
break;


case 'asia_jakarta':
echo timez('25200000');
break;


case 'asia_novokuznetsk':
echo timez('25200000');
break;


case 'asia_novosibirsk':
echo timez('25200000');
break;


case 'asia_omsk':
echo timez('25200000');
break;


case 'asia_phnom_penh':
echo timez('25200000');
break;


case 'asia_pontianak':
echo timez('25200000');
break;


case 'asia_saigon':
echo timez('25200000');
break;


case 'asia_vientiane':
echo timez('25200000');
break;


case 'etc_gmt_7':
echo timez('25200000');
break;


case 'indian_christmas':
echo timez('25200000');
break;


case 'antarctica_casey':
echo timez('28800000');
break;


case 'asia_brunei':
echo timez('28800000');
break;


case 'asia_choibalsan':
echo timez('28800000');
break;


case 'asia_chongqing':
echo timez('28800000');
break;


case 'asia_chungking':
echo timez('28800000');
break;


case 'asia_harbin':
echo timez('28800000');
break;


case 'asia_hong_kong':
echo timez('28800000');
break;


case 'asia_kashgar':
echo timez('28800000');
break;


case 'asia_krasnoyarsk':
echo timez('28800000');
break;


case 'asia_kuala_lumpur':
echo timez('28800000');
break;


case 'asia_kuching':
echo timez('28800000');
break;


case 'asia_macao':
echo timez('28800000');
break;


case 'asia_macau':
echo timez('28800000');
break;


case 'asia_makassar':
echo timez('28800000');
break;


case 'asia_manila':
echo timez('28800000');
break;


case 'asia_shanghai':
echo timez('28800000');
break;


case 'asia_singapore':
echo timez('28800000');
break;


case 'asia_taipei':
echo timez('28800000');
break;


case 'asia_ujung_pandang':
echo timez('28800000');
break;


case 'asia_ulaanbaatar':
echo timez('28800000');
break;


case 'asia_ulan_bator':
echo timez('28800000');
break;


case 'asia_urumqi':
echo timez('28800000');
break;


case 'australia_perth':
echo timez('28800000');
break;


case 'australia_west':
echo timez('28800000');
break;


case 'etc_gmt_8':
echo timez('28800000');
break;


case 'hongkong':
echo timez('28800000');
break;


case 'prc':
echo timez('28800000');
break;


case 'roc':
echo timez('28800000');
break;


case 'singapore':
echo timez('28800000');
break;


case 'america_creston':
echo timez('-25200000');
break;


case 'america_dawson_creek':
echo timez('-25200000');
break;


case 'america_hermosillo':
echo timez('-25200000');
break;


case 'america_phoenix':
echo timez('-25200000');
break;


case 'etc_gmt+7':
echo timez('-25200000');
break;


case 'mst':
echo timez('-25200000');
break;


case 'us_arizona':
echo timez('-25200000');
break;


case 'antarctica_vostok':
echo timez('21600000');
break;


case 'asia_almaty':
echo timez('21600000');
break;


case 'asia_bishkek':
echo timez('21600000');
break;


case 'asia_dacca':
echo timez('21600000');
break;


case 'asia_dhaka':
echo timez('21600000');
break;


case 'asia_qyzylorda':
echo timez('21600000');
break;


case 'asia_thimbu':
echo timez('21600000');
break;


case 'asia_thimphu':
echo timez('21600000');
break;


case 'asia_yekaterinburg':
echo timez('21600000');
break;


case 'etc_gmt_6':
echo timez('21600000');
break;


case 'indian_chagos':
echo timez('21600000');
break;


case 'america_belize':
echo timez('-21600000');
break;


case 'america_costa_rica':
echo timez('-21600000');
break;


case 'america_el_salvador':
echo timez('-21600000');
break;


case 'america_guatemala':
echo timez('-21600000');
break;


case 'america_managua':
echo timez('-21600000');
break;


case 'america_regina':
echo timez('-21600000');
break;


case 'america_swift_current':
echo timez('-21600000');
break;


case 'america_tegucigalpa':
echo timez('-21600000');
break;


case 'canada_east_saskatchewan':
echo timez('-21600000');
break;


case 'canada_saskatchewan':
echo timez('-21600000');
break;


case 'etc_gmt+6':
echo timez('-21600000');
break;


case 'pacific_galapagos':
echo timez('-21600000');
break;


case 'australia_eucla':
echo timez('31500000');
break;


case 'america_atikokan':
echo timez('-18000000');
break;


case 'america_bogota':
echo timez('-18000000');
break;


case 'america_cayman':
echo timez('-18000000');
break;


case 'america_coral_harbour':
echo timez('-18000000');
break;


case 'america_guayaquil':
echo timez('-18000000');
break;


case 'america_jamaica':
echo timez('-18000000');
break;


case 'america_lima':
echo timez('-18000000');
break;


case 'america_panama':
echo timez('-18000000');
break;


case 'america_port_au_prince':
echo timez('-18000000');
break;


case 'est':
echo timez('-18000000');
break;


case 'etc_gmt+5':
echo timez('-18000000');
break;


case 'jamaica':
echo timez('-18000000');
break;


case 'asia_calcutta':
echo timez('19800000');
break;


case 'asia_colombo':
echo timez('19800000');
break;


case 'asia_kolkata':
echo timez('19800000');
break;


case 'africa_algiers':
echo timez('3600000');
break;


case 'africa_bangui':
echo timez('3600000');
break;


case 'africa_brazzaville':
echo timez('3600000');
break;


case 'africa_douala':
echo timez('3600000');
break;


case 'africa_kinshasa':
echo timez('3600000');
break;


case 'africa_lagos':
echo timez('3600000');
break;


case 'africa_libreville':
echo timez('3600000');
break;


case 'africa_luanda':
echo timez('3600000');
break;


case 'africa_malabo':
echo timez('3600000');
break;


case 'africa_ndjamena':
echo timez('3600000');
break;


case 'africa_niamey':
echo timez('3600000');
break;


case 'africa_porto_novo':
echo timez('3600000');
break;


case 'africa_tunis':
echo timez('3600000');
break;


case 'etc_gmt_1':
echo timez('3600000');
break;


case 'america_anguilla':
echo timez('-14400000');
break;


case 'america_antigua':
echo timez('-14400000');
break;


case 'america_aruba':
echo timez('-14400000');
break;


case 'america_barbados':
echo timez('-14400000');
break;


case 'america_blanc_sablon':
echo timez('-14400000');
break;


case 'america_boa_vista':
echo timez('-14400000');
break;


case 'america_curacao':
echo timez('-14400000');
break;


case 'america_dominica':
echo timez('-14400000');
break;


case 'america_eirunepe':
echo timez('-14400000');
break;


case 'america_grenada':
echo timez('-14400000');
break;


case 'america_guadeloupe':
echo timez('-14400000');
break;


case 'america_guyana':
echo timez('-14400000');
break;


case 'america_kralendijk':
echo timez('-14400000');
break;


case 'america_la_paz':
echo timez('-14400000');
break;


case 'america_lower_princes':
echo timez('-14400000');
break;


case 'america_manaus':
echo timez('-14400000');
break;


case 'america_marigot':
echo timez('-14400000');
break;


case 'america_martinique':
echo timez('-14400000');
break;


case 'america_montserrat':
echo timez('-14400000');
break;


case 'america_port_of_spain':
echo timez('-14400000');
break;


case 'america_porto_acre':
echo timez('-14400000');
break;


case 'america_porto_velho':
echo timez('-14400000');
break;


case 'america_puerto_rico':
echo timez('-14400000');
break;


case 'america_rio_branco':
echo timez('-14400000');
break;


case 'america_santo_domingo':
echo timez('-14400000');
break;


case 'america_st_barthelemy':
echo timez('-14400000');
break;


case 'america_st_kitts':
echo timez('-14400000');
break;


case 'america_st_lucia':
echo timez('-14400000');
break;


case 'america_st_thomas':
echo timez('-14400000');
break;


case 'america_st_vincent':
echo timez('-14400000');
break;


case 'america_tortola':
echo timez('-14400000');
break;


case 'america_virgin':
echo timez('-14400000');
break;


case 'brazil_acre':
echo timez('-14400000');
break;


case 'brazil_west':
echo timez('-14400000');
break;


case 'etc_gmt+4':
echo timez('-14400000');
break;


case 'africa_abidjan':
echo timez('0');
break;


case 'africa_accra':
echo timez('0');
break;


case 'africa_bamako':
echo timez('0');
break;


case 'africa_banjul':
echo timez('0');
break;


case 'africa_bissau':
echo timez('0');
break;


case 'africa_conakry':
echo timez('0');
break;


case 'africa_dakar':
echo timez('0');
break;


case 'africa_el_aaiun':
echo timez('0');
break;


case 'africa_freetown':
echo timez('0');
break;


case 'africa_lome':
echo timez('0');
break;


case 'africa_monrovia':
echo timez('0');
break;


case 'africa_nouakchott':
echo timez('0');
break;


case 'africa_ouagadougou':
echo timez('0');
break;


case 'africa_sao_tome':
echo timez('0');
break;


case 'africa_timbuktu':
echo timez('0');
break;


case 'america_danmarkshavn':
echo timez('0');
break;


case 'atlantic_reykjavik':
echo timez('0');
break;


case 'atlantic_st_helena':
echo timez('0');
break;


case 'etc_gmt':
echo timez('0');
break;


case 'etc_gmt+0':
echo timez('0');
break;


case 'etc_gmt_0':
echo timez('0');
break;


case 'etc_gmt0':
echo timez('0');
break;


case 'etc_greenwich':
echo timez('0');
break;


case 'etc_uct':
echo timez('0');
break;


case 'etc_utc':
echo timez('0');
break;


case 'etc_universal':
echo timez('0');
break;


case 'etc_zulu':
echo timez('0');
break;


case 'gmt':
echo timez('0');
break;


case 'gmt+0':
echo timez('0');
break;


case 'gmt_0':
echo timez('0');
break;


case 'gmt0':
echo timez('0');
break;


case 'greenwich':
echo timez('0');
break;


case 'iceland':
echo timez('0');
break;


case 'uct':
echo timez('0');
break;


case 'utc':
echo timez('0');
break;


case 'universal':
echo timez('0');
break;


case 'zulu':
echo timez('0');
break;


case 'etc_gmt+12':
echo timez('-43200000');
break;


case 'pacific_marquesas':
echo timez('-34200000');
break;


case 'africa_addis_ababa':
echo timez('10800000');
break;


case 'africa_asmara':
echo timez('10800000');
break;


case 'africa_asmera':
echo timez('10800000');
break;


case 'africa_dar_es_salaam':
echo timez('10800000');
break;


case 'africa_djibouti':
echo timez('10800000');
break;


case 'africa_juba':
echo timez('10800000');
break;


case 'africa_kampala':
echo timez('10800000');
break;


case 'africa_khartoum':
echo timez('10800000');
break;


case 'africa_mogadishu':
echo timez('10800000');
break;


case 'africa_nairobi':
echo timez('10800000');
break;


case 'antarctica_syowa':
echo timez('10800000');
break;


case 'asia_aden':
echo timez('10800000');
break;


case 'asia_baghdad':
echo timez('10800000');
break;


case 'asia_bahrain':
echo timez('10800000');
break;


case 'asia_kuwait':
echo timez('10800000');
break;


case 'asia_qatar':
echo timez('10800000');
break;


case 'asia_riyadh':
echo timez('10800000');
break;


case 'etc_gmt_3':
echo timez('10800000');
break;


case 'europe_kaliningrad':
echo timez('10800000');
break;


case 'europe_minsk':
echo timez('10800000');
break;


case 'indian_antananarivo':
echo timez('10800000');
break;


case 'indian_comoro':
echo timez('10800000');
break;


case 'indian_mayotte':
echo timez('10800000');
break;


case 'etc_gmt_14':
echo timez('50400000');
break;


case 'pacific_kiritimati':
echo timez('50400000');
break;


case 'africa_blantyre':
echo timez('7200000');
break;


case 'africa_bujumbura':
echo timez('7200000');
break;


case 'africa_cairo':
echo timez('7200000');
break;


case 'africa_gaborone':
echo timez('7200000');
break;


case 'africa_harare':
echo timez('7200000');
break;


case 'africa_johannesburg':
echo timez('7200000');
break;


case 'africa_kigali':
echo timez('7200000');
break;


case 'africa_lubumbashi':
echo timez('7200000');
break;


case 'africa_lusaka':
echo timez('7200000');
break;


case 'africa_maputo':
echo timez('7200000');
break;


case 'africa_maseru':
echo timez('7200000');
break;


case 'africa_mbabane':
echo timez('7200000');
break;


case 'asia_gaza':
echo timez('7200000');
break;


case 'asia_hebron':
echo timez('7200000');
break;


case 'egypt':
echo timez('7200000');
break;


case 'etc_gmt_2':
echo timez('7200000');
break;


case 'asia_dili':
echo timez('32400000');
break;


case 'asia_irkutsk':
echo timez('32400000');
break;


case 'asia_jayapura':
echo timez('32400000');
break;


case 'asia_pyongyang':
echo timez('32400000');
break;


case 'asia_seoul':
echo timez('32400000');
break;


case 'asia_tokyo':
echo timez('32400000');
break;


case 'etc_gmt_9':
echo timez('32400000');
break;


case 'japan':
echo timez('32400000');
break;


case 'pacific_palau':
echo timez('32400000');
break;


case 'rok':
echo timez('32400000');
break;


case 'asia_rangoon':
echo timez('23400000');
break;


case 'indian_cocos':
echo timez('23400000');
break;


case 'asia_kathmandu':
echo timez('20700000');
break;


case 'asia_katmandu':
echo timez('20700000');
break;


case 'america_argentina_buenos_aires':
echo timez('-10800000');
break;


case 'america_argentina_catamarca':
echo timez('-10800000');
break;


case 'america_argentina_comodrivadavia':
echo timez('-10800000');
break;


case 'america_argentina_cordoba':
echo timez('-10800000');
break;


case 'america_argentina_jujuy':
echo timez('-10800000');
break;


case 'america_argentina_la_rioja':
echo timez('-10800000');
break;


case 'america_argentina_mendoza':
echo timez('-10800000');
break;


case 'america_argentina_rio_gallegos':
echo timez('-10800000');
break;


case 'america_argentina_salta':
echo timez('-10800000');
break;


case 'america_argentina_san_juan':
echo timez('-10800000');
break;


case 'america_argentina_san_luis':
echo timez('-10800000');
break;


case 'america_argentina_tucuman':
echo timez('-10800000');
break;


case 'america_argentina_ushuaia':
echo timez('-10800000');
break;


case 'america_bahia':
echo timez('-10800000');
break;


case 'america_belem':
echo timez('-10800000');
break;


case 'america_buenos_aires':
echo timez('-10800000');
break;


case 'america_catamarca':
echo timez('-10800000');
break;


case 'america_cayenne':
echo timez('-10800000');
break;


case 'america_cordoba':
echo timez('-10800000');
break;


case 'america_fortaleza':
echo timez('-10800000');
break;


case 'america_jujuy':
echo timez('-10800000');
break;


case 'america_maceio':
echo timez('-10800000');
break;


case 'america_mendoza':
echo timez('-10800000');
break;


case 'america_paramaribo':
echo timez('-10800000');
break;


case 'america_recife':
echo timez('-10800000');
break;


case 'america_rosario':
echo timez('-10800000');
break;


case 'america_santarem':
echo timez('-10800000');
break;


case 'antarctica_rothera':
echo timez('-10800000');
break;


case 'atlantic_stanley':
echo timez('-10800000');
break;


case 'etc_gmt+3':
echo timez('-10800000');
break;


case 'etc_gmt+10':
echo timez('-36000000');
break;


case 'hst':
echo timez('-36000000');
break;


case 'pacific_honolulu':
echo timez('-36000000');
break;


case 'pacific_johnston':
echo timez('-36000000');
break;


case 'pacific_rarotonga':
echo timez('-36000000');
break;


case 'pacific_tahiti':
echo timez('-36000000');
break;


case 'us_hawaii':
echo timez('-36000000');
break;


case 'america_noronha':
echo timez('-7200000');
break;


case 'atlantic_south_georgia':
echo timez('-7200000');
break;


case 'brazil_denoronha':
echo timez('-7200000');
break;


case 'etc_gmt+2':
echo timez('-7200000');
break;


case 'asia_kabul':
echo timez('16200000');
break;


case 'etc_gmt+11':
echo timez('-39600000');
break;


case 'pacific_midway':
echo timez('-39600000');
break;


case 'pacific_niue':
echo timez('-39600000');
break;


case 'pacific_pago_pago':
echo timez('-39600000');
break;


case 'pacific_samoa':
echo timez('-39600000');
break;


case 'us_samoa':
echo timez('-39600000');
break;


case 'antarctica_mawson':
echo timez('18000000');
break;


case 'asia_aqtau':
echo timez('18000000');
break;


case 'asia_aqtobe':
echo timez('18000000');
break;


case 'asia_ashgabat':
echo timez('18000000');
break;


case 'asia_ashkhabad':
echo timez('18000000');
break;


case 'asia_dushanbe':
echo timez('18000000');
break;


case 'asia_karachi':
echo timez('18000000');
break;


case 'asia_oral':
echo timez('18000000');
break;


case 'asia_samarkand':
echo timez('18000000');
break;


case 'asia_tashkent':
echo timez('18000000');
break;


case 'etc_gmt_5':
echo timez('18000000');
break;


case 'indian_kerguelen':
echo timez('18000000');
break;


case 'indian_maldives':
echo timez('18000000');
break;


case 'america_caracas':
echo timez('-16200000');
break;


case 'asia_anadyr':
echo timez('43200000');
break;


case 'asia_kamchatka':
echo timez('43200000');
break;


case 'asia_magadan':
echo timez('43200000');
break;


case 'etc_gmt_12':
echo timez('43200000');
break;


case 'kwajalein':
echo timez('43200000');
break;


case 'pacific_funafuti':
echo timez('43200000');
break;


case 'pacific_kwajalein':
echo timez('43200000');
break;


case 'pacific_majuro':
echo timez('43200000');
break;


case 'pacific_nauru':
echo timez('43200000');
break;


case 'pacific_tarawa':
echo timez('43200000');
break;


case 'pacific_wake':
echo timez('43200000');
break;


case 'pacific_wallis':
echo timez('43200000');
break;


case 'asia_dubai':
echo timez('14400000');
break;


case 'asia_muscat':
echo timez('14400000');
break;


case 'asia_tbilisi':
echo timez('14400000');
break;


case 'asia_yerevan':
echo timez('14400000');
break;


case 'etc_gmt_4':
echo timez('14400000');
break;


case 'europe_moscow':
echo timez('14400000');
break;


case 'europe_samara':
echo timez('14400000');
break;


case 'europe_volgograd':
echo timez('14400000');
break;


case 'indian_mahe':
echo timez('14400000');
break;


case 'indian_mauritius':
echo timez('14400000');
break;


case 'indian_reunion':
echo timez('14400000');
break;


case 'etc_gmt_13':
echo timez('46800000');
break;


case 'pacific_enderbury':
echo timez('46800000');
break;


case 'pacific_fakaofo':
echo timez('46800000');
break;


case 'pacific_tongatapu':
echo timez('46800000');
break;


default:
echo $gmttt;
}
?>
