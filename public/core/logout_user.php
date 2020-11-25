<?php
include("../config.php");

unset($_SESSION["user_email"]);

session_destroy();

header("Location: ../index.php");

return;
