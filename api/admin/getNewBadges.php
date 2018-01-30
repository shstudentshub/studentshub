<?php

include "../db-config.php";
include "../helper-functions.php";

$itemStatus = $itemStatusArray["Pending"];
$getCount = "SELECT * FROM items WHERE item_approval_status = $itemStatus";

$result = $database->query($getCount);
if($row = $result->num_rows){
	echo "<span class='new badge'>$row</span>";
}


?>