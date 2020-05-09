
<div class="content-wrapper">
    <section class="content-header">
        <h1>Create Faq </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/view_faq"> <i class="fa fa-list"></i>Faq List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

                    <?= $this->Form->create($user, array('data-toggle' => "validator", 'enctype' => "multipart/form-data")); ?>
                    <div class="box-body">
                        <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                        <div class="col-md-6" style="margin-top: 27px;">
                            <div class="form-group">
                                <label for="exampleInputName"> Choose your Language<span style="color: red;">*</span></label>
                                <?php $options = array('EN' => 'EN', 'PT' => 'PT', 'ER' => 'ER'); ?>

                                <?= $this->Form->select('language', $options, ['class' => "form-control",'default' => @$editData->language]); ?>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Choose your Category<span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
                                <?php //$options = array('General questions' => 'General questions', 'Sellers' => 'Sellers', 'Buyers' => 'Buyers'); ?>

                                <?= $this->Form->select('category', $catoptions, ['class' => "form-control",'default'=>@$editData->category]); ?>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="exampleInputEmail">Title <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

                                <?= $this->Form->input('title', ['type' => 'text', 'placeholder' => "Enter Title",'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$editData->title, 'required' => "required", 'data-error' => 'Enter your title']); ?>
                                <?= $this->Form->input('id', ['type' => 'hidden',   'value' => @$editData->id]); ?>

                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="exampleInputEmail">Description <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

                                <?= $this->Form->input('description', ['type' => 'textarea', 'placeholder' => "Enter Description", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$editData->description, 'required' => "required", 'data-error' => 'Enter your description']); ?>

                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>

                    </div>
                    <div class="box-footer">

                        <?php
                        if (@$id) {
                            echo $this->Form->button('Update', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        } else {
                            echo $this->Form->button('Save', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        }
                        ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>