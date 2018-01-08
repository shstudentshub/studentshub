<?php 
	include "../db-config.php";

	$categoryArray = array();
	$counter = 1;
	$getQuery = "SELECT * FROM categories ORDER BY category_name ASC";
	$result = $database->query($getQuery);

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$categoryId = $row['category_id'];
			$categoryName = $row['category_name'];

			/*$categoryArray["categoryName"] = $categoryName;
			$categoryArray["categoryId"] = intval($categoryId);*/

			echo "<li><a href=''>$categoryName</a></li>";
		}
	} else {
		echo "<li><a href=''>No Categories Available</a></li>";
	}	