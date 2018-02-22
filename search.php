<?php
	if (isset($_GET['q'])) {
		$query = $_GET['q'];
	} else {
		$query = "";
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
			<nav class="custom-navbar custom-search">
				<section class="nav-wrapper">
					<a href="index" class="hide-on-med-and-down logo-container brand-logo">
						HuB
					</a>

					<ul class="right custom-right">
						<li class="hide-on-med-and-down">
							<section class="row">
								<section class="input-field col s9 m9">
								  <a>
									<input id="search" value="<?php echo $query ?>" type="search" class="search main-search"  placeholder="Search for items...">
								  </a>
								</section>
								<section class="input-field col s3 m3">
									<button type="submit" class="btn3 custom-btn2">Search</button>
								</section>
							</section>
						</li>

					</ul>
					<ul class="side-nav" id="nav-mobile">
						<li><a href="index">HOME</a></li>
						<li><a>CATEGORIES</a></li><hr>

						<section class="row search-align">
							<ul class="search-categories"></ul>
						</section>
					</ul>
					<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="fa fa-navicon"></i></a>
				</section>
			</nav>
		</section>

		<!-- Fixed Search bar for mobile viewport -->
		<div class="row search-sm-div search-mobile hide-on-large-only">
			<div class= "col s12 wrapme ">
				<input id="mb-search" type="search" value="<?php echo $query ?>" placeholder=" &#128270; Search for items" required class="search-sm main-search">
				<button type="submit" class="btn2 custon-btn1">Search</button>
			</div>
		</div>
		<section class="row main-row">

			<!--SideBar-->
			<section class="col m2 12 side-div hide-on-med-and-down">
				<h5 class="search-align"><u>Categories</u></h5>
				<section class="row search-align">
					<ul class="search-categories"></ul>
				</section>
			</section>

			<section class="col m10 110 content-div search-content-div">
				<section class="row search-res">
					<!--<img src='assets/img/loader.gif' height='50px' width='50px' style='margin-left: 40%;'>-->
				</section>
			</section>
		</section>

		<!-- <hr> -->

        <!-- <p class="center-align footer-cr">Students Hub &copy; <?php echo date('Y'); ?>. All Rights Reserved.</p> -->

			<script type="text/javascript" src="./assets/js/jquery-2.2.4.min.js"></script>
	        <script type="text/javascript" src="./assets/js/modernizr.js"></script>
	        <script type="text/javascript" src="./assets/js/materialize.min.js"></script>
	        <script type="text/javascript" src="./assets/js/chart.min.js"></script>
	        <script type="text/javascript" src="./assets/js/init.js"></script>
	        <script type="text/javascript" src="./assets/js/search-controller.js"></script>
	        <?php if (isset($_GET['q'])) { ?>
	        	<script>
	        		var data = $.param({
						query:'<?php echo $_GET['q']; ?>'
					});

					$.post(SEARCH_CONSTANTS.getSearchResultsUrl,data, function(response) {
						$(".search-res").html(response)
					})
	        	</script>
	       	<?php } ?>

		</body>
	</html>
