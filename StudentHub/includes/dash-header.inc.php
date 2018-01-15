<?php 
	include "api/db-config.php";
	session_start();
	$userLoggedIn = false;
	if (!isset($_SESSION["userId"])) {
		echo "<script>window.location.href = 'index.php';</script>";
	} else if (isset($_SESSION["userId"])) {
		$userLoggedIn = true;
		$userId = intval($_SESSION["userId"]);

		#get the detail of the current user
		$requestQuery = "SELECT * FROM users WHERE user_id  = ?";
		$preparedQuery = $database->prepare($requestQuery);
		$preparedQuery->bind_param('i',$userId);
		$preparedQuery->execute();
		$result = $preparedQuery->get_result();

		$row = $result->fetch_assoc();
		$userFullname = $row["user_name"];
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Students Hub | The Total Student Shopping Experience</title>
		<link rel="shortcut icon" href="assets/img/students-hub-logo.png" type="image/x-icon">
      	<meta name="keywords" content="">
  		<meta name="description" content="">
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="./assets/css/materialize.css"  media="screen,projection"/>
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="./assets/css/font-awesome.min.css" media="screen,projection"/>
		<link rel="stylesheet" href="./assets/css/style.css">
	</head>
	<body>
		<div class="se-pre-con"></div>

		<!-- The navbar -->
		<section class="navbar-fixed">
			<nav class="custom-navbar">
				<section class="nav-wrapper">
					<a class="hide-on-med-and-down">
						<img src="assets/img/students-hub-logo.png" class="navbar-logo" alt="Logo">
					</a>

					<ul class="right">
						<li><a href="dashboard.php"><?php echo $userFullname; ?></a></li>
					</ul>

					<ul class="side-nav" id="nav-mobile">
						<section class="side-nav-profile-div">
							<h5 class="side-nav-profile-name">Dashoard</h5>
						</section>
						<li><a href="#">My Adds</a></li>
						<li><a href="#">My Profile</a></li>
						<li><a href="#">Account Setup</a></li>
						<li><a href="#">Logout</a></li>
					</ul>

					<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="fa fa-navicon"></i></a>
				</section>
			</nav>
		</section>

		<!-- this is the snackbar for the page -->
		<section class="snackbar">
			<i class="fa fa-check snackbar-icon-success"></i>
			<i class="fa fa-warning snackbar-icon-error"></i>
			<img src="assets/img/snackbar-loader.gif" class="snackbar-loader">
			<span class="snackbar-text"><b> </b></span><br/>
		</section>
