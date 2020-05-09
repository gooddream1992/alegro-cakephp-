<body>
    <style type="text/css">
*{
font-family: Arial, Helvetica, sans-serif;
}
</style>
<div class="email-templ" style="width: 85%; margin: 0 auto;">
	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td style="padding-bottom: 25px;">
				<div style="float: left;">
					<h1 style="margin: 0;">ITENERARY</h1>
					<p style=" margin: 0;">Please keep this document until the end of your trip</p>
				</div>
				<div>
					<img style="width: 200px; float: right;" src="<?=$this->Url->image('header-logo.png');?>">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<ul style="float: left; width: 30%; list-style-type: none; padding: 0; font-size: 18px;">
					<li style="margin: 5px 0;">Passenger Name:<span style=" float: right;"><?=$userdetails->first_name." ".$userdetails->sur_name;?></span></li>
					<li style="margin: 5px 0;">E-Ticket Number:<span style=" float: right;"><?=$bookingdetails->payment_id;?></span></li>
					<li style="margin: 5px 0;">Booking Number: <span style=" float: right;"><?=$bookingdetails->payment_ref_id;?></span></li>
					<li style="margin: 5px 0;">Airline:<span style=" float: right;"><?=$bookingdetails->start_d_airline_name;?></span></li>
					<li style="margin: 5px 0;">Issue Date:<span style=" float: right;"><?=$bookingdetails->purches_date->format('d M Y');?></span></li>
				</ul>
				<ul style="float: right; width: 30%; list-style-type: none; padding: 0;">
					<li style="margin: 5px 0;">Agency:<span style=" float: right;">ALEGRO</span></li>
					<li style="margin: 5px 0;">Address:<span style=" float: right;">Lar do Patriota</span></li>
					<li style="margin: 5px 0;">Phone Number: <span style=" float: right;">+244 923 480 978</span></li>
					<li style="margin: 5px 0;">Email<span style=" float: right;">info@alegro.co.ao</span></li>
					<li style="margin: 5px 0;">AITA:<span style=" float: right;">0345666</span></li>
				</ul>
			</td>
		</tr>
	</table>
	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-top: 8%;">
		<tr style="text-align: left;">
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">FROM</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">TO</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">FLIGHT</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">AIRLINE</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">CABIN</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">DATE</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">DEPARTURE</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">ARRIVAL</th>
		</tr>
                <?php foreach ($fullbookingdetails as $val){    ?>
		<tr>
			<td style="padding: 10px 0;"><?= $this->User->cityHelper($val->origin)->city; ?></td>
			<td style="padding: 10px 0;"><?= $this->User->cityHelper( $val->destination)->city; ?></td>
			<td style="padding: 10px 0;"><?= $val->airline;?> <?= $val->airnum;?></td>
			<td style="padding: 10px 0;"><?= $val->airline;?></td>
			<td style="padding: 10px 0;"><?=$bookingdetails->cabin;?></td>
			<td style="padding: 10px 0;"><?= $val->dep_time->format('d M Y');?></td>
			<td style="padding: 10px 0;"><?= $val->dep_time->format('H:i');?></td>
			<td style="padding: 10px 0;"><?= $val->arr_time->format('H:i');?></td>
		</tr>
                <?php } ?>
	</table>
	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td style="text-align: center;">
				<h5 style="margin: 6% 0 10%; padding: 12px 0; font-size: 19px; border-bottom: 3px solid #000; border-top: 3px solid #000;">
					<a style="color: #000; text-decoration: none;" href="<?=HTTP_ROOT;?>faq">To Check-in go HERE</a>
				</h5>
			</td>
		</tr>
		<tr>
			<td>
				<div style=" float: left; width: 29%; padding-right: 52px;">
					<div style="float: left; width: 100%; margin-bottom: 35px;">
						<div style="float: left; width: 102px;">
							<img src="<?=$this->Url->image('bag.png');?>" alt=""  width="90">
						</div>
						<div style=" float: left; width: 61%; margin-left: 25px;">
							<h2 style="font-size: 23px; margin-bottom: 0;">BAGGAGE DROP</h2>
							<h5 style="font-size: 16px; margin-top: 10px; margin-bottom: 0;">2 hours before departure</h5>
						</div>
					</div>
					<p style="float: left; width: 100%; margin-top: 5px; font-size: 17px; line-height: 23px;">Check-in baggage can be dropped off at departure hall 2.Economy Class:row 11-13.World Business Class/Europe Select:row 9/10.Platinum/Gold Flying Blue members: row 9/10.</p>
				</div>
				<div style=" float: left; width: 29%; padding-left: 17px; padding-right: 52px; border-left: 2px solid #000; border-right: 2px solid #000;">
					<div style="float: left; width: 100%; margin-bottom: 35px;">
						<div style="float: left; width: 102px;">
							<img src="<?=$this->Url->image('boarding.png');?>" alt=""  width="90">
						</div>
						<div style=" float: left; width: 61%; margin-left: 25px;">
							<h2 style="font-size: 23px; margin-bottom: 0;">BOARDING</h2>
							<h5 style="font-size: 16px; margin-top: 10px; margin-bottom: 0;">From 19:40</h5>
						</div>
					</div>
					<p style="float: left; width: 100%; margin-top: 5px; font-size: 17px; line-height: 23px;">If you have hand-baggage only you may go straight to the gate.In Amsterdam go to Departure hall 1 for Schengen countries and Departure Hall 2 for all other countries.</p>
				</div>
				<div style=" float: left; width: 29%; padding-left: 20px;">
					<div style="float: left; width: 100%; margin-bottom: 35px;">
						<div style="float: left; width: 102px;">
                                                    <img src="<?=$this->Url->image('last-call.png');?>" alt="" width="90">
						</div>
						<div style=" float: left; width: 61%; margin-left: 25px;">
							<h2 style="font-size: 23px; margin-bottom: 0;">LAST CALL</h2>
							<h5 style="font-size: 16px; margin-top: 10px; margin-bottom: 0;">Check the monitors at the airport</h5>
						</div>
					</div>
					<p style="float: left; width: 100%; margin-top: 5px; font-size: 17px; line-height: 23px;">Be aware that after boarding closure time you will be refused and your baggage offloaded.</p>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<h4 style="text-align: center; font-size: 18px; margin-bottom: 50px;"><?=$bookingdetails->start_d_airline_name;?> wishes you a very nice flight</h4>
			</td>
		</tr>
		<tr>
			<td>
				<div style=" float: left; width: 70%;">
					<h3 style="font-size: 23px;">Important departure information please read all instructions carefully!</h3>
					<p>1.Check your baggage at least 120 minuts prior to departure for intercontinental flights and 90 minuts for European flights.</p>
					<p>2.Please take waiting times into account during rush hours and holiday periods for both the baggage drop-off and security checks</p>
					<p>3.Ensure your baggage is not left unsupervised.If it is left unattended or if you have been given something to carry by another person,you must inform KLM staff.Please check the latest baggage restrictions on KLM.com.</p>
					<p>4.Flying Blue Platinum,Gold and Silver members travelling in Economy Class from Schiphol to a schengen destination are allowed to use the existing priority security check lane in Departure Hall 1 and 2.</p>
					<p>5.For your safety,and to prevent delayed flights,hand baggage restrictions are strictly followed.</p>
				</div>
				<div style=" float: left; width: 27%; border:2px solid #000;padding: 15px 15px 45px;text-align: center; ">
					<h4 style="color: rgb(239,56,66); font-size: 20px;">Visit blur.by/KLMBOOK</h4>
					<div style=" opacity: .8;padding: 28px 0; width: 185px; height: 130px; background-color: rgb(239,56,66); border-radius: 95px; margin: 0 auto;">
						<h3 style="margin-bottom: 16px;color: #fff; font-size: 25px; font-style: italic;">Get <span style="font-size: 23px;">20%</span> off *</h3>
						<p style="font-size: 19px; color: #fff; font-weight: bold; margin: 0;">with code:</p>
						<p style="font-size: 19px; color: #fff; font-weight: bold; margin: 7px 0;">KLM 20</p>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
</body>
