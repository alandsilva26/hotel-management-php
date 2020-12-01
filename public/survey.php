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

    <div class="row justify-content-center">
    <div class="col-12 mt-4">
    <div class="form-group">
        <label for="exampleInputPassword1">1.What was your first impression when you entered the website?</label>
        <textarea type="text" id="impression" class="form-control"></textarea>
    
    </div>
    </div>
    <div class="col-12">
    <div class="form-group">
        <label for="exampleInputPassword1">2. How did you first hear about us?</label>
        <textarea type="text" id="first_hear" class="form-control"></textarea>
    </div>
    </div>
    <div class="col-12">
    <div class="form-group">
        <label for="exampleInputPassword1">3. Is there anything missing on this page?</label>
        <textarea type="text" id="missing_features" class="form-control"></textarea>
    </div>
    </div>
    <div class="col-12">
    <div class="form-group">
        <label for="exampleInputPassword1">4. How likely are you to recommend us to a friend or colleague?</label>
        <div class="slidecontainer">
        <div style="margin-left: 12%;">
        <span class="font-weight-bold blue-text mr-2 mt-1">0</span>
            <input type="range" min="0" max="5" value="1"  class="range-field my-4 w-75" id="recommend">
            <span class="font-weight-bold blue-text mr-2 mt-1">5</span>
        </div>
        </div>
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
        <textarea type="text" id="useful_features" class="form-control"></textarea>
    </div>
    </div>
    <div class="col-12">
    <div class="form-group">
        <label for="exampleInputPassword1">6. How easy was it to use our website? Did you have any problems?</label>
        <textarea type="text" id="ease_of_use" class="form-control"></textarea>
    </div>
    </div>
    <div class="col-12 text-center">
    <button class="btn" onclick="return sendMessage();">Submit</button>
    </div>


</div>
</div>
</div>
</div>
<script>
var slider = document.getElementById("recommend");
output.innerHTML = slider.value;
slider.oninput = function() {
  output.innerHTML = this.value;
}

function sendMessage() {
        let impression = document.querySelector('#impression').value;
        console.log(impression);
        let first_hear = document.querySelector("#first_hear").value;
        console.log(first_hear);
        let missing_features = document.querySelector("#missing_features").value;
        console.log(missing_features);
        let recommend = document.querySelector("#recommend").value;
        console.log(recommend);
        let useful_features = document.querySelector("#useful_features").value;
        console.log(useful_features);
        let ease_of_use=document.querySelector("#ease_of_use").value;
        console.log(ease_of_use);  

         $.ajax({
            url: "https://docs.google.com/forms/d/e/1FAIpQLSfD1w5o0Cp5FmzfP-6MdtidI2vHcJqMch9eFa08dddgSMCgrQ/formResponse?",
            data: {"entry.728102957": impression, "entry.686033481": first_hear, "entry.487111670": missing_features,
             "entry.1965026841": recommend, "entry.1940392638":useful_features, "entry.229235084":ease_of_use},
            type: "GET",
            dataType: "xml",
            success: function(d){
                console.log("success");
            },
            error: function(x, y, z) {
                console.log("error");
            }
        });
        return false;
    }
</script>
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

<!-- https://docs.google.com/forms/d/e/1FAIpQLSfD1w5o0Cp5FmzfP-6MdtidI2vHcJqMch9eFa08dddgSMCgrQ/viewform?usp=pp_url&entry.728102957=
Nice&entry.686033481=Through+the+internet.&entry.487111670=No&entry.1965026841=5&entry.1940392638=Account+section&entry.229235084=Very+Easy.+No+problem -->




