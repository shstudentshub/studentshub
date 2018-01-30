<?php 
	include "../db-config.php";
	include "../helper-functions.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$approvalStatus = intval($_POST['itemApprovalStatus']);

		if ($approvalStatus == $itemStatusArray["Pending"] || $approvalStatus == $itemStatusArray["Approved"]) {
		
			$postId = intval($_POST['itemId']);
			$response = array();
			$message = "";
			
			$updateQuery = "UPDATE items SET item_approval_status = ? WHERE item_id = ?";
			$preparedQuery = $database->prepare($updateQuery);
			$preparedQuery->bind_param('ii',$approvalStatus,$postId);

			if ($preparedQuery->execute()) {

				if ($approvalStatus == 1) {
					$message = "Item Approved";
				} else if ($approvalStatus == 0) {
					$message = "Item Pending";
				} else if ($approvalStatus == 2) {
					$message = "Item Declined";
				}

				$response['success'] = true;
				$response['message'] = $message;
				header('Content-Type: application/json');
				echo json_encode($response);
				
			} else {

				$response['success'] = false;
				$response['message'] = "Error. Check Your Internet Connection And Try Again.";
				header('Content-Type: application/json');
				echo json_encode($response);
			}

		} else if ($approvalStatus == $itemStatusArray["Declined"]) {

			$postId = intval($_POST['itemId']);
			$declineMessage = mysqli_real_escape_string($database,$_POST['declineMessage']);
			$response = array();
			$message = "";
			
			$updateQuery = "UPDATE items SET item_approval_status = ?, item_approval_message = ? WHERE item_id = ?";
			$preparedQuery = $database->prepare($updateQuery);
			$preparedQuery->bind_param('isi',$approvalStatus,$declineMessage,$postId);

			if ($preparedQuery->execute()) {

				$message = "Item Declined";

				$response['success'] = true;
				$response['message'] = $message;
				header('Content-Type: application/json');
				echo json_encode($response);
				
			} else {

				$response['success'] = false;
				$response['message'] = "Error. Check Your Internet Connection And Try Again.";
				header('Content-Type: application/json');
				echo json_encode($response);
			}
		}
	}
