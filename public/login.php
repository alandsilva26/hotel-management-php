<?php
include("./config.php");

// Check if user is already logged in

if (isLoggedIn()) {
    header("Location: index.php");
    return;
}
?>

<?php include("./includes/header.php"); ?>
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
              <img src="./media/logo/google.svg" alt="google logo" />
              <button href="" class="btn">Sign in with google</button>
            </div>

            <h5><span class="small">or sign in with email</span></h5>
            <form action="" id="login_user" method="post" class="form">
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  name="user_email"
                  id="user_email"
                  placeholder="Enter your email"
                  class="form-control"
                />
                <small id="user_email_error" class="error-message text-danger">
                  
              </small>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  name="user_password"
                  id="user_password"
                  placeholder="Enter your password"
                  class="form-control"
                />
                <small id="user_password_error" class="error-message text-danger">
              </small>
              </div>
              <div class="form-group">
                <button type="submit" id="login-user-btn" name="login-user" class="btn">
                  Log in
                </button>
              </div>

              <div class="alternate-auth">
                <span>
                  Don't have an account?
                  <a href="./signup.php">&nbsp;Sign up instead</a>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


<?php include("./includes/footer.php"); ?>
    <!-- Custom -->
  <script>
    $(document).ready(function () {
    $("nav").addClass("navbar-light");
    $("#user_email").val("alandsilva@gmail.com");
    $("#user_password").val("alan");

    function handleError(about, message) {
      $(`#${about}`).addClass("is-invalid");
      $(`#${about}_error`).html("<span>"+message+"</span>");
    }

    // Login user
    $("#login_user").submit(function (e) {
      $(".error-message").html("");
      $(".form-control").removeClass("is-invalid");
      $("#login-user-btn").html("Loggin you in...");

      e.preventDefault();
      var formData = new FormData(this);

      $.ajax({
        url: "core/login_user.php",
        type: "POST",
        data: formData,
        success: function (data) {
          if (data.error == 1) {
            handleError(data.about, data.message);
            $("#login-user-btn").html("Log in");
          } else {
            window.location.href="verify_user.php";
            return;
          }
        },
        error: function (data, message, errorThrown) {
          // $("#error-form").html("<span class=\"p-2\">" + message + errorThrown + "</span>");
        },
        cache: false,
        contentType: false,
        processData: false
      });
    });
  });
  </script>

</body>
</html>