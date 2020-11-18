<?php include("./includes/header.php"); ?>
<?php 
      if(isset($_POST['add_room']) && isset($_FILES['image']))
      {
        $mysql_host = "localhost";
        $mysql_username = "root";
        $mysql_password = "";
        $mysql_database = "hotel";
        $room_number = $_POST["room_number"];
        $room_name =$_POST['room_name'];
        $room_type =$_POST['room_type'];
        $room_floor =$_POST['room_floor'];
        $amenities =$_POST['amenities'];
        $room_beds =$_POST['room_beds'];
        $room_capacity =$_POST['room_name'];
        $bed_type=$_POST['bed_type'];
        $room_price =$_POST['room_price'];
        $room_featured =$_POST['room_featured'];
        $room_view=$_POST['room_view'];
        if(isset($_FILES['image'])){
          $room_image = $_FILES["image"]["name"];
          echo $room_image;
        }
        if($room_featured=='yes'){
          $room_featured=1;
        }else{
          $room_featured=0;
        }

        $mysqli=new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
        if (!$mysqli) {
          die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO rooms (room_number, room_name, room_type, room_floor, amenities, room_beds, room_capacity, bed_type, room_price, room_featured, room_view, room_image) VALUES ($room_number,$room_name, $room_type, $room_floor, $amenities, $room_beds, $room_capacity, $bed_type, $room_price, $room_featured, $room_view, \"$room_image\" )";
        $stat= mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli)) ;
        if($stat==TRUE){
            echo "query accepted";
        }else{
          echo $stat;
        }
        mysqli_close($mysqli);
        echo "done";
      }
      
      ?>
      <section class="admin-form">
        <div class="text-danger"> 
        </div>
        <div class="container">
          <h2 class="mb-3 mt-10 text-center">Add Room</h2>
          <div class="add_room">
          <form method="post" target="_blank" enctype="multipart/form-data">
            <div class="row ">
              <div class="col">
              <div class="form-group">
                <label class="form-label " for="room_number">Room Number</label>
                <input type="number" name="room_number" class="form-control " />
              </div>
</div>
<div class = "col">
              <div class="form-group">
                <label class="form-label" for="room_name">Room Name</label>
                <input type="text" name="room_name" class="form-control" />
              </div>
            </div>
</div>

<div class="row">
  <div class="col">
  <div class="form-group">
              <label class="form-label" for="room_type">Room Type</label>
              <input type="text" name="room_type" class="form-control " />
            </div>
</div>

<div class="col">
<div class="form-group">
              <label class="form-label" for="room_floor">Room Floor</label>
              <input type="number" name="room_floor" class="form-control" />
            </div>
</div>
</div>

<div class="row">
  <div class="col">
  <div class="form-group">
              <label class="form-label" for="room_type">Room View</label>
              <input type="text" name="room_view" class="form-control" />
            </div>
</div>
<div class="col">
<div class="form-group">
              <label class="form-label" for="room_capacity">Room Amenities</label>
              <input type="text" name="amenities" class="form-control" />
            </div>
</div>
</div>
<div class="row">
  <div class="col">
  <div class="form-group">
              <label class="form-label" for="room_beds">Number of Beds</label>
              <input type="number" name="room_beds" class="form-control" />
            </div>
</div>
<div class="col">
<div class="form-group">
              <label class="form-label" for="bed_type">Bed Type</label>
              <input type="text" name="bed_type" class="form-control" />
            </div>
</div>
</div>

<div class="row">
<div class="col">
<div class="form-group">
              <label class="form-label" for="room_capacity">Room Capacity</label>
              <input type="number" name="room_capacity" class="form-control" />
            </div>
</div>
<div class="col">
<div class="form-group">
              <label class="form-label" for="room_price">Room Price</label>
              <input type="number" name=" room_price" class="form-control " />
            </div>
</div>
</div>
<div class="row">
  <div class="col">
  <div class="form-group">
              <label class="form-label" for="room_featured">Is the Room featured ?</label><br>
              <input type="radio" class="" id="featured_yes" name="room_featured" value="yes" checked><span>&nbsp;</span>
              <lable for="featured_no">Yes</lable><span>&nbsp;&nbsp;</span>
              <input type="radio" class=" " id="featured_no" name="room_featured" value="no"><span>&nbsp;</span>
              <lable for="featured_no">No</lable><br>
            </div>
</div>
<div class="col">
<div class="form-group">
              <label class="form-label" for="room_image">Room Image</label><br>
              <input type="file" name="image" accept="image/png, image/jpeg"/>
            </div>
</div>
</div>     

            
            <div class="my-0.25">
      <button type="submit" name="add_room" class="btn btn-primary">Submit</button>
    </div>
      </form>
        </div>
        </div>
       
      </section>
     
<?php include("./includes/footer.php"); ?>