    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Flights
                <small>Overview</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?=!empty($bookings_count)?$bookings_count:0;?></h3>
                            <p>Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-ticket"></i>
                        </div>
                        <a href="<?=HTTP_ROOT;?>appadmins/booked_tickets" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>12.500.000<sup style="font-size: 20px"></sup></h3>
                            <p>Revenue</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-dollar"></i>
                        </div>
                        <a href="<?=HTTP_ROOT;?>appadmins/revenues" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?=$pass_count;?></h3>
                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?=HTTP_ROOT;?>appadmins/user_lists" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>12.000</h3>
                            <p>Invoices</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text-o"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
            </div>
            
            <section class="content-header">
            <h1>
                Social
                <small>Overview</small>
            </h1>
        </section>

            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>35.000</h3>
                            <p>Facebook Followers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-facebook-official"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Go to Page <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>12.500<sup style="font-size: 20px"></sup></h3>
                            <p>Twitter Followers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-twitter-square"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Go to Page <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>45.000</h3>
                            <p>Instagram Followers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-instagram"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Go to Page <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>4.600</h3>
                            <p>YouTube Followers</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-youtube-play"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            Go to Page <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                
                <section class="content-header">
            <h1>
                Properties
                <small>Overview</small>
            </h1>
        </section>
        
        <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3><?=$htl_nos;?></h3>
                            <p>Properties</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-hotel"></i>
                        </div>
                        <a href="<?=HTTP_ROOT;?>appadmins/manage_hotel_booking" class="small-box-footer">
                            Go to Page <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?=$no_htl_book;?></h3>
                            <p>Orders</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-hotel"></i>
                        </div>
                        <a href="<?=HTTP_ROOT;?>appadmins/manage_hotel_booking" class="small-box-footer">
                            Go to Page <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3><?=number_format($htl_book_rev,2);?></h3>
                            <p>Revenue</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-hotel"></i>
                        </div>
                        <a href="<?=HTTP_ROOT;?>appadmins/hotel_revenues" class="small-box-footer">
                            Go to Page <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
   
