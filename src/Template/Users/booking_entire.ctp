<?php

function dateGap($date1, $date2) {
    $date1 = date_create($date1);
    $date2 = date_create($date2);
    $diff = date_diff($date1, $date2);
    return $diff->format("%a");
}

$dategap = dateGap(str_replace('/', '-', @$_GET['hotel_check_in']), str_replace('/', '-', @$_GET['hotel_check_out']));
?>
<style>
    footer {
        background-color: #404156;
        position: relative;
        width: 100%;
        float: left;
    }
    .datepickers-container {
        z-index: 11111;
    }
    ul.list {
        height: 200px !important;
        overflow-y: scroll !important;
    }

</style>
<div class="se-pre-con">
    <div class="top-end">
        <?php echo $this->element('frontend/login-header'); ?>
        <div class="img-load-ing">
            <img style="border-radius: 104px; width: 170px; height: 170px; margin-bottom: 40px;" src="<?php if (!empty($this->User->mainImage($PrtDt->id))) { ?> <?= HTTP_ROOT . 'img/pro_pic/' . $this->User->mainImage($PrtDt->id); ?><? } elseif (!empty($PrtDt->photos[0]['url'])) { ?> <?= HTTP_ROOT . 'img/pro_pic/' . $PrtDt->photos[0]['url']; ?> <?php } else { ?><?= HTTP_ROOT; ?>img/hotel.png<?php } ?>" alt="">
            <center>
                <span style=" font-size: 2em; color:#000;">
                    <?php echo __('Please wait, while we prepare your stay at'); ?> <b><?= $PrtDt->description->propertyName; ?></b></span>
            </center>
        </div>
    </div>
    <div class="se-pre-img"></div>
    <div class="top-last" style="color: #000;text-align:center; font-weight:bold;">
        <span style="font-size: 2rem; color:#7b7b7b;">
            <?= __(date("D", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>,
            <?= __(date("d", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>
            <?= __(date("M", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>
            -
            <?= __(date("D", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>,
            <?= __(date("d", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>
            <?= __(date("M", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>
        </span>
        <br>
        <br>
        <span style="font-size: 20px; color:#000;">
            <?php echo __(@$_GET['rooms']); ?> <?php if ($_GET['rooms'] <= 1) { ?> <?php echo __('Room') ?> <?php } else { ?> <?php echo __('Rooms') ?> <?php } ?> - <?= __(@$_GET['adult'] + @$_GET['children']); ?> <?php if ($_GET['adult'] + @$_GET['children'] == 1) { ?> <?php echo __('Guest') ?> <?php } else { ?><?php echo __('Guests') ?><?php } ?></span>

    </div>
</div>

<style>
    .no-result{ padding-top: 15px;}
    .no-result {
        width: 100% !important;
    }
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
    #slider-handles {
        margin-top: 10px !important;
    }
    #ulli    {
        display:flex;
        list-style:none;
        padding-left: 0 !important;
    }
    #sndli{
        padding-left:170px;
    }
    .no-result{ float: left; width: 100%; text-align: center;}
    .no-found-logo {
        display: inline-block;
        border-radius: 100%;
    }
    .no-found-logo img {
        width: 160px;
        margin-top: 26px;
    }
    .no-result{ width: 74%;}
    .no-result h2{
        margin: 26px 0 15px;
        font-family: 'Montserrat', sans-serif;
        color: black;
        font-size: 21px;
    }
    .no-result p{
        font-weight: 300;
        font-size: 15px;
        font-family: 'Montserrat', sans-serif;
        color: #a8a8bc;
    }
    .no-result a{
        display: inline-block;
        background: #f9d749;
        padding: 15px 50px;
        font-size: 17px;
        color: #000;
        border-radius: 4px;
        margin: 10px 0 26px;
    }
    .no-result a:hover{
        background: #e0b500;
        text-decoration: none;
    }
    li.active{
        background-color:#f9d749;
    }
    .page-link {
        position: relative !important;
        padding: .5rem .75rem !important;
        margin-left: -1px !important;
        border-radius: 4px !important;
        line-height: 1.25 !important;
        color: #000 !important;
        background-color: #fff !important;
        border: 1px solid #eeeeee !important;
    }
    .page-link:hover {
        z-index: 2 !important;
        text-decoration: none !important;
        background-color: #e9ecef !important;
        border-color: #dee2e6 !important;
    }
    .pagination li.active {
        background-color: #f9d749 !important;
        border: 1px solid #f9d749 !important;
    }


    .close-g ul {
        background-color: #FFF;
    }
    .close-g ul li:hover {
        background: #fff9e1;
    }
    #hotel_loc_display {
        float: left;
        width: 98%;
        z-index: 1111;
        max-height: 180px;
        overflow-y: inherit;
        position: absolute;
    }
    #hotel_loc_display ul {
        padding-left: 0;
        width: 100%;
        float: left;
        max-height: 149px;
        overflow: auto;
        margin-bottom: 0;
        cursor: pointer;
    }
    #hotel_loc_display  ul li {
        width: 100% !important;
        float: left;
        text-align: left;
        display: inline-block;
        padding: 5px 8px;
        font-size: 13px;
        letter-spacing: 1px;
    }
    .hideClose {
        background: #efefef;
        z-index: 11;
        bottom: 0;
        padding: 7px 13px;
        text-align: right;
        border-top: 1px solid #ccc;
        float: left;
        width: 100%;
        box-shadow: none;
    }
    .hideClose a {
        display: inline-block;
        border: 1px solid #f8d748;
        padding: 3px 12px;
        border-radius: 3px;
        text-decoration: none;
        background: #f8d748;
        color:#000;
    }
    .hideClose a:hover{ color:#000; border: 1px solid #f8d748;}
    .search-display, .search-display2{
        float: left;
        width: 100%;

    }



    a.morelink {
        text-decoration:none;
        outline: none;
    }
    .morecontent span {
        display: none;
    }


</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
    $(window).load(function() {
        $(".se-pre-con").fadeOut(50);
    });
</script>
<link rel="stylesheet" href="<?= HTTP_ROOT . 'htls/hotel-listing.css'; ?>">
<link rel="stylesheet" href="<?= HTTP_ROOT . 'htls/custom.css'; ?>">
<link rel="stylesheet" href="<?= HTTP_ROOT . 'preview/preview.css'; ?>">




<section id="header-section" class="main-yellow-bg">


    <?php echo $this->element('frontend/login-header'); ?>

    <div class="container">
        <div class="row justify-content-between booking-selected booking-selected-padding hidden-xs-one" >
            <div class="col-sm-4 col-md-5 col-lg-4">
                <div class="row no-gutters destination-search-left-infos">
                    <div class="m-right-25"> <img src="<?= HTTP_ROOT; ?>img/hotel.png"> </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col">
                                <div class="destination-search-title"> <?php echo __($city) . ' - ' . __($country); ?> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="destination-search-subtitle">
                                    <?= __(date("D", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>,
                                    <?= __(date("d", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>
                                    <?= __(date("M", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>  -
                                    <?= @$_GET['adult'] + @$_GET['children']; ?>
                                    <?php if ($_GET['adult'] + @$_GET['children'] == 1) { ?> <?php echo __('Guest') ?> <?php } else { ?><?php echo __('Guests') ?><?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-sm-4 col-md-5 col-lg-4  ">
                <div class="row no-gutters destination-search-left-infos">
                    <div class="m-right-25"> <img src="<?= HTTP_ROOT; ?>img/hotel.png"> </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col">
                                <div class="destination-search-title"> <?php echo __($city) . ' - ' . __($country); ?> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="destination-search-subtitle">
                                    <?= __(date("D", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>,
                                    <?= __(date("d", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>
                                    <?= __(date("M", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>
                                    -
                                    <?= @$_GET['adult'] + @$_GET['children']; ?>
                                    <?php if ($_GET['adult'] + @$_GET['children'] == 1) { ?> <?php echo __('Guest') ?> <?php } else { ?><?php echo __('Guests') ?><?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 desktop-change" data-toggle="collapse" data-target="#div-ho"> <a href="javascript:void(0)" id="showMobChange" class="btn btn-primary btn-change hvr-grow hidden-xs-one" ><?php echo __('Change') ?></a> </div>


            <div class="col-12 col-sm-12 col-lg-12 collapse" id='div-ho'>
                <?= $this->Form->create('', ['type' => 'get', 'url' => 'hotel-search-result', 'id' => 'hotelSearchForm']); ?>
                <div class="inner_Form">
                    <div class="row">

                        <div class="col-md-12 no-padding routTopForm">
                            <div class="row align-items-center search-form p-top-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><?php echo __('Location') ?>:</label>
                                        <input equired="" type="text" class="form-control box1" id="loc_from" name="from_location_name" placeholder="<?php echo __('Location'); ?>" onkeyup="hotel_loc_data()" autocomplete="off" value="<?= $_GET['from_location_name']; ?>"><input  type="hidden" name="state-name" id="state-name" value="<?= @$_GET['state-name']; ?>">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_10.png" class="formIcon box1_img_h">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_10_y.png" class="formIcon box1_img">


                                    </div>
                                    <div id="hotel_loc_display" style="display:none;">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label><?php echo __('Check in') ?>:</label>
                                        <input required="" type="text" data-language="en" class="datepicker-here form-control box3" placeholder="Check-in Date" id="hotel_check_in" name="hotel_check_in" autocomplete="off" onblur="mycheckindate()" value="<?= $_GET['hotel_check_in']; ?>">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_3.png" class="formIcon box3_img_h">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_3_y.png" class="formIcon box3_img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label><?php echo __('Check out') ?>:</label>
                                        <input type="text" data-language="en" class="datepicker-here form-control box4" placeholder="Check-out Date" id="hotel_check_out" name="hotel_check_out" autocomplete="off" onblur="checkWithCheckindate()" value="<?= $_GET['hotel_check_out']; ?>">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_4.png" class="formIcon box4_img_h">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_4_y.png" class="formIcon box4_img">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <style type="text/css">

                            .dsf {
                                width: 125px;
                                display: inline-block;
                                margin-right: 10px;
                            }
                            .dsf .label{ width: 100%; }
                            .dsf select {
                                opacity: 0;
                                width: 100%;
                                float: left;
                                position: absolute;
                            }
                            .nice-select .option:hover, .nice-select .option.focus, .nice-select .option.selected.focus {
                                background-color: #f9d749 !important;
                            }
                            .dsf .nice-select{
                                float: left;
                                width: 100%;
                            }
                            .dsf .nice-select span.current {
                                position: relative;
                                top: 8px;
                            }
                            .dsf .formIconSort {
                                position: relative;
                                right: 0;
                                left: 97px;
                                top: 34px;
                                z-index: 11;
                                color: #F9D749;
                                font-size: 18px!important;
                            }
                        </style>
                        <div class="col-md-12 no-padding">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group dsf" style="margin-bottom: 0px;">
                                        <div style="float: left;">
                                            <label href=""><?php echo __('Rooms') ?></label>
                                            <i class="fa fa-angle-down formIconSort"></i>
                                            <select name="rooms" id="rooms">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group dsf" style="margin-bottom: 0px;">
                                        <div style="float: left">
                                            <label href=""><?php echo __('Adults 12+') ?></label>
                                            <i class="fa fa-angle-down formIconSort"></i>
                                            <select name="adult" id="adult">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group dsf" style="margin-bottom: 0px;">
                                        <div style="float: left">
                                            <label href=""><?php echo __('Children (2-11)') ?></label>
                                            <i class="fa fa-angle-down formIconSort"></i>
                                            <select name="children" id="children">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="page" value="1">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button type="submit" id="htl_shc_btn" class="btn btn-primary hvr-grow btn-fill" disabled>Search</button>
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
    <div class="clear"></div>
</section>

<section class="aparthotel">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div style="margin-bottom: 24px;margin-top: 17px;"><span style="color: red;">2 <?= __("people are looking at this property"); ?>.</span> <span><?= __("Do not hesitate! Finish the booking of this room at this great price in"); ?> <b><?= __("2 minutes"); ?></b></span></div>
                <h2><?= $PrtDt->description->propertyName; ?></h2>
                <?php
                if (!empty($id)) {
                    $fstHotel = $this->User->getDataForEntiterProp($id);
                    $htl_rm_pric_frea = $this->User->get_featured_fee($id);
                }
                $guest = $_GET['adult'] + @$_GET['children'];
                $longDays = $this->User->longDays($id);
                $htl_fixrm_pric = $this->User->getHotelfixprice($id, $guest);
                //exit;
                //pj($fstHotel);

                if (!empty($id)) {
                    $htl_pri = $fstHotel->pricing->price_main;
                    if ($htl_rm_pric_frea > 0) {
                        $htl_pri = $fstHotel->pricing->price_main - ($fstHotel->pricing->price_main * ($htl_rm_pric_frea / 100));
                    }
                }
                $tt_tax = 0;
                if ($dategap >= $longDays && !empty($longDays)) {
                    $ttfee = @$_GET['rooms'] * ($htl_fixrm_pric * $dategap);
                } else {
                    $ttfee = @$_GET['rooms'] * ($htl_pri * $dategap);
                }

                $tt_cost = $ttfee + $tt_tax;
                ?>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="aparthotel-main">
                    <div class="aparthotel-left">
                        <div class="aparthotel-first">
                            <div class="aparthotel-left-img">
                                <img src="<?= HTTP_ROOT . 'img/pro_pic/' . $this->User->getHotelImage($id); ?>">
                            </div>
                            <div class="aparthotel-left-box">
                                <?php if (!empty($id)) { ?>
                                <?php } ?>
                            </div>
                        </div>




                        <div class="aparthotel-2nd">

                            <div class="row">
                                <ul>
                                    <li><div class="check-in-part"><?= __("Check-in Date"); ?>

                                            <span>
                                                <?= __(date("D", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>,
                                                <?= __(date("d", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>
                                                <?= __(date("M", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>

                                            </span>
                                        </div>
                                    </li>
                                    <li><div class="check-out-part"><?= __("Check-out Date"); ?>
                                            <span>
                                                <?= __(date("D", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>,
                                                <?= __(date("d", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>
                                                <?= __(date("M", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="your-stay-part"><?= __("Your Stay"); ?>
                                            <span>
                                                <?= $dategap; ?><?php if ($dategap > 1) { ?> <?php echo __('nights') ?> <?php } else { ?> <?php echo __('night') ?><?php } ?>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>



                        <div class="aparthotel-right aparthotel-full">
<!--                            <div class="aparthotel-right-box"><i class="fa fa-bell"></i><?= __("Only"); ?> <b><?= $Rm_counts = $this->User->restRoomCount($RmDet->id, @$_GET['rooms'], @$_GET['hotel_check_in'], @$_GET['hotel_check_out'])//->room_count;                                                                                                           ?> <?= ($Rm_counts > 1) ? __('rooms') : __('room'); ?></b> <?= __("left at this price!"); ?><?php ?></div>-->
                            <div class="aparthotel-right-box2">
                                <div class="bedroom-apartment">
                                    <div class="aparthotel-right-text "><p><?= __("&nbsp;"); ?></p><h6><?= '&nbsp;'; ?></h6></div>
                                    <div class="aparthotel-price-tag"><?php
                                        if (!empty($id)) {
                                            if ($dategap >= $longDays && !empty($longDays)) {
                                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2);
                                                } else {
                                                    echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2));
                                                }
                                            } else {
                                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_pri), 2);
                                                } else {
                                                    echo 'AOA' . $this->User->changeFormat(number_format($htl_pri, 2));
                                                }
                                            }



                                            //echo changeFormat(number_format($htl_pri, 2));
                                        }
                                        ?>
                                        <span><?= __("for"); ?> <?= __("night"); ?></span></div>
                                    <p><?= __("Includes:"); ?></p>
                                    <h6>

                                        <?php
//pj($aminity);
                                        $aminity = $this->User->propertyEntireAmenities($id);
                                        $aminityx = [];
                                        $geta = json_decode($aminity);
                                        $i = 1;

                                        if (count(json_decode($geta->Parking, true)) >= 1) {
                                            foreach (json_decode($geta->Parking) as $am_val1) {
                                                echo __($am_val1) . ', ';
                                            }
                                        }
                                        if (count(json_decode($geta->Services, true)) >= 1) {
                                            foreach (json_decode($geta->Services) as $am_val2) {
                                                echo __($am_val2) . ', ';
                                            }
                                        }
                                        if (count(json_decode($geta->Accessibility, true)) >= 1) {
                                            foreach (json_decode($geta->Accessibility) as $am_val3) {
                                                echo __($am_val3) . ', ';
                                            }
                                        }
                                        if (count(json_decode($geta->Facilities, true)) >= 1) {
                                            foreach (json_decode($geta->Facilities) as $am_val4) {
                                                echo __($am_val4) . ', ';
                                            }
                                        }
                                        if (count(json_decode($geta->Activities, true)) >= 1) {
                                            foreach (json_decode($geta->Activities) as $am_val5) {
                                                echo __($am_val5) . ', ';
                                            }
                                        }
                                        if (count(json_decode($geta->Food, true)) >= 1) {
                                            foreach (json_decode($geta->Food) as $am_val6) {
                                                echo __($am_val6) . ', ';
                                            }
                                        }
                                        if (count(json_decode($geta->Kitchen, true)) >= 1) {
                                            foreach (json_decode($geta->Kitchen) as $am_val7) {
                                                echo __($am_val7) . ', ';
                                            }
                                        }
                                        if (count(json_decode($geta->Media, true)) >= 1) {
                                            foreach (json_decode($geta->Media) as $am_val8) {
                                                echo __($am_val8) . ', ';
                                            }
                                        }
                                        if (count(json_decode($geta->Meetings, true)) >= 1) {
                                            foreach (json_decode($geta->Meetings) as $am_val9) {
                                                echo __($am_val9) . ', ';
                                            }
                                        }
                                        if (count(json_decode($geta->Essentials, true)) >= 1) {
                                            foreach (json_decode($geta->Essentials) as $am_val10) {
                                                echo __($am_val10) . ', ';
                                            }
                                        }
                                        if (count(json_decode($geta->Pools, true)) >= 1) {
                                            foreach (json_decode($geta->Pools) as $am_val11) {
                                                echo __($am_val11) . ',';
                                            }
                                        }
                                        ?>

                                    </h6>
                                    <p><?= __("Cancellation Policy"); ?>:</p>
                                    <h6><?= __($this->User->getCancelationEntireProperty($id)); ?></h6>
                                </div>
                                <div class="room-cost">
                                    <ul>
                                        <li><?= __("Price Per Night"); ?>  <span><?php
                                                if (!empty($htl_pri)) {

                                                    if ($dategap >= $longDays && !empty($longDays)) {
                                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2);
                                                        } else {
                                                            echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2));
                                                        }
                                                    } else {
                                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_pri), 2);
                                                        } else {
                                                            echo 'AOA ' . $this->User->changeFormat(number_format($htl_pri, 2));
                                                        }
                                                    }
                                                }
                                                ?></span></li>
                                        <li> <?= $dategap; ?> <?php if ($dategap > 1) { ?> <?= __("nights"); ?>  <?php
                                            } else {
                                                echo __("night");
                                            }
                                            ?>
                                            <span>
                                                <?php
                                                if ($dategap >= $longDays && !empty($longDays)) {
                                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dategap * $htl_fixrm_pric), 2);
                                                    } else {
                                                        echo 'AOA ' . $this->User->changeFormat(number_format($dategap * $htl_fixrm_pric, 2));
                                                    }
                                                } else {
                                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $ttfee), 2);
                                                    } else {
                                                        echo 'AOA ' . $this->User->changeFormat(number_format($ttfee, 2));
                                                    }
                                                }
                                                ?>
                                            </span></li>
                                    </ul>
                                </div>
                                <!--                            <div class="taxes-fees">
                                <?= __("Taxes & Fees"); ?>  <span><?php
                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $tt_tax), 2);
                                } else {
                                    echo 'AOA ' . $this->User->changeFormat(number_format($tt_tax, 2));
                                }
                                ?> AOA</span>
                                                            </div>-->
                                <div class="total-charges">
                                    <?= __("Total Price"); ?><span>
                                        <?php
                                        if ($dategap >= $longDays && !empty($longDays)) {
                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dategap * $htl_fixrm_pric), 2);
                                            } else {
                                                echo 'AOA ' . $this->User->changeFormat(number_format($dategap * $htl_fixrm_pric, 2));
                                            }
                                        } else {
                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $tt_cost), 2);
                                            } else {
                                                echo 'AOA ' . $this->User->changeFormat(number_format($tt_cost, 2));
                                            }
                                        }
                                        ?>

                                    </span>
                                </div>
                            </div>



                            <div class="aparthotel-best-price">
                                <?= __("Best Price."); ?> <span><?= __("GUARANTEED."); ?></span>
                            </div>
                        </div>



                        <?= $this->Form->create('', ['type' => 'post', 'id' => 'bookingformdetails']); ?>
                        <input type="hidden" id="room" name="num_rooms" value="<?= @$_GET['rooms']; ?>">

                        <div class="billing">
                            <div class="billing-header">
                                <div class="billing-header-text"><?= __("Where can we send your itinerary to?"); ?>
                                </div>
                                <?php if (empty($this->request->session()->read('Auth.User.id'))) { ?>
                                    <div class="billing-right" data-toggle="modal" data-target="#loginModal">
                                        <?= __("Login for faster booking"); ?>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="good-news">
                                <?= __("Good News!"); ?><span> <?= __("Keep going, youre almost done!"); ?></span>
                            </div>

                            <div class="Mobile-Phone-Number" style="margin: 3px 57px 0px 0px;text-align: left;">
                                <?= __("First Name"); ?>
                                <input type="text" id="fname" name="firstname" value="<?= !empty(@$this->request->session()->read('Auth.User.name')) ? explode(' ', @$this->request->session()->read('Auth.User.name'))[0] : ''; ?>" placeholder="<?= __("First Name"); ?>" required style="margin: 17px 0px;width: 112%;">
                            </div>
                            <div class="Mobile-Phone-Number">
                                <?= __("Last Name"); ?>
                                <input type="text" id="lname" name="lastname" value="<?= !empty(@$this->request->session()->read('Auth.User.name')) ? @explode(' ', @$this->request->session()->read('Auth.User.name'))[1] : ''; ?>"  placeholder="<?= __("Last Name"); ?>" required style="margin: 20px 0px;width: 120%;">
                            </div>

                            <div class="Mobile-Phone-Number" style="margin: 16px 226px -10px 2px;">
                                <?= __("Phone Number"); ?>
                                <input  type="text" id="zip" name="mobile" placeholder="+244 923 480 978" required style="margin: 39px -365px 0px 0px;width: 365px;">
                            </div>
                            <div class="email-Number">
                                <?= __("Email Address"); ?>
                                <input type="text" id="email" value="<?= @$this->request->session()->read('Auth.User.email'); ?>" name="email" placeholder="<?= __("Email Address"); ?>" required style="margin: 15px -363px 0px -1px;width: 223%;" >
                            </div>


                        </div>
                        <style>
                            .cardTipe li{
                                position: relative;
                            }
                            .cardTipe li img.check{
                                border-radius: 4px;
                                width: 20px;
                                position: absolute;
                                right: -16px;
                                top: 12px;
                                display: none;
                            }
                        </style>
                        <div class="Credit-Card">
                            <h4><?php echo __('How would you like to pay?') ?></h4>

                            <ul class="cardTipe">
                                <li style="width: 18%;" onclick="checkImg('proxypay', '#m_img1', '#m_img2, #m_img3, #m_img4');">
                                    <img class="check" id="m_img1" src="<?= $this->Url->image('yellow-check.png'); ?>" alt="" width="40" style="border-radius: 4px;">
                                    <img src="<?= $this->Url->image('multicaixa.png'); ?>" title="<?= __("Pay with MultiCaixa"); ?>" alt="" style="border-radius: 4px; width:144px;">
                                </li>
                                <?php if (($this->User->getCancelationEntireProperty($id) == 'Flexible')) { ?>

                                    <li style="width: 18%;" onclick="checkImg('pay-local', '#m_img2', '#m_img1, #m_img3, #m_img4');">
                                        <img class="check" id="m_img2"  src="<?= $this->Url->image('yellow-check.png'); ?>" alt="" width="40"  style="border-radius: 4px;">
                                        <img src="<?= $this->Url->image('pay-local.png'); ?>" title="<?= __("Pay at the Property"); ?>" alt="" style="border-radius: 4px; width:144px;">
                                    </li>
                                <?php } ?>
                                <!--<li style="width: 18%;" onclick="checkImg('paypal', '#m_img2', '#m_img1, #m_img3, #m_img4');">
                                    <img class="check" id="m_img2"  src="<?= $this->Url->image('yellow-check.png'); ?>" alt="" width="40"  style="border-radius: 4px;">
                                    <img src="<?= $this->Url->image('paypal.png'); ?>" alt="" style="border-radius: 4px;">
                                </li>-->

                                <!--<li style="width: 18%;" onclick="checkImg('visa', '#m_img3', '#m_img2, #m_img1, #m_img4');">
                                    <img class="check" id="m_img3"  src="<?= $this->Url->image('yellow-check.png'); ?>" alt="" width="40"  style="border-radius: 4px;">
                                    <img src="<?= $this->Url->image('visa.jpg'); ?>" alt="" style="border-radius: 4px;">
                                </li>-->

                                <!--<li style="width: 18%;" onclick="checkImg('mastercard', '#m_img4', '#m_img2, #m_img3, #m_img1');">
                                    <img class="check" id="m_img4"  src="<?= $this->Url->image('yellow-check.png'); ?>" alt="" width="40"  style="border-radius: 4px;">
                                    <img src="<?= $this->Url->image('mastercard.png'); ?>" alt="" style="border-radius: 4px;">
                                </li>-->
                            </ul>
                            <script>
                                $(document).ready(function() {
                                    checkImg('proxypay', '#m_img1', '#m_img2, #m_img3, #m_img4');
                                });
                                function checkImg(val = '', show, hide) {
                                    $(hide).hide();
                                    $(show).show();
                                    //alert(val);
                                    if (val == "proxypay") {
                                        $('#bookingformdetails').removeAttr('action');
                                        $('#bookingformdetails').attr('action', '<?= $this->Url->build(["controller" => "Users", "action" => "bookingEntire", $id,]); ?>');
                                    } else if (val == "paypal") {
                                        $('#bookingformdetails').removeAttr('action');
                                        $('#bookingformdetails').attr('action', '<?= $this->Url->build(["controller" => "Users", "action" => "order", $id,]); ?>');
                                    } else if (val == "pay-local") {
                                        $('#bookingformdetails').removeAttr('action');
                                        $('#bookingformdetails').attr('action', '<?= $this->Url->build(["controller" => "Users", "action" => "paylocalentire", $id,]); ?>');
                                }
                                }
                            </script>

                        </div>


                        <div class="Reservation">
                            <h4><?= __("Booking Terms and Conditions"); ?></h4>
                            <p><?= __("By clicking on"); ?> <b>"<?= __("Continue"); ?>"</b>, <?= __("you agree to the booking terms and condition and privacy policy"); ?></p>
                            <div class="retail-bpg">
                                <img src="<?= HTTP_ROOT; ?>images/bpg_badge.png">
                                <span style="margin: 0px 0px 0px -165px;font-size: 18px;font-weight: bold;"><?= __("Best Price."); ?></span>
                            </div>
                            <div id="book-now"><button type="submit"><?= __("Continue"); ?></button></div>
                        </div>

                        <input type="hidden" name="location_state" value="<?= @$_GET['from_location_name']; ?>" />
                        <input type="hidden" name="room_fee" value="<?= @$_GET['rooms']; ?>" />
                        <input type="hidden" name="total_room_fee" value="<?php
                        if ($dategap >= $longDays && !empty($longDays)) {
                            echo $ttfee = @$_GET['rooms'] * ($htl_fixrm_pric * $dategap);
                        } else {
                            echo $ttfee = @$_GET['rooms'] * ($htl_pri * $dategap);
                        }
                        ?>" />
                        <input type="hidden" name="total_tax" value="<?= $tt_tax = 0; ?>" />
                        <input type="hidden" name="cancel_policy" value="<?= $this->User->getCancelationEntireProperty($id); ?>" />
                        <input type="hidden" name="service_fee" value="<?= !empty($fstHotel->pricing->boost_price) ? $fstHotel->pricing->boost_price : $this->User->getSeviceFee(); ?>" />
                        <input type="hidden" name="service_fee_type" value="<?= !empty($fstHotel->pricing->boost_price) ? 2 : 1; ?>" />
                        <input type="hidden" name="total_cost" value="<?php echo $tt_cost = $ttfee + $tt_tax; ?>" />
                        <input type="hidden" name="qury_tri" value="<?= $_SERVER['QUERY_STRING']; ?>" />
                        <input type="hidden" name="htl_chk_in" value="<?= date_format(date_create(str_replace('/', '-', @$_GET['hotel_check_in'])), 'Y-m-d'); ?>" />
                        <input type="hidden" name="htl_chk_out" value="<?= date_format(date_create(str_replace('/', '-', @$_GET['hotel_check_out'])), 'Y-m-d'); ?>" />
                        <?= $this->Form->end(); ?>
                    </div>
                    <div class="aparthotel-right ">
<!--                        <div class="aparthotel-right-box"><i class="fa fa-bell"></i><?= __("Only"); ?> <b><?= $Rm_counts = $this->User->restRoomCount($RmDet->id, @$_GET['rooms'], @$_GET['hotel_check_in'], @$_GET['hotel_check_out'])//->room_count;                                                                                                            ?> <?= ($Rm_counts > 1) ? __('rooms') : __('room'); ?></b> <?= __("left at this price!"); ?><?php
                        ?></div>-->
                        <div class="aparthotel-right-box2">
                            <div class="bedroom-apartment">
                                <div class="aparthotel-right-text ">
                                    <p><?= __("&nbsp;"); ?></p><h6><?= '&nbsp;'; ?></h6>
                                </div>
                                <div class="aparthotel-price-tag"><?php
                                    if (!empty($id)) {
                                        if ($dategap >= $longDays && !empty($longDays)) {
                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2);
                                            } else {
                                                echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2));
                                            }
                                        } else {
                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_pri), 2);
                                            } else {
                                                echo 'AOA' . $this->User->changeFormat(number_format($htl_pri, 2));
                                            }
                                        }



                                        //echo changeFormat(number_format($htl_pri, 2));
                                    }
                                    ?>
                                    <span><?= __("for"); ?> <?= __("night"); ?></span></div>
                                <p><?= __("Includes:"); ?></p>
                                <h6>

                                    <?php
//pj($aminity);
                                    $aminity = $this->User->propertyEntireAmenities($id);
                                    $aminityx = [];
                                    $geta = json_decode($aminity);
                                    $i = 1;

                                    if (count(json_decode($geta->Parking, true)) >= 1) {
                                        foreach (json_decode($geta->Parking) as $am_val1) {
                                            echo __($am_val1) . ', ';
                                        }
                                    }
                                    if (count(json_decode($geta->Services, true)) >= 1) {
                                        foreach (json_decode($geta->Services) as $am_val2) {
                                            echo __($am_val2) . ', ';
                                        }
                                    }
                                    if (count(json_decode($geta->Accessibility, true)) >= 1) {
                                        foreach (json_decode($geta->Accessibility) as $am_val3) {
                                            echo __($am_val3) . ', ';
                                        }
                                    }
                                    if (count(json_decode($geta->Facilities, true)) >= 1) {
                                        foreach (json_decode($geta->Facilities) as $am_val4) {
                                            echo __($am_val4) . ', ';
                                        }
                                    }
                                    if (count(json_decode($geta->Activities, true)) >= 1) {
                                        foreach (json_decode($geta->Activities) as $am_val5) {
                                            echo __($am_val5) . ', ';
                                        }
                                    }
                                    if (count(json_decode($geta->Food, true)) >= 1) {
                                        foreach (json_decode($geta->Food) as $am_val6) {
                                            echo __($am_val6) . ', ';
                                        }
                                    }
                                    if (count(json_decode($geta->Kitchen, true)) >= 1) {
                                        foreach (json_decode($geta->Kitchen) as $am_val7) {
                                            echo __($am_val7) . ', ';
                                        }
                                    }
                                    if (count(json_decode($geta->Media, true)) >= 1) {
                                        foreach (json_decode($geta->Media) as $am_val8) {
                                            echo __($am_val8) . ', ';
                                        }
                                    }
                                    if (count(json_decode($geta->Meetings, true)) >= 1) {
                                        foreach (json_decode($geta->Meetings) as $am_val9) {
                                            echo __($am_val9) . ', ';
                                        }
                                    }
                                    if (count(json_decode($geta->Essentials, true)) >= 1) {
                                        foreach (json_decode($geta->Essentials) as $am_val10) {
                                            echo __($am_val10) . ', ';
                                        }
                                    }
                                    if (count(json_decode($geta->Pools, true)) >= 1) {
                                        foreach (json_decode($geta->Pools) as $am_val11) {
                                            echo __($am_val11) . ',';
                                        }
                                    }
                                    ?>

                                </h6>
                                <p><?= __("Cancellation Policy"); ?>:</p>
                                <h6><?= __($this->User->getCancelationEntireProperty($id)); ?></h6>
                            </div>
                            <div class="room-cost">
                                <ul>
                                    <li><?= __("Price Per Night"); ?>  <span><?php
                                            if (!empty($htl_pri)) {

                                                if ($dategap >= $longDays && !empty($longDays)) {
                                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2);
                                                    } else {
                                                        echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2));
                                                    }
                                                } else {
                                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_pri), 2);
                                                    } else {
                                                        echo 'AOA ' . $this->User->changeFormat(number_format($htl_pri, 2));
                                                    }
                                                }
                                            }
                                            ?></span></li>
                                    <li><?= $dategap; ?> <?php if ($dategap > 1) { ?> <?= __("nights"); ?>  <?php
                                        } else {
                                            echo __("night");
                                        }
                                        ?>
                                        <span>
                                            <?php
                                            if ($dategap >= $longDays && !empty($longDays)) {
                                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dategap * $htl_fixrm_pric), 2);
                                                } else {
                                                    echo 'AOA ' . $this->User->changeFormat(number_format($dategap * $htl_fixrm_pric, 2));
                                                }
                                            } else {
                                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $ttfee), 2);
                                                } else {
                                                    echo 'AOA ' . $this->User->changeFormat(number_format($ttfee, 2));
                                                }
                                            }
                                            ?>
                                        </span></li>
                                </ul>
                            </div>
                            <!--                            <div class="taxes-fees">
                            <?= __("Taxes & Fees"); ?>  <span><?php
                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $tt_tax), 2);
                            } else {
                                echo 'AOA ' . $this->User->changeFormat(number_format($tt_tax, 2));
                            }
                            ?> AOA</span>
                                                        </div>-->
                            <div class="total-charges">
                                <?= __("Total Price"); ?><span>
                                    <?php
                                    if ($dategap >= $longDays && !empty($longDays)) {
                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dategap * $htl_fixrm_pric), 2);
                                        } else {
                                            echo 'AOA ' . $this->User->changeFormat(number_format($dategap * $htl_fixrm_pric, 2));
                                        }
                                    } else {
                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $tt_cost), 2);
                                        } else {
                                            echo 'AOA ' . $this->User->changeFormat(number_format($tt_cost, 2));
                                        }
                                    }
                                    ?>

                                </span>
                            </div>
                        </div>



                        <div class="aparthotel-best-price">
                            <?= __("Best Price."); ?> <span><?= __("GUARANTEED."); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php echo $this->element('frontend/inner-footer'); ?>

<!--<div class="modal fade bd-example-modal-lg" id="flightDetailsModal" tabindex="-1" role="dialog" aria-labelledby="flightDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="fas fa-times"></i></span> </button>
            <div class="container">
                 Header
                <div class="row flight-details-header">
                    <div class="col-md-6 col-6 text-left">
                        <div class="flight-details-title"> <?= __("Hotel Details"); ?> </div>
                    </div>
                    <div class="col-md-3 col-6 offset-lg-1 text-right">
                        <div class="row">
                            <div class="col">
                                <div class="flight-details-price"> $ 894 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="flight-details-price-subtitle"> Total price </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2"> <a href="#" class="btn btn-primary btn-select hvr-grow">Select</a> </div>
                </div>
                 Departure title
                <div class="row">
                    <div class="col text-left">
                        <div class="flight-details-departure-title"> CHECK-IN: AFTER 2:00 PM  </div>
                    </div>
                </div>
                 Flight details row
                <div class="row flight-details-row">
                    <div class="col-md-3 col-12 text-left"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgpmrbvjdT_f4MVtOC4d8EvPoUUAhPBvblOB2IcUmacYzGAoFf" class="flight-details-airline-logo" style="width: 150px !important;margin: -36px -9px;">
                        <div class="row flight-details-company-flight align-middle">
                            <div class="col"> Singapore Airlines </div>
                            <div class="col"> BA-3271 </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-4 flight-details-infos text-left">
                        <div class="row">
                            <div class="col"> Los Angeles </div>
                        </div>
                        <div class="row flight-details-date">
                            <div class="col"> Jul 13, Sat, 08:00PM </div>
                        </div>
                        <div class="row">
                            <div class="col"> Los Angeles (LAX), USA </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-4 flight-details-duration text-center">
                        <div class="row">
                            <div class="col"> 10h50m | Non Stop </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <hr /> </div>
                        </div>
                        <div class="row">
                            <div class="col"> Economy Class </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-4 flight-details-infos text-right">
                        <div class="row">
                            <div class="col"> London </div>
                        </div>
                        <div class="row flight-details-date">
                            <div class="col"> Jul 14, Sat, 08:00PM </div>
                        </div>
                        <div class="row">
                            <div class="col"> Heathrow (LHR), UK </div>
                        </div>
                    </div>
                </div>
                 Layover
                <div class="row">
                    <div class="col text-center">
                        <div class="flight-details-layover"> Layover: <span>LHR London</span> - Time: 20h50m </div>
                    </div>
                </div>
                 Departure title
                <div class="row">
                    <div class="col text-left">
                        <div class="flight-details-departure-title"> CHECK-OUT: BEFORE 12:00 PM </div>
                    </div>
                </div>
                 Flight details row
                <div class="row flight-details-row">
                    <div class="col-md-3 col-12 text-left"> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQgpmrbvjdT_f4MVtOC4d8EvPoUUAhPBvblOB2IcUmacYzGAoFf" class="flight-details-airline-logo" style="width: 150px !important;margin: -36px -9px;">
                        <div class="row flight-details-company-flight align-middle">
                            <div class="col"> Air France </div>
                            <div class="col"> BA-3271 </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-4 flight-details-infos text-left">
                        <div class="row">
                            <div class="col"> Los Angeles </div>
                        </div>
                        <div class="row flight-details-date">
                            <div class="col"> Jul 13, Sat, 08:00PM </div>
                        </div>
                        <div class="row">
                            <div class="col"> Los Angeles (LAX), USA </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-4 flight-details-duration text-center">
                        <div class="row">
                            <div class="col"> 10h50m | Non Stop </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <hr /> </div>
                        </div>
                        <div class="row">
                            <div class="col"> Economy Class </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-4 flight-details-infos text-right">
                        <div class="row">
                            <div class="col"> London </div>
                        </div>
                        <div class="row flight-details-date">
                            <div class="col"> Jul 14, Sat, 08:00PM </div>
                        </div>
                        <div class="row">
                            <div class="col"> Heathrow (LHR), UK </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->

<script>
    $(document).ready(function() {
        mycheckindate();
        $('#rooms').val('<?= @$_GET['rooms']; ?>');
        $('#children').val('<?= @$_GET['children']; ?>');
        $('#adult').val('<?= @$_GET['adult']; ?>');
    });
    function hotel_loc_data() {
        $val = $('#loc_from').val();
        $pos = "loc_from";
        $hid = "hotel_loc_display";
        if ($val == "") {
            $("#hotel_loc_display").html("");
        } else {
            jQuery.ajax({
                type: "POST",
                url: "<?= HTTP_ROOT; ?>users/ajax_hotel_locations",
                dataType: 'html',
                data: {origin: $val, pos: $pos, hid: $hid},
                success: function(res) {
                    $("#hotel_loc_display").html(res).show();
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
        if (Hid == "hotel_loc_display") {
            $('#hotel_check_in').focus();
        }
    }
    function hidefill(Hid) {
        if (Hid == "hotel_loc_display") {
            $('#hotel_check_in').focus();
        }
        $('#' + Hid).hide();
    }

    function myInput() {
        if ($('#departure_date').val() != "") {
            $("#return_date").focus();
        }

    }
    function mycheckindate() {
        if ($('#hotel_check_in').val() != "") {
            $("#hotel_check_out").focus();
            if (new Date(((($('#hotel_check_out').val().split('/')).reverse()).join())) > (new Date(((($('#hotel_check_in').val().split('/')).reverse()).join())))) {
                $('#htl_shc_btn').removeAttr("disabled");
            } else {
                $('#htl_shc_btn').attr("disabled", "disabled");
            }
        }

    }
    function checkWithCheckindate() {
        if ($('#hotel_check_in').val() != "" && $('#hotel_check_out').val() != "") {

            console.log(new Date(((($('#hotel_check_out').val().split('/')).reverse()).join())) > (new Date(((($('#hotel_check_in').val().split('/')).reverse()).join()))));
            if (new Date(((($('#hotel_check_out').val().split('/')).reverse()).join())) > (new Date(((($('#hotel_check_in').val().split('/')).reverse()).join())))) {

                $('#htl_shc_btn').removeAttr("disabled");
            } else {
                $('#htl_shc_btn').attr("disabled", "disabled");
            }
        } else {
            $('#htl_shc_btn').attr("disabled", "disabled");
        }

    }

</script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script>
<script src="<?= HTTP_ROOT; ?>js/progress-index.js"></script>
<?php

function changeFormat($pri) {
    $dat = explode('.', $pri);
    $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
    return $f;
}
?>