<?php 
	include "../db-config.php";

	$totalPosts = 0;
	$totalUsers = 0;
	$totalCategories = 0;

	$response = array();

	#query to get the total number of users
	$getUsersQuery = "SELECT * FROM users";
	$result1 = $database->query($getUsersQuery);
	$totalUsers = $result1->num_rows;

	#query to get the total number of posts
	$getPostsQuery = "SELECT * FROM items";
	$result2 = $database->query($getPostsQuery);
	$totalPosts = $result2->num_rows;

	#query to get the total number of categories
	$getPostsQuery = "SELECT * FROM categories";
	$result3 = $database->query($getPostsQuery);
	$totalCategories = $result3->num_rows;

	#encode it into json and return it
	$response["totalUsers"] = $totalUsers;
	$response["totalPosts"] = $totalPosts;
	$response["totalCategories"] = $totalCategories;

	header('Content-Type: application/json');
	echo json_encode($response);


