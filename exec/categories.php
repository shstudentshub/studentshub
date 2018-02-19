<!-- include the navbar whic contains the header file -->
<?php include "includes/navbar.inc.php"; ?>
<!-- The main items on the page. The side navigation and the content division -->
<section class="row main-row">
	<!-- side div -->
	<section class="col m2 l2 side-div">
		<li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
		<li><a href="pending-posts"><i class="fa fa-hourglass"></i>Pending Posts<i class="badge"></i></a></li>
		<li><a href="posts"><i class="fa fa-check"></i> Approved Posts<i class="appBadges"></i></a></li>
		<li class="selected-item"><a href="categories " class="selected"><i class="fa fa-list"></i> Categories</a></li>
		<li><a href="users"><i class="fa fa-users"></i> Users</a></li>
		<hr>
		<li><a href="send-messages"><i class="fa fa-send"></i> Send Message</a></li>
		<li><a href="messages"><i class="fa fa-envelope"></i> Messages</a></li>
		<li><a href="notifications "><i class="fa fa-bell"></i> Notifications</a></li>
		<li><a href="about"><i class="fa fa-info-circle"></i> About</a></li>
		<li><a href="logout"><i class="fa fa-sign-out"></i>Logout</a></li>
	</section>
	<!--content div  -->
	<section class="col m10 l10 content-div">
		<section class="row">
			<section class="col s12 m8 l8">
				<!-- Div to show the categories in a tabular form -->
				<section class="categories-res-div"></section>
			</section>
		</section>
	</section>
	<!-- fab and modals -->
	<section class="fixed-action-btn">
		<a class="btn-floating btn-large modal-trigger custom-btn pulse" href="#add-category-modal">
			<i class="fa fa-plus"></i>
		</a>
	</section>
	<!-- Add category modal -->
	<section id="add-category-modal" class="modal add-category-modal">
		<section class="modal-content">
			<section class="row">
				<section class="col s12 l2 m2"></section>
					<section class="col s12 l8 m8">
						<h4 class="center-align">Add Category</h4><br/>
						<form class="col s12 add-category-form" method="post" enctype="multipart/form-data">
							<section class="row">
								<section class="input-field col s12">
									<input type="text" class="validate add-category-name" placeholder="Category Name">
								</section>
							</section>
							<section class="row">
								<section class="input-field col s6">
									<button class="btn waves-effect waves-light custom-btn" type="submit">Add</button>
									<button class="btn waves-effect waves-light modal-action modal-close custom-btn" type="reset">Cancel</button>
								</section>
							</section>
							<p class="center-align category-res-msg"></p>
						</form>
					</section>
				<section class="col s12 l2 m2"></section>
			</section>
		</section>
	</section>

	<!-- Edit category modal -->
	<section id="edit-category-modal" class="modal edit-category-modal">
		<section class="modal-content">
			<section class="row">
				<section class="col s12 l2 m2"></section>
					<section class="col s12 l8 m8">
						<h4 class="center-align">Edit Category</h4><br/>
						<form class="col s12 edit-category-form" method="post" enctype="multipart/form-data">
							<input type="hidden" class="edit-category-id" value="">
							<section class="row">
								<section class="input-field col s12">
									<input type="text" class="validate edit-category-name" placeholder="Category Name">
								</section>
							</section>
							<section class="row">
								<section class="input-field col s6">
									<button class="btn waves-effect waves-light custom-btn" type="submit">Update</button>
									<button class="btn waves-effect waves-light modal-action modal-close custom-btn" type="reset">Cancel</button>
								</section>
							</section>
							<p class="center-align category-res-msg"></p>
						</form>
					</section>
				<section class="col s12 l2 m2"></section>
			</section>
		</section>
	</section>

	<!-- Delete category modal -->
	<section id="delete-category-modal" class="modal delete-category-modal">
		<section class="modal-content">
			<section class="row">
				<section class="col s12 l2 m2"></section>
					<section class="col s12 l8 m8">
						<h4 class="center-align">Edit Category</h4><br/>
						<form class="col s12 delete-category-form" method="post" enctype="multipart/form-data">
							<input type="hidden" class="delete-category-id" value="">
							<h4 class="center-align category-delete-msg"></h4>
							<section class="row">
								<section class="input-field col s6">
									<button class="btn waves-effect waves-light custom-btn" type="submit">Yes, delete</button>
									<button class="btn waves-effect waves-light modal-action modal-close custom-btn" type="reset">No, Cancel</button>
								</section>
							</section>
						</form>
					</section>
				<section class="col s12 l2 m2"></section>
			</section>
		</section>
	</section>
</section>
<!-- include the footer file -->
<?php include "includes/footer.inc.php"; ?>
