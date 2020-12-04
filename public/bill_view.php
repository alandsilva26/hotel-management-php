<?php
include("./config.php");
    require  '../vendor/autoload.php';
    // Get details
    if(isset($_GET["reservation_id"])) {

        $sql = "SELECT room.check_in_date, room.check_out_date, room.room_name, room.room_type, room.room_price, room.room_id, p.payment_id, p.amount FROM reservations LEFT JOIN rooms as room ON room.room_id = reservations.room_id LEFT JOIN payment as p ON p.reservation_id = reservations.reservation_id WHERE reservations.reservation_id = :reservation_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
            ":reservation_id" => $_GET["reservation_id"],
        ));
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $payment_id = $row["payment_id"];
        $total_cost = $row["amount"];
        $room_id = $row["room_id"];
        $room_price = $row["room_price"];
        $room_type = $row["room_type"];
        $room_name = $row["room_name"];
        $date = date("d-m-Y", time());
    
        $check_in = date('d',strtotime($row["check_in_date"]));
        $check_out = date('d',strtotime($row["check_out_date"]));
        $no_days = abs($check_out - $check_in);;

        $mpdf = new \Mpdf\Mpdf();   
        $css=file_get_contents('./vendor/bill_style.css');
        
        $html='<body>
        <div id="page-wrap">
    
            <p id="header">INVOICE</p>
            <div style="clear:both"></div>
    
            <div id="customer">
    
                <p id="customer-title">AAA Hotel, Resorts & Spa International</p>
    
                <table id="meta">
                    <tr>
                        <td class="meta-head">Invoice #</td>
                        <td>
                            <p>'.$payment_id.'</p>
                        </td>
                    </tr>
                    <tr>
    
                        <td class="meta-head">Date</td>
                        <td>
                            <p id="date">'.$date.'</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="meta-head">Amount Due</td>
                        <td>
                            <div class="due">&#8377;'.$total_cost.'</div>
                        </td>
                    </tr>
    
                </table>
    
            </div>
    
            <table id="items">
    
                <tr>
                    <th>Item</th>
                    <th>Description</th>
                    <th>Unit Cost</th>
                    <th>Days</th>
                    <th>Price</th>
                </tr>
    
                <tr class="item-row">
                    <td class="item-name">
                        <div class="delete-wpr">
                            <p>'.$room_name.'</p>
                        </div>
                    </td>
                    <td class="description">
                        <p>'.$room_type.'</p>
                    </td>
                    <td>
                        <p class="cost">&#8377;'.$total_cost.'</p>
                    </td>
                    <td>
                        <p class="qty">'.$no_days.' days</p>
                    </td>
                    <td><span class="price">&#8377;'.$total_cost.'</span></td>
                </tr>
    
                <tr>
                    <td colspan="2" class="blank"> </td>
                    <td colspan="2" class="total-line">Subtotal</td>
                    <td class="total-value">
                        <div id="subtotal">&#8377;'.$total_cost.'</div>
                    </td>
                </tr>
                <tr>
    
                    <td colspan="2" class="blank"> </td>
                    <td colspan="2" class="total-line">Total</td>
                    <td class="total-value">
                        <div id="total">&#8377;'.$total_cost.'</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="blank"> </td>
                    <td colspan="2" class="total-line">Amount Paid</td>
    
                    <td class="total-value">
                        <p id="paid">&#8377;'.$total_cost.'</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="blank"> </td>
                    <td colspan="2" class="total-line balance">Balance Due</td>
                    <td class="total-value balance">
                        <div class="due">&#8377; 00.00</div>
                    </td>
                </tr>
    
            </table>
    
            <div id="terms">
                <h5>Terms</h5>
                <p>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</p>
            </div>
    
        </div>
    </body>';
        // file_get_contents('./vendor/bill.html');
    
        $mpdf->writeHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->writeHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
    
        $mpdf->Output('hotel_reservation.pdf', 'D');
    
    }
    ?>


    <?php  include("./includes/header.php"); ?>
    <body>
     <header>
        <?php include("./includes/navbar.php"); ?>
     </header>
        <div class="container m-5">
            <p class="text-danger py-5">Reservation id must be set</p>
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
