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

<?php echo $this->element('frontend/login-header'); ?>
<style type="text/css">
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
                font-size: @media screen and (max-width: 767px) {12px;
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
                            <li class="active"><a data-toggle="tab" href="#active-trips" class="active"><?php echo __('Active'); ?> (<?= !empty($activecount) ? $activecount : 0; ?>)</a></li>
                            <li class="active"><a data-toggle="tab" href="#pending-trips"><?php echo __('Pending'); ?> (<?= !empty($pendingcount) ? $pendingcount : 0; ?>)</a></li>
                            <li><a data-toggle="tab" href="#past-trips"><?php echo __('Past'); ?> (<?= !empty($pastcount) ? $pastcount : 0; ?>)</a></li>   
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
                                                            <p class="Airlines"><?php echo isset($cnt[$details->start_d_airline_name]) ? $cnt[$details->start_d_airline_name] : $details->start_d_airline_name; ?> <br><?= $details->start_d_airline_name; ?>-<?= $details->start_d_airline_num; ?></p>
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
                                                                <p class="Airlines"><?= isset($cnt[$details->return_d_airline_name]) ? $cnt[$details->return_d_airline_name] : $details->return_d_airline_name; ?> <br><?= $details->return_d_airline_name; ?>-<?= $details->return_d_airline_num; ?></p>
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
                                                    <a href='<?php echo $this->User->checkInUrl($details->start_d_airline_name);?>'  class="btn-bookings">  Check in </a>                           
                                                    <?php
                                                } else {
                                                    ?>
                                                    <a href='#' data-toggle= 'modal' data-target="#flight1DetailsModal<?= $details->id; ?>"  class="btn-bookings">  View </a>                           
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
                            </div>



                            <div id="pending-trips" class="tab-pane fade in active">

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
                                                            <p class="Airlines"><?php echo isset($cnt[$details->start_d_airline_name]) ? $cnt[$details->start_d_airline_name] : $details->start_d_airline_name; ?> <br><?= $details->start_d_airline_name; ?>-<?= $details->start_d_airline_num; ?></p>
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
                                                                <p class="Airlines"><?= isset($cnt[$details->return_d_airline_name]) ? $cnt[$details->return_d_airline_name] : $details->return_d_airline_name; ?> <br><?= $details->return_d_airline_name; ?>-<?= $details->return_d_airline_num; ?></p>
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
                                                <?php }else{ ?>
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
                                                            <p class="Airlines"><?php echo isset($cnt[$details->start_d_airline_name]) ? $cnt[$details->start_d_airline_name] : $details->start_d_airline_name; ?> <br><?= $details->start_d_airline_name; ?>-<?= $details->start_d_airline_num; ?></p>
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
                                                                <p class="Airlines"><?= isset($cnt[$details->return_d_airline_name]) ? $cnt[$details->return_d_airline_name] : $details->return_d_airline_name; ?> <br><?= $details->return_d_airline_name; ?>-<?= $details->return_d_airline_num; ?></p>
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

                                                <a href='#' data-toggle="modal" data-target="#flightDetailsModal<?= $details->id; ?>"  class="btn-bookings">  <?php echo __('More Details'); ?> </a>

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





