<?php include "includes/info.header.php" ?>

		<!-- The navbar -->
		<nav class="fixed-top navbar navbar-expand-lg navbar-light custom-navbar">
			<a class="navbar-brand" href="index">
				<img src="assets/img/students-hub-logo.png" class="navbar-logo" alt="Logo">
			</a>
			<a class="nav-item custom-nav-item nav-link collapse-icon" href="#" onclick="openSideNav()"><i class="fa fa-navicon"></i></a>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">

				<ul class="navbar-nav ml-auto">
					<li class="nav-item" class="active"><a href="about" class="nav-link">About</a></li>
		          	<li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
		          	<li class="nav-item"><a href="faq" class="nav-link">FAQ</a></li>
		          	<!-- <li class="nav-item"><a href="team" class="nav-link">Team</a></li> -->
				</ul>
			</div>
		</nav>

		<!-- for the side nav -->
		<section id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>
            
            <a href="about">About</a>
		    <a href="contact">Contact</a>
		    <a href="faq">FAQ</a>
		    <!-- <a href="team">Team</a> -->
        </section>

		
		<section class="row">
			<div class="about-parallax-div parallax"><img src="assets/img/about-parallax.jpg" class="about-parallax-img img-fluid"></div>
		</section>

		<section class="container-fluid main-div about-div">
			<section class="row">
				<section class="col-sm-12 col-md-6">
			  		<section class="content-area">
			  			<h4>About Us</h4>
			  			<span>Students hub is a community based marketplace for student’s retail and marketing in Africa. It connects people within their local vicinity to buy, sell or exchange used goods and services by making it fast and easy for anyone to post a listing through their mobile phone or on the web. Student hub is the one stop site for every student.</span>
			  		</section>
		  	    </section>
		  	    <section class="col-sm-12 col-md-6 right-content hide-on-med-and-down"></section>
			</section>

			<section class="row">
		  	    <section class="col-sm-12 col-md-6 left-content hide-on-med-and-down"></section>
				<section class="col-sm-12 col-md-6">
			  		<section class="content-area">
			  			<h4>About Us</h4>
			  			<span>Students hub is a community based marketplace for student’s retail and marketing in Africa. It connects people within their local vicinity to buy, sell or exchange used goods and services by making it fast and easy for anyone to post a listing through their mobile phone or on the web. Student hub is the one stop site for every student.</span>
			  		</section>
		  	    </section>
			</section>
		</section>

		<script type="text/javascript">
			//function to open the side nav
		    function openSideNav() {
		        document.getElementById("mySidenav").style.width = "100%";
		    }

		    //function to close the side nav
		    function closeSideNav(){
		        document.getElementById("mySidenav").style.width = "0%";
		    }
		</script>


		<!-- Fixed Search bar for mobile viewport -->

<?php  include "includes/footer.inc.php" ?>
