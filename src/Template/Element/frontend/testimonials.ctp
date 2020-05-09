<section id="testimonials">
    <div class="container" style="height: inherit;">
        <div class="row" style="height: inherit;">
            <div id="carouselTestimonialIndicators" class="carousel slide" data-ride="carousel" style="height: inherit;">
                <ol class="carousel-indicators">
                    <?php
                    $i = -1;
                    foreach ($testimonial as $testi) {
                        $i++;
                        ?>
                        <li data-target="#carouselTestimonialIndicators" data-slide-to="<?= $i; ?>" <?php
                        if ($i == 0) {
                            echo 'class="active"';
                        }
                        ?> ></li>
                        <?php } ?>
                    <!-- <li data-target="#carouselTestimonialIndicators" data-slide-to="0" class="active"></li>
                       <li data-target="#carouselTestimonialIndicators" data-slide-to="1"></li> -->
                </ol>
                <div class="carousel-inner" style="height: inherit;">
                    <?php
                    $i = -1;
                    foreach ($testimonial as $testi) {
                        $i++;
                        ?>
                        <div class="carousel-item <?php
                        if ($i == 0) {
                            echo "active";
                        }
                        ?>"  >
                            <div class="container container-vertical-align">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="testimonial-content">
                                            <img class="avatar" src="<?php
                                            if (!empty($testi->photo)) {
                                                echo HTTP_ROOT . PHOTOS . $testi->photo;
                                            } else {
                                                echo HTTP_ROOT . "img/avatar1.jpg";
                                            }
                                            ?>" height="150" width="150"/>
                                            <div class="testimonial-text">
                                                <div class="name">
                                                    <?= $testi->name; ?>
                                                </div>
                                                <div class="quote">
                                                    <?= $testi->description; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?> 
                </div>
            </div>
        </div>
    </div>
</section>
