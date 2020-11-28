<?php
include("./config.php");
// Check if user is already logged in
?>
<?php
require  '../vendor/autoload.php';

if (isset($_POST['confirm_booking'])) {
    $room_type=$_POST['room_type'];
    $user_id=$_POST["user_id"];
    $ph_number=$_POST["phone_number"];
    $check_in_date = date('d-m-Y',strtotime($_POST["check_in_date"]));
    echo $check_in_date;
    $check_out_date = date('d-m-Y',strtotime($_POST["check_out_date"]));
    echo $check_out_date;
    $no_adults=$_POST["no_adults"];
    $no_children=$_POST["no_children"];
    $capacity=$no_adults+$no_children;
    $date=date("d-m-Y", time());
    
    $sql1="SELECT room_id from rooms where room_booked = 0 and room_type = \"$room_type\" and room_capacity>=$capacity LIMIT 1";
    
    $statement = $pdo->prepare($sql1);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $room_id=$row['room_id'];
    $date_diff=abs($check_out_date-$check_in_date);
    

    $sql2=" START TRANSACTION;
        INSERT INTO reservations(user_id, room_id, booking_date, no_adults, no_children) VALUES (\"$user_id\",$room_id,$date,$no_adults,$no_children);
        UPDATE rooms SET room_booked = 0, check_in_date=$check_in_date, check_out_date=$check_out_date WHERE room_id=$row[room_id];
        COMMIT;";
    
        echo $sql2;
    $statement = $pdo->prepare($sql2);
    $statement->execute();
    $sql3="SELECT reservation_id FROM reservations WHERE user_id=\"$user_id\" LIMIT 1;";   
    $statement = $pdo->prepare($sql3);
    $statement->execute();
    $row2 = $statement->fetch(PDO::FETCH_ASSOC); 
    echo $sql3;   
    print_r($row2);
    
    $sql4="START TRANSACTION;
    INSERT INTO `payment`(`user_id`, `reservation_id`, `currency`, `method`, `amount`) VALUES ($user_id, 
    COMMIT;";

    $mpdf = new \Mpdf\Mpdf();
    $css=file_get_contents('./vendor/bill_style.css');
    
    $html=file_get_contents('./vendor/bill.html');

    $mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->writeHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

    $mpdf->Output('hotel_reservation.pdf', 'D');
}
