<?php
include("./config.php");
// Check if user is already logged in
?>
<?php
require  '../vendor/autoload.php';

    $payment_id=$_SESSION['payment_id'];
    $total_cost=$_SESSION['amount_paid'];
    $room_id=$_SESSION['room_id'];
    $room_price=$_SESSION['room_price'];
    $room_type=$_SESSION['room_type'];
    $room_name=$_SESSION['room_name'];
    $date=date("d-m-Y", time());
    $no_days=$_SESSION['no_days'];

    $mpdf = new \Mpdf\Mpdf();   
    $css=file_get_contents('./vendor/bill_style.css');
    
    $html='<body>
    <div id="page-wrap">

        <p id="header">INVOICE</p>

        <div id="identity">

            <p id="address">Chhatrapati Shivaji Maharaj International Airport, IA Project Rd, Navpada, Vile Parle East, Vile Parle, Andheri, Maharashtra 400099 </p>

            <div id="logo">

                <div id="logohelp">
                    <input id="imageloc" type="text" size="50" value="" /><br />
                    (max width: 540px, max height: 100px)
                </div>
                <img id="image" src="images/logo.png" alt="logo" />
            </div>

        </div>

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

