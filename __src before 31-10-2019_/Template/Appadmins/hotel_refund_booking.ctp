<div class="content-wrapper">
    <section class="content-header">
        <h1>
            All Guest Refunds
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
                                        <td><?= 'ALEX' . str_pad($val->id, 4, '0', STR_PAD_LEFT);?></td>
                                        <td><?= $val->user_firstname.' '. $val->user_lastname; ?></td>
                                        <td>
                                            <?php $getpgstatus=$this->User->extUserDetails($val->user_id);?>
                                            <?= h($getpgstatus->bank_name) ?>
                                        </td>
                                        <td><?= h($getpgstatus->account_iban) ?></td>
                                        <td><?= $val->cancel_policy; ?></td>
                                        <td><?php echo @date_format(@$val->booking_dt,'d M Y') ; ?></td>
                                        <td><?= 'AOA'.' '. changeFormat(number_format($val->total_cost,2)); ?></td>
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
                                                    echo "Awaiting Confirmation";
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
                                            <?php if($val->payment_status==3){ ?>
                                            <a data-placement="top" data-hint="Send Payment" title="Send Payment" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;" data-toggle="modal" data-target="#myModal1ad<?php echo $val->id;  ?>" ><i class="fa fa-dollar"></i></a>
                                            <?php } else{ ?>
                                            <a data-placement="top" data-hint="Payment Sent" disabled="disabled" title="Payment Sent" class="btn btn-info hint--top  hint" style="padding: 0 7px!important;" ><i class="fa fa-dollar"></i></a>
                                            <?php } ?>
                                        </td>
                                        
                                    </tr>
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