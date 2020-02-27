<?php require_once("../includes/initialize.php"); 

	//get the q parameter from URL
	$tableName = $_GET["t"];
	$criterion = $_GET["c"];
	$keyWord = $_GET["k"];
	$sql = "";

	//echo "$keyWord ";

    echo '<table class="w3-table-all w3-hoverable">';
    
    if($criterion == "title")
    {
    	$sql = "SELECT * FROM $tableName WHERE title like '%$keyWord%'"; 
    }
    else
    {
    	$sql = "SELECT * FROM $tableName WHERE ref_no like '%$keyWord%'";
    }

    $record = DiffTables::find_by_sql($sql);
	$sn = 0; 

	if($record!=false)
	{
		foreach($record as $value)
		{
			$sn++;
			$mId = $value["id"];
			$mtitle = $value["title"];
			$mrefNo = $value["ref_no"];
		
			echo '<tr>
                    <td>' .
                        $sn . '. <i>' . $mtitle . '---' . $mrefNo . '&nbsp;&nbsp;</i>
                        <a href="index.php?pg=m6&t=' . $tableName . '&viewId='. $mId . '" class="w3-gray w3-hover-orange w3-round">&nbsp;View&nbsp;</a>
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