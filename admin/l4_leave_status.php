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
					$record = DiffTables::find_by_sql("SELECT * FROM leave_application WHERE Staff_id = '$staffId' LIMIT 1");
                  
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