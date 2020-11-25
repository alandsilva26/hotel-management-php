<?php
  require("../config.php");
  header("Content-Type: application/json; charset=utf-8");

  $room_id = $_POST["room_id"];
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
  $room_image = $_POST['room_image'];
  
  // Handle image
  if (isset($_FILES["new_room_image"])) {
      if ($_FILES["new_room_image"]["name"] != "") {
          if ($_FILES["new_room_image"]["name"] == $room_image) {
              sendJson("Select a new image", 1, "new_room_image");
              return;
          }
  
          $room_image = $_FILES["new_room_image"]["name"];
  
          $result = uploadImage("new_room_image");
  
          if ($result["status"] == 1) {
              sendJson($result["message"], 1, "new_room_image");
              return;
          }
      }
  } else {
      sendJson("Please select a valid image", 1, "new_room_image");
      return;
  }

  $sql = "UPDATE rooms SET room_number = :room_number, room_name = :room_name, room_type = :room_type, room_featured = :room_featured, room_price = :room_price, room_floor = :room_floor, room_view = :room_view, room_beds = :room_beds, bed_type = :bed_type, room_capacity = :room_capacity, room_amenities = :room_amenities, room_image = :room_image WHERE room_id = :room_id";

  $statement = $pdo->prepare($sql);

  $statement->execute(array(
    ":room_id" => $room_id,
    ":room_number" => $room_number,
    ":room_name" => $room_name,
    ":room_type" => $room_type,
    ":room_featured" => $room_featured,
    ":room_price" => $room_price,
    ":room_floor" => $room_floor,
    ":room_view" => $room_view,
    ":room_beds" => $room_beds,
    ":bed_type" => $bed_type,
    ":room_capacity" => $room_capacity,
    ":room_amenities" => $room_amenities,
    ":room_image" => $room_image
  ));

  $_SESSION["message"] = "Successfully edited room";
  sendJson("Successfully edited room", 0);
  return;
