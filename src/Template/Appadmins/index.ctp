<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                General
                <small>Overview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <div class="row" style="margin-bottom: 40px;">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $users_count; ?></h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $employees_count; ?></h3>
                        <p>Employees</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $total_order_paid; ?></h3>
                        <p>Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-ticket"></i>
                    </div>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $total_testimonials; ?></h3>
                        <p>Testimonials</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                </div>
            </div><!-- ./col -->

        </div>


        <section class="content-header">
            <h1>
                Flights
                <small>Overview</small>
            </h1>
        </section>

        <div class="row" style="margin-bottom: 40px;">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= !empty($bookings_count) ? $bookings_count : 0; ?></h3>
                        <p>Airlines</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-plane"></i>
                    </div>
                    <a href="<?= HTTP_ROOT; ?>appadmins/booked_tickets" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= number_format($total_airports); ?><sup style="font-size: 20px"></sup></h3>
                        <p>Airports</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                    <a href="<?= HTTP_ROOT; ?>appadmins/citycountry" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $bookings->count(); ?></h3>
                        <p>Orders</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-ticket"></i>
                    </div>
                    <a href="<?= HTTP_ROOT; ?>appadmins/booked_tickets" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->


        </div>


        <section class="content-header">
            <h1>
                Properties
                <small>Overview</small>
            </h1>
        </section>
        <div class="row" style="margin-bottom: 40px;">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $htl_nos; ?></h3>
                        <p>Properties</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <a href="<?= HTTP_ROOT; ?>appadmins/manage_hotel_booking" class="small-box-footer">
                        Go to Page <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $no_htl_book; ?></h3>
                        <p>Bookings</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-ticket"></i>
                    </div>
                    <a href="<?= HTTP_ROOT; ?>appadmins/manage_hotel_booking" class="small-box-footer">
                        Go to Page <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $all_reviews; ?></h3>
                        <p>Reviews</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-star-o"></i>
                    </div>
                    <a href="<?= HTTP_ROOT; ?>appadmins/hotel_reviews" class="small-box-footer">
                        Go to Page <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->

        </div>


<!--        <section class="content-header">
            <h1>
                Social
                <small>Overview</small>
            </h1>
        </section>-->

        <!--        <div class="row" style="margin-bottom: 40px;">
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>35.000</h3>
                                <p>Facebook Followers</p>
                            </div>
                            <div class="icon" style="color: #3f51b5;">
                                <i class="fa fa-facebook-official"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Go to Page <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>12.500<sup style="font-size: 20px"></sup></h3>
                                <p>Twitter Followers</p>
                            </div>
                            <div class="icon" style="color: #03a9f4;">
                                <i class="fa fa-twitter-square"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Go to Page <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>45.000</h3>
                                <p>Instagram Followers</p>
                            </div>
                            <div class="icon" style="color: #795548;">
                                <i class="fa fa-instagram"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Go to Page <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>4.600</h3>
                                <p>YouTube Followers</p>
                            </div>
                            <div class="icon" style="color: red;">
                                <i class="fa fa-youtube-play"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                Go to Page <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>



                </div>-->

    </section>