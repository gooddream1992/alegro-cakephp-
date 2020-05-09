<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo HTTP_ROOT; ?>img/favicon.ico">
        <title> <?php echo!empty($title_for_layout) ? $title_for_layout : SITE_NAME_TEXT; ?> </title>
        <?php echo $this->Html->meta('keywords', (empty($metaKeyword) ? '' : $metaKeyword)); ?>
        <?php echo $this->Html->meta('description', (empty($metaDescription) ? '' : $metaDescription)); ?>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HTTP_ROOT ?>backend/css/login-register-lock.css" rel="stylesheet">
        <link href="<?php echo HTTP_ROOT ?>backend/css/style.min.css" rel="stylesheet">
<!--        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>-->
         <script> var pageurl = '<?php echo HTTP_ROOT ?>'</script>
        <script src="<?php echo HTTP_ROOT ?>backend/js/jquery-3.2.1.min.js"></script>
    </head>
    <body>


        <?= $this->fetch('content') ?>

        <script src="<?php echo HTTP_ROOT ?>backend/js/popper.min.js"></script>
        <script src="<?php echo HTTP_ROOT ?>backend/js/bootstrap.min.js"></script>


 <!--<script src="<?php echo HTTP_ROOT ?>jqvalidations/jquery-migrate-1.0.0.js"></script>-->

        <script type="text/javascript">
            $(function () {
                $(".preloader").fadeOut();
            });
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });

            $('#to-recover').on("click", function () {
                $("#loginform").slideUp();
                $("#recoverform").fadeIn();
                $("#registerform").slideUp();
            });


            $('#signup').on("click", function () {
                $("#loginform").slideUp();
                $("#recoverform").slideUp();
                $("#registerform").fadeIn();
            });

            $('#login').on("click", function () {
                $("#loginform").fadeIn();
                $("#recoverform").slideUp();
                $("#registerform").slideUp();
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#s').delay(5000).fadeOut('slow');
                $('#e').delay(5000).fadeOut('slow');
            });
        </script>
    </body>
</html>
