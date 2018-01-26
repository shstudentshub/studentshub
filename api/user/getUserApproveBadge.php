<?php

include "../db-config.php";
include "../helper-functions.php";
session_start();
//Let user session
$userSecID = intval($_SESSION["userId"]);

$itemStatus = $itemStatusArray["Approved"];
$getCount = "SELECT * FROM items WHERE item_publisher_id = $userSecID AND item_approval_status = $itemStatus";

$result = $database->query($getCount);
if($row = $result->num_rows){
	echo "<span class='badge'>$row</span>";
}


?>