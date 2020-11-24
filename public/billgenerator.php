<?php
require("./config.php");?>
<?php
include("./includes/header.php");
include("./includes/navbar.php");

if (isset($_POST["signup-user"])) {
    $user_fname = $_POST["room-id"];
    $user_lname = $_POST["room_number"];
    $user_email = $_POST["customer"];
    $user_phone = $_POST["user_phone"];
    $user_dob = $_POST["user_dob"];
    $user_password = $_POST["user_password"];
}
?>
<body>
<div class="container">
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
      <td >Customer Name</td>
      <td><?=$row['customer_name']?></td>
    </tr>
    <tr>
      <td >Room Type</td>
      <td><?=$row['room_type']?></td>
    </tr>
    <!-- <tr>
      <td >Room Featured</td>
      <td><?=$row['room_featured']==1?'Yes':'No';?></td>
    </tr> -->
    <tr>
      <td >Check In Data</td>
      <td><?=$row['check_in_date']?></td>
    </tr>
    <tr>
      <td >Check Out Date</td>
      <td><?=$row['check_out_date']?></td>
    </tr>
    <!-- <tr>
      <td >Room Floor</td>
      <td><?=$row['room_floor']?></td>
    </tr> -->

    <tr>
      <td >Payment</td>
      <td><?=$row['payment']?></td>
    <!--</tr><tr>
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
    </tr>-->
    <tr>
      <td colspan="2" ><form method="POST">
 <div class="col">
    <button class="btn btn-danger" name="submit" onclick="window.print()">Print</button>
    <!-- <button class="btn btn-primary" name="cancel" onclick="window.location.href=''">Back</button> -->
    <a href="./index.php" class="btn btn-primary">Back</a>
</div>
 </form></td>
    </tr>
    </tbody>
    </table>
    </div>
    <!-- <form method="POST">
 <div class="row" style="margin-left: 15%;">
 <div class="col">
    <button class="btn btn-danger" name="submit">Print</button>
    <button class="btn btn-primary" name="cancel" style="margin-left: 15%;">Back</button>
</div>
</div>
 </form> -->
    </body>
</html>