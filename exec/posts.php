<!-- include the navbar whic contains the header file -->
<?php include "includes/navbar.inc.php"; ?>

<!-- The main items on the page. The side navigation and the content division -->
<section class="row main-row">

	<!-- side div -->
	<section class="col m2 l2 side-div">
		<li><a href="dashboard "><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="pending-posts "><i class="fa fa-hourglass"></i>Pending Posts<i class="badge"></i></a></li>
		<li class="selected-item"><a href="posts " class="collection-item"><i class="fa fa-check"></i> Approved Posts<i class="appBadges"></i></a></li>
		<li><a href="categories "><i class="fa fa-list"></i> Categories</a></li>
		<li><a href="users "><i class="fa fa-users"></i> Users</a></li>
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
				<section class="approved-posts-res"></section>
			</section>
		</section>
	</section>

	<!-- View Item Modal -->
	<div id="viewItemModal" class="modal view-item-modal">
	    <div class="modal-content">
	    	<h4><b>Item Details</b></h4><hr>

        -<h6><b>Item Picture</b></h6>
        <!--<img src=""  class="view-item-image"><br/><br/>-->
        <section class="row imageDisplay">

        </section>

	      	<h6><b>Item Name</b></h6>
	      	<p class="item-name"></p><br>

	      	<h6><b>Item Category</b></h6>
	      	<p class="item-category"></p><br>

	      	<h6><b>Item Details</b></h6>
	      	<p class="item-details"></p><br>

	    </div>
	    <div class="modal-footer">
	      	<button type="button" class="btn modal-action modal-close waves-effect waves-green">Close</button>
	    </div>
	</div>


	<!-- Decline Item Modal -->
	<div id="declineItemModal" class="modal decline-item-modal">
	    <div class="modal-content">
	    	<h4><b>Decline Item</b></h4><hr>

	      	<form method="post" class="decline-item-form" enctype="multipart/form-data" accept-charset="utf-8">
	      		<input type="hidden" class="decline-item-id">
	      		<label><b>Reasons For Declining Item</b></label><br/>
	      		<select required class="browser-default decline-item-message">
	      			<option value="" selected disabled>Select Reason</option>
	      			<option value="Inappropriate Item Picture">Inappropriate Item Picture</option>
	      			<option value="Inappropriate Category">Inappropriate Category</option>
	      			<option value="Inappropriate Name/Title">Inappropriate Name/Title</option>
	      			<option value="Inappropriate Item Details">Inappropriate Item Details</option>
	      		</select><br/><br/>
	      		<button type="submit" class="btn teal">Decline</button>&nbsp;&nbsp;&nbsp;
	      		<button type="button" class="btn modal-action modal-close red">Cancel</button>
	      	</form>

	    </div>
	    </div>
	</div>

</section>

<!-- include the footer file -->
<?php include "includes/footer.inc.php"; ?>
