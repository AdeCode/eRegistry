<?php
    $staffId = $loggedId;
    if(!isset($_GET['viewId']))
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
                      
                          //$response = "VIEW PROFILE";
                          echo "<div class='form-error'>VIEW PROFILE</div>";
                      
                  ?>
                </h4>        
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


                $query = DiffTables::find_by_sql("SELECT * FROM staffs WHERE Staff_id='$staffId' LIMIT 1");

                if($query!=false){
                  foreach($query as $val){
                    $department = $val['Department'];
                    $date_of_first_app = $val['first_appointment'];
                    $date_of_present_app = $val['Present_appointment'];
                    $present_post = $val['Present_post'];
                    $grade_level = $val['Grade_level'];
                    $cadre = $val['Cadre'];
                    $d_o_b = $val['D_O_B'];
                    $home_town = $val['Home_town'];
                    $lg = $val['LG'];
                    echo '
                      <tr>
                        <td>
                            <i>Department --- ' . $department . '&nbsp;&nbsp;</i>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <i>Date of First appointment --- ' . $date_of_first_app . '&nbsp;&nbsp;</i>
                        </td>
                      </tr>
                      <tr>
                      <td>
                          <i>Date of Present appointment --- ' . $date_of_present_app . '&nbsp;&nbsp;</i>
                      </td>
                      </tr> 
                      <tr>
                        <td>
                            <i>Present Position --- ' . $present_post . '&nbsp;&nbsp;</i>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <i>Grade Level --- ' . $grade_level . '&nbsp;&nbsp;</i>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <i>Cadre --- ' . $cadre . '&nbsp;&nbsp;</i>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <i>Date of Birth --- ' . $d_o_b . '&nbsp;&nbsp;</i>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <i>Home Town --- ' . $home_town . '&nbsp;&nbsp;</i>
                        </td>
                      </tr>
                      <tr>
                        <td>
                            <i>Local Government --- ' . $lg . '&nbsp;&nbsp;</i>
                        </td>
                      </tr>
                    ';
                   
                  }
                }
                echo '</table>';                    
            ?>
             <br/>
          <label>Select an image</label>
          <input type="file" name="image" id="image"/>
          <span id="uploaded_image"></span>

        <br/>
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
<script>
$(document).ready(function(){
        $(document).on('change','#profileImage',function(){
            var property = document.getElementById("profileImage").files[0];
            var image_name = property.name;
            var image_extension = image_name.split('.').pop().toLowerCase();
            if (jQuery.inArray(image_extension, ['gif','png','jpg','jpeg'])== -1){
                alert("Invalid Image file");
            }
            var image_size = property.size;
            if (image_size > 1000000){
                alert("Image file too large");
            }else{
                var form_data = new FormData();
                form_data.append("file", property);
                $.ajax({
                    url: "p1_view_profile.php",
                    method: "POST",
                    data: form_data,
                    contentType:false,
                    cache: false,
                    processData: false,
                    beforeSend:function(){
                        $('#uploaded_image').html("<label class='text-success'>Image uploading...</label>");
                    },
                    success:function(data){
                        $('#uploaded_image').html(data);
                    }
                })
            }
        });
    });
</script>