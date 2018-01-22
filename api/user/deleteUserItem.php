<?php
	include "../db-config.php";
	$response = array();

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		#get the parameters
		$itemId = intval($_POST['itemId']);
		$itemImg = $_POST['itemImg'];

		#delete the image
		unlink("../../uploads/items/".$itemImg);

		#query to delete the item at the id
		$deleteQuery = "DELETE FROM items WHERE item_id = ?";
		$preparedQuery = $database->prepare($deleteQuery);
		$preparedQuery->bind_param('i',$itemId);
		
		#if deletion is successful or not give appropriate response
		if ($preparedQuery->execute()) {
			$response["success"] = true;
			$response["message"] = "Item Deleted Successfully.";
			header('Content-Type: application/json');
		    echo json_encode($response);
		} else {
			$response["success"] = false;
			$response["message"] = "Could Not Delete Item.";
			header('Content-Type: application/json');
		    echo json_encode($response);
		}

	}