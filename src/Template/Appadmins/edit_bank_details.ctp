<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Edit Bank Details
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
                    <?= $this->Form->create('',array('data-toggle' => "validator", 'method' => "post")); ?>
                    <div class="box-body">
                        <p style="color: red;font-size: 12px;float: right;">All (*) fields are mandatory</p>
                        <div class="col-md-6">
                            <div class="form-group">
                                
                                <label for="exampleInputName"> Property Name <span style="color: red;">*</span></label>
                                <?= $this->Form->input('property_name', ['placeholder' => "Enter Property name", 'class' => "form-control", 'label' => false, 'required' => "required", 'value' => @$bankDetails->description->propertyName, 'disabled' => 'disabled', 'data-error' => 'Enter Property name']); ?>
                                <?= $this->Form->input('id', ['type' => "hidden", 'label' => false, 'value' => @$bankDetails->id]); ?>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div><br>
                        <?php
                            $getpgstatus=$this->User->extUserDetails(@$bankDetails->user_id);
                            $bankdets=$getpgstatus->bank_name;
                        ?>
                        <div class="col-md-6" style="margin-top: 27px; width: 100%;">
                            <div class="form-group">
                                <label for="exampleInputName"> Bank Name <span style="color: red;">*</span></label>                                                          <select name="bank_name" id="bank_name" class="form-control" required="required" style="width: 48.5%;">
                                        <option value="0">Bank Name</option>
                                        <option <?php if($bankdets=='Banco Angolano de Investimentos (BAI)'){ ?> selected="selected" <?php } ?> value="Banco Angolano de Investimentos (BAI)">Banco Angolano de Investimentos (BAI)</option>
                                        <option <?php if($bankdets=='Banco Angolano de Negócios e Comércio (BANC)'){ ?> selected="selected" <?php } ?> value="Banco Angolano de Negócios e Comércio (BANC)">Banco Angolano de Negócios e Comércio (BANC)</option>
                                        <option <?php if($bankdets=='Banco Yetu (YETU)'){ ?> selected="selected" <?php } ?> value="Banco Yetu (YETU)">Banco Yetu (YETU)</option>
                                        <option <?php if($bankdets=='Banco BIC (BIC)'){ ?> selected="selected" <?php } ?> value="Banco BIC (BIC)">Banco BIC (BIC)</option>
                                        <option <?php if($bankdets=='Banco Comercial Angolano (BCA)'){ ?> selected="selected" <?php } ?> value="Banco Comercial Angolano (BCA)">Banco Comercial Angolano (BCA)</option>
                                        <option <?php if($bankdets=='Banco de Comércio e Indústria (BCI)'){ ?> selected="selected" <?php } ?> value="Banco de Comércio e Indústria (BCI)">Banco de Comércio e Indústria (BCI)</option>
                                        <option <?php if($bankdets=='Banco Económico'){ ?> selected="selected" <?php } ?> value="Banco Económico">Banco Económico</option>
                                        <option <?php if($bankdets == 'Banco de Fomento Angola (BFA)'){ ?> selected="selected" <?php } ?> value="Banco de Fomento Angola (BFA)">Banco de Fomento Angola (BFA)</option>
                                        <option <?php if($bankdets=='Banco de Poupança e Crédito (BPC)'){ ?> selected="selected" <?php } ?> value="Banco de Poupança e Crédito (BPC)">Banco de Poupança e Crédito (BPC)</option>
                                        <option <?php if($bankdets=='Banco de Negócios Internacional (BNI)'){ ?> selected="selected" <?php } ?> value="Banco de Negócios Internacional (BNI)">Banco de Negócios Internacional (BNI)</option>
                                        <option <?php if($bankdets=='Banco Keve'){ ?> selected="selected" <?php } ?> value="Banco Keve">Banco Keve</option>
                                        <option <?php if($bankdets=='Banco Sol'){ ?> selected="selected" <?php } ?> value="Banco Sol">Banco Sol</option>
                                        <option <?php if($bankdets=='Banco Caixa Geral Totta'){ ?> selected="selected" <?php } ?> value="Banco Caixa Geral Totta">Banco Caixa Geral Totta</option>
                                        <option <?php if($bankdets=='Banco Millennium Atlântico'){ ?> selected="selected" <?php } ?> value="Banco Millennium Atlântico">Banco Millennium Atlântico</option>
                                        <option <?php if($bankdets=='Banco VTB África'){ ?> selected="selected" <?php } ?> value="Banco VTB África">Banco VTB África</option>
                                        <option <?php if($bankdets=='Finibanco'){ ?> selected="selected" <?php } ?> value="Finibanco">Finibanco</option>
                                        <option <?php if($bankdets=='Banco BAI Micro Finanças (BMF)'){ ?> selected="selected" <?php } ?> value="Banco BAI Micro Finanças (BMF)">Banco BAI Micro Finanças (BMF)</option>
                                        <option <?php if($bankdets=='Banco Comercial do Huambo (BCH)'){ ?> selected="selected" <?php } ?> value="Banco Comercial do Huambo (BCH)">Banco Comercial do Huambo (BCH)</option>
                                        <option <?php if($bankdets=='Standard Bank (SBA)'){ ?> selected="selected" <?php } ?> value="Standard Bank (SBA)">Standard Bank (SBA)</option>
                                        <option <?php if($bankdets=='Banco Valor'){ ?> selected="selected" <?php } ?> value="Banco Valor">Banco Valor</option>
                                    </select>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        
                        <div class="col-md-6" style="margin-top: 27px;">
                            <div class="form-group">
                                <label for="exampleInputName"> IBAN  <span style="color: red;">*</span></label>
                                <?= $this->Form->input('iban', ['type' => "text",'placeholder' => "Enter IBAN", 'class' => "form-control", 'label' => false, 'required' => "required", 'value' => $getpgstatus->account_iban, 'data-error' => 'Enter IBAN']); ?>
                                
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">

                        <?php
                            echo $this->Form->button('Update Bank Details', ['class' => 'btn btn-primary', 'style' => 'float:left;margin-left:15px;']);
                                               
                        ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</div>