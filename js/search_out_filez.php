<?php require_once("../includes/initialize.php"); 

	//get the q parameter from URL
	$criterion = $_GET["c"];
	$keyWord = $_GET["k"];
	$sql = "";

	//echo "$keyWord ";

    echo '<table class="w3-table-all w3-hoverable">';
    
    if($criterion == "title")
    {
    	$sql = "SELECT * FROM files WHERE file_title like '%$keyWord%'"; 
    }
    else
    {
    	$sql = "SELECT * FROM files WHERE file_no like '%$keyWord%'";
    }

    $record = DiffTables::find_by_sql($sql);
	$sn = 0; 

	if($record!=false)
	{
		foreach($record as $value)
		{
			$sn++;
			$fId = $value["id"];
			$fileTitle = $value["file_title"];
			$fileNo = $value["file_no"];
		
			echo '<tr>
                    <td>' .
                        $sn . '. <i>' . $fileTitle . '---' . $fileNo . '&nbsp;&nbsp;</i>
                        <a href="index.php?pg=f5&viewId='. $fId . '" class="w3-gray w3-hover-orange w3-round">&nbsp;View&nbsp;</a>
                    </td>
            	  </tr>';
		}
	}
	else
	{
		echo '<tr>
                <td class="w3-center w3-text-red">
                    There is no new mail available
                </td>
        	  </tr>';
	}

    echo '</table>';                     
?>