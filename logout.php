<?php 
	require_once("includes/initialize.php"); 
	
    $session->logout();
    redirect_to_index("index.php");
?>
