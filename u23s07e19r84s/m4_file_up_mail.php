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
                    if(isset($_POST['btnReceiveMail']))
                    {
                        echo "<div class='title_header'>$response</div>";    
                    }
                    else
                    {
                        $response = "FILE UP CHARGED MAIL";
                        echo "<div class='form-error'>$response</div>";
                    }
                ?>
                </h4>        
                  <div class="form" id="form">
                  <script type="text/javascript" src="../js/fetch_mail_title.js"></script>           
                  <form action="index.php?pg=m4" method="post" role="form" class="myForm " >
                  <div class="form-group">
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
                  <div class="col-md-12 formError" id="showMessage" ></div>
                      <input type="text" name="refNo" require class="form-control" id="refNo" placeholder="Mail Reference Number" onkeyup="display_title(this.value)" onchange="display_title(this.value)"/>
                      <div class="validation"></div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" require name="fileNo" id="fileNo" placeholder="File Number" />
                      <div class="validation"></div>
                    </div>          
                    <div class="form-group">
                      <input type="text" class="form-control" require name="fileVol" id="fileVol" placeholder="File Volume" />
                      <div class="validation"></div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" require name="filePageNo" id="filePageNo" placeholder="File Page Number" />
                      <div class="validation"></div>
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" name="btnFileUp" id="submit">File Up</button></div>
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