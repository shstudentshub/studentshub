<?php
	include "../db-config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		session_start();
		$response = array();
		$itemImgUploadDir = "../../uploads/items/";

		$publisherId = intval($_SESSION["userId"]);
		$itemId = intval($_SESSION["itemId"]);
		$itemPostDate = date("Y-m-d");
		$itemName = mysqli_real_escape_string($database,trim($_GET['itemName']));
		$itemImgOldImg = mysqli_real_escape_string($database,trim($_GET['itemImgOldImg']));
		$itemPrice = strval($_GET['itemPrice']);
		$itemLocation = mysqli_real_escape_string($database,trim($_GET['itemLocation']));
		$itemDetails = mysqli_real_escape_string($database,trim($_GET['itemDetails']));
		$itemCategory = intval($_GET['itemCategory']);
		$itemPriceTerm = mysqli_real_escape_string($database,trim($_GET['itemPriceTerm']));
		

		if (isset($_FILES["itemImage"])) {

			$itemImgExt = explode(".", $_FILES["itemImage"]["name"]);
			$newItemImgName = "User_".$publisherId."_".time().".".end($itemImgExt);
			unlink($itemImgUploadDir.$itemImgOldImg);

			move_uploaded_file($_FILES["itemImage"]["tmp_name"],$itemImgUploadDir.$newItemImgName);
			 
			$itemUpdateQuery = "UPDATE items SET item_name = ?,item_details = ?,item_category_id = ?,item_price = ?,item_location =?,item_publisher_id = ?,item_price_term = ?,item_img = ? WHERE item_id = ?";

			$preparedUpdateQuery = $database->prepare($itemUpdateQuery);
			$preparedInsertQuery->bind_param('ssississi',$itemName,$itemDetails,$itemCategory,$itemPrice,$itemLocation,$publisherId,$itemPriceTerm,,$newItemImgName,$itemId);

			if ($preparedUpdateQuery->execute()) { 

				$response["success"] = true;
				$response["message"] = "Item Updated Successfully.\nWaiting For Admin Review";
				header('Content-Type: application/json');
		        echo json_encode($response);
			} else {
				$response["success"] = false;
				$response["message"] = "Sorry, An Error Occured. Check Your Internet Connection And Try Again";
				header('Content-Type: application/json');
		        echo json_encode($response);
			}

		} else {

			$preparedUpdateQuery = $database->prepare($itemUpdateQuery);
			$preparedInsertQuery->bind_param('ssississi',$itemName,$itemDetails,$itemCategory,$itemPrice,$itemLocation,$publisherId,$itemPriceTerm,,$newItemImgName,$itemId);

			if ($preparedUpdateQuery->execute()) { 

				$response["success"] = true;
				$response["message"] = "Item Updated Successfully.\nWaiting For Admin Review";
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



