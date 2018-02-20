const CONSTANT_IMAGE = {
  	addUserItemUrl: "api/user/addUserItem.php"
}


//Some methods



//event handler to handle the submission of the items
$(".add-post-form").on("submit", function(event) {
	event.preventDefault();

	var formData = new FormData(),
		itemImg = document.getElementById('post-item-img').files,
		itemName = $(".post-item-name").val().trim(),
		itemPrice = $(".post-item-price").val(),
		itemLocation = $(".post-item-location").val().trim(),
		itemDetails = $(".post-item-details").val().trim(),
		itemCategory = $(".post-item-categories").val().trim(),
		itemPriceTerm = $(".post-item-price-term").val().trim();

	//validating the fields
	if ((itemImg.length < 1)) {
		showSnackBar("Please Select Item Image", "error");
	} else if ((itemImg.length > 0) && (itemImg[0].size > (3 * 1024 *1024))) {
		showSnackBar("Item Image Cannot Be Greater Than 5MB", "error");
	} else if (itemName == "") {
		showSnackBar("Please Provide The Item Name", "error");
	} else if (itemPrice == "") {
		showSnackBar("Please Provide The Item Price", "error");
	} else if (itemLocation == "") {
		showSnackBar("Please Provide The Item Location", "error");
	} else if (itemDetails == "") {
		showSnackBar("Please Provide The Item Details", "error");
	} else if (itemCategory == ""  || itemCategory == null || itemCategory == undefined) {
		showSnackBar("Please Provide The Item Category", "error");
	} else if (itemPriceTerm == "" || itemPriceTerm == null || itemPriceTerm == undefined) {
		showSnackBar("Please Provide The Item Price Term", "error");
	} else {
		//append the file to the formdata
    for (var i = 0; i < itemImg.length; i++) {
      formData.append("itemImage"+i,itemImg[i]);
    }


		var postItemUrl = CONSTANT_IMAGE.addUserItemUrl + "?itemName=" + itemName +
		"&itemPrice=" + itemPrice + "&itemLocation=" + itemLocation + "&itemDetails=" + itemDetails + "&itemCategory=" + itemCategory +
		"&itemPriceTerm=" + itemPriceTerm;

		$.ajax({
	    url: postItemUrl,
			type: "POST",
			data: formData,
			enctype: 'multipart/form-data',
			contentType: false,
			processData: false,
			success: function(response, textStatus, jqXHR){

			    if (response.success) {
			    	showSnackBar(response.message,"success");
			    	setTimeout(function() {
						$(".post-item-modal").modal("close");
						hideSnackBar();
					},1000);
					getUserPosts();
				} else if (!response.success) {
					showSnackBar(response.message,"error");
				} else {
					showSnackBar("Sorry, An Error Occured. Check Your Internet Connection And Try Again","error");
				}
			},
			error: function(error) {
				showSnackBar("Sorry, An Error Occured. Check Your Internet Connection And Try Again","error");
			}

	    });

	}
});
