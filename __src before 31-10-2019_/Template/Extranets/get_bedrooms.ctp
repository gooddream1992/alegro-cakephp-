<!--Already exits --->
<?php
if (!empty(@$bedDet)) {
    $i = 1;
    foreach ($bedDet as $dats) {
        $i++;
        ?>


        <div id="ulcontent<?= $dats->id; ?>">
            <h5>
                <div class="box-border" style="margin-bottom: 10px;margin-top: 50px;">
                    <span class="value-button" data-dir="dwn" onclick="dataSave(<?= $dats->id; ?>, $('#bedName<?= $dats->id; ?>').val(), $('#numberofbed<?= $dats->id; ?>').val(), $('#select<?= $dats->id; ?> option:selected').val(), parseInt($('#room_count<?= $dats->id; ?>').val()) - 1)"><i class="fas fa-minus" ></i></span>
                    <input type="number"  class='number' id='room_count<?= $dats->id; ?>'  name='room_count<?= $dats->id; ?>' min="1"  value="<?php
                    if (!empty(@$dats->total_rooms)) {
                        echo @$dats->total_rooms;
                    } else {
                        echo "1";
                    }
                    ?>" />
                    <span class="value-button" data-dir="up" onclick="dataSave(<?= $dats->id; ?>, $('#bedName<?= $dats->id; ?>').val(), $('#numberofbed<?= $dats->id; ?>').val(), $('#select<?= $dats->id; ?> option:selected').val(), parseInt($('#room_count<?= $dats->id; ?>').val()) + 1)"><i class="fas fa-plus"></i></span>
                </div>
                <div style="width: 100%; float: left;padding-bottom: 10px;">
                    <input onblur="dataSave(<?= $dats->id; ?>, $(this).val(), $('#numberofbed<?= $dats->id; ?>').val(), $('#select<?= $dats->id; ?> option:selected').val(), $('#room_count<?= $dats->id; ?>').val())" style="width: 40%;float: left;"  type="text" id="bedName<?= $dats->id; ?>" name="bedName<?= $dats->id; ?>" value="<?= @$dats->bed_name; ?>" placeholder="<?php echo __('Bedroom Type'); ?>">
                    <?php if ($i > 2) { ?><span class="btn btn-danger" onclick="removeBed(<?= $dats->id; ?>)" style="float: left;margin-left: 50px;"><i class="fa fa-trash"></i></span><?php } ?>
                </div>
            </h5>
            <ul>
                <li>
                    <div class="box-border">
                        <span class="value-button" data-dir="dwn" onclick="dataSave(<?= $dats->id; ?>, $('#bedName<?= $dats->id; ?>').val(), parseInt($('#numberofbed<?= $dats->id; ?>').val()) - 1, $('#select<?= $dats->id; ?> option:selected').val(), $('#room_count<?= $dats->id; ?>').val())"><i class="fas fa-minus" ></i></span>
                        <input type="number"  class='number' id='numberofbed<?= $dats->id; ?>'  name='numberofbed<?= $dats->id; ?>' min="1"  value="<?php
                        if (!empty(@$dats->num_bed)) {
                            echo @$dats->num_bed;
                        } else {
                            echo "1";
                        }
                        ?>" />
                        <span class="value-button" data-dir="up" onclick="dataSave(<?= $dats->id; ?>, $('#bedName<?= $dats->id; ?>').val(), parseInt($('#numberofbed<?= $dats->id; ?>').val()) + 1, $('#select<?= $dats->id; ?> option:selected').val(), $('#room_count<?= $dats->id; ?>').val())"><i class="fas fa-plus"></i></span>
                    </div>
                </li>
                <li>
                    <select class="select<?= $dats->id; ?>" id="select<?= $dats->id; ?>" data-id="<?= $dats->id; ?>" data-count="0" data-id="<?= $dats->id; ?>" name="numb<?= $dats->id; ?>" onchange="dataSave(<?= $dats->id; ?>, $('#bedName<?= $dats->id; ?>').val(), $('#numberofbed<?= $dats->id; ?>').val(), $('#select<?= $dats->id; ?> option:selected').val(), $('#room_count<?= $dats->id; ?>').val())">

                        <option value="single bed"<?= ($dats->beds == "single bed") ? "selected" : ''; ?>><?php echo __('single bed'); ?></option>    
                        <option value="semi double-bed" <?= ($dats->beds == "semi double-bed") ? "selected" : ''; ?>><?php echo __('semi double-bed'); ?></option> 
                        <option value="double bed" <?= ($dats->beds == "double bed") ? "selected" : ''; ?>><?php echo __('double bed'); ?></option> 
                        <option value="queen bed"<?= ($dats->beds == "queen bed") ? "selected" : ''; ?>><?php echo __('queen bed'); ?></option> 
                        <option value="king bed"<?= ($dats->beds == "king bed") ? "selected" : ''; ?>><?php echo __('king bed'); ?></option>                
                        <option value="super king bed"<?= ($dats->beds == "super king bed") ? "selected" : ''; ?>><?php echo __('super king bed'); ?></option> 
                        <option value="bunk bed"<?= ($dats->beds == "bunk bed") ? "selected" : ''; ?>><?php echo __('bunk bed'); ?></option> 
                        <option value="sofa bed"<?= ($dats->beds == "sofa bed") ? "selected" : ''; ?>><?php echo __('sofa bed'); ?></option> 
                        <option value="futon"<?= ($dats->beds == "futon") ? "selected" : ''; ?>><?php echo __('futon'); ?></option> 



                    </select>
                </li>
        <!--            <li onclick="deleteUl('ulcontent<?= $i; ?>',<?= $dats->id; ?>)"><i class="text text-danger fa fa-trash"></i></li>-->
            </ul>

            <?php
            $subBedList = $this->User->getSubbed(@$this->request->session()->read('Auth.User.id'), @$id, $dats['id']);
            //echo @$this->request->session()->read('Auth.User.id') . @$id . $dats['id'];
            if (!empty($subBedList)) {
                foreach ($subBedList as $subbb) {
                    ?>
                    <ul id="subBedUl<?= $subbb->id; ?>">
                        <li>  
                            <div class="box-border" >   
                                <span class="value-button" data-dir="dwn" onclick="subBedSaveno(<?= $subbb->id; ?>, -1)" > <i class="fas fa-minus"></i></span>            
                                <input type="number" class="number" id="input<?= $subbb->id; ?>"  min="1"  value="<?= !empty($subbb) ? $subbb->num_beds : 1; ?>" />  
                                <span class="value-button" data-dir="up" onclick="subBedSaveno(<?= $subbb->id; ?>, +1)"><i class="fas fa-plus"></i></span>          
                            </div>    
                        </li>    
                        <li>
                            <select id="sub_bed<?= $subbb->id; ?>" class="select<?= $subbb->id; ?>"  data-count="0"  onclick="subBedSaveName(<?= $subbb->id; ?>)" > 
                                <option  value="single bed" <?= ($subbb->beds == "single bed") ? "selected" : ''; ?>><?php echo __('single bed'); ?></option>    
                                <option  value="semi double-bed" <?= ($subbb->beds == "semi double-bed") ? "selected" : ''; ?>><?php echo __('semi double-bed'); ?></option> 
                                <option value="double bed"<?= ($subbb->beds == "double bed") ? "selected" : ''; ?>><?php echo __('double bed'); ?></option> 
                                <option value="queen bed"<?= ($subbb->beds == "queen bed") ? "selected" : ''; ?>><?php echo __('queen bed'); ?></option> 
                                <option value="king bed"<?= ($subbb->beds == "king bed") ? "selected" : ''; ?>><?php echo __('king bed'); ?></option>                
                                <option value="super king bed"<?= ($subbb->beds == "super king bed") ? "selected" : ''; ?>><?php echo __('super king bed'); ?></option> 
                                <option value="bunk bed"<?= ($subbb->beds == "bunk bed") ? "selected" : ''; ?>><?php echo __('bunk bed'); ?></option> 
                                <option value="sofa bed"<?= ($subbb->beds == "sofa bed") ? "selected" : ''; ?>><?php echo __('sofa bed'); ?></option> 
                                <option value="futon" <?= ($subbb->beds == "futon") ? "selected" : ''; ?>><?php echo __('futon'); ?></option> 
                            </select>  
                        </li> 
                        <li> 
                            <span type="button" class="btn btn-danger" style="color:#fff;" onclick="removesubBeds(<?= $subbb->id; ?>)"><i class="fa fa-trash"></i></span>
                        </li>  
                    </ul>
                    <?php
                }
            }
            ?>


        </div>
        <a href="javascript:void(0);" id="btnTest<?= $dats->id; ?>" onclick="myFunction('<?= $dats->id; ?>', '<?= $dats['temp_cookie']; ?>', '<?= $dats['property_id']; ?>', '<?= $dats['user_id']; ?>', '<?= $dats['id']; ?>')"><strong><?php echo __('ADD ANOTHER BED TYPE'); ?></strong></a>


        <?php
    }
}
?>

<!--New by cookie -->
<?php
unset($dats);

$j = 1;
//pj($bed_cookie_Det);
foreach ($bed_cookie_Det as $dats) {
    $j++;
    ?>


    <div id="ulcontent<?= $dats->id; ?>">
        <h5>
            <div class="box-border" style="margin-bottom: 10px;margin-top: 50px;">
                <span class="value-button" data-dir="dwn" onclick="dataSave(<?= $dats->id; ?>, $('#bedName<?= $dats->id; ?>').val(), $('#numberofbed<?= $dats->id; ?>').val(), $('#select<?= $dats->id; ?> option:selected').val(), parseInt($('#room_count<?= $dats->id; ?>').val()) - 1)"><i class="fas fa-minus" ></i></span>
                <input type="number"  class='number' id='room_count<?= $dats->id; ?>'  name='room_count<?= $dats->id; ?>' min="1"  value="<?php
                if (!empty(@$dats->total_rooms)) {
                    echo @$dats->total_rooms;
                } else {
                    echo "1";
                }
                ?>" />
                <span class="value-button" data-dir="up" onclick="dataSave(<?= $dats->id; ?>, $('#bedName<?= $dats->id; ?>').val(), $('#numberofbed<?= $dats->id; ?>').val(), $('#select<?= $dats->id; ?> option:selected').val(), parseInt($('#room_count<?= $dats->id; ?>').val()) + 1)"><i class="fas fa-plus"></i></span>
            </div>

            <div style="width: 100%; float: left;padding-bottom: 10px;">
                <input onblur="dataSave(<?= $dats->id; ?>, $(this).val(), $('#numberofbed<?= $dats->id; ?>').val(), $('#select<?= $dats->id; ?> option:selected').val(), $('#room_count<?= $dats->id; ?>').val())" style="width: 40%;float: left;"  type="text" id="bedName<?= $dats->id; ?>" name="bedName<?= $dats->id; ?>" value="<?= @$dats->bed_name; ?>" placeholder="<?php echo __('Bedroom Type'); ?>">
                <?php
                if (!empty(@$i)) {
                    ?><span onclick="removeBed(<?= $dats->id; ?>)" class="btn btn-danger" style="float: left;margin-left: 50px;"><i class="fa fa-trash"></i></span><?php
                } else {
                    if ($j > 2) {
                        ?><span onclick="removeBed(<?= $dats->id; ?>)" class="btn btn-danger" style="float: left;margin-left: 50px;"><i class="fa fa-trash"></i></span><?php
                        }
                    }
                    ?>
            </div>
        </h5>
        <ul>
            <li>
                <div class="box-border">
                    <span class="value-button" data-dir="dwn" onclick="dataSave(<?= $dats->id; ?>, $('#bedName<?= $dats->id; ?>').val(), parseInt($('#numberofbed<?= $dats->id; ?>').val()) - 1, $('#select<?= $dats->id; ?> option:selected').val(), $('#room_count<?= $dats->id; ?>').val())"><i class="fas fa-minus" ></i></span>
                    <input type="number"  class='number' id='numberofbed<?= $dats->id; ?>'  name='numberofbed<?= $dats->id; ?>' min="1"  value="<?php
                    if (!empty(@$dats->num_bed)) {
                        echo @$dats->num_bed;
                    } else {
                        echo "1";
                    }
                    ?>" />
                    <span class="value-button" data-dir="up" onclick="dataSave(<?= $dats->id; ?>, $('#bedName<?= $dats->id; ?>').val(), parseInt($('#numberofbed<?= $dats->id; ?>').val()) + 1, $('#select<?= $dats->id; ?> option:selected').val(), $('#room_count<?= $dats->id; ?>').val())"><i class="fas fa-plus"></i></span>
                </div>
            </li>
            <li>
                <select class="select<?= $dats->id; ?>" id="select<?= $dats->id; ?>" data-id="<?= $dats->id; ?>" data-count="0" data-id="<?= $dats->id; ?>" name="numb<?= $dats->id; ?>" onchange="dataSave(<?= $dats->id; ?>, $('#bedName<?= $dats->id; ?>').val(), $('#numberofbed<?= $dats->id; ?>').val(), $('#select<?= $dats->id; ?> option:selected').val(), $('#room_count<?= $dats->id; ?>').val() )">
                    <option value="single bed" <?= ($dats->beds == "single bed") ? "selected" : ''; ?>><?php echo __('single bed'); ?></option>    
                    <option value ="semi double-bed" <?= ($dats->beds == "semi double-bed") ? "selected" : ''; ?>><?php echo __('semi double-bed'); ?></option> 
                    <option value="double bed" <?= ($dats->beds == "double bed") ? "selected" : ''; ?>><?php echo __('double bed'); ?></option> 
                    <option value="queen bed" <?= ($dats->beds == "queen bed") ? "selected" : ''; ?>><?php echo __('queen bed'); ?></option> 
                    <option value="king bed" <?= ($dats->beds == "king bed") ? "selected" : ''; ?>><?php echo __('king bed'); ?></option>                
                    <option value="super king bed" <?= ($dats->beds == "super king bed") ? "selected" : ''; ?>><?php echo __('super king bed'); ?></option> 
                    <option value="bunk bed" <?= ($dats->beds == "bunk bed") ? "selected" : ''; ?>><?php echo __('bunk bed'); ?></option> 
                    <option value="sofa bed" <?= ($dats->beds == "sofa bed") ? "selected" : ''; ?>><?php echo __('sofa bed'); ?></option> 
                    <option value="futon" <?= ($dats->beds == "futon") ? "selected" : ''; ?>><?php echo __('futon'); ?></option> 
                </select>
            </li>
    <!--            <li onclick="deleteUl('ulcontent<?= $i; ?>',<?= $dats->id; ?>)"><i class="text text-danger fa fa-trash"></i></li>-->
        </ul>

        <?php
        $subBedList2 = $this->User->getSubbed(@$this->request->session()->read('Auth.User.id'), @$id, $dats['id'], $dats['temp_cookie']);
        /*
         * echo @$this->request->session()->read('Auth.User.id')."-".@$id."-".$dats['id'].'-'.$dats['temp_cookie'];
          pj($subBedList2);
         * 
         */
        //echo @$this->request->session()->read('Auth.User.id') . @$id . $dats['id'];
        if (!empty($subBedList2)) {
            foreach ($subBedList2 as $subbb) {
                ?>
                <ul id="subBedUl<?= $subbb->id; ?>">
                    <li>  
                        <div class="box-border" >   
                            <span class="value-button" data-dir="dwn" onclick="subBedSaveno(<?= $subbb->id; ?>, -1)" > <i class="fas fa-minus"></i></span>            
                            <input type="number" class="number" id="input<?= $subbb->id; ?>"  min="1"  value="<?= !empty($subbb) ? $subbb->num_beds : 1; ?>" />  
                            <span class="value-button" data-dir="up" onclick="subBedSaveno(<?= $subbb->id; ?>, +1)"><i class="fas fa-plus"></i></span>          
                        </div>    
                    </li>    
                    <li>
                        <select id="sub_bed<?= $subbb->id; ?>" class="select<?= $subbb->id; ?>"  data-count="0"  onclick="subBedSaveName(<?= $subbb->id; ?>)" > 
                            <option value="single bed" <?= ($subbb->beds == "single bed") ? "selected" : ''; ?>><?php echo __('single bed'); ?></option>    
                            <option value="semi double-bed" <?= ($subbb->beds == "semi double-bed") ? "selected" : ''; ?>><?php echo __('semi double-bed'); ?></option> 
                            <option value="double bed" <?= ($subbb->beds == "double bed") ? "selected" : ''; ?>><?php echo __('double bed'); ?></option> 
                            <option value="queen bed"<?= ($subbb->beds == "queen bed") ? "selected" : ''; ?>><?php echo __('queen bed'); ?></option> 
                            <option value="king bed" <?= ($subbb->beds == "king bed") ? "selected" : ''; ?>><?php echo __('king bed'); ?></option>                
                            <option value="super king bed" <?= ($subbb->beds == "super king bed") ? "selected" : ''; ?>><?php echo __('super king bed'); ?></option> 
                            <option value="bunk bed" <?= ($subbb->beds == "bunk bed") ? "selected" : ''; ?>><?php echo __('bunk bed'); ?></option> 
                            <option value="sofa bed" <?= ($subbb->beds == "sofa bed") ? "selected" : ''; ?>><?php echo __('sofa bed'); ?></option> 
                            <option value="futon" <?= ($subbb->beds == "futon") ? "selected" : ''; ?>><?php echo __('futon'); ?></option>  
                        </select>  
                    </li> 
                    <li> 
                        <span type="button" class="btn btn-danger" style="color:#fff;" onclick="removesubBeds(<?= $subbb->id; ?>)"><i class="fa fa-trash"></i></span>
                    </li>  
                </ul>
                <?php
            }
        }
        ?>

    </div>
    <a href="javascript:void(0);" id="btnTest<?= $dats->id; ?>" onclick="myFunction('<?= $dats->id; ?>', '<?= $dats['temp_cookie']; ?>', '<?= $dats['property_id']; ?>', '<?= $dats['user_id']; ?>', '<?= $dats['id']; ?>')"><strong><?php echo __('ADD ANOTHER BED TYPE'); ?></strong></a>


    <?php
}
?>
<script>
    function myFunction(id, cookie, property_id, user_id, bed_id) {

        $num_beds = "num_beds";
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/set_sub_bed",
            dataType: 'json',
            data: {bed_id: bed_id, user_id: user_id, property_id: <?= !empty(@$id) ? $id : 0; ?>, cookie: cookie},
            success: function (res) {
                if (res.status == "error") {

                }
                if (res.status == "success") {

                    $('#ulcontent' + id).append('<ul id="subBedUl' + res.id + '">       <li>        <div class="box-border" >         <span class="value-button" data-dir="dwn" onclick="subBedSaveno(' + res.id + ',-1)" ><i class="fas fa-minus"></i></span>            <input type="number" class="number" id="input' + res.id + '"  min="1"  value="1" />             <span class="value-button" data-dir="up" onclick="subBedSaveno(' + res.id + ',+1)"><i class="fas fa-plus"></i></span>          </div>    </li>    <li><select id="sub_bed' + res.id + '" class="select' + id + bed_id + '"  data-count="0"  onclick="subBedSaveName(' + res.id + ')" > <option  value="single bed"><?php echo __('single bed'); ?></option>    <option value="semi double-bed"><?php echo __('semi double-bed'); ?></option> <option value="double bed"><?php echo __('double bed'); ?></option> <option value="queen bed"><?php echo __('queen bed'); ?></option> <option value ="king bed" ><?php echo __('king bed'); ?></option>                <option value="super king bed" ><?php echo __('super king bed'); ?></option> <option value="bunk bed" ><?php echo __('bunk bed'); ?></option> <option value="sofa bed"><?php echo __('sofa bed'); ?></option> <option value="futon" ><?php echo __('futon'); ?></option> </select>  </li> <li> <span type="button" class="btn btn-danger" style="color:#fff;" onclick="removesubBeds(' + res.id + ')"><i class="fa fa-trash"></i></span></li>  </ul>');
                }
            }
        });


    }



    function removesubBeds(id) {
        //subBedUl

        $('#subBedUl' + id).remove();
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/delete_sub_bed",
            dataType: 'json',
            data: {id: id},
            success: function (res) {

            }
        });
    }

    function removeBed(id) {

        $('#ulcontent' + id).remove();
        $('#btnTest' + id).remove();
        var remain = parseInt($('#bedroomcount').val()) - 1;
        $('#bedroomcount').val(remain);

        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/delete_bed_details",
            dataType: 'json',
            data: {id: id, remain: remain},
            success: function (res) {

            }
        });
    }

    function subBedSaveno(id, va) {
        var col = 'num_beds';
        var value = parseInt($("#input" + id).val()) + va;
        saveDynamic(id, col, value);
    }

    function subBedSaveName(id) {
        var col = 'beds';
        var sel_val = $("#sub_bed" + id + " option:selected").val();
        saveDynamic(id, col, sel_val);
    }

    function saveDynamic(id, col, val) {
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/update_sub_bed",
            dataType: 'json',
            data: {id: id, col: col, val: val},
            success: function (res) {

            }
        });
    }


</script>


<script>

    function dataSave(id = "", bedName = "", bedNum = "", bedTyp = "", room_count = 1) {
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/set_bedrooms",
            dataType: 'json',
            data: {id: id, bedName: bedName, bedNum: bedNum, bedTyp: bedTyp, room_count: room_count},
            success: function (res) {
                if (res.status == "error") {

                }
                if (res.status == "success") {
                    //alert('Success');
                }
            }
        });
    }
</script>
