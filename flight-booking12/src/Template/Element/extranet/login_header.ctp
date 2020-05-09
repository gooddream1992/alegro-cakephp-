<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
$usr_all_det = $this->User->usrdetHelper($this->request->session()->read('Auth.User.id'));

?>

<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/modals.css" type="text/css">

<header class="tab-page">
	<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light navbar-trans">
    <div class="tab-page-left">
    	<a class="navbar-brand" href="<?=HTTP_ROOT;?>extranets">
        <img src="<?= $this->Url->image('extranet/header-logo.png'); ?>">
        <?php if ($paramAction == "dashboard") { ?>

        <?php } ?>
        </a>
        <div style="margin: 0px 0px -10px 95px;font-size: 12px;color: #000;font-family: Helvetica Neue, Helvetica, Arial, sans-serif !important;font-weight: bold;">Extranet</div>
    </div>	
    <div class="tab-page-right need">

        <ul class="navbar-nav">
             <?php if($paramAction != "basicTab" && $paramAction != "location" && $paramAction != "description" && $paramAction != "amenities" && $paramAction != "pricing" && $paramAction != "availability" && $paramAction != "photos" && $paramAction != "profile" && $paramAction != "publish"){ ?>
                    <li class="nav-item <?php if($paramAction=='index'){?> active  active1<?php } ?>">
                        <a class="nav-link" onclick="openCity(event, 'Overview')"><?php echo __('OVERVIEW');?><span class="sr-only"> (current)</span></a>
                    </li>

                    <li class="nav-item <?php if($paramAction=='aboutus'){?> active active1 <?php } ?>">
                        <a class="nav-link" id="listings-nav" onclick="openCity(event, 'Listings')"><?php echo __('Accommodations');?></a>
                    </li>
                    <li class="nav-item <?php if($paramAction=='contactUs'){?> active active1<?php } ?>">
                        <a class="nav-link" onclick="openCity(event, 'Messages')"><?php echo __('MESSAGES'); ?></a>
                    </li>
            <?php }else{ ?>
                <li class="nav-item ">
                        <a class="nav-link"><?php echo __('Need Help?'); ?></a>
                    </li>
            <?php } ?>
                    <?php if ($this->request->getSession()->read('Auth.User.id')) { ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php echo HTTP_ROOT.'profile'?>" id="profileDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <?php
                        if (isset($profilePhots->user_detail->profile_photo) && !empty($profilePhots->user_detail->profile_photo)) { ?>
                            <img  alt="image preview" style='height: 35px;' id="img-previewq" src="<?= HTTP_ROOT  . $usr_all_det->profile_photo; ?>" class="navbar-avatar">
                        <?php } else { ?>
                        <img  alt="image preview" id="img-previewq" src="<?php echo HTTP_ROOT ?>img/avatar1.jpg" class="navbar-avatar">
                        <?php } ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profileDropdownMenuLink">
                            <!-- <a class="dropdown-item" onclick="openCity(event, 'Profile')"><?php echo __('Profile');?></a> -->
                             <a class="dropdown-item" href="<?php echo HTTP_ROOT?>extranets/dashboard"><?php echo __('Dashboard');?></a>
                            <!-- <a class="dropdown-item" href="basic_tab"><?php echo __('Accommodation');?></a> -->
                            <a class="dropdown-item" href="<?php echo HTTP_ROOT.'/extranets/logout?key='.rand()?>"><?php echo __('Logout'); ?></a>
                        </div>
                    </li>
                    
                    <?php } else {?>
                     <li class="nav-item ">
                      <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"><i class="fas fa-user"></i><?php echo __('MY ACCOUNT'); ?></a>
                    </li>
                    <?php } ?>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php if(empty($this->request->session()->read("lan"))){echo 'PT'; }else{ echo $this->request->session()->read("lan");} ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?=HTTP_ROOT.'users/language/PT';?>">PT</a>
                            <a class="dropdown-item" href="<?=HTTP_ROOT.'users/language/EN';?>">EN</a>
                            <a class="dropdown-item" href="<?=HTTP_ROOT.'users/language/FR';?>">FR</a>
                        </div>
                    </li>
                </ul>
    </div>
    </nav>
	</div>
</header>