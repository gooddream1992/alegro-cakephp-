<?php
echo $this->element('frontend/login-header');
///echo "<pre>";
//print_r($userDetails); exit;
?>
<style type="text/css">
    #search-results-body{margin: 50px 0 60px;}
    .bg_white .upload-btn-wrapper{opacity: 0;    position: absolute;
                                  top: -45px;}
    .bg_white .profile-img{position: relative;}
    .bg_white a.profile-img{transition: 500ms all 0s easy-in-out;}
    .bg_white a.profile-img:hover .upload-btn-wrapper{opacity: 1;transition: 500ms all 0s easy-in-out;}


    .upload-btn-wrapper .btn {
        /* border: 2px solid gray; */
        color: gray;
        /* background-color: white; */
        /* padding: 8px 20px; */
        /* border-radius: 8px; */
        font-size: 14px;
        font-weight: bold;
        padding: 2px 11px!important;
        border-radius: 0px;
        background: rgba(0,0,0,0.3);
        color: #fff;
    }

    .upload-btn-wrapper input[type=file] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
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


            <!-- Results -->
            <div class="col-sm-8 col-lg-9">
                <div class="bg_white right_pro">
                    <div class="row">
                        <?php
                         echo $this->element('frontend/profile_photo');
                        ?>
                        <div class="col-md-10">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo __('First Name'); ?></label>
                                            <input readonly="readonly" disabled="disabled" type="text"  class="form-control" placeholder="<?php echo $userDetails->user_detail->first_name; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo __('Last Name'); ?></label>
                                            <input type="text" readonly="readonly" disabled="disabled" class="form-control" placeholder="<?php echo $userDetails->user_detail->sur_name; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo __('Email'); ?></label>
                                            <input type="text" readonly="readonly"  disabled="disabled" name="" class="form-control" placeholder="<?php echo $userDetails->email; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo __('Phone Number');?></label>
                                            <input type="text" readonly="readonly" disabled="disabled" name="" class="form-control" placeholder="<?php echo $userDetails->user_detail->phone_number; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo __('Birth Date');?></label>
                                            <input type="text" readonly="readonly" disabled="disabled" name="" class="form-control"  placeholder="<?php echo date('d/m/Y', strtotime($userDetails->user_detail->dateofbirth)); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo __('Gender');?></label>
                                            <input type="text" readonly="readonly" disabled="disabled" name="" class="form-control"  placeholder="<?php echo $userDetails->user_detail->gender; ?>">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo __('Country');?></label>
                                            <input type="text" readonly="readonly" disabled="disabled"  name="" class="form-control" placeholder="<?php echo $userDetails->user_detail->country; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label><?php echo __('Province');?></label>
                                            <input type="text" readonly="readonly" disabled="disabled" name="" class="form-control" placeholder="<?php echo $userDetails->user_detail->province; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <a href="<?php echo HTTP_ROOT . 'edit-profile' ?>" ><input type="button" class="btn btn-primary btn-change hvr-grow" name="" value="Edit profile"></a>
                                        </div>
                                    </div>

                                </div>
<?php echo $this->Form->end(); ?>
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
