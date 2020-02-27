<?php
    if(isset($_POST['btnDip']))
    {
        $fileNo = $_POST['fileNo'];
        $dispatcher = $_POST['dispatcher'];
        $receiver = $_POST['receiver'];
        $fileLoc = $_POST['fileLoc'];
        
        $d8 = date('Y-m-d H:i:s');
        $d8 = new DateTime($d8);
        $d8->add(new DateInterval('PT1H'));
        $d8 = $d8->format('Y-m-d H:i:s');

        $sql = "UPDATE files SET dispatcher='$dispatcher ', receiver='$receiver', dept='Registry', movement_date='$d8', location='$fileLoc' 
        WHERE file_no='$fileNo'";

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
                ARCHIVE FILE
            </h4> 
            <script type="text/javascript" src="../js/fetch_file_title.js"></script>          
            <form class="w3-container" action="index.php?pg=f3" method="post">
                <center>
                    <div class="w3-text-red" id="show_title">
                        <?php 
                            if(isset($_POST['btnDip']))
                            {
                                if($response==false)
                                {
                                    echo "Unsuccessful Operation"; 
                                }
                                else
                                {
                                    echo "Successful Operation";
                                }                            
                            }
                            else
                            {
                                echo "Auto preview referenced file";
                            }
                        ?>  
                    </div>                
                </center>
                <input class="w3-input" type="text" placeholder="File Reference Number" name="fileNo" required="required" autocomplete="off" onkeyup="display_title(this.value)" onchange="display_title(this.value)">                
                <input class="w3-input" type="text" placeholder="File Dispatcher" name="dispatcher" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="File Receiver" name="receiver" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="Carbinet Location" name="fileLoc" required="required" autocomplete="off">
                <!--input class="w3-input" type="text" placeholder="Today's Date" value="<?php echo date("Ymd"); ?>" name="date" required="required" autocomplete="off"-->
                <br />
                <center><input type="submit" name="btnDip" value="Dip File" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
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