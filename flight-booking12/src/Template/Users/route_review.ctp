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
    //echo $diff;exit;
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

$mainprice = explode("GBP", $ubd->price)[1];
if ($cabin['radio'] == "One-Way Flight") {
    $price1 = explode("GBP", $ubd->price)[1];
}
if ($cabin['radio'] == "Return Trip") {
    $price1 = explode("GBP", $ubd->price)[1] / 2;
}
?>
<style>
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: #fff;
        /*	//background: url(<?= $this->Url->image('icon/icon_4.png'); ?>) center no-repeat #fff;*/
    }
    .se-pre-img{
        width: 100%;
        height: 10%;
        z-index: 9999;
        background: url(<?= $this->Url->image('flight-loader.gif'); ?>) center no-repeat #fff;
        float: left;
    }

    .top-end, .top-last{
        width: 100%;
        height: 45%;
        z-index: 9999;  
        background-color:#fff;
        text-align: center;
    }
    .img-load-ing{ float: left; width: 100%; padding-top: 6%;}
</style>

<!--    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {        
        $(".se-pre-con").hide();
    });
  </script>
  
    <script>  
   $('#form_id').submit(function() {
       alert("hh");
       $(".se-pre-con").show();
});
</script>-->



<section id="header-section" class="main-yellow-bg">


    <?php echo $this->element('frontend/login-header'); ?>

    <div id="searchBox"></div>
    <div class="container">
        <div class="row justify-content-between booking-selected booking-selected-padding hidden-xs-one">
            <div class="col-sm-4 col-md-5 col-lg-4">
                <div class="row no-gutters destination-search-left-infos">
                    <div class="m-right-25"> <img src="<?= $this->Url->image('flight_top_yellow.png'); ?>"> </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col">
                                <div class="destination-search-title"> <?= $this->User->cityHelper($fligh_det['origin'])->city; ?> - <?= $this->User->cityHelper($fligh_det['destination'])->city; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="destination-search-subtitle"> <?= date("M d, D", strtotime($this->Time->format($cabin['departure_date'], 'Y-MM-d'))); ?> -
                                    <?php
                                    if (isset($cabin['passenger'])) {
                                        $psn = explode(" ", $cabin['passenger'])[0];
                                        if ($psn > 1) {
                                            echo $psn . " PASSENGERS";
                                        } else {
                                            echo $psn . " PASSENGER";
                                        }
                                    } else {
                                        echo "0 PASSENGER";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($cabin['radio'] != "One-Way Flight") { ?>
                <div class=" col-sm-4 col-md-5 col-lg-4  ">
                    <div class="row no-gutters destination-search-left-infos">
                        <div class="m-right-25"> <img src="<?= $this->Url->image('flight_bottom_yellow.png'); ?>"> </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col">
                                    <div class="destination-search-title"> <?= $this->User->cityHelper($fligh_det['destination'])->city; ?> - <?= $this->User->cityHelper($fligh_det['origin'])->city; ?> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="destination-search-subtitle"> <?= date("M d, D", strtotime($this->Time->format($cabin['return_date'], 'Y-MM-d'))); ?> - <?php
                if (isset($cabin['passenger'])) {
                    $psn = explode(" ", $cabin['passenger'])[0];
                    if ($psn > 1) {
                        echo $psn . " PASSENGERS";
                    } else {
                        echo $psn . " PASSENGER";
                    }
                } else {
                    echo "0 PASSENGER";
                }
                ?>  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 desktop-change" data-toggle="collapse" data-target="#demo"> <a id="showMobChange" class="btn btn-primary btn-change hvr-grow hidden-xs-one" >Change</a> </div>


            <div class="col-12 col-sm-12 col-lg-12 collapse hide" id="demo">

                <?= $this->Form->create(null, ['type' => 'get', 'url' => '/search', 'autocomplete' => "off", 'id' => 'form_id']); ?>
                <div class="inner_Form">
                    <div class="row">
                        <div class="form-row align-items-center search-form p-top-12">
                            <div class="">
                                <label class="container-radio fligtRetr"><?php echo __('Return') ?>
                                    <input type="radio" value="Return Trip"  name="radio" <?php
                if (isset($cabin['radio']) && $cabin['radio'] == "Return Trip") {
                    echo 'checked="checked"';
                }
                ?> > <span class="checkmark"  ></span>
                                </label>
                            </div>
                            <div class="">
                                <label class="container-radio fligtRetr"><?php echo __('One-Way') ?>
                                    <input type="radio" value="One-Way Flight" name="radio" <?php
                                    if (isset($cabin['radio']) && $cabin['radio'] == "One-Way Flight") {
                                        echo 'checked="checked"';
                                    }
                ?>> <span class="checkmark" ></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 no-padding routTopForm">
                            <div class="row align-items-center search-form p-top-12">
                                <div class="col-md-3" id="A3">
                                    <div class="search-display">
                                        <div class="form-group">
                                            <label><?php echo __('Origin') ?>:</label>
                                            <input type="text" class="form-control box1"  id="origin" name="origin" placeholder="<?php echo __('Origin') ?>" onkeyup="loc_data()" autocomplete="off" value="<?php
                                    if (isset($fligh_det['origin'])) {
                                        echo $fligh_det['origin'];
                                    }
                ?>">
                                            <img src="<?= $this->Url->image('icon/icon_1.png'); ?>" class="formIcon box1_img_h">
                                            <img src="<?= $this->Url->image('icon/icon_1_y.png'); ?>" class="formIcon box1_img">
                                        </div>
                                        <div id="display" style="display: none;"></div>
                                    </div>
                                </div>
                                <div class="col-md-3" id="A2">
                                    <div class="syncBoxMid hidden-xs" onclick="exchangeinp()"><i class="fas fa-exchange-alt"></i></div>
                                    <div class="search-display2">
                                        <div class="form-group">
                                            <label><?php echo __('Destination') ?>:</label>
                                            <input type="text" class="form-control box2" placeholder="<?php echo __('Destination') ?>" value="<?php
                                                   if (isset($fligh_det['destination'])) {
                                                       echo $fligh_det['destination'];
                                                   }
                ?>" id="destination" name="destination" onkeyup="loc_data2()" autocomplete="off" >
                                            <img src="<?= $this->Url->image('icon/icon_2.png'); ?>" class="formIcon box2_img_h">
                                            <img src="<?= $this->Url->image('icon/icon_2_y.png'); ?>" class="formIcon box2_img">
                                        </div>
                                        <div id="display2" style="display: none;"></div>
                                    </div>
                                </div>
                                <div class="col-md-3" id="A1">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label><?php echo __('Departure Date') ?>:</label>
                                        <input type="text" data-language="en" class="datepicker-here form-control box3" placeholder="<?php echo __('Departure Date') ?>" value="<?php
                                                   if (isset($cabin['departure_date'])) {
                                                       echo $cabin['departure_date']->format('d/m/Y');
                                                   }
                ?>" id="departure_date" name="departure_date" autocomplete="off"  onblur="myInput()">
                                        <img src="<?= $this->Url->image('icon/icon_3.png'); ?>" class="formIcon box3_img_h" >
                                        <img src="<?= $this->Url->image('icon/icon_3_y.png'); ?>" class="formIcon box3_img">


                                    </div>
                                </div>
                                <div class="col-md-3" id="return_date1"  <?php if (isset($cabin['radio']) && $cabin['radio'] == "One-Way Flight") {
                                                   echo 'style="display:none;"';
                                               } ?>>
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label><?php echo __('Return Date') ?>:</label>
                                        <input type="text" data-language="en" class="datepicker-here form-control box4" placeholder="<?php echo __('Return Date') ?>" value="<?php
                                        if (isset($cabin['return_date'])) {
                                            echo $cabin['return_date']->format('d/m/Y');
                                        }
                                        ?>" id="return_date" name="return_date" autocomplete="off">
                                        <img src="<?= $this->Url->image('icon/icon_4.png'); ?>" class="formIcon box4_img_h" >
                                        <img src="<?= $this->Url->image('icon/icon_4_y.png'); ?>" class="formIcon box4_img">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 no-padding">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo __('Cabin') ?></label>
                                        <select  id="cabin" name="cabin" class="form-control airlinehide box6">
                                            <option value="Economy" <?php
                                            if (isset($fligh_det['cabin']) && $fligh_det['cabin'] == "Economy") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('Economy') ?></option>
                                            <option value="Business" <?php
                                            if (isset($fligh_det['cabin']) && $fligh_det['cabin'] == "Business") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('Business') ?></option>
                                            <option value="First" <?php
                                            if (isset($fligh_det['cabin']) && $fligh_det['cabin'] == "First") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('First') ?></option>
                                        </select>
                                        <img src="<?= $this->Url->image('icon/icon_5.png'); ?>" class="formIcon box6_img_h" style="position: absolute;left: 19px;top: 41px;width: 26px;height: 26px;">
                                        <img src="<?= $this->Url->image('icon/icon_5_y.png'); ?>" class="formIcon box6_img" style="position: absolute;left: 19px;top: 41px;width: 26px;height: 26px;">
                                        <i class="fa fa-angle-down formIconArrow"></i>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label><?php echo __('Passengers') ?>:</label>
                                        <div class="form-control passenger-selector-toggle psngrsHow box5" data-id="1" style="margin-bottom: 0px;"><?php
                                            if (isset($cabin['passenger'])) {
                                                echo $cabin['passenger'];
                                            } else {
                                                echo "1 Passenger";
                                            }
                                            ?></div>
                                        <input type="hidden" name="passenger" id="passenger" value="<?php if (isset($cabin['passenger'])) {
                                                echo $cabin['passenger'];
                                            } else {
                                                echo "1 Passenger";
                                            } ?>">
                                        <img src="<?= $this->Url->image('icon/icon_6.png'); ?>" class="formIcon box5_img_h">
                                        <img src="<?= $this->Url->image('icon/icon_6_y.png'); ?>" class="formIcon box5_img">
                                        <i class="fa fa-angle-down formIconArrow"></i>
                                    </div>
                                    <div class="passenger-selector form-control audultSHow" style="padding-left: 0px!important;">
                                        <div style="padding: 10px">
                                            <div style="float: left">
                                                <label href=""><?php echo __('Adults') ?>(12+)</label>
                                            </div>
                                            <div class="rightPass" style="float: right">
                                                <div class="adult-add-counter leftAdd plusBtn" data-butn="1" onclick="showthis()" >
                                                    <a>
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                                <a style="margin: 0px 21px;background: #ffffff;color: #000;" id="adult-counter" class="counter">0</a>
                                                <div class="adult-decrease-counter rightAdd" onclick="showthis()">
                                                    <a>
                                                        <i class="fas fa-minus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="clear: both;"></div>
                                        </div>
                                        <div style="padding: 10px">
                                            <div style="float: left">
                                                <label><?php echo __('Children') ?>(2-11)</label>
                                            </div>
                                            <div class="rightPass" style="float: right">
                                                <div class="children-add-counter leftAdd" onclick="showthis()">
                                                    <a>
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                                <a style="margin: 0px 21px;background: #ffffff;color: #000;" id="children-counter" class="counter">0</a>
                                                <div class="children-decrease-counter rightAdd" onclick="showthis()">
                                                    <a>
                                                        <i class="fas fa-minus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="clear: both;"></div>
                                        </div>
                                        <div style="padding: 10px">
                                            <div style="float: left">
                                                <label><?php echo __('Infants') ?>( &lt;2) 
                                                </label>
                                            </div>
                                            <div class="rightPass" style="float: right">
                                                <div class="infant-add-counter leftAdd" onclick="showthis()">
                                                    <a>
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                                <a style="margin: 0px 21px;background: #ffffff;color: #000;" id="infant-counter" class="counter">0</a>
                                                <div  class="infant-decrease-counter rightAdd" onclick="showthis()">
                                                    <a>
                                                        <i class="fas fa-minus"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div style="clear: both;"></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <input type="hidden" name="page" value="1">
                                        <button type="submit" class="btn btn-primary hvr-grow btn-fill" onclick="return searchresult()"><?php echo __('Search') ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?= $this->Form->end(); ?>

            </div>
        </div>
    </div>

    <div class="space"></div>
</section>

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
            <!-- Results -->
            <div class="col-sm-12 col-md-8 col-lg-8">

                <div class="container bg-gris header-tab tab tab-results-mob">
                    <div class="d-table w-100 tab-title left-boxed">
                        <div class="d-table-cell" style="margin-left: -17px;"><i class="fas fa-map-marker-alt"></i> <?php echo __('Your flight to') ?> <?php echo __($this->User->cityHelper($fligh_det['destination'])->city) ?> <?php echo __('begins here') ?></div>
                    </div>
                    <div class="econo">
                        <img src="<?= $this->Url->image('icon/5844-200.png'); ?>">
                        <h5><?= __($fligh_det['cabin']); ?></h5>
                    </div>
                </div>

                <div class="searchItem-new d-flex">

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
                                        <p class="time"><?= __(date_format($fligh_det->start_depart_time, 'h:i A')); ?><br><span><?= __(date("M d, D", strtotime($this->Time->format($fligh_det->start_depart_time, 'Y-MM-d')))); ?></span></p>

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
                                        <p class="time time-3"><?= __(date_format($fligh_det->start_arrival_time, 'h:i A')); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($fligh_det->start_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                        <p class="departure"><?= $this->User->cityHelper($fligh_det['origin'])->city . ' (' . $fligh_det['origin'] . ')'; ?></p>
                                    </td>

                                    <td>
                                        <p class="departure"><?= $this->User->cityHelper($fligh_det['destination'])->city . ' (' . $fligh_det['destination'] . ')'; ?></p>
                                    </td>

                                </tr>
                            </tbody></table>
<?php if (!empty($fligh_det->return_d_airline_name)) { ?>
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
                                            <p class="time"><?= __(date_format($fligh_det->return_depart_time, 'h:i A')); ?> <br> <span><?= __(date("M d, D", strtotime($this->Time->format($fligh_det->return_depart_time, 'Y-MM-d')))); ?></span></p>

                                        </td>
                                        <td rowspan="2">
                                            <div class="departArrivale">
                                                <span><?= $fligh_det['destination']; ?></span><span><?= $fligh_det['origin']; ?></span>
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
                                            <p class="time time-3"><?= __(date_format($fligh_det->return_arrival_time, 'h:i A')); ?> <br> <span><?= __(date("M d, D", strtotime($this->Time->format($fligh_det->return_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                            <p class="departure"><?= $this->User->cityHelper($fligh_det['destination'])->city . ' (' . $fligh_det['destination'] . ')'; ?></p>
                                        </td>

                                        <td>
                                            <p class="departure"><?= $this->User->cityHelper($fligh_det['origin'])->city . ' (' . $fligh_det['origin'] . ')'; ?></p>
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
                                        <p class="time"><?= __(date_format($fligh_det->start_depart_time, 'h:i A')); ?> <br> <span><?= __(date("M d, D", strtotime($this->Time->format($fligh_det->start_depart_time, 'Y-MM-d')))); ?></span></p>
                                    </td>
                                    <td rowspan="2">
                                        <div class="departArrivale">
                                            <span><?= $fligh_det['origin']; ?></span><span><?= $fligh_det['destination']; ?></span>
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
                                        <p class="time"><?= __(date_format($fligh_det->start_arrival_time, 'h:i A')); ?> <br> <span><?= __(date("M d, D", strtotime($this->Time->format($fligh_det->start_arrival_time, 'Y-MM-d')))); ?></span></p>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
<?php if (!empty($fligh_det->return_d_airline_name)) { ?>
                            <br>
                            <table class="line line-2">
                                <tr>
                                    <td>
                                        <img src="<?= $img_datr; ?>" alt="" style="width: 70px;">
                                    </td>
                                    <td class="">
                                        <p class="time"><?= __(date_format($fligh_det->return_depart_time, 'h:i A')); ?><br><span><?= date("M d, D", strtotime($this->Time->format($fligh_det->return_depart_time, 'Y-MM-d'))); ?></span></p>
                                    </td>
                                    <td rowspan="2">
                                        <div class="departArrivale">
                                            <span><?= $fligh_det['destination']; ?></span><span><?= $fligh_det['origin']; ?></span>
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
                                        <p class="time"><?= __(date_format($fligh_det->return_arrival_time, 'h:i A')); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($fligh_det->return_arrival_time, 'Y-MM-d')))); ?></span></p>
                                    </td>

                                </tr>
                            </table>
<?php } ?>
                    </div>


                    <div class="bookBtn text-center">
                        <span><?= $mainprice; ?> AOA</span>
                    </div>
                </div>


            </div>
            <!-- Results -->
        </div>


        <br>
        <br>
<?= $this->Form->create(null, ['url' => ['action' => 'thank-you/' . $id], 'id' => 'myForm']); ?>	
        <input type="hidden" name="passengercount" value="<?= $psn; ?>">
        <div class="row">
<?php for ($contr = 1; $contr <= $psn; $contr++) { ?>	
                <div class="adult">
                    <div class="container bg-gris header-tab tab tab-results-mob">
                        <div class="d-table w-100 tab-title">
                            <div class="d-table-cell" style="margin-left: -17px;"><i class="fas fa-male"></i> <?php echo __('Passenger') ?> <?= $contr; ?></div>
                        </div>
                    </div>

                    <div class="form-row align-items-center search-form p-top-12-new">
                        <div class="">
                            <label class="container-radio fligtRetr"><?php echo __('Male'); ?>
                                <input type="radio" checked="checked" value="Male" name="<?= $contr - 1; ?>['radio']"> <span class="checkmark"></span> 
                            </label>
                        </div>
                        <div class="">
                            <label class="container-radio fligtRetr"><?php echo __('Female'); ?>
                                <input type="radio" value="Female" name="<?= $contr - 1; ?>['radio']"> <span class="checkmark"></span> 
                            </label>
                        </div>
                    </div>
                    <div class="adult-form">
                        <div class="row">

                            <div class="col-sm-6 ">
                                <div class="form-group">
                                    <label for=""><?php echo __('First Name'); ?></label>
                                    <input type="text" class="form-control" placeholder="Enter First Name" required="required" name="<?= $contr - 1; ?>['firstname']">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""><?php echo __('Last Name'); ?></label>
                                    <input placeholder="Enter Last Name" type="text" class="form-control" required="required" name="<?= $contr - 1; ?>['lastname']">
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""><?php echo __('Date of Birth'); ?></label>
                                    <input type="text" data-language="en" class="datepicker-here form-control box4" placeholder="DOB" style="padding: 9px 35px !important;" name="<?= $contr - 1; ?>['dob']" required="required">
                                    <img src="<?= $this->Url->image('icon/icon_7.png'); ?>" class="formIcon box4_img_h">
                                    <img src="<?= $this->Url->image('icon/icon_7_y.png'); ?>" class="formIcon box4_img">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo __('Nationality'); ?></label>
                                    <input type="text" name="<?= $contr - 1; ?>['nationality']" class="form-control" placeholder="Nationality">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo __('Document Type'); ?></label>
                                    <select class="form-control" name="<?= $contr - 1; ?>['doctyp']" id="<?= $contr - 1; ?>doctyp" onchange='idPass("<?= $contr - 1; ?>")' required>

                                        <option value="" disabled selected>Select</option>
                                        <option value="Passport"><?php echo __('Passport'); ?></option>
                                        <option value="ID Card"><?php echo __('ID Card'); ?></option>
                                    </select>
                                    <i class="fa fa-angle-down formIconArrow"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id='<?= $contr - 1; ?>passIssediv' style='display: none;'>
                                    <label id='<?= $contr - 1; ?>passIsselable'></label>
                                    <input type="text" name="<?= $contr - 1; ?>['passportcountry']" class="form-control" id='<?= $contr - 1; ?>pass'>
                                </div>
                            </div>
                            <div class="col-md-6" id='<?= $contr - 1; ?>passnumdiv' style='display: none;'>
                                <div class="form-group">
                                    <label id='<?= $contr - 1; ?>passnumlab'></label>
                                    <input type="text" name="<?= $contr - 1; ?>['passportnumber']" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6" id='<?= $contr - 1; ?>passexpdiv' style='display: none;'> 
                                <div class="form-group">
                                    <label id='<?= $contr - 1; ?>passexplable'></label>
                                    <input type="text" name="<?= $contr - 1; ?>['passportexpdate']" class="form-control" >
                                </div>
                            </div>




                        </div> 
                    </div>


                    <h3 class="title  m-20"><i class="fas fa-suitcase"></i> <?php echo __('Luggage'); ?></h3>
    <?php
    if ($this->User->cityHelper($fligh_det['origin'])->country == "Angola" && $this->User->cityHelper($fligh_det['destination'])->country == "Angola") {
        $fli_typ = "Domestic Flights";
    } else {
        $fli_typ = "International Flights";
    }
    $lugInfo = $this->User->luggageInfo($fligh_det->start_d_airline_name, $fli_typ, $fligh_det['cabin']);
    ?>
                    <div class="information">
                        <table>
                            <tbody><tr>
                                    <td width="33%">
                                        <p><?= !empty($lugInfo->no_of_hand_bag) ? $lugInfo->no_of_hand_bag : "0"; ?> <?php echo __('Hand Luggage') ?></p>
                                    </td>
                                    <td width="45%">
                                        <p><?= !empty($lugInfo->allowed_hand_bag_weight) ? $lugInfo->allowed_hand_bag_weight : "0"; ?> kg</p>
                                    </td>
                                    <td>
                                        <p><?php echo __('Free') ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><?= !empty($lugInfo->no_of_bag) ? $lugInfo->no_of_bag : "0"; ?> <?php echo __('Checked-In Luggage') ?></p>
                                    </td>
                                    <td>
                                        <p><?= !empty($lugInfo->allowed_weight) ? $lugInfo->allowed_weight : "0"; ?> kg</p>
                                    </td>
                                    <td>
                                        <p><?php echo __('Free') ?></p>
                                    </td>
                                </tr>

                            </tbody></table>
                    </div>

                </div>
<?php } ?>		
            <br>
            <br>


            <div class="confirmation">
                <div class="container bg-gris header-tab tab tab-results-mob">
                    <div class="d-table w-100 tab-title">
                        <div class="d-table-cell" style="margin-left: -17px;"><i class="fas fa-info-circle"></i> <?php echo __('Your contact info') ?></div>
                    </div>
                </div>
                <div class="adult-form">
                    <div class="row">
                        <div class="col-sm-12 col-md-7">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><?php echo __('Email Address'); ?></label> <span id='emlerr'></span>
                                        <input type="text" class="form-control" id="email" name="email" required="required" placeholder="Enter Email Address" value="<?php if (!empty($this->request->getSession()->read('Auth.User.id'))) {
    echo $this->User->usrHelper($this->request->getSession()->read('Auth.User.id'))->email;
} ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for=""><?php echo __('Email Address'); ?></label> <span id='conemlerr'></span>
                                    <input placeholder="<?php echo __('Enter Email Address'); ?>" type="text" required="required" id="confirmemail" name="confirmemail" class="form-control" value="<?php if (!empty($this->request->getSession()->read('Auth.User.id'))) {
    echo $this->User->usrHelper($this->request->getSession()->read('Auth.User.id'))->email;
} ?>">
                                </div>
<?php if (empty($this->request->getSession()->read('Auth.User.id'))) { ?>
                                    <script>
                                        $(document).on("submit", "form#myForm", function (e) {
                                            var mmr = "";
                                            var eml = $('#email').val();
                                            var coneml = $('#confirmemail').val();
                                            var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
                                            if (pattern.test(eml) == false) {
                                                $('#emlerr').show();
                                                $('#emlerr').attr('style', 'color:red');
                                                $('#emlerr').html("Enter a valid Email address.");
                                                e.preventDefault();
                                            } else if (pattern.test(eml) == true) {
                                                //
                                                if (eml != coneml) {
                                                    $('#conemlerr').show();
                                                    $('#conemlerr').attr('style', 'color:red');
                                                    $('#conemlerr').html("Email address and Confirm Email address is not matching.");
                                                    e.preventDefault();
                                                    return  false;
                                                } else {
                                                    $('#conemlerr').hide();
                                                    jQuery.ajax({
                                                        type: "POST",
                                                        url: "<?= HTTP_ROOT; ?>" + "users/emailvalidate",
                                                        dataType: 'json',
                                                        data: {email: eml},
                                                        success: function (res) {

                                                            if (res.status == "error") {
                                                                $('#email').focus();
                                                                $('#emlerr').show();
                                                                $('#emlerr').removeAttr('style');
                                                                $('#emlerr').attr('style', 'color:red;');
                                                                $('#emlerr').html(res.message);

                                                                e.preventDefault();
                                                                return  false;
                                                            } else if (res.status == "success") {
                                                                $('#emlerr').show();
                                                                $('#emlerr').removeAttr('style');
                                                                $('#emlerr').attr('style', 'color:green;');
                                                                $('#emlerr').html(res.message);
                                                                document.forms["myForm"].submit();
                                                            }
                                                        }
                                                    });


                                                }

                                                $('#emlerr').hide();
                                                e.preventDefault();

                                            }

                                        });

                                    </script>
<?php } ?>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><?php echo __('Country'); ?></label>
                                        <input type="text" class="form-control" disabled="" value="<?php if (!empty($this->request->getSession()->read('Auth.User.id'))) {
    echo $this->User->usrdetHelper($this->request->getSession()->read('Auth.User.id'))->country;
} else {
    echo 'Angola';
} ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo __('Province'); ?></label>
                                        <select id="input_reason" class="form-control airlinehide box6" name="location" required="required">
<?php if (!empty($this->request->getSession()->read('Auth.User.id'))) {
    echo '<option value="' . $this->User->usrdetHelper($this->request->getSession()->read('Auth.User.id'))->province . '">' . $this->User->usrdetHelper($this->request->getSession()->read('Auth.User.id'))->province . '</option>';
} ?>
                                            <option value="" disabled ><?php echo __('Choose Location'); ?></option>
                                            <option value="Luanda"><?php echo __('Luanda'); ?></option>
                                            <option value="Benguela"><?php echo __('Benguela'); ?></option>
                                        </select>
                                        <img src="<?= $this->Url->image('icon/icon_8.png'); ?>" class="formIcon box6_img_h" style="position: absolute;left: 19px;top: 47px;width: 21px;height: 21px;">
                                        <img src="<?= $this->Url->image('icon/icon_8_y.png'); ?>" class="formIcon box6_img" style="position: absolute;left: 19px;top: 47px;width: 21px;height: 21px;">
                                        <i class="fa fa-angle-down formIconArrow"></i>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for=""><?php echo __('Phone Number'); ?></label>
                                    <input placeholder="Enter Phone Number" required="required" maxlength="10" type="number" name="phonenumber" class="form-control" value="<?php if (!empty($this->request->getSession()->read('Auth.User.id'))) {
                                    echo $this->User->usrdetHelper($this->request->getSession()->read('Auth.User.id'))->phone_number;
                                } ?>">
                                </div>

                            </div>
                        </div>                          
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="container bg-gris header-tab tab tab-results-mob">
                    <div class="d-table w-100 tab-title">
                        <div class="d-table-cell" style="margin-left: -17px;"><i class="far fa-money-bill-alt"></i> <?php echo __('How would you like to pay?') ?></div>
                    </div>
                </div>
                <ul class="cardTipe">
                    <li><img src="<?= $this->Url->image('multicaixa.png'); ?>" alt=""></li>
                </ul>
                <!--					<div class="col-sm-12 d-none d-sm-block" style="margin: -46px 0px 31px 16px;">
                                                            <button  class="btn btn-primary btn-continue m-top-50"><?php echo __('Continue') ?></button>
                                            </div>-->
            </div>


            <div class="pricebreakdown-2">
                <div class="container bg-gris header-tab tab tab-results-mob">
                    <div class="d-table w-100 tab-title">
                        <div class="d-table-cell" style="
                             width: 645px;
                             "><i class="fas fa-receipt"></i> <?php echo __('Your Order'); ?></div>
                        <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x<?= $psn; ?></div>
                    </div>
                </div>
                <br>
                <table style="margin-left: 27px;width: 283px;margin-top: -15px;">

                    <tbody>

                        <tr>
                            <td style="width: 680px;border-bottom: 1px solid #eeeeee;text-transform: uppercase;font-weight:bold;padding-bottom: 10px;"><?php echo __('Your Order') ?></td>
                            <td style="width: 401px;border-bottom: 1px solid #eeeeee;text-transform: uppercase;"><?= $priceperperson = $mainprice; ?> AOA</td>
                        </tr>
                        <tr>
                            <td style="width: 752px;border-bottom: 1px solid #eeeeee;text-transform: uppercase;font-weight:bold;padding-top: 10px;padding-bottom: 10px;"><?php echo __('SERVICE FEE') ?></td>
                            <td style="width: 244px;border-bottom: 1px solid #eeeeee;text-transform: uppercase;">
<?php
if ($this->User->cityHelper($fligh_det['origin'])->country == "Angola" && $this->User->cityHelper($fligh_det['destination'])->country == "Angola") {
    echo $service_fee = $servicefee->domestic * explode(" ", $cabin['passenger'])[0];
} else {
    echo $service_fee = $servicefee->international * explode(" ", $cabin['passenger'])[0];
}
?> AOA</td>
                        </tr>
                        <tr>
                            <td style="width: 752px;border-bottom: 1px solid #eeeeee;text-transform: uppercase;font-weight:bold;padding-top: 10px;padding-bottom: 10px;"><?php echo __('TOTAL') ?></td>
                            <td style="width: 244px;border-bottom: 1px solid #eeeeee;text-transform: uppercase;"><?php
if ($this->User->cityHelper($fligh_det['origin'])->country == "Angola" && $this->User->cityHelper($fligh_det['destination'])->country == "Angola") {
    echo $total_peice = ($servicefee->domestic * explode(" ", $cabin['passenger'])[0]) + ($mainprice * explode(" ", $cabin['passenger'])[0]);
} else {
    echo $total_peice = ($servicefee->international * explode(" ", $cabin['passenger'])[0]) + ($mainprice * explode(" ", $cabin['passenger'])[0]);
}
?> AOA</td>
                        </tr>
                        <tr>
                            <td>
                                <div  style="float:right;margin-top: 10px;position: relative;left: 20px;">
                                    <button type="submit"  class="btn btn-primary btn-continue"><?php echo __('Continue') ?></button>
                                </div>
                            </td><td></td>
                        </tr>


                    </tbody>
                </table>
            </div>

        </div>
<?= $this->Form->end(); ?>	
    </div>
</section>
<?php
$flightPrice = array('priceperperson' => $priceperperson
    , 'service_fee' => $service_fee
    , 'total_peice' => $total_peice
    , 'passenger' => explode(" ", $cabin['passenger'])[0]);
$this->request->session()->write('flightPrice', $flightPrice);
// print_r($flightPrice);
//echo $total_peice ."<br>".$service_fee."<br>".$priceperperson ;
?>

<?= $this->element('frontend/footer'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.min.css" />
<link rel="stylesheet" href="<?= $this->Url->css('nouislider_custom.css'); ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js" integrity="sha256-HT7c4lBipI1Hkl/uvUrU1HQx4WF3oQnSafPjgR9Cn8A=" crossorigin="anonymous"></script>


<script src="<?= $this->Url->script('noUi.js'); ?>"></script>
<style>
    /**.pricebreakdown-2 {
        margin-bottom: 51px;
        width: 29.2%;
        background-color: #fff;
        border-bottom: 1px solid #eeeeee;
        border-radius: 6px;
        min-height: 20px;
        margin-top: -1952px;
        margin-left: 791px;
        height: 333px;
    }***/
    .pricebreakdown-2 {
        margin-bottom: 0;
        width: 28.2%;
        background-color: #fff;
        border-bottom: 1px solid #eeeeee;
        border-radius: 6px;
        min-height: 20px;
        margin-top: 0;
        margin-left: 0;
        height: 333px;
        float: right;
        position: absolute;
        right: 14px;
        top: 28px;
    }
    .form-control {
        margin-top: 0px !important;
    }
    #search-results-body .container{ position: relative;}
</style>
<script src="<?= $this->Url->script('number.js'); ?>" type="text/javascript"></script>
<script>
                                    function exchangeinp() {
                                        var origin = $('#origin').val().toUpperCase();
                                        var destination = $('#destination').val().toUpperCase();
                                        var temp = $('#origin').val().toUpperCase();
                                        $('#origin').val(destination);
                                        $('#destination').val(temp);
                                    }
                                    $("input[name='radio']").click(function () {
                                        var data = $("input[name='radio']:checked").val();
                                        if (data == "Return Trip") {
                                            $('#return_date1').removeAttr("style");
                                            $('#A1').removeAttr("class");
                                            $('#A2').removeAttr("class");
                                            $('#A3').removeAttr("class");
                                            $('#A1').attr("class", "col-md-3");
                                            $('#A2').attr("class", "col-md-3");
                                            $('#A3').attr("class", "col-md-3");
                                        } else if (data == "One-Way Flight") {
                                            $('#return_date1').removeAttr("style");
                                            $('#return_date1').attr("style", "display:none");
                                            $('#A1').removeAttr("class");
                                            $('#A2').removeAttr("class");
                                            $('#A3').removeAttr("class");
                                            $('#A1').attr("class", "col-md-4");
                                            $('#A2').attr("class", "col-md-4");
                                            $('#A3').attr("class", "col-md-4");
                                        }
                                    });
                                    function searchresult() {
                                        var origin = $('#origin').val().toUpperCase();
                                        var destination = $('#destination').val().toUpperCase();
                                        var departure_date = $('#departure_date').val();
                                        var return_date = $('#return_date').val();
                                        var cabin = $("#cabin option:selected").text().trim();
                                        var passenger = $(".psngrsHow").text();
                                        $("#passenger").val(passenger);
                                        var data = $("input[name='radio']:checked").val();
                                        if (data == "Return Trip") {

                                        } else if (data == "One-Way Flight") {

                                        }
                                    }


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

<script>
    $(document).ready(function () {
        $('#origin').click(function () {
            $("#display2").hide();
            return false;
        });
        $('#destination').click(function () {
            $("#display").hide();
            return false;
        });

    });

    function loc_data() {
        $val = $('#origin').val();
        $pos = "origin";
        $hid = "display";
        if ($val == "") {
            $("#display").html("");
        } else {
            jQuery.ajax({
                type: "POST",
                url: pageurl + "users/ajax_locations",
                dataType: 'html',
                data: {origin: $val, pos: $pos, hid: $hid},
                success: function (res) {
                    $("#display").html(res).show();
                }
            });
        }
    }

    function loc_data2() {
        $val = $('#destination').val();
        $pos = "destination";
        $hid = "display2";
        if ($val == "") {
            $("#display2").html("");
        } else {
            jQuery.ajax({
                type: "POST",
                url: pageurl + "users/ajax_locations",
                dataType: 'html',
                data: {origin: $val, pos: $pos, hid: $hid},
                success: function (res) {
                    $("#display2").html(res).show();
                }
            });
        }
    }

    function fill(Value, Pos, Hid) {
        $('#' + Pos).val(Value);
        $('#' + Hid).hide();
        if (Hid == "display") {
            $("#destination").focus();
        }
    }
    function hidefill(Hid) {
        $('#' + Hid).hide();
    }

    function myInput() {
        if ($('#departure_date').val() != "") {
            $("#return_date").focus();
        }

    }
</script>
<script>
    function idPass(x) {  
        if($( "#"+x+"doctyp option:selected" ).val() == "Passport"){
            $( "#"+x+"passIssediv" ).hide();
            $( "#"+x+"passnumdiv" ).hide();
            $( "#"+x+"passexpdiv" ).hide();
            $( "#"+x+"passIsselable" ).html("<?=__('Passport Issue Country');?>");
            $( "#"+x+"passnumlab" ).html("<?=__('Passport Number');?>");
            $( "#"+x+"passexplable" ).html("<?=__('Passport Expiry Date');?>");
            $( "#"+x+"passIssediv" ).show();
            $( "#"+x+"passnumdiv" ).show();
            $( "#"+x+"passexpdiv" ).show();
        }
        if($( "#"+x+"doctyp option:selected" ).val() == "ID Card"){
            $( "#"+x+"passIssediv" ).hide();
            $( "#"+x+"passnumdiv" ).hide();
            $( "#"+x+"passexpdiv" ).hide();
            $( "#"+x+"passIsselable" ).html("<?=__('ID Card Issue Country');?>");
            $( "#"+x+"passnumlab" ).html("<?=__('ID Card Number');?>");
            $( "#"+x+"passexplable" ).html("<?=__('ID Card Expiry Date');?>");
            $( "#"+x+"passIssediv" ).show();
            $( "#"+x+"passnumdiv" ).show();
            $( "#"+x+"passexpdiv" ).show();
        }
        
    }
</script>