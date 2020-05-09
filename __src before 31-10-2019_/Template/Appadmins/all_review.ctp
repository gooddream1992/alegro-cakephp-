<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php if (!empty($review_id)) { ?> Edit <?php } else { ?> Add <?php } ?> Property Reviews
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="#all_revi"> <i class="fa fa-list"></i> All Reviews</a></li>
        </ol>
    </section>
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;    
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;  
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">

                        <?= $this->Form->create('', ['type' => 'post', 'id' => 'review_form']); ?>


                        <div class="form-group">
                            <label for="user_name">First Name</label>
                            <input name="user_firstname" type="text" class="form-control" id="user_firstname" value="<?php echo @$reviewDetails->user_firstname; ?>">
                            <input name="property_id" type="hidden" class="form-control" id="property_id" value="<?php echo @$pro_id; ?>" >
                            <input name="id" type="hidden" class="form-control" id="id" value="<?php echo @$reviewDetails->id; ?>" >

                        </div>
                        
                        <div class="form-group">
                            <label for="user_name">Last Name</label>
                            <input name="user_lastname" type="text" class="form-control" id="user_lastname" value="<?php echo @$reviewDetails->user_lastname; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="user_email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo @$reviewDetails->user_email; ?>">
                        </div>

                        <div class="form-group">
                            <label for="user_name" style="width:100%;float: left;">Cleanliness</label>
                            <div style="width:100%;float: left;">
                                <div class="rate">
                                    <input type="radio" id="star5" name="cleanliness" value="5" <?php if (@$reviewDetails->cleanliness <= 5) { ?> checked="" <?php } ?> />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="cleanliness" value="4" <?php if (@$reviewDetails->cleanliness <= 4) { ?> checked="" <?php } ?> />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="cleanliness" value="3"  <?php if (@$reviewDetails->cleanliness <= 3) { ?> checked="" <?php } ?>/>
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="cleanliness" value="2" <?php if (@$reviewDetails->cleanliness <= 2) { ?> checked="" <?php } ?>/>
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="cleanliness" value="1" <?php if (@$reviewDetails->cleanliness <= 1) { ?> checked="" <?php } ?> />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="user_name" style="width:100%;float: left;">Staff</label>
                            <div style="width:100%;float: left;">
                                <div class="rate">
                                    <input type="radio" id="star51" name="staff" value="5" <?php if (@$reviewDetails->staff <= 5) { ?> checked="" <?php } ?> />
                                    <label for="star51" title="text">5 stars</label>
                                    <input type="radio" id="star41" name="staff" value="4" <?php if (@$reviewDetails->staff <= 4) { ?> checked="" <?php } ?> />
                                    <label for="star41" title="text">4 stars</label>
                                    <input type="radio" id="star31" name="staff" value="3"  <?php if (@$reviewDetails->staff <= 3) { ?> checked="" <?php } ?>/>
                                    <label for="star31" title="text">3 stars</label>
                                    <input type="radio" id="star21" name="staff" value="2" <?php if (@$reviewDetails->staff <= 2) { ?> checked="" <?php } ?> />
                                    <label for="star21" title="text">2 stars</label>
                                    <input type="radio" id="star11" name="staff" value="1" <?php if (@$reviewDetails->staff <= 1) { ?> checked="" <?php } ?>/>
                                    <label for="star11" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="user_name" style="width:100%;float: left;">Location</label>
                            <div style="width:100%;float: left;">
                                <div class="rate">
                                    <input type="radio" id="star52" name="location" value="5"  <?php if (@$reviewDetails->location <= 5) { ?> checked="" <?php } ?>/>
                                    <label for="star52" title="text">5 stars</label>
                                    <input type="radio" id="star42" name="location" value="4" <?php if (@$reviewDetails->location <= 4) { ?> checked="" <?php } ?> />
                                    <label for="star42" title="text">4 stars</label>
                                    <input type="radio" id="star32" name="location" value="3" <?php if (@$reviewDetails->location <= 3) { ?> checked="" <?php } ?>/>
                                    <label for="star32" title="text">3 stars</label>
                                    <input type="radio" id="star22" name="location" value="2" <?php if (@$reviewDetails->location <= 2) { ?> checked="" <?php } ?>/>
                                    <label for="star22" title="text">2 stars</label>
                                    <input type="radio" id="star12" name="location" value="1" <?php if (@$reviewDetails->location <= 1) { ?> checked="" <?php } ?> />
                                    <label for="star12" title="text">1 star</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea">Description</label>
                            <textarea class="form-control" id="exampleTextarea" name="description" rows="3"><?php echo @$reviewDetails->description; ?></textarea>

                        </div>

                        <button type="submit" class="btn btn-primary"><?php if (!empty($review_id)) { ?> Update <?php } else { ?> Submit <?php } ?></button>

                        <?= $this->Form->end(); ?>

                    </div>

                </div>
            </div>
        </div>

    </section>

    <section class="content-header" id="all_revi">
        <h1>
            All Reviews
        </h1>
    </section>

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
                                <?php
                                $count = 0;
                                foreach ($allReview as $val): $count++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $this->User->getProName($val->property_id); ?></td>
                                        <td><?php echo $val->user_firstname; ?></td>
                                        <td><?php echo $val->user_lastname; ?></td>
                                        <td><?php echo $val->user_email; ?></td>

                                        <td><?php echo $val->cleanliness; ?></td>
                                        <td><?php echo $val->staff; ?></td>
                                        <td><?php echo $val->location; ?></td>
                                        <td><?php echo $val->description; ?></td>
                                        <td><?php echo @date_format(@$val->review_date, 'd M Y'); ?></td>
                                        <td>
                                            <a class="btn btn-info" href="<?php echo HTTP_ROOT . 'appadmins/all_review/' . $pro_id . '/' . $val->id ?>" style="padding: 5px 10px !important;"><i class="fa fa-edit"></i></a>  
        <!--                                            <a class="btn btn-danger" onclick="return confirm('Are you sure want to delete this')" href="<?php echo HTTP_ROOT . 'appadmins/delete/' . $val->id . '/HotelReviews' ?>"><i class="fa fa-trash"></i></a>-->
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
