<?php
    require_once("../config.php");

    header("Content-Type: application/json; charset=utf-8");
    
    if ($_POST["user_password"] != "") {
        $user_fname = $_POST["user_fname"];
        $user_lname = $_POST["user_lname"];
        $user_email = $_POST["user_email"];
        $user_phone = $_POST["user_phone"];
        $user_dob = $_POST["user_dob"];
        $user_password = $_POST["user_password"];
        $pwd_hash = hash("sha256", $user_password);
        $hash = md5(rand(0, 1000));
    } else {
        sendJson("Password cannot be empty", 1, "user_password");
        return;
    }

    // INSERT DATA INTO TABLE
    $sql = "INSERT INTO users (user_fname, user_lname, user_email, user_phone, user_dob, user_password, verification_hash) VALUES (:user_fname, :user_lname, :user_email, :user_phone, :user_dob, :user_password, :verification_hash)";

    $statement = $pdo->prepare($sql);

    $statement->execute(array(
        ":user_fname" => $user_fname,
        ":user_lname" => $user_lname,
        ":user_email" => $user_email,
        ":user_phone" => $user_phone,
        ":user_dob" => $user_dob,
        ":user_password" => $pwd_hash,
        ":verification_hash" => $hash,
        
    ));

    // mailUser($user_email, $hash);

    
    $_SESSION["user_id"] = $pdo->lastInsertId();
    $_SESSION["user_email"] = $user_email;
    $_SESSION["user_fname"] = $user_fname;
    $_SESSION["user_lname"] = $user_lname;
    sendJson("User logged in", 0);
    return;
