
<style>
    .number {
        text-align: center;
        border: none;
        margin: 0px;
        width: 44px;
        height: 31px;
        font-size: 15px;
    }
    .table1{
        width: auto !important;
    }
    .table1 > tbody > tr > td{
        padding-right: 50px;
        padding-bottom: 5px;
        border-top-style: none !important;
        border-top: none !important;
        border-left-style: none !important;
        border-right-style: none !important;
        border-bottom-style: none !important;
    }

    .error{
        color: red;
    }
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance:textfield;
    }
    #mySpace ul li{
        width: 100%;
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
                    <h1><?php echo __('Match your property to the right guests.'); ?><span><?php echo __('All information is required unless marked optional.'); ?></span></h1>
                    <img src="<?= $this->Url->image('extranet/top-right1.png'); ?>">	

                    <?= $this->Form->create('', ['class' => "form-section", 'type' => 'post', 'id' => 'basic_tb']); ?>
                    <h2><?php echo __('Property Type'); ?></h2>
                    <div class="selection-section">
                        <ul>
                            <input type="hidden" name="temp_cookie" value="<?php echo $this->request->session()->read('For_Bed'); ?>">
                            <li>
                                <input type="radio" name="property_type" <?php if (@$propertyData->property_type == "Apartment") { ?>checked="" <?php
                                } else {
                                    echo "checked";
                                }
                                ?> id="radio1" value="Apartment">
                                <label for="radio1"><i class="far fa-building"></i><br><span><?php echo __('Apartment'); ?></span></label>
                            </li>
                            <li>
                                <input type="radio" name="property_type" id="radio2" <?php if (@$propertyData->property_type == "Hotel") { ?>checked="" <?php } ?> value="Hotel">
                                <label for="radio2"><i class="fab fa-houzz"></i><br><span><?php echo __('Hotel'); ?></span></label>
                            </li>
                            <li>
                                <input type="radio" name="property_type" id="radio3"  <?php if (@$propertyData->property_type == "Guest-House") { ?>checked="" <?php } ?> value="Guest-House">
                                <label for="radio3"><i class="fas fa-hotel"></i><br><span><?php echo __('Guest-House'); ?></span></label>
                            </li>
                            <li>
                                <input type="radio" name="property_type" id="radio4" <?php if (@$propertyData->property_type == "Villa") { ?>checked="" <?php } ?>  value="Villa">
                                <label for="radio4"><i class="fas fa-home"></i><br><span><?php echo __('Villa'); ?></span></label>
                            </li>
                            <li>
                                <input type="radio" name="property_type" id="radio5" <?php if (@$propertyData->property_type == "Resort") { ?>checked="" <?php } ?> value="Resort">
                                <label for="radio5"><i class="fas fa-home"></i><br><span><?php echo __('Resort'); ?></span></label>
                            </li>
                            <li>
                                <input type="radio" name="property_type" id="radio6" <?php if (@$propertyData->property_type == "Lodge") { ?>checked="" <?php } ?> value="Lodge">
                                <label for="radio6"><i class="fas fa-home"></i><br><span><?php echo __('Lodge'); ?></span></label>
                            </li>
                        </ul>

                        </h5>
                        <h5><?php echo __('Property size'); ?></h5>
                        <input type="number" class='number'style="padding:0;height: 35px; border:1px solid gray;" name='property_size' required value="<?php echo @$propertyData->property_size; ?>"> &nbsp <?php echo __('Sqm'); ?>

                    </div>
                    <h2><?php echo __('Rooms and details'); ?></h2>
                    <div class="quantity-section">
                        <!--                        <div class="inner-quantity-section">
                                                    <h5><?php echo __('Accommodates'); ?></h5>
                                                    <p><?php echo __('The maximum number of people who can sleep comfortably given the total bed space and sofas.'); ?></p>
                                                    <div class="box-border">
                                                        <span class="value-button"   data-dir="dwn"><i class="fas fa-minus"></i></span>
                                                                                <input type="number" class='number'  name="accommodates" value="<?php
                        if (empty($propertyData->accommodates)) {
                            echo "1";
                        } else {
                            echo $propertyData->accommodates;
                        }
                        ?>" />
                                                        <span class="value-button"  data-dir="up"><i class="fas fa-plus"></i></span>
                                                    </div>
                                                </div>-->
                        <div class="inner-quantity-section">
                            <h5><?php echo __('Bathrooms'); ?></h5>
                            <p><?php echo __('Count only bathrooms on your property, not shared or common bathrooms in your building or complex.'); ?></p>
                            <div class="box-border">
                                <span class="value-button" data-dir="dwn" ><i class="fas fa-minus"></i></span>
                                <input type="number"  name="bathrooms"  class='number' value="<?php
                                if (empty($propertyData->bathrooms)) {
                                    echo "1";
                                } else {
                                    echo $propertyData->bathrooms;
                                }
                                ?>" />
                                <span class="value-button" data-dir="up"><i class="fas fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="inner-quantity-section">
                            <h5><?php echo __('Bedrooms'); ?></h5>
                            <p><?php echo __('The maximum number of bedrooms to comfortably accommodate your guests.'); ?></p>
                            <div class="box-border">
                                <span class="value-button" style="opacity: .6;cursor: not-allowed;pointer-events: none;" data-dir="dwn" onclick="getBedrooms('prev')"><i class="fas fa-minus"></i></span>
                                <input type="number" readonly id='bedroomcount' name="bedrooms" class='number'  value="<?php
                                if (empty($propertyData->bedrooms)) {
                                    echo "1";
                                } else {
                                    echo $propertyData->bedrooms;
                                }
                                ?>"/>
                                <span class="value-button" data-dir="up" onclick="getBedrooms('')"><i class="fas fa-plus"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="quantity-section">
                        <div class="inner-quantity-section bedroomQuantitiy" style="margin-top: -35px;">
                            <!--                            <h5>Bedroom1</h5>
                                                        <ul>
                                                            <li>
                                                                <div class="box-border">
                                                                    <span class="value-button" data-dir="dwn"><i class="fas fa-minus"></i></span>
                                                                    <input type="number" class='number'  value="1" />
                                                                    <span class="value-button" data-dir="up"><i class="fas fa-plus"></i></span>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <select>
                                                                    <option>asdfghjk</option>
                                                                    <option>asdfguik</option>
                                                                    <option>lllkjhgf</option>
                                                                    <option>mnbvcxcx</option>
                                                                    <option>qqwertyu</option>
                                                                </select>
                                                            </li>
                                                        </ul>
                                                        <a href="#"><strong><?php echo __('ADD ANOTHER BED TYPE'); ?></strong></a>-->
                        </div>
                        <div class="inner-quantity-section"  style="display: none;">
                            <h5><?php echo __('Common space'); ?></h5>
                            <?php
                            $common_bed_counts = json_decode(@$propertyData->common_space_num);
                            $common_bed_name = json_decode(@$propertyData->common_space_bed);
                            $common_bed_lenght = @count(@json_decode(@$propertyData->common_space_num));
                            ?>
                            <p style="display: none;"><?php echo __('Are there any sleeping surfaces available in common spaces?'); ?></p>
                            <div id="mySpace" style="display:none;">
                                <ul >
                                    <li style="width:100%;">

                                        <div style="width: 100%; float: left;padding-bottom: 10px;">
                                            <input onblur="dataSave(215, $(this).val(), $('#numberofbed1112').val(), $('#select1112 option:selected').text(), )" style="width: 40%;" type="text" id="bedName1112" name="bedName1112" value="" placeholder="Enter Bed Name">
                                        </div>

                                    </li>

                                    <li style="width:100%;">
                                        <div class="box-border" style="float:left; margin-right: 15px;">
                                            <span class="value-button" data-dir="dwn"><i class="fas fa-minus"></i></span>
                                            <input type="number" min="1" class='number' name='mySpace[]'  value="<?php
                                            if (empty(@$common_bed_counts[0])) {
                                                echo "1";
                                            } else {
                                                echo @$common_bed_counts[0];
                                            }
                                            ?>" />
                                            <span class="value-button" data-dir="up"><i class="fas fa-plus"></i></span>
                                        </div>
                                        <select class="mySpace" name='mySpaceBed[]' data-count="0" data-id="0">
                                            <option <?php
                                            if (@$common_bed_name[0] == "single bed") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('single bed'); ?></option>
                                            <option <?php
                                            if (@$common_bed_name[0] == "semi double-bed") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('semi double-bed'); ?></option>
                                            <option <?php
                                            if (@$common_bed_name[0] == "double bed") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('double bed'); ?></option>
                                            <option <?php
                                            if (@$common_bed_name[0] == "queen bed") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('queen bed'); ?></option>
                                            <option <?php
                                            if (@$common_bed_name[0] == "king bed") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('king bed'); ?></option>
                                            <option <?php
                                            if (@$common_bed_name[0] == "super king bed") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('super king bed'); ?></option>
                                            <option <?php
                                            if (@$common_bed_name[0] == "bunk bed") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('bunk bed'); ?></option>
                                            <option <?php
                                            if (@$common_bed_name[0] == "sofa bed") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('sofa bed'); ?></option>
                                            <option <?php
                                            if (@$common_bed_name[0] == "futon") {
                                                echo "selected";
                                            }
                                            ?>><?php echo __('futon'); ?></option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                            <div id="mySpacemyDiv">
                                <?php
                                for ($com_inc = 1; $com_inc < $common_bed_lenght; $com_inc++) {
                                    ?>
                                    <ul>
                                        <li>
                                            <div class="box-border">
                                                <span class="value-button" data-dir="dwn"><i class="fas fa-minus"></i></span>
                                                <input type="number" min="1" class='number' name='mySpace[]'  value="<?php
                                                if (empty(@$common_bed_counts[$com_inc])) {
                                                    echo "1";
                                                } else {
                                                    echo @$common_bed_counts[$com_inc];
                                                }
                                                ?>" />
                                                <span class="value-button" data-dir="up"><i class="fas fa-plus"></i></span>
                                            </div>
                                        </li>
                                        <li>
                                            <select class="mySpace" name='mySpaceBed[]' data-count="<?= $com_inc; ?>" data-id="<?= $com_inc; ?>">
                                                <option <?php
                                                if (@$common_bed_name[$com_inc] == "single bed") {
                                                    echo "selected";
                                                }
                                                ?>><?php echo __('single bed'); ?></option>
                                                <option <?php
                                                if (@$common_bed_name[$com_inc] == "semi double-bed") {
                                                    echo "selected";
                                                }
                                                ?>><?php echo __('semi double-bed'); ?></option>
                                                <option <?php
                                                if (@$common_bed_name[$com_inc] == "double bed") {
                                                    echo "selected";
                                                }
                                                ?>><?php echo __('double bed'); ?></option>
                                                <option <?php
                                                if (@$common_bed_name[$com_inc] == "queen bed") {
                                                    echo "selected";
                                                }
                                                ?>><?php echo __('queen bed'); ?></option>
                                                <option <?php
                                                if (@$common_bed_name[$com_inc] == "king bed") {
                                                    echo "selected";
                                                }
                                                ?>><?php echo __('king bed'); ?></option>
                                                <option <?php
                                                if (@$common_bed_name[$com_inc] == "super king bed") {
                                                    echo "selected";
                                                }
                                                ?>><?php echo __('super king bed'); ?></option>
                                                <option <?php
                                                if (@$common_bed_name[$com_inc] == "bunk bed") {
                                                    echo "selected";
                                                }
                                                ?>><?php echo __('bunk bed'); ?></option>
                                                <option <?php
                                                if (@$common_bed_name[$com_inc] == "sofa bed") {
                                                    echo "selected";
                                                }
                                                ?>><?php echo __('sofa bed'); ?></option>
                                                <option <?php
                                                if (@$common_bed_name[$com_inc] == "futon") {
                                                    echo "selected";
                                                }
                                                ?>><?php echo __('futon'); ?></option>
                                            </select>
                                        </li>
                                    </ul>

                                    <?php
                                }
                                ?>
                            </div>
                            <a href="javascript:void(0);" onclick="mySpace()"><strong><?php echo __('ADD ANOTHER BED TYPE'); ?></strong></a>
                        </div>	

                        <script type="text/JavaScript">
                            var count = 0;
                            var array = ["single bed", "semi double-bed", "double bed", "queen bed",'king bed','super king bed','bunk bed','sofa bed','futon'];
                            function mySpace(){
                            if($('.mySpace').attr('data-count')<= 7){
                            $('.mySpace').attr('data-count',++count);
                            $("#mySpacemyDiv").append($('#mySpace').html());
                            }
                            }
                        </script>

                    </div>
                    <input type="hidden" name="saveexit" id='saveexit'>
                    <div class="last-section">
                        <ul>
                            <li><span class='btn-next-save' onclick="gettForm()"><?php echo __('SAVE AND EXIT'); ?></span></li>										
                            <li onclick="$('#saveexit').val('save next');">
                                <button class='btn-next-save' type="submit"><?php echo __('NEXT'); ?></button>
                            </li>
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
        $('#basic_tb').submit();
    }

    $('#basic_tb').validate({
        rules: {
            contentsize: {
                required: true,
                digits: true,
            },
        },
        messages: {
            contentsize: {
                required: "Property size format is not valid.",
            },
        }
    });
</script>
<script>
    $(document).ready(function () {
        getBedrooms(1);
    });
    function getBedrooms(val) {
        var total = 1;
        if (val == '') {
            total = parseInt($('#bedroomcount').val()) + 1;
        }
        if (val == 'prev') {
            total = parseInt($('#bedroomcount').val()) - 1;
            if ($('#bedroomcount').val() == 1) {
                total = 1;
            }
        }

        $.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/get _ bedrooms/",
            data: {total: total, id: '<?= @$propertyData->id ?>'},
            dataType: 'html',
            success: function (res) {
                //alert(res);
                $('.bedroomQuantitiy').html(res);

            }
        });
    }
</script>

<script>
    $(document).on('click', '.box-border span', function () {
        var btn = $(this),
                oldValue = btn.closest('.box-border').find('input').val().trim(),
                newVal = 0;

        if (btn.attr('data-dir') == 'up') {
            newVal = parseInt(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                newVal = parseInt(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        btn.closest('.box-border').find('input').val(newVal);
    });

//    function deleteUl(removCon,deltId){
//        alert(removCon + deltId);
//        $('#'+removCon).remove();
//        $('#bedroomcount').val(parseInt($('#bedroomcount').val())-1);
//    }
</script>

