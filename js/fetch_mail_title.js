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
            document.getElementById("show_title").innerHTML=xmlhttp.responseText;
        }
    }
	
	return 	xmlhttp;
}

function display_title(refNo)
{
    var xmlhttp;
    
    if (refNo.length==0)
    { 
        document.getElementById("show_title").innerHTML="Auto preview referenced mail";
        return;
    }
    
    xmlhttp = xmlhttpObject();    
    var urlProcessor = "../js/fetch_mail_title.php?q=" + refNo;
	
    xmlhttp.open("GET", urlProcessor, true);
    xmlhttp.send();
}