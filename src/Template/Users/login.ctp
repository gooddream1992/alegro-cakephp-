<style>
    #registerform{
        display: none;
    }
    #first_name-error.error{font-size: 10px;color:red;float:right;}
    #email-error.error{font-size: 10px;color:red;float:right;}
    #password-error.error{font-size: 10px;color:red;float:right;}
    #confirm_password-error.error{font-size: 10px;color:red;float:right;}
    #customCheck1-error.error{font-size: 10px;color:red;float:right;margin-top:15px;}
    .message.error{  
        background: #e24b39;
        padding: 10px;
        margin-top: 12px;
        color: #fff;
        font-weight: 500;
        letter-spacing: 1px;}


</style>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/lib/jquery.js"></script>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery.validate.js"></script>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery-migrate-1.0.0.js"></script>


<section id="wrapper" class="login-register login-sidebar" style="background-image:url(<?php echo HTTP_ROOT ?>backend/img/plane-bg.jpg);">
    <div class="login-box card">
        <div class="card-body">

            <?php echo $this->Form->create("User", array('class' => "form-horizontal form-material", 'id' => "loginform", 'data-toggle' => "validator")) ?>
            <a href="<?php echo HTTP_ROOT ?>" class="text-center db">
                <img src="<?php echo HTTP_ROOT . 'img/header-logo.png' ?>" width="150"></a>
            <?= $this->Flash->render() ?>
            <div class="form-group m-t-40">
                <div class="col-xs-12">
                    <input class="form-control" type="text" name='email' required="" placeholder="<?php echo __('Email'); ?>">

                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control" type="password" required="" name='password' placeholder="<?php echo __('Password'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1"><?php echo __('Remember me'); ?></label>
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i><?php echo __('Forgot pwd?'); ?></a> 
                    </div>     
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <?= $this->Form->submit('LOGIN', ['type' => 'submit', 'class' => 'btn btn-info btn-lg btn-block text-uppercase btn-rounded']) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                    <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <?php echo __('Don\'t have an account?'); ?> <a  id='signup' href="javascript:;" class="text-primary m-l-5"><b>Sign Up</b></a>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>



            <?php echo $this->Form->create("User", array('class' => "form-horizontal form-material", 'id' => "recoverform", 'data-toggle' => "validator")) ?>
            <div class="form-group ">
                <div class="col-xs-12">
                    <h3><?php echo __('Recover Password'); ?></h3>
                    <p class="text-muted"><?php echo __('Enter your Email and instructions will be sent to you!'); ?></p>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" required="" placeholder="<?php echo __('Email'); ?>">

                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>

            <?php echo $this->Form->create("User", array('class' => "form-horizontal", 'id' => "registerform", 'data-toggle' => "validator", 'novalidate' => "false")) ?>
            <a href="javascript:void(0)" class="text-center db"><img src="<?php echo HTTP_ROOT ?>backend/img/logo-icon.png" alt="Home" /><br/><img src="<?php echo HTTP_ROOT ?>backend/img/logo-text.png" alt="Home" /></a>
            <h3 class="box-title m-t-40 m-b-0"><?php echo __('Register Now'); ?></h3><small><?php echo __('Create your account and enjoy'); ?></small>
            <div class="form-group m-t-20">
                <div class="col-xs-12">
                    <input class="form-control" type="text" name="first_name"  id="first_name" required="" placeholder="<?php echo __('Name'); ?>">
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" required="" id='email' name="email" placeholder="<?php echo __('Email'); ?>">
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="password" id="password" name='password' required="" placeholder="<?php echo __('Password'); ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" required="" placeholder="<?php echo __('Confirm Password'); ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12">

                    <input type="checkbox" name="customCheck1"  id="customCheck1">
                    <label class="" for="customCheck1"><?php echo __('I agree to all'); ?> <a href="javascript:void(0)"><?php echo __('Terms'); ?></a></label> 

                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p><?php echo __('Already have an account?'); ?><a  id="login" href="javascript:;" class="text-info m-l-5"><b>Sign In</b></a></p>
                </div>
            </div>



            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</section>
<script>

    jQuery.validator.setDefaults({
        submitHandler: function () {
            var formData = $('#registerform').serialize();

            jQuery.post(pageurl + 'users/ajax_registration', formData, function (response) {
                if (response.status === 'success') {
                    window.location.href = response.url;
                } else if (response.status === 'error') {
                    //$('#' + response.field + '-error').text(response.msg).show();
                }
            }, 'json');
            return false;
        }
    });

    $(function () {
        $("#registerform").validate({
            ignore: [],
            onkeyup: function (element) {
                if (element.name == 'email') {
                    return false;
                }
            },
            rules: {
                first_name: "required",
                customCheck1: "required",
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true,
                    check_email: true
                },

                topic: {
                    required: "#customCheck1:checked",
                },
                agree: "required"
            },
            messages: {
                first_name: "Please enter your first name",
                customCheck1: "please accept trems and conditions",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please re-enter password",
                    equalTo: "Password does not match"
                },
                email: {
                    required: "Please enter your email address",
                    check_email: "An account already exists with this email address. Please choose an alternative email."
                },

            }

        });

        jQuery(document).ready(function ($) {
            jQuery.validator.addMethod('check_email', function (value, element, param) {
                return this.optional(element) || !checkEmailExist(value);
            });
        });
    });





    function checkEmailExist(input) {
        var pageurl = '<?php echo HTTP_ROOT ?>';
        var lookup = {'email': input};

        var img = pageurl + 'img/loader2.gif';
        var email_invalid = false;
        $("#email_validation_msg").hide();
        $("#eloader").html("<img src='" + img + "' style='height: 18px;'>").show();
        $.ajax({
            type: 'POST',
            url: pageurl + 'users/ajaxCheckEmailAvail',
            data: JSON.stringify(lookup),
            cache: false,
            async: false,
            success: function (response) {
                if (response.status == 'success') {
                    $("#eloader").html('<i class="fa fa-check-circle" style="color:green;" title="' + response.msg + '"></i>');
                } else {
                    $("#eloader").html('<i class="fa fa-ban" style="color:red;" title="' + response.msg + '" ></i>');
                    email_invalid = true;
                }
            },
            contentType: 'application/json',
            dataType: 'json'
        });
        return email_invalid;
    }
    function checkEmailAvail(input) {
        var pageurl = '<?php echo HTTP_ROOT ?>'
        var lookup = {'email': input};

        var img = pageurl + 'img/loader2.gif';
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        $("#email_validation_msg").html('');
        if (input != '' && regex.test(input)) {
            $("#eloader").html("<img src='" + img + "' style='height: 18px; margin-left: 9px; margin-top: -17px;'>");
            $("#eloader").show();
            $.ajax({
                type: 'POST',
                url: pageurl + 'users/ajaxCheckEmailAvail',
                data: JSON.stringify(lookup),
                cache: false,
                success: function (response) {
                    $("#eloader").hide();
                    if (response.status == 'success') {
                        $("#email_validation_msg").html("<span style='color:green;'>" + response.msg + "</span>");
                    } else {
                        $("#email_validation_msg").html("<span style='color:red;'>" + response.msg + "</span>");
                    }
                },
                contentType: 'application/json',
                dataType: 'json'
            });
        }
    }
</script>