<?php
include("./config.php");
// Check if user is already logged in
?>

<?php include("./includes/header.php"); ?>
  <body>
    <?php include("./includes/navbar.php"); ?>

<section id="reservation">
   <div class="container mt-5">
      <div class="row">
         <div class="col-md-5">
         <h1>Make your reservation</h1>
                <p>
                  Our hotel is self-certified to follow a series of
                  precautionary measures to make your hotel stay safe and
                  healthy.
                </p>
         </div>
         <div class="col-md-7">
            <form method="POST" action="payment.php">
               <div class="form-group">
                  <span class="form-label">Enter User I.D.</span>
                  <input
                     class="form-control"
                     type="text"
                     name="user_id"
                     placeholder="Enter your user I.D."
                     required
                     />
               </div>
               <div class="form-group">
                  <span class="form-label">Phone Number</span>
                  <input
                     class="form-control"
                     type="number"
                     name="phone_number"
                     placeholder="Enter your phone number"
                     required
                     />
               </div>
               <div class="form-group">
                  <span class="form-label">Room Type</span>
                  <select class="form-control" name="room_type" required>
                     <option value="">Select</option>
                     <option value="classic Double room">classic Double room</option>
                     <option value="classic Double room">classic Double room</option>
                     <option value="classic Double room">classic Double room</option>
                     <option value="classic Double room">classic Double room</option>
                  </select>
               </div>
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <span class="form-label">Check In</span>
                        <input class="form-control" name="check_in_date" type="date" required />
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <span class="form-label">Check out</span>
                        <input class="form-control" name="check_out_date" type="date" required />
                     </div>
                  </div>
               </div>
               <div class="row">
                  <!-- <div class="col-sm-4">
                     <div class="form-group">
                       <span class="form-label">Rooms</span>
                       <select class="form-control" required>
                         <option>1</option>
                         <option>2</option>
                         <option>3</option>
                       </select>
                       <span class="select-arrow"></span>
                     </div>
                     </div> -->
                  <div class="col-sm-6">
                     <div class="form-group">
                        <span class="form-label">Adults</span>
                        <select class="form-control" name="no_adults" required>
                           <option>1</option>
                           <option>2</option>
                           <option>3</option>
                        </select>
                        <span class="select-arrow"></span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <span class="form-label">Children</span>
                        <select class="form-control" name="no_children" required>
                           <option>0</option>
                           <option>1</option>
                           <option>2</option>
                        </select>
                        <span class="select-arrow"></span>
                     </div>
                  </div>
               </div>
               <div class="form-btn">
                  <button class="submit-btn" name="confirm_booking">Confirm Booking</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>
    
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
