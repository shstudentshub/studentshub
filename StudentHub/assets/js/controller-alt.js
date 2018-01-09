//declaring some constants to be used
const CONSTANTS = {
	adminLoginUrl: "../api/admin/login.php",
	addCategoryUrl: "../api/admin/addCategory.php",
	getCategoriesUrl: "../api/admin/getCategories.php",
	editCategoryUrl: "../api/admin/editCategory.php",
	deleteCategoryUrl: "../api/admin/deleteCategory.php"
}

//initializations of some methods
getCategories();

//event handler to handle the login of the admin
$(".admin-form").on("submit", function(event) {
	event.preventDefault(); //revent the page from reloading

	var adminUsername = $(".admin-username").val().trim(),
		adminPassword = $(".admin-password").val().trim(); //get the admin username and password

	if (adminUsername == "") { //if the admin username is empty
		$(".admin-login-res").html("Admin Username Cannot Be Empty").css("color","red"); //show message
	} else if (adminPassword == "") { //if admin password is empty
		$(".admin-login-res").html("Admin Password Cannot Be Empty").css("color","red"); //show password
	} else { //else if both username and password are not empty

		var data = $.param({  
			username: adminUsername,
			password: adminPassword
		});  //sanitize the credentails so it can be sent to the api

		//make a post request for the admin login
		$.post(CONSTANTS.adminLoginUrl, data, function(response) {
			console.log(response);
			if (response.success) { // if the login is successful
				$(".admin-login-res").html(response.message).css("color","green");
				setTimeout(function() {
					window.location.href = 'dashboard.php';
				}, 800);
			} else if (!response.success) { //else if it is not succesful

				$(".admin-login-res").html(response.message).css("color","red");
			}
		})


	}
});


//event handler to handle the submission of categories
$(".add-category-form").on("submit", function(event) {
	event.preventDefault();

	var categoryName = $(".add-category-name").val().trim();

	if (categoryName == "") {
		$(".category-res-msg").html("Category Name Cannot Be Empty").css({'color':'#FF2A55'});
	} else {
		var data = $.param({
			categoryName: categoryName
		});

		$.post(CONSTANTS.addCategoryUrl, data, function(response) {
			console.log(response);
			if (response == 'exists') {
				$(".category-res-msg").html("Category '" + categoryName + "' Already Exists.").css({'color':'#FF2A55'});
			} else if (response == 'added') {
				$(".category-res-msg").html("Category '" + categoryName + "' Added Successfully.").css({'color':'#068083'});
				setTimeout(function() {
					$(".add-category-modal").modal("close");
					$(".category-res-msg").html("");
					$(".add-category-name").val("");
				}, 700);

				getCategories();
			} else if(response == 'error'){
				$(".category-res-msg").html("There Was An Error. Check Your Internet Connection And Try Again").css({'color':'#FF2A55'});
			}
		});
	}
});


//event handler to handle the edition of categories
$(".edit-category-form").on("submit", function(event) {
	event.preventDefault();
	console.log('test');

	var categoryName = $(".edit-category-name").val().trim(),
		categoryId = $(".edit-category-id").val();

		console.log(categoryName);

	if (categoryName == "") {
		$(".category-res-msg").html("Category Name Cannot Be Empty...").css({'color':'#FF2A55'}).effect("pulsate", "slow");
	} else {
		var data = $.param({
			categoryName: categoryName,
			categoryId: categoryId
		});

		console.log(data);

		$.post(CONSTANTS.editCategoryUrl, data, function(response) {
			if (response == 'exists') {
				$(".category-res-msg").html("Category '" + categoryName + "' Already Exists.").css({'color':'#FF2A55'}).effect("pulsate", "slow");
			} else if (response == 'updated') {
				$(".category-res-msg").html("Category '" + categoryName + "' Updated Successfully.").css({'color':'#068083'});
				setTimeout(function() {
					$(".edit-category-modal").modal("close");
					$(".category-res-msg").html("");
					$(".edit-category-name").val("");
				}, 700);

				getCategories();
			} else if(response == 'error'){
				$(".category-res-msg").html("There Was An Error. Check Your Internet Connection And Try Again").css({'color':'#FF2A55'}).effect("pulsate", "slow");
			}
		});
	}
});

//event handler to handle the deletion of categories
$(".delete-category-form").on("submit", function(event) {
	event.preventDefault();

	var categoryId = $(".delete-category-id").val();

	var data = $.param({
		categoryId: categoryId
	});

	$.post(CONSTANTS.deleteCategoryUrl, data, function(response) {
		$(".category-delete-msg").html(response);
		setTimeout(function() {
			$('.delete-category-modal').modal('close');
		}, 1000);
		getCategories();
	});
});

/*All functions for requests for all the pages*/
//function to get the categories for the categories page
function getCategories() {

	$.get(CONSTANTS.getCategoriesUrl, function(response) {
		$(".categories-res-div").html(response);
	});
}

//function to get open the modal for the editing of the category
function showEditCategoryForm(category) {
	$(".edit-category-name").val(category.categoryName);
	$(".edit-category-id").val(category.categoryId);
	$(".edit-category-modal").modal("open");
}

//function to open the modal for delete confirmation
function showDeleteCategoryDialog(category) {
	$(".category-delete-msg").html("Are You Sure You Want To Delete The Category '" + category.categoryName + "'");
	$(".delete-category-id").val(category.categoryId);
	$(".delete-category-modal").modal("open");
}