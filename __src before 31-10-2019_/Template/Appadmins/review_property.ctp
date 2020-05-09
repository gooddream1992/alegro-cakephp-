<style>
    .masonry { /* Masonry container */
        -webkit-column-count: 4;
        -moz-column-count:4;
        column-count: 4;
        -webkit-column-gap: 1em;
        -moz-column-gap: 1em;
        column-gap: 1em;
        margin: 1.5em;
        padding: 0;
        -moz-column-gap: 1.5em;
        -webkit-column-gap: 1.5em;
        column-gap: 1.5em;
        font-size: .85em;
    }
    .item {
        display: inline-block;
        background: #fff;
        padding: 1em;
        margin: 0 0 1.5em;
        width: 100%;
        -webkit-transition:1s ease all;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-shadow: 2px 2px 4px 0 #ccc;
    }
    .item img{max-width:100%;}

    @media only screen and (max-width: 320px) {
        .masonry {
            -moz-column-count: 1;
            -webkit-column-count: 1;
            column-count: 1;
        }
    }

    @media only screen and (min-width: 321px) and (max-width: 768px){
        .masonry {
            -moz-column-count: 2;
            -webkit-column-count: 2;
            column-count: 2;
        }
    }
    @media only screen and (min-width: 769px) and (max-width: 1200px){
        .masonry {
            -moz-column-count: 3;
            -webkit-column-count: 3;
            column-count: 3;
        }
    }
    @media only screen and (min-width: 1201px) {
        .masonry {
            -moz-column-count: 4;
            -webkit-column-count: 4;
            column-count: 4;
        }
    }



    .listing-tab{
        padding:0;    
    }


    .listing-tab .tab-content ul{padding:0;margin:0;}
    .listing-tab .tab-content ul li {
        list-style-type: none;
        border-bottom: 1px solid #eee;
        padding: 8px;
    }.listing-tab .tab-content ul li {
        list-style-type: none;
        border-bottom: 1px solid #eee;
        padding: 8px;
        padding-left: 20px;
        font-size: 13px;
        color: #666;
    }.listing-tab .tab-content ul li a{text-decoration:none; color:#666;}
    .listing-tab .tab-content ul li span{display:inline-block;float:right;padding-right:10px;}
    .listing-tab .nav-tabs>li,.nav-tabs>li a:hover{margin-bottom:0;background:none;}
    .listing-tab .nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{border:none;background:none;}
    .listing-tab .nav-tabs>li>a:hover{border-color:none;color:red;}
    .listing-tab .nav-tabs>li>a{border:0;padding:17px 0 7px;color:#333;margin-left:15px;}
    .listing-tab .nav-tabs>li.active>a{border-bottom:2px solid #bb0000;color:#000;}
    .listing-tab{background-color:#fff;}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Property Details
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo HTTP_ROOT . 'appadmins' ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><a  href="<?= h(HTTP_ROOT) ?>appadmins/registered_property"> <i class="fa fa-list"></i>All Property</a></li>
        </ol>
    </section>
    <?php
    $all_details = $this->User->getDataForHotel($id);

    function changeFormat($pri) {
        $dat = explode('.', $pri);
        $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
        return $f;
    }
    ?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">
                <div class="box box-primary">

                    <div class="box-body">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="box-header with-border">
                                <h3 class="box-title">Property Details</h3>
                            </div>
                        </div>

                        <div>
                            <div class="col-md-5">
                                <div class="listing-tab col-md-12">
                                    <div class="tab-content">
                                        <ul>
                                            <li>
                                                <a href="#">Property Name</a>
                                                <span><b><?= $all_details->description->propertyName; ?></b></span>
                                            </li>
                                            <li>
                                                <a href="#">Star</a>
                                                <span><?php
                                                    for ($i = 1; $i <= $all_details->description->rating; $i++) {
                                                        echo '<i class="fa fa-star" style="color: #f9d749;"></i>';
                                                    }
                                                    ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Check in : &nbsp;&nbsp;<b><?= $all_details->description->checkin; ?></b></a>
                                                <span>Check out : &nbsp;&nbsp;<b><?= $all_details->description->checkout; ?></b></span>
                                            </li>
                                            <li>
                                                <a href="#">Property Type</a>
                                                <span><?= $all_details->property_type; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Property Size</a>
                                                <span><?= $all_details->property_size; ?> Sqm</span>
                                            </li>
                                            <li>
                                                <a href="#">Bathrooms</a>
                                                <span><?= $all_details->bathrooms; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Bedrooms</a>
                                                <span><?= $all_details->bedrooms; ?></span>
                                            </li>
                                            <li style="padding: 0;"><h4>Location</h4></li>
                                            <li>
                                                <a href="#">Street</a>
                                                <span><?= $all_details->location->street; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Building</a>
                                                <span><?= $all_details->location->building; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">Country</a>
                                                <span><?= $all_details->location->country; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">state</a>
                                                <span><?= $all_details->location->state; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">City</a>
                                                <span><?= $all_details->location->city; ?></span>
                                            </li>
                                            <li>
                                                <a href="#">zip_code</a>
                                                <span><?= $all_details->location->zip_code; ?></span>
                                            </li>
                                            <li>
                                                <div id="load-map">
                                                    <div id="map" style="width: 100%;height: 100px;"></div>	
                                                </div>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5  col-md-offset-2">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Property Bedrooms Details</h3>
                                </div>
                                <div class="listing-tab col-md-12">
                                    <div class="tab-content">
                                        <ul>
                                            <?php
                                            $propertyBed = $this->User->getAllRooms($id);
                                            foreach ($propertyBed as $bed) {
                                                $subBed = $this->User->getSubbed($bed->user_id, $bed->property_id, $bed->id);
                                                ?>
                                                <li>
                                                    <a href="#">Room Name</a>
                                                    <span><b><?= $bed->bed_name; ?></b></span>
                                                </li>
                                                <li>
                                                    <a href="#">Number of Rooms</a>
                                                    <span><?= $bed->room_count; ?></span>
                                                </li>
                                                <li>
                                                    <a href="#">Number of Beds</a>
                                                    <span>
                                                        <?= $bed->num_bed; ?> (<?= $bed->beds; ?>)
                                                        <?php
                                                        if (!empty($subBed)) {
                                                            foreach ($subBed as $s_bed) {
                                                                echo ', ' . $s_bed->num_beds . ' (' . $s_bed->beds . ' )';
                                                            }
                                                        }
                                                        ?>
                                                    </span>
                                                </li>
                                                <li>
                                                    <a href="#">Pricing</a>
                                                    <span>AOA <?= changeFormat(number_format($bed->pricing->price_main, 2)); ?></span>
                                                </li>
                                                <li></li>
                                            <?php } ?>

                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="box-header with-border">
                                <h3 class="box-title">All Photos</h3>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="masonry">
                                    <?php
                                    foreach ($all_details->photos as $photo) {
                                        ?>
                                        <div class="item">
                                            <?= ($photo->is_main == 1) ? 'Main image' : ''; ?>
                                            <img src="<?= HTTP_ROOT . 'img/pro_pic/' . $photo->url; ?>">
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <hr>                            
                                <h3>Amenities</h3>
                                <hr>
                            </div>
                            <?php foreach ($this->User->proAminity($id) as $amin) { ?>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <?php $array_keys = array_keys($amin->toArray()); ?>
                                        <legend><?= (is_null($amin->bed)) ? 'Main Property' : $amin->bed->bed_name; ?></legend>
                                    </div>
                                    <?php
                                    foreach ($array_keys as $col) {
                                        if (!in_array($col, ['id', 'user_id', 'property_id', 'sub_id', 'bed'])) {
                                            // pj($amin->$col);
                                            if ($amin->$col != "null") {
                                                ?>

                                                <div class="col-md-2">
                                                    <a href="#"><?= $col; ?></a>

                                                    <div class="listing-tab col-md-12">
                                                        <div class="tab-content">
                                                            <ul>
                                                                <?php
                                                                $dts = '';
                                                                foreach (json_decode($amin->$col) as $dts) {
                                                                    ?>
                                                                    <li>
                                                                        <a href="#"><?= $dts; ?></a>
                                                                    </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            <?php } ?>

                        </div>


                        <div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <h1>About Place</h1>
                                <p><?= $all_details->description->describeYourPlace; ?></p>

                                <hr>
                                <h1>Recommendations</h1>
                                <p><?= $all_details->description->recommendations; ?></p>

                                <hr>
                                <h1>House Rules</h1>
                                <p><?= $all_details->description->houseRules; ?></p>

                                <hr>
                                <h1>How to reach there</h1>
                                <p><?= $all_details->description->howToGetThere; ?></p>

                                <hr>
                                <?php if ($all_details->active_ststus == 0) {
                                    ?>
                                    <a href="<?= HTTP_ROOT . 'appadmins/property_active/' . $id . '/active'; ?>"><button data-placement ="top" data-hint= "De-Active" title = 'Status : De-Active'class="btn btn-danger hint--top  hint" style = 'padding: 0 7px!important;'>Click to active</button> </a>
                                <?php } else {
                                    ?>
                                    <a href="<?= HTTP_ROOT . 'appadmins/property_active/' . $id . '/deactive'; ?>"><button data-placement ="top" data-hint= "Active" title = 'Status : Active'class="btn btn-success hint--top  hint" style = 'padding: 0 7px!important;'>Click to deactive</button></a>
                                    <?php }
                                    ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<script>

    function initMap() {
        var myLatLng = {lat: <?php echo $all_details->location->lati; ?>, lng: <?= $all_details->location->lngi; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: myLatLng,
        });
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: '<?php echo HTTP_ROOT . "img/marker.svg" ?>',
            title: '<?= $all_details->location->city; ?>'
        });


    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvuyVn-j3G78kRKnXBwyhQnHl9Hdf4g2I&callback=initMap">
</script>