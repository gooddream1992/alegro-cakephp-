<div class="content-wrapper">
    <section class="content-header">
        <h1>
            All Email Templates
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/mail_template"> <i class="fa fa-list"></i>All Mail Template</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Name</th>
                                    <th>Title</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($all_data as $val): ?>
                                    <tr id="<?php echo $val->id; ?>" class="message_box">
                                        <td><?= $i++; ?></td>
                                        <td><?=$val->name;?></td>
                                        <td><?=$val->display;?></td>
                                        <td style="text-align: center;" ><a href="<?=HTTP_ROOT;?>appadmins/edit_mail_template/<?=$val->id;?>"><i class="fa fa-edit"></i></a></td>


                                    </tr>
<?php endforeach; ?>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>