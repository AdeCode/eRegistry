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
            <script type="text/javascript" src="../js/search_out_filez.js"></script>           
            <?php
            $fullName = "";
            $email = "";
            $phoneNo = 000;
                echo '<form class="w3-container" action="index.php?pg=p2" method="post">';
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
                        
                Name: &nbsp
                <input class="w3-input" type="text" name="name" value="<?php echo $fullName ?>" required="required" autocomplete="off">
                email: &nbsp
                <input class="w3-input" type="text" name="email" value="<?php echo $email ?>" required="required" autocomplete="off">
                Phone Number: &nbsp
                <input class="w3-input" type="text" name="phoneNum" value="<?php echo $phoneNo ?>" required="required" autocomplete="off">
                <br />
                <center><input type="submit" name="btnUpdateRecord" value="Update" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
                                          
                <?php
                echo '</form>';
            ?>
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