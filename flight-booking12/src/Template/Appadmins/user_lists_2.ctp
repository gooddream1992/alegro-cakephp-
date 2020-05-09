<?= $this->Flash->render() ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
                                    <th>Phone</th>
                                    <th>Create Dt.</th>
                                    <th style="text-align: center">Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($getDatas as $data) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->id ?></td>
                                        <td><?php echo $data->name ?></td>
                                        <td><?php echo $data->email ?></td>
                                        <td><?php echo $data->phone ?></td>
                                        <td><?php echo $data->created_dt ?></td>
                                        <td style="text-align: center"> 
                                            <?php if ($data->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $data->id . '/Users' ?>"><?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a> 
                                            <?php } else { ?> <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $data->id . '/Users' ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a> <?php } ?>
                                            <a onclick='confirm("Are you sure want to delete ??")' href="<?php echo HTTP_ROOT . 'appadmins/delete/' . $data->id . '/Users' ?>" style="padding: 0 7px!important;" class="btn btn-danger hint--top  hint" data-hint="Delete" data-placement="top" href="javascript:;"><i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                <?php } ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Avatar</th>
                                    <th>Phone Number</th>
                                    <th>Joined Date</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->