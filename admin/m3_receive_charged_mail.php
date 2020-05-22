<?php
    if(isset($_GET['tid']))
    {
    	$id = $_GET['tid'];
    	$sql = "UPDATE incoming_mails SET stage_status=3 WHERE id=$id";

    	$response = DiffTables::update_by_sql($sql);
    }
    else if(isset($_GET['did']))
    {
    	$id = $_GET['did'];
    	$sql = "UPDATE incoming_mails SET stage_status=2 WHERE id=$id";

    	$response = DiffTables::update_by_sql($sql);
    }
    else if(isset($_POST['btnReceiveMail']))
    {
    	$dispatcher = $_POST['dispatcher'];		$dispatcher = ucwords(trim($dispatcher));
    	$receiver = $_POST['receiver'];			$receiver = ucwords(trim($receiver));
    	//$office = $_POST['office'];				$office = ucwords(trim($office));
    	$d8 = date('Y-m-d H:i:s');

        $d8 = new DateTime($d8);
        $d8->add(new DateInterval('PT1H'));
        $d8 = $d8->format('Y-m-d H:i:s');

        $sql = "UPDATE incoming_mails SET stage_status=4, dispatcherAfterCharging='$dispatcher', receiverAfterCharging='$receiver', dateAfterCharging='$d8' 
        WHERE stage_status=3";

    	$response = DiffTables::update_by_sql($sql);
    }
?>

<section id="hero" class="wow fadeIn">
  <div class="container">         
    <div class="row" style="margin-top: 40px; height:400px;">
            <div class="col-md-1 col-lg-1">
                <div class="feature-block"></div>
            </div>

            <div class="col-lg-10 col-md-10">
              <div class="row">
                <div class="col-md-6">
                <div class="row form-container">
                  <div class="col-md-12">
                  <h4 class="title_header" style="text-align:center">
                    MAIL(S) SENT OUT FOR CHARGING
                  </h4>
                  <div id="formMessage" ></div>
                  <div class="form" id="form">
                    <form action="#" method="post" role="form" class="myForm " name="myForm" >    
                    <?php
                    echo '<table class="w3-table-all w3-hoverable">';
                            
                        $record = DiffTables::find_by_sql("SELECT id, title, ref_no FROM incoming_mails WHERE stage_status=2 ORDER BY id ASC");
                        $sn = 0; 

                        if($record!=false)
                        {
                            foreach($record as $value)
                            {
                                $sn++;
                                $mId = $value["id"];
                                $mtitle = $value["title"];
                                $mrefNo = $value["ref_no"];
                            
                                echo '<tr>
                                        <td>' .
                                            $sn . '. <i>' . $mtitle . '---' . $mrefNo . '&nbsp;&nbsp;</i>
                                            <a href="index.php?pg=m3&tid='. $mId . '" class="w3-gray w3-hover-orange w3-round">&nbsp;Transfer&nbsp;</a>
                                        </td>
                                    </tr>';
                            }
                        }
                        else
                        {
                            echo '<tr>
                                    <td class="w3-center w3-text-red">
                                        There is no mail pending for charging
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

                <div class="col-md-6">
                  <div class="row form-container" >
                    <div class="col-md-12">
                      <h4 class="title_header" style="text-align:center">
                        ALREADY CHARGED MAIL(S)
                      </h4>
                      <div id="formMessage" ></div>
                      <div class="form" id="form">
                        <form action="index.php?pg=m3" method="post" role="form" class="myForm " name="myForm" >    
                        <?php 
                        echo '<table class="w3-table-all w3-hoverable">';
                                
                            $record = DiffTables::find_by_sql("SELECT id, title, ref_no FROM incoming_mails WHERE stage_status=3 ORDER BY id ASC");
                            $sn = 0; 

                            if($record!=false)
                            {
                                foreach($record as $value)
                                {
                                    $sn++;
                                    $mId = $value["id"];
                                    $mtitle = $value["title"];
                                    $mrefNo = $value["ref_no"];
                                
                                    echo '<tr>
                                            <td>' .
                                                $sn . '. <i>' . $mtitle . '---' . $mrefNo . '&nbsp;&nbsp;</i>
                                                <a href="index.php?pg=m3&did='. $mId . '" class="w3-gray w3-hover-orange w3-round">&nbsp;Drop&nbsp;</a>
                                            </td>
                                        </tr>';
                                }
                            }
                            else
                            {
                                echo '<tr>
                                        <td class="w3-center w3-text-red">
                                            There is no mail to receive
                                        </td>
                                    </tr>';
                            }

                        echo '</table>';
                        ?>
                        <div class="form-group">
                          <input type="text" class="form-control"  required name="dispatcher" id="dispatcher" placeholder="Dispatcher's Nmae" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                          <div class="validation"></div>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control"  required name="receiver" id="receiver" placeholder="Receiver's Name" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                          <div class="validation"></div>
                        </div>
                        <div class="text-center">
                          <button type="submit" name="btnReceiveMail" id="submit">Receive</button>
                        </div>
                        </form>
                        </div> 
                    </div>
                    </div>               
                  </div>
                </div>  
            </div>
          <div class="col-md-1 col-lg-1">
            <div class="feature-block"></div>
          </div>
    </div>

  </div>        
</section>
<script src="../extensions/lib/jquery/jquery.min.js"></script>
<script>
     
</script>




