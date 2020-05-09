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
                                <h1 class="m-t-0"><?php echo __('Set your prices.'); ?></h1>
                                <p><?php echo __('Choose your nightly room rates based on guests and other conditions.'); ?></p>
                            </div>
                            <div class="hidden-xs col-sm-4"><img src="<?= $this->Url->image('extranet/ec-pricing@2x.png'); ?>"></div>
                        </div>
                        <h2><?php echo __('Base rates'); ?></h2>
                        <p><?php echo __('We recommend you start off with a lower price to encourage bookings and help you gather reviews. Once your property is published, you can change your price in response to demand, set special rates for specific days and add additional fees.'); ?></p>
                        <?php
                        $cont = 1;
                        foreach ($availableBeds as $val) {
                            @$propPri = $this->User->proPrice($id, $val->id);
                            //pj(@$propPri);
                            ?>
                            <input type="hidden" name="sub_id<?= $cont; ?>" value="<?= $val->id; ?>">
                            <input type="hidden" name="count" value="<?= $cont; ?>">
                            <div class="panel panel-default price-configuration m-t-3">
                                <div class="panel-body">
                                    <div></div>
                                    <h4>
                                        <?= $val->bed_name; ?> <?php echo __('can accommodate up to'); ?> <?= $accomo = $this->User->getAccomodation($id); ?> people.<strong class="text-uppercase">
                                            <!--                                            <a class="p-l-2" href="#/basics">Change</a>-->
                                        </strong> </h4>
                                    <?php if ($accomo >= 1) { ?>
                                        <div class="row">
                                            <div class="form-group col-lg-7 col-md-4">
                                                <h5><?php echo __('Rate per night for'); ?> 1 <?php echo __('guest'); ?></h5>
                                                <div class="form-group ">
                                                    <span class="input-group input-group">
                                                        <input type="number" class='number'style="padding:0;height: 35px; border:1px solid gray;width: 45%;float: left;" class="form-control" placeholder="500" step='0.01' name="one<?= $cont; ?>" value="<?= @$propPri->one; ?>" required>
                                                        <span> &nbsp;AOA</span> 
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($accomo >= 2) { ?>
                                        <div class="row">
                                            <div class="form-group col-lg-7 col-md-4">
                                                <h5><?php echo __('Rate per night for'); ?> 2 <?php echo __('guests'); ?></h5>
                                                <div class="form-group ">
                                                    <span class="input-group input-group">
                                                        <input type="number" class='number'style="padding:0;height: 35px; border:1px solid gray;width: 45%;float: left;" class="form-control" placeholder="1000" step='0.01' name="two<?= $cont; ?>" required value="<?= @$propPri->two; ?>">
                                                        <span> &nbsp;AOA</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if ($accomo >= 3) { ?>
                                        <div class="row">
                                            <div class="form-group col-lg-7 col-md-4">
                                                <h5><?php echo __('Rate per night for'); ?> 3 <?php if ($accomo > 3) { ?> - <?= $accomo; ?> <?php } ?><?php echo __('guests'); ?></h5>
                                                <div class="form-group ">
                                                    <span class="input-group input-group">
                                                        <input type="number" class='number'style="padding:0;height: 35px; border:1px solid gray;width: 45%;float: left;" class="form-control" placeholder="2000" step='0.01' name="morethree<?= $cont; ?>" required value="<?= @$propPri->morethree; ?>">
                                                        <span > &nbsp;AOA</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="row">
                                        <div class="form-group col-lg-9 col-md-4">
                                            <h5><?php echo __('if guests decide to stay longer, a new rate will be applied'); ?> </h5>

                                            <div class="form-group ">
                                                <span class="input-group input-group">
                                                    <input type="number" class='number'style="padding:0;height: 35px; border:1px solid gray;width: 10%;float: left;" class="form-control" placeholder="20" step='1' name="long_days<?= $cont; ?>" value="<?= @$propPri->long_days; ?>">
                                                    <span > &nbsp;<?php echo __('DAYS'); ?></span>
                                                </span>
                                            </div>
                                            <div class="form-group ">
                                                <span class="input-group input-group">
                                                    <input type="number" class='number'style="padding:0;height: 35px; border:1px solid gray;width: 45%;float: left;" class="form-control" placeholder="2000" step='0.01' name="fix_price<?= $cont; ?>" value="<?= @$propPri->fix_price; ?>">
                                                    <span > &nbsp;AOA</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $cont++;
                        }
                        ?>
                        <div>
                            <h2 class="m-t-8 m-b-4"><?php echo __('Payout method'); ?></h2>
                            <div class="m-b-2"><?php echo __('Unfortunately, Alegro can only support bank transfer as the main payout method. Additional information will be requested once published on Alegro. [Important Note] For security, your first payout will be 30 days from your first bookings check-out date. For any future bookings, payouts will occur 24 hours after traveler check-out date.'); ?></div>
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="m-t-1 form-group">
                                        <div class="regular-radio direct-deposit-radio radio-selected radio">
                                            <label title="">
                                                <input name="paymentMethod" type="radio" value="Direct deposit" <?php
                                                if (@$propPri->paymentMethod == 'Direct deposit')
                                                    echo "checked";
                                                else
                                                    echo "checked";
                                                ?>>
                                                <div class="p-l-2">
                                                    <span>
                                                        <div><?php echo __('Bank Transfer'); ?></div>
                                                    </span>
                                                    <div><?php echo __('Using our secure payment system, we will send your payments directly to your bank account after guests depart.'); ?></div>
                                                </div>
                                            </label>
                                        </div>
                                        <!--                                        
                                        <div class="regular-radio paypal-deposit-radio radio">
                                                                                    <label title="">
                                                                                        <input name="paymentMethod" type="radio" value="Paypal deposit" <?php //if (@$propPri->paymentMethod == "Paypal deposit") echo "checked"; ?>> 
                                                                                        <div class="p-l-2">
                                                                                            <span>
                                                                                                <div>Paypal deposit</div>
                                                                                            </span>
                                                                                            <div>You will be prompted to enter your PayPal credentials, and we will send your payments to your PayPal account after the customer departs.</div>
                                                                                        </div>
                                                                                    </label>
                                                                                </div>
                                        -->
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="last-section">
                        <input type="hidden" name="saveexit" id='saveexit'>
                        <ul>
                            <li><span class='btn-next-save' onclick="gettForm()"><?php echo __('SAVE AND EXIT'); ?></span></li>				                						
                            <li onclick="$('#saveexit').val('next');">
                                <button class='btn-next-save' type="submit" onclick="return formSubmit()"><?php echo __('NEXT'); ?></button>
                            </li>
                            <li><a href="<?= HTTP_ROOT; ?>extranets/amenities/<?= $id; ?>"><?php echo __('PREVIOUS'); ?></a></li>
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