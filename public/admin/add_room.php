<?php
  require("../config.php");
  include("./includes/header.php");
?>
<section class="content admin-form">

  <div class="container">
  <h2 class="">Add Room</h2>
    <!-- Start of form -->
    <form action="" id="add_room_form" method="post" enctype="multipart/form-data" >
      <div class="text-danger">
      <?php
        // if (isset($_SESSION["message"])) {
        //     echo $_SESSION["message"];
        //     unset($_SESSION["message"]);
        // }
      ?>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6 col-6">
          <div class="form-group">
            <label class="form-label " for="room_number">Room Number</label>
            <input type="number" name="room_number" id="room_number" class="form-control" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_name">Room Name</label>
            <input type="text" name="room_name" id="room_name" class="form-control" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_type">Room Type</label>
            <input type="text" name="room_type" id="room_type" class="form-control " required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_floor">Room Floor</label>
            <input type="number" name="room_floor" id="room_floor" class="form-control" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_type">Room View</label>
            <input type="text" name="room_view" id="room_view" class="form-control" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_capacity">Room Amenities</label>
            <input type="text" name="amenities" id="room_amenities" class="form-control" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_beds">Number of Beds</label>
            <input type="number" name="room_beds" id="room_beds" class="form-control" required />
          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-6">
          <div class="form-group">
            <label class="form-label" for="bed_type">Bed Type</label>
            <input type="text" name="bed_type" id="bed_type" class="form-control" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_capacity">Room Capacity</label>
            <input type="number" name="room_capacity" id="room_capacity" class="form-control" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="room_price">Room Price</label>
            <input type="number" name=" room_price" id="room_price" class="form-control " required />
            <small id="room_price_error" class="text-danger">
            </small>
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
            <label class="form-label is-invalid" for="room_image">Room Image</label><br>
            <input type="file" name="room_image" accept="image/png, image/jpeg" class="" />
            <small id="room_image_error" class="error-message text-danger">
            </small>
          </div>
          <div class="text-danger" id="error-form">
          </div>
          <div class="form-group my-0.25">
            <button id="add_room" type="submit" name="add_room" value="add_room" class="btn btn-primary">Add Room</button>
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

    $("#add_room_form").submit(function(e) {
      $(".error-message").html("");
      $("#error-form").html("");
      $("#add_room").removeClass("btn-primary");
      $("#add_room").removeClass("btn-danger");
      $("#add_room").addClass("btn-info");
      $("#add_room").html("Creating new room...");
      e.preventDefault();    
      var formData = new FormData(this);

      $.ajax({
          url: "add_room_controller.php",
          type: "POST",
          data: formData,
          success: function (data) {
            console.log(data);
            if(data.error == 1) {
              handleError(data.about, data.message);
              // $("#add_room").removeClass("btn-primary");
              $("#add_room").addClass("btn-danger");
              $("#add_room").html("Add Room");
            } else {
              $("#add_room").removeClass("btn-info");
              $("#add_room").addClass("btn-success");
              $("#add_room").html("Success");
              window.location.href = 'rooms.php';
            }
          },
          error: function (data, message, errorThrown) {
            $("#error-form").html("<span class=\"p-2\">" + message  + errorThrown + "</span>");
            $("#add_room").addClass("btn-primary");
            $("#add_room").html("Add Room");
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