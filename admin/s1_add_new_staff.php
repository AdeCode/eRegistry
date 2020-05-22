
<?php
    $response = "";
    $confirmSubmission = false;
    if(isset($_POST['btnAddStaff']))
    {
        //$staff_name=" ";

        $staff_id = $_POST['staff_id'];                     
        $staff_name = $_POST['staff_name'];
        $department = $_POST['department'];
        $first_appointment = $_POST['first_appointment'];   
        $present_appointment = $_POST['present_appointment'];
        $present_post = $_POST['present_post'];             
        $grade_level = $_POST['grade_level'];               
        $duty_post = $_POST['duty_post'];                   
        $cadre = $_POST['cadre'];                          
        $d_o_b = $_POST['D_O_B'];
        $home_town = $_POST['home_town'];                   
        $local_government = $_POST['local_government'];    
        $gender = $_POST['gender'];

        $staff_id = ucwords(trim($staff_id));
        $staff_name = ucwords(trim($staff_name));
        $present_post = ucwords(trim($present_post));
        $duty_post = ucwords(trim($duty_post));
        $cadre = ucwords(trim($cadre));
        $home_town=ucwords(trim($home_town));
        $local_government = ucwords(trim($local_government));  
        
    $conn = new mysqli("localhost", "root", "" ,"e_registry_sita2019");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO staffs (id, Staff_id, Staff_name, Department, first_appointment, Present_appointment, Present_post,Grade_level,Duty_post,Cadre,D_O_B,Home_town,LG,Gender) 
                VALUES (null, '$staff_id', '$staff_name', '$department', '$first_appointment', '$present_appointment','$present_post','$grade_level','$duty_post','$cadre',' $d_o_b ','$home_town','$local_government','$gender')";
                if ($conn->query($sql) ===TRUE){
                    $response = "New staff created successfully<br>";
                    $last_id = $conn->insert_id;
                }else{
                    echo "Error: ".$sql."<br>".$conn->error;
                }

        //$response = $staff_id." ".$staff_name." ".$first_appointment." ".$present_appointment." ".$gender;

        

       
    }  
?>

<?php 

?>

<!-- User Welcome Message-->
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
                    if(isset($_POST['btnAddStaff']))
                    {
                        echo "<div class='title_header'>$response</div>";    
                    }
                    else
                    {
                        $response = "STAFF REGISTRATION";
                        echo "<div class='form-error'>$response</div><p>&nbsp;</p>";
                    }
                ?>
                <p>&nbsp;</p>
                </h4>        
                  <div id="formMessage" ></div>
                  <div class="form" id="form">
                  <form action="index.php?pg=s1" method="post" role="form" class="myForm" name="myForm" >    
                  <div class="col-md-12 formError" id="showMessage" ></div>
                  <div class="form-group">
                      <input type="text" name="staff_id" required class="form-control" id="staff_id" placeholder="Staff id" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="text" name="staff_name" required class="form-control" id="staff_name" placeholder="Staff name" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                        <select class="form-control" required name="department" id="mailType">
                          <option value="" disabled selected>Select Department</option>
                          <option value="Account">Account</option>
                          <option value="Civic Data Management">Civic Data Management</option>
                          <option value="Engineering &amp; IT Infrastructures">Engineering &amp; IT Infrastructures</option>
                          <option value="Finance &amp; Administration">Finance &amp; Administration</option>
                          <option value="Software Development">Software Development</option>                  
                          <option value="Planning &amp; IT Innovation">Planning &amp; IT Innovation</option>
                          <option value="Permanent Secretary">Permanent Secretary</option>
                          <option value="Senior Special Adviser">Senior Special Adviser</option>
                        </select>
                  </div>
                  <div class="form-group">
                      <div class="input-title">Date of first appointment</div>
                      <input type="date" name="first_appointment" required class="form-control" id="first_appointment" placeholder="Date of first appointment" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <div class="input-title">Date of last appointment</div>
                      <input type="date" name="present_appointment" required class="form-control" id="present_appointment" placeholder="Date of present appointment" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="text" name="present_post" required class="form-control" id="present_post" placeholder="Present Post" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="text" name="grade_level" required class="form-control" id="grade_level" placeholder="Grade level" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="text" name="duty_post" required class="form-control" id="duty_post" placeholder="Duty Post" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="text" name="cadre" required class="form-control" id="cadre" placeholder="Cadre" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <div class="input-title">Date of birth</div>
                      <input type="date" name="D_O_B" required class="form-control" id="D_O_B" placeholder="Date of Birth" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="text" name="home_town" required class="form-control" id="home_town" placeholder="Home town" />
                      <div class="validation"></div>
                  </div>
                 
                  <div class="form-group">
                    <select class="form-control" required name="local_government" id="local_government">
                        <option value="" disabled selected>Select Local Government</option>
                        <option value="Akure South">Akure South</option>
                        <option value="Akure North">Akure North</option>
                        <option value="Akoko North-East">Akoko North-East</option>
                        <option value="Akure North">Akoko North-West</option>
                        <option value="Akoko South-East">Akoko South-East</option>
                        <option value="Akoko South-West">Akoko South-West</option>
                        <option value="Ese Odo">Ese Odo</option>
                        <option value="Idanre">Idanre</option>
                        <option value="Ifedore">Ifedore </option>
                        <option value="Ilaje">Ilaje</option>
                        <option value="Ile Oluji/Okeigbo">Ile Oluji/Okeigbo</option>
                        <option value="Irele">Irele</option>
                        <option value="Odigbo">Odigbo</option>
                        <option value="Okitipupa">Okitipupa</option>
                        <option value="Ondo East">Ondo East</option>
                        <option value="Ondo West">Ondo West</option>
                        <option value="Ose">Ose</option>
                        <option value="Owo">Owo</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="gender" id="gender">
                    <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="text-center">
                      <button type="submit" name="btnAddStaff" id="submit">Register</button>
                  </div>  
                  </form>
                  </div>
                                 
                </div>
              </div>
            </div>             
            </div>
            <!-- right side-->
            <div class="col-md-2 col-lg-3"></div>
  
          </div>
        </div>        
      </section>
      <script src="../extensions/lib/jquery/jquery.min.js"></script>
      <script>
     
      </script>