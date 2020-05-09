<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Request Alegro Commission
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/manage_hotel_booking"> <i class="fa fa-list"></i>Alegro Comission(</a></li>
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
                                    <th>Property Name</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($getBookingDetails as $val): ?>
                                    <tr id="<?php echo $val->id; ?>" class="message_box">
                                        <td><?= 'ALEX' . str_pad($val->id, 4, '0', STR_PAD_LEFT); ?></td>
                                        <td>
                                            <?= $this->User->getHotelName($val->booking_no); ?></td>
                                        <td><?php echo date_format($val->booking_dt, 'd') . " " . __(date_format($val->booking_dt, 'M')) . " " . date_format($val->booking_dt, 'Y'); ?></td>
                                        <td>AOA <?= changeFormat(number_format((($val->total_cost * ($val->service_fee / 100))), 2)); ?></td>
                                        <td><?php
                                            $pyts = $val->request_alegro_commission;
                                            switch ($pyts) {
                                                case 1:
                                                    echo "Request Commission";
                                                    break;
                                                case 2:
                                                    echo "Requested";
                                                    break;
                                                default :
                                                    echo "Request Commission";
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php if (($val->request_alegro_commission == 1) || empty($val->request_alegro_commission)) { ?>
                                                <a data-placement="top" data-hint="Request Commission" title="Request Commission" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;" data-toggle="modal" data-target="#myModal1ad<?php echo $val->id; ?>" ><i class="fa fa-dollar"></i></a>
                                            <?php } else { ?>
                                                <a data-placement="top" data-hint="Requested" disabled="disabled" title="Requested" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;" ><i class="fa fa-dollar"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <div class="modal fade new-message delet-message" id="myModal1ad<?php echo $val->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                                <h4 class="modal-title"><?= __("Request Commission"); ?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __("Would you like to request this ") . 'AOA' . ' ' . changeFormat(number_format((($val->total_cost * ($val->service_fee / 100))), 2)) . ' from ' . $this->User->getHotelName($val->booking_no) . ' ?'; ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default cancel-m" data-dismiss="modal"><?= __("No"); ?></button>
                                                <a class="btn btn-primary" href="<?= HTTP_ROOT; ?>appadmins/get_commision_paid/<?= $val->id; ?>"><?= __("Yes"); ?></a>
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