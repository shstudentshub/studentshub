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
		$userContact = $row["user_contact"];
		$userEmail = $row["user_email"];
    $city = $row["user_city"];
    $country = $row["user-country"];
    $userSignUpdate = $row["user_sign_date"];
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
						<li><a href="index">Home</a></li>
            <li><a href="posts">Sell</a></li>
						<li><a href="#!" onclick="Materialize.toast('You have log in as: <?php echo ucfirst($userFullname);?>', 4000)">Hi <?php echo ucfirst($userFullname); ?></a></li>
					</ul>

					<ul class="side-nav dashboard-side-nav-sm" id="nav-mobile">
						<section class="side-nav-profile-div">
							<h5 class="side-nav-profile-name">Dashboard</h5>
						</section>
            <li><a href="index">Home</a></li>
						<li><a href="dashboard">My Dashboard</a></li>
						<li><a href="posts">My Posts<span class="allBadge"></span></a></li>
						<li><a href="review">View Pending Items<span class="badge"></span></a></li>
						<li><a href="approve">View Approve Items<span class="appBadge"></span></a></li>
						<li><a href="declined">View Declined Items<span class="decBadge"></span></a></li>
						<li class="selected-item"><a href="profile" class="selected">My Profile</a></li>
						<li><a href="account-setup">Account Settings</a></li>
						<li><a href="logout">Logout</a></li>
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
          <li><a href="index"><i class="fa fa-home"></i> Home</i></a></li>
					<li><a href="dashboard" class="selected"><i class="fa fa-dashboard"></i> My Dashboard</a></li>
					<li><a href="posts"><i class="fa fa-tags"></i> My Posts<i class="allBadge"></i></a></li>
					<li><a href="review"><i class="fa fa-hourglass"></i> Pending Items<i class="badge"></i></a></li>
					<li><a href="approve"><i class="fa fa-check"></i> Approve Items<i class="appBadge"></i></a></li>
					<li><a href="declined"><i class="fa fa-times"></i> Declined Items<i class="decBadge"></i></a></li>
					<li class="selected-item"><a href="profile"><i class="fa fa-user"></i>&nbsp; My Profile</a></li>
					<li><a href="account-setup"><i class="fa fa-cog"></i> Account Settings</a></li>
					<li><a href="logout"><i class="fa fa-sign-out"></i> Logout</a></li>
				</section>

				<section class="col s12 m10 l10">
					<section class='row'>
						<section class='col m4 l4'></section>
							<section class='col s12 m4 l4'>
								<section class='user-profile-div'>
									<h4 class='center-align'>User Profile</h4>
									<h1 class='center-align'><i class='fa fa-user'></i></h1>
									<table>
								        <tbody>
								          <tr>
								            <td class='right-align'><b>Full Name</b></td>
								            <td><?php echo $userFullname ?></td>
								          </tr>
								          <tr>
								            <td class='right-align'><b>Contact Number</b></td>
								            <td><?php echo $userContact ?></td>
								          </tr>
								          <tr>
								            <td class='right-align'><b>You sign up on:</b></td>
								            <td><?php echo $userSignUpdate ?></td>
								          </tr>
                          <tr>
								            <td class='right-align'><b>City :</b></td>
								            <td><?php echo $city ?></td>
								          </tr>
                          <tr>
								            <td class='right-align'><b>Country:</b></td>
								            <td><?php echo $country ?></td>
								          </tr>
								        </tbody>
								      </table>
								      <p class='center-align'><a href='account-setup'>Edit Profile</a></p>
								</section>
							</section>
						<section class='col m4 l4'></section>
					</section>
				</section>

			</section>

		</section>

<?php include "includes/footer.inc.php"; ?>
