<?php 
	include "../db-config.php";
	include "../helper-functions.php";

	$categoryArray = array();
	$counter = 1;
	$itemStatus = $itemStatusArray['Pending'];
	$getQuery = "SELECT item_id, item_name, item_details, item_img, item_post_date,user_name, category_name FROM items INNER JOIN users ON item_publisher_id = user_id INNER JOIN categories ON item_category_id = category_id AND item_approval_status = $itemStatus ORDER BY item_id DESC";
	$result = $database->query($getQuery);

	if ($result->num_rows > 0) {
		echo "<table class='responsive-table'>
                <h5><strong>Pending Posts</strong></h5><hr/>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Picture</th>
                        <th>Item Name</th>
                        <th>Item Category</th>
                        <th>Item Details</th>
                        <th>Publisher</th>
                        <th>Publish Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            	<tbody>";

		while ($row = $result->fetch_assoc()) {
			$itemId = $row["item_id"];
			$itemPicture = $row["item_img"];
			$itemName = $row["item_name"];
			$itemCategory = $row["category_name"];
			$itemDetails = $row["item_details"];
			$itemPublisher = $row["user_name"];
			$itemPublishDate = $row["item_post_date"];

			$itemName = truncateString($itemName,15,15);
			$itemCategory = truncateString($itemCategory,15,15);
			$itemDetails = truncateString($itemDetails,15,15);
			$itemPublisher = truncateString($itemPublisher,15,15);

			echo "
				<tr>
                    <td>$counter</td>
                    <td><img src='../uploads/items/$itemPicture' class='admin-item-img'></td>
                    <td>$itemName</td>
                    <td>$itemCategory</td>
                    <td>$itemDetails</td>
                    <td>$itemPublisher</td>
                    <td>$itemPublishDate</td>

                    <td>
                        <button type='button' class='btn indigo accent-2'><i class='fa fa-eye'></i> View</button>
                        &nbsp;
                        <button type='button' class='btn green accent-2'><i class='fa fa-check'></i> Approve</button>
                        &nbsp;
                        <button type='button' class='btn red accent-2'><i class='fa fa-times'></i> Decline</button>
                    </td>
                </tr>";

			$counter ++;
		}

		echo "</tbody>
            </table>";


	} else {
		echo "
			<section class='row jumbotron'>
				<h4 class='center-align no-items-text'>There Are No Categories Available</h4>
			</section>
		";
	}
