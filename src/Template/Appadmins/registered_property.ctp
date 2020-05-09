<div class="content-wrapper">
    <section class="content-header">
        <h1>
            All Properties
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/registered_property"> <i class="fa fa-list"></i>Property List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Property Name</th>
                                    <th>Phone Number</th>
                                    <th>Property Type</th>
                                    <th>Province</th>
									<th>Municipality</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($intersect as $val): ?>
                                    <tr id="<?php echo $val->id; ?>" class="message_box">
                                        <td><?= h($val->description->propertyName) ?></td>
                                        <td>
                                            <?php
                                                $getpgstatus=$this->User->usrdetHelper($val->user_id);
                                            ?>
                                    <?= h($getpgstatus->phone_number) ?></td>
                                        <td><?= h($val->property_type) ?></td>
                                        <td><?= h($val->location->state) ?></td>
										<td><?= h($val->location->city) ?></td>

                                        <td style="text-align: center;">

                                            <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'reviewProperty', $val->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View", 'title' => 'View', 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                            
                                            <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deleteProperty', $val->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'title' => 'Delete', 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete this property ?')]); ?>

                                            <?php if ($val->active_ststus == 0) {
                                                ?>
                                                <a href="<?= HTTP_ROOT . 'appadmins/property_active/' . $val->id . '/active'; ?>"><button data-placement ="top" data-hint= "De-Active" title = 'De-Active'class="btn btn-danger hint--top  hint" style = 'padding: 0 7px!important;'><i class="fa fa-times"></i></button> </a>
                                            <?php } else {
                                                ?>
                                                <a href="<?= HTTP_ROOT . 'appadmins/property_active/' . $val->id . '/deactive'; ?>"><button data-placement ="top" data-hint= "Active" title = 'Active'class="btn btn-success hint--top  hint" style = 'padding: 0 7px!important;'><i class="fa fa-check"></i></button></a>
                                                <?php }
                                            ?>
                                                
                                            <a href="<?= HTTP_ROOT . 'appadmins/all_review/' . $val->id ; ?>"><button data-placement ="top" data-hint= "ADD REVIEW" title = 'ADD REVIEW'class="btn btn-primary hint--top  hint" style = 'padding: 0 7px!important;'><i class="fa fa-star"></i></button></a>
                                            
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </section>
</div>