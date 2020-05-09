<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Property Reviews
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/hotel_reviews"> <i class="fa fa-list"></i>Property Reviews</a></li>
        </ol>
        <span class="btn btn-success" onclick="window.location.href='<?=HTTP_ROOT;?>appadmins/add_review'">Add review</span>
    </section>
    <!-- Main content -->
    <style>
        .btn{
            padding: 6px 12px !important;
        }
    </style>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>sl no.</th>
                                     <th>Booking no.</th>
                                    <th>Property name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                   
                                    <th>Cleanliness</th>
                                    <th>Staff</th>
                                    <th>Location</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count=0;foreach ($getReviewDetails as $val): $count++;?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $val->booking_no; ?></td>
                                    <td><?php echo $this->User->getProName($val->property_id); ?></td>
                                    <td><?php echo $val->user_firstname; ?></td>
                                    <td><?php echo $val->user_lastname; ?></td>
                                    <td><?php echo $val->user_email; ?></td>
                                    
                                    <td><?php echo $val->cleanliness; ?></td>
                                    <td><?php echo $val->staff ; ?></td>
                                    <td><?php echo $val->location ; ?></td>
                                    <td><?php echo $val->description ; ?></td>
                                    <td><?php echo @date_format(@$val->review_date,'d M Y') ; ?></td>
                                    <td>
                                        <a class="btn btn-info" href="<?php echo HTTP_ROOT.'appadmins/add_review/'.$val->id?>"><i class="fa fa-edit"></i></a> | 
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete this')" href="<?php echo HTTP_ROOT.'appadmins/delete/'.$val->id.'/HotelReviews' ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
