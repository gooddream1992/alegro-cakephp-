  
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

            <div class="container">
                <div class="row">
                    <div class="col-md-6 modal-left">
                        <div class="modal-title text-center">
                             <?php echo __('Log In'); ?>
                        </div>
                        <div class="modal-subtitle text-center">
                            <?php echo __('Get New Information'); ?>
                        </div>
                        <div id="error_msg_login"></div>
                        <?php echo $this->Form->create("User", array('class' => "login-form", 'id' => "loginform", 'data-toggle' => "validator", 'url' => ['action' => '/login'])) ?>
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

                        <?php if(explode("/",$this->Url->build(null,true))[4] == "fare-details"){ ?>
                        <a href="<?=HTTP_ROOT.'route-review/'. $flight_view_id;?>" class="btn btn-primary hvr-glow" style="width:100%"><?php echo __('Continue as a Guest'); ?></a> 
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




<script>

//    jQuery.validator.setDefaults({
//        submitHandler: function () {
//            var formData = $('#loginform').serialize();
//
//            jQuery.post(pageurl + 'users/ajax_login', formData, function (response) {
//                if (response.status === 'success') {
//                    window.location.href = response.url;
//                } else if (response.status === 'error') {
//                    $('#error_msg_login').html(response.msg).show();
//                }
//            }, 'json');
//            return false;
//        }
//    });

    $(function () {
        $('#loginform button.hvr-glow').click(function () {
           
            $("#loginform").validate({
                submitHandler: function () {
                    var formData = $('#loginform').serialize();

                    $.post(pageurl + 'users/ajax_login', formData, function (response) {
                        if (response.status === 'success') {
                            window.location.href = response.url;
                        } else if (response.status === 'error') {
                            $('#loginFailed').modal('show');
                        }else if(response.status ==='error_per'){
                             $('#accountnot-error_per').modal('show');
                        } else if (response.status === 'errorLogin') {
                            $('#accountnot-created').show();
                        }
                    }, 'json');
                    return false;
                },
                ignore: [],
                onkeyup: function (element) {
                    if (element.name == 'email') {
                        return false;
                    }
                },
                rules: {
                    email: "required",

                    password: {
                        required: true,

                    },
                    re_confirm_password: {
                        required: true,

                    },
                    email: {
                        required: true,
                        email: true,

                    },

                },
                messages: {
                    password: {
                        required: "Please provide a password",

                    },

                    email: {
                        required: "Please enter your email address",
                    },

                }
            });

        });

//        $("#loginform").validate({
//            ignore: [],
//            onkeyup: function (element) {
//                if (element.name == 'email') {
//                    return false;
//                }
//            },
//            rules: {
//                email: "required",
//
//                password: {
//                    required: true,
//
//                },
//                re_confirm_password: {
//                    required: true,
//
//                },
//                email: {
//                    required: true,
//                    email: true,
//
//                },
//
//            },
//            messages: {
//                password: {
//                    required: "Please provide a password",
//
//                },
//
//                email: {
//                    required: "Please enter your email address",
//                },
//
//            }
//
//        });


    });






</script>
