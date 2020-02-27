<?php
    if(isset($_POST['btnMove']))
    {
        $fileNo = $_POST['fileNo'];
        $dispatcher = $_POST['dispatcher'];
        $receiver = $_POST['receiver'];
        $dept = $_POST['dept'];
        
        $d8 = date('Y-m-d H:i:s');
        $d8 = new DateTime($d8);
        $d8->add(new DateInterval('PT1H'));
        $d8 = $d8->format('Y-m-d H:i:s');

        $sql = "UPDATE files SET dispatcher='$dispatcher ', receiver='$receiver', dept='$dept', movement_date='$d8', location='Out of carbinet' 
        WHERE file_no='$fileNo'";

        $response = DiffTables::update_by_sql($sql);
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
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" style="min-height: 200px;"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                FILE MOVEMENT
            </h4>
            <script type="text/javascript" src="../js/fetch_file_title.js"></script>           
            <form class="w3-container" action="index.php?pg=f2" method="post">
                <center>
                    <div class="w3-text-red" id="show_title">
                        <?php 
                            if(isset($_POST['btnMove']))
                            {
                                if($response==false)
                                {
                                    echo "Unsuccessful Operation"; 
                                }
                                else
                                {
                                    echo "Successful Operation";
                                }                            
                            }
                            else
                            {
                                echo "Auto preview referenced file";
                            }
                        ?>  
                    </div>
                </center>                
                <input class="w3-input" type="text" placeholder="File Reference Number" name="fileNo" required="required" autocomplete="off" onkeyup="display_title(this.value)" onchange="display_title(this.value)">                
                <input class="w3-input" type="text" placeholder="Dispatcher" name="dispatcher" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="Receiver" name="receiver" required="required" autocomplete="off">
                <select class="w3-select" name="dept" onchange="" onkeyup="">
                  <option value="" disabled selected>Select Department</option>
                  <option value="Account">Account</option>
                  <option value="Civic Data Management">Civic Data Management</option>
                  <option value="Engineering &amp; IT Infrastructures">Engineering &amp; IT Infrastructures</option>
                  <option value="Finance &amp; Administration">Finance &amp; Administration</option>
                  <option value="Software Development">Software Development</option>                  
                  <option value="Planning &amp; IT Innovation">Planning &amp; IT Innovation</option>                  
                  <option value="Permanent Secretary" selected>Permanent Secretary</option>
                  <option value="Senior Special Adviser">Senior Special Adviser</option>                                                                   
                </select>                
                <br />&nbsp;
                <center><input type="submit" name="btnMove" value="Move File" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
            </form>
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