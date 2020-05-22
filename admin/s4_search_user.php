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
                    $response = "SEARCH OUT USER";
                    echo "<div class='form-error'>$response</div>";                    
                ?>
                <p>&nbsp;</p>
                </h4>        
                  <div id="formMessage"></div>
                  <div class="form" id="form">
                  <script type="text/javascript" src="../js/search_user.js"></script>           
                  <form action="#" method="post" role="form" class="myForm" name="userForm" > 
                  <div class="form-group" >
                    <select class="form-control" name="searchCriterion" id="searchCriterion">
                      <option value="" disabled selected>User Search Criterion</option>
                      <option value="staffName">By name</option>
                      <option value="staffId">By staff id</option>  
                    </select>
                  </div>
                  <div class="form-group">
                      <input type="text" name="keyword" required class="form-control" id="keyword" placeholder="User Search Keyword(s)" onkeyup='search_likely_users(document.forms["userForm"]["searchCriterion"].value, this.value)' onchange='search_likely_users(document.forms["userForm"]["searchCriterion"].value, this.value)' />
                      <div class="validation"></div>
                  </div>
                  </form>
                  </div>
                  <p>&nbsp;</p>
                  <div class="inputDiv" style="width:inherit;height:auto;" id="likelyUser"></div>
              
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
                   
                    $response = "SEARCH OUT USER";
                    echo "<div class='form-error'>$response</div>";
                    
                ?>
                </h4>  
                <?php
                echo '<table class="w3-table-all w3-hoverable">';

                $id = $_GET['viewId'];
                    
                $record = DiffTables::find_by_sql("SELECT * FROM staffs WHERE id='$id' LIMIT 1");

                if($record!=false)
                {
                    foreach($record as $value)
                    {
                        $staff_id = $value["Staff_id"];
                        $staff_name = $value["Staff_name"];
                        $first_appointment = $value["first_appointment"];
                        $present_appointment = $value["Present_appointment"];
                        $present_post = $value["Present_post"];
                        $grade_level = $value["Grade_level"];
                        $duty_post = $value["Duty_post"];
                        $cadre = $value["Cadre"];
                        $dob = $value["D_O_B"];
                        $home_town = $value["Home_town"];
                        $lg = $value["LG"];
                        $gender  = $value["Gender"];
                                           
                        echo '<tr>
                                <td>
                                    <i>STAFF ID --- ' . $staff_id . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>STAFF NAME --- ' . $staff_name . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>FIRST APPOINTMENT --- ' . $first_appointment . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>PRESENT APPOINTMENT --- ' . $present_appointment . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>PRESENT POST --- ' . $present_post . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>GRADE LEVEL --- ' . $grade_level . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>DUTY POST --- ' . $duty_post . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>CADRE --- ' . $cadre . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>DATE OF BIRTH --- ' . $dob . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>HOME TOWN --- ' . $home_town . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>LOCAL GOV --- ' . $lg . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>GENDER --- ' . $gender . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>';
                    }
                    
                }
                else
                {
                    echo '<tr>
                            <td class="w3-center w3-text-red">
                                Staff not found
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