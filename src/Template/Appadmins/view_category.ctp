<?= $this->Flash->render() ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Category List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a href="<?php echo HTTP_ROOT . 'appadmins/create_category' ?>">Add Category</a></li>
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
                                    <th width="15%">ID</th>
                                    <th width="40%">Category Name</th>
                                    <th style="text-align: center" width="20%">Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($cafaqLists as $data) {
                                    $i++;
                                    ?>
                                    <tr>
                                        <td width="15%"><?php echo $i; ?></td>
                                        <td width="40%"><?php echo $data->category_name; ?></td>

                                        <td style="text-align: center" width="20%">                                           

                                            <?php if ($data->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $data->id . '/FaqCategory'; ?>"> <?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", "data-hint" => "Active", 'title' => 'Active', 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                            <?php } else { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $data->id . '/FaqCategory'; ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", "data-hint" => "Inactive", 'title' => 'Inactive', 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a>
                                            <?php } ?>

                                            <a onclick='return confirm("Are you sure want to delete ??")' href="<?php echo HTTP_ROOT . 'appadmins/delete/' . $data->id . '/FaqCategory' ?>" style="padding: 0 7px!important;" class="btn btn-danger hint--top  hint" title='Delete' data-hint="Delete" data-placement="top" href="javascript:;"><i class="fa fa-trash"></i></a>


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