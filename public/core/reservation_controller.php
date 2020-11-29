<?php
require("../config.php");
header("Content-Type: application/json; charset=utf-8");


    if (isset($_POST["action"])) {
        if ($_POST["action"] == "reservation") {
            $_SESSION["reservation"] = array(
                "check_in_date" => "",
                "check_out_date" => "",
                "no_children" => "",
                "no_adults" => "",
                "room_id" => "",
            );
        }
    }
