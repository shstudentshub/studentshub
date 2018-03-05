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
	$getDetailsQuery = "SELECT user_name, user_contact, item_category_id, item_name,item_condition,item_details,item_currency ,item_price, item_location,image_names ,item_price_term FROM items INNER JOIN users ON item_publisher_id = user_id INNER JOIN categories ON category_id = item_category_id INNER JOIN itemimages ON item_id = item_image_id WHERE item_id = $itemId";

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
    	$itemCondition = $detailsRow["item_condition"];


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
		<link type="text/css" rel="stylesheet" href="./assets/css/bootstrap.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="./assets/css/font-awesome.min.css" media="screen,projection"/>
		<link rel="stylesheet" href="./assets/css/style.css">
	</head>
	<body>
		<div class="se-pre-con"></div>

		<nav class="fixed-top navbar navbar-expand-lg navbar-light custom-navbar">
			<a class="navbar-brand" href="index">
				<img src="assets/img/students-hub-logo.png" class="navbar-logo" alt="Logo">
			</a>
			<a class="nav-item custom-nav-item nav-link collapse-icon" href="#" onclick="openSideNav()"><i class="fa fa-navicon"></i></a>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">

				<ul class="navbar-nav ml-auto">
					<li class="nav-item" class="active"><a href="index" class="nav-link">Home</a></li>
				</ul>
			</div>
		</nav>

		<!-- for the side nav -->
		<section id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeSideNav()">&times;</a>
            
            <a href="index">Home</a>
        </section>

		<section class="container-fluid main-div">
			<br><br>
			<?php
    echo  "
        <section class='container'>
          <section class='row item-details-row'>
            <section class='col-sm-12 col-md-6'>
              <img src='uploads/items/$image[0]' class='item-detail-img preview-div img-fluid'><br><br>
              <section class='col-sm-3 col-md-3 item-detail-sub-imgs' >
              ";
              for ($i=0; $i < $getSize; $i++) {
            	echo  "
                	<img src='uploads/items/$image[$i]' class='item-detail-sub preview-item' id='previewReader'>
                ";
              };
      		echo "
      		</section>
            </section>
            <section class='col-sm-12 col-md-6'>
              <h5>$itemName</h5><br>
              <address>
                <h6><b>Details</b></h6>
                $itemDetails<br><br>

                <h6><b>Price</b></h6>
                  $curency $itemPrice<br><br>
				
				<h6><b>Condition</b></h6>
                  $itemCondition<br><br>

                <h6><b>Location</b></h6>
                $itemLocation<br><br>

                <h6><b>Contact Seller</b></h6>
                <a href='tel:$userContact' title='' onclick='updateCallCount($itemId)'>$userContact</a><br><br>

              </address>
            </section>
          </section>
        </section>
      ";
    } else {
      echo "
          <h1>There Are No Items Found</h1>
      ";
    }
			?>
		</section>
		<hr>

		<script type="text/javascript">
			//function to open the side nav
		    function openSideNav() {
		        document.getElementById("mySidenav").style.width = "100%";
		    }

		    //function to close the side nav
		    function closeSideNav(){
		        document.getElementById("mySidenav").style.width = "0%";
		    }
		</script>

        <p class="text-center"><small>Students Hub &copy; <?php echo date('Y'); ?>. All Rights Reserved.</small></p>

			<script type="text/javascript" src="./assets/js/jquery-2.2.4.min.js"></script>
	        <script type="text/javascript" src="./assets/js/modernizr.js"></script>
	        <script type="text/javascript" src="./assets/js/bootstrap.min.js"></script>
	        <script type="text/javascript" src="./assets/js/chart.min.js"></script>
	        <script type="text/javascript" src="./assets/js/init.js"></script>
	        <script type="text/javascript" src="./assets/js/search-controller.js"></script>
		</body>
	</html>
