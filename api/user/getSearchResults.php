<?php
	include '../db-config.php';
	include '../helper-functions.php';
  ini_set('display_errors', 1);

	$query = mysqli_real_escape_string($database,trim($_POST['query']));
	$itemStatus = intval($itemStatusArray['Approved']);

	$hashString = md5(time());

	$searchTerm = "%{$query}%";
	$getQuery = "SELECT * FROM items INNER JOIN itemimages ON item_image_id = item_id WHERE (item_name LIKE '$searchTerm' OR item_details LIKE '$searchTerm' OR item_location LIKE '$searchTerm') AND item_approval_status = $itemStatus";



	$result = $database->query($getQuery);

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$itemId = $row['item_id'];
			$itemName = $row['item_name'];
			$itemImage = $row['image_names'];
			$itemLocation = $row['item_location'];
			$itemPrice = $row['item_price'];
      $curency = $row['item_currency'];

			$hashSection1 = substr($hashString,0,10);
			$hashSection2 = substr($hashString,11,10);
			$hashId = $hashSection1.$itemId.$hashSection2;
      $newString = truncateString($itemLocation,25,25);

      //Unserialize the image before use
      $image = unserialize($itemImage);
			echo "
				    <div class='card search-card' style='width: 18rem;'>
					  <img class='card-img-top search-card-img' src='uploads/items/$image[0]' alt='Card image cap'>
					  <div class='card-body'>
					    <p class='card-title'>
					    	<small><i class='fa fa-asterisk'></i> $itemName</small><br>
					    	<small><i class='fa fa-map-marker'></i>&nbsp; $newString</small><br>
					    	<small><i class='fa fa-info-circle'></i> $curency $itemPrice</i></small>
					    </p>
					    <a href='item-details?id=$hashId' class='btn btn-info btn-sm'>View</a>
					  </div>
					</div>
			";

		}
	} else {
		echo "<h6 class='text-center text-info'>Sorry, No Result Found For Search Term '$query'</h6>";


	}
