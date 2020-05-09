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
        .form-control.error{
        background: url(https://www.suse.com/documentation/suse-manager-3/book_suma_reference_manual_31/graphics/fa-exclamation-circle.png)96% center no-repeat;
    background-size: 20px;}

         .form-control:focus{color: #495057;
    background-color: #fff;
    outline: 0;
    border: 2px solid #c62611;
        background: url(https://www.suse.com/documentation/suse-manager-3/book_suma_reference_manual_31/graphics/fa-exclamation-circle.png)96% center no-repeat;
    background-size: 20px;}


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
                            Register
                        </div>
                        <div class="modal-subtitle text-center">
                            Lorem ipsum dolor ametconsectetur adipiscing
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <?php echo $this->Form->create("User", array('class' => "form-horizontal", 'id' => "registerform", 'data-toggle' => "validator", 'novalidate' => "false")) ?>
                        <div class="form-row">
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="first_name"  id="first_name" required="" placeholder="Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text"  name='surname' id='surname' class="form-control" placeholder="Surname">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <input type="text" name='phone' id='phone' class="form-control" placeholder="Phone Number">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="text" required="" id='email' name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <input class="form-control" type="password" id="password1" name='password' required="" placeholder="Password">
                            </div>
                            <div class="col-md-6">
                                <input class="form-control" type="password" name="re_confirm_password" id="re_confirm_password" required="" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary hvr-glow" style="    margin-top: 40px;
    margin-left: 60px;">Register</button>
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
                    <div class="col-md-6">
                        <div class="modal-title text-center">
                            <br>  Forget Password
                        </div>
                        <div class="modal-subtitle text-center">
                            Please enter your email to reset Password.
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
                                    <input type="email" id="emailx" class="form-control" required="required" placeholder="Email">
                                </div>
                                <div id="msg-error" style="float:right; font-size:12px; color:red;    text-align: right;width: 100%;"></div>
                            </div>

                            <div class="form-row justify-content-center">
                                <div class="col-md-6">

                                    <button type="button" class="btn btn-primary hvr-glow" onclick="forgetpassword()">Request For New Password</button>
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
                first_name: "Please enter your first name <br>hello",
                surname: "please enter surname",
                phone: "please enter phone",
                password1: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                re_confirm_password: {
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
                        $('#msg-error').html(response.msg);
                        $('#data').attr("style", "display:none");
                        $('#msg-success').html('');

                    }
                    if (response.status == 'successs') {
                        $('#msg-error').html('');
                        $('#data').attr("style", "display:none");
                        $('#msg-success').html(response.msg);
                        $('#emailx').val('');
                    }
                },

            });





        }
    }
</script>