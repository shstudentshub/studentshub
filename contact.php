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


		<!-- Fixed Search bar for mobile viewport -->
		<section class="container-fluid main-div contact-div">
			
			<section class="row">
				<section class="col-sm-12 col-md-12 contactpage parallax-container">
					<h5 class="center-align" style="margin:90px auto">Let Get In Touch</h5>
				</section>
			</section>

			<section class="row">
				<section class="col-sm-12 col-md-12 displayMap">
					<section class="right contact-details-on-map hide-on-med-and-down">
						<section class="contact-text-span">
							<span><strong>StudentHub Inc</strong></span>
							<span style="font-size: 12px"><br>
								Model Town Link Road Lahore <br>
								60 Street. Accra Ghana 54770 <br>
								<a href="mailto:info@studentshubafrica.com ">info@studentshubafrica.com </a><br>
							</span>
						</section>
					</section>
					<iframe class="contactMap"
					 src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15895.706359124628!2d-1.29308488573349!3d5.115533396287453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfddfed6fc798569%3A0x7531c2a02fe48636!2sUniversity+Of+Cape+Coast!5e0!3m2!1sen!2sgh!4v1518001781296" allowfullscreen>
					 </iframe>
				</section>
			</section>
			<section class="row">
				<section class="col-sm-12 col-md-6">
					<section class="address-info">
						<address class="address-loca">
							<span style="font-size: 25px"><strong>Address Information</strong></span><br>
							Model Town Link Road Lahore<br/>
		                    60 Street. Accra Ghana 54770<br/>
		                    info@studentshubafrica.com <br/>
		                    <strong>Tel:</strong><a href="tel:+233 20 586 5858" class="hide-on-large-only"> +233 20 586 5858</a>
		                    <a class="hide-on-med-and-down" style="color: #120909"> +233 20 586 5858</a>
						</address>
					</section>
				</section>
				<section class="col-sm-12 col-md-6">
					<section class="contact-loca">
						<strong>Write Us</strong><br>
				        <form class="contact-us-form" enctype="multipart/form-data" method="post">
				    			<section class="form-group">
				    				<label for="name">Name: </label><br>
				    				<input type="text" name="name" class="form-control form-control-sm sender-name" required>
				    			</section>

				    			<section class="form-group">
				    				<label for="email" data-error="wrong" data-success="right">Email</label>
				    				<input type="email" name="email" class="form-control form-control-sm sender-email" required>
				    			</section>

				    			<section class="form-group">
				    				<label for="message">Message</label>
				    				<textarea id="textarea1" class="form-control form-control-sm sender-message" required></textarea>
				    			</section>

				    			<button type="submit" class="contact-btn btn-cont">Send</button>
				    		
				        </form>
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

<?php  include "includes/footer.inc.php" ?>
