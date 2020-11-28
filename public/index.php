<?php
require_once("./config.php");
include("./includes/header.php");
?>
<body>
  <header id="home-header">
    <div id="home-header--bg-image">
      <?php include("./includes/navbar.php"); ?>
      <div class="home-header--title">
        <div class="container p-5">
          <h1>Find the best deals</h1>
          <h3 id="reservation-form">for your next trip</h3>
        </div>
      </div>
    </div>
  </header>
  <main>
    <section id="home-form">
      <div class="wrapper">
        <form id="find-available-rooms-form">
          <div class="form-group">
            <label for="check-in">Check in</label>
            <input
              type="hidden"
              id="check-in"
              class="form-control"
              name="check-in"
              />
            <button id="check-in-button" class="btn input-button">
            Check in date
            </button>
          </div>
          <div class="form-group">
            <label for="check-in">Check out</label>
            <input
              type="hidden"
              id="check-out"
              class="form-control"
              name="check-out"
              value=""
              />
            <button id="check-out-button" class="btn input-button">
            Check out date
            </button>
          </div>
          <div class="form-group">
            <label for="form-dropdown">Guests</label>
            <button
              class="btn dropdown-toggle"
              id="form-dropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              >
            Add guests
            </button>
            <ul class="dropdown-menu" aria-labelledby="form-dropdown">
              <li class="dropdown-menu-item">
                <div class="form-group form-group-nested">
                  <label for="count-adults">Adults</label>
                  <input
                    type="number"
                    class="form-control"
                    name="count-adults"
                    id="count-adults"
                    placeholder="Ages 13 or above"
                    />
                </div>
                <div class="form-group form-group-nested">
                  <label for="count-children">Children</label>
                  <input
                    type="number"
                    class="form-control"
                    name="count-children"
                    id="count-children"
                    placeholder="Ages 1-12"
                    />
                </div>
              </li>
            </ul>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="find-rooms">
            Search
            </button>
          </div>
        </form>
      </div>
    </section>
    <!-- Featured Rooms -->
    <section id="featured-rooms">
      <div class="container my-5 py-5">
        <div class="section-title">
          <h2>Today's best deals</h2>
        </div>
        <div class="row custom-room-cards">
          <div class="col col-md-3">
            <div class="card">
              <div class="card-body">
                <img src="./media/images/rooms/1.jpg" alt="" />
              </div>
              <div class="card-footer">
                <div class="footer-head">
                  <div class="label">Premium</div>
                  <div class="price">$120/day</div>
                </div>
                <div class="footer-body">Daimond Suite</div>
                <!-- <div class="footer-foot">lemon</div> -->
              </div>
            </div>
          </div>
          <div class="col col-md-3">
            <div class="card">
              <div class="card-body">
                <img src="./media/images/rooms/2.jpg" alt="" />
              </div>
              <div class="card-footer">
                <div class="footer-head">
                  <div class="label">Premium</div>
                  <div class="price">$120/day</div>
                </div>
                <div class="footer-body">Daimond Suite</div>
                <!-- <div class="footer-foot">lemon</div> -->
              </div>
            </div>
          </div>
          <div class="col col-md-3">
            <div class="card">
              <div class="card-body">
                <img src="./media/images/rooms/3.jpg" alt="" />
              </div>
              <div class="card-footer">
                <div class="footer-head">
                  <div class="label">Premium</div>
                  <div class="price">$120/day</div>
                </div>
                <div class="footer-body">Daimond Suite</div>
                <!-- <div class="footer-foot">lemon</div> -->
              </div>
            </div>
          </div>
          <div class="col col-md-3">
            <div class="card">
              <div class="card-body">
                <img src="./media/images/rooms/4.jpg" alt="" />
              </div>
              <div class="card-footer">
                <div class="footer-head">
                  <div class="label">Premium</div>
                  <div class="price">$120/day</div>
                </div>
                <div class="footer-body">Daimond Suite</div>
                <!-- <div class="footer-foot">lemon</div> -->
              </div>
            </div>
          </div>
          <!-- <div class="col col-md-4">
            <div class="img-wrapper">
              <img src="" alt="Room photo" />
            </div>
            <div class="content">
              <div class="title">Deluxe Suite</div>
              <div class="price">$&nbsp;<span class="value">480</span></div>
              <div class="book-room">
                <a href="#">Book this room</a>
              </div>
            </div>
            </div> -->
        </div>
      </div>
    </section>
    <section id="decoration-accomodation">
      <div class="container my-5 py-5">
        <div class="row">
          <div class="col-md-5">
            <div class="content">
              <div class="section-title">
                <h2>Choose the perfect accomodation</h2>
              </div>
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos
                illum veniam qui veritatis praesentium voluptates atque enim
                quia exercitationem ipsa quaerat, delectus officia dolore rem
                consequatur nesciunt. Ullam, consequuntur necessitatibus.m
              </p>
            </div>
          </div>
          <div class="col-md-7 card-container">
            <div class="card">
              <div class="card-body">
                <img src="./media/images/backgrounds/home-1.jpg" alt="" />
              </div>
              <div class="card-footer">lemon</div>
            </div>
            <div class="card">
              <div class="card-body">
                <img src="./media/images/backgrounds/home-2.jpg" alt="" />
              </div>
              <div class="card-footer">lemon</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="premium-section">
      <div class="container my-5 py-5">
        <div class="row">
          <div class="col-md-7">
            <div class="card-container">
              <div class="card">
                <div class="card-body">
                  <img src="./media/images/backgrounds/home-1.jpg" alt="" />
                </div>
                <div class="card-footer">
                  <div class="footer-head">
                    <div class="label">Premium</div>
                    <div class="price">$120/day</div>
                  </div>
                  <div class="footer-body">Daimond Suite</div>
                  <!-- <div class="footer-foot">lemon</div> -->
                </div>
              </div>
              <!-- <div class="spacer"></div>
                <div class="spacer"></div> -->
              <div class="card">
                <div class="card-body">
                  <img src="./media/images/backgrounds/home-2.jpg" alt="" />
                </div>
                <div class="card-footer">
                  <div class="footer-head">
                    <div class="label">Premium</div>
                    <div class="price">$120/day</div>
                  </div>
                  <div class="footer-body">Daimond Suite</div>
                  <!-- <div class="footer-foot">lemon</div> -->
                </div>
              </div>
              <!-- <div class="card decoration"></div> -->
            </div>
          </div>
          <div class="col-md-5">
            <div class="content">
              <div class="section-title">
                <h2>Premium deals for your premium needs</h2>
              </div>
              <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos
                illum veniam qui veritatis praesentium voluptates atque enim
                quia exercitationem ipsa quaerat, delectus officia dolore rem
                consequatur nesciunt. Ullam, consequuntur necessitatibus.m
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="home-banner">
      <div class="banner">
        <div class="container">
          <div class="jumbotron">
            <h6>Our newsletter</h6>
            <h2>Become a member and enjoy flat 25% discounts on Booking.</h2>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php include("./includes/footer.php"); ?>
  <script>
    $(document).ready(function () {
      $("#find-available-rooms-form").submit(function () {
        event.preventDefault();
        var indate = $("#check-in").val();
        var outdate = $("#check-out").val();
        var adults = $("#count-adults").val();
        var children = $("#count-children").val();
        console.log(children);
        if(indate != "" && indate != null && children != null && children != "") {
          window.location.href=`reservation.php?check_in_date=${indate}&check_out_date=${outdate}&adults=${adults}&children=${children}`;
        }
      });
    });
  </script>
</body>
</html>