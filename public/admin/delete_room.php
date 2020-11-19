<?php
  require("../config.php");
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

      print("<pre>".print_r($row, true)."</pre>");
    ?>

</section>
</body>
</html>