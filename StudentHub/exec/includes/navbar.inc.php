<?php
	#include the header file
	include "header.inc.php"; 

	#initialize session and check if the admin username is set in session, if not redirect to login page
	session_start();
	if (!isset($_SESSION["adminUsername"])) {
		echo "<script>window.location.href = 'index.php'</script>";
	}
	
?>

<!-- navbar for all the admin panels -->

<!-- Admin dropdown options -->
<!--<ul id="adminOptions" class="dropdown-content">
  <li><a href="logout.php">Logout</a></li>
</ul>-->

<!-- navbar -->
<section class="navbar-fixed">
	<nav class="admin-custom-navbar" style="background-color: #000">
		<div class="nav-wrapper">
			<a href="#" class="brand-logo">
				<img src="../assets/img/students-hub-logo.png" class="admin-navbar-logo" alt="Logo">
			</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href=""><i class="fa fa-envelope"></i></a></li>
				<li><a href=""><i class="fa fa-bell"></i></a></li>
				<li><li><a class="dropdown-trigger" href="#!" data-activates="adminOptions">Hello <?php echo ucfirst($_SESSION["adminUsername"]); ?></i></a></li></li>
			</ul>
		</div>
	</nav>
</section>