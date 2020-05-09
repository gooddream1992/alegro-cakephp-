<div class="content-wrapper">
    <section class="content-header">
        <h1>
            All Bookings
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/manage_hotel_booking"> <i class="fa fa-list"></i>All Bookings</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">

<!--                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Property Owner</th>
                                    <th>Property Type</th>
                                    <th>Location</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($intersect as $val): ?>
                                    <tr id="<?php echo $val->id; ?>" class="message_box">
                                        <td><?= h($val->description->propertyName) ?></td>
                                        <td><?= h($this->User->extUserDetails($val->user_id)->diapaly_name) ?></td>
                                        <td><?= h($val->property_type) ?></td>
                                        <td><?= h($val->location->city) ?></td>

                                        <td style="text-align: center;">
                                            
                                            <?php // $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'create_admin', $val->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View", 'title' => 'Edit', 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deleteProperty', $val->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'title' => 'Delete', 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                            
                                            <?php if ($val->active_ststus == 0) {
                                            ?>
                                            <a href="<?= HTTP_ROOT . 'appadmins/property_active/' . $val->id . '/active'; ?>"><button data-placement ="top" data-hint= "De-Active" title = 'De-Active'class="btn btn-danger hint--top  hint" style = 'padding: 0 7px!important;'><i class="fa fa-times"></i></button> </a>
                                        <?php } else {
                                            ?>
                                            <a href="<?= HTTP_ROOT . 'appadmins/property_active/' . $val->id . '/deactive'; ?>"><button data-placement ="top" data-hint= "Active" title = 'Active'class="btn btn-success hint--top  hint" style = 'padding: 0 7px!important;'><i class="fa fa-check"></i></button></a>
                                            <?php
                                        } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </table>-->

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>