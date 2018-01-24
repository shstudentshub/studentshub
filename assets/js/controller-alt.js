//declaring some constants to be used
const CONSTANTS = {
	adminLoginUrl: "../api/admin/login.php",
	addCategoryUrl: "../api/admin/addCategory.php",
	getCategoriesUrl: "../api/admin/getCategories.php",
	editCategoryUrl: "../api/admin/editCategory.php",
	deleteCategoryUrl: "../api/admin/deleteCategory.php",
	getDashboardSummaryUrl: "../api/admin/getDashboardSummary.php",
	getDashboardUsersGraphDataUrl: "../api/admin/getDashboardUsersGraphData.php",
	getDashboardPostsGraphDataUrl: "../api/admin/getDashboardPostsGraphData.php",
	getPendingPostsUrl: "../api/admin/getPendingPosts.php",
	toggleItemApprovalUrl: "../api/admin/toggleItemApproval.php",
	getDashboardPostsGraphDataUrl: "../api/admin/getDashboardPostsGraphData.php",
	getApprovedPostsUrl: "../api/admin/getApprovedPosts.php",
	getUsersUrl: "../api/admin/getUsers.php"
}

//initializations of some methods
getCategories();
getDashboardSummary();
getDashboardUsersGraphData();
getDashboardPostsGraphData();
getPendingPosts();
getApprovedPosts();
getUsers();

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

//event handler to handle the declination of pending posts
$(".decline-item-form").on("submit", function(event) {
	event.preventDefault();

	var itemId = $(".decline-item-id").val(),
		declineMessage = $(".decline-item-message").val().trim(),
		itemApprovalStatus = 2;

	var data = $.param({
		itemId: itemId,
		declineMessage: declineMessage,
		itemApprovalStatus: itemApprovalStatus
	});

	$.post(CONSTANTS.toggleItemApprovalUrl, data, function(response) {
		if (response.success) {
			$(".decline-item-modal").modal("close");
			getPendingPosts();
			getApprovedPosts();
		}else {
			alert(response.message);
		}
	})

})

/*All functions for requests for category page*/
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

/*Methods for the pending posts page*/
//functionto get the pending posts
function getPendingPosts() {
	$.get(CONSTANTS.getPendingPostsUrl, function(response) {
		$(".pending-posts-res").html(response);
	})
}

//function to view the item
function viewItem(itemObj) {
	$(".view-item-image").prop("src","../uploads/items/" + itemObj.itemPicture);
	$(".item-name").html(itemObj.itemName);
	$(".item-category").html(itemObj.itemCategory);
	$(".item-details").html(itemObj.itemDetails);
	$(".view-item-modal").modal("open");
}

//a function to approve the item
function approveItem(itemObj) {
	var itemId = itemObj.itemId,
		itemApprovalStatus = itemObj.itemApprovalStatus;

	var data = $.param({
		itemId: itemId,
		itemApprovalStatus: itemApprovalStatus
	});

	$.post(CONSTANTS.toggleItemApprovalUrl, data, function(response) {
		if (response.success) {
			getPendingPosts();
		} else {
			alert(response.message);
		}
	});
}

/*for the approved posts page*/
//function to get the approved posts
function getApprovedPosts() {
	$.get(CONSTANTS.getApprovedPostsUrl, function(response) {
		$(".approved-posts-res").html(response);
	})
}

//a function to show decline item modal
function showDeclineItemModal(itemObj) {
	$(".decline-item-id").val(itemObj.itemId);
	$(".decline-item-modal").modal("open");
}

/*for the users page*/
//function to get the users
function getUsers() {
	$.get(CONSTANTS.getUsersUrl, function(response) {
		$(".users-res").html(response);
	})
}

function viewUser(userObj) {
	$(".user-name").html(userObj.userName);
	$(".user-email").html(userObj.userEmail);
	$(".user-contact").html(userObj.userContact);
	$(".user-sign-date").html(userObj.userSignDate);
	$(".view-user-modal").modal("open");
}

//function to get the admin dashboard summary
function getDashboardSummary() {
	$.get(CONSTANTS.getDashboardSummaryUrl, function(response) {
		$(".admin-total-users").html(response.totalUsers);
		$(".admin-total-posts").html(response.totalPosts);
		$(".admin-total-categories").html(response.totalCategories);
	});
}

//function to get the admin dashboard users graph data
function getDashboardUsersGraphData() {
	$.get(CONSTANTS.getDashboardUsersGraphDataUrl, function(response) {
		drawChart("adminUsersChart",'line','User Signup Rate',response.months,response.users);
	});
}

//function to get the admin dashboard posts graph data
function getDashboardPostsGraphData() {
	$.get(CONSTANTS.getDashboardPostsGraphDataUrl, function(response) {
		drawChart("adminPostsChart",'bar','',response.months,response.posts);
	});
}


//function to draw the chart
function drawChart(elementId,chartType,title,labels,data) {

	var ctx = document.getElementById(elementId);
	var myChart = new Chart(ctx, {
	    type: chartType,
	    data: {
	        labels: labels,
	        datasets: [{
	            label: title,
	            data: data,
	            backgroundColor: [
	                'rgba(255, 99, 132, 0.2)',
	                'rgba(54, 162, 235, 0.2)',
	                'rgba(255, 206, 86, 0.2)',
	                'rgba(75, 192, 192, 0.2)',
	                'rgba(153, 102, 255, 0.2)',
	                'rgba(255, 159, 64, 0.2)'
	            ],
	            borderColor: [
	                'rgba(255,99,132,1)',
	                'rgba(54, 162, 235, 1)',
	                'rgba(255, 206, 86, 1)',
	                'rgba(75, 192, 192, 1)',
	                'rgba(153, 102, 255, 1)',
	                'rgba(255, 159, 64, 1)'
	            ],
	            borderWidth: 1
	        }]
	    },
	    options: {
	        scales: {
	            yAxes: [{
	                ticks: {
	                    beginAtZero:true
	                }
	            }]
	        }
	    }
	});
}