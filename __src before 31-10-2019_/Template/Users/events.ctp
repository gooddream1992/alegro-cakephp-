<style>
 /* .pagination .next{background:#212121;display:inline-block;width:30px;height:30px;line-height:36px;float:left;text-align: center;border-radius: 2px;}
  .pagination .prev{background:#212121;display:inline-block;width:30px;height:30px;line-height:36px;float:right;text-align: center;border-radius: 2px;}
  .pagination .next:hover,.search-item-box .pagitions-box .pagination .prev:hover{opacity:0.7;}*/

 .listClass{

 }

</style>
<section class="breadcrumbMenu">
 <div class="wrapper">
  <ul>
   <li><a href="<?php echo HTTP_ROOT ?>">Home</a></li>
   <li class="active">Events</li>
  </ul>
 </div>
</section>
<div id="error_msg_date"></div>
<?php echo $this->element('frontend/search'); ?>
<section class="textureOne">
 <div class="wrapper">
  <?php foreach ($eventLists as $eventList) { ?>
     <div class="events_list">
      <div>
       <a href="<?php echo HTTP_ROOT . 'event-details/' . $this->Custom->makeSeoUrl($eventList->event->name) . '-' . $eventList->event->id ?>">
        <?php if ($eventList->event->image) { ?>
         <img title="<?php echo $eventList->event->name; ?>" alt="Image of<?php echo $eventList->event->name; ?>" src="<?php echo HTTP_ROOT . COVER_PHOTO . 'medium_' . $eventList->event->image ?>" alt="<?php echo $eventList->event->name; ?>" />
        <?php } else { ?>
         <img src="http://via.placeholder.com/291x200" alt="<?php echo $eventList->event->name; ?>" />
        <?php } ?>

       </a>
       <span data-content="<?php echo date('M', strtotime($eventList->date)) ?>"><?php echo date('d', strtotime($eventList->date)) ?></span>
      </div>
      <div>
       <a href="<?php echo HTTP_ROOT . 'event-details/' . $this->Custom->makeSeoUrl($eventList->event->name) . '-' . $eventList->event->id ?>" class="eventTitle"><?php echo $eventList->event->name; ?></a>
       <p><?php echo $this->Custom->shortLength($eventList->event->description, 360); ?></p>
       <a href="<?php echo HTTP_ROOT . 'event-details/' . $this->Custom->makeSeoUrl($eventList->event->name) . '-' . $eventList->event->id ?>" class="readMore"> <?php echo($eventList->event->is_free_entry == 1) ? 'Free entry' : 'Book now' ?></a>
      </div>
     </div>


     <hr />
    <?php } ?>
  <?php if ($listCount == 0) { ?>
     <div class="events_list" style="color:#fff;">
      No events found
     </div>

    <?php } ?>
  <!--********************-->

  <?php

    // echo $eventLists->count();
    if ($this->Paginator->numbers()) {

     ?>
     <div class="pagination">
      <ul class="pagination-no">
       <?= $this->Paginator->prev(); ?>
       <?= $this->Paginator->numbers() ?>
       <?= $this->Paginator->next(); ?>
      </ul>

     </div>
    <?php } ?>
  <!--*********************-->

 </div>
</section>