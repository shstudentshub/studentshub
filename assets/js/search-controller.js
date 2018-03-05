//an object to get all constant varaibles
var SEARCH_CONSTANTS = {
	getSearchCategoriesUrl: "api/user/getSearchCategories.php",
	getCategoryItemsUrl: "api/user/getCategoryItems.php",
	getSearchResultsUrl: "api/user/getSearchResults.php"
}

getSearchCategories();
getInitCategoryItems();

//event handler to handle real time search
$(".main-search").keyup(function(event) {
	event.preventDefault();

	var query = $(this).val().trim();
	if (query != "") {
		$(".search-res").html("<img src='assets/img/loader.gif' height='50px' width='50px' style='margin-left: 40%;'>");
		var data = $.param({
			query:query
		});

		$.post(SEARCH_CONSTANTS.getSearchResultsUrl,data, function(response) {
			$(".search-res").html(response)
		})
	} else {
		var categoryObj = {
			categoryName: 'all',
			categoryId: 0
		};

		getSideCategoryItems(categoryObj);
	}
});

//events and functions
function getSearchCategories() {
	$.get(SEARCH_CONSTANTS.getSearchCategoriesUrl, function(response) {
		$(".search-categories").html(response);
	})
}

function getInitCategoryItems() {
	var categoryName = localStorage.getItem('categoryName');
	var categoryId = localStorage.getItem('categoryId');
	var data = $.param({
		categoryName: categoryName,
		categoryId: categoryId
	});

	$.post(SEARCH_CONSTANTS.getCategoryItemsUrl,data, function(response) {
		$(".search-res").html(response)
	})
}

function getSideCategoryItems(categoryObj) {
	//$('.button-collapse').sideNav('hide');
	var data = $.param({
		categoryName: categoryObj.categoryName,
		categoryId: categoryObj.categoryId
	});

	$.post(SEARCH_CONSTANTS.getCategoryItemsUrl,data, function(response) {
		$(".search-res").html(response);
		closeSideNav();
	})
}

//Function for going back in search Category
function back(){
  window.history.back();
}

$(".preview-item").on("click", function() {
	var currentImageSrc = $(this).attr("src");
	$(".preview-div").attr("src",currentImageSrc);
});
