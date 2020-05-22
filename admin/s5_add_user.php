<?php
    $response = "";
    $confirmSubmission = false;
    if(isset($_POST['btnAddUser']))
    {
        //$staff_name=" ";

        $email = $_POST['email'];
        $password = $_POST['password'];
        $fullname = $_POST['fullname'];
        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];
        $status = "active";
        $photo = "avatar.png";
        $createdBy = 1;
    
        $dateCreated = date('Y-m-d H:i:s');
        $dateCreated = new DateTime($dateCreated);
        $dateCreated->add(new DateInterval('PT1H'));
        $dateCreated = $dateCreated->format('Y-m-d H:i:s');
        
    $conn = new mysqli("localhost", "root", "" ,"e_registry_sita2019");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (id, email, password, fullname, sex, phone,role,status,photo,date_created,created_by) 
                VALUES (null, '$email', '$password', '$fullname', '$sex','$phone','$role','$status','$photo',' $dateCreated ','$createdBy')";
                if ($conn->query($sql) ===TRUE){
                    $response = "New user created successfully<br>";
                    $last_id = $conn->insert_id;
                }else{
                    echo "Error: ".$sql."<br>".$conn->error;
                }

        //$response = $staff_id." ".$staff_name." ".$first_appointment." ".$present_appointment." ".$gender;

        

       
    }  
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
                    if(isset($_POST['btnAddUser']))
                    {
                        echo "<div class='title_header'>$response</div>";    
                    }
                    else
                    {
                        $response = "ADD NEW USER";
                        echo "<div class='form-error'>$response</div><p>&nbsp;</p>";
                    }
                ?>
                <p>&nbsp;</p>
                </h4>        
                  <div id="formMessage" ></div>
                  <div class="form" id="form">
                  <form action="index.php?pg=s5" method="post" role="form" class="myForm" name="myForm" >    
                  <div class="col-md-12 formError" id="showMessage" ></div>
                  <div class="form-group">
                      <input type="text" name="fullname" required class="form-control" id="fullname" placeholder="Full Name" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="email" name="email" required class="form-control" id="email" placeholder="email@mail.com" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="password" name="password" required class="form-control" id="password" placeholder="********" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group" >
                    <select class="form-control" name="sex" id="sex">
                      <option value="" disabled selected>Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>  
                    </select>
                  </div>
                  <div class="form-group" >
                    <select class="form-control" name="role" id="role">
                      <option value="" disabled selected>Role</option>
                      <option value="users">Users</option>
                      <option value="admin">Admin</option>  
                      <option value="developer">Developer</option>  
                    </select>
                  </div>
                  <div class="text-center">
                      <button type="submit" name="btnAddUser" id="submit">Add User</button>
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