


    <section id="destination-carousel">
      <div class="container">

        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="subtitle text-center">
             <?php echo __('Top Deals') ?>
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="subtitle-explanation text-center color-grey">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="carousel_wrap">
             <div id="carousel">
                 
                 
                      <?php
                        $date = strtotime("+7 day");
                       $returnDate= date('d/m/Y', $date);
                        foreach ($UserBookDetails as $deal) {
                            $city = $this->User->cityHelper($deal['destination'])->city;
                            $country = $this->User->cityHelper($deal['destination'])->country;
                            ?>
              
                            <div class="shadow">
                                <a href="<?php echo HTTP_ROOT ?>/search?radio=Return+Trip&origin=<?PHP echo $deal['origin']; ?>&destination=<?PHP echo $deal['destination']; ?>&departure_date=<?php echo date('d/m/Y'); ?>&return_date=<?php echo $returnDate;?>&cabin=Economy&passenger=1+Passenger&page=1">
                                    <div class="destination-card">
                                        <div class="top-image">
                                            <img height="400" width="400" src="<?php echo HTTP_ROOT . 'img/destination/' . $deal->destination . '.jpg' ?>" />
                                        </div>
                                        <div class="price">
    <?php echo $deal->price; ?>
                                        </div>
                                        <div class="bottom">
                                            <div class="city">   <?php echo __($city); ?></div>
                                            <div class="country">   <?php echo __($country); ?></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
<?php } ?>

               
                 
                 
              </div>
              <a id="prev" class="nav_button prev_button link pull-left hvr-backward" title="prev">
                <img src="img/left.png" />
              </a>
              <a id="next" class="nav_button next_button link pull-right hvr-forward" title="next">
                <img src="img/right.png" />
              </a>
          </div>
        </div>


        
      </div>
    </section>


