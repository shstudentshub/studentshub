<?php 
	include "../db-config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$response = array();

		$userFullname = mysqli_real_escape_string($database,trim($_POST['userFullname']));
		$userContact = mysqli_real_escape_string($database,trim($_POST['userContact']));
		$userEmail = mysqli_real_escape_string($database,trim($_POST['userEmail']));
		$userPassword = mysqli_real_escape_string($database,trim($_POST['userPassword']));

		//hash the password
		$userPassword = password_hash($userPassword, PASSWORD_BCRYPT);
		
		$requestQuery = "SELECT * FROM users WHERE user_email  = ?";

		$preparedQuery = $database->prepare($requestQuery);
		$preparedQuery->bind_param('s',$userEmail);
		$preparedQuery->execute();
		$result = $preparedQuery->get_result();
		if ($result->num_rows > 0) {

			$response["success"] = false;
			$response["message"] = "Your Email Has Already Been Used";
			header('Content-Type: application/json');
        	echo json_encode($response);

		} else {

			$insertQuery = "INSERT INTO users(user_name,user_email,user_contact,user_password) VALUES (?,?,?,?)";
			$preparedInsertQuery = $database->prepare($insertQuery);
			$preparedInsertQuery->bind_param('ssss',$userFullname,$userEmail,$userContact,$userPassword);

			if ($preparedInsertQuery->execute()) {
				session_start();
				$_SESSION["userEmail"] = $email;
				$response["success"] = true;
				$response["message"] = "Signup Successful";
				header('Content-Type: application/json');
		        echo json_encode($response);

			}else{
				$response["success"] = false;
				$response["message"] = "Please Check Your Internet Connection";
				header('Content-Type: application/json');
		        echo json_encode($response);
			}

		}
	}
