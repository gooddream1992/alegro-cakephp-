
<style>
    .form-control{
        margin-top: 0px !important;
    }
    .inner_Form input[type=text], .inner_Form input[type=date], .psngrsHow, .inner_Form select {
        padding-left: 30px !important;
        background: none !important;
        position: relative;
        z-index: 11 !important;
    }
    #display, #display2, #hotel_loc_display {
        float: left;
        width: 100%;
        z-index: 1111;
        max-height: 180px;
        overflow-y: inherit;
    }
    #hotel_loc_display {
        position: absolute;
    }
    #display ul, #display2 ul, #hotel_loc_display ul {
        padding-left: 0;
        width: 100%;
        float: left;
        max-height: 149px;
        overflow: auto;
        margin-bottom: 0;
    }
    #display ul li, #display2 ul li, #hotel_loc_display  ul li {
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


<script>
    $(document).ready(function () {

        $(".se-pre-con").hide();

        $('#origin').click(function () {
            $("#display2").hide();
            return false;
        });
        $('#destination').click(function () {
            $("#display").hide();
            return false;
        });
        $('#departure_date').click(function () {
            $("#display2").hide();
            $("#display").hide();
            return false;
        });
        $('#return_date').click(function () {
            $("#display2").hide();
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

    //
</script>
<script>
    var handlesSlider = document.getElementById('slider-handles');
    noUiSlider.create(handlesSlider, {
        start: [0, 800],
        step: 10,
        tooltips: true,
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

    var handlesSliders = document.getElementsByClassName('stopsRange');

    for (var x = 0; x < handlesSliders.length; x++) {
        noUiSlider.create(handlesSliders[x], {
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
                suffix: ' h',
                /*prefix: ' min',*/
            })
        });
    }

    $(document).ready(function () {
        $('select').niceSelect();


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
</script>
<script type="text/javascript">
    $(".psngrsHow").click(function () {
        $(".audultSHow").removeClass("hidden");
        $(".audultSHow").addClass("audultSHowClick");
        // this attribute
        $(".psngrsHow").attr("data-id", 0);
        $(".plusBtn").attr("data-butn", 0);
        $(".box5_img_h").addClass("hidden");
    });
    $(".airlinehide").click(function () {
        //alert('helo');
        $(".audultSHow").removeClass("audultSHowClick");
        $(".audultSHow").addClass("hidden");
        $(".psngrsHow").attr("data-id", 1);
    });
    function hideDivBox() {
        var id = $(".psngrsHow").attr("data-id");
        var openid = $(".plusBtn").attr("data-butn");
        if (id == 1) {
            //alert('yes');
            $(".plusBtn").attr("data-butn", 0);
            if (openid == 1 && id == 1) {
            } else {
                $(".audultSHow").removeClass("audultSHowClick");
                $(".audultSHow").addClass("hidden");
                $(".plusBtn").attr("data-butn", 0);
                $(".box5_img_h").removeClass("hidden");
            }
        } else {
            $(".psngrsHow").attr("data-id", 1);

        }
    }
    function showthis() {
        $(".plusBtn").attr("data-butn", 1);
    }
</script>


<div class="formHomeSearch" >

    <ul class="nav nav-tabs" id='navtabprofile'>
        <li class='hometab active' role='presentation'><a data-toggle="tab" role='tab' href="#home"><i class="fa fa-plane"></i> <?php echo __('Flights') ?> </a></li>
        <li class="hometab " role='presentation'><a data-toggle="tab" role='tab' href="#menu1"><i class="fa fa-building"></i> <?php echo __('Accommodations') ?> </a></li>
        <li class="hometab " role='presentation'><a data-toggle="tab" role='tab' href="#menu2"><i class="fa fa-plane"></i> <?php echo __('Flight') ?> + <i class="fa fa-building"></i> <?php echo __('Accommodation') ?> </a></li>

    </ul>

    <div class="tab-content">

        <div id="home" class="tab-pane fade in active show">
            <form action="<?php echo $this->Url->build(["controller" => "users", "action" => "ajaxSearchResult"]); ?>"  id='form_id' method="get" autocomplete="off">
                <div class="inner_Form">
                    <div class="row">
                        <div class="form-row align-items-center search-form p-top-12">
                            <div class="">
                                <label class="container-radio fligtRetr"><?php echo __('Return'); ?>
                                    <input required type="radio" checked="checked" name="radio" value="Return Trip"> <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="">
                                <label class="container-radio fligtRetr"><?php echo __('One-Way'); ?>
                                    <input required type="radio" name="radio" value="One-Way Flight"> <span class="checkmark"></span>
                                </label>
                            </div>

                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="row align-items-center search-form p-top-12">
                                <div class="col-md-3" id="A3">
                                    <div class="search-display" >
                                        <div class="form-group">
                                            <label><?php echo __('Origin'); ?>:</label>
                                            <input required type="text" class="form-control box1" id="origin" name="origin" placeholder="<?php echo __('Origin'); ?>" onkeyup="loc_data()" autocomplete="off">
                                            <img src="<?php echo HTTP_ROOT ?>img/icon/icon_1.png" class="formIcon box1_img_h">
                                            <img src="<?php echo HTTP_ROOT ?>img/icon/icon_1_y.png" class="formIcon box1_img">
                                        </div>
                                        <div id="display" style="display:none;">

                                        </div>

                                        </style>
                                    </div>
                                </div>
                                <div class="col-md-3" id="A2">
                                    <div class="syncBoxMid hidden-xs" onclick="exchangeinp()"><i class="fas fa-exchange-alt"></i></div>
                                    <div class="search-display2">
                                        <div class="form-group">
                                            <label><?php echo __('Destination'); ?>:</label>
                                            <input required type="text" class="form-control box2" placeholder="<?php echo __('Destination'); ?>" id="destination" name="destination" onkeyup="loc_data2()" autocomplete="off">
                                            <img src="<?php echo HTTP_ROOT ?>img/icon/icon_2.png" class="formIcon box2_img_h">
                                            <img src="<?php echo HTTP_ROOT ?>img/icon/icon_2_y.png" class="formIcon box2_img">
                                        </div>
                                        <div id="display2" style="display:none;"></div>
                                    </div>
                                </div>
                                <div class="col-md-3" id="A1">

                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label><?php echo __('Departure Date') ?>:</label>
                                        <input required type="text" data-language="en" class="datepicker-here form-control box3" placeholder="<?php echo __('Departure Date') ?>" id="departure_date" name="departure_date" autocomplete="off" onblur="myInput()">
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_3.png" class="formIcon box3_img_h" >
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_3_y.png" class="formIcon box3_img">
                                    </div>
                                </div>
                                <div class="col-md-3" id="return_date1">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label><?php echo __('Return Date'); ?>:</label>
                                        <input type="text" data-language="en" class="datepicker-here form-control box4" placeholder="<?php echo __('Return Date'); ?>"  id="return_date" name="return_date" autocomplete="off">
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_4.png" class="formIcon box4_img_h" >
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_4_y.png" class="formIcon box4_img">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 no-padding">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo __('Cabin'); ?></label>
                                        <select id="cabin" name="cabin" class="form-control airlinehide box6" required>
                                            <option value="" selected><?php echo __('Cabin'); ?></option>
                                            <option value="Economy"><?php echo __('Economy'); ?></option>
                                            <option value="Business"><?php echo __('Business'); ?></option>
                                            <option value="First"><?php echo __('First') ?></option>
                                        </select>
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_5.png" class="formIcon box6_img_h" style="position: absolute;left: 19px;top: 41px;width: 26px;height: 26px;">
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_5_y.png" class="formIcon box6_img" style="position: absolute;left: 19px;top: 41px;width: 26px;height: 26px;">
                                        <i class="fa fa-angle-down formIconArrow"></i>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label><?php echo __('Passengers'); ?>:</label>
                                        <div class="form-control passenger-selector-toggle psngrsHow box5" data-id="1" style="margin-bottom: 0px;"><?php echo __('Passengers'); ?></div>
                                        <input type="hidden" name="passenger" id="passenger" value="" required>
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_6.png" class="formIcon box5_img_h">
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_6_y.png" class="formIcon box5_img">
                                        <i class="fa fa-angle-down formIconArrow"></i>
                                    </div>
                                    <div class="passenger-selector form-control audultSHow" style="padding-left: 0px!important;">
                                        <div style="padding: 10px;width: 100%;">
                                            <div style="float: left">
                                                <label href=""><?php echo __('Adults 12+'); ?></label>
                                            </div>
                                            <div class="rightPass" style="float: right;">
                                                <div style="" class="adult-add-counter leftAdd plusBtn" data-butn="1" onclick="showthis()" >
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
                                                <label><?php echo __('Children (2-11)'); ?></label>
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
                                                <label><?php echo __('Infants (0-2)'); ?>(
                                                    <2)</label>
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
                                <input type="hidden" name="page" value="1">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button type="submit" id="submit" class="btn btn-primary hvr-grow btn-fill" onclick="return searchresult()" ><?php echo __('Search'); ?></button>
                                    </div>
                                </div>



                            </div>
                        </div>


                    </div>
                </div>
            </form>
        </div>

        <div id="menu1" class="tab-pane fade">
            <?= $this->Form->create('', ['type' => 'get', 'url' => ['action' => 'hotel_search_result'], 'id' => 'hotelSearchForm']); ?>
            <div class="inner_Form">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="row align-items-center search-form p-top-12">
                            <div class="col-md-12" id="A3">
                                <div class="search-display">
                                    <div class="form-group">
                                        <label><?php echo __('Location'); ?>:</label>
                                        <input required="" type="text" class="form-control box1" id="loc_from" name="from_location_name" placeholder="<?php echo __('Location'); ?>" onkeyup="hotel_loc_data()" autocomplete="off">
                                        <img src="<?= HTTP_ROOT; ?>img/icon/icon_10.png" class="formIcon box1_img_h">
                                        <img src="<?= HTTP_ROOT; ?>img/icon/icon_10_y.png" class="formIcon box1_img">
                                    </div>
                                    <div id="hotel_loc_display" style="display:none;">

                                    </div>


                                </div>
                            </div>
                            <div class="col-md-6" id="A1">

                                <div class="form-group" style="margin-bottom: 0px;">
                                    <label><?php echo __('Check-in Date'); ?>:</label>
                                    <input required="" type="text" data-language="en" class="datepicker-here form-control box3" name="hotel_check_in" id="hotel_check_in" placeholder="<?php echo __('Check-in Date'); ?>" autocomplete="off" onblur="mycheckindate()">
                                    <img src="<?= HTTP_ROOT; ?>img/icon/icon_3.png" class="formIcon box3_img_h">
                                    <img src="<?= HTTP_ROOT; ?>img/icon/icon_3_y.png" class="formIcon box3_img">
                                </div>
                            </div>
                            <div class="col-md-6" id="return_date1">
                                <div class="form-group" style="margin-bottom: 0px;">
                                    <label><?php echo __('Check-out Date'); ?>:</label>
                                    <input type="text" data-language="en" class="datepicker-here form-control box4" placeholder="<?php echo __('Check-out Date'); ?>" id="hotel_check_out" name="hotel_check_out" autocomplete="off" required="" onblur="checkWithCheckindate()">
                                    <img src="<?= HTTP_ROOT; ?>img/icon/icon_4.png" class="formIcon box4_img_h">
                                    <img src="<?= HTTP_ROOT; ?>img/icon/icon_4_y.png" class="formIcon box4_img">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 no-padding">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label><?php echo __('Rooms'); ?></label>
                                    <select id="cabin" name="rooms" class="form-control airlinehide box6" required>
                                        <option value="1" selected><?php echo __('1'); ?></option>
                                        <option value="2"><?php echo __('2'); ?></option>
                                        <option value="3"><?php echo __('3'); ?></option>
                                        <option value="4"><?php echo __('4') ?></option>
                                    </select>
                                    <i class="fa fa-angle-down formIconArrow"></i>
                                </div>                     

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label><?php echo __('Adults 12+'); ?></label>
                                    <select id="cabin" name="adult" class="form-control airlinehide box6" required>
                                        <option value="1" selected><?php echo __('1'); ?></option>
                                        <option value="2"><?php echo __('2'); ?></option>
                                        <option value="3"><?php echo __('3'); ?></option>
                                        <option value="4"><?php echo __('4') ?></option>
                                    </select>
                                    <i class="fa fa-angle-down formIconArrow"></i>
                                </div>                         

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label><?php echo __('Children (2-11)'); ?></label>
                                    <select id="cabin" name="children" class="form-control airlinehide box6">
                                        <option value="0" selected>0</option>
                                        <option value="1"><?php echo __('1'); ?></option>
                                        <option value="2"><?php echo __('2'); ?></option>
                                        <option value="3"><?php echo __('3') ?></option>
                                        <option value="4"><?php echo __('4') ?></option>
                                    </select>
                                    <i class="fa fa-angle-down formIconArrow"></i>
                                </div>                         

                            </div>
                            <input type="hidden" name="page" value="1">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <button id="htl_shc_btn" type="submit" id="submit" class="btn btn-primary hvr-grow btn-fill" disabled=""><?php echo __('Search'); ?></button>
                                    </a>
                                </div>
                            </div>



                        </div>
                    </div>


                </div>
            </div>
            <?= $this->Form->end(); ?>
        </div>
        <div id="menu2" class="tab-pane fade">

            <form>
                <div class="inner_Form">

                    <div class="row">
                        <div class="form-row align-items-center search-form p-top-12">
                            <div class="">
                                <label class="container-radio fligtRetr"><?php echo __('Return'); ?>
                                    <input required type="radio" checked="checked" name="radio" value="Return Trip"> <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="">
                                <label class="container-radio fligtRetr"><?php echo __('One-Way'); ?>
                                    <input required type="radio" name="radio" value="One-Way Flight"> <span class="checkmark"></span>
                                </label>
                            </div>

                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="row align-items-center search-form p-top-12">
                                <div class="col-md-3" id="A3">
                                    <div class="search-display" >
                                        <div class="form-group">
                                            <label><?php echo __('Origin'); ?>:</label>
                                            <input required type="text" class="form-control box1" id="origin" name="origin" placeholder="<?php echo __('Origin'); ?>" onkeyup="loc_data()" autocomplete="off">
                                            <img src="<?php echo HTTP_ROOT ?>img/icon/icon_1.png" class="formIcon box1_img_h">
                                            <img src="<?php echo HTTP_ROOT ?>img/icon/icon_1_y.png" class="formIcon box1_img">
                                        </div>
                                        <div id="display" style="display:none;">

                                        </div>

                                        </style>
                                    </div>
                                </div>
                                <div class="col-md-3" id="A2">
                                    <div class="syncBoxMid hidden-xs" onclick="exchangeinp()"><i class="fas fa-exchange-alt"></i></div>
                                    <div class="search-display2">
                                        <div class="form-group">
                                            <label><?php echo __('Destination'); ?>:</label>
                                            <input required type="text" class="form-control box2" placeholder="<?php echo __('Destination'); ?>" id="destination" name="destination" onkeyup="loc_data2()" autocomplete="off">
                                            <img src="<?php echo HTTP_ROOT ?>img/icon/icon_2.png" class="formIcon box2_img_h">
                                            <img src="<?php echo HTTP_ROOT ?>img/icon/icon_2_y.png" class="formIcon box2_img">
                                        </div>
                                        <div id="display2" style="display:none;"></div>
                                    </div>
                                </div>
                                <div class="col-md-3" id="A1">

                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label><?php echo __('Departure Date') ?>:</label>
                                        <input required type="text" data-language="en" class="datepicker-here form-control box3" placeholder="<?php echo __('Departure Date') ?>" id="departure_date" name="departure_date" autocomplete="off" onblur="myInput()">
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_3.png" class="formIcon box3_img_h" >
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_3_y.png" class="formIcon box3_img">
                                    </div>
                                </div>
                                <div class="col-md-3" id="return_date1">
                                    <div class="form-group" style="margin-bottom: 0px;">
                                        <label><?php echo __('Return Date'); ?>:</label>
                                        <input type="text" data-language="en" class="datepicker-here form-control box4" placeholder="<?php echo __('Return Date'); ?>"  id="return_date" name="return_date" autocomplete="off">
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_4.png" class="formIcon box4_img_h" >
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_4_y.png" class="formIcon box4_img">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 no-padding">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo __('Cabin'); ?></label>
                                        <select id="cabin" name="cabin" class="form-control airlinehide box6" required>
                                            <option value="" selected><?php echo __('Cabin'); ?></option>
                                            <option value="Economy"><?php echo __('Economy'); ?></option>
                                            <option value="Business"><?php echo __('Business'); ?></option>
                                            <option value="First"><?php echo __('First') ?></option>
                                        </select>
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_5.png" class="formIcon box6_img_h" style="position: absolute;left: 19px;top: 41px;width: 26px;height: 26px;">
                                        <img src="<?php echo HTTP_ROOT ?>img/icon/icon_5_y.png" class="formIcon box6_img" style="position: absolute;left: 19px;top: 41px;width: 26px;height: 26px;">
                                        <i class="fa fa-angle-down formIconArrow"></i>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group dsf" style="margin-bottom: 0px;">
                                        <div style="float: left;">
                                            <label href=""><?php echo __('Rooms'); ?></label>
                                            <i class="fa fa-angle-down formIconSort"></i>
                                            <select style="display: none;">

                                                <option value="rooms">1</option>
                                                <option value="rooms">2</option>
                                                <option value="rooms">3</option>
                                                <option value="rooms">4</option>
                                            </select><div class="nice-select open" tabindex="0"><span class="current">1</span><ul class="list"><li data-value="rooms" class="option selected focus">1</li><li data-value="rooms" class="option">2</li><li data-value="rooms" class="option">3</li><li data-value="rooms" class="option">4</li></ul></div>               
                                        </div>
                                    </div>
                                    <div class="form-group dsf" style="margin-bottom: 0px;">
                                        <div style="float: left">
                                            <label href=""><?php echo __('Adults 12+'); ?></label>
                                            <i class="fa fa-angle-down formIconSort"></i>
                                            <select style="display: none;">
                                                <option value="adults">1</option>
                                                <option value="adults">2</option>
                                                <option value="adults">3</option>
                                                <option value="adults">4</option>
                                            </select><div class="nice-select" tabindex="0"><span class="current">1</span><ul class="list"><li data-value="adults" class="option selected focus">1</li><li data-value="adults" class="option">2</li><li data-value="adults" class="option">3</li><li data-value="adults" class="option">4</li></ul></div>               
                                        </div>
                                    </div>
                                    <div class="form-group dsf" style="margin-bottom: 0px;">
                                        <div style="float: left">
                                            <label href=""><?php echo __('Children (2-11)'); ?></label>
                                            <i class="fa fa-angle-down formIconSort"></i>
                                            <select style="display: none;">
                                                <option value="children">0</option>
                                                <option value="children">1</option>
                                                <option value="children">2</option>
                                                <option value="children">3</option>
                                            </select><div class="nice-select" tabindex="0"><span class="current">0</span><ul class="list"><li data-value="children" class="option selected focus">0</li><li data-value="children" class="option">1</li><li data-value="children" class="option">2</li><li data-value="children" class="option">3</li></ul></div>               
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="page" value="1">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>&nbsp;</label>
                                        <button type="submit" id="submit" class="btn btn-primary hvr-grow btn-fill" onclick="return searchresult()"><?php echo __('Search'); ?></button>
                                        </a>
                                    </div>
                                </div>



                            </div>
                        </div>


                    </div>

                </div>

            </form>
        </div>


        <div id="menu3" class="tab-pane fade">


            <div class="inner_Form">
                <div class="row m_btm_15">
                    <div class="col-md-6">
                        <a href="javascript:void(0)"><?php echo __('Check the status of your flight') ?></a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" placeholder="<?php echo __('Departure Airport'); ?>" class="form-control" name="">
                    </div>
                    <div class="col-md-3">
                        <input type="text" placeholder="<?php echo __('Arrival Airport'); ?>" class="form-control" name="">
                    </div>
                    <div class="col-md-3">
                        <input type="text" placeholder="<?php echo __('Date'); ?>"  class="form-control" >
                    </div>
                    <div class="col-md-3">
                        <input type="submit" value="<?php echo __('Search'); ?>" class="btn btn-primary hvr-grow btn-fill"  >
                    </div>
                </div>

            </div>


        </div>


    </div>

</div>




<script type="text/javascript">
    $('#form_id').submit(function () {
        $(".se-pre-con").show();
    });
</script>
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
        /*  //background: url(<?= $this->Url->image('icon/icon_4.png'); ?>) center no-repeat #fff;*/
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
        left: 102px;
        top: 34px;
        z-index: 11;
        color: #F9D749;
        font-size: 18px!important;
    }
</style>


<!-- <div id="datas_tab"></div>    -->

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
    var handlesSlider = document.getElementById('slider-handles');
    noUiSlider.create(handlesSlider, {
        start: [0, 800],
        step: 10,
        tooltips: true,
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

    var handlesSliders = document.getElementsByClassName('stopsRange');

    for (var x = 0; x < handlesSliders.length; x++) {
        noUiSlider.create(handlesSliders[x], {
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
                suffix: ' h',
                /*prefix: ' min',*/
            })
        });
    }

    $(document).ready(function () {
        $('select').niceSelect();


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
</script>
<script type="text/javascript">
    $(".psngrsHow").click(function () {
        $(".audultSHow").removeClass("hidden");
        $(".audultSHow").addClass("audultSHowClick");
        // this attribute
        $(".psngrsHow").attr("data-id", 0);
        $(".plusBtn").attr("data-butn", 0);
        $(".box5_img_h").addClass("hidden");
    });
    $(".airlinehide").click(function () {
        //alert('helo');
        $(".audultSHow").removeClass("audultSHowClick");
        $(".audultSHow").addClass("hidden");
        $(".psngrsHow").attr("data-id", 1);
    });
    function hideDivBox() {
        var id = $(".psngrsHow").attr("data-id");
        var openid = $(".plusBtn").attr("data-butn");
        if (id == 1) {
            //alert('yes');
            $(".plusBtn").attr("data-butn", 0);
            if (openid == 1 && id == 1) {
            } else {
                $(".audultSHow").removeClass("audultSHowClick");
                $(".audultSHow").addClass("hidden");
                $(".plusBtn").attr("data-butn", 0);
                $(".box5_img_h").removeClass("hidden");
            }
        } else {
            $(".psngrsHow").attr("data-id", 1);

        }
    }
    function showthis() {
        $(".plusBtn").attr("data-butn", 1);
    }
</script>

<script>
    $('#hotelSearchForm').submit(function () {
        $(".se-pre-con1").show();
    });
</script>