<?php
  require("../config.php");
?>

<?php include("./includes/header.php"); ?>
<section class="content">
    <?php
        $rows = getAllRooms($pdo);

        foreach ($rows as $row) {
            ?>

            

        <?php
        }
        ?>
</section>
</body>
</html>