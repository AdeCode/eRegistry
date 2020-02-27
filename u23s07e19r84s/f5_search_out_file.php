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
                SEARCH OUT FILE
            </h4>
            <script type="text/javascript" src="../js/search_out_filez.js"></script>           
            <form class="w3-container" action="#" method="post" name="ffs">
                <select class="w3-select" name="searchCriterion">
                  <option value="" disabled selected>File Search Criterion</option>
                  <option value="refNo">By Reference Number</option>
                  <option value="title">By Title</option>                                                                   
                </select>

                <input class="w3-input" type="text" placeholder="File Search Keyword(s)" name="keyword" required="required" autocomplete="off" onkeyup='search_likely_files(document.forms["ffs"]["searchCriterion"].value, this.value)' onchange='search_likely_files(document.forms["ffs"]["searchCriterion"].value, this.value)'>
            </form> 
            <p>&nbsp;</p>          
        </div>

        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" id="likelyFilez"> 
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
                SEARCH OUT FILE RESULT
            </h4>          
            <form class="w3-container" action="#" method="post">
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