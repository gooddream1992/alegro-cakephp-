<section class="basics">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?= $this->element('extranet/sidebar'); ?>
            </div>

            <div class="col-md-10">
                <div class="head-section">
                    <h1><?php echo __('Put yourself on the map'); ?><span><?php echo __('Where will your guests be staying?'); ?></span></h1>
                    <img src="<?= $this->Url->image('extranet/ec-location@2x.png'); ?>">	

                    <?= $this->Form->create('', ['class' => "location", 'type' => 'post', 'id' => 'location']); ?>
                    <h2><?php echo __('Location'); ?> <span><?php echo __('Guests will only receive your exact address once they’ve confirmed a booking.'); ?></span></h2>
                    <div class="location-form">
                        <ul>
                            <li>
                                <a href="location.ctp"></a>
                                <label><?php echo __('Street address'); ?></label>

                                <input type="text" name="street" id="autocomplete" required  placeholder="Text Here" value="<?= @$proper_loc->street; ?>" >  
                            </li>
                            <li>
                                <label><?php echo __('Building, floor and unit number (optional)'); ?></label>
                                <input type="text" name="building" id="text1" placeholder="Text Here" value="<?= @$proper_loc->building; ?>">
                            </li>
                            <li>
                                <div>
                                    <label><?php echo __('Country'); ?></label>
                                    <select id="country" name="country" onchange="mapCountryChecker(this.value)" required>
                                        <option selected disabled value=""><?php echo __('Select'); ?></option>
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
                                    <label><?php echo __('Province'); ?></label>
                                    <select id="state" name="state" onchange="mapStateChecker(this.value)" required>
                                        <option selected disabled value=""><?php echo __('Select'); ?></option>
                                        <?php
                                        $cities = $this->User->allstate();
                                        foreach ($cities as $val) {
                                            if (!empty($val->state_name)) {
                                                ?>                               
                                                <option value="<?= $val->city_name; ?>" ><?= $val->state_name; ?></option>                                   
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                    <span class="erop"></span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <label><?php echo __('Municipality'); ?></label>
<!--                                    <select id="state" name="state" onchange="mapStateChecker(this.value)" required>-->
                                    <select id="city" name="city" onclick="($('#city option:selected').val() == '') ? $('.erop').html('<p style=\'color:red;\'>Select Province first<p>') : $('.erop').html('');" required>
                                        <option selected disabled value=""><?php echo __('Select'); ?></option>
                                        <?php
                                        $states = $this->User->allcity();
                                        foreach ($states as $val) {
                                            if (!empty($val->city_name)) {
                                                ?>                               
                                                <option value="<?= $val->city_name; ?>"><?= $val->city_name; ?></option>                                
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label><?php echo __('Zip-code(optional)'); ?></label>
                                    <input type="text" id="zip-code" name="zip_code">
                                    <input type="hidden" name="lati" id="lati" value="">
                                    <input type="hidden" name="lngi" id="lngi" value="">
                                </div>
                            </li>
                        </ul>
                        <div id="load-map">
                            <div id="map" style="width: 100%;height: 500px;"></div>	
                        </div>
                    </div>
                    <input type="hidden" name="saveexit" id='saveexit'>
                    <div class="last-section">
                        <ul>
                            <li><span class='btn-next-save' onclick="gettForm()"><?php echo __('SAVE AND EXIT'); ?></span></li>				                						
                            <li onclick="$('#saveexit').val('next');">
                                <button class='btn-next-save' type="submit"><?php echo __('NEXT'); ?></button>
                            </li>
                            <li><a href="<?= HTTP_ROOT; ?>extranets/basic_tab/<?= $id; ?>"  style="font-size: 15px;padding: 8px 28px;"><?php echo __('PREVIOUS'); ?></a></li>
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
<?php if ($proper_loc->country != '') { ?>
            mapCountryChecker('<?= $proper_loc->country; ?>');
            mapChecker('<?= $proper_loc->state; ?>');
<?php } ?>
        $('#country').val("<?= $proper_loc->country; ?>");
        $('#state').val("<?= $proper_loc->city; ?>");
        $('#city').val("<?= $proper_loc->state; ?>");
        $('#zip-code').val("<?= $proper_loc->zip_code; ?>");
        $('#lati').val("<?= $proper_loc->lati; ?>");
        $('#lngi').val("<?= $proper_loc->lngi; ?>");
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
        //alert(id);

        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/get_city_states",
            dataType: 'html',
            data: {mainid: id},
            success: function (res) {
                $('#city').html('');
                $('#city').html(res);
                $('[name=city]').val('<?= $proper_loc->city; ?>');
                //alert(res);
            }
        });

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
                $('[name=state]').val('<?= $proper_loc->state; ?>');

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
                $('[name=city]').val('<?= $proper_loc->city; ?>');
            }
        });
    }
</script>





<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvuyVn-j3G78kRKnXBwyhQnHl9Hdf4g2I&libraries=places&callback=initAutocomplete"></script>

<script>
    var options = {};
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input, options);

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        if (lat && lng) {
            document.getElementById("lati").value = lat;
            document.getElementById("lngi").value = lng;
            var mapOptions = {
                center: new google.maps.LatLng(lat, lng),
                zoom: 17,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat, lng),
                draggable: true,
                icon: '<?php echo HTTP_ROOT . "img/marker.svg" ?>'
            });
            if (marker)
                marker.setMap(null);

            marker.setMap(map);

            google.maps.event.addListener(marker, 'dragend', function (e) {
                var latlng = new google.maps.LatLng(e.latLng.lat(), e.latLng.lng());
                updateMarkerPositionTxt(latlng, e.latLng.lat(), e.latLng.lng());

            });
        }

    });


</script>




<script type="text/javascript">
    var marker;
    var mlat = <?= $proper_loc->lati; ?>;
    var mlng = <?= $proper_loc->lngi; ?>;
    var geocoder;
    // alert(mlat);
    //alert(mlng);
    window.onload = function () {
        navigator.geolocation.getCurrentPosition(function (location) {
            if (mlat == '' && mlng == '') {
                mlat = location.coords.latitude;
                mlng = location.coords.longitude;
                // alert("jo");
            }


            document.getElementById("lati").value = mlat;
            document.getElementById("lngi").value = mlng;
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(mlat, mlng);
            //alert(latlng); 
            geocoder.geocode({'latLng': latlng}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    // console.log(results)
                    if (results[1]) {
                        //formatted address
                        var address = results[0].formatted_address;
                        var replace = address.replace('Unnamed Road,','').trim();
                        // alert(address);
                        $('#autocomplete').val(replace);

                    } else {
                        alert("No results found");
                    }
                } else {
                    alert("Geocoder failed due to: " + status);
                }
            });

            var infoWindow = new google.maps.InfoWindow();
            var latlngbounds = new google.maps.LatLngBounds();
            var mapOptions = {
                center: new google.maps.LatLng(mlat, mlng),
                zoom: 17,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var markerImage = '<?php echo HTTP_ROOT . "img/marker.svg" ?>';
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(mlat, mlng),
                draggable: true,
                animation: google.maps.Animation.DROP,
                icon: markerImage
            });

            marker.setMap(map);


            google.maps.event.addListener(marker, 'dragend', function (e) {
                var latlng = new google.maps.LatLng(e.latLng.lat(), e.latLng.lng());
                updateMarkerPositionTxt(latlng, e.latLng.lat(), e.latLng.lng());

            });
        });
    }

    function updateMarkerPositionTxt(latLng, lat, lng) {
        //alert(lat);
        // alert(lng);
        var geocoder = geocoder = new google.maps.Geocoder();
        geocoder.geocode({'latLng': latLng}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[1]) {
                    var explode = results[1].formatted_address;
                     var replace = explode.replace('Unnamed Road,','').trim();
                    $('#autocomplete').val(replace);
                    marker = new google.maps.Marker({
                        position: latlng,
                        draggable: true,
                        animation: google.maps.Animation.DROP,
                        icon: '<?php echo HTTP_ROOT . "img/marker.svg" ?>'
                    });
                    marker.setMap(map);
                }

            }
        });

        document.getElementById("lati").value = lat;
        document.getElementById("lngi").value = lng;
    }

</script>



