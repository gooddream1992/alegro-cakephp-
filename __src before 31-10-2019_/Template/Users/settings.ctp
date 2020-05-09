<?php echo $this->element('frontend/login-header'); ?>
<section id="search-results-body"  style="margin: 50px 0 60px;">
    <div class="container">
        <div class="row">
            <!-- Filters -->
            <?php
            echo $this->element('frontend/user-menu');
            ?>
            <!-- Filters -->

            <script>
                $(document).ready(function () {
                    $('#language').val('<?= $user_setting->language; ?>');
                    $('#currency').val('<?= $user_setting->currency; ?>');
                });
            </script>
            <!-- Results -->
            <div class="col-sm-8 col-lg-9">
                <div class="bg_white right_pro">
                    <?= $this->Form->create('', ['type' => 'post']); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <label><?php echo __('Preferred Language') ?></label>
                            <select name="language" id="language" class="form-control">
                                <option  value="PT"><?php echo __('Portuguese (PT)') ?></option>
                                <option  value="EN"><?php echo __('English (EN)') ?></option>
                                <option  value="FR"><?php echo __('French (FR)') ?></option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label><?php echo __('Preferred Currency') ?></label>
                            <select name="currency" id="currency" class="form-control">
                                <option  selected="selected" value="AOA">kz (AOA)</option>
                            </select>
                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <div class="form-group" style="margin-top: 20px !important;">
                                <input type="submit" class="btn btn-primary btn-change hvr-grow" name="" value="<?php echo __('Save') ?>">
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end(); ?>
                </div>
            </div>
            <!-- ROW -->


        </div>
        <!-- END OF THE BOX AND SINGLE ROW -->


    </div>
</section>

<div class="space"></div>

<?php echo $this->element('frontend/inner-footer'); ?>