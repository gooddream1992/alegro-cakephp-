<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/extranet/reviews.css" type="text/css">
<style>
    .rating-line {
        color: #bdbdbd;
    }
    .rating-line .checked {
        color: #f9d749;
    }
</style>
<?php
$currUrl = HTTP_ROOT . 'extranets/reviews';
$review = '';
if (!empty($_GET['q'])) {
    $review = $_GET['q'];
}
?>

<script>
//update URL in js
    $(document).ready(function() {
        $('#sort_sel').val('<?= $review; ?>');
    });
    function updateQueryStringParameter(uri, key, value) {
        var URL;
        URL = uri + "?" + key + "=" + value;
        window.location.href = URL;
    }
</script>

<section class="reviews">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2><?php echo __('Reviews'); ?></h2>
                <div class="all-reviews">
                    <select id="sort_sel" onchange="updateQueryStringParameter('<?= $currUrl; ?>', 'q', this.value)">

                        <?php
                        if (!empty($allProperty)) {
                            foreach ($allProperty as $pro_data) {
                                ?>
                                <option value="<?= $pro_data; ?>"><?= __('Accommodation') . ' :: ' . $this->User->propertyName($pro_data); ?></option>
                                <?php
                            }
                        }
                        ?>
                        <!--                        <option value="all">All Reviews</option>
                                                <option value="latest">Latest</option>
                                                <option value="oldest">Oldest</option>-->
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="review-page">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="review-page-left">
                    <?php
                    $all_rating = 0;
                    $counter = 0;
                    //$allReviewGet = null;

                    if (is_null($allProperty)) {
                        ?>
                        <div class="container" id="basictab" style="background: none;margin: -81px -212px;">
                            <div class="row" >
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <img src="<?= $this->Url->image('extranet/no-reviews.svg'); ?>" style="width: 150px;margin: 94px 0px 20px 0px;border-radius: inherit;">
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12" >
                                    <h4 style="font-size: 20px;padding: 10px 0;float: left;width: 100%;text-align: center;font-weight: bold;color: #000;"><?php echo __('No Reviews'); ?></h4>
                                    <h6><?php echo __("You havent received any reviews yet. Treat your guests right and your reviews will be on the way."); ?></h6>
                                </div>
                            </div>
                        </div>
                        <?php
                    } else {
                        //$allReviewGet = $this->User->allReviewExt($allProperty, $review);

                        if ($allReviewGet->count() == 0) {
                            ?>
                            <div class="container" id="basictab" style="background: none;margin: -81px -212px;">
                                <div class="row" >
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <img src="<?= $this->Url->image('extranet/no-reviews.svg'); ?>" style="width: 150px;margin: 94px 0px 20px 0px;border-radius: inherit;">
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12" >
                                        <h4 style="font-size: 20px;padding: 10px 0;float: left;width: 100%;text-align: center;font-weight: bold;color: #000;"><?php echo __('No Reviews'); ?></h4>
                                        <h6><?php echo __("You havent received any reviews yet. Treat your guests right and your reviews will be on the way."); ?></h6>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            foreach ($allReviewGet as $rv) {
                                ?>
                                <div class="review-b-le">
                                    <div class="review-b-img"><img src="<?= HTTP_ROOT . $this->User->getUserPic4Review($rv->booking_no); ?>" style="height: 50px;"></div>
                                    <h5><?php echo $rv->user_firstname . ' ' . $rv->user_lastname ?></h5>
                                    <span>
                                        <?php echo __(date_format($rv->review_date, 'd ')); ?>
                                        <?php echo __(date_format($rv->review_date, 'M')); ?>
                                        <?php echo __(date_format($rv->review_date, ' Y')); ?>
                                    </span>
                                    <div class="rating-line">
                                        <i class="fa fa-star <?php if ($this->User->cReview($rv->id) >= 1) { ?> checked <?php } ?>" ></i>
                                        <i class="fa fa-star  <?php if ($this->User->cReview($rv->id) >= 2) { ?> checked <?php } ?>"></i>
                                        <i class="fa fa-star  <?php if ($this->User->cReview($rv->id) >= 3) { ?> checked <?php } ?>"></i>
                                        <i class="fa fa-star  <?php if ($this->User->cReview($rv->id) >= 4) { ?> checked <?php } ?>"></i>
                                        <i class="fa fa-star  <?php if ($this->User->cReview($rv->id) >= 5) { ?> checked <?php } ?>"></i>
                                        <span> <?php
                                            $all_rating += $this->User->cReview($rv->id);
                                            echo $this->User->cReview($rv->id)
                                            ?>/5</span>
                                    </div>
                                    <p><?php echo nl2br(@$rv->description); ?></p>

                                </div>
                                <?php
                                $counter++;
                            }

                            echo "<div class='center' style='float:left;width:100%;'><ul class='pagination' style='margin:20px auto;display: inline-block;width: 100%;float: left;'>";
                            echo $this->Paginator->prev('< ' . __('prev'), array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'prev disabled'));
                            echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active'));
                            echo $this->Paginator->next(__('next') . ' >', array('tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'disabled'), null, array('class' => 'next disabled'));
                            echo "</div></ul>";
                        }
                    }
                    ?>

                </div>
                <div class="review-page-right">
                    <div class="review-right-box">
                        <h6><?php echo __("Overall Score"); ?></h6>

                        <h2><?php
                            if (!empty($review)) {
                                $rating_deails = $this->User->hotelPropertyReview($review);
//                    if (@is_nan($all_rating / $counter)) {
//                        echo 0;
//                    } else {
//                        echo $this->User->star_level(@round($all_rating / $counter, 1));
//                    }
                                if (@is_nan($rating_deails['rating'])) {
                                    echo 0;
                                } else {
                                    echo $rating_deails['rating'];
                                }
                            }
                            ?><span>/5</span></h2>
                        <p><?php echo __("based one"); ?> <?= (@is_nan($rating_deails['count'])) ? 0 : $rating_deails['count']; ?> <?php echo __("review"); ?>(s)</p>
                        <div class="veri-fed">
                            <i class="fa fa-check-circle"></i><div class="ver-ico"><?php echo __("100% verified reviews from guests"); ?></div>
                        </div>
                    </div>
                    <div class="revi-sec">
                        <div class="revi-sec-top"><?= (@is_nan($rating_deails['count'])) ? 0 : $rating_deails['count']; ?> <?php echo __("review"); ?>(s)</div>
                        <?php
                        if (!empty($review)) {
                            $strs_count = array_count_values($this->User->allReviewExtStarts($review));
                            ?>
                            <div class="rating-right">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span> <?= !empty($strs_count['5']) ? @$strs_count['5'] : 0; ?> <?php echo __("review"); ?>(s)</span>
                            </div>
                            <div class="rating-right">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <span> <?= !empty($strs_count['4']) ? @$strs_count['4'] : 0; ?> <?php echo __("review"); ?>(s)</span>
                            </div>
                            <div class="rating-right">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <span> <?= !empty($strs_count['3']) ? @$strs_count['3'] : 0; ?> <?php echo __("review"); ?>(s)</span>
                            </div>
                            <div class="rating-right">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <span> <?= !empty($strs_count['2']) ? @$strs_count['2'] : 0; ?> <?php echo __("review"); ?>(s)</span>
                            </div>
                            <div class="rating-right">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <i class="fa fa-star-o"></i>
                                <span> <?= !empty($strs_count['1']) ? @$strs_count['1'] : 0; ?> <?php echo __("review"); ?>(s)</span>
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>