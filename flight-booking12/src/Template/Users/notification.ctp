<style type="text/css">
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {display:none;}

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #F9D749;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #F9D749;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
    #search-results-body {
        margin: 50px 0 60px;
    }
</style>
<?php echo $this->element('frontend/login-header'); ?>
<div class="modal fade bd-example-modal-lg" id="deletenotificationModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                </span>
            </button>

            <!-- Title -->
            <div class="modal-content">
                <div class="modal-header">
                    <input type="hidden" value="" id="notific_id">
                    <input type="hidden" value="<?= $userDetails->email;?>" id="user_email">
                    <h4 class="modal-title"><?php echo __('Delete Notification'); ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo __('Are you sure you want to permanently delete this notification?'); ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Cancel'); ?></button>
                    <button type="button" class="btn btn-default btn_continue" style="margin-top: 0px;" onclick="delete_insert()"><?php echo __('Delete'); ?></button>
                </div>
            </div>


        </div>
    </div>
</div>

<section id="search-results-body">
    <div class="container">
        <div class="row">
            <!-- Filters -->
            <?php
            echo $this->element('frontend/user-menu');
            ?>
            <!-- Filters -->


            <!-- Results -->
            <div class="col-sm-8 col-lg-9">
                <div class="right_histry_head">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="active"><?php echo __('Notifications'); ?> (<?php echo $notifiyCount; ?>)</h3>
                        </div>

                    </div>
                </div>
                <!-- BOX 1 -->
                <div class="boking_Box" style="min-height: 580px;padding: 15px;">

                    <?php $count=1; foreach ($notificationDetails as $notifiy) { ?>

                        <div class="row" style="margin-bottom: 30px;" id="row<?php echo $notifiy->id;?>">
                            <div class="col-md-11">
                                <h3 data-toggle="modal" data-target="#myModal" style="margin: 0px 16px 11px 0px;"><?php echo $notifiy->user_notification->notification_subject;?> <?php /*echo $count;*/ ?> <span> <?php echo date('d-M-y',strtotime($notifiy->user_notification->notifi_date))?></span></h3>
                                <p><?php echo $notifiy->user_notification->notifi_msg?></p>
                            </div>
                            <div class="col-md-0" style="margin-left: -4px;">
                              <!-- <input type="checkbox" checked data-toggle="toggle"> -->
                                <label class="switch" style="margin-top: 10px;">
                                    <input class="inputOn" type="checkbox" data-toggle="modal" data-target="#deletenotificationModal" checked="" onclick="set_id(<?php echo $notifiy->notification_id;?>)">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    <?php $count ++; } ?>
                    <script>
                        function set_id(x){
                            $('#notific_id').val(x);
                        }
                    </script>
            <script>
                function delete_insert(){
                    var id = $('#notific_id').val();
                    var email = $('#user_email').val();
                    $.ajax({
                        type: "POST",
                        url: pageurl+"users/ajaxDeleteNotification",
                        dataType: 'json',
                        data: {notification_id: id,email_id: email },
                        success: function(res) {
                           //alert(Object.values(res));
                           $('.close').click();
                           location.reload(true);
                        }
                    });
                } 
            </script>
                </div>

            </div>
            <!-- ROW -->


        </div>
        <!-- END OF THE BOX AND SINGLE ROW -->


    </div>
</section>
<?php echo $this->element('frontend/inner-footer'); ?>