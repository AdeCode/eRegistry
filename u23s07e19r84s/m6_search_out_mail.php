<?php
    if(isset($_POST['btnReceiveMail']))
    {
        $searchCriterion = $_POST['searchCriterion'];     $searchCriterion = strtolower(trim($searchCriterion));
        $mailType = $_POST['mailType'];                   $table = strtolower(trim($mailType));  
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
                SEARCH OUT MAIL
            </h4>
            <script type="text/javascript" src="../js/search_out_mail.js"></script>           
            <form class="w3-container" action="#" method="post" name="fms">
                <select class="w3-select" name="searchCriterion">
                  <option value="" disabled selected>Mail Search Criterion</option>
                  <option value="refNo">By Reference Number</option>
                  <option value="title">By Title</option>                                                                   
                </select>
                <select class="w3-select" name="mailType">
                  <option value="" disabled selected>Select Mail Type</option>
                  <option value="outgoing_mails">Out-going Mail</option>
                  <option value="incoming_mails">In-coming Mail</option>                                                                   
                </select>               
                <input class="w3-input" type="text" placeholder="Mail Search Keyword(s)" name="keyword" required="required" autocomplete="off" onkeyup='search_likely_mails(document.forms["fms"]["mailType"].value, document.forms["fms"]["searchCriterion"].value, this.value)' onchange='search_likely_mails(document.forms["fms"]["mailType"].value, document.forms["fms"]["searchCriterion"].value, this.value)'>
            </form> 
            <p>&nbsp;</p>          
        </div>

        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" id="likelyMails"> 
            <p>&nbsp;</p>                      
        </div>
    </div>

    <!-- Right Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>
<!-- //User Welcome Message-->
<?php
    }
    else if(isset($_GET['viewId']))
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
                SEARCH OUT MAIL RESULT
            </h4>          
            <form class="w3-container" action="#" method="post" name="fms">
            <?php
                echo '<table class="w3-table-all w3-hoverable">';

                $tableName = $_GET['t'];
                $id = $_GET['viewId'];
                    
                $record = DiffTables::find_by_sql("SELECT * FROM $tableName WHERE id='$id' LIMIT 1");

                if($record!=false)
                {
                    if($tableName == "incoming_mails")
                    {
                        foreach($record as $value)
                        {
                            $refNo = $value["ref_no"];
                            $title = $value["title"];
                            $dispatcher = $value["dispatcher"];
                            $receiver = $value["receiver"];
                            $dateOfReception = $value["date_reception"];
                            $dispatcher4charging = $value["dispatcher4charging"];
                            $receiver4charging = $value["receiver4charging"];
                            $office4charging = $value["office4charging"];
                            $date4charging = $value["date4charging"];
                            $dispatcherAfterCharging = $value["dispatcherAfterCharging"];
                            $receiverAfterCharging = $value["receiverAfterCharging"];
                            $dateAfterCharging = $value["dateAfterCharging"];
                            $fileNo = $value["file_no"];
                            $fileVol = $value["file_volume"];
                            $filePageNo = $value["file_page_no"];
                            $mailStatus = $value["stage_status"];

                            if($mailStatus == 99){ $mailStatus = "Dispatched Mail Copy";}
                            else if($mailStatus==0){ $mailStatus = "Newly Received Mail";}  
                            else if($mailStatus==1){ $mailStatus = "New Mail Prepared for Charging (Registry Office)";} 
                            else if($mailStatus==2){ $mailStatus = "Mail Awaiting Charging (P.S Office)";} 
                            else if($mailStatus==3){ $mailStatus = "Mail Prepared for Reception after Charging (Registry Office)";} 
                            else if($mailStatus==4){ $mailStatus = "Mail Received after Charging (Registry Office)";} 
                            else if($mailStatus==5){ $mailStatus = "Mail Already Filed up.";}                 
                        
                            echo '<tr>
                                    <td>
                                        <i>REF NO --- ' . $refNo . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>TITLE --- ' . $title . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>DISPATCHER --- ' . $dispatcher . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>RECEIVER --- ' . $receiver . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>RECEPTION DATE --- ' . $dateOfReception . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>FILE NO --- ' . $fileNo . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>FILE VOLUME --- ' . $fileVol . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>FILE PAGE NO --- ' . $filePageNo . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>MAIL STATUS --- ' . $mailStatus . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>';
                        }
                    }
                    else
                    {
                         foreach($record as $value)
                        {
                            $refNo = $value["ref_no"];
                            $title = $value["title"];
                            $mailFrom = $value["mail_from"];
                            $mail_to = $value["mail_to"];
                            $dispatcher = $value["dispatcher"];
                            $receiver = $value["receiver"];
                            $dateOfDispatch = $value["date_dispatch"];
                            $fileNo = $value["file_no"];
                            $fileVol = $value["file_volume"];
                            $filePageNo = $value["file_page_no"];
                            $mailStatus = $value["stage_status"];

                            if($mailStatus==0){ $mailStatus = "Newly Dispatched Mail";}  
                            else if($mailStatus==5){ $mailStatus = "Mail Already Filed up.";}                 
                        
                            echo '<tr>
                                    <td>
                                        <i>REF NO --- ' . $refNo . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>TITLE --- ' . $title . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>DISPATCHER --- ' . $dispatcher . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>RECEIVER --- ' . $receiver . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>DATE of DISPATCH --- ' . $dateOfDispatch . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>FILE NO --- ' . $fileNo . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>FILE VOLUME --- ' . $fileVol . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>FILE PAGE NO --- ' . $filePageNo . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        <i>MAIL STATUS --- ' . $mailStatus . '&nbsp;&nbsp;</i>
                                    </td>
                                  </tr>';
                        }   
                    }
                }
                else
                {
                    echo '<tr>
                            <td class="w3-center w3-text-red">
                                There is no new mail available
                            </td>
                          </tr>';
                }

                echo '</table>';                     
            ?>
            </form> 
            <p>&nbsp;</p>          
        </div>
    </div>
<!-- //User Welcome Message-->

    <!-- Right Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>
<?php
    }
?>