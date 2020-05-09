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

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Check-in Date</th>
                                    <th>Check-out Date</th>
                                    <th>Total</th>
                                    <th>Commission</th>
                                    <th>Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($getBookingDetails as $val): ?>
                                    <tr id="<?php echo $val->id; ?>" class="message_box">
                                        <td><?= 'ALEX' . str_pad($val->id, 4, '0', STR_PAD_LEFT);?></td>
                                        <td><?php echo date_format($val->booking_dt, 'd') . " " . __(date_format($val->booking_dt, 'M')) . " " . date_format($val->booking_dt, 'Y'); ?></td>
                                        <td><?php echo date_format($val->check_in, 'd') . " " . __(date_format($val->check_in, 'M')) . " " . date_format($val->check_in, 'Y'); ?></td>
                                        <td><?php echo date_format($val->check_out, 'd') . " " . __(date_format($val->check_out, 'M')) . " " . date_format($val->check_out, 'Y'); ?></td>
                                        <td><?=changeFormat(number_format($val->total_cost,2));?></td>
                                        <td><?= $this->User->getSeviceFee(@$val->property_id); ?>%</td>
                                        <td>
                                            <?php
                                            $pyts = $val->payment_status;
                                            switch ($pyts) {
                                                case 1:
                                                    echo "Pending";
                                                    break;
                                                case 2:
                                                    echo "Cancel";
                                                    break;
                                                case 3:
                                                    echo "Paid";
                                                    break;
                                                case 4:
                                                    echo "Cancel";
                                                    break;
                                                case 5:
                                                    echo "Payment Sent";
                                                    break;
                                                default:
                                                    echo '-';
                                                    break;
                                            }
                                            ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'PropertyBookingOverview', $val->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View", 'title' => 'View', 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                        </td>

                    <!--                                        <td style="text-align: center;">
                                                                
                                        <?php // $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-eye')), ['action' => 'create_admin', $val->id], ['escape' => false, "data-placement" => "top", "data-hint" => "View", 'title' => 'Edit', 'class' => 'btn btn-info hint--top  hint', 'style' => 'padding: 0 7px!important;']); ?>
                                        <?= $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-trash')), ['action' => 'deleteProperty', $val->id], ['escape' => false, "data-placement" => "top", "data-hint" => "Delete", 'title' => 'Delete', 'class' => 'btn btn-danger hint--top  hint', 'style' => 'padding: 0 7px!important;', 'confirm' => __('Are you sure you want to delete Admin ?')]); ?>
                                                                
                                        <?php if ($val->active_ststus == 0) {
                                            ?>
                                                                                    <a href="<?= HTTP_ROOT . 'appadmins/property_active/' . $val->id . '/active'; ?>"><button data-placement ="top" data-hint= "De-Active" title = 'De-Active'class="btn btn-danger hint--top  hint" style = 'padding: 0 7px!important;'><i class="fa fa-times"></i></button> </a>
                                        <?php } else {
                                            ?>
                                                                                    <a href="<?= HTTP_ROOT . 'appadmins/property_active/' . $val->id . '/deactive'; ?>"><button data-placement ="top" data-hint= "Active" title = 'Active'class="btn btn-success hint--top  hint" style = 'padding: 0 7px!important;'><i class="fa fa-check"></i></button></a>
                                        <?php }
                                        ?>
                                                            </td>-->
                                    </tr>
                                <?php endforeach; ?>
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