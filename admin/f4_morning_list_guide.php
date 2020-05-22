
<!-- User Welcome Message-->
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
                    $response = "MORNING LIST GUIDE";
                    echo "<div class='form-error'>$response</div>";                    
                ?>
                <p>&nbsp;</p>
                </h4>        
                  <div id="formMessage"></div>
                  <div class="form" id="form">
                  <script type="text/javascript" src="../js/morning_list_guide.js"></script>           
                  <form action="#" method="post" role="form" class="myForm" name="myForm" > 
                  <div class="form-group" >
                  <select class="form-control" name="dept" id="mailType" onchange="display_list(this.value)" onkeyup="display_list(this.value)">
                          <option value="" disabled selected>Select Department</option>
                          <option value="Account">Account</option>
                          <option value="Civic Data Management">Civic Data Management</option>
                          <option value="Engineering &amp; IT Infrastructures">Engineering &amp; IT Infrastructures</option>
                          <option value="Finance &amp; Administration">Finance &amp; Administration</option>
                          <option value="Software Development">Software Development</option>                  
                          <option value="Planning &amp; IT Innovation">Planning &amp; IT Innovation</option>
                          <option value="Permanent Secretary">Permanent Secretary</option>
                          <option value="Senior Special Adviser">Senior Special Adviser</option>
                  </select>
                  </div>   
                  
                  </form>
                  </div>
                  <p>&nbsp;</p>
                  <div class="inputDiv" style="width:inherit;height:auto;" id="show_list"></div>              
                </div>
              </div>
            </div>             
            </div>
            <!-- right side-->
            <div class="col-md-2 col-lg-3"></div>
  
          </div>
        </div>        
      </section>
      <script src="../extensions/lib/jquery/jquery.min.js"></script>
      <script>
     
      </script>