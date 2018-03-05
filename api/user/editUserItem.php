<?php 
  	include "../db-config.php";
  	$response = array();
  	

	  if($_SERVER['REQUEST_METHOD'] == 'POST'){
	  	$itemId = mysqli_real_escape_string($database, intval(trim($_GET['itemId'])));
	  	$itemName = mysqli_real_escape_string($database, trim($_GET['itemName']));
	  	$itemPrice = mysqli_real_escape_string($database, trim($_GET['itemPrice']));
	  	$itemLocation = mysqli_real_escape_string($database, trim($_GET['itemLocation']));
	  	$itemDetails = mysqli_real_escape_string($database, trim($_GET['itemDetails']));
	  	$itemCategory = mysqli_real_escape_string($database, intval(trim($_GET['itemCategory'])));
	  	$itemPriceTerm = mysqli_real_escape_string($database, trim($_GET['itemPriceTerm']));
	  	$tradeCurrency = mysqli_real_escape_string($database, trim($_GET['tradeCurrency']));
	  	$itemCondition = mysqli_real_escape_string($database, trim($_GET['itemCondition']));


	  	$editQuery = "UPDATE `items` SET `item_name`=?,`item_details`=?,`item_category_id`=?,`item_price`=?,`item_currency`=?,`item_location`=?,`item_price_term`=?,`item_condition`=? WHERE item_id=?";
	  	$prepareUpdateQuery = $database->prepare($editQuery);
	  	$prepareUpdateQuery->bind_param('ssisssssi',$itemName,$itemDetails,$itemCategory,$itemPrice,$tradeCurrency,$itemLocation,$itemPriceTerm,$itemCondition,$itemId);

	  	if($prepareUpdateQuery->execute()){
	  		$response["success"] = true;
	  		$response["message"] = "Item updated successfully";

	  		header("Content-Type: application/json");
	  		echo json_encode($response);

	  	}else{
	  		$response["success"] = false;
	  		$response["message"] = "Oops there is a problem updating your post";

	  		header("Content-Type: application/json");
	  		echo json_encode($response);

	  	}


	  }