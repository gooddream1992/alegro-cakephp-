<?php
if (!empty($dataList)) {
    ?>
    <div class="col-sm-5 col-md-5 col-lg-5">
        <div class="homes-left"></div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
        Homes
    </div>
    <div class="col-sm-5 col-md-5 col-lg-5">
        <div class="homes-right"></div>
    </div>
    <?php
    foreach ($dataList as $list) {

        ?>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="unnamed-property">
                <?=$this->User->getPropic($list->id);?>
                <div class="unnamed-property-text">[<?= sprintf('%07d', $list->id); ?>] <?=$this->User->getProName($list->id);?></div>
                <div class="unfinished"><?php if ($list->complete_ststus == 1) { ?>Published<?php } else { ?>Unfinished<?php } ?></div>
                <div class="finish-listing">
                                    <?php if ($list->complete_ststus != 1) { ?>
                                        <a href="<?= HTTP_ROOT . 'extranets/basic_tab/' . $list->id; ?>">Finish listing</a>
                                    <?php } ?>
                                    <a class="text-danger" href="<?= HTTP_ROOT . 'extranets/delete_property/' . $list->id; ?>">Delete listing</a>
                                    <?php
                                    if ($list->complete_ststus == 1) {
                                        if ($list->active_ststus == 0) {
                                            ?>
                                            <a href="<?= HTTP_ROOT . 'extranets/property_status/' . $list->id . '/active'; ?>">Active listing</a>
                                        <?php } else {
                                            ?>
                                            <a href="<?= HTTP_ROOT . 'extranets/property_status/' . $list->id . '/deactive'; ?>">De-active listing</a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
            </div>
        </div>
        <?php
        
        
    }
}
?>