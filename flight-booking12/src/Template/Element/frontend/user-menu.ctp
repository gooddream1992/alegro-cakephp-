<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
?>
<style>
    .bell {
    position: relative;
    color: rgba(0,0,0,.7);
    display: inline-block;
}
.bell:hover{
color: rgba(0,0,0,.7);

}
.notif1 {

    display: inline-block;
    position: absolute;
    height: 25px;
    width: 25px;
    background: red;
    color: #fff;
    font-size: 12px;
    font-weight: bold;
    border-radius: 40px;
    right: 12px;
    top: 15px;
    text-align: center;
    vertical-align: top;
    line-height: 28px;

}
    </style>
<div class="col-sm-4 col-lg-3">
    <div class="container filters-list_2">
        <!-- Title -->
        <div class="row">
            <div class="col-md-12 filter-title">
                <?php echo __('My Account'); ?>
            </div>
        </div>
    </div>
    <div class="bg_white left_history">
        <a href="<?php echo HTTP_ROOT . 'profile' ?>" <?php if ($paramAction == 'editProfile' || $paramAction == 'profile') { ?> class="active"<?php } ?>><i class="fas fa-user" style=" font-size: 18px; color: #f9d749; padding-right: 7px;"></i> <?php echo __('Profile'); ?></a>
        <a href="<?php echo HTTP_ROOT . 'user-change-password' ?>" <?php if ($paramAction == 'userChangePassword') { ?> class="active"<?php } ?>><i class="fas fa-key" style=" font-size: 18px; color: #f9d749; padding-right: 7px;"></i> <?php echo __('Password'); ?></a>
        <a class="bell" href="<?php echo HTTP_ROOT . 'notification' ?>" <?php if ($paramAction == 'notification') { ?> class="active"<?php } ?>><?php echo $this->cell('Notifications::sidebar_count',[$this->request->getSession()->read('Auth.User.email')]); ?></a>
        
        <a href="<?php echo HTTP_ROOT . 'my-booking' ?>" <?php if ($paramAction == 'myBooking') { ?> class="active"<?php } ?>><i class="fas fa-calendar-check" style=" font-size: 18px; color: #f9d749; padding-right: 7px;"></i> <?php echo __('My Bookings'); ?></a>
        
<!--        <a href="<?php echo HTTP_ROOT . 'my-passengers' ?>" <?php if ($paramAction == 'myPassengers') { ?> class="active"<?php } ?>><i class="fas fa-user-plus" style=" font-size: 18px; color: #f9d749; padding-right: 7px;"></i> My Passengers</a>-->
        
        <a href="<?php echo HTTP_ROOT . 'users/logout' ?>"><i class="fas fa-sign-out-alt" style=" font-size: 18px; color: #f9d749; padding-right: 7px;"></i> <?php echo __('Logout'); ?></a>
    </div>
</div>