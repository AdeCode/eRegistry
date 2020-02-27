<?php
// Remember to give your form's submit tag a name="btnLogin" attribute!
$message = "";

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

<!-- User Welcome Message-->
<section class="w3-row w3-padding">
    <!-- Left Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>

    <!-- Welcome Image -->
    <div class=" w3-round-large w3-border-orange w3-col l4">
        <div class="w3-margin w3-text-dark-gray" style="min-height: 200px;">
            <img src="./img/home_wecme.png" alt="MDA logo"> 
            <p>&nbsp;</p> 
            <h4 align="center">
                <?php 
                    if(isset($_POST['btLogin']))
                    {
                        echo "Access Denied";    
                    }
                    else
                    {
                        echo "Login Section";
                    }
                ?>
            </h4> 
            <form class="w3-container" action="index.php" method="post">                
                <input class="w3-input" type="email" placeholder="Email" name="email" required="required" autocomplete="off">
                <input class="w3-input" type="password" placeholder="Password" name="password" required="required" autosave="off">
                <br />
                <center><input type="submit" name="btnLogin" value="Sign in" class="btn-success w3-btn w3-black w3-round w3-hover-orange w3-hover-text-white"></center>
            </form>                         
        </div>
    </div> 


    <!-- Right Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>
</section>
<section class="w3-row w3-padding w3-hide-large" style="background:#fff;">&nbsp;</section>
<!-- //User Welcome Message-->