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
                  <label for="phone-no">Phone number</label>
                  <input
                    type="tel"
                    name="phone-no"
                    class="form-control"
                    placeholder="Enter your phone number"
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
                  <label for="fname">First name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="fname"
                    placeholder="Enter your first name"
                  />
                </div>
                <div class="form-group">
                  <label for="lname">Last name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="lname"
                    placeholder="Enter your last name"
                  />
                </div>
                <div class="form-group">
                  <label for="dob">Date of birth</label>
                  <input
                    type="text"
                    class="form-control"
                    name="dob"
                    id="dob"
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
                  <label for="email">Email</label>
                  <input
                    type="email"
                    name="email"
                    placeholder="Enter your email"
                    class="form-control"
                  />
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input
                    type="password"
                    name="password"
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
        $("#dob").datepicker({
          changeMonth: true,
          changeYear: true,
          yearRange: "1930:" + year + "",
          defaultDate: d,
        });
        $("nav").addClass("navbar-light");
      });
    </script>
  </body>
</html>
