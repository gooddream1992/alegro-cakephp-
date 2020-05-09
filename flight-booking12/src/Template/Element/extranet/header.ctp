<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
?>
<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/modals.css" type="text/css">

<style type="text/css">
            .modal-body{ padding-bottom: 0;}
            .modal-confirm {
                color: #636363;
                width: 560px;
            }
            .modal-confirm .modal-content {
                padding: 20px;
                border-radius: 5px;
                border: none;
            }
            .modal-confirm .modal-header {
                border-bottom: none;
                position: relative;
            }
            .modal-confirm h4 {
                text-align: center;
                font-size: 26px;
                margin: 30px 0 -15px;
                width: 100%;
            }
            .modal-confirm .form-control, .modal-confirm .btn {
                min-height: 40px;
                border-radius: 3px;
            }
            .modal-confirm .close {
                position: absolute;
                top: -5px;
                right: -5px;
            }
            .modal-confirm .modal-footer {
                border: none;
                text-align: center;
                border-radius: 5px;
                font-size: 13px;
                display: inline-block;
                padding-top: 0;
            }
            .modal-confirm .icon-box {
                color: #000;
                position: absolute;
                margin: 0 auto;
                left: 0;
                right: 0;
                top: -70px;
                width: 95px;
                height: 95px;
                border-radius: 50%;
                z-index: 9;
                background: #f9d749;
                padding: 15px;
                text-align: center;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
            }
            .modal-confirm .icon-box i {
                font-size: 58px;
                position: relative;
                top: 3px;
            }
            .modal-confirm.modal-dialog {
                margin-top: 80px;
            }
            .modal-confirm .btn {
                color: #000;
                border-radius: 4px;
                background: #f9d749;
                text-decoration: none;
                transition: all 0.4s;
                line-height: normal;
                border: none;
                width: 85px;
                float: none;
                display: inline-block;
            }
            .modal-confirm .btn:hover, .modal-confirm .btn:focus {
                background: #f9d749;
                outline: none;
            }
            .trigger-btn {
                display: inline-block;
                margin: 100px auto;
            }
            .modal-open{
                overflow: hidden;
            }
            .modal-open .modal {
                background: rgba(0,0,0,0.70);

            }
            label{
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif !important;
            }
        </style>
<?php echo $this->element('frontend/header-extranet'); ?>

<style>

    #first_name-error.error{font-size: 10px;color:red;float:right;}
    #email-error.error{font-size: 10px;color:red;float:right;}
    #phone-error.error{font-size: 10px;color:red;float:right;}
    #surname-error.error{font-size: 10px;color:red;float:right;}
    #password-error.error{font-size: 10px;color:red;float:right;}
    #re_confirm_password-error.error{font-size: 10px;color:red;float:right;}
    #customCheck1-error.error{font-size: 10px;color:red;float:right;margin-top:15px;}
    .message.error{  
        background: #e24b39;
        padding: 10px;
        margin-top: 12px;
        color: #fff;
        font-weight: 500;
        letter-spacing: 1px;}
    #password-error.error{margin-top:-26px;}

</style>

<div class="modal fade bd-example-modal-lg" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                </span>
            </button>

            <div class="row">
                <div class="col-md-6 modal-left">
                    <div class="modal-title text-center">
                        <?php echo __('Log In'); ?>
                    </div>
                    <div class="modal-subtitle text-center">
                        <?php echo __('Get New Information'); ?>
                    </div>
                    <div class="alert alert-danger sign-errr" style="display: none;"></div>
                    <div class="alert alert-success sign-succcc" style="display: none;"></div>
                    <div id="error_msg_login"></div>
                    <?php echo $this->Form->create("User", array('class' => "login-form", 'id' => "loginform", 'data-toggle' => "validator", 'url' => ['action' => '/login'])) ?>

                    <?= $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'userLogin', 'class' => "modal-content animate"]); ?>
                    <?= $this->Form->input('email', ['type' => 'email', 'class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email Address', 'label' => 'Email Address', 'required']); ?>


                    <?= $this->Form->input('password', ['type' => 'password', 'class' => 'form-control', 'id' => 'password', 'placeholder' => 'Password', 'label' => "Password", 'required']); ?>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1" style="width: 104px;"><?php echo __('Remember me'); ?></label>
                                <a href="javascript:void(0)" data-dismiss="modal" id="to-recover" data-toggle="modal" data-target="#forgetModal" class="text-dark pull-right" style="float: right;"><i class="fa fa-lock m-r-5"></i> <?php echo __('Forgot pwd?'); ?></a> 
                            </div>     
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary hvr-glow"><?php echo __('Login'); ?></button>
                    <?php echo $this->Form->end(); ?>
                    <br>    

                    <?php if (explode("/", $this->Url->build(null, true))[4] == "fare-details") { ?>
                        <a href="<?= HTTP_ROOT . 'route-review/' . $flight_view_id; ?>" class="btn btn-primary hvr-glow" style="width:100%"><?php echo __('Continue as a Guest'); ?></a> 
                    <?php } ?>
                    <div class="modal-bottom-hint text-center">
                        <?php echo __('No account?'); ?>
                        <a data-dismiss="modal" data-toggle="modal" data-target="#registerModal" href="#"><?php echo __('Create an Alegro account'); ?></a>
                    </div>
                </div>

                <div class="col-md-6 modal-right">
                    <div class="modal-title text-center">
                        <?php echo __('Sign In'); ?>
                    </div>
                    <div class="modal-subtitle text-center">
                        <?php echo __('Log in with one of the social media networks below'); ?>
                    </div>

                    <div class="social-sign-in">
                        <ul class="list-inline color-white">
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-google-plus-g"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="or-split text-center">
                <?php echo __('Or'); ?>
            </div>

        </div>
    </div>
</div>

<div id="loginFailed" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xe14c;</i>
                </div>				
                <h4 class="modal-title"><?php echo __('Login Failed!'); ?></h4>	
            </div>
            <div class="modal-body">
                <p class="text-center"><?php echo __('Your credentials are not correct. Double-check either your password or e-mail address before trying again.'); ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                </span>
            </button>

            <div>
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
                <div id="create-imgcontainer" class="imgcontainer"></div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <?php echo $this->Form->create("User", array('class' => "form-horizontal", 'id' => "registerform", 'data-toggle' => "validator", 'novalidate' => "false")) ?>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label><?php echo __('First Name'); ?></label>
                                <input class="form-control" type="text" name="fname"  id="first_name" required="" placeholder="<?php echo __('First Name'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label><?php echo __('Last Name'); ?></label>
                                <input type="text"  name='lname' id='surname' class="form-control" placeholder="<?php echo __('Last Name'); ?>">
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
                            <div class="col-md-6 register-button">
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

            <div>
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
                            <?php echo $this->Form->create("User", array('class' => "register-form", 'id' => "forgetFrm", 'data-toggle' => "validator", 'novalidate' => "false")) ?>

                            <div class="form-row">

                                <div id="msg-success"  style="    color: green;
                                     font-size: 15px;"></div>
                                  
                                <div class="col-md-12">
                                       <div class="forgot">
                                    <label><?php echo __('Email'); ?></label>
                                    <input type="email" id="emailx" class="form-control" required="required" placeholder="<?php echo __('Email'); ?>">
                                    <div class="form-row justify-content-center">
                                        <button type="button" class="btn btn-primary hvr-glow" onclick="forgetpassword()"><?php echo __('Submit'); ?></button>
                            </div>
                                </div>
                                </div>

                                <div id="msg-error" style="float:right; font-size:12px; color:red;    text-align: right;width: 100%;"></div>
                            </div>

                            
                       <?=$this->Form->end();?>


                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
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
                url: "<?=HTTP_ROOT;?>" + 'extranets/forget_password',
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



<script>
    $('#loginform').validate({
        submitHandler: function () {
            var formData = $('#loginform').serialize();

            $.post('<?= HTTP_ROOT; ?>' + 'extranets/ajaxLogin', formData, function (response) {
                //alert(response.status);
                if (response.status == "error") {
                    $('.sign-errr').show();
                    $('.sign-errr').html(response.msg);
                    setTimeout(function () {
                        $('.sign-errr').hide();
                    }, 10000);
                }
                if (response.status == "success") {
                    clearForm($('#loginform'));
                    $('.sign-succcc').show();
                    $('.sign-succcc').html(response.msg + "<br>Please wait we are processing your data.");
                    setTimeout(function () {
                        $('.sign-succcc').hide();
                        window.location.href = "<?= HTTP_ROOT; ?>extranets/dashboard"
                    }, 5000);
                }

            }, 'json');
            return false;

        },
        rules: {

            password: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true,
            },

        },
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: {
                required: "Please enter your email address",
            },
        }
    });
</script>


<script>
    var check = 1;
    function clearForm($form) {
        $form.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
        $form.find(':checkbox, :radio').prop('checked', false);
    }
    $('#registerform').validate({
        submitHandler: function () {
            var formData = $('#registerform').serialize();
            $.post('<?= HTTP_ROOT; ?>' + 'extranets/ajaxRegistration', formData, function (response) {
                if (response.status == "error") {
                    $('#create-imgcontainer').append('<div class="alert alert-danger" id="fail-create">Email Id Already present. Use anyother email.</div>');
                    setTimeout(function () {
                        $('#fail-create').hide();
                    }, 10000);
                }
                if (response.status == "success") {
                    clearForm($('#registerform'));
                    $('#create-imgcontainer').append('<div class="alert alert-success" id="suc-create">Account Created Successfully.<br> Wait 10sec we are validating your request.</div>');
                    setTimeout(function () {
                        $('#suc-create').hide();
                        location.reload(true);
                    }, 10000);
                }
            }, 'json');
            return false;

        },
        rules: {
            fname: "required",
            lname: "required",

            password: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true,
                check_email: true
            },
            phone: {
                required:true,
                digits: true,
                minlength: 10
            },
            re_confirm_password: { 
                required:true,
                minlength: 5,
                equalTo: "#password1"
            },

        },
        messages: {
            fname: "Please enter your first name",
            lname: "please enter your last name",
            password: {                
                minlength: "Your password must be at least 5 characters long",
            },
            email: {
                required: "Please enter your email address",
                check_email: "An account already exists with this email address. Please choose an alternative email.",
            },
            re_confirm_password: { 
                minlength: "Confirm password must be at least 5 characters long",
                equalTo: "Confirm Password does not match with Password"
            },
        }
    });

    jQuery(document).ready(function ($) {
        jQuery.validator.addMethod('check_email', function (value, element, param) {
            console.log(checkEmailExist(value));
            return this.optional(element) || !checkEmailExist(value);
        });
    });

    function checkEmailExist(input) {
        var pageurl = '<?= HTTP_ROOT; ?>';
        var lookup = {'email': input, 'type': 4};

        //var img = pageurl + 'img/loader2.gif';
        var email_invalid = false;
        //$("#email_validation_msg").hide();
        //$("#eloader").html("<img src='" + img + "' style='height: 18px;'>").show();
        $.ajax({
            type: 'POST',
            url: pageurl + 'users/ajaxCheckEmailAvail',
            data: JSON.stringify(lookup),

            success: function (response) {
                $('.eerrr').hide();
                var myEle = document.getElementById("email-error");
                if (myEle == null) {
                    $('.eerrr').show();
                    if (check == 1) {
                        if (response.status == 'exits') {
                            $('#mail-div').append("<div class='eerrr'>Email Id Already Exits</div>");
                            $('#email').val('');
                            email_invalid = false;
                        }
                        if (response.status == 'success') {
                            $('#mail-div').append("<div class='eerrr'>Email Id Available</div>");
                            email_invalid = true;
                        }
                    }
                } else {
                    $('.eerrr').hide();
                    if (response.status == 'exits') {
                        $('#email-error').attr('style', 'color:red;');
                        $('#email-error').show();
                        $('#email-error').html("Email Id Already Exits");
                        $('#email').val('');
                        email_invalid = false;
                    }
                    if (response.status == 'success') {
                        $('#email-error').attr('style', 'color:green;');
                        $('#email-error').show();
                        $('#email-error').html("Email Id Available");
                        email_invalid = true;
                    }
                }
                check++;
            },

            dataType: 'json'
        });
        return email_invalid;
    }
</script>
