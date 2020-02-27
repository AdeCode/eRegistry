
<?php
	$confirmSubmission = false;
	$startDay = new DateTime("2010-03-21");
	$endDay = new DateTime("2010-03-31");
	$daysRequested = "";
	$datediff = 0;
	$daysLeft = 0;
	$Staf_id = "";
    $leaveType = "";
    $date_of_application = new DateTime("2010-03-21");
	if (isset($_GET['staffId'])){
		$Staf_id = $_GET['staffId'];
	}
	//$staffId = $loggedId;
	$message="";
    if(!isset($_GET['viewId']))
    {
?>

<!-- User Welcome Message-->
<section class="w3-row">
    <!-- Left Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>

    <!-- Content Area -->
    <div class="w3-col l4">
        
            <h4 align="center">
                SEARCH OUT FILE
            </h4>
            
            <p>&nbsp;</p>          
        </div>

        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" id="likelyFilez"> 
            <p>&nbsp;</p>                      
        </div>
    </div>

    <!-- Right Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>
<!-- //User Welcome Message-->
<?php
    }
    else if(isset($_GET['viewId']))
    {
		$staffLevel=0;
		$daysTaken=0;
		$showId = $_GET['viewId'];
		$message = "VIEW LEAVE REQUEST";
		
		//Approving request
		if (isset($_POST['btnApproveLeave'])){
		$getStaff = DiffTables::find_by_sql("SELECT Grade_level FROM staffs WHERE Staff_id = '$Staf_id' LIMIT 1");
		if ($getStaff != false){
			foreach ($getStaff as $staff){
				$staffLevel = $staff['Grade_level'];			
			}
		}		
		$leaveDays = getLeaveDays($staffLevel);
		$getDaysTaken = DiffTables::find_by_sql("SELECT days_taken FROM leave_approved WHERE Staff_id = '$Staf_id' LIMIT 1");
		if ($getDaysTaken != false){
			foreach($getDaysTaken as $days){
				$daysTaken=$days['days_taken'];				
			}
		}
		$daysLeft=checkLeaveDaysLeft($daysTaken,$leaveDays);
		$getAppliedDays = DiffTables::find_by_sql("SELECT leave_start_date, leave_end_date, leave_type, date_of_application FROM leave_application WHERE Staff_id = '$Staf_id' LIMIT 1");
		if ($getAppliedDays != false){
			foreach ($getAppliedDays as $appliedDays){
				$startDay = $appliedDays['leave_start_date'];
				$startDay = new DateTime("$startDay");
				$endDay = $appliedDays['leave_end_date'];
				$endDay = new DateTime("$endDay");
				$endDay = $endDay->modify('+1 day');
                $leaveType = $appliedDays['leave_type'];
                $date_of_application = $appliedDays['date_of_application'];
			}
			$datediff = $startDay -> diff($endDay);
			$daysRequested = $datediff->d;	
			
			$interval = new DateInterval('P1D');
			$daterange = new DatePeriod($startDay, $interval, $endDay);
			foreach ($daterange as $date){
				//echo $num++.". ". $date->format("Y-m-d")." ".$date->format('l')."<br>";
				$dayOfWeek = $date->format('l');
				if ($dayOfWeek == "Saturday" ){
				$daysRequested -= 1;
				}
				if($dayOfWeek == "Sunday"){
					$daysRequested -= 1;
				}
				//return $leaveDays;
			}
			
			
			
			$startDay->add(new DateInterval('PT1H'));
			$startDay = $startDay->format('Y-m-d H:i:s');
			$endDay->add(new DateInterval('PT1H'));
			$endDay = $endDay->format('Y-m-d H:i:s');
		}
		//approve and save into table leave_approved
		//change status to approve
		if ($daysRequested <= $daysLeft){
			$totalLeaveDaysTaken = $daysRequested+$daysTaken;
			$remainingLeaveDays = $leaveDays;
            $remainingLeaveDays -= $totalLeaveDaysTaken;
            
            //check if staff record already exists in the database
			$checkRecord= DiffTables::find_by_sql("SELECT * FROM leave_approved WHERE Staff_id = '$Staf_id' LIMIT 1");
			if ($checkRecord != false){
				$updateApproved = "UPDATE leave_approved SET days_taken = $totalLeaveDaysTaken WHERE Staff_id = '$Staf_id'" ;
				$confirmSubmission = DIffTables::insert($updateApproved);
			}else{
				$saveApproved = "INSERT INTO leave_approved (id, Staff_id, type, days_taken, days_left) 
                VALUES (null, '$Staf_id', '$leaveType', '$totalLeaveDaysTaken', '$remainingLeaveDays')";
				$confirmSubmission = DIffTables::insert($saveApproved);
			}					
			$updateApplication = "UPDATE leave_application SET status = 'Approved' WHERE Staff_id = '$Staf_id'" ;
            $confirmSubmission = DIffTables::insert($updateApplication);
            
            //save into current leave table
            $checkLeave = DiffTables::find_by_sql("SELECT * FROM current_leave WHERE Staff_id = '$Staf_id' LIMIT 1");
			if ($checkLeave != false){
				$updateLeave = "UPDATE current_leave SET leave_start_day = $startDay, leave_end_date = $endDay, leave_type = $leaveType WHERE Staff_id = '$Staf_id'" ;
				$confirmSubmission = DIffTables::insert($updateLeave);
			}else{
                $saveLeave = "INSERT INTO current_leave (id, Staff_id, leave_type, laeve_start_date, laeve_end_date, date_of_application) 
                VALUES (null, '$Staf_id', '$leaveType', '$startDay','$endDay', '$date_of_application','approved')";
				$confirmSubmission = DIffTables::insert($saveLeave);
            }

			$message = "LEAVE REQUEST APPROVED<br/>".$daysRequested;
		}else{
			//dissapprove
			$message = "ERROR: LEAVE REQUEST CAN NOT BE GRANTED<br/>".$daysRequested;
		}
		
		
		
		//if admin is dissapproving request
		}elseif(isset($_POST['btnDissapproveLeave'])){
			$message = "LEAVE REQUEST DISSAPPROVED";
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
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                <?php echo $message ?>
            </h4>          
            <form class="w3-container" action="index.php?pg=l5&viewId=<?php echo $showId ?>&staffId=<?php echo $Staf_id ?>" method="post">
            <?php
                echo '<table class="w3-table-all w3-hoverable">';

                $id = $_GET['viewId'];
                    
                $record = DiffTables::find_by_sql("SELECT * FROM leave_application WHERE id = $id");

                if($record!=false)
                {
                    foreach($record as $value)
                    {
                       
                        $leave_type = $value["leave_type"];
                        $leave_start_date = $value["leave_start_date"];
                        $leave_end_date = $value["leave_end_date"];
                        $status = $value["status"];
                        $staff_id = $value["Staff_id"];   
						$res = DiffTables::find_by_sql("SELECT fullname FROM users WHERE Staff_id = '$staff_id' LIMIT 1");
						
						foreach ($res as $k){
							$name = $k['fullname'];
						}
                        $date_of_application = $value["date_of_application"];                    
                        echo '<tr>
                                <td>
                                    <i>LEAVE TYPE --- ' . $leave_type . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>LEAVE START DATE --- ' . $leave_start_date . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>LEAVE END DATE --- ' . $leave_end_date . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>STATUS --- ' . $status . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
							  <tr>
                                <td>
                                    <i>STAFF NAME --- ' . $name . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>STAFF ID --- ' . $staff_id . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>DATE OF APPLICATION --- ' . $date_of_application . '&nbsp;&nbsp;</i>
                                </td>
                              
                              </tr>';
                    }
                    
                }
                echo '<tr>
						<td>						
							<center><input type="submit" name="btnApproveLeave" value="Approve" class="w3-btn w3-green w3-round w3-hover-orange w3-hover-text-white" style="margin-right:5px;"><input type="submit" name="btnDissapproveLeave" style="margin-left:5px;" value="Disapprove" class="w3-btn w3-red w3-round w3-hover-orange w3-hover-text-white"></center></td>						
					</tr>';

                echo '</table>';                     
            ?>
            </form> 
            <p>&nbsp;</p>          
        </div>
    </div>
<!-- //User Welcome Message-->

    <!-- Right Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>
<?php
    }
?>
