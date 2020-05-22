<?php
    $response = "";
    $confirmSubmission = false;
	$staffId = $loggedId;
?>


<section id="hero" class="wow fadeIn">
        <div class="container">         
            <div class="row">
              <!-- left side-->
              <div class="col-md-2 col-lg-3">
                  <div class="feature-block"></div>
  
              </div>
              <!-- center column-->
          <div class="col-lg-6 col-md-4">
            <div class="row form-container" >
              <div class="col-md-12">
                <div class="form" id="form">
                <h4 class="title_header" style="text-align:center">
                <?php 
                    if(isset($_POST['btnApplyLeave']))
                    {
                        echo "<div class='title_header'>$response</div>";    
                    }
                    else
                    {
                        $response = "LEAVE APPLICATION STATUS";
                        echo "<div class='form-error'>$response</div>";
                    }
                ?>
                </h4>        
                  <div id="formMessage" ></div>
                  <div class="form" id="form">
                  <h4 align="center">
                <?php 
				
					echo "<h4 align='center'></h4>";
					$record = DiffTables::find_by_sql("SELECT * FROM leave_application WHERE Staff_id = '$staffId' AND id=(SELECT MAX(id) FROM leave_application) LIMIT 1");
                   
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
						echo "<span class='errorMessage'>No pending leave application found</span>";
					}
					echo '</table>';
                ?>
            </h4>             
                  <p>&nbsp;</p>
                  </div>
                  <div class="inputDiv" style="width:inherit;height:auto;" id="showMessage"></div>
               
                </div>
              </div>
            </div>
  
              
            </div>
            <!-- right side-->
            <div class="col-md-2 col-lg-3"></div>
  
          </div>
        </div>        
      </section>