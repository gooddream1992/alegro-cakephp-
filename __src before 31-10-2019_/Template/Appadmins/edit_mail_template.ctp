<link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>backend/dist/css/highlight.css" />
<link rel="stylesheet" type="text/css" href="<?php echo HTTP_ROOT ?>backend/dist/css/redactor.min.css" />
<style>
    .cke_top,
    .cke_bottom {
        background-color: #fff !important;
    }

    .cke_top {
        border-bottom-color: rgba(216, 226, 239, 0.4) !important;
    }

    .cke_bottom {
        border-top-color: rgba(216, 226, 239, 0.4) !important;
    }

    .cke {
        border: 1px solid #ced4da !important;
        border-radius: 0 !important;
        overflow: hidden !important;
    }
    .cke a {
        border-radius: 0 !important;
    }
    .cke a,
    .cke a * {
        cursor: pointer !important;
    }
    .cke a.cke_button_off:hover, .cke a.cke_button_off:focus, .cke a.cke_button_off:active {
        background: #76daff !important;
        border-color: #76daff !important;
    }
    .cke a.cke_button_on {
        background: #76daff !important;
        border-color: #76daff !important;
    }
    .cke .cke_combo {
        border-radius: 0 !important;
    }
    .cke .cke_combo.cke_combo_off .cke_combo_button:hover, .cke .cke_combo.cke_combo_off .cke_combo_button:focus, .cke .cke_combo.cke_combo_off .cke_combo_button:active {
        background: #76daff !important;
        border-color: #76daff !important;
    }
    .cke .cke_combo.cke_combo_on a.cke_combo_button {
        background: #76daff !important;
        border-color: #76daff !important;
    }
    .cke .cke_toolbar.cke_toolbar_last {
        display: none !important;
    }

    .cke_combo:after,
    .cke_toolbar_separator {
        border-right-color: #dde9fb !important;
    }
    .cke_button__image{
        display: none !important;
    }

</style>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?php echo ($id != '') ? "Edit Mail Template" : ""; ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= h(HTTP_ROOT) ?>appadmins"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?= h(HTTP_ROOT) ?>Edit Mail Template"> <?= __('Edit Mail Template') ?></a></li>
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
                    <?= $this->Form->create('', array('data-toggle' => "validator")) ?>
                    <div class="box-body">

                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleLanguage">Language</label>
                                <?= $this->Form->select('lag', ['PT' => 'PT', 'EN' => 'EN', 'FR' => 'FR'], ['default' => empty($lan)?'EN':$lan, 'class' => "form-control", 'label' => false, 'onchange' => 'urlredirect(this)']); ?>

                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName">Title</label>
                                <?= $this->Form->input('display', ['value' => $edit_data->display, 'class' => "form-control", 'label' => false, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'Enter page title']); ?>
                                <?= $this->Form->input('id', ['value' => $edit_data->id, 'type' => 'hidden']); ?>
                                <div class="help-block with-errors"></div>
                            </div>

                        </div>

                        <div class="col-xs-12">
                        </div>
                        <?php
                        $value = 'value';
                        if (!empty($lan == 'EN')) {
                            $value = 'value';
                        }
                        if (!empty($lan == 'PT')) {
                            $value = 'value_PT';
                        }
                        if (!empty($lan == 'FR')) {
                            $value = 'value_FR';
                        }
                        ?>
                        <input type="hidden" name="col_name" value="<?= $value; ?>" >
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputName">Mail Template</label>
                                <textarea id="editor1" name="editor1" data-redactor-uuid="0" class="editor1" style="height: 888px;" ><?php echo $edit_data->$value; ?></textarea>
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


    CKEDITOR.replace('editor1');</script>
<script>
    function urlredirect(x) {
        var r = "http://" + window.location.hostname + "/appadmins/edit_mail_template/" +<?= $id; ?> + '/' + x.value;
        window.location.href = r;
    }

</script>