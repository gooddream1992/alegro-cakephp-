<?php
$paramController = $this->request->params['controller'];
$paramAction = $this->request->params['action'];

?>
<div class="progres">
    <ul>
        <li class="slide" data-tag="">	
            <a href="<?= HTTP_ROOT; ?>extranets/basic_tab/<?=$id;?>">Basics</a>
            <div class="indicator <?php if($paramAction == "basicTab"){ ?>active<?php } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">
            <a <?php if(@$id!=null){ ?> href="<?= HTTP_ROOT; ?>extranets/location/<?=$id;?>" <?php } ?> >Location</a>				
            <div class="indicator <?php if($paramAction == "location"){ ?>active<?php } ?>complete"></div>
        </li>

        <li class="slide" data-tag="">
            <a <?php if(@$id!=null){ ?> href="<?= HTTP_ROOT; ?>extranets/description/<?=$id;?>" <?php } ?>>Description</a>						
            <div class="indicator <?php if($paramAction == "description"){ ?>active<?php } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">									
            <a <?php if(@$id!=null){ ?> href="<?= HTTP_ROOT; ?>extranets/amenities/<?=@$id;?>" <?php } ?> > Amenities</a>							
            <div class="indicator <?php if($paramAction == "amenities"){ ?>active<?php } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">									
            <a <?php if(@$id!=null){ ?>  href="<?= HTTP_ROOT; ?>extranets/pricing/<?=@$id;?>" <?php } ?> >Pricing</a>						
            <div class="indicator <?php if($paramAction == "pricing"){ ?>active<?php } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">									
            <a <?php if(@$id!=null){ ?> href="<?= HTTP_ROOT; ?>extranets/availability/<?=@$id;?>" <?php } ?>> Availability</a>						
            <div class="indicator <?php if($paramAction == "availability"){ ?>active<?php } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">									
            <a <?php if(@$id!=null){ ?> href="<?= HTTP_ROOT; ?>extranets/photos/<?=@$id;?>" <?php } ?>>Photos</a>							
            <div class="indicator <?php if($paramAction == "photos"){ ?>active<?php } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">								
            <a <?php if(@$id!=null){ ?> href="<?= HTTP_ROOT; ?>extranets/profile/<?=@$id;?>"  <?php } ?>>Profile</a>							
            <div class="indicator <?php if($paramAction == "profile"){ ?>active<?php } ?>"></div>
        </li>
        
        <li class="slide" data-tag="">									
            <a <?php if(@$id!=null){ ?>  href="<?= HTTP_ROOT; ?>extranets/publish/<?=@$id;?>" <?php } ?>>Publish</a>						
            <div class="indicator <?php if($paramAction == "publish"){ ?>active<?php } ?>"></div>
        </li>
        
    </ul>
</div>