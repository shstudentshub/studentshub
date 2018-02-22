<?php
	include "../db-config.php";
	$response = array();
  ini_set('display_errors', 1);

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		#get the parameters
		$itemId = intval($_POST['itemId']);

		//Fetch all images to be deleted
    $newQuery = "SELECT * FROM itemimages WHERE item_image_id=$itemId";
    $result = $database->query($newQuery);

    while($row = $result->fetch_assoc()){
      $imageNames = $row['image_names'];
    }
		#delete the image
    //Check the size first
    $newImageName = unserialize($imageNames);
    $imageSize = sizeof($newImageName);

    for ($i=0; $i < $imageSize ; $i++) {
      unlink("../../uploads/items/".$newImageName[$i]);
    }


    # Query to delete images first because of the Foreign Key
    $query = "DELETE FROM itemimages WHERE item_image_id=?";
    $prepare = $database->prepare($query);
    $prepare->bind_param('i',$itemId);
    $prepare->execute();

		#query to delete the item at the id
		$deleteQuery = "DELETE FROM items WHERE item_id = ?";
		$preparedQuery = $database->prepare($deleteQuery);
		$preparedQuery->bind_param('i',$itemId);

		#if deletion is successful or not give appropriate response
		if ($preparedQuery->execute()) {
			$response["success"] = true;
			$response["message"] = "Item Deleted Successfully.";
			header('Content-Type: application/json');
		    echo json_encode($response);
		} else {
			$response["success"] = false;
			$response["message"] = "Could Not Delete Item.";
			header('Content-Type: application/json');
		    echo json_encode($response);
		} 

	}
