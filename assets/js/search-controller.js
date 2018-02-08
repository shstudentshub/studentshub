//an object to get all constant varaibles
var SEARCH_CONSTANTS = {
	getSearchCategoriesUrl: "api/user/getSearchCategories.php",
	getCategoryItemsUrl: "api/user/getCategoryItems.php"
}

getSearchCategories();
getInitCategoryItems();

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
	console.log(data);

	$.post(SEARCH_CONSTANTS.getCategoryItemsUrl,data, function(response) {
		$(".search-res").html(response)
	})
}
