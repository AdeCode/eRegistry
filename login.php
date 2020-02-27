<?php require_once("includes/initialize.php"); ?>

<?php
// Remember to give your form's submit tag a name="btnLogin" attribute!
$message = "";

if (isset($_POST['btnLogin'])) // Form has been submitted.
{ 
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);
  $login_type = "member";
  
  // Check database to see if username/password exist.
  $found_user = User::authenticate($email, $password, $login_type);
	
  if ($found_user) 
  {
	if($found_user->status == "active")
	{
      $session->login($found_user);
      $as_what = "{$found_user->email} logged in as " . $found_user->role;
	  log_action('Login', $as_what);
	
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
{ // Form has not been submitted.
  $email = "";
  $password = "";
}

redirect_to_index("index.php");
?>