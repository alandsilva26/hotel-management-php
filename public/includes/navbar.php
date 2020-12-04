<nav class="navbar navbar-expand-md px-md-5">
  <a class="navbar-brand" href="<?php echo SROOT."/public/index.php"; ?>"><img src="<?php echo SROOT."/public/media/images/logo/aaa_logo.png";?>" class="d-inline-block align-top" style="max-height:100px;"></img></a>
  <button
    class="navbar-toggler"
    type="button"
    data-toggle="collapse"
    data-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent"
    aria-expanded="false"
    aria-label="Toggle navigation"
    >
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo SROOT."/public/index.php"; ?>">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo SROOT."/public/rooms.php"; ?>">Rooms</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo SROOT."/public/reservation.php"; ?>"
          >Reservation</a
          >
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo SROOT."/public/aboutus.php"; ?>">About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a
          class="nav-link dropdown-toggle"
          href="#"
          id="navbarDropdown"
          role="button"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
          >
          <i class="fa fa-user-circle-o"></i>&nbsp;
          <?php
            if (isLoggedIn()) {
                echo $_SESSION["user_fname"];
            } else {
                echo "Account";
            } ?>
        </a>
        <div
          class="dropdown-menu dropdown-menu-right"
          aria-labelledby="navbarDropdown"
          >
          <?php
            if (isLoggedIn()) {
                ?>
          <span class="dropdown-item"
            >Signed in as <b><?= $_SESSION["user_fname"]." ".$_SESSION["user_lname"]; ?></b></span
          >
          <div class="dropdown-divider"></div>
            <?php
            }
            ?>
            <?php if (isLoggedIn() &&  isAdmin($pdo) == true) {?>
              <a class="dropdown-item" href="<?php echo SROOT."/public/admin/index.php"; ?>"><i class="fa fa-lock"></i>&nbsp;&nbsp;Admin</a>
            <?php } ?>
          <?php
            if (!isLoggedIn()) {
                ?>
          <a class="dropdown-item" href="<?php echo SROOT."/public/login.php"; ?>"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Log in</a>
          <a class="dropdown-item" href="<?php echo SROOT."/public/signup.php"; ?>"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Sign up</a>
            <?php
            } ?>
          <a class="dropdown-item" href="<?php echo SROOT."/public/accounts.php"; ?>"><i class="fa fa-user-circle-o"></i>&nbsp;&nbsp;Account</a>
          <?php
            if (isLoggedIn()) {
                ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="./core/logout_user.php"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Logout</a>
          <?php
            }
          ?>
        </div>
      </li>
    </ul>
  </div>
</nav>