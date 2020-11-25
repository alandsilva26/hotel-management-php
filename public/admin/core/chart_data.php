<?php
    require_once("../../config.php");
    header("Content-Type: application/json; charset=utf-8");

    if (isset($_GET["content"])) {
        if ($_GET["content"] == "booking") {
            $rows = getAllRooms($pdo);

            // $booked = 0;
            // $unbooked = 0;
            // foreach ($rows as $row) {
            //     if ($row["room_booked"] == 1) {
            //         $booked = $booked + 1;
            //     } else {
            //         $unbooked = $unbooked + 1;
            //     }
            // }
            // $data = array(
            //     "booked" => $booked,
            //     "unbooked" => $unbooked
            // );

            sendJson($rows, 0);
            return;
        }

        // if ($_GET["content"] == "room_types") {
        //     $rows = getAllRooms($pdo);

        //     $booked = 0;
        //     $unbooked = 0;
        //     foreach ($rows as $row) {
        //         if ($row["room_booked"] == 1) {
        //             $booked = $booked + 1;
        //         } else {
        //             $unbooked = $unbooked + 1;
        //         }
        //     }
        //     $data = array(
        //         "booked" => $booked,
        //         "unbooked" => $unbooked
        //     );

        //     sendJson($data, 0);
        //     return;
        // }
    }
