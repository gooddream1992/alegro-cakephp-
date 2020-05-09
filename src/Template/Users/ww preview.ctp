<?php
$dateDifference = timeago(date_format(date_create(str_replace('/', '-', @$_GET['hotel_check_in'])), 'Y-m-d'), date_format(date_create(str_replace('/', '-', @$_GET['hotel_check_out'])), 'Y-m-d'));
?>
<style>    
    footer {
        background-color: #404156;
        position: relative;
        width: 100%;
        float: left;

    }
    .gm-fullscreen-control{
        display: none!important;
    }
    .non-refund-box ul {
        width: 100% !important;
    }
</style>
<div class="se-pre-con"> 
    <div class="top-end">
        <?php echo $this->element('frontend/login-header'); ?>
        <div class="img-load-ing">           
            <img style="border-radius: 104px; width: 170px; height: 170px; margin-bottom: 40px;" src="<?php if (!empty($this->User->mainImage($result_property->id))) { ?> <?= HTTP_ROOT . 'img/pro_pic/' . $this->User->mainImage($result_property->id); ?><? } elseif (!empty($result_property->photos[0]['url'])) { ?> <?= HTTP_ROOT . 'img/pro_pic/' . $result_property->photos[0]['url']; ?> <?php } else { ?><?= HTTP_ROOT; ?>img/hotel.png<?php } ?>" alt="">
            <center>
                <span style=" font-size: 2em; color:#000;">
                    <?php echo __('Please wait, while we load') ?> <b><?= @$result_property->description->propertyName; ?></b> </span>
            </center>
        </div> 
    </div> 
    <div class="se-pre-img"></div> 
    <div class="top-last" style="color: #000;text-align:  center; font-weight: bold;">
        <span style="font-size: 2rem; color: #7b7b7b;">
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

<!-- jQuery library -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>

<script>
    $(window).load(function () {
        $(".se-pre-con").fadeOut(50);
    });
</script>
<link rel="stylesheet" href="<?= HTTP_ROOT . 'htls/hotel-listing.css'; ?>">
<link rel="stylesheet" href="<?= HTTP_ROOT . 'htls/custom.css'; ?>">
<link rel="stylesheet" href="<?= HTTP_ROOT . 'preview/preview.css'; ?>">

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
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 desktop-change" data-toggle="collapse" data-target="#div-ho"> <a href="javascript:void(0)" id="showMobChange" class="btn-primary btn-change hvr-grow hidden-xs-one"><?php echo __('Change') ?></a> </div>
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

<section class="alavalde-pannel">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="Hotel-valad-left">
                    <h2><?php
                        if (!empty(@$result_property->description->propertyName)) {
                            echo @$result_property->description->propertyName;
                        }
                        ?></h2>
                    <?php
                    if (!empty(@$result_property->description->rating)) {
                        for ($ij = 1; $ij <= $result_property->description->rating; $ij++) {
                            ?>
                            <i class="fa fa-star rating"></i>
                            <?php
                        }
                    };
                    ?>


                    <h6><i class="fas fa-map-marker-alt"></i> <?= @$_GET['from_location_name']; ?>, <?= $this->User->countryHtlName(@$result_property->id); ?></h6>
                    <div class="user"><span><i class="fa fa-users" aria-hidden="true"></i></span>4 <?php echo __('people are looking at this property') ?></div> 
                </div>

            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="Hotel-valad-right">
                    <span><?php echo __('From') ?></span>
                    <h1>AOA <?= changeFormat(number_format($this->User->propertyPrice($result_property->id), 2)); ?></h1>
                    <div class="price">
                        <?php echo __('Price Per Night') ?>
                    </div>
<!--                    <a href="<?= HTTP_ROOT; ?>booking/<?= $result_property->id; ?>?<?= $_SERVER['QUERY_STRING']; ?>">-->
                    <a href="#available-main">
                        <button class="sc-feJyhm bRPwjV sc-kkGfuU fxNDjV sc-iwsKbI hnHAyb"><div class="sc-EHOje dCPIqT" font-size="1"><?php echo __('Choose Room') ?></div></button>
                    </a>
                </div>

            </div>
        </div>
    </div>

</section> 
<div class="modal fade slider-modal" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div id='carousel-custom' class='carousel slide' data-ride='carousel'>
                    <div class='carousel-outer'>
                        <!-- Wrapper for slides -->
                        <div class='carousel-inner'>
                            <?php
                            $all_pro_phos = $this->User->allPhoto($id);
                            $a_r_p_count = 0;
                            foreach ($all_pro_phos as $a_r_p) {
                                ?>
                                <div class='item <?php if ($a_r_p_count == 0) { ?>active<?php } ?>'>
                                    <img class="Mosaic__StyledMainImage-z5yjyw-6 kjaqzp MainImage__StyledMainImage-jr2q7-0 deWuqz" src=" <?= HTTP_ROOT . 'img/pro_pic/' . $a_r_p->url; ?>">
                                </div>
                                <?php
                                $a_r_p_count++;
                            }
                            ?>
                        </div>

                        <!-- Controls -->
                        <a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
                            <span class='glyphicon glyphicon-chevron-left'></span>
                        </a>
                        <a class='right carousel-control' href='#carousel-custom' data-slide='next'>
                            <span class='glyphicon glyphicon-chevron-right'></span>
                        </a>
                    </div>

                    <!-- Indicators -->
                    <ol class='carousel-indicators mCustomScrollbar'>

                        <?php
                        $a_r_p_count = 0;
                        foreach ($all_pro_phos as $a_r_p) {
                            ?>
                            <li data-target='#carousel-custom' data-slide-to='<?= $a_r_p_count; ?>'><img src='<?= HTTP_ROOT . 'img/pro_pic/' . $a_r_p->url; ?>' alt='' /></li>
                            <?php
                            $a_r_p_count++;
                        }
                        ?>

                    </ol>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    function getTop() {
        alert("hello");
        var scrollPos = $("#topClass").offset().top;
        $(window).scrollTop(scrollPos);
    }
</script>
<style>
    .slider-modal .modal-dialog {
        width: 75%;
        margin: 30px auto;
        max-width: 65%;
    }
    .slider-modal .modal-body {
        position: relative;
        padding: 10px;
    }
    #carousel-custom {
        margin: 0;
        width: 100%;
    }
    #carousel-custom .carousel-indicators {
        margin: 10px 0 0;
        overflow: auto;
        position: static;
        text-align: left;
        white-space: nowrap;
        width: 100%;
    }
    #carousel-custom .carousel-indicators li {
        background-color: transparent;
        -webkit-border-radius: 0;
        border-radius: 0;
        display: inline-block;
        height: 50px;
        margin: 0 !important;
        width: 100px;
        overflow: hidden;
    }
    #carousel-custom .carousel-indicators li img {
        display: block;
        opacity: 0.5;
    }
    #carousel-custom .carousel-indicators li.active img {
        opacity: 1;
    }
    #carousel-custom .carousel-indicators li:hover img {
        opacity: 0.75;
    }
    #carousel-custom .carousel-outer {
        position: relative;
    }
    .carousel-inner>.item>a>img, .carousel-inner>.item>img {
        width: 100%;
    }
    #carousel-custom .carousel-indicators li img {
        width: 100%;
        height: 100%;
    }
</style>
<section class="photo-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="gallery clearfix">
                    <div class="col col-12">
                        <div class="zoom-hover three-two">
                            <div class="zoom-inner">
                                <a data-toggle="modal" data-target="#myModal">
                                    <img class="Mosaic__StyledMainImage-z5yjyw-6 kjaqzp MainImage__StyledMainImage-jr2q7-0 deWuqz" src="<?php if (!empty($this->User->mainImage($result_property->id))) { ?> <?= HTTP_ROOT . 'img/pro_pic/' . $this->User->mainImage($result_property->id); ?><? } elseif (!empty($result_property->photos[0]['url'])) { ?> <?= HTTP_ROOT . 'img/pro_pic/' . $result_property->photos[0]['url']; ?> <?php } else { ?>https://q-xx.bstatic.com/xdata/images/hotel/max1280x900/27649043.jpg?k=a44eadf50db66ec793144f4b469ca70774f92279725457390274a05620ea53d9&amp;o=<?php } ?>">
                                </a>
                            </div>
                            <div data-toggle="modal" data-target="#myModal"  class="Mosaic__AbsoluteFlex-z5yjyw-8 kDXaxw sc-ifAKCX jhucMM"><svg class="sc-dnqmqq hhiqKx" color="white" viewBox="0 0 24 24" width="24" height="24" fill="currentcolor"><path d="M22,16V4c0-1.1-0.9-2-2-2H8C6.9,2,6,2.9,6,4v12c0,1.1,0.9,2,2,2h12C21.1,18,22,17.1,22,16z M11,12l2,2.7l3-3.7l4,5H8L11,12z M2,6v14c0,1.1,0.9,2,2,2h14v-2H4V6H2z"></path></svg><div class="sc-EHOje kpninQ" font-size="1" color="white"><?php echo __('See all') ?> <?= count($result_property->photos); ?> <?php echo __('photos') ?></div></div>
                        </div>
                    </div>

                </div>

                <div class="photo-zoom"> 
                    <div class="photo-zoom-left">
                        <div class="col col-12">
                            <div class="zoom-hover three-two">
                                <div class="zoom-inner">
                                    <a data-toggle="modal" data-target="#myModal">
                                        <img class="Mosaic__SmallImage-z5yjyw-7 izbURL Mosaic__StyledMainImage-z5yjyw-6 kjaqzp MainImage__StyledMainImage-jr2q7-0 deWuqz" src="<?php if (!empty($this->User->mainImage($result_property->id)) && ($this->User->mainImageposition($result_property->id) == 1)) { ?> <?= HTTP_ROOT . 'img/pro_pic/' . $result_property->photos[0]['url']; ?> <?php } elseif (!empty($result_property->photos[1]['url'])) { ?> <?= HTTP_ROOT . 'img/pro_pic/' . $result_property->photos[1]['url']; ?> <?php } else { ?>https://q-xx.bstatic.com/xdata/images/hotel/max1280x900/89823787.jpg?k=90d7d3edbf8bd314c964752619e17a5d95cb8f94c7de17fd935c394142f03d0b&amp;o=<?php } ?>">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col col-12">
                            <div class="zoom-hover three-two">
                                <div class="zoom-inner">
                                    <a data-toggle="modal" data-target="#myModal">
                                        <img class="Mosaic__SmallImage-z5yjyw-7 izbURL Mosaic__StyledMainImage-z5yjyw-6 kjaqzp MainImage__StyledMainImage-jr2q7-0 deWuqz" src="<?php if (!empty($this->User->mainImage($result_property->id)) && ($this->User->mainImageposition($result_property->id) == 2)) { ?> <?= HTTP_ROOT . 'img/pro_pic/' . $result_property->photos[0]['url']; ?> <?php } elseif (!empty($result_property->photos[2]['url'])) { ?> <?= HTTP_ROOT . 'img/pro_pic/' . $result_property->photos[2]['url']; ?> <?php } else { ?>https://q-xx.bstatic.com/xdata/images/hotel/max1280x900/89823789.jpg?k=1decc503f7cd7c0d783f520c6e0c5477a474e3c6ef1392650b8b9ea9e3d273c1&amp;o=<?php } ?>">
                                    </a>
                                </div>
                            </div>      
                        </div>
                    </div> 
                    <div class="photo-zoom-right">
                        <div class="included"><?php echo __('INCLUDED FOR FREE') ?></div>
                        <div class="PARKING"><?php echo __('PARKING') ?></div>
                        <div class="p-img"><svg xmlns="https://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 80 80"><g fill="none" fill-rule="evenodd"><circle cx="40" cy="40" r="40" fill="#CEC"></circle><rect width="3" height="20" x="40" y="60" fill="#000"></rect><rect width="3" height="20" x="37" y="60" fill="#687B8E"></rect><g transform="translate(17.111 18)"><rect width="44" height="44" x=".889" fill="#001833" rx="4"></rect><rect width="36" height="36" x="4.889" y="4" fill="#007AFF" rx="2"></rect><path fill="#049" d="M22.8888889,4 L38.8888889,4 C39.9934584,4 40.8888889,4.8954305 40.8888889,6 L40.8888889,38 C40.8888889,39.1045695 39.9934584,40 38.8888889,40 L22.8888889,40 L22.8888889,4 Z" opacity=".4"></path><path fill="#FFF" fill-rule="nonzero" d="M25.0769231,12 L17,12 L17,33 L21.6153846,33 L21.6153846,26 L25.0769231,26 C28.8846154,26 32,22.85 32,19 C32,15.15 28.8846154,12 25.0769231,12 Z M25.3076923,21.3333333 L21.6153846,21.3333333 L21.6153846,16.6666667 L25.3076923,16.6666667 C26.5769231,16.6666667 27.6153846,17.7166667 27.6153846,19 C27.6153846,20.2833333 26.5769231,21.3333333 25.3076923,21.3333333 Z"></path></g></g></svg></div>
                    </div>
                    <div class="photo-under">
                        <div id="load-map">
                            <div id="map" style="width: 100%;height: 100px;"></div>	
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="show-pannel">


                        <div class="show">
                            <div class="sc-bGbJRg eUnBCg sc-ifAKCX bnPiFO" width="1,1,1,0.8,0.8">
                                <?php if (in_array("Swimming Pool", json_decode($result_property->amenity->Top))) { ?>
                                    <div class="sc-jtRlXQ bTRIHf sc-bdVaJa idJkLA">
                                        <svg class="sc-dnqmqq gCwbKF" viewBox="0 0 24 24" width="32" height="32" fill="currentcolor">
                                        <path d="M22,21c-1.1,0-1.7-0.4-2.2-0.6c-0.4-0.2-0.6-0.4-1.1-0.4c-0.6,0-0.8,0.1-1.1,0.4
                                              c-0.5,0.3-1.1,0.6-2.2,0.6s-1.7-0.4-2.2-0.6C12.8,20.1,12.6,20,12,20s-0.8,0.1-1.2,0.4c-0.4,0.2-1,0.6-2.1,0.6S7,20.6,6.5,20.4
                                              C6.1,20.1,5.9,20,5.3,20s-0.8,0.1-1.1,0.4C3.7,20.6,3.1,21,2,21v-2c0.6,0,0.8-0.1,1.1-0.4C3.6,18.4,4.2,18,5.3,18s1.7,0.4,2.2,0.6
                                              C7.9,18.9,8.1,19,8.7,19c0.6,0,0.8-0.1,1.2-0.4c0.4-0.2,1-0.6,2.1-0.6s1.7,0.4,2.2,0.6c0.4,0.2,0.6,0.4,1.2,0.4
                                              c0.6,0,0.8-0.1,1.1-0.4c0.4-0.3,1.1-0.6,2.2-0.6c1.1,0,1.7,0.4,2.2,0.6c0.4,0.2,0.6,0.4,1.1,0.4V21z M22,16.5
                                              c-1.1,0-1.7-0.4-2.2-0.6c-0.4-0.2-0.6-0.4-1.1-0.4c-0.6,0-0.8,0.1-1.1,0.4c-0.5,0.3-1.1,0.6-2.2,0.6s-1.7-0.4-2.2-0.6
                                              c-0.4-0.2-0.6-0.4-1.1-0.4c-0.6,0-0.8,0.1-1.2,0.4c-0.4,0.3-1.1,0.6-2.2,0.6S7,16.1,6.5,15.9c-0.4-0.2-0.6-0.4-1.2-0.4
                                              s-0.8,0.1-1.1,0.4c-0.5,0.3-1.1,0.6-2.2,0.6v-2c0.6,0,0.8-0.1,1.1-0.4c0.5-0.3,1.1-0.6,2.2-0.6s1.7,0.4,2.2,0.6
                                              c0.4,0.2,0.6,0.4,1.1,0.4c0.6,0,0.8-0.1,1.2-0.4c0.5-0.3,1.1-0.6,2.2-0.6s1.7,0.4,2.2,0.6c0.4,0.2,0.6,0.4,1.1,0.4
                                              c0.6,0,0.8-0.1,1.2-0.4c0.4-0.3,1.1-0.6,2.2-0.6c1.1,0,1.7,0.4,2.2,0.6c0.4,0.2,0.6,0.4,1.1,0.4V16.5L22,16.5z M8.7,12
                                              c-0.6,0-0.8-0.1-1.2-0.4c-0.2-0.1-0.4-0.2-0.7-0.4L10,8L9,7C7.9,5.9,6.8,5.5,5,5.5V3c2.5,0,3.9,0.4,5.5,2l6.4,6.4
                                              c-0.1,0.1-0.3,0.2-0.4,0.2c-0.4,0.3-0.6,0.4-1.2,0.4c-0.6,0-0.8-0.1-1.2-0.4c-0.4-0.2-1-0.6-2.1-0.6s-1.7,0.4-2.2,0.6
                                              C9.4,11.9,9.2,12,8.7,12z M16.5,8C15.1,8,14,6.9,14,5.5S15.1,3,16.5,3S19,4.1,19,5.5S17.9,8,16.5,8z"></path>
                                        </svg>
                                        <div class="sc-ckVGcZ fcVQei sc-bdVaJa cZxsvx">
                                            <div class="sc-EHOje dgGyOK" font-size="0"><?= __("Swimming Pool"); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if (in_array("Restaurant", json_decode($result_property->amenity->Top))) { ?>
                                    <div class="sc-jtRlXQ bTRIHf sc-bdVaJa idJkLA">
                                        <svg class="sc-dnqmqq gCwbKF" viewBox="0 0 24 24" width="32" height="32" fill="currentcolor">
                                        <path d="M11,9H9V2H7v7H5V2H3v7c0,2.1,1.7,3.8,3.8,4v9h2.5v-9c2-0.2,3.7-1.9,3.7-4V2h-2V9z M16,6v8h2.5v8
                                              H21V2C18.2,2,16,4.2,16,6z"></path>
                                        </svg>
                                        <div class="sc-ckVGcZ fcVQei sc-bdVaJa cZxsvx">
                                            <div class="sc-EHOje dgGyOK" font-size="0"><?= __("Restaurant"); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (in_array("Free WIFI", json_decode($result_property->amenity->Top))) { ?>
                                    <div class="sc-jtRlXQ bTRIHf sc-bdVaJa idJkLA">
                                        <svg class="sc-dnqmqq gCwbKF" viewBox="0 0 24 24" width="32" height="32" fill="currentcolor">
                                        <path d="M2,9.1l1.8,1.8c4.5-4.5,11.8-4.5,16.4,0L22,9.1C16.5,3.6,7.5,3.6,2,9.1z M9.3,16.3L12,19
                                              l2.7-2.7C13.3,14.8,10.8,14.8,9.3,16.3z M5.6,12.7l1.8,1.8c2.5-2.5,6.5-2.5,9.1,0l1.8-1.8C14.8,9.2,9.2,9.2,5.6,12.7z"></path>
                                        </svg>
                                        <div class="sc-ckVGcZ fcVQei sc-bdVaJa cZxsvx">
                                            <div class="sc-EHOje dgGyOK" font-size="0"><?= __("Free Internet Access"); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (in_array("Free Internet Access", json_decode($result_property->amenity->Top))) { ?>
                                    <div class="sc-jtRlXQ bTRIHf sc-bdVaJa idJkLA">
                                        <svg class="sc-dnqmqq gCwbKF" viewBox="0 0 24 24" width="32" height="32" fill="currentcolor">
                                        <path d="M12.5,3h-7v18h4v-6h3c3.3,0,6-2.7,6-6S15.8,3,12.5,3z M12.7,11H9.5V7h3.2c1.1,0,2,0.9,2,2
                                              S13.8,11,12.7,11z"></path>
                                        </svg>
                                        <div class="sc-ckVGcZ fcVQei sc-bdVaJa cZxsvx">
                                            <div class="sc-EHOje dgGyOK" font-size="0"><?= __("Free Parking"); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (in_array("Free Parking", json_decode($result_property->amenity->Top))) { ?>
                                    <div class="sc-jtRlXQ bTRIHf sc-bdVaJa idJkLA">
                                        <svg class="sc-dnqmqq gCwbKF" viewBox="0 0 24 24" width="32" height="32" fill="currentcolor">
                                        <path d="M20.6,14.9l1.4-1.4L20.6,12L17,15.6L8.4,7L12,3.4L10.6,2L9.1,3.4L7.7,2L5.6,4.1L4.1,2.7L2.7,4.1l1.4,1.4L2,7.7
                                              l1.4,1.4L2,10.6L3.4,12L7,8.4l8.6,8.6L12,20.6l1.4,1.4l1.4-1.4l1.4,1.4l2.1-2.1l1.4,1.4l1.4-1.4l-1.4-1.4l2.1-2.1L20.6,14.9z"></path>
                                        </svg>
                                        <div class="sc-ckVGcZ fcVQei sc-bdVaJa cZxsvx">
                                            <div class="sc-EHOje dgGyOK" font-size="0"><?= __("Fitness Center"); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (in_array("Airport Shuttle", json_decode($result_property->amenity->Top))) { ?>
                                    <div class="sc-jtRlXQ bTRIHf sc-bdVaJa idJkLA">
                                        <svg class="sc-dnqmqq gCwbKF" viewBox="0 0 24 24" width="32" height="32" fill="currentcolor">
                                        <path d="M16.5,5.5H3.8C2.8,5.5,2,6.3,2,7.4v8.4h1.8c0,1.5,1.2,2.8,2.7,2.8s2.7-1.3,2.7-2.8h5
                                              c0,1.5,1.2,2.8,2.7,2.8s2.7-1.3,2.7-2.8H22v-4.6L16.5,5.5z M3.8,11.1V7.4h3.6v3.7H3.8z M6.5,17.1c-0.7,0-1.4-0.6-1.4-1.4
                                              c0-0.7,0.6-1.4,1.4-1.4s1.4,0.7,1.4,1.4C7.9,16.5,7.3,17.1,6.5,17.1z M12.9,11.1H9.3V7.4h3.6V11.1z M17,17.1c-0.7,0-1.4-0.6-1.4-1.4
                                              c0-0.7,0.6-1.4,1.4-1.4s1.4,0.7,1.4,1.4C18.4,16.5,17.7,17.1,17,17.1z M14.7,11.1V7.4h0.9l3.6,3.7H14.7z"></path>
                                        </svg>
                                        <div class="sc-ckVGcZ fcVQei sc-bdVaJa cZxsvx">
                                            <div class="sc-EHOje dgGyOK" font-size="0"><?= __("Airport Shuttle"); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (in_array("Business Center", json_decode($result_property->amenity->Top))) { ?>
                                    <div class="sc-jtRlXQ bTRIHf sc-bdVaJa idJkLA">
                                        <svg class="sc-dnqmqq gCwbKF" viewBox="0 0 24 24" width="32" height="32" fill="currentcolor">
                                        <path d="M10,16v-1H3v4c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2v-4h-7v1H10z M20,7h-4V5l-2-2h-4L8,5v2H4
                                              C2.9,7,2,7.9,2,9v3c0,1.1,0.9,2,2,2h6v-2h4v2h6c1.1,0,2-0.9,2-2V9C22,7.9,21.1,7,20,7z M14,7h-4V5h4V7z"></path>
                                        </svg>
                                        <div class="sc-ckVGcZ fcVQei sc-bdVaJa cZxsvx">
                                            <div class="sc-EHOje dgGyOK" font-size="0"><?= __("Business Center"); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if (in_array("Non-smoking Rooms", json_decode($result_property->amenity->Top))) { ?>
                                    <div class="sc-jtRlXQ bTRIHf sc-bdVaJa idJkLA">
                                        <svg class="sc-dnqmqq gCwbKF" viewBox="0 0 24 24" width="32" height="32" fill="currentcolor">
                                        <path d="M2,5.5l7,7H2v3h10l7,7l1.3-1.2l-17-17L2,5.5z M20.5,12.5H22v3h-1.5V12.5z M18,12.5h1.5v3H18
                                              V12.5z M18.9,4.4c0.6-0.6,1-1.5,1-2.4h-1.5c0,1-0.8,1.8-1.9,1.8v1.5c2.2,0,4,1.8,4,4.1v2.1H22V9.4C22,7.2,20.7,5.3,18.9,4.4z
                                              M14.5,8.2H16c1.1,0,2,0.7,2,2.1v1.2h1.5V9.9c0-1.8-1.6-3.2-3.5-3.2h-1.5c-1,0-1.9-1-1.9-2s0.8-1.8,1.9-1.8V1.5
                                              c-1.9,0-3.4,1.5-3.4,3.3S12.6,8.2,14.5,8.2z M17,15.4v-2.9h-2.9L17,15.4z"></path>
                                        </svg>
                                        <div class="sc-ckVGcZ fcVQei sc-bdVaJa cZxsvx">
                                            <div class="sc-EHOje dgGyOK" font-size="0"><?= __("No Smoking Rooms/Facilities"); ?></div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>


                        <div class="show-all"><a href="#Amenities-part"><?php echo __('Show All Amenities') ?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="reasons-book">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="reasons-book-left">
                    <div class="rait-bg">
                        <div class="rait-bg-text">
                            7.3
                        </div>
                        <span><?php echo __('Guest Rating') ?></span>
                    </div>
                    <div class="Overall-Score"><h6><?php echo __('Overall Score') ?><span>7.3</span></h6>
                        <div class="sc-ifAKCX ikWgaA"><div class="sc-bdVaJa nTO" height="8px" width="1"><div class="BarGraph__AnimationBox-sc-1cfbrgw-0 idCQYO sc-bdVaJa bOsipX" height="8px"></div></div></div>
                    </div>
                    <div class="Score-breakdown">
                        <?php echo __('Score breakdown') ?> (<?php echo __('based on') ?> <span><a data-toggle="modal" data-target="#myModala" style="cursor: pointer; color: #c39e00;">22 <?php
                        if ($dateDifference == 1) {
                            echo __('review');
                        } else {
                            echo __('reviews');
                        }
                        ?></a></span>)
                    </div>
                    <div class="clean-rait"><h6><?php echo __('CLEANLINESS') ?><span>7.9</span></h6>
                        <div class="sc-ifAKCX ikWgaA"><div class="sc-bdVaJa nTO" height="4px" width="1"><div class="BarGraph__AnimationBox-sc-1cfbrgw-0 fqejTW sc-bdVaJa kViweL" height="4px"></div></div></div>
                    </div>

                    <div class="staff-rait"><h6><?php echo __('STAFF') ?><span>7.2</span></h6>
                        <div class="sc-ifAKCX ikWgaA"><div class="sc-bdVaJa nTO" height="4px" width="1"><div class="BarGraph__AnimationBox-sc-1cfbrgw-0 fqejTW sc-bdVaJa kViweL" height="4px"></div></div></div>
                    </div>

                    <div class="staff-rait"><h6><?php echo __('LOCATION') ?><span>7.2</span></h6>
                        <div class="sc-ifAKCX ikWgaA"><div class="sc-bdVaJa nTO" height="4px" width="1"><div class="BarGraph__AnimationBox-sc-1cfbrgw-0 fqejTW sc-bdVaJa kViweL" height="4px"></div></div></div>
                    </div>
                    <div class="Score-breakdown">
                        <?php echo __('All ratings are from verified guests of this property') ?>                  </div>
                </div>

            </div>
            <div class="modal fade slider-modal" id="myModala" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body" style="padding: 0;">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="modal-header">
                                <h4><?= __("Guest Reviews & Ratings"); ?></h4>
                                <div class="d-table-cell">
                                    <select name="" id="sortBy" class="sortBy" style="display: none;">
                                        <option value="lth"><?= __("All Reviews"); ?></option>
                                        <option value="htl"><?= __("Latest"); ?></option>
                                        <option value="str"><?= __("Oldest"); ?></option>
                                        <option value="rev"><?= __("Stars"); ?></option>
                                    </select>
                                    <div class="nice-select sortBy" tabindex="0"><span class="current"><?= __("All Reviews"); ?></span><ul class="list"><li data-value="lth" class="option selected focus"><?= __("All Reviews"); ?></li><li data-value="htl" class="option"><?= __("Latest"); ?></li><li data-value="str" class="option"><?= __("Oldest"); ?></li><li data-value="rev" class="option"><?= __("Stars"); ?></li></ul></div>
                                    <i class="fa fa-angle-down formIconSort"></i>
                                </div>
                            </div>
                            <div class="review-page-left">               
                                <div class="review-b-le">
                                    <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                    <h5>Jason Tonn</h5> <span>09 April 2019</span>
                                    <div class="rating-line">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span> 5/5</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                                </div>


                                <div class="review-b-le">
                                    <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                    <h5>Jason Tonn</h5> <span>09 April 2019</span>
                                    <div class="rating-line">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span> 5/5</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                                </div>

                                <div class="review-b-le">
                                    <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                    <h5>Jason Tonn</h5> <span>09 April 2019</span>
                                    <div class="rating-line">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span> 5/5</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                                </div>


                                <div class="review-b-le">
                                    <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                    <h5>Jason Tonn</h5> <span>09 April 2019</span>
                                    <div class="rating-line">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span> 5/5</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                                </div><div class="review-b-le">
                                    <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                    <h5>Jason Tonn</h5> <span>09 April 2019</span>
                                    <div class="rating-line">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span> 5/5</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="reasons-book-right">
                    <h4><?= __("About this property"); ?></h4>
                    <!--                    <div id='less-content'>
                                            <p><?= substr(nl2br($result_property->description->describeYourPlace), 0, 705); ?></p>
                                            <div><span onclick="$('#less-content').hide();$('#more-content').show();">Read More...</span></div>                
                                        </div>
                    
                                        <div id='more-content' style="display:none;">
                                            <p  ><?= nl2br($result_property->description->describeYourPlace); ?></p>
                                            <div id="reasons-book-read-less" ><span onclick="$('#less-content').show();$('#more-content').hide();$('#less-content').append('<div class=\'clearfix\'></div>');" >Read Less...</span></div>
                                        </div>-->
                    <div class='comment more' >
                        <?= nl2br($result_property->description->describeYourPlace); ?></

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="available-room">
    <div class="container">
        <div class="available-main" id="available-main">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h4><?= __("Available Rooms"); ?></h4>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <h5><?= __("Best Price."); ?><span><?= __("GUARANTEED."); ?></span></h5>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" >
                    <div class="available-box">
                        <div class="available-box-left">
                            <ul>
                                <li><i class="fa fa-calendar"></i><?= $_GET['hotel_check_in']; ?> - <?= $_GET['hotel_check_out']; ?></li>
                                <li><i class="fa fa-key"></i> <?php echo __(@$_GET['rooms']); ?> <?php if ($_GET['rooms'] <= 1) { ?> <?php echo __('Room') ?> <?php } else { ?> <?php echo __('Rooms') ?> <?php } ?></li>
                                <li><i class="fa fa-user" aria-hidden="true"></i><?= @$_GET['adult'] + @$_GET['children']; ?>
                                    <?php if ($_GET['adult'] + @$_GET['children'] == 1) { ?> <?php echo __('Guest') ?> <?php } else { ?><?php echo __('Guests') ?><?php } ?> </li>
                            </ul>
                        </div>
                        <div class="available-box-right">
                            <div class="update-search collapsed" data-toggle="collapse" data-target="#div-ho" aria-expanded="false" onclick="jumpTop();">
                                <button class="button"><?= __("Update Search"); ?></button>
                            </div>
                        </div>
                        <script>
                            function jumpTop() {
                                $("html, body").animate({scrollTop: 0}, "slow");
                            }
                        </script>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="room-type">
                        <ul>
                            <li style="width: 60%;"><?= __("Room Type"); ?></li>
                            <li style="width: 30%;"><?= __("Room Details"); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12" id="topClass" >
                    <?php
                    $coun = 1;
                    foreach ($this->User->getAllRooms($id) as $htl_rm) {
                        $rm_photo = $this->User->allPhoto($id, $htl_rm->id);
                        $htl_rm_pric_frea = $this->User->get_featured_fee($htl_rm->property_id);
                        $coun++;
                        $avail = $this->User->getAvailability($htl_rm->id);
                        ?>
                        <div class="listing-box" >
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 room-type-name"><h5><?= $htl_rm->bed_name ?></h5></div>
                            </div>
                            <div class="row">
                                <div class=" col-sm-12 col-md-12 col-lg-12">
                                    <div class="best-match-main">
                                        <div class="best-match-left">
                                            <div class="best-match-left-img">
                                                <div id="myCarousel<?= $htl_rm->id; ?>" class="carousel slide" data-ride="carousel">
                                                    <!-- Indicators -->
                                                    <ol class="carousel-indicators">
                                                        <?php
                                                        $icrp = 0;
                                                        foreach ($rm_photo as $pht) {
                                                            ?>
                                                            <li data-target="#myCarousel<?= $htl_rm->id; ?>" data-slide-to="<?= $icrp; ?>" class="<?php if ($icrp == 0) { ?>active<?php } ?>"></li>
                                                            <?php
                                                            $icrp++;
                                                        }
                                                        ?>
                                                    </ol>

                                                    <!-- Wrapper for slides -->
                                                    <div class="carousel-inner" role="listbox">

                                                        <?php
                                                        $icrp = 0;
                                                        foreach ($rm_photo as $pht) {
                                                            ?>

                                                            <div class="item <?php if ($icrp == 0) { ?>active<?php } ?>">
                                                                <img src="<?= HTTP_ROOT . 'img/pro_pic/' . $pht->url; ?>">
                                                            </div>
                                                            <?php
                                                            $icrp++;
                                                        }
                                                        ?>




                                                    </div>

                                                    <!-- Left and right controls -->
                                                    <a class="left carousel-control arrow-box" href="#myCarousel<?= $htl_rm->id; ?>" role="button" data-slide="prev">
                                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                        <span class="sr-only"><?php echo __('Previous') ?></span>
                                                    </a>
                                                    <a class="right carousel-control arrow-box" href="#myCarousel<?= $htl_rm->id; ?>" role="button" data-slide="next">
                                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                        <span class="sr-only"><?php echo __('Next') ?></span>
                                                    </a>
                                                </div>

                                                <div class="double-room-icon"><i class="fa fa-file-image-o" aria-hidden="true"></i></div>
                                            </div>
                                            <ul>
                                                <li><span><i class="fas fa-bed"></i></span>

                                                    <?= __($htl_rm->num_bed); ?> <?= __($htl_rm->beds); ?>
                                                    <?php
                                                    $sbdn = '';
                                                    foreach (@$this->User->getSubbed(@$htl_rm->user_id, @$htl_rm->property_id, @$htl_rm->id) as $sb_rm) {
                                                        $sbdn .= ' + ' . __($sb_rm->num_beds) . ' ' . __($sb_rm->beds);
                                                    }
                                                    echo $sbdn;
                                                    ?>


                                                </li>
    <!--                                                <li><span><i class="fas fa-expand-arrows-alt" style="font-size: 15px;"></i></span> Room Size:111ft</li>-->
                                                <li><span><i class="fas fa-users"></i></span><?= __("This room"); ?> <?php echo __('can accommodate up to'); ?>  <?php
                                                    $people = $this->User->getAccomodation(@$htl_rm->id);
                                                    echo $people . ' ';
                                                    if ($people == 1) {
                                                        echo __('person');
                                                    } else {
                                                        echo __('people');
                                                    }
                                                    ?>   </li>
                                                <li style="text-align: left;">
                                                    <span style="float:left;"><i class="fas fa-users"></i></span>
                                                    <div class="cancellation" >
                                                        <?php
                                                        echo "<b>" . __('Cancellation Policy') . ' ' . __($avail->cancellation) . '</b><br>';
                                                        if ($avail->cancellation == "Flexible") {
                                                            echo __("Guests can cancel up to 1 day prior to check-in for a 100% refund. In case of a no show, you will receive 100% of the booking price.");
                                                        } elseif ($avail->cancellation == "Moderate") {
                                                            echo __("Guests can cancel up to 5 days prior to check-in for a 100% refund. In case of a no show, you will receive 100% of the booking price.");
                                                        } elseif ($avail->cancellation == "Strict") {
                                                            echo __("Guests can cancel up to 7 days prior to check-in for a 50% refund. In case of a no show, you will receive 100% of the booking price.");
                                                        }
                                                        ?>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="non-refund-middle">
    <!--                                                    <div class="Best-Deal"><a href="#"><i class="fa fa-dollar"></i>Best Deal</a></div>-->
                                                <?php if ($htl_rm->room_count >= $_GET['rooms']) { ?>
                                                    <div class="non-refund-price" style="float:right">
                                                        <h5 class="old-price">
                                                            <?php if ($htl_rm_pric_frea > 0) { ?>
                                                                <span>was</span><span>AOA <?= changeFormat(number_format($htl_rm->pricing->price_main, 2)); ?>/<?php echo __('night') ?></span>
                                                                <?php
                                                            } else {
                                                                echo "&nbsp;&nbsp;";
                                                            }
                                                            ?>
                                                        </h5>
                                                        <h5 class="new-price">
                                                            <?php $htl_rm_pric = $htl_rm->pricing->price_main; ?>

                                                            <?php if ($htl_rm_pric_frea > 0) { ?>
                                                                <span>now</span>
                                                                AOA <?= changeFormat(number_format(($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))), 2)); ?>/<?php echo __('night') ?>
                                                            <?php } else { ?>
                                                                AOA <?= changeFormat(number_format($htl_rm_pric, 2)); ?>/<?php echo __('night') ?>
                                                            <?php } ?> 



                                                        </h5>
                                                        <p class="text text-success" style="font-weight: normal;font-size: 15px;">
                                                            <?php if ($htl_rm_pric_frea > 0) { ?>
                                                                <?php echo __('AOA') ?> <?= changeFormat(number_format(($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100)))), 2)); ?> <?= __("for"); ?> <?= $dateDifference; ?>
                                                            <?php } else { ?>
                                                                <?php echo __('AOA') ?> <?= changeFormat(number_format(($dateDifference * $htl_rm_pric), 2)); ?> <?= __("for"); ?> <?= $dateDifference; ?>
                                                                <?php
                                                            }
                                                            if ($dateDifference == 1) {
                                                                echo __('night');
                                                            } else {
                                                                echo __('nights');
                                                            }
                                                            ?></p>
                                                    </div>

                                                </div>
                                                <div class="non-refund-right"  style="float:right">
                                                    <a href="<?= HTTP_ROOT; ?>booking/<?= $htl_rm->id; ?>?<?= $_SERVER['QUERY_STRING']; ?>" ><?php echo __('Book') ?></a>
                                                </div>
                                            <?php } else { ?>

                                                <div class="non-refund-right"  style="float:right;width:100%;opacity: 0.5;">
                                                    <?= __("Fully Booked"); ?>
                                                </div>
                                            <?php } ?>
                                            <h3><?php echo __('Room Details and Photos') ?> <i class="fa fa-chevron-right" aria-hidden="true"></i></h3> 
                                        </div>
                                        <div class="best-match-right">
                                            <div class="non-refund-box" id="am_<?= $coun; ?>" style="height:160px;overflow: hidden;">
                                                <?php
                                                $Topaminity = json_decode($this->User->propertyAmenitiesRoom($htl_rm->id));
                                                if ($Topaminity[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <h5><?php echo __('Top Amenities') ?></h5>
                                                        <ul>
                                                            <?php
                                                            //pj($aminity);

                                                            foreach ($Topaminity as $top) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($top); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>
                                                <?php
                                                $roomAmenitiesData = $this->User->propertyRoomAmenities($htl_rm->id);
                                                $Parking = json_decode($roomAmenitiesData->Parking);
                                                if ($Parking[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <!--<h5>Parking & Transportation </h5>-->
                                                        <ul>
                                                            <?php
                                                            foreach ($Parking as $park) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($park); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>

                                                <?php
                                                $Guest = json_decode($roomAmenitiesData->Services);
                                                if ($Guest[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <!--<h5>Guest Services  </h5>-->
                                                        <ul>
                                                            <?php
                                                            foreach ($Guest as $gusts) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($gusts); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>

                                                <?php
                                                @$Accessibility = json_decode($roomAmenitiesData->Accessibility);
                                                if (@$Accessibility[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <!--<h5>Accessibility   </h5>-->
                                                        <ul>
                                                            <?php
                                                            foreach ($Accessibility as $access) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($access); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>

                                                <?php
                                                @$Facilities = json_decode($roomAmenitiesData->Facilities);
                                                if (@$Facilities[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <!--<h5>Facilities </h5>-->
                                                        <ul>
                                                            <?php
                                                            foreach ($Facilities as $facilities) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($facilities); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>

                                                <?php
                                                @$Activities = json_decode($roomAmenitiesData->Activities);
                                                if (@$Activities[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <!--<h5>Activities & Entertainment  </h5>-->
                                                        <ul>
                                                            <?php
                                                            foreach ($Activities as $activitie) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($activitie); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>


                                                <?php
                                                @$Food = json_decode($roomAmenitiesData->Food);
                                                if (@$Food[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <!--<h5>Food & Drink   </h5>-->
                                                        <ul>
                                                            <?php
                                                            foreach ($Food as $Foods) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($Foods); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>



                                                <?php
                                                @$Kitchen = json_decode($roomAmenitiesData->Kitchen);
                                                if (@$Kitchen[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <!--<h5>Kitchen & Dining    </h5>-->
                                                        <ul>
                                                            <?php
                                                            foreach (@$Kitchen as $Kitch) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($Kitch); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>

                                                <?php
                                                @$Media = json_decode($roomAmenitiesData->Media);
                                                if (@$Media[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <!--<h5>Media/Technology     </h5>-->
                                                        <ul>
                                                            <?php
                                                            foreach ($Media as $Medias) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($Medias); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>


                                                <?php
                                                @$Meetings = json_decode($roomAmenitiesData->Meetings);
                                                if (@$Meetings[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <!--<h5>Meetings & Events      </h5>-->
                                                        <ul>
                                                            <?php
                                                            foreach ($Meetings as $Meeting) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($Meeting); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>

                                                <?php
                                                @$Essentials = json_decode($roomAmenitiesData->Essentials);
                                                if (@$Essentials[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <!--<h5>Essentials</h5>-->
                                                        <ul>
                                                            <?php
                                                            foreach ($Essentials as $Essential) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($Essential); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>

                                                <?php
                                                @$Pools = json_decode($roomAmenitiesData->Pools);
                                                if (@$Pools[0] != '') {
                                                    ?>
                                                    <div class="non-refund-left">
                                                        <!--<h5>Meetings & Events </h5>-->
                                                        <ul>
                                                            <?php
                                                            foreach ($Pools as $Poolss) {
                                                                ?>
                                                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path>
                                                                    </svg><?php echo __($Poolss); ?> </li>
                                                            <?php } ?>      
                                                        </ul>


                                                    </div>
                                                <?php } ?>


                                            </div>
                                            <div id="l-h<?= $coun; ?>" style="display:none;"  onclick="lessHeight('am_<?= $coun; ?>',<?= $coun; ?>)"> Show less <i class="fa fa-angle-up" aria-hidden="true"></i>
                                            </div>
                                            <div id="m-h<?= $coun; ?>"   onclick="moreHeight('am_<?= $coun; ?>',<?= $coun; ?>)"> Show more <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <script>
                    function lessHeight(id, c) {
                        $('#l-h' + c).hide();
                        $('#m-h' + c).show();
                        $('#' + id).removeAttr('style');
                        $('#' + id).attr('style', 'height:160px;overflow:hidden;');
                    }
                    function moreHeight(id, c) {
                        $('#m-h' + c).hide();
                        $('#l-h' + c).show();
                        $('#' + id).removeAttr('style');
                        $('#' + id).attr('style', 'height:auto;overflow:hidden;');
                    }
                </script>
            </div>
        </div>
    </div>
</section>
<section class="similar-hotel">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="Similar-Hotels">
                    <h1><?php echo __('Similar properties in') ?> <?= @$_GET['from_location_name']; ?>, <?= $this->User->countryHtlName(@$result_property->id); ?></h1>
                    <h6><?php echo __('Compare to other properties in this area before you book:') ?></h6>
                    <div class="Similar-Hotels-part">
                        <div class="Similar-first-box">
                            <ul>
                                <li><?php echo __('Guest Score') ?></li>
                                <li><?php echo __('Neighbourhood') ?></li>
                                <li><?php echo __('Price Per Night') ?></li>
                            </ul>
                        </div>
                        <?php if (!empty($this->User->mainImage($result_property->id))) { ?>
                            <style>
                                .Hotel-alvalade-img{
                                    background: url(<?= HTTP_ROOT . 'img/pro_pic/' . $this->User->mainImage($result_property->id); ?>)no-repeat;
                                    background-size: 100%;
                                }
                            </style>

                        <?php } elseif (!empty($result_property->photos[0]['url'])) { ?>
                            <style>
                                .Hotel-alvalade-img{
                                    background: url(<?= HTTP_ROOT . 'img/pro_pic/' . $result_property->photos[0]['url']; ?>)no-repeat;
                                    background-size: 100%;
                                }
                            </style>

                        <?php } ?>
                        <?php
                        $chArray = $this->User->getRelated(@$_GET['from_location_name'], $result_property->id);
                        $iOne = array_values($chArray);
                        ?>
                        <div class="Similar-right-box">
                            <div class="Hotel-Alvalade">
                                <div class="Hotel-alvalade-img">
                                    <div class="sc-fdQOMr gkGSap sc-bdVaJa cZxsvx">
                                        <div class="sc-ifAKCX erTWuZ">
                                            <div class="sc-kEYyzF kkFIwK sc-ckVGcZ fcVQei sc-bdVaJa cZxsvx">
                                                <div class="sc-jKJlTe bJkPay sc-bdVaJa hzqSze" width="4px" color="green"></div>
                                            </div>
                                            <div class="sc-hMqMXs gFefWB sc-bdVaJa bJEBDd" color="white"><?php echo __('YOUR CHOICE') ?></div><div class="sc-eNQAEJ cjzXts sc-bdVaJa ixfMKR" width="18px" color="green"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Hotel-alvalade-text"><?= $result_property->description->propertyName; ?></div>
                                <div class="sc-gmeYpB biLYnU" data-unit-id="STAR_WRAP" data-autobot-element-id="HTL_DETAIL_HOTEL_STARS" alt="4 stars">
                                    <?php
                                    if (!empty(@$result_property->description->rating)) {
                                        for ($ij = 1; $ij <= $result_property->description->rating; $ij++) {
                                            ?>
                                            <svg class="sc-kZmsYB eUgsT sc-dnqmqq fwnzLk" data-unit-id="FULL_STAR" color="gray" viewBox="0 0 24 24" width="24" height="24" fill="currentcolor"><path d="M12,1.54L14.55,9.6,23,9.53l-6.87,4.91,2.67,8-6.8-5-6.8,5,2.67-8L1,9.53,9.45,9.6Z"></path></svg>
                                            <?php
                                        }
                                    }
                                    ?>

                                </div>
                                <div class="sc-eMRERa hAZDpl sc-bdVaJa cDiPQh"><div class="sc-EHOje hSElwR" font-size="1" color="black">7.3 / 10</div></div>
                                <div class="sc-eMRERa hAZDpl sc-bdVaJa cDiPQh"><div class="sc-fAjcbJ dtkclf sc-EHOje hSElwR" font-size="1" color="black"><?= $this->User->stateName(@$result_property->id); ?></div></div>

                                <div class="sc-ileJJU gbSOWI sc-bdVaJa kRGLvU"><div class="sc-EHOje tkrSK" color="green" font-size="2">AOA <?= changeFormat(number_format($this->User->propertyPrice($result_property->id), 2)); ?></div></div>

                                <div class="sc-bdVaJa fJntgG">
                                    <button class="sc-kkGfuU fxNDjV sc-iwsKbI jHpzKw" id="compare-tray-choose-room-button" data-autobot-element-id="HTL_DETAIL_SIMILAR_HOTEL_CHOOSE"><?= __("Choose Roomed"); ?></button></div>
                            </div>
                            <?php
                            if (!empty($iOne[0])) {
                                $fstHotel = $this->User->getDataForHotel($iOne[0]);
                                $fstImgUrl = "";
                                foreach ($fstHotel->photos as $fstPhoto) {
                                    if ($fstPhoto->is_main == 1) {
                                        $fstImgUrl = $fstPhoto->url;
                                    }
                                    if ($fstImgUrl == '') {
                                        $fstImgUrl = $fstPhoto->url;
                                    }
                                }
                                ?>
                                <?php if (!empty($fstImgUrl)) { ?>
                                    <style>
                                        .Hotel-Presidente-img{
                                            background: url(<?= HTTP_ROOT . 'img/pro_pic/' . $fstImgUrl; ?>)no-repeat;
                                            background-size: 100%;
                                        }
                                    </style>

                                <?php } ?>
                                <div class="Hotel-Presidente">
                                    <div class="Hotel-Presidente-img">
                                        <div class="sc-fdQOMr gkGSap sc-bdVaJa cZxsvx">
                                            <div class="sc-ifAKCX erTWuZ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Hotel-alvalade-text"><?= $fstHotel->description->propertyName; ?></div>
                                    <div class="sc-gmeYpB biLYnU" data-unit-id="STAR_WRAP" data-autobot-element-id="HTL_DETAIL_HOTEL_STARS" alt="4 stars">
                                        <?php
                                        for ($cntr1 = 1; $cntr1 <= $fstHotel->description->rating; $cntr1++) {
                                            ?>
                                            <svg class="sc-kZmsYB eUgsT sc-dnqmqq fwnzLk" data-unit-id="FULL_STAR" color="gray" viewBox="0 0 24 24" width="24" height="24" fill="currentcolor"><path d="M12,1.54L14.55,9.6,23,9.53l-6.87,4.91,2.67,8-6.8-5-6.8,5,2.67-8L1,9.53,9.45,9.6Z"></path></svg>   
                                        <?php } ?>
                                    </div>
                                    <div class="sc-eMRERa hAZDpl sc-bdVaJa cDiPQh"><div class="sc-EHOje hSElwR" font-size="1" color="black">7.3 / 10</div></div>
                                    <div class="sc-eMRERa hAZDpl sc-bdVaJa cDiPQh"><div class="sc-fAjcbJ dtkclf sc-EHOje hSElwR" font-size="1" color="black"><?= $fstHotel->location->state; ?></div></div>

                                    <div class="sc-ileJJU gbSOWI sc-bdVaJa kRGLvU"><div class="sc-EHOje tkrSK" color="green" font-size="2">AOA <?= changeFormat(number_format($this->User->propertyPrice($fstHotel->id), 2)); ?></div></div>

                                    <div class="sc-bdVaJa fJntgG"><a href="<?= HTTP_ROOT; ?>users/preview/<?= $iOne[0]; ?>?<?= $_SERVER['QUERY_STRING']; ?>"><button class="sc-cNQqM eKqHMe sc-iwsKbI jHpzKw" data-autobot-element-id="HTL_DETAIL_SIMILAR_HOTEL_SELECT"><?php echo __('Select') ?></button></a></div>

                                </div>
                                <?php
                            }if (!empty($iOne[1])) {
                                $sndHotel = $this->User->getDataForHotel($iOne[1]);
                                $sndImgUrl = "";
                                foreach ($sndHotel->photos as $fstPhoto1) {
                                    if ($fstPhoto1->is_main == 1) {
                                        $sndImgUrl = $fstPhoto1->url;
                                    }
                                    if ($sndImgUrl == "") {
                                        $sndImgUrl = $fstPhoto1->url;
                                    }
                                }
                                ?>
                                <?php if (!empty($sndImgUrl)) { ?>
                                    <style>
                                        .Hotel-Tropico-img{
                                            background: url(<?= HTTP_ROOT . 'img/pro_pic/' . $sndImgUrl; ?>)no-repeat;
                                            background-size: 100%;
                                        }
                                    </style>

                                <?php } ?>
                                <div class="Hotel-Trópico">
                                    <div class="Hotel-Trópico-img">
                                        <div class="sc-fdQOMr gkGSap sc-bdVaJa cZxsvx">
                                            <div class="sc-ifAKCX erTWuZ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Hotel-Trópico-text"><?= $sndHotel->description->propertyName; ?></div>
                                    <div class="sc-gmeYpB biLYnU" data-unit-id="STAR_WRAP" data-autobot-element-id="HTL_DETAIL_HOTEL_STARS" alt="4 stars">
                                        <?php
                                        for ($cntr2 = 1; $cntr2 <= $sndHotel->description->rating; $cntr2++) {
                                            ?>
                                            <svg class="sc-kZmsYB eUgsT sc-dnqmqq fwnzLk" data-unit-id="FULL_STAR" color="gray" viewBox="0 0 24 24" width="24" height="24" fill="currentcolor"><path d="M12,1.54L14.55,9.6,23,9.53l-6.87,4.91,2.67,8-6.8-5-6.8,5,2.67-8L1,9.53,9.45,9.6Z"></path></svg>   
                                        <?php } ?>

                                    </div>
                                    <div class="sc-eMRERa hAZDpl sc-bdVaJa cDiPQh"><div class="sc-EHOje hSElwR" font-size="1" color="black">7.3 / 10</div></div>
                                    <div class="sc-eMRERa hAZDpl sc-bdVaJa cDiPQh"><div class="sc-fAjcbJ dtkclf sc-EHOje hSElwR" font-size="1" color="black"><?= $sndHotel->location->state; ?></div></div>

                                    <div class="sc-ileJJU gbSOWI sc-bdVaJa kRGLvU"><div class="sc-EHOje tkrSK" color="green" font-size="2">AOA <?= changeFormat(number_format($this->User->propertyPrice($sndHotel->id), 2)); ?></div></div>

                                    <div class="sc-bdVaJa fJntgG"><a href="<?= HTTP_ROOT; ?>users/preview/<?= $iOne[1]; ?>?<?= $_SERVER['QUERY_STRING']; ?>"><button class="sc-cNQqM eKqHMe sc-iwsKbI jHpzKw" data-autobot-element-id="HTL_DETAIL_SIMILAR_HOTEL_SELECT"><?php echo __('Select') ?></button></a></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
</section>
<section class="Hotel-Features">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="Hotel-main">
                    <div class="Hotel-Features-left">
                        <h1><?php echo __('Local Attractions') ?></h1>
                        <p><?= substr(nl2br($result_property->description->recommendations), 0, 705); ?></p>
                    </div>
                    <?php if (!empty($result_property->amenity->Top)) { ?>
                        <div class="Top-Amenities">
                            <h1><?= __("Top Amenities"); ?></h1>

                            <ul>
                                <?php if (in_array("Free WIFI", json_decode($result_property->amenity->Top))) { ?>
                                    <li>
                                        <svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="hVUArZ sc-bZQynM lnXkvV" font-size="14px" color="gray"><?= __("Free WiFi"); ?></span></li>
                                <?php } ?>
                                <?php if (in_array("Outdoor Pool", json_decode($result_property->amenity->Top))) { ?>
                                    <li> <svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="hVUArZ sc-bZQynM lnXkvV" font-size="14px" color="gray"><?= __("Outdoor Pool"); ?></span></li>
                                <?php } ?>
                                <?php if (in_array("Gym", json_decode($result_property->amenity->Top))) { ?>
                                    <li> <svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="hVUArZ sc-bZQynM lnXkvV" font-size="14px" color="gray"><?= __("Fitness Center"); ?></span></li>
                                <?php } ?>
                                <?php if (in_array("Business Center", json_decode($result_property->amenity->Top))) { ?>
                                    <li> <svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="hVUArZ sc-bZQynM lnXkvV" font-size="14px" color="gray"><?= __("Business Center"); ?></span></li>
                                <?php } ?>
                                <?php if (in_array("Restaurant", json_decode($result_property->amenity->Top))) { ?>
                                    <li> <svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="hVUArZ sc-bZQynM lnXkvV" font-size="14px" color="gray"><?= __("Restaurant"); ?></span></li>
                                <?php } ?>
                                <?php if (in_array("Non-smoking Rooms", json_decode($result_property->amenity->Top))) { ?>
                                    <li> <svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="hVUArZ sc-bZQynM lnXkvV" font-size="14px" color="gray"><?= __("Non-smoking Rooms"); ?></span></li>
                                <?php } ?>
                                <?php if (in_array("Free Parking", json_decode($result_property->amenity->Top))) { ?>
                                    <li> <svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="hVUArZ sc-bZQynM lnXkvV" font-size="14px" color="gray"><?= __("Free Parking"); ?></span></li>
                                <?php } ?>
                                <?php if (in_array("Airport Shuttle", json_decode($result_property->amenity->Top))) { ?>
                                    <li> <svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="hVUArZ sc-bZQynM lnXkvV" font-size="14px" color="gray"><?= __("Airport Shuttle"); ?></span></li>
                                <?php } ?>
                            </ul>
    <!--                            <div class="Show-All-Amenities"  data-toggle="modal" data-target="#amiModal"><?= __("Show All Amenities"); ?></div>-->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="Amenities-part" id="Amenities-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h1><?php echo __('Amenities') ?></h1>

            </div>

            <div class="col-sm-3 col-md-3 col-lg-3">
                <?php if (!empty($result_property->amenity->Top)) { ?>

                    <div class="Amenities-foter">
                        <h3><?= __("Top Amenities"); ?></h3>
                        <ul>
                            <?php foreach (json_decode($result_property->amenity->Top) as $val) { ?>
                                <li>
                                    <svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg>
                                    <span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= __($val); ?></span>
                                </li>
                            <?php } ?>                          
                        </ul>
                    </div>
                <?php } ?>

                <?php if (!empty($result_property->amenity->Activities)) { ?>
                    <div class="Pools-foter">
                        <h3><?= __("Activities & Entertainment"); ?></h3>
                        <ul>
                            <?php foreach (json_decode($result_property->amenity->Activities) as $val) { ?>
                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= __($val); ?></span></li>
                            <?php } ?>
                        </ul>


                    </div>
                <?php } ?>

                <?php if (!empty($result_property->amenity->Food)) { ?>
                    <div class="Pools-foter">
                        <h3><?= __("Media/Technology"); ?></h3>
                        <ul>
                            <?php foreach (json_decode($result_property->amenity->Media) as $val) { ?>
                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= __($val); ?></span></li>
                            <?php } ?>
                        </ul>


                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">

                <?php if (!empty($result_property->amenity->Parking)) { ?>
                    <div class="Parking-foter">
                        <h3><?= __("Parking & Transportation"); ?></h3>
                        <ul>
                            <?php foreach (json_decode($result_property->amenity->Parking) as $val) { ?>
                                <li>
                                    <svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg>
                                    <span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= __($val); ?></span>
                                </li>
                            <?php } ?>

                        </ul>
                    </div>
                <?php } ?>

                <?php if (!empty($result_property->amenity->Accessibility)) { ?>
                    <div class="Pools-foter">
                        <h3><?= __("Accessibility"); ?></h3>
                        <ul>
                            <?php foreach (json_decode($result_property->amenity->Accessibility) as $val) { ?>
                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= __($val); ?></span></li>
                            <?php } ?>
                        </ul>


                    </div>
                <?php } ?>

                <?php if (!empty($result_property->amenity->Meetings)) { ?>
                    <div class="Pools-foter">
                        <h3><?= __("Meetings & Events"); ?></h3>
                        <ul>
                            <?php foreach (json_decode($result_property->amenity->Meetings) as $val) { ?>
                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= __($val); ?></span></li>
                            <?php } ?>
                        </ul>


                    </div>
                <?php } ?>

                <?php if (!empty($result_property->amenity->Essentials)) { ?>
                    <div class="Pools-foter">
                        <h3><?= __("Essentials"); ?></h3>
                        <ul>
                            <?php foreach (json_decode($result_property->amenity->Essentials) as $val) { ?>
                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= __($val); ?></span></li>
                            <?php } ?>
                        </ul>


                    </div>
                <?php } ?>


            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <?php if (!empty($result_property->amenity->Kitchen)) { ?>
                    <div class="Pools-foter">
                        <h3><?= __("Kitchen & Dining"); ?></h3>
                        <ul>
                            <?php foreach (json_decode($result_property->amenity->Kitchen) as $val) { ?>
                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= __($val); ?></span></li>
                            <?php } ?>
                        </ul>


                    </div>
                <?php } ?>
                <?php if (!empty($result_property->amenity->Services)) { ?>
                    <div class="Pools-foter">
                        <h3><?= __("Guest Services"); ?></h3>
                        <ul>
                            <?php foreach (json_decode($result_property->amenity->Services) as $val) { ?>
                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= __($val); ?></span></li>
                            <?php } ?>
                        </ul>


                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-3 col-md-3 col-lg-3">
                <?php if (!empty($result_property->amenity->Facilities)) { ?>
                    <div class="Facilities-foter">
                        <h3><?= __("Facilities"); ?></h3>
                        <ul>
                            <?php foreach (json_decode($result_property->amenity->Facilities) as $val) { ?>
                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= __($val); ?></span></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>


                <?php if (!empty($result_property->amenity->Food)) { ?>
                    <div class="Facilities-foter">
                        <h3><?= __("Food & Drink"); ?></h3>
                        <ul>
                            <?php foreach (json_decode($result_property->amenity->Food) as $val) { ?>
                                <li><svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg><span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= __($val); ?></span></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

            </div>
            <?php if ((!empty($result_property->amenity->Food)) && (!empty($result_property->amenity->Services)) && (!empty($result_property->amenity->Kitchen)) && (!empty($result_property->amenity->Essentials)) && (!empty($result_property->amenity->Meetings))) { ?>
                <!--                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="show-footer-btn">
                                        <div class="show-footer "><a href="#"><?= __("Show All Amenities"); ?><i class="fas fa-angle-down"></i></a></div>
                                    </div>
                                </div>-->
            <?php } ?>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="map-part">
                    <div class="map-text">
                        <h3><?php
                            if (!empty(@$result_property->description->propertyName)) {
                                echo @$result_property->description->propertyName;
                            }
                            ?></h3>
                        <h5><?= @$_GET['from_location_name']; ?>, <?= $this->User->countryHtlName(@$result_property->id); ?></h5>
                    </div> 
                    <div id="map1" style="width: 100%;height: 500px;"></div>	
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<section class="guest-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h1><?= __("Guest Rating"); ?></h1>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="guest-part-left">
                    <span class="sc-hGoxap jItMmH" data-autobot-element-id="HTL_DETAIL_REVIEWS_SCORES_BOTTOM" data-unit-id="HTL_DETAIL_REVIEWS_SCORES_BOTTOM">7.3</span>
                    <div class="sc-EHOje iMnUJL" color="blue">Good</div>
                </div>
                <div class="guest-part-right">
                    <ul class="sc-fjmCvl OFVLp">
                        <li class="sc-TFwJa dnayhP">
                            <span class="sc-bHwgHz irfDts"><?= __("CLEANLINESS"); ?></span>
                            <span class="sc-krDsej irQgW sc-bZQynM bgdexZ">
                                <span class="sc-dTdPqK eYrhVC sc-bZQynM kaWqEv"></span>
                                <span class="sc-itybZL bPIPWU">7.2</span></span></li>
                        <li class="sc-TFwJa dnayhP"><span class="sc-bHwgHz irfDts"><?= __("STAFF"); ?></span><span class="sc-krDsej irQgW sc-bZQynM bgdexZ"><span class="sc-dTdPqK jlGsdO sc-bZQynM kaWqEv"></span><span class="sc-itybZL bPIPWU">7.9</span></span></li>
                        <li class="sc-TFwJa dnayhP"><span class="sc-bHwgHz irfDts"><?= __("LOCATION"); ?></span><span class="sc-krDsej irQgW sc-bZQynM bgdexZ"><span class="sc-dTdPqK eYrhVC sc-bZQynM kaWqEv"></span><span class="sc-itybZL bPIPWU">7.2</span></span></li></ul>
                </div>
                <div class="Score-breakdown"><?= __("based on"); ?> <span><a  data-toggle="modal" data-target="#myModala" style="cursor: pointer; color: #c39e00;">21 <?php
                            if ($dateDifference == 1) {
                                echo __('review');
                            } else {
                                echo __('reviews');
                            }
                            ?> </a></span>| <?= __("All ratings are from verified guests of this property"); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="Hotel-Faci-part">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 ">
                <div class="Hotel-border">
                    <div class="guest-policies-left">
                        <div class="guest-policies-text"><?= __("Guest Policies"); ?></div>
                        <div class="guest-policies-box">
                            <div class="check-in-line">
                                <div class="check-in"><?= __("Check-in"); ?></div>
                                <div class="after-in"><span><i class="fa fa-clock-o"></i></span><?= __("After"); ?> <span><?= substr(nl2br($result_property->description->checkin), 0, 705); ?></span></div>
                            </div>
                            <div class="check-out-line">
                                <div class="check-out "><?= __("Check-out"); ?></div>
                                <div class="after-out"><span><i class="fa fa-clock-o" aria-hidden="true"></i></span><?= __("Before"); ?> <span><?= substr(nl2br($result_property->description->checkout), 0, 705); ?></span></div>
                            </div>

                        </div>
                    </div>
                    <div class="guest-policies-right">
                        <div class="Room-Policies"><?= __("House Rules"); ?></div>
                        <div class="important-info-text2"><p><?= substr(nl2br($result_property->description->houseRules), 0, 705); ?></p></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<div class="space"></div>


<div class="modal fade" id="amiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-slideout modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:rgb(249, 215, 73);height: 45px;padding: 8px;padding-left: 30px;">
                <p class="modal-title" id="exampleModalLabel" style="font-size: 16px;font-weight: 700;">Amenities</p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul style="list-style: none;padding: 10px;line-height: 24px;color: rgb(104, 123, 142);font-weight: 500;">
                    <?php foreach (json_decode($result_property->amenity->Top) as $val) { ?>
                        <li>
                            <svg class="sc-dnqmqq bFZHNc" color="green" viewBox="0 0 24 24" width="16" height="16" fill="currentcolor"><path d="M8.6,15.6l-4.2-4.2L3,12.8l5.6,5.6l12-12L19.2,5L8.6,15.6z"></path></svg>
                            <span class="eUkphL sc-bZQynM gVKNCw" font-size="0"><?= $val; ?></span>
                        </li>
                    <?php } ?>

                </ul>
            </div>

        </div>
    </div>
</div>

<?php echo $this->element('frontend/inner-footer'); ?>

<style type="text/css">
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 100%;
        margin: auto;
    }
    .arrow-box{
        text-shadow: none !important;
    }
    .best-match-left-img .carousel-control .glyphicon-chevron-left, .best-match-left-img .carousel-control .glyphicon-chevron-right {
        width: 15px !important;
        height: 15px !important;
        margin-top: -10px !important;
        font-size: 15px !important;
    }
    .best-match-left-img .carousel-indicators li{
        padding: 0 !important;
    }
    .best-match-left-img .carousel-indicators li:not(:first-child) {
        margin-left: 5px !important;
    }
    .best-match-left-img .carousel-indicators {
        bottom: 0px;
    }
    .modal {
        padding-top: 0;
    }
    .slider-modal .modal-dialog {
        width: 1000px;
        margin: 0 auto;
        max-width: 70%;
        top: 50%;
        transform: translate(0%, -50%) !important;
    }
    .slider-modal .carousel-inner {
        height: 485px;
    }
    .slider-modal .carousel-inner>.item{
        height: 100%;
    }
    .slider-modal .carousel-inner>.item img{
        height: 100%;
    }
</style>
<script>
    $(document).ready(function () {
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
                success: function (res) {
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
    $(document).ready(function () {

        $(".reception").click(function () {
            filterSortResult();
        });
        $(".star-rating").click(function () {
            filterSortResult();
        });
        $(".recommended").click(function () {
            filterSortResult();
        });

        $(".internet").click(function () {
            filterSortResult();
        });

        $(".accessibility").click(function () {
            filterSortResult();
        });
        $(".kitchen").click(function () {
            filterSortResult();
        });
        $(".facilities").click(function () {
            filterSortResult();
        });
        $(".safety").click(function () {
            filterSortResult();
        });
        $(".extras").click(function () {
            filterSortResult();
        });
//        $(".reservation_policy").click(function () {
//            filterSortResult();
//        });
        $(".property_tp").click(function () {
            filterSortResult();
        });
        //sortBy
        $("select#sortBy").change(function () {
            filterSortResult();
        });
    });
    function filterSortResult() {
        var star_rating = $(".star-rating:checked").val();
        var reception = $(".reception:checked").val();
        var recommended;
        var internet;
        var accessibility;
        var property_tp;
        var kitchen;
        var facilities;
        var safety;
        var extras;
        var st_pri = $('#ccccc').text();
        var ed_pri = $('#ddddd').text();
        var sortby = $("#sortBy option:selected").val();
        //,reservation_policy;

        var chkArray = [];
        $(".recommended:checked").each(function () {
            chkArray.push($(this).val());
        });
        recommended = chkArray.join('|');

        chkArray = [];
        $(".internet:checked").each(function () {
            chkArray.push($(this).val());
        });
        internet = chkArray.join('|');

        chkArray = [];
        $(".accessibility:checked").each(function () {
            chkArray.push($(this).val());
        });
        accessibility = chkArray.join('|');

        chkArray = [];
        $(".property_tp:checked").each(function () {
            chkArray.push($(this).val());
        });
        property_tp = chkArray.join('|');

        chkArray = [];
        $(".kitchen:checked").each(function () {
            chkArray.push($(this).val());
        });
        kitchen = chkArray.join('|');

        chkArray = [];
        $(".facilities:checked").each(function () {
            chkArray.push($(this).val());
        });
        facilities = chkArray.join('|');

        chkArray = [];
        $(".safety:checked").each(function () {
            chkArray.push($(this).val());
        });
        safety = chkArray.join('|');

        chkArray = [];
        $(".extras:checked").each(function () {
            chkArray.push($(this).val());
        });
        extras = chkArray.join('|');

        //alert(sortby);
        $('#main_search_data').hide()
        jQuery.ajax({
            type: "POST",
            url: pageurl + "users/hotelajaxsearchdata",
            dataType: 'html',
            data: {start_price: st_pri, end_price: ed_pri, sortby: sortby, star_rating: star_rating, reception: reception, recommended: recommended, internet: internet, accessibility: accessibility, city: "<?= $_GET['from_location_name']; ?>", property_tp: property_tp, kitchen: kitchen, facilities: facilities, safety: safety, extras: extras},
            success: function (res) {

                $("#all_results").html(res);

//                    $('#' + y).removeAttr('class');
//                    $('#' + y).attr('class', 'page-item active page-link');


            }
        });
    }

</script>


<script>
    $(document).ready(function () {
        var showChar = 705;
        var ellipsestext = "...";
        var moretext = "<br><?= __("Show More"); ?>";
        var lesstext = "<br><?= __("Show Less"); ?>";

        var content = $('.more').html();

        if (content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext + '</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

            $('.more').html(html);
        }



        $(".morelink").click(function () {
            if ($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });

</script>
<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/bootstrap2.min.css" type="text/css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    (function ($) {
        'use strict';

        var $document = $(document);
        var $body = $('body');
        var $roots = $('html').add($body);
        var cache = {};

        $.modal = function (settings) {

            function Modal() {
                var modal = this;
                var modalCreated = false;
                modal.isActive = false;

                var config = $.extend({
                    content: '', // content to show initial
                    contentUrl: null, // content from an external url (ajax-loaded)
                    useCache: true, // don't repeat ajax-load every time
                    youtubeId: null, // show youtube-iframe
                    class: '', // custom class for modal
                    closeBtn: true, // show x-close-btn
                    layerClose: true, // modal closes when layer is clicked
                    closingSelectors: null, // custom selectors for elements to close modal
                    showOnInit: true, // show modal when created
                    fadeInDuration: 400, // how fast modal fades in
                    fadeOutDuration: 400, // how fast modal fades out
                    beforeModalOpen: null, // callback before modal appears - returns modal
                    afterModalOpen: null, // callback after modal appears - returns modal
                    beforeModalClose: null, // callback before modal disappears - returns modal
                    afterModalClose: null // callback after modal disappears - returns modal
                }, settings);

                var init = function () {
                    if (config.showOnInit)
                        modal.open();
                };

                var createModal = function () {
                    var closingX = '<svg xmlns="https://www.w3.org/2000/svg" viewBox="0 0 96 96" width="12" height="12"><polygon fill="currentColor" points="96,14 82,0 48,34 14,0 0,14 34,48 0,82 14,96 48,62 82,96 96,82 62,48 "/></svg>';

                    var modalClass = 'modal ' + config.class;
                    if (config.youtubeId) {
                        modalClass = modalClass + ' modal-youtube';
                    }

                    modal.$wrapper = $('<div>', {
                        class: 'modal-wrapper'
                    });

                    modal.$layer = $('<div>', {
                        class: 'modal-layer'
                    });

                    modal.$modal = $('<div>', {
                        class: modalClass
                    });

                    if (config.closeBtn) {
                        modal.$closeBtn = $('<button>', {
                            class: 'modal-close-btn'
                        }).html(closingX);

                        modal.$modal.append(modal.$closeBtn);
                    }

                    modal.$content = $('<div>', {
                        class: 'modal-content'
                    }).html(config.content);

                    modal.$modal.append(modal.$content);
                    modal.$wrapper.append(modal.$layer);
                    modal.$wrapper.append(modal.$modal);

                    modal.$wrapper.hide();

                    if (config.contentUrl)
                        loadExternal();
                    if (config.youtubeId)
                        loadYoutubeVideo();
                    modalCreated = true;
                };

                modal.updateContent = function (content) {
                    modal.$content.html(content);
                };

                modal.open = function () {
                    if (!modalCreated)
                        createModal();

                    if (typeof config.beforeModalOpen === 'function')
                        config.beforeModalOpen(modal);
                    appendToBody();
                    enableRootsActive();
                    modal.$wrapper.fadeIn(config.fadeInDuration, function () {
                        modal.isActive = true;
                        if (typeof config.afterModalOpen === 'function')
                            config.afterModalOpen(modal);
                    });
                };

                modal.close = function () {
                    if (typeof config.beforeModalClose === 'function')
                        config.beforeModalClose(modal);
                    modal.$wrapper.fadeOut(config.fadeOutDuration, function () {
                        removeFromBody();
                        disableRootsActive();
                        modal.isActive = false;
                        if (typeof config.afterModalClose === 'function')
                            config.afterModalClose(modal);
                    });
                };

                var bindClose = function () {
                    if (config.closeBtn)
                        modal.$closeBtn.click(modal.close);
                    if (config.layerClose)
                        modal.$layer.click(modal.close);
                    if (config.closingSelectors)
                        modal.$modal.on('click', config.closingSelectors.toString(), modal.close);
                };

                var offset = 0;

                var enableRootsActive = function () {
                    offset = $document.scrollTop();
                    $roots.css('top', (-offset) + 'px')
                            .addClass('modal-active');
                };

                var disableRootsActive = function () {
                    $roots.css('top', '')
                            .removeClass('modal-active')
                            .scrollTop(offset);
                };

                var appendToBody = function () {
                    $body.append(modal.$wrapper);
                    bindClose();
                };

                var removeFromBody = function () {
                    modal.$wrapper.remove();
                };

                var loadYoutubeVideo = function () {
                    var $iframe = $('<iframe>', {
                        css: {
                            width: '100%',
                            height: '100%',
                            display: 'block'
                        },
                        src: 'https://www.youtube.com/embed/' + config.youtubeId,
                        frameborder: 0,
                        allowfullscreen: 'allowfullscreen'
                    });

                    modal.updateContent($iframe);
                };

                var loadExternal = function () {
                    if (config.useCache && cache[config.contentUrl]) {
                        var cachedContent = cache[config.contentUrl];
                        modal.updateContent(cachedContent);
                    } else {
                        $.get(config.contentUrl, function (response) {
                            var ajaxContent = response;
                            modal.updateContent(ajaxContent);
                            cache[config.contentUrl] = ajaxContent;
                        }).fail(function () {
                            console.log('Ajax failed - wrong URL?');
                        });
                    }
                };

                init();

                return modal;
            }

            return new Modal();
        };

    })(jQuery);

    var demoModal = $.modal({
        content: $('.demo-modal-content'),
        class: 'demo-modal',
        closingSelectors: ['.modal-close']
    });

    $('.btn-blue').click(function () {
        demoModal.open();
    })
</script>
<?php

function timeago($date1, $date2) {
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400);
}

function changeFormat($pri) {
    $dat = explode('.', $pri);
    $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
    return $f;
}
?>
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvuyVn-j3G78kRKnXBwyhQnHl9Hdf4g2I&libraries=places&callback=initAutocomplete"></script>-->
<script>

    function initMap() {
        var myLatLng = {lat: <?php echo $proper_loc->lati; ?>, lng: <?= $proper_loc->lngi; ?>};

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: myLatLng,

        });




        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: '<?php echo HTTP_ROOT . "img/marker.svg" ?>',
            title: '<?= $proper_loc->city; ?>'
        });


        var map1 = new google.maps.Map(document.getElementById('map1'), {
            zoom: 17,
            center: myLatLng

        });




        var marker1 = new google.maps.Marker({
            position: myLatLng,
            map: map1,
            title: '<?= $proper_loc->city; ?>',
            icon: '<?php echo HTTP_ROOT . "img/marker.svg" ?>'
        });

    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvuyVn-j3G78kRKnXBwyhQnHl9Hdf4g2I&callback=initMap">
</script>