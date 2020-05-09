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
        margin: 10px 0;
        border-radius: 10px;
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
        color: #000;
        border-radius: 2px;
    }
    .hotel-lsting-middle {
        float: left;
        padding-left: 0px;
        width: 44%;
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
        text-decoration: none;
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
        <style type="text/css">
            #past-trips .hotel-lsting{
                margin-top: 0;
                border-top: 0px;
                border-top-left-radius: 0px;
                border-top-right-radius: 0px;
            }
            #past-trips .searchItem{
                border-bottom-left-radius: 0px;
                border-bottom-right-radius: 0px;
            }
            #past-trips .hotel-lsting-right .d-table-cell {
                margin-bottom: 10px;
            }
            #past-trips .hotel-lsting-middle p{
                margin: -18px 0px 0 0px;
            }
            #past-trips .hotel-lsting-middle h5{
                margin-top: 7px !important;
            }
            #past-trips .hotel-lsting-right .hvr-grow.btn-fill{
                position: relative;
                top: -3px;
            }
            #pending-trips .hotel-lsting-right h5 {
                padding: 0 0px 10px 0px;
            }
            #pending-trips .hotel-lsting-right .d-table-cell {
                margin-top: 8px;
                margin-bottom: 10px;
            }
            #pending-trips .hotel-lsting-middle p{
                margin-bottom: 0;
            }
            #pending-trips .hotel-lsting-right .hvr-grow.btn-fill {
                margin-bottom: 0 !important;
            }

            div#review_down {
                background: rgba(0,0,0,0.70);
            }

            #review_down  .modal-confirm.modal-dialog {
                margin: 0;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
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
                            <li class="active"><a data-toggle="tab" href="#pending-trips" class="active"><?php echo __('Accommodations'); ?> (<?= !empty($all_pro_booking->count()) ? $all_pro_booking->count() : 0; ?>)</a></li>
                            <!--<li><a data-toggle="tab" href="#active-trips"><?php echo __('Flights'); ?> (<span id="pst_cnt"><?= !empty($fli_cnt) ? $fli_cnt : 0; ?> </span>)</a></li>-->
                            <!--<li><a data-toggle="tab" href="#past-trips"><?php echo __('Flight'); ?> + <?php echo __('Accommodation'); ?>  (<?= !empty($pastcount) ? $pastcount : 0; ?>)</a></li>-->
                            <div class="col-md-3">
                                <div class="form-group" style="margin: 14px -20px 0px 15px;">

                                    <select class="form-control" name="0['doctyp']" id="doctyp" onchange="updateQueryStringParameter('<?= $currUrl; ?>', 'q', $(this).val())" required="" style="display: none;">

                                        <option value="a" <?= (!empty($_GET['q']) && $_GET['q'] == 'a') ? 'selected' : ''; ?>><?php echo __('Active'); ?></option>
                                        <option value="past" <?= (!empty($_GET['q']) && $_GET['q'] == 'past') ? 'selected' : ''; ?>><?php echo __('Past'); ?></option>
                                        <option value="p" <?= (!empty($_GET['q']) && $_GET['q'] == 'p') ? 'selected' : ''; ?>><?php echo __('Pending'); ?></option>
                                        <option value="r" <?= (!empty($_GET['q']) && $_GET['q'] == 'r') ? 'selected' : ''; ?>><?php echo __('Refunded'); ?></option>
                                        <option value="c" <?= (!empty($_GET['q']) && $_GET['q'] == 'c') ? 'selected' : ''; ?>><?php echo __('Cancelled'); ?></option>

                                    </select>

                                    <i class="fa fa-angle-down formIconArrow" style="margin: -18px -18px;"></i>
                                </div>
                            </div>
                        </ul>

                        <div class="tab-content">

                            <div id="pending-trips" class="tab-pane fade in active show">
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
                                                <?php
                                                for ($i = 1; $i <= $property_details->description->rating; $i++) {
                                                    ?>
                                                    <i class="fa fa-star rating"></i>
                                                <?php } ?>
                                                <i class="fa fa-thumbs-up"></i>
                                            </h3>
                                            <h6><span><a href="#"><i class="fas fa-hashtag"></i> <?= $pro_book->booking_no; ?></a>
                                                    <br>

                                                    </h6>
                                                    <p style="float: left;"><i class="fas fa-user"></i> <?= $pro_book->user_firstname; ?> <?= $pro_book->user_lastname; ?><br>


                                                        <?php
                                                        $sbdn = '';
                                                        if ($pro_book->booking_type == 2) {
                                                            ?>
                                                            <i class="fas fa-bed"></i>
                                                            <?php
                                                            if (!empty(@$this->User->getSubbedbooking($pro_book->property_id, $pro_book->room_id))) {
                                                                $sb_rm = @$this->User->getSubbedbooking($pro_book->property_id, $pro_book->room_id);
                                                                $sbdn .= __($sb_rm->num_bed) . 'x ' . __($sb_rm->beds) . ' + ';
                                                            }
                                                            echo $sbdn . " ";
                                                            echo $pro_book->numb_rooms;
                                                            ?>x <?php
                                                            echo __($getBetDetails->beds) . " <br>";
                                                        }
                                                        ?>

                                                        <?php /* echo $pro_book->numb_rooms; ?>x <?php echo __($getBetDetails->beds); ?>  <?php foreach ($getBetDetails->extranets_user_property_sub_beds as $bes) { ?> <?php echo " + " . $bes->num_beds ?>x <?php
                                                          echo __($bes->beds);
                                                          } */
                                                        ?>


                                                        <i class="fas fa-sign-in-alt"></i>
                                                        <?= date_format($pro_book->check_in, ' d '); ?>
                                                        <?= __(date_format($pro_book->check_in, 'M')); ?>
                                                        <?= date_format($pro_book->check_in, ' Y'); ?>
                                                        <br>

                                                        <i class="fas fa-sign-out-alt"></i>
                                                        <?= date_format($pro_book->check_out, ' d '); ?>
                                                        <?= __(date_format($pro_book->check_out, 'M')); ?>
                                                        <?= date_format($pro_book->check_out, ' Y'); ?>
                                                        <br>

                                                    </p>
                                                    </div>
                                                    <div class="hotel-lsting-right">
                                                        <h6><?php echo $this->User->reviewCount($pro_book->property_id); ?> <?php echo __('reviews'); ?><span><?php echo is_nan($this->User->totalRating($pro_book->property_id)) ? 0 : $this->User->totalRating($pro_book->property_id); ?>/5</span></h6>
                                                        <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x1</div>
                                                        <h5>
                                                            <?php
                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $pro_book->total_cost), 2);
                                                            } else {
                                                                echo 'AOA ' . $this->User->changeFormat(number_format($pro_book->total_cost, 2));
                                                            }
                                                            ?>


                                                        </h5>
                                                        <div class="form-group" style="margin: 0 9px 0px 0px;">
                                                            <label style="margin-bottom: 0;">&nbsp;</label>
                                                            <?php
                                                            /* if (date('Y-m-d') <= date_format($pro_book->check_out, 'Y-m-d')) { ?>
                                                              <button type="button" id="submit" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;"><?php if ($pro_book->payment_status == 1) { ?> Pending <?php } elseif ($pro_book->payment_status == 2) { ?> Cancel <?php } elseif ($pro_book->payment_status == 3) { ?> Paid <?php } ?></button>
                                                              <?php } else { ?>
                                                              <input type="hidden" id="htm_namee<?= $pro_book->id; ?>" value="<?= $property_details->description->propertyName; ?>">
                                                              <?php if ($this->User->check_review($pro_book->booking_no) >= 1) { ?>
                                                              <button type="button" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;"> <?php echo __('Paid') ?></button>
                                                              <?php } else { ?>

                                                              <button onclick="modal_open(<?= $pro_book->property_id; ?>, '<?= $pro_book->booking_no; ?>', '<?= $this->User->usrHelper($pro_book->property_user_id)->name; ?>', '<?= HTTP_ROOT . $this->User->usrdetHelper($pro_book->property_user_id)->profile_photo; ?>',<?= $pro_book->id; ?>)" type="button" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;" ><?php echo __('Review'); ?></button>

                                                              <?php
                                                              } */

                                                            if ($pro_book->user_htl_reach_status == 5) {
                                                                echo '<button type="button" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;">' . __("Refunded") . '</button>';
                                                            } else {
                                                                if ($pro_book->payment_status == 1) {
                                                                    echo '<button type="button" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;">' . __("Pending") . '</button>';
                                                                }if (($pro_book->payment_status == 2) || ($pro_book->payment_status == 4)) {
                                                                    echo '<button type="button" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;">' . __("Cancelled") . '</button>';
                                                                }if (($pro_book->payment_status == 3) || ($pro_book->user_htl_reach_status == 2)) {
                                                                    if (date('Y-m-d') <= date_format($pro_book->check_out, 'Y-m-d')) {

                                                                        if ($pro_book->payment_method == "No Alojamento") {
                                                                            echo '<button type="button" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;">' . __("Paid") . '</button>';
                                                                        } else {
                                                                            echo '<a href="' . HTTP_ROOT . 'get_itinerary/' . $pro_book->id . '" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;" target="_blank">' . __("Get Itinerary") . '</a>';
                                                                        }
                                                                    } else {
                                                                        if ($this->User->check_review($pro_book->booking_no) >= 1) {
                                                                            if ($pro_book->payment_method == "No Alojamento") {
                                                                                echo '<button type="button" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;background: #eee !important;">' . __("Reviewed") . '</button>';
                                                                            } else {
                                                                                echo '<button type="button" disabled class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;background: #eee !important;">' . __('Reviewed') . '</button>';
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <button onclick="modal_open(<?= $pro_book->property_id; ?>, '<?= $pro_book->booking_no; ?>', '<?= $this->User->usrHelper($pro_book->property_user_id)->name; ?>', '<?= HTTP_ROOT; ?>img/pro_pic/<?= $this->User->getHotelImage($pro_book->property_id); ?>',<?= $pro_book->id; ?>)" type="button" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;"><?php echo __('Review'); ?></button>
                                                                            <?php
                                                                        }
                                                                    }
                                                                }if (($pro_book->payment_status == 5)) {
                                                                    if (date('Y-m-d') <= date_format($pro_book->check_out, 'Y-m-d')) {
                                                                        echo '<button type="button" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;">' . __("Paid") . '</button>';
                                                                    } else {
                                                                        if ($this->User->check_review($pro_book->booking_no) >= 1) {
                                                                            echo '<button type="button" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;">' . __('Paid') . '</button>';
                                                                        } else {
                                                                            ?>
                                                                            <button data-toggle="modal" onclick="modal_open(<?= $pro_book->property_id; ?>, '<?= $pro_book->booking_no; ?>', '<?= $this->User->usrHelper($pro_book->property_user_id)->name; ?>', '<?= HTTP_ROOT; ?>img/pro_pic/<?= $this->User->getHotelImage($pro_book->property_id); ?>',<?= $pro_book->id; ?>)" type="button" class="btn btn-primary hvr-grow btn-fill" ><?php echo __('Review'); ?></button>
                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                                if (($pro_book->payment_status == 6) && ($pro_book->user_htl_reach_status != 2)) {
                                                                    echo '<button type="button" class="btn btn-primary hvr-grow btn-fill" style="margin: -16px 0px 20px 0px;">' . __("Approved") . '</button>';
                                                                }
                                                            }
                                                            // }
                                                            ?>
                                                            <input type="hidden" id="htm_namee<?= $pro_book->id; ?>" value="<?= $property_details->description->propertyName; ?>">
                                                        </div>
                                                    </div>
                                                    </div>
                                                <?php } ?>
                                                </div>

                                                <div id="active-trips" class="tab-pane fade in active show">
                                                    <!-- active -->
                                                    <?php
                                                    if ((empty($_GET['q'])) || ($_GET['q'] == 'a')) {
                                                        if (!empty($activecount)) {
                                                            $ac_cunt = 0;
                                                            foreach ($active as $details) {
                                                                if (!empty($details->return_arrival_time)) {
                                                                    $condti_a = date_format($details->return_depart_time, 'Y-m-d') >= date('Y-m-d');
                                                                } else {
                                                                    $condti_a = date_format($details->start_depart_time, 'Y-m-d') >= date('Y-m-d');
                                                                }
                                                                if ($condti_a) {
                                                                    ?>
                                                                    <script>
                                                                        document.getElementById('pst_cnt').textContent =<?= ++$ac_cunt; ?>;
                                                                    </script>
                                                                    <?php
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
                                                                                        <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss')))); ?><br><span><?= __(date("M", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))); ?></span></p>

                                                                                    </td>
                                                                                    <td rowspan="2">
                                                                                        <div class="departArrivale">
                                                                                            <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                                        </div>
                                                                                        <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span></p>
                                                                                        <div class="<?php
                                                                                        if ($jor_st_cn <= 0) {
                                                                                            echo __('Direct');
                                                                                        } else {
                                                                                            echo $jor_st_cn;
                                                                                        }
                                                                                        ?> stopsRange" disabled></div>
                                                                                        <p class="citationStops"><?php
                                                                                            if ($jor_st_cn <= 0) {
                                                                                                echo __('Direct');
                                                                                            } else {
                                                                                                echo $jor_st_cn;
                                                                                            }
                                                                                            ?> <?php
                                                                                            if ($jor_st_cn == 1) {
                                                                                                echo __('Stop');
                                                                                            }if ($jor_st_cn > 1) {
                                                                                                echo __('Stops');
                                                                                            }
                                                                                            ?></p>
                                                                                    </td>
                                                                                    <td class="time-desktop-3">
                                                                                        <p class="time time-3"><?= __(date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss')))); ?> <br><span><?= __(date("M", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                        <p class="departure"><?= __($this->User->cityHelper($details->origin)->city) . ' (' . __($details->origin) . ')'; ?></p>
                                                                                    </td>

                                                                                    <td>
                                                                                        <p class="Arrival"><?= __($this->User->cityHelper($details->destination)->city) . ' (' . __($details->destination) . ')'; ?></p>
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
                                                                                            <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))); ?></span></p>

                                                                                        </td>
                                                                                        <td rowspan="2">
                                                                                            <div class="departArrivale">
                                                                                                <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                                            </div>
                                                                                            <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
                                                                                            <div class="<?php
                                                                                            if ($jor_ed_cn <= 0) {
                                                                                                echo __('Direct');
                                                                                            } else {
                                                                                                echo $jor_ed_cn;
                                                                                            }
                                                                                            ?> stopsRange" disabled></div>
                                                                                            <p class="citationStops"><?php
                                                                                                if ($jor_ed_cn <= 0) {
                                                                                                    echo __('Direct');
                                                                                                } else {
                                                                                                    echo $jor_ed_cn;
                                                                                                }
                                                                                                ?> <?php
                                                                                                if ($jor_ed_cn == 1) {
                                                                                                    echo __('Stop');
                                                                                                }if ($jor_ed_cn > 1) {
                                                                                                    echo __('Stops');
                                                                                                }
                                                                                                ?></p>
                                                                                        </td>
                                                                                        <td class="time-desktop-4">
                                                                                            <p class="time time-3"><?= __(date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                            <p class="departure"><?= __($this->User->cityHelper($details->destination)->city) . ' (' . __($details->destination) . ')'; ?></p>
                                                                                        </td>

                                                                                        <td>
                                                                                            <p class="departure"><?= __($this->User->cityHelper($details->origin)->city) . ' (' . __($details->origin) . ')'; ?></p>
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
                                                                                                <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))); ?></span></p>
                                                                                            </td>
                                                                                            <td rowspan="2">
                                                                                                <div class="departArrivale">
                                                                                                    <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                                                </div>
                                                                                                <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span></p>
                                                                                                <div class="<?php
                                                                                                if ($jor_st_cn <= 0) {
                                                                                                    echo __('Direct');
                                                                                                } else {
                                                                                                    echo $jor_st_cn;
                                                                                                }
                                                                                                ?> stopsRange" disabled></div>
                                                                                                <p class="citationStops"><?php
                                                                                                    if ($jor_st_cn <= 0) {
                                                                                                        echo __('Direct');
                                                                                                    } else {
                                                                                                        echo $jor_st_cn;
                                                                                                    }
                                                                                                    ?> <?php
                                                                                                    if ($jor_st_cn == 1) {
                                                                                                        echo __('Stop');
                                                                                                    }if ($jor_st_cn > 1) {
                                                                                                        echo __('Stops');
                                                                                                    }
                                                                                                    ?></p>

                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <!--  <img src="img/icone-2.gif" alt="">-->
                                                                                            </td>
                                                                                            <td class="">
                                                                                                <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss')))); ?><?= date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss'))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                                <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss')))); ?><br><span><?= __(date("M", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))); ?></span></p>
                                                                                            </td>
                                                                                            <td rowspan="2">
                                                                                                <div class="departArrivale">
                                                                                                    <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                                                </div>
                                                                                                <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
                                                                                                <div class="<?php
                                                                                                if ($jor_ed_cn <= 0) {
                                                                                                    echo __('Direct');
                                                                                                } else {
                                                                                                    echo $jor_ed_cn;
                                                                                                }
                                                                                                ?> stopsRange" disabled></div>
                                                                                                <p class="citationStops"><?php
                                                                                                    if ($jor_ed_cn <= 0) {
                                                                                                        echo __('Direct');
                                                                                                    } else {
                                                                                                        echo $jor_ed_cn;
                                                                                                    }
                                                                                                    ?> <?php
                                                                                                    if ($jor_ed_cn == 1) {
                                                                                                        echo __('Stop');
                                                                                                    }if ($jor_ed_cn > 1) {
                                                                                                        echo __('Stops');
                                                                                                    }
                                                                                                    ?></p>

                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <!-- <img src="img/icone-2.gif" alt="">-->
                                                                                            </td>
                                                                                            <td class="">
                                                                                                <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss')))); ?> <br><span><?= __(date("M", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))); ?></span></p>
                                                                                            </td>

                                                                                        </tr>
                                                                                    </table>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>


                                                                        <div class="bookBtn text-center">

                                                                            <?php if ($details->refundable == "true") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Refundable'); ?></p><?php } else if ($details->refundable == "false") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Non-Refundable'); ?></p><?php } ?>
                                                                            <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x<?= $details->passengers; ?></div>
                                                                            <span>
                                                                                <?php
                                                                                $dprice = explode('AOA', $details->price);
                                                                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dprice[1]), 2);
                                                                                } else {

                                                                                    echo $this->User->changeFormat(number_format($dprice[1], 2));
                                                                                }
                                                                                ?> </span>
                                                                            <?php
                                                                            if ((date('Y-m-d', strtotime('-24 hour', strtotime(date_format($details->start_depart_time, "Y-m-d")))) == date("Y-m-d")) || (date('Y-m-d', strtotime('-24 hour', strtotime(date_format($details->return_depart_time, "Y-m-d")))) == date("Y-m-d"))) {
                                                                                ?>
                                                                                <a href='<?php echo $this->User->checkInUrl($details->start_d_airline_name); ?>'  class="btn-bookings" target="_blank" style="margin: 15px 0px 0px 0px;">  <?php echo __('Check-in'); ?> </a>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <a href='#' data-toggle= 'modal' data-target="#flight1DetailsModal<?= $details->id; ?>"  class="btn-bookings" style="margin: 15px 0px 0px 0px;">  <?php echo __('More Details'); ?> </a>
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

                                                                                                        <div class="flight-details-price">
                                                                                                            <?php
                                                                                                            $dprice = explode('AOA', $details->price);
                                                                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dprice[1]), 2);
                                                                                                            } else {

                                                                                                                echo $this->User->changeFormat(number_format($dprice[1], 2));
                                                                                                            }
                                                                                                            ?>
                                                                                                        </div>

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
                                                                                                <div class="flight-details-departure-title"> <?php echo __('DEPARTURE'); ?>: <?= __($this->User->cityHelper($details->origin)->city); ?> - <?= __($this->User->cityHelper($details->destination)->city); ?> </div>
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
                                                                                                        <div class="col"> <?= __($this->User->cityHelper($fli_de['origin'])->city); ?> </div>
                                                                                                    </div>
                                                                                                    <div class="row flight-details-date">
                                                                                                        <div class="col"> <?= __(date("M", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d')))); ?>, <?= __(date("h:i A", strtotime($this->Time->format($fli_de['dep_time'], 'hh:mm:ss')))); ?> </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col"> <?= __($this->User->cityHelper($fli_de['origin'])->city); ?> (<?= $fli_de['origin']; ?>), <?= __($this->User->cityHelper($fli_de['origin'])->country); ?> </div>
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
                                                                                                        <div class="col">
                                                                                                            <?php echo __($details->cabin . ' ' . 'Class'); ?>
                                                                                                            <?php /* ?><?= $details->cabin; ?> <?php echo __('Cabin'); ?><?php */ ?> </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                                    <div class="row">
                                                                                                        <div class="col"> <?= __($this->User->cityHelper($fli_de['destination'])->city); ?> </div>
                                                                                                    </div>
                                                                                                    <div class="row flight-details-date">
                                                                                                        <div class="col"> <?= __(date("M", strtotime($this->Time->format($fli_de['arr_time'], 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($fli_de['arr_time'], 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($fli_de['arr_time'], 'Y-MM-d')))); ?>, <?= __(date("h:i A", strtotime($this->Time->format($fli_de['arr_time'], 'hh:mm:ss')))); ?> </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col"> <?= __($this->User->cityHelper($fli_de['destination'])->city); ?> (<?= $fli_de['destination']; ?>), <?= __($this->User->cityHelper($fli_de['destination'])->country); ?> </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- Layover -->
                                                                                            <?php if ($ini != $jor_st_cn) { ?>
                                                                                                <div class="row">
                                                                                                    <div class="col text-center">
                                                                                                        <div class="flight-details-layover"> <?php echo __('Layover'); ?>: <span><?= __($this->User->cityHelper($fli_de['destination'])->city); ?> (<?= $fli_de['destination']; ?>)</span> - <?php echo __('Time'); ?>: <?= dateDifference($this->User->userjrdetails($details->id)[$ini + 1]['dep_time'], $fli_de['arr_time']); ?> </div>
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
                                                                                                    <div class="flight-details-departure-title"> <?php echo __('RETURN'); ?>: <?= __($this->User->cityHelper($details->destination)->city); ?> - <?= __($this->User->cityHelper($details->origin)->city); ?> </div>
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
                                                                                                            <div class="col"> <?= __($this->User->cityHelper($fli_re['origin'])->city); ?> </div>
                                                                                                        </div>
                                                                                                        <div class="row flight-details-date">
                                                                                                            <div class="col">  <?= __(date("M", strtotime($this->Time->format($fli_re['dep_time'], 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($fli_re['dep_time'], 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($fli_re['dep_time'], 'Y-MM-d')))); ?>, <?= __(date("h:i A", strtotime($this->Time->format($fli_re['dep_time'], 'hh:mm:ss')))); ?> </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col"> <?= __($this->User->cityHelper($fli_re['origin'])->city); ?> (<?= $fli_re['origin']; ?>), <?= __($this->User->cityHelper($fli_re['origin'])->country); ?>  </div>
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
                                                                                                            <div class="col"> <?php echo __($details->cabin . ' ' . 'Class'); ?></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                                        <div class="row">
                                                                                                            <div class="col"> <?= __($this->User->cityHelper($fli_re['destination'])->city); ?> </div>
                                                                                                        </div>
                                                                                                        <div class="row flight-details-date">
                                                                                                            <div class="col"> <?= __(date("M", strtotime($this->Time->format($fli_re['arr_time'], 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($fli_re['arr_time'], 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($fli_re['arr_time'], 'Y-MM-d')))); ?>, <?= __(date("h:i A", strtotime($this->Time->format($fli_re['arr_time'], 'hh:mm:ss')))); ?> </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col"> <?= __($this->User->cityHelper($fli_re['destination'])->city); ?> (<?= $fli_re['destination']; ?>), <?= __($this->User->cityHelper($fli_re['destination'])->country); ?> </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <?php if ($ini != $po_end + 1) { ?>
                                                                                                    <div class="row">
                                                                                                        <div class="col text-center">
                                                                                                            <div class="flight-details-layover"> <?php echo __('Layover'); ?>: <span><?= __($this->User->cityHelper($fli_re['destination'])->city); ?> (<?= $fli_re['destination']; ?>)</span> - <?php echo __('Time'); ?>: <?= dateDifference($this->User->userjrdetails($details->id)[$ini + 1]['dep_time'], $fli_re['arr_time']); ?></div>
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
                                                            }
                                                        } else {
                                                            //echo "NO DATA FOUND.";
                                                        }
                                                    }
                                                    ?>

                                                    <!-- past -->
                                                    <?php
                                                    if ((!empty($_GET['q'])) && ($_GET['q'] == 'past')) {
                                                        if (!empty($pastcount)) {
                                                            $pst_cunt = 0;
                                                            foreach ($past as $details) {
                                                                if (!empty($details->return_arrival_time)) {
                                                                    $condi = date_format($details->return_depart_time, 'Y-m-d') <= date('Y-m-d');
                                                                } else {
                                                                    $condi = date_format($details->start_depart_time, 'Y-m-d') <= date('Y-m-d');
                                                                }

                                                                if ($condi) {
                                                                    ?>
                                                                    <script>
                                                                        document.getElementById('pst_cnt').textContent =<?= ++$pst_cunt; ?>;
                                                                    </script>
                                                                    <?php
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
                                                                                        <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss')))); ?><br><span><?= __(date("M", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))); ?></span></p>

                                                                                    </td>
                                                                                    <td rowspan="2">
                                                                                        <div class="departArrivale">
                                                                                            <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                                        </div>
                                                                                        <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span></p>
                                                                                        <div class="<?php
                                                                                        if ($jor_st_cn <= 0) {
                                                                                            echo __('Direct');
                                                                                        } else {
                                                                                            echo $jor_st_cn;
                                                                                        }
                                                                                        ?> stopsRange" disabled></div>
                                                                                        <p class="citationStops"><?php
                                                                                            if ($jor_st_cn <= 0) {
                                                                                                echo __('Direct');
                                                                                            } else {
                                                                                                echo $jor_st_cn;
                                                                                            }
                                                                                            ?> <?php
                                                                                            if ($jor_st_cn == 1) {
                                                                                                echo __('Stop');
                                                                                            }if ($jor_st_cn > 1) {
                                                                                                echo __('Stops');
                                                                                            }
                                                                                            ?></p>
                                                                                    </td>
                                                                                    <td class="time-desktop-3">
                                                                                        <p class="time time-3"><?= __(date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss')))); ?> <br><span><?= __(date("M", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                        <p class="departure"><?= __($this->User->cityHelper($details->origin)->city) . ' (' . __($details->origin) . ')'; ?></p>
                                                                                    </td>

                                                                                    <td>
                                                                                        <p class="Arrival"><?= __($this->User->cityHelper($details->destination)->city) . ' (' . __($details->destination) . ')'; ?></p>
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
                                                                                            <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))); ?></span></p>

                                                                                        </td>
                                                                                        <td rowspan="2">
                                                                                            <div class="departArrivale">
                                                                                                <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                                            </div>
                                                                                            <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
                                                                                            <div class="<?php
                                                                                            if ($jor_ed_cn <= 0) {
                                                                                                echo __('Direct');
                                                                                            } else {
                                                                                                echo $jor_ed_cn;
                                                                                            }
                                                                                            ?> stopsRange" disabled></div>
                                                                                            <p class="citationStops"><?php
                                                                                                if ($jor_ed_cn <= 0) {
                                                                                                    echo __('Direct');
                                                                                                } else {
                                                                                                    echo $jor_ed_cn;
                                                                                                }
                                                                                                ?> <?php
                                                                                                if ($jor_ed_cn == 1) {
                                                                                                    echo __('Stop');
                                                                                                }if ($jor_ed_cn > 1) {
                                                                                                    echo __('Stop');
                                                                                                }
                                                                                                ?></p>
                                                                                        </td>
                                                                                        <td class="time-desktop-4">
                                                                                            <p class="time time-3"><?= __(date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                            <p class="departure"><?= __($this->User->cityHelper($details->destination)->city) . ' (' . __($details->destination) . ')'; ?></p>
                                                                                        </td>

                                                                                        <td>
                                                                                            <p class="departure"><?= __($this->User->cityHelper($details->origin)->city) . ' (' . __($details->origin) . ')'; ?></p>
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
                                                                                                <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))); ?></span></p>
                                                                                            </td>
                                                                                            <td rowspan="2">
                                                                                                <div class="departArrivale">
                                                                                                    <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                                                </div>
                                                                                                <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span></p>
                                                                                                <div class="<?php
                                                                                                if ($jor_st_cn <= 0) {
                                                                                                    echo __('Direct');
                                                                                                } else {
                                                                                                    echo $jor_st_cn;
                                                                                                }
                                                                                                ?> stopsRange" disabled></div>
                                                                                                <p class="citationStops"><?php
                                                                                                    if ($jor_st_cn <= 0) {
                                                                                                        echo __('Direct');
                                                                                                    } else {
                                                                                                        echo $jor_st_cn;
                                                                                                    }
                                                                                                    ?> <?php
                                                                                                    if ($jor_st_cn == 1) {
                                                                                                        echo __('Stop');
                                                                                                    }if ($jor_st_cn > 1) {
                                                                                                        echo __('Stop');
                                                                                                    }
                                                                                                    ?></p>

                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <!--  <img src="img/icone-2.gif" alt="">-->
                                                                                            </td>
                                                                                            <td class="">
                                                                                                <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                                <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss')))); ?><br><span><?= __(date("M", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))); ?></span></p>
                                                                                            </td>
                                                                                            <td rowspan="2">
                                                                                                <div class="departArrivale">
                                                                                                    <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                                                </div>
                                                                                                <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
                                                                                                <div class="<?php
                                                                                                if ($jor_ed_cn <= 0) {
                                                                                                    echo __('Direct');
                                                                                                } else {
                                                                                                    echo $jor_ed_cn;
                                                                                                }
                                                                                                ?> stopsRange" disabled></div>
                                                                                                <p class="citationStops"><?php
                                                                                                    if ($jor_ed_cn <= 0) {
                                                                                                        echo __('Direct');
                                                                                                    } else {
                                                                                                        echo $jor_ed_cn;
                                                                                                    }
                                                                                                    ?> <?php
                                                                                                    if ($jor_ed_cn == 1) {
                                                                                                        echo __('Stop');
                                                                                                    }if ($jor_ed_cn > 1) {
                                                                                                        echo __('Stops');
                                                                                                    }
                                                                                                    ?></p>

                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <!-- <img src="img/icone-2.gif" alt="">-->
                                                                                            </td>
                                                                                            <td class="">
                                                                                                <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss')))); ?> <br><span><?= __(date("M", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))); ?></span></p>
                                                                                            </td>

                                                                                        </tr>
                                                                                    </table>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>


                                                                        <div class="bookBtn text-center">
                                                                            <?php if ($details->refundable == "true") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Refundable'); ?></p><?php } else if ($details->refundable == "false") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Non-Refundable'); ?></p><?php } ?>
                                                                            <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x<?= $details->passengers; ?></div>

                                                                            <span> <?php
                                                                                $ddprice = explode('AOA', $details->price);
                                                                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $ddprice[1]), 2);
                                                                                } else {
                                                                                    echo 'AOA ' . $this->User->changeFormat(number_format($ddprice[1], 2));
                                                                                }
                                                                                ?> </span>


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
                                                                                                        <div class="flight-details-price">
                                                                                                            <?php
                                                                                                            $deprice = explode('AOA', $details->price);

                                                                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $deprice[1]), 2);
                                                                                                            } else {

                                                                                                                echo $this->User->changeFormat(number_format($deprice[1], 2));
                                                                                                            }
                                                                                                            ?> </div>
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
                                                                                                        <div class="col"> <?= __($this->User->cityHelper($fli_de['origin'])->city); ?> </div>
                                                                                                    </div>
                                                                                                    <div class="row flight-details-date">
                                                                                                        <div class="col"> <?= __(date("M", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d')))); ?>, <?= __(date("h:i A", strtotime($this->Time->format($fli_de['dep_time'], 'hh:mm:ss')))); ?> </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col"> <?= __($this->User->cityHelper($fli_de['origin'])->city); ?> (<?= $fli_de['origin']; ?>), <?= __($this->User->cityHelper($fli_de['origin'])->country); ?> </div>
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
                                                                                                        <div class="col"><?php echo __($details->cabin . ' ' . 'Class'); ?> </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                                    <div class="row">
                                                                                                        <div class="col"> <?= $this->User->cityHelper($fli_de['destination'])->city; ?> </div>
                                                                                                    </div>
                                                                                                    <div class="row flight-details-date">
                                                                                                        <div class="col"> <?= __(date("M", strtotime($this->Time->format($fli_de['arr_time'], 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($fli_de['arr_time'], 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($fli_de['arr_time'], 'Y-MM-d')))); ?>, <?= __(date("h:i A", strtotime($this->Time->format($fli_de['arr_time'], 'hh:mm:ss')))); ?> </div>
                                                                                                    </div>
                                                                                                    <div class="row">
                                                                                                        <div class="col"> <?= $this->User->cityHelper($fli_de['destination'])->city; ?> (<?= $fli_de['destination']; ?>), <?= __($this->User->cityHelper($fli_de['destination'])->country); ?> </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!-- Layover -->
                                                                                            <?php if ($ini != $jor_st_cn) { ?>
                                                                                                <div class="row">
                                                                                                    <div class="col text-center">
                                                                                                        <div class="flight-details-layover"> <?php echo __('Layover'); ?>: <span><?= __($this->User->cityHelper($fli_de['destination'])->city); ?> (<?= $fli_de['destination']; ?>)</span> - <?php echo __('Time'); ?>: <?= dateDifference($this->User->userjrdetails($details->id)[$ini + 1]['dep_time'], $fli_de['arr_time']); ?> </div>
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
                                                                                                            <div class="col"> <?= __($this->User->cityHelper($fli_re['origin'])->city); ?> </div>
                                                                                                        </div>
                                                                                                        <div class="row flight-details-date">
                                                                                                            <div class="col">  <?= __(date("M", strtotime($this->Time->format($fli_re['dep_time'], 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($fli_re['dep_time'], 'Y-MM-d')))) . ',' . ' ' . __(date("M d, D", strtotime($this->Time->format($fli_re['dep_time'], 'Y-MM-d')))); ?>, <?= __(date("h:i A", strtotime($this->Time->format($fli_re['dep_time'], 'hh:mm:ss')))); ?> </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col"> <?= __($this->User->cityHelper($fli_re['origin'])->city); ?> (<?= $fli_re['origin']; ?>), <?= __($this->User->cityHelper($fli_re['origin'])->country); ?>  </div>
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
                                                                                                            <div class="col"><?php echo __($details->cabin . ' ' . 'Class'); ?> </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                                        <div class="row">
                                                                                                            <div class="col"> <?= $this->User->cityHelper($fli_re['destination'])->city; ?> </div>
                                                                                                        </div>
                                                                                                        <div class="row flight-details-date">
                                                                                                            <div class="col"> <?= __(date("M", strtotime($this->Time->format($fli_re['arr_time'], 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($fli_re['arr_time'], 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($fli_re['arr_time'], 'Y-MM-d')))); ?>, <?= __(date("h:i A", strtotime($this->Time->format($fli_re['arr_time'], 'hh:mm:ss')))); ?> </div>
                                                                                                        </div>
                                                                                                        <div class="row">
                                                                                                            <div class="col"> <?= __($this->User->cityHelper($fli_re['destination'])->city); ?> (<?= $fli_re['destination']; ?>), <?= __($this->User->cityHelper($fli_re['destination'])->country); ?> </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <?php if ($ini != $po_end + 1) { ?>
                                                                                                    <div class="row">
                                                                                                        <div class="col text-center">
                                                                                                            <div class="flight-details-layover"> <?php echo __('Layover'); ?>: <span><?= __($this->User->cityHelper($fli_re['destination'])->city); ?> (<?= $fli_re['destination']; ?>)</span> - <?php echo __('Time'); ?>: <?= dateDifference($this->User->userjrdetails($details->id)[$ini + 1]['dep_time'], $fli_re['arr_time']); ?></div>
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
                                                            }
                                                        } else {
                                                            //echo "NO DATA FOUND.";
                                                        }
                                                    }
                                                    ?>

                                                    <!-- Cancelled -->
                                                    <?php
                                                    if ((!empty($_GET['q'])) && ($_GET['q'] == 'c')) {
                                                        if (!empty($cancelcount)) {
                                                            unset($details);
                                                            foreach ($canceldet as $details) {

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
                                                                                    <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss')))); ?><br><span><?= __(date("M", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))); ?></span></p>

                                                                                </td>
                                                                                <td rowspan="2">
                                                                                    <div class="departArrivale">
                                                                                        <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                                    </div>
                                                                                    <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span></p>
                                                                                    <div class="<?php
                                                                                    if ($jor_st_cn <= 0) {
                                                                                        echo __('Direct');
                                                                                    } else {
                                                                                        echo $jor_st_cn;
                                                                                    }
                                                                                    ?> stopsRange" disabled></div>
                                                                                    <p class="citationStops"><?php
                                                                                        if ($jor_st_cn <= 0) {
                                                                                            echo __('Direct');
                                                                                        } else {
                                                                                            echo $jor_st_cn;
                                                                                        }
                                                                                        ?> <?php
                                                                                        if ($jor_st_cn == 1) {
                                                                                            echo __('Stop');
                                                                                        }if ($jor_st_cn > 1) {
                                                                                            echo __('Stops');
                                                                                        }
                                                                                        ?></p>
                                                                                </td>
                                                                                <td class="time-desktop-3">
                                                                                    <p class="time time-3"><?= __(date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss')))); ?> <br><span><?= __(date("M", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                    <p class="departure"><?= __($this->User->cityHelper($details->origin)->city) . ' (' . __($details->origin) . ')'; ?></p>
                                                                                </td>

                                                                                <td>
                                                                                    <p class="Arrival"><?= __($this->User->cityHelper($details->destination)->city) . ' (' . __($details->destination) . ')'; ?></p>
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
                                                                                        <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))); ?></span></p>

                                                                                    </td>
                                                                                    <td rowspan="2">
                                                                                        <div class="departArrivale">
                                                                                            <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                                        </div>
                                                                                        <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
                                                                                        <div class="<?php
                                                                                        if ($jor_ed_cn <= 0) {
                                                                                            echo __('Direct');
                                                                                        } else {
                                                                                            echo $jor_ed_cn;
                                                                                        }
                                                                                        ?> stopsRange" disabled></div>
                                                                                        <p class="citationStops"><?php
                                                                                            if ($jor_ed_cn <= 0) {
                                                                                                echo __('Direct');
                                                                                            } else {
                                                                                                echo $jor_ed_cn;
                                                                                            }
                                                                                            ?> <?php
                                                                                            if ($jor_ed_cn == 1) {
                                                                                                echo __('Stop');
                                                                                            }if ($jor_ed_cn > 1) {
                                                                                                echo __('Stops');
                                                                                            }
                                                                                            ?></p>
                                                                                    </td>
                                                                                    <td class="time-desktop-4">
                                                                                        <p class="time time-3"><?= __(date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                        <p class="departure"><?= __($this->User->cityHelper($details->destination)->city) . ' (' . __($details->destination) . ')'; ?></p>
                                                                                    </td>

                                                                                    <td>
                                                                                        <p class="departure"><?= __($this->User->cityHelper($details->origin)->city) . ' (' . __($details->origin) . ')'; ?></p>
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
                                                                                            <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))); ?></span></p>
                                                                                        </td>
                                                                                        <td rowspan="2">
                                                                                            <div class="departArrivale">
                                                                                                <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                                            </div>
                                                                                            <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span></p>
                                                                                            <div class="<?php
                                                                                            if ($jor_st_cn <= 0) {
                                                                                                echo __('Direct');
                                                                                            } else {
                                                                                                echo $jor_st_cn;
                                                                                            }
                                                                                            ?> stopsRange" disabled></div>
                                                                                            <p class="citationStops"><?php
                                                                                                if ($jor_st_cn <= 0) {
                                                                                                    echo __('Direct');
                                                                                                } else {
                                                                                                    echo $jor_st_cn;
                                                                                                }
                                                                                                ?> <?php
                                                                                                if ($jor_st_cn == 1) {
                                                                                                    echo __('Stop');
                                                                                                }if ($jor_st_cn > 1) {
                                                                                                    echo __('Stops');
                                                                                                }
                                                                                                ?></p>

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <!--  <img src="img/icone-2.gif" alt="">-->
                                                                                        </td>
                                                                                        <td class="">
                                                                                            <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                            <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss')))); ?><br><span><?= __(date("M", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . ',', ' ' . __(date("D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))); ?></span></p>
                                                                                        </td>
                                                                                        <td rowspan="2">
                                                                                            <div class="departArrivale">
                                                                                                <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                                            </div>
                                                                                            <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
                                                                                            <div class="<?php
                                                                                            if ($jor_ed_cn <= 0) {
                                                                                                echo __('Direct');
                                                                                            } else {
                                                                                                echo $jor_ed_cn;
                                                                                            }
                                                                                            ?> stopsRange" disabled></div>
                                                                                            <p class="citationStops"><?php
                                                                                                if ($jor_ed_cn <= 0) {
                                                                                                    echo __('Direct');
                                                                                                } else {
                                                                                                    echo $jor_ed_cn;
                                                                                                }
                                                                                                ?> <?php
                                                                                                if ($jor_ed_cn == 1) {
                                                                                                    echo __('Stop');
                                                                                                }if ($jor_ed_cn > 1) {
                                                                                                    echo __('Stops');
                                                                                                }
                                                                                                ?></p>

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <!-- <img src="img/icone-2.gif" alt="">-->
                                                                                        </td>
                                                                                        <td class="">
                                                                                            <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss')))); ?> <br><span><?= __(date("M", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))); ?></span></p>
                                                                                        </td>

                                                                                    </tr>
                                                                                </table>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>


                                                                    <div class="bookBtn text-center">
                                                                        <?php if ($details->refundable == "true") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Refundable'); ?></p><?php } else if ($details->refundable == "false") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Non-Refundable'); ?></p><?php } ?>
                                                                        <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x<?= $details->passengers; ?></div>

                                                                        <span>  <?php
                                                                            $ddprice = explode('AOA', $details->price);
                                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $ddprice[1]), 2);
                                                                            } else {

                                                                                echo $this->User->changeFormat(number_format($ddprice[1], 2));
                                                                            }
                                                                            ?> </span>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <!--                                                    <a href='#' data-toggle="modal" data-target="#flightDetailsModal<?= $details->id; ?>"  class="btn-bookings" style="margin: 15px 0px 0px 0px;">  <?php echo __('More Details'); ?> </a>-->
                                                                        <a href='#' class="btn-bookings" style="margin: 15px 0px 0px 0px;">  <?php echo __('Cancelled'); ?> </a>

                                                                    </div>
                                                                    <!-- Flight details -->
                                <!--                                                <div class="modal fade bd-example-modal-lg"  id="flightDetailsModal<?= $details->id; ?>" tabindex="-1" role="dialog" aria-labelledby="flightDetailsModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="fas fa-times"></i></span> </button>
                                                                                <div class="container">
                                                                                     Header
                                                                                    <div class="row flight-details-header">
                                                                                        <div class="col-md-6 col-6 text-left">
                                                                                            <div class="flight-details-title"> <?php echo __('Flight Details'); ?> </div>
                                                                                        </div>
                                                                                        <div class="col-md-5 col-6 offset-lg-1 text-right">
                                                                                            <div class="row">
                                                                                                <div class="col">
                                                                                                    <div class="flight-details-price"> <?php
                                                                    $deprice = explode('AOA', $details->price);

                                                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $deprice[1]), 2);
                                                                    } else {

                                                                        echo $this->User->changeFormat(number_format($deprice[1], 2));
                                                                    }
                                                                    ?> </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col">
                                                                                                    <div class="flight-details-price-subtitle"> <?php echo __('Total Price'); ?> </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                     Departure title
                                                                                    <div class="row">
                                                                                        <div class="col text-left">
                                                                                            <div class="flight-details-departure-title"> <?php echo __('DEPARTURE'); ?>: <?= $this->User->cityHelper($details->origin)->city; ?> - <?= $this->User->cityHelper($details->destination)->city; ?> </div>
                                                                                        </div>
                                                                                    </div>
                                                                                     Flight details row
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
                                                                                                                                                                                                                        <div class="col"> <?= __(date("M", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($fli_de['dep_time'], 'Y-MM-d')))); ?>, <?= __(date("h:i A", strtotime($this->Time->format($fli_de['dep_time'], 'hh:mm:ss')))); ?> </div>
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
                                                                                                                                                                                                                        <div class="col"> <?php echo __($details->cabin . ' ' . 'Class'); ?> </div>
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
                                                                                                                                                                                                                        Layover
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
                                                                                     Departure title
                                                                    <?php if (!empty($details->return_depart_time)) { ?>
                                                                                                                                                                                                                        <div class="row">
                                                                                                                                                                                                                        <div class="col text-left">
                                                                                                                                                                                                                        <div class="flight-details-departure-title"> <?php echo __('RETURN'); ?>: <?= $this->User->cityHelper($details->destination)->city; ?> - <?= $this->User->cityHelper($details->origin)->city; ?> </div>
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                        Flight details row


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
                                                                                                                                                                                                                            <div class="col"> <?php echo __($details->cabin . ' ' . 'Class'); ?> </div>
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
                                                                    </div>-->
                                                                </div>

                                                                <?php
                                                            }
                                                        } else {
                                                            //echo "NO DATA FOUND.";
                                                        }
                                                    }
                                                    ?>

                                                    <!-- Pending -->
                                                    <?php
                                                    if ((!empty($_GET['q'])) && ($_GET['q'] == 'p')) {
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
                                                                                    <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss')))); ?><br><span><?= __(date("M", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))); ?></span></p>

                                                                                </td>
                                                                                <td rowspan="2">
                                                                                    <div class="departArrivale">
                                                                                        <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                                    </div>
                                                                                    <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span></p>
                                                                                    <div class="<?php
                                                                                    if ($jor_st_cn <= 0) {
                                                                                        echo __('Direct');
                                                                                    } else {
                                                                                        echo $jor_st_cn;
                                                                                    }
                                                                                    ?> stopsRange" disabled></div>
                                                                                    <p class="citationStops"><?php
                                                                                        if ($jor_st_cn <= 0) {
                                                                                            echo __('Direct');
                                                                                        } else {
                                                                                            echo $jor_st_cn;
                                                                                        }
                                                                                        ?> <?php
                                                                                        if ($jor_st_cn == 1) {
                                                                                            echo __('Stop');
                                                                                        }if ($jor_st_cn > 1) {
                                                                                            echo __('Stops');
                                                                                        }
                                                                                        ?></p>
                                                                                </td>
                                                                                <td class="time-desktop-3">
                                                                                    <p class="time time-3"><?= __(date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss')))); ?> <br><span><?= __(date("M", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                    <p class="departure"><?= __($this->User->cityHelper($details->origin)->city) . ' (' . __($details->origin) . ')'; ?></p>
                                                                                </td>

                                                                                <td>
                                                                                    <p class="Arrival"><?= __($this->User->cityHelper($details->destination)->city) . ' (' . __($details->destination) . ')'; ?></p>
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
                                                                                        <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))); ?></span></p>

                                                                                    </td>
                                                                                    <td rowspan="2">
                                                                                        <div class="departArrivale">
                                                                                            <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                                        </div>
                                                                                        <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
                                                                                        <div class="<?php
                                                                                        if ($jor_ed_cn <= 0) {
                                                                                            echo __('Direct');
                                                                                        } else {
                                                                                            echo $jor_ed_cn;
                                                                                        }
                                                                                        ?> stopsRange" disabled></div>
                                                                                        <p class="citationStops"><?php
                                                                                            if ($jor_ed_cn <= 0) {
                                                                                                echo __('Direct');
                                                                                            } else {
                                                                                                echo $jor_ed_cn;
                                                                                            }
                                                                                            ?> <?php
                                                                                            if ($jor_ed_cn == 1) {
                                                                                                echo __('Stop');
                                                                                            }if ($jor_ed_cn > 1) {
                                                                                                echo __('Stops');
                                                                                            }
                                                                                            ?></p>
                                                                                    </td>
                                                                                    <td class="time-desktop-4">
                                                                                        <p class="time time-3"><?= __(date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                        <p class="departure"><?= __($this->User->cityHelper($details->destination)->city) . ' (' . __($details->destination) . ')'; ?></p>
                                                                                    </td>

                                                                                    <td>
                                                                                        <p class="departure"><?= __($this->User->cityHelper($details->origin)->city) . ' (' . __($details->origin) . ')'; ?></p>
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
                                                                                            <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_depart_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_depart_time, 'Y-MM-d')))); ?></span></p>
                                                                                        </td>
                                                                                        <td rowspan="2">
                                                                                            <div class="departArrivale">
                                                                                                <span><?= $details->origin; ?></span><span><?= $details->destination; ?></span>
                                                                                            </div>
                                                                                            <p class="rangeTime"><span class="hours"><?= dateDifference($details->start_arrival_time, $details->start_depart_time); ?></span></p>
                                                                                            <div class="<?php
                                                                                            if ($jor_st_cn <= 0) {
                                                                                                echo __('Direct');
                                                                                            } else {
                                                                                                echo $jor_st_cn;
                                                                                            }
                                                                                            ?> stopsRange" disabled></div>
                                                                                            <p class="citationStops"><?php
                                                                                                if ($jor_st_cn <= 0) {
                                                                                                    echo __('Direct');
                                                                                                } else {
                                                                                                    echo $jor_st_cn;
                                                                                                }
                                                                                                ?> <?php
                                                                                                if ($jor_st_cn == 1) {
                                                                                                    echo __('Stop');
                                                                                                }if ($jor_st_cn > 1) {
                                                                                                    echo __('Stops');
                                                                                                }
                                                                                                ?></p>

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <!--  <img src="img/icone-2.gif" alt="">-->
                                                                                        </td>
                                                                                        <td class="">
                                                                                            <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->start_arrival_time, 'hh:mm:ss')))); ?> <br> <span><?= __(date("M", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->start_arrival_time, 'Y-MM-d')))); ?></span></p>
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
                                                                                            <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_depart_time, 'hh:mm:ss')))); ?><br><span><?= __(date("M", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_depart_time, 'Y-MM-d')))); ?></span></p>
                                                                                        </td>
                                                                                        <td rowspan="2">
                                                                                            <div class="departArrivale">
                                                                                                <span><?= $details->destination; ?></span><span><?= $details->origin; ?></span>
                                                                                            </div>
                                                                                            <p class="rangeTime"><span class="hours"><?= dateDifference($details->return_arrival_time, $details->return_depart_time); ?></span></p>
                                                                                            <div class="<?php
                                                                                            if ($jor_ed_cn <= 0) {
                                                                                                echo __('Direct');
                                                                                            } else {
                                                                                                echo $jor_ed_cn;
                                                                                            }
                                                                                            ?> stopsRange" disabled></div>
                                                                                            <p class="citationStops"><?php
                                                                                                if ($jor_ed_cn <= 0) {
                                                                                                    echo __('Direct');
                                                                                                } else {
                                                                                                    echo $jor_ed_cn;
                                                                                                }
                                                                                                ?> <?php
                                                                                                if ($jor_ed_cn == 1) {
                                                                                                    echo __('Stop');
                                                                                                }if ($jor_ed_cn > 1) {
                                                                                                    echo __('Stops');
                                                                                                }
                                                                                                ?></p>

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <!-- <img src="img/icone-2.gif" alt="">-->
                                                                                        </td>
                                                                                        <td class="">
                                                                                            <p class="time"><?= __(date("h:i A", strtotime($this->Time->format($details->return_arrival_time, 'hh:mm:ss')))); ?> <br><span><?= __(date("M", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . __(date(" d", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))) . ',' . ' ' . __(date("D", strtotime($this->Time->format($details->return_arrival_time, 'Y-MM-d')))); ?></span></p>
                                                                                        </td>

                                                                                    </tr>
                                                                                </table>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>


                                                                    <div class="bookBtn text-center">
                                                                        <?php if ($details->refundable == "true") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Refundable'); ?></p><?php } else if ($details->refundable == "false") { ?><p class="btn btn-primary"><img src="<?= $this->Url->image('dollar.png'); ?>" width="25"> <?php echo __('Non-Refundable'); ?></p><?php } ?>
                                                                        <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x<?= $details->passengers; ?></div>

                                                                        <span>   <?php
                                                                            $dcprice = explode('AOA', $details->price);
                                                                            if (!empty($this->request->session()->read("CURRENCY"))) {
                                                                                echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dcprice[1]), 2);
                                                                            } else {

                                                                                echo $this->User->changeFormat(number_format($dcprice[1], 2));
                                                                            }
                                                                            ?>  </span>
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
                                                            //echo "NO DATA FOUND.";
                                                        }
                                                    }
                                                    ?>


                                                </div>


                                                <div id="past-trips" class="tab-pane fade">
                                                    <div class="searchItem d-flex">

                                                        <div class="details desktop">
                                                            <table class="line line-1">
                                                                <tbody><tr>
                                                                        <td>
                                                                            <img src="https://www.alegro.co.ao/webroot/img/flaglogos/EK.png" alt="" width="80">
                                                                        </td>
                                                                        <td class="d-none d-lg-block">

                                                                        </td>
                                                                        <td>
                                                                            <p class="time">06:15 AM<br><span>Sep 07, Sat</span></p>

                                                                        </td>
                                                                        <td rowspan="2">
                                                                            <div class="departArrivale">
                                                                                <span>LAD</span><span>DXB</span>
                                                                            </div>
                                                                            <p class="rangeTime"><span class="hours">10 h 45 m</span></p>
                                                                            <div class="Direct stopsRange" disabled=""></div>
                                                                            <p class="citationStops">Direct </p>
                                                                        </td>
                                                                        <td class="time-desktop-3">
                                                                            <p class="time time-3">05:00 AM <br><span>Sep 08, Sun</span></p>
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
                                                                            <p class="departure">Luanda (LAD)</p>
                                                                        </td>

                                                                        <td>
                                                                            <p class="Arrival">Dubai (DXB)</p>
                                                                        </td>

                                                                    </tr>
                                                                </tbody></table>
                                                            <hr>
                                                            <table class="line line-2">
                                                                <tbody><tr>
                                                                        <td>
                                                                            <img src="https://www.alegro.co.ao/webroot/img/flaglogos/EK.png" alt="" width="80">
                                                                        </td>
                                                                        <td class="d-none d-lg-block">

                                                                        </td>
                                                                        <td>
                                                                            <p class="time">09:45 AM <br> <span>Sep 11, Wed</span></p>

                                                                        </td>
                                                                        <td rowspan="2">
                                                                            <div class="departArrivale">
                                                                                <span>DXB</span><span>LAD</span>
                                                                            </div>
                                                                            <p class="rangeTime"><span class="hours">4 h 45 m</span></p>
                                                                            <div class="Direct stopsRange" disabled=""></div>
                                                                            <p class="citationStops">Direct </p>
                                                                        </td>
                                                                        <td class="time-desktop-4">
                                                                            <p class="time time-3">02:30 AM <br> <span>Sep 11, Wed</span></p>
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
                                                                            <p class="departure">Dubai (DXB)</p>
                                                                        </td>

                                                                        <td>
                                                                            <p class="departure">Luanda (LAD)</p>
                                                                        </td>

                                                                    </tr>
                                                                </tbody></table>
                                                        </div>


                                                        <div class="details mobile">
                                                            <div class="details mobile">
                                                                <table class="line">
                                                                    <tbody><tr>
                                                                            <td>
                                                                                <img src="https://www.alegro.co.ao/webroot/img/flaglogos/EK.png" alt="" style="width: 70px;">
                                                                            </td>
                                                                            <td class="">
                                                                                <p class="time">06:15 AM <br> <span>Sep 07, Sat</span></p>
                                                                            </td>
                                                                            <td rowspan="2">
                                                                                <div class="departArrivale">
                                                                                    <span>LAD</span><span>DXB</span>
                                                                                </div>
                                                                                <p class="rangeTime"><span class="hours">10 h 45 m</span></p>
                                                                                <div class="Direct stopsRange" disabled=""></div>
                                                                                <p class="citationStops">Direct </p>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <!--  <img src="img/icone-2.gif" alt="">-->
                                                                            </td>
                                                                            <td class="">
                                                                                <p class="time">05:00 AM <br> <span>Sep 08, Sun</span></p>
                                                                            </td>

                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <br>
                                                                <table class="line line-2">
                                                                    <tbody><tr>
                                                                            <td>
                                                                                <img src="https://www.alegro.co.ao/webroot/img/flaglogos/EK.png" alt="" style="width: 70px;">
                                                                            </td>
                                                                            <td class="">
                                                                                <p class="time">09:45 AM<br><span>Sep 11, Wed</span></p>
                                                                            </td>
                                                                            <td rowspan="2">
                                                                                <div class="departArrivale">
                                                                                    <span>DXB</span><span>LAD</span>
                                                                                </div>
                                                                                <p class="rangeTime"><span class="hours">4 h 45 m</span></p>
                                                                                <div class="Direct stopsRange" disabled=""></div>
                                                                                <p class="citationStops">Direct </p>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <!-- <img src="img/icone-2.gif" alt="">-->
                                                                            </td>
                                                                            <td class="">
                                                                                <p class="time">02:30 AM <br><span>Sep 11, Wed</span></p>
                                                                            </td>

                                                                        </tr>
                                                                    </tbody></table>
                                                            </div>
                                                        </div>


                                                        <div class="bookBtn text-center">

                                                            <p class="btn btn-primary"><img src="/img/dollar.png" width="25"> Refundable</p>                                                        <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x2</div>
                                                            <span>
                                                                EUR 1,553.25 </span>
                                                            <a href="https://www.emirates.com/english/manage-booking/online-check-in.aspx" class="btn-bookings" target="_blank" style="margin: 15px 0px 0px 0px;">  Check in </a>


                                                        </div>
                                                        <!-- Flight details -->
                                                        <div class="modal fade bd-example-modal-lg" id="flight1DetailsModal12" tabindex="-1" role="dialog" aria-labelledby="flightDetailsModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="fas fa-times"></i></span> </button>
                                                                    <div class="container">
                                                                        <!-- Header -->
                                                                        <div class="row flight-details-header">
                                                                            <div class="col-md-6 col-6 text-left">
                                                                                <div class="flight-details-title"> Flight Details </div>
                                                                            </div>
                                                                            <div class="col-md-5 col-6 offset-lg-1 text-right">
                                                                                <div class="row">
                                                                                    <div class="col">

                                                                                        <div class="flight-details-price">
                                                                                            EUR 1,553.25                                                                                    </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div class="flight-details-price-subtitle"> Total </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <!-- Departure title -->
                                                                        <div class="row">
                                                                            <div class="col text-left">
                                                                                <div class="flight-details-departure-title"> DEPARTURE: Luanda - Dubai </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Flight details row -->
                                                                        <div class="row flight-details-row">
                                                                            <div class="col-md-3 col-12 text-left"> <img src="https://www.alegro.co.ao/webroot/img/flaglogos/EK.png" class="flight-details-airline-logo">
                                                                                <div class="row flight-details-company-flight align-middle">
                                                                                    <div class="col"> Emirates </div>
                                                                                    <div class="col"> EK-794 </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-left">
                                                                                <div class="row">
                                                                                    <div class="col"> Luanda </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col"> Sep 07, Sat, 06:15 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Luanda (LAD), Angola </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-duration text-center">
                                                                                <div class="row">
                                                                                    <div class="col"> 10 h 45 m | Direct </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <hr> </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Economy Cabin </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                <div class="row">
                                                                                    <div class="col"> Dubai </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col"> Sep 08, Sun, 05:00 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Dubai (DXB), United Arab Emirates </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Layover -->
                                                                        <hr>
                                                                        <!-- Departure title -->
                                                                        <div class="row">
                                                                            <div class="col text-left">
                                                                                <div class="flight-details-departure-title"> RETURN: Dubai - Luanda </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Flight details row -->


                                                                        <div class="row flight-details-row">
                                                                            <div class="col-md-3 col-12 text-left"> <img src="https://www.alegro.co.ao/webroot/img/flaglogos/EK.png" class="flight-details-airline-logo">
                                                                                <div class="row flight-details-company-flight align-middle">
                                                                                    <div class="col"> Emirates </div>
                                                                                    <div class="col"> EK-793 </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-left">
                                                                                <div class="row">
                                                                                    <div class="col"> Dubai </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col">  Sep 11, Wed, 09:45 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Dubai (DXB), United Arab Emirates  </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-duration text-center">
                                                                                <div class="row">
                                                                                    <div class="col"> 4 h 45 m | Direct </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <hr> </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Economy Cabin </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                <div class="row">
                                                                                    <div class="col"> Luanda </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col"> Sep 11, Wed, 02:30 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Luanda (LAD), Angola </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hotel-lsting">
                                                        <div class="hotel-lsting-left">

                                                            <img src="https://www.alegro.co.ao/img/pro_pic/04b942d8ba9150efba7d7aae7650adb6.jpg" alt="img" style="width: 100%;">
                                                        </div>
                                                        <div class="hotel-lsting-middle">
                                                            <h3>Nikki's House
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-thumbs-up"></i>
                                                            </h3>
                                                            <h6><span><a href="#">350 sqm</a>
                                                                    <br>

                                                                </span></h6>
                                                            <p style="float: left;"><i class="fas fa-users"></i> 1 Guest <br>
                                                                <i class="fas fa-bed"></i> 1x single bed                                                          <br>
                                                                Spa, Restaurant, Free Parking
                                                            </p>
                                                            <h5 style="background-color: #ffc107 !important;font-size: 15px;width: 62%;margin-top: 12px;text-transform: capitalize;"><a href="#">Medium Quality</a></h5>
                                                        </div>
                                                        <div class="hotel-lsting-right">
                                                            <h6>12 reviews<span>2.5</span></h6>
                                                            <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x1</div>
                                                            <h5>
                                                                EUR 91.54

                                                            </h5>
                                                            <div class="form-group" style="margin: 0 9px 0px 0px;">
                                                                <label style="margin-bottom: 0;">&nbsp;</label>
                                                                <input type="hidden"  value="Nikki's House">
                                                                <button onclick="modal_open(2, 'ALEX00016', 'Rafael', 'https://www.alegro.co.ao/img/pro_pic/croppedImg_395012130.jpeg', 16)" type="button" class="btn btn-primary hvr-grow btn-fill">Review</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="searchItem d-flex">
                                                        <div class="details desktop">
                                                            <table class="line line-1">
                                                                <tbody><tr>
                                                                        <td>
                                                                            <img src="https://www.alegro.co.ao/webroot/img/flaglogos/SA.png" alt="" width="80">
                                                                        </td>
                                                                        <td class="d-none d-lg-block">

                                                                        </td>
                                                                        <td>
                                                                            <p class="time">09:20 AM<br><span>Sep 10, Tue</span></p>

                                                                        </td>
                                                                        <td rowspan="2">
                                                                            <div class="departArrivale">
                                                                                <span>LAD</span><span>DXB</span>
                                                                            </div>
                                                                            <p class="rangeTime"><span class="hours">20 h 5 m</span></p>
                                                                            <div class="1 stopsRange noUi-target noUi-ltr noUi-horizontal" disabled=""><div class="noUi-base"><div class="noUi-connects"></div><div class="noUi-origin" style="transform: translate(-50%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="50.0" aria-valuetext="500 h"></div></div></div></div>
                                                                            <p class="citationStops">1 stop</p>
                                                                        </td>
                                                                        <td class="time-desktop-3">
                                                                            <p class="time time-3">05:25 AM <br><span>Sep 11, Wed</span></p>
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
                                                                            <p class="departure">Luanda (LAD)</p>
                                                                        </td>

                                                                        <td>
                                                                            <p class="Arrival">Dubai (DXB)</p>
                                                                        </td>

                                                                    </tr>
                                                                </tbody></table>
                                                            <hr>
                                                            <table class="line line-2">
                                                                <tbody><tr>
                                                                        <td>
                                                                            <img src="https://www.alegro.co.ao/webroot/img/flaglogos/SA.png" alt="" width="80">
                                                                        </td>
                                                                        <td class="d-none d-lg-block">

                                                                        </td>
                                                                        <td>
                                                                            <p class="time">04:05 AM <br> <span>Sep 18, Wed</span></p>

                                                                        </td>
                                                                        <td rowspan="2">
                                                                            <div class="departArrivale">
                                                                                <span>DXB</span><span>LAD</span>
                                                                            </div>
                                                                            <p class="rangeTime"><span class="hours">15 h 0 m</span></p>
                                                                            <div class="1 stopsRange noUi-target noUi-ltr noUi-horizontal" disabled=""><div class="noUi-base"><div class="noUi-connects"></div><div class="noUi-origin" style="transform: translate(-50%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="50.0" aria-valuetext="500 h"></div></div></div></div>
                                                                            <p class="citationStops">1 stop</p>
                                                                        </td>
                                                                        <td class="time-desktop-4">
                                                                            <p class="time time-3">07:05 AM <br> <span>Sep 18, Wed</span></p>
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
                                                                            <p class="departure">Dubai (DXB)</p>
                                                                        </td>

                                                                        <td>
                                                                            <p class="departure">Luanda (LAD)</p>
                                                                        </td>

                                                                    </tr>
                                                                </tbody></table>
                                                        </div>


                                                        <div class="details mobile">
                                                            <div class="details mobile">
                                                                <table class="line">
                                                                    <tbody><tr>
                                                                            <td>
                                                                                <img src="https://www.alegro.co.ao/webroot/img/flaglogos/SA.png" alt="" style="width: 70px;">
                                                                            </td>
                                                                            <td class="">
                                                                                <p class="time">09:20 AM <br> <span>Sep 10, Tue</span></p>
                                                                            </td>
                                                                            <td rowspan="2">
                                                                                <div class="departArrivale">
                                                                                    <span>LAD</span><span>DXB</span>
                                                                                </div>
                                                                                <p class="rangeTime"><span class="hours">20 h 5 m</span></p>
                                                                                <div class="1 stopsRange noUi-target noUi-ltr noUi-horizontal" disabled=""><div class="noUi-base"><div class="noUi-connects"></div><div class="noUi-origin" style="transform: translate(-50%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="50.0" aria-valuetext="500 h"></div></div></div></div>
                                                                                <p class="citationStops">1 stop</p>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <!--  <img src="img/icone-2.gif" alt="">-->
                                                                            </td>
                                                                            <td class="">
                                                                                <p class="time">05:25 AM <br> <span>Sep 11, Wed</span></p>
                                                                            </td>

                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <br>
                                                                <table class="line line-2">
                                                                    <tbody><tr>
                                                                            <td>
                                                                                <img src="https://www.alegro.co.ao/webroot/img/flaglogos/SA.png" alt="" style="width: 70px;">
                                                                            </td>
                                                                            <td class="">
                                                                                <p class="time">04:05 AM<br><span>Sep 18, Wed</span></p>
                                                                            </td>
                                                                            <td rowspan="2">
                                                                                <div class="departArrivale">
                                                                                    <span>DXB</span><span>LAD</span>
                                                                                </div>
                                                                                <p class="rangeTime"><span class="hours">15 h 0 m</span></p>
                                                                                <div class="1 stopsRange noUi-target noUi-ltr noUi-horizontal" disabled=""><div class="noUi-base"><div class="noUi-connects"></div><div class="noUi-origin" style="transform: translate(-50%, 0px); z-index: 4;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="50.0" aria-valuetext="500 h"></div></div></div></div>
                                                                                <p class="citationStops">1 stop</p>

                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <!-- <img src="img/icone-2.gif" alt="">-->
                                                                            </td>
                                                                            <td class="">
                                                                                <p class="time">07:05 AM <br><span>Sep 18, Wed</span></p>
                                                                            </td>

                                                                        </tr>
                                                                    </tbody></table>
                                                            </div>
                                                        </div>


                                                        <div class="bookBtn text-center">

                                                            <p class="btn btn-primary"><img src="/img/dollar.png" width="25"> Refundable</p>                                                        <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x2</div>
                                                            <span>
                                                                EUR 1,226.93 </span>
                                                            <a href="https://www.flysaa.com/manage-fly/manage/check-in" class="btn-bookings" target="_blank" style="margin: 15px 0px 0px 0px;">  Check in </a>


                                                        </div>
                                                        <!-- Flight details -->
                                                        <div class="modal fade bd-example-modal-lg" id="flight1DetailsModal9" tabindex="-1" role="dialog" aria-labelledby="flightDetailsModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><i class="fas fa-times"></i></span> </button>
                                                                    <div class="container">
                                                                        <!-- Header -->
                                                                        <div class="row flight-details-header">
                                                                            <div class="col-md-6 col-6 text-left">
                                                                                <div class="flight-details-title"> Flight Details </div>
                                                                            </div>
                                                                            <div class="col-md-5 col-6 offset-lg-1 text-right">
                                                                                <div class="row">
                                                                                    <div class="col">

                                                                                        <div class="flight-details-price">
                                                                                            EUR 1,226.93                                                                                    </div>

                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div class="flight-details-price-subtitle"> Total </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <!-- Departure title -->
                                                                        <div class="row">
                                                                            <div class="col text-left">
                                                                                <div class="flight-details-departure-title"> DEPARTURE: Luanda - Dubai </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Flight details row -->
                                                                        <div class="row flight-details-row">
                                                                            <div class="col-md-3 col-12 text-left"> <img src="https://www.alegro.co.ao/webroot/img/flaglogos/SA.png" class="flight-details-airline-logo">
                                                                                <div class="row flight-details-company-flight align-middle">
                                                                                    <div class="col"> South African Airways </div>
                                                                                    <div class="col"> SA-7032 </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-left">
                                                                                <div class="row">
                                                                                    <div class="col"> Luanda </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col"> Sep 10, Tue, 09:20 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Luanda (LAD), Angola </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-duration text-center">
                                                                                <div class="row">
                                                                                    <div class="col"> 4 h 30 m | Direct </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <hr> </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Economy Cabin </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                <div class="row">
                                                                                    <div class="col"> Johannesburg </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col"> Sep 10, Tue, 01:50 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Johannesburg (JNB), South Africa </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Layover -->
                                                                        <div class="row">
                                                                            <div class="col text-center">
                                                                                <div class="flight-details-layover"> Layover: <span>Johannesburg (JNB)</span> - Time: 5 h 20 m </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row flight-details-row">
                                                                            <div class="col-md-3 col-12 text-left"> <img src="https://www.alegro.co.ao/webroot/img/flaglogos/SA.png" class="flight-details-airline-logo">
                                                                                <div class="row flight-details-company-flight align-middle">
                                                                                    <div class="col"> South African Airways </div>
                                                                                    <div class="col"> SA-7158 </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-left">
                                                                                <div class="row">
                                                                                    <div class="col"> Johannesburg </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col"> Sep 10, Tue, 07:10 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Johannesburg (JNB), South Africa </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-duration text-center">
                                                                                <div class="row">
                                                                                    <div class="col"> 10 h 15 m | Direct </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <hr> </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Economy Cabin </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                <div class="row">
                                                                                    <div class="col"> Dubai </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col"> Sep 11, Wed, 05:25 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Dubai (DXB), United Arab Emirates </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Layover -->
                                                                        <hr>
                                                                        <!-- Departure title -->
                                                                        <div class="row">
                                                                            <div class="col text-left">
                                                                                <div class="flight-details-departure-title"> RETURN: Dubai - Luanda </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- Flight details row -->


                                                                        <div class="row flight-details-row">
                                                                            <div class="col-md-3 col-12 text-left"> <img src="https://www.alegro.co.ao/webroot/img/flaglogos/SA.png" class="flight-details-airline-logo">
                                                                                <div class="row flight-details-company-flight align-middle">
                                                                                    <div class="col"> South African Airways </div>
                                                                                    <div class="col"> SA-7159 </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-left">
                                                                                <div class="row">
                                                                                    <div class="col"> Dubai </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col">  Sep 18, Wed, 04:05 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Dubai (DXB), United Arab Emirates  </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-duration text-center">
                                                                                <div class="row">
                                                                                    <div class="col"> 6 h 10 m | Direct </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <hr> </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Economy Cabin </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                <div class="row">
                                                                                    <div class="col"> Johannesburg </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col"> Sep 18, Wed, 10:15 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Johannesburg (JNB), South Africa </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col text-center">
                                                                                <div class="flight-details-layover"> Layover: <span>Johannesburg (JNB)</span> - Time: 6 h 20 m</div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row flight-details-row">
                                                                            <div class="col-md-3 col-12 text-left"> <img src="https://www.alegro.co.ao/webroot/img/flaglogos/SA.png" class="flight-details-airline-logo">
                                                                                <div class="row flight-details-company-flight align-middle">
                                                                                    <div class="col"> South African Airways </div>
                                                                                    <div class="col"> SA-7031 </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-left">
                                                                                <div class="row">
                                                                                    <div class="col"> Johannesburg </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col">  Sep 18, Wed, 04:35 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Johannesburg (JNB), South Africa  </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-duration text-center">
                                                                                <div class="row">
                                                                                    <div class="col"> 2 h 30 m | Direct </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <hr> </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Economy Cabin </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-4 flight-details-infos text-right">
                                                                                <div class="row">
                                                                                    <div class="col"> Luanda </div>
                                                                                </div>
                                                                                <div class="row flight-details-date">
                                                                                    <div class="col"> Sep 18, Wed, 07:05 AM </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col"> Luanda (LAD), Angola </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="hotel-lsting">
                                                        <div class="hotel-lsting-left">

                                                            <img src="https://www.alegro.co.ao/img/pro_pic/04b942d8ba9150efba7d7aae7650adb6.jpg" alt="img" style="width: 100%;">
                                                        </div>
                                                        <div class="hotel-lsting-middle">
                                                            <h3>Nikki's House
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-star rating"></i>
                                                                <i class="fa fa-thumbs-up"></i>
                                                            </h3>
                                                            <h6><span><a href="#">350 sqm</a>
                                                                    <br>

                                                                </span></h6>
                                                            <p style="float: left;"><i class="fas fa-users"></i> 1 Guest <br>
                                                                <i class="fas fa-bed"></i> 1x single bed                                                          <br>
                                                                Spa, Restaurant, Free Parking
                                                            </p>
                                                            <h5 style="background-color: #ffc107 !important;font-size: 15px;width: 62%;margin-top: 12px;text-transform: capitalize;"><a href="#">Medium Quality</a></h5>
                                                        </div>
                                                        <div class="hotel-lsting-right">
                                                            <h6>12 reviews<span>2.5</span></h6>
                                                            <div class="d-table-cell text-right p-right-12 sortby-label"><i class="fas fa-male" style="font-size: 25px;"></i> x1</div>
                                                            <h5>
                                                                EUR 91.54

                                                            </h5>
                                                            <div class="form-group" style="margin: 0 9px 0px 0px;">
                                                                <label style="margin-bottom: 0;">&nbsp;</label>
                                                                <input type="hidden"  value="Nikki's House">
                                                                <button onclick="modal_open(2, 'ALEX00016', 'Rafael', 'https://www.alegro.co.ao/img/pro_pic/croppedImg_395012130.jpeg', 16)" type="button" class="btn btn-primary hvr-grow btn-fill">Review</button>
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
                                                        color: #000000;
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
                                                        margin: 10px 0 0;
                                                    }
                                                    .rating-box ul{
                                                        float: right;
                                                        margin:0;
                                                        padding: 0;
                                                    }
                                                    .rating-box ul li{
                                                        display: inline-block;
                                                        vertical-align: middle;
                                                    }
                                                    .review-boxed .review-boxed-left {
                                                        padding: 50px 0;
                                                    }
                                                    /* .rating-box ul li {
                                                         display: inline-block !important;
                                                         width: 136px !important;
                                                         vertical-align: top !important;
                                                     }*/
                                                    /*.rating-box ul li .rateyo-readonly-widg1,.rating-box ul li .rateyo-readonly-widg2,.rating-box ul li .rateyo-readonly-widg3{
                                                        width: 144px !important;
                                                    }
                                                    .rating-box ul li.cleanliness,.rating-box ul li.staff,.rating-box ul li.location{width: 24px !important;}*/
                                                    /*.rating-box ul li .rateyo-readonly-widg1 svg,.rating-box ul li .rateyo-readonly-widg2 svg,.rating-box ul li .rateyo-readonly-widg3 svg {
                                                        width: 25px !important;
                                                        margin-top: -7px !important;
                                                    }*/
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
                                                    #myModal .modal-dialog { max-width: 525px;margin-top: 59px;}
                                                    .modal-content .close {
                                                        position: absolute;
                                                        right: -15px;
                                                        top: -12px;
                                                        background-color: white;
                                                        border-radius: 50%;
                                                        width: 30px;
                                                        height: 30px;
                                                        font-size: 29px;
                                                        opacity: 1;
                                                        line-height: 0px;
                                                        padding: 7px;
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
                                                    .modal-content .close{
                                                        font-size: 17px;
                                                        top: -22px;
                                                        right: -32px;
                                                    }
                                                    .flight-details-price {
                                                        width: 169px;
                                                        float: right;
                                                        text-align: left;
                                                        padding-left: 5px;
                                                    }
                                                    .flight-details-price-subtitle{
                                                        width: 169px;
                                                        padding-left: 8px;
                                                        float: right;
                                                    }
                                                </style>


                                                <div class="container">

                                                    <div class="modal fade" id="myModal" role="dialog">
                                                        <div class="modal-dialog">

                                                            <div class="modal-content">
                                                                <?= $this->Form->create('', ['type' => 'post']); ?>
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title"><?php echo __('Give your feedback!'); ?></h4>
                                                                </div>
                                                                <div class="modal-body reviewd">

                                                                    <input type="text" placeholder="name" disabled="" id='owner_name' value="">

                                                                    <div class="review-boxed">
                                                                        <div class="review-boxed-left">
                                                                            <h2><span id="final_str">5</span>/5</h2>
                                                                        </div>
                                                                        <div class="review-boxed-right">
                                                                            <h3><?php echo __('Sections'); ?></h3>
                                                                            <div class="rating-box">
                                                                                <h4><?php echo __('Cleanliness'); ?></h4>
                                                                                <ul>
                                                                                    <li>
                                                                                        <div class="rateyo-readonly-widg1"></div>
                                                                                    </li>
                                                                                    <li class="cleanliness">1</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="rating-box">
                                                                                <h4><?php echo __('Staff'); ?></h4>
                                                                                <ul>
                                                                                    <li>
                                                                                        <div class="rateyo-readonly-widg2"></div>
                                                                                    </li>
                                                                                    <li class="staff">1</li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="rating-box">
                                                                                <h4><?php echo __('Location'); ?></h4>
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
                                                                    <button type="submit" class="btn btn-primary hvr-grow btn-fill" value="review_submit" name="review_submit" style="width: 119px !important;"><?php echo __('Submit'); ?></button>
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
                                                                    $(document).ready(function() {
                                                                        calulate_final();
                                                                    });
                                                                    $(".rateyo-readonly-widg1").rateYo({
                                                                        rating: 1,
                                                                        numStars: 5,
                                                                        precision: 0,
                                                                        minValue: 1,
                                                                        maxValue: 5
                                                                    }).on("rateyo.change", function(e, data) {
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
                                                                    }).on("rateyo.change", function(e, data) {
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
                                                                    }).on("rateyo.change", function(e, data) {
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
                                                                    function modal_open(pro_id, book_no, name, img_link, idd) {
                                                                        $name = $('#htm_namee' + idd).val();
                                                                        $('#booking-no').val(book_no);
                                                                        $('#property-id').val(pro_id);
                                                                        $('#owner_name').val($name);
                                                                        $('#owner_name').css("background-image", "url(" + img_link + ")");

                                                                        $('#myModal').modal('show');
                                                                    }
                                                </script>

                                                <?php if (!empty($_GET['r'])) { ?>
                                                    <script>
                                                        $(document).ready(function() {
                                                            $('#review_down').show();
                                                        });
                                                    </script>
                                                    <div id="review_down" class="modal">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <div class="icon-box">
                                                                        <i class="fas fa-star"></i>
                                                                    </div>
                                                                    <h4 class="modal-title"><?php echo __('Feedback Sent!'); ?></h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p class="text-center"><?php echo __('Your feedback has been successfully sent to the property. By sharing your honest feedback, you help other guests know exactly how they will be treated.'); ?></p>
                                                                </div>
                                                                <div class="modal-footer" style="background:#fff;">
                                                                    <button class="btn btn-success btn-block" data-dismiss="modal" onclick='$("#review_down").hide();
                                                                            window.location.href = "<?= HTTP_ROOT; ?>my-booking?q=a";'><?php echo __('OK'); ?></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } ?>

