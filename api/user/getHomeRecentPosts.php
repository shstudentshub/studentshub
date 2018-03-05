<?php
	include '../db-config.php';
	include '../helper-functions.php';

	$itemStatus = $itemStatusArray['Approved'];
	$response = array();

	$hashString = md5(time());
	
	$getQuery = "SELECT * FROM items WHERE item_approval_status = $itemStatus ORDER BY item_id DESC LIMIT 5";
  $getQuery = "SELECT * FROM items INNER JOIN itemimages ON item_image_id = item_id WHERE item_approval_status = $itemStatus ORDER BY item_id DESC LIMIT 6";


	$result = $database->query($getQuery);

	$lgTemplate = "";
	$smTemplate = "";

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

      $image = unserialize($itemImage);

			$lgTemplate.=  "

				<section class='col-md-2 col-sm-12 recent'>
		            <a href='item-details?id=$hashId' title='View Item'>
		                <section class='recent-item'>
		                    <img src='uploads/items/$image[0]' class='img-fluid'><br>
                        	<span class='curPrice'>$curency $itemPrice</span>
		                    <a href='item-details?id=$hashId'><p class='center-align' style='color:#000;font-weight:bold'><i class='fa fa-eye-open'></i> $itemName</p></a>
		                </section>
		            </a>
		        </section>
			";

			$smTemplate.= "
				<section class='recent-item-sm'>
	                <a class='carousel-item' href='#one!'>
	                    <img src='uploads/items/$image[0]' class='recent-item-sm-img'><br>
                      <span class='curPrice'>$curency $itemPrice</span>
	                    <a href='item-details?id=$hashId'><p class='center-align' style='color:#000;font-weight:bold'><i class='fa fa-eye-open'></i>$itemName</p></a>
	                </a>
	            </section>
			";
		}


		$response["success"] = true;
		$response["lgTemplate"] = $lgTemplate;
		$response["smTemplate"] = $smTemplate;
		header('Content-Type: application/json');
		echo json_encode($response);
	} else {
		if ($categoryName == 'all') {
		 	echo "";
		} else {
			echo "<li><a href=''>No Items For Your Chosen Category</a></li>";
		}


	}
