<style>
 .error{
  font-size: 14px !important;
  font-weight: 300;
  color:#ff464e;
 }
 .inquiryForm div{
  margin-bottom: 25px;
  width: 48.66%;
  float: left;
 }
 .inquiryForm div:nth-child(odd){
  float: right;
 }
 .inquiryForm div input{
  width: 100% !important;
  margin-bottom: 0 !important;
 }
</style>

<section class="breadcrumbMenu">
 <div class="wrapper">
  <ul>
   <li><a href="<?php echo HTTP_ROOT ?>">Home</a></li>
   <li><a href="javascript:void(0)">Payment failed</a></li>

  </ul>
 </div>
</section>
<section class="textureOne">
 <div class="wrapper">
  <div class="event_gallery">
   <img src="<?php echo HTTP_ROOT . COVER_PHOTO . $eventDetail->image ?>" alt="<?php echo $eventDetail->name; ?>" />
  </div>
  <div class="event_description">
   <h3><?php echo $eventDetail->name; ?></h3>
   <ul class="dateTime">
    <li><?php echo $this->Custom->eventDateDisplay($eventSechudle->date); ?></li>
    <li><?php echo $eventSechudle->start_time->format('H:i a'); ?> ~ <?php echo $eventSechudle->end_time->format('H:i a') ?></li>
   </ul>
   <h3>Payment Info</h3>
   <div class="inquiryForm" style="width: 100%; margin: 10px 0;">
    <p>Oops, Something went wrong! payment unsuccessful! Please <a href='<?php echo HTTP_ROOT . 'payment-confirmation' ?>' class=''>try again</a> or contact us</p>
    <p>Your ticket no is: <b><?php echo $bookingDetails->unique_id; ?></b></p>
   </div>
  </div>
  <div class="clear"></div>
 </div>
</section>
