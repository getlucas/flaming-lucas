function ajax_request(loc)
{
	this.xmlHttp = null;
	try
  	{
  		// Firefox, Opera 8.0+, Safari
  		this.xmlHttp=new XMLHttpRequest();
  	}

	catch (e)
  	{
  		// Internet Explorer
 		try
    		{
    			this.xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    		}

  		catch (e)
    		{
    			try
      			{
      				this.xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      			}

    			catch (e)
      			{
      				alert("Your browser does not support AJAX!");
      				return false;
      			}
    		}
  	}
	if (this.xmlHttp!=null)
  	{
  		this.xmlHttp.onreadystatechange=this.state_change;
  		this.xmlHttp.open("GET",loc,true);
  		this.xmlHttp.send(null);
  	}
}

ajax_request.prototype.state_change = function()
{	
	if (this.readyState == 4)
	{
		if (this.status == 200)
		{
			return;
		}
	}
}
