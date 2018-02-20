<?php
	#include the database configuration file
	include "../db-config.php";

	#if the request made was a post request
	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		#get the username and password of the admin
		$username = mysqli_real_escape_string($database,$_POST['username']);
		$password = mysqli_real_escape_string($database,$_POST['password']);
		$response = array(); #initialize an array to hold response values

		#write transaction code with parameters to be bound later
		$loginQuery = "SELECT * FROM admin WHERE admin_username = ? AND admin_password = ?";
		$preparedQuery = $database->prepare($loginQuery); #prepare the query
		$preparedQuery->bind_param('ss',$username,$password); #bind values to the parameters
		$preparedQuery->execute(); #execute the transaction
		$result = $preparedQuery->get_result(); #put the result into a variable

		if ($result->num_rows > 0) { #if one or more rows were returned from the transaction
			$row = $result->fetch_assoc(); #convert the values of the rows into an array
			session_start(); #start a session to store some values
			$_SESSION["adminUsername"] = $row['admin_username']; #store the admin username
			$_SESSION["User"] = $row['admin_id'];

			#set success response values and send them
			$response['success'] = true;
			$response['message'] = "Logged In Successfully";
			header('Content-Type: application/json');
			echo json_encode($response);
		} else {
			#set failure response values and send them
			$response['success'] = false;
			$response['message'] = "Wrong Username Or Password";
			header('Content-Type: application/json');
			echo json_encode($response);
		}
	}
