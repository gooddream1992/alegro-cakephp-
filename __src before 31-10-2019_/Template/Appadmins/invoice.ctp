

<div class="email-templ" style="border-bottom: 55px solid #f9d55c;padding-bottom: 50px;width: 800px;margin: 0 auto;box-shadow: 0px 0px 25px -4px #000;border-radius: 3px;overflow: hidden;">
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
                        <h5 style=" margin: 0; text-align:left; color: #000; font-size: 15px; float: left; width: 70%; font-weight: bold;">Date: <span style="color: #000; font-weight:normal;"><?= date('d M Y', strtotime($this->Time->format($bookingdetails->purches_date, 'Y-MM-d HH:mm:ss'))); ?></span></h5>
                        <h5 style=" margin: 0; text-align:left; color: #000; font-size: 15px; float: right; width: 30%; font-weight: bold;">To:</h5>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <div style="float: left; width: 30%; padding-bottom: 10px;">
                        <p style="color: #000; font-weight: normal; text-align: left; line-height: 22px;"><span style="font-weight: bold; color: #000;">Invoice: <span style="font-weight:normal;">ALE36527</span></span>
                            <br> <b>Type of Journey:</b> <span style="font-weight:normal;">Round-Trip</span>
                            <br> <b>Departure Date:</b> <span style="font-weight:normal;">11 Nov 2018</span>
                            <br> <b>Return Date:</b> <span style="font-weight:normal;">12 Jan 2019</span>
                            <br> <b>Passengers:</b> <span style="font-weight:normal;">3</span>
                            <br> <b>Origin:</b> <span style="font-weight:normal;">Luanda (LAD)</span>
                            <br> <b>Destination:</b> <span style="font-weight:normal;">Lisboa (LIS)</span></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <div style="float: right;width: 30%;margin-top: -194px;padding-bottom: 10px;">
                        <p style="color: #000; font-weight: normal; text-align: left; line-height: 22px;">
                            <span style="font-weight: normal; color: #000;">Exmo.(s) Sr.(s)</span>
                            <br> <span style="font-weight: bold; color: #000;"><?= $userdetails->first_name . " " . $userdetails->sur_name; ?></span>
                            <br> <?= $userdetails->phone_number; ?>
                            <br> <?= $usermail->email; ?>
                            <br> <?= $userdetails->province; ?> - <?= $userdetails->country; ?></p>
                    </div>
                </td>
            </tr>
        </table>
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr style=" display: inline-block; width: 96%; border-bottom: 4px solid #ffd456; background: #eee; padding: 14px 16px;">
                <th style=" width: 38px; text-align: left;">#</th>
                <th style=" width: 47%; text-align: left;">Description</th>
                <th style=" width: 18%; text-align: left;">Quantity</th>
                <th style=" width: 16%; text-align: left;">Ticket Price</th>
                <th style=" width: 14%; text-align: right;">Total</th>
            </tr>
            <?php
            $io = 1;
            foreach ($passangerdetails as $list) {
                ?>
                <tr style=" display: inline-block; width: 96%; padding: 14px 16px;">
                    <td style=" width: 38px; text-align: left;"><?= $io++; ?></td>
                    <td style=" width: 47%; text-align: left;">E-Tickets</td>
                    <td style=" width: 18%; text-align: left;">3</td>
                    <td style=" width: 16%; text-align: left;">500,00 AOA</td>
                    <td style=" width: 14%; text-align: right;">1.500,00 AOA</td>
                </tr>
                
                <tr style=" display: inline-block; width: 96%; padding: 14px 16px;">
                    <td style=" width: 38px; text-align: left;"><?= $io++; ?></td>
                    <td style=" width: 47%; text-align: left;">Service Fee</td>
                    <td style=" width: 18%; text-align: left;">3</td>
                    <td style=" width: 16%; text-align: left;">8.500,00 AOA</td>
                    <td style=" width: 14%; text-align: right;">25.500,00 AOA</td>
                </tr>
<?php } ?>
            <tr style=" display: inline-block; width: 96%; padding: 14px 16px;">
                <td style=" display: inline-block; width: 100%;">
                    <ul style=" margin: 0; padding: 0; width: 30%; float: right;">
                        <li style="margin:5px 0;line-height: 30px;display: inline-block;width: 100%;font-weight: bold;font-size: 15px;color: #000;text-align: left;">Subtotal:<span style="float: right;font-weight: normal;"><?= $bookingdetails->total_fee - $bookingdetails->service_fee; ?></span></li>
                        <li style="margin:5px 0;line-height: 30px;display: inline-block;width: 100%;font-weight: bold;font-size: 15px;color: #000;text-align: left;">Service Fee:<span style="float: right;font-weight: normal;"><?= $bookingdetails->service_fee; ?></span></li>
                        <li style="margin:5px 0;line-height: 30px;display: inline-block;width: 100%;font-weight: bold;font-size: 15px;color: #000;text-align: left;">Total:<span style="float: right;font-weight: normal;"><?= $bookingdetails->total_fee; ?></span></li>
                        <li style=" margin-top: 7px; background: #eee; padding: 10px 10px; border-bottom: 3px solid #f9d456; display: inline-block; width: 97%; color: #000; font-weight: bold;">Paid: <span style="float: right;font-weight: normal;"><?= $bookingdetails->total_fee; ?> AOA</span></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 15px; color: #000;"><b style="font-weight:bold;">Payment Method:</b> Multicaixa</p>
                    <p style="font-size: 15px; color: #000;">Thank you for your choice. We look forward to doing business with you again.</p>
                    <p style="font-size: 15px; color: #000;"><b style="font-weight:bold;">We Accept</b></p>
                    <p style="font-size: 15px; color: #000;">Multicaixa, Paypal, Visa and MasterCard payments.</p>
                    <p style="font-size: 14px; color: #908f8f; font-style: italic; font-weight: bold;">All prices are in AOA</p>
                </td>
            </tr>
        </table>
    </div>
</div>
<div style="font-size: 15px;color: #000;margin: -50px 0px 0px 256px;line-height: 23px;width: 727px;text-align: center;">Alegro Holdings, LDA | Rua Rey Katiavala, nº118, Prédio da Angop, 7ºD, Apt 45 | Bairro Ingombota | Luanda - Angola | NIF: 5000172790 | www.alegro.co.ao | apoio@alegro.co.ao | +244 923 480 978 | +244 222 xxx xxx</p>
                            </div>
