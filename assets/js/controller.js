CONSTANTS = {
	getHomeCategoriesUrl: "api/user/getHomeCategories.php",
	getHomeRecentPostsUrl: "api/user/getHomeRecentPosts.php",
	userSignupUrl: "api/user/signup.php",
	userLoginUrl: "api/user/login.php",
	userPostsUrl: "api/user/getUserPosts.php",
	userPendingPostsUrl: "api/user/getUserPendingPosts.php",
	userApprovedPostsUrl: "api/user/getUserApprovedPosts.php",
	userDeclinedPostsUrl: "api/user/getUserDeclinedPosts.php",
	getItemCategoryUrl: "api/user/getItemCategories.php",
	deleteUserItemUrl: "api/user/deleteUserItem.php",
	getUserPostsGraphDataUrl: "api/user/getUserPostsGraph.php",
	getUserPostSummaryUrl: "api/user/getUserPostSummary.php",
	getUserPendingBadgeURL: "api/user/getUserPendingBadge.php",
	getUserApproveBadgeURL: "api/user/getUserApproveBadge.php",
	getUserRejectedBadgeURL: "api/user/getUserRejectedBadge.php",
	getUserAllBadgeURL : "api/user/getUserAllBadge.php"
}

//initialization of some methods
getHomeCategories();
getUserPosts();
getUserPendingPosts();
getuserApprovedPosts();
getuserDeclinedPosts();
getItemCategories();
getUserPostsGraphData();
getUserPostSummary();
getUserNewBadge();
getUserApproveBadge();
getUserRejectedBadge();
getUserAllBadge();
getHomeRecentPosts();

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
					console.log('successful login');
					window.location.href = 'index';
					hideSnackBar();
				},1000);
			} else if(!response.success) { //else if login is not successful,
				showSnackBar(response.message,"error");
			}
		});
	}
});



$(".delete-post-form").on("submit", function(event) {
	event.preventDefault();

	var itemId = $(".delete-item-id").val();
	var itemImg = $(".delete-item-img").val();
	var data = $.param({
			itemId: itemId,
			itemImg: itemImg
		});

console.log(data);
	$.post(CONSTANTS.deleteUserItemUrl,data, function(response) {
    console.log(response);
		if (response.success) {

			showSnackBar(response.message,"success");
			setTimeout(function() {
				$(".delete-item-modal").modal("close");
				hideSnackBar();
			},1000);
			getUserPosts();
		} else if (!response.success) {
			showSnackBar(response.message,"error");
		} else {
			showSnackBar("Sorry, An Error Occured. Check Your Internet Connection And Try Again","error");
		}
	});
});

//event handlers to display the item image if it is selected
$(".post-item-img").on("change", function(){
    var file = document.getElementById('post-item-img').files;

    $(".post-item-img-label").html("Item Photo Selected").css('color','#ffff');

	var reader = new FileReader();
	reader.onload = function (e) {
	    $(".post-item-img-preview").attr('src', e.target.result);
	}

	reader.readAsDataURL(file[0]);
});

//event to hide the snackbar if a user starts to enter something after an error
$(".user-signup-form .validate, .user-signin-form .validate, .add-post-form .validate").on("input", function() {
	hideSnackBar();
});

$(".add-post-form .post-item-img, .add-post-form .item-select").on("change", function() {
	hideSnackBar();
});

//event handler to handle the search of items
$(".search-btn").on('click',function(event) {
	event.preventDefault();
	var query = $(".index-search").val().trim();
	if (query != "") {
		window.location.href = 'search?q=' + query;
	}
})

$(".search-btn-sm").on('click',function(event) {
	event.preventDefault();
	var query = $(".index-search-sm").val().trim();
	if (query != "") {
		window.location.href = 'search?q=' + query;
	}
})

//some methods to make requests from api
function getHomeCategories() {
	$.get(CONSTANTS.getHomeCategoriesUrl, function(response) {
		$(".nav-categories, .nav-categories-sm").html(response);
	})
}

//function to get the user's posts
function getUserPosts() {
	$.get(CONSTANTS.userPostsUrl, function(response) {
		$(".user-posts").html(response);
	})
}

//function to show pending use items
function getUserPendingPosts() {
	$.get(CONSTANTS.userPendingPostsUrl, function(response) {
		$(".pending-posts").html(response);
	})
}

//function to show the approved posts
function getuserApprovedPosts() {
	$.get(CONSTANTS.userApprovedPostsUrl, function(response) {
		$(".approved-posts").html(response);
	})
}

//function to show uer approved posts
function getuserDeclinedPosts() {
	$.get(CONSTANTS.userDeclinedPostsUrl, function(response) {
		$(".declined-posts").html(response);
	})
}


//function to delete user's post
function showDeleteUserItemAlert(itemObj) {
	$(".delete-item-id").val(itemObj.itemId);
	$(".delete-item-img").val(itemObj.itemImg);
	$(".delete-item-modal").modal("open");
}

//function to delete user's post data for graph
function getUserPostsGraphData() {
	$.get(CONSTANTS.getUserPostsGraphDataUrl, function(response) {
		drawChart("userChart",'line','Frequency Of Your Item Post',response.months,response.posts);
	})
}

function getUserPostSummary() {
	$.get(CONSTANTS.getUserPostSummaryUrl, function(response) {
		$(".user-total-posts").html(response.total);
		$(".user-approved-posts").html(response.approved);
		$(".user-pending-posts").html(response.pending);
		$(".user-rejected-posts").html(response.rejected);
	})
}

//function to get the item categories
function getItemCategories() {
	$.get(CONSTANTS.getItemCategoryUrl, function(response) {
		$(".post-item-categories, .edit-item-categories").html(response);
	});
}

//function to get the recent posts for the index page
function getHomeRecentPosts() {
	$.get(CONSTANTS.getHomeRecentPostsUrl, function(response) {
			console.log(response);
		if (response.success) {
			$(".recent-items-lg-div").html(response.lgTemplate);
			$(".mobile-slide-div").html(response.smTemplate);
		}

	})
}

//Function to get New Badges
function getUserNewBadge(){
	$.get(CONSTANTS.getUserPendingBadgeURL,function(response){
		$(".badge").html(response);
	})
}

function getUserApproveBadge(){
	$.get(CONSTANTS.getUserApproveBadgeURL,function(response){
		$(".appBadge").html(response);
	})
}

function getUserRejectedBadge(){
	$.get(CONSTANTS.getUserRejectedBadgeURL,function(response){
		$(".decBadge").html(response);
	})
}

function getUserAllBadge(){
	$.get(CONSTANTS.getUserAllBadgeURL,function(response){
		$(".allBadge").html(response);
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
  setTimeout(function(){
    hideSnackBar();
  },6000);
}

//functioin to hide snackbar
function hideSnackBar() {
	$(".snackbar").removeClass("show").addClass("hide");
	$(".snackbar-icon-error,.snackbar-icon-success, .snackbar-loader").show();
	$(".snackbar-text").html('');
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
