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
                    $response = "ARCHIVE FILE";
                    echo "<div class='form-error'>$response</div>";                    
                ?>
                <p>&nbsp;</p>
                </h4>        
                  <div id="formMessage"></div>
                  <div class="form" id="form">
                  <script type="text/javascript" src="../js/fetch_file_title.js"></script>          
                  <form action="index.php?pg=f3" method="post" role="form" class="myForm" name="myForm" > 
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
                  <div class="col-md-12 formError" id="showMessage" ></div>
                  <div class="form-group">
                      <input type="text" name="fileNo" required class="form-control" id="keyword" placeholder="File Reference Number" onkeyup="display_title(this.value)" onchange="display_title(this.value)" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="text" name="dispatcher" required class="form-control" id="dispatcher" placeholder="File Dispatcher" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="text" name="receiver" required class="form-control" id="receiver" placeholder="File Receiver" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="text" name="fileLoc" required class="form-control" id="receiver" placeholder="Cabinet Location" />
                      <div class="validation"></div>
                  </div>
                  <div class="text-center">
                      <button type="submit" name="btnDip" id="submit">Move File</button>
                  </div>  
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
      <script src="../extensions/lib/jquery/jquery.min.js"></script>
      <script>
     
      </script>