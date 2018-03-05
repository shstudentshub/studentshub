<?php
	include "../db-config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$response = array();

		$userEmail = mysqli_real_escape_string($database,trim($_POST['userEmail']));
		$userPassword = mysqli_real_escape_string($database,trim($_POST['userPassword']));

		$requestQuery = "SELECT * FROM users WHERE user_email  = ?";

		$preparedQuery = $database->prepare($requestQuery);
		$preparedQuery->bind_param('s',$userEmail);
		$preparedQuery->execute();
		$result = $preparedQuery->get_result();
		if ($result->num_rows > 0) {
			session_start();

			$row = $result->fetch_assoc();
			if (password_verify($userPassword, $row["user_password"])) {

				$_SESSION["userId"] = $row["user_id"];
				$response["success"] = true;
				$response["message"] = "Login Successful";
				header('Content-Type: application/json');
				echo json_encode($response);

			} else {

				$response["success"] = false;
				$response["message"] = "Wrong Email Or Password";
				header('Content-Type: application/json');
		        echo json_encode($response);
			}
		} else {
			$response["success"] = false;
			$response["message"] = "Wrong Email Or Password";
			header('Content-Type: application/json');
		    echo json_encode($response);
		}
	}
