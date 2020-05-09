<div class="content-wrapper">
   <?php echo $this->element('admin_header')?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
       <?php echo $this->element('admin_sidebar')?>
        <!-- /.sidebar -->
    </aside>
    <section class="content-header">
        <h1>
            Registered Passengers
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Registered Passengers</li>
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
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Created</th>
                                    <th>Modified</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($getDatas as $data){
                                ?>
                                <tr>
                                    <td><?php echo $data->id?></td>
                                    <td><?php echo $data->name?></td>
                                    <td><?php echo $data->email?></td>
                                    <td><?php echo $data->created_dt?></td>
                                    <td>000000</td>

                                </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <  <td><?php echo $data->id?></td>
                                    <td><?php echo $data->name?></td>
                                    <td><?php echo $data->email?></td>
                                    <th>Created</th>
                                    <th>Modified</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div>