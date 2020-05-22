<?php
    $response = "";
    $confirmSubmission = false;
	$staffId = $loggedId;
?>

<!-- User Welcome Message-->
<section id="hero" class="wow fadeIn">
        <div class="container">         
            <div class="row">
              <!-- left side-->
              <div class="col-md-2 col-lg-1">
                  <div class="feature-block"></div>
  
              </div>
              <!-- center column-->
          <div class="col-lg-10 col-md-4">
            <div class="row form-container" >
              <div class="col-md-12">
                <div class="form" id="form">
                <h4 class="title_header" style="text-align:center">
				<?php 
                    
                    $response = "STAFFS ON LEAVE";
                    echo "<div class='form-error'>$response</div>";
                  
                ?>
				</h4>
                <?php 
						$counter = 1;
						$record = DiffTables::find_by_sql("SELECT * FROM leave_application WHERE status = 'approved' order by date_of_application DESC ");
						
						echo '<table class="table table-bordered table-hover">';
						echo '<thead>
					<tr>
						<th>#</th>
						<th>Staff id</th>
						<th>Staff name</th>
						<th>leave type</th>
						<th>start date</th>
						<th>end date</th>
						<th>Action</th>
					</tr>
				</thead>';
				echo '<tbody>';
						$name= "";
						if ($record!=false){
							foreach ($record as $i){
								$getStaffId = $i['Staff_id'];
								$qry = DiffTables::find_by_sql("SELECT fullname FROM users WHERE Staff_id = '$getStaffId'");
								if ($qry != false){
									foreach ($qry as $k){
										$name = $k['fullname'];
									}
								}

								$getRecentApplication = DiffTables::find_by_sql("SELECT * FROM leave_application WHERE Staff_id = '$getStaffId' AND status = 'approved'  order by date_of_application DESC limit 1");
								if ($getRecentApplication != false){
									foreach ($getRecentApplication as $recent){
										echo "<tr><td>".$counter++."</td>
										<td>".$getStaffId."</td>
										<td>".$name."</td>						
										<td>".$recent['leave_type']."</td>							
										<td>".$recent['leave_start_date']."</td>							
										<td>".$recent['leave_end_date']."</td>
										<td>". '<a href="index.php?pg=l5&viewId=' .$recent['id'].  '&staffId=' .$recent['Staff_id'].  '" class="w3-gray w3-hover-orange w3-round">&nbsp;View&nbsp;</a>' ."</td>
										</tr>";
									}
								}
								
								
								/*if ($qry != false){
									foreach
								}*/
								
							}
						}
						echo '</tbody>
							  </table>';

						$show = DiffTables::find_by_sql("SELECT * FROM leave_application WHERE status = 'approved' order by date_of_application DESC limit 1");
						if ($show != false){
							foreach($show as $i)
							echo $i['leave_type'];
							echo $i['date_of_application'];

						}

					?>
                  </form>
                  </div>

                  
                </div>
              </div>
            </div>
  
              
            </div>
            <!-- right side-->
            <div class="col-md-2 col-lg-1"></div>
  
          </div>
        </div>        
      </section>

      <script src="../extensions/lib/jquery/jquery.min.js"></script>
      <script>
     
      </script>


