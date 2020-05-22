<?php
    $message="EDIT PROFILE";
    $staffId = $loggedId;

    if (isset($_POST['btnUpdateRecord'])){
        $fullName = $_POST['name'];
        $email = $_POST['email'];
        $phoneNo = $_POST['phoneNum'];
        $updateRecord = "UPDATE users SET fullname = '$fullName', email = '$email', phone='$phoneNo' WHERE Staff_id = '$staffId'" ;
        $confirmSubmission = DIffTables::insert($updateRecord);
        $message = "Profile successfully updated";
    }


    if(!isset($_GET['viewId']))
    {
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
                      if(isset($_POST['btnUpdateRecord']))
                      {
                          echo "<div class='title_header'>$message</div>";    
                      }
                      else
                      {
                          $response = "EDIT PROFILE";
                          echo "<div class='form-error'>$message</div>";
                      }
                  ?>
                </h4>    
                <?php
                  $fullName = "";
                  $email = "";
                  $phoneNo = 000;
                      echo '<div class="form" id="form">';
                      echo '<form action="index.php?pg=p2" class="myForm" role="form" method="post">';
                      $record = DiffTables::find_by_sql("SELECT * FROM users WHERE Staff_id='$staffId' LIMIT 1");

                      if($record!=false)
                      {
                          foreach($record as $value)
                          {
                              $fullName = $value["fullname"];
                              $email = $value["email"];
                              $phoneNo = $value["phone"];
                          }
                      }
                ?>
                <div class="form-group">
                  <input type="text" class="form-control"  required name="name" value="<?php echo $fullName ?>" id="dispatcher" placeholder="Dispatcher's Nmae"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  required name="email" value="<?php echo $email ?>" id="dispatcher" placeholder="Dispatcher's Nmae"/>
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control"  required name="phoneNum" value="<?php echo $phoneNo ?>" id="dispatcher" placeholder="Dispatcher's Nmae"/>
                  <div class="validation"></div>
                </div>
                <div class="text-center">
                  <button type="submit" name="btnUpdateRecord" id="submit">Update</button>
                </div>
                    
                <?php
                echo "</form></div>";
            ?>
              </div>
            </div>
  
              
            </div>
            <!-- right side-->
            <div class="col-md-2 col-lg-3"></div>
  
          </div>
        </div>        
      </section>
<?php
  }
?>
