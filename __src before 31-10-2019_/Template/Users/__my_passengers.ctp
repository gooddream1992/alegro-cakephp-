<?php echo $this->element('frontend/login-header'); ?>


<section id="search-results-body">
    <div class="container">
        <div class="row">
            <!-- Filters -->
            <?php
            echo $this->element('frontend/user-menu');
            ?>
            <!-- Filters -->


            <!-- Results -->
            <div class="col-sm-8 col-lg-9">
                <div class="right_histry_head m_btm_20">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="active"><?php echo __('Passenger Info');?></h3>
                        </div>


                    </div>
                </div>

                <div class="bg_white right_pro">
                    <?php echo $this->Flash->render(); ?>
                    <?php //echo $this->Form->create(null, ['class' => 'register-form', 'id' => 'user_change_password', 'data-toggle' => "validator"]) ?>
                    <div class="row">

                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo __('First Name');?></label>
                                <input type="text" name="password"  id='password' class="form-control" placeholder="<?php echo __('First Name');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo __('Last Name');?></label>
                                <input type="text" name="confirm_password"  id="confirm_password" class="form-control" placeholder="<?php echo __('Last Name');?>">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo __('Date of Birth');?></label>
                                <input type="text" name="password"  id='password' class="form-control" placeholder="<?php echo __('Date of Birth');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo __('Gender');?></label>
                                <select class="form-control">
                                    <option value="Male"><?php echo __('Male');?></option>
                                    <option value="Female"><?php echo __('Female');?></option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo __('Nationality');?></label>
                                <input type="text" name="password"  id='password' class="form-control" placeholder="<?php echo __('Nationality');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo __('Passport Issue Country');?></label>
                                <input type="text" name="confirm_password"  id="confirm_password" class="form-control" placeholder="<?php echo __('Passport Issue Country');?>">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo __('Passport Number');?></label>
                                <input type="text" name="password"  id='password' class="form-control" placeholder="<?php echo __('Passport Number');?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label><?php echo __('Passport Country');?></label>
                                <input type="text" name="confirm_password"  id="confirm_password" class="form-control" placeholder="<?php echo __('Passport Country');?>">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                <input type="checkbox"   id='password'><?php echo __('Lead Passanger');?></label>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                            
                        
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary btn-change hvr-grow" name="submit" value="Add Pssenger">
                            </div>
                        </div>



                    </div>
                    <?php //echo $this->Form->end(); ?>

                </div>
            </div>
            <!-- ROW -->


        </div>

    </div>
</section>
<?php echo $this->element('frontend/inner-footer'); ?>