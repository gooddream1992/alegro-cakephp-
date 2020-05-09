<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
?>
<header class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="header-top-left">
                    <img src="<?= $this->Url->image('extranet/header-logo.png'); ?>">
                </div>	
                <div class="header-top-right">
                    <ul>
                        <li>
                            <a href="javascript:void(0);" onclick="menudrop()"><img src="<?= $this->Url->image('extranet/americanflag.png'); ?>"></a>
                        </li>
                        <li><button onclick="document.getElementById('id01').style.display = 'block';document.getElementById('id02').style.display = 'none';" style="width:auto;">SIGN IN</button></li>

                        <div id="id01" class="modal">

                            <?= $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'userLogin', 'class' => "modal-content animate"]); ?>

                            <div id="sign-div" class="imgcontainer">
                                <span onclick="document.getElementById('id01').style.display = 'none'" class="close" title="Close Modal">&times;</span>
                                <h2>Sign In</h2>
                                <div class="alert alert-danger sign-errr" style="display: none;"></div>
                                <div class="alert alert-success sign-succcc" style="display: none;"></div>
                            </div>
                            <label for="uname">Email</label>
                            <input type="text" placeholder="" name="email" required>

                            <label for="psw">Password</label>
                            <input type="password" placeholder="" name="password" required>

                            <label>
                                <a href="javascript:void(0);">Forgot your password?</a>
                            </label>

                            <button type="submit" class="cancelbtn">Sign In</button>
                            <p>By signing in you acknowledge Alegro's privacy policy.</p>
                            <div class="yet">No account yet?</div>
                            <div class="account" onclick="document.getElementById('id02').style.display = 'block';document.getElementById('id01').style.display = 'none';"><a href="javascript:void(0);">Create account</a></div>
                            <?= $this->Form->end(); ?>
                        </div>

                        <script>
                            $('#userLogin').validate({
                                submitHandler: function () {
                                    var formData = $('#userLogin').serialize();

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
                                            clearForm($('#userLogin'));
                                            $('.sign-succcc').show();
                                            $('.sign-succcc').html(response.msg+"<br>Please wait we are processing your data.");
                                            setTimeout(function () {
                                                $('.sign-succcc').hide();
                                                window.location.href="<?=HTTP_ROOT;?>extranets/profile"
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



                        <li><button onclick="document.getElementById('id02').style.display = 'block';
                                document.getElementById('id01').style.display = 'none';" style="width:auto;">CREATE ACCOUNT</button></li>
                        <div id="id02" class="modal">

                            <?= $this->Form->create('', ['data-toggle' => "validator", 'novalidate' => "true", 'id' => 'userRegi', 'class' => "modal-content2  animate"]); ?>
                            <div id="create-imgcontainer" class="imgcontainer">
                                <span onclick="document.getElementById('id02').style.display = 'none';" class="close" title="Close Modal">&times;</span>
                                <h2>Create Account</h2>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="uname">First name</label>
                                    <input type="text" placeholder="" name="fname" required>
                                </div>

                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="uname">Last Name</label>
                                    <input type="text" placeholder="" name="lname" required>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6" id="mail-div">
                                    <label for="uname">Email</label>
                                    <input type="text" placeholder="" name="email" required>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="psw">Password</label>
                                    <input type="password" placeholder="" name="pwd" required>
                                </div>
                            </div>
                            <button type="submit" class="cancelbtn">Create account</button>
                            <p>By signing up, you agree to Alegro's privacy policy.</p>
                            <div class="yet">Already have an Alegro account?</div>
                            <div class="account" onclick="document.getElementById('id01').style.display = 'block';document.getElementById('id02').style.display = 'none';"><a href="javascript:void(0);">Sign In</a></div>
                            <?= $this->Form->end(); ?>
                        </div>


                    </ul>
                </div>	
            </div>
        </div>
    </div>	
</header>

<script>
    var check = 1;
    function clearForm($form) {
        $form.find(':input').not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
        $form.find(':checkbox, :radio').prop('checked', false);
    }
    $('#userRegi').validate({
        submitHandler: function () {
            var formData = $('#userRegi').serialize();

            $.post('<?= HTTP_ROOT; ?>' + 'extranets/ajaxRegistration', formData, function (response) {
                //console.log(response);
                if (response.status == "error") {
                    $('#create-imgcontainer').append('<div class="alert alert-danger" id="fail-create">Email Id Already present. Use anyother email.</div>');
                    setTimeout(function () {
                        $('#fail-create').hide();
                    }, 10000);
                }
                if (response.status == "success") {
                    clearForm($('#userRegi'));
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
            lurname: "required",

            pwd: {
                required: true,
                minlength: 5
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
            pwd: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            email: {
                required: "Please enter your email address",
                check_email: "An account already exists with this email address. Please choose an alternative email."
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
        var lookup = {'email': input,'type':4};

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