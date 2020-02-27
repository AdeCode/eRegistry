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
            document.getElementById("likelyFilez").innerHTML=xmlhttp.responseText;
        }
    }
	
	return 	xmlhttp;
}

function search_likely_files(c, k)
{
    var xmlhttp;
    
    if (c.length==0 || k.length==0)
    { 
        document.getElementById("likelyFilez").innerHTML="<center style='color:#f00;'>Select Searching Options Available</center>";
        return;
    }
    
    xmlhttp = xmlhttpObject(); 
  
    var urlProcessor = "../js/search_out_filez.php?c=" + c + "&k=" + k;
	
    xmlhttp.open("GET", urlProcessor, true);
    xmlhttp.send();
}