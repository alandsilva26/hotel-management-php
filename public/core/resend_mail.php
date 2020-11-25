<?php
require_once("../config.php");
require_once("./mail.php");

if (isset($_GET["resend"])) {
    $hash = md5(rand(0, 1000));

    $sql = "UPDATE users SET verification_hash = :verification_hash WHERE user_email = :user_email";
    $statement = $pdo->prepare($sql);

    $statement->execute(
        array(
            ":verification_hash" => $hash,
            ":user_email" => $_SESSION["user_email"]
        )
    );

    mailUser($_SESSION["user_email"], $hash);

    header("Location: ../verify_user.php");
    return;
}
