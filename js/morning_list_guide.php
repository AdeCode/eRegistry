<?php require_once("../includes/initialize.php"); 

	//get the q parameter from URL
	$dept = $_GET["q"]; $sql="";

	if($dept == "All Departments")
	{
		$sql = "SELECT file_no, file_title, dept FROM files WHERE NOT dept='Registry' ORDER BY dept, file_title";
	}
	else
	{
		$sql = "SELECT file_no, file_title, dept FROM files WHERE dept='$dept' ORDER BY dept, file_title";
	}

	$record = DiffTables::find_by_sql($sql);
	$sn = 0; $deptTracer="dept";

	if($record!=false)
	{
		echo '<table class="w3-table-all w3-hoverable">';

		foreach($record as $value)
		{
			$sn++;
			$fileNo = $value["file_no"];
			$fileTitle = $value["file_title"];
			$dept = $value["dept"];

			if($dept != $deptTracer)
			{
				echo '<tr>
                    <td>' .
                         '<b>' . strtoupper($dept). '</b>
                    </td>
            	  </tr>';

            	$sn = 1;
			}
	
			echo '<tr>
                    <td>' .
                        $sn . '. <i>' . $fileTitle . '  ---  ' . $fileNo . '&nbsp;&nbsp;</i>
                    </td>
            	  </tr>';

            $deptTracer = $dept;
		}

		echo '</table>';
	}
	else
	{
		echo "There is no file awaiting treatment in this department";
	}
?>