<?php
    $response = "";
    $confirmSubmission = false;
    if(isset($_POST['btnAddStaff']))
    {
        //$staff_name=" ";

        $staff_id = $_POST['staff_id'];                     
        $staff_name = $_POST['staff_name'];                 
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

    $sql = "INSERT INTO staffs (id, Staff_id, Staff_name, first_appointment, Present_appointment, Present_post,Grade_level,Duty_post,Cadre,D_O_B,Home_town,LG,Gender) 
                VALUES (null, '$staff_id', '$staff_name', '$first_appointment', '$present_appointment','$present_post','$grade_level','$duty_post','$cadre',' $d_o_b ','$home_town','$local_government','$gender')";
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
<section class="w3-row">
    <!-- Left Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>
    <?php 
        //$date = date('d-m-y');
        $string = "2010-11-24";
        $date = DateTime::createFromFormat("d-m-Y", $string);
        echo $date->format("d");
        //echo "Today's date ".$date;
        //echo "date of the month is: ".$date('d');
    ?>
    <!-- Content Area -->
    <div class="w3-col l4">
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" style="min-height: 200px;"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                <?php 
                    if(isset($_POST['btnAddStaff']))
                    {
                        echo "$response";    
                    }
                    else
                    {
                        echo "ADD NEW DEPARTMENT";
                    }
                ?>
            </h4>           
            <form class="w3-container" action="index.php?pg=s1" method="post">                
                <input class="w3-input" type="text" placeholder="department name" name="duty_post" id="duty_post" required="required" autocomplete="off"> 
                <input class="w3-input" type="text" placeholder="cadre" name="cadre" id="cadre" required="required" autocomplete="off"> 
                <input class="w3-input" type="date" placeholder="date of birth" name="D_O_B" id="D_O_B" required="required" autocomplete="off"> 
                <input class="w3-input" type="text" placeholder="Home town" name="home_town" id="home_town" required="required" autocomplete="off"> 
                <input class="w3-input" type="text" placeholder="Local government" name="local_government" id="local_government" required="required" autocomplete="off"> 
                <select class="w3-select" name="gender">
                    <option value="" disabled selected>Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <br />
                <center><input type="submit" name="btnAddDepartment" value="Add" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
            </form>
            <p>&nbsp;</p>            
        </div>
    </div>
    
</section>
<section class="w3-row w3-padding w3-hide-large">&nbsp;</section>
<p>&nbsp;</p>
<!-- //User Welcome Message-->