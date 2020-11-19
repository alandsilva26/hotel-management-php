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

function getRoomFromId($pdo, $id)
{
    $statement = $pdo->prepare("SELECT * FROM rooms WHERE room_id = :room_id");

    $statement->execute(array(
        ":room_id" => $id
    ));

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    return $row;
}


function my_error_handler($error_no, $error_msg)
{
    // echo "Opps, something went wrong:";
    // echo "Error number: [$error_no]";
    // echo "Error Description: [$error_msg]";
    throw new Exception($error_no." ". $error_msg);
}
