
<?php

include "../db-config.php";
include "../helper-functions.php";

$itemStatus = $itemStatusArray["Approved"];
$getCount = "SELECT * FROM items WHERE item_approval_status = $itemStatus";

$result = $database->query($getCount);
if($row = $result->num_rows){
	echo "<span class='badge'>$row</span>";
}

