<style>
    label {
        margin-bottom: 0px !important ;
    }
    .form-control {
     margin-top: 0px !important ;
    }
 </style>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery.validate.js"></script>
<?= $this->element('frontend/banner'); ?>
<section id="cta" data-slides='["<?php echo HTTP_ROOT ?>img/cta_bg1.jpg", "<?php echo HTTP_ROOT ?>img/cta_bg2.jpg", "<?php echo HTTP_ROOT ?>img/cta_bg3.jpg"]'>
    <div class="bg-overlay"></div>

    <?php echo $this->element('frontend/header'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="main-cta text-center">
                    <h1><?php echo __('Still have questions?');?></h1>
                    <h3><?php echo __('FILL IN THE FORM');?></h3>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col">
                <?php echo $this->Form->create(null, ['url' => ['action' => 'contactUs'], 'class' => 'contact-form', 'data-toggle' => "validator", 'novalidate' => "true", 'id' => 'personalInfofrmIdss']); ?>

                <div class="form-row">
                    <div class="col">
                        <label><?php echo __('Name');?></label>
                        <input type="text" name='firstName' equired = 'required' class="form-control" placeholder="<?php echo __('First and Last');?>">
                        <div class="err_fn" style="display:none; color:red; font-size:12px;"></div>
                    </div>
                    <div class="col">
                        <label><?php echo __('Phone Number');?></label>
                        <input type="text" name='phoneNo' class="form-control" equired = 'required' placeholder="<?php echo __('Phone Number');?>">
                        <div class="err_ph" style="display:none; color:red; font-size:12px;"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label><?php echo __('Email Address');?></label>
                        <input name="emailAddress" type="email" class="form-control" equired = 'required' placeholder="<?php echo __('Email Address');?>">
                        <div class="err_el" style="display:none; color:red; font-size:12px;"></div>
                    </div>
                    <div class="col">
                        <label><?php echo __('Question Type');?></label>
                        <select class="form-control" id='subject' equired = 'required' name="subject">
                            <option value="" selected><?php echo __('Question Type');?></option>
                            <option value='Question'><?php echo __('Question');?></option>
                            <option value='Request'><?php echo __('Request');?></option>
                            <option value='Extranet'><?php echo __('Extranet');?></option>
                            <option value='Other'><?php echo __('Other');?></option>
                        </select>
                        <div class="err_sub" style="display:none; color:red; font-size:12px;"></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label><?php echo __('Message');?></label>
                        <textarea class="form-control" name='message' id="message" required = 'required' placeholder="<?php echo __('Write your message here...');?>" rows="10"></textarea>
                        <div class="err_msg" style="display:none; color:red; font-size:12px;position: relative;top: -40px;"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col">
                        <div style="width: 100%;">
                            <div class="g-recaptcha" data-sitekey="6Lcx91YUAAAAAKNZMU1bnKO334sLab5cRTMtdKE0"></div>
                        </div>
                    </div>
                </div>

                <div class="form-row justify-content-center">
                    <div class="col-md-4 col-sm-6">
                        <input type="submit" class="hvr-grow btn btn-send" value="<?php echo __('Submit');?>" onclick='return validatedata()'/>
                    </div>
                </div>

                <?php echo $this->Form->end(); ?>
            </div>
        </div>

    </div>

</section>

<section id="contact-infos">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-sm-4 text-center contact-infos-box">
                <div class="row">
                    <div class="col">
                        <div class="contact-infos-icon">
                            <span class="fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x" style="color:#f9d749;"></i>
                                <i class="fas fa-phone fa-stack-1x fa-inverse" style="color:white;"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?php echo __('(+244) 923 480 978');?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 text-center contact-infos-box">
                <div class="row">
                    <div class="col">
                        <div class="contact-infos-icon">
                            <span class="fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x" style="color:#f9d749;"></i>
                                <i class="fas far fa-envelope fa-stack-1x fa-inverse" style="color:white;"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?php echo __('geral@alegro.co.ao');?>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 text-center contact-infos-box">
                <div class="row">
                    <div class="col">
                        <div class="contact-infos-icon">
                            <span class="fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x" style="color:#f9d749;"></i>
                                <i class="fas far fa-map-marker-alt fa-stack-1x fa-inverse" style="color:white;"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?php echo __('Rua Rey Katyavala, nº 126, 7ºD');?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>






<section>
    <?php echo $map->code; ?>

</section>



<?= $this->element('frontend/footer'); ?>









<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
<script>
    function validatedata(){
        var name = $("input[name=firstName]").val();
        if(name == ""){
            $('.err_fn').show();
            $('.err_fn').html("Please enter your first name");
            return false;
        }if(name != ""){ $('.err_fn').hide();}
        
        var phone = $("input[name=phoneNo]").val();
        if(phone == ""){
            $('.err_ph').show();
            $('.err_ph').html("Please enter your mobile number");
            return false;
        }if(phone != ""){ $('.err_ph').hide();}
        if ($.trim(phone).length > 0) {
              var phone = phone.replace(/[^0-9]/g,'');
                    if (phone.length != 10){
                        $('.err_ph').show(''); 
                        $('.err_ph').html("Please enter your 10 digit numbers");
                        return false;
                    }
                }$('.err_ph').hide('');
        var eml = $("input[name=emailAddress]").val();
        if(eml == ""){
            $('.err_el').show();
            $('.err_el').html("Please enter your email address");
            return false;
        }if(eml != ""){ $('.err_el').hide();}
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if ($.trim(eml).length > 0) {
                      if (filter.test(eml)) {
                        $('.err_el').hide();
                  //return true;
                    }
                    else {
                        $('.err_el').show();
                        $('.err_el').text("Please enter your valid email address.");
                  return false;
                    }
                }
        var subject = $( "#subject option:selected" ).text().trim();
                    if(subject == "Question type"){
                        $('.err_sub').show();
                        $('.err_sub').html("Please select your subject");
                        return false;
                    }if(subject != "Question type"){
                        $('.err_sub').hide();
                    }
        var msg = $("[name=message]").val();
        if(msg == ""){
            $('.err_msg').show();
            $('.err_msg').html("Please enter your message");
            return false;
        }if(msg != ""){ $('.err_msg').hide();}        
        
    }
    $(function () {
        $("#personalInfofrmIdssxxxx").validate({
            ignore: [],
            onkeyup: function (element) {
                if (element.name == 'email') {
                    return false;
                }
            },
            rules: {
                firstName: "required",
                lastName: "required",
                phoneNo: "required",
                emailAddress: "required",
                subject: "required",
                message: "required",
                emailAddress: {
                    required: true,
                    email: true,
                },
            },
            messages: {
                firstName: "Please enter your first name",
                lastName: "Please enter your last name",
                phoneNo: "Please enter your mobile number",
                emailAddress: {
                    required: "Please enter your email address",
                    email: "Please enter your valid email address",
                },
                subject: "Please enter your subject",
                message: "Please enter your message",
            }
        });
        $('#phoneNo').keypress(function (event) {
            var keycode = event.which;//var x=event.keyCode;
            if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || keycode == 43 || (keycode >= 48 && keycode <= 57)))) {
                event.preventDefault();//stops the default action of an element from happening.
            }
        });

    });
</script>