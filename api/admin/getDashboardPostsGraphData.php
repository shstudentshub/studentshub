<?php 
	include "../db-config.php";

	$monthNames = array();
	$monthPosts = array();
	$response = array();

	$getQuery = "SELECT MONTH(item_post_date) AS post_month,YEAR(item_post_date) AS post_year, count(*) AS post_number FROM items GROUP BY MONTH(item_post_date)";

	$result = $database->query($getQuery);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$postMonthNumber = $row["post_month"];
			$postYear = $row["post_year"];
			$postNumber = intval($row["post_number"]);

			$postMonthName = date('M', mktime(0,0,0,$postMonthNumber,10))." $postYear";

			array_push($monthNames,$postMonthName);
			array_push($monthPosts,$postNumber);
		}

		$response["months"] = $monthNames;
		$response["posts"] = $monthPosts;
		header('Content-Type: application/json');
		echo json_encode($response);

	} else {
		$response["months"] = [];
		$response["posts"] = [];
		header('Content-Type: application/json');
		echo json_encode($response);
	}
