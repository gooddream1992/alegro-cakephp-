<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?php
            if ($id) {
                echo 'Edit Luggage Per Flights';
            } else {
                echo "Add Luggage Per Flights";
            }
            ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/view_luggage_flights"> <i class="fa fa-list"></i>Luggage Per Flights List</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">
                    <?= $this->Form->create($user, array('data-toggle' => "validator")); ?>
                    <div class="box-body">
                        <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                        <div class="col-md-6" style="margin-top: 27px;">
                            <div class="form-group">
                                <label for="exampleInputName">Airline Name<span style="color: red;">*</span></label>
                                <?= $this->Form->select('airline_name', $cnt, ['class' => "form-control", 'label' => false, 'default' => $luggageperflightsdata->airline_name]); ?>
                                <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => $luggageperflightsdata->id]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Airport Type<span style="color: red;">*</span></label>
                                <?php $options = array('International Flights' => 'International Flights', 'Domestic Flights' => 'Domestic Flights'); ?>
                                <?= $this->Form->select('airport_type', $options, ['class' => "form-control", 'default' => @$luggageperflightsdata->airport_type]); ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="exampleInputEmail">Cabin Type <span style="color: red;">*</span><span style="margin-left: 10px;font-size: 11px;font-weight: normal;" id="email_validation_msg"></span></label>
<?php $options = array('Economy' => 'Economy', 'Business' => 'Business', 'First Class' => 'First Class'); ?>
                                <?= $this->Form->select('cabin_type', $options, ['class' => "form-control", 'default' => @$luggageperflightsdata->cabin_type]); ?>
                                <div class="help-block with-errors"></div>
                                <div id="eloader" style="position: absolute; margin-top: -60px; margin-left: 158px;"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">no of bag <span style="color: red;">*</span></label>
                                <?= $this->Form->input('no_of_bag', ['type' => 'number', 'class' => "form-control", 'label' => false, 'value' => @$luggageperflightsdata->no_of_bag, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'no of bag']); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">allowed weight<span style="color: red;">*</span></label>
                                <?= $this->Form->input('allowed_weight', ['type' => 'number', 'class' => "form-control", 'label' => false, 'value' => @$luggageperflightsdata->allowed_weight, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'allowed weight']); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">no of hand bag <span style="color: red;">*</span></label>
                                <?= $this->Form->input('no_of_hand_bag', ['type' => 'number', 'class' => "form-control", 'label' => false, 'value' => @$luggageperflightsdata->no_of_hand_bag, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'no of hand bag']); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">allowed hand bag weight<span style="color: red;">*</span></label>
                                <?= $this->Form->input('allowed_hand_bag_weight', ['type' => 'number', 'class' => "form-control", 'label' => false, 'value' => @$luggageperflightsdata->allowed_hand_bag_weight, 'kl_virtual_keyboard_secure_input' => "on", 'required' => "required", 'data-error' => 'allowed_hand_bag_weight']); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">

                        <?php
                        if ($id) {
                            echo $this->Form->button('Update', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        } else {
                            echo $this->Form->button('Add ', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                        }
                        ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>