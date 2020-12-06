<?php
  require_once("./config.php");
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
            <form action="" id="signup_user" method="post" class="form">
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
                    type="password"
                    name="user_password"
                    id="user_password"
                    placeholder="Enter your password"
                    class="form-control"
                  />
                  <small id="user_password_error" class="error-message text-danger"></small>
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
                  <a href="./login.php">&nbsp;Login here</a>
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


        $("#user_phone").val("703202020");
        $("#user_fname").val("Alan");
        $("#user_lname").val("Dsilva");
        $("#user_dob").val("2000/07/19");
        $("#user_email").val("alandsilva@gmail.com");
        $("#user_password").val("alan");

        
      function handleError(about, message) {
        console.log("IN ERROR");
        $(`#${about}`).addClass("is-invalid");
        $(`#${about}_error`).html("<span>"+message+"</span>");
      }

        // Login user
        $("#signup_user").submit(function (e) {
          $(".error-message").html("");
          $(".form-control").removeClass("is-invalid");
          $("#signup-user").html("Signing you in...");

          e.preventDefault();
          var formData = new FormData(this);

          $.ajax({
            url: "core/signup_user.php",
            type: "POST",
            data: formData,
            success: function (data) {
              console.log("SUCCESS");
              console.log(data);
              if (data.error == 1) {
                console.log(data.error);
                handleError(data.about, data.message);
                $("#signup-user").html("Sign up");
              } else {
                $("#signup-user").html("Signed up");
                window.location.href="verify_user.php";
                // return;
              }

            },
            error: function (data, message, errorThrown) {
              console.log("ERROR" + errorThrown + message);
              // $("#error-form").html("<span class=\"p-2\">" + message + errorThrown + "</span>");
              $("#signup-user").html("Sign up");
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
