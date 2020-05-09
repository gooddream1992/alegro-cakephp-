 
<?php echo $this->Html->script(array('ckeditor/ckeditor')); ?> 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo ($id != '') ? "Edit page" : "Add page"; ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?= h(HTTP_ROOT) ?>Pages/listing-page"> <?= __('Page listing') ?></a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <!-- general form elements -->
                <div class="box box-info">

                    <!-- form start -->
                    <?= $this->Form->create($page, array('data-toggle' => "validator")) ?>
                    <div class="box-body">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName">Title</label>
                                <?= $this->Form->input('page_title', ['placeholder' => "Enter page title", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter page title']); ?>
                                <div class="help-block with-errors"></div>
                            </div> 

                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName">Description</label>
                                <?= $this->Form->input('page_desc', ['placeholder' => "Enter page title", 'class' => "form-control ckeditor", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter page description']); ?>
                                <!--<div class="help-block with-errors"></div>-->
                            </div>  
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName">Short description</label>
                                <?= $this->Form->input('short_desc', ['placeholder' => "Enter short description", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'data-error' => 'Enter short description']); ?>
                                <!--<div class="help-block with-errors"></div>-->
                            </div>  
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputMetatitle">Meta title</label>
                                <?= $this->Form->input('meta_title', ['placeholder' => "Enter meta title", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter meta title']); ?>
                                <div class="help-block with-errors"></div>
                            </div>  
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputMetaKeyword">Meta keyword</label>
                                <?= $this->Form->input('meta_keyword', ['placeholder' => "Enter meta keyword", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter meta keyword']); ?>
                                <div class="help-block with-errors"></div>
                            </div>  
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputMetadescription">Meta description</label>
                                <?= $this->Form->input('meta_description', ['placeholder' => "Enter meta description", 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter meta description']); ?>
                                <div class="help-block with-errors"></div>
                            </div>  
                        </div>
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <?php if ($id == '') { ?>
                            <?= $this->Form->button('Add Page', ['class' => 'btn btn-success', 'style' => 'float:left;margin-left:17px;']) ?>
                        <?php } else { ?>
                            <?= $this->Form->button('Update Page', ['class' => 'btn btn-success', 'style' => 'float:left;margin-left:17px;']) ?>
                        <?php } ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

