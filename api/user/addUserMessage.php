<?php
	include "../db-config.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$response = array();

		$senderName = mysqli_real_escape_string($database,trim($_POST['senderName']));
		$senderEmail = mysqli_real_escape_string($database,trim($_POST['senderEmail']));
		$senderMessage = mysqli_real_escape_string($database,trim($_POST['senderMessage']));

		$insertQuery = "INSERT INTO user_contact_messages(sender_name,sender_email,sender_message) VALUES(?,?,?)";
		$preparedQuery = $database->prepare($insertQuery);
		$preparedQuery->bind_param("sss",$senderName,$senderEmail,$senderMessage);

		if ($preparedQuery->execute()) {
			$response["success"] = true;
			$response["message"] = "Your Message Has Been Sent.";
			header('Content-Type: application/json');
		    echo json_encode($response);
		} else {
			$response["success"] = false;
			$response["message"] = "Could Not Send Your Message. Please Check Your Internet Connection.";
			header('Content-Type: application/json');
		    echo json_encode($response);
		}

	}