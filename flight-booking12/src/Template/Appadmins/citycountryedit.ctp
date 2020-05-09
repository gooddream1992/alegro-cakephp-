<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit Airport Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?php echo HTTP_ROOT.'appadmins/citycountry' ?>"> Airport List</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                      <form method="post" action="<?= $this->Url->build([ "controller" => "Appadmins", "action" => "citycountryedit",$locations->id]);?>">
                        <div class="row">
                          <div class="col-sm-6">
                            <label >Airport Name</label>
                            <input type="text" class="form-control"  name="data" required value="<?php if(!empty($locations->data)){ echo $locations->data; } ?>" >
                          </div>
                          <div class="col-sm-6">
                            <label >Short Name</label>
                            <input type="text" class="form-control" readonly value="<?=$locations->value;?>">
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-6">
                            <label >City</label>
                            <input type="text" class="form-control" name="city" required value="<?php if(!empty($locations->city)){ echo $locations->city; } ?>">
                          </div>
                          <div class="col-sm-6">
                            <label >Country</label>
                            <input type="text" class="form-control" name="country" required value="<?php if(!empty($locations->country)){ echo $locations->country; } ?>">
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-sm-6">
                            <input type="submit" class="btn btn-info" name="update" value="Update" >
                          </div>
                          <div class="col-sm-6">

                          </div>
                        </div>
                      </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
