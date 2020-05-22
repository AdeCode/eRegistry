<?php 
	require_once('../includes/initialize.php');
	
	if (!$session->is_logged_in()) { redirect_to_index("../logout.php"); }
	
	$id = $session->user_id;
	//$email = $session->email;
	$userRecord = User::find_by_id($id);
	$loggedId = $_SESSION['holdId'];
	/*$fullName = $userRecord->full_name();
	$picture = "../images/users/" . $userRecord->picture();*/
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "e_registry_sita2019";
	$con = new mysqli($servername, $username, $password, $dbname);
	if (!$con){
		die("Error".mysqli_connect_error());
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>E-REGISTRY | Admin Section</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Ondo State E-Registry" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
	<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon.png">

	<link href="../extensions/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../extensions/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="../extensions/lib/owlcarousel/assets/owl.theme.default.min.css" rel="stylesheet">
	<link href="../extensions/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="../extensions/lib/animate/animate.min.css" rel="stylesheet">
	<link href="../extensions/lib/modal-video/css/modal-video.min.css" rel="stylesheet">
	<link href="../extensions/css/bootstrap.min.css" rel="stylesheet">

	<!-- css files -->
	<link rel="stylesheet" href="../css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="../css/w3.css"> <!-- W3-CSS -->
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="../css/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

	<link href="../extensions/css/style.css" rel="stylesheet"> 
	<!-- //css files -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>
<!-- header -->
<header id="header" class="header header-hide scroll-header">
        <div class="container">
       
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li class="menu-active"><a href="index.php">HOME</a></li>
              <li><a href="#about-us">MAILS</a>
                <ul>
                  <li><a href="index.php?pg=m1">Receive new mail</a></li>
                  <li><a href="index.php?pg=m2">Charge Mail</a></li>
                  <li><a href="index.php?pg=m3">Receive Charged Mail</a></li>
                  <li><a href="index.php?pg=m4">File Up Mail</a></li>
                  <li><a href="index.php?pg=m5">Dispatch Mail</a></li>
				  <li><a href="index.php?pg=m6">Search Mail</a></li>
				  <li><a href="index.php?pg=m7">Receive Mail</a></li>
                </ul>
              </li>

              <li><a href="#features">FILES</a>
                <ul>
                  <li><a href="index.php?pg=f1">Open New File</a></li>
                  <li><a href="index.php?pg=f2">File Movement</a></li>
                  <li><a href="index.php?pg=f3">Archive File</a></li>
                  <li><a href="index.php?pg=f4">Morning List Guide</a></li>
                  <li><a href="index.php?pg=f5">Search Out File</a></li>
                </ul>
              </li>
              <li><a href="#screenshots">LEAVES</a>
                <ul>    
                  <li><a href="index.php?pg=l1">Apply</a></li>
				  <?php	
					$sql = "SELECT * FROM leave_application WHERE status = 'processing' order by date_of_application DESC"; 
					$result = $con->query($sql);
					//echo "<a class='dropdown-item'";
					if ($result->num_rows >= 0){
						$num = $result->num_rows;
						foreach ($result as $i){
								
						}								
					?>		
				  <li><a href="index.php?pg=l2&id=<?php echo $i['id'] ?>">Leave Request
				  	<span class="badge badge-light" ><?php echo $num; ?></span></a>
						<?php 
							}
						?>
				  </a></li>
                  <li><a href="index.php?pg=l3">Leave Roster</a></li>
                  <li><a href="index.php?pg=l4">Leave Status</a></li>
				  <li><a href="index.php?pg=l6">Staff on Leave</a></li>
                  <li><a href="index.php?pg=l7">Get Leave Trend</a></li>
                </ul>
              </li>
              <li><a href="#team">DEPARTMENT</a>
                <ul>    
                  <li><a href="index.php?pg=d1">Add Department</a></li>
                  <li><a href="index.php?pg=d2">Rename Department</a></li>
                  <li><a href="index.php?pg=d3">Delete Department</a></li>
                  <li><a href="index.php?pg=d4">Search Department</a></li>
                </ul>
              </li>
			  <li><a href="#team">PERSONNEL</a>
                <ul>    
                  <li><a href="index.php?pg=s1">Add New Staff</a></li>
                  <li><a href="index.php?pg=s2">Disposition List</a></li>
                  <li><a href="index.php?pg=s3">Nominal Roll</a></li>
                  <li><a href="index.php?pg=s4">Search Staff</a></li>
				  <li><a href="index.php?pg=s5">Add New User</a></li>
                </ul>
              </li>
              <li><a href="#pricing">PROFILE</a>
                <ul>    
                  <li><a href="index.php?pg=p1">View Profile</a></li>
                  <li><a href="index.php?pg=p2">Edit Profile</a></li>
                  <li><a href="index.php?pg=p3">Change Password</a></li>
                </ul>
              </li>
                <li ><a href="../logout.php" style="color:red;">LOGOUT</a></li>
            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
	</header><!-- #header -->
	

	
