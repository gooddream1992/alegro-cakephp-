

<div class="email-templ" style="border-bottom: 40px solid #f9d55c; padding-bottom: 50px;width: 800px; margin: 0 auto; box-shadow: 0px 0px 25px -4px #000; border-radius: 3px; overflow: hidden;">
    <table  cellspacing="0" cellpadding="0" border="0"  style="width:100%;">
        <tr style="background: url(<?= HTTP_ROOT . 'img/bg-1.png'; ?>) left top no-repeat; background-size: 100%;">
            <td style="text-align: center; padding: 4% 18px 9%;">
                <img style="padding-left:0; margin-top: 14px;" width="200" src="<?= HTTP_ROOT . 'img/header-logo.png'; ?>" alt="">
                <ul style="float: right; text-align: right;">
                    <li style="display:block; color: #fff; font-size: 15px;">227 Cobblestone Road | 30000 Bedrock,  Cobblestone  County</li>
                    <li style="display:block; color: #fff; padding: 6px 0; font-size: 15px;">http://dinostore.bed | hello@dinostore.bed</li>
                    <li style="display:block; color: #fff; font-size: 15px;">+555 7 789-1234 | +555 7 789-1344</li>
                </ul>
            </td>
        </tr>
    </table>
    <div style=" float: left; width: 95%; padding: 19px 20px;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr>
                <td style="text-align: center;">
                    <h1 style=" margin: 0; color: #000; font-size: 25px;">Invoice</h1>
                    <p style="margin: 9px 0; color: #ccc; font-size: 17px;">#<?= $bookingdetails->fare_key; ?></p>
                    <h6 style="margin: 0; font-size: 17px; color: #000;"><?= date('d/M/Y', strtotime($this->Time->format($bookingdetails->purches_date, 'Y-MM-d HH:mm:ss'))); ?></h6>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <div style="margin-top: 25px; border-bottom:1px solid #000;float: left; width: 100%; padding-bottom: 10px;">
                        <h5 style=" margin: 0; text-align:left; color: #ccc; font-size: 16px; float: left; width: 70%; font-weight: normal;">Due Date: <span style="color: #000;"><?= date('d M Y', strtotime($this->Time->format($bookingdetails->purches_date, 'Y-MM-d HH:mm:ss'))); ?></span></h5>
                        <h5 style=" margin: 0; text-align:left; color: #ccc; font-size: 16px; float: right; width: 30%; font-weight: normal;">Bill to:</h5>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <div style="float: right; width: 30%; padding-bottom: 10px;">
                        <p style="color: #6b6b6b; font-weight: normal; text-align: left; line-height: 22px;"><span style="font-weight: bold; color: #000;"><?= $userdetails->first_name . " " . $userdetails->sur_name; ?></span>
                            <br> <?= $userdetails->province; ?>, <?= $userdetails->country; ?>
                            <br> <?= $userdetails->phone_number; ?>
                            <br> <?= $usermail->email; ?>
                            <br>Attan: <?= $userdetails->first_name . " " . $userdetails->sur_name; ?></p>
                    </div>
                </td>
            </tr>
        </table>
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr style=" display: inline-block; width: 96%; border-bottom: 4px solid #ffd456; background: #e4e4e3; padding: 14px 16px;">
                <th style=" width: 38px; text-align: left;">ID</th>
                <th style=" width: 47%; text-align: left;">Panssenger</th>
                <th style=" width: 18%; text-align: left;">Airline</th>
                <th style=" width: 16%; text-align: left;">Date</th>
                <th style=" width: 14%; text-align: right;">Total Price</th>
            </tr>
            <?php
            $io = 1;
            foreach ($passangerdetails as $list) {
                ?>
                <tr style=" display: inline-block; width: 96%; padding: 14px 16px;">
                    <td style=" width: 38px; text-align: left;"><?= $io++; ?></td>
                    <td style=" width: 47%; text-align: left;"><?= $list->name; ?></td>
                    <td style=" width: 18%; text-align: left;"><?= $bookingdetails->start_d_airline_name; ?></td>
                    <td style=" width: 16%; text-align: left;"><?= date('d M Y', strtotime($this->Time->format($bookingdetails->purches_date, 'Y-MM-d HH:mm:ss'))); ?></td>
                    <td style=" width: 14%; text-align: right;"><?= $bookingdetails->price; ?></td>
                </tr>
<?php } ?>
            <tr style=" display: inline-block; width: 96%; padding: 14px 16px;">
                <td style=" display: inline-block; width: 100%;">
                    <ul style=" margin: 0; padding: 0; width: 30%; float: right;">
                        <li style=" margin:5px 0; display: inline-block; width: 100%; font-weight: bold; font-size: 16px; color: #717070; text-align: left;">Subtotal:<span style="float: right;"><?= $bookingdetails->total_fee - $bookingdetails->service_fee; ?></span></li>
                        <li style=" margin:5px 0;display: inline-block; width: 100%; font-weight: bold; font-size: 16px; color: #717070; text-align: left;">Tax<span style="float: right;"><?= $bookingdetails->service_fee; ?></span></li>
                        <li style=" margin:5px 0;display: inline-block; width: 100%; font-weight: bold; font-size: 16px; color: #717070; text-align: left;">Total <span style="float: right;"><?= $bookingdetails->total_fee; ?></span></li>
                        <li style=" margin:5px 0;display: inline-block; width: 100%; font-weight: bold; font-size: 16px; color: #717070; text-align: left;">Paid<span style="float: right;"><?= $bookingdetails->total_fee; ?></span></li>
                        <li style=" margin-top: 7px; background: #e4e4e3; padding: 10px 10px; border-bottom: 3px solid #f9d456; display: inline-block; width: 97%; color: #000; font-weight: bold;">AMOUNT DUE: <span style="float: right;">0</span></li>
                    </ul>
                </td>
            </tr>
            <tr>
                <td>
                    <p style="font-size: 16px; color: #000;">Invoice Terms:</p>
                    <p style="font-size: 16px; color: #000;">Rafael, thank you very much. We really appreciate your business.</p>
                    <p style="font-size: 16px; color: #000;">please send payments before the due date.</p>
                    <p style="font-size: 16px; color: #000;">Payments ACC-123006705 | IBAN - US100000060345 | SWIFT - BOA447</p>
                    <p style="font-size: 14px; color: #908f8f; font-style: italic; font-weight: bold;">All price are in AO</p>
                </td>
            </tr>
        </table>
    </div>
</div>
