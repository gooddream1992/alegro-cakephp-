<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?=
            __('Setting');
            ?>
        </h1>
        <?php if ($type == 1) { ?>
            <ol class="breadcrumb">
                <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

            </ol>
        <?php } else { ?>

            <ol class="breadcrumb">
                <li class="active" ><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>

            </ol>

        <?php } ?>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li id='li_profile' <?php if (empty($param)) { ?>class="active" <?php } ?>><a href="#profile" data-toggle="tab" aria-expanded="false">Profile </a></li>
                        <li id='li_password' <?php if ($param == 'changepassword') { ?>class="active" <?php } ?>><a href="#password" data-toggle="tab" aria-expanded="false">Password</a></li>
                        <li id='li_communication' <?php if ($param == 'communication') { ?>class="active" <?php } ?>><a href="#communication" data-toggle="tab" aria-expanded="true">Communication</a></li>
                        <li id='li_email_template' <?php if ($param == 'emailTemplete') { ?>class="active" <?php } ?>><a href="#email-template" data-toggle="tab" aria-expanded="true">Email template</a></li>
                        <li id='li_map' <?php if ($param == 'contact-map') { ?>class='active'<?php } ?>><a href="#map"  data-toggle="tab" aria-expanded="true">Contact us map</a></li>
                    </ul>

                    <div class="tab-content" style="width: 100%;float: left;">
                        <div class="tab-pane <?php if (empty($param)) { ?>active <?php } ?>" id="profile">
                            <div id="msg-gen"></div>
                            <?= $this->Form->create($user, array('id' => 'profile_data', 'data-toggle' => "validator", 'type' => 'file')) ?>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('name', ['value' => $rowname->name, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter your name', 'label' => false]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('email', ['value' => $rowname->email, 'type' => 'text', 'class' => "form-control", 'required' => "required", 'data-error' => 'Please enter your email', 'label' => false]); ?>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <?= $this->Form->input('phone', ['value' => $rowname->user_detail->phone_number, 'type' => 'text', 'class' => "form-control", 'label' => false]); ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sur name</label>
                                        <?= $this->Form->input('sur_name', ['value' => $rowname->user_detail->sur_name, 'type' => 'text', 'rows' => 9, 'class' => "form-control", 'label' => false]); ?>

                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Profile Picture</label>
                                        <?= $this->Form->input('pro_img', ['type' => 'file', 'label' => false]); ?>
                                        <?php if (!empty($rowname->user_detail->profile_photo)) { ?>
                                            <img src="<?= HTTP_ROOT . 'img/pro_pic/' . $rowname->user_detail->profile_photo; ?>" width="100">
                                        <?php } ?>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <?= $this->Form->submit('Update', ['type' => 'submit', 'class' => 'btn btn-success', 'style' => 'margin-left:15px;']) ?>
                                </div>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>




                        <div class="tab-pane <?php if ($param == 'changepassword') { ?>active <?php } ?>" id="password" >
                            <?= $this->Form->create(@$passwordData, array('data-toggle' => "validator", 'id' => 'change_password')); ?>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Current Password<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('current_password', ['type' => 'password', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter your current password']); ?>
                                        <div class="help-block with-errors"></div>
                                        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">New Password<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('password', ['type' => 'password', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter your new password']); ?>
                                        <div class="help-block with-errors"></div>
                                        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Confirm Password<span style="color:#FF0000">*</span></label>
                                        <?= $this->Form->input('cpassword', ['type' => 'password', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Confirm your new password']); ?>
                                        <div class="help-block with-errors"></div>
                                        <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?= $this->Form->submit('Change password', ['type' => 'submit', 'class' => 'btn btn-success', 'name' => 'changepassword', 'style' => 'margin-left:15px;
            ']) ?>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>
                        </div>
                        <div class="tab-pane  <?php if ($param == 'communication') { ?>active <?php } ?>" id="communication" >
                            <?= $this->Form->create(@$Data, array('data-toggle' => "validator", 'id' => 'emailsetting')); ?>
                            <div class="box-body">
                                <div>
                                    <?php
                                    foreach ($settings as $settings) {
                                        $name = $settings['name'];
                                        $value = $settings['value'];
                                        $display = $settings['display'];
                                        ?>
                                        <div class = "form-group">
                                            <?php echo $this->Form->input($name, array('style' => 'width:450px;', 'class' => 'form-control', 'value' => $value, 'id' => 'setting', 'type' => 'text', 'label' => $display, 'required' => false)); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="box-footer">
                                <?= $this->Form->button('save', ['type' => 'submit', 'class' => 'btn btn-primary', 'value' => 'save', 'name' => 'general', 'style' => 'float:left;margin-top:30px;']) ?>
                            </div>
                            <?= $this->Form->end() ?>
                        </div>




                        <div class="tab-pane <?php if ($param == 'emailTemplete') { ?>active <?php } ?>" id="email-template"  >
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($settingsEmailTempletes as $email) {
                                            ?>
                                            <tr>
                                                <td><?php echo $email['display']; ?></td>
                                                <td>
                                                    <a href="<?php echo HTTP_ROOT . 'appadmins/edit_mail_templetes/' . $email->id; ?>" data-placement="top" data-hint="Edit" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;"><i class="fa fa-edit"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div id="email-template-msg"></div>
                        </div>

                        <div class="tab-pane <?php if ($param == 'contact-map') { ?>active <?php } ?>" id="map">
                            <?= $this->Form->create(@$mapdata, array('data-toggle' => "validator", 'id' => 'change_password')); ?>
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label for="exampleInputEmail">Code<span style="color:#FF0000">*</span></label>
                                    <?= $this->Form->input('code', ['type' => 'textarea', 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter your gogole map address code', 'value' => @$row->code]); ?>
                                    <div class="help-block with-errors"></div>
                                    <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                                </div>

                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <?= $this->Form->submit('Save', ['type' => 'submit', 'class' => 'btn btn-success', 'name' => 'map', 'style' => 'margin-left:15px;
            ']) ?>
                                </div>
                                <?= $this->Form->end() ?>
                            </div>

                            <!-- /.tab-pane -->
                        </div>
                    </div>
                </div>
                </section>
            </div>

