<script>
    var handlesSliders = document.getElementsByClassName('3');

    for (var x = 0; x < handlesSliders.length; x++) {
        noUiSlider.create(handlesSliders[x], {
            start: [200, 500, 800],
            step: 10,
            tooltips: false,
            connect: [false, true, true, false],
            range: {
                'min': [0],
                'max': [1000]
            },

            format: wNumb({
                decimals: 0,
                suffix: ' h',
                /*prefix: ' min',*/
            })
        });
    }

    var handlesSliders1 = document.getElementsByClassName('2');

    for (var x = 0; x < handlesSliders1.length; x++) {
        noUiSlider.create(handlesSliders1[x], {
            start: [400, 700],
            step: 10,
            tooltips: false,
            connect: [false, true, false],
            range: {
                'min': [0],
                'max': [1000]
            },

            format: wNumb({
                decimals: 0,
                suffix: ' h',
                /*prefix: ' min',*/
            })
        });
    }

    var handlesSliders3 = document.getElementsByClassName('1');

    for (var x = 0; x < handlesSliders3.length; x++) {
        noUiSlider.create(handlesSliders3[x], {
            start: [500],
            step: 10,
            tooltips: false,
            connect: [false, false],
            range: {
                'min': [0],
                'max': [1000]
            },

            format: wNumb({
                decimals: 0,
                suffix: ' h',
                /*prefix: ' min',*/
            })
        });
    }

    var handlesSliders5 = document.getElementsByClassName('Direct');

    for (var x = 0; x < handlesSliders5.length; x++) {
        noUiSlider.create(handlesSliders5[x], {
            start: [],
            step: 10,
            behaviour: none,
            tooltips: false,
            connect: [false, false],
            range: {
                'min': [0],
                'max': [1000]
            },

            format: wNumb({
                decimals: 0,
                suffix: ' h',
                /*prefix: ' min',*/
            })

        });
    }
</script>
<?php

function dateDifference($date1, $date2) {
//     $date1 = strtotime($date1);
//     $date2 = strtotime($date2);
//     $hourFix = $minFix = 0;
//     $diff = abs($date1 - $date2);
//     $hour = $diff / (60 * 60); // in hour (1 day = 24 hour)
//     $hourFix = floor($hour);
//     $hourPen = $hour - $hourFix;
//     if ($hourPen > 0) {
//         $min = $hourPen * (60); // in hour (1 hour = 60 min)
//         $minFix = floor($min);
//         $minPen = $min - $minFix;
//     }
//
//     $str = "";
//
//     if ($hourFix > 0)
//         $str .= $hourFix . " h ";
//     if ($minFix > 0)
//         $str .= $minFix . " m ";
//
//     return $str;

    $start = date_create($date1);
    $end = date_create($date2);
    // pr($start." --- ".$date1);exit;
    $diff = date_diff($date2, $date1);

    $day = $diff->format('%d');
    $hor = $diff->format('%h');
    if ($day > 0) {
        echo $diff->format('%d d %h h %i m');
    } else if ($hor > 0) {
        echo $diff->format('%h h %i m');
    } else {
        echo $diff->format('%i m');
    }
}

foreach ($search_det_dats as $resut) {
    $jor_st_cn = -1;
    $jor_ed_cn = -1;
    foreach ($this->User->flightdetails($resut->id) as $fli) {
        if ($fli['jor_typ'] == "Journey Details Start") {
            $jor_st_cn++;
        }
        if ($fli['jor_typ'] == "Journey Details Return") {
            $jor_ed_cn++;
        }
    }
    ?>				
    <div class="searchItem d-flex">

        <div class="details desktop">
            <table class="line line-1">
                <tr>
                    <td>
                        <?php
                        $img_s = $resut->start_d_airline_name . ".png";
                        if (file_exists("img/flaglogos/" . $img_s)) {
                            $img_dat = HTTP_ROOT . "webroot/img/flaglogos/" . $img_s;
                        } else {
                            $img_dat = $this->Url->image('icone-1.gif');
                        }
                        ?>
                        <img src="<?= $img_dat; ?>" alt="" style="width: 80px;">
                    </td>
                    <td class="d-none d-lg-block">
                        <p class="Airlines"><?php echo isset($cnt[$resut->start_d_airline_name]) ? $cnt[$resut->start_d_airline_name] : $resut->start_d_airline_name; ?> <br><?= $resut->start_d_airline_name; ?>-<?= $resut->start_d_airline_num; ?></p>
                    </td>
                    <td>
                        <p class="time"><?= __(date_format($resut->start_depart_time, 'h:i A')); ?><br><span><?= __(date("M d, D", strtotime($this->Time->format($resut->start_depart_time, 'Y-MM-d')))); ?></span></p>

                    </td>
                    <td rowspan="2">
                        <!--<div class="departArrivale">
                            <span>LAX</span><span>IST</span>
                        </div>-->
                        <p class="rangeTime"><span class="hours"><?= dateDifference($resut->start_arrival_time, $resut->start_depart_time); ?></span></p>
                        <div class="<?php if ($jor_st_cn <= 0) {
                            echo "Direct";
                        } else {
                            echo $jor_st_cn;
                        } ?> stopsRange" disabled></div>
                        <p class="citationStops"><?php if ($jor_st_cn <= 0) {
                            echo "Direct";
                        } else {
                            echo $jor_st_cn;
                        } ?> <?php if ($jor_st_cn == 1) {
                            echo "stop";
                        }if ($jor_st_cn > 1) {
                            echo "stops";
                        } ?></p>
                    </td>
                    <td class="time-desktop-3">
                        <p class="time time-3"><?= __(date("h:i A", strtotime($this->Time->format($resut->start_arrival_time, 'h:i A')))); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($resut->start_arrival_time, 'Y-MM-d')))); ?></span></p>
                    </td>

                </tr>
                <tr>
                    <td>
                        <!--  <img src="img/icone-2.gif" alt="">-->
                    </td>
                    <td class="d-none d-lg-block">

                                                <!-- <p class="Airlines">American Airlines <br>BA-3271</p>-->
                    </td>
                    <td class="time-mobile-3">
                        <p class="departure"><?= $this->User->cityHelper($orr)->city . ' (' . $orr . ')'; ?></p>
                    </td>

                    <td>
                        <p class="Arrival"><?= $this->User->cityHelper($dess)->city . ' (' . $dess . ')'; ?></p>
                    </td>

                </tr>
            </table>
    <?php if ($fli['jor_typ'] == "Journey Details Return") { ?>
                <hr>
                <table class="line line-2">
                    <tr>
                        <td>
        <?php
        $img_r = $resut->return_d_airline_name . ".png";
        if (file_exists("img/flaglogos/" . $img_r)) {
            $img_dat1 = HTTP_ROOT . "webroot/img/flaglogos/" . $img_r;
        } else {
            $img_dat1 = $this->Url->image('icone-1.gif');
        }
        ?>
                            <img src="<?= $img_dat1; ?>" alt="" style="width: 80px;">
                        </td>
                        <td class="d-none d-lg-block">
                            <p class="Airlines"><?php echo isset($cnt[$resut->return_d_airline_name]) ? $cnt[$resut->return_d_airline_name] : $resut->return_d_airline_name; ?> <br><?= $resut->return_d_airline_name; ?>-<?= $resut->return_d_airline_num; ?></p>
                        </td>
                        <td>
                            <p class="time"><?= __(date_format($resut->return_depart_time, 'h:i A')); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($resut->return_depart_time, 'Y-MM-d')))); ?></span></p>

                        </td>
                        <td rowspan="2">
                            <!--<div class="departArrivale">
                                <span>LAX</span><span>IST</span>
                            </div>-->
                            <p class="rangeTime"><span class="hours"><?= dateDifference($resut->return_arrival_time, $resut->return_depart_time); ?></span></p>
                            <div class="<?php if ($jor_ed_cn <= 0) {
            echo "Direct";
        } else {
            echo $jor_ed_cn;
        } ?> stopsRange" disabled></div>
                            <p class="citationStops"><?php if ($jor_ed_cn <= 0) {
            echo "Direct";
        } else {
            echo $jor_ed_cn;
        } ?> <?php if ($jor_ed_cn == 1) {
            echo "stop";
        }if ($jor_ed_cn > 1) {
            echo "stops";
        } ?></p>
                        </td>
                        <td class="time-desktop-4">
                            <p class="time time-4"><?= __(date_format($resut->return_arrival_time, 'h:i A')); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($resut->return_arrival_time, 'Y-MM-d')))); ?></span></p>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <!--   <img src="img/icone-2.gif" alt="">-->
                        </td>
                        <td class="d-none d-lg-block">

                                                <!-- <p class="Airlines">American Airlines <br>BA-3271</p> -->
                        </td>
                        <td class="time-mobile-4">
                            <p class="departure"><?= $this->User->cityHelper($dess)->city . ' (' . $dess . ')'; ?></p>
                        </td>

                        <td>
                            <p class="Arrival"><?= $this->User->cityHelper($orr)->city . ' (' . $orr . ')'; ?></p>
                        </td>

                    </tr>
                </table>
    <?php } ?>
        </div>


        <div class="details mobile">
            <table class="line">
                <tr>
                    <td>
                        <img src="<?= $img_dat; ?>" alt="" style="width: 70px;">
                    </td>
                    <td class="">
                        <p class="time"><?= __(date_format($resut->start_depart_time, 'h:i A')); ?><br><span><?= __(date("M d, D", strtotime($this->Time->format($resut->start_depart_time, 'Y-MM-d')))); ?></span></p>
                    </td>
                    <td rowspan="2">
                        <div class="departArrivale">
                            <span><?= $orr; ?></span><span><?= $dess; ?></span>
                        </div>
                        <p class="rangeTime"><span class="hours"><?= dateDifference($resut->start_arrival_time, $resut->start_depart_time); ?></span></p>
                        <div class="<?php if ($jor_st_cn <= 0) {
            echo "Direct";
        } else {
            echo $jor_st_cn;
        } ?> stopsRange" disabled></div>
                        <p class="citationStops"><?php if ($jor_st_cn <= 0) {
            echo "Direct";
        } else {
            echo $jor_st_cn;
        } ?> <?php if ($jor_st_cn == 1) {
            echo "stop";
        }if ($jor_st_cn > 1) {
            echo "stops";
        } ?></p>

                    </td>
                </tr>
                <tr>
                    <td>
                        <!-- <img src="img/icone-2.gif" alt="">-->
                    </td>
                    <td class="">
                        <p class="time"><?= __(date_format($resut->start_arrival_time, 'h:i A')); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($resut->start_arrival_time, 'Y-MM-d')))); ?></span></p>
                    </td>

                </tr>
            </table>
    <?php if ($fli['jor_typ'] == "Journey Details Return") { ?>
                <br>
                <table class="line line-2">
                    <tr>
                        <td>
                            <img src="<?= $img_dat1; ?>" alt="" style="width: 70px;">
                        </td>
                        <td class="">
                            <p class="time"><?= __(date_format($resut->return_depart_time, 'h:i A')); ?><br><span><?= __(date("M d, D", strtotime($this->Time->format($resut->return_depart_time, 'Y-MM-d')))); ?></span></p>
                        </td>
                        <td rowspan="2">
                            <div class="departArrivale">
                                <span><?= $dess; ?></span><span><?= $orr; ?></span>
                            </div>
                            <p class="rangeTime"><span class="hours"><?= dateDifference($resut->return_arrival_time, $resut->return_depart_time); ?></span></p>
                            <div class="<?php if ($jor_ed_cn <= 0) {
            echo "Direct";
        } else {
            echo $jor_ed_cn;
        } ?> stopsRange" disabled></div>
                            <p class="citationStops"><?php if ($jor_ed_cn <= 0) {
            echo "Direct";
        } else {
            echo $jor_ed_cn;
        } ?> <?php if ($jor_ed_cn == 1) {
            echo "stop";
        }if ($jor_ed_cn > 1) {
            echo "stops";
        } ?></p>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- <img src="img/icone-2.gif" alt="">-->
                        </td>
                        <td class="">
                            <p class="time"><?= __(date_format($resut->return_arrival_time, 'h:i A')); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($resut->return_arrival_time, 'Y-MM-d')))); ?></span></p>
                        </td>

                    </tr>
                </table>
                    <?php } ?>
        </div>


        <div class="bookBtn text-center">
    <?php if ($resut->refundable == "true") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> Refundable</p><?php } else if ($resut->refundable == "false") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> Non-Refundable</p><?php } ?>
            <span><?= $resut->price; ?></span>
            <a href="#" data-toggle="modal" data-target="#flightDetailsModal<?= $resut->id; ?>" class="btn-book"><?php echo __('Book') ?></a>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="flightDetailsModal<?= $resut->id; ?>" tabindex="-1" role="dialog" aria-labelledby="flightDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="fas fa-times"></i></span> </button>
                <div class="container">
                    <!-- Header -->
                    <div class="row flight-details-header">
                        <div class="col-md-6 col-6 text-left">
                            <div class="flight-details-title"> Flight Details </div>
                        </div>
                        <div class="col-md-3 col-6 offset-lg-1 text-right">
                            <div class="row">
                                <div class="col">
                                    <div class="flight-details-price"> <?= $resut->price; ?> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="flight-details-price-subtitle"> Total price </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-2"> <a href="<?= HTTP_ROOT . 'fare-details/' . $resut->id; ?>" class="btn btn-primary btn-select hvr-grow"  target="_blank">Select</a> </div>
                    </div>
                    <!-- Departure title -->
                    <div class="row">
                        <div class="col text-left">
                            <div class="flight-details-departure-title"> DEPARTURE: <?= $this->User->cityHelper($orr)->city; ?> - <?= $this->User->cityHelper($dess)->city; ?> </div>
                        </div>
                    </div>
                    <!-- Flight details row -->
    <?php
    for ($ini = 0; $ini <= $jor_st_cn; $ini++) {
        $fli_de = $this->User->flightdetails($resut->id)[$ini];

        $img_mod = $fli_de['airline'] . ".png";
        if (file_exists("img/flaglogos/" . $img_mod)) {
            $img_mod_dat1 = HTTP_ROOT . "webroot/img/flaglogos/" . $img_mod;
        } else {
            $img_mod_dat1 = $this->Url->image('icone-1.gif');
        }
        ?>
                        <div class="row flight-details-row">
                            <div class="col-md-3 col-12 text-left"> <img src="<?= $img_mod_dat1; ?>" class="flight-details-airline-logo" />
                                <div class="row flight-details-company-flight align-middle">
                                    <div class="col"> <?= isset($cnt[$fli_de['airline']]) ? $cnt[$fli_de['airline']] : $fli_de['airline']; ?> </div>
                                    <div class="col"> <?= $fli_de['airline']; ?>-<?= $fli_de['airnum']; ?> </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-4 flight-details-infos text-left">
                                <div class="row">
                                    <div class="col"> <?= $this->User->cityHelper($fli_de['origin'])->city; ?> </div>
                                </div>
                                <div class="row flight-details-date">
                                    <div class="col"> <?= __(date("M d, D", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d')))); ?>, <?= __(date_format($fli_de['dep_time'], 'h:i A')); ?> </div>
                                </div>
                                <div class="row">
                                    <div class="col"> <?= $this->User->cityHelper($fli_de['origin'])->city; ?> (<?= $fli_de['origin']; ?>), <?= $this->User->cityHelper($fli_de['origin'])->country; ?> </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-4 flight-details-duration text-center">
                                <div class="row">
                                    <div class="col"> <?= dateDifference($fli_de['arr_time'], $fli_de['dep_time']); ?> | Direct </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <hr /> </div>
                                </div>
                                <div class="row">
                                    <div class="col"> <?= $cabin; ?> Class </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-4 flight-details-infos text-right">
                                <div class="row">
                                    <div class="col"> <?= $this->User->cityHelper($fli_de['destination'])->city; ?> </div>
                                </div>
                                <div class="row flight-details-date">
                                    <div class="col"> <?= __(date("M d, D", strtotime($this->Time->format($fli_de['arr_time'], 'Y-MM-d')))); ?>, <?= __(date_format($fli_de['arr_time'], 'h:i A')); ?> </div>
                                </div>
                                <div class="row">
                                    <div class="col"> <?= $this->User->cityHelper($fli_de['destination'])->city; ?> (<?= $fli_de['destination']; ?>), <?= $this->User->cityHelper($fli_de['destination'])->country; ?> </div>
                                </div>
                            </div>
                        </div>
                        <!-- Layover -->
        <?php if ($ini != $jor_st_cn) { ?>
                            <div class="row">
                                <div class="col text-center">
                                    <div class="flight-details-layover"> Layover: <span><?= $this->User->cityHelper($fli_de['destination'])->city; ?> (<?= $fli_de['destination']; ?>)</span> - Time: <?= dateDifference($this->User->flightdetails($resut->id)[$ini + 1]['dep_time'], $fli_de['arr_time']); ?> </div>
                                </div>
                            </div>
        <?php }
    }
    ?>
                    <hr />
                    <!-- Departure title -->
    <?php if ($fli['jor_typ'] == "Journey Details Return") { ?>
                        <div class="row">
                            <div class="col text-left">
                                <div class="flight-details-departure-title"> RETURN: <?= $this->User->cityHelper($dess)->city; ?> - <?= $this->User->cityHelper($orr)->city; ?> </div>
                            </div>
                        </div>
                        <!-- Flight details row -->                  
    <?php } ?>

    <?php
    $po_end = $jor_st_cn + $jor_ed_cn;
    for ($ini = $jor_st_cn + 1; $ini <= $po_end + 1; $ini++) {
        $fli_re = $this->User->flightdetails($resut->id)[$ini];
        $img_mod1 = $fli_re['airline'] . ".png";
        if (file_exists("img/flaglogos/" . $img_mod1)) {
            $img_mod_dat1 = HTTP_ROOT . "webroot/img/flaglogos/" . $img_mod1;
        } else {
            $img_mod_dat1 = $this->Url->image('icone-1.gif');
        }
        ?>
                        <div class="row flight-details-row">
                            <div class="col-md-3 col-12 text-left"> <img src="<?= $img_mod_dat1; ?>" class="flight-details-airline-logo" />
                                <div class="row flight-details-company-flight align-middle">
                                    <div class="col"> <?= isset($cnt[$fli_re['airline']]) ? $cnt[$fli_re['airline']] : $fli_re['airline']; ?> </div>
                                    <div class="col"> <?= $fli_re['airline']; ?>-<?= $fli_re['airnum']; ?> </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-4 flight-details-infos text-left">
                                <div class="row">
                                    <div class="col"> <?= $this->User->cityHelper($fli_re['origin'])->city; ?> </div>
                                </div>
                                <div class="row flight-details-date">
                                    <div class="col">  <?= __(date("M d, D", strtotime($this->Time->format($fli_re['dep_time'], 'Y-MM-d')))); ?>, <?= __(date_format($fli_re['dep_time'], 'h:i A')); ?> </div>
                                </div>
                                <div class="row">
                                    <div class="col"> <?= $this->User->cityHelper($fli_re['origin'])->city; ?> (<?= $fli_re['origin']; ?>), <?= $this->User->cityHelper($fli_re['origin'])->country; ?>  </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-4 flight-details-duration text-center">
                                <div class="row">
                                    <div class="col"> <?= dateDifference($fli_re['arr_time'], $fli_re['dep_time']); ?> | Direct </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <hr /> </div>
                                </div>
                                <div class="row">
                                    <div class="col"> <?= $cabin; ?> Class </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-4 flight-details-infos text-right">
                                <div class="row">
                                    <div class="col"> <?= $this->User->cityHelper($fli_re['destination'])->city; ?> </div>
                                </div>
                                <div class="row flight-details-date">
                                    <div class="col"> <?= __(date("M d, D", strtotime($this->Time->format($fli_re['arr_time'], 'Y-MM-d')))); ?>, <?= __(date_format($fli_re['arr_time'], 'h:i A')); ?> </div>
                                </div>
                                <div class="row">
                                    <div class="col"> <?= $this->User->cityHelper($fli_re['destination'])->city; ?> (<?= $fli_re['destination']; ?>), <?= $this->User->cityHelper($fli_re['destination'])->country; ?> </div>
                                </div>
                            </div>
                        </div>
        <?php if ($ini != $po_end + 1) { ?>
                            <div class="row">
                                <div class="col text-center">
                                    <div class="flight-details-layover"> Layover: <span><?= $this->User->cityHelper($fli_re['destination'])->city; ?> (<?= $fli_re['destination']; ?>)</span> - Time: <?= dateDifference($this->User->flightdetails($resut->id)[$ini + 1]['dep_time'], $fli_re['arr_time']); ?></div>
                                </div>
                            </div>

        <?php }
    }
    ?>


                </div>
            </div>
        </div>
    </div>
<?php
}

$totalpagescount = ceil($res_found / 15);
?>
<ul class="pagination" <?php if ($totalpagescount == 0) {
    echo "style='display:none;'";
} ?>>                  
<?php
for ($pgno = 1; $pgno <= $totalpagescount; $pgno++) {
    $aacc = "";
    if ($pgno == 1) {
        $aacc = "active";
    }
    $origi = $orr;
    $desti = $dess;
    $cabin1 = $cabin;
    echo "<li id='" . $pgno . "' class='page-item " . $aacc . "  page-link' onclick='next_page(&#39;" . $cookiunq . "&#39;,$pgno,&#39;" . $origi . "&#39;,&#39;" . $desti . "&#39;,&#39;" . $totalpagescount . "&#39;,&#39;" . $cabin1 . "&#39;)'>" . $pgno . " </li>";
}
?>
</ul>
<script>
    var lod_mul_ti = "";
    var lod_mul_ti1 = '<br><ul class="loading-box"> 	<li> 		<div class="loading"></div> 	</li> 	<li> 		<div class="loading"><div class="shape1" style="height: 10px; left: 0; top: 45px; width: 100%;"></div></div> 	</li> 	<li> 		<div class="loading"><div class="shape1"></div><div class="shape2"></div><div class="shape3"></div></div> 	</li> 	<li> 		 		<div class="loading"></div> 	</li> 	<li> 		<div class="loading"><div class="shape1"></div><div class="shape2"></div><div class="shape3"></div></div> 	</li> 	<li> 		<div class="loading"><div class="shape2" style="height: 10px;top: 30px;width: 100%;left: 0;"></div><div class="shape3" style="left: 0; bottom: 28px; width: 100%; height: 10px;"></div></div> 	</li> </ul>  ';

    for (cvb = 0; cvb < 20; cvb++) {
        lod_mul_ti += lod_mul_ti1;
    }
    function next_page(x, y, z, b, l, cabin) {

        var i = 1;
        for (i = 1; i <= l; i++) {
            $('#' + i).removeAttr('class');
            $('#' + i).attr('class', 'page-item page-link');
        }
        $("#all_results").html(lod_mul_ti);
        jQuery.ajax({
            type: "POST",
            url: pageurl + "users/pagedata",
            dataType: 'html',
            data: {id: x, origin: z, destination: b, page: y, cabin: cabin},
            success: function (res) {
                $("#all_results").html(res);
                $('#1').removeAttr('class');
                $('#1').attr('class', 'page-item page-link');
                $('#' + y).removeAttr('class');
                $('#' + y).attr('class', 'page-item active page-link');
                topFunction();
            }
        });
    }
</script>
<script>
    function topFunction() {
        document.body.scrollTop = 10;
        document.documentElement.scrollTop = 10;
    }
</script>