<?php

namespace Cake\Filesystem\File;

function dateDifference($date1, $date2) {
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
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.min.css" />
<link rel="stylesheet" href="<?= $this->Url->css('nouislider_custom.css'); ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js" integrity="sha256-HT7c4lBipI1Hkl/uvUrU1HQx4WF3oQnSafPjgR9Cn8A=" crossorigin="anonymous"></script>


<script src="<?= $this->Url->script('noUi.js'); ?>"></script>

<style>
    .pricebreakdown {
        margin-bottom: 51px;
        width: 63.2%;
        background-color: rgb(255, 255, 255);
        min-height: 20px;
        margin-top: 47px;
        margin-left: 406px;
        border-bottom: 1px solid rgb(238, 238, 238);
        border-radius: 6px;
    }
    .btn-book:hover {
        background-color: #f9d749;
        color: #000;
        text-decoration: none;
        line-height: inherit !important;
        padding: 7px 0 !important;
        width: 95px !important;
    }
    .btn-book {
        line-height: inherit !important;
        padding: 7px 0 !important;
        width: 95px !important;
    }
</style>
<?php
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

<div class="se-pre-con"> 
    <div class="top-end">
        <?php echo $this->element('frontend/login-header'); ?>
        <div class="img-load-ing">
            <?php
            $destina_img_nm = strtoupper($ubd['destination']) . ".jpg";
            $destina_img_data = HTTP_ROOT . "img/destination/" . $destina_img_nm;

            if (file_exists("img/destination/" . $destina_img_nm)) {
                $destina_img_data = HTTP_ROOT . "img/destination/" . $destina_img_nm;
            } else {
                $destina_img_data = $this->Url->image('LIS.jpg');
            }
            ?>
            <img style="border-radius: 104px; width: 170px; height: 170px; margin-bottom: 40px;" src="<?= $destina_img_data; ?>" alt="">
            <center>
                <span style=" font-size: 2em;">
                    <?php echo __('Please wait, while we load your next trip') ?> <b><?= $this->User->cityHelper($ubd['origin'])->city; ?></b> (<?= $ubd['origin']; ?>) <?php echo __('to') ?> <b><?= $this->User->cityHelper($ubd['destination'])->city; ?></b> (<?= $ubd['destination'] ?>) </span>
            </center>
        </div> 
    </div> 
    <div class="se-pre-img"></div> 
    <div class="top-last" style="color: #7b7b7b;text-align:  center; font-weight: bold;">

        <span style="font-size: 2rem;"><?= __(date("D, d M", strtotime(str_replace(',', ' ', $ubd['start_depart_time'])))); ?> <?php if (!empty($ubd['return_arrival_time'])) { ?>- <?= __(date("D, d M", strtotime(str_replace(',', ' ', $ubd['return_arrival_time'])))); ?> <?php } ?></span>
        <br>      
        <span style="font-size: 20px;"><?php echo $ubd['passengers'];
                    echo ($ubd['passengers'] > 1) ? " Passenges" : " Passenger"; ?></span>

    </div>

</div>

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
                                <div class="destination-search-title"> <?= $this->User->cityHelper($ubd['origin'])->city; ?> - <?= $this->User->cityHelper($ubd['destination'])->city; ?></div>
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
                                    <div class="destination-search-title"> <?= $this->User->cityHelper($ubd['destination'])->city; ?> - <?= $this->User->cityHelper($ubd['origin'])->city; ?> </div>
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
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 desktop-change" data-toggle="collapse" data-target="#demo"> <a  id="showMobChange" class="btn btn-primary btn-change hvr-grow hidden-xs-one" ><?php echo __('Change') ?></a> </div>


            <div class="col-12 col-sm-12 col-lg-12 collapse hide" id="demo">
                <form action="<?php echo $this->Url->build(["controller" => "users", "action" => "ajaxSearchResult"]); ?>" method="get" autocomplete="off">
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
                                                if (isset($ubd['origin'])) {
                                                    echo $ubd['origin'];
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
                                                if (isset($ubd['destination'])) {
                                                    echo $ubd['destination'];
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
                                            ?>" id="departure_date" name="departure_date" autocomplete="off" onblur="myInput()">
                                            <img src="<?= $this->Url->image('icon/icon_3.png'); ?>" class="formIcon box3_img_h" >
                                            <img src="<?= $this->Url->image('icon/icon_3_y.png'); ?>" class="formIcon box3_img">


                                        </div>
                                    </div>
                                    <div class="col-md-3" id="return_date1"  <?php
                                         if (isset($cabin['radio']) && $cabin['radio'] == "One-Way Flight") {
                                             echo 'style="display:none;"';
                                         }
                                         ?>>
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
                                                        if (isset($cabin['cabin']) && $cabin['cabin'] == "Economy") {
                                                            echo "selected";
                                                        }
                                                        ?>><?php echo __('Economy') ?></option>
                                                <option value="Business" <?php
                                                        if (isset($cabin['cabin']) && $cabin['cabin'] == "Business") {
                                                            echo "selected";
                                                        }
                                                        ?>><?php echo __('Business') ?></option>
                                                <option value="First" <?php
                                                        if (isset($cabin['cabin']) && $cabin['cabin'] == "First") {
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
                                                    echo "1" . " Passenger";
                                                }
                                                ?></div>
                                            <input type="hidden" name="passenger" id="passenger" value="<?php
                                            if (isset($cabin['passenger'])) {
                                                echo $cabin['passenger'];
                                            } else {
                                                echo "1" . " Passenger";
                                            }
                                            ?>">
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
                </form>
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
<div class="space"></div>
<section id="search-results-body">
    <div class="container">
        <div class="row">
            <!-- Results -->
            <div class="col-sm-12 col-md-8 col-lg-12">
                <div class="container  bg-gris header-tab tab tab-results-mob">
                    <div class="d-table w-100 tab-title">
                        <div class="d-table-cell"><img src="<?= $this->Url->image('icon/departure.png'); ?>" width="30"> <?php echo __('Departing Flight') ?></div>
                        <div class="d-table-cell text-right p-right-10 sortby-label"><img src="https://static.thenounproject.com/png/5844-200.png" width="35"> <?= __($cabin['cabin']); ?></div>
                    </div>
                </div>

                <div class="searchItem d-flex">

                    <div class="details desktop">
                        <table class="line line-1">
                            <tbody><tr>
                                    <td>
                                        <?php
                                        $img_s = $ubd->start_d_airline_name . ".png";
                                        if (file_exists("img/flaglogos/" . $img_s)) {
                                            $img_dat = HTTP_ROOT . "img/flaglogos/" . $img_s;
                                        } else {
                                            $img_dat = $this->Url->image('icone-1.gif');
                                        }
                                        ?>
                                        <img src="<?= $img_dat; ?>" alt="" width="80">
                                    </td>
                                    <td class="d-none d-lg-block">
                                        <p class="Airlines"><?= $cnt[$ubd->start_d_airline_name]; ?> <br><?= $ubd->start_d_airline_name; ?>-<?= $ubd->start_d_airline_num; ?></p>
                                    </td>
                                    <td>
                                        <p class="time"><?= __(date_format($ubd->start_depart_time, 'h:i A')); ?> <br> <span><?= __(date("M d, D", strtotime($this->Time->format($ubd->start_depart_time, 'Y-MM-d')))); ?></span></p>

                                    </td>
                                    <td rowspan="2">
                                        <div class="departArrivale">
                                            <span><?= $ubd['origin']; ?></span><span><?= $ubd['destination']; ?></span>
                                        </div>
                                        <p class="rangeTime"><span class="hours"><?= dateDifference($ubd->start_arrival_time, $ubd->start_depart_time); ?></span></p>
                                        <div class="<?php
                                             if ($jor_st_cn <= 0) {
                                                 echo "Direct";
                                             } else {
                                                 echo $jor_st_cn;
                                             }
                                             ?> stopsRange" disabled></div>
                                        <p class="citationStops"><?php
                                            if ($jor_st_cn <= 0) {
                                                echo "Direct";
                                            } else {
                                                echo $jor_st_cn;
                                            }
                                            ?> <?php
                                            if ($jor_st_cn == 1) {
                                                echo "stop";
                                            }if ($jor_st_cn > 1) {
                                                echo "stops";
                                            }
                                            ?></p>
                                    </td>
                                    <td class="time-desktop-3">
                                        <p class="time time-3"><?= __(date_format($ubd->start_arrival_time, 'h:i A')); ?> <br> <span><?= __(date("M d, D", strtotime($this->Time->format($ubd->start_arrival_time, 'Y-MM-d')))); ?></span></p>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <!--   <img src="img/icone-2.gif" alt="">-->
                                    </td>
                                    <td class="d-none d-lg-block">

                                        <!--    <p class="Airlines">American Airlines <br>BA-3271</p>-->
                                    </td>
                                    <td class="time-mobile-3">
                                        <p class="departure"><?= $this->User->cityHelper($ubd['origin'])->city . ' (' . $ubd['origin'] . ')'; ?></p>
                                    </td>

                                    <td>
                                        <p class="Arrival"><?= $this->User->cityHelper($ubd['destination'])->city . ' (' . $ubd['destination'] . ')'; ?></p>
                                    </td>

                                </tr>
                            </tbody></table>


                    </div>


                    <div class="details mobile">
                        <table class="line">
                            <tbody><tr>
                                    <td>

                                        <img src="<?= $img_dat; ?>" alt="" width="70">
                                    </td>
                                    <td class="">
                                        <p class="time"><?= __(date_format($ubd->start_depart_time, 'h:i A')); ?> <br> <span><?= __(date("M d, D", strtotime($this->Time->format($ubd->start_depart_time, 'Y-MM-d')))); ?></span></p>
                                    </td>
                                    <td rowspan="2">
                                        <div class="departArrivale">
                                            <span><?= $ubd['origin']; ?></span><span><?= $ubd['destination']; ?></span>
                                        </div>
                                        <p class="rangeTime"><span class="hours"><?= dateDifference($ubd->start_arrival_time, $ubd->start_depart_time); ?></span></p>
                                        <div class="<?php
                                            if ($jor_st_cn <= 0) {
                                                echo "Direct";
                                            } else {
                                                echo $jor_st_cn;
                                            }
                                            ?> stopsRange" disabled></div>
                                        <p class="citationStops"><?php
                                            if ($jor_st_cn <= 0) {
                                                echo "Direct";
                                            } else {
                                                echo $jor_st_cn;
                                            }
                                            ?> <?php
                                            if ($jor_st_cn == 1) {
                                                echo "stop";
                                            }if ($jor_st_cn > 1) {
                                                echo "stops";
                                            }
                                            ?></p>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                            <!--   <img src="img/icone-2.gif" alt="">-->
                                    </td>
                                    <td class="">
                                        <p class="time"><?= __(date_format($ubd->start_arrival_time, 'h:i A')); ?> <br> <span><?= __(date("M d, D", strtotime($this->Time->format($ubd->start_arrival_time, 'Y-MM-d')))); ?></span></p>
                                    </td>

                                </tr>
                            </tbody></table>
                    </div>


                    <div class="bookBtn text-center">
                        <span>AOA <?= $price1; ?></span>

                    </div>
                </div>

                <br>
                <br>

                                        <?php if (!empty($ubd->return_d_airline_name)) { ?>
                    <div class="container  bg-gris header-tab tab tab-results-mob">
                        <div class="d-table w-100 tab-title">
                            <div class="d-table-cell"><img src="<?= $this->Url->image('icon/return.png'); ?>" width="30"> <?php echo __('Return Flight') ?></div>
                            <div class="d-table-cell text-right p-right-10 sortby-label"><img src="https://static.thenounproject.com/png/5844-200.png" width="35"> <?= __($cabin['cabin']); ?></div>
                        </div>
                    </div>

                    <div class="searchItem d-flex">

                        <div class="details desktop">
                            <table class="line line-1">
                                <tbody><tr>
                                        <td>
    <?php
    $img_r = $ubd->return_d_airline_name . ".png";
    if (file_exists("img/flaglogos/" . $img_r)) {
        $img_datr = HTTP_ROOT . "img/flaglogos/" . $img_r;
    } else {
        $img_datr = $this->Url->image('icone-1.gif');
    }
    ?>
                                            <img src="<?= $img_datr; ?>" alt="" width="80">
                                        </td>
                                        <td class="d-none d-lg-block">
                                            <p class="Airlines"><?= $cnt[$ubd->return_d_airline_name]; ?> <br><?= $ubd->return_d_airline_name; ?>-<?= $ubd->return_d_airline_num; ?></p>
                                        </td>
                                        <td>
                                            <p class="time"><?= __(date_format($ubd->return_depart_time, 'h:i A')); ?> <br> <span><?= __(date("M d, D", strtotime($this->Time->format($ubd->return_depart_time, 'Y-MM-d')))); ?></span></p>

                                        </td>
                                        <td rowspan="2">
                                            <div class="departArrivale">
                                                <span><?= $ubd['destination']; ?></span><span><?= $ubd['origin']; ?></span>
                                            </div>
                                            <p class="rangeTime"><span class="hours"><?= dateDifference($ubd->return_arrival_time, $ubd->return_depart_time); ?></span></p>
                                            <div class="<?php
                                            if ($jor_ed_cn <= 0) {
                                                echo "Direct";
                                            } else {
                                                echo $jor_ed_cn;
                                            }
                                            ?> stopsRange" disabled></div>
                                            <p class="citationStops"><?php
                                            if ($jor_ed_cn <= 0) {
                                                echo "Direct";
                                            } else {
                                                echo $jor_ed_cn;
                                            }
                                            ?> <?php
                                            if ($jor_ed_cn == 1) {
                                                echo "stop";
                                            }if ($jor_ed_cn > 1) {
                                                echo "stops";
                                            }
                                            ?></p>
                                        </td>
                                        <td class="time-desktop-3">
                                            <p class="time time-3"><?= __(date_format($ubd->return_arrival_time, 'h:i A')); ?> <br> <span><?= __(date("M d, D", strtotime($this->Time->format($ubd->return_arrival_time, 'Y-MM-d')))); ?></span></p>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>
                                            <!--    <img src="img/icone-2.gif" alt="">-->
                                        </td>
                                        <td class="d-none d-lg-block">

                                                <!-- <p class="Airlines">American Airlines <br>BA-3271</p>-->
                                        </td>
                                        <td class="time-mobile-3">
                                            <p class="departure"><?= $this->User->cityHelper($ubd['destination'])->city . ' (' . $ubd['destination'] . ')'; ?></p>
                                        </td>

                                        <td>
                                            <p class="Arrival"><?= $this->User->cityHelper($ubd['origin'])->city . ' (' . $ubd['origin'] . ')'; ?></p>
                                        </td>

                                    </tr>
                                </tbody></table>


                        </div>


                        <div class="details mobile">
                            <table class="line">
                                <tbody><tr>
                                        <td>
                                            <img src="<?= $img_datr; ?>" alt="" width="70">
                                        </td>
                                        <td class="">
                                            <p class="time"><?= date_format($ubd->return_depart_time, 'h:i A'); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($ubd->return_depart_time, 'Y-MM-d'))); ?></span></p>
                                        </td>
                                        <td rowspan="2">
                                            <div class="departArrivale">
                                                <span><?= $ubd['destination']; ?></span><span><?= $ubd['origin']; ?></span>
                                            </div>
                                            <p class="rangeTime"><span class="hours"><?= dateDifference($ubd->return_arrival_time, $ubd->return_depart_time); ?></span></p>
                                            <div class="<?php
                                            if ($jor_ed_cn <= 0) {
                                                echo "Direct";
                                            } else {
                                                echo $jor_ed_cn;
                                            }
                                            ?> stopsRange" disabled></div>
                                            <p class="citationStops"><?php
                                            if ($jor_ed_cn <= 0) {
                                                echo "Direct";
                                            } else {
                                                echo $jor_ed_cn;
                                            }
                                            ?> <?php
                                            if ($jor_ed_cn == 1) {
                                                echo "stop";
                                            }if ($jor_ed_cn > 1) {
                                                echo "stops";
                                            }
                                            ?></p>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                         <!--   <img src="img/icone-2.gif" alt="">-->
                                        </td>
                                        <td class="">
                                            <p class="time"><?= date_format($ubd->return_arrival_time, 'h:i A'); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($ubd->return_arrival_time, 'Y-MM-d'))); ?></span></p>
                                        </td>

                                    </tr>
                                </tbody></table>
                        </div>


                        <div class="bookBtn text-center">
                            <span>AOA <?= $price1; ?></span>

                        </div>


                    </div>

                                    <?php } ?>					


                <div class="pricebreakdown">
                    <div class="container bg-gris header-tab tab tab-results-mob">
                        <div class="d-table w-100 tab-title">
                            <div class="d-table-cell"><i class="fas fa-receipt"></i> <?php echo __('Price Break-Down') ?></div>
                            <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> <?= explode(" ", $cabin['passenger'])[0] . " "; ?><?= (explode(" ", $cabin['passenger'])[0] > 1) ? "Passengers" : "Passenger"; ?></div>
                        </div>
                    </div>
                    <br>
                    <table style="margin-left: 27px;width: 645px;margin-top: -15px;">

                        <tbody>
                            <tr style="
                                ">
                                <td style="width: 560px;border-bottom: 1px solid #eeeeee;text-transform: uppercase;font-weight:bold;padding-bottom: 10px;"><?php echo __('PRICE PER PERSON') ?></td>
                                <td style="width: 575px;border-bottom: 1px solid #eeeeee;text-transform: uppercase;font-weight:bold;"></td>
                                <td style="width: 1253px;border-bottom: 1px solid #eeeeee;text-transform: uppercase;font-weight:bold;"></td>
                                <td style="width: 253px;border-bottom: 1px solid #eeeeee;text-transform: uppercase;">AOA <?= $priceperperson = $mainprice; ?></td>
                            </tr>
                            <tr style="">
                                <td style="width: 566px;border-top: 1px solid #eeeeee;border-bottom: 1px solid #eeeeee;text-transform: uppercase;font-weight:bold;padding-top: 10px;padding-bottom: 10px;"><?php echo __('SERVICE FEE') ?></td>
                                <td style="width: 566px;border-top: 1px solid #eeeeee;border-bottom: 1px solid #eeeeee; text-transform: uppercase;font-weight:bold;"></td>
                                <td style="width: 566px;border-top: 1px solid #eeeeee;border-bottom: 1px solid #eeeeee; text-transform: uppercase;font-weight:bold;"></td>
                                <td style="width: 566px;border-top: 1px solid #eeeeee;border-bottom: 1px solid #eeeeee; text-transform: uppercase;">AOA <?php 
                    if ($this->User->cityHelper($ubd['origin'])->country == "Angola" && $this->User->cityHelper($ubd['destination'])->country == "Angola") {
                        echo $service_fee = $servicefee->domestic *$ubd['passengers'];
                    } else {
                        echo $service_fee = $servicefee->international * $ubd['passengers'];
                    }
                    ?></td>
                            </tr>
                            <tr>
                                <td style="width: 566px;border-top: 1px solid #eeeeee;border-bottom: 1px solid #eeeeee;text-transform: uppercase;font-weight:bold;padding-top: 10px;padding-bottom: 10px;"><?php echo __('TOTAL') ?></td>
                                <td style="width: 566px;border-top: 1px solid #eeeeee;border-bottom: 1px solid #eeeeee; text-transform: uppercase;font-weight:bold;"></td>
                                <td style="width: 566px;border-top: 1px solid #eeeeee;border-bottom: 1px solid #eeeeee; text-transform: uppercase;font-weight:bold;"></td>
                                <td style="width: 566px;border-top: 1px solid #eeeeee;border-bottom: 1px solid #eeeeee; text-transform: uppercase;">AOA <?php
                            if ($this->User->cityHelper($ubd['origin'])->country == "Angola" && $this->User->cityHelper($ubd['destination'])->country == "Angola") {
                                echo $total_peice = ($servicefee->domestic * $ubd['passengers']) + ($mainprice *  $ubd['passengers']);
                            } else {
                                echo $total_peice = ($servicefee->international *  $ubd['passengers'])+ ($mainprice * $ubd['passengers']);
                            }
                            ?></td>
                            </tr>
                        </tbody>
                    </table>
<?php
$flightPrice = array('priceperperson' => $priceperperson
    , 'service_fee' => $service_fee
    , 'total_peice' => $total_peice);
$this->request->session()->write('flightPrice', $flightPrice);
// print_r($flightPrice);
//echo $total_peice ."<br>".$service_fee."<br>".$priceperperson ;
?>
                    <div class="col-sm-12 d-none d-sm-block" style="margin: -10px 0px 31px 16px;">
                        <a data-toggle='modal' data-target='#shareiteneraryModal' class="btn btn-primary btn-continue m-top-50"><?php echo __('Share Itenerary') ?> </a>
                    </div>


                    <div class="col-sm-12 d-none d-sm-block" style="margin: -129px 0px 22px 478px;">
                        <a <?php
if (empty($this->request->getSession()->read('Auth.User.id'))) {
    echo "data-toggle='modal' data-target='#loginModal'";
} else {
    echo 'href="' . HTTP_ROOT . 'route-review/' . $flight_view_id . '"';
}
?>   class="btn btn-primary btn-continue m-top-50"><?php echo __('Continue') ?></a>
                    </div>
                </div>
                <!-- Results -->
            </div>

        </div>
    </div>
</section>
<!-- Share Itenerary Modal -->
<div class="modal fade bd-example-modal-lg" id="shareiteneraryModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                </span>
            </button>

            <!-- Title -->
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title">Share Itenerary</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class="col-sm-12 col-md-6 col-lg-12">
                                <div class="row">
                                    <div class="col-sm-6 ">
                                        <div class="form-group">
                                            <label for="">Your Name</label>
                                            <input id="user_name" type="text" class="form-control" placeholder="Enter Your Name" value="<?php
if (!empty($this->request->getSession()->read('Auth.User.id'))) {
    echo $this->User->usrdetHelper($this->request->getSession()->read('Auth.User.id'))->first_name . " " . $this->User->usrdetHelper($this->request->getSession()->read('Auth.User.id'))->sur_name;
}
?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Email Address</label>
                                            <input id="user_email" placeholder="Enter Email Address" type="text" class="form-control" value="<?php
if (!empty($this->request->getSession()->read('Auth.User.id'))) {
    echo $this->User->usrHelper($this->request->getSession()->read('Auth.User.id'))->email;
}
?>">
                                            <small id="err" class="text-danger"></small>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="">Your Message</label>
                                            <textarea id="user_msg" placeholder="Type your message here..." type="text" class="form-control" style="height: 100px;"></textarea>
                                        </div>
                                    </div>
                                    <p style="margin: 0px 16px;color: #b4b4c8;"><span style="color: #000;">Note:</span> To share these flights with friends and family, enter their email addresses below. Note that your email address will be included in the email we send them.</p>
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Recipient 1</label>
                                    <input id="user_rec1" placeholder="Recipient 1" type="text" class="form-control">
                                    <small id="err1" class="text-danger"></small>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="">Recipient 2</label>
                                    <input id="user_rec2" placeholder="Recipient 2" type="text" class="form-control">
                                    <small id="err2" class="text-danger"></small>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn_continue" data-dismiss="modal" style="margin: 0px 483px;">Cancel</button>
                    <button type="button" id="ShareItenerary" onclick="return shareitt()" class="btn btn-default btn_continue" style="margin-top: 0px;" ><?=__("Submit");?></button>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
    function exchangeinp() {
        var origin = $('#origin').val().toUpperCase();
        var destination = $('#destination').val().toUpperCase();
        var temp = $('#origin').val().toUpperCase();
        $('#origin').val(destination);
        $('#destination').val(temp);
    }
    function shareitt() {
        var user_name = $('#user_name').val();
        var user_email = $('#user_email').val();

        var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);

        if (pattern.test(user_email) == false) {
            $('#err').show();
            $('#err').html("Enter a valid Email address.");
            return false;
        } else {
            $('#err').hide();
        }
        var user_msg = $('#user_msg').val();
        var user_rec1 = $('#user_rec1').val();
        if (pattern.test(user_rec1) == false) {
            $('#err1').show();
            $('#err1').html("Enter a valid Email address.");
            return false;
        } else {
            $('#err1').hide();
        }
        var user_rec2 = $('#user_rec2').val();


        jQuery.ajax({
            type: "POST",
            url: pageurl + "users/ShareItenerary",
            dataType: 'json',
            data: {user_name: user_name, user_email: user_email, user_msg: user_msg, user_rec1: user_rec1, user_rec2: user_rec2, ref_id:<?= $flight_view_id; ?>},
            success: function (res) {
                $('.close').click();
                $('#fdfdf').click();
                $('#user_msg').val("");
                $('#user_rec1').val("");
                $('#user_rec2').val("");

            }
        });


    }
</script>
<span id="fdfdf" data-toggle='modal' data-target='#sharesuccess' style="display: none;"> </span>
<div id="sharesuccess" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>				
                <h4 class="modal-title"><?= __('Your itinerary has been shared!');?></h4>	
            </div>
            <div class="modal-body">
                <p class="text-center"><?= __("We're happy you found a flight that interests you. Because prices may change, the best way to secure your fare is to book your flight right now."); ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal" style="width: auto;"><?= __("Continue with your booking");?></button>
            </div>
        </div>
    </div>
</div> 

<?= $this->element('frontend/inner-footer'); ?>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js" integrity="sha256-oQ1+24/TB/RpvqqnWnJeS9riShuGf1vHlg8B4lyZ2OE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js" integrity="sha256-oQ1+24/TB/RpvqqnWnJeS9riShuGf1vHlg8B4lyZ2OE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="js/slideshow.js"></script>
<script src="js/jquery.waterwheelCarousel.min.js"></script>

<script>



    $(document).ready(function () {
        $('select').niceSelect();


        $("#filtersShowleft").click(function () {
            //alert('yes');
            //document.getElementById("mySidenav").style.width = "250px";
            $("#mySidenav").css({"width": "100%", "left": "0"});
        });

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
    function closeNav() {
        //document.getElementById("mySidenav").style.width = "0";
        $("#mySidenav").css({"width": "0", "left": "-60px"});
    }
</script>

<script>
    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>

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

<script>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
//paste this code under head tag or in a seperate js file.
// Wait for window load
    $(window).load(function () {
        $(".se-pre-con").fadeOut('slow');
        ;
    });
</script>