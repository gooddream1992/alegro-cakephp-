
<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo!empty($pageDetails->meta_title) ? __($pageDetails->meta_title) : __(SITE_NAME); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $this->Html->meta('keywords', (empty($pageDetails->meta_keyword) ? '' : __($pageDetails->meta_keyword))); ?>
        <?php echo $this->Html->meta('description', (empty($pageDetails->meta_desc) ? '' : __($pageDetails->meta_desc))); ?>
        <?php echo $this->Html->meta('Author', 'Alegro'); ?>

        <link rel="icon" href="<?php echo HTTP_ROOT . 'img/favicon.png' ?>" sizes="25x25" type="image/png">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/bootstrap.min.css" type="text/css" >
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/style.css" type="text/css">
           <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/custom.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>vendor/nice-select/css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/responsive.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/modals.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/hover-min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/waterwheel-carousel.css" type="text/css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>route/css/style.css">
        <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>dist/css/datepicker.min.css" type="text/css">
        <link href="<?php echo HTTP_ROOT ?>css/error-message.css" rel="stylesheet" type="text/css" />

        <!-- <script type="text/javascript" src="<?php echo HTTP_ROOT ?>js/jquery-2.1.4.min.js"></script>-->
        <script src="<?php echo HTTP_ROOT ?>js/jquery-3.3.1.min.js" ></script>

        <script src="<?php echo HTTP_ROOT ?>dist/js/datepicker.js"></script>
        <script src="<?php echo HTTP_ROOT ?>dist/js/i18n/datepicker.en.js"></script>

        <script> var pageurl = "<?php echo HTTP_ROOT ?>"</script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


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
    </head>
    <body id="<?php if ($this->request->params['action'] == 'privacyPolicy') { ?>our-privacy<?php } elseif ($this->request->params['action'] == 'cookiesPolicy') { ?>our-privacy<?php } elseif ($this->request->params['action'] == 'termsCondition') { ?>our-privacy<?php } elseif ($this->request->params['action'] == 'faq') { ?>our-privacy<?php
    } else {
        echo 'booking-page';
    }
    ?>"onclick="hideDivBox()">
              <?= $this->Flash->render() ?>
              <?= $this->fetch('content'); ?>
              <?= $this->element('frontend/sign-in-model'); ?>
              <?= $this->element('frontend/register-model'); ?>
              <?= $this->element('frontend/privacy-policy-model'); ?>
<?= $this->element('frontend/cookies-policy-model'); ?>
<?= $this->element('frontend/terms-of-usel-model'); ?>











        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="<?php echo HTTP_ROOT ?>js/jquery.touchSwipe.min.js" ></script>
        <script src="<?php echo HTTP_ROOT ?>js/TweenMax.min.js"></script>
        <script src="<?php echo HTTP_ROOT ?>js/popper.min.js" ></script>
        <script src="<?php echo HTTP_ROOT ?>js/bootstrap.min.js" ></script>
        <script src="<?php echo HTTP_ROOT ?>js/slideshow.js"></script>
        <script src="<?php echo HTTP_ROOT ?>js/jquery.waterwheelCarousel.min.js"></script>
        <script src="<?php echo HTTP_ROOT ?>js/passenger-selector.js"></script>
        
        <script>
            $(document).ready(function () {
                $('#s').delay(5000).fadeOut('slow');
                $('#e').delay(5000).fadeOut('slow');
            });
        </script>
        <script src="<?php echo HTTP_ROOT ?>jqvalidations/lib/jquery.js"></script>
        <script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery.validate.js"></script>
        <script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery-migrate-1.0.0.js"></script>
        
        <script src="<?php echo HTTP_ROOT ?>vendor/nice-select/js/jquery.nice-select.js"></script>
        <!--        <script>
                    // Smooth scroll
                    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                        anchor.addEventListener('click', function (e) {
                            e.preventDefault();
        
                            document.querySelector(this.getAttribute('href')).scrollIntoView({
                                behavior: 'smooth'
                            });
                        });
                    });
                </script>-->
        <!-- onclick tab home -->
        <script type="text/javascript">
            $(".hometab").click(function () {
                $(".hometab").removeClass("active");
                $(this).addClass("active");
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                 $('select').niceSelect();
            });
        </script>

        <script type="text/javascript">
            $(".psngrsHow").click(function () {
                $(".audultSHow").removeClass("hidden");
                $(".audultSHow").addClass("audultSHowClick");
                // this attribute
                $(".psngrsHow").attr("data-id", 0);
                $(".plusBtn").attr("data-butn", 0);
                $(".box5_img_h").addClass("hidden");
            });
            $(".airlinehide").click(function () {
                //alert('helo');
                $(".audultSHow").removeClass("audultSHowClick");
                $(".audultSHow").addClass("hidden");
                $(".psngrsHow").attr("data-id", 1);
            });
            function hideDivBox() {

                var id = $(".psngrsHow").attr("data-id");
                var openid = $(".plusBtn").attr("data-butn");
                if (id == 1) {
                    //alert('yes');
                    $(".plusBtn").attr("data-butn", 0);
                    if (openid == 1 && id == 1) {
                    } else {
                        $(".audultSHow").removeClass("audultSHowClick");
                        $(".audultSHow").addClass("hidden");
                        $(".plusBtn").attr("data-butn", 0);
                        $(".box5_img_h").removeClass("hidden");
                    }
                } else {
                    $(".psngrsHow").attr("data-id", 1);

                }

            }
            function showthis() {
                $(".plusBtn").attr("data-butn", 1);
            }
            function getClose(id) {
                $('#' + id).hide();

            }
            function getCloseId(id) {
                $('#' + id).hide();
                $('#loginModal').modal('show');
            }
        </script>



        <div id="accountnot-created" class="modal">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xe14c;</i>
                        </div>
                        <h4 class="modal-title">Account Not Found!</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">We couldn´t find this e-mail address in our records. Please, feel free to create an account with this e-mail address.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-block" onclick='getClose("accountnot-created")' >OK</button>
                    </div>
                </div>
            </div>
        </div>


        <div id="accountnot-error_per" class="modal fade">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xe899;</i>
                        </div>
                        <h4 class="modal-title">Account Unconfirmed!</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Your account has not been confirmed yet. Please, check your inbox to activate your account.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-block" data-dismiss="modal" style="width: auto;">Resend Verification Email</button>
                    </div>
                </div>
            </div>
        </div>
        <style type="text/css">
            #account-already-exists{
                background-color: rgba(0, 0, 0, 0.4);
            }
        </style>

        <div id="account-already-exists" class="modal" >
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xe14c;</i>
                        </div>
                        <h4 class="modal-title">Account Already Exists!</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">We have noticed that you´re trying to use an e-mail address that is already in use. Please, feel free to create an account using a different e-mail address.</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-block" onclick='getClose("account-already-exists")'>OK</button>
                    </div>
                </div>
            </div>
        </div>

        <div id="imageUploading" class="modal">
            <div class="modal-dialog modal-confirm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xe14c;</i>
                        </div>
                        <h4 class="modal-title">Image Error!</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">We only support images that have the following formats: .jpeg, .jpg, .png and .gif</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
