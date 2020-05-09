
<div style="margin: 0 auto; padding: 0; width: 900px; max-width: none; box-sizing: border-box; font-family: Verdana, Geneva, sans-serif;">

    <div style="padding: 20px; margin: 0; width: 100%; background: #FFF; float: left; box-sizing: border-box;">
        <div style="padding: 30px 0 50px 0; margin: 0; box-sizing: border-box;">
            <img src="<?php echo HTTP_ROOT ?>/images/logo.png" width="200" />
        </div>
        <div style="margin-bottom: 20px; padding: 0; box-sizing: border-box; width: 100%; border: 1px dashed #e5e5e5; float: left;">
            <div style="padding: 20px; margin: 0; box-sizing: border-box; width: 25%; display: flex; flex-direction: column; justify-content: center; overflow: hidden; float: left;">
                <img src="<?php echo HTTP_ROOT . COVER_PHOTO . $eventDetail->image ?>" width="200" style="max-width: 100%;" />
            </div>
            <div style="padding: 20px 0; margin: 0; box-sizing: border-box; width: 50%; display: flex; flex-direction: column; justify-content: center; overflow: hidden; float: left;">
                <h3 style="padding: 0; margin: 0; box-sizing: border-box; font-weight: 400; letter-spacing: 1px;"><?php echo $eventDetail->name; ?></h3>
                <p style="padding: 0; margin: 0; box-sizing: border-box; color: #000; font-weight: 400;"><?php echo $this->Custom->eventDateDisplay($eventSechudle->date); ?> <br />
                    <span style="padding: 0; margin: 0; box-sizing: border-box; color: #999;">Ticket No:</span> <?php echo $bookingDetails->unique_id; ?></p>
            </div>
            <div style="padding: 20px; margin: 0; box-sizing: border-box; width: 25%; display: flex; flex-direction: column; justify-content: center; overflow: hidden; float: left;">
                <img src="<?php echo HTTP_ROOT ?>/images/qr-code.jpg" style="max-width: 100%;"/>
            </div>
        </div>
        <h3 style="margin: 0 0 10px 0; padding: 0; box-sizing: border-box; font-weight: 400; letter-spacing: 1px;">PERSONAL INFO</h3>
        <div style="padding: 15px 20px; margin: 0 0 20px 0; box-sizing: border-box; width: 100%; border: 1px dashed #e5e5e5; float: left;">
            <ul style="padding: 0; margin: 0; box-sizing: border-box; font-size: 15px; color: #999; line-height: 30px; list-style: none;">
                <li>Name:<span style="padding: 0; margin: 0; box-sizing: border-box; color: #000; margin-left: 65px; display: inline-block;"><?php echo $bookingDetails->first_name . '' . $bookingDetails->last_name; ?></span></li>
                <li>Phone No: <span style="padding: 0; margin: 0; box-sizing: border-box; color: #000; margin-left: 35px; display: inline-block;"><?php echo $bookingDetails->phone; ?></span></li>
                <li>Email: <span style="color: #000; margin-left: 65px; display: inline-block;"><?php echo $bookingDetails->email; ?></span></li>
            </ul>
        </div>
        <h3 style="margin: 0 0 10px 0; padding: 0; box-sizing: border-box; font-weight: 400; letter-spacing: 1px;">ORDER SUMMARY</h3>
        <table width="100%" cellpadding="" cellspacing="0" style="border: 1px solid #e5e5e5; border-collapse: collapse;">
            <thead>
                <tr style="background: #f4f4f4;">
                    <td style="width: 33.33%; padding: 7px 10px; border: 1px solid #e5e5e5;">TICKET TYPE</td>
                    <td style="width: 33.33%; padding: 7px 10px; border: 1px solid #e5e5e5;">TICKET QUANTITY</td>
                    <td style="width: 33.33%; padding: 7px 10px; border: 1px solid #e5e5e5;">PRICE</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ticketDetails as $ticket) { ?>
                    <tr>
                        <td style="width: 33.33%; padding: 7px 10px; border: 1px solid #e5e5e5;"><?php echo $ticket->event_ticket->ticket_type; ?> <span style="color: #999;">(&euro;<?php echo number_format((float) $ticket->price, 2, '.', ''); ?>)</span></td>
                        <td style="width: 33.33%; padding: 7px 10px; border: 1px solid #e5e5e5;"><?php echo $ticket->qty; ?></td>
                        <td style="width: 33.33%; padding: 7px 10px; border: 1px solid #e5e5e5;">&euro;<?php echo number_format((float) $ticket->total, 2, '.', ''); ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <div style=" border-bottom: 1px solid #e5e5e5; width: 100%; float: left;">
            <div style="padding: 20px 0; width: 59%; float: left; text-align:right;">
                <img src="<?php echo HTTP_ROOT ?>/images/qr-code.jpg" />
            </div>
            <div style="padding: 20px 0; width: 41%; float: left; text-align:right; font-weight: 700; color: #b62329; letter-spacing: 1px;">
                TOTAL: <?php echo $bookingDetails->ticket_no; ?> Tickets<br />
                Amount Paid: &euro;<?php echo number_format((float) $bookingDetails->total_amount, 2, '.', ''); ?>
            </div>
        </div>
        <div style="padding: 20px 0; margin: 0; box-sizing: border-box; width: 100%; float: left; text-align: center;">
            <p style="padding: 0; margin: 0; box-sizing: border-box; color: #7d7d7d; line-height: 18px; font-size: 12px; font-weight: 400;"><span style="color: #e72a31;">IMPORTANT INSTRUCTIONS</span><br />
                The credit card holder or the lead name of the booking must be present when collecting any ticket(s).<br />
                All tickets must be collected at once upon exchange of this receipt prior to the event.<br />
                <span style="padding: 0; margin: 0; box-sizing: border-box; color: #e72a31;"> Collection point;</span><br />
                Encore, 2 Ayias Mavris Str,<br />
                5330 Ayia Napa, Cyprus.<br />
                <span style="padding: 0; margin: 0; box-sizing: border-box; color: #e72a31;">For further information</span>
                <br />
                Call or WhatsApp us; +357 99019584 <br />
                Email us; info@encorenapa.com</p>
        </div>
    </div>
    <div style="clear: both;"></div>
</div>
<script>
    window.print();
</script>