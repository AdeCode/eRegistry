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

<?php 

?>

<!-- User Welcome Message-->
<section class="w3-row">
    <!-- Left Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>

    <!-- Content Area -->
    <div class="w3-col l4">
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" style="min-height: 200px;"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                <?php 
                    if(isset($_POST['btnLeaveRoster']))
                    {
                        echo "$response";    
                    }
                    else
                    {
                        echo "LEAVE APPLICATION";
                    }
                ?>
            </h4>           
            <form class="w3-container" action="index.php?pg=l1" method="post"> 
                          
                <input class="w3-input" type="text" placeholder="Employee name" name="employee_name" required="required" autocomplete="off">
                <input class="w3-input" type="date" placeholder="leave start date" name="leave_start" required="required" autocomplete="off">
                <input class="w3-input" type="date" placeholder="leave start date" name="leave_end" required="required" autocomplete="off">
                <!--input class="w3-input" type="text" placeholder="Today's Date" value="<?php echo date("Ymd"); ?>" name="date" required="required" autocomplete="off"-->
                <br />
                <center><input type="submit" name="btnLeaveRoster" value="Apply" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
            </form>
            <p>&nbsp;</p>            
        </div>
    </div>

    <!-- Right Spacer -->
    <div class="w3-col l4">
        <script type="text/javascript" src="../js/roster.js"></script>
        <form class="w3-container" action="#" method="post" name="selector">
            <select class="w3-select" name="selectOption">
                <option value="" disabled selected>Please choose an opotion</option>
                <option value="one">First</option>
                <option value="two">Second</option>
                <input class="w3-input" type="text" placeholder="Enter your value" name="enterInput" required="required" onkeyup='check_entry(this.value)' onchange='check_entry(this.value)'>
            </select>
        </form>
        &nbsp;
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" id="showResult"> 
            <p>&nbsp;</p>                      
        </div>
    </div>
</section>
<section class="w3-row w3-padding w3-hide-large">&nbsp;</section>
<p>&nbsp;</p>
<!-- //User Welcome Message-->