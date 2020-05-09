<link type="text/css" rel="stylesheet" href="<?php echo HTTP_ROOT . 'css/frontend' ?>/YouTubePopUp.css" />
<link type="text/css" rel="stylesheet" href="<?php echo HTTP_ROOT . 'css/frontend' ?>/calender-style.css"/>
<link type="text/css" rel="stylesheet" href="<?php echo HTTP_ROOT . 'css/frontend' ?>/magnific-popup.css"/>
<script type="text/javascript" language="javascript" src="<?php echo HTTP_ROOT . 'js/frontend' ?>/YouTubePopUp.jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo HTTP_ROOT . 'admin-assets/js' ?>/simplecalendar.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo HTTP_ROOT . 'js/frontend' ?>/jquery.magnific-popup.min.js"></script>
<script type="text/javascript">
 jQuery(function () {
  jQuery("a.autoplayOn").YouTubePopUp();
  jQuery("a.autoplayOff").YouTubePopUp({autoplay: 0}); // Disable autoplay
 });
</script>
<style>
 div.message {right: auto; left: 50%; transform: translateX(-50%); -moz-transform: translateX(-50%); -webkit-transform: translateX(-50%);}
</style>
<section class="breadcrumbMenu">
 <div class="wrapper">
  <ul>
   <li><a href="<?php echo HTTP_ROOT ?>">Home</a></li>
   <li><a href="<?php echo HTTP_ROOT . 'events' ?>">Events</a></li>
   <li class="active"><?php echo $eventDetail->name; ?></li>
  </ul>
 </div>
</section>
<?php echo $this->element('frontend/search'); ?>
<section class="textureOne">
 <div class="wrapper">
  <div id="error_msg_date"></div>
  <div class="event_gallery">
   <div class="event_pics">
    <div id="eventpicLarge">
     <img  title="Title of <?php echo $eventDetail->name; ?> "src="<?php echo HTTP_ROOT . COVER_PHOTO . $eventDetail->image ?>" alt="<?php echo $eventDetail->name; ?>" />
    </div>
    <a href="javascript:void(0)" rel="<?php echo HTTP_ROOT . COVER_PHOTO . $eventDetail->image; ?>" class="eventThumbs">
     <img  title=" Title of <?php echo $eventDetail->name; ?>" alt="<?php echo $eventDetail->name; ?>"  src="<?php echo HTTP_ROOT . COVER_PHOTO . $eventDetail->image; ?>" />
    </a>
    <?php foreach ($eventDetail->photos as $photo) { ?>
       <a href="javascript:void(0)" rel="<?php echo HTTP_ROOT . PHOTO . $photo->file_name; ?>" class="eventThumbs"><img alt="<?php echo $eventDetail->name; ?>" title="Title of <?php echo $photo->file_name ?>" src="<?php echo HTTP_ROOT . PHOTO . $photo->file_name; ?>" title="<?php echo $photo->file_name; ?>" /></a>
      <?php } ?>

    <script type="text/javascript">
     $(function () {
      $(".eventThumbs").click(function () {
       var image = $(this).attr("rel");
       $('#eventpicLarge').hide();
       $('#eventpicLarge').fadeIn('slow');
       $('#eventpicLarge').html('<img src="' + image + '"/>');
       return false;
      });
     });
    </script>
    <div class="clear"></div>
    <ul class="mobViews">
     <li><a href="#eventTickets">Buy Ticket</a></li>
     <li><a href="#thumbnails">Photos & Videos</a></li>
    </ul>
   </div>

   <div class="video_gallery" id="desktopViews">
    <ul>
     <?php foreach ($eventDetail->videos as $video) { ?>
        <li><a  title="Title of <?php echo $eventDetail->name; ?>" class="autoplayOn" href="<?php echo $video->link ?>"><img src="https://img.youtube.com/vi/<?php echo $this->Custom->getYoutubeId($video->link) ?>/0.jpg" /></a></li>
       <?php } ?>
    </ul>

   </div>
  </div>
  <div class="event_description">
   <h3><?php echo $eventDetail->name; ?></h3>
   <ul class="dateTime">
    <?php

      $i = 1;
      foreach ($eventDetail->event_schedules as $schedule) {
       if ($i == 1) {

        ?>
        <input type="hidden" value="<?php echo $schedule->id; ?>" id="event-schedule-id">
        <li><?php echo $this->Custom->eventDateDisplay($schedule->date); ?></li>
        <?php

       } $i++;
      }

    ?>
   </ul>
   <p><?php echo $eventDetail->description; ?></p>
   <div class="calendar hidden-print" id="eventTickets">
    <div class="calendarHead">
     <h2 class="month"></h2>
     <a class="btn-prev fontawesome-angle-left" href="javascript:void(0)"></a>
     <a class="btn-next fontawesome-angle-right" href="javascript:void(0)"></a>
    </div>
    <table>
     <thead class="event-days">
      <tr></tr>
     </thead>
     <tbody class="event-calendar">
      <tr class="1"></tr>
      <tr class="2"></tr>
      <tr class="3"></tr>
      <tr class="4"></tr>
      <tr class="5"></tr>
     </tbody>
    </table>
    <div class="list" style="text-align: left;">
     <ul class="dateTimelist"></ul>
    </div>
    <div id="tktDiv" class="list1"> </div>

   </div>
  </div>
  <div class="popup-gallery" id="thumbnails">
   <?php foreach ($eventDetail->photos as $photo) { ?>
      <a href="<?php echo HTTP_ROOT . PHOTO . $photo->file_name; ?>" ><img alt="Image <?php echo $photo->file_name; ?>" src="<?php echo HTTP_ROOT . PHOTO . $photo->file_name; ?>" /></a>
  <?php } ?>


  </div>
  <script type="text/javascript">
   $(document).ready(function () {
    $('.popup-gallery').magnificPopup({
     delegate: 'a',
     type: 'image',
     tLoading: 'Loading image #%curr%...',
     mainClass: 'mfp-img-mobile',
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
     },
     image: {
      tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
      //titleSrc: function(item) {
      //return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
      //}
     }
    });
   });
  </script>
  <div class="video_gallery" id="mobViews">
   <ul>
    <?php foreach ($eventDetail->videos as $video) { ?>
       <li><a class="autoplayOn" href="<?php echo $video->link ?>"><img src="https://img.youtube.com/vi/<?php echo $this->Custom->getYoutubeId($video->link) ?>/0.jpg" /></a></li>
  <?php } ?>

   </ul>
  </div>
  <div class="clear"></div>
 </div>
</section>
<input type="hidden" value="<?php echo $eventDetail->id; ?>" id="hidden_event_id"/>
<script>
 $(function () {
  $(document).on("click", "li.day-event", function () {
   var pageUrl = $('#pageurl').val();
   var event_id = $(this).attr("data-event_id");
   var event_schedule_id = $(this).attr("data-event_schedule_id");
   if (event_id && event_schedule_id) {
    $('.day-event').removeClass('selected');
    $.ajax({
     url: pageUrl + 'users/ajax_ticket_check',
     type: 'post',
     data: {event_id: event_id, sechudel_id: event_schedule_id},
     success: function (data) {
      if (data)
       $('#tktDiv').html(data);
      $('#li' + event_schedule_id).addClass('selected');
     }
    });
   }

  });
 });
 $(document).ready(function () {
  var pageUrl = $('#pageurl').val();
  var event_id = $('#hidden_event_id').val();
  var event_schedule_id = $('#event-schedule-id').val();
  //alert(event_schedule_id);
  if (event_id && event_schedule_id) {
   //$('#li' + event_schedule_id).addClass('selected');
   $.ajax({
    url: pageUrl + 'users/ajax_ticket_check',
    type: 'post',
    data: {event_id: event_id, sechudel_id: event_schedule_id},
    success: function (data) {
     if (data) {
      $('#tktDiv').html(data);
      $('#li' + event_schedule_id).addClass('selected');
     }
    }
   });
  }
 });
 // Calendar day onclick  get default sechudle ticket options loading
 function getTicket(date) {
  var event_id = $('#hidden_event_id').val();
  var pageUrl = $('#pageurl').val();
  $('.day-event').removeClass('selected');
  if (date && event_id) {
   $.ajax({
    url: pageUrl + 'users/ajax_load_ticket',
    type: 'post',
    dataType: 'json',
    data: {event_id: event_id, date: date},
    success: function (data) {
     if (data.event_schedule_id) {
      var event_schedule_id = data.event_schedule_id
      $('#li' + event_schedule_id).addClass('selected');
      $.ajax({
       url: pageUrl + 'users/ajax_ticket_check',
       type: 'post',
       data: {event_id: event_id, sechudel_id: event_schedule_id},
       success: function (data) {
        if (data) {
         $('#tktDiv').html(data);
         $('#li' + event_schedule_id).addClass('selected');
        }
       }
      });
     }
    }
   });
  }

 }
</script>