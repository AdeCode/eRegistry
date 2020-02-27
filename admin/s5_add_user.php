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
                    if(isset($_POST['btnAddUser']))
                    {
                        echo "$response";    
                    }
                    else
                    {
                        echo "ADD USER";
                    }
                ?>
            </h4>           
            <form class="w3-container" action="index.php?pg=s5" method="post" enctype="multipart/form-data"> 
                <input class="w3-input" type="email" placeholder="email" name="email" id="email" required="required" autocomplete="off">
                <input class="w3-input" type="password" placeholder="********" name="password" id="password" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="fullname" name="fullname" id="present_appointment" required="required" autocomplete="off">
                <select class="w3-select" name="sex">
                    <option value="" disabled selected>Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <input class="w3-input" type="number" placeholder="phone" name="phone" id="phone" required="required" autocomplete="off">
                <select class="w3-select" name="role">
                    <option value="" disabled selected>Role</option>
                    <option value="users">User</option>
                    <option value="admin">Admin</option>                    
                    <option value="developer">Developer</option>                                       
                </select>
               
                <br />
                <center><input type="submit" name="btnAddUser" value="Add" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
            </form>
            <p>&nbsp;</p>            
        </div>
    </div>
    
</section>
<section class="w3-row w3-padding w3-hide-large">&nbsp;</section>
<p>&nbsp;</p>
<!-- //User Welcome Message-->