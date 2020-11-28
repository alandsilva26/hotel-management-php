<?php
require("../config.php");
header("Content-Type: application/json; charset=utf-8");


$user_email=$_POST['user_email'];
$user_password=$_POST['user_password'];

// Verify if email is valid
if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    sendJson("Email address is invalid", 1, "user_email");
    return;
}

// Verify if user with email exists
$sql = "SELECT user_email FROM users WHERE user_email = :user_email";
$statement = $pdo->prepare($sql);
$statement->execute(array(
    ":user_email" => $user_email
));
$row = $statement->fetch(PDO::FETCH_ASSOC);
if ($row == false) {
    sendJson("Email address does not exist", 1, "user_email");
    return;
}

// Verify if password is right
$sql = "SELECT user_id, user_email, user_fname, user_lname, user_password, user_verified FROM users WHERE user_email = :user_email AND user_password = :user_password";
$statement = $pdo->prepare($sql);
$statement->execute(array(
    ":user_email" => $user_email,
    ":user_password" => hash("sha256", $user_password)
));
$row= $statement->fetch(PDO::FETCH_ASSOC);
if ($row == false) {
    sendJson("Incorrect password.", 1, "user_password");
    return;
}
$user_fname = $row["user_fname"];
$user_lname = $row["user_lname"];

// Check if user is verified
// if ($row["user_verified"] != 1) {
//     sendJson("User is not verified", 1, "user_verified");
//     return;
// }

$_SESSION["user_id"] = $row["user_id"];
$_SESSION["user_email"] = $user_email;
$_SESSION["user_fname"] = $user_fname;
$_SESSION["user_lname"] = $user_lname;
sendJson("User logged in", 0, "user_verified");
return;
