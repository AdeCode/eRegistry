function xmlhttpObject()
{
	var xmlhttp;
	
	if (window.XMLHttpRequest)
    {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    }
    else
    {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
	
	xmlhttp.onreadystatechange=function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            document.getElementById("showMessage").innerHTML=xmlhttp.responseText;
        }
    }
	
	return 	xmlhttp;
}

function leave_apply (c)
{
    var xmlhttp;
    
    if (c.length==0)
    { 
        document.getElementById("showMessage").innerHTML="<center style='color:#f00;'>Select leave type</center>";
        return;
    }
    
    xmlhttp = xmlhttpObject(); 
  
    var urlProcessor = "../js/search_out_user.php?c=" + c + "&k=" + k;
	
    xmlhttp.open("GET", urlProcessor, true);
    xmlhttp.send();
}

function getLeaveDays(leaveType, startDate, endDate ){
    if (leaveType == "annualLeave"){
        startDay = startDate;
        endDay = endDate;
        
    }

}