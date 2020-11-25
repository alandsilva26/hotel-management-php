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
              <th class="th-sm">Email</th>
              <th class="th-sm">First name</th>
              <th class="th-sm">Last names</th>
              <th class="th-sm">Verified</th>
              <th class="th-sm">DOB</th>
              <th class="th-sm">Phone</th>
              <th class="th-sm">Admin</th>
              <!-- <th class="th-sm">Address</th> -->
              <th class="th-sm">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT * FROM users";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

            foreach ($rows as $row) {
                if ($row["user_verified"] == 1) {
                    $tableClass = "table-green";
                } else {
                    $tableClass = "table-red";
                } ?>
            <tr>
              <td><?= $row["user_email"] ?></td>
              <td><?= $row["user_fname"] ?></td>
              <td><?= $row["user_lname"] ?></td>
              <td><?= $row["user_verified"] == 1 ? "Yes" : "No" ?></td>
              <td><?= $row["user_dob"] ?></td>
              <td><?= $row["user_phone"] ?></td>
              <td class="<?= $row["user_admin"] ? "" : "text-center" ?>"><?= $row["user_admin"] == 1 ? "Admin" : "-" ?></td>
              <!-- <td><?= $row["address"] ?></td> -->
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
