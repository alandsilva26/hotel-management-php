<?php
  require_once("./config.php");
?>
<?php include("./includes/header.php"); ?>

<body>


<div class="container mt-5" >
    <div class="row">
        <div class="col-xs-12 col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h3 class="text-xs-center">Payment Details</h3>
                        <img class="img-fluid cc-img" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                    </div>
                </div>
                <div class="card-body">
                    <form role="form">
                    <div class="flex-row">
                            <div class="col-xs-12 ">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <div>
                                        <h2><b>$ 500</b><h2>
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
                                        <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
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
    </div>
</div>

<style>
    .cc-img {
        margin: 0 auto;
    }
</style>

</body>
</html>
 