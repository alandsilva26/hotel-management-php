<?php
require("../config.php");
header("Content-Type: application/json; charset=utf-8");

    if (isset($_POST["action"])) {
        if ($_POST["action"] == "reservation") {
            $_SESSION["reservation"] = array(
                "check_in_date" => $_POST["check_in_date"],
                "check_out_date" => $_POST["check_out_date"],
                "no_children" => $_POST["no_children"],
                "no_adults" => $_POST["no_adults"],
                "room_id" => $_POST["room_id"],
            );
        }
        sendJson("OK");
        return;
    }


    
if (isset($_POST['confirm_booking'])) {
    $room_type=$_POST['room_type'];
    $user_id=$_POST["user_id"];
    $ph_number=$_POST["phone_number"];
    $check_in_date = date('d-m-Y', strtotime($_POST["check_in_date"]));
    
    $check_out_date = date('d-m-Y', strtotime($_POST["check_out_date"]));
    
    $no_adults=$_POST["no_adults"];
    $no_children=$_POST["no_children"];
    $capacity=$no_adults+$no_children;
    $date=date("d-m-Y", time());
    
    $sql1="SELECT room_id, room_price,room_type,room_name from rooms where room_booked = 0 and room_type = \"$room_type\" and room_capacity>=$capacity LIMIT 1";
    
    $statement = $pdo->prepare($sql1);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $room_id=$row['room_id'];
    $room_price=$row['room_price'];
    $room_type=$row['room_type'];
    $room_name=$row['room_name'];
    $date_diff=abs($check_out_date-$check_in_date);
    
    $total_cost=$date_diff*$room_price;

    $sql2="START TRANSACTION;
        INSERT INTO reservations(user_id, room_id, booking_date, no_adults, no_children) VALUES (\"$user_id\",$room_id,\"$date\",$no_adults,$no_children);
        UPDATE rooms SET room_booked = 1, check_in_date=$check_in_date, check_out_date=$check_out_date WHERE room_id=$row[room_id];";

    $statement = $pdo->prepare($sql2);
    $statement->execute();

    $sql3="SELECT reservation_id FROM reservations WHERE user_id=\"$user_id\" LIMIT 1;";
    $statement = $pdo->prepare($sql3);
    $statement->execute();
    $row2 = $statement->fetch(PDO::FETCH_ASSOC);
    $reservation=$row2['reservation_id'];

    $sql4="INSERT INTO `payment`(`user_id`, `reservation_id`, `currency`, `method`, `amount`) VALUES ($user_id, $reservation,\"INR\",\"card\",$total_cost);
    COMMIT;";
    $statement = $pdo->prepare($sql4);
    $statement->execute();

    $sql5="SELECT payment_id FROM payment WHERE reservation_id=\"$reservation\" LIMIT 1;";
    $statement = $pdo->prepare($sql5);
    $statement->execute();
    $row3 = $statement->fetch(PDO::FETCH_ASSOC);

    $_SESSION['payment_id']=$row3['payment_id'];
    $_SESSION['amount_paid']= $total_cost;
    $_SESSION['room_id']= $room_id;
    $_SESSION['room_price']=$room_price;
    $_SESSION['room_type']=$room_type;
    $_SESSION['room_name']=$room_name;
    $_SESSION['no_days']=$date_diff;
}
