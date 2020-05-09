<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registered Passengers | Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.4 -->
        <link href="<?php echo HTTP_ROOT ?>backend/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />

        <link href="<?php echo HTTP_ROOT ?>backend/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo HTTP_ROOT ?>backend/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HTTP_ROOT ?>backend/dist/css/custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HTTP_ROOT ?>backend/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo HTTP_ROOT ?>css/error-message.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-red sidebar-mini sidebar-collapse">
        <div class="wrapper">

            <?php echo $this->element('admin_header') ?>
            <?php echo $this->element('admin_sidebar') ?>
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>



            <!-- Content Wrapper. Contains page content -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.0
                </div>
                <strong>Copyright &copy; 2018 <a href="#">Our website Name</a>.</strong> All rights reserved.
            </footer>


        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo HTTP_ROOT ?>backend/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="<?php echo HTTP_ROOT ?>backend/dist/js/redactor.js?r"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo HTTP_ROOT ?>backend/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo HTTP_ROOT ?>backend/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo HTTP_ROOT ?>backend/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <!-- SlimScroll -->
        <script src="<?php echo HTTP_ROOT ?>backend/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='<?php echo HTTP_ROOT ?>backend/plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="<?php echo HTTP_ROOT ?>backend/dist/js/app.min.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        
       
        <script src="<?php echo HTTP_ROOT ?>backend/dist/js/table.min.js?r"></script>
        <script src="<?php echo HTTP_ROOT ?>backend/dist/js/alignment.min.js?r"></script>
        <script src="<?php echo HTTP_ROOT ?>backend/dist/js/counter.min.js?r"></script>
      
        <!-- page script -->
        <script type="text/javascript">
            $(function () {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
          <script>
            var selectorOpts = {
                'standard': {
                    plugins: ['table'],
                    imageUpload: '/ajax/redactor/core/uploadImage/',
                    fileUpload: '/ajax/redactor/core/uploadFile/'
                },
                'air': {
                    plugins: ['table'],
                    air: true,
                    imageUpload: '/ajax/redactor/core/uploadImage/',
                    fileUpload: '/ajax/redactor/core/uploadFile/'
                },
                'text-labeled': {
                    plugins: ['table'],
                    buttonsTextLabeled: true,
                    imageUpload: '/ajax/redactor/core/uploadImage/',
                    fileUpload: '/ajax/redactor/core/uploadFile/'
                },
                'click-to-edit': {
                    plugins: ['table'],
                    clickToEdit: true,
                    clickToSave: {title: 'Save'},
                    clickToCancel: {title: 'Cancel'},
                    imageUpload: '/ajax/redactor/core/uploadImage/',
                    fileUpload: '/ajax/redactor/core/uploadFile/'
                }
            };


            function redactorSelect(type)
            {
                $R('#redactor', 'destroy');
                $R('#redactor', selectorOpts[type]);
            }

            $(function ()
            {
                redactorSelect('standard');

                $('#redactor-selector a').on('click', function (e)
                {
                    e.preventDefault();

                    $('#redactor-selector a').removeClass('active')
                    $(this).addClass('active');

                    redactorSelect($(this).attr('data-type'));
                });
            });
        </script>

    </body>
</html>
