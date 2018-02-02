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
			<nav class="custom-navbar custom-search">
				<section class="nav-wrapper">
					<a class="hide-on-med-and-down logo-container brand-logo">
						HuB
					</a>

					<ul class="right custom-right">
						<li class="hide-on-med-and-down">
							<section class="row">
								<section class="input-field col s9 m9">
								  <a>
									<input id="search" type="search" class="search"  placeholder="Search for items...">
								  </a>
								</section>
								<section class="input-field col s3 m3">
									<button type="submit" class="btn3 custom-btn2">Search</button>
								</section>
							</section>
						</li>
						<li class="hide-on-med-and-down">
							<!-- <a class="dropdown-trigger" href="#!" data-activates="cat-dropdown1">Categories <i class="fa fa-chevron-down"></i></a> -->
						</li>
						<li><a href="#signin-modal" class="modal-trigger">Sign In</a></li>
						<li><a href="#signup-modal" class="modal-trigger">Sign Up</a></li>
						<li><a href="#"><i class="tiny material-icons">cart</i></a></li>
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

		<!-- Fixed Search bar for mobile viewport -->
		<div class="row search-sm-div search-mobile hide-on-large-only">
			<div class= "col s12 wrapme ">
				<input id="mb-search" type="search" placeholder=" &#128270; Search for items" required class="search-sm">
				<button type="submit" class="btn2 custon-btn1">Search</button>
			</div>
		</div>
		<section class="row main-row">

			<!--SideBar-->
			<section class="col m2 12 side-div hide-on-med-and-down">
				<h4 class="search-align"><u>Side Div</u></h4>
				<section class="row search-align">
					<ul>
						<li>Some list items</li>
						<li>Some list items</li>
						<li>Some list items</li>
						<li>Some list items</li>
						<li>Some list items</li>
						<li>Some list items</li>
					</ul>
				</section>

				<section class="search-aligh-top search-align">
					<ul>
						<li>Some Adverts</li>
						<li>Some Adverts</li>
						<li>Some Adverts</li>
						<li>Some Adverts</li>
						<li>Some Adverts</li>
						<li>Some Adverts</li>
					</ul>
				</section>

				<section class="search-aligh-top search-align">
					<ul>
						<li>Get Coupon</li>

					</ul>
				</section>
			</section>

			<section class="col m10 110 content-div search-content-div">
				<h4 style="text-align:center;">Content of search comes here</h4>
				<section class="row">
					<section class="center animated-box">
						<div class="preloader-wrapper big active">
					      <div class="spinner-layer spinner-blue-only">
					        <div class="circle-clipper left">
					          <div class="circle"></div>
					        </div><div class="gap-patch">
					          <div class="circle"></div>
					        </div><div class="circle-clipper right">
					          <div class="circle"></div>
					        </div>
					      </div>
				        </div>
					</section>
				</section>
				<section class="row search-aligh-big-down">
					<h6><b>People who search this items also viewed this</b></h6>
					<section class="col m2 l2 s12">
			            <a href="" title="View Item">
			                <section class=" item-viewed">
			                    <img src="assets/img/placeholder-1.png">
			                    <p class="center-align"><i class="fa fa-eye-open"></i>View Item Details</p>
			                </section>
			            </a>
       				 </section>
       				 <section class="col m2 l2 s12">
			            <a href="" title="View Item">
			                <section class="item-viewed">
			                    <img src="assets/img/placeholder-1.png">
			                    <p class="center-align"><i class="fa fa-eye-open"></i>View Item Details</p>
			                </section>
			            </a>
       				 </section>
       				 <section class="col m2 l2 s12">
			            <a href="" title="View Item">
			                <section class=" item-viewed">
			                    <img src="assets/img/placeholder-1.png">
			                    <p class="center-align"><i class="fa fa-eye-open"></i>View Item Details</p>
			                </section>
			            </a>
       				 </section>
       				 <section class="col m2 l2 s12">
			            <a href="" title="View Item">
			                <section class=" item-viewed">
			                    <img src="assets/img/placeholder-1.png">
			                    <p class="center-align"><i class="fa fa-eye-open"></i>View Item Details</p>
			                </section>
			            </a>
       				 </section>
       				 <section class="col m2 l2 s12">
			            <a href="" title="View Item">
			                <section class=" item-viewed">
			                    <img src="assets/img/placeholder-1.png">
			                    <p class="center-align"><i class="fa fa-eye-open"></i>View Item Details</p>
			                </section>
			            </a>
       				 </section>
       				 <section class="col m2 l2 s12">
			            <a href="" title="View Item">
			                <section class=" item-viewed">
			                    <img src="assets/img/placeholder-1.png">
			                    <p class="center-align"><i class="fa fa-eye-open"></i>View Item Details</p>
			                </section>
			            </a>
       				 </section>
				</section>
			</section>
		</section>

		<hr>

        <p class="center-align footer-cr">Students Hub &copy; <?php echo date('Y'); ?>. All Rights Reserved.</p>

			<script type="text/javascript" src="./assets/js/jquery-2.2.4.min.js"></script>
	        <script type="text/javascript" src="./assets/js/modernizr.js"></script>
	        <script type="text/javascript" src="./assets/js/materialize.min.js"></script>
	        <script type="text/javascript" src="./assets/js/chart.min.js"></script>
	        <script type="text/javascript" src="./assets/js/init.js"></script>
	        <script type="text/javascript" src="./assets/js/controller.js"></script>
		</body>
	</html>
