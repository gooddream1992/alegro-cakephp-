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



    </head>
    <body class="skin-red sidebar-mini sidebar-collapse">
        <div class="wrapper">
            <?php if (!empty($this->request->session()->read('Auth.User.id'))) { ?>
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




    </body>
</html>
