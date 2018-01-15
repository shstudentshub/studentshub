<?php 
	include "../db-config.php";
	session_start();

	$userId = intval($_SESSION["userId"]);

	$getQuery = "SELECT * FROM items WHERE item_publisher_id = $userId ORDER BY item_id DESC";
	$result = $database->query($getQuery);

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			
		}
	} else {
		echo "
			<div class='panel custom-bg-lt'>
				You Have Not Posted Any Items Yet
			</div>
		";
	}	