<?php
require_once("./config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
      
  if (isset($_POST["signup-user"])) {
      $user_fname = $_POST["user_fname"];
      $user_lname = $_POST["user_lname"];
      $user_email = $_POST["user_email"];
      $user_phone = $_POST["user_phone"];
      $user_dob = $_POST["user_dob"];
      $user_password = $_POST["user_password"];
      $pwd_hash = password_hash($user_password, PASSWORD_DEFAULT);
      $hash = md5(rand(0, 1000));



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


  

      
      require '../vendor/autoload.php';
      
      $mail = new PHPMailer;
      $mail->isSMTP();
      $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
      $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
      $mail->Port = 587; // TLS only
      $mail->SMTPSecure = 'tls'; // ssl is depracated
      $mail->SMTPAuth = true;
      $mail->Username = "luciferssd11@gmail.com";
      $mail->Password = "tgdwsmgvpwfyduoe";
      $mail->setFrom("luciferssd11@gmail.com", "Verification");
      $mail->addAddress($user_email, "aaron");
      $mail->Subject = 'PHPMailer GMail SMTP test';
      $mail->msgHTML(
          "Thanks for signing up!
      
      Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
        
      ------------------------
      Username: '.$user_fname $user_lname.'
      Password: '.$user_password.'
      ------------------------
        
      Please click this link to activate your account:
      http://www.yourwebsite.com/verify.php?email='.$user_email.'&hash='.$hash."
      );
      $mail->AltBody = 'HTML messaging not supported';
      
      
      if (!$mail->send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
          header("Location: index.php");
      }
  }
?>


<?php include("./includes/header.php"); ?>
  <body>
    <!-- Form Section -->
    <section id="signup-form">
      <div class="auth--wrapper">
        <?php include("./includes/navbar.php"); ?>

        <div class="bg-image">
          <div class="form-progress">
            <span>Set up your account in 3 simple steps</span>
            <div class="form-progress-item complete">Phone number</div>
            <hr />
            <div class="form-progress-item--divider d-none"></div>
            <div class="form-progress-item">Personal info</div>
            <hr />
            <div class="form-progress-item--divider d-none"></div>
            <div class="form-progress-item">Credentials</div>
          </div>
        </div>
        <div class="form-wrapper">
          <div class="form-card">
            <h2>Sign up</h2>
            <form action="" method="post" class="form">
              <!-- Part 1 of form -->
              <div class="part part-1">
                <div class="form-group">
                  <label for="user_phone">Phone number</label>
                  <input
                    type="tel"
                    name="user_phone"
                    id="user_phone"
                    class="form-control"
                    placeholder="Enter your 10 digit phone number"
                  />
                </div>

                <!-- Step 1 buttons -->
                <div class="form-group">
                  <div class="step">
                    <a class="btn" href="./index.html" id="cancel-part-1"
                      >Cancel</a
                    >
                    <button class="btn" id="proceed-part-2">Next</button>
                  </div>
                </div>
                <!-- Step 1 buttons end -->
              </div>

              <!-- Part 2 of form -->
              <div class="part part-2">
                <div class="form-group">
                  <label for="user_fname">First name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="user_fname"
                    id="user_fname"
                    placeholder="Enter your first name"
                  />
                </div>
                <div class="form-group">
                  <label for="user_lname">Last name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="user_lname"
                    id="user_lname"
                    placeholder="Enter your last name"
                  />
                </div>
                <div class="form-group">
                  <label for="user_dob">Date of birth</label>
                  <input
                    type="text"
                    class="form-control"
                    name="user_dob"
                    id="user_dob"
                    placeholder="Enter your birth date"
                  />
                </div>

                <!-- Step 2 buttons -->
                <div class="form-group">
                  <div class="step">
                    <button class="btn" id="cancel-part-2">Back</button>
                    <button class="btn" id="proceed-part-3">Next</button>
                  </div>
                </div>
                <!-- Step 2 buttons end -->
              </div>

              <!-- Part 3 of form -->
              <div class="part part-3">
                <div class="form-group">
                  <label for="user_email">Email</label>
                  <input
                    type="user_email"
                    name="user_email"
                    id="user_email"
                    placeholder="Enter your email"
                    class="form-control"
                  />
                </div>
                <div class="form-group">
                  <label for="user_password">Password</label>
                  <input
                    type="user_password"
                    name="user_password"
                    id="user_password"
                    placeholder="Enter your password"
                    class="form-control"
                  />
                </div>

                <!-- Step 3 buttons -->
                <div class="form-group">
                  <div class="step">
                    <button class="btn" id="cancel-part-3">Back</button>
                    <button
                      type="submit"
                      name="signup-user"
                      id="signup-user"
                      class="btn btn-primary"
                    >
                      Signup
                    </button>
                  </div>
                </div>
                <!-- Step 3 buttons end -->
              </div>
              <!-- Part 3 of form ends -->

              <div class="alternate-auth">
                <span>
                  Already have an account?
                  <a href="./login.html">&nbsp;Login here</a>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <?php include("./includes/footer.php"); ?>

    <script src="./js/handle-sign-up.js"></script>

    <!-- Custom -->
    <script>
      $(document).ready(function () {
        var d = new Date();
        var year = d.getFullYear();
        d.setFullYear(year);
        $("#user_dob").datepicker({
          dateFormat: "yy-mm-dd",
          changeMonth: true,
          changeYear: true,
          yearRange: "1930:" + year + "",
          defaultDate: d,
        });
        $("nav").addClass("navbar-light");


        $("#user_phone").val("7030218024");
        $("#user_fname").val("Alan");
        $("#user_lname").val("Dsilva");
        $("#user_dob").val("2000/07/19");
        $("#user_email").val("alandsilva2001@gmail.com");
      });
      
    </script>
  </body>
</html>
