<!DOCTYPE html>
<html>
	<head>
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="./assets/css/materialize.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="./assets/css/bootstrap.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="./assets/css/font-awesome.min.css"  media="screen,projection"/>
		<link rel="stylesheet" href="./assets/css/style.css">

	</head>
	<body>
		<section class="navbar-fixed">
			<nav class="custom-navbar">
				<section class="nav-wrapper">
					<a href="#" class="hide-on-med-and-down">
						<img src="assets/img/students-hub-logo.png" class="navbar-logo" alt="Logo">
					</a>
					<ul class="right">
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
    <!-- Menu category-->
    <div class="category-nav hide-on-med-and-down">
      <ul>
        <li><a href="#">Some links</a></li>
        <li><a href="#">Some links</a></li>
        <li><a href="#">Some links</a></li>
        <li><a href="#">Some links</a></li>
        <li><a href="#">Some links</a></li>
        <li><a href="#">Some links</a></li>
        <li><a href="#">Some links</a></li>
        <li><a href="#">Some links</a></li>
        <li><a href="#">Some links</a></li>
      </ul>
    </div>

    <!-- Search box for mobile viewport only -->
    <div class="section">
      <div class="input-field hide-on-large-only">
        <input id="search" type="search" placeholder="Search for items" required>
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
