<?= $this->Flash->render() ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Airport List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <!-- <li class="active"><a href="<?php echo HTTP_ROOT.'appadmins/create_testimonial' ?>">Airport List</a></li> -->
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="20%">Airport Name</th>
                                    <th width="10%">Short Name</th>
                                    <th width="30%">City</th>
                                    <th width="30%">Country</th>
                                    <th width="5%">Action</th>

                                </tr>
                            </thead>

                            <tbody>
                              <?php foreach($locations as $val){

                              ?>

                              <tr>
                                  <td width="5%"><?= $val->id; ?></td>
                                  <td width="20%"><?= $val->data; ?></td>
                                  <td width="10%"><?= $val->value; ?></td>
                                  <td width="35%"><?php if(!empty($val->city)){ echo $val->city; } ?></td>
                                  <td width="30%"><?php if(!empty($val->country)){ echo $val->country; } ?></td>
                                  <td width="5%"><a  href="<?= $this->Url->build([ "controller" => "Appadmins", "action" => "citycountryedit",$val->id]);?>" style="padding: 0 7px!important;" class="btn btn-info hint--top  hint" ><i class="fa fa-edit"></i></a></td>
                              </tr>
                              <?php } ?>
                            </tbody>

                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
