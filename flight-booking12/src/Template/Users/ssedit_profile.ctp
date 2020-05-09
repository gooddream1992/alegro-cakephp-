


<script>
    $(function () {
        //$("#dob").datepicker();
         //$("#dob").datepicker({ dateFormat: "yy-mm-dd" }).val()
    });
</script>
<?php echo $this->element('frontend/login-header'); ?>
<section id="search-results-body"  style="margin: 50px 0 60px;">
    <div class="container">
        <div class="row">
            <!-- Filters -->
           <?php
             echo $this->element('frontend/user-menu');


            ?>
            <!-- Filters -->


            <!-- Results -->
            <div class="col-sm-8 col-lg-9">
                <div class="bg_white right_pro">
                    <div class="row">
                        <?php
                         echo $this->element('frontend/profile_photo');
                        ?>
                        <div class="col-md-10">
                            <?php echo $this->Form->create(@$user, ['url' => ['action' => 'edit_profile'], 'data-toggle' => "validator", 'novalidate' => "true", 'id' => 'personalInfofrm']); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" required="required" name="first_name" class="form-control" placeholder="Enter First Name"  value="<?php echo $userDetails->user_detail->first_name; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" required="required" name="sur_name" class="form-control" placeholder="Enter Last Name"  value="<?php echo $userDetails->user_detail->sur_name; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" required="required" readonly="readonly" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $userDetails->email; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" required="required"   class="form-control" name ="phone_number" placeholder="Enter Phone Number" value="<?php echo $userDetails->user_detail->phone_number; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <input type="text" required="required" name="dob" class="form-control datepicker-here box3" id="dob" placeholder="Enter Birth Date" value="<?php echo date('d/m/Y',strtotime($userDetails->user_detail->dateofbirth)); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name="gender" id="gender" required="required">
                                            <option value="">Select</option>
                                            <option <?php if ($userDetails->user_detail->gender == 'Male') { ?> selected="selected"<?php } ?> value="Male">Male</option>
                                            <option <?php if ($userDetails->user_detail->gender == 'Female') { ?> selected="selected"<?php } ?>  value="Female">Female</option>
                                        </select>
                                        <i class="fa fa-angle-down formIconArrow"></i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input   type="text" required="required" name="country" class="form-control" placeholder="Enter Country"  value="Angola">
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <select name="province" id="province" class="form-control">
                                               <?php foreach($provincelists as $provincelist){?>
                                                <option <?php if($provincelist==$userDetails->user_detail->province){ ?> selected="selected"  <?php } ?>value="<?php echo $provincelist;?>"><?php echo $provincelist;?></option>
                                               <?php } ?>
                                            </select>
                                            <i class="fa fa-angle-down formIconArrow"></i>
                                        </div>
                                    </div>

                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-change hvr-grow" name="" value="Save">
                                    </div>
                                </div>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW -->


        </div>
        <!-- END OF THE BOX AND SINGLE ROW -->


    </div>
</section>

<div class="space"></div>

<?php echo $this->element('frontend/inner-footer'); ?>
