<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/extranet/booking-details.css" type="text/css">
<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>dist/css/datepicker.min.css" type="text/css">

<?php 
            $LAN = $this->request->session()->read("lan");
            if($LAN == "PT"){
        ?>
            <script src="<?php echo HTTP_ROOT ?>dist/js/datepicker.pt.js"></script>
            <script src="<?php echo HTTP_ROOT ?>dist/js/i18n/datepicker.pt.js"></script>
        
            <?php } else if ($LAN == "FR"){ ?>
                <script src="<?php echo HTTP_ROOT ?>dist/js/datepicker.fr.js"></script>
                <script src="<?php echo HTTP_ROOT ?>dist/js/i18n/datepicker.fr.js"></script>
            <?php } else{ ?>
                <script src="<?php echo HTTP_ROOT ?>dist/js/datepicker.js"></script>
                <script src="<?php echo HTTP_ROOT ?>dist/js/i18n/datepicker.en.js"></script>
            <?php } ?>
<?php /* ?><script src="<?php echo HTTP_ROOT ?>dist/js/datepicker.js"></script>
<script src="<?php echo HTTP_ROOT ?>dist/js/i18n/datepicker.en.js"></script><?php */ ?>
<style>
    .disabled, .disabled a {
        cursor: not-allowed !important;
    }
    .datepicker {
        opacity: 1 !important;
    }
    .datepickers-container {
        z-index: 9999;
    }
    #cng_dt_err {
        color: #df1e1e;
        font-size: 15px;
        font-weight: 700;
    }
    #datetimepicker1, #datetimepicker11{
        width: 100%;
    }
</style>
<section class="reservation-mena">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <h5><?= __("Booking Details"); ?></h5>

            </div>
        </div>
    </div>
</section>


<section class="reservation-head">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="reservation-head-box">
                    <div class="reserv-box-left">
                        <div class="reservation-headbox-laft">
                            <div class="reservation-box-left">
                                <div class="rse-check-in">
                                    <?= __("Check-in"); ?>:
                                    <span>
                                        <?= __(date_format($all_data->check_in, 'D')); ?>
                                        <?= date_format($all_data->check_in, ' , d '); ?>
                                        <?= __(date_format($all_data->check_in, 'M')); ?>
                                        <?= date_format($all_data->check_in, ' Y'); ?>
                                    </span>
                                </div>
                                <div class="rse-check-in">
                                    <?= __("Check-out"); ?>:
                                    <span>
                                        <?= __(date_format($all_data->check_out, 'D')); ?> 
                                        <?= date_format($all_data->check_out, ' , d '); ?> 
                                        <?= __(date_format($all_data->check_out, 'M')); ?> 
                                        <?= date_format($all_data->check_out, ' Y'); ?> 
                                    </span>
                                </div>
                                <ul>
                                    <li><?= __("Your Stay"); ?>:<span><?php echo $difff = timeago(date_format($all_data->check_in, 'Y-m-d'), date_format($all_data->check_out, 'Y-m-d')); ?> <?php
                                            if ($difff > 1) {
                                                echo __('nights');
                                            } else {
                                                echo __("night");
                                            }
                                            ?></span></li>
                                    <li><?php echo (count(json_decode($all_data->room_fnm)) > 1) ? __("Guests") : __("Guest"); ?>:<span><?= count(json_decode($all_data->room_fnm)); ?></span></li>
                                    <li><?= __("Room Type"); ?>:<span><?= $this->User->getDataForRoom($all_data->room_id)->bed_name; ?></span></li>
                                    <li><?= ($all_data->numb_rooms > 1) ? __("Rooms") : __("Room"); ?>:<span><?= $all_data->numb_rooms; ?></span></li>
                                </ul>
                            </div> 
                            <div class="reserva-box-right">
                                <div class="rse-jane">
                                    <?= __("Lead Guest"); ?>: <span><?= $all_data->user_firstname; ?> <?= $all_data->user_lastname; ?></span>
                                </div>
                                
                                <div class="rse-jane" style="float: right;font-weight: normal;margin: -63px -13px;">
                                <span style="font-weight:bold;"><?= __("Phone Number"); ?>:</span> <?= $all_data->phone; ?>
                                </div>

                                <ul>
                                    <?php
                                    $guFn = json_decode($all_data->room_fnm);
                                    $guLn = json_decode($all_data->room_lnm);
                                    for ($cnt = 1; $cnt <= count(json_decode($all_data->room_fnm)); $cnt++) {
                                        ?>
                                        <li><?= __("Room"); ?> <?= $cnt; ?></li>
                                        <li><?= __("Guest Name"); ?>: <span><?= $guFn[$cnt - 1]; ?> <?= $guLn[$cnt - 1]; ?></span></li>
                                        <?php
                                    }
                                    ?>

                                </ul> 
                                <div class="show-phone"><?= __("Connect with your guest! Let them know what time youd like to welcome them or where they should pick up their keys. Theyre just a phone call away: call them through their phone number. You can also email them or send them a massage."); ?></div>

                                <ul>
                                    <li><?= __("Booking Number"); ?>: <span><?= $all_data->booking_no; ?></span> </li>
                                    <li><?= __("Date"); ?>:<span>
                                            <?= __(date_format($all_data->booking_dt, 'D')); ?>
                                            <?= date_format($all_data->booking_dt, ', d '); ?>
                                            <?= __(date_format($all_data->booking_dt, 'M')); ?>
                                            <?= date_format($all_data->booking_dt, ' Y'); ?>
                                        </span>
                                    </li>
                                    <li><?= __("Total Price"); ?>: <span>AOA <?= changeFormat(number_format($all_data->total_room_fee, 2)); ?></span> </li>
                                    <li><?= __("Alegro Commission"); ?>: <span><?= $this->User->getSeviceFee(@$all_data->property_id); ?>% (AOA <?= changeFormat(number_format($all_data->total_room_fee * ($this->User->getSeviceFee(@$all_data->property_id) / 100), 2)); ?>)</span> </li>
                                    <li><?= __("Cancellation Policy"); ?>: <span><?= __($this->User->cancelPolicy(@$all_data->property_id)); ?></span> <br>                     <span style="width: 508px;margin-top: 5px;">
                                            <?php 
                                                if($this->User->cancelPolicy(@$all_data->property_id)=='Flexible'){
                                                    echo __("Guests can cancel up to 1 day prior to check-in for a 100% refund. In case of a no show, you will receive 100% of the booking price.");
                                                }if($this->User->cancelPolicy(@$all_data->property_id)=='Moderate'){
                                                    echo __("Guests can cancel up to 5 days prior to check-in for a 100% refund. In case of a no show, you will receive 100% of the booking price.");
                                                }if($this->User->cancelPolicy(@$all_data->property_id)=='Strict'){
                                                    echo __("Guests can cancel up to 7 days prior to check-in for a 50% refund. In case of a no show, you will receive 100% of the booking price.");
                                                }
                                                
                                            ?>
                                        </span>
                                    </li>
                                </ul> 

                            </div>

                        </div>
                        <div class="reservation-headbox-laft2">
                            <h5><?= $this->User->getDataForRoom($all_data->room_id)->bed_name; ?><span>AOA <?= changeFormat(number_format($all_data->total_room_fee, 2)); ?></span></h5>
                            <ul>
                                <li><i class="fas fa-sign-in-alt"></i> 
                                    <?= date_format($all_data->check_in, 'd '); ?>
                                    <?= __(date_format($all_data->check_in, 'M')); ?>
                                    <?= date_format($all_data->check_in, ' Y'); ?>
                                </li>
                                <li><i class="fas fa-sign-out-alt"></i> 
                                    <?= date_format($all_data->check_out, 'd '); ?>
                                    <?= __(date_format($all_data->check_out, 'M')); ?>
                                    <?= date_format($all_data->check_out, ' Y'); ?>
                                </li>
                            </ul>
                        </div>
                        <h4><?= __("Conversation with guest"); ?></h4>
                        <div id="reser-scrool-main">
                            <div id="reser-scrool">
                                <?php
                                foreach ($all_msg as $msg_data) {

                                    $img = $this->User->usrdetHelper($msg_data->sender_id)->profile_photo;
                                    if (empty($img)) {
                                        $imgUrl = 'img/avatar1.jpg';
                                    } else {
                                        if (strstr($img, 'img/pro_pic/')) {
                                            $imgUrl = $img;
                                        } else {
                                            $imgUrl = PHOTOS . $img;
                                        }
                                    }
                                    ?>
                                    <div class="sms-chat-box">
                                        <div class="sms-cha-img"><img src="<?= HTTP_ROOT . $imgUrl; ?>" style="width: 64px;height: 64px;border-radius: 50%;"></div>
                                        <div class="sms-cha-text">
                                            <h1><?= $msg_data->notification_subject; ?><span><?= date_format($msg_data->notifi_date, 'd M Y'); ?></span></h1>
                                            <p><?= nl2br($msg_data->notifi_msg); ?></p>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="seames">      
                                <div class="row mb-4">
                                    <div class="col text-center">
                                        <a href="#myModal" class="seames" data-toggle="modal"><?= __("Compose Message"); ?></a>
                                    </div>
                                </div>
                                <!-- large modal -->
                            </div>
                        </div>
                    </div>
                    <div class="reservation-headbox-right">
                        <div class="reseov"><a href="<?= HTTP_ROOT . 'extranets/bookings'; ?>"><i class="fa fa-chevron-left"></i><?= __("Return to bookings"); ?></a></div>
                        <div class="upd-res">
                            <h5><?= __("Update This Booking"); ?></h5>
                            <div class="upd-res-box">
                                <ul>
                                    <li <?php if ($all_data->payment_status == 4) { ?> class= 'disabled' <?php } ?>><a <?php if ($all_data->payment_status != 4) { ?> data-toggle="modal" data-target="#myModal1a" <?php } ?> ><?= __("Change Booking Dates"); ?></a></li>
                                    <li <?php if ($all_data->payment_status == 4) { ?> class= 'disabled' <?php } ?>  <?php if ($all_data->user_htl_reach_status == 1) { ?> style="background:#f9d749;" <?php } ?>><a   <?php if ($all_data->payment_status != 4) { ?> data-toggle="modal" data-target="#myModal4ad" <?php } ?>><?= __("Mark As No-Show"); ?></a></li>
                                    <li  <?php if ($all_data->payment_status == 4) { ?> class= 'disabled' <?php } ?> <?php if ($all_data->user_htl_reach_status == 2) { ?> style="background:#f9d749;" <?php } ?>><a  <?php if ($all_data->payment_status != 4) { ?>  data-toggle="modal" data-target="#myModal3ad" <?php } ?>><?= __("Mark As Show"); ?></a></li>
                                    <li  class= 'disabled'><a><?= __("Issue A Refund"); ?></a></li>
                                    <li  <?php if ($all_data->payment_status == 4) { ?> class= 'disabled' <?php } ?> <?php if ($all_data->user_htl_reach_status == 3) { ?> style="background:#f9d749;" <?php } ?>><a  <?php if ($all_data->payment_status != 4) { ?> data-toggle="modal" data-target="#myModal1ad" <?php } ?> ><?= __("Cancel Booking"); ?></a></li>
                                    <li></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<script>
// Get the modal
    var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<!-- Start Change booking dates -->
<div class="modal fade new-message" id="myModal1a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                <h4 class="modal-title"><?= __("Change Booking Dates"); ?></h4>
            </div>
            <div class="modal-body">
                <div id="cng_dt_err"></div>
                <div class="form-group" >

                    <label><?= __("Check-in"); ?></label>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' id='datetimepicker_1' class="datepicker-here form-control box3"  />
<!--                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>-->
                    </div>

                    <label><?= __("Check-out"); ?></label>
                    <div class='input-group date' id='datetimepicker11'>
                        <input type='text' id='datetimepicker_11' class="datepicker-here form-control box3" />
<!--                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>-->
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel-m" data-dismiss="modal"><?= __("Cancel"); ?></button>
                <button type="button" class="btn btn-primary send-m" onclick="return reset_date()"><?= __("Submit"); ?></button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.es.min.js"></script>-->
<script >
//                    $(function () {
//                        $('#datetimepicker_1').datepicker({
//                            format: "dd/mm/yyyy",
//                            language: "en",
//                            autoclose: true,
//                            todayHighlight: true
//                        });
//                        $('#datetimepicker_11').datepicker({
//                            format: "dd/mm/yyyy",
//                            language: "en",
//                            autoclose: true,
//                            todayHighlight: true
//                        });
//                    });

    $('.datepicker-here').datepicker({
        minDate: new Date(),
        /*startDate: start,*/
    });

    function reset_date() {
        if ($('#datetimepicker_1').val() == '' && $('#datetimepicker_11').val() == '') {
            $('#datetimepicker1').append('<span class="er1">This field is required.</span>');
            $('#datetimepicker11').append('<span class="er11">This field is required.</span>');
            return false;
        } else {
            if ($('#datetimepicker_1').val() == '') {
                $('.er1').remove();
                $('.er11').remove();
                $('#datetimepicker1').append('<span class="er1">This field is required.</span>');
                return false;
            } else if ($('#datetimepicker_11').val() == '') {
                $('.er1').remove();
                $('.er11').remove();
                $('#datetimepicker11').append('<span class="er11">This field is required.</span>');
                return false;
            } else {
                $('.er1').remove();
                $('.er11').remove();
            }
        }
        var checkIn = $('#datetimepicker_1').val();
        var checkOut = $('#datetimepicker_11').val();
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/change_date",
            dataType: 'json',
            data: {checkIn: checkIn, checkOut: checkOut, id: "<?= $id; ?>"},
            success: function (res) {

                if (res.status == "error") {
                    $('#cng_dt_err').html("Try again after some time..");
                }
                if (res.status == "error1") {
                    $('#cng_dt_err').html("Rooms are not available..");
                }
                if (res.status == "success") {
                    window.location.reload();
                }
            }
        });
    }
</script>
<!--End Change booking dates-->
<div class="modal fade new-message" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?= $this->Form->create('', ['type' => 'post']); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                <h4 class="modal-title"><?= __("New Message"); ?></h4>
            </div>
            <div class="modal-body">

                <label for="email"><?= __("To"); ?></label>
                <input type="text" name="username" class="form-control" id="email" placeholder="" disabled value="<?= $all_data->user_firstname . ' ' . $all_data->user_lastname; ?>">
                <label for="uname"><?= __("Subject"); ?>:</label>
                <input type="text" name="notification_subject" required value="<?= $this->User->getDataForHotel($all_data->property_id)->description->propertyName; ?>">
                <label for="uname"><?= __("Message"); ?>:</label>
                <textarea type="text" name="notifi_msg" class="form-control" required="" placeholder="<?= __("Type your message here..."); ?>" style="margin: 0px 1px 0px 0px; height: 141px; width: 568px;"></textarea>

                <input type="hidden" name="booking_no" value="<?= $all_data->booking_no; ?>">
                <input type="hidden" name="sender_id" value="<?= $all_data->property_user_id; ?>">
                <input type="hidden" name="receiver_id" value="<?= $all_data->user_id; ?>">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel-m" data-dismiss="modal"><?= __("Cancel"); ?></button>
                <button type="submit" class="btn btn-primary send-m"><?= __("Submit"); ?></button>

            </div>
            <?= $this->Form->end(); ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Start Dlete booking Modal-->
<div class="modal fade new-message delet-message" id="myModal1ad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                <h4 class="modal-title"><?= __("Cancel Booking"); ?></h4>
            </div>
            <div class="modal-body">
                <p><?= __("Are you sure you want to permanently cancel this booking?"); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel-m" data-dismiss="modal"><?= __("Ignore"); ?></button>
                <a class="btn btn-primary" href="<?= HTTP_ROOT; ?>extranets/booking_details/<?= $id; ?>?token=3"><?= __("Cancel"); ?></a>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Start Refund booking Modal-->
<div class="modal fade new-message delet-message" id="myModal2ad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                <h4 class="modal-title"><?= __("Issue Refund"); ?></h4>
            </div>
            <div class="modal-body">
                <p><?= __("Are you sure you want to issue a refund?"); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel-m" data-dismiss="modal"><?= __("Ignore"); ?></button>
                <a class="btn btn-primary" href="<?= HTTP_ROOT; ?>extranets/booking_details/<?= $id; ?>?token=5"><?= __("Refund"); ?></a>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Start Mark As Show booking Modal-->
<div class="modal fade new-message delet-message" id="myModal3ad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                <h4 class="modal-title"><?= __("Mark As Show"); ?></h4>
            </div>
            <div class="modal-body">
                <p><?= __("Are you sure you want to mark this guest as Show?"); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel-m" data-dismiss="modal"><?= __("Ignore"); ?></button>
                <a class="btn btn-primary" href="<?= HTTP_ROOT; ?>extranets/booking_details/<?= $id; ?>?token=2"><?= __("Mark"); ?></a>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Start Mark As No-Show booking Modal-->
<div class="modal fade new-message delet-message" id="myModal4ad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                <h4 class="modal-title"><?= __("Mark As No-Show"); ?></h4>
            </div>
            <div class="modal-body">
                <p><?= __("Are you sure you want to mark this guest as No-Show?"); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cancel-m" data-dismiss="modal"><?= __("Ignore"); ?></button>
                <a class="btn btn-primary" href="<?= HTTP_ROOT; ?>extranets/booking_details/<?= $id; ?>?token=1"><?= __("Mark"); ?></a>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php

function timeago($endDate, $startDate) {
    $date1_ts = strtotime($endDate);
    $date2_ts = strtotime($startDate);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400);
}

function changeFormat($pri) {
    $dat = explode('.', $pri);
    $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
    return $f;
}
?>

