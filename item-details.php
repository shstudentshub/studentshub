<?php
	include "api/db-config.php";
  ini_set('display_errors', 1);

	$hashId = $_GET["id"];
	$itemId1 = substr($hashId,10);
	$hashLength = strlen($itemId1);
	$itemIdLength = $hashLength - 10;

	$itemId = intval(substr($itemId1,0,$itemIdLength));
	$itemTemplate = "";

	#query to update the number of views for the item
	$getViewNumber = "SELECT item_views FROM items WHERE item_id = $itemId";
	$getViewResult = $database->query($getViewNumber);

	$row = $getViewResult->fetch_assoc();
	$initItemView = intval($row["item_views"]);
	$currentItemView = $initItemView + 1;

	$updateViewNumber = "UPDATE items SET item_views = $currentItemView WHERE item_id = $itemId";
	$updateViewResult = $database->query($updateViewNumber);

	#query to get the details of the item
	$getDetailsQuery = "SELECT user_name, user_contact, item_category_id, item_name, item_details,item_currency ,item_price, item_location,image_names ,item_price_term FROM items INNER JOIN users ON item_publisher_id = user_id INNER JOIN categories ON category_id = item_category_id INNER JOIN itemimages ON item_id = item_image_id WHERE item_id = $itemId";

	$getDetailsResult = $database->query($getDetailsQuery);
	if ($getDetailsResult->num_rows > 0) {
		$detailsRow = $getDetailsResult->fetch_assoc();

		$userName = $detailsRow["user_name"];
		$userContact = $detailsRow["user_contact"];
		$itemCategory = $detailsRow["item_category_id"];
		$itemImage = $detailsRow["image_names"];
		$itemName = $detailsRow["item_name"];
		$itemDetails = $detailsRow["item_details"];
		$itemPrice = $detailsRow["item_price"];
		$itemLocation = $detailsRow["item_location"];
		$itemPriceTerm = $detailsRow["item_price_term"];
    $curency = $detailsRow['item_currency'];


    $image = unserialize($itemImage);
    $getSize = sizeof($image);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Students Hub | The Total Student Shopping Experience</title>
		<link rel="shortcut icon" href="assets/img/students-hub-logo.png" type="image/x-icon">
      	<meta name="keywords" content="">
  		<meta name="description" content="">
		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="./assets/css/materialize.css"  media="screen,projection"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="./assets/css/font-awesome.min.css" media="screen,projection"/>
		<link rel="stylesheet" href="./assets/css/style.css">
	</head>
	<body>
		<div class="se-pre-con"></div>

		<!-- User DropDown -->
		<ul id="user-dropdown" class="dropdown-content">
			<li><a href="#!">Account</a></li>
			<li><a href="#!">Need Help?</a></li>
			<li class="divider"></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>

		<!-- The navbar -->
		<section class="navbar-fixed">
			<nav class="custom-navbar custom-search">
				<section class="nav-wrapper">
					<a href="index" class="hide-on-med-and-down logo-container brand-logo">
						HuB
					</a>

					<ul class="right custom-right">
						<li class="hide-on-med-and-down">
							<!-- <a class="dropdown-trigger" href="#!" data-activates="cat-dropdown1">Categories <i class="fa fa-chevron-down"></i></a> -->
						</li>
						<li><a href="#" onclick="back()">Back</a></li>
					</ul>
				<!--	<ul class="side-nav" id="nav-mobile">
						<section class="side-nav-profile-div">
							<img src="assets/img/profile-placeholder.jpg" class="side-nav-profile-img" alt="Logo">
							<span class="side-nav-profile-name">User Name</span>
						</section>
						<li><a href="#">Some links</a></li>
						<li><a href="#">Some links</a></li>
						<li><a href="#">Some links</a></li>
					</ul>
					<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="fa fa-navicon"></i></a>-->
				</section>
			</nav>
		</section>

		<section class="row main-row">
			<br><br>
			<?php
    echo  "
        <section class='container'>
          <section class='row item-details-row'>
            <section class='col s12 m6'>
              <img src='uploads/items/$image[0]' class='item-detail-img'>
              ";
              for ($i=0; $i < $getSize; $i++) {
            echo    "<section class='col s3 m3' >
                <img src='uploads/items/$image[$i]' class='item-detail-sub' id='previewReader' onclick='preview()'>
                </section>";
              };
      echo "
            </section>
            <section class='col s12 m6'>
              <h5>$itemName</h5><br>
              <address>
                <h6><b>Item Details</b></h6>
                $itemDetails<br><br>

                <h6><b>Item Price</b></h6>
                  $curency $itemPrice<br><br>

                <h6><b>Item Location</b></h6>
                $itemLocation<br><br>

                <ul class='collapsible' data-collapsible='accordion'>
                    <li>
                      <div class='collapsible-header'><i class='fa fa-phone'></i> View Seller's Contact Number</div>
                      <div class='collapsible-body'><span><a href='tel:$userContact' title=''>$userContact</a></span></div>
                    </li>
                </ul>
              </address>
            </section>
          </section>
        </section>
      ";
    } else {
      echo "
        <h1>There Are No Items For Your Wicked Query</h1>
      ";
    }
			?>
		</section>
		<hr>

        <p class="center-align footer-cr">Students Hub &copy; <?php echo date('Y'); ?>. All Rights Reserved.</p>

			<script type="text/javascript" src="./assets/js/jquery-2.2.4.min.js"></script>
	        <script type="text/javascript" src="./assets/js/modernizr.js"></script>
	        <script type="text/javascript" src="./assets/js/materialize.min.js"></script>
	        <script type="text/javascript" src="./assets/js/chart.min.js"></script>
	        <script type="text/javascript" src="./assets/js/init.js"></script>
          <script type="text/javascript" src="./assets/js/previewController.js"></script>
	        <script type="text/javascript" src="./assets/js/search-controller.js"></script>
		</body>
	</html>
