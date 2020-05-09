<?= $this->Flash->render() ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Notification List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?php echo HTTP_ROOT.'appadmins/create_notification' ?>">Create A Notification</a></li>
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
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th style="text-align: center">Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($getDatas as $data) {
                                    ?>
                                    <tr>
                                        <td><?php echo $data->id ?></td>
                                        <td><?php if($data->notifi_type == 1){echo "Global";}else if($data->notifi_type == 2){echo "User";} ?></td>
                                        <td><?php echo $data->notifi_date ?></td>
                                        <td><?php echo $data->notification_subject ?></td>
                                        <td><?php echo $data->notifi_msg ?></td>
                                        <td style="text-align: center"> 
                                             <a onclick='return confirm("Are you sure want to delete ??")' href="<?php echo HTTP_ROOT . 'appadmins/delete/' . $data->id . '/UserNotifications' ?>" style="padding: 0 7px!important;" class="btn btn-danger hint--top  hint" title='Delete' data-hint="Delete" data-placement="top" href="javascript:;"><i class="fa fa-trash"></i></a>
                                        </td>

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