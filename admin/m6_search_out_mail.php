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
<section id="hero" class="wow fadeIn">
        <div class="container">         
            <div class="row">
              <!-- left side-->
              <div class="col-md-2 col-lg-3">
                  <div class="feature-block"></div>
  
              </div>
              <!-- center column-->
          <div class="col-lg-6 col-md-4">
            <div class="row form-container" >
              <div class="col-md-12">
                <div class="form" id="form">
                <h4 class="title_header" style="text-align:center">
                <?php 
                    if(isset($_POST['btnReceiveMail']))
                    {
                        echo "<div class='title_header'>$response</div>";    
                    }
                    else
                    {
                        $response = "SEARCH OUT MAIL";
                        echo "<div class='form-error'>$response</div>";
                    }
                ?>
                </h4>        
                  <div id="formMessage" ></div>
                  <div class="form" id="form">
                  <script type="text/javascript" src="../js/search_out_mail.js"></script>           
                  <form action="" method="post" role="form" class="myForm" name="fms" >    
                  <div class="col-md-12 formError" id="showMessage" ></div>
                  <div class="form-group" >
                    <select class="form-control" name="mType" id="searchCriterion">
                      <option value="" disabled selected>SELECT MAIL SEARCH CRITERION</option>
                      <option value="refNo">By Reference Number</option>
                      <option value="title">By Title</option>
                  </select>
                  <select class="form-control" name="mType" id="mailType">
                      <option value="" disabled selected>SELECT MAIL TYPE</option>
                      <option value="outgoing_mails">Out-going Mail</option>
                      <option value="incoming_mails">In-coming Mail</option>
                  </select>
                  </div>
                  <div class="form-group">
                      <input type="text" name="keyword" required class="form-control" id="keyword" placeholder="Mail Search Keyword(s)" onkeyup='search_likely_mails(document.forms["fms"]["mailType"].value, document.forms["fms"]["searchCriterion"].value, this.value)' onchange='search_likely_mails(document.forms["fms"]["mailType"].value, document.forms["fms"]["searchCriterion"].value, this.value)'/>
                      <div class="validation"></div>
                    </div>
                  </form>
                  <p>&nbsp;</p>
                  </div>
                  <p>&nbsp;</p>
                  <div class="inputDiv" style="width:inherit;height:40px;" id="likelyMails"></div>

                  
                </div>
              </div>
            </div>
  
              
            </div>
            <!-- right side-->
            <div class="col-md-2 col-lg-3"></div>
  
          </div>
        </div>        
      </section>
<?php
   }
   else if(isset($_GET['viewId']))
   {
?>
      <section id="hero" class="wow fadeIn">
        <div class="container">         
            <div class="row">
              <!-- left side-->
              <div class="col-md-2 col-lg-3">
                  <div class="feature-block"></div>
  
              </div>
              <!-- center column-->
          <div class="col-lg-6 col-md-4">
            <div class="row form-container" >
              <div class="col-md-12">
                <div class="form" id="form">
                <h4 class="title_header" style="text-align:center">
                <?php 
                   
                    $response = "SEARCH OUT MAIL RESULT";
                    echo "<div class='form-error'>$response</div>";
                    
                ?>
                </h4>        
                  <div id="formMessage" ></div>
                  <div class="form" id="form">
                  <form action="" method="post" role="form" class="myForm" name="fms" >    
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
                  </div>

                  
                </div>
              </div>
            </div>
  
              
            </div>
            <!-- right side-->
            <div class="col-md-2 col-lg-3"></div>
  
          </div>
        </div>        
      </section>
<?php
  }
?>
      <script src="../extensions/lib/jquery/jquery.min.js"></script>
      <script>
     
      </script>