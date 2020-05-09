<div class="content-wrapper">
    <section class="content-header">
        <h1>
           <?php if(!empty($id)){  ?>Edit<?php }else{ ?> Add <?php } ?> Property Reviews
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/add_review"> <i class="fa fa-list"></i><?php if(!empty($id)){  ?>Edit<?php }else{ ?> Add <?php } ?> Property Reviews</a></li>
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
                            <label for="booking_no">Booking Number</label>
                            <select class="form-control" name="booking_no" id="exampleSelect1" onchange="setOther(this.value)" <?php if(!empty($id)){  ?>disabled <?php } ?>>
                                <option selected disabled>Select booking number</option>
                                <?php foreach ($all_success_book as $val) { ?>
                                <option value="<?= $val->booking_no; ?>" <?php if($val->booking_no==@$reviewDetails->booking_no){?> selected="" <?php } ?>><?= $val->booking_no; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="user_name">First Name</label>
                            <input name="user_firstname" type="text" class="form-control" id="user_firstname" value="<?php echo @$reviewDetails->user_firstname;?>">
                            <input name="property_id" type="hidden" class="form-control" id="property_id" value="<?php echo @$reviewDetails->property_id;?>" >
                            <input name="id" type="hidden" class="form-control" id="id" value="<?php echo @$reviewDetails->id;?>" >

                        </div>
                        <div class="form-group">
                            <label for="user_name">Last Name</label>
                            <input name="user_lastname" type="text" class="form-control" id="user_lastname" value="<?php echo @$reviewDetails->user_lastname;?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="user_email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo @$reviewDetails->user_email;?>">
                        </div>



                        <div class="form-group">
                            <label for="user_name" style="width:100%;float: left;">Cleanliness</label>
                            <div style="width:100%;float: left;">
                                <div class="rate">
                                    <input type="radio" id="star5" name="cleanliness" value="5" <?php if(@$reviewDetails->cleanliness<=5){?> checked="" <?php } ?> />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" id="star4" name="cleanliness" value="4" <?php if(@$reviewDetails->cleanliness<=4){?> checked="" <?php } ?> />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" name="cleanliness" value="3"  <?php if(@$reviewDetails->cleanliness<=3){?> checked="" <?php } ?>/>
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" name="cleanliness" value="2" <?php if(@$reviewDetails->cleanliness<=2){?> checked="" <?php } ?>/>
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" name="cleanliness" value="1" <?php if(@$reviewDetails->cleanliness<=1){?> checked="" <?php } ?> />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="user_name" style="width:100%;float: left;">Staff</label>
                            <div style="width:100%;float: left;">
                                <div class="rate">
                                    <input type="radio" id="star51" name="staff" value="5" <?php if(@$reviewDetails->staff<=5){?> checked="" <?php } ?> />
                                    <label for="star51" title="text">5 stars</label>
                                    <input type="radio" id="star41" name="staff" value="4" <?php if(@$reviewDetails->staff<=4){?> checked="" <?php } ?> />
                                    <label for="star41" title="text">4 stars</label>
                                    <input type="radio" id="star31" name="staff" value="3"  <?php if(@$reviewDetails->staff<=3){?> checked="" <?php } ?>/>
                                    <label for="star31" title="text">3 stars</label>
                                    <input type="radio" id="star21" name="staff" value="2" <?php if(@$reviewDetails->staff<=2){?> checked="" <?php } ?> />
                                    <label for="star21" title="text">2 stars</label>
                                    <input type="radio" id="star11" name="staff" value="1" <?php if(@$reviewDetails->staff<=1){?> checked="" <?php } ?>/>
                                    <label for="star11" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="user_name" style="width:100%;float: left;">Location</label>
                            <div style="width:100%;float: left;">
                                <div class="rate">
                                    <input type="radio" id="star52" name="location" value="5"  <?php if(@$reviewDetails->location<=5){?> checked="" <?php } ?>/>
                                    <label for="star52" title="text">5 stars</label>
                                    <input type="radio" id="star42" name="location" value="4" <?php if(@$reviewDetails->location<=4){?> checked="" <?php } ?> />
                                    <label for="star42" title="text">4 stars</label>
                                    <input type="radio" id="star32" name="location" value="3" <?php if(@$reviewDetails->location<=3){?> checked="" <?php } ?>/>
                                    <label for="star32" title="text">3 stars</label>
                                    <input type="radio" id="star22" name="location" value="2" <?php if(@$reviewDetails->location<=2){?> checked="" <?php } ?>/>
                                    <label for="star22" title="text">2 stars</label>
                                    <input type="radio" id="star12" name="location" value="1" <?php if(@$reviewDetails->location<=1){?> checked="" <?php } ?> />
                                    <label for="star12" title="text">1 star</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea">Description</label>
                            <textarea class="form-control" id="exampleTextarea" name="description" rows="3"><?php echo @$reviewDetails->description;?></textarea>

                        </div>

                        <button type="submit" class="btn btn-primary"><?php if(!empty($id)){  ?> Update <?php }else{ ?> Submit <?php } ?></button

                        <?= $this->Form->end(); ?>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function setOther(value) {
        var arr = <?= json_encode($all_success_book); ?>;
        arr.forEach(function (items) {
            console.log(items);
            if (items['booking_no'] == value) {
                $('#user_firstname').val(items['user_firstname']);
                $('#user_lastname').val(items['user_lastname']);
                $('#exampleInputEmail1').val(items['email']);
                $('#property_id').val(items['property_id']);
            }

        });

    }
</script>