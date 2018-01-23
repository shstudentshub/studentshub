<?php 
	include "api/db-config.php";
	session_start();
	$userLoggedIn = false;

	if (isset($_SESSION["userId"])) {
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
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="./assets/css/font-awesome.min.css" media="screen,projection"/>
		<link rel="stylesheet" href="./assets/css/style.css">
	</head>
	<body>
		<div class="se-pre-con"></div>

		<!-- User DropDown -->
		<ul id="user-dropdown" class="dropdown-content">
			<li><a href="#!">Account</a></li>
			<li><a href="#!">Need Help?</a></li>
			<li class="divider"></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>

		<!-- The navbar -->
		<section class="navbar-fixed">
			<nav class="custom-navbar">
				<section class="nav-wrapper">
					<a class="hide-on-med-and-down">
						<img src="assets/img/students-hub-logo.png" class="navbar-logo" alt="Logo">
					</a>

					<ul class="right">
						<li class="hide-on-med-and-down">
							<section class="row">
								<section class="input-field col s9 m9">
								  <a>
									<input id="search" type="search" class="search"  placeholder="Search for items">
								  </a>
								</section>
								<section class="input-field col s3 m3">
									<button type="submit" class="btn1 custom-btn2">Search</button>
								</section>
							</section>
						</li>
						<li class="hide-on-med-and-down">
							<!-- <a class="dropdown-trigger" href="#!" data-activates="cat-dropdown1">Categories <i class="fa fa-chevron-down"></i></a> -->
						</li>
						
						<?php 
							if (!$userLoggedIn) { ?>

						<li><a href="#signin-modal" class="modal-trigger">Sell</a></li>
						<li><a href="#signin-modal" class="modal-trigger">Sign In</a></li>
						<li><a href="#signup-modal" class="modal-trigger">Sign Up</a></li>

						<?php 
							} else if ($userLoggedIn) { ?>
								<li><a href="dashboard.php">Dashboard</a></li>
								<li><a class="dropdown-trigger" href="#!" data-activates="user-dropdown"><?php echo $userFullname; ?> <i class="fa fa-chevron-down"></i></a></li>

						<?php } ?>
					</ul>
					<ul class="side-nav" id="nav-mobile">
						<section class="side-nav-profile-div">
							<img src="assets/img/profile-placeholder.jpg" class="side-nav-profile-img" alt="Logo">
							<span class="side-nav-profile-name">User Name</span>
						</section>
						<li><a href="#">Some links</a></li>
						<li><a href="#">Some links</a></li>
						<li><a href="#">Some links</a></li>
					</ul>
					<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="fa fa-navicon"></i></a>
				</section>
			</nav>
		</section>

		<!-- Search box for mobile viewport only -->
		<div class="search-sm-div">
			<div class= "wrapme hide-on-large-only">
				<input id="mb-search" type="search" placeholder=" &#128270; Search for items" required class="search-sm">
				<button type="submit" class="btn1 custom-btn2">Search</button>
			</div>
		</div>

		<!-- Modals for login and signup -->
		<!-- Sign up modal -->
		<section id="signup-modal" class="modal signup-modal">
			<section class="modal-content">
				<section class="row">
					<section class="col s12 m2 l2"></section>
					<section class="col s12 m8 l8">

						<img src="assets/img/students-hub-logo.png" class="form-logo" alt="Logo">
						<h4 class="center-align">Account Setup</h4>
						<p class="center-align">Fill &amp; Submit The Form To Sign Up</p>
						<br/>

						<form method="post" class="user-form user-signup-form" accept-charset="utf-8">
							<section class="row">
						        <section class="input-field col s12">
						          <input  type="text" class="validate user-signup-fullname" placeholder="Full Name" required>						        
						      	</section>
						    </section>

						    <section class="row">
						        <section class="input-field col s12">
						          <input type="tel" class="validate user-signup-contact" placeholder="Contact Number" required>
						        </section>
						    </section>

						    <section class="row">
						        <section class="input-field col s12">
						          <input type="email" class="validate user-signup-email" placeholder="Email Address" required>
						        </section>
						    </section>

						    <section class="row">
						        <section class="input-field col s12">
						          <input type="password" class="validate user-signup-password" placeholder="Password" required>
						        </section>
						    </section>

						    <section class="row btn-div">
						    	<section class="col s6">
						    		<button class="btn custom-btn" type="submit" name="action">Sign Up</button>
						    	</section>
						    	<section class="col s6">
						    		<button type="button" class="btn modal-action modal-close custom-btn">Cancel</button>
						    	</section>
						    </section>

						</form>
					</section>
					<section class="col s12 m2 l2"></section>
				</section>
			</section>
		</section>

		<!-- Sign in modal -->
		<section id="signin-modal" class="modal signin-modal">
			<section class="modal-content">

				<section class="row">
					<section class="col s12 m3 l3"></section>
					<section class="col s12 m6 l6">

						<img src="assets/img/students-hub-logo.png" class="form-logo" alt="Logo">
						<h4 class="center-align">Account Login</h4>
						<p class="center-align">Enter Your Email And Password To Login</p>
						<br/>

						<form method="post" class="user-form user-signin-form" accept-charset="utf-8">
							<section class="row">
						        <section class="input-field col s12">
						          <input type="email" class="validate user-signin-email" placeholder="Email Address" required>
						        </section>
						    </section>

						    <section class="row">
						        <section class="input-field col s12">
						          <input type="password" class="validate user-signin-password" placeholder="Password" required>
						        </section>
						    </section>

						    <section class="row btn-div">
						    	<section class="col s6">
						    		<button class="btn custom-btn" type="submit" name="action">Sign In</button>
						    	</section>

						    	<section class="col s6">
						    		<button type="button" class="btn modal-action modal-close custom-btn">Cancel</button>
						    	</section>
						    </section>

						</form>
					</section>
					<section class="col s12 m3 l3"></section>
				</section>

			</section>
		</section>

		<!-- this is the snackbar for the page -->
		<section class="snackbar">
			<i class="fa fa-check snackbar-icon-success"></i>
			<i class="fa fa-warning snackbar-icon-error"></i>
			<img src="assets/img/snackbar-loader.gif" class="snackbar-loader">
			<span class="snackbar-text"><b> </b></span><br/>
		</section>
