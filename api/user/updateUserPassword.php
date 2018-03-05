<?php
    include "../db-config.php";
    session_start();
    $response = array();

    $user_id = intval($_SESSION["userId"]);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $oldPassword = mysqli_real_escape_string($database, trim($_POST['oldPassword']));
      $newPassword = mysqli_real_escape_string($database, trim($_POST['new_Password']));


      $query = "SELECT user_password FROM users WHERE user_id = $user_id";
      $result = $database->query($query);

      $row = $result->fetch_assoc();
      $haspassword = $row['user_password'];
      if(password_verify($oldPassword,$haspassword)){
        $userPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $updateQuery = "UPDATE users SET user_password = '$userPassword'  WHERE user_id =  $user_id";
        if($database->query($updateQuery)){
          $response["success"] = true;
    			$response["message"] = "Password updated successfully";
    			header('Content-Type: application/json');
    		    echo json_encode($response);
        }else{
          $response["success"] = false;
    			$response["message"] = "Password could not be updated. Please check your internet connection";
    			header('Content-Type: application/json');
    		    echo json_encode($response);
        }

      }else{
        $response["success"] = false;
  			$response["message"] = "Current password you provided is wrong";
  			header('Content-Type: application/json');
  		    echo json_encode($response);
      }



    }
