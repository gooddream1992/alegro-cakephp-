<div class="content-wrapper">
    <section class="content-header">
        <h1>
            All Guests' Refunds
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Lead Guest</th>
                                    <th>Bank Name</th>
                                    <th>IBAN</th>
                                    <th>Cancellation Policy</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($alldata as $val): ?>
                                    <tr id="<?php echo $val->id; ?>" class="message_box">
                                        <td><?= 'ALEX' . str_pad($val->id, 4, '0', STR_PAD_LEFT); ?></td>
                                        <td><?= $val->user_firstname . ' ' . $val->user_lastname; ?></td>
                                        <td>

                                            <?= h($val->lead_guest_bank_name) ?>
                                        </td>
                                        <td><?= h($val->lead_guest_iban) ?></td>
                                        <td><?= $val->cancel_policy; ?></td>
                                        <td><?php echo @date_format(@$val->refund_date, 'd M Y'); ?></td>
                                        <td><?= 'AOA' . ' ' . changeFormat(number_format($val->total_cost, 2)); ?></td>
                                        <td>
                                            <?php
                                            $pyts = $val->guest_refund_status;
                                            switch ($pyts) {
                                                case 1:
                                                    echo "Refund Initiated";
                                                    break;
                                                case 2:
                                                    echo "Refunded";
                                                    break;
                                                default :
                                                    echo "Refund Initiated";
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php if (($val->guest_refund_status == 1) || empty($val->guest_refund_status)) { ?>
                                                <a data-placement="top" data-hint="Send Payment" title="Send Payment" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;" data-toggle="modal" data-target="#myModal1ad<?php echo $val->id; ?>" ><i class="fa fa-dollar"></i></a>
                                            <?php } else { ?>
                                                <a data-placement="top" data-hint="Payment Sent" disabled="disabled" title="Payment Sent" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;" ><i class="fa fa-dollar"></i></a>
                                            <?php } ?>

                                            <a data-placement="top" data-hint="edit bank details" title="edit bank details" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;" href="<?php echo HTTP_ROOT . 'appadmins/edit_leading_guest_bank_details/' . $val->id; ?>" ><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                <div class="modal fade new-message delet-message" id="myModal1ad<?php echo $val->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                <h4 class="modal-title"><?= __("Send Refund"); ?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __("Did you already refund this ") . 'AOA' . ' ' . changeFormat(number_format($val->total_cost, 2)); ?> to <?= $val->user_firstname . ' ' . $val->user_lastname; ?> </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default cancel-m" data-dismiss="modal"><?= __("No"); ?></button>
                                                <a class="btn btn-primary" href="<?= HTTP_ROOT; ?>appadmins/refund_payment/<?= $val->id; ?>"><?= __("Yes"); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php

function changeFormat($pri) {
    $dat = explode('.', $pri);
    $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
    return $f;
}
?>