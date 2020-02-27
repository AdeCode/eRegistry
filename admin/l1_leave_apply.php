<?php
    $response = "";
    $confirmSubmission = false;
	$daysRequested = 0;
	$staffLevel = 0;
	$daysTaken = 0;

    if(isset($_POST['btnApplyLeave']))
    {
		$staffId = $loggedId;
        $leaveType = $_POST['leaveType'];    
        $leaveStartDate = new DateTime($_POST['startDate']);           
        $leaveEndDate = new DateTime($_POST['endDate']);            
        
        $userId = $session->user_id; 
        $status = "processing";
        $dateOfApplication = date('Y-m-d H:i:s');
        $dateOfApplication = new DateTime($dateOfApplication);
        $dateOfApplication->add(new DateInterval('PT1H'));
        $dateOfApplication = $dateOfApplication->format('Y-m-d H:i:s');
		
		$qry = DiffTables::find_by_sql("SELECT Grade_level FROM staffs WHERE Staff_id = '$staffId' limit 1");
		if ($qry != false){
			foreach ($qry as $lev){
				$staffLevel=$lev['Grade_level'];
			}
		}else{
			$response = "Grade level not found";
		}
		$datediff = $leaveStartDate -> diff($leaveEndDate);
		$daysRequested = $datediff->d;
		$leaveDays = getLeaveDays($staffLevel);
		
		$getDaysTaken = DiffTables::find_by_sql("SELECT days_taken FROM leave_approved WHERE Staff_id = '$staffId' LIMIT 1");
		if ($getDaysTaken != false){
			foreach ($getDaysTaken as $days){
				$daysTaken = $days['days_taken'];
			}
		}
			
		if ($daysTaken < $leaveDays){
			$leaveDaysLeft = $leaveDays - $daysTaken;
			if ($daysRequested <= $leaveDaysLeft){
				$conn = new mysqli("localhost", "root", "" ,"e_registry_sita2019");
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				}
					$leaveStartDate->add(new DateInterval('PT1H'));
					$leaveStartDate = $leaveStartDate->format('Y-m-d H:i:s');
					$leaveEndDate->add(new DateInterval('PT1H'));
					$leaveEndDate = $leaveEndDate->format('Y-m-d H:i:s');
					$query = "INSERT INTO leave_application (id, leave_type, leave_start_date, leave_end_date, status, Staff_id,date_of_application) 
							VALUES (null, '$leaveType', '$leaveStartDate', '$leaveEndDate', '$status', '$staffId','$dateOfApplication')";
					//$confirmSubmission = DIffTables::insert($query);

					if ($conn->query($query) ===TRUE){
						$response = "LEAVE APPLICATION <br /><span style='color:#f00;font-size:16px;'>Successful Operation</span>";
					}else{
						echo "Error: ".$query."<br>".$conn->error;       
                    }
                    
                    
				}
			}else{
				$response = "Application Unsuccesful <br/><span style='color:#f00;font-size:16px;'>You have exhausted your leave days for the year</span>";		
			}
        
	}
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
                    if(isset($_POST['btnApplyLeave']))
                    {
                        echo "$response";    
                    }
                    else
                    {
                        echo "APPLY FOR LEAVE";
                    }
                ?>
            </h4>     
            <script type="text/javascript" src="../js/leave_application.js"></script>                 
            <form class="w3-container" action="index.php?pg=l1" method="post" name="leaveForm">
                <select class="w3-select" name="leaveType">
                  <option value="" disabled selected>Select leave type</option>
                  <option value="annual leave">Annual leave</option>
                  <option value="maternity leave">Maternity leave</option> 
                  <option value="casual leave">Casual leave</option>                                                                                                                                     
                </select>                
                <label>Leave start date</label>
                <input class="w3-input w3-border-green" type="date" placeholder="Start Date" name="startDate" required="required" autocomplete="off" onchange='leave_apply(document.forms["leaveForm"]["leaveType"].value, this.value)'>   
                <label>Leave end date</label>             
                <input class="w3-input w3-border-green" type="date" placeholder="End Date" name="endDate" required="required" autocomplete="off" onchange='leave_apply(document.forms["leaveForm"]["leaveType"].value, this.value)'>
                <br />
                <center><input type="submit" name="btnApplyLeave" value="Submit Application" class="w3-btn w3-green w3-round w3-hover-orange w3-hover-text-white"></center>
            </form> 
            <p>&nbsp;</p>          
        </div>
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" id="showMessage"> 
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