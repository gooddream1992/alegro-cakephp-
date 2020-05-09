<?php
$recm = json_decode(@$propAme->recommended);
$inte = json_decode(@$propAme->internet);
$acces = json_decode(@$propAme->accessibility);
$kitc = json_decode(@$propAme->kitchen);
$facil = json_decode(@$propAme->facilities);
$safe = json_decode(@$propAme->safety);
$extr = json_decode(@$propAme->extras);

?>
<section class="basics">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <?= $this->element('extranet/sidebar'); ?>
            </div>

            <div class="col-md-10">
                <div class="head-section">
                    <h1>All the little things (and big things) you provide.<span>What comes with your home? </span></h1>
                    <img src="<?= $this->Url->image('extranet/ec-amenities@2x.png'); ?>">						

                    <?= $this->Form->create('', ['class' => "form-section", 'type' => 'post', 'id' => 'amenities']); ?>
                    <div class="Recommended">
                        <h2>Recommended<span>Travelers often look for these when booking homes.</span></h2>
                        <div class="amenities-section">
                            <ul>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="recommended[]" id="amenities44" value="Private entrance" <?php if(@in_array("Private entrance", @$recm)) echo "checked" ; ?>>
                                        <label for="amenities44">Private entrance</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="recommended[]" id="amenities2" value="Elevator in building" <?php if(@in_array("Elevator in building", @$recm)) echo "checked" ; ?>>
                                        <label for="amenities2">Elevator in building</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="recommended[]" id="amenities3" value="Wheelchair accessible" <?php if(@in_array("Wheelchair accessible", @$recm)) echo "checked" ; ?>>
                                        <label for="amenities3">Wheelchair accessible</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="recommended[]" id="amenities4" value="Buzzer/wireless intercom" <?php if(@in_array("Buzzer/wireless intercom", @$recm)) echo "checked" ; ?>>
                                        <label for="amenities4">Buzzer/wireless intercom</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="recommended[]" id="amenities5" value="Doorman" <?php if(@in_array("Doorman", @$recm)) echo "checked" ; ?>>
                                        <label for="amenities5">Doorman</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="Recommended">
                        <h2>Internet<span>How travelers can stay connected.</span></h2>
                        <div class="amenities-section">
                            <ul>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="internet[]" id="amenities6" value="Paid WiFi" <?php if(@in_array("Paid WiFi", @$inte)) echo "checked" ; ?>>
                                        <label for="amenities6">Paid WiFi</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="internet[]" id="amenities7" value="Paid internet" <?php if(@in_array("Paid internet", @$inte)) echo "checked" ; ?>>
                                        <label for="amenities7">Paid internet</label>
                                    </div>
                                </li>										
                            </ul>
                        </div>
                    </div>
                    <div class="Recommended">
                        <h2>Accessibility<span>What travelers want to have a convenient stay.</span></h2>
                        <div class="amenities-section">
                            <ul>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="accessibility[]" id="amenities8" value="Private entrance" <?php if(@in_array("Private entrance", @$acces)) echo "checked" ; ?>>
                                        <label for="amenities8">Private entrance</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="accessibility[]" id="amenities9" value="Elevator in building" <?php if(@in_array("Elevator in building", @$acces)) echo "checked" ; ?>>
                                        <label for="amenities9">Elevator in building</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="accessibility[]" id="amenities10" value="Wheelchair accessible" <?php if(@in_array("Wheelchair accessible", @$acces)) echo "checked" ; ?>>
                                        <label for="amenities10">Wheelchair accessible</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="accessibility[]" id="amenities11" value="Buzzer/wireless intercom" <?php if(@in_array("Buzzer/wireless intercom", @$acces)) echo "checked" ; ?>>
                                        <label for="amenities11">Buzzer/wireless intercom</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="accessibility[]" id="amenities12" value="Doorman" <?php if(@in_array("Doorman", @$acces)) echo "checked" ; ?>>
                                        <label for="amenities12">Doorman</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="Recommended">
                        <h2>Kitchen<span>Facilities and amenities that allow travelers to eat and drink comfortably.</span></h2>
                        <div class="amenities-section">
                            <ul>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="kitchen[]" id="amenities13" value="Coffee/tea maker" <?php if(@in_array("Coffee/tea maker", @$kitc)) echo "checked" ; ?>>
                                        <label for="amenities13">Coffee/tea maker</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="kitchen[]" id="amenities14" value="Coffee" <?php if(@in_array("Coffee", @$kitc)) echo "checked" ; ?>>
                                        <label for="amenities14">Coffee</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="kitchen[]" id="amenities15" value="Tea" <?php if(@in_array("Tea", @$kitc)) echo "checked" ; ?>>
                                        <label for="amenities15">Tea</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="kitchen[]" id="amenities16" value="Kitchen" <?php if(@in_array("Kitchen", @$kitc)) echo "checked" ; ?>>
                                        <label for="amenities16">Kitchen</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="kitchen[]" id="amenities17" value="Breakfast" <?php if(@in_array("Breakfast", @$kitc)) echo "checked" ; ?>>
                                        <label for="amenities17">Breakfast</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="Recommended">
                        <h2>Facilities<span>What travelers are looking for and might increase the chances of you getting more bookings.</span></h2>
                        <div class="amenities-section">
                            <ul>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="facilities[]" id="amenities18" value="Desk/workspace" <?php if(@in_array("Desk/workspace", @$facil)) echo "checked" ; ?>>
                                        <label for="amenities18">Desk/workspace</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="facilities[]" id="amenities19" value="Private pool" <?php if(@in_array("Private pool", @$facil)) echo "checked" ; ?>>
                                        <label for="amenities19">Private pool</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="facilities[]" id="amenities20" value="Heating" <?php if(@in_array("Heating", @$facil)) echo "checked" ; ?>>
                                        <label for="amenities20">Heating</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="facilities[]" id="amenities21" value="Dryer" <?php if(@in_array("Dryer", @$facil)) echo "checked" ; ?>>
                                        <label for="amenities21">Dryer</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="facilities[]" id="amenities22" value="Indoor fireplace" <?php if(@in_array("Indoor fireplace", @$facil)) echo "checked" ; ?>>
                                        <label for="amenities22">Indoor fireplace</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="facilities[]" id="amenities23" value="Closet" <?php if(@in_array("Closet", @$facil)) echo "checked" ; ?>>
                                        <label for="amenities23">Closet</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="facilities[]" id="amenities34" value="Indoor pool" <?php if(@in_array("Indoor pool", @$facil)) echo "checked" ; ?>>
                                        <label for="amenities34">Indoor pool</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="facilities[]" id="amenities24" value="Hot tub" <?php if(@in_array("Hot tub", @$facil)) echo "checked" ; ?>>
                                        <label for="amenities24">Hot tub</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="facilities[]" id="amenities25" value="Gym" <?php if(@in_array("Gym", @$facil)) echo "checked" ; ?>>
                                        <label for="amenities25">Gym</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="facilities[]" id="amenities26" value="Outdoor pool" <?php if(@in_array("Outdoor pool", @$facil)) echo "checked" ; ?>>
                                        <label for="amenities26">Outdoor pool</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="facilities[]" id="amenities27" value="Free parking" <?php if(@in_array("Free parking", @$facil)) echo "checked" ; ?>>
                                        <label for="amenities27">Free parking</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="Recommended">
                        <h2>Safety<span>Home safety features travelers are looking for during their stay.</span></h2>
                        <div class="amenities-section">
                            <ul>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="safety[]" id="amenities28" value="Smoke detector" <?php if(@in_array("Smoke detector", @$safe)) echo "checked" ; ?>>
                                        <label for="amenities28">Smoke detector</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="safety[]" id="amenities29" value="Carbon monoxide detector" <?php if(@in_array("Carbon monoxide detector", @$safe)) echo "checked" ; ?>>
                                        <label for="amenities29">Carbon monoxide detector</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="safety[]" id="amenities30" value="First aid kit" <?php if(@in_array("First aid kit", @$safe)) echo "checked" ; ?>>
                                        <label for="amenities30">First aid kit</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="safety[]" id="amenities31" value="Fire extinguisher" <?php if(@in_array("Fire extinguisher", @$safe)) echo "checked" ; ?>>
                                        <label for="amenities31">Fire extinguisher</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="Recommended">
                        <h2>Extras<span>Other offerings that may accommodate certain traveler needs.</span></h2>
                        <div class="amenities-section">
                            <ul>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="extras[]" id="amenities32" value="Smoking allowed" <?php if(@in_array("Smoking allowed", @$extr)) echo "checked" ; ?>>
                                        <label for="amenities32">Smoking allowed</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="amenities">
                                        <input type="checkbox" name="extras[]" id="amenities33" value="Pets allowed" <?php if(@in_array("Pets allowed", @$extr)) echo "checked" ; ?>>
                                        <label for="amenities33">Pets allowed</label>
                                    </div>
                                </li>										
                            </ul>
                        </div>
                    </div>
                    <div class="last-section">
                        <div id="check-error" class="text-danger"></div>
                        <input type="hidden" name="saveexit" id='saveexit'>
                        <ul>
                            <li><span class='btn-next-save' onclick="gettForm()">SAVE AND EXIT</span></li>				                						
                            <li onclick="$('#saveexit').val('next');">
                                <button class='btn-next-save' type="submit" onclick="return formSubmit()">NEXT</button>
                            </li>
                            <li><a href="<?=HTTP_ROOT;?>extranets/description/<?=$id;?>">PREVIOUS</a></li>
                        </ul>
                    </div>
                    <?= $this->Form->end(); ?>	
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    function gettForm() {
        $('#saveexit').val('save exit');
        $('#amenities').submit();
    }

    function formSubmit() {
        var count = 0;
        var recommended = [];
        var internet = [];
        var accessibility = [];
        var kitchen = [];
        var facilities = [];
        var safety = [];
        var extras = [];
        $.each($("input[name='recommended[]']:checked"), function () {
            recommended.push($(this).val());
        });
        
        if (recommended.length === 0) {            
        }else{
            count= count+1;
            
        }
        
        $.each($("input[name='internet[]']:checked"), function () {
            internet.push($(this).val());
        });
        
        if (internet.length === 0) {           
        }else{
            count= count+1;
            
        }
        
        $.each($("input[name='accessibility[]']:checked"), function () {
            accessibility.push($(this).val());
        });
        
        if (accessibility.length === 0) {            
        }else{
            count= count+1;
           
        }
        
        $.each($("input[name='kitchen[]']:checked"), function () {
            kitchen.push($(this).val());
        });
        
        if (kitchen.length === 0) {            
        }else{
            count= count+1;
            
        }
        
        $.each($("input[name='facilities[]']:checked"), function () {
            facilities.push($(this).val());
        });
        
        if (facilities.length === 0) {            
        }else{
            count= count+1;
            
        }
        
        $.each($("input[name='safety[]']:checked"), function () {
            safety.push($(this).val());
        });
        
        if (safety.length === 0) {
            
        }else{
            count= count+1;
            
        }
        
        $.each($("input[name='extras[]']:checked"), function () {
            extras.push($(this).val());
        });
        
        if (extras.length === 0) {           
        }else{
            count= count+1;
            
        }
        
        if(count >=3){
            $("#check-error").hide();
            return true;
        }else{
             $("#check-error").html('Hosts are required to choose at least 3 amenities.').show();
             $("#check-error").focus();
             return false;
        }
        
    }
</script>