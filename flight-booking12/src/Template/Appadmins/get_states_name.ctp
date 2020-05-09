<?php foreach ($resultset as $val) {
    if (!empty($val->state_name)) { ?>
        <span onclick="$('.state_name').val('<?= $val->state_name; ?>'); $('#dropdown').removeClass('dropdown');stateData('<?= $val->state_name; ?>')"><?= $val->state_name; ?></span>
    <?php }
} ?>