<?php

namespace Cake\Filesystem\File;

function dateDifference($date1, $date2) {
//    $date1 = strtotime($date1);
//    $date2 = strtotime($date2);
//    $hourFix = $minFix = 0;
//    $diff = abs($date1 - $date2);
//
//
//    $hour = $diff / (60 * 60); // in hour (1 day = 24 hour)
//    $hourFix = floor($hour);
//    $hourPen = $hour - $hourFix;
//    if ($hourPen > 0) {
//        $min = $hourPen * (60); // in hour (1 hour = 60 min)
//        $minFix = floor($min);
//        $minPen = $min - $minFix;
//    }
//
//    $str = "";
//
//    if ($hourFix > 0)
//        $str .= $hourFix . " h ";
//    if ($minFix > 0)
//        $str .= $minFix . " m ";
//
//    return $str;
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

$flightPrice = $this->request->session()->read('flightPrice');
?>
<?= $this->element('frontend/banner'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
    $(window).load(function () {
        $(".se-pre-con").fadeOut(70);
    });
</script>
<div class="se-pre-con"> 
    <div class="top-end">
        <?php echo $this->element('frontend/login-header'); ?>
        <div class="img-load-ing">
            <?php
            $destina_img_nm = strtoupper($fligh_det['destination']) . ".jpg";
            $destina_img_data = HTTP_ROOT . "img/destination/" . $destina_img_nm;

            if (file_exists("img/destination/" . $destina_img_nm)) {
                $destina_img_data = HTTP_ROOT . "img/destination/" . $destina_img_nm;
            } else {
                $destina_img_data = $this->Url->image('LIS.jpg');
            }
            ?>
            <img style="border-radius: 104px; width: 170px; height: 170px; margin-bottom: 40px;" src="<?= $destina_img_data; ?>" alt="">
            <center>
                <span style="font-size: 2em; color:#000;">
                    <?php echo __('Please wait! We are finalizing your order to') ?>  <b><?= $this->User->cityHelper($fligh_det['destination'])->city; ?></b> (<?= $fligh_det['destination'] ?>) </span>
            </center>
        </div> 
    </div> 
    <div class="se-pre-img"></div> 
    <div class="top-last" style="color: #000;text-align:  center; font-weight: bold;">

        <span style="font-size: 2em; color:#000;"><?= __(date("D, d M", strtotime(str_replace(',', ' ', $fligh_det['start_depart_time'])))); ?> <?php if (!empty($fligh_det['return_arrival_time'])) { ?>- <?= __(date("D, d M", strtotime(str_replace(',', ' ', $fligh_det['return_arrival_time'])))); ?> <?php } ?></span>
        <br>      
        <span style="font-size: 20px; color:#000;"><?php echo $fligh_det['passengers'];
                    echo ($fligh_det['passengers'] > 1) ? " Passenges" : " Passenger"; ?></span>

    </div>

</div>

<section id="cta-faq" data-slides='["<?php echo HTTP_ROOT ?>img/flight-thank-you-order.jpg"]'>
    <div class="bg-overlay"></div>

    <?php echo $this->element('frontend/header'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="main-cta-faq text-center">
                    <h1><?php echo __('Thank you for your order.'); ?></h1>
                    <h3><?php echo __('Order ID:') . $pay_idd; ?></h3>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-1 text-center">
                <a href="#faq-qna" class="flight-click-faq hvr-sink"><img src="<?php echo HTTP_ROOT ?>img/flight_continue.png" /></a>
            </div>
        </div>

    </div>

</section>

<div class="space"></div>
<?php
$jor_st_cn = -1;
$jor_ed_cn = -1;
foreach ($full_det as $resut) {

    if ($resut->jor_typ == "Journey Details Start") {
        $jor_st_cn++;
    }
    if ($resut->jor_typ == "Journey Details Return") {
        $jor_ed_cn++;
    }
}
?>
<section id="search-results-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="pp-contentnonscrol" style="padding-top: 49px;margin-bottom: 62px;">
                    <p><?php echo __('Your order has been successfully booked! In order for us to proceed with the issuance of the ticket, you must make the payment using the bank reference associated with your order.'); ?><br/><br/><?php echo __('Please check if there is an email in the inbox, spam or trash of your email address'); ?> "<b><?php echo __('Pending Order'); ?></b>".<br/><br/> <?php echo __('In this email we give you the instructions to make the payment by way of an ATM or using the online banking of your bank. Thank you in advance for your choice and we wish you a pleasant journey.'); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Results -->
            <div class="col-sm-12 col-md-8 col-lg-12">

                <div class="searchItem_2 d-flex">

                    <div class="details desktop">

                        <table class="line line-1">
                            <tbody><tr>
                                    <td>
                                        <?php
                                        $img_s = $fligh_det->start_d_airline_name . ".png";
                                        if (file_exists("img/flaglogos/" . $img_s)) {
                                            $img_dat = HTTP_ROOT . "img/flaglogos/" . $img_s;
                                        } else {
                                            $img_dat = $this->Url->image('icone-1.gif');
                                        }
                                        ?>
                                        <img src="<?= $img_dat; ?>" alt="" width="80">
                                    </td>
                                    <td class="d-none d-lg-block">
                                        <p class="Airlines"><?php echo isset($cnt[$fligh_det->start_d_airline_name]) ? $cnt[$fligh_det->start_d_airline_name] : $fligh_det->start_d_airline_name; ?> <br><?= $fligh_det->start_d_airline_name; ?>-<?= $fligh_det->start_d_airline_num; ?></p>
                                    </td>
                                    <td>
                                        <p class="time"><?= date_format($fligh_det->start_depart_time, 'h:i A'); ?><br><span><?= date("M d, D", strtotime($this->Time->format($fligh_det->start_depart_time, 'Y-MM-d'))); ?></span></p>

                                    </td>
                                    <td rowspan="2">
                                        <!--<div class="departArrivale">
                                            <span>LAX</span><span>IST</span>
                                        </div>-->
                                        <p class="rangeTime"><span class="hours"><?= dateDifference($fligh_det->start_arrival_time, $fligh_det->start_depart_time); ?></span></p>
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
                                        <p class="time time-3"><?= date_format($fligh_det->start_arrival_time, 'h:i A'); ?> <br><span><?= date("M d, D", strtotime($this->Time->format($fligh_det->start_arrival_time, 'Y-MM-d'))); ?></span></p>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <!--<img src="img/icone-2.gif" alt="">-->
                                    </td>
                                    <td class="d-none d-lg-block">

                                        <!--   <p class="Airlines">American Airlines <br>BA-3271</p>-->
                                    </td>
                                    <td class="time-mobile-3">
                                        <p class="departure"><?= $this->User->cityHelper($cabin['origin'])->city . ' (' . $cabin['origin'] . ')'; ?></p>
                                    </td>

                                    <td>
                                        <p class="departure"><?= $this->User->cityHelper($cabin['destination'])->city . ' (' . $cabin['destination'] . ')'; ?></p>
                                    </td>

                                </tr>
                            </tbody></table>
<?php if (!empty($fligh_det->return_arrival_time)) { ?>
                            <hr>
                            <table class="line line-2">
                                <tbody><tr>
                                        <td>
    <?php
    $img_r = $fligh_det->return_d_airline_name . ".png";
    if (file_exists("img/flaglogos/" . $img_r)) {
        $img_datr = HTTP_ROOT . "img/flaglogos/" . $img_r;
    } else {
        $img_datr = $this->Url->image('icone-1.gif');
    }
    ?>
                                            <img src="<?= $img_datr; ?>" alt="" width='80'>
                                        </td>
                                        <td class="d-none d-lg-block">
                                            <p class="Airlines"><?= isset($cnt[$fligh_det->return_d_airline_name]) ? $cnt[$fligh_det->return_d_airline_name] : $fligh_det->return_d_airline_name; ?> <br><?= $fligh_det->return_d_airline_name; ?>-<?= $fligh_det->return_d_airline_num; ?></p>
                                        </td>
                                        <td>
                                            <p class="time"><?= date_format($fligh_det->return_depart_time, 'h:i A'); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($fligh_det->return_depart_time, 'Y-MM-d'))); ?></span></p>

                                        </td>
                                        <td rowspan="2">
                                            <div class="departArrivale">
                                                <span><?= $cabin['destination']; ?></span><span><?= $cabin['origin']; ?></span>
                                            </div>
                                            <p class="rangeTime"><span class="hours"><?= dateDifference($fligh_det->return_arrival_time, $fligh_det->return_depart_time); ?></span></p>
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
                                        <td class="time-desktop-3">
                                            <p class="time time-3"><?= date_format($fligh_det->return_arrival_time, 'h:i A'); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($fligh_det->return_arrival_time, 'Y-MM-d'))); ?></span></p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <!--   <img src="img/icone-2.gif" alt="">-->
                                        </td>
                                        <td class="d-none d-lg-block">
                                            <!--  <p class="Airlines">American Airlines <br>BA-3271</p>-->
                                        </td>
                                        <td class="time-mobile-4">
                                            <p class="departure"><?= $this->User->cityHelper($cabin['destination'])->city . ' (' . $cabin['destination'] . ')'; ?></p>
                                        </td>

                                        <td>
                                            <p class="departure"><?= $this->User->cityHelper($cabin['origin'])->city . ' (' . $cabin['origin'] . ')'; ?></p>
                                        </td>

                                    </tr>
                                </tbody></table>
<?php } ?>
                    </div>


                    <div class="details mobile">
                        <table class="line">
                            <tbody><tr>
                                    <td>
                                        <img src="<?= $img_dat; ?>" alt="">
                                    </td>
                                    <td class="">
                                        <p class="time"><?= date_format($fligh_det->start_depart_time, 'h:i A'); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($fligh_det->start_depart_time, 'Y-MM-d'))); ?></span></p>
                                    </td>
                                    <td rowspan="2">
                                        <div class="departArrivale">
                                            <span><?= $cabin['origin']; ?></span><span><?= $cabin['destination']; ?></span>
                                        </div>
                                        <p class="rangeTime"><span class="hours"><?= dateDifference($fligh_det->start_arrival_time, $fligh_det->start_depart_time); ?></span></p>
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
                                        <!--  <img src="img/icone-2.gif" alt="">-->
                                    </td>
                                    <td class="">
                                        <p class="time"><?= date_format($fligh_det->start_arrival_time, 'h:i A'); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($fligh_det->start_arrival_time, 'Y-MM-d'))); ?></span></p>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
<?php if (!empty($fligh_det->return_arrival_time)) { ?>
                            <br>
                            <table class="line line-2">
                                <tr>
                                    <td>
                                        <img src="<?= $img_datr; ?>" alt="" style="width: 70px;">
                                    </td>
                                    <td class="">
                                        <p class="time"><?= date_format($fligh_det->return_depart_time, 'h:i A'); ?><br><span><?= date("M d, D", strtotime($this->Time->format($fligh_det->return_depart_time, 'Y-MM-d'))); ?></span></p>
                                    </td>
                                    <td rowspan="2">
                                        <div class="departArrivale">
                                            <span><?= $cabin['destination']; ?></span><span><?= $cabin['origin']; ?></span>
                                        </div>
                                        <p class="rangeTime"><span class="hours"><?= dateDifference($fligh_det->return_arrival_time, $fligh_det->return_depart_time); ?></span></p>
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
                                        <p class="time"><?= date_format($fligh_det->return_arrival_time, 'h:i A'); ?> <br><span><?= date("M d, D", strtotime($this->Time->format($fligh_det->return_arrival_time, 'Y-MM-d'))); ?></span></p>
                                    </td>

                                </tr>
                            </table>
<?php } ?>
                    </div>


                    <div class="bookBtn text-center">
                        <span>AOA <?= $this->User->changeFormat(number_format($flightPrice['total_peice'], 2)); ?></span>
                        <button href="#" data-toggle="modal" data-target="#flightDetailsModal" class="btn active" style="background: #f9d749;"><?php echo __('Pending Order Button'); ?></button>
                    </div>
                </div>


            </div>
            <!-- Results -->
        </div>
    </div>
</section>

<div class="space"></div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.min.css" />
<link rel="stylesheet" href="<?= $this->Url->css('nouislider_custom.css'); ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js" integrity="sha256-HT7c4lBipI1Hkl/uvUrU1HQx4WF3oQnSafPjgR9Cn8A=" crossorigin="anonymous"></script>


<script src="<?= $this->Url->script('noUi.js'); ?>"></script>
<style>
    .pricebreakdown-2 {
        margin-bottom: 51px;
        width: 29.2%;
        background-color: #fff;
        border-bottom: 1px solid #eeeeee;
        border-radius: 6px;
        min-height: 20px;
        margin-top: -1952px;
        margin-left: 791px;
        height: 232px;
    }
    .form-control {
        margin-top: 0px !important;
    }
</style>
<script src="<?= $this->Url->script('number.js'); ?>" type="text/javascript"></script>
<script>
    $('#num_res').html(<?= $res_found; ?>);

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