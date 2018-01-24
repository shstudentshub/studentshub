<?php 
	include "../db-config.php";
	session_start();

	$userId = intval($_SESSION["userId"]);

	$getQuery = "SELECT * FROM users WHERE user_id = $userId";

	$result = $database->query($getQuery);

	$row = $result->fetch_assoc();

	$userName = $row["user_name"];
	$userContact = $row["user_contact"];
	$userEmail = $row["user_email"];

	echo "
		

	";