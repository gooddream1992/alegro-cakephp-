
<link type="text/css" rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/frontend/YouTubePopUp.css" />
<script type="text/javascript" language="javascript" src="<?php echo HTTP_ROOT ?>js/frontend/jquery-1.10.2.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo HTTP_ROOT ?>js/frontend/YouTubePopUp.jquery.js"></script>
<script type="text/javascript">
 jQuery(function(){
  jQuery("a.autoplayOn").YouTubePopUp();
  jQuery("a.autoplayOff").YouTubePopUp({autoplay:0}); // Disable autoplay
 });
</script>
<section class="breadcrumbMenu">
 <div class="wrapper">
  <ul>
   <li><a href="<?php echo HTTP_ROOT ?>">Home</a></li>
   <li><a href="<?php echo HTTP_ROOT . 'video' ?>">Video</a></li>
   <li class="active"><?php echo $albumName->name; ?></li>
  </ul>
 </div>
</section>
<?php //echo $this->element('frontend/search'); ?>

<section class="textureOne photos_Page">
 <div class="wrapper">
  <h2><?php echo $albumName->name; ?></h2>
  <?php if ($dataCount >= 1) { ?>
     <p>Click to watch videos</p>
    <?php } ?>
  <div class="video_gallery">
   <?php

     if ($dataCount >= 1) {
      foreach ($dataListings as $list) {

       ?>
       <a class="autoplayOn" href="<?php echo $list->video_link ?>"><img src="https://img.youtube.com/vi/<?php echo $this->Custom->getYoutubeId($list->video_link) ?>/0.jpg" alt='Image of <?php echo $list->alt ?>' title='Title of<?php echo $list->alt ?>' /></a>
       <?php

      }
     } else {

      ?>
      <p style="text-align: center; color:#fff;">No video this album</p>
     <?php } ?>
  </div>
  <style>
   .video_gallery a {margin: 40px 5% 0 0; width: 30%; float: left; position: relative; border: 1px solid #464647; transition: 300ms all; -moz-transition: 300ms all; -webkit-transition: 300ms all;}
   .video_gallery a:nth-child(3n) {margin-right: 0;}
   .video_gallery a:after {width: 70px; height: 50px; background: url(images/play-button.png) no-repeat; content: ""; display: block; position: absolute; left: 50%; top: 50%;	transform: translate(-50%, -50%); -moz-transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); z-index: 99;}
   .video_gallery a:hover {border-color: #999; box-shadow: 3.41px 3.657px 8.1px 0.9px rgba(0, 0, 0, 0.73); -moz-box-shadow: 3.41px 3.657px 8.1px 0.9px rgba(0, 0, 0, 0.73); -webkit-box-shadow: 3.41px 3.657px 8.1px 0.9px rgba(0, 0, 0, 0.73);}
  </style>
  <div class="clear"></div>
 </div>
</section>
<script>
 $(window).on('load resize',function(){
  var headerHeight=$("header").innerHeight();
  var breadcrumbHeight=$(".breadcrumbMenu").innerHeight();
  var searcheventHeight=$(".search_event").innerHeight();
  var footerHeight=$("footer").innerHeight();
  var subtractHeight=parseInt(headerHeight)+parseInt(breadcrumbHeight)+parseInt(searcheventHeight)+parseInt(footerHeight);
  var viewportHeight=($(window).height());
  var photospageHeight=viewportHeight-subtractHeight;
  $(".photos_Page").css("min-height",photospageHeight);
 });
</script>