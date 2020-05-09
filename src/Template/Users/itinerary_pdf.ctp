<!--<body>
    <style type="text/css">*{font-family: Arial, Helvetica, sans-serif;}</style>
   
<div class="email-templ" style="width: 85%; margin: 0 auto;">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                        <td style="padding-bottom: 25px;width:500px;">
                                <div style="float: left;">
                                        <h1 style="margin: 0;">ITENERARY</h1>
                                        <p style=" margin: 0;">Please keep this document until the end of your trip</p>
                                </div>
                                
                        </td>
                        <td style="padding-bottom: 25px;">
                                <div style="float: right;">
                                        <img style="width: 200px; float: right;" src="<?= $this->Url->image('header-logo.png'); ?>">
                                </div>
                        </td>
                </tr>
                <tr>
                        <td>
                                <ul style="float: left; width: 30%; list-style-type: none; padding: 0; font-size: 18px;">
                                        <li style="margin: 5px 0;">Passenger Name:<span style=" float: right;"><?= $userdetails->first_name . " " . $userdetails->sur_name; ?></span></li>
                                        <li style="margin: 5px 0;">E-Ticket Number:<span style=" float: right;"><?= $bookingdetails->payment_id; ?></span></li>
                                        <li style="margin: 5px 0;">Booking Number: <span style=" float: right;"><?= $bookingdetails->payment_ref_id; ?></span></li>
                                        <li style="margin: 5px 0;">Airline:<span style=" float: right;"><?= $bookingdetails->start_d_airline_name; ?></span></li>
                                        <li style="margin: 5px 0;">Issue Date:<span style=" float: right;"><?= $bookingdetails->purches_date->format('d M Y'); ?></span></li>
                                </ul>
                        </td>
                        <td>
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
                        <th style="width:150px; text-align: left; padding-bottom: 10px; border-bottom:3px solid #000;">FROM</th>
                        <th style="width:150px; text-align: left; padding-bottom: 10px; border-bottom:3px solid #000;">TO</th>
                        <th style="width:150px; text-align: left; padding-bottom: 10px; border-bottom:3px solid #000;">FLIGHT</th>
                        <th style="width:150px; text-align: left; padding-bottom: 10px; border-bottom:3px solid #000;">AIRLINE</th>
                        <th style="width:150px; text-align: left; padding-bottom: 10px; border-bottom:3px solid #000;">CABIN</th>
                        <th style="width:150px; text-align: left; padding-bottom: 10px; border-bottom:3px solid #000;">DATE</th>
                        <th style="width:150px; text-align: left; padding-bottom: 10px; border-bottom:3px solid #000;">DEPARTURE</th>
                        <th style="width:150px; text-align: left; padding-bottom: 10px; border-bottom:3px solid #000;">ARRIVAL</th>
                </tr>
<?php foreach ($fullbookingdetails as $val) { ?>
                    <tr>
                            <td style="padding: 10px 0; font-size:23px;  "><?= $this->User->cityHelper($val->origin)->city; ?></td>
                            <td style="padding: 10px 0; font-size:23px;"><?= $this->User->cityHelper($val->destination)->city; ?></td>
                            <td style="padding: 10px 0; font-size:23px;"><?= $val->airline; ?> <?= $val->airnum; ?></td>
                            <td style="padding: 10px 0; font-size:23px;"><?= $val->airline; ?></td>
                            <td style="padding: 10px 0; font-size:23px;"><?= $bookingdetails->cabin; ?></td>
                            <td style="padding: 10px 0; font-size:23px;"><?= $val->dep_time->format('d M Y'); ?></td>
                            <td style="padding: 10px 0; font-size:23px;"><?= $val->dep_time->format('H:i'); ?></td>
                            <td style="padding: 10px 0; font-size:23px;"><?= $val->arr_time->format('H:i'); ?></td>
                    </tr>
<?php } ?>
        </table>
        <div style="width:100%;">
                <h5 style="margin: 4% 0 6%; padding: 10px 0; text-align:center;font-size: 16px; border-bottom: 3px solid #000; border-top: 3px solid #000;">
                        <a style="color: #000; text-decoration: none;" href="<?= HTTP_ROOT; ?>faq">To Check-in go HERE</a>
                </h5>
        </div>
        <div style="width:100%;float:left;">
                <div style="width:30%;float:left;padding-right:10px;">
                        <div style="float: left; width: 100%; margin-bottom: 15px;">
                                <div style="float: left; width: 30px;">
                                        <img src="<?= $this->Url->image('bag.png'); ?>" alt=""  width="30" style="margin-top:7px;">
                                </div>
                                <div style=" float: left; margin-left: 10px;">
                                        <h2 style="font-size: 13px; margin: 0px;">BAGGAGE DROP</h2>
                                        <h5 style="font-size: 11px; margin-top: 3px; margin-bottom: 0;">2 hours before departure</h5>
                                </div>
                        </div>
                        <p style="float: left; width: 100%; margin-top: 5px; font-size: 12px; line-height: 20px;">Check-in baggage can be dropped off at departure hall 2.Economy Class:row 11-13.World Business Class/Europe Select:row 9/10.Platinum/Gold Flying Blue members: row 9/10.</p>
                </div>
                <div style="width:30%;float:left;padding:0px 10px;border-right:3px solid #000;border-left:3px solid #000;">
                        <div style="float: left; width: 100%; margin-bottom: 15px;">
                                <div style="float: left; width: 30px;">
                                        <img src="<?= $this->Url->image('boarding.png'); ?>" alt=""  width="30" style="margin-top:7px;">
                                </div>
                                <div style=" float: left; margin-left: 10px;">
                                        <h2 style="font-size: 13px; margin:0px;">BOARDING</h2>
                                        <h5 style="font-size: 11px; margin-top: 3px; margin-bottom: 0;">From 19:40</h5>
                                </div>
                        </div>
                        <p style="float: left; width: 100%; margin-top: 5px; font-size: 12px; line-height: 20px;">If you have hand-baggage only you may go straight to the gate.In Amsterdam go to Departure hall 1 for Schengen countries and Departure Hall 2 for all other countries.</p>
                </div>
                <div style="width:30%;float:left;padding:0px 10px;">
                        <div style="float: left; width: 100%; margin-bottom: 15px;">
                                <div style="float: left; width: 30px;">
                                        <img src="<?= $this->Url->image('last-call.png'); ?>" alt="" width="30" style="margin-top:7px;">
                                </div>
                                <div style=" float: left; margin-left: 10px;">
                                        <h2 style="font-size: 13px; margin: 0;">LAST CALL</h2>
                                        <h5 style="font-size: 11px; margin-top: 3px; margin-bottom: 0;">Check the monitors at the airport</h5>
                                </div>
                        </div>
                        <p style="float: left; width: 100%; margin-top: 5px; font-size: 12px; line-height: 20px;">Be aware that after boarding closure time you will be refused and your baggage offloaded.</p>
                </div>
        </div>
        <div style="width:100%;float:left;">
                <h4 style="text-align: center; font-size: 16px; margin-bottom:13px;"><?= $bookingdetails->start_d_airline_name; ?> wishes you a very nice flight</h4>
        </div>
        <div style=" float: left; width: 65%; margin-right:5px;">
                <h3 style="font-size: 14px;margin:4px 0px;">Important departure information please read all instructions carefully!</h3>
                <p style="font-size:12px;margin:3px 0px;">1.Check your baggage at least 120 minuts prior to departure for intercontinental flights and 90 minuts for European flights.</p>
                <p style="font-size:12px;margin:3px 0px;">2.Please take waiting times into account during rush hours and holiday periods for both the baggage drop-off and security checks</p>
                <p style="font-size:12px;margin:3px 0px;">3.Ensure your baggage is not left unsupervised.If it is left unattended or if you have been given something to carry by another person,you must inform KLM staff.Please check the latest baggage restrictions on KLM.com.</p>
                <p style="font-size:12px;margin:3px 0px;">4.Flying Blue Platinum,Gold and Silver members travelling in Economy Class from Schiphol to a schengen destination are allowed to use the existing priority security check lane in Departure Hall 1 and 2.</p>
                <p style="font-size:12px;margin:3px 0px;">5.For your safety,and to prevent delayed flights,hand baggage restrictions are strictly followed.</p>
        </div>
        <div style=" float: left; width: 30%; border:2px solid #000;padding: 10px 10px;text-align: center;margin-top:25px; ">
                <h4 style="color: rgb(239,56,66); font-size: 15px;margin:5px 0px;">Visit blur.by/KLMBOOK</h4>
                <div style=" opacity: .8;padding: 28px 0; width: 165px; height: 88px; background-color: rgb(239,56,66); border-radius: 95px; margin: 0 auto;">
                <h3 style="margin-bottom: 10px;color: #fff; font-size: 20px; font-style: italic;">Get <span style="font-size: 23px;">20%</span> off *</h3>
                <p style="font-size: 15px; color: #fff; font-weight: bold; margin: 0;">with code:</p>
                <p style="font-size: 19px; color: #fff; font-weight: bold; margin: 3px 0;">KLM 20</p>
        </div>
</div>
</body>-->


<style type="text/css">
    *{
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
<div class="email-templ" style="width: 85%; margin: 0 auto;">

    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-top: 8%; text-align: center;">
        <tr>
            <td style=""><img style="width: 200px;" src="<?= $this->Url->image('header-logo.png'); ?>"></td>
        </tr>
        <tr>
            <td><h5 style="    margin-top: 20px; margin-bottom: 20px; text-align: left; font-size: 23px; border-bottom: 3px solid #f9d749; padding: 10px 11px; border-left: 3px solid #f9d749; border-bottom-left-radius: 22px;">Informações de Reserva <span style="float: right; color: #f9d749;">Bilhete Eletrónico</span></h5></td>
        </tr>
    </table>
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: left;">
        <tr style="font-size: 21px;">
            <th style=" padding-bottom: 15px;">Nome do Passageiro</th>
            <th style=" padding-bottom: 15px;">Número de Bilhete</th>
            <th style=" padding-bottom: 15px;">Número de Reserva</th>
            <th style=" padding-bottom: 15px;">Data</th>
        </tr>
        <tr>
            <td>CUNHA/JOAQUIMMR</td>
            <td><?= $bookingdetails->payment_id; ?></td>
            <td>D37SDA</td>
            <td><?= $bookingdetails->purches_date->format('d/m/Y'); ?></td>
        </tr>
    </table>
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-top: 1%;">
        <tr>
            <td><h5 style=" margin-bottom: 20px; text-align: left; font-size: 23px; border-bottom: 3px solid #f9d749; padding: 10px 11px; border-left: 3px solid #f9d749; border-bottom-left-radius: 22px;">Voos <span style="float: right; color: #f9d749;">Itinerário</span></h5></td>
        </tr>

    </table>
    <?php
    foreach ($fullbookingdetails as $val) {
        // echo $val->refid;
        $img_s = $val->airline . ".png";
        if (file_exists("img/flaglogos/" . $img_s)) {
            $img_dat1 = HTTP_ROOT . "img/flaglogos/" . $img_s;
        } else {
            $img_dat1 = HTTP_ROOT . "img/icone-1.gif";
        }
        ?>
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-top: 0; border-bottom: 3px solid #f9c965;  padding-bottom: 30px; margin-bottom: 12px; text-align: left;">

            <tr>
                <td colspan="4">
                    <h5 style=" font-size: 20px; font-weight: normal; margin: 10px 0 18px 0">
                        <img style="float: left;width:80px;margin-right: 15px; position: relative; top: -5px;" src="<?= $img_dat1; ?>"/>
                        <?= $val->airline; ?> <?= $val->airnum; ?> - <?= $cnt[$val->airline]; ?> - <?= $val->dep_time->format('d M Y'); ?>
                    </h5>
                </td>
            </tr>

            <tr style="font-size: 21px;">
                <th style=" padding-bottom: 15px;">Número de Confirmação</th>
                <th style=" padding-bottom: 15px;">Estado</th>
                <th style=" padding-bottom: 15px;">Classe</th>
                <th style=" padding-bottom: 15px;">Info</th>
            </tr>



            <tr style="font-size: 19px;">
                <td>ND2V9</td>
                <td>Confirmado</td>
                <td>Económica</td>
                <td>Boeing 737-700</td>
            </tr>
            <tr style="font-size: 21px;">
                <th style=" padding-bottom: 15px; padding-top: 15px;">Partida</th>
                <th style=" padding-bottom: 15px; padding-top: 15px;">Chegada</th>
                <th style=" padding-bottom: 15px; padding-top: 15px;">Bagagem de mão</th>
                <th style=" padding-bottom: 15px; padding-top: 15px;">Limites de bagagem</th>
            </tr>
            <tr style="font-size: 19px;    vertical-align: top; margin-bottom: 15px;">
                <td><?= $this->User->cityHelper($val->origin)->country; ?> (<?= $this->User->cityHelper($val->origin)->data; ?>)<br>
                    <?= $this->User->cityHelper($val->origin)->city; ?> (<?= $val->origin ?>)<br>
                    Sem inf. de terminal<br><?= $val->dep_time->format('H:i'); ?></td>
                <td><?= $this->User->cityHelper($val->destination)->country; ?> (<?= $this->User->cityHelper($val->destination)->data; ?>)<br>
                    <?= $this->User->cityHelper($val->destination)->city; ?> (<?= $val->destination ?>)<br>
                    Sem inf. de terminal<br><?= $val->arr_time->format('H:i'); ?></td>
                <td><p style="font-size: 16px; margin: 0px 0 0;">1 Peça(s) / Mala 1 - 5Kg</p></td>
                <td><p style="font-size: 16px; margin: 0px 0 0;">1 Peça(s) / Mala 1 - 5Kg</p></td>
            </tr>
        </table>
    <?php } ?>

    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-top: -15px !important;
    background: #fff;">
        <tbody><tr>
                <td><h5 style=" margin-bottom: 20px; text-align: left; font-size: 23px; border-bottom: 3px solid #f9d749; padding: 10px 11px; border-left: 3px solid #f9d749; border-bottom-left-radius: 22px;">Agência <span style="float: right; color: #f9d749;">Informações</span></h5></td>
            </tr>
        </tbody></table>

    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: left;">
        <tbody><tr style="font-size: 21px;">
                <th style=" padding-bottom: 15px; padding-top: 15px;">ALEGRO</th>
                <th style=" padding-bottom: 15px; padding-top: 15px;"></th>
            </tr>
            <tr style="font-size: 19px;     vertical-align: top;">
                <td>Alegro, LDA<br>
                    Rua Rey Katiavala, Prédio da Angop, 7º Andar D<br>
                    Luanda - Angola<br>
                    Tlf: +244 923 480 978<br>
                    Email: geral@alegro.co.ao<br>
                    www.alegro.co.ao<br></td>
                <td style="text-align: right;
                    position: relative;
                    top: -50px;">
                    <img style="width: 80px;" src="<?= $this->Url->image('iata-logo.png'); ?>">
                    <p style="line-height: 24px;margin: 13px 0 0;">05210310</p>
                </td>
            </tr>
        </tbody></table>


</div>
<div class="email-templ" style="width: 85%; margin: 0 auto;">

    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-top: 1%;">
        <tr>
            <td><h5 style=" margin-bottom: 20px;margin-top: 0px; text-align: left; font-size: 23px; border-bottom: 3px solid #f9d749; padding: 10px 11px; border-left: 3px solid #f9d749; border-bottom-left-radius: 22px; color: #f9d749">Contactos </h5></td>
        </tr>
    </table>
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: left;">

        <tr style="font-size: 19px;">
            <td style=" padding: 8px 0;">RAFAEL AFONSO</td>
            <td style=" padding: 8px 0;">pafonso@alegro.co.ao</td>
            <td style=" padding: 8px 0;">+244 923 480 978</td>
        </tr>
        <tr style="font-size: 19px;">
            <td style=" padding: 8px 0;">ZEDILSON ALMEIDA</td>
            <td style=" padding: 8px 0;">zalmeida@alegro.co.ao</td>
            <td style=" padding: 8px 0;">+244 923 070 079</td>
        </tr>		
        <tr style="font-size: 19px;">
            <td style=" padding: 8px 0;">JANET DE CEITA</td>
            <td style=" padding: 8px 0;">jceita@alegro.co.ao</td>
            <td style=" padding: 8px 0;">+244 921 119 447</td>
        </tr>
        <tr style="font-size: 19px;">
            <td style=" padding: 8px 0;">YARA CARVALHEDA</td>
            <td style=" padding: 8px 0;">ycarvalheda@alegro.co.ao</td>
            <td style=" padding: 8px 0;">+244 927 543 344</td>
        </tr>	
    </table>
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-top: 1%;">
        <tr>
            <td><h5 style=" margin-bottom: 20px; text-align: left; font-size: 23px; border-bottom: 3px solid #f9d749; padding: 10px 11px; border-left: 3px solid #f9d749; border-bottom-left-radius: 22px; color: #f9d749">Notas </h5></td>
        </tr>
    </table>
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: left;">

        <tr style="font-size: 19px;">
            <td>
                <ul style="margin: 0; padding: 0;">
                    <li style="padding: 5px 0;">Antecedência recomendada:<br>
                        > voos domésticos: 90 minutos.<br>
                        > voos internacionais: 120 minutos.<br>
                        > voos intercontinentais: 180 minutos.</li>
                    <li style="padding: 5px 0;">Não esquecer Cartão de Cidadão ou Passaporte, e Visto (consoante o destino).</li>
                    <li style="padding: 5px 0;">Deve reconfirmar se o seu passaporte está válido, mínimo 6 meses à data de partida.</li>
                    <li style="padding: 5px 0;">Menores não acompanhados pelos pais necessitam de autorização.</li>
                    <li style="padding: 5px 0;">Os horários indicados são horas locais.</li>
                    <li style="padding: 5px 0;">A Alegro Angola deseja-lhe boa viagem!</li>
                </ul>
            </td>
        </tr>	
    </table>
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-top: 1%;">
        <tr>
            <td><h5 style=" margin-bottom: 20px; text-align: left; font-size: 23px; border-bottom: 3px solid #f9d749; padding: 10px 11px; border-left: 3px solid #f9d749; border-bottom-left-radius: 22px; color: #f9d749">Informação importante para viajantes com bilhetes eletrónicos - leitura aconselhada </h5></td>
        </tr>
    </table>
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align: left;">

        <tr style="font-size: 19px; line-height: 25px;">
            <td>
                <p style="font-size: 14px; margin: 0;">O transporte e outros serviços disponibilizados pela transportadora estão sujeitos a condições de transporte, as quais são por este meio incorporadas por referência. Estas
                    condições podem ser obtidas junto da transportadora emissora. Os passageiros numa viagem envolvendo um destino final ou uma escala num país diferente do país de partida
                    são informados de que os tratados internacionais conhecidos como Convenção de Montreal, ou a sua antecessora, a Convenção de Varsóvia, incluindo as respetivas emendas
                    (o Sistema da Convenção de Varsóvia) se podem aplicar a toda a viagem, incluindo qualquer segmento dentro de um país. Para esses passageiros, o tratado aplicável, incluindo
                    contratos especiais de transporte incorporados em quaisquer tarifas aplicáveis, governa e pode limitar a responsabilidade jurídica da transportadora. É proibido o transporte de
                    certos materiais perigosos, como aerossóis, fogos de artifício e líquidos inflamáveis, a bordo de uma aeronave. Se não compreender estas restrições, pode obter mais informações
                    junto da sua companhia aérea.</p>
            </td>
        </tr>	
    </table>

</div>
