<?php
  require_once("./config.php");

  $status = array(
    "verified" => null
  );

 if (isset($_SESSION["user_email"])) {
     $verification = isUserVerified($pdo, $_SESSION["user_email"]);

     if ($verification["verified"] == 1) {
         $status["verified"] = true;

         header("Location: index.php");
         return;
     }
 }

  if (isset($_GET["email"]) && isset($_GET["hash"])) {
      $user_email = $_GET["email"];
      $verification_hash = $_GET["hash"];

      $sql = "SELECT user_id FROM users WHERE user_email = :user_email AND verification_hash = :verification_hash";

      $statement = $pdo->prepare($sql);

      $statement->execute(array(
        ":user_email" => $user_email,
        ":verification_hash" => $verification_hash
      ));

      if ($statement->fetch(PDO::FETCH_ASSOC) != false) {
          // Verify User
          $sql = "UPDATE users SET user_verified = 1 WHERE user_email = :user_email AND verification_hash = :verification_hash";

          $statement = $pdo->prepare($sql);

          $statement->execute(array(
            ":user_email" => $user_email,
            ":verification_hash" => $verification_hash
          ));

          $status["verified"] = true;

          header("Location: index.php");
          return;
      }

      $status["verified"] = false;
  }
?>


<?php
include("./includes/header.php");
?>
<body>
  <header id="verify-user">
    <div id="verify-user--bg-image">
      <?php include("./includes/navbar.php"); ?>
      <div class="wrapper">
      <div class="container">
            <div class="content p-5">
                <h2><b>Verify your account</b></h2>
                <p>A verification link has been sent to your registered email id</p>
                <?php if ($status["verified"]) { ?> 
                  <h3 class="text-success ">Your account has been verified redirecting...</h3>
                <?php } elseif ($status["verified"] == null) { ?> 
                <p></p>
                <?php } else {?> 
                  <h3 class="text-danger">Invalid link...</h3>
                <?php } ?>
                <form action="./core/resend_mail.php" method="GET">
                  <button class="btn btn-outline-primary" type="submit" name="resend" value="resend">Resend email</button>
                </form>
            </div>
      </div>
      </div>
    </div>
  </header>
  <main>
  </main>
  <?php include("./includes/footer.php"); ?>
</body>
</html>