<?php require("./config.php");
include("./includes/header.php");
 ?>
  <body>
    <!-- Form Section -->
    <section id="auth-form">
      <div class="auth--wrapper">
        <?php include("./includes/navbar.php"); ?>

        <div class="bg-image">
          <span>
            Enjoy personalized recommendations, discounts and much more
          </span>
        </div>
        <div class="form-wrapper">
          <div class="form-card">
            <h2>Log in to your account</h2>
            <div class="d-none">
              Icons made by
              <a href="https://www.flaticon.com/authors/freepik" title="Freepik"
                >Freepik</a
              >
              from
              <a href="https://www.flaticon.com/" title="Flaticon">
                www.flaticon.com</a
              >
            </div>

            <div class="group">
              <!-- <img src="./media/logo/google.svg" alt="google logo" /> -->
              <button href="" class="btn">Sign in with google</button>
            </div>

            <h5><span class="small">or sign in with email</span></h5>
            <form action="" method="post" class="form">
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  placeholder="Enter your email"
                  class="form-control"
                />
                <!-- is-invalid add this class along with form-control -->
                <!-- <small id="passwordHelp" class="text-danger">
                  Must be 8-20 characters long.
                </small> -->
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  name="password"
                  id="password"
                  placeholder="Enter your password"
                  class="form-control"
                />
              </div>
              <div class="form-group">
                <button type="submit" name="login-user" class="btn">
                  Log in
                </button>
              </div>

              <div class="alternate-auth">
                <span>
                  Don't have an account?
                  <a href="./signup.html">&nbsp;Sign up instead</a>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?php 
if (isset($_POST['login-user'])) {
    $password=$_POST['password'];
    $email=$_POST['email'];
    $sql = "SELECT user_email, user_password, user_verified FROM users WHERE user_email= :email";

    $statement = $pdo->prepare($sql);
    $statement->execute(array(":email" => $email));
    $row= $statement->fetchall(PDO::FETCH_ASSOC);
    $test = $row[0]["user_password"];
    $user_password = password_verify($password,$test);
    $verified = $row[0]['user_verified'];
    if (!is_null($row)) {
        $hash = $user_password;
        if ($verified=='1') {
            if ($user_password) {
                echo "PASSWORD VERIFIED";
            }else{
              echo "PASSWORD NOT VERIFIED";
            }
        }else{
          echo "USER NOT VERIFIED";
        }
    }else{
      echo "User Email Not present in db";
    }
}



?>

<?php include("./includes/footer.php"); ?>
    <!-- Custom -->
    <script>
      $(document).ready(function () {
        $("nav").addClass("navbar-light");
        $("#email").val("ansel20@gmail.com");
        $("#password").val("ansel2000");
      });
    </script>

</body>
</html>