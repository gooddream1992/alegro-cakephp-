<style>
    .no-js #loader { display: none;  }
    .js #loader { display: block; position: absolute; left: 100px; top: 0; }
    .se-pre-con {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: #fff;
        /*	//background: url(<?= $this->Url->image('icon/icon_4.png'); ?>) center no-repeat #fff;*/
    }
    .se-pre-img{
        width: 100%;
        height: 10%;
        z-index: 9999;
        background: url(<?= $this->Url->image('flight-loader.gif'); ?>) center no-repeat #fff;
        float: left;
    }

    .top-end, .top-last{
        width: 100%;
        height: 45%;
        z-index: 9999;  
        background-color:#fff;
        text-align: center;
    }
    .img-load-ing{ float: left; width: 100%; padding-top: 6%;}
</style>
<div class="se-pre-con" style="display: none"> 
    <div class="top-end">
        <?php echo $this->element('frontend/login-header'); ?>
        <div class="img-load-ing">
            <img style="margin-bottom: 40px;" src="<?= $this->Url->image('no-result-logo.png'); ?>" alt="" width="170">
            <center>
                <span style=" font-size: 2em;">
                    <?php echo __('Searching for flights from') ?> 
                    <!-- <b><?php // $this->User->cityHelper($_GET['origin'])->city; ?></b> (<?php // $_GET['origin']; ?>) <?php //echo __('to') ?> <b><?php // $this->User->cityHelper($_GET['destination'])->city; ?></b> (<?php // $_GET['destination'] ?>) -->
                </span>
            </center>
        </div> 
    </div> 
    <div class="se-pre-img"></div> 
    <div class="top-last" style="color: #7b7b7b;text-align:  center; font-weight: bold;">
<!--        <span style="font-size: 2rem;"><?php // date("D, d M", strtotime(str_replace('/', '-', $_GET['departure_date']))); ?> <?php // if ($_GET['radio'] != "One-Way Flight") { ?>- <?php // date("D, d M", strtotime(str_replace('/', '-', $_GET['return_date']))); ?> <?php //} ?></span>-->
        <br>      
        <span style="font-size: 20px;"><?php // $_GET['passenger'];   ?></span>

    </div>

</div>
<?= $this->element('frontend/banner'); ?>
<section id="cta" data-slides='["<?php echo HTTP_ROOT ?>img/cta_bg1.jpg", "<?php echo HTTP_ROOT ?>img/cta_bg2.jpg", "<?php echo HTTP_ROOT ?>img/cta_bg3.jpg"]'>
    <div class="bg-overlay"></div>

    <?php echo $this->element('frontend/header'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="main-cta text-center">
                    <h1><?php echo __('Search For Cheap Flights'); ?></h1>
                    <h3><?php echo __('THE BEST WAY TO BUY CHEAP AIR TICKETS'); ?></h3>
                </div>
            </div>
        </div>
        <?php echo $this->element('frontend/search'); ?>



        <div class="row justify-content-center">
            <div class="col-md-1 text-center">
                <a href="#why-book-with-us" class="flight-click hvr-sink">
                    <img src="<?php echo HTTP_ROOT ?>img/flight_continue.png" />
                </a>
            </div>
        </div>

    </div>

</section>
<?= $this->element('frontend/why-book-with-us'); ?>
<?= $this->element('frontend/testimonials'); ?>
<?= $this->element('frontend/destination-carousel'); ?>
<?= $this->element('frontend/newsletter'); ?>
<?= $this->element('frontend/footer'); ?>