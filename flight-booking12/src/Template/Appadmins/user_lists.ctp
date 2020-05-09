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
    <link rel="stylesheet" href="<?php echo HTTP_ROOT ?>dist/css/datepicker.min.css" type="text/css">
    <script src="<?php echo HTTP_ROOT ?>js/jquery-3.3.1.min.js" ></script>
    <script src="<?php echo HTTP_ROOT ?>dist/js/datepicker.js"></script>
    <script src="<?php echo HTTP_ROOT ?>dist/js/i18n/datepicker.en.js"></script>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box" style="height:80px;">
                    
                    <div class="col-sm-5">
                        <div class="">
                            <label>Total number of registered passengers in a Day <span><?php echo $dayPassanger;?> </span></label>
                            <label><p>Total number of registered passengers Current Month <?php echo $monthPassanger;?></p></label>
                            <label><p>Total number of registered passengers Current Year <?php echo $yearPassanger;?></p></label>
                            
                        </div>
                    </div>

                   
                    
                </div>

                <div class="box" style="height:80px;">
                    <?= $this->Form->create(null, ['type' => 'get']); ?>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <label>Form Date : </label>
                            <input type="text" name="formdate" class="form-control datepicker-here box3" value="<?= isset($_GET['formdate']) ? $_GET['formdate'] : ''; ?>">
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="">
                            <label>To Date : </label>
                            <input type="text" name="todate" class="form-control datepicker-here box3" value="<?= isset($_GET['formdate']) ? $_GET['todate'] : ''; ?>">
                        </div>
                    </div>
                    <div class="col-sm-2"><input type="submit" class="btn btn-primary" style="margin-top:10px;" value="Search"></div>
                    <?= $this->Form->end(); ?>
                </div>


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
                                    $userdetails = $this->User->usrdetHelper($data->id);
                                    ?>
                                    <tr>
                                        <td><?php echo $data->id ?></td>
                                        <td><?php echo $data->name ?></td>
                                        <td><?php echo $data->email ?></td>
                                        <td><?php echo @$userdetails->phone_number ?></td>
                                        <td><?php echo $data->created_dt ?></td>
                                        <td style="text-align: center"> 
                                            <a href="<?php echo HTTP_ROOT . 'appadmins/edit_pessanger/' . $data->id; ?>"> <?= $this->Form->button('<i class="fa fa-edit"></i>', ["data-placement" => "top", 'title' => 'Edit', 'class' => "btn btn-info hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a>
                                            <?php if ($data->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $data->id . '/Users' ?>"><?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", 'title' => 'active', "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a> 
                                            <?php } else { ?> <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $data->id . '/Users' ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", 'title' => 'Inactive', "data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a> <?php } ?>
                                            <?= $this->Html->link($this->Html->tag('i', 'p', array('class' => 'fa fa-fw fa-gg')), ['action' => 'set_password', $data->id], ['escape' => false, "data-placement" => "top", 'title' => 'Setpassword', "data-hint" => "Set New Password", 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <a onclick='return confirm("Are you sure want to delete ??")' href="<?php echo HTTP_ROOT . 'appadmins/delete/' . $data->id . '/Users' ?>" style="padding: 0 7px!important;" class="btn btn-danger hint--top  hint" title='Delete' data-hint="Delete" data-placement="top" href="javascript:;"><i class="fa fa-trash"></i></a>
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