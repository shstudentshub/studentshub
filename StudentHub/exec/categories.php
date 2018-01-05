<!-- include the navbar whic contains the header file -->
<?php include "includes/navbar.inc.php"; ?>

<!-- The main items on the page. The side navigation and the content division -->
<section class="row main-row">

	<!-- side div -->
	<section class="col m2 l2 side-div">
		<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="posts.php"><i class="fa fa-plus"></i> Posts</a></li>
		<li class="selected-item"><a href="categories.php" class="selected"><i class="fa fa-list"></i> Categories</a></li>
		<li><a href="users.php"><i class="fa fa-users"></i> Users</a></li>
		<li><a href="ads.php"><i class="fa fa-buysellads"></i> Ads</a></li>
		<hr>
		<li><a href="send-messages.php"><i class="fa fa-send"></i> Send Message</a></li>
		<li><a href="messages.php"><i class="fa fa-envelope"></i> Messages</a></li>
		<li><a href="notifications.php"><i class="fa fa-bell"></i> Notifications</a></li>
		<li><a href="about.php"><i class="fa fa-info-circle"></i> About</a></li>
	</section>

	<!--content div  -->
	<section class="col m10 l10 content-div">
		<h1>Categories Content Comes Here</h1>
	</section>
</section>

<!-- include the footer file -->
<?php include "includes/footer.inc.php"; ?>