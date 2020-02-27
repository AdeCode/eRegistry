<?php require_once("../includes/initialize.php"); 

	//get the q parameter from URL
	$fileNo = $_GET["q"];

	$sql = "SELECT file_title FROM files WHERE file_no='$fileNo'";
	$record = DiffTables::find_by_sql($sql);

	if($record!=false)
	{
		foreach($record as $value)
		{
			$mTitle = $value["file_title"];
			echo $mTitle;
		}
	}
	else
	{
		echo "Waiting for a valid File Number";
	}
?>