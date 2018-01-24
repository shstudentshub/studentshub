<?php 
	include "../db-config.php";
	include "../helper-functions.php";

	$usersArray = array();
	$counter = 1;
	$itemStatus = $itemStatusArray['Pending'];
	$getQuery = "SELECT * FROM users ORDER BY user_id DESC";
	$result = $database->query($getQuery);

	if ($result->num_rows > 0) {
		echo "<table class='responsive-table'>
                <h5><strong>Pending Posts</strong></h5><hr/>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email Address</th>
                        <th>Contact Number</th>
                        <th>Signup Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            	<tbody>";

		while ($row = $result->fetch_assoc()) {

			$userId = $row["user_id"];
			$userId = $row["user_name"];
			$userId = $row["user_email"];
			$userId = $row["user_contact"];
			$userId = $row["user_sign date"];

			$itemObj = json_encode($itemsArray);

			echo "
				<tr>
                    <td>$counter</td>
                    <td><img src='../uploads/items/$itemPicture' class='admin-item-img'></td>
                    <td>$newItemName</td>
                    <td>$newItemCategory</td>
                    <td>$newItemDetails</td>
                    <td>$newItemPublisher</td>
                    <td>$itemPublishDate</td>

                    <td>
                        <button type='button'  class='btn indigo accent-2' onclick='viewItem($itemObj)'>
                        	<i class='fa fa-eye'></i> View
                        </button>
                        &nbsp;

                        <button type='button' class='btn green' onclick='approveItem($itemObj)'>
                        	<i class='fa fa-check'></i> Approve
                        </button>
                        &nbsp;

                        <button type='button' class='btn red accent-2' onclick='showDeclineItemModal($itemObj)'>
                        	<i class='fa fa-times' ></i> Decline
                        </button>
                    </td>
                </tr>";

			$counter ++;
		}

		echo "</tbody>
            </table>";


	} else {
		echo "
			<section class='row jumbotron'>
				<h4 class='center-align no-items-text'>There Are No Pending Posts Available</h4>
			</section>
		";
	}
