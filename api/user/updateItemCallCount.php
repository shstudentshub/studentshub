<?php 
	
	include "../db-config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$response = array();

		$itemId = intval($_POST['itemId']);
		
		$getQuery = "SELECT item_calls FROM items WHERE item_id = $itemId";
		$getResult = $database->query($getQuery);

		$row = $getResult->fetch_assoc();

		$itemCallsCount = intval($row["item_calls"]);
		$itemCallsCount++;

		$insertQuery = "UPDATE items SET item_calls = $itemCallsCount WHERE item_id = $itemId";
		$insertResult = $database->query($insertQuery);

		echo true;
	}