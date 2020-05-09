<style>
    footer {
        background-color: #404156;
        position: relative;
        width: 100%;
        float: left;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
    $(window).load(function() {
        $(".se-pre-con").fadeOut(50);
    });

    window.onload = function() {
        document.onkeydown = function(e) {
            return (e.which || e.keyCode) != 116;
        };
    }
</script>
<?php
$guest = $_GET['adult'] + @$_GET['children'];
$getBetDetails = $this->User->propertyBedCount($pro_id, $guest);
?>
<div class="se-pre-con">
    <div class="top-end">
        <?php echo $this->element('frontend/login-header'); ?>
        <div class="img-load-ing">
            <img style="border-radius: 104px; width: 170px; height: 170px; margin-bottom: 40px;" src="<?= HTTP_ROOT; ?>img/pro_pic/<?= $this->User->getHotelImage($propertyD->id); ?>" alt="">
            <center>
                <span style=" font-size: 2em; color:#000;">
                    <?php echo __('Please wait, while we finalize your order and send your details to'); ?> <b><?= $propertyD->description->propertyName; ?></b></span>
            </center>
        </div>
    </div>
    <div class="se-pre-img"></div>
    <div class="top-last" style="color: #000;text-align:center; font-weight:bold;">
        <span style="font-size: 2rem; color:#000;">
            <?= __(date("D", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>,
            <?= __(date("d", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>
            <?= __(date("M", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))); ?>
            -
            <?= __(date("D", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>,
            <?= __(date("d", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>
            <?= __(date("M", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))); ?>
        </span>
        <br>
        <br>
        <span style="font-size: 20px; color:#000;">
            <?php echo __(@$_GET['rooms']); ?> <?php if ($_GET['rooms'] <= 1) { ?> <?php echo __('Room') ?> <?php } else { ?> <?php echo __('Rooms') ?> <?php } ?> - <?= __(@$_GET['adult'] + @$_GET['children']); ?> <?php if ($_GET['adult'] + @$_GET['children'] == 1) { ?> <?php echo __('Guest') ?> <?php } else { ?><?php echo __('Guests') ?><?php } ?></span>

    </div>
</div>

<style>
    .no-result{ padding-top: 15px;}
    .no-result {
        width: 100% !important;
    }
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
    #slider-handles {
        margin-top: 10px !important;
    }
    #ulli    {
        display:flex;
        list-style:none;
        padding-left: 0 !important;
    }
    #sndli{
        padding-left:170px;
    }
    .no-result{ float: left; width: 100%; text-align: center;}
    .no-found-logo {
        display: inline-block;
        border-radius: 100%;
    }
    .no-found-logo img {
        width: 160px;
        margin-top: 26px;
    }
    .no-result{ width: 74%;}
    .no-result h2{
        margin: 26px 0 15px;
        color: black;
        font-size: 21px;
    }
    .no-result p{
        font-weight: 300;
        font-size: 15px;
        color: #a8a8bc;
    }
    .no-result a{
        display: inline-block;
        background: #f9d749;
        padding: 15px 50px;
        font-size: 17px;
        color: #000;
        border-radius: 4px;
        margin: 10px 0 26px;
    }
    .no-result a:hover{
        background: #e0b500;
        text-decoration: none;
    }
    li.active{
        background-color:#f9d749;
    }
    .page-link {
        position: relative !important;
        padding: .5rem .75rem !important;
        margin-left: -1px !important;
        border-radius: 4px !important;
        line-height: 1.25 !important;
        color: #000 !important;
        background-color: #fff !important;
        border: 1px solid #eeeeee !important;
    }
    .page-link:hover {
        z-index: 2 !important;
        text-decoration: none !important;
        background-color: #e9ecef !important;
        border-color: #dee2e6 !important;
    }
    .pagination li.active {
        background-color: #f9d749 !important;
        border: 1px solid #f9d749 !important;
    }


    .close-g ul {
        background-color: #FFF;
    }
    .close-g ul li:hover {
        background: #fff9e1;
    }
    #hotel_loc_display {
        float: left;
        width: 98%;
        z-index: 1111;
        max-height: 180px;
        overflow-y: inherit;
        position: absolute;
    }
    #hotel_loc_display ul {
        padding-left: 0;
        width: 100%;
        float: left;
        max-height: 149px;
        overflow: auto;
        margin-bottom: 0;
    }
    #hotel_loc_display  ul li {
        width: 100% !important;
        float: left;
        text-align: left;
        display: inline-block;
        padding: 5px 8px;
        font-size: 13px;
        letter-spacing: 1px;
    }
    .hideClose {
        background: #efefef;
        z-index: 11;
        bottom: 0;
        padding: 7px 13px;
        text-align: right;
        border-top: 1px solid #ccc;
        float: left;
        width: 100%;
        box-shadow: none;
    }
    .hideClose a {
        display: inline-block;
        border: 1px solid #f8d748;
        padding: 3px 12px;
        border-radius: 3px;
        text-decoration: none;
        background: #f8d748;
        color:#000;
    }
    .hideClose a:hover{ color:#000; border: 1px solid #f8d748;}
    .search-display, .search-display2{
        float: left;
        width: 100%;

    }



    a.morelink {
        text-decoration:none;
        outline: none;
    }
    .morecontent span {
        display: none;
    }


</style>


<link rel="stylesheet" href="<?= HTTP_ROOT . 'htls/hotel-listing.css'; ?>">
<div hidden>
    <img src="<?= HTTP_ROOT; ?>img/luxurious-hotel-room.jpg">
</div>
<?php echo $this->element('frontend/login-header'); ?>
<section id="cta-faq" data-slides='["<?= HTTP_ROOT; ?>img/luxurious-hotel-room.jpg"]'>

    <div class="bg-overlay"></div>

    <div class="container">

    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="main-cta-faq text-center">
                    <h1><?= __("Thank you for your order."); ?></h1>
                    <h3><?= __("Order ID:"); ?> #<?= $htl_booking_details->booking_no; ?></h3>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-md-1 text-center">
                <a href="#search-results-body" class="flight-click-faq hvr-sink"><img src="<?= HTTP_ROOT; ?>img/flight_continue.png" /></a>
            </div>
        </div>

    </div>

</section>




<section id="search-results-body">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="pp-contentnonscrol" style="padding-top: 77px;margin-bottom: -69px;">
                    <p><?= __('Your order has been successfully booked! Your itinerary and invoice files have been sent to your email address. You must make the payment upon check-in at the property.'); ?><br/><br/><?= __('Please check if there is an email in the inbox, spam or trash of your email address'); ?> "<b><?= __('Approved Order'); ?></b>".<br/><br/> <?= __('Thank you in advance for your choice and we wish you a wonderful stay.'); ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Results -->
            <div class="col-sm-12 col-md-8 col-lg-12">

                <div class="hotel-lsting" style="margin: 82px 0px;">
                    <div class="hotel-lsting-left" style="float: left;width: 233px;height: 207px;padding: 7px 6px;margin-top: 7px;margin-bottom: 0px;overflow: hidden;">

                        <img src="<?= HTTP_ROOT; ?>img/pro_pic/<?= $this->User->getHotelImage($propertyD->id); ?>" alt="img" style="width: 100%;">
                    </div>
                    <div class="hotel-lsting-middle">
                        <h3><?= $propertyD->description->propertyName; ?>

                            <?php for ($ty = 1; $ty <= $propertyD->description->rating; $ty++) { ?>
                                <i class="fa fa-star rating"></i>
                            <?php } ?>
                            <i class="fa fa-thumbs-up"></i>
                        </h3>

                        <p style="margin-top: 9px;margin-bottom: -26px !important;"><i class="fas fa-ruler"></i> <?= $propertyD->property_size; ?> <?php echo __('Sqm'); ?></p>


                        <p style="margin-bottom: 0 !important;"> <i class="fas fa-users"></i>  <?php
                            echo $this->User->propertyPeople($room_id, $guest);
                            if ($this->User->propertyPeople($room_id, $guest) <= 1) {
                                ?>
                                <?php echo __('Guest') ?> <?php } else { ?> <?php echo __('Guests') ?> <?php } ?>
                            <br>

                            <i class="fas fa-map-marker"></i>
                            <?php echo $this->User->stateName($room_id, $guest) . ',' . ' ' . $this->User->cityName($room_id, $guest); ?>
                            <br>
							
							<i class="fas fa-check-square"></i> 
                            <?php
                            $aminity = $this->User->propertyEntireAmenities($room_id);
                            $aminityx = [];
                            $geta = json_decode($aminity->Top);

                            $i = 1;
                            foreach ($geta as $daee) {
                                $aminityx[] = __($daee);
                                if ($i++ == 2)
                                    break;
                            }
                            echo implode(', ', $aminityx);
                            ?>
                        </p>
                    </div>
                    <div class="hotel-lsting-right">
                        <h6><?php echo $this->User->reviewCount($room_id); ?> <?= __("reviews"); ?><span><?php echo is_nan($this->User->totalRating($room_id)) ? 0 : $this->User->totalRating($room_id); ?>/5</span></h6>
                        <h5 style="margin: 63px 0px -9px 0px;">AOA <?php echo changeFormat(number_format($htl_booking_details->total_cost, 2)); //echo number_format($propertyD->pricing->one, 2);                ?></h5>
                        <div class="form-group" style="margin: 16px 9px 0px 0px;">
                            <label>&nbsp;</label>
                            <button type="button" id="submit" class="btn btn-primary hvr-grow btn-fill" style="margin: 16px 0px 10px 0px;line-height: 17px;"><?php echo __('Approved Order Button') ?></button>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Results -->
        </div>
    </div>
</section>
<?php
echo $this->element('frontend/inner-footer');

function changeFormat($pri) {
    $dat = explode('.', $pri);
    $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
    return $f;
}
?>

