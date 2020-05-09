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

$currUrl = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<script>
//update URL in js
    function updateQueryStringParameter(uri, key, value) {
        var URL;
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            URL = uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            URL = uri + separator + key + "=" + value;
        }
        window.location.href = URL;
    }
</script>

<?php echo $this->element('frontend/login-header'); ?>
<style type="text/css">
    .hotel-lsting {
        border: 2px solid #eee;
        background: #fff;
        width: 100%;
        float: left;
        margin: 10px 0
    }
    .hotel-lsting-left {
        float: left;
        width: 203px;
        height: 182px;
        padding: 7px 9px;
        margin-top: 7px;
        margin-bottom: 0px;
        overflow: hidden;
    }
    .hotel-lsting-left img {
        min-width: 100%;
        min-height: 100%;
    }
    .rating {
        font-size: 15px;
        color: #f9d749;
    }
    .hotel-lsting-middle i.fa.fa-thumbs-up {
        background: #f9d749;
        padding: 5px 5px;
        font-size: 12px;
        color: #fff;
        border-radius: 2px;
    }
    .hotel-lsting-middle {
        float: left;
        padding-left: 27px;
    }
    .hotel-lsting-middle h3 {
        color: #000000;
        font-size: 18px;
        padding: 10px 10px;
    }
    .hotel-lsting-middle h5 {
        font-size: 12px;
        width: 45%;
        text-align: center;
        padding: 11px 6px;
        border-radius: 2px;
        font-weight: 600;
        color: #000000;
        float: left;
        margin-left: 11px;
        margin-right: 9px;
        text-transform: uppercase;
        background: #f9d749;
    }
    .hotel-lsting-middle a{
        color: #000;
        text-decoration: none;
    }
    .hotel-lsting-middle a:hover {
        color: #000;
        text-decoration: none;
    }
    .hotel-lsting-middle h6 {
        color: #000000;
        font-size: 15px;
        padding-bottom: 29px;
        text-decoration: none;
    }
    .hotel-lsting-middle span {
        color: #818283;
        font-size: 15px;
        text-decoration: underline;
        float: left;
        padding: 0 10px;
    }
    .hotel-lsting-middle p {
        font-size: 15px;
        color: #000000;
        padding: 0px 11px;
        margin: -20px 0px 14px 0px;
    }
    .hotel-lsting-middle p span {
        display: block;
    }
    .hotel-lsting-right{
        float: right;
        text-align: center;
    }
    .hotel-lsting-right h6 {
        color: #000000;
        font-size: 15px;
        text-decoration: none;
        padding: 14px 8px;
    }
    .hotel-lsting-right h5 {
        color: #000000;
        font-size: 15px;
        text-align: center;
        text-decoration: none;
        padding: 0 0px 0px 0px;
        font-weight: 400;
    }
    #pending-trips .hotel-lsting-right h5{
        padding: 35px 0px 5px 0px;
    }
    .hotel-lsting-right h4 {
        color: #b5b5b5;
        font-size: 17px;
        text-align: center;
        text-decoration: none;
        font-family: Arial, Helvetica, sans-serif;
    }
    .hotel-lsting-right span {
        background: #f9d749;
        border-radius: 3px;
        color: #000000;
        font-size: 14px;
        font-weight: bold;
        margin-left: 11px;
        padding: 4px 5px;
    }
    .check-availability {
        color: #101010;
        background: #f9d749;
        padding: 8px 13px;
        margin-top: 38px;
    }
    .check-availability a {
        color: #000;
        font-size: 15px;
        text-decoration: none;
        font-weight: normal !important;
    }
    .check-availability a:hover {
        color: #000;
        font-size: 15px;
        text-decoration: none;

    }
    .m-right-25 img {
        width: 60px;
    }
    .hotel-lsting-right .hvr-grow.btn-fill{
        background: #f5c009;
        height: auto !important;
        padding: 11px 31px !important;
        float: right;
        color: #000;
        font-size: 16px !important;
    }
    #pending-trips .hotel-lsting-right .hvr-grow.btn-fill{
        padding: 8px 31px !important;
    }
    .hotel-lsting-right .d-table-cell{ display: inline-block !important; }
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

    @media screen and (max-width: 991px) and (min-width: 768px) {
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
            font-size: 15px;
            line-height: 14px;
        }
        .time span {
            font-size: 12px;
        }
        .bookBtn > span{
            font-size: 15px;
        }
        .departure,
        .Arrival {
            font-size: 9px;
        }
        .stopsRange {
            width: 75px;
        }
        .tab {
            font-size: 17px;
        }
        .btn-book {
            width: 77px;
            height: 31px;
            line-height: 31px;
            font-size: 15px;
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
            width: 25px;
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
        .stopsRange {
            width: 100%;
            display: inline-block;
        }
        .tab {
            font-size: 17px;
        }
        .btn-book {
            width: 50px;
            height: 25px;
            line-height: 25px;
            font-size: 12px;
        }
        .bookBtn > span{
            margin-bottom: 0;
            font-size: 15px;
        }@media screen and (max-width: 767px) {
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
            .details .line td:first-child img {
                width: 16px;
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
                @media screen and (max-width: 767px) {font-size:12px;
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
                    display: -webkit-flex;
                    display: -moz-flex;
                    display: -ms-flex;
                    display: -o-flex;
                    display: flex;
                    justify-content: space-between;
                }
                .details.desktop{
                    display: none;
                }
                .details.mobile{
                    display: block;
                }
                .bookBtn{
                    max-width: 90px;
                    padding: 0 10px;
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
            }
            @media screen and (max-width: 480px) {
                .bookBtn {
                    max-width: 100% !important;
                    padding: 28px 15px 0 !important;
                    width: 100%;
                    text-align: left !important;
                    float: left;
                    display: inline-block;
                }
                .bookBtn span {
                    padding-top: 9px;
                    display: inline-block;
                }
                .btn-bookings{ float: right;}
            }
            
            .list li{padding: 0 10px 0 15px !important;}


        </style>

        <section id="search-results-body" style="margin: 50px 0 60px;">
            <div class="container">
                <div class="row">
                    <!-- Filters -->
                    <?php
                    echo $this->element('frontend/user-menu');
                    ?>
                    <!-- Filters -->

                    <!-- Results -->
                    <div class="col-sm-8 col-lg-9">

                        <ul class="nav nav-tabs" id="innerTab">
                            <li class="active"><a data-toggle="tab" href="#active-trips" class="active"><?php echo __('Flights'); ?> (<?= !empty($activecount) ? $activecount : 0; ?>)</a></li>
                            <li class="active"><a data-toggle="tab" href="#pending-trips"><?php echo __('Accommodations'); ?> (<?= !empty($all_pro_booking->count()) ? $all_pro_booking->count() : 0; ?>)</a></li>
                            <li><a data-toggle="tab" href="#past-trips"><?php echo __('Flight'); ?> + <?php echo __('Accommodation'); ?>  (<?= !empty($pastcount) ? $pastcount : 0; ?>)</a></li>   
                            <div class="col-md-3">
                                <div class="form-group" style="margin: 14px -20px 0px 15px;">

                                    <select class="form-control" name="0['doctyp']" id="doctyp" onchange="updateQueryStringParameter('<?= $currUrl; ?>', 'q', $(this).val())" required="" style="display: none;">                                        

                                        <option value="a" <?= (!empty($_GET['q']) && $_GET['q'] == 'a') ? 'selected' : ''; ?>><?php echo __('Active'); ?></option>
                                        <option value="p" <?= (!empty($_GET['q']) && $_GET['q'] == 'p') ? 'selected' : ''; ?>><?php echo __('Pending'); ?></option>
                                        <option value="c" <?= (!empty($_GET['q']) && $_GET['q'] == 'c') ? 'selected' : ''; ?>><?php echo __('Cancelled'); ?></option>
                                    </select>

                                    <i class="fa fa-angle-down formIconArrow" style="margin: -18px -18px;"></i>
                                </div>
                            </div>
                        </ul>

                        <div class="tab-content">
                            <div id="active-trips" class="tab-pane fade in active show">
                                <!-- active -->
                                <?php
                                if (!empty($active)) {
                                    foreach ($active as $details) {

                                        $pend_full_det = $this->User->bookingdet($details->id, $details->uniqueid);

                                        $jor_st_cn = -1;
                                        $jor_ed_cn = -1;
                                        foreach ($pend_full_det as $resut) {

                                            if ($resut->jor_typ == "Journey Details Start") {
                                                $jor_st_cn++;
                                            }
                                            if ($resut->jor_typ == "Journey Details Return") {
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
                                                            $img_s = $details->start_d_airline_name . ".png";
                                                            if (file_exists("img/flaglogos/" . $img_s)) {
                                                                $img_dat = HTTP_ROOT . "webroot/img/flaglogos/" . $img_s;
                                                            } else {
                                                                $img_dat = $this->Url->image('icone-1.gif');
                                                            }
                                                            ?>
                                                            <img src="<?= $img_dat; ?>" alt="" width="80">
                                                        </td>
                                                        <td class="d-none d-lg-block">

                                                        </td>
                                                        <td>
                                                            <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss'))); ?><br><span><?= date("M d, D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d'))); ?></span></p>

                                                        </td>
                                                        <td rowspan="2">
                                                            <div class="departArrivale">
                                                                <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                            </div>
                                                            <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span>m</p>
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
                                                            <p class="time time-3"><?= date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss'))); ?> <br><span><?= date("M d, D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                    <!--    <img src="img/icone-2.gif" alt="">-->                                       
                                                        </td>
                                                        <td class="d-none d-lg-block">
                                                    <!--   <p class="Airlines">American Airlines <br>BA-3271</p>-->
                                                        </td>
                                                        <td class="time-mobile-3">
                                                            <p class="departure"><?= $this->User->cityHelper($details->origin)->city . ' (' . $details->origin . ')'; ?></p>
                                                        </td>

                                                        <td>
                                                            <p class="Arrival"><?= $this->User->cityHelper($details->destination)->city . ' (' . $details->destination . ')'; ?></p>
                                                        </td>

                                                    </tr>
                                                </table>
                                                <?php if (!empty($details->return_d_airline_name)) { ?>
                                                    <hr>
                                                    <table class="line line-2">
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                $img_r = $details->return_d_airline_name . ".png";
                                                                if (file_exists("img/flaglogos/" . $img_r)) {
                                                                    $img_datr = HTTP_ROOT . "webroot/img/flaglogos/" . $img_r;
                                                                } else {
                                                                    $img_datr = $this->Url->image('icone-1.gif');
                                                                }
                                                                ?>
                                                                <img src="<?= $img_datr; ?>" alt="" width='80'>
                                                            </td>
                                                            <td class="d-none d-lg-block">

                                                            </td>
                                                            <td>
                                                                <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d'))); ?></span></p>

                                                            </td>
                                                            <td rowspan="2">
                                                                <div class="departArrivale">
                                                                    <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                </div>
                                                                <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
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
                                                                <p class="time time-3"><?= date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <!--<img src="img/icone-2.gif" alt="">-->
                                                            </td>
                                                            <td class="d-none d-lg-block">
                                                                <!--  <p class="Airlines">American Airlines <br>BA-3271</p>-->
                                                            </td>
                                                            <td class="time-mobile-4">
                                                                <p class="departure"><?= $this->User->cityHelper($details->destination)->city . ' (' . $details->destination . ')'; ?></p>
                                                            </td>

                                                            <td>
                                                                <p class="departure"><?= $this->User->cityHelper($details->origin)->city . ' (' . $details->origin . ')'; ?></p>
                                                            </td>

                                                        </tr>
                                                    </table>
                                                <?php } ?>
                                            </div>


                                            <div class="details mobile">
                                                <div class="details mobile">
                                                    <table class="line">
                                                        <tbody><tr>
                                                                <td>
                                                                    <img src="<?= $img_dat; ?>" alt="" style="width: 70px;">
                                                                </td>
                                                                <td class="">
                                                                    <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d'))); ?></span></p>
                                                                </td>
                                                                <td rowspan="2">
                                                                    <div class="departArrivale">
                                                                        <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                    </div>
                                                                    <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span></p>
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
                                                                    <!--  <img src="img/icone-2.gif" alt="">-->
                                                                </td>
                                                                <td class="">
                                                                    <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <?php if (!empty($details->return_d_airline_name)) { ?>
                                                        <br>
                                                        <table class="line line-2">
                                                            <tr>
                                                                <td>
                                                                    <img src="<?= $img_datr; ?>" alt="" style="width: 70px;">
                                                                </td>
                                                                <td class="">
                                                                    <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss'))); ?><br><span><?= date("M d, D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d'))); ?></span></p>
                                                                </td>
                                                                <td rowspan="2">
                                                                    <div class="departArrivale">
                                                                        <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                    </div>
                                                                    <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
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
                                                                    <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss'))); ?> <br><span><?= date("M d, D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                                </td>

                                                            </tr>
                                                        </table>
                                                    <?php } ?>
                                                </div>
                                            </div>


                                            <div class="bookBtn text-center">

                                                <?php if ($details->refundable == "true") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Refundable'); ?></p><?php } else if ($details->refundable == "false") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Non-Refundable'); ?></p><?php } ?>
                                                <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x<?= $details->passengers; ?></div>
                                                <span>  <?= $details->price; ?> </span>
                                                <?php
                                                if (date('Y-m-d H:i', strtotime('-24 hour -00 minutes', strtotime(date_format($details->start_depart_time, "Y-m-d H:i:s")))) <= date("Y-m-d H:i")) {
                                                    ?>
                                                    <a href='<?php echo $this->User->checkInUrl($details->start_d_airline_name); ?>'  class="btn-bookings" target="_blank" style="margin: 15px 0px 0px 0px;">  Check in </a>                           
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href='#' data-toggle= 'modal' data-target="#flight1DetailsModal<?= $details->id; ?>"  class="btn-bookings" style="margin: 15px 0px 0px 0px;">  View </a>                           
                                                    <?php
                                                }
                                                ?>


                                            </div>
                                            <!-- Flight details -->
                                            <div class="modal fade bd-example-modal-lg"  id="flight1DetailsModal<?= $details->id; ?>" tabindex="-1" role="dialog" aria-labelledby="flightDetailsModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="fas fa-times"></i></span> </button>
                                                        <div class="container">
                                                            <!-- Header -->
                                                            <div class="row flight-details-header">
                                                                <div class="col-md-6 col-6 text-left">
                                                                    <div class="flight-details-title"> <?php echo __('Flight Details'); ?> </div>
                                                                </div>
                                                                <div class="col-md-5 col-6 offset-lg-1 text-right">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="flight-details-price"> <?= $details->price; ?> </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <div class="flight-details-price-subtitle"> <?php echo __('Total Price'); ?> </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <!-- Departure title -->
                                                            <div class="row">
                                                                <div class="col text-left">
                                                                    <div class="flight-details-departure-title"> <?php echo __('DEPARTURE'); ?>: <?= $this->User->cityHelper($details->origin)->city; ?> - <?= $this->User->cityHelper($details->destination)->city; ?> </div>
                                                                </div>
                                                            </div>
                                                            <!-- Flight details row -->
                                                            <?php
                                                            for ($ini = 0; $ini <= $jor_st_cn; $ini++) {
                                                                $fli_de = $this->User->userjrdetails($details->id)[$ini];

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
                                                                            <div class="col"> <?= date("M d, D", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d'))); ?>, <?= date("h:i A", strtotime($this->Time->format($fli_de['dep_time'], 'hh:mm:ss'))); ?> </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col"> <?= $this->User->cityHelper($fli_de['origin'])->city; ?> (<?= $fli_de['origin']; ?>), <?= $this->User->cityHelper($fli_de['origin'])->country; ?> </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-4 flight-details-duration text-center">
                                                                        <div class="row">
                                                                            <div class="col"> <?= dateDifference($fli_de['arr_time'], $fli_de['dep_time']); ?> | <?php echo __('Direct'); ?> </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <hr /> </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col"> <?= $details->cabin; ?> <?php echo __('Cabin'); ?> </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                        <div class="row">
                                                                            <div class="col"> <?= $this->User->cityHelper($fli_de['destination'])->city; ?> </div>
                                                                        </div>
                                                                        <div class="row flight-details-date">
                                                                            <div class="col"> <?= date("M d, D", strtotime($this->Time->format($fli_de['arr_time'], 'Y-MM-d'))); ?>, <?= date("h:i A", strtotime($this->Time->format($fli_de['arr_time'], 'hh:mm:ss'))); ?> </div>
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
                                                                            <div class="flight-details-layover"> <?php echo __('Layover'); ?>: <span><?= $this->User->cityHelper($fli_de['destination'])->city; ?> (<?= $fli_de['destination']; ?>)</span> - <?php echo __('Time'); ?>: <?= dateDifference($this->User->userjrdetails($details->id)[$ini + 1]['dep_time'], $fli_de['arr_time']); ?> </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                            <hr />
                                                            <!-- Departure title -->
                                                            <?php if (!empty($details->return_depart_time)) { ?>
                                                                <div class="row">
                                                                    <div class="col text-left">
                                                                        <div class="flight-details-departure-title"> <?php echo __('RETURN'); ?>: <?= $this->User->cityHelper($details->destination)->city; ?> - <?= $this->User->cityHelper($details->origin)->city; ?> </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Flight details row -->                  


                                                                <?php
                                                                $po_end = $jor_st_cn + $jor_ed_cn;
                                                                for ($ini = $jor_st_cn + 1; $ini <= $po_end + 1; $ini++) {
                                                                    $fli_re = $this->User->userjrdetails($details->id)[$ini];
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
                                                                                <div class="col">  <?= date("M d, D", strtotime($this->Time->format($fli_re['dep_time'], 'Y-MM-d'))); ?>, <?= date("h:i A", strtotime($this->Time->format($fli_re['dep_time'], 'hh:mm:ss'))); ?> </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col"> <?= $this->User->cityHelper($fli_re['origin'])->city; ?> (<?= $fli_re['origin']; ?>), <?= $this->User->cityHelper($fli_re['origin'])->country; ?>  </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 col-4 flight-details-duration text-center">
                                                                            <div class="row">
                                                                                <div class="col"> <?= dateDifference($fli_re['arr_time'], $fli_re['dep_time']); ?> | <?php echo __('Direct'); ?> </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <hr /> </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col"> <?= $details->cabin; ?> <?php echo __('Cabin'); ?> </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                            <div class="row">
                                                                                <div class="col"> <?= $this->User->cityHelper($fli_re['destination'])->city; ?> </div>
                                                                            </div>
                                                                            <div class="row flight-details-date">
                                                                                <div class="col"> <?= date("M d, D", strtotime($this->Time->format($fli_re['arr_time'], 'Y-MM-d'))); ?>, <?= date("h:i A", strtotime($this->Time->format($fli_re['arr_time'], 'hh:mm:ss'))); ?> </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col"> <?= $this->User->cityHelper($fli_re['destination'])->city; ?> (<?= $fli_re['destination']; ?>), <?= $this->User->cityHelper($fli_re['destination'])->country; ?> </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php if ($ini != $po_end + 1) { ?>
                                                                        <div class="row">
                                                                            <div class="col text-center">
                                                                                <div class="flight-details-layover"> <?php echo __('Layover'); ?>: <span><?= $this->User->cityHelper($fli_re['destination'])->city; ?> (<?= $fli_re['destination']; ?>)</span> - <?php echo __('Time'); ?>: <?= dateDifference($this->User->userjrdetails($details->id)[$ini + 1]['dep_time'], $fli_re['arr_time']); ?></div>
                                                                            </div>
                                                                        </div>

                                                                        <?php
                                                                    }
                                                                }
                                                                ?>

                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                } else {
                                    echo "NO DATA FOUND.";
                                }
                                ?>

                                <!-- Pending -->
                                <?php
                                if (!empty($pendingdet)) {
                                    foreach ($pendingdet as $details) {

                                        $pend_full_det = $this->User->bookingdet($details->id, $details->uniqueid);

                                        $jor_st_cn = -1;
                                        $jor_ed_cn = -1;
                                        foreach ($pend_full_det as $resut) {

                                            if ($resut->jor_typ == "Journey Details Start") {
                                                $jor_st_cn++;
                                            }
                                            if ($resut->jor_typ == "Journey Details Return") {
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
                                                            $img_s = $details->start_d_airline_name . ".png";
                                                            if (file_exists("img/flaglogos/" . $img_s)) {
                                                                $img_dat = HTTP_ROOT . "webroot/img/flaglogos/" . $img_s;
                                                            } else {
                                                                $img_dat = $this->Url->image('icone-1.gif');
                                                            }
                                                            ?>
                                                            <img src="<?= $img_dat; ?>" alt="" width="80">
                                                        </td>
                                                        <td class="d-none d-lg-block">

                                                        </td>
                                                        <td>
                                                            <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss'))); ?><br><span><?= date("M d, D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d'))); ?></span></p>

                                                        </td>
                                                        <td rowspan="2">
                                                            <div class="departArrivale">
                                                                <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                            </div>
                                                            <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span>m</p>
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
                                                            <p class="time time-3"><?= date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss'))); ?> <br><span><?= date("M d, D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>
                                                    <!--    <img src="img/icone-2.gif" alt="">-->                                       
                                                        </td>
                                                        <td class="d-none d-lg-block">
                                                    <!--   <p class="Airlines">American Airlines <br>BA-3271</p>-->
                                                        </td>
                                                        <td class="time-mobile-3">
                                                            <p class="departure"><?= $this->User->cityHelper($details->origin)->city . ' (' . $details->origin . ')'; ?></p>
                                                        </td>

                                                        <td>
                                                            <p class="Arrival"><?= $this->User->cityHelper($details->destination)->city . ' (' . $details->destination . ')'; ?></p>
                                                        </td>

                                                    </tr>
                                                </table>
                                                <?php if (!empty($details->return_d_airline_name)) { ?>
                                                    <hr>
                                                    <table class="line line-2">
                                                        <tr>
                                                            <td>
                                                                <?php
                                                                $img_r = $details->return_d_airline_name . ".png";
                                                                if (file_exists("img/flaglogos/" . $img_r)) {
                                                                    $img_datr = HTTP_ROOT . "webroot/img/flaglogos/" . $img_r;
                                                                } else {
                                                                    $img_datr = $this->Url->image('icone-1.gif');
                                                                }
                                                                ?>
                                                                <img src="<?= $img_datr; ?>" alt="" width='80'>
                                                            </td>
                                                            <td class="d-none d-lg-block">

                                                            </td>
                                                            <td>
                                                                <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d'))); ?></span></p>

                                                            </td>
                                                            <td rowspan="2">
                                                                <div class="departArrivale">
                                                                    <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                </div>
                                                                <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
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
                                                                <p class="time time-3"><?= date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <!--<img src="img/icone-2.gif" alt="">-->
                                                            </td>
                                                            <td class="d-none d-lg-block">
                                                                <!--  <p class="Airlines">American Airlines <br>BA-3271</p>-->
                                                            </td>
                                                            <td class="time-mobile-4">
                                                                <p class="departure"><?= $this->User->cityHelper($details->destination)->city . ' (' . $details->destination . ')'; ?></p>
                                                            </td>

                                                            <td>
                                                                <p class="departure"><?= $this->User->cityHelper($details->origin)->city . ' (' . $details->origin . ')'; ?></p>
                                                            </td>

                                                        </tr>
                                                    </table>
                                                <?php } ?>
                                            </div>


                                            <div class="details mobile">
                                                <div class="details mobile">
                                                    <table class="line">
                                                        <tbody><tr>
                                                                <td>
                                                                    <img src="<?= $img_dat; ?>" alt="" style="width: 70px;">
                                                                </td>
                                                                <td class="">
                                                                    <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d'))); ?></span></p>
                                                                </td>
                                                                <td rowspan="2">
                                                                    <div class="departArrivale">
                                                                        <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                    </div>
                                                                    <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span></p>
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
                                                                    <!--  <img src="img/icone-2.gif" alt="">-->
                                                                </td>
                                                                <td class="">
                                                                    <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <?php if (!empty($details->return_d_airline_name)) { ?>
                                                        <br>
                                                        <table class="line line-2">
                                                            <tr>
                                                                <td>
                                                                    <img src="<?= $img_datr; ?>" alt="" style="width: 70px;">
                                                                </td>
                                                                <td class="">
                                                                    <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss'))); ?><br><span><?= date("M d, D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d'))); ?></span></p>
                                                                </td>
                                                                <td rowspan="2">
                                                                    <div class="departArrivale">
                                                                        <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                    </div>
                                                                    <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
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
                                                                    <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss'))); ?> <br><span><?= date("M d, D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                                </td>

                                                            </tr>
                                                        </table>
                                                    <?php } ?>
                                                </div>
                                            </div>


                                            <div class="bookBtn text-center">
                                                <?php if ($details->refundable == "true") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Refundable'); ?></p><?php } else if ($details->refundable == "false") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Non-Refundable'); ?></p><?php } ?>
                                                <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x<?= $details->passengers; ?></div>

                                                <span>  <?= $details->price; ?> </span>
                                                <?php if (date('Y-m-d H:i:s') < date('Y-m-d H:i:s', strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d hh:mm:ss')))) { ?>
                                                    <a href='<?= HTTP_ROOT . "route-review/" . $details->id; ?>'  class="btn-bookings">  <?php echo __('Pending'); ?> </a>
                                                <?php } else { ?>
                                                    <span  class="btn-bookings" style="font-size: 1rem;">  <?php echo __('Pending'); ?> </span>
                                                <?php } ?> 
                                            </div>
                                        </div>

                                        <?php
                                    }
                                } else {
                                    echo "NO DATA FOUND.";
                                }
                                ?>
                            </div>



                            <div id="pending-trips" class="tab-pane fade in active">
                                <!--Property booked -->
                                <?php
                                foreach ($all_pro_booking as $pro_book) {
                                    $property_details = $this->User->getDataForHotel($pro_book->property_id);
                                    $guest = count(json_decode($pro_book->room_fnm));
                                    $getBetDetails = $this->User->propertyBedCount($pro_book->property_id, $guest);
                                    $aminity = $this->User->propertyAmenities($pro_book->property_id, $guest);
                                    ?>
                                    <div class="hotel-lsting">
                                        <div class="hotel-lsting-left">

                                            <img src="<?= HTTP_ROOT; ?>img/pro_pic/<?= $this->User->getHotelImage($pro_book->property_id); ?>" alt="img" style="width: 100%;">
                                        </div>
                                        <div class="hotel-lsting-middle">
                                            <h3><?= $property_details->description->propertyName; ?>  
                                                <?php for ($i = 1; $i <= $property_details->description->rating; $i++) { ?>
                                                    <i class="fa fa-star rating"></i>
                                                <?php } ?>
                                                <i class="fa fa-thumbs-up"></i>
                                            </h3>
                                            <h6><span><a href="#"><?= $property_details->property_size; ?> <?php echo __('Sqm') ?></a>
                                                    <br>

                                                    </h6>
                                                    <p style="float: left;"><i class="fas fa-users"></i> <?php
                                                        echo $this->User->propertyPeople($pro_book->property_id, $guest);
                                                        if ($this->User->propertyPeople($pro_book->property_id, $guest) <= 1) {
                                                            ?> <?php echo __('Guest') ?> <?php } else { ?> <?php echo __('Guests') ?> <?php } ?><br>
                                                        <i class="fas fa-bed"></i> <?php echo $getBetDetails->num_bed; ?>x <?php echo __($getBetDetails->beds); ?>  <?php foreach ($getBetDetails->extranets_user_property_sub_beds as $bes) { ?> <?php echo " + " . $bes->num_beds ?>x <?php
                                                            echo __($bes->beds);
                                                        }
                                                        ?>
                                                        <br>
                                                        <?php
                                                        //pj($aminity);
                                                        $aminityx = [];
                                                        $geta = json_decode($aminity);
                                                        $i = 1;
                                                        foreach ($geta as $daee) {
                                                            $aminityx[] = __($daee);
                                                            if ($i++ == 3)
                                                                break;
                                                        }
                                                        echo implode(', ', $aminityx);
                                                        ?>

                                                    </p>
                                                    <?php if ($property_details->description->rating >= 4) { ?><h5 style="background-color:#8bc34a !important;font-size: 15px;width: 62%;margin-top: -3px;text-transform: capitalize;"><a href="#"><?php echo __('High Quality'); ?></a></h5> 
                                                    <?php } else if ($property_details->description->rating >= 3) { ?><h5 style="background-color: #ffc107 !important;font-size: 15px;width: 62%;margin-top: 12px;text-transform: capitalize;"><a href="#"><?php echo __('Medium Quality') ?></a></h5> 
                                                    <?php } else if ($property_details->description->rating <= 2) { ?><h5 style="background-color: #f44336 !important;font-size: 15px;width: 62%;margin-top: -3px;text-transform: capitalize;"><a href="#"><?php echo __('Low Quality') ?></a></h5> <?php } ?>
                                                    </div>
                                                    <div class="hotel-lsting-right">
                                                        <h6><?php echo $this->User->reviewCount($pro_book->property_id); ?> reviews<span><?php echo is_nan($this->User->totalRating($pro_book->property_id)) ? 0 : $this->User->totalRating($pro_book->property_id); ?></span></h6>

                                                        <h5>AOA <?= changeFormat(number_format($pro_book->total_cost, 2)); ?></h5>
                                                        <div class="form-group" style="margin: 16px 9px 0px 0px;">
                                                            <label>&nbsp;</label>
                                                            <?php if (date('Y-m-d') <= date_format($pro_book->check_out, 'Y-m-d')) { ?>
                                                                <button type="button" id="submit" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;"><?php if ($pro_book->payment_status == 1) { ?> Pending <?php } elseif ($pro_book->payment_status == 2) { ?> Cancel <?php } elseif ($pro_book->payment_status == 3) { ?> Paid <?php } ?></button>
                                                            <?php } else { ?>
                                                                <button onclick="modal_open(<?= $pro_book->property_id; ?>, '<?= $pro_book->booking_no; ?>')" type="button" class="btn btn-primary hvr-grow btn-fill" >Review</button>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    </div>
                                                <?php } ?>
                                                </div>

                                                <div id="past-trips" class="tab-pane fade">



                                                    <!-- past -->
                                                    <?php
                                                    if (!empty($past)) {
                                                        foreach ($past as $details) {

                                                            $pend_full_det = $this->User->bookingdet($details->id, $details->uniqueid);

                                                            $jor_st_cn = -1;
                                                            $jor_ed_cn = -1;
                                                            foreach ($pend_full_det as $resut) {

                                                                if ($resut->jor_typ == "Journey Details Start") {
                                                                    $jor_st_cn++;
                                                                }
                                                                if ($resut->jor_typ == "Journey Details Return") {
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
                                                                                $img_s = $details->start_d_airline_name . ".png";
                                                                                if (file_exists("img/flaglogos/" . $img_s)) {
                                                                                    $img_dat = HTTP_ROOT . "webroot/img/flaglogos/" . $img_s;
                                                                                } else {
                                                                                    $img_dat = $this->Url->image('icone-1.gif');
                                                                                }
                                                                                ?>
                                                                                <img src="<?= $img_dat; ?>" alt="" width="80">
                                                                            </td>
                                                                            <td class="d-none d-lg-block">

                                                                            </td>
                                                                            <td>
                                                                                <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss'))); ?><br><span><?= date("M d, D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d'))); ?></span></p>

                                                                            </td>
                                                                            <td rowspan="2">
                                                                                <div class="departArrivale">
                                                                                    <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                                </div>
                                                                                <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span>m</p>
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
                                                                                <p class="time time-3"><?= date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss'))); ?> <br><span><?= date("M d, D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                                            </td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                        <!--    <img src="img/icone-2.gif" alt="">-->                                       
                                                                            </td>
                                                                            <td class="d-none d-lg-block">
                                                                        <!--   <p class="Airlines">American Airlines <br>BA-3271</p>-->
                                                                            </td>
                                                                            <td class="time-mobile-3">
                                                                                <p class="departure"><?= $this->User->cityHelper($details->origin)->city . ' (' . $details->origin . ')'; ?></p>
                                                                            </td>

                                                                            <td>
                                                                                <p class="Arrival"><?= $this->User->cityHelper($details->destination)->city . ' (' . $details->destination . ')'; ?></p>
                                                                            </td>

                                                                        </tr>
                                                                    </table>
                                                                    <?php if (!empty($details->return_d_airline_name)) { ?>
                                                                        <hr>
                                                                        <table class="line line-2">
                                                                            <tr>
                                                                                <td>
                                                                                    <?php
                                                                                    $img_r = $details->return_d_airline_name . ".png";
                                                                                    if (file_exists("img/flaglogos/" . $img_r)) {
                                                                                        $img_datr = HTTP_ROOT . "webroot/img/flaglogos/" . $img_r;
                                                                                    } else {
                                                                                        $img_datr = $this->Url->image('icone-1.gif');
                                                                                    }
                                                                                    ?>
                                                                                    <img src="<?= $img_datr; ?>" alt="" width='80'>
                                                                                </td>
                                                                                <td class="d-none d-lg-block">

                                                                                </td>
                                                                                <td>
                                                                                    <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d'))); ?></span></p>

                                                                                </td>
                                                                                <td rowspan="2">
                                                                                    <div class="departArrivale">
                                                                                        <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                                    </div>
                                                                                    <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
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
                                                                                    <p class="time time-3"><?= date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                                                </td>

                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <!--<img src="img/icone-2.gif" alt="">-->
                                                                                </td>
                                                                                <td class="d-none d-lg-block">
                                                                                    <!--  <p class="Airlines">American Airlines <br>BA-3271</p>-->
                                                                                </td>
                                                                                <td class="time-mobile-4">
                                                                                    <p class="departure"><?= $this->User->cityHelper($details->destination)->city . ' (' . $details->destination . ')'; ?></p>
                                                                                </td>

                                                                                <td>
                                                                                    <p class="departure"><?= $this->User->cityHelper($details->origin)->city . ' (' . $details->origin . ')'; ?></p>
                                                                                </td>

                                                                            </tr>
                                                                        </table>
                                                                    <?php } ?>
                                                                </div>


                                                                <div class="details mobile">
                                                                    <div class="details mobile">
                                                                        <table class="line">
                                                                            <tbody><tr>
                                                                                    <td>
                                                                                        <img src="<?= $img_dat; ?>" alt="" style="width: 70px;">
                                                                                    </td>
                                                                                    <td class="">
                                                                                        <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d'))); ?></span></p>
                                                                                    </td>
                                                                                    <td rowspan="2">
                                                                                        <div class="departArrivale">
                                                                                            <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                                        </div>
                                                                                        <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span></p>
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
                                                                                        <!--  <img src="img/icone-2.gif" alt="">-->
                                                                                    </td>
                                                                                    <td class="">
                                                                                        <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss'))); ?> <br> <span><?= date("M d, D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                                                    </td>

                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <?php if (!empty($details->return_d_airline_name)) { ?>
                                                                            <br>
                                                                            <table class="line line-2">
                                                                                <tr>
                                                                                    <td>
                                                                                        <img src="<?= $img_datr; ?>" alt="" style="width: 70px;">
                                                                                    </td>
                                                                                    <td class="">
                                                                                        <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss'))); ?><br><span><?= date("M d, D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d'))); ?></span></p>
                                                                                    </td>
                                                                                    <td rowspan="2">
                                                                                        <div class="departArrivale">
                                                                                            <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                                        </div>
                                                                                        <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
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
                                                                                        <p class="time"><?= date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss'))); ?> <br><span><?= date("M d, D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d'))); ?></span></p>
                                                                                    </td>

                                                                                </tr>
                                                                            </table>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>


                                                                <div class="bookBtn text-center">
                                                                    <?php if ($details->refundable == "true") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Refundable'); ?></p><?php } else if ($details->refundable == "false") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Non-Refundable'); ?></p><?php } ?>
                                                                    <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x<?= $details->passengers; ?></div>

                                                                    <span>  <?= $details->price; ?> </span>

                                                                    <a href='#' data-toggle="modal" data-target="#flightDetailsModal<?= $details->id; ?>"  class="btn-bookings" style="margin: 15px 0px 0px 0px;">  <?php echo __('More Details'); ?> </a>

                                                                </div>
                                                                <!-- Flight details -->
                                                                <div class="modal fade bd-example-modal-lg"  id="flightDetailsModal<?= $details->id; ?>" tabindex="-1" role="dialog" aria-labelledby="flightDetailsModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                        <div class="modal-content">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="fas fa-times"></i></span> </button>
                                                                            <div class="container">
                                                                                <!-- Header -->
                                                                                <div class="row flight-details-header">
                                                                                    <div class="col-md-6 col-6 text-left">
                                                                                        <div class="flight-details-title"> <?php echo __('Flight Details'); ?> </div>
                                                                                    </div>
                                                                                    <div class="col-md-5 col-6 offset-lg-1 text-right">
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <div class="flight-details-price"> <?= $details->price; ?> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <div class="flight-details-price-subtitle"> <?php echo __('Total Price'); ?> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <!-- Departure title -->
                                                                                <div class="row">
                                                                                    <div class="col text-left">
                                                                                        <div class="flight-details-departure-title"> <?php echo __('DEPARTURE'); ?>: <?= $this->User->cityHelper($details->origin)->city; ?> - <?= $this->User->cityHelper($details->destination)->city; ?> </div>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- Flight details row -->
                                                                                <?php
                                                                                for ($ini = 0; $ini <= $jor_st_cn; $ini++) {
                                                                                    $fli_de = $this->User->userjrdetails($details->id)[$ini];

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
                                                                                                <div class="col"> <?= date("M d, D", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d'))); ?>, <?= date("h:i A", strtotime($this->Time->format($fli_de['dep_time'], 'hh:mm:ss'))); ?> </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col"> <?= $this->User->cityHelper($fli_de['origin'])->city; ?> (<?= $fli_de['origin']; ?>), <?= $this->User->cityHelper($fli_de['origin'])->country; ?> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-4 flight-details-duration text-center">
                                                                                            <div class="row">
                                                                                                <div class="col"> <?= dateDifference($fli_de['arr_time'], $fli_de['dep_time']); ?> | <?php echo __('Direct'); ?> </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col">
                                                                                                    <hr /> </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col"> <?= $details->cabin; ?> <?php echo __('Cabin'); ?> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                            <div class="row">
                                                                                                <div class="col"> <?= $this->User->cityHelper($fli_de['destination'])->city; ?> </div>
                                                                                            </div>
                                                                                            <div class="row flight-details-date">
                                                                                                <div class="col"> <?= date("M d, D", strtotime($this->Time->format($fli_de['arr_time'], 'Y-MM-d'))); ?>, <?= date("h:i A", strtotime($this->Time->format($fli_de['arr_time'], 'hh:mm:ss'))); ?> </div>
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
                                                                                                <div class="flight-details-layover"> <?php echo __('Layover'); ?>: <span><?= $this->User->cityHelper($fli_de['destination'])->city; ?> (<?= $fli_de['destination']; ?>)</span> - <?php echo __('Time'); ?>: <?= dateDifference($this->User->userjrdetails($details->id)[$ini + 1]['dep_time'], $fli_de['arr_time']); ?> </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                <hr />
                                                                                <!-- Departure title -->
                                                                                <?php if (!empty($details->return_depart_time)) { ?>
                                                                                    <div class="row">
                                                                                        <div class="col text-left">
                                                                                            <div class="flight-details-departure-title"> <?php echo __('RETURN'); ?>: <?= $this->User->cityHelper($details->destination)->city; ?> - <?= $this->User->cityHelper($details->origin)->city; ?> </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <!-- Flight details row -->                  


                                                                                    <?php
                                                                                    $po_end = $jor_st_cn + $jor_ed_cn;
                                                                                    for ($ini = $jor_st_cn + 1; $ini <= $po_end + 1; $ini++) {
                                                                                        $fli_re = $this->User->userjrdetails($details->id)[$ini];
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
                                                                                                    <div class="col">  <?= date("M d, D", strtotime($this->Time->format($fli_re['dep_time'], 'Y-MM-d'))); ?>, <?= date("h:i A", strtotime($this->Time->format($fli_re['dep_time'], 'hh:mm:ss'))); ?> </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col"> <?= $this->User->cityHelper($fli_re['origin'])->city; ?> (<?= $fli_re['origin']; ?>), <?= $this->User->cityHelper($fli_re['origin'])->country; ?>  </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-3 col-4 flight-details-duration text-center">
                                                                                                <div class="row">
                                                                                                    <div class="col"> <?= dateDifference($fli_re['arr_time'], $fli_re['dep_time']); ?> | <?php echo __('Direct'); ?> </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col">
                                                                                                        <hr /> </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col"> <?= $details->cabin; ?> <?php echo __('Cabin'); ?> </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                                <div class="row">
                                                                                                    <div class="col"> <?= $this->User->cityHelper($fli_re['destination'])->city; ?> </div>
                                                                                                </div>
                                                                                                <div class="row flight-details-date">
                                                                                                    <div class="col"> <?= date("M d, D", strtotime($this->Time->format($fli_re['arr_time'], 'Y-MM-d'))); ?>, <?= date("h:i A", strtotime($this->Time->format($fli_re['arr_time'], 'hh:mm:ss'))); ?> </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col"> <?= $this->User->cityHelper($fli_re['destination'])->city; ?> (<?= $fli_re['destination']; ?>), <?= $this->User->cityHelper($fli_re['destination'])->country; ?> </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php if ($ini != $po_end + 1) { ?>
                                                                                            <div class="row">
                                                                                                <div class="col text-center">
                                                                                                    <div class="flight-details-layover"> <?php echo __('Layover'); ?>: <span><?= $this->User->cityHelper($fli_re['destination'])->city; ?> (<?= $fli_re['destination']; ?>)</span> - <?php echo __('Time'); ?>: <?= dateDifference($this->User->userjrdetails($details->id)[$ini + 1]['dep_time'], $fli_re['arr_time']); ?></div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                    ?>

                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php
                                                        }
                                                    } else {
                                                        echo "NO DATA FOUND.";
                                                    }
                                                    ?>
                                                    <div class="hotel-lsting">
                                                        <div class="hotel-lsting-left">

                                                            <img src="<?= HTTP_ROOT; ?>img/pro_pic/2b3a28603cb9a8f4dfcaf2ee6475f79c.jpg" alt="img" style="width: 100%;">
                                                        </div>
                                                        <div class="hotel-lsting-middle">
                                                            <h3>Hotel Janet  
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-thumbs-up"></i>
                                                            </h3>
                                                            <h6><span><a href="#">111 square feet</a></span>1 Double Bed </h6>
                                                            <p>(Extra beds available: Crib)<br>
                                                                Room sleeps 3 guests (up to 2 children)</p>
                                                            <h5 style="background-color: #ffc107 !important;"><a href="#">medium quality</a></h5> 
                                                        </div>
                                                        <div class="hotel-lsting-right">
                                                            <h6>1,957 reviews<span>5.2</span></h6>
                                                            <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x1</div>
                                                            <h5>GBP 5,000.00</h5>
                                                            <div class="form-group" style="margin: 16px 9px 0px 0px;">
                                                                <label>&nbsp;</label>
                                                                <button type="button" id="submit" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;">Pending</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hotel-lsting">
                                                        <div class="hotel-lsting-left">

                                                            <img src="<?= HTTP_ROOT; ?>img/pro_pic/2b3a28603cb9a8f4dfcaf2ee6475f79c.jpg" alt="img" style="width: 100%;">
                                                        </div>
                                                        <div class="hotel-lsting-middle">
                                                            <h3>Hotel Janet  
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-thumbs-up"></i>
                                                            </h3>
                                                            <h6><span><a href="#">111 square feet</a></span>1 Double Bed </h6>
                                                            <p>(Extra beds available: Crib)<br>
                                                                Room sleeps 3 guests (up to 2 children)</p>
                                                            <h5 style="background-color: #ffc107 !important;"><a href="#">medium quality</a></h5> 
                                                        </div>
                                                        <div class="hotel-lsting-right">
                                                            <h6>1,957 reviews<span>5.2</span></h6>
                                                            <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x1</div>
                                                            <h5>GBP 5,000.00</h5>
                                                            <div class="form-group" style="margin: 16px 9px 0px 0px;">
                                                                <label>&nbsp;</label>
                                                                <button type="button" id="submit" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;">Pending</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hotel-lsting">
                                                        <div class="hotel-lsting-left">

                                                            <img src="<?= HTTP_ROOT; ?>img/pro_pic/2b3a28603cb9a8f4dfcaf2ee6475f79c.jpg" alt="img" style="width: 100%;">
                                                        </div>
                                                        <div class="hotel-lsting-middle">
                                                            <h3>Hotel Janet  
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-thumbs-up"></i>
                                                            </h3>
                                                            <h6><span><a href="#">111 square feet</a></span>1 Double Bed </h6>
                                                            <p>(Extra beds available: Crib)<br>
                                                                Room sleeps 3 guests (up to 2 children)</p>
                                                            <h5 style="background-color: #ffc107 !important;"><a href="#">medium quality</a></h5> 
                                                        </div>
                                                        <div class="hotel-lsting-right">
                                                            <h6>1,957 reviews<span>5.2</span></h6>
                                                            <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x1</div>
                                                            <h5>GBP 5,000.00</h5>
                                                            <div class="form-group" style="margin: 16px 9px 0px 0px;">
                                                                <label>&nbsp;</label>
                                                                <button type="button" id="submit" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;">Pending</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                                <!-- ROW -->
                                                </div>
                                                <!-- END OF THE BOX AND SINGLE ROW -->
                                                </div>
                                                </section>

                                                <div class="space"></div>

                                                <?php echo $this->element('frontend/inner-footer'); ?>
                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/11.1.0/nouislider.min.css" />
                                                <link rel="stylesheet" href="<?= $this->Url->css('nouislider_custom.css'); ?>">
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js" integrity="sha256-HT7c4lBipI1Hkl/uvUrU1HQx4WF3oQnSafPjgR9Cn8A=" crossorigin="anonymous"></script>


                                                <script src="<?= $this->Url->script('noUi.js'); ?>"></script>
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
                                                <style type="text/css">
                                                    .modal-content{
                                                        float: left;
                                                        width: 100%;
                                                    }
                                                    .modal-header{ float: left; width: 100%; }
                                                    .modal-footer {
                                                        float: left;
                                                        width: 100%;
                                                        background: #f3f3f3;
                                                        border-top: 1px solid #e6e6e6;
                                                        margin-top: 15px;
                                                        text-align: center;
                                                    }
                                                    .modal-content .close {
                                                        position: absolute;
                                                        right: -30px;
                                                        top: -30px;
                                                        background-color: white;
                                                        border-radius: 50%;
                                                        width: 30px;
                                                        height: 30px;
                                                        font-size: 17px;
                                                        opacity: 1;
                                                    }
                                                    .modal-body {
                                                        position: relative;
                                                        padding: 15px;
                                                        float: left;
                                                        width: 100%;
                                                    }

                                                    .review-boxed {
                                                        float: left;
                                                        width: 100%;
                                                        border: 1px solid #e4e4e4;
                                                        border-radius: 5px;
                                                        margin-top: 11px;
                                                    }
                                                    .review-boxed .review-boxed-left {
                                                        float: left;
                                                        width: 35%;
                                                        text-align: center;
                                                        padding: 35px 0;
                                                    }
                                                    .review-boxed .review-boxed-left h2 {
                                                        font-size: 45px;
                                                        color: #f9d749;
                                                        margin: 0;
                                                    }
                                                    .review-boxed .review-boxed-right {
                                                        float: right;
                                                        width: 65%;
                                                        padding: 10px 18px;;
                                                        border-left: 1px solid #e4e4e4;
                                                    }
                                                    .review-boxed .review-boxed-right h3 {
                                                        color: #000000;
                                                        font-weight: bold;
                                                        font-size: 18px;
                                                        margin: 0 0 8px 0;
                                                    }
                                                    .rating-box {
                                                        float: left;
                                                        width: 100%;
                                                        margin: 2px 0;
                                                    }
                                                    .rating-box h4 {
                                                        float: left;
                                                        font-size: 16px;
                                                        margin: 0;
                                                    }
                                                    .rating-box ul{
                                                        float: right;
                                                        margin:0;
                                                        padding: 0;
                                                    }
                                                    .rating-box ul li{
                                                        display: inline-block;
                                                    }
                                                    .rating-box ul li {
                                                        display: inline-block !important;
                                                        width: 136px !important;
                                                        vertical-align: top !important;
                                                    }
                                                    .rating-box ul li .rateyo-readonly-widg1,.rating-box ul li .rateyo-readonly-widg2,.rating-box ul li .rateyo-readonly-widg3{
                                                        width: 144px !important;
                                                    }
                                                    .rating-box ul li.cleanliness,.rating-box ul li.staff,.rating-box ul li.location{width: 24px !important;}
                                                    .rating-box ul li .rateyo-readonly-widg1 svg,.rating-box ul li .rateyo-readonly-widg2 svg,.rating-box ul li .rateyo-readonly-widg3 svg {
                                                        width: 25px !important; 
                                                        margin-top: -7px !important;
                                                    }
                                                    .rating-box ul li a{
                                                        color: #f9d749;
                                                    }
                                                    .reviewd textarea {
                                                        width: 100%;
                                                        border: 1px solid #e4e4e4;
                                                        border-radius: 5px;
                                                        height: 100px;
                                                        padding: 10px;
                                                        margin-top: 11px;
                                                    }

                                                    .reviewd input[type="text"] {
                                                        border: 1px solid #e4e4e4;
                                                        width: 100%;
                                                        padding: 12px 55px;
                                                        border-radius: 5px;
                                                        background: url(<?php echo HTTP_ROOT . PHOTOS . $profilePhots->user_detail->profile_photo; ?>) 11px center no-repeat;
                                                        background-size: 29px;
                                                    }
                                                    .btn-submit {
                                                        background: #f7d749;
                                                        border: 1px solid #debf32;
                                                        padding: 10px 25px;
                                                        font-weight: bold;
                                                        border-radius: 4px;
                                                    }
                                                    .modal-title {
                                                        margin: 0;
                                                        font-size: 23px;
                                                        font-weight: bold;
                                                        text-align: center;
                                                        color: #232323;
                                                    }
                                                </style>


                                                <div class="container">



                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <?= $this->Form->create('', ['type' => 'post']); ?>
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title">Give your feedback!</h4>
                                                                </div>
                                                                <div class="modal-body reviewd">

                                                                    <input type="text" placeholder="name" disabled="" value="<?php echo $profilePhots->user_detail->first_name . ' ' . $profilePhots->user_detail->sur_name; ?>">

                                                                    <div class="review-boxed">
                                                                        <div class="review-boxed-left">
                                                                            <h2><span id="final_str">5</span>/5</h2>
                                                                        </div>
                                                                        <div class="review-boxed-right">
                                                                            <h3>Sections</h3>
                                                                            <div class="rating-box">
                                                                                <h4>Cleanliness</h4>
                                                                                <ul>
                                                                                    <li>
                                                                                        <div class="rateyo-readonly-widg1"></div>
                                                                                    </li>
                                                                                    <li class="cleanliness">1</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="rating-box">
                                                                                <h4>Staff</h4>
                                                                                <ul>
                                                                                    <li>
                                                                                        <div class="rateyo-readonly-widg2"></div>
                                                                                    </li>
                                                                                    <li class="staff">1</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="rating-box">
                                                                                <h4>Location</h4>
                                                                                <ul>
                                                                                    <li>
                                                                                        <div class="rateyo-readonly-widg3"></div>
                                                                                    </li>
                                                                                    <li class="location">1</li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <textarea  name="description" placeholder="Write your message here..."></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary hvr-grow btn-fill" value="review_submit" name="review_submit" style="width: 119px !important;">Send</button>
                                                                </div>
                                                                <?php
                                                                echo $this->Form->input('user_email', ['type' => 'hidden', 'value' => $this->request->session()->read("Auth.User.email")]);
                                                                echo $this->Form->input('review_date', ['type' => 'hidden', 'value' => date('Y-m-d')]);
                                                                echo $this->Form->input('user_firstname', ['type' => 'hidden', 'value' => $profilePhots->user_detail->first_name]);
                                                                echo $this->Form->input('user_lastname', ['type' => 'hidden', 'value' => $profilePhots->user_detail->sur_name]);
                                                                echo $this->Form->input('property_id', ['type' => 'hidden']);
                                                                echo $this->Form->input('booking_no', ['type' => 'hidden']);
                                                                echo $this->Form->input('staff', ['type' => 'hidden', 'class' => 'staff1', 'value' => 1]);
                                                                echo $this->Form->input('cleanliness', ['type' => 'hidden', 'class' => 'cleanliness1', 'value' => 1]);
                                                                echo $this->Form->input('location', ['type' => 'hidden', 'class' => 'location1', 'value' => 1]);
                                                                ?>
                                                                <?= $this->Form->end(); ?>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                <?php

                                                function changeFormat($pri) {
                                                    $dat = explode('.', $pri);
                                                    $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
                                                    return $f;
                                                }
                                                ?>



                                                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css"> 

                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script> 
                                                <script>
                                                            $(document).ready(function () {
                                                                calulate_final();
                                                            });
                                                            $(".rateyo-readonly-widg1").rateYo({
                                                                rating: 1,
                                                                numStars: 5,
                                                                precision: 0,
                                                                minValue: 1,
                                                                maxValue: 5
                                                            }).on("rateyo.change", function (e, data) {
                                                                $('.cleanliness').text(data.rating);
                                                                $('.cleanliness1').val(data.rating);
                                                                calulate_final();
                                                            });
                                                            $(".rateyo-readonly-widg2").rateYo({
                                                                rating: 1,
                                                                numStars: 5,
                                                                precision: 0,
                                                                minValue: 1,
                                                                maxValue: 5
                                                            }).on("rateyo.change", function (e, data) {
                                                                $('.staff').text(data.rating);
                                                                $('.staff1').val(data.rating);
                                                                calulate_final();
                                                            });
                                                            $(".rateyo-readonly-widg3").rateYo({
                                                                rating: 1,
                                                                numStars: 5,
                                                                precision: 0,
                                                                minValue: 1,
                                                                maxValue: 5
                                                            }).on("rateyo.change", function (e, data) {
                                                                $('.location').text(data.rating);
                                                                $('.location1').val(data.rating);
                                                                calulate_final();
                                                            });
                                                            //});
                                                            function calulate_final() {
                                                                $total = parseInt($('.cleanliness1').val()) + parseInt($('.staff1').val()) + parseInt($('.location1').val());
                                                                $str = parseInt(parseFloat($total / 3) / 0.5);
                                                                $str = $str * 0.5;
                                                                $('#final_str').text($str);
                                                            }
                                                            function modal_open(pro_id, book_no) {
                                                                $('#booking-no').val(book_no);
                                                                $('#property-id').val(pro_id);
                                                                jQuery.noConflict();
                                                                $('#myModal').modal('show');
                                                            }
                                                </script>