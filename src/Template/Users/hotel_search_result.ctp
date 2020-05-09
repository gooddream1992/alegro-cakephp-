<?php
$dateDifference = timeago(date_format(date_create(str_replace('/', '-', @$_GET['hotel_check_in'])), 'Y-m-d'), date_format(date_create(str_replace('/', '-', @$_GET['hotel_check_out'])), 'Y-m-d'));
?>
<style>
    .container-radio.checkbox[disabled] {
        opacity: 0.4;
        cursor: not-allowed !important;
    }
    .radio-button[disabled] {
        opacity: 0.3;
        cursor: not-allowed !important;
    }
</style>

<script>
    $(document).ready(function() {
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        $('.datepicker-here').datepicker({
            minDate: new Date(),
        });
    });

</script>
<?php

function changeFormat($pri) {
    $dat = explode('.', $pri);
    $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
    return $f;
}

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$currUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$htl_aminity_s_top = [];
$htl_aminity_s_parking = [];
$htl_aminity_s_services = [];
$htl_aminity_s_accessibility = [];
$htl_aminity_s_facilities = [];
$htl_aminity_s_activities = [];
$htl_aminity_s_food = [];
$htl_aminity_s_kitchen = [];
$htl_aminity_s_media = [];
$htl_aminity_s_meetings = [];
$htl_aminity_s_essentials = [];
$htl_aminity_s_pools = [];
$htl_aminity_s_property_type = [];
$htl_aminity_s_booking_type = [];
//pj($result_property); exit;

foreach ($result_property as $r_list) {

    $guest = @$_GET['adult'] + @$_GET['children'];
    $aMn = $this->User->propertyAmenitiesAll($r_list->id, $guest);
    //pj($aMn);

    $top_aminity = !empty(@json_decode(@$aMn->Top)) ? @json_decode(@$aMn->Top) : [];
    $parking_aminity = !empty(@json_decode(@$aMn->Parking)) ? @json_decode(@$aMn->Parking) : [];
    $services_aminity = !empty(@json_decode(@$aMn->Services)) ? @json_decode(@$aMn->Services) : [];
    $accessibility_aminity = !empty(@json_decode(@$aMn->Accessibility)) ? @json_decode(@$aMn->Accessibility) : [];
    $accessibility_facilities = !empty(@json_decode(@$aMn->Facilities)) ? @json_decode(@$aMn->Facilities) : [];
    $accessibility_activities = !empty(@json_decode(@$aMn->Activities)) ? @json_decode(@$aMn->Activities) : [];
    $accessibility_food = !empty(@json_decode(@$aMn->Food)) ? @json_decode(@$aMn->Food) : [];
    $accessibility_kitchen = !empty(@json_decode(@$aMn->Kitchen)) ? @json_decode(@$aMn->Kitchen) : [];
    $accessibility_media = !empty(@json_decode(@$aMn->Media)) ? @json_decode(@$aMn->Media) : [];
    $accessibility_meetings = !empty(@json_decode(@$aMn->Meetings)) ? @json_decode(@$aMn->Meetings) : [];
    $accessibility_essentials = !empty(@json_decode(@$aMn->Essentials)) ? @json_decode(@$aMn->Essentials) : [];
    $accessibility_pools = !empty(@json_decode(@$aMn->Pools)) ? @json_decode(@$aMn->Pools) : [];
    $accessibility_property_type = !empty(@json_decode(@$aMn->property_type)) ? @json_decode(@$aMn->property_type) : [];
    $accessibility_booking_type = !empty(@json_decode(@$aMn->booking_type)) ? @json_decode(@$aMn->booking_type) : [];
//pj($accessibility_booking_type);

    foreach (@$top_aminity as $amin_t) {
        $htl_aminity_s_top[] = $amin_t;
    }
    foreach (@$parking_aminity as $amin_pt) {
        $htl_aminity_s_parking[] = $amin_pt;
    }
    foreach (@$services_aminity as $amin_s) {
        $htl_aminity_s_services[] = $amin_s;
    }
    foreach (@$accessibility_aminity as $amin_a) {
        $htl_aminity_s_accessibility[] = $amin_a;
    }
    foreach (@$accessibility_facilities as $amin_f) {
        $htl_aminity_s_facilities[] = $amin_f;
    }
    foreach (@$accessibility_activities as $amin_ac) {
        $htl_aminity_s_activities[] = $amin_ac;
    }
    foreach (@$accessibility_food as $amin_fo) {
        $htl_aminity_s_food[] = $amin_fo;
    }
    foreach (@$accessibility_kitchen as $amin_ki) {
        $htl_aminity_s_kitchen[] = $amin_ki;
    }
    foreach (@$accessibility_media as $amin_me) {
        $htl_aminity_s_media[] = $amin_me;
    }
    foreach (@$accessibility_meetings as $amin_mee) {
        $htl_aminity_s_meetings[] = $amin_mee;
    }
    foreach (@$accessibility_essentials as $amin_es) {
        $htl_aminity_s_essentials[] = $amin_es;
    }
    foreach (@$accessibility_pools as $amin_po) {
        $htl_aminity_s_pools[] = $amin_po;
    }
    foreach (@$accessibility_property_type as $amin_pt) {
        $htl_aminity_s_property_type[] = $amin_pt;
    }
    foreach (@$accessibility_booking_type as $amin_bt) {
        $htl_aminity_s_booking_type[] = $amin_bt;
    }
}
?>
<div class="se-pre-con">
    <div class="top-end">
        <?php echo $this->element('frontend/login-header'); ?>
        <div class="img-load-ing">
            <img style="border-radius: 104px; width: 170px; height: 170px; margin-bottom: 40px;" src="<?= HTTP_ROOT; ?>img/hotel.png" alt="">
            <center>
                <span style=" font-size: 2em;">
                    <?php echo __('Searching for properties in') ?> <b><?= $_GET['from_location_name']; ?></b> </span>
            </center>
        </div>
    </div>
    <div class="se-pre-img"></div>
    <div class="top-last" style="color: #7b7b7b;text-align:  center; font-weight: bold;">
        <span style="font-size: 2rem;">
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
        <span style="font-size: 20px; color:#000;"><?php echo __(@$_GET['rooms']); ?> <?php if ($_GET['rooms'] <= 1) { ?> <?php echo __('Room') ?> <?php } else { ?> <?php echo __('Rooms') ?> <?php } ?> - <?= __(@$_GET['adult'] + @$_GET['children']); ?> <?php if ($_GET['adult'] + @$_GET['children'] == 1) { ?> <?php echo __('Guest') ?> <?php } else { ?><?php echo __('Guests') ?><?php } ?></span>

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
    #sndli {
        padding-left: 137px;
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
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        color: black;
        font-size: 21px;
    }
    .no-result p{
        font-weight: 300;
        font-size: 17px;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
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
        width: 97%;
        z-index: 1111;
        max-height: 180px;
        overflow-y: inherit;
        position: absolute;
        top: 78px;
    }
    #hotel_loc_display ul {
        padding-left: 0;
        width: 100%;
        float: left;
        max-height: 149px;
        overflow: auto;
        cursor:pointer;
        margin-bottom: 0;
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
    .sponsore-list{
        border: 2px solid #f7d74a !important;
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

<link rel="stylesheet" href="<?= $this->Url->css('nouislider_custom.css'); ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js" integrity="sha256-HT7c4lBipI1Hkl/uvUrU1HQx4WF3oQnSafPjgR9Cn8A=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js" integrity="sha256-HT7c4lBipI1Hkl/uvUrU1HQx4WF3oQnSafPjgR9Cn8A=" crossorigin="anonymous"></script>
<script src="<?= $this->Url->script('noUi.js'); ?>"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.min.js"></script>

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
                                    <?php if ($_GET['adult'] + @$_GET['children'] == 1) { ?> <?php echo __('Guest') ?> <?php } else { ?><?php echo __('Guests') ?><?php } ?> </div>
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
                                    <?php if ($_GET['adult'] + @$_GET['children'] == 1) { ?> <?php echo __('Guest') ?> <?php } else { ?><?php echo __('Guests') ?><?php } ?> </div>
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
                                        <input equired="" type="text" class="form-control box1" id="loc_from" name="from_location_name" placeholder="<?php echo __('Location'); ?>" onkeyup="hotel_loc_data()" autocomplete="off" value="<?= $_GET['from_location_name']; ?>">
                                        <input  type="hidden" name="state-name" id="state-name" value="<?= @$_GET['state-name']; ?>">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_10.png" class="formIcon box1_img_h">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_10_y.png" class="formIcon box1_img">


                                    </div>
                                    <div id="hotel_loc_display" style="display:none;">

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label><?php echo __('Check in') ?>:</label>
                                        <input required="" type="text" data-language="en" data-date-start-date="+1d" class="datepicker-here form-control box3" placeholder="Check-in Date" id="hotel_check_in" name="hotel_check_in" autocomplete="off" onblur="mycheckindate()" value="<?= $_GET['hotel_check_in']; ?>">
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
                                        <button type="submit" id="htl_shc_btn" class="btn btn-primary hvr-grow btn-fill" disabled><?php echo __('Search') ?></button>
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
<div class="space"></div>
<section id="search-results-body">
    <div class="container">
        <div class="row">
            <!-- Filters -->
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="container filters-list h-auto">
                    <!-- Title -->
                    <div class="row">
                        <div class="header-tab bg-yellow tab"> <?php echo __('Filters') ?> </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title pieceRange m-20" data-toggle="collapse" data-target="#collapseElem-0"><span></span><?php echo __('Price') ?> <i class="fas fa-chevron-down"></i></h2>
                        </div>

                    </div>
                    <!-- Price range -->
                    <div class="row">
                        <div class="col-12">
                            <div class="collapseElem collapse show" id="collapseElem-0">
                                <ul id="ulli">
                                    <li>
                                        <?php
                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                            echo $this->request->session()->read("CURRENCY");
                                        } else {
                                            echo 'AOA';
                                        }
                                        ?>
                                        <span id="ccccc"></span>
                                    </li>
                                    <li id="sndli">
                                        <?php
                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                            echo $this->request->session()->read("CURRENCY");
                                        } else {
                                            echo 'AOA';
                                        }
                                        ?>
                                        <span id="ddddd"></span>
                                    </li>
                                </ul>
                                <div id="slider-handles"></div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20" data-toggle="collapse" data-target="#collapseElem-1"><span></span><?php echo __('Ratings') ?> <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem collapse show" id="collapseElem-1">
                                <label class="container-radio radio-button" <?= in_array(1, $rati_htl) ? '' : 'disabled'; ?>>
                                    <input type="checkbox" class="star-rating" <?= in_array(1, $rati_htl) ? 'checked' : 'disabled'; ?> value="1" name="depart"> <span class="checkmark"></span> <span class="labelT">1 <?php echo __('star') ?></span> </label>
                                <label class="container-radio radio-button" <?= in_array(2, $rati_htl) ? '' : 'disabled'; ?>>
                                    <input type="checkbox" class="star-rating" <?= in_array(2, $rati_htl) ? 'checked' : 'disabled'; ?>  value="2" name="depart"> <span class="checkmark"></span> <span class="labelT">2 <?php echo __('stars') ?></span> </label>
                                <label class="container-radio radio-button" <?= in_array(3, $rati_htl) ? '' : 'disabled'; ?>>
                                    <input type="checkbox" class="star-rating" <?= in_array(3, $rati_htl) ? 'checked' : 'disabled'; ?> value="3" name="depart"> <span class="checkmark"></span> <span class="labelT">3 <?php echo __('stars') ?></span> </label>
                                <label class="container-radio radio-button" <?= in_array(4, $rati_htl) ? '' : 'disabled'; ?>>
                                    <input type="checkbox" class="star-rating" <?= in_array(4, $rati_htl) ? 'checked' : 'disabled'; ?> value="4" name="depart"> <span class="checkmark"></span> <span class="labelT">4 <?php echo __('stars') ?></span> </label>
                                <label class="container-radio radio-button" <?= in_array(5, $rati_htl) ? '' : 'disabled'; ?> >
                                    <input type="checkbox" class="star-rating" <?= in_array(5, $rati_htl) ? 'checked' : 'disabled'; ?> value="5" name="depart"> <span class="checkmark"></span> <span class="labelT">5 <?php echo __('stars') ?></span> </label>
                                <label class="container-radio radio-button" onclick="remove_chkMrk()">
                                    <input type="checkbox" class="star-rating" value="" name="str_un"> <span class="checkmark"></span> <span class="labelT"><?php echo __('Unrated') ?></span> </label>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <?php
                    $allAminities = [
                        "Top Amenities" => [
                            "Free WIFI", "Spa", "Gym", "Business Center", "Restaurant", "Non-smoking Rooms", "Free Parking", "Airport Shuttle", "Room Service", "Elevator/Lift"
                        ],
                        //  "Parking & Transportation" => [
                        //      "Free Parking", "Airport Shuttle", "On-site Parking", "Private Parking", "Car Rental", "Valet Parking", "Parking", "Shuttle Service (Surcharge)", "Personal Driver",
                        //  ],
                        // // "Guest Services" => [
                        //    "Bikes Available (Free)", "Safe", "Concierge Service", "Private Check-in/Check-out", "Laundry Service", "Atm/Cash Machine on Site", "Express Check-in/Check-out", "Trouser/Suit Press", "Daily Maid Service", "Babysitting/Child Services", "Baggage Storage", "Fax/Photocopying", "Currency Exchange", "Lockers", "24-hour Front Desk", "Newspapers", "Ironing Service", "Tour Desk", "Hair Dryer", "Minibar", "Breakfast Included", "Alarm Clock", "Stereo", "Toilet", "Bathroom", "Balcony", "Hot tub", "Air conditioning", "Sofa", "Shower", "Bathtub", "Soundproofing", "Towels", "Chairs", "Desk", "Bed Linen", "Boiler", "Heating",
                        //  ],
                        //  "Accessibility" => [
                        //      "Elevator/Lift", "Emergency Exit", "Wheelchair accessible", "Fire Extinguisher", "Smoke Detector", "First aid kit", "Buzzer/wireless intercom", "Doorman",
                        //  ],
                        // "Facilities" => [
                        //     "Business Center", "No Smoking Rooms", "Terrace", "Sun Terrace/Deck", "Family Rooms", "Air Conditioning", "Grounds/Garden", "Designated Smoking Area", "Bbq Facilities", "Hair/Beauty Salon/Barber", "Shops/Stores (on Site)",
                        // ],
                        // "Activities & Entertainment" => [
                        //     "Windsurfing", "Game Room", "Cycling", "Canoeing", "Evening entertainment", "Bicycle Rental", "Fishing", "Water sports (on site)", "Entertainment Staff", "Hiking", "Gym", "Nightclub/DJ", "Diving", "Karaoke", "Cyber Cafe", "Library", "Football Pitch", "Basketball Court", "Tennis Court", "Golf Resort", "Gentlemen´s Club", "Amusement Park", "Zoologic", "Pub", "Bowling Center", "Paintball Center", "Cinema", "Shopping Mall"
                        //],
                        // "Food & Drink" => [
                        //    "Restaurant", "Bar", "Diet Meals (upon Request)", "Shared Kitchen", "Packed Lunches", "Snack Bar", "Room Service", "Breakfast in the Room", "Grocery Deliveries",
                        // ],
                        // "Kitchen & Dining" => [
                        //   "Kitchenette", "Microwave", "Dining Room", "Refrigerator", "Cook", "Oven", "Hair Dryer", "Dishwasher", "Minibar", "Fridge/Freezer", "Electric kettle", "Coffee Maker",
                        //],
                        // "Media/Technology" => [
                        //   "Shared Lounge/TV Area", "Free WIFI", "Internet Services", "WIFI Available in All Areas", "Free Internet Available", "Free Internet Access", "Hybrid Charging Station", "TV", "Flat-screen TV", "Smart TV", "Cable TV",
                        // ],
                        // "Meetings & Events" => [
                        //   "Vip Room", "Honeymoon Suite", "Meeting/Banquet",
                        /// ],
                        // "Essentials" => [
                        //     "Iron", "Ironing Board", "Laundry", "Washing Machine",
                        // ],
                        // "Pools & Wellness" => [
                        //    "Spa", "Hot Tub", "Massage", "Sauna", "Gym", "Turkish Bath/Steam Bath",
                        // ],
                        "Property type" => [
                            "Apartment", "Hotel", "Guest-House", "Villa", "Resort", "Lodge",
                        ],
                        "Booking type" => [
                            "Entire Place", "Private Room",
                        ],
                    ];
                    ?>
                    <?php
                    $cvx = 51;
                    foreach ($allAminities as $key => $allAminitie) {
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <h2 class="title m-20 m-bottom-40" data-toggle="collapse" data-target="#collapseElem-<?= $cvx; ?>"><span></span> <?= __($key); ?> <i class="fas fa-chevron-down"></i></h2>
                                <div class="collapseElem collapse show" id="collapseElem-<?= $cvx; ?>">
                                    <?php foreach ($allAminitie as $val) { ?>
                                        <label class="container-radio checkbox" <?php
                                        if ($key == 'Top Amenities') {
                                            echo in_array($val, $htl_aminity_s_top) ? '' : 'disabled';
                                        } elseif ($key == 'Parking & Transportation') {
                                            echo in_array($val, $htl_aminity_s_parking) ? '' : 'disabled';
                                        } elseif ($key == 'Guest Services') {
                                            echo in_array($val, $htl_aminity_s_services) ? '' : 'disabled';
                                        } elseif ($key == 'Accessibility') {
                                            echo in_array($val, $htl_aminity_s_accessibility) ? '' : 'disabled';
                                        } elseif ($key == 'Facilities') {
                                            echo in_array($val, $htl_aminity_s_facilities) ? '' : 'disabled';
                                        } elseif ($key == 'Activities & Entertainment') {
                                            echo in_array($val, $htl_aminity_s_activities) ? '' : 'disabled';
                                        } elseif ($key == 'Food & Drink') {
                                            echo in_array($val, $htl_aminity_s_food) ? '' : 'disabled';
                                        } elseif ($key == 'Kitchen & Dining') {
                                            echo in_array($val, $htl_aminity_s_kitchen) ? '' : 'disabled';
                                        } elseif ($key == 'Media/Technology') {
                                            echo in_array($val, $htl_aminity_s_media) ? '' : 'disabled';
                                        } elseif ($key == 'Meetings & Events') {
                                            echo in_array($val, $htl_aminity_s_meetings) ? '' : 'disabled';
                                        } elseif ($key == 'Essentials') {
                                            echo in_array($val, $htl_aminity_s_essentials) ? '' : 'disabled';
                                        } elseif ($key == 'Pools & Wellness') {
                                            echo in_array($val, $htl_aminity_s_pools) ? '' : 'disabled';
                                        } elseif ($key == 'Property type') {
                                            echo in_array($val, $all_available_properties_types) ? '' : 'disabled';
                                        } elseif ($key == 'Booking type') {
                                            echo in_array($val, $all_available_booking_types) ? '' : 'disabled';
                                        }
                                        ?>>
                                            <input  class="<?= $this->User->makeSeoUrl($key); ?>"  type="checkbox" value="<?= $val; ?>" <?php
                                            if ($key == 'Top Amenities') {
                                                echo in_array($val, $htl_aminity_s_top) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Parking & Transportation') {
                                                echo in_array($val, $htl_aminity_s_parking) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Guest Services') {
                                                echo in_array($val, $htl_aminity_s_services) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Accessibility') {
                                                echo in_array($val, $htl_aminity_s_accessibility) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Facilities') {
                                                echo in_array($val, $htl_aminity_s_facilities) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Activities & Entertainment') {
                                                echo in_array($val, $htl_aminity_s_activities) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Food & Drink') {
                                                echo in_array($val, $htl_aminity_s_food) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Kitchen & Dining') {
                                                echo in_array($val, $htl_aminity_s_kitchen) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Media/Technology') {
                                                echo in_array($val, $htl_aminity_s_media) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Meetings & Events') {
                                                echo in_array($val, $htl_aminity_s_meetings) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Essentials') {
                                                echo in_array($val, $htl_aminity_s_essentials) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Pools & Wellness') {
                                                echo in_array($val, $htl_aminity_s_pools) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Property type') {
                                                echo in_array($val, $all_available_properties_types) ? 'checked' : 'disabled';
                                            } elseif ($key == 'Booking type') {
                                                echo in_array($val, $all_available_booking_types) ? 'checked' : 'disabled';
                                            }
                                            ?>> <span class="checkmark" ></span> <span class="labelT"><?= __($val); ?></span> </label>
                                                    <?php
                                                    // echo $val;
                                                }
                                                $cvx++;
                                                ?>

                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>


                    <!--                    <div class="row">
                                            <div class="col-12">
                                                <h2 class="title m-20 m-bottom-40" data-toggle="collapse" data-target="#collapseElem-3"><span></span> Reservation policy <i class="fas fa-chevron-down"></i></h2>
                                                <div class="collapseElem collapse" id="collapseElem-3">
                                                    <label class="container-radio checkbox">
                                                        <input class="reservation_policy" type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Free cancellation</span> </label>
                                                    <label class="container-radio checkbox">
                                                        <input class="reservation_policy"  type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Book without credit card</span> </label>
                                                    <label class="container-radio checkbox">
                                                        <input class="reservation_policy"  type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">No prepayment</span> </label>
                                                </div>
                                            </div>
                                        </div>-->
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-default btn-reset" onclick="reset_all()"><?php echo __('Reset All') ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Filters -->
            <!-- Results -->
            <div class="col-sm-12 col-md-8 col-lg-9">

                <?php if (date('Y-m-d') > date("Y-m-d", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))) { ?>
                    <div class='no-result' style=' width: 70%;'>
                        <div class='no-found-logo'>
                            <img src="<?= $this->Url->image('extranet/no-properties.svg'); ?>" alt="" style="width: 130px;margin: 90px 0px 10px 0px;">
                        </div>
                        <h2><?php echo __('No Properties Available') ?></h2>
                        <p><?php echo __('We could not find any properties according to your selected dates. Try searching again with different dates.') ?></p>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 desktop-change" data-toggle="collapse" data-target="#div-ho">
                            <a onclick="topFunction()" href='javascript:void(0)'><?php echo __('Change') ?></a>
                        </div>
                    </div>
                    <?php
                } else {

                    if (@$result_property_count != 0) {  //e
                        ?>
                        <div class="container bg-gris header-tab tab tab-results-mob" style="margin-top: 0px;">
                            <div class="d-table w-100 tab-title">
                                <div class="d-table-cell">
                                    <?php if ($result_property_count == 1) { ?>
                                        <span id="cnt"><?= @$result_property_count; ?></span> <?php echo __('Result') ?>
                                    <?php } else { ?>
                                        <span id="cnt"><?= @$result_property_count; ?></span> <?php
                                        echo __('Results');
                                    }
                                    ?>
                                </div>
                                <div class="d-table-cell text-right p-right-10 sortby-label"><?php echo __('Sort by') ?>:</div>
                                <div class="d-table-cell">
                                    <select name="" id="sortBy" class="sortBy">
                                        <option value="lth" <?= (@$_GET['sort_by'] == 'lth') ? 'selected' : ''; ?>><?php echo __('Low to High (Recommended)') ?></option>
                                        <option value="htl" <?= (@$_GET['sort_by'] == 'htl') ? 'selected' : ''; ?>><?php echo __('High to Low') ?></option>
                                        <option value="str" <?= (@$_GET['sort_by'] == 'str') ? 'selected' : ''; ?>><?php echo __('Stars') ?></option>
                                        <option value="rev" <?= (@$_GET['sort_by'] == 'rev') ? 'selected' : ''; ?>><?php echo __('Reviews') ?></option>
                                    </select>
                                    <i class="fa fa-angle-down formIconSort"></i>
                                </div>
                            </div>
                        </div>
                        <div id="main_search_data">

                            <?php
                            $res = 0;
                            $guest = $_GET['adult'] + @$_GET['children'];
                            $searched_rooms = !empty($_GET['rooms']) ? $_GET['rooms'] : 1;
                            // pj($result_property);
                            $boostidStatus = $this->User->chkBoostDesc($result_property);
                            //pj($boostStatus);
                            foreach ($boostidStatus as $list) {
                                //pj($list);
                                $boostStatus = $this->User->chkBoost($list->property_id);
                                $htl_rm_pric = $this->User->getHotelprice($list->property_id, $guest);
                                $htl_fixrm_pric = $this->User->getHotelfixprice($list->property_id, $guest);
                                $htl_rm_pric_frea = $this->User->get_featured_fee($list->property_id);
                                $getBetDetails = $this->User->propertyBedCount($list->property_id, $guest);
                                $bookingtypex = $this->User->getBookingRoomType($list->property_id);
                                if ($bookingtypex == 2) {
                                    $aminity = $this->User->propertyAmenities($list->property_id, $guest);
                                } else {
                                    $aminity = $this->User->propertyEntireSearchAmenities($list->property_id);
                                }
                                $longDays = $this->User->longDays($list->property_id);

                                if ($res < $htl_rm_pric)
                                    $res = $htl_rm_pric;
                                ?>
                                <a <?php if ($bookingtypex == 2) { ?> href="<?= HTTP_ROOT; ?>preview_private/<?= $list->property_id; ?>?<?= $_SERVER['QUERY_STRING']; ?>" <?php } else { ?> href="<?= HTTP_ROOT; ?>preview_entire/<?= $list->property_id; ?>?<?= $_SERVER['QUERY_STRING']; ?>"  <?php } ?> target="_blank">
                                    <div class="hotel-lsting <?php if ($boostStatus == 1) { ?>sponsore-list<?php } ?>">
                                        <?php //pj($list);?>

                                        <div class="hotel-lsting-left">
                                            <?php if ($boostStatus == 1) { ?> <span><?php echo __('Sponsored') ?></span> <?php
                                            } else {
                                                if ($htl_rm_pric_frea > 0) {
                                                    ?>
                                                    <span><?php echo __('Best Price') ?></span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <div class="hotel-img">
                                                <img src="<?= HTTP_ROOT; ?>img/pro_pic/<?= $this->User->getHotelImage($list->property_id); ?>" alt="img" style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="hotel-lsting-middle" style="width: 48%;">
                                            <h3><?= $this->User->getProName($list->property_id); ?>
                                                <?php for ($i = 1; $i <= $this->User->propertyRating($list->property_id); $i++) { ?>
                                                    <i class="fa fa-star rating"></i>
                                                <?php } ?>
                                                <i class="fa fa-thumbs-up"></i>
                                            </h3>
                                            <p><i class="fas fa-ruler"></i> <?= $this->User->propertySize($list->property_id, $guest); ?> <?php echo __('Sqm') ?> <br>
                                                <i class="fas fa-users"></i> <?php
                                                //echo $list->id;

                                                echo $this->User->propertyPeople($list->property_id, $guest);
                                                if ($this->User->propertyPeople($list->property_id, $guest) <= 1) {
                                                    ?> <?php echo __('Guest') ?> <?php } else { ?> <?php echo __('Guests') ?> <?php } ?><br>
                                                <i class="fas fa-bed"></i> <?php echo $getBetDetails->num_bed; ?>x <?php echo __($getBetDetails->beds); ?>  <?php foreach ($getBetDetails->extranets_user_property_sub_beds as $bes) { ?> <?php echo " + " . $bes->num_beds ?>x <?php echo __($bes->beds); ?>

                                                    <?php
                                                }
                                                ?><br>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo $this->User->stateName($list->property_id, $guest) . ',' . ' ' . $this->User->cityName($list->property_id, $guest); ?>                                       <br>
                                                
												<i class="fas fa-check-square"></i>
												<?php
                                                // pj($aminity);
                                                $aminityx = [];
                                                $geta = json_decode($aminity);
                                                $i = 1;
                                                foreach ($geta as $daee) {
                                                    $aminityx[] = __($daee);
                                                    if ($i++ == 2)
                                                        break;
                                                }
                                                echo implode(', ', $aminityx);
                                                ?>


                                            </p>
                                        </div>
                                        <div class="hotel-lsting-right">
                                            <h6><?php echo $this->User->reviewCount($list->property_id); ?> <?php echo __('reviews') ?><span><?php
                                                    echo is_nan($this->User->totalRating($list->property_id)) ? 0 : $this->User->totalRating($list->property_id);
                                                    echo "/5";
                                                    ?></span></h6>

                                            <h5 class="old-price">
                                                <?php if ($htl_rm_pric_frea > 0) { ?>
                                                    <span><?php echo __('was') ?></span><span>
                                                        <?php
                                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($htl_rm_pric)), 2) . '/' . __('night');
                                                        } else {
                                                            echo 'AOA ' . $this->User->changeFormat(number_format($htl_rm_pric, 2)) . '/5' . __('night');
                                                        }
                                                        ?>
                                                    </span>
                                                    <?php
                                                } else {
                                                    echo "&nbsp;&nbsp;";
                                                }
                                                ?>
                                            </h5>


                                            <h5><?php if ($htl_rm_pric_frea > 0) { ?>
                                                    <span><?php echo __('now') ?></span>

                                                    <?php
                                                    if ($dateDifference >= $longDays && !empty($longDays)) {
                                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2) . '/6' . __('night');
                                                        } else {
                                                            echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2)) . '/7' . __('night');
                                                        }
                                                    } else {
                                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100)))), 2) . '/8' . __('night');
                                                        } else {
                                                            echo 'AOA ' . $this->User->changeFormat(number_format(($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))), 2)) . '/9' . __('night');
                                                        }
                                                    }
                                                    ?>
                                                </h5>
                                                <h6 style="color:green;font-size: 15px;">
                                                    <?php
                                                    if ($bookingtypex == 1) {
                                                        if ($dateDifference >= $longDays && !empty($longDays)) {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric, 2));
                                                            }
                                                        } else {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))))), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))), 2));
                                                            }
                                                        }
                                                    } else {
                                                        // For private room price
                                                        if ($dateDifference >= $longDays && !empty($longDays)) {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric * $searched_rooms), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric * $searched_rooms, 2));
                                                            }
                                                        } else {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))) * $searched_rooms)), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))) * $searched_rooms, 2));
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    //echo " -D1- ";
                                                    if ($dateDifference < 2) {
                                                        ?>
                                                        <?php echo " " . __('for') ?> <?= $dateDifference; ?> <?php
                                                        echo __('night');
                                                    } else {
                                                        echo " " . __('for')
                                                        ?> <?= $dateDifference; ?> <?php
                                                        echo __('nights');
                                                    }
                                                    ?>
                                                </h6>
                                            <?php } ?>
                                            <?php if ($htl_rm_pric_frea > 0) { ?>
                                            <?php } else { ?>
                                                <h5>
                                                    <?php
                                                    if ($dateDifference >= $longDays && !empty($longDays)) {

                                                        if (!empty($this->request->session()->read("CURRENCY"))) {

                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2) . '/1' . __('night');
                                                        } else {

                                                            echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2)) . '/2' . __('night');
                                                        }
                                                    } else {

                                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_rm_pric), 2) . '/3' . __('night');
                                                        } else {
                                                            echo 'AOA ' . $this->User->changeFormat(number_format($htl_rm_pric, 2)) . '/4' . __('night');
                                                        }
                                                    }
                                                    ?>

                                                </h5>
                                                <h6 style="color:green;font-size: 15px;">
                                                    <?php
                                                    if ($bookingtypex == 1) {
                                                        if ($dateDifference >= $longDays && !empty($longDays)) {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric, 2));
                                                            }
                                                            //echo $htl_fixrm_pric;exit;
                                                        } else {

                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_rm_pric), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_rm_pric, 2));
                                                            }
                                                        }
                                                    } else {
                                                        // For private room price
                                                        if ($dateDifference >= $longDays && !empty($longDays)) {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric * $searched_rooms), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric * $searched_rooms, 2));
                                                            }
                                                            //echo $htl_fixrm_pric;exit;
                                                        } else {

                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_rm_pric * $searched_rooms), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_rm_pric * $searched_rooms, 2));
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    //echo " -D2- ";
                                                    if ($dateDifference < 2) {
                                                        echo " " . __('for')
                                                        ?> <?= $dateDifference; ?> <?php
                                                        echo __('night');
                                                    } else {
                                                        echo " " . __('for')
                                                        ?> <?= $dateDifference; ?> <?php
                                                        echo __('nights');
                                                    }
                                                    ?>
                                                </h6>
                                                <?php
                                            }
                                            //echo 'hello1';
                                            $bookingtypex = $this->User->getBookingRoomType($list->property_id);
                                            ?>

                                            <div class="form-group" style="margin:0; float: right;">
                                                <label>&nbsp;</label>
                                                <button type="button" class="btn btn-primary hvr-grow btn-fill"><?php echo __('Check Availability') ?></button>
                                            </div>


                                        </div>
                                    </div>
                                </a>
                            <?php } ?>



                            <?php
                            $chkhotelproAsc = $this->User->chkhotelproAsc($result_property, $guest);

                            foreach ($chkhotelproAsc as $list1) {
                                $boostStatus = $this->User->chkBoost($list1->property_id);
                                $htl_rm_pric = $this->User->getHotelprice($list1->property_id, $guest);
                                $htl_fixrm_pric = $this->User->getHotelfixprice($list1->property_id, $guest);
                                $htl_rm_pric_frea = $this->User->get_featured_fee($list1->property_id);
                                $getBetDetails = $this->User->propertyBedCount($list1->property_id, $guest);
                                $bookingtypex = $this->User->getBookingRoomType($list1->property_id);
                                if ($bookingtypex == 2) {
                                    $aminity = $this->User->propertyAmenities($list1->property_id, $guest);
                                } else {
                                    $aminity = $this->User->propertyEntireSearchAmenities($list1->property_id);
                                }
                                $longDays = $this->User->longDays($list1->property_id);
                                if ($res < $htl_rm_pric)
                                    $res = $htl_rm_pric;
                                ?>
                                <a <?php if ($bookingtypex == 2) { ?> href="<?= HTTP_ROOT; ?>preview_private/<?= $list1->property_id; ?>?<?= $_SERVER['QUERY_STRING']; ?>" <?php } else { ?> href="<?= HTTP_ROOT; ?>preview_entire/<?= $list1->property_id; ?>?<?= $_SERVER['QUERY_STRING']; ?>"   <?php } ?> target="_blank">
                                    <div class="hotel-lsting <?php if ($boostStatus == 1) { ?>sponsore-list<?php } ?>">
                                        <?php //pj($list1);  ?>

                                        <div class="hotel-lsting-left">
                                            <?php if ($boostStatus == 1) { ?> <span><?php echo __('Sponsored') ?></span> <?php
                                            } else {
                                                if ($htl_rm_pric_frea > 0) {
                                                    ?>
                                                    <span><?php echo __('Best Price') ?></span>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <div class="hotel-img">
                                                <img src="<?= HTTP_ROOT; ?>img/pro_pic/<?= $this->User->getHotelImage($list1->property_id); ?>" alt="img" style="width: 100%;">
                                            </div>
                                        </div>
                                        <div class="hotel-lsting-middle" style="width: 48%;">
                                            <h3><?= $this->User->getProName($list1->property_id); ?>
                                                <?php for ($i = 1; $i <= $this->User->propertyRating($list1->property_id); $i++) { ?>
                                                    <i class="fa fa-star rating"></i>
                                                <?php } ?>
                                                <i class="fa fa-thumbs-up"></i>
                                            </h3>
                                            <p><i class="fas fa-ruler"></i> <?= $this->User->propertySize($list1->property_id, $guest); ?> <?php echo __('Sqm') ?> <br>
                                                <i class="fas fa-users"></i> <?php
                                                //echo $list->id;

                                                echo $this->User->propertyPeople($list1->property_id, $guest);
                                                if ($this->User->propertyPeople($list1->property_id, $guest) <= 1) {
                                                    ?> <?php echo __('Guest') ?> <?php } else { ?> <?php echo __('Guests') ?> <?php } ?>
                                                <?php if ($bookingtypex == 2) { ?><br>
                                                    <i class="fas fa-bed"></i> <?php echo $getBetDetails->num_bed; ?>x <?php echo __($getBetDetails->beds); ?>  <?php foreach ($getBetDetails->extranets_user_property_sub_beds as $bes) { ?> <?php echo " + " . $bes->num_beds ?>x <?php echo __($bes->beds); ?>

                                                        <?php
                                                    }
                                                }
                                                ?><br>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <?php echo $this->User->stateName($list1->property_id, $guest) . ',' . ' ' . $this->User->cityName($list1->property_id, $guest); ?>                                       <br>
                                                
												<i class="fas fa-check-square"></i>
												<?php
                                                //pj($aminity);
                                                $aminityx = [];
                                                $geta = json_decode($aminity);
                                                $i = 1;
                                                if (!empty($geta)) {
                                                    foreach ($geta as $daee) {
                                                        $aminityx[] = __($daee);
                                                        if ($i++ == 2)
                                                            break;
                                                    }
                                                }
                                                echo implode(', ', $aminityx);
                                                ?>


                                            </p>
                                        </div>
                                        <div class="hotel-lsting-right">
                                            <h6><?php echo $this->User->reviewCount($list1->property_id); ?> <?php echo __('reviews') ?><span><?php
                                                    echo is_nan($this->User->totalRating($list1->property_id)) ? 0 : $this->User->totalRating($list1->property_id);
                                                    echo "/5";
                                                    ?></span></h6>

                                            <h5 class="old-price">
                                                <?php if ($htl_rm_pric_frea > 0) { ?>
                                                    <span><?php echo __('was') ?></span><span>
                                                        <?php
                                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($htl_rm_pric)), 2) . '/11' . __('night');
                                                        } else {
                                                            echo 'AOA ' . $this->User->changeFormat(number_format($htl_rm_pric, 2)) . '/12' . __('night');
                                                        }
                                                        ?>
                                                    </span>
                                                    <?php
                                                } else {
                                                    echo "&nbsp;&nbsp;";
                                                }
                                                ?>
                                            </h5>


                                            <h5><?php if ($htl_rm_pric_frea > 0) { ?>
                                                    <span><?php echo __('now') ?></span>

                                                    <?php
                                                    if ($dateDifference >= $longDays && !empty($longDays)) {
                                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2) . '/13' . __('night');
                                                        } else {
                                                            echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2)) . '/14' . __('night');
                                                        }
                                                    } else {
                                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100)))), 2) . '/15' . __('night');
                                                        } else {
                                                            echo 'AOA ' . $this->User->changeFormat(number_format(($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))), 2)) . '/16' . __('night');
                                                        }
                                                    }
                                                    ?>
                                                </h5>
                                                <h6 style="color:green;font-size: 15px;">
                                                    <?php
                                                    if ($bookingtypex == 1) {
                                                        if ($dateDifference >= $longDays && !empty($longDays)) {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric, 2));
                                                            }
                                                        } else {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))))), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))), 2));
                                                            }
                                                        }
                                                    } else {
                                                        // For private room price
                                                        if ($dateDifference >= $longDays && !empty($longDays)) {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric * $searched_rooms), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric * $searched_rooms, 2));
                                                            }
                                                        } else {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))) * $searched_rooms)), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))) * $searched_rooms, 2));
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    //echo " -D3- ";
                                                    if ($dateDifference < 2) {
                                                        ?>
                                                        <?php echo " " . __('for') ?> <?= $dateDifference; ?> <?php
                                                        echo __('night');
                                                    } else {
                                                        echo " " . __('for')
                                                        ?> <?= $dateDifference; ?> <?php
                                                        echo __('nights');
                                                    }
                                                    ?>
                                                </h6>
                                            <?php } ?>
                                            <?php if ($htl_rm_pric_frea > 0) { ?>
                                            <?php } else { ?>
                                                <h5>
                                                    <?php
                                                    if ($dateDifference >= $longDays && !empty($longDays)) {
                                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2) . '/17' . __('night');
                                                        } else {
                                                            echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2)) . '/18' . __('night');
                                                        }
                                                    } else {
                                                        if (!empty($this->request->session()->read("CURRENCY"))) {
                                                            echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_rm_pric), 2) . '/19' . __('night');
                                                        } else {
                                                            echo 'AOA ' . $this->User->changeFormat(number_format($htl_rm_pric, 2)) . '/20' . __('night');
                                                        }
                                                    }
                                                    ?>

                                                </h5>
                                                <h6 style="color:green;font-size: 15px;">
                                                    <?php
                                                    if ($bookingtypex == 1) {
                                                        if ($dateDifference >= $longDays && !empty($longDays)) {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric, 2));
                                                            }
                                                            //echo $htl_fixrm_pric;exit;
                                                        } else {

                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_rm_pric), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_rm_pric, 2));
                                                            }
                                                        }
                                                    } else {
                                                        // For private room price
                                                        if ($dateDifference >= $longDays && !empty($longDays)) {
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric * $searched_rooms), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric * $searched_rooms, 2));
                                                            }
                                                            //echo $htl_fixrm_pric;exit;
                                                        } else {

                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_rm_pric * $searched_rooms), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_rm_pric * $searched_rooms, 2));
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                    <?php
                                                    //echo " -D4- ";
                                                    if ($dateDifference < 2) {
                                                        echo " " . __('for')
                                                        ?> <?= $dateDifference; ?> <?php
                                                        echo __('night');
                                                    } else {
                                                        echo " " . __('for')
                                                        ?> <?= $dateDifference; ?> <?php
                                                        echo __('nights');
                                                    }
                                                    ?>
                                                </h6>
                                            <?php } ?>

                                            <div class="form-group" style="margin:0; float: right;">
                                                <label>&nbsp;</label>
                                                <button type="button" class="btn btn-primary hvr-grow btn-fill"><?php echo __('Check Availability') ?></button>
                                            </div>

                                        </div>
                                    </div>
                                </a>

                            <?php } ?>
                            <!--                         <div class="hotel-lsting sponsore-list">
                                <div class="hotel-lsting-left">
                                <span>Sponsored</span>
                                <div class="hotel-img">
                                <img src="https://www.alegro.co.ao/img/pro_pic/e84e9c8151d15b569f29ff7f6030a467.jpg" alt="img" style="width: 100%;">
                                </div>
                                </div>
                                <div class="hotel-lsting-middle" style="width: 48%;">
                                <h3>Hotel Angop
                                <i class="fa fa-star rating"></i>
                                <i class="fa fa-star rating"></i>
                                <i class="fa fa-star rating"></i>
                                <i class="fa fa-star rating"></i>
                                <i class="fa fa-star rating"></i>
                                <i class="fa fa-thumbs-up"></i>
                                </h3>
                                <p>111 sqm <br>
                                <i class="fas fa-users"></i> 1 Guest <br>
                                <i class="fas fa-bed"></i> 1x single bed  <br>
                                Free WIFI, Business Center                                    </p>
                                </div>
                                <div class="hotel-lsting-right">
                                <h6>1 reviews<span>3/5</span></h6>

                                <h5 class="old-price">
                                <span>was</span><span>
                                AOA 35,000.00/night
                                </span>
                                </h5>


                                <h5>                                            <span>now</span>

                                AOA 25,000.00/night
                                </h5>
                                <h6 style="color:green;font-size: 15px;">
                                AOA 375,000.00                                             for 15 nights                                        </h6>

                                <div class="form-group" style="margin:0; float: right;">
                                <label>&nbsp;</label>
                                <a href="https://www.alegro.co.ao/preview/4?from_location_name=Luanda&amp;state-name=309&amp;hotel_check_in=11%2F10%2F2019&amp;hotel_check_out=26%2F10%2F2019&amp;rooms=1&amp;adult=1&amp;children=0&amp;page=1" target="_blank"><button type="button" class="btn btn-primary hvr-grow btn-fill">Check Availability</button></a>
                                </div>
                                </div>
                                </div>-->
                        </div>
                        <div id="all_results"></div>
                        <div class="footerResults">

                        </div>
                    <?php } else {
                        ?>
                        <div class='no-result' style=' width: 70%;'>
                            <div class='no-found-logo'>
                                <img src="<?= $this->Url->image('extranet/no-properties.svg'); ?>" alt="" style="width: 130px;margin: 90px 0px 10px 0px;">
                            </div>
                            <h2><?php echo __('No Properties Available') ?></h2>
                            <p><?php echo __('We could not find any properties according to your selected dates. Try searching again with different dates.') ?></p>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 desktop-change" data-toggle="collapse" data-target="#div-ho">
                                <a onclick="topFunction()" href='javascript:void(0)'><?php echo __('Change') ?></a>
                            </div>
                        </div>
                        <?php
                    }
                }
//                if ($search_property_count > 0) {
//                        echo $this->User->htl_sugg($result_property->extract('id'),@$_GET['adult'] + @$_GET['children'], @$_GET['rooms']);
//                        pj($this->User->factor_num(@$_GET['adult'] + @$_GET['children']));
//                    }
                ?>
            </div>
            <!-- Results -->
        </div>

    </div>
</section>
<input type="hidden" id="adult" value="<?php echo @$_GET['adult'] ?>"/>
<input type="hidden" id="children" value="<?php echo @$_GET['children'] ?>"/>
<input type="hidden" id="loction_from" value="<?php echo @$_GET['from_location_name'] ?>"/>
<input type="hidden" id="hotel_check_in_date" value="<?php echo @$_GET['hotel_check_in'] ?>"/>
<input type="hidden" id="hotel_check_out_date" value="<?php echo @$_GET['hotel_check_out'] ?>"/>
<input type="hidden" id="rooms_count" value="<?php echo @$_GET['rooms'] ?>"/>
<h1 text-align="center"><?php echo @$_GET['rooms']?></h1>
<div class="space"></div>

<?php echo $this->element('frontend/inner-footer'); ?>

<script>
    var handlesSlider = document.getElementById('slider-handles');
    noUiSlider.create(handlesSlider, {
        start: [0, <?= $this->User->priceConvert($this->request->session()->read("CURRENCY"), $res); ?>],
        step: 10,
        tooltips: false,
        connect: [false, true, false],
        range: {
            'min': [0],
            'max': [<?= $this->User->priceConvert($this->request->session()->read("CURRENCY"), $res); ?>]
        },
        format: wNumb({
            decimals: 0,
            suffix: ' $',
        })
    });

    handlesSlider.noUiSlider.on('set', function(values, handle) {
        var start = values[0].split(" ")[0];
        var end = values[1].split(" ")[0];

        filterSortResult();

    });
    handlesSlider.noUiSlider.on('update', function(values, handle) {
        var start = values[0].split(" ")[0];
        var end = values[1].split(" ")[0];
        document.getElementById('ccccc').innerHTML = start;
        document.getElementById('ddddd').innerHTML = end;
    });
</script>

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

<script>
    function remove_chkMrk() {
        $("input[name=depart]").prop("checked", false);
        filterSortResult();
    }

    $(document).ready(function() {

        $(".star-rating[name=depart]").click(function() {
            $("input[name=str_un]").prop("checked", false);
            filterSortResult();
        });
<?php
foreach ($allAminities as $key => $allAminitie) {
    ?>
            $(".<?= $this->User->makeSeoUrl($key); ?>").click(function() {
                filterSortResult();
            });
<?php } ?>
        //sortBy
        $("select#sortBy").change(function() {
            filterSortResult();
            var fullurl = window.location.href;
            var getURL = updateQueryStringParameter(fullurl, 'sort_by', $(this).val());
            alert(getURL);
            window.history.pushState({path: getURL}, '', getURL);
        });
    });

    function updateQueryStringParameter(uri, key, value) {
        var re = new RegExp("([?&])" + key + "=.*?(&|#|$)", "i");
        if (value === undefined) {
            if (uri.match(re)) {
                return uri.replace(re, '$1$2');
            } else {
                return uri;
            }
        } else {
            if (uri.match(re)) {
                return uri.replace(re, '$1' + key + "=" + value + '$2');
            } else {
                var hash = '';
                if (uri.indexOf('#') !== -1) {
                    hash = uri.replace(/.*#/, '#');
                    uri = uri.replace(/#.*/, '');
                }
                var separator = uri.indexOf('?') !== -1 ? "&" : "?";
                //alert(uri + separator + key + "=" + value + hash);
                return uri + separator + key + "=" + value + hash;
            }
        }
    }


    function filterSortResult() {
        //alert('hello');
        var arr = [];
        var i = 0;
        $('.star-rating:checked').each(function() {
            arr[i++] = $(this).val();
        });
        var star_rating = arr.join(',');
        var fullurl = window.location.href;
        var getURL = updateQueryStringParameter(fullurl, 'star_rating', star_rating);

        window.history.pushState({path: getURL}, '', getURL);


//
//        if(star_rating){
//            fullurl;
//           var targetUrl=fullurl;
//           var targetTitle='&star_rating='+star_rating;
//
//            window.history.pushState({url: "" + fullurl + ""}, targetTitle, targetUrl);
//        }

<?php
foreach ($allAminities as $key => $allAminitie) {
    ?>
            var <?= str_replace("-", "_", $this->User->makeSeoUrl($key)); ?>;
            var chkArray = [];
            $(".<?= $this->User->makeSeoUrl($key); ?>:checked").each(function() {
                chkArray.push($(this).val());
            });
    <?= str_replace("-", "_", $this->User->makeSeoUrl($key)); ?> = chkArray.join('|');
            var fullurl1 = window.location.href;
            var getURL1 = updateQueryStringParameter(fullurl1, '<?= str_replace("-", "_", $this->User->makeSeoUrl($key)); ?>', chkArray.join(','));

            window.history.pushState({path: getURL1}, '', getURL1);
<?php } ?>
        var st_pri = $('#ccccc').text();
        var ed_pri = $('#ddddd').text();

        var adult = $("#adult").val();
        var children = $("#children").val();
        var loction_from = $("#loction_from").val();
        var hotel_check_in_date = $("#hotel_check_in_date").val();
        var hotel_check_out_date = $("#hotel_check_out_date").val();
        var rooms_count = $("#rooms_count").val();


        var sortby = $("#sortBy option:selected").val();
        //,reservation_policy;

        //alert(window.location.href);

        //?starrating=4,3



        //window.history.pushState({url: "" + targetUrl + ""}, '', '');
        // setCurrentPage(targetUrl);

        //alert(sortby);
        $('#main_search_data').hide();
        jQuery.ajax({
            type: "POST",
            url: pageurl + "users/hotelajaxsearchdata",
            dataType: 'html',
            data: {rooms_count: rooms_count, hotel_check_out_date: hotel_check_out_date, hotel_check_in_date: hotel_check_in_date, children: children, adult: adult, start_price: st_pri, end_price: ed_pri, sortby: sortby, star_rating: star_rating, city: "<?= $_GET['from_location_name']; ?>", top_amenities: top_amenities, property_type: property_type, booking_type: booking_type, url_query: '<?= $_SERVER['QUERY_STRING']; ?>'},
            success: function(res) {

                $("#all_results").html(res);
                topFunction();
                //$('#' + y).removeAttr('class');
                //$('#' + y).attr('class', 'page-item active page-link');


            }
        });

    }

    if ($('#main_search_data').html() == '') {
        alert('45');
    }

    window.onscroll = function() {
        //scrollFunction();
    };
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    function reset_all() {
        // Need to check checkbox if not disabled
        $('.booking-type').prop('checked', true);
        /*
         $('#collapseElem-5 .air_line').prop('checked', true);
         $('input:radio[name=air_stops]').each(function () {
         $(this).prop('checked', false);
         });
         $('input:radio[name=depart]').each(function () {
         $(this).prop('checked', false);
         });
         $('#sortBy option').prop('selected', function () {
         return this.defaultSelected;
         });
         if ($('input[name="orgi"]').is(':checked') && $('input[name="desi"]').is(':checked')) {
         $('#all_results').show();
         $('#n-res').hide();
         $('.tab-results-mob').show();
         } else {
         $('#all_results').hide();
         $('#n-res').show();
         $('.tab-results-mob').hide();
         } */

        handlesSlider.noUiSlider.updateOptions({
            start: [0, <?= $this->User->priceConvert($this->request->session()->read("CURRENCY"), $res); ?>],
            step: 10,
            tooltips: false,
            connect: [false, true, false],
            range: {
                'min': [0],
                'max': [<?= $this->User->priceConvert($this->request->session()->read("CURRENCY"), $res); ?>]
            },
            format: wNumb({
                decimals: 0,
                suffix: ' $',
            })
        });

        $('input[name=depart]').each(function() {
            if ($(this).attr('disabled') == undefined) {
                $(this).prop('checked', true);
            }
        });
        $('.top-amenities').each(function() {
            if ($(this).attr('disabled') == undefined) {
                $(this).prop('checked', true);
            }
        });
        $('.property-type').each(function() {
            if ($(this).attr('disabled') == undefined) {
                $(this).prop('checked', true);
            }
        });
        filterSortResult();

    }

</script>

<?php

function timeago($date1, $date2) {
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400);
}
?>