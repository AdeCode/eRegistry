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
                MORNING LIST GUIDE
            </h4>
            <script type="text/javascript" src="../js/morning_list_guide.js"></script>           
            <form class="w3-container" action="#" method="post">
                <select class="w3-select" name="dept" onchange="display_list(this.value)" onkeyup="display_list(this.value)">
                  <option value="" disabled selected>Select Department</option>
                  <option value="All Departments">All Departments</option>
                  <option value="Account">Account</option>
                  <option value="Civic Data Management">Civic Data Management</option>
                  <option value="Engineering and IT Infrastructures">Engineering &amp; IT Infrastructures</option>
                  <option value="Finance and Administration">Finance &amp; Administration</option>
                  <option value="Software Development">Software Development</option>               
                  <option value="Planning and IT Innovation">Planning &amp; IT Innovation</option>                  
                  <option value="Permanent Secretary">Permanent Secretary</option>
                  <option value="Senior Special Adviser">Senior Special Adviser</option>                                                                   
                </select>              
            </form> 
            <p>&nbsp;</p>          
        </div>

        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" id="show_list"> 
            <p>&nbsp;</p>                      
        </div>
    </div>

    <!-- Right Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>