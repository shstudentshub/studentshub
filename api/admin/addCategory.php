<?php 
	include "../db-config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$categoryName = mysqli_real_escape_string($database,trim($_POST['categoryName']));
		
		$requestQuery = "SELECT * FROM categories WHERE category_name = ?";
		$preparedQuery = $database->prepare($requestQuery);
		$preparedQuery->bind_param('s',$categoryName);
		$preparedQuery->execute();
		$result = $preparedQuery->get_result();
		if ($result->num_rows > 0) {
			echo "exists";
		} else {
			$insertQuery = "INSERT INTO categories(category_name) VALUES (?)";
			$preparedInsertQuery = $database->prepare($insertQuery);
			$preparedInsertQuery->bind_param('s',$categoryName);
			
			if ($preparedInsertQuery->execute()) {
				echo "added";
			}else{
				echo "error";
			}
		}
	}
