const CONSTANT_IMAGE = {
  	addUserItemUrl: "api/user/imageuploads.php",
  	editUserItemUrl: "api/user/editUserItem.php"
}


//Some methods



//event handler to handle the submission of the items
$(".add-post-form").on("submit", function(event) {
	event.preventDefault();


	var formData = new FormData($(this)[0]),
		itemImg = document.getElementById('post-item-img').files,
		itemName = $(".post-item-name").val().trim(),
		itemPrice = $(".post-item-price").val(),
    	tradeCurrency = $(".tradeCurrency").val(),
		itemLocation = $(".post-item-location").val().trim(),
		itemDetails = $(".post-item-details").val().trim(),
		itemCategory = $(".post-item-categories").val(),
		itemPriceTerm = $(".post-item-price-term").val(),
		itemCondition = $(".post-item-item-condition").val();

    //function to check if image contains gif and is invalid
    checkImageValidity(itemImg);

	//validating the fields
	if ((itemImg.length < 1)) {
		showSnackBar("Please select valid item image", "error");
	} else if (itemImg.length > 5) {
		showSnackBar("Maximum image is only 5", "error");
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
	}else if(tradeCurrency == "" || tradeCurrency == null || tradeCurrency == undefined){
    	showSnackBar("Please Provide currency To Trade In", "error");
	}else if(itemCondition == "" || itemCondition == null || itemCondition == undefined){
	    showSnackBar("Please Provide Item Condition", "error");
	}else {
		//append the file to the formdata
    //for (var i = 0; i < itemImg.length; i++) {
      //formData.append("itemImage"+i,itemImg[i]);
    //}


		var postItemUrl = CONSTANT_IMAGE.addUserItemUrl + "?itemName=" + itemName +
		"&itemPrice=" + itemPrice + "&itemLocation=" + itemLocation + "&itemDetails=" + itemDetails + "&itemCategory=" + itemCategory +
		"&itemPriceTerm=" + itemPriceTerm + "&tradeCurrency=" + tradeCurrency + "&itemCondition=" + itemCondition;

		$.ajax({
	    url: postItemUrl,
			type: "POST",
			data: formData,
			enctype: 'multipart/form-data',
			contentType: false,
			processData: false,
			success: function(response, textStatus, jqXHR){
        console.log(response);
			    if(response.success){
            console.log(response.success);
			    	showSnackBar(response.message,"success");

			    	setTimeout(function() {
						$("#add-post-modal").modal("hide");
						hideSnackBar();
					},1000);
					getUserPosts();
				} else if (!response.success) {
					showSnackBar(response.message,"error");
				} else {
					showSnackBar("Sorry, contact Administrator And Try Again Later","error");
				}
			},
			error: function(error) {
        console.log(error);
				showSnackBar("Sorry, An Error Occured. Check Your Internet Connection And Try Again","error");
			}

	    });

	}

});

//function to check image extensions
function checkImageValidity(image){
  var fileType = ["image/jpeg","image/png","image/jpg"];
  for (var i = 0; i < image.length; i++) {
    if($.inArray(image[i].type, fileType) < 0){
      showSnackBar("Image contains invalid format","error");
      $("#multiuploads")[0].reset();
      document.getElementById("post-item-img").value = "";
      $(".post-item-img-label").html("Upload another image").css('color','#e42c2c');
    }
  }
}



$(".edit-post-form").on("submit", function(event) {
	event.preventDefault();


	var formData = new FormData($(this)[0]),
		itemName = $(".edit-post-item-name").val().trim(),
		itemId = $(".edit-Item-Id").val(),
		itemPrice = $(".edit-post-item-price").val(),
    	tradeCurrency = $(".edit-tradeCurrency").val(),
		itemLocation = $(".edit-post-item-location").val().trim(),
		itemDetails = $(".edit-post-item-details").val().trim(),
		itemCategory = $(".edit-post-item-categories").val(),
		itemPriceTerm = $(".edit-post-item-price-term").val(),
		itemCondition = $(".edit-post-item-item-condition").val();


	//validating the fields

	if (itemName == "") {
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
	}else if(tradeCurrency == "" || tradeCurrency == null || tradeCurrency == undefined){
    	showSnackBar("Please Provide currency To Trade In", "error");
	}else if(itemCondition == "" || itemCondition == null || itemCondition == undefined){
	    showSnackBar("Please Provide Item Condition", "error");
	}else {
		//append the file to the formdata
    //for (var i = 0; i < itemImg.length; i++) {
      //formData.append("itemImage"+i,itemImg[i]);
    //}


		var postItemUrl = CONSTANT_IMAGE.editUserItemUrl + "?itemId=" + itemId + "&itemName=" + itemName +
		"&itemPrice=" + itemPrice + "&itemLocation=" + itemLocation + "&itemDetails=" + itemDetails + "&itemCategory=" + itemCategory +
		"&itemPriceTerm=" + itemPriceTerm + "&tradeCurrency=" + tradeCurrency + "&itemCondition=" + itemCondition;

		//console.log(postItemUrl);
		$.ajax({
	    url: postItemUrl,
			type: "POST",
			data: formData,
			enctype: 'multipart/form-data',
			contentType: false,
			processData: false,
			success: function(response, textStatus, jqXHR){
        console.log(response);
			    if(response.success){
            console.log(response.success);
			    	showSnackBar(response.message,"success");

			    	setTimeout(function() {
						$("#edit-post-modal").modal("hide");
						hideSnackBar();
					},1000);
					getUserPosts();
				} else if (!response.success) {
					showSnackBar(response.message,"error");
				} else {
					showSnackBar("Sorry, contact Administrator And Try Again Later","error");
				}
			},
			error: function(error) {
        console.log(error);
				showSnackBar("Sorry, An Error Occured. Check Your Internet Connection And Try Again","error");
			}

	    });

	} 

});