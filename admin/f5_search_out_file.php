<?php
    if(!isset($_GET['viewId']))
    {
?>

<section class="w3-row">
    <!-- Left Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>

    <!-- Content Area -->
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
                    $response = "SEARCH OUT FILE";
                    echo "<div class='form-error'>$response</div>";                    
                ?>
                <p>&nbsp;</p>
                </h4>        
                  <div id="formMessage"></div>
                  <div class="form" id="form">
                  <script type="text/javascript" src="../js/search_out_filez.js"></script>           
                  <form action="#" method="post" role="form" class="myForm" name="ffs" > 
                  <div class="form-group" >
                    <select class="form-control" name="mType" id="searchCriterion">
                      <option value="" disabled selected>SELECT FILE SEARCH CRITERION</option>
                      <option value="refNo">By Reference Number</option>
                      <option value="title">By Title</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <input type="text" name="keyword" required class="form-control" id="keyword" placeholder="File Search Keyword(s)" onkeyup='search_likely_files(document.forms["ffs"]["searchCriterion"].value, this.value)' onchange='search_likely_files(document.forms["ffs"]["searchCriterion"].value, this.value)' />
                      <div class="validation"></div>
                  </div>
                  </form>
                  </div>
                  <p>&nbsp;</p>
                  <div class="inputDiv" style="width:inherit;height:40px;" id="likelyFilez"></div>
              
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
                   
                    $response = "SEARCH OUT FILE RESULT";
                    echo "<div class='form-error'>$response</div>";
                    
                ?>
                </h4>        
                  <div id="formMessage" ></div>
                  <div class="form" id="form">
                  <form action="#" method="post" role="form">    
                  <?php
                  echo '<table class="w3-table-all w3-hoverable">';

                      $id = $_GET['viewId'];
                          
                      $record = DiffTables::find_by_sql("SELECT * FROM files WHERE id='$id' LIMIT 1");

                      if($record!=false)
                      {
                          foreach($record as $value)
                          {
                              $fileNo = $value["file_no"];
                              $fileTitle = $value["file_title"];
                              $fileVol = $value["file_volume"];
                              $dateOpened = $value["opened_date"];
                              $movtDate = $value["movement_date"];
                              $dispatcher = $value["dispatcher"];
                              $receiver = $value["receiver"];   
                              $dept = $value["dept"];
                              $location = $value["location"];                
                          
                              echo '<tr>
                                      <td>
                                          <i>FILE NO --- ' . $fileNo . '&nbsp;&nbsp;</i>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                          <i>TITLE --- ' . $fileTitle . '&nbsp;&nbsp;</i>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                          <i>FILE VOLUME --- ' . $fileVol . '&nbsp;&nbsp;</i>
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
                                          <i>DEPARTMENT --- ' . $dept . '&nbsp;&nbsp;</i>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                          <i>FILE LOCATION --- ' . $location . '&nbsp;&nbsp;</i>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                          <i>LAST MOVT DATE --- ' . $movtDate . '&nbsp;&nbsp;</i>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                          <i>OPENED DATE --- ' . $dateOpened . '&nbsp;&nbsp;</i>
                                      </td>
                                    </tr>';
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