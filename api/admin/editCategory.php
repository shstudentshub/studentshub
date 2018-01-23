<?php 
	include "../db-config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$categoryId = intval($_POST['categoryId']);
		$categoryName = mysqli_real_escape_string($database,trim($_POST['categoryName']));
		
		
		$requestQuery = "SELECT * FROM categories WHERE category_name = ?";
		$preparedQuery = $database->prepare($requestQuery);
		$preparedQuery->bind_param('s',$categoryName);
		$preparedQuery->execute();
		$result = $preparedQuery->get_result();
		if ($result->num_rows > 0) {
			echo "exists";
		} else {
			$updateQuery = "UPDATE categories SET category_name = ? WHERE category_id = ?";
			$preparedUpdateQuery = $database->prepare($updateQuery);
			$preparedUpdateQuery->bind_param('si',$categoryName, $categoryId);
			
			if ($preparedUpdateQuery->execute()) {
				echo "updated";
			}else{
				echo "error";
			}
		}
	}
