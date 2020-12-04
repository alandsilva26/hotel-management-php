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

    $user_id = $_SESSION["user_id"];
    $check_in_date = $_SESSION["reservation"]["check_in_date"];
    $check_out_date = $_SESSION["reservation"]["check_out_date"];
    $no_children = $_SESSION["reservation"]["no_children"];
    $no_adults = $_SESSION["reservation"]["no_adults"];
    $room_id = $_SESSION["reservation"]["room_id"];
    $amount = getRoomAmountFromId($room_id, $pdo);

    // Begin transaction
    $pdo->beginTransaction();

    // Modify room
    $sql = "UPDATE rooms SET room_booked = 1, check_in_date = :check_in_date, check_out_date = :check_out_date WHERE room_id = :room_id";
    // $sql = "SELECT * FROM rooms WHERE room_id = :room_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ":check_in_date" => $check_in_date,
        ":check_out_date" => $check_out_date,
        ":room_id" => $room_id
    ));

    // Create reservation
    $sql = "INSERT INTO reservations (user_id, room_id, no_adults, no_children) VALUES (:user_id, :room_id, :no_adults, :no_children)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ":user_id" => $user_id,
        ":room_id" => $room_id,
        ":no_adults" => $no_adults,
        ":no_children" => $no_children
    ));


    $reservation_id = $pdo->lastInsertId();

    $sql = "INSERT INTO payment (user_id, reservation_id, amount) VALUES (:user_id, :reservation_id, :amount)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ":user_id" => $user_id,
        ":reservation_id" => $reservation_id,
        ":amount" => $amount
    ));

    unset($_SESSION["reservation"]);
    $pdo->commit();

    sendJson(array("reservation_id" => $reservation_id));
    return;
}
