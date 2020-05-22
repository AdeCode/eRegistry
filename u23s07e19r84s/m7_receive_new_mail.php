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
            return;
        }
        
    }
?>

<section id="hero" class="wow fadeIn">
        <div class="container">         
            <div class="row">
              <!-- left column-->
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
                          if(isset($_POST['btnUpdateRecord']))
                          {
                              echo "<div class='title_header'>$message</div>";    
                          }
                          else
                          {
                              $message = "CHANGE PASSWORD";
                              echo "<div class='form-error'>$message</div>";
                          }
                      ?>
                    </h4>    
                    <script type="text/javascript" src="../js/changePassword.js"></script>
                    <div id="formMessage" ></div>
                      <div class="form" id="form">
                      <form action="index.php?pg=m7" method="post" role="form" class="myForm" name="pass" >    
                      <div class="col-md-12 formError" id="showMessage" ></div>           
                      <div class="form-group">
                        <input type="password" class="form-control"  required name="currentPassword" id="currentPassword" placeholder="Enter current password"/>
                        <div class="validation"></div>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control"  required name="newPassword" id="newPassword" placeholder="Enter new password" onkeyup='checkCurrentPassword(document.forms["pass"]["currentPassword"].value, this.value)'  autocomplete="off"/>
                        <div class="validation"></div>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control"  required name="confirmPassword" id="confirmPassword" placeholder="Confirm new password" onchange='compare_password()'/>
                        <div class="validation"></div>
                      </div>
                      <div class="text-center">
                        <button type="submit" name="changePassword" id="submit">Change Password</button>
                      </div>
                    </form>
                    </div>
                    <p>&nbsp;</p>
                  <div class="inputDiv" style="width:inherit;height:40px;" id="message"></div>
         
                  </div>
                </div>
              </div>  
            
            <!-- right column-->
            <div class="col-md-2 col-lg-3">
              <div class="feature-block"></div>
            </div>

          </div>         
        </div>        
      </section>
      <?php
    }
?>
      <script src="../extensions/lib/jquery/jquery.min.js"></script>
      <script>
     
      </script>