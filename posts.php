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
			<li><a href="dashboard"><i class="fa fa-dashboard"></i> My Dashboard</a></li>
			<li class="selected-item"><a href="posts"><i class="fa fa-tags" class="selected"></i> My Posts<i class="allBadge"></i></a></li>
			<li><a href="review"><i class="fa fa-hourglass"></i> Pending Items<i class="badge"></i></a></li>
			<li><a href="approve"><i class="fa fa-check"></i> Approve Items<i class="appBadge"></i></a></li>
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
					<li class="selected-item"><a href="posts"><i class="fa fa-tags"></i> My Posts<i class="allBadge"></i></a></li>
					<li><a href="review"><i class="fa fa-hourglass"></i> Pending Items<i class="badge"></i></a></li>
					<li><a href="approve"><i class="fa fa-check"></i> Approve Items<i class="appBadge"></i></a></li>
					<li><a href="declined"><i class="fa fa-times"></i> Declined Items<i class="decBadge"></i></a></li>
					<li><a href="profile"><i class="fa fa-user"></i>&nbsp; My Profile</a></li>
					<li><a href="account-setup"><i class="fa fa-cog"></i> Account Settings</a></li>
					<li><a href="logout"><i class="fa fa-sign-out"></i> Logout</a></li>
				</section>

				<section class="col-md-10 col-sm-12">
					<section class="user-posts"></section>
				</section>

			</section>
		</section>

		<section class="fixed-action-btn">
			<button class="btn btn-large post-item-fab custom-btn rounded-circle" data-target="#add-post-modal" data-toggle="modal"><i class="fa fa-plus"></i></button>
		</section>

		<!-- Post Item Modal -->
		<div class="modal fade" id="add-post-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				    </div>
				    <div class="modal-body">
				    	<h5 class="text-center">Post Item</h5>
						<form method="post" class="add-post-form" accept-charset="utf-8">
							<section class="row">
								<section class="col-md-6 col-xs-12">
									<!-- <img src="assets/img/item-img-preview.png" class="post-item-img-preview"> -->
		      				        <input type="file" id="post-item-img" name="files[]" class="post-item-img" accept="image/*" multiple>
		      				        <label for="post-item-img" class="post-item-img-label bg-info">Upload Item Photo</label>
								</section>
							</section><br>

							<section class="row">
			      				<section class="col col-xs-12">
			      					<label>Item Name</label>
			      					<input type="text" class="form-control form-control-sm post-item-name" placeholder="Enter Item Name (Title)" required>
			      				</section>

			      				<section class="col col-xs-12">
			      					<label>Item Location</label>
			      					<input type="text" class="form-control form-control-sm post-item-location" placeholder="Enter Item Location" required>
			      				</section>
			      			</section><br><br>

			      			<section class="row">
			      				<section class="col col-xs-12">
			      					<label>Item Currency</label>
							      	<select class="form-control form-control-sm item-select tradeCurrency" required>
					                       <option value="" disabled selected>Item Trade Currency</option>
					                       <option value="&#8358">Naira (&#8358;)</option>
					                       <option value="&#8373">Cedi (&#8373;)</option>
				                    </select>
			      				</section>

			      				<section class="col col-xs-12">
			      					<label>Item Price</label>
			      					<input type="number" class="form-control form-control-sm post-item-price" placeholder="Enter Item Price" min="0.1" step="any" required>
			      				</section>
			      			</section><br><br>

			      			<section class="row">
			      				<section class="col col-xs-12">
			      					<label>Item Category</label>
				      				<select class="form-control form-control-sm item-select post-item-categories" required>
				      				</select>
			      				</section>

			      				<section class="col col-xs-12">
			      					<label>Item Price Term</label>
				      				<select class="form-control form-control-sm item-select post-item-price-term" required>
				      					<option selected disabled>Price Term</option>
				      					<option value="fixed">Fixed</option>
				      					<option value="negotiable">Negotiable</option>
				      				</select>
			      				</section>
			      			</section><br><br>

			      			<section class="row">
			      				<section class="col col-xs-12">
			      					<label>Item Condition</label>
				      				<select class="form-control form-control-sm item-select post-item-item-condition" required>
				      					<option selected disabled>Item Condition</option>
				      					<option value="new">New</option>
				      					<option value="used">Used</option>
				      				</select>
			      				</section>

			      				<section class="col col-xs-12">
			      					<label>Item Details</label>
			      					<textarea class="form-control form-control-sm post-item-details" placeholder="Enter Item Details" required></textarea>
			      				</section>
			      			</section><br><br>

			      			<button type="submit" class="btn btn-info">Post Item</button>
				        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</form>
				    </div>
				    <div class="modal-footer">
				        
				    </div>
			    </div>
			</div>
		</div>

		<!-- Edit Item Modal -->
		<div class="modal fade" id="edit-post-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				    </div>
				    <div class="modal-body">
				    	<h5 class="text-center">Edit Item</h5>
						<form method="post" class="edit-post-form" accept-charset="utf-8">
							<!-- <section class="row">
								<section class="col-md-6 col-xs-12">
									<img src="assets/img/item-img-preview.png" class="post-item-img-preview">
		      				        <input type="file" id="post-item-img" name="files[]" class="post-item-img" accept="image/*" multiple>
		      				        <label for="post-item-img" class="post-item-img-label bg-info">Upload Item Photo</label>
								</section>
							</section><br> -->
							<input type="hidden" class="edit-Item-Id">

							<section class="row">
			      				<section class="col col-xs-12">
			      					<label>Item Name</label>
			      					<input type="text" class="form-control form-control-sm edit-post-item-name" placeholder="Enter Item Name (Title)" required>
			      				</section>

			      				<section class="col col-xs-12">
			      					<label>Item Location</label>
			      					<input type="text" class="form-control form-control-sm edit-post-item-location" placeholder="Enter Item Location" required>
			      				</section>
			      			</section><br><br>

			      			<section class="row">
			      				<section class="col col-xs-12">
			      					<label>Item Currency (<span class="edit-previous-currency"></span>)</label>
							      	<select class="form-control form-control-sm item-select edit-tradeCurrency" required>
					                       <option value="" disabled selected>Item Trade Currency</option>
					                       <option value="&#8358">Naira (&#8358;)</option>
					                       <option value="&#8373">Cedi (&#8373;)</option>
				                    </select>
			      				</section>

			      				<section class="col col-xs-12">
			      					<label>Item Price</label>
			      					<input type="number" class="form-control form-control-sm edit-post-item-price" placeholder="Enter Item Price" min="0.1" step="any" required>
			      				</section>
			      			</section><br><br>

			      			<section class="row">
			      				<section class="col col-xs-12">
			      					<label>Item Category (<span class="edit-previous-category"></span>)</label>
				      				<select class="form-control form-control-sm item-select edit-post-item-categories" required>
				      				</select>
			      				</section>

			      				<section class="col col-xs-12">
			      					<label>Item Price Term (<span class="edit-previous-price-term"></span>)</label>
				      				<select class="form-control form-control-sm item-select edit-post-item-price-term" required>
				      					<option selected disabled>Price Term</option>
				      					<option value="fixed">Fixed</option>
				      					<option value="negotiable">Negotiable</option>
				      				</select>
			      				</section>
			      			</section><br><br>

			      			<section class="row">
			      				<section class="col col-xs-12">
			      					<label>Item Condition (<span class="edit-previous-condition"></span>)</label>
				      				<select class="form-control form-control-sm item-select edit-post-item-item-condition" required>
				      					<option selected disabled>Item Condition</option>
				      					<option value="new">New</option>
				      					<option value="used">Used</option>
				      				</select>
			      				</section>

			      				<section class="col col-xs-12">
			      					<label>Item Details</label>
			      					<textarea class="form-control form-control-sm edit-post-item-details" placeholder="Enter Item Details" required></textarea>
			      				</section>
			      			</section><br><br>

			      			<button type="submit" class="btn btn-info">Post Item</button>
				        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						</form>
				    </div>
				    <div class="modal-footer">
				        
				    </div>
			    </div>
			</div>
		</div>

		<div class="modal fade delete-item-modal" id="delete-item-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			    <div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				    </div>
				    <div class="modal-body">
				    	<h5 class="text-center">Delete Item</h5>
				        
						<form method="post" class="delete-post-form" accept-charset="utf-8">
							<input type="hidden" class="delete-item-id" value="">
			      			<input type="hidden" class="delete-item-img" value="">
			      			<p class="center-align">Are You Sure You Want To Delete This Item ?</p>

				      		<button type="submit" class="btn btn-info">Yes, Delete</button>
				        	<button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
						</form>
				    </div>
				    <div class="modal-footer">
				        
				    </div>
			    </div>
			</div>
		</div>

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

<?php include "includes/footer.inc.php"; ?>
