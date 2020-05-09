<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo HTTP_ROOT ?>backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $name; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"> NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Employees</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo HTTP_ROOT . 'appadmins/create_admin' ?>"><i class="fa fa-circle-o"></i> Create employee</a></li>
                    <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_admin' ?>"><i class="fa fa-circle-o"></i> View all</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-suitcase"></i>
                    <span>luggage Per Flights</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo HTTP_ROOT . 'appadmins/luggage_per_flights' ?>"><i class="fa fa-circle-o"></i>Add luggage</a></li>
                    <li><a href="<?php echo HTTP_ROOT . 'appadmins/view_luggage_flights' ?>"><i class="fa fa-circle-o"></i> View all</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Passengers</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo HTTP_ROOT . 'appadmins/user_lists' ?>"><i class="fa fa-circle-o"></i> View all</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="<?php echo HTTP_ROOT . 'appadmins/service_fee' ?>">
                    <i class="fa fa-money"></i>
                    <span>Manage Service Fee</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>                
            </li>

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
            <li>
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-line-chart"></i>
                    <span>Statistics</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo HTTP_ROOT . 'appadmins/' ?>revenues"><i class="fa fa-circle-o"></i>Revenues</a></li>
                    <li><a href="<?php echo HTTP_ROOT . 'appadmins/' ?>booked_tickets"><i class="fa fa-circle-o"></i> Booked Tickets</a></li>
                    <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>
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
            <li class="treeview">
                <a href="<?php echo HTTP_ROOT . 'appadmins/citycountry' ?>">
                    <i class="fa fa-flag"></i>
                    <span>Update City & Country</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->

</aside>
