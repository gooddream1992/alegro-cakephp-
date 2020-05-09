<style>
    .masonry { /* Masonry container */
        -webkit-column-count: 4;
        -moz-column-count:4;
        column-count: 4;
        -webkit-column-gap: 1em;
        -moz-column-gap: 1em;
        column-gap: 1em;
        margin: 1.5em;
        padding: 0;
        -moz-column-gap: 1.5em;
        -webkit-column-gap: 1.5em;
        column-gap: 1.5em;
        font-size: .85em;
    }
    .item {
        display: inline-block;
        background: #fff;
        padding: 1em;
        margin: 0 0 1.5em;
        width: 100%;
        -webkit-transition:1s ease all;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-shadow: 2px 2px 4px 0 #ccc;
    }
    .item img{max-width:100%;}

    @media only screen and (max-width: 320px) {
        .masonry {
            -moz-column-count: 1;
            -webkit-column-count: 1;
            column-count: 1;
        }
    }

    @media only screen and (min-width: 321px) and (max-width: 768px){
        .masonry {
            -moz-column-count: 2;
            -webkit-column-count: 2;
            column-count: 2;
        }
    }
    @media only screen and (min-width: 769px) and (max-width: 1200px){
        .masonry {
            -moz-column-count: 3;
            -webkit-column-count: 3;
            column-count: 3;
        }
    }
    @media only screen and (min-width: 1201px) {
        .masonry {
            -moz-column-count: 4;
            -webkit-column-count: 4;
            column-count: 4;
        }
    }



    .listing-tab{
        padding:0;
    }


    .listing-tab .tab-content ul{padding:0;margin:0;}
    .listing-tab .tab-content ul li {
        list-style-type: none;
        border-bottom: 1px solid #eee;
        padding: 8px;
    }.listing-tab .tab-content ul li {
        list-style-type: none;
        border-bottom: 1px solid #eee;
        padding: 8px;
        padding-left: 20px;
        font-size: 13px;
        color: #666;
    }.listing-tab .tab-content ul li a{text-decoration:none; color:#666;}
    .listing-tab .tab-content ul li span{display:inline-block;float:right;padding-right:10px;}
    .listing-tab .nav-tabs>li,.nav-tabs>li a:hover{margin-bottom:0;background:none;}
    .listing-tab .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{border:none;background:none;}
    .listing-tab .nav-tabs>li>a:hover{border-color:none;color:red;}
    .listing-tab .nav-tabs>li>a{border:0;padding:17px 0 7px;color:#333;margin-left:15px;}
    .listing-tab .nav-tabs>li.active>a{border-bottom:2px solid #bb0000;color:#000;}
    .listing-tab{background-color:#fff;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Booking Overview
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/registered_property"> <i class="fa fa-list"></i>Booked Property</a></li>
        </ol>
    </section>
    <?php

    function changeFormat($pri) {
        $dat = explode('.', $pri);
        $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
        return $f;
    }

    function dateGap($date1, $date2) {
        $date1 = date_create($date1);
        $date2 = date_create($date2);
        $diff = date_diff($date1, $date2);
        return $diff->format("%a");
    }
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-body">
                        <div class="col-sm-12 col-md-12 col-lg-12" style="width: 42%;">
                            <div class="box-header with-border">
                                <h3 class="box-title">Property Details</h3>
                            </div>
                        </div>

                        <div>
                            <div class="col-md-5" style="margin: 3% -42%;">
                                <div class="listing-tab col-md-12">
                                    <div class="tab-content">
                                        <ul>
                                            <li>
                                                <a href="#">Property Name</a>
                                                <span><b><?= $property_description->propertyName; ?></b></span>
                                            </li>
                                            <li>
                                                <a href="#">Phone Number</a>
                                                <span><?= $property_user->phone_number; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Star</a>
                                                <span><?php
                                                    for ($i = 1; $i <= $property_description->rating; $i++) {
                                                        echo '<i class="fa fa-star" style="color: #f9d749;"></i>';
                                                    }
                                                    ?></span>
                                            </li>
											<li>
                                                <a href="#">Check in : &nbsp;&nbsp;<b><?= $property_description->checkin; ?></b></a>
                                                <span>Check out : &nbsp;&nbsp;<b><?= $property_description->checkout; ?></b></span>
                                            </li>
                                            <li>
                                                <a href="#">Property Type</a>
                                                <span><?= $property_details->property_type; ?></span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-5  col-md-offset-2" style="margin-top: 16.5%;margin-left: -42%;">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Location</h3>
                                </div>
                                <div class="listing-tab col-md-12">
                                    <div class="tab-content">
                                        <ul>
                                            <li>
                                                <a href="#">Street</a>
                                                <span><?= $property_location->street; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Building</a>
                                                <span><?= $property_location->building; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Country</a>
                                                <span><?= $property_location->country; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Province</a>
                                                <span><?= $property_location->state; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Municipality</a>
                                                <span><?= $property_location->city; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Postal Code</a>
                                                <span><?= $property_location->zip_code; ?></span>
                                            </li>
                                            <li>
                                                <div id="load-map">
                                                    <div id="map" style="width: 100%;height: 100px;"></div>
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-5  col-md-offset-2" style="margin-top: 0%;margin-left: 15%;">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Booking Details</h3>
                                </div>
                                <div class="listing-tab col-md-12">
                                    <div class="tab-content">
                                        <ul>
                                            <li>
                                                <a href="#">Booking Number</a>
                                                <span><?= $bookingDetails->booking_no; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Booking Status</a>
                                                <span><?php
                                                    if ($bookingDetails->user_htl_reach_status == 1) {
                                                        echo __("Marked As No-Show");
                                                    } else {
                                                        if ($bookingDetails->user_htl_reach_status == 2) {
                                                            echo __("Marked As Show");
                                                        }if ($bookingDetails->user_htl_reach_status == 3) {
                                                            echo __("Cancelled");
                                                        }if ($bookingDetails->user_htl_reach_status == 4) {
                                                            echo __("Changed Dates");
                                                        }if ($bookingDetails->user_htl_reach_status == 5) {
                                                            echo __("Refunded");
                                                        }
                                                    }
                                                    ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Booking Type</a>
                                                <span><?php
                                                    if ($bookingDetails->booking_type == 1) {
                                                        echo __("Entire Place");
                                                    } else {
                                                        if ($bookingDetails->booking_type == 2) {
                                                            echo __("Private Room");
                                                        }
                                                    }
                                                    ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Payment Status</a>
                                                <span><?php
                                                    if ($bookingDetails->user_htl_reach_status == 5) {
                                                        echo __("Refunded");
                                                    } else {
                                                        if ($bookingDetails->payment_status == 1) {
                                                            echo __("Pending");
                                                        }if (($bookingDetails->payment_status == 2) || ($bookingDetails->payment_status == 4)) {
                                                            echo __("Cancelled");
                                                        }if (($bookingDetails->payment_status == 3) || ($bookingDetails->user_htl_reach_status == 2)) {
                                                            echo __("Paid");
                                                        }if (($bookingDetails->payment_status == 5)) {
                                                            echo __("Paid");
                                                        }
                                                        if (($bookingDetails->payment_status == 6) && ($bookingDetails->user_htl_reach_status != 2)) {
                                                            echo __("Approved");
                                                        }
                                                    }
                                                    ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Date</a>
                                                <span><?= date_format($bookingDetails->booking_dt, 'd-m-Y'); ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Lead Guest</a>
                                                <span><?= $bookingDetails->user_firstname . ' ' . $bookingDetails->user_lastname; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Phone Number</a>
                                                <span><?= $bookingDetails->phone; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Check-in Date : &nbsp;&nbsp;<b><?= date_format($bookingDetails->check_in, 'd-m-Y'); ?></b></a>
                                                <span>Check-out Date: &nbsp;&nbsp;<b><?= date_format($bookingDetails->check_out, 'd-m-Y'); ?></b></span>
                                            </li>
                                            <li>
                                                <a href="#">Your Stay</a>
                                                <span><?= dateGap(date_format($bookingDetails->check_in, 'd-m-Y'), date_format($bookingDetails->check_out, 'd-m-Y')) . __(" night(s)"); ?> </span>
                                            </li>

                                            <?php
                                            if ($bookingDetails->booking_type == 2) {
                                                ?>

                                                <li>
                                                    <a href="#">Number of Guests</a>
                                                    <span><?= count(json_decode($bookingDetails->room_fnm, true)); ?></span>
                                                </li>
                                                <li>
                                                    <a href="#">Room Type</a>
                                                    <span><?= $property_bed->bed_name; ?></span>
                                                </li>
                                                <li>
                                                    <a href="#">Number of Rooms</a>
                                                    <span><?= $bookingDetails->numb_rooms; ?></span>
                                                </li>

                                            <?php } ?>
                                            <li>
                                                <a href="#">Cancellation Policy</a>
                                                <span><?= $bookingDetails->cancel_policy; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Total</a>
                                                <span>AOA <?= changeFormat(number_format($bookingDetails->total_cost, 2)); ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Comission</a>
                                                <span><?= $bookingDetails->service_fee; ?>% (AOA <?= changeFormat(number_format((($bookingDetails->total_cost * ($bookingDetails->service_fee / 100))), 2)); ?>)</span>
                                            </li>
                                            <li>
                                                <a href="#">Payment Method</a>
                                                <span><?= $bookingDetails->payment_method; ?></span>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>


                            <?php
                            if ($bookingDetails->booking_type == 2) {
                                ?>
                                <div class="col-md-5  col-md-offset-2" style="margin-top: 3%;margin-left: 58%;">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Room Details</h3>
                                    </div>
                                    <div class="listing-tab col-md-12">
                                        <div class="tab-content">
                                            <ul>
                                                <?php
                                                $room_conuts = count(json_decode($bookingDetails->room_fnm, true));
                                                $room_per_det_fnm = json_decode($bookingDetails->room_fnm, true);
                                                $room_per_det_lnm = json_decode($bookingDetails->room_lnm, true);
                                                for ($rm = 1; $rm <= $room_conuts; $rm++) {
                                                    ?>
                                                    <li>
                                                        <a href="#">Room <?= $rm; ?></a>
                                                    </li>
                                                    <li>
                                                        <a href="#">Guest Name</a>
                                                        <span><?= $room_per_det_fnm[($rm - 1)] . ' ' . $room_per_det_lnm[($rm - 1)]; ?></span>
                                                    </li>
                                                <?php }
                                                ?>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<script>

    function initMap() {
        var myLatLng = {lat: <?php echo $all_details->location->lati; ?>, lng: <?= $all_details->location->lngi; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: myLatLng,
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: '<?php echo HTTP_ROOT . "img/marker.svg" ?>',
            title: '<?= $all_details->location->city; ?>'
        });


    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvuyVn-j3G78kRKnXBwyhQnHl9Hdf4g2I&callback=initMap">
</script>