<?php

function dnd($content)
{
    var_dump($content);
    die();
}

function getAllRooms($pdo)
{
    $statement = $pdo->prepare("SELECT * FROM rooms");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllUsers($pdo)
{
    $statement = $pdo->prepare("SELECT * FROM users");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getAllReservations($pdo)
{
    $statement = $pdo->prepare("SELECT * FROM reservations");
    $statement->execute();
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function getRoomFromId( $pdo, $id)
{
    $statement = $pdo->prepare("SELECT * FROM rooms WHERE room_id = :room_id");

    $statement->execute(array(
        ":room_id" => $id
    ));

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    return $row;
}


function getRoomAmountFromId($id, $pdo)
{
    $statement = $pdo->prepare("SELECT * FROM rooms WHERE room_id = :room_id");

    $statement->execute(array(
        ":room_id" => $id
    ));

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    return $row["room_price"];
}

function getAmountFromId($id, $pdo)
{
    $sql = "SELECT room_price FROM rooms WHERE room_id = :room_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        "room_id" => $id
    ));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row;
}


function my_error_handler($error_no, $error_msg)
{
    throw new Exception($error_no." ". $error_msg);
}

function isUserVerified($pdo, $email)
{
    
    $sql = "SELECT user_verified FROM users WHERE user_email = :user_email";

    $statement = $pdo->prepare($sql);

    $statement->execute(array(
        ":user_email" => $email
    ));

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row == false) {
        return array(
            "error" => 1,
            "verified" => 0,
            "message" => "Invalid email address",
        );
    }

    if ($row["user_verified"] == 0) {
        return array(
            "error" => 0,
            "verified" => 0,
            "message" => "User not verified",
        );
    } else {
        return array(
            "error" => 0,
            "verified" => 1,
            "message" => "User verified",
        );
    }
}


function sendJson($message, $error=0, $about="")
{
    $data = array(
    "error" => $error,
    "about" => $about,
    "message" => $message
  );
    echo(json_encode($data));
    // sendJson($data);
    // return;
}

function isLoggedIn()
{
    if (isset($_SESSION["user_email"])) {
        return true;
    }
    return false;
}

function isAdmin($pdo)
{
    $sql = "SELECT user_admin FROM users WHERE user_email = :user_email";

    $statement = $pdo->prepare($sql);

    $statement->execute(
        array(
            ":user_email" => $_SESSION["user_email"]
        )
    );

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row["user_admin"] == 1) {
        return true;
    }
    
    return false;
}
