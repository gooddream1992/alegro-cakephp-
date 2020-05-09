<link href="<?= $this->Url->css('extranet/bootstrap-datepicker.css'); ?>" rel='stylesheet' />
<script src="<?= $this->Url->script('extranet/bootstrap-datepicker.js'); ?>" ></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<style>
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance:textfield;
    }
    .number {
        text-align: center;
        border: none;
        margin: 0px;
        width: 44px;
        height: 31px;
        font-size: 15px;
    }

    table .old.day, table .next, table .new.day, table .prev {
        visibility: hidden !important;
    }


    #msform {
        float: left;
        width: 100%;
        overflow: hidden;
    }
    /*Hide all except first fieldset*/
    #msform fieldset:not(:first-of-type) {
/*        display: none;*/
    }
    #msform fieldset{
        float: left;
        width: 100%;
    }
</style>

<section class="basics">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?= $this->element('extranet/sidebar'); ?>
            </div>

            <div class="col-md-10">


                <div class="head-section" id="msform">

                    <?= $this->Form->create('', ['name' => "amenitiesPageForm", 'type' => 'post', 'class' => 'amenities-page', 'id' => 'amenities']); ?>
                    <?php
                    $coun = 1;
                    foreach ($availableBeds as $bes) {
                        @$propAvailability=$this->User->availlity($id,$bes->id);
                        ?>
                        <fieldset id="f<?= $coun; ?>"> 
                            <input type="hidden" name="sub_id<?= $coun; ?>" value="<?= $bes->id; ?>">
                            <input type="hidden" name="counTER" value="<?= $coun; ?>">
                            <style>
                                .mont<?= $coun; ?> {
                                    border: 1px solid lightgray;
                                    margin: 5px;
                                    border-radius: 0px;
                                }

                                .mont<?= $coun; ?>.active{
                                    background-color: #f9d749;
                                }
                            </style>
                            <script>
                                $(document).ready(function () {

                                    if ($('input[name="blocked_date<?= $coun; ?>"]:checked').val() == 2) {
                                        $('#cal_sec<?= $coun; ?>').show();
                                    } else {
                                        $('#cal_sec<?= $coun; ?>').hide();
                                    }
                                    $('input[name="blocked_date<?= $coun; ?>"]').click(function () {
                                        var demovalue = $(this).val();
                                        $('#cal_sec<?= $coun; ?>').hide();
                                        if (demovalue == 2) {
                                            $('#cal_sec<?= $coun; ?>').show();
                                        }
                                    });
                                });
                            </script>
                            <script>
                                $(function () {
                                    var availDate = $('#setdate<?= $coun; ?>').val();
                                    var currentYear = new Date().getFullYear();
                                    var date = new Date();
                                    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

                                    var nxtMonth = new Date(date.getFullYear(), date.getMonth() + 1, 1);

                                    var lastMonth = new Date(date.getFullYear(), date.getMonth() + 2, 1);

                                    $('#calendar1<?= $coun; ?>').datepicker({
                                        format: 'mm/dd/yyyy',
                                        startDate: new Date(),
                                        multidate: true,
                                        maxViewMode: 0,
                                    }).on('changeDate', function (e) {
                                        $('#selDates1<?= $coun; ?>').val($('#calendar1<?= $coun; ?>').datepicker('getFormattedDate'));
                                    });

                                    $('#calendar2<?= $coun; ?>').datepicker({
                                        format: 'mm/dd/yyyy',
                                        startDate: nxtMonth,
                                        multidate: true,
                                        maxViewMode: 0,

                                    }).on('changeDate', function (e) {
                                        $('#selDates2<?= $coun; ?>').val($('#calendar2<?= $coun; ?>').datepicker('getFormattedDate'));
                                    });

                                    $('#calendar3<?= $coun; ?>').datepicker({
                                        format: 'mm/dd/yyyy',
                                        startDate: lastMonth,
                                        multidate: true,
                                        maxViewMode: 0,
                                    }).on('changeDate', function (e) {
                                        $('#selDates3<?= $coun; ?>').val($('#calendar3<?= $coun; ?>').datepicker('getFormattedDate'));
                                    });

                                    if (availDate != "") {
                                        var datas = availDate.split(",");
                                        var datesData1 = [];
                                        var datesData2 = [];
                                        var datesData3 = [];

                                        $.each(datas, function (i, item) {
                                            if (date.getMonth() == new Date(item).getMonth()) {
                                                datesData1.push(new Date(item));
                                            }
                                            if (nxtMonth.getMonth() == new Date(item).getMonth()) {
                                                datesData2.push(new Date(item));
                                            }
                                            if (lastMonth.getMonth() == new Date(item).getMonth()) {
                                                datesData3.push(new Date(item));
                                            }
                                        });
                                        if (datesData1.length != 0) {
                                            $("#calendar1<?= $coun; ?>").datepicker('setDate', datesData1);
                                        }
                                        if (datesData2.length != 0) {
                                            $("#calendar2<?= $coun; ?>").datepicker('setDate', datesData2);
                                        }
                                        if (datesData3.length != 0) {
                                            $("#calendar3<?= $coun; ?>").datepicker('setDate', datesData3);
                                        }
                                    }

                                });


                            </script>
                            <div class="card-page-header row">
                                <div class="m-t-8 m-b-8">
                                    <h2><?php echo __('Declare the availability of your'); ?> <?= $bes->bed_name; ?></h2>
                                    <span><?php echo __('Define the minimum, maximum stays, advance booking options and more.'); ?></span>
                                </div>
                                <div class="hidden-xs col-sm-4"><img src="<?= $this->Url->image('extranet/ec-availability@2x.png'); ?>"></div>
                            </div>
                            <div class="availability">
                                <h2><?php echo __('Reservation Requests'); ?></h2>
                                <section class="panel">
                                    <div class="panel-body">
                                        <div>
                                            <div class="regular-radio allow-book-instantly-radio radio-selected radio">
                                                <label title="">
                                                    <input name="reservationRequestType<?= $coun; ?>" type="radio" value="1" <?php
                                                    if (@$propAvailability->reservationRequestType == 1) {
                                                        echo "checked";
                                                    } else {
                                                        echo "checked";
                                                    }
                                                    ?>>
                                                    <div class="p-l-2">
                                                        <span>
                                                            <div><?php echo __('Allow guests to book instantly'); ?></div>
                                                        </span>
                                                        <div><?php echo __('Guests can book'); ?> <?= $bes->bed_name; ?> <?php echo __('without sending a reservation request.'); ?></div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="regular-radio require-reservation-requests-radio radio">
                                                <label title="">
                                                    <input name="reservationRequestType<?= $coun; ?>" type="radio" value="2" <?php
                                                    if (@$propAvailability->reservationRequestType == 2) {
                                                        echo "checked";
                                                    }
                                                    ?>>
                                                    <div class="p-l-2">
                                                        <span>
                                                            <div><?php echo __('Require reservation requests'); ?></div>
                                                        </span>
                                                        <div><?php echo __('Guests wishing to book'); ?> <?= $bes->bed_name; ?> <?php echo __('must send a reservation request. I understand that this may reduce the number of bookings I receive.'); ?></div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div class="availability">
                                <h2><?php echo __('How many days into the future can guests book'); ?> <?= $bes->bed_name; ?>?</h2>
                                <section class="panel">

                                    <div class="btn-group" data-toggle="buttons" style="margin: 20px;">
                                        <label class="btn btn-light-blue form-check-label mont<?= $coun; ?> <?php
                                        if (@$propAvailability->future_book == "1 year") {
                                            echo "active";
                                        }if (empty(@$propAvailability->future_book)) {
                                            echo "active";
                                        }
                                        ?>">
                                            <input class="form-check-input" type="radio" name="future_book<?= $coun; ?>" value="1 year" id="option1" autocomplete="off" <?php
                                            if (@$propAvailability->future_book == "1 year") {
                                                echo "checked";
                                            }if (empty(@$propAvailability->future_book)) {
                                                echo "checked";
                                            }
                                            ?>>
                                            <?php echo __('1 year'); ?>
                                        </label>
                                        <label class="btn btn-light-blue form-check-label mont<?= $coun; ?> <?php
                                        if (@$propAvailability->future_book == "6 months") {
                                            echo "active";
                                        }
                                        ?>">
                                            <input class="form-check-input" type="radio" name="future_book<?= $coun; ?>" value="6 months" id="option2" autocomplete="off" <?php
                                            if (@$propAvailability->future_book == "6 months") {
                                                echo "checked";
                                            }
                                            ?>> <?php echo __('6 months'); ?>
                                        </label>
                                        <label class="btn btn-light-blue form-check-label mont<?= $coun; ?>" <?php
                                        if (@$propAvailability->future_book == "3 months") {
                                            echo "active";
                                        }
                                        ?>>
                                            <input class="form-check-input" type="radio" name="future_book<?= $coun; ?>" id="option3" autocomplete="off" value="3 months" <?php
                                            if (@$propAvailability->future_book == "3 months") {
                                                echo "checked";
                                            }
                                            ?>> <?php echo __('3 months'); ?>
                                        </label>
                                    </div>


                                </section>
                            </div>
                            <div class="availability">
                                <h2><?php echo __('Length of stay'); ?></h2>
                                <div class="quantity-section">
                                    <div class="inner-quantity-section">
                                        <h5><?php echo __('Minimum nights per stay'); ?></h5>                                   
                                        <div class="box-border">
                                            <span class="value-button"  data-dir="dwn"><i class="fas fa-minus"></i></span>

                                            <input type="number" class="number" name="min_night<?= $coun; ?>"   min="1"  value="<?php
                                            if (empty(@$propAvailability->min_night)) {
                                                echo "1";
                                            } else {
                                                echo @$propAvailability->min_night;
                                            }
                                            ?>" >

                                            <span class="value-button" data-dir="up"><i class="fas fa-plus"></i></span>
                                        </div>
                                    </div>
                                    <div class="inner-quantity-section">
                                        <h5><?php echo __('Maximum nights per stay'); ?></h5>

                                        <p onclick="$('#max_ni8_1').click();"><label style="font-weight: normal;font-size: 14px;"><input type="radio" id="max_ni8_1" name="max_night<?= $coun; ?>" value="1" <?php
                                                if (@$propAvailability->max_night_value == 1) {
                                                    echo "checked";
                                                } else {
                                                    echo "checked";
                                                }
                                                ?>> <?php echo __('No maximum nights per stay'); ?> </label></p>


                                        <input type="radio" id="max_ni8_2<?= $coun; ?>" name="max_night<?= $coun; ?>"  style="float: left;" value="2" <?php
                                        if (@$propAvailability->max_night == 2) {
                                            echo "checked";
                                        }
                                        ?> >

                                        <div class="box-border"  style="float: left;" onclick="$('#max_ni8_2<?= $coun; ?>').click();">

                                            <span class="value-button"  data-dir="dwn"><i class="fas fa-minus"></i></span>
                                            <input type="number"  class="number" name="max_night_value<?= $coun; ?>"  min="1"  value="<?php
                                            if (@$propAvailability->max_night == 2) {
                                                if (empty(@$propAvailability->max_night_value)) {
                                                    echo "1";
                                                } else {
                                                    echo @$propAvailability->max_night_value;
                                                }
                                            } else {
                                                echo "1";
                                            }
                                            ?>">
                                            <span class="value-button" data-dir="up"><i class="fas fa-plus"></i></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="availability">
                                <h2><?php echo __('Blocked Dates'); ?></h2>
                                <section class="panel">
                                    <div class="panel-body">
                                        <div>
                                            <div class="regular-radio allow-book-instantly-radio radio-selected radio">
                                                <label title="">
                                                    <input name="blocked_date<?= $coun; ?>" type="radio" value="1" <?php
                                                    if (@$propAvailability->blocked_date == 1) {
                                                        echo "checked";
                                                    }if (empty(@$propAvailability->blocked_date)) {
                                                        echo "checked";
                                                    }
                                                    ?>>
                                                    <div class="p-l-2">
                                                        <span>
                                                            <div><?= $bes->bed_name; ?> <?php echo __('is available for booking on any day.'); ?></div>
                                                        </span>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="regular-radio require-reservation-requests-radio radio">
                                                <label title="">
                                                    <input name="blocked_date<?= $coun; ?>" type="radio" value="2" <?php
                                                    if (@$propAvailability->blocked_date == 2) {
                                                        echo "checked";
                                                    }
                                                    ?>>
                                                    <div class="p-l-2">
                                                        <span>
                                                            <div>
                                                                <?= $bes->bed_name; ?> <?php echo __('is unavailable for booking on certain days.'); ?>
                                                                </div>
                                                        </span>
                                                        <div><?php echo __('Click on a date to block it out on your calendar. Guests will not be able to book on days that have been blocked out. You can add or remove blocked days after your listing is published.'); ?></div>
                                                    </div>
                                                </label>
                                            </div>

                                            <div id="cal_sec<?= $coun; ?>">
                                                <div  id='calendar1<?= $coun; ?>' style="float: left;padding: 15px;" ></div>
                                                <div  id='calendar2<?= $coun; ?>' style="float: left;padding: 15px;" ></div>  
                                                <div  id='calendar3<?= $coun; ?>' style="float: left;padding: 15px;" ></div>
                                            </div>
                                            <input type="hidden" name="dates1<?= $coun; ?>" id="selDates1<?= $coun; ?>">
                                            <input type="hidden" name="dates2<?= $coun; ?>" id="selDates2<?= $coun; ?>">
                                            <input type="hidden" name="dates3<?= $coun; ?>" id="selDates3<?= $coun; ?>">
                                            <input type="hidden" id="setdate<?= $coun; ?>" value='<?= str_replace('"', '', @$propAvailability->blocked_date_value); ?>'>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            
                            <div class="availability">
                                <h2><?php echo __('Cancellation Policy'); ?></h2>
                                <section class="panel">
                                    <div class="panel-body cancellation-policy-required">
                                        <div class="m-t-1 form-group">
                                            <div class="regular-radio flexible-cancellation-policy-radio-selected radio">
                                                <label title="">
                                                    <input name="cancellation<?= $coun; ?>" type="radio" value="Flexible" <?php
                                                    if (@$propAvailability->cancellation == "Flexible") {
                                                        echo "checked";
                                                    } else {
                                                        echo "checked";
                                                    }
                                                    ?> >
                                                    <div class="p-l-2">
                                                        <b>
                                                            <div><?php echo __('Flexible'); ?></div>
                                                        </b>
                                                        <div><?php echo __('Guests can cancel up to 1 day prior to check-in for a 100% refund. In case of a no show, you will receive 100% of the booking price.'); ?></div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="regular-radio moderate-cancellation-policy-radio radio">
                                                <label title="">
                                                    <input name="cancellation<?= $coun; ?>" type="radio" checked="" value="Moderate" <?php
                                                    if (@$propAvailability->cancellation == "Moderate") {
                                                        echo "checked";
                                                    }
                                                    ?>>
                                                    <div class="p-l-2">
                                                        <b>
                                                            <div><?php echo __('Moderate'); ?></div>
                                                        </b>
                                                        <div><?php echo __('Guests can cancel up to 5 days prior to check-in for a 100% refund. In case of a no show, you will receive 100% of the booking price.'); ?></div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="regular-radio strict-cancellation-policy-radio radio">
                                                <label title="">
                                                    <input name="cancellation<?= $coun; ?>" type="radio" value="Strict"  <?php
                                                    if (@$propAvailability->cancellation == "Strict") {
                                                        echo "checked";
                                                    }
                                                    ?>>
                                                    <div class="p-l-2">
                                                        <b>
                                                            <div><?php echo __('Strict'); ?></div>
                                                        </b>
                                                        <div><?php echo __('Guests can cancel up to 7 days prior to check-in for a 50% refund. In case of a no show, you will receive 100% of the booking price.'); ?></div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <?php if($availableBeds->count() <= 1){ ?>
                            <div class="last-section">
                                <div id="check-error" class="text-danger"></div>

                                <ul style="width: auto !important;">
                                    <li><span class='btn-next-save' onclick="gettForm()"><?php echo __('SAVE AND EXIT'); ?></span></li>				                						

                                </ul>

                                <button onclick="return formSubmit()"  type="submit" name="next" class="btn-next-save" value="Next" style="text-decoration: none;color: #000;float: right;padding: 11px 46px;margin-left: 10px;font-size: 15px;font-weight: normal;border-radius: 4px !important;background-color: #f9d749;visibility: visible !important;"><?php echo __('NEXT'); ?></button>

                                <span class="typemain" style="padding: 0;"><a href="<?= HTTP_ROOT; ?>extranets/pricing/<?= $id; ?>" style="text-decoration: none;color: #000;float: right;padding: 10px 25px;border: 1px solid #000000;font-weight: normal;border-radius: 4px !important;background-color: #fff;"><?php echo __('PREVIOUS'); ?></a></span>
                            </div>
                            <?php }else{   
                            if( $coun == 1){ ?>
                            <button type="button" name="next" class="typemain next action-button" value="Next" style="text-decoration: none;color: #000;float: right;padding: 11px 46px;margin-left: 10px;font-size: 15px;font-weight: normal;border-radius: 4px !important;background-color: #f9d749;"  onclick="myFunNxt(<?= $coun+1; ?>)"><?php echo __('NEXT'); ?></button>

                            <span class="typemain" style="padding: 0;"><a href="<?= HTTP_ROOT; ?>extranets/pricing/<?= $id; ?>" style="text-decoration: none;color: #000;float: right;padding: 10px 25px;border: 1px solid #000000;font-weight: normal;border-radius: 4px !important;background-color: #fff;"><?php echo __('PREVIOUS'); ?></a></span>
                            <?php } elseif($availableBeds->count() == $coun){ ?>
                            <div class="last-section">
                                <div id="check-error" class="text-danger"></div>

                                <ul style="width: auto !important;">
                                    <li><span class='btn-next-save' onclick="gettForm()"><?php echo __('SAVE AND EXIT'); ?></span></li>				                						

                                </ul>

                                <button onclick="return formSubmit()"  type="submit" name="next" class="btn-next-save" value="Next" style="text-decoration: none;color: #000;float: right;padding: 11px 46px;margin-left: 10px;font-size: 15px;font-weight: normal;border-radius: 4px !important;background-color: #f9d749;visibility: visible !important;"><?php echo __('NEXT'); ?></button>

                                <button onclick="myFunNxt(<?= $coun-1; ?>)" type="button" name="previous" class="previous action-button" value="previous" style="text-decoration: none;color: #000;float: right;padding: 10px 25px;border: 1px solid #000000;font-weight: normal;border-radius: 4px !important;background-color: #fff;" ><?php echo __('PREVIOUS'); ?></button>
                            </div>
                            <?php }else{ ?>
                            <button type="button" name="next" class="typeone next action-button" value="Next" style="text-decoration: none;color: #000;float: right;padding: 11px 46px;margin-left: 10px;font-size: 15px;font-weight: normal;border-radius: 4px !important;background-color: #f9d749;" onclick="myFunNxt(<?= $coun+1; ?>)" ><?php echo __('NEXT'); ?></button>

                            <button onclick="myFunNxt(<?= $coun-1; ?>)" type="button" name="previous" class="typeone previous action-button" value="previous" style="text-decoration: none;color: #000;float: right;padding: 10px 25px;border: 1px solid #000000;font-weight: normal;border-radius: 4px !important;background-color: #fff;" ><?php echo __('PREVIOUS'); ?></button>
                            <?php } } ?>
                        </fieldset>
                    
                    
                        <?php
                        $coun++;
                    }
                    ?>


                    <!--                    <div class="last-section">
                    
                                            <ul>
                                                <li><span class='btn-next-save' onclick="gettForm()">SAVE AND EXIT</span></li>				                						
                                                <li onclick="$('#saveexit').val('next');">
                                                    <button class='btn-next-save' type="submit" >NEXT</button>
                                                </li>
                                                <li><a href="<?= HTTP_ROOT; ?>extranets/pricing/<?= $id; ?>">PREVIOUS</a></li>
                                            </ul>
                                        </div>-->

                    <input type="hidden" name="saveexit" id='saveexit' value="next">
                    <script>
                        $('#f1').show();
                        myFunNxt(1);
                        function myFunNxt(data){
                    <?php for ($xcvf = 1; $xcvf < $coun; $xcvf++) { ?> 
                            $('#f<?= $xcvf; ?>').hide();
                            $('html, body').animate({scrollTop: '0px'});
                     <?php } ?>
                            $('#f'+data).show();
                        }
                    </script>
<?= $this->Form->end(); ?>
                </div>


            </div>

        </div>
    </div>
</section>

<script>
    $(document).on('click', '.box-border span', function () {
        var btn = $(this),
                oldValue = btn.closest('.box-border').find('input').val().trim(),
                newVal = 0;

        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        btn.closest('.box-border').find('input').val(newVal);
    });
</script>
<script>
    function gettForm() {
        $('#saveexit').val('save exit');
        $('#amenities').submit();
    }
</script>

<!--<script type="text/javascript">

    //jQuery time pg-count;
    var totalPageCount = <?= $availableBeds->count(); ?>;
    console.log(totalPageCount);
    var currPageCount;
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches
    $('.typemain').show();
    $('.typeone').hide();
    $('.last-section').hide();
    $(".next").click(function () {
        $('html, body').animate({scrollTop: '0px'}, 700);
        //var currnt_page = $('input[name=pg-count]').val();
        //alert(currnt_page);
        if (animating)
            return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active1");
        var arr = $('.active1').text().split(" ");
        arr = arr.filter(function (str) {
            return /\S/.test(str);
        });
        console.log(arr);
        console.log(arr.length);
        $('.typeone').show();
        $('.last-section').hide();
        $('.typemain').hide();

        currPageCount = arr[(arr.length) - 1];
        console.log(currPageCount);
        if (currPageCount == totalPageCount) {
            $('.typemain').hide();
            $('.typeone').hide();
            $('.last-section').show();
        }
        if ((currPageCount == 1) || (currPageCount==undefined)) {
            $('.typemain').show();
            $('.typeone').hide();
            $('.last-section').hide();
        }
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'position': 'relative'
                });
                next_fs.css({'left': left, 'opacity': opacity});
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".previous").click(function () {
        $('html, body').animate({scrollTop: '0px'}, 700);

        if (animating)
            return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active1");
        var arr = $('.active1').text().split(" ");
        arr = arr.filter(function (str) {
            return /\S/.test(str);
        });
        console.log(arr);
        console.log(arr.length);
        $('.typeone').show();
        $('.last-section').hide();
        $('.typemain').hide();

        currPageCount = arr[(arr.length) - 1];
        console.log(currPageCount);
        if (currPageCount == totalPageCount) {
            $('.typemain').hide();
            $('.typeone').hide();
            $('.last-section').show();
        }
        if ((currPageCount == 1) || (currPageCount==undefined)) {
            $('.typemain').show();
            $('.typeone').hide();
            $('.last-section').hide();
        }
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1 - now) * 50) + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });


</script>-->