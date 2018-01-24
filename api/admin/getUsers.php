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
			$userName = $row["user_name"];
			$userEmail = $row["user_email"];
			$userContact = $row["user_contact"];
			$userSignDate = $row["user_sign_date"];


			echo "
				<tr>
                    <td>$counter</td>
                    <td>$userName</td>
                    <td>$userEmail</td>
                    <td>$userContact</td>
                    <td>$userSignDate</td>

                    <td>
                        <button type='button'  class='btn indigo accent-2' onclick='viewItem($itemObj)'>
                        	<i class='fa fa-eye'></i> View
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
				<h4 class='center-align no-items-text'>There Are No Users Available</h4>
			</section>
		";
	}
