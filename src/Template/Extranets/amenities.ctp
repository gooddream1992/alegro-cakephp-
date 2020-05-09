<?php
@$top = json_decode(@$propAme->Top);
@$park = json_decode(@$propAme->Parking);
@$serv = json_decode(@$propAme->Services);
@$acces = json_decode(@$propAme->Accessibility);
@$facil = json_decode(@$propAme->Facilities);
@$acti = json_decode(@$propAme->Activities);
@$food = json_decode(@$propAme->Food);
@$kit = json_decode(@$propAme->Kitchen);
@$media = json_decode(@$propAme->Media);
@$meet = json_decode(@$propAme->Meetings);
@$essen = json_decode(@$propAme->Essentials);
@$pools = json_decode(@$propAme->Pools);
?>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<style>
    #msform {
        float: left;
        width: 100%;
        overflow: hidden;
    }
    /*Hide all except first fieldset*/
    #msform fieldset:not(:first-of-type) {
        display: none;
    }
    #msform fieldset{
        float: left;
        width: 100%;
    }
</style>

<section class="basics">
    <div class="container">
        <?= $this->Form->create('', ['class' => "form-section", 'type' => 'post', 'id' => 'amenities']); ?>
        <div class="row">

            <div class="col-md-2">
                <?= $this->element('extranet/sidebar'); ?>
            </div>

            <div class="col-md-10">
                <div id="msform">


                    <fieldset>
                        <input type="hidden" name="pg-count" value="1">
                        <div class="head-section">
                            <h1><?php echo __('All the little things (and big things) you provide.'); ?><span><?php echo __('What comes with your'); ?> <?= __($mainPro->property_type); ?>? </span></h1>
                            <img src="<?= $this->Url->image('extranet/ec-amenities@2x.png'); ?>">						


                            <div class="Recommended">
                                <h2><?php echo __('Top Amenities'); ?><span><?php echo __('Guests often look for these when booking properties.'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Top[]" id="amenities1" value="Free WIFI" <?php if (@in_array("Free WIFI", @$top)) echo "checked"; ?>>
                                                <label for="amenities1"><?php echo __('Free WIFI'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Top[]" id="amenities2" value="Spa" <?php if (@in_array("Spa", @$top)) echo "checked"; ?>>
                                                <label for="amenities2"><?php echo __('Spa'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Top[]" id="amenities3" value="Gym" <?php if (@in_array("Gym", @$top)) echo "checked"; ?>>
                                                <label for="amenities3"><?php echo __('Gym'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Top[]" id="amenities4" value="Business Center" <?php if (@in_array("Business Center", @$top)) echo "checked"; ?>>
                                                <label for="amenities4"><?php echo __('Business Center'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Top[]" id="amenities5" value="Restaurant" <?php if (@in_array("Restaurant", @$top)) echo "checked"; ?>>
                                                <label for="amenities5"><?php echo __('Restaurant'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Top[]" id="amenities6" value="Non-smoking Rooms" <?php if (@in_array("Non-smoking Rooms", @$top)) echo "checked"; ?>>
                                                <label for="amenities6"><?php echo __('Non-smoking Rooms'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Top[]" id="amenities7" value="Free Parking" <?php if (@in_array("Free Parking", @$top)) echo "checked"; ?>>
                                                <label for="amenities7"><?php echo __('Free Parking'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Top[]" id="amenities8" value="Airport Shuttle" <?php if (@in_array("Airport Shuttle", @$top)) echo "checked"; ?>>
                                                <label for="amenities8"><?php echo __('Airport Shuttle'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Top[]" id="amenities9" value="Room Service" <?php if (@in_array("Room Service", @$top)) echo "checked"; ?>>
                                                <label for="amenities9"><?php echo __('Room Service'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Top[]" id="amenities10" value="Elevator/Lift" <?php if (@in_array("Elevator/Lift", @$top)) echo "checked"; ?>>
                                                <label for="amenities10"><?php echo __('Elevator/Lift'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="Recommended">
                                <h2><?php echo __('Parking & Transportation'); ?><span><?php echo __('How would your guests get around the city?'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Parking[]" id="amenities11" value="Free Parking" <?php if (@in_array("Free Parking", @$park)) echo "checked"; ?>>
                                                <label for="amenities11"><?php echo __('Free Parking'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Parking[]" id="amenities12" value="Airport Shuttle" <?php if (@in_array("Airport Shuttle", @$park)) echo "checked"; ?>>
                                                <label for="amenities12"><?php echo __('Airport Shuttle'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Parking[]" id="amenities13" value="On-site Parking" <?php if (@in_array("On-site Parking", @$park)) echo "checked"; ?>>
                                                <label for="amenities13"><?php echo __('On-site Parking'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Parking[]" id="amenities14" value="Private Parking" <?php if (@in_array("Private Parking", @$park)) echo "checked"; ?>>
                                                <label for="amenities14"><?php echo __('Private Parking'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Parking[]" id="amenities15" value="Car Rental" <?php if (@in_array("Car Rental", @$park)) echo "checked"; ?>>
                                                <label for="amenities15"><?php echo __('Car Rental'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Parking[]" id="amenities16" value="Valet Parking" <?php if (@in_array("Valet Parking", @$park)) echo "checked"; ?>>
                                                <label for="amenities16"><?php echo __('Valet Parking'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Parking[]" id="amenities17" value="Parking" <?php if (@in_array("Parking", @$park)) echo "checked"; ?>>
                                                <label for="amenities17"><?php echo __('Parking'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Parking[]" id="amenities18" value="Shuttle Service (Surcharge)" <?php if (@in_array("Shuttle Service (Surcharge)", @$park)) echo "checked"; ?>>
                                                <label for="amenities18"><?php echo __('Shuttle Service (Surcharge)'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Parking[]" id="amenities18000" value="Personal Driver" <?php if (@in_array("Personal Driver", @$park)) echo "checked"; ?>>
                                                <label for="amenities18000"><?php echo __('Personal Driver'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="Recommended">
                                <h2><?php echo __('Guest Services'); ?><span><?php echo __('What type of services are your guests going to have at their disposal?'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities19" value="Bikes Available (Free)" <?php if (@in_array("Bikes Available (Free)", @$serv)) echo "checked"; ?>>
                                                <label for="amenities19"><?php echo __('Bikes Available (Free)'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities20" value="Safe" <?php if (@in_array("Safe", @$serv)) echo "checked"; ?>>
                                                <label for="amenities20"><?php echo __('Safe'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities21" value="Concierge Service" <?php if (@in_array("Concierge Service", @$serv)) echo "checked"; ?>>
                                                <label for="amenities21"><?php echo __('Concierge Service'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities22" value="Private Check-in/Check-out" <?php if (@in_array("Private Check-in/Check-out", @$serv)) echo "checked"; ?>>
                                                <label for="amenities22"><?php echo __('Private Check-in/Check-out'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities23" value="Laundry Service" <?php if (@in_array("Laundry Service", @$serv)) echo "checked"; ?>>
                                                <label for="amenities23"><?php echo __('Laundry Service'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities24" value="Atm/Cash Machine on Site" <?php if (@in_array("Atm/Cash Machine on Site", @$serv)) echo "checked"; ?>>
                                                <label for="amenities24"><?php echo __('Atm/Cash Machine on Site'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities25" value="Express Check-in/Check-out" <?php if (@in_array("Express Check-in/Check-out", @$serv)) echo "checked"; ?>>
                                                <label for="amenities25"><?php echo __('Express Check-in/Check-out'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities26" value="Trouser/Suit Press" <?php if (@in_array("Trouser/Suit Press", @$serv)) echo "checked"; ?>>
                                                <label for="amenities26"><?php echo __('Trouser/Suit Press'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities27" value="Daily Maid Service" <?php if (@in_array("Daily Maid Service", @$serv)) echo "checked"; ?>>
                                                <label for="amenities27"><?php echo __('Daily Maid Service'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities28" value="Babysitting/Child Services" <?php if (@in_array("Babysitting/Child Services", @$serv)) echo "checked"; ?>>
                                                <label for="amenities28"><?php echo __('Babysitting/Child Services'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities29" value="Baggage Storage" <?php if (@in_array("Baggage Storage", @$serv)) echo "checked"; ?>>
                                                <label for="amenities29"><?php echo __('Baggage Storage'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities30" value="Fax/Photocopying" <?php if (@in_array("Fax/Photocopying", @$serv)) echo "checked"; ?>>
                                                <label for="amenities30"><?php echo __('Fax/Photocopying'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities31" value="Currency Exchange" <?php if (@in_array("Currency Exchange", @$serv)) echo "checked"; ?>>
                                                <label for="amenities31"><?php echo __('Currency Exchange'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities32" value="Lockers" <?php if (@in_array("Lockers", @$serv)) echo "checked"; ?>>
                                                <label for="amenities32"><?php echo __('Lockers'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities33" value="24-hour Front Desk" <?php if (@in_array("24-hour Front Desk", @$serv)) echo "checked"; ?>>
                                                <label for="amenities33"><?php echo __('24-hour Front Desk'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities34" value="Newspapers" <?php if (@in_array("Newspapers", @$serv)) echo "checked"; ?>>
                                                <label for="amenities34"><?php echo __('Newspapers'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities35" value="Ironing Service" <?php if (@in_array("Ironing Service", @$serv)) echo "checked"; ?>>
                                                <label for="amenities35"><?php echo __('Ironing Service'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities36" value="Tour Desk" <?php if (@in_array("Tour Desk", @$serv)) echo "checked"; ?>>
                                                <label for="amenities36"><?php echo __('Tour Desk'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities37" value="Hair Dryer" <?php if (@in_array("Hair Dryer", @$serv)) echo "checked"; ?>>
                                                <label for="amenities37"><?php echo __('Hair Dryer'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities38" value="Minibar" <?php if (@in_array("Minibar", @$serv)) echo "checked"; ?>>
                                                <label for="amenities38"><?php echo __('Minibar'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities39" value="Breakfast Included" <?php if (@in_array("Breakfast Included", @$serv)) echo "checked"; ?>>
                                                <label for="amenities39"><?php echo __('Breakfast Included'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities40" value="Alarm Clock" <?php if (@in_array("Alarm Clock", @$serv)) echo "checked"; ?>>
                                                <label for="amenities40"><?php echo __('Alarm Clock'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities41" value="Stereo" <?php if (@in_array("Stereo", @$serv)) echo "checked"; ?>>
                                                <label for="amenities41"><?php echo __('Stereo'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities42" value="Toilet" <?php if (@in_array("Toilet", @$serv)) echo "checked"; ?>>
                                                <label for="amenities42"><?php echo __('Toilet'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities43" value="Bathroom" <?php if (@in_array("Bathroom", @$serv)) echo "checked"; ?>>
                                                <label for="amenities43"><?php echo __('Bathroom'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities44" value="Balcony" <?php if (@in_array("Balcony", @$serv)) echo "checked"; ?>>
                                                <label for="amenities44"><?php echo __('Balcony'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities45" value="Hot tub" <?php if (@in_array("Hot tub", @$serv)) echo "checked"; ?>>
                                                <label for="amenities45"><?php echo __('Hot tub'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities46" value="Air Conditioning" <?php if (@in_array("Air Conditioning", @$serv)) echo "checked"; ?>>
                                                <label for="amenities46"><?php echo __('Air Conditioning'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities47" value="Sofa" <?php if (@in_array("Sofa", @$serv)) echo "checked"; ?>>
                                                <label for="amenities47"><?php echo __('Sofa'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities48" value="Shower" <?php if (@in_array("Shower", @$serv)) echo "checked"; ?>>
                                                <label for="amenities48"><?php echo __('Shower'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities49" value="Bathtub" <?php if (@in_array("Bathtub", @$serv)) echo "checked"; ?>>
                                                <label for="amenities49"><?php echo __('Bathtub'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities50" value="Soundproofing" <?php if (@in_array("Soundproofing", @$serv)) echo "checked"; ?>>
                                                <label for="amenities50"><?php echo __('Soundproofing'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities51" value="Towels" <?php if (@in_array("Towels", @$serv)) echo "checked"; ?>>
                                                <label for="amenities51"><?php echo __('Towels'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities52" value="Chairs" <?php if (@in_array("Chairs", @$serv)) echo "checked"; ?>>
                                                <label for="amenities52"><?php echo __('Chairs'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities53" value="Desk" <?php if (@in_array("Desk", @$serv)) echo "checked"; ?>>
                                                <label for="amenities53"><?php echo __('Desk'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities54" value="Bed Linen" <?php if (@in_array("Bed Linen", @$serv)) echo "checked"; ?>>
                                                <label for="amenities54"><?php echo __('Bed Linen'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities55" value="Boiler" <?php if (@in_array("Boiler", @$serv)) echo "checked"; ?>>
                                                <label for="amenities55"><?php echo __('Boiler'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Services[]" id="amenities56" value="Heating" <?php if (@in_array("Heating", @$serv)) echo "checked"; ?>>
                                                <label for="amenities56"><?php echo __('Heating'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="Recommended">
                                <h2><?php echo __('Accessibility'); ?><span><?php echo __('What would your guests find helpful and convenient in your stay?'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Accessibility[]" id="amenities57" value="Elevator/Lift" <?php if (@in_array("Elevator/Lift", @$acces)) echo "checked"; ?>>
                                                <label for="amenities57"><?php echo __('Elevator/Lift'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Accessibility[]" id="amenities58" value="Emergency Exit" <?php if (@in_array("Emergency Exit", @$acces)) echo "checked"; ?>>
                                                <label for="amenities58"><?php echo __('Emergency Exit'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Accessibility[]" id="amenities59" value="Wheelchair accessible" <?php if (@in_array("Wheelchair accessible", @$acces)) echo "checked"; ?>>
                                                <label for="amenities59"><?php echo __('Wheelchair accessible'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Accessibility[]" id="amenities60" value="Fire Extinguisher" <?php if (@in_array("Fire Extinguisher", @$acces)) echo "checked"; ?>>
                                                <label for="amenities60"><?php echo __('Fire Extinguisher'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Accessibility[]" id="amenities61" value="Smoke Detector" <?php if (@in_array("Smoke Detector", @$acces)) echo "checked"; ?>>
                                                <label for="amenities61"><?php echo __('Smoke Detector'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Accessibility[]" id="amenities62" value="First aid kit" <?php if (@in_array("First aid kit", @$acces)) echo "checked"; ?>>
                                                <label for="amenities62"><?php echo __('First aid kit'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Accessibility[]" id="amenities63" value="Buzzer/wireless intercom" <?php if (@in_array("Buzzer/wireless intercom", @$acces)) echo "checked"; ?>>
                                                <label for="amenities63"><?php echo __('Buzzer/wireless intercom'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Accessibility[]" id="amenities64" value="Doorman" <?php if (@in_array("Doorman", @$acces)) echo "checked"; ?>>
                                                <label for="amenities64"><?php echo __('Doorman'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="Recommended">
                                <h2><?php echo __('Facilities'); ?><span><?php echo __('What your guests are looking for and might increase the chances of you getting more bookings?'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Facilities[]" id="amenities65" value="Business Center" <?php if (@in_array("Business Center", @$facil)) echo "checked"; ?>>
                                                <label for="amenities65"><?php echo __('Business Center'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Facilities[]" id="amenities66" value="No Smoking Rooms" <?php if (@in_array("No Smoking Rooms", @$facil)) echo "checked"; ?>>
                                                <label for="amenities66"><?php echo __('Non-smoking Rooms'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Facilities[]" id="amenities67" value="Terrace" <?php if (@in_array("Terrace", @$facil)) echo "checked"; ?>>
                                                <label for="amenities67"><?php echo __('Terrace'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Facilities[]" id="amenities68" value="Sun Terrace/Deck" <?php if (@in_array("Sun Terrace/Deck", @$facil)) echo "checked"; ?>>
                                                <label for="amenities68"><?php echo __('Sun Terrace/Deck'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Facilities[]" id="amenities69" value="Family Rooms" <?php if (@in_array("Family Rooms", @$facil)) echo "checked"; ?>>
                                                <label for="amenities69"><?php echo __('Family Rooms'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Facilities[]" id="amenities70" value="Air Conditioning" <?php if (@in_array("Air Conditioning", @$facil)) echo "checked"; ?>>
                                                <label for="amenities70"><?php echo __('Air Conditioning'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Facilities[]" id="amenities71" value="Grounds/Garden" <?php if (@in_array("Grounds/Garden", @$facil)) echo "checked"; ?>>
                                                <label for="amenities71"><?php echo __('Grounds/Garden'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Facilities[]" id="amenities72" value="Designated Smoking Area" <?php if (@in_array("Designated Smoking Area", @$facil)) echo "checked"; ?>>
                                                <label for="amenities72"><?php echo __('Designated Smoking Area'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Facilities[]" id="amenities73" value="Bbq Facilities" <?php if (@in_array("Bbq Facilities", @$facil)) echo "checked"; ?>>
                                                <label for="amenities73"><?php echo __('Bbq Facilities'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Facilities[]" id="amenities74" value="Hair/Beauty Salon/Barber" <?php if (@in_array("Hair/Beauty Salon/Barber", @$facil)) echo "checked"; ?>>
                                                <label for="amenities74"><?php echo __('Hair/Beauty Salon/Barber'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Facilities[]" id="amenities75" value="Shops/Stores (on Site)" <?php if (@in_array("Shops/Stores (on Site)", @$facil)) echo "checked"; ?>>
                                                <label for="amenities75"><?php echo __('Shops/Stores (on Site)'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="Recommended">
                                <h2><?php echo __('Activities & Entertainment'); ?><span><?php echo __('How would your guests spend their time while at your property?'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities76" value="Windsurfing" <?php if (@in_array("Windsurfing", @$acti)) echo "checked"; ?>>
                                                <label for="amenities76"><?php echo __('Windsurfing'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities77" value="Game Room" <?php if (@in_array("Game Room", @$acti)) echo "checked"; ?>>
                                                <label for="amenities77"><?php echo __('Game Room'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities78" value="Cycling" <?php if (@in_array("Cycling", @$acti)) echo "checked"; ?>>
                                                <label for="amenities78"><?php echo __('Cycling'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities79" value="Canoeing" <?php if (@in_array("Canoeing", @$acti)) echo "checked"; ?>>
                                                <label for="amenities79"><?php echo __('Canoeing'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities80" value="Evening entertainment" <?php if (@in_array("Evening entertainment", @$acti)) echo "checked"; ?>>
                                                <label for="amenities80"><?php echo __('Evening entertainment'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities81" value="Bicycle Rental" <?php if (@in_array("Bicycle Rental", @$acti)) echo "checked"; ?>>
                                                <label for="amenities81"><?php echo __('Bicycle Rental'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities82" value="Fishing" <?php if (@in_array("Fishing", @$acti)) echo "checked"; ?>>
                                                <label for="amenities82"><?php echo __('Fishing'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities83" value="Water sports (on site)" <?php if (@in_array("Water sports (on site)", @$acti)) echo "checked"; ?>>
                                                <label for="amenities83"><?php echo __('Water sports (on site)'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities84" value="Entertainment Staff" <?php if (@in_array("Entertainment Staff", @$acti)) echo "checked"; ?>>
                                                <label for="amenities84"><?php echo __('Entertainment Staff'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities85" value="Hiking" <?php if (@in_array("Hiking", @$acti)) echo "checked"; ?>>
                                                <label for="amenities85"><?php echo __('Hiking'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities86" value="Gym" <?php if (@in_array("Gym", @$acti)) echo "checked"; ?>>
                                                <label for="amenities86"><?php echo __('Gym'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities87" value="Nightclub/DJ" <?php if (@in_array("Nightclub/DJ", @$acti)) echo "checked"; ?>>
                                                <label for="amenities87"><?php echo __('Nightclub/DJ'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities88" value="Diving" <?php if (@in_array("Diving", @$acti)) echo "checked"; ?>>
                                                <label for="amenities88"><?php echo __('Diving'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities89" value="Karaoke" <?php if (@in_array("Karaoke", @$acti)) echo "checked"; ?>>
                                                <label for="amenities89"><?php echo __('Karaoke'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities90" value="Cyber Cafe" <?php if (@in_array("Cyber Cafe", @$acti)) echo "checked"; ?>>
                                                <label for="amenities90"><?php echo __('Cyber Cafe'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities91" value="Library" <?php if (@in_array("Library", @$acti)) echo "checked"; ?>>
                                                <label for="amenities91"><?php echo __('Library'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities92" value="Football Pitch" <?php if (@in_array("Football Pitch", @$acti)) echo "checked"; ?>>
                                                <label for="amenities92"><?php echo __('Football Pitch'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities93" value="Basketball Court" <?php if (@in_array("Basketball Court", @$acti)) echo "checked"; ?>>
                                                <label for="amenities93"><?php echo __('Basketball Court'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities94" value="Tennis Court" <?php if (@in_array("Tennis Court", @$acti)) echo "checked"; ?>>
                                                <label for="amenities94"><?php echo __('Tennis Court'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities95" value="Golf Resort" <?php if (@in_array("Golf Resort", @$acti)) echo "checked"; ?>>
                                                <label for="amenities95"><?php echo __('Golf Resort'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities96" value="Gentlemen´s Club" <?php if (@in_array("Gentlemen´s Club", @$acti)) echo "checked"; ?>>
                                                <label for="amenities96"><?php echo __('Gentlemens Club'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities97" value="Amusement Park" <?php if (@in_array("Amusement Park", @$acti)) echo "checked"; ?>>
                                                <label for="amenities97"><?php echo __('Amusement Park'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities98" value="Zoologic" <?php if (@in_array("Zoologic", @$acti)) echo "checked"; ?>>
                                                <label for="amenities98"><?php echo __('Zoologic'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities99" value="Pub" <?php if (@in_array("Pub", @$acti)) echo "checked"; ?>>
                                                <label for="amenities99"><?php echo __('Pub'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities100" value="Bowling Center" <?php if (@in_array("Bowling Center", @$acti)) echo "checked"; ?>>
                                                <label for="amenities100"><?php echo __('Bowling Center'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities101" value="Paintball Center" <?php if (@in_array("Paintball Center", @$acti)) echo "checked"; ?>>
                                                <label for="amenities101"><?php echo __('Paintball Center'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities102" value="Cinema" <?php if (@in_array("Cinema", @$acti)) echo "checked"; ?>>
                                                <label for="amenities102"><?php echo __('Cinema'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Activities[]" id="amenities103" value="Shopping Mall" <?php if (@in_array("Shopping Mall", @$acti)) echo "checked"; ?>>
                                                <label for="amenities103"><?php echo __('Shopping Mall'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="Recommended">
                                <h2><?php echo __('Food & Drink'); ?><span><?php echo __('How would your guests feed themselves?'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Food[]" id="amenities104" value="Restaurant" <?php if (@in_array("Restaurant", @$food)) echo "checked"; ?>>
                                                <label for="amenities104"><?php echo __('Restaurant'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Food[]" id="amenities105" value="Bar" <?php if (@in_array("Bar", @$food)) echo "checked"; ?>>
                                                <label for="amenities105"><?php echo __('Bar'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Food[]" id="amenities106" value="Special Diet Meals (upon Request)" <?php if (@in_array("Special Diet Meals (upon Request)", @$food)) echo "checked"; ?>>
                                                <label for="amenities106"><?php echo __('Diet Meals (upon Request)'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Food[]" id="amenities107" value="Shared Kitchen" <?php if (@in_array("Shared Kitchen", @$food)) echo "checked"; ?>>
                                                <label for="amenities107"><?php echo __('Shared Kitchen'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Food[]" id="amenities108" value="Packed Lunches" <?php if (@in_array("Packed Lunches", @$food)) echo "checked"; ?>>
                                                <label for="amenities108"><?php echo __('Packed Lunches'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Food[]" id="amenities109" value="Snack Bar" <?php if (@in_array("Snack Bar", @$food)) echo "checked"; ?>>
                                                <label for="amenities109"><?php echo __('Snack Bar'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Food[]" id="amenities110" value="Room Service" <?php if (@in_array("Room Service", @$food)) echo "checked"; ?>>
                                                <label for="amenities110"><?php echo __('Room Service'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Food[]" id="amenities111" value="Breakfast in the Room" <?php if (@in_array("Breakfast in the Room", @$food)) echo "checked"; ?>>
                                                <label for="amenities111"><?php echo __('Breakfast in the Room'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Food[]" id="amenities112" value="Grocery Deliveries" <?php if (@in_array("Grocery Deliveries", @$food)) echo "checked"; ?>>
                                                <label for="amenities112"><?php echo __('Grocery Deliveries'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="Recommended">
                                <h2><?php echo __('Kitchen & Dining'); ?><span><?php echo __('What type of items will the kitchen be equipped with?'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities113" value="Kitchenette" <?php if (@in_array("Kitchenette", @$kit)) echo "checked"; ?>>
                                                <label for="amenities113"><?php echo __('Kitchenette'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities114" value="Microwave" <?php if (@in_array("Microwave", @$kit)) echo "checked"; ?>>
                                                <label for="amenities114"><?php echo __('Microwave'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities115" value="Dining Room" <?php if (@in_array("Dining Room", @$kit)) echo "checked"; ?>>
                                                <label for="amenities115"><?php echo __('Dining Room'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities116" value="Refrigerator" <?php if (@in_array("Refrigerator", @$kit)) echo "checked"; ?>>
                                                <label for="amenities116"><?php echo __('Refrigerator'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities117" value="Cook" <?php if (@in_array("Cook", @$kit)) echo "checked"; ?>>
                                                <label for="amenities117"><?php echo __('Cook'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities118" value="Oven" <?php if (@in_array("Oven", @$kit)) echo "checked"; ?>>
                                                <label for="amenities118"><?php echo __('Oven'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities119" value="Hair Dryer" <?php if (@in_array("Hair Dryer", @$kit)) echo "checked"; ?>>
                                                <label for="amenities119"><?php echo __('Hair Dryer'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities120" value="Dishwasher" <?php if (@in_array("Dishwasher", @$kit)) echo "checked"; ?>>
                                                <label for="amenities120"><?php echo __('Dishwasher'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities121" value="Minibar" <?php if (@in_array("Minibar", @$kit)) echo "checked"; ?>>
                                                <label for="amenities121"><?php echo __('Minibar'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities122" value="Fridge/Freezer" <?php if (@in_array("Fridge/Freezer", @$kit)) echo "checked"; ?>>
                                                <label for="amenities122"><?php echo __('Fridge/Freezer'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities123" value="Electric kettle" <?php if (@in_array("Electric kettle", @$kit)) echo "checked"; ?>>
                                                <label for="amenities123"><?php echo __('Electric kettle'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Kitchen[]" id="amenities124" value="Coffee Maker" <?php if (@in_array("Coffee Maker", @$kit)) echo "checked"; ?>>
                                                <label for="amenities124"><?php echo __('Coffee Maker'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="Recommended">
                                <h2><?php echo __('Media/Technology'); ?><span><?php echo __('What type of technologies would your provide to your guests?'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Media[]" id="amenities125" value="Shared Lounge/TV Area" <?php if (@in_array("Shared Lounge/TV Area", @$media)) echo "checked"; ?>>
                                                <label for="amenities125"><?php echo __('Shared Lounge/TV Area'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Media[]" id="amenities126" value="Free WIFI" <?php if (@in_array("Free WIFI", @$media)) echo "checked"; ?>>
                                                <label for="amenities126"><?php echo __('Free WIFI'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Media[]" id="amenities127" value="Internet Services" <?php if (@in_array("Internet Services", @$media)) echo "checked"; ?>>
                                                <label for="amenities127"><?php echo __('Internet Services'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Media[]" id="amenities128" value="WIFI Available in All Areas" <?php if (@in_array("WIFI Available in All Areas", @$media)) echo "checked"; ?>>
                                                <label for="amenities128"><?php echo __('WIFI Available in All Areas'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Media[]" id="amenities129" value="Free Internet Available" <?php if (@in_array("Free Internet Available", @$media)) echo "checked"; ?>>
                                                <label for="amenities129"><?php echo __('Free Internet Available'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Media[]" id="amenities130" value="Free Internet Access" <?php if (@in_array("Free Internet Access", @$media)) echo "checked"; ?>>
                                                <label for="amenities130"><?php echo __('Free Internet Access'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Media[]" id="amenities131" value="Hybrid Charging Station" <?php if (@in_array("Hybrid Charging Station", @$media)) echo "checked"; ?>>
                                                <label for="amenities131"><?php echo __('Hybrid Charging Station'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Media[]" id="amenities132" value="TV" <?php if (@in_array("TV", @$media)) echo "checked"; ?>>
                                                <label for="amenities132"><?php echo __('TV'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Media[]" id="amenities133" value="Flat-screen TV" <?php if (@in_array("Flat-screen TV", @$media)) echo "checked"; ?>>
                                                <label for="amenities133"><?php echo __('Flat-screen TV'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Media[]" id="amenities134" value="Smart TV" <?php if (@in_array("Smart TV", @$media)) echo "checked"; ?>>
                                                <label for="amenities134"><?php echo __('Smart TV'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Media[]" id="amenities135" value="Cable TV" <?php if (@in_array("Cable TV", @$media)) echo "checked"; ?>>
                                                <label for="amenities135"><?php echo __('Cable TV'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="Recommended">
                                <h2><?php echo __('Meetings & Events'); ?><span><?php echo __('Will your guests benefit from any of the options below?'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Meetings[]" id="amenities136" value="Vip Room" <?php if (@in_array("Vip Room", @$meet)) echo "checked"; ?>>
                                                <label for="amenities136"><?php echo __('Vip Room'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Meetings[]" id="amenities137" value="Honeymoon Suite" <?php if (@in_array("Honeymoon Suite", @$meet)) echo "checked"; ?>>
                                                <label for="amenities137"><?php echo __('Honeymoon Suite'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Meetings[]" id="amenities138" value="Meeting/Banquet" <?php if (@in_array("Meeting/Banquet", @$meet)) echo "checked"; ?>>
                                                <label for="amenities138"><?php echo __('Meeting/Banquet'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="Recommended">
                                <h2><?php echo __('Essentials'); ?><span><?php echo __('All Must-Haves'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Essentials[]" id="amenities139" value="Iron" <?php if (@in_array("Iron", @$essen)) echo "checked"; ?>>
                                                <label for="amenities139"><?php echo __('Iron'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Essentials[]" id="amenities140" value="Ironing Board" <?php if (@in_array("Ironing Board", @$essen)) echo "checked"; ?>>
                                                <label for="amenities140"><?php echo __('Ironing Board'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Essentials[]" id="amenities141" value="Laundry" <?php if (@in_array("Laundry", @$essen)) echo "checked"; ?>>
                                                <label for="amenities141"><?php echo __('Laundry'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Essentials[]" id="amenities142" value="Washing Machine" <?php if (@in_array("Washing Machine", @$essen)) echo "checked"; ?>>
                                                <label for="amenities142"><?php echo __('Washing Machine'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="Recommended">
                                <h2><?php echo __('Pools & Wellness'); ?><span><?php echo __('Guests like to take care of themselves'); ?></span></h2>
                                <div class="amenities-section">
                                    <ul>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Pools[]" id="amenities143" value="Spa" <?php if (@in_array("Spa", @$pools)) echo "checked"; ?>>
                                                <label for="amenities143"><?php echo __('Spa'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Pools[]" id="amenities144" value="Hot Tub" <?php if (@in_array("Hot Tub", @$pools)) echo "checked"; ?>>
                                                <label for="amenities144"><?php echo __('Hot Tub'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Pools[]" id="amenities145" value="Massage" <?php if (@in_array("Massage", @$pools)) echo "checked"; ?>>
                                                <label for="amenities145"><?php echo __('Massage'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Pools[]" id="amenities146" value="Sauna" <?php if (@in_array("Sauna", @$pools)) echo "checked"; ?>>
                                                <label for="amenities146"><?php echo __('Sauna'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Pools[]" id="amenities147" value="Gym" <?php if (@in_array("Gym", @$pools)) echo "checked"; ?>>
                                                <label for="amenities147"><?php echo __('Gym'); ?></label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="amenities">
                                                <input type="checkbox" name="Pools[]" id="amenities148" value="Turkish Bath/Steam Bath" <?php if (@in_array("Turkish Bath/Steam Bath", @$pools)) echo "checked"; ?>>
                                                <label for="amenities148"><?php echo __('Turkish Bath/Steam Bath'); ?></label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>                   

                        </div>
                        <button type="button" name="next" class="next action-button" value="Next" style="text-decoration: none;color: #000;float: right;padding: 11px 46px;margin-left: 10px;font-size: 15px;font-weight: normal;border-radius: 4px !important;background-color: #f9d749;"  ><?php echo __('NEXT'); ?></button>

                        <span><a href="<?= HTTP_ROOT; ?>extranets/description/<?= $id; ?>" style="text-decoration: none;color: #000;float: right;padding: 10px 25px;border: 1px solid #000000;font-weight: normal;border-radius: 4px !important;background-color: #fff;"><?php echo __('PREVIOUS'); ?></a></span>


                    </fieldset>
                    <?php
                    $cun = 1;

                    foreach ($availableBeds as $bes) {
                        $cun++;
                        @$propAme_sub = $this->User->subAminiti($id,$bes->id);
                        @$top_sub = json_decode(@$propAme_sub->Top);
                        @$park_sub = json_decode(@$propAme_sub->Parking);
                        @$serv_sub = json_decode(@$propAme_sub->Services);
                        @$acces_sub = json_decode(@$propAme_sub->Accessibility);
                        @$facil_sub = json_decode(@$propAme_sub->Facilities);
                        @$acti_sub = json_decode(@$propAme_sub->Activities);
                        @$food_sub = json_decode(@$propAme_sub->Food);
                        @$kit_sub = json_decode(@$propAme_sub->Kitchen);
                        @$media_sub = json_decode(@$propAme_sub->Media);
                        @$meet_sub = json_decode(@$propAme_sub->Meetings);
                        @$essen_sub = json_decode(@$propAme_sub->Essentials);
                        $pools_sub = json_decode(@$propAme_sub->Pools);
                        ?>
                        <fieldset>  
                            <input type="hidden" name="pg-count" value="<?= $cun; ?>">
                            <!-- <div class="head-section" style="padding-bottom: 0px;">
                                <h1 style="margin: 0px;"> <?= $bes->bed_name; ?></h1>
                            </div>-->
                            <input type="hidden" name="subid<?= $cun; ?>" value="<?= $bes->id; ?>" >
                            <div class="head-section">
                                <h1><?=__("All the little things (and big things) you provide.");?><span><?=__("What comes with your");?> <?= $bes->bed_name; ?>? </span></h1>
                                <img src="<?= $this->Url->image('extranet/ec-amenities@2x.png'); ?>">

                                <div class="Recommended">
                                    <h2><?=__("Top Amenities");?><span><?=__("Guests often look for these when booking accommodations.");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Top<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s1" value="Free WIFI" <?php if (@in_array("Free WIFI", @$top_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s1"><?=__("Free WIFI");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Top<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s2" value="Spa" <?php if (@in_array("Spa", @$top_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s2"><?=__("Spa");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Top<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s3" value="Gym" <?php if (@in_array("Gym", @$top_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s3"><?=__("Gym");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Top<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s4" value="Business Center" <?php if (@in_array("Business Center", @$top_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s4"><?=__("Business Center");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Top<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s5" value="Restaurant" <?php if (@in_array("Restaurant", @$top_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s5"><?=__("Restaurant");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Top<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s6" value="Non-smoking Rooms" <?php if (@in_array("Non-smoking Rooms", @$top_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s6"><?=__("Non-smoking Rooms");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Top<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s7" value="Free Parking" <?php if (@in_array("Free Parking", @$top_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s7"><?=__("Free Parking");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Top<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s8" value="Airport Shuttle" <?php if (@in_array("Airport Shuttle", @$top_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s8"><?=__("Airport Shuttle");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Top<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s9" value="Room Service" <?php if (@in_array("Room Service", @$top_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s9"><?=__("Room Service");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Top<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s10" value="Elevator/Lift" <?php if (@in_array("Elevator/Lift", @$top_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s10"><?=__("Elevator/Lift");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--new Sec Start--->

                                <div class="Recommended">
                                    <h2><?=__("Parking & Transportation");?><span><?=__("How would your guests get around the city?");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Parking<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s11" value="Free Parking" <?php if (@in_array("Free Parking", @$park_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s11"><?=__("Free Parking");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Parking<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s12" value="Airport Shuttle" <?php if (@in_array("Airport Shuttle", @$park_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s12"><?=__("Airport Shuttle");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Parking<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s13" value="On-site Parking" <?php if (@in_array("On-site Parking", @$park_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s13"><?=__("On-site Parking");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Parking<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s14" value="Private Parking" <?php if (@in_array("Private Parking", @$park_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s14"><?=__("Private Parking");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Parking<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s15" value="Car Rental" <?php if (@in_array("Car Rental", @$park_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s15"><?=__("Car Rental");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Parking<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s16" value="Valet Parking" <?php if (@in_array("Valet Parking", @$park_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s16"><?=__("Valet Parking");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Parking<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s17" value="Parking" <?php if (@in_array("Parking", @$park_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s17"><?=__("Parking");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Parking<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s18" value="Shuttle Service (Surcharge)" <?php if (@in_array("Shuttle Service (Surcharge)", @$park_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s18"><?=__("Shuttle Service (Surcharge)");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Parking<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s18000" value="Personal Driver" <?php if (@in_array("Personal Driver", @$park_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s18000"><?=__("Personal Driver");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="Recommended">
                                    <h2><?=__("Guest Services");?><span><?=__("What type of services are your guests going to have at their disposal?");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s19" value="Bikes Available (Free)" <?php if (@in_array("Bikes Available (Free)", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s19"><?=__("Bikes Available (Free)");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s20" value="Safe" <?php if (@in_array("Safe", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s20"><?=__("Safe");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s21" value="Concierge Service" <?php if (@in_array("Concierge Service", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s21"><?=__("Concierge Service");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s22" value="Private Check-in/Check-out" <?php if (@in_array("Private Check-in/Check-out", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s22"><?=__("Private Check-in/Check-out");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s23" value="Laundry Service" <?php if (@in_array("Laundry Service", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s23"><?=__("Laundry Service");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s24" value="Atm/Cash Machine on Site" <?php if (@in_array("Atm/Cash Machine on Site", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s24"><?=__("Atm/Cash Machine on Site");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s25" value="Express Check-in/Check-out" <?php if (@in_array("Express Check-in/Check-out", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s25"><?=__("Express Check-in/Check-out");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s26" value="Trouser/Suit Press" <?php if (@in_array("Trouser/Suit Press", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s26"><?=__("Trouser/Suit Press");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s27" value="Daily Maid Service" <?php if (@in_array("Daily Maid Service", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s27"><?=__("Daily Maid Service");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s28" value="Babysitting/Child Services" <?php if (@in_array("Babysitting/Child Services", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s28"><?=__("Babysitting/Child Services");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s29" value="Baggage Storage" <?php if (@in_array("Baggage Storage", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s29"><?=__("Baggage Storage");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s30" value="Fax/Photocopying" <?php if (@in_array("Fax/Photocopying", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s30"><?=__("Fax/Photocopying");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s31" value="Currency Exchange" <?php if (@in_array("Currency Exchange", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s31"><?=__("Currency Exchange");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s32" value="Lockers" <?php if (@in_array("Lockers", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s32"><?=__("Lockers");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s33" value="24-hour Front Desk" <?php if (@in_array("24-hour Front Desk", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s33"><?=__("24-hour Front Desk");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s34" value="Newspapers" <?php if (@in_array("Newspapers", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s34"><?=__("Newspapers");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s35" value="Ironing Service" <?php if (@in_array("Ironing Service", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s35"><?=__("Ironing Service");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s36" value="Tour Desk" <?php if (@in_array("Tour Desk", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s36"><?=__("Tour Desk");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s37" value="Hair Dryer" <?php if (@in_array("Hair Dryer", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s37"><?=__("Hair Dryer");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s38" value="Minibar" <?php if (@in_array("Minibar", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s38"><?=__("Minibar");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s39" value="Breakfast Included" <?php if (@in_array("Breakfast Included", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s39"><?=__("Breakfast Included");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s40" value="Alarm Clock" <?php if (@in_array("Alarm Clock", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s40"><?=__("Alarm Clock");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s41" value="Stereo" <?php if (@in_array("Stereo", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s41"><?=__("Stereo");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s42" value="Toilet" <?php if (@in_array("Toilet", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s42"><?=__("Toilet");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s43" value="Bathroom" <?php if (@in_array("Bathroom", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s43"><?=__("Bathroom");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s44" value="Balcony" <?php if (@in_array("Balcony", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s44"><?=__("Balcony");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s45" value="Hot tub" <?php if (@in_array("Hot tub", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s45"><?=__("Hot tub");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s46" value="Air Conditioning" <?php if (@in_array("Air Conditioning", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s46"><?=__("Air Conditioning");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s47" value="Sofa" <?php if (@in_array("Sofa", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s47"><?=__("Sofa");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s48" value="Shower" <?php if (@in_array("Shower", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s48"><?=__("Shower");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s49" value="Bathtub" <?php if (@in_array("Bathtub", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s49"><?=__("Bathtub");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s50" value="Soundproofing" <?php if (@in_array("Soundproofing", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s50"><?=__("Soundproofing");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s51" value="Towels" <?php if (@in_array("Towels", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s51"><?=__("Towels");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s52" value="Chairs" <?php if (@in_array("Chairs", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s52"><?=__("Chairs");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s53" value="Desk" <?php if (@in_array("Desk", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s53"><?=__("Desk");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s54" value="Bed Linen" <?php if (@in_array("Bed Linen", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s54"><?=__("Bed Linen");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s55" value="Boiler" <?php if (@in_array("Boiler", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s55"><?=__("Boiler");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Services<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s56" value="Heating" <?php if (@in_array("Heating", @$serv_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s56"><?=__("Heating");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="Recommended">
                                    <h2><?=__("Accessibility");?><span><?=__("What would your guests find helpful and convenient in your stay?");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Accessibility<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s57" value="Elevator/Lift" <?php if (@in_array("Elevator/Lift", @$acces_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s57"><?=__("Elevator/Lift");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Accessibility<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s58" value="Emergency Exit" <?php if (@in_array("Emergency Exit", @$acces_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s58"><?=__("Emergency Exit");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Accessibility<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s59" value="Wheelchair accessible" <?php if (@in_array("Wheelchair accessible", @$acces_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s59"><?=__("Wheelchair accessible");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Accessibility<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s60" value="Fire Extinguisher" <?php if (@in_array("Fire Extinguisher", @$acces_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s60"><?=__("Fire Extinguisher");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Accessibility<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s61" value="Smoke Detector" <?php if (@in_array("Smoke Detector", @$acces_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s61"><?=__("Smoke Detector");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Accessibility<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s62" value="First aid kit" <?php if (@in_array("First aid kit", @$acces_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s62"><?=__("First aid kit");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Accessibility<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s63" value="Buzzer/wireless intercom" <?php if (@in_array("Buzzer/wireless intercom", @$acces_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s63"><?=__("Buzzer/wireless intercom");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Accessibility<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s64" value="Doorman" <?php if (@in_array("Doorman", @$acces_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s64"><?=__("Doorman");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="Recommended">
                                    <h2><?=__("Facilities");?><span><?=__("What your guests are looking for and might increase the chances of you getting more bookings?");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Facilities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s65" value="Business Center" <?php if (@in_array("Business Center", @$facil_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s65"><?=__("Business Center");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Facilities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s66" value="No Smoking Rooms" <?php if (@in_array("No Smoking Rooms", @$facil_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s66"><?=__("No Smoking Rooms");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Facilities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s67" value="Terrace" <?php if (@in_array("Terrace", @$facil_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s67"><?=__("Terrace");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Facilities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s68" value="Sun Terrace/Deck" <?php if (@in_array("Sun Terrace/Deck", @$facil_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s68"><?=__("Sun Terrace/Deck");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Facilities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s69" value="Family Rooms" <?php if (@in_array("Family Rooms", @$facil_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s69"><?=__("Family Rooms");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Facilities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s70" value="Air Conditioning" <?php if (@in_array("Air Conditioning", @$facil_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s70"><?=__("Air Conditioning");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Facilities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s71" value="Grounds/Garden" <?php if (@in_array("Grounds/Garden", @$facil_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s71"><?=__("Grounds/Garden");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Facilities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s72" value="Designated Smoking Area" <?php if (@in_array("Designated Smoking Area", @$facil_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s72"><?=__("Designated Smoking Area");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Facilities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s73" value="Bbq Facilities" <?php if (@in_array("Bbq Facilities", @$facil_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s73"><?=__("Bbq Facilities");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Facilities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s74" value="Hair/Beauty Salon/Barber" <?php if (@in_array("Hair/Beauty Salon/Barber", @$facil_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s74"><?=__("Hair/Beauty Salon/Barber");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Facilities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s75" value="Shops/Stores (on Site)" <?php if (@in_array("Shops/Stores (on Site)", @$facil_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s75"><?=__("Shops/Stores (on Site)");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="Recommended">
                                    <h2><?=__("Activities & Entertainment");?><span><?=__("How would your guests spend their time while at your accommodation?");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s76" value="Windsurfing" <?php if (@in_array("Windsurfing", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s76"><?=__("Windsurfing");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s77" value="Game Room" <?php if (@in_array("Game Room", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s77"><?=__("Game Room");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s78" value="Cycling" <?php if (@in_array("Cycling", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s78"><?=__("Cycling");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s79" value="Canoeing" <?php if (@in_array("Canoeing", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s79"><?=__("Canoeing");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s80" value="Evening entertainment" <?php if (@in_array("Evening entertainment", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s80"><?=__("Evening entertainment");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s81" value="Bicycle Rental" <?php if (@in_array("Bicycle Rental", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s81"><?=__("Bicycle Rental");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s82" value="Fishing" <?php if (@in_array("Fishing", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s82"><?=__("Fishing");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s83" value="Water sports (on site)" <?php if (@in_array("Water sports (on site)", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s83"><?=__("Water sports (on site)");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s84" value="Entertainment Staff" <?php if (@in_array("Entertainment Staff", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s84"><?=__("Entertainment Staff");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s85" value="Hiking" <?php if (@in_array("Hiking", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s85"><?=__("Hiking");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s86" value="Gym" <?php if (@in_array("Gym", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s86"><?=__("Gym");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s87" value="Nightclub/DJ" <?php if (@in_array("Nightclub/DJ", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s87"><?=__("Nightclub/DJ");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s88" value="Diving" <?php if (@in_array("Diving", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s88"><?=__("Diving");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s89" value="Karaoke" <?php if (@in_array("Karaoke", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s89"><?=__("Karaoke");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s90" value="Cyber Cafe" <?php if (@in_array("Cyber Cafe", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s90"><?=__("Cyber Cafe");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s91" value="Library" <?php if (@in_array("Library", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s91"><?=__("Library");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s92" value="Football Pitch" <?php if (@in_array("Football Pitch", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s92"><?=__("Football Pitch");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s93" value="Basketball Court" <?php if (@in_array("Basketball Court", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s93"><?=__("Basketball Court");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s94" value="Tennis Court" <?php if (@in_array("Tennis Court", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s94"><?=__("Tennis Court");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s95" value="Golf Resort" <?php if (@in_array("Golf Resort", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s95"><?=__("Golf Resort");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s96" value="Gentlemen´s Club" <?php if (@in_array("Gentlemen´s Club", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s96"><?=__("Gentlemen´s Club");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s97" value="Amusement Park" <?php if (@in_array("Amusement Park", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s97"><?=__("Amusement Park");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s98" value="Zoologic" <?php if (@in_array("Zoologic", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s98"><?=__("Zoologic");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s99" value="Pub" <?php if (@in_array("Pub", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s99"><?=__("Pub");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s100" value="Bowling Center" <?php if (@in_array("Bowling Center", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s100"><?=__("Bowling Center");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s101" value="Paintball Center" <?php if (@in_array("Paintball Center", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s101"><?=__("Paintball Center");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s102" value="Cinema" <?php if (@in_array("Cinema", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s102"><?=__("Cinema");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Activities<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s103" value="Shopping Mall" <?php if (@in_array("Shopping Mall", @$acti_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s103"><?=__("Shopping Mall");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="Recommended">
                                    <h2><?=__("Food & Drink");?><span><?=__("How would your guests feed themselves?");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Food<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s104" value="Restaurant" <?php if (@in_array("Restaurant", @$food_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s104"><?=__("Restaurant");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Food<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s105" value="Bar" <?php if (@in_array("Bar", @$food_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s105"><?=__("Bar");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Food<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s106" value="Special Diet Meals (upon Request)" <?php if (@in_array("Special Diet Meals (upon Request)", @$food_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s106"><?=__("Diet Meals (upon Request)");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Food<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s107" value="Shared Kitchen" <?php if (@in_array("Shared Kitchen", @$food_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s107"><?=__("Shared Kitchen");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Food<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s108" value="Packed Lunches" <?php if (@in_array("Packed Lunches", @$food_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s108"><?=__("Packed Lunches");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Food<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s109" value="Snack Bar" <?php if (@in_array("Snack Bar", @$food_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s109"><?=__("Snack Bar");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Food<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s110" value="Room Service" <?php if (@in_array("Room Service", @$food_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s110"><?=__("Room Service");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Food<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s111" value="Breakfast in the Room" <?php if (@in_array("Breakfast in the Room", @$food_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s111"><?=__("Breakfast in the Room");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Food<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s112" value="Grocery Deliveries" <?php if (@in_array("Grocery Deliveries", @$food_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s112"><?=__("Grocery Deliveries");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="Recommended">
                                    <h2><?=__("Kitchen & Dining");?><span><?=__("What type of items will the kitchen be equipped with?");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s113" value="Kitchenette" <?php if (@in_array("Kitchenette", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s113"><?=__("Kitchenette");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s114" value="Microwave" <?php if (@in_array("Microwave", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s114"><?=__("Microwave");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s115" value="Dining Room" <?php if (@in_array("Dining Room", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s115"><?=__("Dining Room");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s116" value="Refrigerator" <?php if (@in_array("Refrigerator", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s116"><?=__("Refrigerator");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s117" value="Cook" <?php if (@in_array("Cook", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s117"><?=__("Cook");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s118" value="Oven" <?php if (@in_array("Oven", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s118"><?=__("Oven");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s119" value="Hair Dryer" <?php if (@in_array("Hair Dryer", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s119"><?=__("Hair Dryer");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s120" value="Dishwasher" <?php if (@in_array("Dishwasher", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s120"><?=__("Dishwasher");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s121" value="Minibar" <?php if (@in_array("Minibar", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s121"><?=__("Minibar");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s122" value="Fridge/Freezer" <?php if (@in_array("Fridge/Freezer", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s122"><?=__("Fridge/Freezer");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s123" value="Electric kettle" <?php if (@in_array("Electric kettle", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s123"><?=__("Electric kettle");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Kitchen<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s124" value="Coffee Maker" <?php if (@in_array("Coffee Maker", @$kit_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s124"><?=__("Coffee Maker");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="Recommended">
                                    <h2><?=__("Media/Technology");?><span><?=__("What type of technologies would your provide to your guests?");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Media<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s125" value="Shared Lounge/TV Area" <?php if (@in_array("Shared Lounge/TV Area", @$media_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s125"><?=__("Shared Lounge/TV Area");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Media<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s126" value="Free WIFI" <?php if (@in_array("Free WIFI", @$media_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s126"><?=__("Free WIFI");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Media<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s127" value="Internet Services" <?php if (@in_array("Internet Services", @$media_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s127"><?=__("Internet Services");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Media<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s128" value="WIFI Available in All Areas" <?php if (@in_array("WIFI Available in All Areas", @$media_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s128"><?=__("WIFI Available in All Areas");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Media<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s129" value="Free Internet Available" <?php if (@in_array("Free Internet Available", @$media_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s129"><?=__("Free Internet Available");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Media<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s130" value="Free Internet Access" <?php if (@in_array("Free Internet Access", @$media_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s130"><?=__("Free Internet Access");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Media<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s131" value="Hybrid Charging Station" <?php if (@in_array("Hybrid Charging Station", @$media_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s131"><?=__("Hybrid Charging Station");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Media<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s132" value="TV" <?php if (@in_array("TV", @$media_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s132"><?=__("TV");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Media<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s133" value="Flat-screen TV" <?php if (@in_array("Flat-screen TV", @$media_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s133"><?=__("Flat-screen TV");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Media<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s134" value="Smart TV" <?php if (@in_array("Smart TV", @$media_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s134"><?=__("Smart TV");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Media<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s135" value="Cable TV" <?php if (@in_array("Cable TV", @$media_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s135"><?=__("Cable TV");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="Recommended">
                                    <h2><?=__("Meetings & Events");?><span><?=__("Will your guests benefit from any of the options below?");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Meetings<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s136" value="Vip Room" <?php if (@in_array("Vip Room", @$meet_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s136"><?=__("Vip Room");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Meetings<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s137" value="Honeymoon Suite" <?php if (@in_array("Honeymoon Suite", @$meet_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s137"><?=__("Honeymoon Suite");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Meetings<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s138" value="Meeting/Banquet" <?php if (@in_array("Meeting/Banquet", @$meet_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s138"><?=__("Meeting/Banquet");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="Recommended">
                                    <h2><?=__("Essentials");?><span><?=__("All Must-Haves");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Essentials<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s139" value="Iron" <?php if (@in_array("Iron", @@$essen_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s139"><?=__("Iron");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Essentials<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s140" value="Ironing Board" <?php if (@in_array("Ironing Board", @@$essen_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s140"><?=__("Ironing Board");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Essentials<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s141" value="Laundry" <?php if (@in_array("Laundry", @@$essen_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s141"><?=__("Laundry");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Essentials<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s142" value="Washing Machine" <?php if (@in_array("Washing Machine", @@$essen_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s142"><?=__("Washing Machine");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="Recommended">
                                    <h2><?=__("Pools & Wellness");?><span><?=__("Guests like to take care of themselves");?></span></h2>
                                    <div class="amenities-section">
                                        <ul>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Pools<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s143" value="Spa" <?php if (@in_array("Spa", @$pools_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s143"><?=__("Spa");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Pools<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s144" value="Hot Tub" <?php if (@in_array("Hot Tub", @$pools_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s144"><?=__("Hot Tub");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Pools<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s145" value="Massage" <?php if (@in_array("Massage", @$pools_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s145"><?=__("Massage");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Pools<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s146" value="Sauna" <?php if (@in_array("Sauna", @$pools_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s146"><?=__("Sauna");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Pools<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s147" value="Gym" <?php if (@in_array("Gym", @$pools_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s147"><?=__("Gym");?></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="amenities">
                                                    <input type="checkbox" name="Pools<?= $cun; ?>[]" id="amenitie<?= $cun; ?>s148" value="Turkish Bath/Steam Bath" <?php if (@in_array("Turkish Bath/Steam Bath", @$pools_sub)) echo "checked"; ?>>
                                                    <label for="amenitie<?= $cun; ?>s148"><?=__("Turkish Bath/Steam Bath");?></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>  

                                <!--new Sec End  --->


                            </div>
    <!--                     <input type="button" name="previous" class="previous action-button" value="Previous" />-->



                            <button type="button" name="next" class="typeone next action-button" value="Next" style="text-decoration: none;color: #000;float: right;padding: 11px 46px;margin-left: 10px;font-size: 15px;font-weight: normal;border-radius: 4px !important;background-color: #f9d749;"  >NEXT</button>

                            <button type="button" name="previous" class="typeone previous action-button" value="previous" style="text-decoration: none;color: #000;float: right;padding: 10px 25px;border: 1px solid #000000;font-weight: normal;border-radius: 4px !important;background-color: #fff;" >PREVIOUS</button>


                            <div class="last-section" style="display:none;">
                                <div id="check-error" class="text-danger"></div>
                                
                                <ul style="width: auto !important;">
                                    <li><span class='btn-next-save' onclick="gettForm()"><?=__("SAVE AND EXIT");?></span></li>				                						
                                    <!--                                                                <li onclick="$('#saveexit').val('next');">
                                                                                                        <button class='btn-next-save' type="submit" onclick="return formSubmit()">NEXT</button>
                                                                                                    </li>                        -->

                                </ul>
                                
                                <button onclick="return formSubmit()"  type="submit" name="next" class="btn-next-save" value="Next" style="text-decoration: none;color: #000;float: right;padding: 11px 46px;margin-left: 10px;font-size: 15px;font-weight: normal;border-radius: 4px !important;background-color: #f9d749;"  onclick="return formSubmit()"><?=__("NEXT");?></button>
                                <button type="button" name="previous" class="previous action-button" value="previous" style="text-decoration: none;color: #000;float: right;padding: 10px 25px;border: 1px solid #000000;font-weight: normal;border-radius: 4px !important;background-color: #fff;" ><?=__("PREVIOUS");?></button>
                            </div>


                        </fieldset>
                    <?php }
                    ?>
                    <ul id="progressbar" style="display:none;">
                        <li class="active">1</li>
                        <?php for ($xcvf = 2; $xcvf <= $cun; $xcvf++) { ?> <li> <?= $xcvf; ?> </li> <?php } ?>
                    </ul>

                </div>






            </div>
<input type="hidden" name="saveexit" id='saveexit'>
        </div>
        <?= $this->Form->end(); ?>
    </div>
</section>
<script>
    function gettForm() {
        $('#saveexit').val('save exit');
        $('#amenities').submit();
    }

    function formSubmit() {

        $('#saveexit').val('next');
        return true;
//        var count = 0;
//        var Top = [];
//        var Parking = [];
//        var Services = [];
//        var Accessibility = [];
//        var Facilities = [];
//        var Activities = [];
//        var Food = [];
//        var Kitchen = [];
//        var Media = [];
//        var Meetings = [];
//        var Essentials = [];
//        var Pools = [];
//        $.each($("input[name='Top[]']:checked"), function () {
//            Top.push($(this).val());
//        });
//
//        if (Top.length === 0) {
//        } else {
//            count = count + 1;
//
//        }
//
//        $.each($("input[name='Parking[]']:checked"), function () {
//            Parking.push($(this).val());
//        });
//
//        if (Parking.length === 0) {
//        } else {
//            count = count + 1;
//
//        }
//
//        $.each($("input[name='Services[]']:checked"), function () {
//            Services.push($(this).val());
//        });
//
//        if (Services.length === 0) {
//        } else {
//            count = count + 1;
//
//        }
//
//        $.each($("input[name='Accessibility[]']:checked"), function () {
//            Accessibility.push($(this).val());
//        });
//
//        if (Accessibility.length === 0) {
//        } else {
//            count = count + 1;
//
//        }
//
//        $.each($("input[name='Facilities[]']:checked"), function () {
//            Facilities.push($(this).val());
//        });
//
//        if (Facilities.length === 0) {
//        } else {
//            count = count + 1;
//
//        }
//
//        $.each($("input[name='Activities[]']:checked"), function () {
//            Activities.push($(this).val());
//        });
//
//        if (Activities.length === 0) {
//
//        } else {
//            count = count + 1;
//
//        }
//
//        $.each($("input[name='Food[]']:checked"), function () {
//            Food.push($(this).val());
//        });
//
//        if (Food.length === 0) {
//        } else {
//            count = count + 1;
//
//        }
//
//        $.each($("input[name='Kitchen[]']:checked"), function () {
//            Kitchen.push($(this).val());
//        });
//
//        if (Kitchen.length === 0) {
//        } else {
//            count = count + 1;
//
//        }
//
//        $.each($("input[name='Media[]']:checked"), function () {
//            Media.push($(this).val());
//        });
//
//        if (Media.length === 0) {
//        } else {
//            count = count + 1;
//
//        }
//
//        $.each($("input[name='Meetings[]']:checked"), function () {
//            Meetings.push($(this).val());
//        });
//
//        if (Meetings.length === 0) {
//        } else {
//            count = count + 1;
//
//        }
//
//        $.each($("input[name='Essentials[]']:checked"), function () {
//            Essentials.push($(this).val());
//        });
//
//        if (Essentials.length === 0) {
//        } else {
//            count = count + 1;
//
//        }
//
//        $.each($("input[name='Pools[]']:checked"), function () {
//            Pools.push($(this).val());
//        });
//
//        if (Pools.length === 0) {
//        } else {
//            count = count + 1;
//
//        }
//
//        if (count >= 3) {
//            $("#check-error").hide();
//            return true;
//        } else {
//            $("#check-error").html('Hosts are required to choose at least 3 amenities.').show();
//            $("#check-error").focus();
//            return false;
//        }

    }
</script>

<script type="text/javascript">

    //jQuery time pg-count;
    var totalPageCount = <?= $cun; ?>;
    var currPageCount;
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function () {
       // alert('hello');
        $('html, body').animate({scrollTop: '0px'}, 700);
        //var currnt_page = $('input[name=pg-count]').val();
        //alert(currnt_page);
        if (animating)
            return false;
        animating = true;

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //activate next step on progressbar using the index of next_fs
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        var arr = $('.active').text().split(" ");
        arr = arr.filter(function (str) {
            return /\S/.test(str);
        });
        console.log(arr);
        console.log(arr.length);
        $('.typeone').show();
        $('.last-section').hide();

        currPageCount = arr[(arr.length) - 1];
        console.log(currPageCount);
        if (currPageCount == totalPageCount) {
            $('.typeone').hide();
            $('.last-section').show();
        }
        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale current_fs down to 80%
                scale = 1 - (1 - now) * 0.2;
                //2. bring next_fs from the right(50%)
                left = (now * 50) + "%";
                //3. increase opacity of next_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({
                    'transform': 'scale(' + scale + ')',
                    'position': 'relative'
                });
                next_fs.css({'left': left, 'opacity': opacity});
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });

    $(".previous").click(function () {
        $('html, body').animate({scrollTop: '0px'}, 700);

        if (animating)
            return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //de-activate current step on progressbar
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        var arr = $('.active').text().split(" ");
        arr = arr.filter(function (str) {
            return /\S/.test(str);
        });
        console.log(arr);
        console.log(arr.length);
        $('.typeone').show();
        $('.last-section').hide();

        currPageCount = arr[(arr.length) - 1];
        console.log(currPageCount);
        if (currPageCount == totalPageCount) {
            $('.typeone').hide();
            $('.last-section').show();
        }
        //show the previous fieldset
        previous_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now, mx) {
                //as the opacity of current_fs reduces to 0 - stored in "now"
                //1. scale previous_fs from 80% to 100%
                scale = 0.8 + (1 - now) * 0.2;
                //2. take current_fs to the right(50%) - from 0%
                left = ((1 - now) * 50) + "%";
                //3. increase opacity of previous_fs to 1 as it moves in
                opacity = 1 - now;
                current_fs.css({'left': left});
                previous_fs.css({'transform': 'scale(' + scale + ')', 'opacity': opacity});
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            //this comes from the custom easing plugin
            easing: 'easeInOutBack'
        });
    });


</script>
