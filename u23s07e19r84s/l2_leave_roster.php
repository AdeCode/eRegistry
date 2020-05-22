<?php
    $response = "";
    $confirmSubmission = false;

    if(isset($_POST['btnLeaveRoster']))
    {
        $employee_name = $_POST['employee_name'];           $employee_name = ucwords(trim($employee_name));
        $leave_start = $_POST['leave_start'];               $leave_start = ucwords(trim($leave_start));
        $leave_end = $_POST['leave_end'];                   $leave_end = ucwords(trim($leave_end));
        $application_date = date('Y-m-d H:i:s');
        //$d8 = date('Y-m-d H:i:s');

        $application_date = new DateTime($application_date);
        $application_date->add(new DateInterval('PT1H'));
        $application_date = $application_date->format('Y-m-d H:i:s');

        /*echo "
            Title: $title <br />
            Reference Number: $refNo <br />
            From: $from <br />
            Dispatcher: $dispatcher <br />
            Receiver: $receiver <br />
            Today's Date: " . $d8 . " <hr />
        ";*/

        $sql = "INSERT INTO leave_roster (id, Employee_name, application_date, leave_start_date, leave_end_date) 
                VALUES (null, '$employee_name', '$application_date', '$leave_start', '$leave_end')";
        $confirmSubmission = DIffTables::insert($sql);

        if($confirmSubmission == true)
        {
            $response = "LEAVE APPLICATION <br /><span style='color:#f00;font-size:16px;'>Application Successful </span>";
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
                <h4 class="title_header" style="text-align:center">
                <?php 
                    if(isset($_POST['btnApplyLeave']))
                    {
                        echo "<div class='title_header'>$response</div>";    
                    }
                    else
                    {
                        $response = "LEAVE ROASTER";
                        echo "<div class='form-error'>$response</div>";
                    }
                ?>
                </h4>        
                  <div id="formMessage" ></div>
                  <div class="form" id="form">
                  <script type="text/javascript" src="../js/leave_application.js"></script>                 
                  <form action="index.php?pg=L2" method="post" role="form" class="myForm" name="leaveForm" >    
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
                    <input type="date" name="startDate" required class="form-control" id="startDate" placeholder="Leave start date"/>
                    <div class="validation"></div>
                  </div>
                  <div class="form-group">
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