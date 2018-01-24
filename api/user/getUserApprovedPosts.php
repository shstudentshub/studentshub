<?php 
	include "../db-config.php";
	include "../helper-functions.php";
	session_start();

	$userId = intval($_SESSION["userId"]);
	$pendingStatus = $itemStatusArray["Approved"];

	$getQuery = "SELECT * FROM items WHERE item_publisher_id = $userId AND item_approval_status = $pendingStatus ORDER BY item_id DESC";
	$result = $database->query($getQuery);

	if ($result->num_rows > 0) {
		$itemArray = array();
		$counter = 1;
		echo "
			<section class='responsive-table'>
				<table>
			        <thead>
			          <tr>
			              <th>#</th>
			              <th>Item Photo</th>
			              <th>Item Name</th>
			              <th>Item Price <span>(GH&cent;)</span></th>
			              <th>Item Category</th>
			              <th>Item Location</th>
			              <th>Actions</th>
			          </tr>
			        </thead>

			        <tbody>
		";
		while ($row = $result->fetch_assoc()) {
			#get the values from the table tuples
			$itemId = intval($row["item_id"]);
			$itemImg = $row["item_img"];
			$itemName = $row["item_name"];
			$itemPrice = floatval($row["item_price"]);
			$itemCategoryId = intval($row["item_category_id"]);
			$itemLocation = $row["item_location"];
			$itemDetails = $row["item_details"];

			#encode the item's detials into an array for further operations
			$itemArray["itemId"] = $itemId;
			$itemArray["itemImg"] = $itemImg;

			$itemObj = json_encode($itemArray);


			#get the category name of the item
			$getCategoryQuery = "SELECT category_name FROM categories WHERE category_id = $itemCategoryId";
			$result1 = $database->query($getCategoryQuery);
			$row1 = $result1->fetch_assoc();

			#truncate all strings before appending it to the table
			$categoryName = $row1["category_name"];
			$newCategoryName = truncateString($categoryName,13,10);
			$newItemName = truncateString($itemName,13,10);
			$newItemLocation = truncateString($itemLocation,13,10);

			echo "
				<tr>
					<td>$counter</td>
					<td><img src='uploads/items/$itemImg' class='user-item-img'></td>
					<td>$newItemName</td>
					<td>$itemPrice</td>
					<td>$newCategoryName</td>
					<td>$newItemLocation</td>
					<td>
						<i class='fa fa-trash-o user-item-action-icon delete-icon' onclick='showDeleteUserItemAlert($itemObj)'></i>
					</td>
				</tr>
			";

			$counter++;
		}

		echo "
				</tbody>
			</table>
		</section>
		";
	} else {
		echo "
			<div class='panel custom-bg-lt'>
				There Are No Pending Items
			</div>
		";
	}	