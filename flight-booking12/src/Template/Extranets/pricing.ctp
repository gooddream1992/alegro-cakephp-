<section class="basics">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?= $this->element('extranet/sidebar'); ?>
            </div>
            <div class="col-md-10">
                <div class="head-section">
                    <?= $this->Form->create('', ['name' => "pricingPageForm", 'type' => 'post', 'id' => 'pricing']); ?>
                    <div class="pricing-page">
                        <div class="card-page-header row">
                            <div class="col-sm-8">
                                <h1 class="m-t-0">Set your prices.</h1>
                                <p>Choose your nightly room rates based on guests and other conditions.</p>
                            </div>
                            <div class="hidden-xs col-sm-4"><img src="<?= $this->Url->image('extranet/ec-pricing@2x.png'); ?>"></div>
                        </div>
                        <h2>Base rates</h2>
                        <p>We recommend you start off with a lower price to encourage bookings and help you gather reviews. Once your property is published, you can change your price in response to demand, set special rates for specific days, and add additional fees.</p>
                        <div class="panel panel-default price-configuration m-t-3">
                            <div class="panel-body">
                                <div></div>
                                <h4>
                                    According to your settings, your property can accommodate up to <?= $accomo = $this->User->getAccomodation($id); ?> people.<strong class="text-uppercase"><a class="p-l-2" href="#/basics">Change</a></strong> 
                                    <?php if ($accomo >= 1) { ?>
                                        <div class="row">
                                            <div class="form-group col-lg-3 col-md-4">
                                                <h5>Rate per night for 1 guest</h5>
                                                <div class="form-group ">
                                                    <span class="input-group input-group">
                                                        <input type="number" class='number'style="padding:0;height: 35px; border:1px solid gray;width: 45%;float: left;" class="form-control" placeholder="500" step='0.01' name="one" value="<?=@$propPri->one;?>" required>
                                                        <span> &nbsp;EUR</span> 
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($accomo >= 2) { ?>
                                        <div class="row">
                                            <div class="form-group col-lg-3 col-md-4">
                                                <h5>Rate per night for 2 guests</h5>
                                                <div class="form-group ">
                                                    <span class="input-group input-group">
                                                        <input type="number" class='number'style="padding:0;height: 35px; border:1px solid gray;width: 45%;float: left;" class="form-control" placeholder="1000" step='0.01' name="two" required value="<?=@$propPri->two;?>">
                                                        <span> &nbsp;EUR</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($accomo >= 3) { ?>
                                        <div class="row">
                                            <div class="form-group col-lg-3 col-md-4">
                                                <h5>Rate per night for 3 <?php if ($accomo > 3) { ?> - <?= $accomo; ?> <?php } ?>guests</h5>
                                                <div class="form-group ">
                                                    <span class="input-group input-group">
                                                        <input type="number" class='number'style="padding:0;height: 35px; border:1px solid gray;width: 45%;float: left;" class="form-control" placeholder="2000" step='0.01' name="morethree" required value="<?=@$propPri->morethree;?>">
                                                        <span > &nbsp;EUR</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                            </div>
                        </div>
                        <div>
                            <h2 class="m-t-8 m-b-4">Payout method</h2>
                            <div class="m-b-2">Please select your preferred payout method. Additional information will be requested once published on Agoda. [Important note] For security, your first payout will be 30 days from your first booking's check-out date. For any future bookings, payouts will occur 24 hours after traveler check-out date.</div>
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="m-t-1 form-group">
                                        <div class="regular-radio direct-deposit-radio radio-selected radio">
                                            <label title="">
                                                <input name="paymentMethod" type="radio" value="Direct deposit" <?php if(@$propPri->paymentMethod =='Direct deposit') echo "checked"; else echo "checked"; ?>>
                                                <div class="p-l-2">
                                                    <span>
                                                        <div>Direct deposit to bank</div>
                                                    </span>
                                                    <div>Using our secure payment system, we will send your payments directly to your bank account after the customer departs.</div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="regular-radio paypal-deposit-radio radio">
                                            <label title="">
                                                <input name="paymentMethod" type="radio" value="Paypal deposit" <?php if(@$propPri->paymentMethod =="Paypal deposit") echo "checked";?>> 
                                                <div class="p-l-2">
                                                    <span>
                                                        <div>Paypal deposit</div>
                                                    </span>
                                                    <div>You will be prompted to enter your PayPal credentials, and we will send your payments to your PayPal account after the customer departs.</div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="last-section">
                        <input type="hidden" name="saveexit" id='saveexit'>
                        <ul>
                            <li><span class='btn-next-save' onclick="gettForm()">SAVE AND EXIT</span></li>				                						
                            <li onclick="$('#saveexit').val('next');">
                                <button class='btn-next-save' type="submit" onclick="return formSubmit()">NEXT</button>
                            </li>
                            <li><a href="<?=HTTP_ROOT;?>extranets/amenities/<?=$id;?>">PREVIOUS</a></li>
                        </ul>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>


            </div>

        </div>
    </div>
</section>
<style>
    .error{
        color:red;
    }
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance:textfield;
    }
</style>
<script>
    function gettForm() {
        $('#saveexit').val('save exit');
        $('#pricing').submit();
    }

    $('#pricing').validate({
        rules: {
            one: {
                required: true,
            },
            two: {
                required: true,
            },
            morethree: {
                required: true,
            },
        }
    });
</script>