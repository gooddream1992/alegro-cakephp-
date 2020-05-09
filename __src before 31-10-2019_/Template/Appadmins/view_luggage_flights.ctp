<div class="content-wrapper">
    <section class="content-header">
        <h1>Luggage Per Flights Listing</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a class="active-color" href="<?= h(HTTP_ROOT) ?>appadmins/luggage_per_flights">   <i class="fa  fa-user-plus"></i> Add New Luggage Per Flights</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <?php if (!empty($this->request->params['pass'][0]) && $this->request->params['pass'][0] == "dashboard") { ?>
                        <a href="<?php echo HTTP_ROOT; ?>appadmins/index"> 
                            <button class="btn btn-warning" type="submit" style="float: right; margin-top: -4%; margin-right: 20%;"> BACK</button> </a><?php } ?>
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Airline name</th>
                                    <th>Airport Type</th>
                                    <th>Cabin Type</th>
                                    <th>No of Bag</th>
                                    <th>Allowed Weight (kg)</th>
                                    <th>No of hand Bag</th>
                                    <th>Allowed Hand Bag Weight (kg)</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datas as $data): ?>
                                    <tr id="<?php echo $data->id; ?>" class="message_box">
                                        <td><?= h($cnt[$data->airline_name]) ?></td>
                                        <td><?= h($data->airport_type) ?></td>
                                        <td><?= h($data->cabin_type) ?></td>
                                        <td><?= h($data->no_of_bag) ?></td>
                                        <td><?= h($data->allowed_weight) ?></td>
                                        <td><?= h($data->no_of_hand_bag) ?></td>
                                        <td><?= h($data->allowed_hand_bag_weight) ?></td>
                                        <td style="text-align: center;">
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'luggage_per_flights', $data->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'title' => 'Edit', 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deleteLuggage', $data->id, 'LuggagePerFlights'], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'title' => 'Delete', 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section>
    <!-- /.content -->
</div>


