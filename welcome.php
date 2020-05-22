<?php
// Remember to give your form's submit tag a name="btnLogin" attribute!
$message = "LOGIN";

if (isset($_POST['btnLogin'])) // Form has been submitted.
{ 
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $login_type = "";
  
	$con = mysqli_connect('localhost','root',"",'e_registry_sita2019');
	$sql = "select * from users where email = '$email' and password = '$password' ";
	$result = mysqli_query($con,$sql);
	if ($result !=false){
		foreach ($result as $i){
			$login_type = $i['role'];
			$loggedId=$i['Staff_id'];
			$_SESSION['holdId'] = $loggedId;
		}
	}
  
	//$record = DiffTables::find_by_sql("SELECT role FROM users WHERE email = '$email' and password = '$password'");
  //$login_type = $record;
  
  // Check database to see if username/password exist.
  $found_user = User::authenticate($email, $password, $login_type);
  //$type = $found_user->role;
  //echo $type;
    
  if ($found_user) 
  {
    if($found_user->status == "active")
    {
      $session->login($found_user);
      $as_what = "{$found_user->email} logged in as " . $found_user->role;
      log_action('Login', $as_what);
	   if($found_user->role == "admin")
  { 
	   redirect_to("admin/index.php");
  }
  elseif($found_user->role == "users")
  { 
     redirect_to("u23s07e19r84s/index.php");
  }
  
    
      //directToRightPage($found_user->role); 
    }
    else
    {
      $message = "Deactivated"; 
    }
  } 
  else 
  {
    // username/password combo was not found in the database
    $message = "Username/password combination incorrect.";
  }  
} 
else
{ 
  // Form has not been submitted.
  $email = "";
  $password = "";
}
?>

<!-- User login form-->
<section id="hero" class="wow fadeIn" style="margin:0px;height:3px;">
<link href="extensions/css/bootstrap.min.css" rel="stylesheet">
<link href="extensions/css/style.css" rel="stylesheet">  

        <div class="container">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 title_header" >
              <div class="section-title text-center">
                <h2 style="color: white;">LOGIN</h2>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
           
            <div class="row">
              <div class="col-md-2 col-lg-3">
                  <div class="feature-block"></div>
  
              </div>
          <div class="col-lg-6 col-md-4">
            <div class="row" style="padding: 20px; border:1px solid #ecc74d;">
              <div class="col-md-12">
                <img src="img/home_welcome.png" alt="MDA logo" style="width: inherit;height: 80px;">
                <p>&nbsp;</p> 
            <h4 style="align:center;">
                <?php 
                    
                    if(isset($_POST['btnLogin']))
                    {
                      $message = "Access Denied, Invalid email or password";    
                      echo "<div class='formError' >$message</div>";
                    }
                    else
                    {
                      $message = "Enter your email and password";
                      echo "<div class='formError' >$message</div>";
                    }
                ?>
            </h4> 
                <div class="form" id="form">
                  <form action="index.php" method="post" role="form" class="myForm " name="myForm" >    
                    <div class="col-md-12 formError" id="showMessage" ></div>                  
                      <div class="form-group">
                        <input type="email" name="email"  class="form-control" id="email" placeholder="email" data-rule="minlen:4" autocomplete="off"/>
                        <div class="validation"></div>
                      </div>
                    <div class="form-group">
                        <input type="password" class="form-control"  name="password" id="password" autosave="off" placeholder="********" data-rule="email" />
                        <div class="validation"></div>
                      </div>                                
                      <div class="text-center">
                      <button type="submit" name="btnLogin" id="btnLogin" onclick="checkForm();" style="width: 100%;">LOGIN</button></div>
                      <span></span>
                </form>     
              </div>

              </div>
            </div>              
          </div>
          <div class="col-md-2 col-lg-3"></div>
  
          </div>
        </div>        
      </section>

      <section>
      <div class="row">
  
        

      </div>
      
    </section>
    <script src="extensions/lib/jquery/jquery.min.js"></script>
    <script src="extensions/lib/jquery/jquery-migrate.min.js"></script>
    <script src="extensions/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="extensions/lib/superfish/hoverIntent.js"></script>
    <script src="extensions/lib/superfish/superfish.min.js"></script>
    <script src="extensions/lib/easing/easing.min.js"></script>
    <script src="extensions/lib/modal-video/js/modal-video.js"></script>
    <script src="extensions/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="extensions/lib/wow/wow.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="extensions/contactform/contactform.js"></script>
  
    <!-- Template Main Javascript File -->
    <script src="extensions/js/main.js"></script>
<!-- //User Welcome Message-->