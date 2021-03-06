<!-- include the navbar whic contains the header file -->
<?php include "includes/navbar.inc.php"; ?>

<!-- The main items on the page. The side navigation and the content division -->
<section class="row main-row">
	
	<!-- side div -->
	<section class="col m2 l2 side-div">
		<li><a href="dashboard "><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="pending-posts "><i class="fa fa-hourglass"></i>Pending Posts<i class="badge"></i></a></li>
		<li><a href="posts " class="collection-item"><i class="fa fa-check"></i> Approved Posts<i class="appBadges"></i></a></li>
		<li><a href="categories "><i class="fa fa-list"></i> Categories</a></li>
		<li class="selected-item"><a href="users " class="selected"><i class="fa fa-users"></i> Users</a></li>
		<hr>
		<li><a href="send-messages "><i class="fa fa-send"></i> Send Message</a></li>
		<li><a href="messages "><i class="fa fa-envelope"></i> Messages</a></li>
		<li><a href="notifications "><i class="fa fa-bell"></i> Notifications</a></li>
		<li><a href="about "><i class="fa fa-info-circle"></i> About</a></li>
		<li><a href="logout "><i class="fa fa-sign-out"></i>Logout</a></li>
	</section>

	<!--content div  -->
	<section class="col m10 l10 content-div">
		<section class="row">
			<section class="col s12 m12 l12">
				<section class="users-res"></section>
			</section>
		</section>
	</section>

	<!-- View User Modal -->
	<div id="viewItemModal" class="modal view-user-modal">
	    <div class="modal-content">
	    	<h4><b>User Details</b></h4><hr>

	      	<h6><b>User Name</b></h6>
	      	<p class="user-name"></p><br>

	      	<h6><b>User Email</b></h6>
	      	<p class="user-email"></p><br>

	      	<h6><b>User Contact Number</b></h6>
	      	<p class="user-contact"></p><br>

	      	<h6><b>User Sign Date</b></h6>
	      	<p class="user-sign-date"></p>

	    </div>
	    <div class="modal-footer">
	      	<a href="#!" class="btn modal-action modal-close waves-effect waves-green">Close</a>
	    </div>
	</div>

</section>

<!-- include the footer file -->
<?php include "includes/footer.inc.php"; ?>