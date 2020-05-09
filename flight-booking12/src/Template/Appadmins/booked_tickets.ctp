<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Booked Tickets</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Booked Tickets</li>
            </ol>
        </section>
        
        <section class="content">
            
            <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <span class="col-sm-8"><p class="text-justify"><?=date('l');?> Sold Tickets</p></span><span class="col-sm-4"><?php echo  $dayPurchase;?></span>
                        <span class="col-sm-8"><p class="text-justify"><?=date('F');?> Sold Tickets</p></span><span class="col-sm-4"><?php echo  $monthPurchase;?></span>
                        <span class="col-sm-8"><p class="text-justify"><?=date('Y');?> Sold Tickets</p></span><span class="col-sm-4"><?php echo  $yearPurchase;?></span>
                    </div>
                </div>
            </div>
        </div>
            
            <div class="row">
            <div class="col-xs-12">
                        
                <div class="box">
                    <div class="box-body">
                        <span class="row text-justify text-danger">Search For day: Only need to type "date number" in search field. Ex:- '25-' or '26-'     <br>Search For month: Only need to type "month number" in search field. Ex:- '-05-' or '-06-'   <br>Search For Year: Only need to type "year number" in search field. Ex:- '-2018' or '-2019'
                        </span>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone</th>
                                    <th>No. of tickets</th>
                                    <th>Service Fee</th>
                                    <th>Total Fee</th>
                                    <th>Purchase Date</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $i=1;
                                foreach ($bookings as $data) {
                                    $user= $this->User->usrHelper($data->user_id);
                                    $user_det= $this->User->usrdetHelper($data->user_id);
                                    ?>
                                    <tr>
                                        <td><?=$i++;?></td>
                                        <td><?=$user->name; ?></td>
                                        <td><?=$user->email;  ?></td>
                                        <td><?=$user_det->phone_number; ?></td>
                                        <td><?=$data->passengers; ?></td>
                                        <td><?=$data->service_fee ?></td>
                                        <td> <?=$data->total_fee ?></td>
                                        <td><?=date('d-m-Y', strtotime($this->Time->format($data->purches_date,'Y-MM-d hh:mm:ss'))); ?></td>
<!--                                        <td>
                                            <?php if ($data->is_active == 1) { ?>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/deactive/' . $data->id . '/Users' ?>"><?= $this->Form->button('<i class="fa fa-check"></i>', ["data-placement" => "top", 'title'=>'active', "data-hint" => "Active", 'class' => "btn btn-success hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?></a> 
                                            <?php } else { ?> <a href="<?php echo HTTP_ROOT . 'appadmins/active/' . $data->id . '/Users' ?>"><?= $this->Form->button('<i class="fa fa-times"></i>', ["data-placement" => "top", 'title'=>'Inactive',"data-hint" => "Inactive", 'class' => "btn btn-danger hint--top  hint", 'style' => 'padding: 0 7px!important;']) ?> </a> <?php } ?>                                            
                                            <a onclick='return confirm("Are you sure want to delete ??")' href="<?php echo HTTP_ROOT . 'appadmins/delete/' . $data->id . '/Users' ?>" style="padding: 0 7px!important;" class="btn btn-danger hint--top  hint" title='Delete' data-hint="Delete" data-placement="top" href="javascript:;"><i class="fa fa-trash"></i></a>
                                        </td>-->
                                            <td>
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/invoice/' . $data->id ?>" target="_blank">
                                                    Invoice
                                                </a> &nbsp;&nbsp;&nbsp;
                                                <a href="<?php echo HTTP_ROOT . 'appadmins/itinerary/' . $data->id ?>" target="_blank">
                                                    Itinerary
                                                </a>
                                            </td>

                                    </tr>
                                <?php } ?>


                            </tbody>
<!--                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Avatar</th>
                                    <th>Phone Number</th>
                                    <th>Joined Date</th>

                                </tr>
                            </tfoot>-->
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>        
        
</div>