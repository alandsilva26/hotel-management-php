<?php
require_once("./config.php");



$orgDate = "12/3/2020";
$date = str_replace('/"', '-', $orgDate);  
$newDate = date("Y/m/d", strtotime($date));  
echo "New date format is: ".$newDate. " (YYYY/MM/DD)";  

?>