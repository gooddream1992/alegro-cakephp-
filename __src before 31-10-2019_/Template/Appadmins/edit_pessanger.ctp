<?php $userdetails= $this->User->usrdetHelper($id);?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Update User Profile</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/user_lists"> <i class="fa fa-list"></i>User List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

                    <?= $this->Form->create($user, array('data-toggle' => "validator",'enctype'=>"multipart/form-data")); ?>
                    <div class="box-body">
                        <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                        <div class="col-xs-12">
                        <div class="col-md-6" style="margin-top: -6px;">
                            <div class="form-group">
                                <label for="exampleInputName"> User Name <span style="color: red;">*</span></label>
                                <?= $this->Form->input('name', ['placeholder' => "Enter User name", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$userdetails->first_name." ".@$userdetails->sur_name, 'data-error' => 'Enter name']); ?>
                          
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">User photo</label>
                                <img src="<?=HTTP_ROOT.PHOTOS.$userdetails->profile_photo;?>" width="80px"/>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="exampleInputEmail">Email <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                
                                    <?= $this->Form->input('email', ['type'=>'text','placeholder' => "Enter Email", 'onblur' => 'checkEmailAvail(this.value)', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$getDatas->email, 'required' => "required",  'data-error' => 'Enter Email id','disabled'=>'disabled']); ?>

                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="exampleInputEmail">Phone Number <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                
                                    <?= $this->Form->input('phone_number', ['type'=>'text','placeholder' => "Enter Phone Number", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$userdetails->phone_number, 'required' => "required",  'data-error' => 'Enter Phone Number']); ?>

                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>
                        
                            <div class="col-md-6">
                            <div class="form-group">

                                <label for="exampleInputEmail">Date of birth <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                
                                    <?= $this->Form->input('dateofbirth', ['type'=>'text','placeholder' => "Enter date of birth", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => date('d/m/Y',strtotime($this->Time->format(@$userdetails->dateofbirth,'Y-MM-d'))), 'required' => "required",  'data-error' => 'Enter date of birth']); ?>

                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>
                            
                            <div class="col-md-6">
                            <div class="form-group">

                                <label for="exampleInputEmail">Gender <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                
                                <select name="gender" class ="nice-select form-control" required="required" data-error = 'Select Gender'>
                                    <option value="Male" <?= (@$userdetails->gender == "Male")?"selected":"";?>>Male</option>
                                    <option value="Female" <?= (@$userdetails->gender == "Female")?"selected":"";?>>Female</option>
                                </select>
                                
                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>
                        
                       <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input   type="text" required="required" name="country" class="form-control" placeholder="Enter Country"  value="<?=@$userdetails->country;?>">
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Province</label>
                                            <select name="province" id="province" class="form-control">
                                               <?php foreach($provincelists as $provincelist){?>
                                                <option <?php if($provincelist==@$userdetails->province){ ?> selected="selected"  <?php } ?>value="<?php echo $provincelist;?>"><?php echo $provincelist;?></option>
                                               <?php } ?>
                                            </select>
                                            
                                        </div>
                                    </div>     
                            
                        </div>
                    </div>
                    <div class="box-footer">

                        <?php
                       
                            echo $this->Form->button('Update Profile', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        
                        ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>