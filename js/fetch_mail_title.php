<?php require_once("../includes/initialize.php"); 

	//get the q parameter from URL
	$refNo = $_GET["q"];

	$sql = "SELECT title FROM incoming_mails WHERE ref_no='$refNo'";
	$record = DiffTables::find_by_sql($sql);

	if($record!=false)
	{
		foreach($record as $value)
		{
			$mTitle = $value["title"];
			echo $mTitle;
		}
	}
	else
	{
		echo "Waiting for a valid Mail Reference Number";
	}
?>