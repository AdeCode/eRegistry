<?php 
	require_once('header.php');

	if(isset($_GET["pg"]))
    {
    	$pg = $_GET["pg"];

        if($pg == 1){ require_once("medept.php"); }
        //else if($pg == 3){ require_once("cedept.php"); }
        else{ require_once('welcome.php'); }  //Starting out with home page
    }
    else
    {
        require_once('welcome.php');
    }

	require_once('footer.php');
?>