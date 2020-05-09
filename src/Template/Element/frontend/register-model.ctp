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
                    <div class="col-md-5">
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
                                <input class="form-control" type="text" name="first_name"  id="first_name" required="" placeholder="<?php echo __('First Name'); ?>">
                            </div>
                            <div class="col-md-6">
                                <label><?php echo __('Last Name'); ?></label>
                                <input type="text"  name='surname' id='surname' class="form-control" placeholder="<?php echo __('Last Name'); ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label><?php echo __('Email Address'); ?></label>
                                <input class="form-control" type="text" required="" id='email12' autocomplete="off" name="email" placeholder="<?php echo __('Email Address'); ?>">
                            </div>
                        <div class="col-md-6">
                                <label><?php echo __('Password'); ?></label>
                                <input class="form-control" type="password" id="password1" name='password' required="" placeholder="<?php echo __('Password'); ?>">
                            </div>
                        </div>
                        <div class="form-row">
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

                <div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="modal-title text-center">
                                <br>  <?php echo __('Forgotten Password'); ?>
                            </div>
                            <div class="modal-subtitle text-center">
                                <?php echo __('Please, enter your email to recover your password.'); ?>.
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <?php echo $this->Form->create("User", array('class' => "register-form", 'id' => "forgetFrm", 'data-toggle' => "validator", 'novalidate' => "false")) ?>

                            <div class="form-row">

                                <div id="msg-success"  style="    color: green;
                                     font-size: 15px;"></div>

                                <div id="msg-error" style="font-size: 15px;margin: 0px 0px -23px 342px;color:red;text-align: center;width: 100%;"></div>

                                <div class="col-md-12">
                                    <div class="forgot">
                                        <label><?php echo __('Email Address'); ?></label>
                                        <input type="email" id="emailx" class="form-control" required="required" placeholder="<?php echo __('Email Address'); ?>">
                                        <div class="form-row justify-content-center">
                                            <button type="button" class="btn btn-primary hvr-glow" onclick="forgetpassword()" style="margin: 23px 0px 0px 0px;width: 143px !important;"><?php echo __('Submit'); ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <?= $this->Form->end(); ?>


                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

<script>
document.getElementById("email12").value='';
document.getElementById("email").value='';


        function resetForm() {
document. getElementById("registerform"). reset();
document. getElementById("loginform"). reset();
}
    $(function () {
        resetForm();
        $("#registerform").trigger("reset");
        $("#loginform").trigger("reset");
        $("#email").val("");
        $("input[type=email]").val("");

        
        $("#registerform").validate({
            submitHandler: function () {
                var formData = $('#registerform').serialize();
                jQuery.post(pageurl + 'users/ajax_registration', formData, function (response) {
                    if (response.status == "error") {
                        //alert("hello");
                        //$("#email_e").modal();
                        $('#email_e').modal('show');                        
                        setTimeout(function () {
                            $('#fail-create').hide();
                        }, 10000);
                    }
                    if (response.status == "success") {
                        setTimeout(function () {
                            $('#suc-create').hide();
                            window.location.href = response.url;
                        }, 100);
                    }
                }, 'json');
                return false;
            },            
            rules: {
                first_name: "required",
                surname: "required",
                
                password: {
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
      
    });
    jQuery(document).ready(function ($) {
        jQuery.validator.addMethod('check_email', function (value, element, param) {
            return this.optional(element) || !checkEmailExist(value);
        });
    });
    function checkEmailExist(input) {
        var pageurl = '<?= HTTP_ROOT; ?>';
        var lookup = {'email': input, 'type':2 /*4*/};
        var email_invalid = false;
        var check = 1;
        $.ajax({
            type: 'POST',
            url: pageurl + 'users/ajaxCheckEmailAvail',
            data: JSON.stringify(lookup),

            success: function (response) {
                $('.eerrr').hide();
                 if (response.status == 'exits') {
                            //alert("hello");
                            $('#email').val('');
                            $('#email_e').modal('show');
                            email_invalid = false;
                        }
                        if (response.status == 'success') {
                            email_invalid = true;
                        }
//                var myEle = document.getElementById("email-error");
//                if (myEle == null) {
//                    $('.eerrr').show();
//                    if (check == 1) {
//                        if (response.status == 'exits') {
//                            //alert("hello");
//                            $('#email').val('');
//                            $("#email_e").modal();
//                           // $('#email_e').modal('show');
//                            email_invalid = false;
//                        }
//                        if (response.status == 'success') {
//                            email_invalid = true;
//                        }
//                    }
//                } else {
//                    $('.eerrr').hide();
//                    if (response.status == 'exits') {
//                        //alert("hello");
//                        $("#email_e").modal();
//                        //$('#email_e').modal('show');
//                        $('#email').val('');
//                        email_invalid = false;
//                    }
//                    if (response.status == 'success') {
//                        email_invalid = true;
//                    }
//                }
                check++;
            },

            dataType: 'json'
        });
        return email_invalid;
    }

</script>
<script>
    function forgetpassword()
    {
        $('#data').attr("style", "display:block");
        var email = $('#emailx').val();
        if (email == "") {
            $('#msg-error').html("Enter Email Address");
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
<div id="email_e" class="modal fade">
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
                <p class="text-center"><?php echo __('A link to reset your password has been sent to your registered email address. Please, click on the generated link on your email and choose your new password.'); ?>
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
                <p class="text-center"><?php echo __('This email address is not associated with our database. Please, confirm your email address and request again.'); ?></p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success btn-block" data-dismiss="modal"><?php echo __('OK'); ?></button>
            </div>
        </div>
    </div>
</div>