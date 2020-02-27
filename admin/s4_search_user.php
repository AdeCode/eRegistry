<?php
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
                SEARCH STAFF
            </h4>
            <script type="text/javascript" src="../js/search_user.js"></script>           
            <form class="w3-container" action="#" method="post" name="userForm">
                <select class="w3-select" name="searchCriterion">
                  <option value="" disabled selected>User Search Criterion</option>
                  <option value="staffName">By name</option>
                  <option value="staffId">By staff id</option>                                                                   
                </select>

                <input class="w3-input" type="text" placeholder="File Search Keyword(s)" name="keyword" required="required" autocomplete="off" onkeyup='search_likely_users(document.forms["userForm"]["searchCriterion"].value, this.value)' onchange='search_likely_users(document.forms["userForm"]["searchCriterion"].value, this.value)'>
            </form> 
            <p>&nbsp;</p>          
        </div>

        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" id="likelyUser"> 
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
                SEARCH RESULT
            </h4>          
            <form class="w3-container" action="#" method="post">
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