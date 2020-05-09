<section class="breadcrumbMenu">
 <div class="wrapper">
  <ul>
   <li><a href="<?php echo HTTP_ROOT ?>">Home</a></li>
   <li class="active">Videos</li>
  </ul>
 </div>
</section>
<?php //echo $this->element('frontend/search'); ?>
<section class="textureOne photos_Page">
 <div class="wrapper">
  <h2>OUR EVENTS VIDEOS</h2>
  <p>Click on any event to see respective events videos.</p>
  <ul>
   <?php foreach ($dataListings as $list) { ?>
      <li>
       <a href="<?php echo HTTP_ROOT . 'all-video/' . $this->Custom->makeSeoUrl($list->name) . '-' . $list->id ?>">
        <div><img title='<?php echo $list->name; ?>'src="<?php echo HTTP_ROOT . ALBUM . $list->image ?>" alt=" image of <?php echo $list->name ?>" /></div>
        <span><?php echo $list->name; ?></span>
       </a>
      </li>
     <?php } ?>
  </ul>
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