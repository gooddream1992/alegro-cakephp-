<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
$userType = $this->request->session()->read('Auth.User')['type'];
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if (!empty($profilePhots->user_detail->profile_photo)) { ?>
                    <img src="<?php echo HTTP_ROOT ?>img/pro_pic/<?= $profilePhots->user_detail->profile_photo; ?>" class="img-circle" alt="User Image" />
                <?php } else { ?>
                    <img src="<?php echo HTTP_ROOT ?>img/avatar1.jpg" class="img-circle" alt="User Image" />

                <?php } ?>
            </div>
            <div class="pull-left info">
                <p><?php echo $name; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"> GENERAL</li>
            <?php if ($userType == 3) { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Employees</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/create_admin' ?>"><i class="fa fa-circle-o"></i> Create employee</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_admin' ?>"><i class="fa fa-circle-o"></i> View all Admins</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_operator' ?>"><i class="fa fa-circle-o"></i> View all Operators</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_helpdisk' ?>"><i class="fa fa-circle-o"></i> View all Helpdesks</a></li>


                    </ul>
                </li>
            <?php } ?>

            <?php if (($userType == 3) || ($userType == 5) || ($userType == 6)) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/user_lists' ?>">
                        <i class="fa fa-user"></i>
                        <span>Users</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if ($userType == 3) { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-question-circle"></i>
                        <span>Faq</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/' ?>create_category"><i class="fa fa-circle-o"></i> Manage Category</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/' ?>create_faq"><i class="fa fa-circle-o"></i> Create Faq</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/' ?>view_faq"><i class="fa fa-circle-o"></i> View all</a></li>
                    </ul>
                </li>
            <?php } ?>


            <?php if ($userType == 3) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/service_fee' ?>">
                        <i class="fa fa-money"></i>
                        <span>Service Fee</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>                
                </li>
            <?php } ?>


            <?php if (($userType == 3) || ($userType == 5)) { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bell-o"></i>
                        <span>Notifications</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/' ?>create_notification"><i class="fa fa-circle-o"></i> Create Notifications</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/' ?>view_notification"><i class="fa fa-circle-o"></i> View all</a></li>
                    </ul>
                </li>
            <?php } ?>

            <?php if ($userType == 3) { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-thumbs-up"></i>
                        <span>Testimonials</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/' ?>create_testimonial"><i class="fa fa-circle-o"></i> Create Testimonial</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/' ?>view_testimonial"><i class="fa fa-circle-o"></i> View all</a></li>
                    </ul>
                </li>
            <?php } ?>

            <?php if ($userType == 3) { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-book"></i>
                        <span>CMS Pages</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/1' ?>"><i class="fa fa-circle-o"></i>About us</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/2' ?>"><i class="fa fa-circle-o"></i>Company Invoices</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/3' ?>"><i class="fa fa-circle-o"></i>Airline Invoices</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/4' ?>"><i class="fa fa-circle-o"></i> Privacy Policy</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/6' ?>"><i class="fa fa-circle-o"></i> Cookies Policy</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/8' ?>"><i class="fa fa-circle-o"></i> Terms of Use</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/17' ?>"><i class="fa fa-circle-o"></i> FAQ</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/12' ?>"><i class="fa fa-circle-o"></i> Contact Us</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/9' ?>"><i class="fa fa-circle-o"></i> Index</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/18' ?>"><i class="fa fa-circle-o"></i> Fare Details</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/19' ?>"><i class="fa fa-circle-o"></i> Route Review</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/20' ?>"><i class="fa fa-circle-o"></i> Thank you</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/21' ?>"><i class="fa fa-circle-o"></i> Ajax Search Result</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/editpages/23' ?>"><i class="fa fa-circle-o"></i> Registration Success</a></li>
                    </ul>
                </li>
            <?php } ?>

            <?php if ($userType == 3) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/' ?>mail_template">
                        <i class="fa fa-envelope-o"></i> <span>Email Templates</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
            <?php } ?>

            <li class="header"> FLIGHTS</li>

            <?php if ($userType == 3) { ?>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-suitcase"></i>
                        <span>Luggage Allowance</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/luggage_per_flights' ?>"><i class="fa fa-circle-o"></i>Add luggage</a></li>
                        <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_luggage_flights' ?>"><i class="fa fa-circle-o"></i> View all</a></li>
                    </ul>
                </li>
            <?php } ?>

            <?php if ($userType == 3) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/citycountry' ?>">
                        <i class="fa fa-flag"></i>
                        <span>Airports</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if (($userType == 3) || ($userType == 5) || ($userType == 6)) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/' ?>revenues">
                        <i class="fa fa-money"></i>
                        <span>Revenues</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>                
                </li>
            <?php } ?>

            <?php if (($userType == 3) || ($userType == 5) || ($userType == 6)) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/' ?>booked_tickets">
                        <i class="fa fa-money"></i>
                        <span>Bookings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>                
                </li>
            <?php } ?>

            <li class="header"> PROPERTIES</li>

            <?php if (($userType == 3) || ($userType == 5)) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/' ?>registered_property">
                        <i class="fa fa-building"></i> <span>Properties</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
            <?php } ?>
            
            <?php if (($userType == 3)) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/' ?>hotel_country_city">
                        <i class="fa fa-map-marker"></i> <span>Manage Location</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
            <?php } ?>
            
            <?php if (($userType == 3) || ($userType == 5) || ($userType == 6)) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/' ?>hotel_reviews">
                        <i class="fa fa-star-o"></i> <span>Reviews</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
            <?php } ?>
            
            <?php if (($userType == 3) || ($userType == 5) || ($userType == 6)) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/' ?>bank_details">
                        <i class="fa fa-bank"></i> <span>Bank Details</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
            <?php } ?>
            
             <?php if (($userType == 3) || ($userType == 5) || ($userType == 6)) { ?>
            <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/' ?>hotel_refund_booking">
                        <i class="fa fa-book"></i> <span>Refunds</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
                <?php } ?>
            
             <?php if (($userType == 3) || ($userType == 5) || ($userType == 6)) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/' ?>payments">
                        <i class="fa fa-book"></i> <span>Payments</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
            <?php } ?>

            <?php if (($userType == 3) || ($userType == 5) || ($userType == 6)) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/' ?>hotel_revenues">
                        <i class="fa fa-money"></i> <span>Revenues</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
                <?php } ?>
                

            <?php if (($userType == 3) || ($userType == 5) || ($userType == 6)) { ?>
                <li class="treeview">
                    <a href="<?php echo HTTP_ROOT . 'appadmins/' ?>manage_hotel_booking">
                        <i class="fa fa-book"></i> <span>Bookings</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
            <?php } ?>

        </ul>
    </section>
    <!-- /.sidebar -->

</aside>
