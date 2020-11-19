<?php
  require("../config.php");

  if (isset($_POST["add_room"])) {
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
          $room_image = $_FILES["room_image"]["name"];

          $result = uploadImage("room_image");

          if ($result["status"] == 0) {
              // Upload failed
          } else {
              // Upload successfull
          }
      }

      // INSERT DATA INTO TABLE
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

      $_SESSION["message"] = "HERE";
  }
?>

<?php include("./includes/header.php"); ?>
<section class="content admin-form">
  <h2 class="mb-3 mt-10 text-center">Add Room</h2>
  <div class="container">

    <!-- Start of form -->
    <form action="" method="post" enctype="multipart/form-data">
      <div class="text-danger">
      <?php
        if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }
      ?>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-6">
          <div class="form-group">
            <label class="form-label " for="room_number">Room Number</label>
            <input type="number" name="room_number" id="room_number" class="form-control" />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_name">Room Name</label>
            <input type="text" name="room_name" id="room_name" class="form-control" />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_type">Room Type</label>
            <input type="text" name="room_type" id="room_type" class="form-control " />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_floor">Room Floor</label>
            <input type="number" name="room_floor" id="room_floor" class="form-control" />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_type">Room View</label>
            <input type="text" name="room_view" id="room_view" class="form-control" />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_capacity">Room Amenities</label>
            <input type="text" name="amenities" id="room_amenities" class="form-control" />
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-6">
          <div class="form-group">
            <label class="form-label" for="room_beds">Number of Beds</label>
            <input type="number" name="room_beds" id="room_beds" class="form-control" />
          </div>
          <div class="form-group">
            <label class="form-label" for="bed_type">Bed Type</label>
            <input type="text" name="bed_type" id="bed_type" class="form-control" />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_capacity">Room Capacity</label>
            <input type="number" name="room_capacity" id="room_capacity" class="form-control" />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_price">Room Price</label>
            <input type="number" name=" room_price" id="room_price" class="form-control " />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_featured">Is the Room featured ?</label><br>
            <input type="radio" class="" id="featured_yes" name="room_featured" value="yes" checked><span>&nbsp;</span>
            <lable for="featured_no">Yes</lable>
            <span>&nbsp;&nbsp;</span>
            <input type="radio" class=" " id="featured_no" name="room_featured" value="no"><span>&nbsp;</span>
            <lable for="featured_no">No</lable>
            <br>
          </div>
          <div class="form-group">
            <label class="form-label" for="room_image">Room Image</label><br>
            <input type="file" name="room_image" accept="image/png, image/jpeg"/>
          </div>
          <div class="my-0.25">
            <button type="submit" name="add_room" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </form>
    <!-- End of form -->
  </div>
</section>
     
<?php include("./includes/footer.php"); ?>
<script>
  $(document).ready(function() {
    $("#room_number").val("202");
    $("#room_name").val("Ocean View Suite");
    $("#room_type").val("gold");
    $("#room_floor").val("2");
    $("#room_view").val("Ocean");
    $("#room_amenities").val("Ocean View, Wifi, Double bathroom");
    $("#room_beds").val("3");
    $("#bed_type").val("Queen Bed");
    $("#room_capacity").val("7");
    $("#room_price").val("788");
  });
</script>

</body>
</html>