<?php include "includes/info.header.php" ?>
		<!-- The navbar -->

		  <div class="navbar-fixed">
		    <nav>
		      <section class="nav-wrapper">
		        <a href="index" class="brand-logo hide-on-med-and-down">
		        	HuB
		        </a>
		        <ul class="right hide-on-med-and-down">
		          <li><a href="about">About</a></li>
		          <li class="active"><a href="contact">Contact</a></li>
		          <li><a href="faq">FAQ</a></li>
		          <li><a href="team">Team</a></li>
		        </ul>

		        <ul class="side-nav" id="nav-mobile">
					<li><a href="about">About</a></li>
					<li  class="active"><a href="contact">Contact</a></li>
					<li><a href="faq">FAQ</a></li>
					<li><a href="team">Team</a></li>
		        </ul>
		        <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="fa fa-navicon"></i></a>
		      </section>
		    </nav>
		  </div>


		<!-- Fixed Search bar for mobile viewport -->
		<section class="row">
			<section class="col s12 m12 contactpage parallax-container">
				<h5 class="center-align" style="margin:90px auto">This is a section</h5>
			</section>

			<section class="col s12 m12 displayMap">
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

			<section class="col s12 m6">
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
			<section class="col s12 m6">
				<section class="contact-loca">
					<strong>Write Us</strong><br>
          <form class="" method="post">
            <section class="row">
    					<section class="input-field col s12">
    						<label for="name">Name: </label>
    						<input type="text" name="name" required><br>
    					</section><br>
    				</section>
    				<section class="row">
    					<section class="input-field col s12">
    						<label for="email" data-error="wrong" data-success="right">Email</label>
    						<input type="email" name="email" required><br>
    					</section>
    				</section>
    				<section class="row">
    					<section class="input-field col s12">
    						<label for="message">Message</label>
    						<textarea id="textarea1" class="materialize-textarea" required></textarea><br>
    					</section>
    				</section>
    					<section class="row contact-btn-div">
    						<section class="col s12 m6">
      						<button type="submit" class="contact-btn btn-cont" onmousemove="this.style.background-color='#F56400'">Send</button>
    						</section>
    					</section>
          </form>
				</section>
			</section>
		</section>


<?php  include "includes/info.footer.php" ?>
