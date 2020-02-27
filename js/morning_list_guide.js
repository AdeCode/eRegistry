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
            document.getElementById("show_list").innerHTML=xmlhttp.responseText;
        }
    }
	
	return 	xmlhttp;
}

function display_list(dept)
{
    var xmlhttp;
    
    if (dept.length==0)
    { 
        document.getElementById("show_list").innerHTML="Auto preview referenced mail";
        return;
    }
    
    xmlhttp = xmlhttpObject();    
    var urlProcessor = "../js/morning_list_guide.php?q=" + dept;
	
    xmlhttp.open("GET", urlProcessor, true);
    xmlhttp.send();
}