<?php
    include "../db-config.php";
    ini_set('display_errors', 1);
    session_start();
    $response = array();
    $user_id = intval($_SESSION["userId"]);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $userFullname = mysqli_real_escape_string($database, trim($_POST['fullname']));
      $userEmail = mysqli_real_escape_string($database, trim($_POST['email']));
      $userContact = mysqli_real_escape_string($database, trim($_POST['contact']));
      $userCity = mysqli_real_escape_string($database, trim($_POST['city']));
      $userCountry = mysqli_real_escape_string($database, trim($_POST['country']));


      $updateQuery = "UPDATE users SET user_name = ?,user_email = ?,user_contact = ?,user_city = ?, user_country = ? WHERE user_id = ? ";
      $prepareQuery = $database->prepare($updateQuery);
      $prepareQuery->bind_param('sssssi',$userFullname,$userEmail,$userContact,$userCity,$userCountry,$user_id);

      if($prepareQuery->execute()){
        $response["success"] = true;
        $response["message"] = "Settings Updated Successful";

        header("Content-Type: application/json");
        echo json_encode($response);
      }else{
        $response["success"] = false;
        $response["message"] = "Oops there is problem updating your settings";
        header("Content-Type: application/json");
        echo json_encode($response);
      }

    }
