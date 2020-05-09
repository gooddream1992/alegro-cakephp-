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
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
    #search-results-body {
        margin: 50px 0 60px;
    }
    #myModalare .modal-dialog {
        width: 40%;
        max-width: 40%;
        top: 50%;
        transform: translate(0, -53%);
    }
    .modal-middle{
        padding: 5px 20px;
    }
    .modal-middle label {
        width: 100%;
        font-size: 16px;
        margin-top: 7px;
        margin-bottom: 5px;
    }
    .modal-middle input[type="text"], .modal-middle textarea {
        width: 100%;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 10px;
        margin-bottom: 7px;
    }
    #myModalare .modal-dialog .modal-footer button[type="submit"]{
        background: #f9d749;
        border: 1px solid #f9d749;
        padding: 6px 15px;
        border-radius: 3px;
        font-size: 16px;
    }
    #myModalare .modal-dialog .modal-footer button[type="submit"]:hover {
        border: 1px solid #545454;
        background: #fff;
        color: #545454;
        cursor: pointer;
    }
    #myModalare .modal-dialog .modal-footer button.cancel{
        background: #fff;
        border: 1px solid #545454;
        padding: 6px 15px;
        border-radius: 3px;
        font-size: 16px;
        color: #545454;
        float: left;
        cursor: pointer;
    }
    #myModalare .modal-dialog .modal-footer button.cancel:hover{
        background: #f9d749;
        border: 1px solid #f9d749;
        color: #545454;
    }
    .review-page-left {
    width: 100%;
    float: left;
    padding: 11px 13px 0px 0px;
    margin-left: 15px;
    height: 552px;
    overflow-y: scroll;
}
    .review-b-le {
        width: 100%;
        float: left;
        margin-bottom: 15px;
    }
    .review-b-img {
        width: 50px;
        height: 60px;
        padding: 5px 0px;
        float: left;
    }
    .review-page-left img {
        width: 100%;
        border-radius: 50%;
    }
    .review-b-le h5 {
        font-size: 18px;
        color: #000000;
        font-weight: bold;
        float: left;
        width: 75%;
        padding: 15px 18px 0;
        text-align: left;
    }
    .rating-line {
        color: #f9d749;
        font-size: 16px;
        padding: 0 15px;
        width: 65%;
        float: left;
    }
    .rating-line span {
        color: #000000;
        padding: 4px 4px;
        margin: 0px 7px;
        font-size: 15px;
        font-weight: bold;
        background: #f9d749;
        border: 1px solid #f9d749;
    }
    .review-page-right {
        width: 30%;
        float: left;
        text-align: center;
    }
    .review-right-box{
        width: 100%;
        float: left;
        background: #fff;
        border: 2px solid #eeeeee;
        border-radius: 4px;
        text-align: center;
        padding: 42px 14px;
    }
    .review-b-le p {
        width: 89%;
        float: left;
        line-height: 24px;
        padding: 0 0 10px 19px;
    }
    .review-b-le p span {
        width: 100%;
        float: left;
        color: #888787;
        padding: 12px 0;
    }
    .review-page-right h6 {
        font-size: 18px;
        color: #000000;
        font-weight: bold;
        width: 100%;
        float: left;
    }
    .review-page-right h2 {
        font-size: 80px;
        color: #f9d749;
        font-weight: bold;
        width: 100%;
        float: left;
    }
    .review-page-right h2 span{
        color: #000000;
    }
    #myModala .modal-header{
        background: #f7f7f7;
    }
    #myModala .modal-header h4 {
        margin: 13px 0 0;
        font-size: 18px;
        font-weight: bold;
    }
    #myModala .formIconSort {
        right: 25px;
        top: 27px;
    }
    #myModala .nice-select {
        width: 140px;
    }
    .review-b-le p span a{
        color:#909090; 
    }
    .form-group2-message{
        width: 235px;
        position: relative;
        float: right;
    }
    .form-group2-message .formIconArrow {
        top: 30px;
    }
    .form-group2-message {
        margin-right: 15px !important;
    }
    .modal.show .modal-dialog {
        -webkit-transform: translate(0,-50%);
        transform: translate(0,-50%);
        top: 46%;
    }
    .boking_Box .modal-footer button {
        background: #f9d749;
        border: 1px solid #f9d749;
        padding: 9px 20px;
        border-radius: 2px;
        cursor: pointer;
    }
    .boking_Box .modal-footer button:focus{
        outline: none;
    }
    .boking_Box .modal-footer button:hover{
        background: #fff;
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
                    <input type="hidden" value="<?= $userDetails->email; ?>" id="user_email">
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
                            <h3 class="active"><?php echo __('Messages'); ?> (<?php
                                if (!empty($_GET['q']) && $_GET['q'] == 'a') {
                                    echo $notifiyCount;
                                } else {
                                    echo $htl_msg_count;
                                }
                                ?>)</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group2-message" style="margin: 14px 0 0 0">

                                <select class="form-control" id="doctyp" onchange="updateQueryStringParameter('<?= $currUrl; ?>', 'q', $(this).val())" required="" style="display: none;">
                                    <option value="p" <?= (!empty($_GET['q']) && $_GET['q'] == 'p') ? 'selected' : ''; ?>><?php echo __('From Properties'); ?></option>
                                    <option value="a" <?= (!empty($_GET['q']) && $_GET['q'] == 'a') ? 'selected' : ''; ?>><?php echo __('From Admin'); ?></option>
                                </select>

                                <i class="fa fa-angle-down formIconArrow" style="margin: -18px -18px;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- BOX 1 -->
                <div class="boking_Box" style="min-height: 580px;padding: 15px;">
                    <div class="review-page-left">  
                        <?php
                        $count = 1;
                        if (!empty($_GET['q']) && $_GET['q'] == 'a') {

                            foreach ($notificationDetails as $notifiy) {
                                ?>
                                <div class="review-b-le" style="border-bottom: 2px solid #eee;">
                                    <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                    <h5><?php
                                        if (!empty($notifiy->sender_id)) {
                                            
                                        } else {
                                            echo 'Admin';
                                        }
                                        ?></h5> <span><?php echo date_format($notifiy->user_notification->notifi_date, 'd M Y') ?></span>
                                    <p> <?php //echo $notifiy->user_notification->notification_subject;              ?>
                                        <?php echo $notifiy->user_notification->notifi_msg ?>

                                    </p> 

                                </div>

                                                                                                                                <!--                        <div class="row" style="margin-bottom: 30px;" id="row<?php echo $notifiy->id; ?>">
                                                                                                                                                            <div class="col-md-11">
                                                                                                                                                                <h3 data-toggle="modal" data-target="#myModal" style="margin: 0px 16px 11px 0px;"><?php echo $notifiy->user_notification->notification_subject; ?> <?php /* echo $count; */ ?> <span> <?php echo date('d-M-y', strtotime($notifiy->user_notification->notifi_date)) ?></span></h3>
                                                                                                                                                                <p><?php echo $notifiy->user_notification->notifi_msg ?></p>
                                                                                                                                                            </div>
                                                                                                                                                            <div class="col-md-0" style="margin-left: -4px;">
                                                                                                                                                                <label class="switch" style="margin-top: 10px;">
                                                                                                                                                                    <input class="inputOn" type="checkbox" data-toggle="modal" data-target="#deletenotificationModal" checked="" onclick="set_id(<?php echo $notifiy->notification_id; ?>)">
                                                                                                                                                                    <span class="slider round"></span>
                                                                                                                                                                </label>
                                                                                                                                                            </div>
                                                                                                                                                        </div>-->
                                <?php
                                $count ++;
                            }
                        } else {
                            $hcount = 0;
                            foreach ($hotel_message as $htm_msg) {
                                $img = $this->User->usrdetHelper($htm_msg->sender_id)->profile_photo;
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
                                <a href="<?= HTTP_ROOT.'message?q='.$htm_msg->booking_no.'&p='.$this->User->getHotelName($htm_msg->booking_no); ?>">
                                    <div class="review-b-le" style="border-bottom: 2px solid #eee;">
                                        <div class="review-b-img"><img src="<?= HTTP_ROOT . $imgUrl; ?>" style="width: 64px;height: 64px;border-radius: 50%;"></div>
                                        <h5><?php
                                            if (!empty($htm_msg->sender_id)) {
                                                echo $this->User->getHotelName($htm_msg->booking_no). ' ( ' . $htm_msg->booking_no . ' ) ';
                                            } else {
                                                echo 'Admin';
                                            }
                                            ?></h5> <span><?php
                                            $lastData = $this->User->getLastMessage($this->request->session()->read('Auth.User.id'), $htm_msg->booking_no);
                                            echo date_format($lastData->notifi_date, 'd M Y')
                                            ?></span>
                                        <p> <?php //echo $notifiy->user_notification->notification_subject;            ?>
                                            <?php echo nl2br($lastData->notifi_msg); //nl2br($htm_msg->notifi_msg); ?>
                                            <?php /* if ($htm_msg->sender_id != $this->request->session()->read('Auth.User.id')) { ?>
                                              <span style="display: block; text-align: right; padding-right:15px;">
                                              <a href="JavaScript:void(0);" data-toggle="modal" data-target="#myModalare<?= $hcount; ?>"><i class="fas fa-reply-all"></i> Reply</a>
                                              </span>
                                              <?php } */ ?>
                                        </p> 

                                    </div>
                                </a>
<!--                                <div class="modal fade slider-modal in show" id="myModalare<?= $hcount; ?>" role="dialog">
                                    <div class="modal-dialog">
                                         Modal content
                                        <div class="modal-content">
                                            <div class="modal-body" style="padding: 0;">
        <?= $this->Form->create('', ['type' => 'post']); ?>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                                <div class="modal-header">
                                                    <h4>New Message</h4>
                                                </div>
                                                <div class="modal-middle">
                                                    <label>To</label>
                                                    <input type="text" id="htl_name" disabled value="<?= $htm_msg->notification_subject; ?>">
                                                    <label>Subject</label>
                                                    <input type="text" name="notification_subject" value="<?= $this->request->session()->read('Auth.User.name'); ?>">
                                                    <label>Message</label>
                                                    <textarea name="notifi_msg" required=""></textarea>
                                                    <input type="hidden" name="booking_no" value="<?= $htm_msg->booking_no; ?>">
                                                    <input type="hidden" name="sender_id" value="<?= $htm_msg->receiver_id; ?>">
                                                    <input type="hidden" name="receiver_id" value="<?= $htm_msg->sender_id; ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="cancel" data-dismiss="modal">Cancel</button>
                                                    <button type="submit">Send</button>
                                                </div>
        <?= $this->Form->end(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <?php
                                $hcount++;
                            }
                        }
                        ?>
                    </div>

                    <script>
                        function set_id(x) {
                            $('#notific_id').val(x);
                        }

                        function delete_insert() {
                            var id = $('#notific_id').val();
                            var email = $('#user_email').val();
                            $.ajax({
                                type: "POST",
                                url: pageurl + "users/ajaxDeleteNotification",
                                dataType: 'json',
                                data: {notification_id: id, email_id: email},
                                success: function (res) {
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
<?php
echo $this->element('frontend/inner-footer');
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