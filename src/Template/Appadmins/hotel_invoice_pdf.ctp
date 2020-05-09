    <?php
    $alldetails = $this->User->getDataForHotel($property_id);

    function changeFormat($pri) {
        $dat = explode('.', $pri);
        $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
        return $f;
    }
    ?>
<div class="email-templ" style="/*border-bottom: 55px solid #f9d55c;padding-bottom: 50px;*/width: 800px;margin: 0 auto;box-shadow: 0px 0px 25px -4px #000;border-radius: 3px;overflow: hidden;">
    <table  cellspacing="0" cellpadding="0" border="0"  style="width:100%;">
        <tr style="background: url(<?= HTTP_ROOT . 'img/bg-1.png'; ?>) left top no-repeat; background-size: 100%;">
            <td style="text-align: center;padding: 20px 22px 91px 0px;">
                <img style="padding-left:0;margin-top: 37px;margin-left: 22px;" width="200" src="<?= HTTP_ROOT . 'img/header-logo.png'; ?>" alt="">
            </td>
        </tr>
    </table>
    <div style=" float: left; width: 95%; padding: 19px 20px;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="text-align: center;">
                    <div style="margin-top: 25px; float: left; width: 100%; padding-bottom: 10px;">
                        <h5 style=" margin: 0; text-align:left; color: #000; font-size: 15px; float: left; width: 70%; font-weight: bold;">Date: <span style="color: #000; font-weight:normal;"><?= date('d M Y', strtotime($this->Time->format($bookingdetails->booking_dt, 'Y-MM-d HH:mm:ss'))); ?></span></h5>
                        <h5 style=" margin: 0; text-align:left; color: #000; font-size: 15px; float: right; width: 30%; font-weight: bold;">To:</h5>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <div style="float: left; width: 50%; padding-bottom: 10px;">
                        <p style="color: #000; font-weight: normal; text-align: left; line-height: 22px;"><span style="font-weight: bold; color: #000;">Invoice: <span style="font-weight:normal;"><?=$bookingdetails->booking_no;?></span></span>
                            <br> <b>Property Name:</b> <span style="font-weight:normal;"><?=$alldetails->description->propertyName;?></span>
                            <br> <b>Address:</b> <span style="font-weight:normal;"><?=$alldetails->location->street;?></span>
                            <br> <b>Check-in Date:</b> <span style="font-weight:normal;"><?= date_format($bookingdetails->check_in, 'd M Y');?></span>
                            <br> <b>Check-out Date:</b> <span style="font-weight:normal;"><?= date_format($bookingdetails->check_out, 'd M Y');?></span>
                            <br> <b>Guest(s):</b> <span style="font-weight:normal;"><?= count(json_decode($bookingdetails->room_fnm, true)); ?></span>
                            <br> <b>Cancellation Policy:</b> <span style="font-weight:normal;"><?= $bookingdetails->cancel_policy; ?></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <div style="float: right;width: 30%;margin-top: -194px;padding-bottom: 10px;">
                        <p style="color: #000; font-weight: normal; text-align: left; line-height: 22px;">
                            <span style="font-weight: normal; color: #000;">Exmo.(s) Sr.(s)</span>
                            <br> <span style="font-weight: bold; color: #000;"><?= $bookingdetails->user_firstname . " " . $bookingdetails->user_lastname; ?></span>
                            <br> <?= $bookingdetails->phone; ?>
                    </div>
                </td>
            </tr>
        </table>
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr style=" display: inline-block; width: 96%; border-bottom: 4px solid #ffd456; background: #eee; padding: 14px 16px;">
                <th style=" width: 38px; text-align: left;">#</th>
                <th style=" width: 47%; text-align: left;">Description</th>
                <th style=" width: 18%; text-align: left;">Quantity</th>
                <th style=" width: 16%; text-align: left;">Price Per Night</th>
                <th style=" width: 14%; text-align: right;">Total</th>
            </tr>

                <tr style=" display: inline-block; width: 96%; padding: 14px 16px;">
                    <td style=" width: 38px; text-align: left;">1</td>
                    <td style=" width: 47%; text-align: left;"><?= $room_name; ?></td>
                    <td style=" width: 18%; text-align: left;"><?= count(json_decode($bookingdetails->room_fnm, true)); ?></td>
                    <td style=" width: 16%; text-align: left;">AOA <?= changeFormat(number_format(($bookingdetails->total_cost / $this->User->timeago(date_format($bookingdetails->check_in, 'Y-m-d'), date_format($bookingdetails->check_out, 'Y-m-d'))) / $bookingdetails->numb_rooms,2)); ?></td>
                    <td style=" width: 14%; text-align: right;">AOA <?= changeFormat(number_format($bookingdetails->total_cost,2)); ?></td>
                </tr>


            <tr style=" display: inline-block; width: 96%; padding: 14px 16px;">
                <td style=" display: inline-block; width: 100%;">
                    <ul style=" margin: 0; padding: 0; width: 30%; float: right;">
                        <li style="margin:5px 0;line-height: 30px;display: inline-block;width: 100%;font-weight: bold;font-size: 15px;color: #000;text-align: left;">Subtotal:<span style="float: right;font-weight: normal;">AOA <?= changeFormat(number_format($bookingdetails->total_cost - $bookingdetails->total_cost*($bookingdetails->service_fee/100),2)); ?></span></li>
                        <li style="margin:5px 0;line-height: 30px;display: inline-block;width: 100%;font-weight: bold;font-size: 15px;color: #000;text-align: left;">Service Fee:<span style="float: right;font-weight: normal;"><?= $bookingdetails->service_fee.'% ( AOA '.changeFormat(number_format($bookingdetails->total_cost*($bookingdetails->service_fee/100),2)).')'; ?></span></li>
                        <li style="margin:5px 0;line-height: 30px;display: inline-block;width: 100%;font-weight: bold;font-size: 15px;color: #000;text-align: left;">VAT:<span style="float: right;font-weight: normal;">0% (Isento)</span></li>
                        <li style=" margin-top: 7px; background: #eee; padding: 10px 10px; border-bottom: 3px solid #f9d456; display: inline-block; width: 97%; color: #000; font-weight: bold;">Total: <span style="float: right;font-weight: normal;">AOA <?= changeFormat(number_format($bookingdetails->total_cost,2)); ?></span></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 15px; color: #000;"><b style="font-weight:bold;">Payment Method:</b> <?=$bookingdetails->payment_method;?></p>
                    <p style="font-size: 15px; color: #000;">Thank you for your choice. We look forward to doing business with you again.</p>
                    <p style="font-size: 15px; color: #000;"><b style="font-weight:bold;">We Accept</b></p>
                    <p style="font-size: 15px; color: #000;">Multicaixa and No Alojamento Payments.</p>
                    <p style="font-size: 15px; color: #000;">IVA - Regime de Não Sujeição - Lei 07/19</p>
                </td>
            </tr>
        </table>
    </div>
<div style="    font-size: 15px;
    color: #000;
    margin: 58px 0px 0px 0;
    line-height: 23px;
    width: 100%;
    text-align: center;
    background: #f9d55c;
    float: left;"><p>Alegro Holdings, LDA | Rua Rey Katiavala, nº118, Prédio da Angop, 7ºD, Apt 45 | Bairro Ingombota | Luanda - Angola | NIF: 5000172790 | www.alegro.co.ao | apoio@alegro.co.ao | +244 929 259 256 | +244 929 259 258</p>
</div>
</div>

