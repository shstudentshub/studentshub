<?php
	include '../db-config.php';
	include '../helper-functions.php';

	$categoryName = mysqli_real_escape_string($database,$_POST['categoryName']);
	$categoryId = intval($_POST['categoryId']);
	$getQuery = '';
	$itemStatus = $itemStatusArray['Approved'];

	$hashString = md5(time());

	if ($categoryName == 'all') {
		$getQuery = "SELECT * FROM items INNER JOIN itemimages ON item_image_id = item_id WHERE item_approval_status = $itemStatus";
	} else {
		$getQuery = "SELECT * FROM items INNER JOIN categories ON item_category_id = category_id INNER JOIN itemimages ON item_image_id = item_id WHERE item_approval_status = $itemStatus AND item_category_id = $categoryId";
	}

	$result = $database->query($getQuery);

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$itemId = $row['item_id'];
			$itemName = $row['item_name'];
			$itemImage = $row['image_names'];
			$itemLocation = $row['item_location'];
			$itemPrice = $row['item_price'];
      $curency = $row['item_currency'];

      $newString = truncateString($itemLocation,25,25);

			$hashSection1 = substr($hashString,0,10);
			$hashSection2 = substr($hashString,11,10);
			$hashId = $hashSection1.$itemId.$hashSection2;

      //unserialize image for further process
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
					</div>";

		}
	} else {
		if ($categoryName == 'all') {
		 	echo "<h6 class='text-center text-info'>Sorry, No Items Available</h6>";
		} else {
			echo "<h6 class='text-center text-info'>Sorry, No Items For Your Chosen Category</h6>";
		}


	}
