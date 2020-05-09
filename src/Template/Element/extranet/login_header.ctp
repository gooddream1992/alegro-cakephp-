<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
$usr_all_det = $this->User->usrdetHelper($this->request->session()->read('Auth.User.id'));
?>

<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/modals.css" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href="<?php echo HTTP_ROOT ?>css/extranet/bootstrap-table.min.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>
<style>
    _::-moz-progress-bar, body:last-child .dropdown {
        overflow: visible !important;
    }
</style>

<header class="tab-page">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light navbar-trans">
            <div class="tab-page-left">
                <a class="navbar-brand" href="<?= HTTP_ROOT; ?>extranets">
                    <img src="<?= $this->Url->image('extranet/header-logo.png'); ?>">
                    <?php if ($paramAction == "dashboard") { ?>

                    <?php } ?>
                </a>
                <div style="margin: 47px 0px -10px 97px;font-size: 12px;color: #000;font-family: 'Montserrat', sans-serif !important;font-weight: bold;">Extranet</div>
            </div>
            <div class="tab-page-right need">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navmenu2" aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse extranet-login-header" id="navmenu2" aria-expanded="false" style="height: 1px;">
                    <ul class="navbar-nav">
                        <?php if ($paramAction != "basicTab" && $paramAction != "location" && $paramAction != "description" && $paramAction != "amenities" && $paramAction != "pricing" && $paramAction != "availability" && $paramAction != "photos" && $paramAction != "profile" && $paramAction != "publish") { ?>
                            <li class="nav-item <?php if ($paramAction == 'index') { ?> active  active1<?php } ?>">
                                <a class="nav-link" onclick="openCity(event, 'Overview')"><?php echo __('OVERVIEW'); ?><span class="sr-only"> (current)</span></a>
                            </li>

                            <li class="nav-item <?php if ($paramAction == 'aboutus') { ?> active active1 <?php } ?>">
                                <a class="nav-link" id="listings-nav" onclick="openCity(event, 'Listings')"><?php echo __('Accommodations'); ?></a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item ">
                                <a class="nav-link" target="_blank" href="<?php echo HTTP_ROOT ?>faq"><?php echo __('NEED HELP?'); ?></a>
                            </li>
                        <?php } ?>
                        <?php if ($this->request->getSession()->read('Auth.User.id')) { ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?php echo HTTP_ROOT . 'profile' ?>" id="profileDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php if (isset($profilePhots->user_detail->profile_photo) && !empty($profilePhots->user_detail->profile_photo)) { ?>
                                        <img  alt="image preview" style='height: 35px;' id="img-previewq" src="<?= HTTP_ROOT . $usr_all_det->profile_photo; ?>" class="navbar-avatar">
                                    <?php } else { ?>
                                        <img  alt="image preview" id="img-previewq" src="<?php echo HTTP_ROOT ?>img/avatar1.jpg" class="navbar-avatar">
                                    <?php } ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="profileDropdownMenuLink">
                                    <a class="dropdown-item" href="<?php echo HTTP_ROOT ?>extranets/basic_tab"><?php echo __('New Property'); ?></a>
                                    <a class="dropdown-item" onclick="openCity(event, 'Profile')"><?php echo __('Profile'); ?></a>
                                    <a class="dropdown-item" href="<?php echo HTTP_ROOT ?>extranets/bookings"><?php echo __('Bookings'); ?></a>

                                    <a class="dropdown-item" href="<?php echo HTTP_ROOT ?>extranets/reviews"><?php echo __('Reviews'); ?></a>
                                    <a class="dropdown-item" href="<?php echo HTTP_ROOT . 'extranets/logout?key=' . rand() ?>"><?php echo __('Logout'); ?></a>
                                </div>
                            </li>

                        <?php } else { ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-user"></i><?php echo __('MY ACCOUNT'); ?></a>
                            </li>
                        <?php } ?>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if (empty($this->request->session()->read("lan"))) {
                                    echo 'PT';
                                } else {
                                    echo $this->request->session()->read("lan");
                                }
                                ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="<?= HTTP_ROOT . 'users/language/PT'; ?>">PT</a>
                                <a class="dropdown-item" href="<?= HTTP_ROOT . 'users/language/EN'; ?>">EN</a>
                                <a class="dropdown-item" href="<?= HTTP_ROOT . 'users/language/FR'; ?>">FR</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>