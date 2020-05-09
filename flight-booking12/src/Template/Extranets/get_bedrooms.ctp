<?php
for ($i = 1; $i <= $data['total']; $i++) {
    $bednums = json_decode(@$bedDet[$i-1]->num_bed);
    $bednams = json_decode(@$bedDet[$i-1]->beds);
    $bedcount = @count(@json_decode(@$bedDet[$i-1]->num_bed));
    
    ?>
    <h5>Bedroom <?=$i;?></h5>
<!--    <div  id="" style="display: none;">
        <ul>
            <li>
                <div class="box-border">
                    <span class="value-button" data-dir="dwn"><i class="fas fa-minus"></i></span>
                    <input type="number" class="number numberofbed<?= $i; ?>"  min="1"  value="1" />
                    <span class="value-button" data-dir="up"><i class="fas fa-plus"></i></span>
                </div>
            </li>
            <li>
                <script>
                    /* 
                     $(document).ready(function () {
                     $('.select').html('');
                     var array = ["single bed", "semi double-bed", "double bed", "queen bed",'king bed','super king bed','bunk bed','sofa bed','futon'];
                     for (var i = 0; i < array.length; i++) {
                     var option = document.createElement("option");
                     option.setAttribute("value", array[i]);
                     option.text = array[i];
                     
                     $('.select').append(option);                        
                     }
                     
                     });
                     */
                </script>
                <select class="select<?= $i; ?>" data-count="0" data-id="<?= $i; ?>">
                    <option>single bed </option>
                    <option>semi double-bed</option>
                    <option>double bed</option>
                    <option>queen bed</option>
                    <option>king bed</option>
                    <option>super king bed</option>
                    <option>bunk bed</option>
                    <option>sofa bed</option>
                    <option>futon</option>
                </select>
            </li>
            <li class="rem<?= $i; ?>"><i class="fa fa-times"></i></li>
        </ul>
    </div>-->
    <div id="ulcontent<?= $i; ?>">
    <ul>
        <li>
            <div class="box-border">
                <span class="value-button" data-dir="dwn"><i class="fas fa-minus"></i></span>
                <input type="number" class='number' name='numberofbed<?= $i; ?>[]' min="1"  value="<?php if(!empty(@$bednums[0])){ echo $bednums[0]; }else{ echo "1"; } ?>" />
                <span class="value-button" data-dir="up"><i class="fas fa-plus"></i></span>
            </div>
        </li>
        <li>
            <select class="select<?= $i; ?>" data-id="<?= $i; ?>" data-count="0" data-id="<?= $i; ?>" name="numb<?= $i; ?>[]">
                <option <?php if(@$bednams[0] == "single bed"){ echo 'selected'; } ?> >single bed</option>
                <option <?php if(@$bednams[0] == "semi double-bed"){ echo 'selected'; } ?>>semi double-bed</option>
                <option <?php if(@$bednams[0] == "double bed"){ echo 'selected'; } ?>>double bed</option>
                <option <?php if(@$bednams[0] == "queen bed"){ echo 'selected'; } ?>>queen bed</option>
                <option <?php if(@$bednams[0] == "king bed"){ echo 'selected'; } ?>>king bed</option>
                <option <?php if(@$bednams[0] == "super king bed"){ echo 'selected'; } ?>>super king bed</option>
                <option <?php if(@$bednams[0] == "bunk bed"){ echo 'selected'; } ?>>bunk bed</option>
                <option <?php if(@$bednams[0] == "sofa bed"){ echo 'selected'; } ?>>sofa bed</option>
                <option <?php if(@$bednams[0] == "futon"){ echo 'selected'; } ?>>futon</option>
            </select>
        </li>
    </ul>
    </div>
    <div id="myDiv<?= $i; ?>">
        <?php
        for($b_count=1; $b_count<$bedcount;$b_count++){
        ?>
        
        <ul>
        <li>
            <div class="box-border">
                <span class="value-button" data-dir="dwn"><i class="fas fa-minus"></i></span>
                <input type="number" class='number' name='numberofbed<?= $i; ?>[]' min="1"  value="<?php if(!empty(@$bednums[$b_count])){ echo $bednums[$b_count]; }else{ echo "1"; } ?>" />
                <span class="value-button" data-dir="up"><i class="fas fa-plus"></i></span>
            </div>
        </li>
        <li>
            <select class="select<?= $i; ?>" data-id="<?= $i; ?>" data-count="0" data-id="<?= $i; ?>" name="numb<?= $i; ?>[]">
                <option <?php if(@$bednams[$b_count] == "single bed"){ echo 'selected'; } ?> >single bed</option>
                <option <?php if(@$bednams[$b_count] == "semi double-bed"){ echo 'selected'; } ?>>semi double-bed</option>
                <option <?php if(@$bednams[$b_count] == "double bed"){ echo 'selected'; } ?>>double bed</option>
                <option <?php if(@$bednams[$b_count] == "queen bed"){ echo 'selected'; } ?>>queen bed</option>
                <option <?php if(@$bednams[$b_count] == "king bed"){ echo 'selected'; } ?>>king bed</option>
                <option <?php if(@$bednams[$b_count] == "super king bed"){ echo 'selected'; } ?>>super king bed</option>
                <option <?php if(@$bednams[$b_count] == "bunk bed"){ echo 'selected'; } ?>>bunk bed</option>
                <option <?php if(@$bednams[$b_count] == "sofa bed"){ echo 'selected'; } ?>>sofa bed</option>
                <option <?php if(@$bednams[$b_count] == "futon"){ echo 'selected'; } ?>>futon</option>
            </select>
        </li>
    </ul>
        
        <?php
            
        }
        ?>
    
    </div>
    <a href="javascript:void(0);" id="btnTest<?= $i; ?>" onclick="myFunction(<?= $i; ?>)"><strong>ADD ANOTHER BED TYPE</strong></a>

    <?php
}

?>
<script type="text/JavaScript">
    var count = 0;
    var array = ["single bed", "semi double-bed", "double bed", "queen bed",'king bed','super king bed','bunk bed','sofa bed','futon'];
    function myFunction(id){
        
        if(id == $('.select'+id).attr('data-id')){
            alert(id);
            if($('.select'+id).attr('data-count') == 0){
                count = 0;
            }else{
                count = $('.select'+id).attr('data-count');
            }
            if(count <=7){
            $('.select'+id).attr('data-count',++count);
           // $('.select'+id).attr('name',"numb"+id+"[]");
            //$(".numberofbed"+id).attr('name','numberofbed'+id+"[]");
            $("#myDiv"+id).append($('#ulcontent'+id).html());
            }
        }else{
            count = 0;
        }
    }   
    
//    document.getElementById("btnTest<?= $i; ?>").addEventListener("click", function(){
//
//    $('.select').attr('name',"numb"+count+"<?= $i + 2; ?>[]");
//    if(count<array.length){    
//    $("#myDiv<?= $i; ?>").append($('#ulcontent').html());
//    ++count;
//    alert(count);
//    if(count==array.length){
//    count=array.length;
//    }
//    }
//    });
    function removeSelect(id){
    $('#btnTest<?= $i; ?>').show();
    --count;
    document.getElementById("mySelect<?= $i; ?>"+id).remove();
    document.getElementById("mySpan<?= $i; ?>"+id).remove();
    }

</script>
