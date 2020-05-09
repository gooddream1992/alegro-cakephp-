<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo HTTP_ROOT . 'appadmins' ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini" style="color: #000;"><img src="<?php echo HTTP_ROOT . 'img/favicon.png' ?>" width="40"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="<?php echo HTTP_ROOT . 'img/header-logo.png' ?>" width="130"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-search"></i>

                    </a>

                </li>
                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>

                    </a>

                </li>
                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if (!empty($profilePhots->user_detail->profile_photo)) { ?>
                            <img src="<?php echo HTTP_ROOT ?>img/pro_pic/<?= $profilePhots->user_detail->profile_photo; ?>" class="user-image" alt="User Image" />
                        <?php } else { ?>
                            <img src="<?php echo HTTP_ROOT ?>img/avatar1.jpg" class="user-image" alt="User Image" />

                        <?php } ?>
                        <span class="hidden-xs">&nbsp;</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            
                            <?php if (!empty($profilePhots->user_detail->profile_photo)) { ?>
                            <img src="<?php echo HTTP_ROOT ?>img/pro_pic/<?= $profilePhots->user_detail->profile_photo; ?>" class="img-circle" alt="User Image" />
                        <?php } else { ?>
                            <img src="<?php echo HTTP_ROOT ?>img/avatar1.jpg" class="img-circle" alt="User Image" />

                        <?php } ?>
                            <p>
                                <?php echo $name; ?>
                                <small>Member since <?php echo date_format( @$this->request->session()->read("Auth.User.created_dt"),'M,d y') ?></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo HTTP_ROOT . 'appadmins/profile' ?>" class="btn btn-primary hvr-grow btn-fillbtn-primary hvr-grow ">Setting</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo HTTP_ROOT . 'users/logout' ?>" class="btn btn-primary hvr-grow btn-fillbtn-primary hvr-grow">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->

            </ul>
        </div>
    </nav>
</header>



