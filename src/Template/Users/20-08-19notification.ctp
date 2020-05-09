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
#myModalare .modal-dialog {
    width: 83%;
    max-width: 50%;
    top: 50%;
    transform: translate(0, -53%);
}
    .review-page-left {
    width: 100%;
    float: left;
    padding: 11px 33px;
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
    height: 50px;
    padding: 12px 0px;
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
    padding: 3px 18px;
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
    width: 100%;
    float: left;
    line-height: 24px;
    padding: 10px 0;
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
                    <a href="JavaScript:void(0);" data-toggle="modal" data-target="#myModalare">Reply</a>
                    <div class="modal fade slider-modal in show" id="myModalare" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body" style="padding: 0;">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <div class="modal-header">
                                <h4>Notifiy</h4>
                            </div>
                            <div class="review-page-left">               
                                <div class="review-b-le">
                                    <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                    <h5>Jason Tonn</h5> <span>09 April 2019</span>
                                    <div class="rating-line">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span> 5/5</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                                </div>


                                <div class="review-b-le">
                                    <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                    <h5>Jason Tonn</h5> <span>09 April 2019</span>
                                    <div class="rating-line">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span> 5/5</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                                </div>

                                <div class="review-b-le">
                                    <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                    <h5>Jason Tonn</h5> <span>09 April 2019</span>
                                    <div class="rating-line">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span> 5/5</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                                </div>


                                <div class="review-b-le">
                                    <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                    <h5>Jason Tonn</h5> <span>09 April 2019</span>
                                    <div class="rating-line">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span> 5/5</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                                </div><div class="review-b-le">
                                    <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                    <h5>Jason Tonn</h5> <span>09 April 2019</span>
                                    <div class="rating-line">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span> 5/5</span>
                                    </div>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>

                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
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