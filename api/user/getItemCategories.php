<?php 
	include "../db-config.php";

	$categoryArray = array();
	$getQuery = "SELECT * FROM categories ORDER BY category_name ASC";
	$result = $database->query($getQuery);

	if ($result->num_rows > 0) {
		echo "<option selected disabled value=''>Item Category</option>";
		while ($row = $result->fetch_assoc()) {
			$categoryId = $row['category_id'];
			$categoryName = $row['category_name'];

			echo "<option value='$categoryId'>$categoryName</option>";

		}
	} else {
		echo "<option selected disabled>No Categories Available</option>";
	}
