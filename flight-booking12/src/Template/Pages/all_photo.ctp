<link type="text/css" rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/frontend/magnific-popup.css"/>
<script type="text/javascript" language="javascript" src="<?php echo HTTP_ROOT ?>js/frontend/jquery-1.10.2.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo HTTP_ROOT ?>js/frontend/jquery.magnific-popup.min.js"></script>
<section class="breadcrumbMenu">
 <div class="wrapper">
  <ul>
   <li><a href="<?php echo HTTP_ROOT ?>">Home</a></li>
   <li><a href="<?php echo HTTP_ROOT . 'photo' ?>">Photos</a></li>
   <li class="active"><?php echo $albumName->name; ?></li>
  </ul>
 </div>
</section>
<?php //echo $this->element('frontend/search'); ?>
<section class="textureOne photos_Page">
 <div class="wrapper">
  <h2><?php echo $albumName->name; ?></h2>
  <p>Click to view enlarged photos</p>
  <ul>
   <?php

     if ($dataCount >= 1) {
      foreach ($dataListings as $list) {

       ?>
       <li class="popup-gallery">
        <a href="<?php echo HTTP_ROOT . PHOTO . $list->image ?>">
         <img  title='Title of<?php echo $list->alt ?>'src="<?php echo HTTP_ROOT . PHOTO . $list->image ?>" alt="Image of <?php echo $list->alt; ?>" />
        </a>
       </li>
       <?php

      }
     } else {

      ?>
      <li style="text-align: center;color: #fff;">No photo Available</li>
     <?php } ?>

  </ul>
  <style>
   .popup-gallery {margin: 0; float: none; display: block; box-shadow: 3.41px 3.657px 8.1px 0.9px rgba(0, 0, 0, 0.73); -moz-box-shadow: 3.41px 3.657px 8.1px 0.9px rgba(0, 0, 0, 0.73); -webkit-box-shadow: 3.41px 3.657px 8.1px 0.9px rgba(0, 0, 0, 0.73);}
   .popup-gallery a {margin: 0; width: 100%; height: 100%;}
   .popup-gallery a img {transition: 300ms all; -moz-transition: 300ms all; -webkit-transition: 300ms all;}
   .popup-gallery a:hover {cursor: zoom-in;}
   .popup-gallery a:hover img {transform: scale(1.1); -moz-transform: scale(1.1); -webkit-transform: scale(1.1);}
  </style>
  <script type="text/javascript">
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
   $(document).ready(function(){
    $('.popup-gallery').magnificPopup({
     delegate:'a',
     type:'image',
     tLoading:'Loading image #%curr%...',
     mainClass:'mfp-img-mobile',
     gallery:{
      enabled:true,
      navigateByImgClick:true,
      preload:[0,1] // Will preload 0 - before current, and 1 after the current image
     },
     image:{
      tError:'<a href="%url%">The image #%curr%</a> could not be loaded.',
      //titleSrc: function(item) {
      //return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
      //}
     }
    });
   });
  </script>
  <div class="clear"></div>
 </div>
</section>