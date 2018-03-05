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
		<link type="text/css" rel="stylesheet" href="./assets/css/bootstrap.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="./assets/css/font-awesome.min.css" media="screen,projection"/>
		<link rel="stylesheet" href="./assets/css/style.css">
    <style media="screen">
      body{
        overflow-x: auto;
      }
    </style>
	</head>
	<body>
		<div class="se-pre-con"></div>

		<!-- The navbar -->
		<nav class="fixed-top navbar navbar-expand-lg navbar-light custom-navbar">
			<a class="navbar-brand" href="index">
				<img src="assets/img/students-hub-logo.png" class="navbar-logo" alt="Logo">
			</a>
			<a class="nav-item custom-nav-item nav-link collapse-icon" href="#" onclick="openSideNav()"><i class="fa fa-navicon"></i></a>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">

				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="posts" class="nav-link">Sell</a></li>
					<li class="nav-item"><a href="#" class="nav-link">Hi <?php echo ucfirst($userFullname); ?></a></li>
				</ul>
			</div>
		</nav>

		<!-- for the side nav -->
		<section id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>
            <a  href="#" ><strong><?php echo $userFullname; ?></strong></a>
            
            <li><a href="index"><i class="fa fa-home"></i> Home</i></a></li>
			<li><a href="dashboard" class="selected"><i class="fa fa-dashboard"></i> My Dashboard</a></li>
			<li><a href="posts"><i class="fa fa-tags"></i> My Posts<i class="allBadge"></i></a></li>
			<li><a href="review"><i class="fa fa-hourglass"></i> Pending Items<i class="badge"></i></a></li>
			<li class="selected-item"><a href="approve"><i class="fa fa-check"></i> Approve Items<i class="appBadge"></i></a></li>
			<li><a href="declined"><i class="fa fa-times"></i> Declined Items<i class="decBadge"></i></a></li>
			<li><a href="profile"><i class="fa fa-user"></i>&nbsp; My Profile</a></li>
			<li><a href="account-setup"><i class="fa fa-cog"></i> Account Settings</a></li>
			<li><a href="logout"><i class="fa fa-sign-out"></i> Logout</a></li>
        </section>

		<!-- this is the snackbar for the page -->
		<section class="snackbar">
			<i class="fa fa-check snackbar-icon-success"></i>
			<i class="fa fa-warning snackbar-icon-error"></i>
			<img src="assets/img/snackbar-loader.gif" class="snackbar-loader">
			<span class="snackbar-text"><b> </b></span><br/>
		</section>


		<section class="container-fluid dashboard-div">
			<section class="row">

				<section class="col-md-2 dashboard-side-div hide-on-med-and-down">
          			<li><a href="index"><i class="fa fa-home"></i> Home</i></a></li>
					<li><a href="dashboard" class="selected"><i class="fa fa-dashboard"></i> My Dashboard</a></li>
					<li><a href="posts"><i class="fa fa-tags"></i> My Posts<i class="allBadge"></i></a></li>
					<li><a href="review"><i class="fa fa-hourglass"></i> Pending Items<i class="badge"></i></a></li>
					<li class="selected-item"><a href="approve"><i class="fa fa-check"></i> Approve Items<i class="appBadge"></i></a></li>
					<li><a href="declined"><i class="fa fa-times"></i> Declined Items<i class="decBadge"></i></a></li>
					<li><a href="profile"><i class="fa fa-user"></i>&nbsp; My Profile</a></li>
					<li><a href="account-setup"><i class="fa fa-cog"></i> Account Settings</a></li>
					<li><a href="logout"><i class="fa fa-sign-out"></i> Logout</a></li>
				</section>

				<section class="col-md-10 col-sm-12">
					<section class="approved-posts"></section>
				</section>

			</section>

		</section>

		<script>
			//function to open the side nav
		    function openSideNav() {
		        document.getElementById("mySidenav").style.width = "100%";
		    }

		    //function to close the side nav
		    function closeSideNav(){
		        document.getElementById("mySidenav").style.width = "0%";
		    }
		</script>



		<!-- Post Item Modal -->




<?php include "includes/footer.inc.php"; ?>
