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
            document.getElementById("likelyMails").innerHTML=xmlhttp.responseText;
        }
    }
	
	return 	xmlhttp;
}

function search_likely_mails(t, c, k)
{
    var xmlhttp;
    
    if (t.length==0 || c.length==0 || k.length==0)
    { 
        document.getElementById("likelyMails").innerHTML="<center style='color:#f00;'>Select Searching Options Available</center>";
        return;
    }
    
    xmlhttp = xmlhttpObject(); 
  
    var urlProcessor = "../js/search_out_mail.php?t=" + t + "&c=" + c + "&k=" + k;
	
    xmlhttp.open("GET", urlProcessor, true);
    xmlhttp.send();
}