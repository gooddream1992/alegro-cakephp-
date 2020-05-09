
<style>

   #search-results-body {
    margin: 50px 0 60px;
}
    #password-error.error{font-size: 10px;color:red;float:right;}
    #confirm_password-error.error{font-size: 10px;color:red;float:right;}
    #current_password-error.error{font-size: 10px;color:red;float:right;}

    .message.error{  
        background: #e24b39;
        padding: 10px;
        margin-top: 12px;
        color: #fff;
        font-weight: 500;
        letter-spacing: 1px;}
    #password-error.error{margin-top:-26px;}

</style>
<?php echo $this->element('frontend/login-header'); ?>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery.validate.js"></script>

<script>

    $().ready(function () {
        jQuery.validator.setDefaults({
            submitHandler: function () {
                return true;
            }
        });

        $("#user_change_password").validate({
            rules: {
                current_password: {
                    required: true,
                    //minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
            },
            messages: {
                current_password: {
                    required: "Please provide current password",
                    minlength: "Your password must be at least 5 characters long"
                },
                password: {
                    required: "Please provide a New Password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide confirm password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as New Password"
                }}
        });
    });
</script>
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
                <div class="right_histry_head m_btm_20">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="active">Change Password</h3>
                        </div>


                    </div>
                </div>

                <div class="bg_white right_pro">
                    <?php echo $this->Flash->render(); ?>
                    <?php echo $this->Form->create(null, ['class' => 'register-form', 'id' => 'user_change_password', 'data-toggle' => "validator"]) ?>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo __('Old Password');?></label>
                                <input type="password" name="current_password" id="current_password" class="form-control" placeholder="<?php echo __('Enter Your Current Password');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo __('New Password');?></label>
                                <input type="password" name="password"  id='password' class="form-control" placeholder="<?php echo __('Enter Your New Password');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo __('Confirm New Password');?></label>
                                <input type="password" name="confirm_password"  id="confirm_password" class="form-control" placeholder="<?php echo __('Enter Your Confirm Password');?>">
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-change hvr-grow" name="submit" value="Change Password">
                            </div>
                        </div>



                    </div>
                    <?php echo $this->Form->end(); ?>

                </div>
            </div>
            <!-- ROW -->


        </div>

    </div>
</section>
<?php echo $this->element('frontend/inner-footer'); ?>