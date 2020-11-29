<?php
  include("./config.php");
?>
<?php include("./includes/header.php"); ?>
<?php include("./includes/navbar.php"); ?>
<body>
<style>
body{
    background-image:url("./media/images/home-header-1.jpg");
    /* background-size:cover; */
}

/* h1{
    font-family:'Sofia',cursive;
     color:white;
} */

/* label{
    font-family:'Sofia',cursive;
} */ 

.container{
        padding:7em 0;
    }
.col-md-6{
    border-radius: 10px;
    box-shadow: 2px 2px 4px 4px rgba(0, 0, 0, 0.15);
}

button{
    border-radius: 30px !important;
    /* background: rgba(255, 0, 0, 0.08) !important ;
    color: rgba(0, 0, 0, 0.8) !important; */
    background: linear-gradient(to right, rgb(222, 23, 23), red , rgb(254, 59, 59));
    width:20% !important;
    color:white !important;
}
</style>
<div class="container mb-4">
<h1 class="text-center">Feedback</h1>
<div class="row justify-content-center">
<div class="col-md-6 bg-light form-box ">
<form action="" method="POST">
    <div class="row justify-content-center">
    <div class="col-12 mt-4">
    <div class="form-group">
        <label for="exampleInputPassword1">1.What was your first impression when you entered the website?</label>
        <textarea type="text" class="form-control"></textarea>
    
    </div>
    </div>
    <div class="col-12">
    <div class="form-group">
        <label for="exampleInputPassword1">2. How did you first hear about us?</label>
        <textarea type="text" class="form-control"></textarea>
    </div>
    </div>
    <div class="col-12">
    <div class="form-group">
        <label for="exampleInputPassword1">3. Is there anything missing on this page?</label>
        <textarea type="text" class="form-control"></textarea>
    </div>
    </div>
    <div class="col-12">
    <div class="form-group">
        <label for="exampleInputPassword1">4. How likely are you to recommend us to a friend or colleague?</label>
        <textarea type="text" class="form-control"></textarea>
    </div>
    </div>
    <!-- <div class="col-12">
    <div class="form-group">
        <label for="exampleInputPassword1">5. How did your experience compare to your expectations?</label>
        <textarea type="text" class="form-control"></textarea>
    </div>
    </div> -->
    <div class="col-12">
    <div class="form-group">
        <label for="exampleInputPassword1">5. What is the most useful feature of our website?</label>
        <textarea type="text" class="form-control"></textarea>
    </div>
    </div>
    <div class="col-12">
    <div class="form-group">
        <label for="exampleInputPassword1">6. How easy was it to use our website? Did you have any problems?</label>
        <textarea type="text" class="form-control"></textarea>
    </div>
    </div>
    <div class="col-12 text-center">
    <button class="btn  ">Submit</button>
    </div>
</form>
</div>
</div>
</div>
</div>

<?php include("./includes/footer.php"); ?>
<script>
         $(document).ready(function() {
        $("nav").eq(0).addClass("bg-dark");
        $("nav").eq(0).addClass("navbar-dark");

        $("footer").eq(0).addClass("bg-dark");
        $("footer").eq(0).addClass("text-light");
        // bg-dark navbar-dark 
    });
    </script>
</body>
</html>
