<?php
require_once("./config.php");


if($_GET["reservation_id"]) {

    $sql = "SELECT room.check_in_date, room.check_out_date, room.room_name, room.room_type, room.room_price, room.room_id, p.payment_id, p.amount FROM reservations LEFT JOIN rooms as room ON room.room_id = reservations.room_id LEFT JOIN payment as p ON p.reservation_id = reservations.reservation_id WHERE reservations.reservation_id = :reservation_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ":reservation_id" => $_GET["reservation_id"],
    ));

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $payment_id = $row["payment_id"];
    $total_cost = $row["amount"];
    $room_id = $row["room_id"];
    $room_price = $row["room_price"];
    $room_type = $row["room_type"];
    $room_name = $row["room_name"];
    $date = date("d-m-Y", time());

    $check_in = date('d',strtotime($row["check_in_date"]));
    $check_out = date('d',strtotime($row["check_out_date"]));
    $no_days = abs($check_out - $check_in);;
}

?>