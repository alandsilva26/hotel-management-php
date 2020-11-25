<?php
  require("../config.php");
  include("./includes/header.php");
?>
 <section class="content charts-section">
    <div class="container my-3">

        <div class="row" id="account-welcome">
            <div class="container">
                <div class="card">
                   <div class="card-header">
                       <h2>Welcome&nbsp;<span><?php
                        echo $_SESSION["user_fname"]." ".$_SESSION["user_lname"];
                        ?></span></h2>
                   </div>
                </div>
            </div>
        </div>

        <!-- Start of row COUNT -->
        <div class="row" id="count">
            <div class="col-md-4">
                <div class="card card-red">
                    <div class="card-header">
                    <div class="count">
                            <div class="icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="info">
                                <div class="number">
                                <?php
                                    $rows = getAllRooms($pdo);
                                    if ($rows != false) {
                                        echo count($rows);
                                    } else {
                                        echo 0;
                                    }
                                ?>
                                </div>
                                <div class="label">Rooms</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-blue">
                    <div class="card-header">
                    <div class="count">
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="info">
                                <div class="number">
                                <?php
                                    $rows = getAllUsers($pdo);
                                    if ($rows != false) {
                                        echo count($rows);
                                    } else {
                                        echo 0;
                                    }
                                ?>
                                </div>
                                <div class="label">Users</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-green">
                    <div class="card-header">
                        <div class="count">
                            <div class="icon">
                                <i class="fa fa-bookmark"></i>
                            </div>
                            <div class="info">
                                <div class="number">
                                <?php
                                    $rows = getAllReservations($pdo);
                                    if ($rows != false) {
                                        echo count($rows);
                                    } else {
                                        echo 0;
                                    }
                                ?>
                                </div>
                                <div class="label">Reservations</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of row COUNT -->

        <!-- Start of row graphs -->
        <div class="row" id="graphs">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        Booked and unbooked rooms
                    </div>
                    <div class="graph">
                        <canvas id="booking-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-header">
                        All room types
                    </div>
                    <div class="graph">
                        <canvas id="room-types"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
<?php include("./includes/footer.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script src="<?= SROOT ?>/js/chart_render.js"></script>
<script>
    $(document).ready(function() {
        console.log("HELLO");

        // booked vs unbooked cards
        $.ajax({
          url: "core/chart_data.php?content=booking",
          type: "GET",
          success: function (data) {
            renderBooking(data["message"]);
            roomTypes(data["message"]);
          },
          error: function (data, message, errorThrown) {
          }, 
          cache: false,
          contentType: false,
          processData: false
      });

    });
</script>
</body>
</html>

