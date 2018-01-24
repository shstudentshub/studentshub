<?php 
	include "../db-config.php";
	session_start();

	$userId = intval($_SESSION["userId"]);

	$getQuery = "SELECT * FROM users WHERE user_id = $userId";

	$result = $database->query($getQuery);

	$row = $result->fetch_assoc();

	$userName = $row["user_name"];
	$userContact = $row["user_contact"];
	$userEmail = $row["user_email"];

	echo "
		<section class='row'>
			<section class='col m4 l4'></section>
			<section class='col s12 m4 l4'>
				<section class='user-profile-div'>
					<h4 class='center-align'>User Profile</h4>
					<h1 class='center-align'><i class='fa fa-user'></i></h1>
					<table>
				        <tbody>
				          <tr>
				            <td class='right-align'><b>Full Name</b></td>
				            <td>$userName</td>
				          </tr>
				          <tr>
				            <td class='right-align'><b>Contact Number</b></td>
				            <td>$userContact</td>
				          </tr>
				          <tr>
				            <td class='right-align'><b>Email Address</b></td>
				            <td>$userEmail</td>
				          </tr>
				        </tbody>
				      </table>
				      <p class='center-align'><a href='account-setup.php'>Edit Profile</a></p>
				</section>
			</section>
			<section class='col m4 l4'></section>
		</section>
	";