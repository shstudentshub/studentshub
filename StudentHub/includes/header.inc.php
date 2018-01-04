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
								<input id="search" type="search" placeholder=" &#128270; Search for items" class="search">
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
		<div class="search-sm-div">
			<div class="input-field hide-on-large-only">
				<input id="search" type="search" placeholder=" &#128270; Search for items" required class="search-sm">
			</div>
		</div>

		<!-- Modals for login and signup -->
		<!-- Sign up modal -->
		<section id="signup-modal" class="modal">
			<section class="modal-content">
				<section class="row">
					<section class="col s12 m2 l2"></section>
					<section class="col s12 m8 l8">

						<img src="assets/img/students-hub-logo.png" class="form-logo" alt="Logo">
						<h4 class="center-align">Account Setup</h4>
						<p class="center-align">Fill &amp; Submit The Form To Sign Up</p>
						<br/>

						<form method="post" class="user-form" accept-charset="utf-8">
							<section class="row">
						        <section class="input-field col s12">
						          <input  type="text" class="validate" placeholder="Full Name" required>
						        </section>
						    </section>

						    <section class="row">
						        <section class="input-field col s12">
						          <input type="tel" class="validate" placeholder="Contact Number" required>
						        </section>
						    </section>

						    <section class="row">
						        <section class="input-field col s12">
						          <input type="email" class="validate" placeholder="Email Address" required>
						        </section>
						    </section>

						    <section class="row">
						        <section class="input-field col s12">
						          <input type="password" class="validate" placeholder="Password" required>
						        </section>
						    </section>

						    <section class="row btn-div">
						    	<section class="col s4">
						    		<button class="btn" type="submit" name="action">Sign Up</button>
						    	</section>

						    	<section class="col s3">
						    		<button class="btn" type="reset" name="action">Clear</button>
						    	</section>

						    	<section class="col s4">
						    		<button type="button" class="btn modal-action modal-close">Cancel</button>
						    	</section>
						    </section>

						</form>
					</section>
					<section class="col s12 m2 l2"></section>
				</section>
			</section>
		</section>

		<!-- Sign in modal -->
		<section id="signin-modal" class="modal">
			<section class="modal-content">

				<section class="row">
					<section class="col s12 m3 l3"></section>
					<section class="col s12 m6 l6">

						<img src="assets/img/students-hub-logo.png" class="form-logo" alt="Logo">
						<h4 class="center-align">Account Login</h4>
						<p class="center-align">Enter Your Email And Password To Login</p>
						<br/>

						<form method="post" class="user-form" accept-charset="utf-8">
							<section class="row">
						        <section class="input-field col s12">
						          <input id="login-email" type="email" class="validate" placeholder="Email Address" required>
						        </section>
						    </section>

						    <section class="row">
						        <section class="input-field col s12">
						          <input id="login-password" type="password" class="validate" placeholder="Password" required>
						        </section>
						    </section>

						    <section class="row btn-div">
						    	<section class="col s4">
						    		<button class="btn" type="submit" name="action">Sign Up</button>
						    	</section>

						    	<section class="col s3">
						    		<button class="btn" type="reset" name="action">Clear</button>
						    	</section>

						    	<section class="col s4">
						    		<button type="button" class="btn modal-action modal-close">Cancel</button>
						    	</section>
						    </section>

						</form>
					</section>
					<section class="col s12 m3 l3"></section>
				</section>

			</section>
		</section>
