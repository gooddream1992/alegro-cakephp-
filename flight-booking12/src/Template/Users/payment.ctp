<style>
 .inquiryForm{color:#fff;}
 .inquiryForm h3{font-size: 17px;margin-bottom: 10px;text-align: left;line-height: normal;}
 .inquiryForm ul li{margin-bottom:5px;font-size: 15px;color: #999;;display:table-row;}
 .inquiryForm ul li span{margin-bottom:5px;font-size: 14px;color: #ff464e; display:table-cell;padding-left: 20px;}

</style>
<link rel="stylesheet" href="<?= HTTP_ROOT; ?>payment/css/style.css">
<script type="text/javascript" src="<?= HTTP_ROOT; ?>payment/js/jquery.min.js"></script>
<script type="text/javascript" src="<?= HTTP_ROOT; ?>payment/js/jquery.creditCardValidator.js"></script>
<script type="text/javascript">
 function cardFormValidate(){
  var cardValid=0;
  //Card validation

  $('#card_number').validateCreditCard(function(result){
   var cardType=(result.card_type==null)?'':result.card_type.name;

   if(cardType=='Visa'){
    var backPosition=result.valid?'2px -163px, 260px -87px':'2px -163px, 260px -61px';
   }else if(cardType=='MasterCard'){
    var backPosition=result.valid?'2px -247px, 260px -87px':'2px -247px, 260px -61px';
   }else if(cardType=='Maestro'){
    var backPosition=result.valid?'2px -289px, 260px -87px':'2px -289px, 260px -61px';
   }else if(cardType=='Discover'){
    var backPosition=result.valid?'2px -331px, 260px -87px':'2px -331px, 260px -61px';
   }else if(cardType=='Amex'){
    var backPosition=result.valid?'2px -121px, 260px -87px':'2px -121px, 260px -61px';
   }else{
    var backPosition=result.valid?'2px -121px, 260px -87px':'2px -121px, 260px -61px';
   }
   $('#card_number').css("background-position",backPosition);
   if(result.valid){

    $("#card_type").val(cardType);
    $("#card_number").removeClass('required');
    cardValid=1;
   }else{
    $("#card_type").val('');
    $("#card_number").addClass('required');
    cardValid=0;
   }
  });

  //Form validation
  var cardName=$("#name_on_card").val();
  var expMonth=$("#expiry_month").val();
  var expYear=$("#expiry_year").val();
  var cvv=$("#cvv").val();
  var regName=/^[a-z ,.'-]+$/i;
  var regMonth=/^01|02|03|04|05|06|07|08|09|10|11|12$/;
  var regYear=/^2016|2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
  var regCVV=/^[0-9]{3,3}$/;
  if(cardValid==0){
   $("#card_number").addClass('required');
   $("#card_number").focus();
   return false;
  }else if(!regMonth.test(expMonth)){
   $("#card_number").removeClass('required');
   $("#expiry_month").addClass('required');
   $("#expiry_month").focus();
   return false;
  }else if(!regYear.test(expYear)){
   $("#card_number").removeClass('required');
   $("#expiry_month").removeClass('required');
   $("#expiry_year").addClass('required');
   $("#expiry_year").focus();
   return false;
  }else if(!regCVV.test(cvv)){
   $("#card_number").removeClass('required');
   $("#expiry_month").removeClass('required');
   $("#expiry_year").removeClass('required');
   $("#cvv").addClass('required');
   $("#cvv").focus();
   return false;
  }else if(!regName.test(cardName)){
   $("#card_number").removeClass('required');
   $("#expiry_month").removeClass('required');
   $("#expiry_year").removeClass('required');
   $("#cvv").removeClass('required');
   $("#name_on_card").addClass('required');
   $("#name_on_card").focus();
   return false;
  }else{
   $("#card_number").removeClass('required');
   $("#expiry_month").removeClass('required');
   $("#expiry_year").removeClass('required');
   $("#cvv").removeClass('required');
   $("#name_on_card").removeClass('required');
   $('#cardSubmitBtn').prop('disabled',false);
   return true;
  }
 }

 $(document).ready(function(){
  //Demo card numbers
  $('.card-payment .numbers li').wrapInner('<a href="javascript:void(0);"></a>').click(function(e){
   e.preventDefault();
   $('.card-payment .numbers').slideUp(100);
   cardFormValidate()
   return $('#card_number').val($(this).text()).trigger('input');
  });
  $('body').click(function(){
   return $('.card-payment .numbers').slideUp(100);
  });
  $('#sample-numbers-trigger').click(function(e){
   e.preventDefault();
   e.stopPropagation();
   return $('.card-payment .numbers').slideDown(100);
  });

  //Card form validation on input fields
  $('#paymentForm input[type=text]').on('keyup',function(){
   cardFormValidate();
  });

  //Submit card form
  $("#cardSubmitBtn").on('click',function(){
   if(cardFormValidate()){
    var formData=$('#paymentForm').serialize();
    var URL='<?= HTTP_ROOT; ?>';
    $("#loader").show();
    $("#cardSubmitBtn").attr("disabled",true);
    $.ajax({
     type:'POST',
     url:URL+'users/payment_process',
     dataType:"json",
     data:formData,
     beforeSend:function(){
      $("#cardSubmitBtn").val('Processing....');
     },
     success:function(data){
      if(data.status==1){
       $("#loader").hide();
       $("#cardSubmitBtn").attr("disabled",true);
       $('#paymentSection').slideUp('slow');
       // $('#orderInfo').slideDown('slow');
       $('#msg').html('<p>You have payment successfully.You will redirecting  page automatically after 5 seconds.Your transaction id is <span>#'+data.orderID+'</span></p>');
       window.setTimeout(function(){
        window.location.href='<?= HTTP_ROOT; ?>/payment-success';
       },5000);
      }else{
       var reloadUrl=URL+'payment/';
       $('#paymentSection').slideUp('slow');
       $('#orderInfo').slideDown('slow');
       $('#orderInfo').html('<p>Wrong card details given, <a href='+reloadUrl+'>please try again.</a></p>');
      }
     }
    });
   }
  });
 });
</script>
<section class="textureOne">
 <div class="wrapper">
  <div class="event_description" style="width: 100%;">
   <h3><?php echo $eventDetail->name; ?></h3>
   <ul class="dateTime">
    <li><?php echo $this->Custom->eventDateDisplay($eventSechudle->date); ?></li>
   </ul>

   <div class="inquiryForm" style="width: 50%; float: left;">
    <h3>Personal Info</h3>
    <ul class="personalInfo">
     <li>First Name:<span><?php echo @$bookingDetails->first_name; ?></span></li>
     <li>Last Name:<span><?php echo @$bookingDetails->last_name; ?></span></li>
     <li>Phone No:<span><?php echo @$bookingDetails->phone; ?></span></li>
     <li>Email:<span><?php echo @$bookingDetails->email; ?></span></li>
    </ul>
    <h3>Tickets Selected</h3>
    <table width="95%" class="ticketDetails">
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
   </div>
   <div  style="width: 50%;float: right">
    <div class="card-payment">
     <?php echo $this->Form->create(null, array('class' => 'register-form', 'id' => 'paymentForm')) ?>
     <div id="paymentSection">
      <ul>
       <input type="hidden" name="payableAmount" id="payableAmount" value="<?php echo $totalPrice; ?>"/>
       <input type="hidden" name="bookingId" id="bookingId" value="<?php echo $bookingDetails->id; ?>"/>
       <input type="hidden" name="card_type" id="card_type" value=""/>
       <li>
        <label for="card_number">Card number (<a href="javascript:void(0);" id="sample-numbers-trigger">try one of these</a>)</label>
        <div class="numbers" style="display: none;">
         <p>Try some of these numbers:</p>

         <ul class="list">
          <li><a href="javascript:void(0);">4000 0000 0000 0002</a></li>
          <li><a href="javascript:void(0);">5018 0000 0009</a></li>
          <li><a href="javascript:void(0);">5100 0000 0000 0008</a></li>
          <li><a href="javascript:void(0);">6011 0000 0000 0004</a></li>
         </ul>
        </div>
        <input type="text" placeholder="1234 5678 9012 3456" id="card_number" name="card_number" class="">
        <small class="help">This demo supports Visa, American Express, Maestro, MasterCard and Discover.</small>
       </li>
       <div id="loader" style=" margin-left: 45px;position: absolute;display: none;top: 120px;"><img src="<?= HTTP_ROOT; ?>images/payment-loader.gif" /></div>
       <li class="vertical">
        <ul>
         <li>
          <label for="expiry_month">Expiry month</label>
          <input type="text" placeholder="MM" maxlength="5" id="expiry_month" name="expiry_month">
         </li>
         <li>
          <label for="expiry_year">Expiry year</label>
          <input type="text" placeholder="YYYY" maxlength="5" id="expiry_year" name="expiry_year">
         </li>
         <li>
          <label for="cvv">CVV</label>
          <input type="text" placeholder="123" maxlength="3" id="cvv" name="cvv">
         </li>
        </ul>
       </li>
       <li>
        <label for="name_on_card">Name on card</label>
        <input type="text" placeholder="Name on card" id="name_on_card" name="name_on_card">
       </li>
       <li><input type="button" name="card_submit" id="cardSubmitBtn" value="Proceed" class="payment-btn" disabled="true" ></li>
       <p style="color:#EA0075;">Note that: This demo will working with PayPal sandbox accounts.</p>
      </ul>

     </div>
     <?php echo $this->Form->end(); ?>
     <div id="orderInfo" style="display: none;"></div>
    </div>
   </div>
<!--   <a href="<?php echo HTTP_ROOT . 'payment-success' ?> "><button type="button" class="payNow" name="paynow" value="paynow" style="margin-top: 0;">Payment Success</button><a/>
    <a href="<?php echo HTTP_ROOT . 'payment-cancel' ?>"><button style="float: right;margin-top: 0px;" type="button" class="payNow" name="paynow" value="paynow" style="margin-top: 0;">Payment Cancel</button></a>-->

  </div>
  <div class="clear"></div>
 </div>
</section>


