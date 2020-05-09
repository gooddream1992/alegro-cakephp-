<?= $this->element('frontend/banner'); ?>
<section id="cta" data-slides='["<?php echo HTTP_ROOT ?>img/cta_bg1.jpg", "<?php echo HTTP_ROOT ?>img/cta_bg2.jpg", "<?php echo HTTP_ROOT ?>img/cta_bg3.jpg"]'>
    <div class="bg-overlay"></div>

    <?php echo $this->element('frontend/header'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="main-cta text-center">
                    <h1><?php echo $pageDetails->page_name; ?></h1>
                    <h3><?php echo $pageDetails->page_title; ?></h3>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-10">
                <div class="about-us-text text-center">
                    <?php echo $pageDetails->page_desc ?>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-1 text-center">
                <a href="#why-book-with-us" class="flight-click hvr-sink"><img src="img/flight_continue.png" /></a>
            </div>
        </div>

    </div>

</section>
<?= $this->element('frontend/why-book-with-us'); ?>
<?= $this->element('frontend/testimonials'); ?>
<?= $this->element('frontend/destination-carousel'); ?>
<?= $this->element('frontend/newsletter'); ?>
<?= $this->element('frontend/footer'); ?>


