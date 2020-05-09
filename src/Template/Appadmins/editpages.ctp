<link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>backend/dist/css/highlight.css" />
 <link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>backend/dist/css/redactor.min.css" />
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
                    <?= $this->Form->create($dataEntity, array('data-toggle' => "validator")) ?>
                    <div class="box-body">
                        
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleLanguage">Language</label>
                                <?= $this->Form->select('lag',  ['PT'=>'PT','EN'=>'EN','FR'=>'FR'], ['default' => $sel,'class' => "form-control", 'label' => false,'onchange'=>'urlredirect(this)']); ?>
                                
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName">Title</label>
                                <?= $this->Form->input('page_title', ['value' => $row->page_title, 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter page title']); ?>
                                <?= $this->Form->input('id', ['value' => $row->id, 'type' => 'hidden']); ?>
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>

                        <div class="col-xs-12">
                        </div>
                        <?php
                            $x=[17,9,18,19,20,21];
                        if(! in_array($id, $x)){?>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName">Page contain</label>
                                 <textarea id="redactor" name="page_desc" data-redactor-uuid="0" class="redactor-source" style="height: 888px;" data-gramm_editor="false"><?php echo $row->page_desc; ?></textarea>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputMetatitle">Meta title</label>
                                <?= $this->Form->input('meta_title', ['value' => $row->meta_title, 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter meta title']); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputMetaKeyword">Meta keyword</label>
                                <?= $this->Form->input('meta_keyword', ['value' => $row->meta_keyword, 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter meta keyword']); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputMetadescription">Meta description</label>
                                <?= $this->Form->input('meta_desc', ['value' => $row->meta_desc, 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter meta description','type'=>'text']); ?>
                                
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        
                        
                        
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <?= $this->Form->button('Update Page', ['class' => 'btn btn-success', 'style' => 'float:left;margin-left:17px;']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->

        </div>   <!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
    function urlredirect(x){
        var r ="http://" +window.location.hostname+"/appadmins/editpages/"+<?=$id;?>+'/'+x.value;
        window.location.href=r;
        
    }
    
</script>