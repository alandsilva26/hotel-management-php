<?php
require  '../vendor/autoload.php';

if (isset($_POST['confirm_booking'])) {
    $user_id=$_POST["user_id"];
    $ph_number=$_POST["phone_number"];
    $check_in_date = $_POST["check_in_date"];
    $check_out_date = $_POST["check_out_date"];
    $no_adults=$_POST["no_adults"];
    $no_children=$_POST["no_children"];

    $mpdf = new \Mpdf\Mpdf();
    $css=file_get_contents('./vendor/bill_style.css');
    
    $html=file_get_contents('./vendor/bill.html');

    $mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
    $mpdf->writeHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

    $mpdf->Output('hotel_reservation.pdf', 'D');
}
