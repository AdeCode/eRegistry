<?php
    $message = "CHANGE PASSWORD";
    $staffId = $loggedId;
    if(!isset($_GET['viewId']))
    {

    if(isset($_POST['changePassword'])){
        $confirmSubmission = false;
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];
        if ($newPassword == $confirmPassword){
            $record = DiffTables::find_by_sql("SELECT password FROM users WHERE Staff_id='$staffId' LIMIT 1");
            if ($record !=false){
                foreach ($record as $pass){
                    if ($currentPassword == $pass["password"]){
                        $updatePassword = "UPDATE users SET password = '$newPassword' WHERE Staff_id = '$staffId'" ;
                        $confirmSubmission = DIffTables::insert($updatePassword); 
                        if ($confirmSubmission == true){
                            $message = "<span style='color:#f00;font-size:16px;'>Password successfully updated</span>";
                        }else{
                            $message = "<span style='color:red;font-size:16px;'>Unable to update password</span>";
                        }
                    }else{
                        $message = "<span style='color:red;font-size:16px;'>Incorrect current password</span>";
                    }
                }
            }
        }else{
            $message = "Password entered does not match";
            //return;
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
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                <?php echo $message ?>
            </h4>
            <script type="text/javascript" src="../js/changePassword.js"></script>           
            <form class="w3-container" action="index.php?pg=p3" method="post" name="pass">
                <input class="w3-input" type="password" placeholder="Enter current password" name="currentPassword" required="required" autocomplete="off">
                <input class="w3-input" type="password" placeholder="Enter new password" id="newPassword" name="newPassword" required="required" onkeyup='checkCurrentPassword(document.forms["pass"]["currentPassword"].value, this.value)'  autocomplete="off">
                <input class="w3-input" type="password" placeholder="Confirm new password" id="confirmPassword" name="confirmPassword" required="required" onchange='compare_password()'>
                <br />
                <center><input type="submit" name="changePassword" value="Change Password" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
                
            </form>

            <p>&nbsp;</p>          
        </div>
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" id="message"> 
            <p>&nbsp;</p>                      
        </div>

        
    </div>

    <!-- Right Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>






    
<?php
    }
?>