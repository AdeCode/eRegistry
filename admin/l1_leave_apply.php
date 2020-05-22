<?php
    $response = "";
    $confirmSubmission = false;
	$daysRequested = 0;
	$staffLevel = 0;
	$daysTaken = 0;
  $staffId = $loggedId;
  $department = "";
  $appliedStartDate = date('Y-m-d H:i:s');
  $appliedLeaveDate = date('Y-m-d H:i:s');
    if(isset($_POST['btnApplyLeave']))
    {			
		$leaveType = $_POST['leaveType'];    
		$leaveStartDate = new DateTime($_POST['startDate']);
		$leaveEndDate = new DateTime($_POST['endDate']);        
        $userId = $session->user_id; 
        $status = "processing";
        $dateOfApplication = date('Y-m-d H:i:s');
        $dateOfApplication = new DateTime($dateOfApplication);
        $dateOfApplication->add(new DateInterval('PT1H'));
        $dateOfApplication = $dateOfApplication->format('Y-m-d H:i:s');
		
    //Get user grade level and departmetn
        $qry = DiffTables::find_by_sql("SELECT Grade_level, Department FROM staffs WHERE Staff_id = '$staffId' limit 1");
		if ($qry != false){
			foreach ($qry as $lev){
        $staffLevel=$lev['Grade_level'];
        $department = $lev['Department'];
			}
		}else{
			$response = "Grade level not found";
		}
    
    //check previous leave days taken
		$datediff = $leaveStartDate -> diff($leaveEndDate);
		$daysRequested = $datediff->d;		
		$leaveDays = getLeaveDays($staffLevel);
		$getDaysTaken = DiffTables::find_by_sql("SELECT days_taken FROM leave_approved WHERE Staff_id = '$staffId' LIMIT 1");
		if ($getDaysTaken != false ){
			foreach ($getDaysTaken as $days){
				$daysTaken = $days['days_taken'];
			}
    }
    //cehck if days request is not more than days left before accepting request
		if ($daysTaken < $leaveDays){
			$leaveDaysLeft = $leaveDays - $daysTaken;
			if ($daysRequested <= $leaveDaysLeft){
				$leaveStartDate->add(new DateInterval('PT1H'));
				$leaveStartDate = $leaveStartDate->format('Y-m-d H:i:s');
				$leaveEndDate->add(new DateInterval('PT1H'));
        $leaveEndDate = $leaveEndDate->format('Y-m-d H:i:s');
        
        //check if the applied leave days have not been taken by another staff in the same department
        $getDepartmentLeaves = DiffTables::find_by_sql("SELECT * FROM leave_application WHERE Department = '$department' ");
        if ($getDepartmentLeaves != false ){
          foreach ($getDepartmentLeaves as $data){
            $appliedStartDate = $data['leave_start_date'];
            $appliedLeaveDate = $data['leave_end_date'];
            
            $takenDates = getDaysFromDates($appliedStartDate,$appliedLeaveDate);
            $appliedDates = getDaysFromDates($leaveStartDate,$leaveEndDate);
            foreach($takenDates as $dTaken){
              foreach ($appliedDates as $dApplied){
                if ($dTaken == $dApplied){
                  echo $dApplied ." has already been chosen by a staff in your department, please choose another date";
                  exit($dApplied ." has already been chosen by a staff in your department");
                }
              }
            }
          }          
        }





				$query = "INSERT INTO leave_application (id, leave_type, Department, leave_start_date, leave_end_date, status, Staff_id,date_of_application) 
						VALUES (null, '$leaveType', '$department', '$leaveStartDate', '$leaveEndDate', '$status', '$staffId','$dateOfApplication')";
				$confirmSubmission = DIffTables::insert($query);
				if($confirmSubmission == true)
				{
					$response = "LEAVE APPLICATION <br /><span style='color:#f00;font-size:16px;height:auto;'>Successful Operation</span>".$appliedLeaveDate;
					$daysTaken += $daysRequested;
					$sql = "UPDATE leave_approved";
				}				
			}
			}else{
				$response = "Application Unsuccesful <br/><span style='color:#f00;font-size:16px;'>You have exhausted your leave days for the year</span>";		
			}
		
		              
    }    
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
                <h4 class="title_header" style="text-align:center;height:auto;">
                <?php 
                    if(isset($_POST['btnApplyLeave']))
                    {
                        echo "<div class='title_header'>$response</div>";    
                    }
                    else
                    {
                        $response = "APPLY FOR LEAVE";
                        echo "<div class='form-error'>$response</div>";
                    }
                ?>
                </h4>        
                  <div id="formMessage" ></div>
                  <div class="form" id="form">
                  <script type="text/javascript" src="../js/leave_application.js"></script>                 
                  <form action="index.php?pg=l1" method="post" role="form" class="myForm" name="leaveForm" >    
                  <div class="col-md-12 formError" id="showMessage" ></div>
                  <div class="form-group" >
                    <select class="form-control" name="leaveType" id="leaveType">
                      <option value="" disabled selected>Select leave type</option>
                      <option value="annual leave">Annual leave</option>
                      <option value="maternity leave">Maternity leave</option> 
                      <option value="casual leave">Casual leave</option>     
                  </select>
                  </div>
                  <div class="form-group">
                    <div class="input-title">Leave start date</div>
                    <input type="date" name="startDate" required class="form-control" id="startDate" placeholder="Leave start date"/>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group">
                    <div class="input-title">Leave end date</div>
                    <input type="date" name="endDate" required class="form-control" id="endDate" placeholder="Leave end date"/>
                    <div class="validation"></div>
                  </div>
                  <div class="text-center">
                      <button type="submit" name="btnApplyLeave" id="submit">Submit Application</button>
                  </div>
                  </form>
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