<script src="<?php echo HTTP_ROOT ?>jqvalidations/lib/jquery.js"></script>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery.validate.js"></script>

<script>

    jQuery.validator.setDefaults({
        submitHandler: function () {
            var formData = $('#change_password').serialize();

            jQuery.post(pageurl + 'users/change-password', formData, function (response) {
                if (response.status === 'success') {
                    window.location.href = pageurl.'login';
                } else if (response.status === 'error') {
                    //$('#' + response.field + '-error').text(response.msg).show();
                }
            }, 'json');
            return false;
        }
    });

    $(function () {
        $("#change_password").validate({

            rules: {
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
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
            }

        });


    });

</script>
<style>

    #change_password {
        /*        width: 1200px;*/
    }
    .reg-frm-group{
        position: relative;
    }
    #change_password label.error {
        width: auto;
        display: inline;
        color:red;
        position: absolute;
        left:0;
        bottom: -25px;
        font-size: 12px;
        width: 100%;
        text-align: right;
    }
#search-results-body {
    margin: 50px 0 60px;
}
.psddd{
    width: 45%;
}

</style>
<section id="header-section" class="main-yellow-bg">
    <?php echo $this->element('frontend/login-header'); ?>
    <div class="clear"></div>
</section>


<section id="search-results-body">
    <div class="container psddd">
        <div class="">
            <div class="">
                <div class="right_histry_head m_btm_20">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="active">What's your new password?</h3>
                        </div>
                    </div>
                </div>

                <div class="bg_white right_pro">
                    <?php echo $this->Form->create('changepassword', array('id' => 'change_password', 'data-toggle' => "validator")) ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Choose new password</label>
                                <!--<input type="text" name="" class="form-control" placeholder="Enter Your Old Password">-->
                                <?php echo $this->Form->input('password', array('class' => "form-control", 'type' => 'password', 'label' => false, 'div' => false, 'id' => "password")); ?>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm new password<span>*</span></label>
                                <?php echo $this->Form->input('confirm_password', array('class' => "form-control", 'type' => 'password', 'label' => false, 'div' => false, 'id' => "confirm_password")); ?>
                                <?php echo $this->Form->input('uniq', array('type' => 'hidden', 'label' => false, 'div' => false, 'id' => "confirm_password", 'value' => $uniq)); ?>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo $this->Form->submit('Change Password', ['type' => 'submit', 'class' => "btn btn-primary btn-change hvr-grow"]) ?>
                                <!--<input type="submit" class="btn btn-primary btn-change hvr-grow" name="" value="Change Password">-->
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->end(); ?>

                </div>
            </div>
            <!-- ROW -->


        </div>
        <!-- END OF THE BOX AND SINGLE ROW -->
    </div>
</section>
<!--<?php // echo $this->element('frontend/footer'); ?>-->