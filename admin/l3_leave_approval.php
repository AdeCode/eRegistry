<?php
    $response = "";
	$confirmSubmission = false;
	$staffId = $loggedId;
?>

<!-- User Welcome Message-->
<section class="w3-row">
    <!-- Left Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>

    <!-- Content Area -->
    <div class="w3-col l4">
        <div class="w3-margin w3-border w3-round-large w3-border-green w3-text-dark-gray"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                <?php 
				
					echo "<h4 align='center'>Leave Application status</h4>";
                    $conn = new mysqli("localhost", "root", "" ,"e_registry_sita2019");
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					//$sql = "SELECT Staff_id FROM leave_application WHERE id=1";
					
					$query = "SELECT * FROM leave_application WHERE id=1";
					$record = DiffTables::find_by_sql($query);
					echo '<table class="w3-table-all w3-hoverable">';
					if ($record != false){
						foreach ($record as $value){
							
							echo '<tr><td>';
							echo "leave type: ".$value["leave_type"];
							echo '</td></tr>';
							echo '<tr><td>';
							echo "Application date: ".$value["date_of_application"];
							echo '</td></tr>';
							echo '<tr><td>';
							echo "Application status: ".$value["status"];
							echo '</td></tr>';
						}
					
					}else{
						echo "Error: ".$query."<br>".$conn->error;
					}
					echo '</table>';
                ?>
            </h4>                 
            <p>&nbsp;</p>          
        </div>
        
    </div>

    <!-- Right Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>
</section>
<section class="w3-row w3-padding w3-hide-large">&nbsp;</section>
<p>&nbsp;</p>
<!-- //User Welcome Message-->