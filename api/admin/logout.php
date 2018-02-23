<?php 
	session_start();
	session_unset();
	session_destroy();

	$response = array();
	$response['success'] = true;
	$response['message'] = "Logged Out Successfully";

	header('Content-Type: application/json');
	echo json_encode($response);