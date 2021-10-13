<?php
  require("../config.php");
  header("Content-Type: application/json; charset=utf-8");

  $room_number = $_POST["room_number"];
  $room_name = $_POST['room_name'];
  $room_type = $_POST['room_type'];
  $room_floor = $_POST['room_floor'];
  $room_amenities = $_POST['amenities'];
  $room_beds = $_POST['room_beds'];
  $room_capacity = $_POST['room_capacity'];
  $bed_type = $_POST['bed_type'];
  $room_price = $_POST['room_price'];
  $room_featured = $_POST['room_featured'] == "yes" ? 1 : 0;
  $room_view = $_POST['room_view'];
  
  // Handle image
  if (isset($_FILES["room_image"])) {
      if ($_FILES["room_image"]["name"] == "") {
          sendJson("Please select a valid image", 1, "room_image");
          return;
      }

    $room_image = $_FILES["room_image"]["name"];

    $target_dir =  $target_dir = ROOT . DIRECTORY_SEPARATOR . "media" . DIRECTORY_SEPARATOR . "images" . DIRECTORY_SEPARATOR .  "rooms" . DIRECTORY_SEPARATOR;
    $target_file = $target_dir . basename($_FILES["room_image"]["name"]);
    
    if (!file_exists($target_file)) {
        // File does not exist. Upload
        if (!move_uploaded_file($_FILES["room_image"]["tmp_name"], $target_file)) {
            sendJson("There was an error uploading file");
            return;
        }
    } 

    //   $result = uploadImage("room_image");

    //   if ($result["status"] == 1) {
    //       sendJson($result["message"], 1, "room_image");
    //       return;
    //   }
  } else {
      sendJson("Please select a valid image", 1, "room_image");
      return;
  }

  $sql = "INSERT INTO rooms (room_number, room_name, room_type, room_featured, room_price, room_image, room_floor, room_view, room_beds, bed_type, room_capacity, room_amenities) VALUES (:room_number, :room_name, :room_type, :room_featured, :room_price, :room_image, :room_floor, :room_view, :room_beds, :bed_type, :room_capacity, :room_amenities)";

  $statement = $pdo->prepare($sql);

  $statement->execute(array(
    ":room_number" => $room_number,
    ":room_name" => $room_name,
    ":room_type" => $room_type,
    ":room_featured" => $room_featured,
    ":room_price" => $room_price,
    ":room_image" => $room_image,
    ":room_floor" => $room_floor,
    ":room_view" => $room_view,
    ":room_beds" => $room_beds,
    ":bed_type" => $bed_type,
    ":room_capacity" => $room_capacity,
    ":room_amenities" => $room_amenities
  ));

  $_SESSION["message"] = "Successfully added new Room";
  sendJson("Please select a valid image", 0);
  return;
