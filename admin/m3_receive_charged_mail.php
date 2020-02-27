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

<!-- User Welcome Message-->
<section class="w3-row">
    <!-- Left Spacer -->
    <div class="w3-col l2">
        &nbsp;
    </div>


    <!-- ContentLeft Area -->
    <div class="w3-col l4">
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" style="min-height: 100px;"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                MAIL(S) SENT OUT FOR CHARGING
            </h4> 
            <form class="w3-container" action="#" method="post">          
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
            <p>&nbsp;</p>            
        </div>
    </div>

    <!-- ContentRight Area -->
    <div class="w3-col l4">
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" style="min-height: 200px;"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                ALREADY CHARGED MAIL(S)
            </h4>           
            <form class="w3-container" action="index.php?pg=m3" method="post">
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
                <input class="w3-input" type="text" placeholder="Dispatcher's Name" name="dispatcher" required="required" autocomplete="off">
                <input class="w3-input" type="text" placeholder="Receiver's Name" name="receiver" required="required" autocomplete="off">
                <br />&nbsp;
                <center><input type="submit" name="btnReceiveMail" value="Receive" class="w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
            </form>
            <p>&nbsp;</p>            
        </div>
    </div>

    <!-- Right Spacer -->
    <div class="w3-col l2">
        &nbsp;
    </div>
</section>
<section class="w3-row w3-padding w3-hide-large">&nbsp;</section>
<p>&nbsp;</p>
<!-- //User Welcome Message-->