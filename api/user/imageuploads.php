<?php
    include "../db-config.php";
    ini_set('display_errors', 1);

    session_start();
    $response = array();
    $itemImgUploadDir = "../../uploads/items/";
    $imageArray = array();

    if($_SERVER['REQUEST_METHOD'] == "POST"){


  		$publisherId = intval($_SESSION["userId"]);
  		$itemPostDate = date("Y-m-d");
  		$itemName = mysqli_real_escape_string($database,trim($_GET['itemName']));
  		$itemPrice = strval($_GET['itemPrice']);
  		$itemLocation = mysqli_real_escape_string($database,trim($_GET['itemLocation']));
  		$itemDetails = mysqli_real_escape_string($database,trim($_GET['itemDetails']));
  		$itemCategory = intval($_GET['itemCategory']);
  		$itemPriceTerm = mysqli_real_escape_string($database,trim($_GET['itemPriceTerm']));
      $tradeCurrency = mysqli_real_escape_string($database,trim($_GET['tradeCurrency']));
      $itemCondition = mysqli_real_escape_string($database,trim($_GET['itemCondition']));

      $tracking_id = md5(microtime());


      //Let insert into database without image uploads

      $itemInsertQuery = "INSERT INTO items(item_name,item_details,item_category_id,item_price,item_currency,item_location,item_publisher_id,item_tracking_id,item_price_term,item_post_date,item_condition) VALUES(?,?,?,?,?,?,?,?,?,?,?)";

			$preparedInsertQuery = $database->prepare($itemInsertQuery);
			$preparedInsertQuery->bind_param("ssisssissss",$itemName,$itemDetails,$itemCategory,$itemPrice,$tradeCurrency,$itemLocation,$publisherId,$tracking_id,$itemPriceTerm,$itemPostDate,$itemCondition);

      $preparedInsertQuery->execute();



      $anotherQuery = "SELECT * FROM items WHERE item_tracking_id = '$tracking_id'";
      $result = $database->query($anotherQuery);

      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $id = intval($row["item_id"]);
        }
      }

      //Let check if images ontains more than one
      if(is_array($_FILES)){

        //Now we begin to loop each images and check for it validity
        foreach ($_FILES['files']['name'] as $key => $value) {
            $file_name = explode(".",$_FILES['files']['name'][$key]);

            //Check whether images is valid
            if($file_name[1] == "jpg" || $file_name[1] == "jpeg" || $file_name[1] == "png"){

              //Let generate 19 random characters
              $rand = substr(md5(microtime()),rand(0,25),19);

              //Rename file with the 19 random characters
              $imageName = "User_".$publisherId."_".$rand.".".$file_name[1];
              $source = $_FILES['files']['tmp_name'][$key];
              $target = $itemImgUploadDir.$imageName;

              //Let make uploads to target folder
              if(move_uploaded_file($source,$target)){
                array_push($imageArray,$imageName);

              }else{
                $response["success"] = false;
                $response["message"] = "Problem posting item";
              }

            }

        }

        //Now let serialize images
        $imagesToBeInserted = serialize($imageArray);
        //Let begin to insert All images into DB
        $imageQuery = "INSERT INTO itemimages(image_names,item_image_id) VALUES(?,?)";
        $prepareImageInsert = $database->prepare($imageQuery);
        $prepareImageInsert->bind_param("si",$imagesToBeInserted,$id);

        //If execution or insertion is successful, Give feedback to user
        if($prepareImageInsert->execute()){
          $response["success"] = true;
          $response["message"] = "Item Posted Successfully.\nWaiting For Admin Review";
        }else{
          echo "Can't insert into DB";
        }

        //Contains all response to be send
        header('Content-Type: application/json');
		    echo json_encode($response);


    }
}
