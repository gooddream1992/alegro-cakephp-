<section class="textureOne photos_Page">
 <div class="wrapper">
  <h2>OUR EVENTS ALBUM</h2>
  <p>Click on any event to see respective events photos.</p>
  <ul>
   <li>
    <a href="all-photos.html">
     <div><img src="images/event-pic1.jpg" alt="" /></div>
     <span>THE 24-HOUR PARTY WITH THE MARTINEZ BROTHERS AND MARCO CAROLA.</span>
    </a>
   </li>
   <li>
    <a href="all-photos.html">
     <div><img src="images/event-pic2.jpg" alt="" /></div>
     <span>WEDNESDAY TROPICANA 80S 90S BBQ</span>
    </a>
   </li>
   <li>
    <a href="all-photos.html">
     <div><img src="images/event-pic3.jpg" alt="" /></div>
     <span>MARCO CAROLA PACO OSUNA DANYELINO</span>
    </a>
   </li>
   <li>
    <a href="all-photos.html">
     <div><img src="images/event-pic2.jpg" alt="" /></div>
     <span>WEDNESDAY TROPICANA 80S 90S BBQ</span>
    </a>
   </li>
   <li>
    <a href="all-photos.html">
     <div><img src="images/event-pic3.jpg" alt="" /></div>
     <span>MARCO CAROLA PACO OSUNA DANYELINO</span>
    </a>
   </li>
  </ul>
  <div class="clear"></div>
 </div>
</section>
<script>
 $(window).on('load resize', function () {
  var headerHeight = $("header").innerHeight();
  var breadcrumbHeight = $(".breadcrumbMenu").innerHeight();
  var searcheventHeight = $(".search_event").innerHeight();
  var footerHeight = $("footer").innerHeight();
  var subtractHeight = parseInt(headerHeight) + parseInt(breadcrumbHeight) + parseInt(searcheventHeight) + parseInt(footerHeight);
  var viewportHeight = ($(window).height());
  var photospageHeight = viewportHeight - subtractHeight;
  $(".photos_Page").css("min-height", photospageHeight);
 });
</script>