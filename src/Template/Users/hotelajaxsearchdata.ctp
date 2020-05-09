<?php

function timeago($date1, $date2) {
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400);
}

function changeFormat($pri) {
    $dat = explode('.', $pri);
    $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
    return $f;
}

$chk_in = '';
$chk_out = '';
foreach (explode('&', urldecode(@$url_query_string)) as $url) {

    if (explode('=', $url)[0] == 'hotel_check_in') {
        $chk_in = explode('=', $url)[1];
    }
    if (explode('=', $url)[0] == 'hotel_check_out') {
        $chk_out = explode('=', $url)[1];
    }
    if (explode('=', $url)[0] == 'rooms') {
        $searched_rooms = explode('=', $url)[1];
    }
}
$dateDifference = timeago(date_format(date_create(str_replace('/', '-', $chk_in)), 'Y-m-d'), date_format(date_create(str_replace('/', '-', $chk_out)), 'Y-m-d'));
$x = $result_property; //->toArray();
if (@count(@$x) > 0) {
    $boostidStatus = $this->User->chkBoostajaxDesc($result_property);



    $allpro_id = array();
    foreach ($result_property as $property) {
        $allpro_id[$property->property_id] = $property;
    }

    //$results = array_diff_key($allpro_id,$boots_id);
    //pj($results);exit;

    $boots_id = array();
    foreach ($boostidStatus as $list) {
        $boots_id[$list->property_id] = $list;
        $boostStatus = $this->User->chkBoost($list->property_id);
        $htl_rm_pric = $this->User->getHotelprice($list->property_id, $guest);
        $htl_rm_pric_frea = $this->User->get_featured_fee($list->property_id);
        $getBetDetails = $this->User->propertyBedCount($list->property_id, $guest);
        $bookingtypex = $this->User->getBookingRoomType($list->property_id);
        if ($bookingtypex == 2) {
            $aminity = $this->User->propertyAmenities($list->property_id, $guest);
        } else {
            $aminity = $this->User->propertyEntireSearchAmenities($list->property_id);
        }
        $htl_fixrm_pric = $this->User->getHotelfixprice($list->property_id, $guest);
        $longDays = $this->User->longDays($list->property_id);
        ?>
        <a  <?php if ($bookingtypex == 2) { ?> href="<?= HTTP_ROOT; ?>preview_private/<?= $list->property_id; ?>?<?= $url_query_string; ?>" <?php } else { ?> href="<?= HTTP_ROOT; ?>preview_entire/<?= $list->property_id; ?>?<?= $url_query_string; ?>"  <?php } ?> target="_blank">
            <div class="hotel-lsting <?php if ($boostStatus == 1) { ?>sponsore-list<?php } ?>" >
                <div class="hotel-lsting-left">
                    <?php if ($boostStatus == 1) { ?> <span><?php echo __('Sponsored') ?></span> <?php
                    } else {
                        if ($htl_rm_pric_frea > 0) {
                            ?>
                            <span><?php echo __('Best Price') ?></span>
                            <?php
                        }
                    }
                    ?>
                    <div class="hotel-img">
                        <img src="<?= HTTP_ROOT; ?>img/pro_pic/<?= $this->User->getHotelImage($list->property_id); ?>" alt="img" style="width: 100%;">
                    </div>
                </div>
                <div class="hotel-lsting-middle" style="width: 48%;">
                    <h3><?= $this->User->getProName($list->property_id); ?>
                        <?php for ($i = 1; $i <= $this->User->propertyRating($list->property_id); $i++) { ?>
                            <i class="fa fa-star rating"></i>
                        <?php } ?>
                        <i class="fa fa-thumbs-up"></i>
                    </h3>
                    <p><i class="fas fa-ruler"></i> <?= $this->User->propertySize($list->property_id, $guest); ?> <?php echo __('sqm') ?> <br>
                        <i class="fas fa-users"></i> <?php
                        echo $this->User->propertyPeople($list->property_id, $guest);
                        if ($this->User->propertyPeople($list->property_id, $guest) <= 1) {
                            ?> <?php echo __('Guest') ?> <?php } else { ?> <?php echo __('Guests') ?> <?php } ?> <br>
                        <?php if ($bookingtypex == 2) { ?>
                            <i class="fas fa-bed"></i> <?php echo $getBetDetails->num_bed; ?>x <?php echo __($getBetDetails->beds); ?>  <?php foreach ($getBetDetails->extranets_user_property_sub_beds as $bes) { ?> <?php echo " + " . $bes->num_beds ?>x <?php
                                echo __($bes->beds);
                            }
                            ?><br>
                        <?php } ?>
                        <i class="fas fa-map-marker"></i>
                        <?php echo $this->User->stateName($list->property_id, $guest) . ',' . ' ' . $this->User->cityName($list->property_id, $guest); ?>
                        <br>

                        <?php
                        //pj($aminity);
                        $aminityx = [];
                        $geta = json_decode($aminity);
                        $i = 1;
                        foreach ($geta as $daee) {
                            $aminityx[] = __($daee);
                            if ($i++ == 2)
                                break;
                        }
                        echo implode(', ', $aminityx);
                        ?>
                    </p>
                    <?php /* if ($this->User->propertyRating($list->property_id) >= 4) { ?><h5 style="background-color:#8bc34a !important;font-size: 15px;width: 62%;margin-top: -3px;text-transform: capitalize;"><a href="#"><?php echo __('High Quality') ?></a></h5>
                      <?php } else if ($this->User->propertyRating($list->property_id) >= 3) { ?><h5 style="background-color: #ffc107 !important;font-size: 15px;width: 62%;margin-top: -3px;text-transform: capitalize;"><a href="#"><?php echo __('Medium Quality') ?></a></h5>
                      <?php } else if ($this->User->propertyRating($list->property_id) <= 2) { ?><h5 style="background-color: #f44336 !important;font-size: 15px;width: 62%;margin-top: -3px;text-transform: capitalize;"><a href="#"><?php echo __('Low Quality') ?></a></h5> <?php } */ ?>
                </div>
                <div class="hotel-lsting-right">
                    <h6><?php echo $this->User->reviewCount($list->property_id); ?> <?php echo __('reviews') ?><span><?php
                            echo is_nan($this->User->totalRating($list->property_id)) ? 0 : $this->User->totalRating($list->property_id);
                            echo "/5";
                            ?></span></h6>
                    <h5 class="old-price">
                        <?php if ($htl_rm_pric_frea > 0) { ?>
                            <span><?php echo __('was') ?></span><span>
                                <?php
                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($htl_rm_pric)), 2) . '/' . __('night');
                                } else {
                                    echo 'AOA ' . $this->User->changeFormat(number_format($htl_rm_pric, 2)) . '/' . __('night');
                                }
                                ?>
                            </span>
                            <?php
                        } else {
                            echo "&nbsp;&nbsp;";
                        }
                        ?>
                    </h5>


                    <h5><?php if ($htl_rm_pric_frea > 0) { ?>
                            <span><?php echo __('now') ?></span>
                            <?php
                            if ($dateDifference >= $longDays && !empty($longDays)) {
                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2) . '/' . __('night');
                                } else {
                                    echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2)) . '/' . __('night');
                                }
                            } else {
                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100)))), 2) . '/' . __('night');
                                } else {
                                    echo 'AOA ' . $this->User->changeFormat(number_format(($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))), 2)) . '/' . __('night');
                                }
                            }
                            ?>
                        </h5>
                        <h6 style="color:green;font-size: 15px;">
                            <?php
                            if ($bookingtypex == 1) {
                                if ($dateDifference >= $longDays && !empty($longDays)) {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric, 2));
                                    }
                                } else {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))))), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))), 2));
                                    }
                                }
                            } else {
                                // For private room price
                                if ($dateDifference >= $longDays && !empty($longDays)) {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric * $searched_room), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric * $searched_room, 2));
                                    }
                                } else {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))) * $searched_room)), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))) * $searched_room, 2));
                                    }
                                }
                            }
                            ?>
                            <?php
                            if ($dateDifference < 2) {
                                echo " " . __('for')
                                ?> <?= $dateDifference; ?> <?php
                                echo __('night');
                            } else {
                                echo " " . __('for')
                                ?> <?= $dateDifference; ?> <?php
                                echo __('nights');
                            }
                            ?>
                        </h6>
                    <?php } ?>
                    <?php if ($htl_rm_pric_frea > 0) { ?>
                    <?php } else { ?>
                        <h5>
                            <?php
                            if ($dateDifference >= $longDays && !empty($longDays)) {
                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2) . '/' . __('night');
                                } else {
                                    echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2)) . '/' . __('night');
                                }
                            } else {

                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_rm_pric), 2) . '/' . __('night');
                                } else {
                                    echo 'AOA ' . $this->User->changeFormat(number_format($htl_rm_pric, 2)) . '/' . __('night');
                                }
                            }
                            ?>
                        </h5>
                        <h6 style="color:green;font-size: 15px;">
                            <?php
                            if ($bookingtypex == 1) {
                                if ($dateDifference >= $longDays && !empty($longDays)) {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric, 2));
                                    }
                                } else {

                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_rm_pric), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_rm_pric, 2));
                                    }
                                }
                            } else {
                                // For private room price
                                if ($dateDifference >= $longDays && !empty($longDays)) {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric * $searched_rooms), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric * $searched_rooms, 2));
                                    }
                                } else {

                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_rm_pric * $searched_rooms), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_rm_pric * $searched_rooms, 2));
                                    }
                                }
                            }
                            ?>

                            <?php
                            if ($dateDifference < 2) {
                                ?>
                                <?php echo " " . __('for') ?> <?= $dateDifference; ?> <?php
                                echo __('night');
                            } else {
                                echo " " . __('for')
                                ?> <?= $dateDifference; ?> <?php
                                echo __('nights');
                            }
                            ?>
                        </h6>
                    <?php } ?>

                    <?php
                    $bookingtypex = $this->User->getBookingRoomType($list->property_id);
                    ?>

                    <div class="form-group" style="margin:0; float: right;">
                        <label>&nbsp;</label>
                        <button type="button" class="btn btn-primary hvr-grow btn-fill"><?php echo __('Check Availability') ?></button>
                    </div>





                    <!--      <div class="form-group" style="margin:0; float: right;">
                             <label>&nbsp;</label>
                             <a href="<?= HTTP_ROOT; ?>preview/<?= $list->property_id; ?>?<?= $url_query_string; ?>" target="_blank"><button type="button" class="btn btn-primary hvr-grow btn-fill"><?php echo __('Check Availability') ?></button></a>
                         </div> -->
                </div>
            </div>
        </a>
        <?php
    }
    $allpropertyresults = array_diff_key($allpro_id, $boots_id);
    foreach ($allpropertyresults as $allresults) {
        $boostStatus = $this->User->chkBoost($allresults->property_id);
        $htl_rm_pric = $this->User->getHotelprice($allresults->property_id, $guest);
        $htl_rm_pric_frea = $this->User->get_featured_fee($allresults->property_id);
        $getBetDetails = $this->User->propertyBedCount($allresults->property_id, $guest);
        $bookingtypex = $this->User->getBookingRoomType($allresults->property_id);
        if ($bookingtypex == 2) {
            $aminity = $this->User->propertyAmenities($allresults->property_id, $guest);
        } else {
            $aminity = $this->User->propertyEntireSearchAmenities($allresults->property_id);
        }
        $htl_fixrm_pric = $this->User->getHotelfixprice($allresults->property_id, $guest);
        $longDays = $this->User->longDays($allresults->property_id);
        ?>
        <a <?php if ($bookingtypex == 2) { ?> href="<?= HTTP_ROOT; ?>preview_private/<?= $allresults->property_id; ?>?<?= $url_query_string; ?>" <?php } else { ?> href="<?= HTTP_ROOT; ?>preview_entire/<?= $allresults->property_id; ?>?<?= $url_query_string; ?>" <?php } ?> target="_blank">
            <div class="hotel-lsting <?php if ($boostStatus == 1) { ?>sponsore-list<?php } ?>" >
                <div class="hotel-lsting-left">
                    <?php if ($boostStatus == 1) { ?> <span><?php echo __('Sponsored') ?></span> <?php
                    } else {
                        if ($htl_rm_pric_frea > 0) {
                            ?>
                            <span><?php echo __('Best Price') ?></span>
                            <?php
                        }
                    }
                    ?>
                    <div class="hotel-img">
                        <img src="<?= HTTP_ROOT; ?>img/pro_pic/<?= $this->User->getHotelImage($allresults->property_id); ?>" alt="img" style="width: 100%;">
                    </div>
                </div>
                <div class="hotel-lsting-middle" style="width: 48%;">
                    <h3><?= $this->User->getProName($allresults->property_id); ?>
                        <?php for ($i = 1; $i <= $this->User->propertyRating($allresults->property_id); $i++) { ?>
                            <i class="fa fa-star rating"></i>
                        <?php } ?>
                        <i class="fa fa-thumbs-up"></i>
                    </h3>
                    <p><i class="fas fa-ruler"></i> <?= $this->User->propertySize($allresults->property_id, $guest); ?> <?php echo __('sqm') ?> <br>
                        <i class="fas fa-users"></i> <?php
                        echo $this->User->propertyPeople($allresults->property_id, $guest);
                        if ($this->User->propertyPeople($allresults->property_id, $guest) <= 1) {
                            ?> <?php echo __('Guest') ?> <?php } else { ?> <?php echo __('Guests') ?> <?php } ?> <br>
                        <?php if ($bookingtypex == 2) { ?>
                            <i class="fas fa-bed"></i> <?php echo $getBetDetails->num_bed; ?>x <?php echo __($getBetDetails->beds); ?>  <?php foreach ($getBetDetails->extranets_user_property_sub_beds as $bes) { ?> <?php echo " + " . $bes->num_beds ?>x <?php
                                echo __($bes->beds);
                            }
                            ?><br>
                        <?php } ?>
                        <i class="fas fa-map-marker"></i>
                        <?php echo $this->User->stateName($allresults->property_id, $guest) . ',' . ' ' . $this->User->cityName($allresults->property_id, $guest); ?>
                        <br>

                        <?php
                        //pj($aminity);
                        $aminityx = [];
                        $geta = json_decode($aminity);
                        $i = 1;
                        if (!empty($geta)) {
                            foreach ($geta as $daee) {
                                $aminityx[] = __($daee);
                                if ($i++ == 2)
                                    break;
                            }
                        }
                        echo implode(', ', $aminityx);
                        ?>
                    </p>
                    <?php /* if ($this->User->propertyRating($list->property_id) >= 4) { ?><h5 style="background-color:#8bc34a !important;font-size: 15px;width: 62%;margin-top: -3px;text-transform: capitalize;"><a href="#"><?php echo __('High Quality') ?></a></h5>
                      <?php } else if ($this->User->propertyRating($list->property_id) >= 3) { ?><h5 style="background-color: #ffc107 !important;font-size: 15px;width: 62%;margin-top: -3px;text-transform: capitalize;"><a href="#"><?php echo __('Medium Quality') ?></a></h5>
                      <?php } else if ($this->User->propertyRating($list->property_id) <= 2) { ?><h5 style="background-color: #f44336 !important;font-size: 15px;width: 62%;margin-top: -3px;text-transform: capitalize;"><a href="#"><?php echo __('Low Quality') ?></a></h5> <?php } */ ?>
                </div>
                <div class="hotel-lsting-right">
                    <h6><?php echo $this->User->reviewCount($allresults->property_id); ?> <?php echo __('reviews') ?><span><?php
                            echo is_nan($this->User->totalRating($allresults->property_id)) ? 0 : $this->User->totalRating($allresults->property_id);
                            echo "/5";
                            ?></span></h6>
                    <h5 class="old-price">
                        <?php if ($htl_rm_pric_frea > 0) { ?>
                            <span><?php echo __('was') ?></span><span>
                                <?php
                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($htl_rm_pric)), 2) . '/' . __('night');
                                } else {
                                    echo 'AOA ' . $this->User->changeFormat(number_format($htl_rm_pric, 2)) . '/' . __('night');
                                }
                                ?>
                            </span>
                            <?php
                        } else {
                            echo "&nbsp;&nbsp;";
                        }
                        ?>
                    </h5>


                    <h5><?php if ($htl_rm_pric_frea > 0) { ?>
                            <span><?php echo __('now') ?></span>
                            <?php
                            if ($dateDifference >= $longDays && !empty($longDays)) {
                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2) . '/' . __('night');
                                } else {
                                    echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2)) . '/' . __('night');
                                }
                            } else {

                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100)))), 2) . '/' . __('night');
                                } else {
                                    echo 'AOA ' . $this->User->changeFormat(number_format(($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))), 2)) . '/' . __('night');
                                }
                            }
                            ?>
                        </h5>
                        <h6 style="color:green;font-size: 15px;">
                            <?php
                            if ($bookingtypex == 1) {
                                if ($dateDifference >= $longDays && !empty($longDays)) {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric, 2));
                                    }
                                } else {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))))), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))), 2));
                                    }
                                }
                            } else {
                                // For private room price
                                if ($dateDifference >= $longDays && !empty($longDays)) {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric * $searched_rooms), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric * $searched_rooms, 2));
                                    }
                                } else {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), ($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))) * $searched_rooms)), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))) * $searched_rooms, 2));
                                    }
                                }
                            }
                            ?>
                            <?php
                            if ($dateDifference < 2) {
                                echo " " . __('for')
                                ?> <?= $dateDifference; ?> <?php
                                echo __('night');
                            } else {
                                echo " " . __('for')
                                ?> <?= $dateDifference; ?> <?php
                                echo __('nights');
                            }
                            ?>
                        </h6>
                    <?php } ?>
                    <?php if ($htl_rm_pric_frea > 0) { ?>
                    <?php } else { ?>
                        <h5>
                            <?php
                            if ($dateDifference >= $longDays && !empty($longDays)) {
                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_fixrm_pric), 2) . '/' . __('night');
                                } else {
                                    echo 'AOA ' . $this->User->changeFormat(number_format($htl_fixrm_pric, 2)) . '/' . __('night');
                                }
                            } else {

                                if (!empty($this->request->session()->read("CURRENCY"))) {
                                    echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $htl_rm_pric), 2) . '/' . __('night');
                                } else {
                                    echo 'AOA ' . $this->User->changeFormat(number_format($htl_rm_pric, 2)) . '/' . __('night');
                                }
                            }
                            ?>
                        </h5>
                        <h6 style="color:green;font-size: 15px;">
                            <?php
                            if ($bookingtypex == 1) {
                                if ($dateDifference >= $longDays && !empty($longDays)) {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric, 2));
                                    }
                                } else {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_rm_pric), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_rm_pric, 2));
                                    }
                                }
                            } else {
                                // For private room price
                                if ($dateDifference >= $longDays && !empty($longDays)) {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_fixrm_pric * $searched_rooms), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_fixrm_pric * $searched_rooms, 2));
                                    }
                                } else {
                                    if (!empty($this->request->session()->read("CURRENCY"))) {
                                        echo $this->request->session()->read("CURRENCY") . ' ' . number_format($this->User->priceConvert($this->request->session()->read("CURRENCY"), $dateDifference * $htl_rm_pric * $searched_rooms), 2);
                                    } else {
                                        echo 'AOA ' . $this->User->changeFormat(number_format($dateDifference * $htl_rm_pric * $searched_rooms, 2));
                                    }
                                }
                            }
                            ?>

                            <?php
                            if ($dateDifference < 2) {
                                ?>
                                <?php echo " " . __('for') ?> <?= $dateDifference; ?> <?php
                                echo __('night');
                            } else {
                                echo " " . __('for')
                                ?> <?= $dateDifference; ?> <?php
                                echo __('nights');
                            }
                            ?>
                        </h6>
                    <?php } ?>



                    <?php
                    $bookingtypex = $this->User->getBookingRoomType($allresults->property_id);
                    ?>

                    <div class="form-group" style="margin:0; float: right;">
                        <label>&nbsp;</label>
                        <button type="button" class="btn btn-primary hvr-grow btn-fill"><?php echo __('Check Availability') ?></button>
                    </div>

                </div>
            </div>

        </a>

        <!--
                        <div class="form-group" style="margin:0; float: right;">
                            <label>&nbsp;</label>
                            <a href="<?= HTTP_ROOT; ?>preview/<?= $allresults->property_id; ?>?<?= $url_query_string; ?>" target="_blank"><button type="button" class="btn btn-primary hvr-grow btn-fill"><?php echo __('Check Availability') ?></button></a>
                        </div> -->

        <!--        </div>
                </div>-->
        <?php
    }
} else {
    ?>
    <div class='no-result' style=' width: 70%;'><div class='no-found-logo'><img src='<?= $this->Url->image('extranet/no-properties.svg'); ?> ' alt=''></div> <h2><?php echo __('No Properties Available') ?></h2><p><?php echo __('We could not find any properties according to your selected dates. Try searching again with different dates.'); ?></p>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 desktop-change" data-toggle="collapse" data-target="#div-ho">

            <a onclick="topFunction()"  href='javascript:void(0)'><?php echo __('Change') ?></a>
        </div>
    </div>
    <?php
}
if (empty($result_property_count)) {
    $result_property_count = 0;
}
?>
<script>
    $(document).ready(function() {
        $('#cnt').text('<?= $result_property_count; ?>');
    });
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

</script>