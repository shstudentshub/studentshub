<?php
	include "../db-config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$categoryId = intval($_POST['categoryId']);

		$deleteQuery = "DELETE FROM categories WHERE category_id = ?";
		$preparedQuery = $database->prepare($deleteQuery);
		$preparedQuery->bind_param('i',$categoryId);
		
		if ($preparedQuery->execute()) {
			echo "Category Deleted Successfully";
		} else {
			echo "There Was An Error. Check Your Internet Connection And Try Again";
		}

	}