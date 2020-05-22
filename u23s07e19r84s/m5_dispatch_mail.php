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
<section id="hero" class="wow fadeIn">
        <div class="container">         
            <div class="row">
              <div class="col-md-2 col-lg-3">
                  <div class="feature-block"></div>
  
              </div>
          <div class="col-lg-6 col-md-4">
            <div class="row form-container" >
              <div class="col-md-12">
                <div class="form" id="form">
                <h4 class="title_header" style="text-align:center">
                <?php 
                    if(isset($_POST['btnDispatchMail']))
                    {
                        echo "<div class='title_header' style='margin-bottom:10px'>$response</div>";    
                    }
                    else
                    {
                        $response = "DISPATCH NEW MAIL";
                        echo "<div class='form-error'>$response</div>";
                    }
                ?>
                </h4>        
                  <div id="formMessage" ></div>
                  <div class="form" id="form">
                  <form action="index.php?pg=m7" method="post" role="form" class="myForm " name="myForm" >    
                  <div class="col-md-12 formError" id="showMessage" ></div>
                  <div class="form-group" >
                    <select class="form-control" name="mType" id="mailtype">
                      <option value="" disabled selected>SELECT MAIL TYPE</option>
                      <option value="Memo">Memo</option>
                      <option value="Circular">Circulars</option>
                      <option value="Letter">Letter</option>
                  </select>
                  </div>
                    <div class="form-group">
                      <input type="text" name="title"  class="form-control" id="title" placeholder="Mail Title" required />
                      <div class="validation"></div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control"  name="refNo" id="Reference_number" placeholder="Reference Number" required />
                      <div class="validation"></div>
                    </div>          
                    <div class="form-group">
                      <input type="text" class="form-control"  name="from" id="from" placeholder="From Where (Address/Name)" required data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                      <div class="validation"></div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control"  name="to" id="to" placeholder="To Where (Address/Name)" required data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                      <div class="validation"></div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control"  name="dispatcher" id="dispatcher" placeholder="Dispatcher's Nmae" required data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                      <div class="validation"></div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control"  name="receiver" id="receiver" placeholder="Receiver's Name" required data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                      <div class="validation"></div>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="btnDispatchMail" id="submit">Dispatch Mail</button></div>
                    <span></span>
                  </form>
                  </div>

                  
                </div>
              </div>
            </div>
  
              
            </div>
            <div class="col-md-2 col-lg-3"></div>
  
          </div>
        </div>        
      </section>
      <script src="../extensions/lib/jquery/jquery.min.js"></script>
      <script>
     
      </script>