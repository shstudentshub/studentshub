<?php
	if (isset($_GET['q'])) {
		$query = $_GET['q'];
	} else {
		$query = "";
	}
?>

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
		<link type="text/css" rel="stylesheet" href="assets/css/bootstrap.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="assets/css/font-awesome.min.css" media="screen,projection"/>
		<link rel="stylesheet" href="assets/css/style.css">
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
				<section class="navbar-nav mr-auto">
		            <form class="form-inline">
		                <input id="search" type="search" value="<?php echo $query ?>" class="form-control form-control-sm mr-sm-2 main-search"  placeholder="Search for items or Country">
		                <!-- <button class="btn btn-sm btn-outline-default my-2 my-sm-0" type="submit">Search</button> -->
		            </form>
		        </section>

				<ul class="navbar-nav ml-auto">
					<?php
						if (!$userLoggedIn) { ?>
						<li class="nav-item"><a href="#signin-modal" class="nav-link" data-toggle="modal">Sign In</a></li>
						<li class="nav-item"><a href="#signup-modal" class="nav-link" data-toggle="modal">Sign Up</a></li>
						<?php
						} else if ($userLoggedIn) { ?>
						<li class="nav-item"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
						<li class="nav-item"><a href="posts" class="nav-link">Sell</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?php echo $userFullname; ?>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="account-setup"><small>Account</small></a>
								<a class="dropdown-item" href="logout.php"><small>Logout</small></a>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</nav>
		<section class="search-sm-div hide-on-large-only">
		         <input type="search" value="<?php echo $query ?>" placeholder=" &#128270; Search for items" name="search" class="form-control-sm form-control search-sm main-search">&nbsp;&nbsp;
		         <button class="btn custom-btn1 btn-sm" type="submit">Search</button>
		</section>

		<section id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>
            
            <?php
				if (!$userLoggedIn) { ?>
				<a href="#signin-modal" class="nav-link" data-toggle="modal">Sign In</a>
				<a href="#signup-modal" class="nav-link" data-toggle="modal">Sign Up</a><br>
				<a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><strong>Categories <i class="fa fa-chevron-down"></i></strong></a>
				<div class="collapse" id="collapseExample">
				  <div class="">
				    <ul class="search-categories"></ul>
				  </div>
				</div>
				
				<?php
				} else if ($userLoggedIn) { ?>
				<a  href="#" ><strong><?php echo $userFullname; ?></strong></a><br>
				<a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><strong>Categories <i class="fa fa-chevron-down"></i></strong></a>
				<div class="collapse" id="collapseExample">
				  <div class="">
				    <ul class="search-categories"></ul>
				  </div>
				</div>
				<a href="dashboard.php" class="nav-link">Dashboard</a>
				<a href="posts" class="nav-link">Sell</a>
				<a class="dropdown-item" href="account-setup">Account</a>
				<a class="dropdown-item" href="logout.php">Logout</a>
			<?php } ?>
        </section>

		<section class="container-fluid main-div">
			<section class="row main-row">

			<!--SideBar-->
			<section class="col-md-2 side-div hide-on-med-and-down">
				<h6 class="search-align"><b>Categories</b></h6>
				<section class="row search-align">
					<ul class="search-categories"></ul>
				</section>
			</section>

			<section class="col-md-10 content-div search-content-div">
				<section class="row search-res">
					<!--<img src='assets/img/loader.gif' height='50px' width='50px' style='margin-left: 40%;'>-->
				</section>
			</section>
		</section>
		</section>

		<!-- Modals for login and signup -->
		<!-- Sign up modal -->
		<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				    </div>
				    <div class="modal-body">
				    	<h5 class="text-center">Account Setup</h5>
				        <img src="assets/img/students-hub-logo.png" class="form-logo" alt="Logo">
						<p class="text-center"><small>Fill &amp; Submit The Form To Sign Up</small></p>
						<br/>
						<form method="post" class="user-form user-signup-form" accept-charset="utf-8">
							<section class="row">
								<section class="col-md-1"></section>
								<section class="col-md-10">
									<section class="form-group">
										<input  type="text" class="user-signup-fullname" placeholder="Full Name" required>
									</section><br>

									<section class="form-group">
										<input type="tel" class="user-signup-contact" placeholder="Contact Number" required>
									</section><br>

									<section class="form-group">
										<input type="email" class="user-signup-email" placeholder="Email Address" required>
									</section><br>

									<section class="form-group">
										<input type="password" class="user-signup-password" placeholder="Password" required>
									</section>
									<button type="submit" class="btn btn-primary">Signup</button>
				        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								</section>
								<section class="col-md-1"></section>
							</section>
						</form>
				    </div>
				    <div class="modal-footer">
				        
				    </div>
			    </div>
			</div>
		</div>

<!-- Sign in modal -->
		<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				    </div>
				    <div class="modal-body">
				    	<h5 class="text-center">Account Login</h5>
				        <img src="assets/img/students-hub-logo.png" class="form-logo" alt="Logo">
						<p class="text-center"><small>Enter Your Email And Password To Sign In</small></p>
						<br/>
						<form method="post" class="user-form user-signin-form" accept-charset="utf-8">
							<section class="row">
								<section class="col-md-1"></section>
								<section class="col-md-10">

									<section class="form-group">
										<input type="email" class="user-signin-email" placeholder="Email Address" required>
									</section><br>

									<section class="form-group">
										<input type="password" class="user-signin-password" placeholder="Password" required>
									</section><br>
									<button type="submit" class="btn btn-primary">Login</button>
				        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
								</section>
								<section class="col-md-1"></section>
							</section>
						</form>
				    </div>
				    <div class="modal-footer">
				        
				    </div>
			    </div>
			</div>
		</div>

		<!-- this is the snackbar for the page -->
		<section class="snackbar">
			<i class="fa fa-check snackbar-icon-success"></i>
			<i class="fa fa-warning snackbar-icon-error"></i>
			<img src="assets/img/snackbar-loader.gif" class="snackbar-loader">
			<span class="snackbar-text"><b> </b></span><br/>
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

			<script type="text/javascript" src="./assets/js/jquery-2.2.4.min.js"></script>
	        <script type="text/javascript" src="./assets/js/modernizr.js"></script>
	        <script type="text/javascript" src="./assets/js/popper.min.js"></script>
	        <script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
	        <script type="text/javascript" src="./assets/js/chart.min.js"></script>
	        <script type="text/javascript" src="./assets/js/init.js"></script>
	        <script type="text/javascript" src="./assets/js/controller.js"></script>
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

	
