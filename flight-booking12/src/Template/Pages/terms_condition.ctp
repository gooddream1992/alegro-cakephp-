<?php
$paramAction = $this->request->params['action'];
//echo $paramAction;
?>
<?= $this->element('frontend/banner'); ?>
<section id="cta-faq" data-slides='["https://static.tacdn.com/img2/flights/airlines/hero_images/_GenericHero_1168x606.jpg"]'>
    <div class="bg-overlay"></div>
    <?php echo $this->element('frontend/header'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="main-cta-faq text-center">
                    <h1><?php echo $pageDetails->page_title; ?></h1>
                    <h3><?php //echo $pageDetails->page_title;  ?></h3>
                    <?php //echo $pageDetails->page_desc ?>
                </div>
            </div>
        </div>



        <div class="row justify-content-center">
            <div class="col-md-1 text-center">
                <a href="#faq-qna" class="flight-click-faq hvr-sink"><img src="<?php echo HTTP_ROOT ?>img/flight_continue.png" /></a>
            </div>
        </div>

    </div>
</section>
<div class="container" id="faq-qna">

    <!-- Bootstrap FAQ - START -->
    <div class="container">
        <br />

        <div class="row">
            <div class="col">
                <div class="pp-content pp-contentnonscrol">
                    <?php echo $pageDetails->page_desc ?>
                </div>
            </div>
        </div>
    </div>


</div>


<?= $this->element('frontend/footer'); ?>


<style>
    #cta-faq {
        position: relative;
        width: 100%;
        height: 400px;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    }    
</style>