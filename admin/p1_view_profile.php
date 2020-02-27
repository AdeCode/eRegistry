<?php
    $staffId = $loggedId;
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
                VIEW PROFILE
            </h4>
            <script type="text/javascript" src="../js/search_out_filez.js"></script>           
            <?php
                echo '<table class="w3-table-all w3-hoverable">';
                    
                $record = DiffTables::find_by_sql("SELECT * FROM users WHERE Staff_id='$staffId' LIMIT 1");

                if($record!=false)
                {
                    foreach($record as $value)
                    {
                        $fullName = $value["fullname"];
                        $email = $value["email"];
                        $phoneNo = $value["phone"];
                                       
                    
                        echo '<tr>
                                <td>
                                    <i>NAME --- ' . $fullName . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>STAFF ID --- ' . $staffId . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>Email --- ' . $email . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i>Phone --- ' . $phoneNo . '&nbsp;&nbsp;</i>
                                </td>
                              </tr>';
                    }
                    
                }
                else
                {
                    echo '<tr>
                            <td class="w3-center w3-text-red">
                                profile not found
                            </td>
                          </tr>';
                }

                echo '</table>';                     
            ?>
            <p>&nbsp;</p>          
        </div>

        
    </div>

    <!-- Right Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>






    
<?php
    }
?>