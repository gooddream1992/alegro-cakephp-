
<div class="content-wrapper">
    <section class="content-header">
        <h1>Create category </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/view_category"> <i class="fa fa-list"></i>Category List</a></li>
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
                     
                   
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="exampleInputEmail">category name <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>

                                <?= $this->Form->input('category_name', ['type' => 'text', 'placeholder' => "Enter category",'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'value' => @$editData->category_name, 'required' => "required", 'data-error' => 'Enter your Category Name']); ?>
                                <?= $this->Form->input('id', ['type' => 'hidden',   'value' => @$editData->id]); ?>

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