<?php
require_once("./config.php");
include("./includes/header.php");
?>
  <body>
    <header class="nav-dark">
    <?php include("./includes/navbar.php"); ?>
    </header>
    <main>
    <section>
    <div class="container mt-3">
      <div class="row">
        <div class="col-md-3">
          <h3>Account Details</h3>
          <div class="sidenav navbar-expand-md">
            <a href="accounts.html">Account</a>
            <hr />
            <a href="#Notifications">Notifications</a>
            <hr />
            <a href="#password">Password</a>
            <hr />
          </div>
        </div>
        <div class="col-md-9">
          <div class="Account-page">
            <form>
              <!-- <div class="row">
                <div class="col">
                  <form class="md-form">
                    <div class="file-field">
                      <div class="mb-4">
                        <img
                          src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                          class="rounded-circle z-depth-1-half avatar-pic"
                          alt="example placeholder avatar"
                        />
                      </div>
                      <div class="d-flex justify-content-center">
                        <div class="btn btn-mdb-color btn-rounded float-left">
                          <span>Add photo</span>
                          <input type="file" />
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <hr /> -->

              <div class="form-group">
                  <label for="user_fname">First name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="user_name"
                    id="user_name"
                    placeholder="First name"
                    readonly
                  />
                </div>
                <div class="form-group">
                  <label for="user_lname">Last name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="user_lname"
                    id="user_lname"
                    placeholder="Last name"
                    readonly
                  />
                </div>
                <div class="form-group">
                  <label for="user_email">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    name="user_email"
                    id="user_email"
                    placeholder="Email"
                    readonly
                  />
                </div>
                <div class="form-group">
                  <label for="user_phone">Phone number</label>
                  <input
                    type="text"
                    class="form-control"
                    name="user_name"
                    id="user_name"
                    placeholder="First name"
                    readonly
                  />
                </div>
                <div class="form-group">
                  <label for="user_phone">Date of birth</label>
                  <input
                    type="date"
                    class="form-control"
                    name="user_dob"
                    id="user_dob"
                    placeholder="Date of birth"
                    readonly
                  />
                </div>
                <!-- <div class="form-group">
                  <button class="btn btn-success">Update pr</button>
                </div> -->
            </form>
            
            <b>Delete account</b><br />
            By deleting your account you will lose all your data&nbsp;<small><a class="md" href="#">delete account</a></small>
          </div>
        </div>
      </div>
    </div>
    </section>
    </main>
  <?php include("./includes/footer.php"); ?>
  <script>
    $(document).ready(function() {
        $("nav").eq(0).addClass("bg-dark");
        $("nav").eq(0).addClass("navbar-dark");
        // bg-dark navbar-dark 
    });
  </script>
</body>
</html>
