<?php
$paramAction = $this->request->params['action'];
//echo $paramAction;
?>
<?= $this->element('frontend/banner'); ?>
<section id="cta-faq" data-slides='["<?php echo HTTP_ROOT ?>img/faq.jpg"]'>
    <div class="bg-overlay"></div>

    <?php echo $this->element('frontend/header'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="main-cta-faq text-center">
                    <h1><?php echo __('Welcome to our help centre'); ?></h1>
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

        <div class="panel-group" id="accordion">
            <?php
            $i=1;
            foreach ($getData as $fq1) { ?>


                <div class="faqHeader"><?php echo $fq1->category; ?></div>
                
                <?php foreach($dataStore[$i] as $data){?>
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne-<?php echo $data->id?>"><?php echo $data->title;?></a>
                        </h4>
                    </div>
                    <div id="collapseOne-<?php echo $data->id?>" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <?php echo $data->description;?>
                        </div>
                    </div>
                </div>
                <?php } ?>
               
            <?php $i++; } ?>


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