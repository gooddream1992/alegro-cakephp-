<style>

    .publish h1 {
        margin-top: 0;
        width: 85%;
    }
    
</style>
<section class="basics">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?= $this->element('extranet/sidebar'); ?>
            </div>

            <div class="col-md-10">
                <div class="head-section">
                    <div class="publish">
                        <h1><?php echo __('Sign your contract and lets get bookings'); ?><span><?php echo __('Just a few more details'); ?></span></h1>
                        <img src="<?= $this->Url->image('extranet/ec-publish@2x.png'); ?>">

                        <?= $this->Form->create('', ['type' => 'post','class'=>'pic-upload', 'id' => 'publish-page']); ?>
                            <h5><?php echo __('Know your local laws, regulations and taxes'); ?></h5>
                            <div class="publish-section">
                                <p><?php echo __('It is your responsibility to review local laws and taxes.'); ?></p>
                                <p><?php echo __('Be aware of your local regulations, laws and tax obligations before you take bookings. Many countries and a number of cities have specific laws regarding using your property as a short term rental, for home sharing and/or for professional hosting. It is your responsibility to work within your own countrys legal framework which may include obtaining the relevant license, permit or registration before taking bookings and paying any applicable taxes on any income you generate from such bookings.'); ?></p>
                            </div>
                            <h5><?php echo __('Accept the terms and conditions and youre good to go'); ?></h5>
                            <div class="publish-section">
                                <div class="publish-check">
                          
                                    <input type="checkbox" name="complete_ststus" id="amenities4" value="1">
                                          <label class="amenities" for="amenities4"><?php echo __('I accept Alegros terms and conditions and certify that I will follow all applicable laws and regulations'); ?></label>
                                </div>
                            </div>
                            <div class="last-section">
                                <input type="hidden" name="saveexit" id='saveexit' value="next">
                                <ul>
                                    <li><span class='btn-next-save' onclick="gettForm()"><?php echo __('SAVE AND EXIT'); ?></span></li>				                						
                                    <li onclick="$('#saveexit').val('next');">
                                        <button class='btn-next-save' type="submit" ><?php echo __('NEXT'); ?></button>
                                    </li>
                                    <li><a href="<?= HTTP_ROOT; ?>extranets/profile/<?= @$id; ?>"  style="font-size: 15px;padding: 8px 28px;"><?php echo __('PREVIOUS'); ?></a></li>
                                </ul>
                            </div>										
                        <?= $this->Form->end(); ?>											
                    </div>	

                </div>
            </div>

        </div>
    </div>
</section>
<script>
    function gettForm() {
        $('#saveexit').val('save exit');
        $('#publish-page').submit();
    }
    $('#publish-page').validate({
        rules: {
            complete_ststus: {
                required: true,
            },
        }
    });
</script>
