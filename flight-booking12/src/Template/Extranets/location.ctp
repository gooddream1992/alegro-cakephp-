<section class="basics">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?= $this->element('extranet/sidebar'); ?>
            </div>

            <div class="col-md-10">
                <div class="head-section">
                    <h1>Put yourself on the map<span>Where will your guests be staying ?</span></h1>
                    <img src="<?= $this->Url->image('extranet/ec-location@2x.png'); ?>">	

                    <?= $this->Form->create('', ['class' => "location", 'type' => 'post', 'id' => 'location']); ?>
                    <h2>Location <span>Guests will only receive your exact address once they’ve confirmed a booking.</span></h2>
                    <div class="location-form">
                        <ul>
                            <li>
                                <label>Street address</label>
                                <input type="text" name="street" required id="text1" placeholder="Text Here" value="<?= @$proper_loc->street; ?>">
                            </li>
                            <li>
                                <label>Building, floor and unit number (optional)</label>
                                <input type="text" name="building" id="text1" placeholder="Text Here" value="<?= @$proper_loc->building; ?>">
                            </li>
                            <li>
                                <div>
                                    <label>Country</label>
                                    <select id="country" name="country" onchange="mapCountryChecker(this.value)" required>
                                        <option selected disabled value="">Selelct country</option>
                                        <?php
                                        $countries = $this->User->allcountry();
                                        foreach ($countries as $val) {
                                            if (!empty($val->country_name)) {
                                                ?>                               
                                                <option value="<?= $val->country_name; ?>"><?= $val->country_name; ?></option>                                   
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label>State</label>
                                    <select id="state" name="state" onchange="mapStateChecker(this.value)" required>
                                        <option selected disabled value="">Selelct State</option>
                                        <?php
                                        $states = $this->User->allstate();
                                        foreach ($states as $val) {
                                            if (!empty($val->state_name)) {
                                                ?>                               
                                                <option value="<?= $val->state_name; ?>"><?= $val->state_name; ?></option>                                
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <label>City</label>
                                    <select id="city" name="city"  required>
                                        <option selected disabled value="">Selelct city</option>
                                        <?php
                                        $cities = $this->User->allcity();
                                        foreach ($cities as $val) {
                                            if (!empty($val->city_name)) {
                                                ?>                               
                                                <option value="<?= $val->city_name; ?>" onclick="mapChecker('<?= $val->id; ?>')"><?= $val->city_name; ?></option>                                   
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label>Zip-code(optional)</label>
                                    <input type="text" id="zip-code" name="zip_code">
                                </div>
                            </li>
                        </ul>
                        <div id="loadmap">
                            <label>Map location</label>
                            <span>Guests will only receive your exact address once they’ve confirmed a booking.</span>
<!--                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14939.521204397946!2d86.46932249999999!3d20.5929453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1544878231245" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                            <iframe id="map-iframe" src="http://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=n5/115,bhubaneswar+(microfinet)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe><br />
                        </div>						
                    </div>
                    <input type="hidden" name="saveexit" id='saveexit'>
                    <div class="last-section">
                        <ul>
                            <li><span class='btn btn-success' onclick="gettForm()">SAVE AND EXIT </span></li>				                						
                            <li onclick="$('#saveexit').val('next');">
                                <button class='btn btn-success' type="submit">Next</button>
                            </li>
                            <li><a href="<?= HTTP_ROOT; ?>extranets/basic_tab/<?= $id; ?>">PREVIOUS</a></li>
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
        color: red;
    }
</style>
<script>
    $(document).ready(function () {
        $('#country').val("<?= $proper_loc->country; ?>");
        $('#state').val("<?= $proper_loc->state; ?>");
        $('#city').val("<?= $proper_loc->city; ?>");
        $('#zip-code').val("<?= $proper_loc->zip_code; ?>");
    });
    function gettForm() {
        $('#saveexit').val('save exit');
        $('#location').submit();
    }
    $('#location').validate({
        rules: {
            street: {
                required: true,
            },
            country: "required",
            state: "required",
            city: "required",
        },
        messages: {

        }
    });
</script>
<script>
    function mapChecker(id) {
        
        
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/get_city_states",
            dataType: 'html',
            data: {mainid: id},
            success: function (res) {
                $('#state').html('');
                $('#state').html(res);
            }
        });
        
        
        //alert('http://maps.google.com/?q='+loc+'&output=embed');
        //$('#map-iframe').remove();
        //$('#loadmap').append('<iframe width="100%" height="350" frameborder="0" style="border:0" src="http://maps.google.com/maps?q="'+loc+'"&output=embed" allowfullscreen></frame>');
        //$('#loadmap').html($('#loadmap').html());
    }
</script>
<script>
    function mapCountryChecker(nm) {
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/get_states_name",
            dataType: 'html',
            data: {country_name: nm},
            success: function (res) {
                $('#state').html('');
                $('#state').html(res);
            }
        });
    }
</script>
<script>
    function mapStateChecker(nm) {
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/get_city_name",
            dataType: 'html',
            data: {state_name: nm},
            success: function (res) {
                $('#city').html('');
                $('#city').html(res);
            }
        });
    }
</script>