<?php if ($eventTicketsCount != 0) { ?>
   <?php echo $this->Form->create($user, ['url' => ['action' => 'personalInfo']]); ?>
   <input type="hidden"  name='event_id' id="event_id"  value="<?php echo $eventId; ?>">
   <input type="hidden"  name='sechudle_id' id="sechudel_id"  value="<?php echo $sechudelId ?>">

   <div class="day-event">
    <h3>Choose Ticket</h3>
    <?php

    $tktCount = 1;
    foreach ($eventTickets as $tickets) {

     ?>
     <div class="ticketType" data-content="Seats Available <?php echo $noOfTicket[$tickets->id]; ?>">
      <input type="hidden"  name='price[]' id="price-<?php echo $tktCount ?>"  value="<?php echo $tickets->price; ?>">

      <span data-content="&euro;<?php echo $tickets->price; ?>"><?php echo $tickets->ticket_type; ?></span>
      <div class="quantity">
       <input type="number" name='quantity[<?PHP ECHO $tickets->id ?>]' onblur="checkTicket(<?php echo $noOfTicket[$tickets->id]; ?>,<?php echo $tktCount; ?>)" data-ticket="<?php echo $noOfTicket[$tickets->id] ?>" data-id="<?php echo $tktCount; ?>" id="quantity<?php echo $tktCount ?>" min="0" step="1" value="0">
      </div>
     </div>
     <?php

     $tktCount++;
    }

    ?>
    <input type="hidden"  id="totalCount"  value="<?php echo $tktCount; ?>">
    <input type="hidden"  id="totalPriceInput"  name="totalPrice" value="">
    <div class="clear"></div>

    <h3>Total No. of Tickets :</h3>
    <div class="total">
     <label id="totalQuenty">0</label>
     <span >&euro;<b id="totalPrice">0.00</b></span>
     <div class="clear"></div>
    </div>
    <button type="submit" class="payNow" >PAY NOW</button>
   </div>
   <?php echo $this->Form->end(); ?>

  <?php } else { ?>
   <div class="day-event">
    <h3 style="text-align: center;">Free entry</h3>
   </div>
  <?php } ?>
<script>
 jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
 jQuery('.quantity').each(function(){
  var spinner=jQuery(this),
          input=spinner.find('input[type="number"]'),
          btnUp=spinner.find('.quantity-up'),
          btnDown=spinner.find('.quantity-down'),
          min=input.attr('min'),
          max=input.attr('max'),
          id=input.attr('data-id'),
          ticket=input.attr('data-ticket');
  btnUp.click(function(){
   var oldValue=parseFloat(input.val());
   if(oldValue>=max){
    var newVal=oldValue;
   }else{
    var newVal=oldValue+1;
   }
   if(newVal<=ticket){
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
    ticketCalcute();
   }else{
    $('#error_msg_date').html('<div class="message error" id="e" onclick="this.classList.add(\'hidden\');">Sorry! No more tickets available</div>');
    ticketCalcute();
   }


  });
  btnDown.click(function(){
   var oldValue=parseFloat(input.val());
   if(oldValue<=min){
    var newVal=oldValue;
   }else{
    var newVal=oldValue-1;
   }

   spinner.find("input").val(newVal);
   spinner.find("input").trigger("change");
   ticketCalcute();
  });
 });
 function ticketCalcute(){
  var grandTotalPrice=0;
  var grandTotalQuenty=0;
  var totalCount=$('#totalCount').val();
  var pageUrl=$('#pageurl').val();
  for(var i=1;i<totalCount;i++){
   if(i){
    var id='';
    var quantity='';
    var price='';
    var total='';
    quantity=$('#quantity'+i).val();
    price=$('#price-'+i).val();

    total=parseFloat(quantity)*parseFloat(price);

   }


   grandTotalQuenty+=parseFloat(quantity);
   grandTotalPrice+=parseFloat(total.toFixed(2));
  }

  $('#totalQuenty').html(grandTotalQuenty);
  $('#totalPrice').html(grandTotalPrice.toFixed(2));
  $('#totalPriceInput').val(grandTotalPrice.toFixed(2));
 }
 function checkTicket(ticket,value){
  var qty=$('#quantity'+value).val();
  if(qty<=ticket){
   ticketCalcute();
  }else{

   $('#error_msg_date').html('<div class="message error" id="e" onclick="this.classList.add(\'hidden\');">Sorry! No more tickets available</div>');
   $('#quantity'+value).val(ticket);
   ticketCalcute();

  }
 }








</script>