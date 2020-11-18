<nav class="navbar navbar-expand-md px-md-5">
  <a class="navbar-brand" href="<?php echo SROOT."/public/index.php"; ?>">Navbar</a>
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
        <a class="nav-link" href="<?php echo SROOT."/public/index.php#reservation-form"; ?>"
          >Reservations</a
          >
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
        Account
        </a>
        <div
          class="dropdown-menu dropdown-menu-right"
          aria-labelledby="navbarDropdown"
          >
          <span class="dropdown-item"
            >Signed in as <b>lemon potter</b></span
            >
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo SROOT."/public/admin/index.php"; ?>">Admin</a>
          <a class="dropdown-item" href="<?php echo SROOT."/public/login.php"; ?>">Log in</a>
          <a class="dropdown-item" href="<?php echo SROOT."/public/signup.php"; ?>">Sign up</a>
          <a class="dropdown-item" href="<?php echo SROOT."/public/accounts.php"; ?>">Account</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>