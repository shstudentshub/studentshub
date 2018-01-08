CONSTANTS = {
	getHomeCategoriesUrl: "api/user/getHomeCategories.php",
	userSignupUrl: "api/user/signup.php",
	userLoginUrl: "api/user/login.php"
}

//initialization of some methods
getHomeCategories();
setCurrentPage();


//event to handle the sign up of a user
$(".user-signup-form").on("submit", function(event) {
	event.preventDefault();

	//get the values from the signup form
	var userFullname = $(".user-signup-fullname").val().trim(),
		userContact = $(".user-signup-contact").val().trim(),
		userEmail = $(".user-signup-email").val().trim(),
		userPassword = $(".user-signup-password").val().trim();

	//if any of the values from the form is empty,
	if (userFullname == "") {
		showSnackBar("Please Provide Your Full Name", "error");
	} else if (userContact == "") {
		showSnackBar("Please Provide Your Contact Number", "error");
	} else if (userEmail == "") {
		showSnackBar("Please Provide Your Email Address", "error");
	} else if (userPassword == "") {
		showSnackBar("Please Choose A Password", "error");
	} else {
		//else, sanitize the data for submission to the api
		showSnackBar("Signin Up...", "progress");
		var data = $.param({
			userFullname: userFullname,
			userContact: userContact,
			userEmail: userEmail,
			userPassword: userPassword
		});

		//make a post request the signup api
		$.post(CONSTANTS.userSignupUrl, data, function(response) {
			console.log(response);
			//if signup successful,
			if (response.success) {
				showSnackBar(response.message,"success");

				setTimeout(function() {
					$(".signup-modal").modal("close");
					$(".signin-modal").modal("open");
					showSnackBar(userFullname + ",You Can Log Into Your New Account Now");
				},1000);
			} else if(!response.success) { //else if signup is not successful,
				showSnackBar(response.message,"error");
			}
		});
	}
});

//event to handle the sign in of a user
$(".user-signin-form").on("submit", function(event) {
	event.preventDefault();

	//get the values from the sign in form
	var userEmail = $(".user-signin-email").val().trim(),
		userPassword = $(".user-signin-password").val().trim();

	//if any of the values from the form is empty,
	if (userEmail == "") {
		showSnackBar("Please Provide Your Email Address", "error");
	} else if (userPassword == "") {
		showSnackBar("Please Choose A Password", "error");
	} else {
		//else, sanitize the data for submission to the api
		showSnackBar("Signin In...", "progress");
		var data = $.param({
			userEmail: userEmail,
			userPassword: userPassword
		});

		//make a post request the sign in api
		$.post(CONSTANTS.userLoginUrl, data, function(response) {
			console.log(response);
			//if login successful,
			if (response.success) {
				showSnackBar(response.message,"success");

				setTimeout(function() {
					var currentPage = getCurrentPage();
					window.location.href = currentPage;
					hideSnackBar();
				},1000);
			} else if(!response.success) { //else if login is not successful,
				showSnackBar(response.message,"error");
			}
		});
	}
});

//event to hide the snackbar if a user starts to enter something after an error
$(".user-signup-form .validate, .user-signin-form .validate").on("input", function() {
	hideSnackBar();
});

//some methods to make requests from api
function getHomeCategories() {
	$.get(CONSTANTS.getHomeCategoriesUrl, function(response) {
		$(".home-categories").html(response);
	})
}

//function to show the snackbar with the message and optional image
function showSnackBar(text,imageType) {
	if (!imageType) {
		$(".snackbar-icon-error,.snackbar-icon-success, .snackbar-loader").hide();
	} else if (imageType == "error"){
		$(".snackbar-loader").hide();
		$(".snackbar-icon-success").hide();
		$(".snackbar-icon-error").show();
	} else if (imageType == "success") {
		$(".snackbar-loader").hide();
		$(".snackbar-icon-error").hide();
		$(".snackbar-icon-success").show();
	} else if (imageType == "progress") {
		$(".snackbar-loader").show();
		$(".snackbar-icon-error").hide();
		$(".snackbar-icon-success").hide();
	}

	$(".snackbar-text").html(text);
	$(".snackbar").addClass("show").removeClass("hide");
}

//functioin to hide snackbar
function hideSnackBar() {
	$(".snackbar").addClass("hide").removeClass("show");
	$(".snackbar-icon-error,.snackbar-icon-success, .snackbar-loader").show();
	$(".snackbar-text").html('');
}

//a function to set the current user's page
function setCurrentPage() {
	localStorage.setItem("currentPage", window.location.href );
}

//a function to get the current user's page
function getCurrentPage() {
	return localStorage.getItem("currentPage");
}
