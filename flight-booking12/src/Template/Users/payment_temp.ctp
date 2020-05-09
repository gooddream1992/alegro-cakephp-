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
<script src="<?php echo HTTP_ROOT ?>jqvalidations/dist/jquery.validate.js"></script>
<section class="textureOne">
 <div class="wrapper">
  <div class="event_description" style="float: left;">
   <h3><?php echo $eventDetail->name; ?></h3>
   <ul class="dateTime">
    <li><?php echo $this->Custom->eventDateDisplay($eventSechudle->date); ?></li>
    <li><?php echo $eventSechudle->start_time->format('H:i a'); ?> ~ <?php echo $eventSechudle->end_time->format('H:i a') ?></li>
   </ul>
   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
   <a href="<?php echo HTTP_ROOT . 'payment-success' ?> "><button type="button" class="payNow" name="paynow" value="paynow" style="margin-top: 0;">Payment Success</button><a/>
    <a href="<?php echo HTTP_ROOT . 'payment-cancel' ?>"><button style="float: right;margin-top: 0px;" type="button" class="payNow" name="paynow" value="paynow" style="margin-top: 0;">Payment Cancel</button></a>

  </div>
  <div class="clear"></div>
 </div>
</section>
<script>
 $(function () {
  $("#personalInfofrm").validate({
   ignore: [],
   onkeyup: function (element) {
    if (element.name == 'email') {
     return false;
    }
   },
   rules: {
    firstName: "required",
    lastName: "required",
    phoneNo: "required",
    emailAddress: "required",
    email: {
     required: true,
     email: true,
     check_email: true
    },
   },
   messages: {
    firstName: "Please enter your first name",
    lastName: "Please enter your last name",
    phoneNo: "Enter your mobile number",
    emailAddress: "Please enter your email address",
   }
  });

  $('#phoneNo').keypress(function (event) {
   var keycode = event.which;//var x=event.keyCode;
   if (!(event.shiftKey == false && (keycode == 46 || keycode == 8 || keycode == 37 || keycode == 39 || keycode == 43 || (keycode >= 48 && keycode <= 57)))) {
    event.preventDefault();//stops the default action of an element from happening.
   }
  });

 });
</script>