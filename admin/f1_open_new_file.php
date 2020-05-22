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
                    if(isset($_POST['btnOpenFile']))
                    {
                        echo "<div class='title_header'>$response</div>";    
                    }
                    else
                    {
                        $response = "OPEN NEW FILE";
                        echo "<div class='form-error'>$response</div><p>&nbsp;</p>";
                    }
                ?>
                <p>&nbsp;</p>
                </h4>        
                  <div id="formMessage" ></div>
                  <div class="form" id="form">
                  <form action="index.php?pg=f1" method="post" role="form" class="myForm" name="myForm" >    
                  <div class="col-md-12 formError" id="showMessage" ></div>
                  <div class="form-group">
                      <input type="text" name="fileNo" required class="form-control" id="keyword" placeholder="File Number" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="text" name="title" required class="form-control" id="keyword" placeholder="File Title" />
                      <div class="validation"></div>
                  </div>
                  <div class="form-group">
                      <input type="text" name="fileVol" required class="form-control" id="keyword" placeholder="File Volume" />
                      <div class="validation"></div>
                  </div>
                  <div class="text-center">
                      <button type="submit" name="btnOpenFile" id="submit">Open File</button>
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