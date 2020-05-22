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
                   
                        $response = "NOMINAL ROLL";
                        echo "<div class='form-error'>$response</div>";
                    
                ?>
                </h4> 
				<div id="formMessage"></div>
                  <div class="form" id="form">
				  <script type="text/javascript" src="../js/search_user.js"></script>           
                  <form action="#" method="post" role="form" class="myForm" name="userForm" > 
                  <div class="form-group" >
                    <select class="form-control" name="mType" id="searchCriterion">
                      <option value="" disabled selected>SELECT USER SEARCH CRITERION</option>
                      <option value="staffName">By Name</option>
                      <option value="staffId">By Staff Id</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <input type="text" name="keyword" required class="form-control" id="keyword" placeholder="User Search Keyword(s)" onkeyup='search_likely_users(document.forms["userForm"]["searchCriterion"].value, this.value)' onchange='search_likely_users(document.forms["userForm"]["searchCriterion"].value, this.value)' />
                      <div class="validation"></div>
                  </div>
                  </form>
                  </div>
                  <div class="inputDiv" style="width:inherit;height:auto;" id="likelyUser"></div>       
				  <?php 
						$counter = 1;
						$record = DiffTables::find_by_sql("SELECT * FROM staffs");
						//$sql = "SELCT * FROM staffs";
						//$result = $con->query($sql);
						echo '<table class="table table-bordered table-hover">';
						echo '<thead>
						<tr>
							<th>#</th>
							<th>Staff id</th>
							<th>Staff name</th>
							<th>Present post</th>
							<th>Grade level</th>
							<th>Action</th>
						</tr>
						</thead>';
						echo '<tbody>';
								if ($record!=false){
									foreach ($record as $i){
										echo "<tr><td>".$counter++."</td>
											<td>".$i['Staff_id']."</td>
											<td>".$i['Staff_name']."</td>																					
											<td>".$i['Present_post']."</td>							
											<td>".$i['Grade_level']."</td>
											<td>". '<a href="index.php?pg=s4&viewId=' .$i['id'].  '" class="w3-gray w3-hover-orange w3-round">&nbsp;View&nbsp;</a>' ."</td>
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