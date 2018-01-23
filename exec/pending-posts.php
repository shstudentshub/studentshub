<!-- include the navbar whic contains the header file -->
<?php include "includes/navbar.inc.php"; ?>

<!-- The main items on the page. The side navigation and the content division -->
<section class="row main-row">
	
	<!-- side div -->
	<section class="col m2 l2 side-div">
		<li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li class="selected-item"><a href="pending-posts.php" class="selected"><i class="fa fa-buysellads"></i> Pending Items</a></li>
		<li><a href="posts.php"><i class="fa fa-plus"></i> Posts</a></li>
		<li><a href="categories.php"><i class="fa fa-list"></i> Categories</a></li>
		<li><a href="users.php"><i class="fa fa-users"></i> Users</a></li>
		<hr>
		<li><a href="send-messages.php"><i class="fa fa-send"></i> Send Message</a></li>
		<li><a href="messages.php"><i class="fa fa-envelope"></i> Messages</a></li>
		<li><a href="notifications.php"><i class="fa fa-bell"></i> Notifications</a></li>
		<li><a href="about.php"><i class="fa fa-info-circle"></i> About</a></li>
		<li><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
	</section>

	<!--content div  -->
	<section class="col m10 l10 content-div">
		<section class="row">
			<section class="col s12 m12 l12">
				<section class="pending-posts-res"></section>
			</section>
		</section>
	</section>

	<!-- View Item Modal -->
	<div id="viewItemModal" class="modal view-item-modal">
	    <div class="modal-content">
	    	<h4><b>Item Details</b></h4><hr>

	      	<h6><b>Item Picture</b></h6>
	      	<img src="" class="view-item-image"><br/><br/>

	      	<h6><b>Item Name</b></h6>
	      	<p class="item-name"></p><br>

	      	<h6><b>Item Category</b></h6>
	      	<p class="item-category"></p><br>

	      	<h6><b>Item Details</b></h6>
	      	<p class="item-details"></p><br>

	    </div>
	    <div class="modal-footer">
	      	<a href="#!" class="btn modal-action modal-close waves-effect waves-green">Close</a>
	    </div>
	</div>


	<!-- Decline Item Modal -->
	<div id="declineItemModal" class="modal decline-item-modal">
	    <div class="modal-content">
	    	<h4><b>Decline Item</b></h4><hr>

	      	<form method="post" enctype="multipart/form-data" accept-charset="utf-8">
	      		<input type="hidden" class="decline-item-id">
	      		<label><b>Reasons For Declining Item</b></label><br/>
	      		<textarea placeholder="..." class="decline-item-message"></textarea><br/>
	      		<button type="submit" class="btn teal">Decline</button>&nbsp;&nbsp;&nbsp;
	      		<button type="submit" class="btn modal-action modal-close red">Cancel</button>
	      	</form>

	    </div>
	    </div>
	</div>
        

<!-- include the footer file -->
<?php include "includes/footer.inc.php"; ?>