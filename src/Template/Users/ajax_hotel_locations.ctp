<div class="close-g">
    <ul>
        <?php foreach ($data as $value) { ?>
             <?php echo "<li onclick='fill(&#39;" . __($value['state_name']) . "&#39;,&#39;" . $datas['pos'] . "&#39;,&#39;" . $datas['hid'] . "&#39;);$(&#39;#state-name&#39;).val(&#39;" . $value['id'] . "&#39;);'><div class='city--main'>" . __($value['state_name']) . " <span>" . __($value['state_name']) . "</span></div><span class='sort-cart'>" . $value['country_name'] . "</span></li>"; ?>       
        <?php }?>
    </ul>    
        <?php echo "</ul><div class='hideClose' onclick='hidefill(&#39;" . $datas['hid'] . "&#39;)'><a href='javascript:void(0)'>" .__('Close');"</a> </div>";
        
        ?>
    
</div>