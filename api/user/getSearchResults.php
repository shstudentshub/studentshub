<?php 
	include '../db-config.php';
	include '../helper-functions.php';

	$query = mysqli_real_escape_string($database,trim($_POST['query']));
	$itemStatus = $itemStatusArray['Approved'];
	$hashString = md5(time());
	
	$searchTerm = "%{$query}%";
	$getQuery = "SELECT * FROM items WHERE item_name LIKE '$searchTerm' OR item_details LIKE '$searchTerm' OR item_location LIKE '$searchTerm' AND item_approval_status = $itemStatus";

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
		echo "<h6 class='center-align'>Sorry, No Result Found For Search Term '$query'</h6>";


	}
