<?php 
	include "../db-config.php";

	$monthNames = array();
	$monthUsers = array();
	$response = array();

	$getQuery = "SELECT MONTH(user_sign_date) AS signup_month,YEAR(user_sign_date) AS signup_year, count(*) AS total_users FROM users GROUP BY MONTH(user_sign_date)";

	$result = $database->query($getQuery);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$signupMonthNumber = $row["signup_month"];
			$signupYear = $row["signup_year"];
			$signupNumber = intval($row["total_users"]);

			$signupMonthName = date('M', mktime(0,0,0,$signupMonthNumber,10))." $signupYear";

			array_push($monthNames,$signupMonthName);
			array_push($monthUsers,$signupNumber);
		}

		$response["months"] = $monthNames;
		$response["users"] = $monthUsers;
		header('Content-Type: application/json');
		echo json_encode($response);

	} else {
		$response["months"] = [];
		$response["users"] = [];
		header('Content-Type: application/json');
		echo json_encode($response);
	}
