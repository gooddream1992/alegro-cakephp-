 <?php
                                $allReviewGet = $this->User->allReview($result_propertyId, $short);
                                foreach ($allReviewGet as $rv) {
                                    ?>

                                    <div class="review-b-le">
                                        <div class="review-b-img"><img src="https://www.alegro.co.ao/img/pro_pic/croppedImg_47326528.jpeg"></div>
                                        <h5><?php echo $rv->user_firstname . ' ' . $rv->user_lastname ?></h5> <span><?php echo date_format($rv->review_date, 'd M Y'); ?></span>
                                           <div style="width: 81%;float: left;">
    <!--                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>-->

                                            <span class="fa fa-star <?php if($this->User->cReview($rv->id)>=1){?> checked <?php } ?>" ></span>
                                            <span class="fa fa-star  <?php if($this->User->cReview($rv->id)>=2){?> checked <?php } ?>"></span>
                                            <span class="fa fa-star  <?php if($this->User->cReview($rv->id)>=3){?> checked <?php } ?>"></span>
                                            <span class="fa fa-star  <?php if($this->User->cReview($rv->id)>=4){?> checked <?php } ?>"></span>
                                            <span class="fa fa-star  <?php if($this->User->cReview($rv->id)>=5){?> checked <?php } ?>"></span>
                                            <span> <?php echo $this->User->cReview($rv->id) ?>/5</span>
                                        </div>
                                        <p><?php echo @$rv->description ?></p>

                                    </div>


                                <?php } ?>