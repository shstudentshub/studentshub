<?php 
	session_start();
	$response = array();

	if (!isset($_SESSION['userId']) && !isset($_SESSION['visitor'])) {
		$_SESSION['visitor'] = time();
		
		$response["success"] = true;
		header('Content-Type: application/json');
        echo json_encode($response);
	} else {
		$response["success"] = false;
		header('Content-Type: application/json');
        echo json_encode($response);
	}