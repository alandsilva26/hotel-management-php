<?php
  require_once("./config.php");
   include("./includes/header.php");

   // Check if user is already logged in
    if (!isLoggedIn()) {
        header("Location: login.php");
    }

    if (!isset($_SESSION["reservation"])) {
        header("Location: reservation.php");
    }
?>
  <body>
    <?php include("./includes/navbar.php"); ?>
    <div class="container mt-5">
            <div class="row justify-content-between">
               <div class="col-md-5">
               <h1>Make your reservation</h1>
                     <p>
                        Our hotel is self-certified to follow a series of
                        precautionary measures to make your hotel stay safe and
                        healthy.
                     </p>
               </div>
               <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h3 class="text-xs-center">Payment Details</h3>
                            <img class="img-fluid cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" id="payment-form">
                        <div class="flex-row">
                                <div class="col-xs-12 ">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <div>
                                            <h2><b>$ <?= getRoomAmountFromId($_SESSION["reservation"]["room_id"], $pdo); ?></b><h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-row">
                                <div class="col-xs-12 ">
                                    <div class="form-group">
                                        <label>CARD NUMBER</label>
                                        <div class="input-group">
                                            <input type="tel" class="form-control" placeholder="Valid Card Number" />
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-7 col-md-7">
                                    <div class="form-group">
                                        <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                        <input type="tel" class="form-control" placeholder="MM / YY" />
                                    </div>
                                </div>
                                <div class="col-xs-5 col-md-5 float-xs-right">
                                    <div class="form-group">
                                        <label>CV CODE</label>
                                        <input type="tel" class="form-control" placeholder="CVC" />
                                    </div>
                                </div>
                            </div>
                            <div class="flex-row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>CARD OWNER</label>
                                        <input type="text" class="form-control" placeholder="Card Owner Names" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="flex-row">
                            <div class="col-xs-12">
                                <button class="btn btn-warning btn-lg btn-block">Process payment</button>
                            </div>
                        </div>
                    </div>
                </div>
               </div>

               <!-- <div class="col-md-1"></div> -->
            </div>
         </div>
    
<?php include("./includes/footer.php"); ?>
  </body>
</html>
