<?php include "header.inc.php"; ?>

<!-- navbar for all the admin panels -->

<!-- Admin dropdown options -->
<ul id="adminOptions" class="dropdown-content">
  <li><a href="logout.php">Logout</a></li>
</ul>

<!-- navbar -->
<section class="navbar-fixed">
	<nav class="admin-custom-navbar">
		<div class="nav-wrapper">
			<a href="#" class="brand-logo">
				<img src="../assets/img/students-hub-logo.png" class="admin-navbar-logo" alt="Logo">
			</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href=""><i class="fa fa-envelope"></i></a></li>
				<li><a href=""><i class="fa fa-bell"></i></a></li>
				<li><li><a class="dropdown-trigger" href="#!" data-activates="adminOptions">Username<i class="material-icons right"><i class="fa fa-caret-down"></i></i></a></li></li>
			</ul>
		</div>
	</nav>
</section>