<?php
    $response = "";
    $confirmSubmission = false;

    if(isset($_POST['btnReceiveMail']))
    {
        $title = $_POST['title'];               $title = ucwords(trim($title));
        $refNo = $_POST['refNo'];               $refNo = ucwords(trim($refNo));
        $from = $_POST['from'];                 $from = ucwords(trim($from));
        $dispatcher = $_POST['dispatcher'];     $dispatcher = ucwords(trim($dispatcher));
        $receiver = $_POST['receiver'];         $receiver = ucwords(trim($receiver));
        $mType = $_POST['mType'];
        $d8 = date('Y-m-d H:i:s');

        $d8 = new DateTime($d8);
        $d8->add(new DateInterval('PT1H'));
        $d8 = $d8->format('Y-m-d H:i:s');

        /*echo "
            Title: $title <br />
            Reference Number: $refNo <br />
            From: $from <br />
            Dispatcher: $dispatcher <br />
            Receiver: $receiver <br />
            Today's Date: " . $d8 . " <hr />
        ";*/

        $sql = "INSERT INTO incoming_mails (id, ref_no, title, mail_from, dispatcher, receiver, date_reception, type) 
                VALUES (null, '$refNo', '$title', '$from', '$dispatcher', '$receiver' , '$d8', '$mType')";
        $confirmSubmission = DIffTables::insert($sql);

        if($confirmSubmission == true)
        {
            $response = "RECEIVE NEW MAIL <br /><span style='color:#f00;font-size:16px;'>Successful Operation</span>";
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
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" style="min-height: 200px;"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                <?php 
                    if(isset($_POST['btnReceiveMail']))
                    {
                        echo "$response";    
                    }
                    else
                    {
                        echo "RECEIVE NEW MAIL";
                    }
                ?>
            </h4>           
            <form class="w3-container" action="index.php?pg=m1" method="post"> 
                <select class="w3-select" name="mType">
                  <option value="" disabled selected>Select Mail Type</option>
                  <option value="Circular">Memo</option>
                  <option value="Letter">Circulars</option> 
                  <option value="Memo">Letter</option>                                                 
                </select>               
                <input class="w3-input" type="text" placeholder="Mail Title" name="title" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="Reference Number" name="refNo" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="From Where (Address/Name)" name="from" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="Dispatcher's Name" name="dispatcher" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="Receiver's Name" name="receiver" required="required" autocomplete="off">
                <!--input class="w3-input" type="text" placeholder="Today's Date" value="<?php echo date("Ymd"); ?>" name="date" required="required" autocomplete="off"-->
                <br />
                <center><input type="submit" name="btnReceiveMail" value="Receive Mail" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
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