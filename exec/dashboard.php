<!-- include the navbar whic contains the header file -->
<?php include "includes/navbar.inc.php"; ?>

<!-- The main items on the page. The side navigation and the content division -->
<section class="row main-row">
	<!-- side div -->
	<section class="col m2 l2 side-div">
		<li class="selected-item"><a href="dashboard" class="selected"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="pending-posts"><i class="fa fa-hourglass"></i>Pending Posts<i class="badge"></i></a></li>
		<li><a href="posts" class="collection-item"><i class="fa fa-check"></i> Approved Posts<i class="appBadges"></i></a></li>
		<li><a href="categories"><i class="fa fa-list"></i> Categories</a></li>
		<li><a href="users"><i class="fa fa-users"></i> Users</a></li>
		<hr>
		<li><a href="send-messages"><i class="fa fa-send"></i> Send Message</a></li>
		<li><a href="messages"><i class="fa fa-envelope"></i> Messages</a></li>
		<li><a href="notifications"><i class="fa fa-bell"></i> Notifications</a></li>
		<li><a href="about"><i class="fa fa-info-circle"></i> About</a></li>
		<li><a href="logout"><i class="fa fa-sign-out"></i>Logout</a></li>
	</section>

	<!--content div  -->
	<section class="col m10 l10 content-div">
		<section class="row">
			<section class="col s12 m34 l4">
				<section class="panel purple accent-1 admin-dashboard-summary">
					<p><span class="dashboard-summary-number admin-total-users">0</span> Users</p>
				</section>
			</section>
			<section class="col s12 m4 l4">
				<section class="panel green accent-1 admin-dashboard-summary">
					<p><span class="dashboard-summary-number admin-total-posts">0</span> Posts</p>
				</section>
			</section>
			<section class="col s12 m4 l4">
				<section class="panel cyan accent-1 admin-dashboard-summary">
					<p><span class="dashboard-summary-number admin-total-categories">0</span> Categories</p>
				</section>
			</section>

		</section><br><hr>

		<section class="row">
			<section class="col s12 m6 l6">
				<section class="">
					<p class="center-align"><b>User Signup Rate</b></p>
					<canvas id="adminUsersChart" class="user-dashboard-graph"></canvas>
				</section>
			</section>

			<section class="col s12 m6 l6">
				<section class="">
					<p class="center-align"><b>User Post Rate</b></p>
					<canvas id="adminPostsChart" class="user-dashboard-graph"></canvas>
				</section>
			</section>
		</section>
	</section>
</section>

<!-- include the footer file -->
<?php include "includes/footer.inc.php"; ?>
