<div class="content-wrapper">
    <section class="content-header">
        <h1>
            All Properties' Bank Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/bank_details"> <i class="fa fa-list"></i>Bank Details</a></li>
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
                                    <th>Bank Name</th>
                                    <th>IBAN</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($intersect as $val): ?>
                                    <tr id="<?php echo $val->id; ?>" class="message_box">
                                        <td><?= h($val->description->propertyName) ?></td>
                                        <td>
                                            <?php
                                                $getpgstatus=$this->User->extUserDetails($val->user_id);
                                            ?>
                                    <?= h($getpgstatus->bank_name) ?></td>
                                        <td><?= h($getpgstatus->account_iban) ?></td>

                                        <td style="text-align: center;">
                                            <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-edit')), ['action' => 'editBankDetails', $val->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Edit", 'title' => 'Edit', 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
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