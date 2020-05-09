<style>

    #first_name-error.error{font-size: 10px;color:red;float:right;}
    #email-error.error{font-size: 10px;color:red;float:right;}
    #phone-error.error{font-size: 10px;color:red;float:right;}
    #surname-error.error{font-size: 10px;color:red;float:right;}
    #password1-error.error{font-size: 10px;color:red;float:right;}
    #re_confirm_password-error.error{font-size: 10px;color:red;float:right;}
    #customCheck1-error.error{font-size: 10px;color:red;float:right;margin-top:15px;}
    .message.error{  
        background: #e24b39;
        padding: 10px;
        margin-top: 12px;
        color: #fff;
        font-weight: 500;
        letter-spacing: 1px;}
    .form-control{margin-top:10px;}

    #registerform label{
        margin-top: 10px !important;
    }
    .register-form .form-row {
        margin-top: 0px !important;
    }

</style>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/lib/jquery.js"></script>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery.validate.js"></script>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery-migrate-1.0.0.js"></script>

<div class="modal fade bd-example-modal-lg" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                </span>
            </button>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="modal-title text-center">
                            <?php echo __('Register'); ?>
                        </div>
                        <div class="modal-subtitle text-center">
                            <?php echo __('Lorem ipsum dolor ametconsectetur adipiscing'); ?>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <?php echo $this->Form->create("User", array('class' => "form-horizontal", 'id' => "registerform", 'data-toggle' => "validator", 'novalidate' => "false")) ?>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label><?php echo __('First Name'); ?></label>
                                <input class="form-control" type="text" name="first_name"  id="first_name" required="" placeholder="<?php echo __('First Name'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label><?php echo __('Last Name'); ?></label>
                                <input type="text"  name='surname' id='surname' class="form-control" placeholder="<?php echo __('Last Name'); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label><?php echo __('Phone Number'); ?></label>
                                <input type="text" name='phone' id='phone' class="form-control" placeholder="<?php echo __('Phone Number'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label><?php echo __('Email Address'); ?></label>
                                <input class="form-control" type="text" required="" id='email' name="email" placeholder="<?php echo __('Email Address'); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label><?php echo __('Password'); ?></label>
                                <input class="form-control" type="password" id="password1" name='password' required="" placeholder="<?php echo __('Password'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label><?php echo __('Confirm Password'); ?></label>
                                <input class="form-control" type="password" name="re_confirm_password" id="re_confirm_password" required="" placeholder="<?php echo __('Confirm Password'); ?>">
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary hvr-glow" style="margin-top: 40px;"><?php echo __('register button'); ?></button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>

                        <div class="modal-bottom-hint text-center">
                            <?php echo __('Have an account?'); ?>
                            <a data-dismiss="modal" data-toggle="modal" data-target="#loginModal" href="#"><?php echo __('Sign In'); ?></a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="forgetModal" tabindex="-1" role="dialog" aria-labelledby="forgetModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                </span>
            </button>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="modal-title text-center">
                            <br>  <?php echo __('Forgotten Password'); ?>
                        </div>
                        <div class="modal-subtitle text-center">
                            <?php echo __('Please, enter your email to recover your password'); ?>.
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form class="register-form" id="forgetFrm">

                            <div class="form-row">

                                <div id="msg-success"  style="    color: green;
                                     font-size: 15px;"></div>
                                <div class="col-md-12">
                                    <label><?php echo __('Email'); ?></label>
                                    <input type="email" id="emailx" class="form-control" required="required" placeholder="<?php echo __('Email'); ?>">
                                </div>
                                <div id="msg-error" style="float:right; font-size:12px; color:red;    text-align: right;width: 100%;"></div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-primary hvr-glow" onclick="forgetpassword()"><?php echo __('Submit'); ?></button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
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
                surname: "required",
                phone: "required",

                password1: {
                    required: true,
                    minlength: 5
                },
                re_confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password1"
                },
                email: {
                    required: true,
                    email: true,
                    check_email: true
                },

            },
            messages: {
                first_name: "<?php echo __('Please enter your first name') ?>",
                surname: "<?php echo __('please enter surname'); ?>",
                phone: "<?php echo __('please enter phone'); ?>",
                password1: {
                    required: "<?php echo __('Please provide a password'); ?>",
                    minlength: "<?php echo __('Your password must be at least 5 characters long'); ?>"
                },
                re_confirm_password: {
                    required: "<?php echo __('Please re-enter password'); ?>",
                    equalTo: "<?php echo __('Password does not match') ?>"
                },
                email: {
                    required: "<?php echo __('Please enter your email address'); ?>",
                    check_email: "<?php echo __('An account already exists with this email address. Please choose an alternative email') ?>."
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
        var lookup = {'email': input,'type':2};

        var img = pageurl + 'img/loader2.gif';
        var email_invalid = false;
        $("#email_validation_msg").hide();
        $("#eloader").html("<img src='" + img + "' style='height: 18px;'>").show();
        $.ajax({
            type: 'POST',
            url: pageurl + 'users/ajaxCheckEmailAvail',
            data: JSON.stringify(lookup),

            success: function (response) {
                if (response.status == 'exits') {
                    $('#account-already-exists').show();
                }
            },

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

                success: function (response) {
                    alert("dfd");
                    if (response.status == 'exits') {
                        alert("hji");
                        $('#account-already-exists').show();
                    }
                },

                dataType: 'json'
            });
        }
    }
</script>
<script>
    function forgetpassword()
    {
        $('#data').attr("style", "display:block");
        var email = $('#emailx').val();
        if (email == "") {
            $('#msg-error').html("Please enter email");
            $('#data').attr("style", "display:none");
        } else {
            $.ajax({
                type: 'POST',
                url: pageurl + 'forgot-password',
                data: {email: email},
                dataType: 'json',
                success: function (response) {
                    if (response.status == 'erorr') {
                        //$('#msg-error').html(response.msg);
                        $('#data').attr("style", "display:none");
                        $('#msg-success').html('');
                        $('#passreqfail').modal('show');
                        $('#emailx').val('');

                    }
                    if (response.status == 'successs') {
                        $('#msg-error').html('');
                        $('#data').attr("style", "display:none");
                        // $('#msg-success').html(response.msg);
                        $('#passsuc_').modal('show');
                        $('#emailx').val('');

                    }
                },

            });





        }
    }
</script>

<div id="passsuc_" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div>              
                <h4 class="modal-title"><?php echo __('Your request is on the way!'); ?></h4>   
            </div>
            <div class="modal-body">
                <p class="text-center"><?php echo __('A link to reset your password has been sent to your registered email address. Please, click on the generated link on your email and choose your new password'); ?>.
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal"><?php echo __('OK') ?></button>
            </div>
        </div>
    </div>
</div>  

<div id="passreqfail" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xe14c;</i>
                </div>              
                <h4 class="modal-title"><?php echo __('We´re sorry!'); ?></h4>  
            </div>
            <div class="modal-body">
                <p class="text-center"><?php echo __('This email address is not associated with our database. Please, confirm your email address and request again!'); ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal"><?php echo __('OK'); ?></button>
            </div>
        </div>
    </div>
</div> 