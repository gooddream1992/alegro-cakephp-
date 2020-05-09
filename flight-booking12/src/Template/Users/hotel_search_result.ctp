<div class="se-pre-con"> 
    <div class="top-end">
        <?php echo $this->element('frontend/login-header'); ?>
        <div class="img-load-ing">           
            <img style="border-radius: 104px; width: 170px; height: 170px; margin-bottom: 40px;" src="<?= HTTP_ROOT; ?>img/hotel.png" alt="">
            <center>
                <span style=" font-size: 2em;">
                    <?php echo __('Searching for Hotels') ?> </span>
            </center>
        </div> 
    </div> 
    <div class="se-pre-img"></div> 
    <div class="top-last" style="color: #7b7b7b;text-align:  center; font-weight: bold;">
        <span style="font-size: 2rem;"><?= __(date("D, d M", strtotime(str_replace('/', '-', @$_GET['departure_date'])))); ?> <?php if (@$_GET['radio'] != "One-Way Flight") { ?>- <?= __(date("D, d M", strtotime(str_replace('/', '-', @$_GET['return_date'])))); ?> <?php } ?></span>  <br>      
        <span style="font-size: 20px;"><?= __(@$_GET['passenger']); ?></span>

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

</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
    $(window).load(function () {
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
        <div class="row justify-content-between booking-selected booking-selected-padding hidden-xs-one">
            <div class="col-sm-4 col-md-5 col-lg-4">
                <div class="row no-gutters destination-search-left-infos">
                    <div class="m-right-25"> <img src="<?= HTTP_ROOT; ?>img/hotel.png"> </div>
                    <div class="col-9">
                        <div class="row">
                            <div class="col">
                                <div class="destination-search-title"> Los Angeles - Istanbul </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="destination-search-subtitle"> JUN 04, SAT - 2 TRAVELLERS </div>
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
                                <div class="destination-search-title"> Istanbul - Los Angeles </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="destination-search-subtitle"> 28 MAY. SAT - 3 TRAVELLERS </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-2 col-lg-2 desktop-change"> <a href="#" id="showMobChange" class="btn btn-primary btn-change hvr-grow hidden-xs-one" >Change</a> </div>


            <div class="col-12 col-sm-12 col-lg-12 d-md-block d-none hidden-xs visible-sm">
                <?= $this->Form->create('', ['type' => 'get', 'url' => ['action' => 'hotel_search_result'], 'id' => 'hotelSearchForm']); ?>
                <div class="inner_Form">
                    <div class="row">

                        <div class="col-md-12 no-padding routTopForm">
                            <div class="row align-items-center search-form p-top-12">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Location:</label>
                                        <input equired="" type="text" class="form-control box1" id="loc_from" name="from_location_name" placeholder="<?php echo __('Location'); ?>" onkeyup="hotel_loc_data()" autocomplete="off" value="<?= $_GET['from_location_name'];?>">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_10.png" class="formIcon box1_img_h">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_10_y.png" class="formIcon box1_img">


                                    </div>
                                    <div id="hotel_loc_display" style="display:none;">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label>Check in:</label>
                                        <input required="" type="text" data-language="en" class="datepicker-here form-control box3" placeholder="Check-in Date" id="hotel_check_in" name="hotel_check_in" autocomplete="off" onblur="mycheckindate()" value="<?= $_GET['hotel_check_in'];?>">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_3.png" class="formIcon box3_img_h">
                                        <img src="<?= HTTP_ROOT; ?>/img/icon/icon_3_y.png" class="formIcon box3_img">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label>Check out:</label>
                                        <input type="text" data-language="en" class="datepicker-here form-control box4" placeholder="Check-out Date" id="hotel_check_out" name="hotel_check_out" autocomplete="off" onblur="checkWithCheckindate()" value="<?= $_GET['hotel_check_out'];?>">
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
                                            <label href="">Rooms</label>
                                            <i class="fa fa-angle-down formIconSort"></i>
                                            <select name="rooms" id="rooms">

                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>               
                                        </div>
                                    </div>
                                    <div class="form-group dsf" style="margin-bottom: 0px;">
                                        <div style="float: left">
                                            <label href="">Adults</label>
                                            <i class="fa fa-angle-down formIconSort"></i>
                                            <select name="adult" id="adult">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>               
                                        </div>
                                    </div>
                                    <div class="form-group dsf" style="margin-bottom: 0px;">
                                        <div style="float: left">
                                            <label href="">Children</label>
                                            <i class="fa fa-angle-down formIconSort"></i>
                                            <select name="children" id="children">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
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
<div class="space"></div>
<section id="search-results-body">
    <div class="container">
        <div class="row">
            <!-- Filters -->
            <div class="col-sm-12 col-md-4 col-lg-3">
                <div class="container filters-list h-auto">
                    <!-- Title -->
                    <div class="row">
                        <div class="header-tab bg-yellow tab"> Filters </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title pieceRange m-20" data-target="#collapseElem-1"><span></span>Price <i class="fas fa-chevron-down"></i></h2>
                        </div>

                    </div>
                    <!-- Price range -->
                    <div class="row">
                        <div class="col-12">
                            <div class="collapseElem" id="collapseElem-1">
                                <ul id="ulli"><li>AOA <span id="ccccc"></span></li> <li id="sndli">AOA <span id="ddddd"></span></li></ul>
                                <div id="slider-handles"></div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20" data-target="#collapseElem-1"><span></span>Star rating <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem" id="collapseElem-1">
                                <label class="container-radio radio-button">
                                    <input type="radio" checked="checked" name="depart"> <span class="checkmark"></span> <span class="labelT">1 star</span> </label>
                                <label class="container-radio radio-button">
                                    <input type="radio" checked="checked" name="depart"> <span class="checkmark"></span> <span class="labelT">2 stars</span> </label>
                                <label class="container-radio radio-button">
                                    <input type="radio" checked="checked" name="depart"> <span class="checkmark"></span> <span class="labelT">3 stars</span> </label>
                                <label class="container-radio radio-button">
                                    <input type="radio" checked="checked" name="depart"> <span class="checkmark"></span> <span class="labelT">4 stars</span> </label>
                                <label class="container-radio radio-button">
                                    <input type="radio" checked="checked" name="depart"> <span class="checkmark"></span> <span class="labelT">5 stars</span> </label>
                                <label class="container-radio radio-button">
                                    <input type="radio" name="depart"> <span class="checkmark"></span> <span class="labelT">Unrated</span> </label>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-target="#collapseElem-2"><span></span> Reception <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem" id="collapseElem-2">
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Front desk open 24/7</span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-target="#collapseElem-3"><span></span> Reservation policy <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem" id="collapseElem-3">
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Free cancellation</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Book without credit card</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">No prepayment</span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-target="#collapseElem-4"><span></span> Meals <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem" id="collapseElem-4">
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Breakfast included</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Breakfast & lunch included</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Breakfast & dinner included</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Self catering</span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-target="#collapseElem-5"><span></span> Property type <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem" id="collapseElem-5">
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Apartments</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Hotels</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Guest houses</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Hostels</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span><span class="labelT"> Bed and breakfasts</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span><span class="labelT"> Homestays </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-target="#collapseElem-6"><span></span> Room type <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem" id="collapseElem-6">
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Twin </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Double </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Superior Double </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Presidential Suite </span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-target="#collapseElem-7"><span></span> Review score <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem" id="collapseElem-7">
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Superb: 9+ </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Very good: 8+ </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Good: 7+ </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Pleasant: 6+ </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">No rating </span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-target="#collapseElem-8"><span></span> Facilities <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem" id="collapseElem-8">
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Airport shuttle </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Parking </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Free WiFi </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Non-smoking rooms </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Restaurant </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Facilities for disabled guests </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Family rooms </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Room service </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Pets allowed </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Fitness centre </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Spa lounge/relaxation area </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Swimming pool </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Electric vehicle charging station </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Bicycle rental </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Library</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Football pitch</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Basketball court</span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Tennis court</span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-target="#collapseElem-9"><span></span> Room facilities <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem" id="collapseElem-9">
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Private bathroom </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Air conditioning </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Balcony </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Electric kettle </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Flat-screen TV </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Kitchen/kitchenette </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Soundproofing </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Tea/Coffee Maker </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Minibar </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Cook </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Oven </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Washing Machine </span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-target="#collapseElem-10"><span></span> Facilities for disabled guests <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem" id="collapseElem-10">
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Higher level toilet </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Toilet with grab rails </span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-target="#collapseElem-11"><span></span> Room accessibility <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem" id="collapseElem-11">
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Walk in shower </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Lowered sink </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Roll in shower </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Toilet with grab rails </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Raised toilet </span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" name="radio"> <span class="checkmark"></span> <span class="labelT">Shower chair </span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-default btn-reset">Reset All Filters</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Filters -->
            <!-- Results -->
            <div class="col-sm-12 col-md-8 col-lg-9">

                <?php if (!empty($result_property)) { ?>
                    <div class="container bg-gris header-tab tab tab-results-mob">
                        <div class="d-table w-100 tab-title">
                            <div class="d-table-cell"><?= @$result_property_count; ?> Results</div>
                            <div class="d-table-cell text-right p-right-10 sortby-label">Sort by:</div>
                            <div class="d-table-cell">
                                <select name="" id="sortBy" class="sortBy">
                                    <option value="0">Low to High (Recommended)</option>
                                    <option value="0">High to Low</option>
                                    <option value="0">Stars</option>
                                    <option value="0">Reviews</option>
                                </select>
                                <i class="fa fa-angle-down formIconSort"></i>
                            </div>
                        </div>
                    </div>

                    <?php foreach ($result_property as $list) { ?>
                        <div class="hotel-lsting">
                            <div class="hotel-lsting-left">

                                <img src="<?= HTTP_ROOT; ?>img/pro_pic/<?= $this->User->getHotelImage($list->id); ?>" alt="img" style="width: 100%;">
                            </div>
                            <div class="hotel-lsting-middle">
                                <h3><?= $list->description->propertyName; ?> 
                                    <?php for ($i = 1; $i <= $list->description->rating; $i++) { ?>
                                        <i class="fa fa-star rating"></i>
                                    <?php } ?>
                                    <i class="fa fa-thumbs-up"></i>
                                </h3>
                                <h6><span><a href="#"><?= $list->property_size; ?> square feet</a></span>1 Double Bed </h6>
                                <p>(Extra beds available: Crib)<br/>
                                    Room sleeps 3 guests (up to 2 children)</p>
                                <h5><a href="#">high quality</a></h5>
                            </div>
                            <div class="hotel-lsting-right">
                                <h6>1,957 reviews<span>5.2</span></h6>
                                <h5>GBP <?= number_format($list->pricing->one, 2); ?></h5>
                                <div class="form-group" style="margin: 16px 9px 0px 0px;">
                                    <label>&nbsp;</label>
                                    <button type="button" id="submit" class="btn btn-primary hvr-grow btn-fill">Check Availability</button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="footerResults">

                    </div>
                <?php } else { ?>
                    <div class='no-result' style=' width: 70%;'><div class='no-found-logo'><img src='<?= $this->Url->image('no-result-logo.png'); ?> ' alt=''></div> <h2><?php echo __('No Hotels Available') ?></h2><p><?php echo __('We could not find any Hotels according to your selected date. Try searching again with different dates.') ?></p> <a href='javascript:void(0)'>Change</a></div>
                <?php } ?>
            </div>
            <!-- Results -->
        </div>

    </div>
</section>


<div class="space"></div>

<?php echo $this->element('frontend/inner-footer'); ?>

<script>
    var handlesSlider = document.getElementById('slider-handles');
    noUiSlider.create(handlesSlider, {
        start: [0, 800],
        step: 10,
        tooltips: false,
        connect: [false, true, false],
        range: {
            'min': [0],
            'max': [1000]
        },
        format: wNumb({
            decimals: 0,
            suffix: ' $',
        })
    });

    handlesSlider.noUiSlider.on('set', function (values, handle) {
        var start = values[0].split(" ")[0];
        var end = values[1].split(" ")[0];

        //getValueUsingClass_airline();

    });
    handlesSlider.noUiSlider.on('update', function (values, handle) {
        var start = values[0].split(" ")[0];
        var end = values[1].split(" ")[0];
        document.getElementById('ccccc').innerHTML = start;
        document.getElementById('ddddd').innerHTML = end;
    });
</script>
<script>
    $(document).ready(function(){
        mycheckindate();
        $('#rooms').val('<?= @$_GET['rooms'];?>');
        $('#children').val('<?= @$_GET['children'];?>');
        $('#adult').val('<?= @$_GET['adult'];?>');
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
            if ($('#hotel_check_out').val() >= $('#hotel_check_in').val()) {
                $('#htl_shc_btn').removeAttr("disabled");
            } else {
                $('#htl_shc_btn').attr("disabled", "disabled");
            }
        }

    }
    function checkWithCheckindate() {
        if ($('#hotel_check_in').val() != "" && $('#hotel_check_out').val() != "") {
            if ($('#hotel_check_out').val() >= $('#hotel_check_in').val()) {
                $('#htl_shc_btn').removeAttr("disabled");
            } else {
                $('#htl_shc_btn').attr("disabled", "disabled");
            }
        } else {
            $('#htl_shc_btn').attr("disabled", "disabled");
        }

    }
</script>


<style>
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

</style>
