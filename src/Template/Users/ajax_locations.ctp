<div class="close-g">
    <ul>
        <?php foreach ($data as $value) { ?>            
            <?php 
             echo "<li onclick='fill(&#39;" . $value['value'] . "&#39;,&#39;" . $datas['pos'] . "&#39;,&#39;" . $datas['hid'] . "&#39;)'><div class='city--main'>" . __($value['city']) . " <span>" . __($value['data']) . '</span></div><span class="sort-cart">' . $value['value'] . "</span></li>"; ?>       
        <?php } ?>
    </ul>    
        <?php echo "<div class='hideClose' onclick='hidefill(&#39;" . $datas['hid'] . "&#39;)'><a href='javascript:void(0)'>" .__('Close');"</a> </div>"; ?>
</div>