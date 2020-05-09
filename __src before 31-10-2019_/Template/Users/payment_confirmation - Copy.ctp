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
 .personalInfo {
  color: #FFF;
  display: table;
 }
 .personalInfo li {
  display: table-row;
  color: #999;
 }
 .personalInfo li span {
  padding: 5px 0;
  padding-left: 50px;
  font-weight: 300;
  display: table-cell;
  color:#ff464e;
 }
</style>
<script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery.validate.js"></script>


<section class="breadcrumbMenu">
 <div class="wrapper">
  <ul>
   <li><a href="<?php echo HTTP_ROOT ?>">Home</a></li>
   <li><a href="<?php echo HTTP_ROOT . 'events' ?>">Events</a></li>
   <li class="active"><?php echo $eventDetail->name; ?></li>
  </ul>
 </div>
</section>
<section class="textureOne">
 <div class="wrapper">
  <div class="event_gallery">
   <img title="<?php echo $eventDetail->name; ?>" src="<?php echo HTTP_ROOT . COVER_PHOTO . $eventDetail->image ?>" alt="<?php echo $eventDetail->name; ?>" />
  </div>
  <div class="event_description">
   <h3><?php echo $eventDetail->name; ?></h3>
   <ul class="dateTime">
    <li><?php echo $this->Custom->eventDateDisplay($eventSechudle->date); ?></li>

   </ul>
   <h3>Personal Info</h3>



   <div class="inquiryForm" style="width: 100%; margin: 10px 0;">
    <?php // echo $this->Form->create('paymentForm', ['url' => 'https://tjccpg.jccsecure.com/EcomPayment/DirectAuthLink', 'data-toggle' => "validator", 'novalidate' => "true", 'id' => 'paymentForm']); ?>
    <form method="post" name="paymentForm" id="paymentForm" action="https://tjccpg.jccsecure.com/EcomPayment/RedirectAuthLink">
     <ul class="personalInfo">
      <li>First Name:<span><?php echo @$bookingDetails->first_name; ?></span></li>
      <li>Last Name:<span><?php echo @$bookingDetails->last_name; ?></span></li>
      <li>Phone No:<span><?php echo @$bookingDetails->phone; ?></span></li>
      <li>Email:<span><?php echo @$bookingDetails->email; ?></span></li>
     </ul>
   </div>
   <h3>Tickets Selected</h3>
   <table width="100%" class="ticketDetails">
    <thead>

     <tr>
      <td>Ticket Category</td>
      <td>No. of Tickets</td>
      <td>Amt.</td>
     </tr>
    </thead>
    <?php

      $totalQty = 0;
      $totalPrice = 0;
      foreach ($ticketDetails as $tktDetails) {
       $totalQty+=$tktDetails->qty;
       $totalPrice+=$tktDetails->total;

       ?>
       <tr>
        <td><?php echo $tktDetails->event_ticket->ticket_type; ?> <span>(&euro;<?php echo number_format((float) $tktDetails->price, 2, '.', ''); ?>)</span></td>
        <td><?php echo $tktDetails->qty; ?></td>
        <td>&euro;<?php echo number_format((float) $tktDetails->total, 2, '.', ''); ?></td>
       </tr>
      <?php } ?>
    <tr>
     <td>TOTAL</td>
     <td><?php echo $totalQty; ?> <span>tickets</span></td>
     <td>&euro;<?php echo number_format((float) $totalPrice, 2, '.', ''); ?> <span>Amt. payble</span></td>
    </tr>
   </table>

   <?php

     if ($jccPayment->mode == 1) {
      $password = $jccPayment->password;
     } else if ($jccPayment->mode == 0) {
      $password = $jccPayment->test_password;
     }
     $purchaseAmt = $totalPrice;
     $purchaseAmt = str_pad($totalPrice, 13, "0", STR_PAD_LEFT);
     $formattedPurchaseAmt = substr($purchaseAmt, 0, 10) . substr($purchaseAmt, 11);
     $orderID = $bookingDetails->id;
     $toEncrypt = $password . $jccPayment->merchant_id . $jccPayment->acquirer_id . $orderID . $formattedPurchaseAmt . CURRENCY;
     $sha1Signature = sha1($toEncrypt);
     $base64Sha1Signature = base64_encode(pack("H*", $sha1Signature));
     $signatureMethod = SIGNATURE_METHOD;

   ?>
   <input type = "hidden" name="Version" value="<?php echo JCC_VERSION ?>" />
   <input type = "hidden" name = "MerID" value="<?php echo $jccPayment->merchant_id; ?>"/>
   <input type = "hidden" name ="AcqID" value = "<?php echo $jccPayment->acquirer_id; ?>"/>
   <input type = "hidden" name = "MerRespURL" value = "<?php echo RESPONSE_URL ?>"/>
   <input type = "hidden" name = "PurchaseAmt" value = "<?php echo $formattedPurchaseAmt ?>"/>
   <input type = "hidden" name ="PurchaseCurrency" value = "<?php echo CURRENCY ?>"/>
   <input type = "hidden" name  ="PurchaseCurrencyExponent" value="<?php echo CURRENCY_EXP ?>" />
   <input type = "hidden" name = "OrderID" value = "<?php echo $orderID ?>" />
   <input type = "hidden" name = "CaptureFlag" value ="<?php echo CAPTURE_FLAG ?>"/>
   <input type = "hidden" name = "Signature" value ="<?php echo $base64Sha1Signature ?>"/>
   <input type = "hidden" name = "SignatureMethod" value ="<?php echo $signatureMethod ?>" />

   <a href="<?php echo HTTP_ROOT . 'personal-info' ?>">
    <button style="float: left;margin-top: 0px;" type="button" class="backBtn" name="paynow" value="paynow" style="margin-top: 0;">Back</button>
   </a>
   <button type="submit" class="payNow" style="float: right; margin-top: 0px;"name="paynow" value="paynow">Pay Now</button>
   <?php echo $this->Form->end(); ?>
  </div>
  <div class="clear"></div>
 </div>
</section>
<script language="JavaScript">
//document.forms["paymentForm"].submit();
</script>
