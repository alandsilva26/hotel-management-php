<?php
  require("../config.php");
  include("./includes/header.php");
?>
      <section class="content">
      <div class="text-danger">
      <?php
        if (isset($_SESSION["error"])) {
            echo $_SESSION["error"];
            unset($_SESSION["error"]);
        }
        ?>
      </div>
        <table
          id="dtVerticalScrollExample"
          class="table table-striped table-bordered small"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th class="th-sm">No.</th>
              <th class="th-sm">Name</th>
              <th class="th-sm">Type</th>
              <th class="th-sm">Featured</th>
              <th class="th-sm">Image</th>
              <th class="th-sm">Price</th>
              <th class="th-sm">Booked</th>
              <th class="th-sm">Check in</th>
              <th class="th-sm">Check out</th>
              <th class="th-sm">Floor</th>
              <th class="th-sm">View</th>
              <th class="th-sm">Beds/ Type</th>
              <th class="th-sm">Cap.</th>
              <th class="th-sm">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $rows = getAllRooms($pdo);

              foreach ($rows as $row) {
                  if ($row["room_booked"] == 1) {
                      $tableClass = "table-green";
                  } else {
                      $tableClass = "table-red";
                  } ?>
            <tr>
              <td><?= $row["room_number"] ?></td>
              <td><?= $row["room_name"] ?></td>
              <td><?= $row["room_type"] ?></td>
              <td class="<?= $row["room_featured"] == 1 ? "table-green": "table-red"; ?>"><?= $row["room_featured"] == 1 ? "Featured" : "Not Featured" ?></td>
              <td class="td-img"><img class="table-img img-responsive" src="<?= IMAGEROOT.$row["room_image"] ?>" alt=""></td>
              <td><?= $row["room_price"] ?></td>
              <td class="<?= $tableClass ?>"><?= $row["room_booked"] == 1 ? "Yes" : "No"; ?></td>
              <td class="text-center"><?= is_null($row["check_in_date"]) ? "-" : $row["check_in_date"]; ?></td>
              <td class="text-center"><?= is_null($row["check_out_date"]) ? "-" : $row["check_out_date"]; ?></td>
              <td><?= $row["room_floor"] ?></td>
              <td><?= $row["room_view"] ?></td>
              <td><?= $row["room_beds"]." / ".$row["bed_type"] ?></td>
              <td><?= $row["room_capacity"] ?></td>
              <td>
                <a href="delete_room.php?room_id=<?= $row["room_id"]; ?>" class="text-danger"> <span class="fa fa-trash"></span>&nbsp;</a>
                &nbsp;
                /
                &nbsp;
                <a  href="edit_room.php?room_id=<?= $row["room_id"]; ?>" class="text-success"> <span class="fa fa-pencil"></span></a>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </section>

    <?php include("./includes/footer.php"); ?>
    
</body>
</html>
