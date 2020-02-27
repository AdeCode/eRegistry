<?php require_once("../includes/initialize.php"); 

	//get the q parameter from URL
	$criterion = $_GET["c"];
	$keyWord = $_GET["k"];
	$sql = "";

	//echo "$keyWord ";

    echo '<table class="w3-table-all w3-hoverable">';
    
    if($criterion == "staffName")
    {
    	$sql = "SELECT * FROM staffs WHERE Staff_name like '%$keyWord%'"; 
    }
    else
    {
    	$sql = "SELECT * FROM staffs WHERE Staff_id like '%$keyWord%'";
    }

    $record = DiffTables::find_by_sql($sql);
	$sn = 0; 

	if($record!=false)
	{
		foreach($record as $value)
		{
			$sn++;
			$id = $value["id"];
			$staffId = $value["Staff_id"];
			$staffName = $value["Staff_name"];
		
			echo '<tr>
                    <td>' .
                        $sn . '. <i>' . $staffId . '---' . $staffName . '&nbsp;&nbsp;</i>
                        <a href="index.php?pg=s4&viewId=' .$id.  '" class="w3-gray w3-hover-orange w3-round">&nbsp;View&nbsp;</a>
                    </td>
            	  </tr>';
		}
	}
	else
	{
		echo '<tr>
                <td class="w3-center w3-text-red">
                    User not found
                </td>
        	  </tr>';
	}

    echo '</table>';                     
?>