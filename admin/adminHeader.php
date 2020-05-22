<?php 
	require_once('../includes/initialize.php');
	
	if (!$session->is_logged_in()) { redirect_to_index("../logout.php"); }
	
	$id = $session->user_id;
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

	<!-- css files -->
	<link rel="stylesheet" href="../css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="../css/w3.css"> <!-- W3-CSS -->
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="../css/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

	<!-- //css files -->

	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>
<!-- header -->
<header>
	<div class="container">		
		<nav class="navbar navbar-expand-lg navbar-light">
			<button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mx-auto text-center">
					<li class="nav-item mr-lg-3">
						<a class="nav-link" href="index.php">
							HOME
						</a>
					</li>
					<li class="nav-item dropdown mr-lg-3">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							MAILS
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?pg=m1">Receive New Mail</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=m2">Send Out For Charging</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=m3">Receive Charged Mail</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=m4">File Up Mail</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=m5">Dispatch Mail</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=m6">Search Out Mail</a>
																
						</div>
					</li>
					<li class="nav-item dropdown mr-lg-3">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							FILES
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?pg=f1">Open New File</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=f2">File Movement</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=f3">Archive File</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=f4">Morning List Guide</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=f5">Search Out File</a>												
						</div>
					</li>					
					<li class="nav-item dropdown mr-lg-4">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							LEAVES
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?pg=l1">Apply</a>
							<div class="dropdown-divider"></div>
							<?php	
								$sql = "SELECT * FROM leave_application WHERE status = 'processing' order by date_of_application DESC"; 
								$result = $con->query($sql);
								//echo "<a class='dropdown-item'";
								if ($result->num_rows >= 0){
									$num = $result->num_rows;
									foreach ($result as $i){
										
									}
									//echo $num;
									
							?>
							<a class="dropdown-item" href="index.php?pg=l2&id=<?php echo $i['id'] ?>">Leave Request
								
								<span class="badge badge-light"><?php echo $num; ?></span></a>
								<?php 
									}
								?>
							</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=l3">Leave Roster</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=l4">Leave Status</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=l6">Staff on Leave</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=l7">Get Leave Trend</a>													
						</div>
					</li>					
					<li class="nav-item dropdown mr-lg-3">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							DEPARTMENT
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?pg=d1">Add New Department</a>												
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=d2">Rename Department</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=d3">Delete Old Department</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=d4">Search Out Department</a>															
						</div>
					</li>
					<li class="nav-item dropdown mr-lg-3">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							PERSONNEL
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?pg=s1">Add New Staff</a>												
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=s2">Disposition List</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=s3">Nominal Roll</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=s4">Search Staff</a>	
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=s5">Add New User</a>													
						</div>
					</li>
					<li class="nav-item dropdown mr-lg-3">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							aria-expanded="false">
							PROFILE
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="index.php?pg=p1">View Profile</a>												
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=p2">Edit profile</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="index.php?pg=p3">Change password</a>																					
						</div>
					</li>					
					<li class="nav-item active mr-lg-3">
						<a class="nav-link" href="../logout.php" style="color:#f00;">
							LOGOUT
						</a>
					</li>					
				</ul>				
			</div>
		</nav>
	</div>
</header>
<!-- //header -->

<hr style="margin-top: 0;" />