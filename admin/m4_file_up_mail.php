<?php
    if(isset($_POST['btnFileUp']))
    {
        $refNo = $_POST['refNo'];
        $fileNo = $_POST['fileNo'];         $fileNo = strtoupper(trim($fileNo));
        $fileVol = $_POST['fileVol'];
        $filePageNo = $_POST['filePageNo'];
        $d8 = date('Y-m-d H:i:s');

        $d8 = new DateTime($d8);
        $d8->add(new DateInterval('PT1H'));
        $d8 = $d8->format('Y-m-d H:i:s');

        $sql = "UPDATE incoming_mails SET stage_status=5, file_no='$fileNo', file_volume='$fileVol', file_page_no='$filePageNo' 
        WHERE ref_no='$refNo'";

        $response = DiffTables::update_by_sql($sql);
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
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" style="min-height: 200px;"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                FILE UP CHARGED MAIL                
            </h4>
            <script type="text/javascript" src="../js/fetch_mail_title.js"></script>           
            <form class="w3-container" action="index.php?pg=m4" method="post">                
                <center>
                    <div class="w3-text-red" id="show_title">
                        <?php 
                            if(isset($_POST['btnFileUp']))
                            {
                                if($response==false)
                                {
                                    echo "Access Denied"; 
                                }
                                else
                                {
                                    echo "Successful Operation";
                                }                            
                            }
                            else
                            {
                                echo "Auto preview referenced mail";
                            }
                        ?>  
                    </div>
                </center>
                <input class="w3-input" type="text" placeholder="Mail Reference Number" name="refNo" id="refNo" required="required" autocomplete="off" onkeyup="display_title(this.value)" onchange="display_title(this.value)">                
                <input class="w3-input" type="text" placeholder="File Number" name="fileNo" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="File Volume" name="fileVol" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="File Page Number" name="filePageNo" required="required" autocomplete="off">                
                <!--input class="w3-input" type="text" placeholder="Today's Date" value="<?php echo date("Ymd"); ?>" name="date" required="required" autocomplete="off"-->
                <br />
                <center><input type="submit" name="btnFileUp" value="File Up" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
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