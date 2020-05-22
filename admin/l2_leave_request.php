<?php 
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "e_registry_sita2019";
    $con = new mysqli($servername, $username, $password, $dbname);
    if (!$con){
      die("Error".mysqli_connect_error());
    }
	
	$id=$_GET['id'];
			
?>



<section id="hero" class="wow fadeIn">
        <div class="container">         
            <div class="row">
              <div class="col-md-2 col-lg-1">
                  <div class="feature-block"></div>
  
              </div>
          <div class="col-lg-10 col-md-4">
            <div class="row form-container" >
              <div class="col-md-12">
                <div class="form" id="form">
                <h4 class="title_header" style="text-align:center">
                <?php 
                    if(isset($_POST['btnReceiveMail']))
                    {
                        echo "<div class='title_header'>$response</div>";    
                    }
                    else
                    {
                        $response = "PENDING LEAVE REQUESTS";
                        echo "<div class='form-error'>$response</div>";
                    }
                ?>
                </h4>        
				<?php 
						$counter = 1;
						$record = DiffTables::find_by_sql("SELECT * FROM leave_application WHERE status = 'processing' order by date_of_application DESC");
						
						echo '<table class="table table-bordered table-hover">';
						echo '<thead>
					<tr>
						<th>#</th>
						<th>Staff id</th>
						<th>Staff name</th>
						<th>leave type</th>
						<th>date of application</th>
						<th>Action</th>
					</tr>
				</thead>';
				echo '<tbody>';
						$name= "";
						if ($record!=false){
							foreach ($record as $i){
								$getStaffId = $i['Staff_id'];
								$qry = DiffTables::find_by_sql("SELECT fullname FROM users WHERE Staff_id = '$getStaffId' limit 1");
								if ($qry != false){
									foreach ($qry as $k){
										$name = $k['fullname'];
									}
								}
								
								/*if ($qry != false){
									foreach
								}*/
								echo "<tr><td>".$counter++."</td>
									 <td>".$i['Staff_id']."</td>
									 <td>".$name."</td>						
									 <td>".$i['leave_type']."</td>							
									 <td>".$i['date_of_application']."</td>					
									 <td>". '<a href="index.php?pg=l5&viewId=' .$i['id'].  '&staffId=' .$i['Staff_id'].  '" class="w3-gray w3-hover-orange w3-round">&nbsp;View&nbsp;</a>' ."</td>
									 </tr>";
							}
						}
						echo '</tbody>
							  </table>';
					?>

                  
                </div>
              </div>
            </div>
  
              
            </div>
            <div class="col-md-2 col-lg-1"></div>
  
          </div>
        </div>        
      </section>
      <script src="../extensions/lib/jquery/jquery.min.js"></script>
      <script>
     
      </script>