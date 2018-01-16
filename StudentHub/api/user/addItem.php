<?php
	include "../db-config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		session_start();
		$response = array();
		$itemImgUploadDir = "../../uploads/items/";

		$publisherId = intval($_SESSION["userId"]);
		$itemPostDate = date("Y-m-d");
		$itemName = mysqli_real_escape_string($database,trim($_GET['itemName']));
		$itemPrice = strval($_GET['itemPrice']);
		$itemLocation = mysqli_real_escape_string($database,trim($_GET['itemLocation']));
		$itemDetails = mysqli_real_escape_string($database,trim($_GET['itemDetails']));
		$itemCategory = intval($_GET['itemCategory']);
		$itemPriceTerm = mysqli_real_escape_string($database,trim($_GET['itemPriceTerm']));
		

		if (isset($_FILES["itemImage"])) {


			$itemImgExt = explode(".", $_FILES["itemImage"]["name"]);
			$newItemImgName = "User_".$publisherId."_".time().".".end($itemImgExt);

			move_uploaded_file($_FILES["itemImage"]["tmp_name"],$itemImgUploadDir.$newItemImgName);
			 
			$itemInsertQuery = "INSERT INTO items (item_name,item_details,item_category_id,item_price,item_location,item_publisher_id,item_price_term,item_post_date,item_img) VALUES(?,?,?,?,?,?,?,?,?)";

			$preparedInsertQuery = $database->prepare($itemInsertQuery);
			$preparedInsertQuery->bind_param('ssississs',$itemName,$itemDetails,$itemCategory,$itemPrice,$itemLocation,$publisherId,$itemPriceTerm,$itemPostDate,$newItemImgName);

			if ($preparedInsertQuery->execute()) { 

				$response["success"] = true;
				$response["message"] = "Item Posted Successfully.\nWaiting For Admin Review";
				header('Content-Type: application/json');
		        echo json_encode($response);
			} else {
				$response["success"] = false;
				$response["message"] = "Sorry, An Error Occured. Check Your Internet Connection And Try Again";
				header('Content-Type: application/json');
		        echo json_encode($response);
			}

		}
	}



