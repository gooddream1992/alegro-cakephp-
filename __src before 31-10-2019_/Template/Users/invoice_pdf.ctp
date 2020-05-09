<style>
    @CHARSET "UTF-8";
    .logo  {
		float:left;
		          
    }
</style>


<div class="email-templ" style="border-bottom: 40px solid #f9d55c; padding-bottom: 50px;width: 900px; margin: 0 auto; box-shadow: 0px 0px 25px -4px #000;">
    <div  cellspacing="0" cellpadding="0" border="0"  style="width:100%;">
        <div style="background: url(<?= HTTP_ROOT . 'img/bg-1.png'; ?>) left top no-repeat; background-size: 100%;     float: left;
    width: 100%;">
            <div class="logo" style="text-align: center; padding: 4% 18px 9%;">
                <img style="padding-left:0; margin-top: 14px; width:200; float: left;" src="<?= HTTP_ROOT . 'img/header-logo.png'; ?>" alt="">  
                <ul style="float: right; text-align: right; list-style-type:none;">
                    <li style="color: #fff; font-size: 14px;">227 Cobblestone Road | 30000 Bedrock,  Cobblestone  County<br>http://dinostore.bed | hello@dinostore.bed<br>+555 7 789-1234 | +555 7 789-1344</li>
                </ul>
        </div>
        </div>
    </div>
    <div style=" float: left; width: 95%; padding: 19px 20px;">

                <div style="text-align: center;">
                    <h1 style=" margin: 0; color: #000; font-size: 25px;">Invoice</h1>
                    <p style="margin: 19px 0; color: #ccc; font-size: 17px;">#<?= $bookingdetails->fare_key; ?></p>
                    <h6 style="margin: 0; font-size: 17px; color: #000;"><?= date('d/M/Y', strtotime($this->Time->format($bookingdetails->purches_date, 'Y-MM-d HH:mm:ss'))); ?></h6>
                </div>
        <div style="margin-top: 25px; border-bottom:1px solid #000;float: left; width: 100%; padding-bottom: 10px;">
                        <h5 style=" margin: 0; text-align:left; color: #ccc; font-size: 16px; float: left; width: 70%; font-weight: normal;">Due Date: <span style="color: #000;"><?= date('d M Y', strtotime($this->Time->format($bookingdetails->purches_date, 'Y-MM-d HH:mm:ss'))); ?></span></h5>
                        <h5 style=" margin: 0; text-align:left; color: #ccc; font-size: 16px; float: right; width: 30%; font-weight: normal;">Bill to:</h5>
                    </div>
                    <div style="float: right; width: 30%; padding-bottom: 10px;">
                        <p style="color: #6b6b6b; font-weight: normal; text-align: left; line-height: 22px;"><span style="font-weight: bold; color: #000;"><?= $userdetails->first_name . " " . $userdetails->sur_name; ?></span>
                            <br> <?= $userdetails->province; ?>, <?= $userdetails->country; ?>
                            <br> <?= $userdetails->phone_number; ?>
                            <br> <?= $usermail->email; ?>
                            <br>Attan: <?= $userdetails->first_name . " " . $userdetails->sur_name; ?></p>
                    </div>
    </div>
    <div style=" float: left; width: 95%; padding: 19px 20px;">
     <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
            <tr style=" display: inline-block; width: 96%;  background: #e4e4e3;">
                <th style=" width: 38px; text-align: left;border-bottom: 4px solid #ffd456; padding: 14px 5px;"><h3 style="font-size: 14px; ">ID</h3></th>
                <th style=" width: 47%; text-align: left; border-bottom: 4px solid #ffd456; padding: 14px 5px;"><h3 style="font-size: 14px;">Panssenger</h3></th>
                <th style=" width: 18%; text-align: left; border-bottom: 4px solid #ffd456; padding: 14px 5px;"><h3 style="font-size: 14px;">Airline</h3></th>
                <th style=" width: 16%; text-align: left; border-bottom: 4px solid #ffd456; padding: 14px 5px;"><h3 style="font-size: 14px;">Date</h3></th>
                <th style=" width: 14%; text-align: right; border-bottom: 4px solid #ffd456; padding: 14px 5px;"><h3 style="font-size: 14px; width:200px;">Total Price</h3></th>
            </tr>
            <?php
            $io = 1;
            foreach ($passangerdetails as $list) {
                ?>
                <tr style=" display: inline-block; width: 96%; padding: 14px 16px;">
                    <td style=" width: 38px; text-align: left; padding: 14px 5px;"><?= $io++; ?></td>
                    <td style=" width: 47%; text-align: left;  padding: 14px 5px;"><?= $list->name; ?></td>
                    <td style=" width: 18%; text-align: left; padding: 14px 5px;"><?= $bookingdetails->start_d_airline_name; ?></td>
                    <td style=" width: 16%; text-align: left; padding: 14px 5px;"><?= date('d M Y', strtotime($this->Time->format($bookingdetails->purches_date, 'Y-MM-d HH:mm:ss'))); ?></td>
                    <td style=" width: 14%; text-align: right; padding: 14px 5px;"><?= $bookingdetails->price; ?></td>
                </tr>
			<?php } ?>
        </table>
</div>
<div style=" float: left; width: 95%; padding: 19px 20px;">
                    <ul style=" margin: 0; padding: 0; width: 50%; float: right; list-style-type:none;">
                        <li style=" float:left; width:100%; margin:5px 0; font-weight: bold; font-size: 16px; color: #717070; text-align: left;"><div style=" float:left; width:150px;">Subtotal:</div><div style="float: right; width:100px; text-align:right;"><?= $bookingdetails->total_fee - $bookingdetails->service_fee; ?></div></li>
                        <li style=" float:left; width:100%; margin:5px 0; font-weight: bold; font-size: 16px; color: #717070; text-align: left;"><div style=" float:left; width:150px;">Tax </div><div style="float: right; width:100px; text-align:right;"><?= $bookingdetails->service_fee; ?></div></li>
                        <li style=" float:left; width:100%; margin:5px 0; font-weight: bold; font-size: 16px; color: #717070; text-align: left;"><div style=" float:left; width:150px;">Total</div><div style="float: right; width:100px; text-align:right;"><?= $bookingdetails->total_fee; ?></div></li>
                        <li style=" float:left; width:100%; margin:5px 0; font-weight: bold; font-size: 16px; color: #717070; text-align: left;"><div style=" float:left; width:150px;">Paid </div><div style="float: right; width:100px; text-align:right;"><?= $bookingdetails->total_fee; ?></div></li>
                        <li style=" float:left; width:100%; margin-top: 7px; background: #e4e4e3; padding: 10px 10px; border-bottom: 3px solid #f9d456; width: 97%; color: #000; font-weight: bold;text-align: left;"><div style=" float:left; width:150px;">AMOUNT DUE:</div><div style="float: right; width:100px; text-align:right;">0</div></li>
                    </ul>
                </div>
<div style=" float: left; width: 95%; padding: 19px 20px;">
 <p style="font-size: 16px; color: #000;">Invoice Terms:</p>
                    <p style="font-size: 16px; color: #000;">Rafael, thank you very much. We really appreciate your business.</p>
                    <p style="font-size: 16px; color: #000;">please send payments before the due date.</p>
                    <p style="font-size: 16px; color: #000;">Payments ACC-123006705 | IBAN - US100000060345 | SWIFT - BOA447</p>
                    <p style="font-size: 14px; color: #908f8f; font-style: italic; font-weight: bold;">All price are in AO</p>
</div>
</div>
