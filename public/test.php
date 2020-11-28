<?php
require_once("./config.php");
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';

$test = json_decode($jsonobj);
var_dump(json_decode($jsonobj));
        
    foreach ($test as $key => $value) {
        var_dump($key);
        var_dump($value);
    }
// include("./includes/header.php");
?>
    <!-- <?php include("./includes/navbar.php"); ?> -->
</body>
</html>
