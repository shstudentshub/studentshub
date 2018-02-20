<?php
    include "../dbConfig.php";
    ini_set('display_errors', 1);



    if($_SERVER['REQUEST_METHOD'] == "POST"){
      session_start();
  		$response = array();
  		$itemImgUploadDir = "../../uploads/items/";

  		$publisherId = intval($_SESSION["userId"]);
  		$itemPostDate = date("Y-m-d");
  		$itemName = mysqli_real_escape_string($database,trim($_GET['itemName']));
  		$itemPrice = strval($_GET['itemPrice']);
  		$itemLocation = mysqli_real_escape_string($database,trim($_GET['itemLocation']));
  		$itemDetails = mysqli_real_escape_string($database,trim($_GET['itemDetails']));
  		$itemCategory = intval($_GET['itemCategory']);
  		$itemPriceTerm = mysqli_real_escape_string($database,trim($_GET['itemPriceTerm']));

      $tracking_id = md5(microtime());


      //Let insert into database without image uploads

      $itemInsertQuery = "INSERT INTO items (item_name,item_details,item_category_id,item_price,item_location,item_publisher_id,item_price_term,item_post_date,item_tracking_id) VALUES(?,?,?,?,?,?,?,?,?)";

			$preparedInsertQuery = $database->prepare($itemInsertQuery);
			$preparedInsertQuery->bind_param('ssississ',$itemName,$itemDetails,$itemCategory,$itemPrice,$itemLocation,$publisherId,$itemPriceTerm,$itemPostDate);
      $statement->execute();

      $anotherQuery = "SELECT item_id FROM items WHERE item_tracking_id = $tracking_id ";
      $result = $database->query($anotherQuery);

      while($row = $result->fetch_assoc()){
        $id = intval($row["item_id"]);
      }

      if(is_array($_FILES)){

        foreach ($_FILES['files']['name'] as $key => $value) {
          $file_name = explode(".",$_FILES['files']['name'][$key]);

          if($file_name[1] == "jpg" || $file_name[1] == "jpeg" || $file_name[1] == "png"){

            $rand = substr(md5(microtime()),rand(0,25),5);
            //$new_name = "USER".$rand.".".$file_name[1];
            $newItemImgName = "User_".$publisherId."_".time().".".$file_name[1];
            $source = $_FILES['files']['tmp_name'][$key];
            $target = $itemImgUploadDir.$newItemImgName;

            if(move_uploaded_file($source,$target)){

              $query = "INSERT INTO itemimages(image_names,item_image_id) VALUES(?,?)";
              $prepareStmt = $database->prepare($query);
              $prepareStmt->bind_param("si",$newItemImgName,$id);

              if($prepareStmt->execute()){
                $response['success'] = true;
                $response['message'] = " Uploaded successful";

              }else{
                $response['success'] = false;
                $response['message'] = "There is a problem saving post.";

              }

            }else{
              $response['success'] = false;
              $response['message'] = "Images cannot be upload";

            }


          }else{
            $response['success'] = false;
            $response['message'] = "Images contains invalid format";

          }


        }
        header("Content-Type:application/json");
        echo json_encode($response);

      }else{
        echo "few";
      }



    }else{
      echo "Nothing now";
    }
