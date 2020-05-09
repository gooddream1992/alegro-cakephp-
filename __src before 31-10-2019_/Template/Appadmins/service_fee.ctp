<?= $this->Flash->render() ?>
<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>dist/bootstrap-datepicker.css" type="text/css">
<script src="<?php echo HTTP_ROOT ?>js/jquery-3.3.1.min.js" ></script>
<script src="<?php echo HTTP_ROOT ?>dist/bootstrap-datepicker.min.js"></script>
<script src="<?php echo HTTP_ROOT ?>dist/bootstrap-datepicker.js"></script>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Service Fee
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-body">
                        <?= $this->Form->create(null, array('type' => 'post', 'id' => 'fee_form')); ?>
                        <div class="box-body">
                            <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                            <div class="col-md-6" style="margin-top: 27px;">
                                <div class="form-group">
                                    <label for="exampleInputName"> International Fee <span style="color: red;">*</span></label>
                                    <div class="input text required"><input type="number" name="international" placeholder="Enter International Fee" class="form-control" kl_virtual_keyboard_secure_input="on" required="required" data-error="Enter name" maxlength="100" id="name" autocomplete="off"  value="<?= $data->international; ?>" ></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputName">Domestic Fee<span style="color: red;">*</span></label>
                                    <div class="input text"><input type="number" name="domestic" placeholder="Enter Domestic Fee" class="form-control" kl_virtual_keyboard_secure_input="on" id="surname" autocomplete="off"  value="<?= $data->domestic; ?>"></div>
                                </div>
                            </div>





                        </div>
                        <div class="box-footer">

                            <button class="btn btn-primary" style="float:left;margin-left:15px;" name="servicefee" type="submit" value="update_fee">Update Fee</button>                    </div>
                        <?= $this->Form->end(); ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>

    <section class="content-header">
        <h1>
            Hotel Service Fee
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-body">
                        <?= $this->Form->create(null, array('type' => 'post', 'id' => 'hotel_fee_form')); ?>
                        <div class="box-body">
                            <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                            <div class="col-md-6" style="margin-top: 27px;">
                                <div class="form-group">
                                    <label for="exampleInputName"> General Service Fee <span style="color: red;">*</span></label>
                                    <div class="input text required">
                                        <input type="number" name="fee" placeholder="Enter hotel Fee" class="form-control" kl_virtual_keyboard_secure_input="on" min="0" step="0.01" required="required" data-error="Enter name" maxlength="100" id="name" autocomplete="off" value="<?= @$hoteldata->fee; ?>"  ></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>                       




                        </div>
                        <div class="box-footer">

                            <button class="btn btn-primary" style="float:left;margin-left:15px;" type="submit" name="servicefee" value="update_hotel">Update Fee</button>                    </div>
                        <?= $this->Form->end(); ?>


                        <?= $this->Form->create(null, array('type' => 'post', 'id' => 'hotel_featured_fee_form')); ?>
                        <div class="box-body">
                            <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                            <div class="col-md-6" style="margin-top: 27px;">
                                <div class="form-group">
                                    <label for="exampleInputName"> Property <span style="color: red;">*</span></label>
                                    <div class="input text required">
                                        <select class="form-control" name="hotel_id" required="" data-error="Enter name">
                                            <option value="" selected disabled > Select property</option>
                                            <?php if (!empty($edit_featuredService)) { ?>
                                                <option selected value="<?= $edit_featuredService->property_id; ?>"><?= $this->User->propertyName($edit_featuredService->property_id); ?></option>
                                                <?php
                                            }
                                            foreach ($all_property as $val) {
                                                if (!in_array($val, $featuredServiceFeeIds->toArray())) {
                                                    ?>
                                                    <option value="<?= $val; ?>"><?= $this->User->propertyName($val); ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-md-6" >
                                <div class="form-group">
                                    <label for="exampleInputName"> Featured service fee  <span style="color: red;">*</span></label>
                                    <div class="input text required">
                                        <input type="number" name="featured_fee" placeholder="Enter hotel Fee" class="form-control" kl_virtual_keyboard_secure_input="on" min="0" step="0.01" required="required" data-error="Enter name" maxlength="100" id="name" autocomplete="off" value="<?php
                                        if (!empty($edit_featuredService)) {
                                            echo $edit_featuredService->featured_fee;
                                        }
                                        ?>"></div>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>


                            <div class="col-md-6" style="margin-top: 27px;">
                                <div class="form-group">
                                    <label for="exampleInputName"> From date <span style="color: red;">*</span></label>

                                    <div class="input text">
                                        <input type="text" name="from_date" placeholder="Select start Date" class="form-control datepicker" kl_virtual_keyboard_secure_input="on" id="from_date" autocomplete="off"  value="<?= @date_format(@$edit_featuredService->from_date,'d-m-Y'); ?>" required>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top: 27px;">
                                <div class="form-group">
                                    <label for="exampleInputName"> To date <span style="color: red;">*</span></label>
                                    <div class="input text">
                                        <input type="text" name="to_date" placeholder="Select end Date" class="form-control datepicker" kl_virtual_keyboard_secure_input="on" id="to_date" autocomplete="off"  value="<?= @date_format(@$edit_featuredService->to_date,'d-m-Y'); ?>" required>
                                    </div>
                                </div>
                            </div>



                            <button class="btn btn-primary" style="float:left;margin-left:15px;" type="submit" name="servicefee" value="update_featured_hotel">Add Fee</button>                    
                        </div>
                        <?= $this->Form->end(); ?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>


    <section class="content-header">
        <h1>
            Featured Service Fee Hotel Listing
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>property id</th>
                                    <th>property name</th>
                                    <th>service fee %</th>
                                    <th>created date</th>
                                    <th>From date</th>
                                    <th>To date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($all_featuredService as $val) {
                                    ?>
                                    <tr id="215" class="message_box">
                                        <td><?= $i++; ?></td>
                                        <td><?= $this->User->propertyName($val->property_id); ?></td>
                                        <td><?= $val->featured_fee; ?></td>
                                        <td><?= date_format($val->created_date, 'd-m-Y'); ?></td>
                                        <td><?= date_format($val->from_date, 'd-m-Y'); ?></td>
                                        <td><?= date_format($val->to_date, 'd-m-Y'); ?></td>

                                        <td style="text-align: center;">
                                            <a href="<?= HTTP_ROOT; ?>appadmins/service_fee/<?= $val->id; ?>" data-placement="top" data-hint="Edit" title="Edit" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit"></i></a> 

                                            <a href="<?= HTTP_ROOT; ?>appadmins/delete/<?= $val->id; ?>/FeaturedServiceFee" data-placement="top" data-hint="Delete" title="Delete" class="btn btn-danger hint--top  hint" style="padding: 0 7px!important;" onclick="if (confirm( & quot; Are you sure you want to delete Admin ? & quot; )) {
                                                            return true;
                                                        }
                                                        return false;"><i class="fa fa-trash"></i></a>   

                                        </td>
                                    </tr>
                                <?php } ?>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </section>




</div>

<script type="text/javascript">
    $(function () {
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>
<script>
    $(".datepicker").datepicker({
        format: "dd-mm-yyyy",
        autoclose: true
    });
</script>

