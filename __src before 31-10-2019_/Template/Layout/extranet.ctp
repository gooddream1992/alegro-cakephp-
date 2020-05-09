<!DOCTYPE html>
<html>
    <head>
        <title>Extranet | Alegro</title>

        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php echo $this->Html->meta('keywords', (empty($pageDetails->meta_keyword) ? '' : __($pageDetails->meta_keyword))); ?>
        <?php echo $this->Html->meta('description', (empty($pageDetails->meta_desc) ? '' : __($pageDetails->meta_desc))); ?>
        <?php echo $this->Html->meta('Author', 'Alegro'); ?>

        <link rel="icon" href="<?php echo HTTP_ROOT . 'img/favicon.png' ?>" sizes="25x25" type="image/png">
        <link rel="stylesheet" type="text/css" href="<?= $this->Url->css('extranet/style.css'); ?>">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">       
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <script src="<?= $this->Url->script('jquery-3.3.1.min.js'); ?>" ></script>
        <script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js'></script>
        <script src='https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js'></script> 
        <script src="<?= HTTP_ROOT; ?>jqvalidations/dist/jquery.validate.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <script type="text/javascript" src="<?= $this->Url->script('extranet/banner-slider.js'); ?>"></script>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>

    </head>
    <body class="skin-red sidebar-mini sidebar-collapse">
        <div class="wrapper">
            <?php
            $currt_Url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            if (!empty($this->request->session()->read('Auth.User.id'))) {
                ?>
                <?php echo $this->element('extranet/login_header'); ?>
            <?php } else { ?>
                <?php echo $this->element('extranet/header'); ?>
            <?php } ?>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
            <?php if (!empty($this->request->session()->read('Auth.User.id'))) { ?>
                <?php echo $this->element('extranet/login_footer'); ?>
            <?php } else { ?>
                <?php echo $this->element('extranet/footer'); ?>
            <?php } ?>




            <div id="accountnot-error_per" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box">
                                <i class="material-icons">&#xe899;</i>
                            </div>
                            <h4 class="modal-title"><?php echo __('Account Unconfirmed!'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center"><?php echo __('Your account has not been confirmed yet. Please, check your inbox to activate your account.'); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success btn-block" onclick='resendVerification()' style="width: auto;"><?php echo __('Resend Verification Link'); ?></button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="resend_mail" class="modal fade">
                <div class="modal-dialog modal-confirm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="icon-box">
                                <i class="material-icons">&#xe899;</i>
                            </div>
                            <h4 class="modal-title"><?php echo __('Verification Link Resent!'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <p class="text-center"><?php echo __('Weve successfully resent a new verification link to your email address'); ?></p>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success btn-block" data-dismiss="modal"  style="width: auto;"><?php echo __('OK'); ?></button>
                        </div>
                    </div>
                </div>
            </div>  
            <?php if (empty($this->request->session()->read('Auth.User.id'))) { ?>
                <script>
                    window.addEventListener('beforeunload', function () {
                        window.location.href="'"+sessionStorage.Url_data+"'";
                    });
                    
                </script>
            <?php } ?>

            <script>
                if (window.performance) {
                    console.info("window.performance works fine on this browser");
                }
                if (performance.navigation.type == 1) {
                    if (sessionStorage.Url_data) {
                    } else {
                        sessionStorage.Url_data = '<?= $currt_Url; ?>';
                    }
                    console.info("This page is reloaded " + sessionStorage.Url_data);
                    window.location.href(sessionStorage.Url_data);
                } else {
                    console.info("This page is not reloaded" + sessionStorage.Url_data);

                }

                $(document).ready(function () {
                    sessionStorage.Url_data = '<?= $currt_Url; ?>';
                    $('.dropdown-toggle').dropdown()
                });
                function resendVerification() {
                    $('#accountnot-error_per').modal('hide');
                    var u_email = $('#email').val();
                    $.ajax({
                        type: 'POST',
                        url: "<?= HTTP_ROOT; ?>" + 'extranets/resend_email_verification',
                        data: {email: u_email},
                        dataType: 'json',
                        success: function (res) {
                            if (res.status == "success") {
                                $('#resend_mail').modal('show');
                            }
                        }
                    });
                }
            </script>
    </body>
</html>
