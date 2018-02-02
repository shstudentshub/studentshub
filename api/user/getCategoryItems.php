<?php 
	include '../db-config.php';
	include '../helper-functions.php';

	$categoryName = mysqli_real_escape_string($database,$_POST['categoryName']);
	$categoryId = intval($_POST['categoryId']);
	$getQuery = '';
	$itemStatus = $itemStatusArray['Approved'];

	$hashString = md5(time());
	
	if ($categoryName == 'all') {
		$getQuery = "SELECT * FROM items WHERE item_approval_status = $itemStatus";
	} else {
		$getQuery = "SELECT * FROM items INNER JOIN categories ON item_category_id = category_id WHERE item_approval_status = $itemStatus AND item_category_id = $categoryId";
	}

	$result = $database->query($getQuery);

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

			echo "
				    <section class='col s12 m3'>
				      <section class='card'>
				        <section class='card-image'>
				          <img src='uploads/items/$itemImage' class='search-item-img'>
				          <span class='card-title'>$itemName</span>
				          <a href='item-details?id=$hashId' class='btn-floating halfway-fab waves-effect waves-light red center-align'><small>View</small></a>
				        </section>
				        <section class='card-content'>
				          	<section class='col s6 m6'>
				          		<span>GH&cent;</span> $itemPrice
				          	</section>
				          	<section class='col s6 m6'>
				          		$itemLocation
				          	</section>
				          	<br>
				        </section>
				      </section>
				    </section>
			";
			
		}
	} else {
		if ($categoryName == 'all') {
		 	echo "";
		} else {
			echo "<li><a href=''>No Items For Your Chosen Category</a></li>";
		}

		
	}	