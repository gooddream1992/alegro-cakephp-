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
    .error{
        color:red;
    }

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
                            <?php echo __('Create your alegro account by filling in the boxes below'); ?>
                        </div>
                    </div>
                </div>

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
                            <?php /* ?><div class="col-md-6">
                              <label><?php echo __('Phone Number'); ?></label>
                              <input type="text" name='phone' id='phone' class="form-control" maxlength="11" placeholder="<?php echo __('Phone Number'); ?>">
                              </div><?php */ ?>
                            <div class="col-md-6">
                                <label><?php echo __('Email Address'); ?></label>
                                <input class="form-control" type="text" required="" id='email' name="email" placeholder="<?php echo __('Email Address'); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label><?php echo __('Password'); ?></label>
                                <input class="form-control" type="password" style="margin-top: 0px;" id="password1" name='password' required="" placeholder="<?php echo __('Password'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label><?php echo __('Confirm Password'); ?></label>
                                <input class="form-control" type="password" style="margin-top: 0px;" name="re_confirm_password" id="re_confirm_password" required="" placeholder="<?php echo __('Confirm Password'); ?>">
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
<div id="email_exitss" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fas fa-times"></i>
                </div>				
                <h4 class="modal-title"><?php echo __('Account Already Exists!'); ?></h4>	
            </div>
            <div class="modal-body">
                <p class="text-center"><?php echo __('We have noticed that you´re trying to use an e-mail address that is already in use. Please, feel free to create an account using a different e-mail address.'); ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal"><?php echo __('OK'); ?></button>
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
                    $('#email_exitss').modal('show');
                    setTimeout(function () {
                        $('#fail-create').hide();
                    }, 10000);
                }
                if (response.status == "success") {
                    //clearForm($('#registerform'));
                    //$('#create-imgcontainer').append('<div class="alert alert-success" id="suc-create">Account Created Successfully.<br> Wait 5 sec we are validating your request.</div>');
                    setTimeout(function () {
                        $('#suc-create').hide();
                        window.location.href = response.url;
                    }, 100);
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
                required: true,
                //digits: true,
                minlength: 11,
                maxlength: 11
            },
            re_confirm_password: {
                required: true,
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
            phone: {
                minlength: "Phone no or landline no  must be at least 9 ",
                maxlength: "Phone no or landline no  must be at least 9 ",
                required: "Please enter the Phone no"
            },
        }
    });


    $('#phone').keyup(function () {
        var foo = $(this).val().split(" ").join(""); // remove hyphens
        if (foo.length > 0) {
            foo = foo.match(new RegExp('.{1,3}', 'g')).join(" ");
        }
        $(this).val(foo);
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
//                            $('#mail-div').append("<div class='eerrr'>Email Id Already Exits</div>");
                            $('#email').val('');
                            $('#email_exitss').modal('show');
                            email_invalid = false;
                        }
                        if (response.status == 'success') {
                            //$('#mail-div').append("<div class='eerrr'>Email Id Available</div>");
                            email_invalid = true;
                        }
                    }
                } else {
                    $('.eerrr').hide();
                    if (response.status == 'exits') {
                        $('#email_exitss').modal('show');
//                        $('#email-error').attr('style', 'color:red;');
//                        $('#email-error').show();
//                        $('#email-error').html("Email Id Already Exits");
                        $('#email').val('');
                        email_invalid = false;
                    }
                    if (response.status == 'success') {
//                        $('#email-error').attr('style', 'color:green;');
//                        $('#email-error').show();
//                        $('#email-error').html("Email Id Available");
                        email_invalid = true;
                    }
                }
                check++;
            },

            dataType: 'json'
        });
        return email_invalid;
    }
    function getCloseId(id) {
        $('#' + id).hide();
        $('#loginModal').modal('show');
    }
</script>