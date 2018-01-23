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
						<li><a href="dashboard.php">Hi <?php echo ucfirst($userFullname); ?></a></li>
					</ul>

					<ul class="side-nav dashboard-side-nav-sm" id="nav-mobile">
						<section class="side-nav-profile-div">
							<h5 class="side-nav-profile-name">Dashboard</h5>
						</section>
						<li><a href="dashboard.php">My Dashboard</a></li>
						<li class="selected-item"><a href="posts.php" class="selected">My Posts</a></li>
						<li><a href="review.php">View Pending Review</a></li>
						<li><a href="approve.php">View Approve Review</a></li>
						<li><a href="profile.php">My Profile</a></li>
						<li><a href="account-setup.php">Account Settings</a></li>
						<li><a href="logout.php">Logout</a></li>
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


		<section class="row dashboard-div">
			<section class="row">

				<section class="col m2 l2 dashboard-side-div hide-on-med-and-down">
					<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> My Dashboard</a></li>
					<li class="selected-item"><a href="posts.php" class="selected"><i class="fa fa-tags"></i> My Posts</a></li>
					<li><a href="review.php"><i class="fa fa-tags"></i> View Pending Items</a></li>
					<li><a href="approve.php"><i class="fa fa-tags"></i> View Approve Items</a></li>
					<li><a href="profile.php"><i class="fa fa-user"></i>&nbsp; My Profile</a></li>
					<li><a href="account-setup.php"><i class="fa fa-cog"></i> Account Settings</a></li>
					<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
				</section>

				<section class="col s12 m10 l10">
					<section class="user-posts"></section>
				</section>

			</section>

		</section>

		<section class="fixed-action-btn">
			<a class="btn-large waves-effect waves-light post-fab modal-trigger pulse" href="#modal1"><i class="fa fa-plus"></i></a>
		</section>

		<!-- Post Item Modal -->
		<section id="modal1" class="modal post-item-modal">
		    <div class="modal-content">
		      	<h4 class="center-align">Post Item</h4>
		      	<section class="row">
		      		<form method="post" enctype="multipart/form-data" class="col s12 add-post-form">
		      			<section class="row">
		      				<section class="col s12 m6 l6">
		      					<img src="assets/img/item-img-preview.png" class="post-item-img-preview">
		      				    <input type="file" id="post-item-img" class="post-item-img" accept="image/*"><br/>
		      				    <label for="post-item-img" class="post-item-img-label orange accent-1">Upload Item Photo</label>
		      				</section>
		      			</section>

		      			<section class="row">
			      			<section class="col s12 m12 l12">
			      				<input type="text" class="validate post-item-name" placeholder="Item Name (Title)" required>
			      			</section>
			      		</section><br/>

		      			<section class="row">
			      			<!-- <section class="col s12 m6 l6">
			      				<input type="text" class="validate post-item-details" placeholder="Item Description" required>
			      			</section> -->

			      			<section class="col s12 m6 l6">
			      				<input type="number" class="validate post-item-price" placeholder="Item Price (GH&cent;) e.g 20" step="any" required>
			      			</section>


			      			<section class="col s12 m6 l6">
			      				<input type="text" class="validate post-item-location" placeholder="Item Location" required>
			      			</section>
		      			</section><br><br/>

		      			<section class="row">
			      			<section class="col s12">
			      				<textarea class="validate post-item-details" placeholder="Item Details" required></textarea>
			      			</section>
		      			</section><br/>

		      			<section class="row category-row">
			      			<section class="col s12 m6 l6">
			      				<select class="browser-default item-select post-item-categories" required>
			      				</select>
			      			</section>

			      			<section class="col s12 m6 l6">
			      				<select class="browser-default item-select post-item-price-term" required>
			      					<option selected disabled>Price Term</option>
			      					<option value="fixed">Fixed</option>
			      					<option value="negotiable">Negotiable</option>
			      				</select>
			      			</section>
		      			</section>

		      			<section class="row btn-row">
		      				<section class="col s12 m12 l12">
		      					<button type="submit" class="btn waves-effect waves-light custom-bg">Submit</button>
		      					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		      					<button type="button" class="btn modal-action modal-close waves-effect waves-green teal">Cancel</button>
		      				</section>
		      			</section>
		      		</form>
		      	</section>
		    </section>
		</section>

		<!-- Delete Item Modal -->
		<section id="modal1" class="modal delete-item-modal">
		    <div class="modal-content">
		      	<h4 class="center-align">Delete Item</h4><hr>
		      	<section class="row">
		      		<form method="post" enctype="multipart/form-data" class="col s12 delete-post-form">
		      			<input type="hidden" class="delete-item-id" value="">
		      			<input type="hidden" class="delete-item-img" value="">
		      			<h3 class="center-align">Are You Sure You Want To Delete This Item ?</h3>

			      		<section class="row btn-row">
			      			<section class="col s12 m3 l3"></section>
			      			<section class="col s12 m6 l6">
			      				<button type="submit" class="btn waves-effect waves-light custom-bg">Yes, Delete</button>
			      					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			      				<button type="button" class="btn modal-action modal-close waves-effect waves-green teal">No, Cancel</button>
			      			</section>
			      			<section class="col s12 m3 l3"></section>
			      		</section>
		      		</form>
		      	</section>
		    </section>
		</section>

<?php include "includes/footer.inc.php"; ?>