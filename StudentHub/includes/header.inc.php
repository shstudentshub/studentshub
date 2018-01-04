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
		<link type="text/css" rel="stylesheet" href="./assets/css/font-awesome.min.css"  media="screen,projection"/>
		<link rel="stylesheet" href="./assets/css/style.css">
	</head>
	<body>
		<!-- Dropdown Structure -->
		<ul id="cat-dropdown1" class="dropdown-content">
			<li><a href="#!">one</a></li>
			<li><a href="#!">two</a></li>
			<li class="divider"></li>
			<li><a href="#!">three</a></li>
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
							<a>
								<input id="search" type="search" placeholder=" &#128270; Search for items">
							</a>
						</li>
						<li class="hide-on-med-and-down">
							<a class="dropdown-trigger" href="#!" data-activates="cat-dropdown1">Categories <i class="fa fa-chevron-down"></i></a>
						</li>
						<li><a href="#">Sell</a></li>
						<li><a href="#signin-modal" class="modal-trigger">Sign In</a></li>
						<li><a href="#signup-modal" class="modal-trigger">Sign Up</a></li>
						<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
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
		<div class="search-div">
			<div class="input-field hide-on-large-only">
				<input id="search" type="search" placeholder=" &#128270; Search for items" required>
				<label class="label-icon" for="search"></label>
			</div>
		</div>

		<!-- Modals for login and signup -->
		<!-- Sign up modal -->
		<section id="signup-modal" class="modal">
			<section class="modal-content">
				<h4>Create Your Students Hub Account</h4>
				<p>This is the sign up modal</p>
			</section>
			<section class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			</section>
		</section>

		<!-- Sign in modal -->
		<section id="signin-modal" class="modal">
			<section class="modal-content">
				<h4>Log In To Your Students Hub Account</h4>
				<p>This is the Log In modal</p>
			</section>
			<section class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
			</section>
		</section>