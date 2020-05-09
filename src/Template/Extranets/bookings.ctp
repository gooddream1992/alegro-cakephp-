<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/extranet/bookings.css" type="text/css">
<?php

function changeFormat($pri) {
    $dat = explode('.', $pri);
    $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
    return $f;
}

$protocol = "https://";
$currUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (!empty($_GET['q'])) {
    ?>
    <script>
        $(function() {
            $('#sel').val('<?= $_GET['q']; ?>');
        });
    </script>
    <?php
}
?>
<script>
    //update URL in js
    function UrlUpdate(uri, key, value) {
        var URL;
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            URL = uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            URL = uri + separator + key + "=" + value;
        }
        window.location.href = URL;
    }
</script>
<style type="text/css">
    table.dataTable.no-footer {
        border: 1px solid #111;
    }
    table.dataTable.no-footer thead{
        background: #f7d74a;
    }
    .dataTables_length{
        display: none;
    }
    .dataTables_wrapper .dataTables_filter input {
        margin-left: 0.5em;
        border: 1px solid #ccc;
        padding: 7px;
        border-radius: 3px;
    }
    .dataTables_wrapper .dataTables_filter input:focus{
        outline: none;
    }
    .dataTables_wrapper .dataTables_paginate span .paginate_button.current {
        color: #333 !important;
        border: 1px solid #f7d74a !important;
        background: #f7d74a !important;
    }
    .dataTables_wrapper .dataTables_paginate span .paginate_button{
        border: 1px solid #ccc !important;
        width: 39px !important;
        padding: 7px 0 !important;
    }
</style>
<div id="Bookings">
    <div class="container">
        <div class="row">
            <section class="earnings">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h2><?= __("Bookings"); ?></h2>
                            <div class="all-earnings">
                                <select id="sel" onchange="UrlUpdate('<?= $currUrl; ?>', 'q', this.value)">
                                    <option value="all"><?= __("All Bookings"); ?></option>
                                    <option value="today"><?= __("Today"); ?></option>
                                    <option value="yesterday"><?= __("Yesterday"); ?></option>
                                    <option value="monthly"><?= __("This Month"); ?></option>
                                    <option value="3month"><?= __("3 Months Ago"); ?></option>
                                    <option value="6month"><?= __("6 Months Ago"); ?></option>
                                    <option value="yearly"><?= __("This Year"); ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="earnings-main">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <a href="booking_details.ctp"></a>
                            <div class="earnings-box">
                                <h3><?php
                                    if (@$getBookingOrder > 1) {
                                        echo __("Orders");
                                    } else {
                                        echo __("Order");
                                    }
                                    ?><span><?php echo number_format(@$getBookingOrder) . "<br>"; ?></span></h3>
                            </div>
                            <div class="earnings-box">
                                <h3><?php
                                    if (@$getBookingOrder > 1) {
                                        echo __("Guests");
                                    } else {
                                        echo __("Guest");
                                    }
                                    ?><span><?php echo number_format(@$getBookingOrder) . "<br>"; ?></span></h3>
                            </div>
                            <div class="earnings-box">
                                <h3><?= __("Alegro Earnings"); ?><span>AOA <?php
                                        $percentagevalue = 0;
                                        $total_value = 0;
                                        foreach ($getBookingPrice as $price_data) {
                                            $total_value += $price_data->total_cost;
                                            $percentagevalue += ($price_data->total_cost * $price_data->service_fee) / 100;
                                        }
                                        // $percentagevalue = ($getBookingPrice*8)/100;
                                        //$total_value = $getBookingPrice-$percentagevalue;
                                        echo changeFormat(number_format($percentagevalue, 2));
                                        //echo changeFormat(number_format($getBookingPrice * ($this->User->getSeviceFee() / 100), 2));
                                        ?></span></h3>
                            </div>
                            <div class="earnings-box">
                                <h3><?= __("My Earnings"); ?><span>AOA <?php
                                        //$percentagevalue = ($getBookingPrice * 8) / 100;
                                        $total_value -= $percentagevalue;
                                        echo changeFormat(number_format($total_value, 2));

                                        //echo changeFormat(number_format($getBookingPrice - ($getBookingPrice * ($this->User->getSeviceFee() / 100)), 2));
                                        ?></span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->

<!--<link href="<?= HTTP_ROOT; ?>backend/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />-->
<!--<script src="<?= HTTP_ROOT; ?>backend/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>-->
<!--<script src="<?= HTTP_ROOT; ?>backend/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>-->
<!--<script type="text/javascript">-->
            <!--$(function () {-->
            <!--$("#table1").dataTable();-->
            <!--});-->
            <!--</script>-->

            <section class="book-revse-part">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h3><?= __("Booking Details"); ?></h3>
                        </div>
                    </div>
                </div>
            </section>


            <section class="sor-tb-ext">
                <div class="container">
                    <table id="example" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?= __("ID"); ?></th>
                                <th><?= __("Guest Name"); ?></th>
                                <th><?= __("Date"); ?></th>
                                <!--<th><?= __("Check-in"); ?></th>-->
                                <!--<th><?= __("Check-out"); ?></th>-->
                                
                                <th><?= __("Booking type"); ?></th>
                                <th><?= __("Total Price"); ?></th>
                                <th><?= __("Commission"); ?></th>
                                <th><?= __("Action"); ?></th>
                                <th><?= __("Status"); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getBookingDetails as $list) { ?>
                                <tr>

                                    <td> <?php echo $list->booking_no; ?></td>
                                    <td><?php echo $list->user_firstname . " " . $list->user_lastname; ?></td>
                                    <td><?php echo date_format($list->booking_dt, 'd') . " " . __(date_format($list->booking_dt, 'M')) . " " . date_format($list->booking_dt, 'Y'); ?></td>
                                    
                                    <!--<td><?php echo date_format($list->check_in, 'd') . " " . __(date_format($list->check_in, 'M')) . " " . date_format($list->check_in, 'Y'); ?></td>-->
                                    <!--<td><?php echo date_format($list->check_out, 'd') . " " . __(date_format($list->check_out, 'M')) . " " . date_format($list->check_out, 'Y'); ?></td>-->
                                    
                                    <td> <?php echo @$list->booking_type==1 ? __('Entire Place') : __('Private Room'); ?></td>
                                    <td>AOA <?php echo changeFormat(number_format(@$list->total_cost, '2')); ?></td>
                                    <td style="text-align: center;"><?= @$list->service_fee; ?>%</td>
                                    <td> <?= '<a href="' . HTTP_ROOT; ?>extranets/booking_details/<?= $list->booking_no . '" target="_blank">'; ?><?= __("View Info"); ?><?= "</a>"; ?></td>
                                    <td><?php
                                        if ($list->user_htl_reach_status == 5) {
                                            echo __("Refunded");
                                        } else {
                                            if ($list->payment_status == 1) {
                                                echo __("Pending");
                                            }if (($list->payment_status == 2) || ($list->payment_status == 4)) {
                                                echo __("Cancelled");
                                            }if (($list->payment_status == 3) || ($list->user_htl_reach_status == 2)) {
                                                echo __("Paid");
                                            }if (($list->payment_status == 5)) {
                                                echo __("Paid");
                                            }
                                            if (($list->payment_status == 6) && ($list->user_htl_reach_status != 2)) {
                                                echo __("Approved");
                                            }
                                        }
                                        ?></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </section>

            <link rel='stylesheet' href='<?php echo HTTP_ROOT; ?>css/extranet/jquery.dataTables.min.css'>
            <script src='https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js'></script>
            <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#example').DataTable();
                                    });
            </script>
        </div>
    </div>
</div>