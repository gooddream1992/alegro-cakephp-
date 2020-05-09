<script>
    $('#num_res').html(<?=$res_found;?>);

    var handlesSliders = document.getElementsByClassName('stopsRange');

                for (var x = 0; x < handlesSliders.length; x++) {
                    noUiSlider.create(handlesSliders[x], {
                        start: [0, 800],
                        step: 10,
                        tooltips: false,
                        connect: [false, true, false],
                        range: {
                            'min': [0],
                            'max': [1000]
                        },
                        format: wNumb({
                            decimals: 0,
                            suffix: ' h',
                            /*prefix: ' min',*/
                        })
                    });
                }
</script>
<?php

function dateDifference($date1, $date2) {
//    $date1 = strtotime($date1);
//    $date2 = strtotime($date2);
//    $hourFix = $minFix = 0;
//    $diff = abs($date1 - $date2);
//
//
//    $hour = $diff / (60 * 60); // in hour (1 day = 24 hour)
//    $hourFix = floor($hour);
//    $hourPen = $hour - $hourFix;
//    if ($hourPen > 0) {
//        $min = $hourPen * (60); // in hour (1 hour = 60 min)
//        $minFix = floor($min);
//        $minPen = $min - $minFix;
//    }
//
//    $str = "";
//
//    if ($hourFix > 0)
//        $str .= $hourFix . " h ";
//    if ($minFix > 0)
//        $str .= $minFix . " m ";
//
//    return $str;
    $start  = date_create($date1);
    $end = date_create($date2); 
    $diff  = date_diff( $end, $start );
    echo $diff->format('%h h %i m');
}

foreach($search_det_dats as $resut){ ?>				
                    <div class="searchItem d-flex">

                        <div class="details desktop">
                            <table class="line line-1">
                                <tr>
                                    <td>
                                        <?php
                                        $img_s = $resut->start_d_airline_name.".png";
                                            if (file_exists("img/flaglogos/" . $img_s)) {
                                                    $img_dat = HTTP_ROOT . "webroot/img/flaglogos/" . $img_s;
                                            } else {
                                                    $img_dat = $this->Url->image('icone-1.gif');
                                            }
                                        ?>
                                        <img src="<?=$img_dat;?>" alt="" style="width: 80px;">
                                    </td>
                                    <td class="d-none d-lg-block">
                                        <p class="Airlines"><?php echo isset($cnt[$resut->start_d_airline_name]) ? $cnt[$resut->start_d_airline_name] : $resut->start_d_airline_name; ?> <br><?=$resut->start_d_airline_name;?>-<?=$resut->start_d_airline_num;?></p>
                                    </td>
                                    <td>
                                        <p class="time"><?= date("h:i A", strtotime($resut->start_depart_time)); ?><br><span><?= date("M d, D", strtotime($resut->start_depart_time)); ?></span></p>

                                    </td>
                                    <td rowspan="2">
                                        <!--<div class="departArrivale">
                                            <span>LAX</span><span>IST</span>
                                        </div>-->
                                        <p class="rangeTime"><span class="hours"><?=dateDifference($resut->start_arrival_time,$resut->start_depart_time);?></span></p>
                                        <div class="stopsRange"></div>
                                        <p class="citationStops">2 stops</p>
                                    </td>
                                    <td class="time-desktop-3">
                                        <p class="time time-3"><?= date("h:i A", strtotime($resut->start_arrival_time)); ?> <br><span><?= date("M d, D", strtotime($resut->start_arrival_time)); ?></span></p>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <!--  <img src="img/icone-2.gif" alt="">-->
                                    </td>
                                    <td class="d-none d-lg-block">

                                            <!-- <p class="Airlines">American Airlines <br>BA-3271</p>-->
                                    </td>
                                    <td class="time-mobile-3">
                                        <p class="departure"><?=$this->User->cityHelper($orr)->city;?></p>
                                    </td>

                                    <td>
                                        <p class="Arrival"><?=$this->User->cityHelper($dess)->city;?></p>
                                    </td>

                                </tr>
                            </table>
                            <hr>
                            <table class="line line-2">
                                <tr>
                                    <td>
                                        <?php
                                        $img_r = $resut->return_d_airline_name.".png";
                                            if (file_exists("img/flaglogos/" . $img_r)) {
                                                    $img_dat1 = HTTP_ROOT . "webroot/img/flaglogos/" . $img_r;
                                            } else {
                                                    $img_dat1 = $this->Url->image('icone-1.gif');
                                            }
                                        ?>
                                        <img src="<?=$img_dat1;?>" alt="" style="width: 80px;">
                                    </td>
                                    <td class="d-none d-lg-block">
                                        <p class="Airlines"><?php echo isset($cnt[$resut->return_d_airline_name]) ? $cnt[$resut->return_d_airline_name] : $resut->return_d_airline_name; ?> <br><?=$resut->return_d_airline_name;?>-<?=$resut->return_d_airline_num;?></p>
                                    </td>
                                    <td>
                                        <p class="time"><?= date("h:i A", strtotime($resut->return_depart_time)); ?> <br><span><?= date("M d, D", strtotime($resut->return_depart_time)); ?></span></p>

                                    </td>
                                    <td rowspan="2">
                                        <!--<div class="departArrivale">
                                            <span>LAX</span><span>IST</span>
                                        </div>-->
                                        <p class="rangeTime"><span class="hours"><?=dateDifference($resut->return_arrival_time,$resut->return_depart_time );?></span></p>
                                        <div class="stopsRange"></div>
                                        <p class="citationStops">2 stops</p>
                                    </td>
                                    <td class="time-desktop-4">
                                        <p class="time time-4"><?= date("h:i A", strtotime($resut->return_arrival_time)); ?> <br><span><?= date("M d, D", strtotime($resut->return_arrival_time)); ?></span></p>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <!--   <img src="img/icone-2.gif" alt="">-->
                                    </td>
                                    <td class="d-none d-lg-block">

                                        <!-- <p class="Airlines">American Airlines <br>BA-3271</p> -->
                                    </td>
                                    <td class="time-mobile-4">
                                        <p class="departure"><?=$this->User->cityHelper($dess)->city;?></p>
                                    </td>

                                    <td>
                                        <p class="Arrival"><?=$this->User->cityHelper($orr)->city;?></p>
                                    </td>

                                </tr>
                            </table>
                        </div>


                        <div class="details mobile">
                            <table class="line">
                                <tr>
                                    <td>
                                        <img src="<?=$img_dat;?>" alt="" style="width: 70px;">
                                    </td>
                                    <td class="">
                                        <p class="time"><?= date("h:i A", strtotime($resut->start_depart_time)); ?><br><span><?= date("M d, D", strtotime($resut->start_depart_time)); ?></span></p>
                                    </td>
                                    <td rowspan="2">
                                        <div class="departArrivale">
                                            <span><?=$orr;?></span><span><?=$dess;?></span>
                                        </div>
                                        <p class="rangeTime"><span class="hours"><?=dateDifference($resut->start_arrival_time,$resut->start_depart_time);?></span></p>
                                        <div class="stopsRange"></div>
                                        <p class="citationStops">2 stops</p>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- <img src="img/icone-2.gif" alt="">-->
                                    </td>
                                    <td class="">
                                        <p class="time"><?= date("h:i A", strtotime($resut->start_arrival_time)); ?> <br><span><?= date("M d, D", strtotime($resut->start_arrival_time)); ?></span></p>
                                    </td>

                                </tr>
                            </table>
                            <br>
                            <table class="line line-2">
                                <tr>
                                    <td>
                                        <img src="<?=$img_dat1;?>" alt="" style="width: 70px;">
                                    </td>
                                    <td class="">
                                        <p class="time"><?= date("h:i A", strtotime($resut->return_depart_time)); ?><br><span><?= date("M d, D", strtotime($resut->return_depart_time)); ?></span></p>
                                    </td>
                                    <td rowspan="2">
                                        <div class="departArrivale">
                                            <span><?=$dess;?></span><span><?=$orr;?></span>
                                        </div>
                                        <p class="rangeTime"><span class="hours"><?=dateDifference($resut->return_arrival_time,$resut->return_depart_time);?></span></p>
                                        <div class="stopsRange"></div>
                                        <p class="citationStops">2 stops</p>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- <img src="img/icone-2.gif" alt="">-->
                                    </td>
                                    <td class="">
                                        <p class="time"><?= date("h:i A", strtotime($resut->return_arrival_time)); ?> <br><span><?= date("M d, D", strtotime($resut->return_arrival_time)); ?></span></p>
                                    </td>

                                </tr>
                            </table>
                        </div>


                        <div class="bookBtn text-center">
                            <span><?=$resut->price;?></span>
                            <a href="#" data-toggle="modal" data-target="#flightDetailsModal" class="btn-book">Book</a>
                        </div>
                    </div>
        <?php  }   
        
        $totalpagescount= ceil($res_found/15); 
                        ?>
                <ul class="pagination" <?php if($totalpagescount == 0){echo "style='display:none;'";}?>>                  
                <?php
                for($pgno = 1;$pgno<=$totalpagescount;$pgno++){  
                        $aacc="";
                        if($pgno == 1){
                            $aacc = "active";
                        }
                        $origi = $orr;
                        $desti = $dess;
                        
                        echo "<li id='".$pgno."' class='page-item ".$aacc."  page-link' onclick='next_page(&#39;".$cookiunq."&#39;,&#39;".$pgno."&#39,&#39;".$origi."&#39;,&#39;".$desti."&#39;,&#39;".$totalpagescount."&#39;)'>".$pgno." </li>";
                        
                    } 
                ?>
                </ul>
<script>
    
                       function next_page(x,y,z,b,l){
                           
                           var i=1;
                           for(i=1;i<=l;i++){
                               $('#'+i).removeAttr('class');
                               $('#'+i).attr('class','page-item page-link');                               
                           }
                            jQuery.ajax({
                                           type: "POST",
                                           url: pageurl+"users/pricedatas",
                                           dataType: 'html',
                                           data: {id:x,origin:z,destination:b,page:y,startprice:<?=$st_pri;?>,endprice:<?=$end_pri;?>},
                                           success: function(res) {
                                                $("#all_results").html(res);
                                                $('#1').removeAttr('class');
                                                $('#1').attr('class','page-item page-link');
                                                $('#'+y).removeAttr('class');
                                                $('#'+y).attr('class','page-item active page-link');
                                           }
                                       });
                       }
                  </script>