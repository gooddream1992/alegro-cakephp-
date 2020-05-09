<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Leading Guest Bank Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/manage_hotel_booking"> <i class="fa fa-list"></i>Leading Guest Bank Details</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <?= $this->Form->create('', array('data-toggle' => "validator", 'method' => "post")); ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">

                                    <label>Booking number</label>
                                    <input type="text" class="form-control" value="<?= $editdata->booking_no; ?>"  disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Bank Name *</label>
                                    <?php $bankdets = $editdata->lead_guest_bank_name; ?>
                                    <select class="form-control" id="lead_guest_bank_name"  name="lead_guest_bank_name" required>
                                        <option value="" selected disabled>Bank Name</option>
                                        <option <?php if ($bankdets == 'Banco Angolano de Investimentos (BAI)') { ?> selected="selected" <?php } ?> value="Banco Angolano de Investimentos (BAI)">Banco Angolano de Investimentos (BAI)</option>
                                        <option <?php if ($bankdets == 'Banco Angolano de Negócios e Comércio (BANC)') { ?> selected="selected" <?php } ?> value="Banco Angolano de Negócios e Comércio (BANC)">Banco Angolano de Negócios e Comércio (BANC)</option>
                                        <option <?php if ($bankdets == 'Banco Yetu (YETU)') { ?> selected="selected" <?php } ?> value="Banco Yetu (YETU)">Banco Yetu (YETU)</option>
                                        <option <?php if ($bankdets == 'Banco BIC (BIC)') { ?> selected="selected" <?php } ?> value="Banco BIC (BIC)">Banco BIC (BIC)</option>
                                        <option <?php if ($bankdets == 'Banco Comercial Angolano (BCA)') { ?> selected="selected" <?php } ?> value="Banco Comercial Angolano (BCA)">Banco Comercial Angolano (BCA)</option>
                                        <option <?php if ($bankdets == 'Banco de Comércio e Indústria (BCI)') { ?> selected="selected" <?php } ?> value="Banco de Comércio e Indústria (BCI)">Banco de Comércio e Indústria (BCI)</option>
                                        <option <?php if ($bankdets == 'Banco Económico') { ?> selected="selected" <?php } ?> value="Banco Económico">Banco Económico</option>
                                        <option <?php if ($bankdets == 'Banco de Fomento Angola (BFA)') { ?> selected="selected" <?php } ?> value="Banco de Fomento Angola (BFA)">Banco de Fomento Angola (BFA)</option>
                                        <option <?php if ($bankdets == 'Banco de Poupança e Crédito (BPC)') { ?> selected="selected" <?php } ?> value="Banco de Poupança e Crédito (BPC)">Banco de Poupança e Crédito (BPC)</option>
                                        <option <?php if ($bankdets == 'Banco de Negócios Internacional (BNI)') { ?> selected="selected" <?php } ?> value="Banco de Negócios Internacional (BNI)">Banco de Negócios Internacional (BNI)</option>
                                        <option <?php if ($bankdets == 'Banco Keve') { ?> selected="selected" <?php } ?> value="Banco Keve">Banco Keve</option>
                                        <option <?php if ($bankdets == 'Banco Sol') { ?> selected="selected" <?php } ?> value="Banco Sol">Banco Sol</option>
                                        <option <?php if ($bankdets == 'Banco Caixa Geral Totta') { ?> selected="selected" <?php } ?> value="Banco Caixa Geral Totta">Banco Caixa Geral Totta</option>
                                        <option <?php if ($bankdets == 'Banco Millennium Atlântico') { ?> selected="selected" <?php } ?> value="Banco Millennium Atlântico">Banco Millennium Atlântico</option>
                                        <option <?php if ($bankdets == 'Banco VTB África') { ?> selected="selected" <?php } ?> value="Banco VTB África">Banco VTB África</option>
                                        <option <?php if ($bankdets == 'Finibanco') { ?> selected="selected" <?php } ?> value="Finibanco">Finibanco</option>
                                        <option <?php if ($bankdets == 'Banco BAI Micro Finanças (BMF)') { ?> selected="selected" <?php } ?> value="Banco BAI Micro Finanças (BMF)">Banco BAI Micro Finanças (BMF)</option>
                                        <option <?php if ($bankdets == 'Banco Comercial do Huambo (BCH)') { ?> selected="selected" <?php } ?> value="Banco Comercial do Huambo (BCH)">Banco Comercial do Huambo (BCH)</option>
                                        <option <?php if ($bankdets == 'Standard Bank (SBA)') { ?> selected="selected" <?php } ?> value="Standard Bank (SBA)">Standard Bank (SBA)</option>
                                        <option <?php if ($bankdets == 'Banco Valor') { ?> selected="selected" <?php } ?> value="Banco Valor">Banco Valor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lead_guest_iban">IBAN *</label>
                                    <input type="text" class="form-control" id="lead_guest_iban" placeholder="Enter IBAN" name="lead_guest_iban" value="<?= $editdata->lead_guest_iban; ?>" required>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit" title="Update Bank Details">Update</button>
                        <?= $this->Form->end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>