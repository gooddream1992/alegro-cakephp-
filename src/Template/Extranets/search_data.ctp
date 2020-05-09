<?php
if (!empty($dataList)) {
    ?>
    <div class="col-sm-5 col-md-5 col-lg-5">
        <div class="homes-left"></div>
    </div>
    <div class="col-sm-2 col-md-2 col-lg-2">
        <?=__("Properties");?>
    </div>
    <div class="col-sm-5 col-md-5 col-lg-5">
        <div class="homes-right"></div>
    </div>
    <?php
    foreach ($dataList as $list) {
        ?>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="unnamed-property">
                <?= $this->User->getPropic($list->id); ?>
                <div class="unnamed-property-text">[<?= sprintf('%07d', $list->id); ?>] <?= $this->User->getProName($list->id); ?></div>
                <div class="unfinished"><?php if ($list->complete_ststus == 1) { echo __("Published"); } else { echo __("Unfinished"); } ?></div>
                <?php /*
                <div class="finish-listing">
                    <?php if ($list->complete_ststus != 1) { ?>
                        <a href="<?= HTTP_ROOT . 'extranets/basic_tab/' . $list->id; ?>"><i class="fas fa-redo-alt"></i></a>
                    <?php } ?>
                    <a class="text-danger" href="<?= HTTP_ROOT . 'extranets/delete_property/' . $list->id; ?>"><i class="fas fa-trash-alt"></i></a>
                    <?php
                    if ($list->complete_ststus == 1) {
                        if ($list->active_ststus == 0) {
                            ?>
                            <a href="<?= HTTP_ROOT . 'extranets/property_status/' . $list->id . '/active'; ?>"><i class="fas fa-pause-circle"></i></a>
                        <?php } else {
                            ?>
                            <a href="<?= HTTP_ROOT . 'extranets/property_status/' . $list->id . '/deactive'; ?>"><i class="fas fa-play"></i></a>
                                <?php
                            }
                        }
                        ?>
                </div>
                */ ?>
                  <div class="finish-listing">
                  <?php if ($list->complete_ststus != 1) { ?>
                  <a style="color:#000; font-size: 15px;" href="" data-toggle="modal" data-target="#myModalfinX<?php echo $list->id; ?>" title="<?php echo __('Finish listing'); ?>"><i class="fas fa-redo-alt"></i></a>

                  <!--Start Finalize Property Modal-->
                  <div class="modal fade new-message delet-message" id="myModalfinX<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                  <h4 class="modal-title"><?= __("Finalize Publishing"); ?></h4>
                  </div>
                  <div class="modal-body">
                  <p><?= __("Are you sure you want to finish publishing"); ?> <b><?= __($this->User->getProName($list->id)); ?></b></p>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-default cancel-m" data-dismiss="modal" style="border: 1px solid #000;color: #000;"><?= __("Ignore"); ?></button>
                  <a class="btn btn-primary" href="<?= HTTP_ROOT . 'extranets/basic_tab/' . $list->id; ?>"><?= __("Finalize"); ?></a>

                  </div>
                  </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->


                  <?php } else { ?>
                  <a style="color:#000; font-size: 15px;" href="" data-toggle="modal" data-target="#myModaleditX<?php echo $list->id; ?>" title="<?php echo __('Edit'); ?>"><i class="fas fa-edit"></i></a>




                  <!--Start Edit Property Modal-->
                  <div class="modal fade new-message delet-message" id="myModaleditX<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                  <h4 class="modal-title"><?= __("Edit Property"); ?></h4>
                  </div>
                  <div class="modal-body">
                  <p><?= __("Are you sure you want to edit"); ?> <b><?= __($this->User->getProName($list->id)); ?></b></p>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-default cancel-m" data-dismiss="modal" style="border: 1px solid #000;color: #000;"><?= __("Ignore"); ?></button>
                  <a class="btn btn-primary" href="<?= HTTP_ROOT . 'extranets/basic_tab/' . $list->id; ?>"><?= __("Edit"); ?></a>

                  </div>
                  </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->






                  <?php } ?>
                  <a style="font-size: 15px;"class="text-danger" href="" data-toggle="modal" data-target="#myModaldelX<?php echo $list->id; ?>" title="<?php echo __('Delete listing'); ?>"><i class="fas fa-trash-alt"></i></a>



                  <!--Start Delete Property Modal-->
                  <div class="modal fade new-message delet-message" id="myModaldelX<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                  <h4 class="modal-title"><?= __("Delete Property"); ?></h4>
                  </div>
                  <div class="modal-body">
                  <p><?= __("Are you sure you want to delete"); ?> <b><?= __($this->User->getProName($list->id)); ?></b></p>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-default cancel-m" data-dismiss="modal" style="border: 1px solid #000;color: #000;"><?= __("Ignore"); ?></button>
                  <a class="btn btn-primary" href="<?= HTTP_ROOT . 'extranets/delete_property/' . $list->id; ?>"><?= __("Delete"); ?></a>

                  </div>
                  </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->



                  <?php
                  if ($list->complete_ststus == 1) {
                  if ($list->active_ststus == 0) {
                  ?>
                  <a style="color:#000; font-size: 15px;" href=""  data-toggle="modal" data-target="#myModalactX<?php echo $list->id; ?>" title="<?php echo __('Active listing'); ?>"><i class="fas fa-play"></i></a>

                  <!--Start Activate Property Modal-->
                  <div class="modal fade new-message delet-message" id="myModalactX<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                  <h4 class="modal-title"><?= __("Resume Property"); ?></h4>
                  </div>
                  <div class="modal-body">
                  <p><?= __("Are you sure you want to resume"); ?> <b><?= __($this->User->getProName($list->id)); ?></b></p>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-default cancel-m" data-dismiss="modal" style="border: 1px solid #000;color: #000;"><?= __("Ignore"); ?></button>
                  <a class="btn btn-primary" href="<?= HTTP_ROOT . 'extranets/property_status/' . $list->id . '/active'; ?>"><?= __("Resume"); ?></a>

                  </div>
                  </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->




                  <?php } else {
                  ?>
                  <a style="color:#000; font-size: 15px;" href="" data-toggle="modal" data-target="#myModalpauseX<?php echo $list->id; ?>"

                  title="<?php echo __('Deactive listing'); ?>"><i class="fas fa-pause-circle"></i></a>

                  <!--Start Pause Property Modal-->
                  <div class="modal fade new-message delet-message" id="myModalpauseX<?php echo $list->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fas fa-times"></i></button>
                  <h4 class="modal-title"><?= __("Pause Property"); ?></h4>
                  </div>
                  <div class="modal-body">
                  <p><?= __("Are you sure you want to pause"); ?> <b><?= __($this->User->getProName($list->id)); ?></b></p>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-default cancel-m" data-dismiss="modal" style="border: 1px solid #000;color: #000;"><?= __("Ignore"); ?></button>
                  <a class="btn btn-primary" href="<?= HTTP_ROOT . 'extranets/property_status/' . $list->id . '/deactive'; ?>"><?= __("Pause"); ?></a>

                  </div>
                  </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->

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