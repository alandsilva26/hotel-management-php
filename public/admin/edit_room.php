<?php
  require("../config.php");
  include("./includes/header.php");
?>
<section class="content admin-form">
  <h2 class="mb-3 mt-10 text-center">Add Room</h2>
  <div class="container">

    <!-- Start of form -->
    <form action="" id="edit_room_form" method="post" enctype="multipart/form-data" >
      <div class="text-info">
      <?php
        if (isset($_SESSION["message"])) {
            echo $_SESSION["message"];
            unset($_SESSION["message"]);
        }

        if (isset($_GET["room_id"])) {
            if (is_null($_GET["room_id"]) || $_GET["room_id"] == "") {
                $_SESSION["error"] = "Room id cannot be empty";
                header("Location: rooms.php");
                return;
            }
        } else {
            $_SESSION["error"] = "Invalid room id";
            header("Location: rooms.php");
            return;
        }
  
        $id = $_GET["room_id"];
              
        $row = getRoomFromId($pdo, $id);
  
      ?>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-6">
        <input type="hidden" name="room_id" value="<?= $id ?>" />
          <div class="form-group">
            <label class="form-label " for="room_number">Room Number</label>
            <input type="number" name="room_number" id="room_number" class="form-control" value="<?= $row["room_number"]; ?>" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_name">Room Name</label>
            <input type="text" name="room_name" id="room_name" class="form-control" value="<?= $row["room_name"]; ?>"   required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_type">Room Type</label>
            <input type="text" name="room_type" id="room_type" class="form-control " value="<?= $row["room_type"]; ?>"  required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_floor">Room Floor</label>
            <input type="number" name="room_floor" id="room_floor" class="form-control" value="<?= $row["room_floor"]; ?>"  required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_type">Room View</label>
            <input type="text" name="room_view" id="room_view" class="form-control" value="<?= $row["room_view"]; ?>"  required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_capacity">Room Amenities</label>
            <input type="text" name="amenities" id="room_amenities" class="form-control" value="<?= $row["room_amenities"]; ?>"  required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_beds">Number of Beds</label>
            <input type="number" name="room_beds" id="room_beds" class="form-control" value="<?= $row["room_beds"]; ?>"  required />
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-6">
          <div class="form-group">
            <label class="form-label" for="bed_type">Bed Type</label>
            <input type="text" name="bed_type" id="bed_type" class="form-control" value="<?= $row["bed_type"]; ?>"  required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_capacity">Room Capacity</label>
            <input type="number" name="room_capacity" id="room_capacity" class="form-control" value="<?= $row["room_capacity"]; ?>"  required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_price">Room Price</label>
            <input type="number" name=" room_price" id="room_price" class="form-control " value="<?= $row["room_price"]; ?>" required />
            <small id="room_price_error" class="text-danger">
            </small>
          </div>
          <div class="form-group">
            <label class="form-label" for="room_featured">Is the Room featured ?</label><br>
            <input type="radio" class="" id="featured_yes" name="room_featured" value="yes" <?= $row["room_featured"] ? "checked" : "" ?>><span>&nbsp;</span>
            <lable for="featured_no">Yes</lable>
            <span>&nbsp;&nbsp;</span>
            <input type="radio" class=" " id="featured_no" name="room_featured" value="no" <?= $row["room_featured"] ? "" : "checked" ?>><span>&nbsp;</span>
            <lable for="featured_no" >No</lable>
            <br>
          </div>
          <div class="row">
            <div class="col-6">
            <div class="form-group">
            <input type="file" name="new_room_image" id="new_room_image" accept="image/png, image/jpeg"/>
            <small id="new_room_image_error" class="error-message text-danger">
            </small>
          </div>
            </div>
            <div class="col-6">
            <div class="form-group">
            <img id="form-image" src="<?= IMAGEROOT.$row["room_image"] ?>" alt="<?= $row["room_image"] ?>">
            <input type="hidden" name="room_image" id="room_image" value="<?= $row["room_image"]; ?>" />
          </div>

            </div>
          </div>
          <!-- <div class="form-group">
            <label class="form-label is-invalid" for="room_image">Room Image</label><br>
            <input type="file" name="room_image" accept="image/png, image/jpeg" class="" />
            <small id="room_image_error" class="error-message text-danger">
            </small>
          </div> -->
          <div class="text-danger" id="error-form">
          </div>
          <div class="form-group my-0.25">
            <button id="edit_room" type="submit" name="edit_room" value="edit_room" class="btn btn-primary">Edit Room</button>
          </div>
        </div>
      </div>
    </form>
    <!-- End of form -->
  </div>
</section>
     
<?php include("./includes/footer.php"); ?>
<script>
    function handleError(about, message) {
      $(`#${about}`).addClass("is-invalid");
        $(`#${about}_error`).html(message);
    }

  $(document).ready(function() {

    $("#edit_room_form").submit(function(e) {
      $(".error-message").html("");
      $("#error-form").html("");
      $("#edit_room").removeClass("btn-primary");
      $("#edit_room").removeClass("btn-danger");
      $("#edit_room").addClass("btn-info");
      $("#edit_room").html("Editing room...");
      e.preventDefault();    
      var formData = new FormData(this);

      $.ajax({
          url: "edit_room_controller.php",
          type: "POST",
          data: formData,
          success: function (data) {
            console.log(data);
            if(data.error == 1) {
              handleError(data.about, data.message);
              // $("#edit_room").removeClass("btn-primary");
              $("#edit_room").addClass("btn-danger");
              $("#edit_room").html("Edit Room");
            } else {
              $("#edit_room").removeClass("btn-info");
              $("#edit_room").addClass("btn-success");
              $("#edit_room").html("Success");
              window.location.href = 'rooms.php';
            }
          },
          error: function (data, message, errorThrown) {
            $("#error-form").html("<span class=\"p-2\">" + message  + errorThrown + "</span>");
            $("#edit_room").addClass("btn-primary");
            $("#edit_room").html("Edit Room");
          }, 
          cache: false,
          contentType: false,
          processData: false
      });
    });
  });
</script>

</body>
</html>