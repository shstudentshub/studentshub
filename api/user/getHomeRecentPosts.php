<?php 
	include '../db-config.php';
	include '../helper-functions.php';

	$itemStatus = $itemStatusArray['Approved'];
	$response = array();

	$hashString = md5(time());
	
	$getQuery = "SELECT * FROM items WHERE item_approval_status = $itemStatus ORDER BY item_id DESC LIMIT 4";

	$result = $database->query($getQuery);

	$lgTemplate = "";
	$smTemplate = "";

	if ($result->num_rows > 0) {

		while ($row = $result->fetch_assoc()) {
			$itemId = $row['item_id'];
			$itemName = $row['item_name'];
			$itemImage = $row['item_img'];
			$itemLocation = $row['item_location'];
			$itemPrice = $row['item_price'];

			$hashSection1 = substr($hashString,0,10);
			$hashSection2 = substr($hashString,11,10);
			$hashId = $hashSection1.$itemId.$hashSection2;

			$lgTemplate.=  "

				<section class='col m2 l2 s12'>
		            <a href='item-details?id=$hashId' title='View Item'>
		                <section class='recent-item'>
		                    <img src='uploads/items/$itemImage'>
		                    <a href='item-details?id=$hashId'><p class='center-align'><i class='fa fa-eye-open'></i> View Item Details</p></a>
		                </section>
		            </a>
		        </section>
			";

			$smTemplate.= "
				<section class='recent-item-sm'>
	                <a class='carousel-item' href='#one!'>
	                    <img src='uploads/items/$itemImage' class='recent-item-sm-img'>
	                    <a href='item-details?id=$hashId'><p class='center-align'><i class='fa fa-eye-open'></i>View Item Details</p></a>
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