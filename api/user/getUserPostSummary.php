<?php 
	include "../db-config.php";
	session_start();

	$publisherId = intval($_SESSION["userId"]);

	$totalPosts = 0;
	$rejectedPosts = 0;
	$pendingPosts = 0;
	$approvedPosts = 0;
	$response = array();

	#query to get the total number of posts of the user
	$getTotalPostQuery = "SELECT item_approval_status FROM items WHERE item_publisher_id = $publisherId";

	$result = $database->query($getTotalPostQuery);

	#if the total number of posts is > 0
	if($result->num_rows > 0) {
		$totalPosts = $result->num_rows;

		while ($row = $result->fetch_assoc()) {
			$approvalStatus = intval($row["item_approval_status"]);

			if ($approvalStatus == 0) {
				$pendingPosts++;
			} else if ($approvalStatus == 1) {
				$approvedPosts++;
			} else if ($approvalStatus == 2) {
				$rejectedPosts++;
			}
		}

		$response["total"] = $totalPosts;
		$response["pending"] = $pendingPosts;
		$response["approved"] = $approvedPosts;
		$response["rejected"] = $rejectedPosts;

		header('Content-Type: application/json');
		echo json_encode($response);
	} else {
		$response["total"] = $totalPosts;
		$response["pending"] = $pendingPosts;
		$response["approved"] = $approvedPosts;
		$response["rejected"] = $rejectedPosts;

		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	



	
