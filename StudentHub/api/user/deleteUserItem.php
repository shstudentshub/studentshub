<?php
	include "../db-config.php";
	$response = array();

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$itemId = intval($_POST['itemId']);

		$deleteQuery = "DELETE FROM items WHERE item_id = ?";
		$preparedQuery = $database->prepare($deleteQuery);
		$preparedQuery->bind_param('i',$itemId);
		
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