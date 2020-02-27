<?php
    $response = "";
    $confirmSubmission = false;

    if(isset($_POST['btnOpenFile']))
    {
        $fileNo = $_POST['fileNo'];             $fileNo = strtoupper(trim($fileNo));
        $title = $_POST['title'];               $title = ucwords(trim($title)); 
        $fileVol = $_POST['fileVol'];           $fileVol = strtoupper(trim($fileVol));
        $userId = $session->user_id; 

        $d8 = date('Y-m-d H:i:s');
        $d8 = new DateTime($d8);
        $d8->add(new DateInterval('PT1H'));
        $d8 = $d8->format('Y-m-d H:i:s');

        /*echo "
            USER ID : $userId
        ";*/

        $sql = "INSERT INTO files (id, file_no, file_title, file_volume, opened_date, opened_by) 
                VALUES (null, '$fileNo', '$title', '$fileVol', '$d8', '$userId')";
        $confirmSubmission = DIffTables::insert($sql);

        if($confirmSubmission == true)
        {
            $response = "OPEN NEW FILE <br /><span style='color:#f00;font-size:16px;'>Successful Operation</span>";
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
        <div class="w3-margin w3-border w3-round-large w3-border-green w3-text-dark-gray"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                <?php 
                    if(isset($_POST['btnOpenFile']))
                    {
                        echo "$response";    
                    }
                    else
                    {
                        echo "OPEN NEW FILE";
                    }
                ?>
            </h4>           
            <form class="w3-container" action="index.php?pg=f1" method="post">
                <input class="w3-input w3-border-green" type="text" placeholder="File Number" name="fileNo" required="required" autocomplete="off">                
                <input class="w3-input w3-border-green" type="text" placeholder="File Title" name="title" required="required" autocomplete="off">
                <input class="w3-input w3-border-green" type="text" placeholder="File Volume" name="fileVol" required="required" autocomplete="off">
                <br />
                <center><input type="submit" name="btnOpenFile" value="Open File" class="w3-btn w3-green w3-round w3-hover-orange w3-hover-text-white"></center>
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