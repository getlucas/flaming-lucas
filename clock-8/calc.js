function calc(millis,offset,label)
{
	this.startedAt = new Date().getTime();
	// Define the class variables. This allows instances to track the number of times
	// the miliseconds have been requested from the server (getmsAtt); the ms and offset returned;
	// it also defines the user's timezone as provided by the machine where the script is being
	// executed
	this.getmsAtt = 0;
	this.mls = millis;
	this.offset = offset;
	this.userOffset = new Date().getTimezoneOffset();
	this.jt = label;
	this.am_pm = "";
	this.display_24 = false;
        this.months = new Array("January","February","March","April","May","June","July","August","September","October","November","December");
        this.days = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
	
	// Request a new ms value if the current one is undefined (null), up to a maximum of 5 times.
	// Haven't yet decided what to do if nothing comes through after the 5th attempt.
}

calc.prototype.to_utc = function()
{
	// This takes the ms from the server, adds the offset and produces the UTC values at that time.
	var dateBuffer = new Date(this.mls+this.offset);
	this.utcYear = dateBuffer.getUTCFullYear();
	this.utcMonth = dateBuffer.getUTCMonth();
	this.utcDate = dateBuffer.getUTCDate();
	this.utcHours = dateBuffer.getUTCHours();
	this.utcMinutes = dateBuffer.getUTCMinutes();
	this.utcSeconds = dateBuffer.getUTCSeconds();
	this.utcMilliseconds = dateBuffer.getUTCMilliseconds();
}

calc.prototype.nice_offset = function()
{
	// This takes in the offset from the server and converts it to a nice human readable format.
	// At the moment it replicates the behaviour of toString in its formatting.
	
	// First we convert the time from ms to hours (which can be an integer or a float). 
	var niceOffset = (this.offset / 3600000);
	
	// This handles integer offsets between -10 and +10 - no conversion to minutes required.
	// toString defaults to displaying offsets lower than 10 with a leading 0.
	if (niceOffset < 10 && niceOffset > -10 && niceOffset % 1 == 0)
	{
		// Negative offsets
		if (niceOffset < 0)
		{
			// This inverts the offset (since toString places the negative symbol before the leading 0) [Note 1]
			niceOffset = -niceOffset;
			this.niceOffset = '(GMT - ' + niceOffset + ':00' + ")";
		}
		// Positive offsets
		else
		{
			this.niceOffset = '(GMT + ' + niceOffset + ':00' + ")";
		}
	}
	
	// This handles floating point offsets between -10 and +10 where we convert the part after the decimal to minutes.
	else if (niceOffset < 10 && niceOffset > -10 && niceOffset % 1 != 0)
	{
		// Negative offsets
		if (niceOffset < 0)
		{
			// See Note 1
			niceOffset = -niceOffset;
			// This converts just the part after the decimal place in the offset to minutes. [Note 2]
			var niceOffsetMin = 60 * (niceOffset % 1);
			// This converts the part before the decimal place to an integer (since we already have the minutes). [Note 3]
			var niceOffsetHours = parseInt(niceOffset);
			this.niceOffset = '(GMT - ' + niceOffsetHours + ":" + niceOffsetMin + ")";
		}
		// Positive offsets
		else
		{
			// See Note 2
			var niceOffsetMin = 60 * (niceOffset % 1);
			// See Note 3
			var niceOffsetHours = parseInt(niceOffset);
			this.niceOffset = '(GMT + ' + niceOffsetHours + ":" + niceOffsetMin + ")";
		}
	}
	
	// This handles integer offsets lower than -10 and  higher than +10 - no conversion to minutes required.
	else if ((niceOffset >= 10 || niceOffset <= -10) && niceOffset % 1 == 0)
	{
		// Negative offsets
		if (niceOffset < 0)
		{
			// We invert the number anyway, since the - that goes before actual negative numbers is slightly
			// shorter than the actual - symbol. This just keeps the whole script looking the same.
			// Obviously, there's no leading 0 here. [Note 4]
			niceOffset = -niceOffset;
			this.niceOffset = '(GMT - ' + niceOffset + ':00' + ")";
		}
		// Positive offsets
		else
		{
			this.niceOffset = '(GMT + ' + niceOffset + ':00' + ")";
		}
	}
	
	// This handles floating point offsets lower than -10 and higer than +10 where we convert the part 
	// after the decimal to minutes.
	else if ((niceOffset >= 10 || niceOffset <= -10) && niceOffset % 1 != 0)
	{
		// Negative offsets
		if (niceOffset < 0)
		{
			// See Note 4
			niceOffset = -niceOffset;
			// See Note 2
			var niceOffsetMin = 60 * (niceOffset % 1);
			// See Note 3
			var niceOffsetHours = parseInt(niceOffset);
			this.niceOffset = '(GMT - ' + niceOffsetHours + ":" + niceOffsetMin + ")";
		}
		// Positive offsets
		else
		{
			// See Note 2
			var niceOffsetMin = 60 * (niceOffset % 1);
			// See Note 3
			var niceOffsetHours = parseInt(niceOffset);
			this.niceOffset = '(GMT + ' + niceOffsetHours + ":" + niceOffsetMin + ")";
		}
	}
}

// Simple builtin conversion of ms from server to a string representing GMT.
// _May_ suffer from locale issues on some systems - and thus require a manual approach.
calc.prototype.gmt_time = function()
{
	this.gmtTime = new Date(this.mls+((new Date().getTime())-this.startedAt)).toUTCString();
}

// Simple builtin conversion of ms from server to a string representing user's time.
// Includes offset and timezone name.
// _May_ suffer from locale issues on some systems - and thus require a manual approach.
calc.prototype.user_time = function()
{
	this.userTime = new Date(this.mls+((new Date().getTime())-this.startedAt)).toLocaleString();
} 

// Workaround for displaying a third (the offset) time. Uses .toUTCString but mimics .toString, 
// so requires nice_offset to provide human readable offset information. Since it's not a built-in, does not
// provide timezone name. TODO: Make server-side send through timezone name so this function can display it.
// _May_ suffer from locale issues on some systems - and thus require a manual approach.

calc.prototype.hoursZeroAdder = function(hrs)
{
	if (this.display_24 == false)
	{
		if (24/hrs <=2 && hrs != 0)
		{
			if (hrs != 12)
			{
				hrs = hrs-12;
			}
			this.am_pm = " p.m.";
		}
		else
		{
			this.am_pm = " a.m";
		}
		
	}
	return hrs;
}
	
calc.prototype.minutesZeroAdder = function(mins)
{
	if (mins < 10)
	{
		mins = "0" + mins;
	}
	return mins;
}
	
calc.prototype.secondsZeroAdder = function(secs)
{
	if (secs < 10)
	{
		secs = "0" + secs;
	}
	return secs;
}

calc.prototype.offset_time = function()
{
	var offsetTime = new Date(Date.UTC(this.utcYear,this.utcMonth,this.utcDate,this.utcHours,this.utcMinutes,this.utcSeconds, this.utcMilliseconds)).getTime();
	this.offsetTime = new Date(offsetTime+((new Date().getTime())-this.startedAt));
	var apOffsetTime = this.days[this.offsetTime.getUTCDay()] + ", ";
	apOffsetTime += this.offsetTime.getUTCDate() + " ";
	apOffsetTime += this.months[this.offsetTime.getUTCMonth()] + "<br />";
	apOffsetTime += this.hoursZeroAdder(this.offsetTime.getUTCHours()) + ":" + this.minutesZeroAdder(this.offsetTime.getUTCMinutes()) + ":" + this.secondsZeroAdder(this.offsetTime.getUTCSeconds()) + this.am_pm;
	this.apOffsetTime = apOffsetTime;
}

calc.prototype.switch_time = function()
{
	this.display_24 = !this.display_24;
	this.am_pm = "";
	if (this.display_24 == true)
	{
		document.getElementById("24_sw").innerHTML = "Switch to 12 hour display";
	}
	else
	{
		document.getElementById("24_sw").innerHTML = "Switch to 24 hour display";
	}

}
