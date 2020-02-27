<?php

function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $page = NULL ) {
  if ($page != NULL) 
  {
	$location = "./" . $page;
    header("Location: {$location}");
    exit;
  }
}

function redirect_to_index( $page = NULL ) {
  if ($page != NULL) 
  {
    header("Location: {$page}");
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) { 
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

function __autoload($class_name) {
	$class_name = strtolower($class_name);
  $path = LIB_PATH.DS."{$class_name}.php";
  if(file_exists($path)) {
    require_once($path);
  } else {
		die("The file {$class_name}.php could not be found.");
	}
}

function include_layout_template($template="") {
	//include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);
	include($template);
}

function log_action($action, $message="") 
{
  $logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
  $new = file_exists($logfile) ? false : true;
  
  if($handle = fopen($logfile, 'a')) 
  { // append
    $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
		$content = "{$timestamp} | {$action}: {$message}\n\r";
    fwrite($handle, $content);
    fclose($handle);
	
    if($new) 
  	{ 
  	  chmod($logfile, 0755); 
  	}
  } 
  else 
  {
    echo "Could not open log file for writing.";
  }
}

function datetime_to_text($datetime="") 
{
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}


function directToRightPage($role)
{
  if($role == "admin")
  { 
	   redirect_to("admin/index.php");
  }
  elseif($role == "users")
  { 
     redirect_to("u23s07e19r84s/index.php");
  }
  else
  {
      redirect_to("index.php");
  }
}

function selectRole($email, $password){
	$con = mysqli_connect('localhost','root',"",'e_registry_sita2019');
	$sql = "select * from users where email = '$email' and password = '$password' ";
	$result = mysqli_query($con,$sql);
	if ($result !=false){
		foreach ($result as $i){
			$login_type = $i['role'];
		}
	}
}

function getLeaveDays($level)
{
  $assignedLeaveDays = 0;
  if ($level >= 8){
    $assignedLeaveDays = 30;
  }elseif($level >= 1 && $level < 8){
    $assignedLeaveDays = 20;
  }
  return $assignedLeaveDays;
}

function checkLeaveDaysLeft($daysTaken,$assignedLeaveDays){
	//$assignedLeaveDays=getLeaveDays($level);
	$daysLeft=0;
	if ($daysTaken == 0 || $daysTaken < $assignedLeaveDays){
		$daysLeft = $assignedLeaveDays - $daysTaken;
		return $daysLeft;		
	}
}

function getNumberOfDays($startDate,$endDate){
	
}
function multi($first, $second){
	echo $first * $second;
}

function removeWeekends($day, $leaveDays){
	if ($day == "Saturday" ){
		$leaveDays -= 1;
	}
	if($day == "Sunday"){
		$leaveDays -= 1;
	}
	return $leaveDays;
}

?>