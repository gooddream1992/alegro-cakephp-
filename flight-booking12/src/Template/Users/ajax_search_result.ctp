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
?>
<div class="se-pre-con"> 
    <div class="top-end">
        <?php echo $this->element('frontend/login-header'); ?>
        <div class="img-load-ing">
            <?php
            $destina_img_nm = strtoupper($_GET['destination']) . ".jpg";
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
                    <?php echo __('Searching for flights from') ?> <b><?= __($this->User->cityHelper($_GET['origin'])->city); ?></b> (<?= __($_GET['origin']); ?>) <?php echo __('to') ?> <b><?= __($this->User->cityHelper($_GET['destination'])->city); ?></b> (<?= __($_GET['destination']) ?>) </span>
            </center>
        </div> 
    </div> 
    <div class="se-pre-img"></div> 
    <div class="top-last" style="color: #7b7b7b;text-align:  center; font-weight: bold;">
        <span style="font-size: 2rem;"><?= __(date("D, d M", strtotime(str_replace('/', '-', $_GET['departure_date'])))); ?> <?php if ($_GET['radio'] != "One-Way Flight") { ?>- <?= __(date("D, d M", strtotime(str_replace('/', '-', $_GET['return_date'])))); ?> <?php } ?></span>  <br>      
        <span style="font-size: 20px;"><?= __($_GET['passenger']); ?></span>

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
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function () {
        $(".se-pre-con").fadeOut(50);
        ;
    });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.min.css" />
<style>
    #search-results-body .stopsRange .noUi-handle .1 .2 .3 {
        width: 10px !important;
        height: 10px !important;
        top: -5px;
        right: -5px;
        left: auto;
        border: 2px solid #fff;
    }
    .formIconArrow {
        right: 28px!important;
        top: 46px!important;
    }
    .btn-book {
        line-height: inherit !important;
        padding: 7px 0 !important;
        width: 95px !important;
    }
    .btn-book:hover{
        line-height: inherit !important;
        padding: 7px 0 !important;
    }

    @media screen and (max-width: 1199px) and (min-width: 992px) {

        .container-radio.checkbox {
            font-size: 14px;
        }
        .container-radio.radio-list-buttons {
            width: 55px;
            height: 40px;
            line-height: 40px;
        }
        .time {
            font-size: 19px;
            line-height: 14px;
        }
        .time span {
            font-size: 12px;
        }
        .departure,
        .Arrival {
            font-size: 11px;
        }
        .no-gutters img {
            width: 45px;
        }
        .destination-search-title {
            font-size: 18px;
        }
        .destination-search-subtitle {
            font-size: 11px;
        }
        .title {
            font-size: 20px;
        }

        #summary{
            width: 0;
            padding: 0;
        }
    }
    @media screen and (max-width: 1024px) {
        .nice-select{ margin-bottom: 0 !important;}
        .details .line td img{ width: 55px !important;}
    }

    @media screen and (max-width: 991px) and (min-width: 768px) {
        .details .line td:last-child {
            padding-left: 5px !important;
        }
        .details .line td p {
            margin: 0;
            width: 80px;
        }
        .bookBtn > span{     font-size: 16px !important;}
        .formIconSort{
            top: 25px!important;
        }
        .col-custom-4 {
            width: 25%;
        }
        .col-custom-5 {
            width: 39%;
        }
        .time {
            font-size: 16px;
            line-height: 14px;
        }
        .time span {
            font-size: 12px;
        }
        .departure,
        .Arrival {
            font-size: 9px;
        }
        .stopsRange .1 .2 .3  {
            width: 75px;
        }
        .tab {
            font-size: 17px;
        }
        .btn-book {
            width: 77px !important;
            height: 31px;
            line-height: 31px;
            font-size: 15px;
            padding: 4px 0!important;
        }
        .btn-book:hover{
            width: 77px !important;
            height: 31px;
            line-height: 31px;
            font-size: 15px;
            padding: 4px 0!important;
        }
        .tab-title .d-table-cell:last-child {
            width: 175px;
        }
        .header-tab {
            height: 70px;
            line-height: 70px;
        }
        .container-radio.checkbox {
            font-size: 14px;
            margin-bottom: 19px;
        }
        .title {
            font-size: 18px;
        }
        .no-gutters img {
            width: 35px;
        }
        .destination-search-title {
            font-size: 15px;
        }
        .destination-search-subtitle {
            font-size: 9px;
        }
        .btn-change {
            line-height: 30px;
        }
        .container-radio.radio-list-buttons {
            width: 55px;
            height: 39px;
            line-height: 39px;
        }
        .footerResults p {
            font-size: 14px;
        }
        .btn-continue,
        .btn-continue:focus {
            width: 140px;
        }
        .details .line td:first-child img {
            width: 28px !important;
        }
        .details .line td:first-child {
            width: 50px;
        }
        .m-20 {
            margin: 15px 0;
        }
        #slider-handles {
            margin-top: 40px;
        }
        .adult label {
            font-size: 13px;
        }
        ::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: bold;
            color: #bfbfce !important;
        }

        ::-moz-placeholder {
            /* Firefox 19+ */
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: bold;
            color: #bfbfce !important;
        }

        :-ms-input-placeholder {
            /* IE 10+ */
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: bold;
            color: #bfbfce !important;
        }

        :-moz-placeholder {
            /* Firefox 18- */
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: bold;
            color: #bfbfce !important;
        }
        .nice-select{
            font-size: 13px;
        }
        .tarif .boxT{
            margin: 0 3px;
            height: 350px;
        }
        .tarif .boxT.active{
            height: 410px;
        }
        .card label{
            font-size: 13px;
        }
        .tarif .boxT ul li{
            font-size: 13px;
        }
        .confirmation .radio-confirmation{
            font-size: 14px;
        }

        #summary{
            width: 0;
            padding: 0;
        }
    }

    @media screen and (max-width: 767px) {


        .col-custom-4 {
            width: 25%;
        }
        .col-custom-5 {
            width: 39%;
        }
        .time {
            font-size: 13px;
            line-height: 14px;
        }
        .time span {
            font-size: 10px;
        }
        .departure,
        .Arrival {
            font-size: 9px;
        }
        .stopsRange .1 .2 .3  {
            width: 75px;
        }
        .tab {
            font-size: 17px;
        }
        .btn-book {
            width: 50px !important;
            height: 25px;
            line-height: 25px;
            font-size: 12px;
            line-height: 4px !important;
            padding: 10px 0!important;
        }
        .btn-book:hover {
    /* width: 50px !important; */
    /* height: 25px; */
    /* line-height: 25px; */
    /* font-size: 12px; */
    line-height: 4px !important;
    padding: 16px 0!important;
}
        .bookBtn > span{
            margin-bottom: 0;
            font-size:12px !important
        }
        .tab-title .d-table-cell:last-child {
            width: 175px;
        }
        .header-tab {
            height: 70px;
            line-height: 70px;
        }
        .container-radio.checkbox {
            font-size: 14px;
            margin-bottom: 19px;
        }
        .title {
            font-size: 18px;
            padding-left: 15px;
        }
        .no-gutters img {
            width: 35px;
        }
        .destination-search-title {
            font-size: 15px;
        }
        .destination-search-subtitle {
            font-size: 9px;
        }
        .btn-change {
            line-height: 30px;
        }
        .container-radio.radio-list-buttons {
            width: 55px;
            height: 39px;
            line-height: 39px;
        }
        .footerResults p {
            display: none;
        }
        .btn-continue,
        .btn-continue:focus {
            width: 140px;
            display: block;
            margin: auto;
        }
        .details .line td img {
            width: 55px !important;
            margin-right: 10px;
        }
        .details .line td:first-child {
            width: 27px;
            padding: 0 4px;
        }
        .m-20 {
            margin: 15px 0;
        }
        #slider-handles {
            margin-top: 40px;
        }
        .adult label {
            font-size: 17px;
        }
        ::-webkit-input-placeholder {
            /* Chrome/Opera/Safari */
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: bold;
            color: #bfbfce !important;
        }

        ::-moz-placeholder {
            /* Firefox 19+ */
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: bold;
            color: #bfbfce !important;
        }

        :-ms-input-placeholder {
            /* IE 10+ */
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: bold;
            color: #bfbfce !important;
        }

        :-moz-placeholder {
            /* Firefox 18- */
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-weight: bold;
            color: #bfbfce !important;
        }
        .nice-select{
            font-size: 13px;
        }
        .tarif .boxT{
            margin: 0 3px;
            height: 350px;
        }
        .tarif .boxT.active{
            height: 410px;
        }
        .card label{
            font-size: 17px;
        }
        .tarif .boxT ul li{
            font-size: 13px;
        }
        .confirmation .radio-confirmation{
            font-size: 14px;
        }
        .btn-change{
            width: 110px;
            height: 40px;
            line-height: 40px;
            display: block;
            margin: auto;
            margin-top: 15px;
            border-color: #fff !important;
            border-width: 2px;
            border-style: solid;
        }
        .booking-selected-padding{
            padding: 17px 0;
            padding-bottom: 5px;
        }
        .tab-results-mob{
            background-color: transparent;
            padding: 0;
        }
        .sortby-label{
            display: none !important;
        }
        .nice-select.sortBy{
            background-color: #f9d749;
            color: #595455 !important;
        }
        .departure, .Arrival{
            display: none;
        }
        .details .line td:last-child{
            padding: 0;
        }
        .departArrivale{
            /*display: -webkit-flex;
           display: -moz-flex;
           display: -ms-flex;
           display: -o-flex; */
            display: inline-block;
            /*justify-content: space-between;*/
            width: 100%;
            text-align: center;
        }
        .departArrivale span{ margin-right: 20px;}
        .details.desktop{
            display: none;
        }

        .details.mobile{
            display: block;
        }
        .bookBtn {
            max-width: 100px !important;
            padding: 0 15px !important;
        }
        .footerResults{
            padding-top: 20px;
            padding-bottom: 30px;
        }
        .tab-travlling{
            border-radius: 0;
            text-align: center;
            height: 55px;
            line-height: 55px;
        }
        .adult{
            padding: 15px;
        }
        .adult > h2{
            font-size: 18px;
        }
        .information{
            padding: 20px 10px;
        }
        .information table td:last-child{
            display: none;
        }
        .information table td:first-child{
            width: 80%;
        }
        .information table td:nth-child(2){
            width: 20%;
        }
        .baggage, .Equipment{
            padding-left: 0 !important;
            border-width: 0;
        }
        .quantity{
            margin-bottom: 15px;
        }
        .btn-passenger, .btn-passenger:focus{
            width: 170px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            padding: 0;
            margin-left: 5px;
            margin-right: 5px;
        }
        .btn-continue-mob, .btn-continue-mob:focus{
            display: inline-block;
            width: 120px;
            height: 40px;
            line-height: 40px;

        }
        .tab-confir{
            border-radius: 0;
            height: 70px;
            line-height: 23px;
            text-align: center;
            padding-top: 12px;
        }
        .card, .confirmation{
            padding-left: 15px;
            padding-right: 15px;
            margin-bottom: 0;
        }
        .cardTipe img{
            width: 135px;
        }
        .cardTipe li{
            margin-right: 5px;
        }
        .cardTipe li:last-child{
            margin-right: 0;
        }
        .tarif{
            width: 290px;
            margin: auto;
            margin-bottom: 40px;
        }
        .tarif .slick-dots{
            padding: 0;
            margin: 0;
            list-style-type: none;
            position: absolute;
            left: 50%;
            bottom: -30px;
            -webkit-transform: translate(-50%);
            -ms-transform: translate(-50%);
            -o-transform: translate(-50%);
            transform: translate(-50%);
        }
        .tarif .slick-dots li{
            display: inline-block;
            margin: 0 5px;
        }
        .tarif .slick-dots li button{
            background-color: #eee;
            width: 12px;
            height: 16px;
            border-radius: 100%;
            border-color: transparent;
            font-size: 0;
        }
        .tarif .slick-dots li.slick-active button{
            background-color: #f9d749;
        }
        .tarif .boxT{
            margin: 0;
            padding: 30px 54px;
        }
        .tarif .boxT img{
            margin: auto;
            margin-bottom: 20px;
        }
        .tarif .boxT.active{
            height: 350px;
        }
        #summary{
            width: 0;
            padding: 0;
        }
        #display, #display2{
            float: left;
            width: 90%;
            position: absolute;
            z-index: 1111;
            max-height: 180px;
            overflow-y: scroll;;
        }
        #display ul, #display2 ul{
            padding-left:0;
            width: 100%;
            float:left;
        }
        #display ul li, #display2 ul li {
            width: 100% !important;
            float: left;
            text-align: left;
            display: inline-block;
            padding: 5px 8px;
            font-size: 13px;
            letter-spacing: 1px;

        }
        .search-display, .search-display2{
            float: left;
            width: 100%;

        }
    }
     @media screen and (max-width: 500px) {
     	.bookBtn {
    max-width: 100% !important;
     padding: 28px 15px 0 !important;
    width: 100%;
    text-align: left !important;
    float: left;
    display: inline-block;
}
.bookBtn > span {
    display: block;
}
.bookBtn .btn-primary {
    float: right;
    position: relative;
    top: 3px;
    padding: 9px 6px !important;
    font-size: 13px;
}
.btn-book {
    width: 101px !important;
    height: 35px;
    line-height: 25px;
    font-size: 14px;
    line-height: 4px !important;
    padding: 16px 0!important;
}
.bookBtn > span {
    display: block;
    padding-left: 17px;
    padding-bottom: 6px;
}
     }
         @media screen and (max-width: 400px) {
         	.bookBtn {
    padding: 12px 15px 0 !important;
}
     .bookBtn .btn-primary {
    width: 100%;
}
.bookBtn > span {
    float: left;
   font-size: 14px !important;
    padding-top: 8px;
    padding-left: 0;

}
.btn-book {
    width: 101px !important;
    height: auto !important;
    line-height: 20px !important;
    font-size: 14px;
    line-height: 20px !important;
    padding: 8px 0!important;
    float: right;
}
}
    @media screen and (max-width: 350px) {
        .departArrivale span {
            margin-right: 20px;
            font-size: 13px;
        }
        .mobile{ padding-right: 0 !important;}
        .details .line td img {
            width: 35px !important;
            margin-right: 8px;
        }
    }
    .container-radio a {
        text-decoration: none !important;
        color: #a8a8bc;
    }

    .filters-list .noUi-target{ width: 94%;}
    #sndli {
        padding-left:0px;
        position: absolute;
        right: 16px;
    }
</style>

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
<link rel="stylesheet" href="<?= $this->Url->css('nouislider_custom.css'); ?>">
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js" integrity="sha256-HT7c4lBipI1Hkl/uvUrU1HQx4WF3oQnSafPjgR9Cn8A=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js" integrity="sha256-HT7c4lBipI1Hkl/uvUrU1HQx4WF3oQnSafPjgR9Cn8A=" crossorigin="anonymous"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.min.js"></script>-->
<script src="<?= $this->Url->script('noUi.js'); ?>"></script>
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
                                <div class="destination-search-title"> <?= $this->User->cityHelper($_GET['origin'])->city; ?> - <?= $this->User->cityHelper($_GET['destination'])->city; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="destination-search-subtitle"> <?= date("M d, D", strtotime(str_replace('/', '-', $_GET['departure_date']))); ?> -
                                    <?php
                                    if (isset($_GET['passenger'])) {
                                        $psn = explode(" ", $_GET['passenger'])[0];
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
            <?php if ($_GET['radio'] != "One-Way Flight") { ?>
                <div class=" col-sm-4 col-md-5 col-lg-4  ">
                    <div class="row no-gutters destination-search-left-infos">
                        <div class="m-right-25"> <img src="<?= $this->Url->image('flight_bottom_yellow.png'); ?>"> </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col">
                                    <div class="destination-search-title"> <?= $this->User->cityHelper($_GET['destination'])->city; ?> - <?= $this->User->cityHelper($_GET['origin'])->city; ?> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="destination-search-subtitle"> <?= date("M d, D", strtotime(str_replace('/', '-', $_GET['return_date']))); ?> - <?php
                                        if (isset($_GET['passenger'])) {
                                            $psn = explode(" ", $_GET['passenger'])[0];
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
                                        if (isset($_GET['radio']) && $_GET['radio'] == "Return Trip") {
                                            echo 'checked="checked"';
                                        }
                                        ?> > <span class="checkmark"  ></span>
                                    </label>
                                </div>
                                <div class="">
                                    <label class="container-radio fligtRetr"><?php echo __('One-Way') ?>
                                        <input type="radio" value="One-Way Flight" name="radio" <?php
                                        if (isset($_GET['radio']) && $_GET['radio'] == "One-Way Flight") {
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
                                                if (isset($_GET['origin'])) {
                                                    echo $_GET['origin'];
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
                                                if (isset($_GET['destination'])) {
                                                    echo $_GET['destination'];
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
                                            if (isset($_GET['departure_date'])) {
                                                echo $_GET['departure_date'];
                                            }
                                            ?>" id="departure_date" name="departure_date" autocomplete="off" onblur="myInput()">
                                            <img src="<?= $this->Url->image('icon/icon_3.png'); ?>" class="formIcon box3_img_h" >
                                            <img src="<?= $this->Url->image('icon/icon_3_y.png'); ?>" class="formIcon box3_img">


                                        </div>
                                    </div>
                                    <div class="col-md-3" id="return_date1"  <?php
                                    if (isset($_GET['radio']) && $_GET['radio'] == "One-Way Flight") {
                                        echo 'style="display:none;"';
                                    }
                                    ?>>
                                        <div class="form-group" style="margin-bottom: 0px;">
                                            <label><?php echo __('Return Date') ?>:</label>
                                            <input type="text" data-language="en" class="datepicker-here form-control box4" placeholder="<?php echo __('Return Date') ?>" value="<?php
                                            if (isset($_GET['return_date'])) {
                                                echo $_GET['return_date'];
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
                                                if (isset($_GET['cabin']) && $_GET['cabin'] == "Economy") {
                                                    echo "selected";
                                                }
                                                ?>><?php echo __('Economy') ?></option>
                                                <option value="Business" <?php
                                                if (isset($_GET['cabin']) && $_GET['cabin'] == "Business") {
                                                    echo "selected";
                                                }
                                                ?>><?php echo __('Business') ?></option>
                                                <option value="First" <?php
                                                if (isset($_GET['cabin']) && $_GET['cabin'] == "First") {
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
                                                if (isset($_GET['passenger'])) {
                                                    echo $_GET['passenger'];
                                                } else {
                                                    echo "Passengers";
                                                }
                                                ?></div>
                                            <input type="hidden" name="passenger" id="passenger" value="">
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
<div class="space"></div>
<?php //echo"<pre>";pj($search_det_dats);echo "</pre>";  ?>

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
                            <h2 class="title  pieceRange  m-20" data-toggle="collapse" data-target="#collapseElem-1"><span></span><?php echo __('Price') ?> <i class="fas fa-chevron-down"></i></h2>
                        </div>

                    </div>
                    <!-- Price range -->
                    <div class="row">
                        <div class="col-12">
                            <div class="collapseElem collapse show" id="collapseElem-1">
                                <ul id="ulli"><li>AOA <span id="ccccc"></span></li> <li id="sndli">AOA <span id="ddddd"></span></li></ul>
                                <div id="slider-handles"></div>
                            </div>
                            <hr>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h2 class="title  m-20" data-toggle="collapse" data-target="#collapseElem-2"><span></span><?php echo __('Depart Time') ?> <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem collapse show" id="collapseElem-2">
                                <label class="container-radio radio-button">
                                    <input type="radio" value="00:00 to 06:00"  name="depart"> <span class="checkmark"></span> <span class="labelT"><?php echo __('Before 6 am') ?></span> </label>

                                <label class="container-radio radio-button">
                                    <input type="radio" value="06:00 to 11:59:59"  name="depart"> <span class="checkmark"></span> <span class="labelT"><?php echo __('6 am - 12 pm') ?></span> </label>

                                <label class="container-radio radio-button">
                                    <input type="radio" value="12:00 to 18:00"  name="depart"> <span class="checkmark"></span> <span class="labelT"><?php echo __('12 pm - 6 pm') ?></span> </label>
                                <label class="container-radio radio-button">
                                    <input type="radio" value="18:00 to 23:59:59" name="depart"> <span class="checkmark"></span> <span class="labelT"><?php echo __('After 6 pm') ?></span> </label>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-toggle="collapse" data-target="#collapseElem-3"><span></span> <?php echo __('Stops') ?> <i class="fas fa-chevron-down"></i></h2>

                            <div class="collapseElem collapse show" id="collapseElem-3">
                                <?php //array_unique($air_stops);  ?>
                                <label class="container-radio checkbox">
                                    <input value="10" type="radio"  name="air_stops" > <span class="checkmark"></span> <span class="labelT"><?php echo __('I don´t mind') ?></span> </label>
                                <label class="container-radio checkbox">
                                    <input value="0" type="radio"  name="air_stops" > <span class="checkmark"></span> <span class="labelT"><?php echo __('Direct') ?></span> </label>
                                <label class="container-radio checkbox">
                                    <input value="1" type="radio"  name="air_stops" > <span class="checkmark"></span> <span class="labelT"><?php echo __('1 Stop') ?></span> </label>
                                <label class="container-radio checkbox">
                                    <input value="2" type="radio"  name="air_stops" > <span class="checkmark"></span> <span class="labelT"><?php echo __('2+ Stops') ?></span> </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-toggle="collapse" data-target="#collapseElem-4"><span></span> <?php echo __('Airports') ?> <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem collapse show" id="collapseElem-4">
                                <label class="container-radio checkbox">
                                    <input type="checkbox" class="air_ports"  name="orgi" checked> <span class="checkmark"></span> <span class="labelT"><?= $this->User->cityHelper($_GET['origin'])->data; ?></span> </label>
                                <label class="container-radio checkbox">
                                    <input type="checkbox" class="air_ports" name="desi" checked> <span class="checkmark"></span> <span class="labelT"> <?= $this->User->cityHelper($_GET['destination'])->data; ?></span> </label>

                            </div>
                            <script>
                                $(document).ready(function () {

                                    $(".air_ports").click(function () {
                                        if ($('input[name="orgi"]').is(':checked') && $('input[name="desi"]').is(':checked')) {
                                            $('#all_results').show();
                                            $('#n-res').hide();
                                            $('.tab-results-mob').show();
                                        } else {
                                            $('#all_results').hide();
                                            $('#n-res').show();
                                            $('.tab-results-mob').hide();
                                        }

                                    });

                                });
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title m-20 m-bottom-40" data-toggle="collapse" data-target="#collapseElem-5"><span></span> <?php echo __('Airlines') ?> <i class="fas fa-chevron-down"></i></h2>
                            <div class="collapseElem collapse show" id="collapseElem-5">
                                <?php foreach (array_unique($air_li_det) as $a_l_d) { ?>
                                    <label class="container-radio checkbox">
                                        <input type="checkbox" class="air_line" checked="checked" value="<?= $a_l_d['start_d_airline_name']; ?>" name="radio"> <span class="checkmark"></span> <span class="labelT"><?= isset($cnt[$a_l_d['start_d_airline_name']]) ? $cnt[$a_l_d['start_d_airline_name']] : $a_l_d['start_d_airline_name']; ?></span> </label>
                                <?php } ?>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-default btn-reset" onclick="reset_all()"><?php echo __('Reset All') ?></button>
                        </div>
                    </div>

                </div>
            </div>
            <!-- Filters -->
            <!-- Results -->
            <div class="col-sm-12 col-md-8 col-lg-9" id="ressst">
                <div class="container bg-gris header-tab tab tab-results-mob">
                    <div class="d-table w-100 tab-title">
                        <div class="d-table-cell"><span id="num_res"><?= $res_found; ?></span> <?php echo __('Results') ?></div>
                        <div class="d-table-cell text-right p-right-10 sortby-label"><?php echo __('Sort by') ?>:</div>
                        <div class="d-table-cell">
                            <select name="" id="sortBy" class="sortBy">

                                <option value="comp_price.ASC" selected><?php echo __('Low to High (Recommended)') ?></option>
                                <option value="comp_price.DESC"><?php echo __('High to Low') ?></option>
                                <option value="time_diff.ASC"><?php echo __('Fastest Route') ?></option>
                                <option value="time_diff.DESC"><?php echo __('Slowest Route') ?></option>
                                <option value="start_depart_time.ASC"><?php echo __('Earliest Take-Off') ?></option>
                                <option value="start_depart_time.DESC"><?php echo __('Latest Take-Off') ?></option>
                                <option value="start_arrival_time.ASC"><?php echo __('Earliest Landing') ?></option>
                                <option value="start_arrival_time.DESC"><?php echo __('Latest Landing') ?></option>
                            </select>
                            <i class="fa fa-angle-down formIconSort"></i>
                        </div>
                    </div>
                </div>
                <div class="no-result" style=" width: 100%;display:none;" id="n-res">
                    <div class="no-found-logo">
                        <img src="<?= $this->Url->image('no-result-logo.png'); ?>" alt="">
                    </div>
                    <h2><?php echo __('No Flights Available') ?></h2>
                    <p><?php echo __('We could not find any flights according to your selected date. Try searching again with different dates.') ?></p>
                    <a href=""><?php echo __('Change') ?></a>
                </div>
                <div id="all_results">
                    <?php if ($res_found == 0) {
                        ?>
                        <div class="no-result" style=" width: 100%;" id="n-res">
                            <div class="no-found-logo">
                                <img src="<?= $this->Url->image('no-result-logo.png'); ?>" alt="">
                            </div>
                            <h2><?php echo __('No Flights Available') ?></h2>
                            <p><?php echo __('We could not find any flights according to your selected date. Try searching again with different dates.') ?></p>
                            <a href=""><?php echo __('Change') ?></a>
                        </div>    
                        <?php
                    } else {
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
                            //pj($resut['start_arrival_time']);
                            //echo $resut->start_depart_time."<br>". date('d-m-Y',strtotime($resut->start_depart_time));
                            ?>				
                            <div class="searchItem d-flex">

                                <div class="details desktop">
                                    <table class="line line-1">
                                        <tr>
                                            <td>
                                                <?php
                                                $img_s = $resut->start_d_airline_name . ".png";
                                                if (file_exists("img/flaglogos/" . $img_s)) {
                                                    $img_dat = HTTP_ROOT . "img/flaglogos/" . $img_s;
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
                                                <p class="time time-3"><?= __(date_format($resut['start_arrival_time'], 'h:i A')); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($resut['start_arrival_time'], 'Y-MM-d')))); ?></span></p>
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
                                                <p class="departure"><?= $this->User->cityHelper($_GET['origin'])->city . ' (' . $_GET['origin'] . ')'; ?></p>
                                            </td>

                                            <td>
                                                <p class="Arrival"><?= $this->User->cityHelper($_GET['destination'])->city . ' (' . $_GET['destination'] . ')'; ?></p>
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
                                                        $img_dat1 = HTTP_ROOT . "img/flaglogos/" . $img_r;
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
                                                    <p class="time"><?= __(date_format($resut['return_depart_time'], 'h:i A')); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($resut['return_depart_time'], 'Y-MM-d')))); ?></span></p>

                                                </td>
                                                <td rowspan="2">
                                                    <!--<div class="departArrivale">
                                                        <span>LAX</span><span>IST</span>
                                                    </div>-->
                                                    <p class="rangeTime"><span class="hours"><?= dateDifference($resut->return_arrival_time, $resut->return_depart_time); ?></span></p>
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
                                                <td class="time-desktop-4">
                                                    <p class="time time-4"><?= __(date_format($resut['return_arrival_time'], 'h:i A')); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($resut['return_arrival_time'], 'Y-MM-d')))); ?></span></p>
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
                                                    <p class="departure"><?= $this->User->cityHelper($_GET['destination'])->city . ' (' . $_GET['destination'] . ')'; ?></p>
                                                </td>

                                                <td>
                                                    <p class="Arrival"><?= $this->User->cityHelper($_GET['origin'])->city . ' (' . $_GET['origin'] . ')'; ?></p>
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
                                                <p class="time"><?= __(date_format($resut['start_depart_time'], 'h:i A')); ?><br><span><?= __(date("M d, D", strtotime($this->Time->format($resut['start_depart_time'], 'Y-MM-d')))); ?></span></p>
                                            </td>
                                            <td rowspan="2">
                                                <div class="departArrivale">
                                                    <span><?= $_GET['origin']; ?></span><span><?= $_GET['destination']; ?></span>
                                                </div>
                                                <p class="rangeTime"><span class="hours"><?= dateDifference($resut->start_arrival_time, $resut->start_depart_time); ?></span></p>
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
                                                <!-- <img src="img/icone-2.gif" alt="">-->
                                            </td>
                                            <td class="">
                                                <p class="time"><?= __(date_format($resut['start_arrival_time'], 'h:i A')); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($resut['start_arrival_time'], 'Y-MM-d')))); ?></span></p>
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
                                                    <p class="time"><?= __(date_format($resut['return_depart_time'], 'h:i A')); ?><br><span><?= __(date("M d, D", strtotime($this->Time->format($resut['return_depart_time'], 'Y-MM-d')))); ?></span></p>
                                                </td>
                                                <td rowspan="2">
                                                    <div class="departArrivale">
                                                        <span><?= $_GET['destination']; ?></span><span><?= $_GET['origin']; ?></span>
                                                    </div>
                                                    <p class="rangeTime"><span class="hours"><?= dateDifference($resut->return_arrival_time, $resut->return_depart_time); ?></span></p>
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
                                                    <!-- <img src="img/icone-2.gif" alt="">-->
                                                </td>
                                                <td class="">
                                                    <p class="time"><?= __(date_format($resut['return_arrival_time'], 'h:i A')); ?> <br><span><?= __(date("M d, D", strtotime($this->Time->format($resut['return_arrival_time'], 'Y-MM-d')))); ?></span></p>
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
                                                    <div class="flight-details-title"> <?php echo __('Flight Details') ?> </div>
                                                </div>
                                                <div class="col-md-3 col-6 offset-lg-1 text-right">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="flight-details-price"> <?= $resut->price; ?> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="flight-details-price-subtitle"> <?php echo __('Total Price') ?> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-lg-2"> <a href="<?= HTTP_ROOT . 'fare-details/' . $resut->id; ?>" class="btn btn-primary btn-select hvr-grow"  target="_blank"><?php echo __('Select') ?></a> </div>
                                            </div>
                                            <!-- Departure title -->
                                            <div class="row">
                                                <div class="col text-left">
                                                    <div class="flight-details-departure-title"> <?php echo __('DEPARTURE') ?>: <?= $this->User->cityHelper($_GET['origin'])->city; ?> - <?= $this->User->cityHelper($_GET['destination'])->city; ?> </div>
                                                </div>
                                            </div>
                                            <!-- Flight details row -->
                                            <?php
                                            for ($ini = 0; $ini <= $jor_st_cn; $ini++) {
                                                $fli_de = $this->User->flightdetails($resut->id)[$ini];

                                                $img_mod = $fli_de['airline'] . ".png";
                                                if (file_exists("img/flaglogos/" . $img_mod)) {
                                                    $img_mod_dat1 = HTTP_ROOT . "img/flaglogos/" . $img_mod;
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
                                                            <div class="col"> <?= dateDifference($fli_de['arr_time'], $fli_de['dep_time']); ?> | <?php echo __('Direct') ?> </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <hr /> </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col"> <?= $_GET['cabin']; ?> <?php echo __('Cabin') ?> </div>
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
                                                            <div class="flight-details-layover"> <?php echo __('Layover') ?>: <span><?= $this->User->cityHelper($fli_de['destination'])->city; ?> (<?= $fli_de['destination']; ?>)</span> - <?php echo __('Time') ?>: <?= dateDifference($this->User->flightdetails($resut->id)[$ini + 1]['dep_time'], $fli_de['arr_time']); ?> </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                            <hr />
                                            <!-- Departure title -->
                                            <?php if ($fli['jor_typ'] == "Journey Details Return") { ?>
                                                <div class="row">
                                                    <div class="col text-left">
                                                        <div class="flight-details-departure-title"> <?php echo __('RETURN') ?>: <?= $this->User->cityHelper($_GET['destination'])->city; ?> - <?= $this->User->cityHelper($_GET['origin'])->city; ?> </div>
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
                                                    $img_mod_dat1 = HTTP_ROOT . "img/flaglogos/" . $img_mod1;
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
                                                            <div class="col"> <?= dateDifference($fli_re['arr_time'], $fli_re['dep_time']); ?> | <?php echo __('Direct') ?> </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col">
                                                                <hr /> </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col"> <?= $_GET['cabin']; ?> <?php echo __('Cabin') ?> </div>
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
                                                            <div class="flight-details-layover"> <?php echo __('Layover') ?>: <span><?= $this->User->cityHelper($fli_re['destination'])->city; ?> (<?= $fli_re['destination']; ?>)</span> - <?php echo __('Time') ?>: <?= dateDifference($this->User->flightdetails($resut->id)[$ini + 1]['dep_time'], $fli_re['arr_time']); ?></div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                }
                                            }
                                            ?>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    $totalpagescount = ceil($res_found / 15);
                    ?>
                    <ul class="pagination" <?php
                    if ($totalpagescount == 0) {
                        echo "style='display:none;'";
                    }
                    ?>>                  
                            <?php
                            for ($pgno = 1; $pgno <= $totalpagescount; $pgno++) {
                                $aacc = "";
                                if ($pgno == 1) {
                                    $aacc = "active";
                                }
                                $origi = $_GET['origin'];
                                $desti = $_GET['destination'];
                                $cabin = $_GET['cabin'];

                                echo "<li id='" . $pgno . "' class='page-item " . $aacc . "  page-link' onclick='next_page(&#39;" . $cookiunq . "&#39;,$pgno,&#39;" . $origi . "&#39;,&#39;" . $desti . "&#39;,&#39;" . $totalpagescount . "&#39;,&#39;" . $cabin . "&#39;)'>" . $pgno . " </li>";
                            }
                            ?>
                    </ul>
                </div>

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
                <div class="footerResults">

                </div>
            </div>
            <!-- Results -->
        </div>

    </div>
</section>

<div class="space"></div>

<?php echo $this->element('frontend/inner-footer'); ?>
<script>
    function exchangeinp() {
        var origin = $('#origin').val().toUpperCase();
        var destination = $('#destination').val().toUpperCase();
        var temp = $('#origin').val().toUpperCase();
        $('#origin').val(destination);
        $('#destination').val(temp);
    }
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

</script>

<!-- Flight details -->

<script>
    var handlesSlider = document.getElementById('slider-handles');
    var stpr = 0;
    var enpr =<?php echo $top_price->comp_price + 1; ?>;

    noUiSlider.create(handlesSlider, {
        start: [0, <?= ($top_price->comp_price + 1); ?>],
        step: 10,
        tooltips: false,
        connect: [false, true, false],
        range: {
            'min': [0],
            'max': [<?= ($top_price->comp_price + 1); ?>]
        },
        format: wNumb({
            decimals: 0,
            suffix: ' $',
        })
    });

    function reset_all() {

        $('#collapseElem-4 .air_ports').prop('checked', true);
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
        }


        getValueUsingClass_airline();

    }



    handlesSlider.noUiSlider.on('set', function (values, handle) {
        var start = values[0].split(" ")[0];
        var end = values[1].split(" ")[0];

        getValueUsingClass_airline();

    });
    handlesSlider.noUiSlider.on('update', function (values, handle) {
        var start = values[0].split(" ")[0];
        var end = values[1].split(" ")[0];
        document.getElementById('ccccc').innerHTML = start;
        document.getElementById('ddddd').innerHTML = end;
    });


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

    $(document).ready(function () {
//        $('select').niceSelect();


        $("#filtersShowleft").click(function () {
            //alert('yes');
            //document.getElementById("mySidenav").style.width = "250px";
            $("#mySidenav").css({"width": "100%", "left": "0"});
        });

    });
    function closeNav() {
        //document.getElementById("mySidenav").style.width = "0";
        $("#mySidenav").css({"width": "0", "left": "-60px"});
    }



//                    function getQueryVariable(variable) {
//                     var query = window.location.search.substring(1);
//                        var vars = query.split('&');
//                        for (var i=0; i<vars.length; i++) {
//                            var pair = vars[i].split('=');
//                            if (pair[0] == variable) {
//                                return pair[1];
//                            }
//                        }
//                    return false;
//                    }
//                   getQueryVariable("start");


    function updateURL1(key, val) {
        var url = window.location.href;
        var reExp = new RegExp("[\?|\&]" + key + "=[0-9a-zA-Z\_\+\-\|\.\,\;]*");

        if (reExp.test(url)) {
// update
            var reExp = new RegExp("[\?&]" + key + "=([^&#]*)");
            var delimiter = reExp.exec(url)[0].charAt(0);
            url = url.replace(reExp, delimiter + key + "=" + val);

        } else {
// add
            var newParam = key + "=" + val;

            if (!url.indexOf('?')) {
                url += '?';
            }

            if (url.indexOf('#') > -1) {
                var urlparts = url.split('#');
                url = urlparts[0] + "&" + newParam + (urlparts[1] ? "#" + urlparts[1] : '');
            } else {
                url += "&" + newParam;
            }
        }
        window.history.pushState(null, document.title, url);
        window.location.href = url;
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
    $(document).ready(function () {

        $(".air_line").click(function () {
            getValueUsingClass_airline();
        });
        $("input[type='radio'][name='depart']").click(function () {
            getValueUsingClass_airline();
        });
        $("input[type='radio'][name='air_stops']").click(function () {
            getValueUsingClass_airline();
        });
        $("select#sortBy").change(function () {
            //alert($("#sortBy option:selected").val());
            getValueUsingClass_airline();
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

    function getValueUsingClass_airline() {

        var depart = "00:00:01 to 23:59:59";
        var air_stops = 10;
        if ($("input[type='radio'][name='depart']").length > 0) {
            depart = $("input[type='radio'][name='depart']:checked").val();
        }
        if (depart === "undefined") {
            depart = "00:00:01 to 23:59:59";
        }
        if ($("input[type='radio'][name='air_stops']").length > 0) {
            air_stops = $("input[type='radio'][name='air_stops']:checked").val();
        }
        if (air_stops === "undefined") {
            air_stops = 10;
        }

        var sortby = $("#sortBy option:selected").val();

        var chkArray = [];

        $(".air_line:checked").each(function () {
            chkArray.push($(this).val());
        });

        var selected;
        selected = chkArray.join('|');

        if (selected.length > 0) {

            var st_pri = $('#ccccc').text();
            var ed_pri = $('#ddddd').text();

            var i = 1;
            var lastpg = <?= $totalpagescount; ?>;
            for (i = 1; i <= lastpg; i++) {
                $('#' + i).removeAttr('class');
                $('#' + i).attr('class', 'page-item page-link');
            }
            $("#all_results").html(lod_mul_ti);
            jQuery.ajax({
                type: "POST",
                url: pageurl + "users/airportdata",
                dataType: 'html',
                data: {origin: "<?= $origi; ?>", destination: "<?= $desti; ?>", page: 1, airport: selected, startprice: st_pri, endprice: ed_pri, depart: depart, air_stops: air_stops, sortby: sortby, cabin: "<?= $_GET['cabin']; ?>"},
                success: function (res) {                  

                    $("#all_results").html(res);

                    // $('#sortBy').focus();
                    $('#' + y).removeAttr('class');
                    $('#' + y).attr('class', 'page-item active page-link');
                   
                     
                }
            });
        } else {
            $("#all_results").html("<div class='no-result' style=' width: 70%;'><div class='no-found-logo'><img src='" +<?= $this->Url->image('no-result-logo.png'); ?> + "' alt=''></div> <h2><?php echo __('No Flights Available') ?></h2><p><?php echo __('We could not find any flights according to your selected date. Try searching again with different dates.') ?></p> <a href=''>Change</a></div>");
        }
    }
</script>

<style>

    @keyframes placeHolderShimmer{
        0%{
            background-position: -468px 0
        }
        100%{
            background-position: 468px 0
        }
    }

    .animated-background {
        animation-duration: 1s;
        animation-fill-mode: forwards;
        animation-iteration-count: infinite;
        animation-name: placeHolderShimmer;
        animation-timing-function: linear;
        background: #f6f7f8;
        background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
        background-size: 800px 104px;
        height: 96px;
        position: relative;
    }
</style>
<style type="text/css">
    .loading {
        animation-duration: 1s;
        animation-fill-mode: forwards;
        animation-iteration-count: infinite;
        animation-name: wave;
        animation-timing-function: linear;
        -webkit-animation-duration: 1s;
        -webkit-animation-fill-mode: forwards;
        -webkit-animation-iteration-count: infinite;
        -webkit-animation-name: wave;
        -webkit-animation-timing-function: linear;
        -moz-animation-duration: 1s;
        -moz-animation-fill-mode: forwards;
        -moz-animation-iteration-count: infinite;
        -moz-animation-name: wave;
        -moz-animation-timing-function: linear;
        background: #dddddd;
        background-image: -webkit-gradient(linear,  left center,  right center,  from(#dddddd),  color-stop(.2,  #f5f5f5),  color-stop(.4,  #e5e5e5),  to(#dddddd));
        background-image: -webkit-linear-gradient(left,  #dddddd 0%,  #f5f5f5 20%,  #e5e5e5 40%,  #dddddd 100%);
        background-image: -moz-gradient(linear,  left center,  right center,  from(#dddddd),  color-stop(.2,  #f5f5f5),  color-stop(.4,  #e5e5e5),  to(#dddddd));
        background-image: -moz-linear-gradient(left,  #dddddd 0%,  #f5f5f5 20%, #e5e5e5 40%, #dddddd 100%);
        background-repeat: no-repeat;
        background-size: 800px 104px;
        height: 104px;
        position: relative;
    }
    .reverse-direction .loading {
        -webkit-animation-direction: reverse;
        -moz-animation-direction: reverse;
    }
    .loading div {
        background: #fff;
        height: 6px;
        position: absolute;
    }
    div.shape1 {
        height: 36px;
        right: 0;
        top: 33px;
        width: 23px;
    }
    div.shape2 {
        height: 10px;
        top: 28px;
        left: 0;
        width: 100%;
    }
    div.shape3 {
        left: 0;
        bottom: 27px;
        width: 100%;
        height: 10px;
    }
    @-webkit-keyframes wave {
        0% {
            background-position: -468px 0;
        }
        100% {
            background-position: 468px 0;
        }
    }
    @-moz-keyframes wave {
        0% {
            background-position: -468px 0;
        }
        100% {
            background-position: 468px 0;
        }
    }
</style>
<style type="text/css">
    .loading-box{ float: left; width: 100%; margin: 0 0 10px; padding: 0;}
    .loading-box li {
        display: inline-block;
        width: 15%;
        position: relative;
        margin: 0 4px;
    }
</style>
<script>
function topFunction() {
    document.body.scrollTop = 10;
    document.documentElement.scrollTop = 10;
}
</script>
