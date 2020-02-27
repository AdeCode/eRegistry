

<section class="w3-row">
    <!-- Left Spacer -->
    <div class="w3-col l2">
        &nbsp;
    </div>

    <!-- Content Area -->
    <div class="w3-col l8">
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                DISPOSITION LIST
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
			 <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" id="likelyUser"> 
            <p>&nbsp;</p>                      
        </div>
        </div>

       
		<div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray"> 
            
				
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
						<th>First appointment</th>
						<th>Present appointment</th>
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
									 <td>".$i['first_appointment']."</td>							
									 <td>".$i['Present_appointment']."</td>							
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

    <!-- Right Spacer -->
    <div class="w3-col l2">
        &nbsp;
    </div>
</section>
<section class="w3-row w3-padding w3-hide-large">&nbsp;</section>
<p>&nbsp;</p>