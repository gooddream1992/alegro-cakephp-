<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];
$userID = $this->request->session()->read('Auth.User.id');

 $y44=$this->User->htlSidebar($id,$userID,'ExtranetsUserProperty'); 
 $y33=$this->User->htlSidebar($id,$userID,'ExtranetsUserPropertyLocation'); 
 $y22=$this->User->htlSidebar($id,$userID,'ExtranetsUserPropertyDescription');
 $y11=$this->User->htlSidebar($id,$userID,'ExtranetsUserPropertyAmenities'); 
 $y1=$this->User->htlSidebar($id,$userID,'ExtranetsUserPropertyPricing');
 $y2 =$this->User->htlSidebar($id,$userID,'ExtranetsUserPropertyAvailability'); 
 $y3 =$this->User->htlSidebar($id,$userID,'ExtranetsUserPropertyPhotos');  
 $y31 =$this->User->htlSidebar($id,$userID,'UserDetails'); 
 $y48=$this->User->htlSidebar2($id,$userID,'ExtranetsUserProperty');
$x=0;
?>
<div class="progres">
    <ul>
        <li class="slide" data-tag="">	
            <a href="<?= HTTP_ROOT; ?>extranets/basic_tab/<?=$id;?>"> <?php echo __('Basics'); ?></a>
            <div class="indicator <?php  if($paramAction == "basicTab"){  ?>active<?php } ?> <?php if($x==1){ echo 'complete';} if($y44==1){ echo ' complete'; } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">
            <a <?php if($id!=null && $y44==1){ ?> href="<?= HTTP_ROOT; ?>extranets/location/<?=$id;?>" <?php } ?> > <?php echo __('Location'); ?></a>				
            <div class="indicator <?php if($paramAction == "location"){    ?>active<?php } ?> <?php  if($y33==1){ echo ' complete'; } ?>"></div>
        </li>

        <li class="slide" data-tag="">
            <a <?php if(@$id!=null && $y44==1 && $y33==1 ){ ?> href="<?= HTTP_ROOT; ?>extranets/description/<?=$id;?>" <?php } ?>> <?php echo __('Description'); ?></a>						
            <div class="indicator <?php  if($paramAction == "description"){  ?>active<?php } ?> <?php  if($y22==1){ echo ' complete'; } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">									
            <a <?php if(@$id!=null && $y44==1 && $y33==1 && $y22==1){ ?> href="<?= HTTP_ROOT; ?>extranets/amenities/<?=@$id;?>" <?php } ?> > <?php echo __('Amenities'); ?></a>							
            <div class="indicator <?php if($paramAction == "amenities"){  ?>active<?php } ?> <?php   if($y11==1){ echo ' complete'; } ?>" ></div>
        </li>
        
        <li class="slide" data-tag="">									
            <a <?php if(@$id!=null && $y44==1 && $y33==1 && $y22==1 && $y11==1){ ?>  href="<?= HTTP_ROOT; ?>extranets/pricing/<?=@$id;?>" <?php } ?> > <?php echo __('Pricing'); ?></a>						
            <div class="indicator <?php if($paramAction == "pricing"){   ?>active<?php } ?> <?php  if($y1==1){ echo ' complete'; } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">									
            <a <?php if(@$id!=null && $y44==1 && $y33==1 && $y22==1 && $y11==1 && $y1==1){ ?> href="<?= HTTP_ROOT; ?>extranets/availability/<?=@$id;?>" <?php } ?>> <?php echo __('Availability'); ?></a>						
            <div class="indicator <?php if($paramAction == "availability"){  ?>active<?php } ?> <?php  if($y2==1){ echo ' complete'; } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">									
            <a <?php if(@$id!=null && $y44==1 && $y33==1 && $y22==1 && $y11==1 && $y1==1 && $y2==1){ ?> href="<?= HTTP_ROOT; ?>extranets/photos/<?=@$id;?>" <?php } ?>> <?php echo __('Photos'); ?></a>							
            <div class="indicator <?php  if($paramAction == "photos"){   ?>active<?php } ?> <?php  if($y3==1){ echo  ' complete'; } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">								
            <a <?php if(@$id!=null && $y44==1 && $y33==1 && $y22==1 && $y11==1 && $y1==1 && $y2==1 && $y3==1 && $y31==1){ ?> href="<?= HTTP_ROOT; ?>extranets/profile/<?=@$id;?>"  <?php } ?>> <?php echo __('Profile'); ?></a>							
            <div class="indicator <?php if($paramAction == "profile"){   ?>active<?php } ?> <?php if($y31==1){ echo 'complete';}?>"></div>
        </li>
        
        <li class="slide" data-tag="">									
            <a <?php if(@$id!=null && $y44==1 && $y33==1 && $y22==1 && $y11==1 && $y1==1 && $y2==1 && $y3==1 && $y31 == 1 ){ ?>  href="<?= HTTP_ROOT; ?>extranets/publish/<?=@$id;?>" <?php } ?>> <?php echo __('Publish'); ?></a>						
            <div class="indicator <?php if($paramAction == "publish"){  $x =0; ?>active<?php } ?> <?php if($y48 == 1){ echo 'complete';}?>"></div>
        </li>
        
    </ul>
</div>
 