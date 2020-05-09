<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            if ($id) {
                echo 'Edit Operator';
            } else {
                echo "Create Operator";
            }
            ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/view_operator"> <i class="fa fa-list"></i>Operator List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

                    <?= $this->Form->create($user, array('data-toggle' => "validator")); ?>
                    <div class="box-body">
                        <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                        <div class="col-md-6" style="margin-top: 27px;">
                            <div class="form-group">
                                <label for="exampleInputName"> First Name <span style="color: red;">*</span></label>
                                <?= $this->Form->input('name', ['placeholder' => "Enter First name", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'value' => @$editAdmin->name, 'data-error' => 'Enter name']); ?>
                                <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$editAdmin->id]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Sure name<span style="color: red;">*</span></label>
                                <?= $this->Form->input('surname', ['placeholder' => "Enter sure name", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$editAdmin->user_detail->sur_name, 'kl_virtual_keyboard_secure_input' => "on"]); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="exampleInputEmail">Email <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                <?php if ($id) { ?>
                                    <?= $this->Form->input('email', ['placeholder' => "Enter email", 'onblur' => 'checkEmailAvail(this.value)', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$editAdmin->email, 'required' => "required", 'disabled' => 'disabled', 'data-error' => 'Enter Email id']); ?>
                                <?php } else { ?>
                                    <?= $this->Form->input('email', ['placeholder' => "Enter email", 'onblur' => 'checkEmailAvail(this.value)', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter Email id']); ?>
                                <?php } ?>
                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Phone <span style="color: red;">*</span></label>
                                <?= $this->Form->input('phone', ['placeholder' => "Enter phone no", 'type' => 'text', 'class' => "form-control", 'label' => false, 'value' => @$editAdmin->user_detail->phone_number, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter Phone no']); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>




                        <?php if (!$id) { ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail">Password <span style="color: red;">*</span></label>

                                    <?= $this->Form->input('password', ['placeholder' => "Enter password", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter password']); ?>
                                    <div class="help-block with-errors"></div>
                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail">Confirm Password <span style="color: red;">*</span></label>
                                    <?= $this->Form->input('cpassword', ['placeholder' => "Enter confirm password", 'type' => 'password', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter confirm password']); ?>
                                    <div class="help-block with-errors"></div>
                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                </div>

                            </div>
                        <?php } ?>


                    </div>
                    <div class="box-footer">

                        <?php
                        if ($id) {
                            echo $this->Form->button('Update operator', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        } else {
                            echo $this->Form->button('Create operator', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        }
                        ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>