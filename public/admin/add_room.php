<?php include("./includes/header.php"); ?>
      <section class="admin-form">
        <div class="text-danger">
        Ansel add the form here since there are a lot of fields mabey you can divide this part in two.
        Make the multipart form (file selection). 
        </div>
        <div class="container">
          <h2>Add Room</h2>
          <form action="">
            <div class="form-group">
              <label for="room_name">Room Name</label>
              <input type="text" class="form-control" />
            </div>
            <div class="form-group">
              <label for="room_type">Room Type</label>
              <input type="text" class="form-control" />
            </div>
            <div class="form-group">
              <label for="room_price">Room Price</label>
              <input type="number" class="form-control" />
            </div>

            <div class="form-group">
              <label for="room_image">Room Image</label>
              <input type="file" />
            </div>
          </form>
        </div>
      </section>
<?php include("./includes/footer.php"); ?>