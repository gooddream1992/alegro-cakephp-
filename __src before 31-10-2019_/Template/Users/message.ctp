<?php echo $this->element('frontend/login-header'); ?>
<style>
    #search-results-body {
        margin: 50px 0 60px;
    }
    .review-page-left {
        width: 100%;
        float: left;
        padding: 11px 0;
        height: 450px;
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
</style>
<section id="search-results-body">
    <div class="container">
        <div class="row">
            <!-- Filters -->
            <?php
            echo $this->element('frontend/user-menu');
            ?>
            <!-- Filters -->

            <div class="col-sm-8 col-lg-9">
                <div class="right_histry_head">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="active"><?php echo __('Messages From') . ' "' . $_GET['p'] . '"'; ?> </h3>
                        </div>
                        <div class="col-md-6">

                        </div>

                    </div>
                </div>
                <div class="boking_Box" style="height: 380px;padding: 15px;overflow-y: scroll;">

                    <div class="form-group form-group2-message" style="margin: 14px 0 0 0">
                        <?php
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
                            <div class="review-b-le" style="border-bottom: 2px solid #eee;">
                                <div class="review-b-img"><img src="<?= HTTP_ROOT . $imgUrl; ?>" style="width: 64px;height: 64px;border-radius: 50%;"></div>
                                <h5><?php
                                    if (!empty($htm_msg->sender_id)) {
                                        echo $htm_msg->notification_subject;
                                    } else {
                                        echo 'Admin';
                                    }
                                    ?></h5> <span><?php
                                    echo date_format($htm_msg->notifi_date, 'd M Y')
                                    ?></span>
                                <p> <?php //echo $notifiy->user_notification->notification_subject;                       ?>
                                    <?php echo nl2br($htm_msg->notifi_msg); ?>

                                </p> 

                            </div>
                            <?php
                            $hcount++;
                        }
                        ?>
                    </div>
                </div>
                <div class="boking_Box" style="">
                    <?= $this->Form->create('', ['type' => 'post']); ?>
                    <div class="input-group">

                        <textarea class="form-control custom-control" name="notifi_msg" rows="5" placeholder="<?php echo __('Type your message here...'); ?>" style="resize:none"></textarea> 

                        <input type="hidden" name="notification_subject" value="<?= $this->request->session()->read('Auth.User.name'); ?>">
                        <input type="hidden" name="booking_no" value="<?= $htm_msg->booking_no; ?>">
                        <input type="hidden" name="sender_id" value="<?= $this->request->session()->read('Auth.User.id'); ?>">
                        <input type="hidden" name="receiver_id" value="<?= $this->User->getHotelId($htm_msg->booking_no); ?>">
                    </div>
                    <div style="width:100%;">
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;width: 10% !important;float: right;"><?php echo __('Submit'); ?></button>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
            </div>


        </div>
        <!-- END OF THE BOX AND SINGLE ROW -->
    </div>
</section>