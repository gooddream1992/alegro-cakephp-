<?= $this->Flash->render() ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Service Fee
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-body">
                        <?=$this->Form->create(null,array(['type'=>'post']));?>
                        <div class="box-body">
                        <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                        <div class="col-md-6" style="margin-top: 27px;">
                            <div class="form-group">
                                <label for="exampleInputName"> International Fee <span style="color: red;">*</span></label>
                                <div class="input text required"><input type="number" name="international" placeholder="Enter International Fee" class="form-control" kl_virtual_keyboard_secure_input="on" required="required" data-error="Enter name" maxlength="100" id="name" autocomplete="off"  value="<?=$data->international;?>" ></div>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Domestic Fee<span style="color: red;">*</span></label>
                                <div class="input text"><input type="number" name="domestic" placeholder="Enter Domestic Fee" class="form-control" kl_virtual_keyboard_secure_input="on" id="surname" autocomplete="off"  value="<?=$data->domestic;?>"></div>
                            </div>
                        </div>
                        
                        
                           
                        

                    </div>
                        <div class="box-footer">

                        <button class="btn btn-primary" style="float:left;margin-left:15px;" type="submit">Update Fee</button>                    </div>
                        <?=$this->Form->end();?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->