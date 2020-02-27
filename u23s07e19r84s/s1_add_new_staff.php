
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
    
       
    }  
?>

<?php 

?>

<!-- User Welcome Message-->
<section class="w3-row">
    <div class="w3-col l4">
        &nbsp;
    </div>

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
                        echo "STAFF REGISTRATION";
                    }
                ?>
            </h4>           
            <form class="w3-container" action="index.php?pg=s1" method="post"> 
				<div class="form-group">
					<label>Staff Id:</label>
					<input class="w3-input" type="text" name="staff_id" id="staff_id" required="required" autocomplete="off" style="border: 1px solid #ff9800;">               
				</div>
                <div class="form-group">
					<label>Staff name:</label>
					<input class="w3-input" type="text" name="staff_name" id="staff_name" required="required" autocomplete="off" style="border: 1px solid #ff9800;">
				</div>
				<div class="form-group">
					<label>Date of first appointment:</label>
					<input class="w3-input	input-line" type="date" name="first_appointment" id="first_appointment" required="required" autocomplete="off" style="border: 1px solid #ff9800;">
				</div>
				<div class="form-group">
					<label>Date of present appointment</label>
					<input class="w3-input	input-line" type="date" name="present_appointment" id="present_appointment" required="required" autocomplete="off" style="border: 1px solid #ff9800;">
				</div>
				<div class="form-group">
					<label>present_post</label>
					<input class="w3-input" type="text" placeholder="Present post" name="present_post" id="present_post" required="required" autocomplete="off" style="border: 1px solid #ff9800;">
				</div>
				<div class="form-group">
					<label>Grade level</label>
					<input class="w3-input" type="number" name="grade_level" id="grade_level"  autocomplete="off" style="border: 1px solid #ff9800;">
				</div>
				<div class="form-group">
					<label>Duty post</label>
					<input class="w3-input" type="text"  name="duty_post" id="duty_post" required="required" autocomplete="off" style="border: 1px solid #ff9800;"> 
				</div>
				<div class="form-group">
					<label>Cadre</label>
					<input class="w3-input" type="text" name="cadre" id="cadre" required="required" autocomplete="off" style="border: 1px solid #ff9800;"> 
				</div>
				<div class="form-group">
					<label>Date of birth</label>
					<input class="w3-input" type="date" name="D_O_B" id="D_O_B"  autocomplete="off" style="border: 1px solid #ff9800;"> 
				</div>
				<div class="form-group">
					<label>Home town</label>
					<input class="w3-input" type="text" name="home_town" id="home_town" required="required" autocomplete="off" style="border: 1px solid #ff9800;"> 
				</div>
				<div class="form-group">
					<label>Local government</label>
					<input class="w3-input" type="text" name="local_government" id="local_government" required="required" autocomplete="off" style="border: 1px solid #ff9800;"> 
				</div>
                <select class="w3-select" name="gender" style="border: 1px solid #ff9800;">
                    <option value="" disabled selected>Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <br />
                <center><input type="submit" name="btnAddStaff" value="REGISTER" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
            </form>
            <p>&nbsp;</p>            
        </div>
    </div>
    
</section>
<section class="w3-row w3-padding w3-hide-large">&nbsp;</section>
<p>&nbsp;</p>
<!-- //User Welcome Message-->