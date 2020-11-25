<?php
  require("../config.php");
  ob_start();
?>

<?php include("./includes/header.php"); ?>
<section class="content">
    <?php

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
    <h2 class="text-center">Are you sure?</h2>
    <table class="table table-bordered text-center">
  <thead>
    <tr>
      <th scope="col">Fields</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     
      <td>Room I.D.</td>
      <td><?=$row['room_id']?></td>
    </tr>
    <tr>
      
      <td>Room Number</td>
      <td><?=$row['room_number']?></td>
    </tr>
    <tr>
      <td >Room Name</td>
      <td><?=$row['room_name']?></td>
    </tr>
    <tr>
      <td >Room Type</td>
      <td><?=$row['room_type']?></td>
    </tr>
    <tr>
      <td >Room Featured</td>
      <td><?=$row['room_featured']==1?'Yes':'No';?></td>
    </tr>
    <tr>
      <td >Room Booked</td>
      <td><?=$row['room_price']==1? 'Yes': 'No';?></td>
    </tr>
<?php
if ($row['room_booked']==1) {
    ?>
      <tr>
      <td >Check In Data</td>
      <td><?=$row['check_in_date']?></td>
    </tr>
    <tr>
      <td >Check Out Date</td>
      <td><?=$row['check_out_date']?></td>
    </tr>
<?php
}
?>
    <tr>
      <td >Room Floor</td>
      <td><?=$row['room_floor']?></td>
    </tr>

    <tr>
      <td >Room View</td>
      <td><?=$row['room_view']?></td>
    </tr><tr>
      <td >Room Beds</td>
      <td><?=$row['room_beds']?></td>
    </tr>
    <tr>
      <td >Bed Type</td>
      <td><?=$row['bed_type']?></td>
    </tr>
    <tr>
      <td >Room Capacity</td>
      <td><?=$row['room_capacity']?></td>
    </tr>
    <tr>
      <td >Room Amenities</td>
      <td><?=$row['room_amenities']?></td>
    </tr>

  </tbody>
</table>
<br>
 <form method="POST">
 <div class="row" style="margin-left: 15%;">
 <div class="col">
    <button class="btn btn-primary" name="cancel" style="margin-left: 15%;">Cancel</button>
</div>
 <div class="col">
    <button class="btn btn-danger" name="submit">Submit</button>
</div>
</div>
 </form>   

<?php
      // print("<pre>".print_r($row, true)."</pre>");
      if (isset($_POST["submit"])) {
          $room_number=$row['room_number'];
          $sql = "DELETE FROM rooms WHERE room_number = $room_number LIMIT 1;";
          $statement = $pdo->prepare($sql);
          $statement->execute();
          header("Location: rooms.php");
          die();
      }
      if (isset($_POST["cancel"])) {
          header("Location: rooms.php");
      }
      ob_end_flush();
?>

</section>
</body>
</html>