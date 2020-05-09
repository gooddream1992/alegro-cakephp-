<?php
foreach ($resultset as $val) {
    if (!empty($val->city_name)) {
        ?>
        <span onclick="$('.city_name').val('<?= $val->city_name; ?>'); $('#dropdown2').removeClass('dropdown2');"><?= $val->city_name; ?></span>
    <?php }
} ?>