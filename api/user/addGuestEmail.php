<?php
	include "../db-config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$response = array();

		$guestEmail = mysqli_real_escape_string($database,trim($_POST['guestEmail']));

		$requestQuery = "SELECT * FROM guest_emails WHERE email_address  = ?";

		$preparedQuery = $database->prepare($requestQuery);
		$preparedQuery->bind_param('s',$guestEmail);
		$preparedQuery->execute();
		$result = $preparedQuery->get_result();
		if ($result->num_rows > 0) {
			$response["success"] = false;
			$response["message"] = "You Are Already In Our Mailing List. Thanks.";
			header('Content-Type: application/json');
			echo json_encode($response);
		} else {
			$insertQuery = "INSERT INTO guest_emails(email_address) VALUES(?)";
			$preparedInsertQuery = $database->prepare($insertQuery);
			$preparedInsertQuery->bind_param('s',$guestEmail);
			if ($preparedInsertQuery->execute()) {
				$response["success"] = true;
				$response["message"] = "You Successfully Signed Up For Our News Letters";
				header('Content-Type: application/json');
				echo json_encode($response);
			}
			
		}
	}

	$database->close();