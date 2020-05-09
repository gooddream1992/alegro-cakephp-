<link href="<?= $this->Url->css('extranet/bootstrap-datepicker.css'); ?>" rel='stylesheet' />
<script src="<?= $this->Url->script('extranet/bootstrap-datepicker.js'); ?>" ></script>

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

    .old.day, .next, .new.day, .prev {
        visibility: hidden !important;
    }
    .mont {
        border: 1px solid lightgray;
        margin: 5px;
        border-radius: 0px;
    }

    .mont.active{
        background-color: #f9d749;
    }
</style>

<script>
    $(function () {
        var availDate = $('#setdate').val();
        var currentYear = new Date().getFullYear();
        var date = new Date();
        var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

        var nxtMonth = new Date(date.getFullYear(), date.getMonth() + 1, 1);

        var lastMonth = new Date(date.getFullYear(), date.getMonth() + 2, 1);

        $('#calendar1').datepicker({
            format: 'mm/dd/yyyy',
            startDate: new Date(),
            multidate: true,
            maxViewMode: 0,
        }).on('changeDate', function (e) {
            $('#selDates1').val($('#calendar1').datepicker('getFormattedDate'));
        });




        $('#calendar2').datepicker({
            format: 'mm/dd/yyyy',
            startDate: nxtMonth,
            multidate: true,
            maxViewMode: 0,

        }).on('changeDate', function (e) {
            $('#selDates2').val($('#calendar2').datepicker('getFormattedDate'));
        });
        $('#calendar3').datepicker({
            format: 'mm/dd/yyyy',
            startDate: lastMonth,
            multidate: true,
            maxViewMode: 0,
        }).on('changeDate', function (e) {
            $('#selDates3').val($('#calendar3').datepicker('getFormattedDate'));
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
                $("#calendar1").datepicker('setDate', datesData1);
            }
            if (datesData2.length != 0) {
                $("#calendar2").datepicker('setDate', datesData2);
            }
            if (datesData3.length != 0) {
                $("#calendar3").datepicker('setDate', datesData3);
            }
        }

    });


</script>

<section class="basics">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?= $this->element('extranet/sidebar'); ?>
            </div>

            <div class="col-md-10">


                <div class="head-section">

                    <?= $this->Form->create('', ['name' => "amenitiesPageForm", 'type' => 'post', 'class' => 'amenities-page', 'id' => 'amenities']); ?>
                    <div class="card-page-header row">
                        <div class="m-t-8 m-b-8">
                            <h2>Declare your availability.</h2>
                            <span>Define the minimum and maximum stays, advance booking options, and more. </span>
                        </div>
                        <div class="hidden-xs col-sm-4"><img src="<?= $this->Url->image('extranet/ec-availability@2x.png'); ?>"></div>
                    </div>
                    <div class="availability">
                        <h2>Reservation requests</h2>
                        <section class="panel">
                            <div class="panel-body">
                                <div>
                                    <div class="regular-radio allow-book-instantly-radio radio-selected radio">
                                        <label title="">
                                            <input name="reservationRequestType" type="radio" value="1" <?php if(@$propAvailability->reservationRequestType==1){ echo "checked"; }else{ echo "checked"; } ?>>
                                            <div class="p-l-2">
                                                <span>
                                                    <div>Allow guests to book instantly.</div>
                                                </span>
                                                <div>Guests can book my property without sending a reservation request.</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="regular-radio require-reservation-requests-radio radio">
                                        <label title="">
                                            <input name="reservationRequestType" type="radio" value="2" <?php if(@$propAvailability->reservationRequestType==2){ echo "checked"; } ?>>
                                            <div class="p-l-2">
                                                <span>
                                                    <div>Require reservation requests.</div>
                                                </span>
                                                <div>Guests wishing to book my property must send a reservation request. I understand that this may reduce the number of bookings I receive.</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="availability">
                        <h2> How many days into the future can guests book your property?</h2>
                        <section class="panel">

                            <div class="btn-group" data-toggle="buttons" style="margin: 20px;">
                                <label class="btn btn-light-blue form-check-label mont <?php if(@$propAvailability->future_book=="1 year"){ echo "active"; }if(empty(@$propAvailability->future_book)){ echo "active"; } ?>">
                                    <input class="form-check-input" type="radio" name="future_book" value="1 year" id="option1" autocomplete="off" <?php if(@$propAvailability->future_book=="1 year"){ echo "checked"; }if(empty(@$propAvailability->future_book)){ echo "checked"; } ?>>
                                    1 year
                                </label>
                                <label class="btn btn-light-blue form-check-label mont <?php if(@$propAvailability->future_book=="6 months"){ echo "active"; } ?>">
                                    <input class="form-check-input" type="radio" name="future_book" value="6 months" id="option2" autocomplete="off" <?php if(@$propAvailability->future_book=="6 months"){ echo "checked"; } ?>> 6 months
                                </label>
                                <label class="btn btn-light-blue form-check-label mont" <?php if(@$propAvailability->future_book=="3 months"){ echo "active"; } ?>>
                                    <input class="form-check-input" type="radio" name="future_book" id="option3" autocomplete="off" value="3 months" <?php if(@$propAvailability->future_book=="3 months"){ echo "checked"; } ?>> 3 months
                                </label>
                            </div>


                        </section>
                    </div>
                    <div class="availability">
                        <h2>Length of stay</h2>
                        <div class="quantity-section">
                            <div class="inner-quantity-section">
                                <h5>Minimum nights per stay</h5>                                   
                                <div class="box-border">
                                    <span class="value-button"  data-dir="dwn"><i class="fas fa-minus"></i></span>

                                    <input type="number" class="number" name="min_night"   min="1"  value="<?php if(empty(@$propAvailability->min_night)){ echo "1"; }else{ echo @$propAvailability->min_night;} ?>" >

                                    <span class="value-button" data-dir="up"><i class="fas fa-plus"></i></span>
                                </div>
                            </div>
                            <div class="inner-quantity-section">
                                <h5>Maximum nights per stay</h5>

                                <p onclick="$('#max_ni8_1').click();"><label style="font-weight: normal;font-size: 14px;"><input type="radio" id="max_ni8_1" name="max_night" value="1" <?php if(@$propAvailability->max_night_value == 1){ echo "checked"; }else{ echo "checked"; } ?>> No maximum nights per stay </label></p>


                                <input type="radio" id="max_ni8_2" name="max_night"  style="float: left;" value="2" <?php if(@$propAvailability->max_night == 2){ echo "checked"; } ?> >

                                <div class="box-border"  style="float: left;" onclick="$('#max_ni8_2').click();">

                                    <span class="value-button"  data-dir="dwn"><i class="fas fa-minus"></i></span>
                                    <input type="number"  class="number" name="max_night_value"  min="1"  value="<?php if(@$propAvailability->max_night == 2){ if(empty(@$propAvailability->max_night_value)){ echo "1"; }else{ echo @$propAvailability->max_night_value;} }else{ echo "1"; } ?>">
                                    <span class="value-button" data-dir="up"><i class="fas fa-plus"></i></span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="availability">
                        <h2>Blocked dates</h2>
                        <section class="panel">
                            <div class="panel-body">
                                <div>
                                    <div class="regular-radio allow-book-instantly-radio radio-selected radio">
                                        <label title="">
                                            <input name="blocked_date" type="radio" value="1" <?php if(@$propAvailability->blocked_date == 1){ echo "checked"; }if(empty(@$propAvailability->blocked_date)){ echo "checked"; } ?>>
                                            <div class="p-l-2">
                                                <span>
                                                    <div>My property is available for booking on any day.</div>
                                                </span>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="regular-radio require-reservation-requests-radio radio">
                                        <label title="">
                                            <input name="blocked_date" type="radio" value="2" <?php if(@$propAvailability->blocked_date == 2){ echo "checked"; } ?>>
                                            <div class="p-l-2">
                                                <span>
                                                    <div>
                                                        My property is unavailable for booking on certain days.
                                                    </div>
                                                </span>
                                                <div>Click on a date to block it out on your calendar. Guests will not be able to book on days that have been blocked out. You can add or remove blocked days after your listing is published.</div>
                                            </div>
                                        </label>
                                    </div>

                                    <div id="cal_sec">
                                        <div  id='calendar1' style="float: left;padding: 15px;" ></div>
                                        <div  id='calendar2' style="float: left;padding: 15px;" ></div>  
                                        <div  id='calendar3' style="float: left;padding: 15px;" ></div>
                                    </div>
                                    <input type="hidden" name="dates1" id="selDates1">
                                    <input type="hidden" name="dates2" id="selDates2">
                                    <input type="hidden" name="dates3" id="selDates3">
                                    <input type="hidden" id="setdate" value='<?=str_replace('"', '', @$propAvailability->blocked_date_value);?>'>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="availability">
                        <h2>Calendar sync (optional)</h2>
                        <p class="m-b-2">Provide URLs for importing your calendars from our <a href="javascript:void(0)" class="calendar-example-btn">supported company list</a>, and we’ll automatically update your property’s availability on Agoda Homes with information from each.</p>
                    </div>
                    <section class="panel">
                        <div class="panel-body" >
                            <div id="sync_cal">
                                <?php 
                                $count_sync = @count(@json_decode(@$propAvailability->calendarName));
                                $count_sync_name = @json_decode(@$propAvailability->calendarName);
                                $count_sync_url = @json_decode(@$propAvailability->calendarAddress);
                                ?>
                                <div id="appendData" >
                                    <div class="calendar-sync-item row" >
                                        <div class="col-xs-4 col-md-3 calendar-name-input calendar-name-input-0 form-group">
                                            <h5>Calendar name</h5>
                                            <input name="calendarName[]" id="calendar-name-input-0" class="form-control" value="<?=$count_sync_name[0];?>">
                                        </div>
                                        <div class="col-xs-7 col-md-8 calendar-address-input calendar-address-input-0 form-group">
                                            <h5>Calendar address (URL)</h5>
                                            <input name="calendarAddress[]" id="calendar-address-input-0" class="form-control" value="<?=@$count_sync_url[0];?>">
                                        </div>
                                    </div>
                                </div>
                                <?php for($icv=1;$icv<$count_sync;$icv++){ ?>
                                <div id="appendData" >
                                    <div class="calendar-sync-item row" >
                                        <div class="col-xs-4 col-md-3 calendar-name-input calendar-name-input-0 form-group">
                                            <h5>Calendar name</h5>
                                            <input name="calendarName[]" id="calendar-name-input-0" class="form-control" value="<?=$count_sync_name[$icv];?>">
                                        </div>
                                        <div class="col-xs-7 col-md-8 calendar-address-input calendar-address-input-0 form-group">
                                            <h5>Calendar address (URL)</h5>
                                            <input name="calendarAddress[]" id="calendar-address-input-0" class="form-control" value="<?=@$count_sync_url[$icv];?>">
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <div class="col-md-12" onclick="$('#sync_cal').append($('#appendData').html());"><a href="javascript:void(0)" id="addCalendarSyncBtn"><strong class="text-uppercase">Add another calendar</strong></a></div>
                            </div>
                        </div>
                    </section>
                    <div class="availability">
                        <h2>Cancellation policy</h2>
                        <section class="panel">
                            <div class="panel-body cancellation-policy-required">
                                <div class="m-t-1 form-group">
                                    <div class="regular-radio flexible-cancellation-policy-radio-selected radio">
                                        <label title="">
                                            <input name="cancellation" type="radio" value="Flexible" <?php if(@$propAvailability->cancellation=="Flexible"){ echo "checked"; }else{ echo "checked"; } ?> >
                                            <div class="p-l-2">
                                                <b>
                                                    <div>Flexible</div>
                                                </b>
                                                <div>Guests can cancel up to 1 day prior to check-in for a 100% refund. In case of a no show, you will receive 100% of the booking price.</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="regular-radio moderate-cancellation-policy-radio radio">
                                        <label title="">
                                            <input name="cancellation" type="radio" checked="" value="Moderate" <?php if(@$propAvailability->cancellation=="Moderate"){ echo "checked"; } ?>>
                                            <div class="p-l-2">
                                                <b>
                                                    <div>Moderate</div>
                                                </b>
                                                <div>Guests can cancel up to 5 days prior to check-in for a 100% refund. In case of a no show, you will receive 100% of the booking price.</div>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="regular-radio strict-cancellation-policy-radio radio">
                                        <label title="">
                                            <input name="cancellation" type="radio" value="Strict"  <?php if(@$propAvailability->cancellation=="Strict"){ echo "checked"; } ?>>
                                            <div class="p-l-2">
                                                <b>
                                                    <div>Strict</div>
                                                </b>
                                                <div>Guests can cancel up to 7 days prior to check-in for a 50% refund. In case of a no show, you will receive 100% of the booking price.</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                    <div class="last-section">
                        <input type="hidden" name="saveexit" id='saveexit' value="next">
                        <ul>
                            <li><span class='btn-next-save' onclick="gettForm()">SAVE AND EXIT</span></li>				                						
                            <li onclick="$('#saveexit').val('next');">
                                <button class='btn-next-save' type="submit" >NEXT</button>
                            </li>
                            <li><a href="<?=HTTP_ROOT;?>extranets/pricing/<?= $id; ?>">PREVIOUS</a></li>
                        </ul>
                    </div>
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
<script>
  $(document).ready(function(){
    
      if($('input[name="blocked_date"]:checked').val()== 2){
          $('#cal_sec').show();
      }else{
          $('#cal_sec').hide();
      }
    $('input[name="blocked_date"]').click(function(){
    	var demovalue = $(this).val(); 
        $('#cal_sec').hide();
        if(demovalue == 2){
            $('#cal_sec').show();
        }
    });
});  
</script>