<?php
    $response = "";
    $confirmSubmission = false;

    if(isset($_POST['btnDispatchMail']))
    {
        $title = $_POST['title'];               $title = ucwords(trim($title));
        $refNo = $_POST['refNo'];               $refNo = ucwords(trim($refNo));
        $from = $_POST['from'];                 $from = ucwords(trim($from));
        $to= $_POST['to'];                      $to = ucwords(trim($to));
        $dispatcher = $_POST['dispatcher'];     $dispatcher = ucwords(trim($dispatcher));
        $receiver = $_POST['receiver'];         $receiver = ucwords(trim($receiver));
        $mType = $_POST['mType'];
        $d8 = date('Y-m-d H:i:s');

        $d8 = new DateTime($d8);
        $d8->add(new DateInterval('PT1H'));
        $d8 = $d8->format('Y-m-d H:i:s');


        $sqlFlimsy = "INSERT INTO incoming_mails (id, ref_no, title, mail_from, dispatcher, receiver, stage_status, date_reception, type) 
                VALUES (null, '$refNo', '$title', '$to','$receiver', '$dispatcher', 99, '$d8', '$mType')";
        $confirmSubmissionFlimsy = DIffTables::insert($sqlFlimsy);

        $sql = "INSERT INTO outgoing_mails (id, ref_no, title, mail_from, mail_to, dispatcher, receiver, date_dispatch, type) 
                VALUES (null, '$refNo', '$title', '$from', '$to', '$dispatcher', '$receiver' , '$d8', '$mType')";
        $confirmSubmission = DIffTables::insert($sql);

        if($confirmSubmission == true && $confirmSubmissionFlimsy == true)
        {
            $response = "DISPATCH NEW MAIL <br /><span style='color:#f00;font-size:16px;'>Successful Operation</span>";
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
                    if(isset($_POST['btnDispatchMail']))
                    {
                        echo "$response";     
                    }
                    else
                    {
                        echo "DISPATCH NEW MAIL";
                    }
                ?>
            </h4>           
            <form class="w3-container" action="index.php?pg=m5" method="post"> 
                <select class="w3-select" name="mType">
                  <option value="" disabled selected>Select Mail Type</option>
                  <option value="Circular">Memo</option>
                  <option value="Letter">Circulars</option> 
                  <option value="Memo">Letter</option>                                                 
                </select>               
                <input class="w3-input" type="text" placeholder="Mail Title" name="title" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="Reference Number" name="refNo" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="From Who (Dept/Name)" name="from" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="To Where (Address/Name)" name="to" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="Dispatcher's Name" name="dispatcher" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="Receiver's Name" name="receiver" required="required" autocomplete="off">
                <br />
                <center><input type="submit" name="btnDispatchMail" value="Dispatch Mail" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
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