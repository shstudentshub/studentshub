<!-- include the navbar whic contains the header file -->
<?php include "includes/navbar.inc.php"; ?>

<!-- The main items on the page. The side navigation and the content division -->
<section class="row main-row">
	
	<!-- side div -->
	<section class="col m2 l2 side-div">
		<li><a href="dashboard "><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="pending-posts "><i class="fa fa-hourglass"></i>Pending Posts<i class="badge"></i></a></li>
		<li><a href="posts "><i class="fa fa-check"></i> Approved Posts</a></li>
		<li><a href="categories "><i class="fa fa-list"></i> Categories</a></li>
		<li><a href="users "><i class="fa fa-users"></i> Users</a></li>
		<hr>
		<li class="selected-item"><a href="send-messages " class="selected"><i class="fa fa-send"></i> Send Message</a></li>
		<li><a href="messages "><i class="fa fa-envelope"></i> Messages</a></li>
		<li><a href="notifications "><i class="fa fa-bell"></i> Notifications</a></li>
		<li><a href="about "><i class="fa fa-info-circle"></i> About</a></li>
		<li><a href="logout "><i class="fa fa-sign-out"></i>Logout</a></li>
	</section>

	<!--content div  -->
	<section class="col m10 l10 content-div">
		<h1>Send Messages Content Comes Here</h1>
	</section>

</section>

<!-- include the footer file -->
<?php include "includes/footer.inc.php"; ?>