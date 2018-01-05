<!-- include header file -->
<?php include "includes/header.inc.php" ?>

<!-- login row -->
<section class="row admin-login-row">
	<section class="col s12 m4 l4"></section>

	<section class="col s12 m4 l4">

		<section class="admin-form-div">
			<img src="../assets/img/students-hub-logo.png" class="admin-form-logo" alt="Logo">
			<h4 class="center-align">Admin Login</h4>
			<p class="center-align">Enter Admin Credentials To Login</p>
			<br/>
			<form method="post" class="admin-form" accept-charset="utf-8">
				<section class="row">
					<section class="input-field col s12">
						<input id="login-email" type="email" class="validate" placeholder="Admin Username" required>
					</section>
				</section>
				<section class="row">
					<section class="input-field col s12">
						<input id="login-password" type="password" class="validate" placeholder="Admin Password" required>
					</section>
				</section><br/>
				<section class="row btn-div">
					<section class="col s12">
						<button class="btn admin-login-btn" type="submit" name="action">Login</button>
					</section>
				</section><br/>
				<p class="center-align admin-login-res"></p>
			</form>
		</section>

	</section>

	<section class="col s12 m4 l4"></section>
</section>

<!-- include footer file -->
<?php include "includes/footer.inc.php" ?>