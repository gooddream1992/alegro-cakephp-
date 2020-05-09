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
                        <h1>Sign your contract and lets get booking.<span>Just a few more details.</span></h1>
                        <img src="<?= $this->Url->image('extranet/ec-publish@2x.png'); ?>">

                        <?= $this->Form->create('', ['type' => 'post','class'=>'pic-upload', 'id' => 'publish-page']); ?>
                            <h5>Know your local laws, regulations, and taxes.</h5>
                            <div class="publish-section">
                                <p>It is your responsibility to review local laws and taxes.</p>
                                <p>Be aware of your local regulations, laws, and tax obligations before you take bookings. Many countries and a number of cities have specific laws regarding using your property as a short term rental, for home sharing and/or for professional hosting. It is your responsibility to work within your own country’s legal framework which may include obtaining the relevant license, permit or registration before taking bookings, and paying any applicable taxes on any income you generate from such bookings.</p>
                            </div>
                            <h5>Accept the terms and conditions, and you’re good to go.</h5>
                            <div class="publish-section">
                                <div class="publish-check">
                                <label class="amenities" for="amenities4">I accept Agoda’s <a href="#">Terms and Conditions </a>and certify that I will follow all applicable laws and regulations.</label>
                                    <input type="checkbox" name="complete_ststus" id="amenities4" value="1">
                                    
                                </div>
                            </div>
                            <div class="last-section">
                                <input type="hidden" name="saveexit" id='saveexit' value="next">
                                <ul>
                                    <li><span class='btn-next-save' onclick="gettForm()">SAVE AND EXIT </span></li>				                						
                                    <li onclick="$('#saveexit').val('next');">
                                        <button class='btn-next-save' type="submit" >Next</button>
                                    </li>
                                    <li><a href="<?= HTTP_ROOT; ?>extranets/profile/<?= @$id; ?>">PREVIOUS</a></li>
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
