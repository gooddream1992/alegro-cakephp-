<?php
$user_datass = $this->User->usrdetHelper($this->request->session()->read('Auth.User.id'));
?>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-10627690-5', 'auto');
    ga('send', 'pageview');

</script>
<script src=" https://code.jquery.com/jquery-2.1.3.min.js"></script>
<link href="<?= HTTP_ROOT; ?>croper/main.css" rel="stylesheet">
<link href="<?= HTTP_ROOT; ?>croper/croppic.css" rel="stylesheet">
<script src="<?= HTTP_ROOT; ?>croper/jquery.mousewheel.min.js"></script>
<script src="<?= HTTP_ROOT; ?>croper/croppic.min.js"></script>
<?php
if ($nextname == "Listings") {
    ?>
    <script>
        $(document).ready(function () {
            $('#listings-nav').click();
        });
    </script>
    <?php }
?>
<style>
    .cropControlUpload,.cropControlRemoveCroppedImage,.cropControlZoomOut,.cropControlZoomIn{
        display: none !important;
    }
    .head-section img {
        width: 150px;
        float: none;
        margin-right: 0px;
    }

</style>
<style>
    .timeline-wrapper{
        margin-bottom: 15px;
    }
    .timeline-title {
        margin: 0 auto;
        max-width: 472px;
    }


    .timeline-item {
        background-color: #fff;
        border: 1px solid;
        border-color: #e5e6e9 #dfe0e4 #d0d1d5;
        border-radius: 3px;
        padding: 12px;
        margin: 0 auto;
        max-width: 100%;
        min-height: 90px;
    }

    @keyframes placeHolderShimmer {
        0%{ background-position: -468px 0; }
        100%{ background-position: 468px 0; }
    }

    .animated-background {
        animation-duration: 1.5s;
        animation-fill-mode: forwards;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        animation-name: placeHolderShimmer;
        background: #f6f7f8;
        background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
        background-size: auto;
        background-size: 800px 104px;
        height: 95px;
        position: relative;
    }

    .background-masker {
        background: #fff;
        position: absolute;
    }
    .background-masker.header-top,
    .background-masker.header-bottom,
    .background-masker.subheader-bottom {
        top: 0;
        left: 100px;
        right: 0;
        height: 10px;
    }
    .background-masker.header-left, .background-masker.subheader-left, .background-masker.header-right, .background-masker.subheader-right {
        top: 0;
        left: 100px;
        height: 34px;
        width: 10px;
    }
    .background-masker.header-bottom {
        top: 18px;
        height: 10px;
    }

    .background-masker.subheader-left, .background-masker.subheader-right {
        top: 24px;
        height: 22px;
    }
    .background-masker.header-right, .background-masker.subheader-right {
        width: auto;
        left: 100%;
        right: 0;
    }
    .background-masker.subheader-right {
        left: 75%;
    }
    .background-masker.subheader-bottom {
        top: 30px;
        height: 10px;
    }
    .background-masker.content-top,
    .background-masker.content-second-line,
    .background-masker.content-third-line{
        top: 40px;
        left: 100px;
        right: 0;
        height: 49px;
    }
    .background-masker.content-third-line {
        top: 46px;
    }
</style>
<div id="Overview" class="tabcontent" style="display: block;">
    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-12">
                <h1><?php echo __('Welcome back'); ?>, <?= $user_datass->first_name; ?> <?= $user_datass->sur_name; ?>!</h1>
                <h6><?php echo __('Lets see what we can do today to get more bookings.'); ?></h6>
            </div>
        </div>
        <div class="row">
            <div class="overview-part">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <img src="<?= $this->Url->image('extranet/money-bag.svg'); ?>" style="width: 120px;margin: 96px 0px 55px 0px;">
                    <h2><?php echo __('Good job! Booking booster actions complete!'); ?></h2>
                    <p><?php echo __('Your listings are optimized. Check here regularly for more tips and insights.'); ?></p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12" style="margin: -102px 0px 69px 0px;">
                            <h3><?php echo __('Host profile'); ?></h3>
                            <div class="host-profile">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3 col-lg-3">
<?php if ($user_datass->profile_photo != "") { ?> <img src='<?= HTTP_ROOT . $user_datass->profile_photo; ?>' alt="usr" width="90" style="border-radius: 50%;"><?php } else { ?> <i class="fa fa-user" aria-hidden="true"></i><?php } ?>

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6"><h4><?= $user_datass->first_name; ?> <?= $user_datass->sur_name; ?></h4></div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 host-profile-middle">
                                        <div class="host-profile-left"><i class="fa fa-clock" aria-hidden="true"></i> <?php echo __('Last Login'); ?>: <?=date_format($this->request->session()->read('Auth.User.last_login_date'),'d ');?>
                                        <?=__(date_format($this->request->session()->read('Auth.User.last_login_date'),'M'));?>
                                        <?=date_format($this->request->session()->read('Auth.User.last_login_date'),' Y');?></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h3><?php echo __('Feedback'); ?></h3>
                            <div class="feedback">
                                <div class="row">
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                        <img src="<?= $this->Url->image('extranet/feedback.svg'); ?>" style="width: 50px;margin: 3px 0px;">
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <p><?php echo __('Help us improve the platform you use'); ?></p>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="give-us"><a href="#"><?php echo __('Give us feedback'); ?></a></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <!--
        <div class="row">
            <div class="agodaapp">
                <div class="col-sm-7 col-md-7 col-lg-7">
                    <h2><?php echo __('The Alegro app makes hosting even easier!'); ?></h2>
                    <p><?php echo __('The Alegro app’s Host Mode gives you on-the-go access to managing availability, prices, content, and more. Download it now!'); ?></p>
                </div>
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <div class="app-store">
                        <a href="#"><img src="<?= $this->Url->image('extranet/app-store.png'); ?>" alt=""></a>
                        <a href="#"><img src="<?= $this->Url->image('extranet/google-play.png'); ?>" alt=""></a>
                    </div>
                    <div class="scan-store"><a href="#"><img src="<?= $this->Url->image('extranet/scan-code.png'); ?>" alt=""></a></div>
                    <div class="mobile-store"><a href="#"><img src="<?= $this->Url->image('extranet/mobile-img.png'); ?>" alt=""></a></div>
                </div>
            </div>
        </div>
        --->
    </div>           
</div>

<div id="Listings" class="tabcontent">
    <div class="container">
        <div class="row">
            <div class="listings-tab">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <span class="search-container">
                        <input type="text" id="search-bar" placeholder="<?php echo __('Search (property ID or name)'); ?>" onkeyup="searchData(event, this.value)">
                        <a href="javascript:void();"><img class="search-icon" src="<?= $this->Url->image('extranet/lupa.svg'); ?>"></a>
                    </span>
                </div>
                <script>
                    $(document).ready(function () {
                        $('#result_section').hide();
                    });
                    function searchData(event, arg) {
                        var enter = event.which || event.keyCode;
                        if (enter == 13) {
                            $('#original').hide();
                            $('#result_section').hide();
                            $('#loader').show();
                            if (arg == '' || arg == 0) {
                                setTimeout(function () {
                                    $('#original').show();
                                    $('#loader').hide();
                                }, 1000);
                            } else {
                                $('#result_section').hide();
                                var searchKey = arg.replace(/\b0+/g, "");
                                $.ajax({
                                    url: '<?= HTTP_ROOT; ?>extranets/search_data',
                                    type: 'post',
                                    data: {search: searchKey},
                                    dataType: 'html',
                                    success: function (res) {
                                        if (res != '') {
                                            setTimeout(function () {
                                                $('#loader').hide();
                                                $('#result_section').html(res).show();
                                            }, 1000);
                                        } else {
                                            setTimeout(function () {
                                                $('#loader').hide();
                                                $('#result_section').hide();
                                                $('#original').show();
                                            }, 1000);
                                        }

                                    }
                                });
                            }
                        }
                    }
                </script>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <h2><a href="<?= HTTP_ROOT; ?>extranets/basic_tab"><?php echo __('+ADD A NEW LISTING'); ?></a></h2>
                </div>
                <div id="original">
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        <div class="homes-left"></div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <?php echo __('Homes'); ?>
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        <div class="homes-right"></div>
                    </div>
                    <?php if($propertyList_cnt != 0) {?>
                        <?php foreach ($propertyList as $list) { ?>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="unnamed-property">
                                    <?= $this->User->getPropic($list->id); ?>             
                                <div class="unnamed-property-text">[<?= sprintf('%07d', $list->id); ?>] <?= $this->User->getProName($list->id); ?> </div>
                                <div class="unfinished"><?php if ($list->complete_ststus == 1) { ?><?php echo __('Published'); ?><?php } else { ?><?php echo __('Unfinished'); ?><?php } ?></div>
                                <div class="finish-listing">
                                    <?php if ($list->complete_ststus != 1) { ?>
                                        <a style="color:#000; font-size: 15px;" href="<?= HTTP_ROOT . 'extranets/basic_tab/' . $list->id; ?>" title="<?php echo __('Finish listing'); ?>"><i class="fas fa-redo-alt"></i></a>
                                    <?php }else{ ?>
                                     <a style="color:#000; font-size: 15px;" href="<?= HTTP_ROOT . 'extranets/basic_tab/' . $list->id; ?>" title="<?php echo __('Edit'); ?>"><i class="fas fa-edit"></i></a>   
                                    <?php } ?>
                                    <a style="font-size: 15px;"class="text-danger" href="<?= HTTP_ROOT . 'extranets/delete_property/' . $list->id; ?>" title="<?php echo __('Delete listing'); ?>"><i class="fas fa-trash-alt"></i></a>
                                    <?php
                                    if ($list->complete_ststus == 1) {
                                        if ($list->active_ststus == 0) {
                                            ?>
                                            <a style="color:#000; font-size: 15px;" href="<?= HTTP_ROOT . 'extranets/property_status/' . $list->id . '/active'; ?>" title="<?php echo __('Active listing'); ?>"><i class="fas fa-play"></i></a>
                                        <?php } else {
                                            ?>
                                            <a style="color:#000; font-size: 15px;" href="<?= HTTP_ROOT . 'extranets/property_status/' . $list->id . '/deactive'; ?>" title="<?php echo __('Deactive listing'); ?>"><i class="fas fa-pause-circle"></i></a>
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
<?php } ?><?php }else { ?>
    <div class="container" id="basictab" style="background: none;">
        <div class="row" > 
            <div class="col-sm-12 col-md-12 col-lg-12">
                <img src="<?= $this->Url->image('extranet/no-properties.svg'); ?>" style="width: 150px;margin: 94px 0px 20px 0px;">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12" >
                <h4 style="font-size: 20px;padding: 10px 0;float: left;width: 100%;text-align: center;font-weight: bold;color: #000;"><?php echo __('No Properties'); ?></h4>
                <h6><?php echo __("You havent published any properties yet. Go ahead and publish your first property now and start to make money."); ?></h6>
            </div>
        </div>
</div>
<?php } ?>
                    <!--                <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="unnamed-property">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <div class="unnamed-property-text">[6250140] goog hh</div>
                                            <div class="unfinished"><?php echo __('Unfinished'); ?></div>
                                            <div class="finish-listing">Finish listing</div>
                                        </div>
                                    </div>-->
                </div>
                <div id="loader" style="display:none;" class="col-sm-12 col-md-12 col-lg-12">
                    <div class="timeline-wrapper">

                        <div class="timeline-item">
                            <div class="animated-background">

                                <div class="background-masker header-left"></div>
                                <div class="background-masker header-right"></div>
                                <div class="background-masker header-bottom"></div>
                                <div class="background-masker subheader-left"></div>
                                <div class="background-masker subheader-right"></div>
                                <div class="background-masker content-third-line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-wrapper">

                        <div class="timeline-item">
                            <div class="animated-background">

                                <div class="background-masker header-left"></div>
                                <div class="background-masker header-right"></div>
                                <div class="background-masker header-bottom"></div>
                                <div class="background-masker subheader-left"></div>
                                <div class="background-masker subheader-right"></div>
                                <div class="background-masker content-third-line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-wrapper">

                        <div class="timeline-item">
                            <div class="animated-background">

                                <div class="background-masker header-left"></div>
                                <div class="background-masker header-right"></div>
                                <div class="background-masker header-bottom"></div>
                                <div class="background-masker subheader-left"></div>
                                <div class="background-masker subheader-right"></div>
                                <div class="background-masker content-third-line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-wrapper">

                        <div class="timeline-item">
                            <div class="animated-background">

                                <div class="background-masker header-left"></div>
                                <div class="background-masker header-right"></div>
                                <div class="background-masker header-bottom"></div>
                                <div class="background-masker subheader-left"></div>
                                <div class="background-masker subheader-right"></div>
                                <div class="background-masker content-third-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="result_section" style="display:none;">

                </div>
            </div>
        </div>
    </div>           
</div>

<div id="Messages" class="tabcontent">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h2><?php echo __('Hosting'); ?></h2>
                <div class="button dropdown"> 
                    <select id="colorselector">
                        <option value="red"><?php echo __('All hosting messages'); ?></option>
                        <option value="yellow"><?php echo __('Unread'); ?></option>
                        <option value="blue"><?php echo __('Read'); ?></option>
                    </select>
                </div>
                <div class="output">
                    <div id="red" class="colors red">  “Good artists copy, great artists steal” Pablo Picasso</div>
                    <div id="yellow" class="colors yellow"> “Art is the lie that enables us to realize the truth” Pablo Picasso</div>
                    <div id="blue" class="colors blue"> “If I don't have red, I use blue” Pablo Picasso</div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <img src="<?= $this->Url->image('extranet/no-message-yet.svg'); ?>" style="width: 150px;margin: 87px 0px 10px 0px;">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4><?php echo __('No messages yet'); ?></h4>
                <h6><?php echo __('You havent received any message, try to optimize your content to make your property appealling.'); ?></h6>
            </div>
        </div>
    </div>
</div>





<div id="Profile" class="tabcontent">
    <div class="container">
        <div class="row">
<?= $this->Form->create('', ['type' => 'post']); ?>
            <div class="col-sm-12 col-md-12 col-lg-12 ">
                <h2><?php echo __('Add/Change profile photo (optional)'); ?></h2>
                <p><?php echo __('Put a face to your name! We will add this to your profile, and share it with future hosts and guests.'); ?></p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div id="Profile-property">
                    <div>
                        <div id="cropContainerModal"><?php if ($user_datass->profile_photo != "") { ?> <img src='<?= HTTP_ROOT . $user_datass->profile_photo; ?>' alt="usr" style="width: 180px;border-radius: 50%;"><?php } else { ?><img src='<?php echo HTTP_ROOT ?>img/avatar1.jpg' alt="usr" style="width: 180px;border-radius: 50%;"><?php } ?></div>

                    </div>
                    <div id="Profile-change-text"><?php echo __('Your picture matters. Pick a clear and friendly-looking one, to increase bookings.'); ?></div>
                    <div class="change" onclick="$('.cropControlUpload').click();">
                        <span  class="btn btn-default" style="padding: 10px;margin: -2px -87px;border: 1px solid black;color: black;text-transform: uppercase;"><?php echo __('ADD/CHANGE PROFILE PHOTO'); ?></span></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h6><?php echo __('Main Info'); ?></h6>
                <div id="profile-name">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="firstName" class="control-label"><?php echo __('First Name'); ?></label>
                                <input maxlength="25" name="first_name" type="text" id="firstName" class="form-control" value="<?= $user_datass->first_name; ?>">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="lastName" class="control-label"><?php echo __('Last Name'); ?></label>
                                <input maxlength="25" name="sur_name" type="text" id="lastName" class="form-control" value="<?= $user_datass->sur_name; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="preferenceLanguageId" class="control-label"><?php echo __('Language Preference'); ?></label>
                                <select name="mobile_sms_language" id="preferenceLanguageId" class="form-control">
                                    <option value="1">English</option>
                                    <option value="2">Français</option>
                                    <option value="12">Português</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h6><?php echo __('Your Contact'); ?></h6>


                <div id="profile-name">
                    <div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label"><?php echo __('Country Code'); ?></label>
                                    <select name="mobile_numer_country" id="countryCallingCode" class="form-control">
                                        <option value="0">Country</option>
                                        <option value="93">Afghanistan (+93)</option>
                                        <option value="355">Albania (+355)</option>
                                        <option value="213">Algeria (+213)</option>
                                        <option value="1684">American Samoa (+1684)</option>
                                        <option value="376">Andorra (+376)</option>
                                        <option value="244">Angola (+244)</option>
                                        <option value="1264">Anguilla (+1264)</option>
                                        <option value="1268">Antigua &amp; Barbuda (+1268)</option>
                                        <option value="54">Argentina (+54)</option>
                                        <option value="374">Armenia (+374)</option>
                                        <option value="297">Aruba (+297)</option>
                                        <option value="61">Australia (+61)</option>
                                        <option value="43">Austria (+43)</option>
                                        <option value="994">Azerbaijan (+994)</option>
                                        <option value="1242">Bahamas (+1242)</option>
                                        <option value="973">Bahrain (+973)</option>
                                        <option value="880">Bangladesh (+880)</option>
                                        <option value="1246">Barbados (+1246)</option>
                                        <option value="375">Belarus (+375)</option>
                                        <option value="32">Belgium (+32)</option>
                                        <option value="501">Belize (+501)</option>
                                        <option value="229">Benin (+229)</option>
                                        <option value="1441">Bermuda (+1441)</option>
                                        <option value="975">Bhutan (+975)</option>
                                        <option value="591">Bolivia (+591)</option>
                                        <option value="599">Bonaire, Sint Eustatius and Saba (+599)</option>
                                        <option value="387">Bosnia Herzegovina (+387)</option>
                                        <option value="267">Botswana (+267)</option>
                                        <option value="55">Brazil (+55)</option>
                                        <option value="1">British Virgin Islands (+1)</option>
                                        <option value="673">Brunei Darussalam (+673)</option>
                                        <option value="359">Bulgaria (+359)</option>
                                        <option value="226">Burkina Faso (+226)</option>
                                        <option value="257">Burundi (+257)</option>
                                        <option value="855">Cambodia (+855)</option>
                                        <option value="237">Cameroon (+237)</option>
                                        <option value="1">Canada (+1)</option>
                                        <option value="238">Cape Verde (+238)</option>
                                        <option value="1345">Cayman Islands (+1345)</option>
                                        <option value="235">Chad (+235)</option>
                                        <option value="56">Chile (+56)</option>
                                        <option value="86">China (+86)</option>
                                        <option value="61">Cocos (Keeling) Islands (+61)</option>
                                        <option value="57">Colombia (+57)</option>
                                        <option value="269">Comoros (+269)</option>
                                        <option value="682">Cook Islands (+682)</option>
                                        <option value="506">Costa Rica (+506)</option>
                                        <option value="225">Cote D'ivoire (+225)</option>
                                        <option value="385">Croatia (+385)</option>
                                        <option value="599">Curacao (+599)</option>
                                        <option value="357">Cyprus (+357)</option>
                                        <option value="420">Czech Republic (+420)</option>
                                        <option value="242">Democratic Republic of the&nbsp;Congo (+242)</option>
                                        <option value="45">Denmark (+45)</option>
                                        <option value="253">Djibouti (+253)</option>
                                        <option value="1767">Dominica (+1767)</option>
                                        <option value="1809">Dominican Republic (+1809)</option>
                                        <option value="593">Ecuador (+593)</option>
                                        <option value="20">Egypt (+20)</option>
                                        <option value="503">El Salvador (+503)</option>
                                        <option value="240">Equatorial Guinea (+240)</option>
                                        <option value="291">Eritrea (+291)</option>
                                        <option value="372">Estonia (+372)</option>
                                        <option value="251">Ethiopia (+251)</option>
                                        <option value="500">Falkland Islands (+500)</option>
                                        <option value="298">Faroe Islands (+298)</option>
                                        <option value="691">Federated States of Micronesia (+691)</option>
                                        <option value="679">Fiji (+679)</option>
                                        <option value="358">Finland (+358)</option>
                                        <option value="33">France (+33)</option>
                                        <option value="594">French Guiana (+594)</option>
                                        <option value="689">French Polynesia (+689)</option>
                                        <option value="241">Gabon (+241)</option>
                                        <option value="220">Gambia (+220)</option>
                                        <option value="995">Georgia (+995)</option>
                                        <option value="49">Germany (+49)</option>
                                        <option value="233">Ghana (+233)</option>
                                        <option value="350">Gibraltar (+350)</option>
                                        <option value="30">Greece (+30)</option>
                                        <option value="299">Greenland (+299)</option>
                                        <option value="1473">Grenada (+1473)</option>
                                        <option value="590">Guadeloupe (+590)</option>
                                        <option value="1671">Guam (+1671)</option>
                                        <option value="502">Guatemala (+502)</option>
                                        <option value="441481">Guernsey (+441481)</option>
                                        <option value="224">Guinea (+224)</option>
                                        <option value="245">Guinea-Bissau (+245)</option>
                                        <option value="592">Guyana (+592)</option>
                                        <option value="509">Haiti (+509)</option>
                                        <option value="504">Honduras (+504)</option>
                                        <option value="852">Hong Kong (+852)</option>
                                        <option value="36">Hungary (+36)</option>
                                        <option value="354">Iceland (+354)</option>
                                        <option value="91">India (+91)</option>
                                        <option value="62">Indonesia (+62)</option>
                                        <option value="353">Ireland (+353)</option>
                                        <option value="441624">Isle Of Man (+441624)</option>
                                        <option value="972">Israel (+972)</option>
                                        <option value="39">Italy (+39)</option>
                                        <option value="1876">Jamaica (+1876)</option>
                                        <option value="81">Japan (+81)</option>
                                        <option value="441534">Jersey (+441534)</option>
                                        <option value="962">Jordan (+962)</option>
                                        <option value="7">Kazakhstan (+7)</option>
                                        <option value="254">Kenya (+254)</option>
                                        <option value="686">Kiribati (+686)</option>
                                        <option value="383">Kosovo (+383)</option>
                                        <option value="965">Kuwait (+965)</option>
                                        <option value="996">Kyrgyzstan (+996)</option>
                                        <option value="856">Laos (+856)</option>
                                        <option value="371">Latvia (+371)</option>
                                        <option value="961">Lebanon (+961)</option>
                                        <option value="266">Lesotho (+266)</option>
                                        <option value="423">Liechtenstein (+423)</option>
                                        <option value="370">Lithuania (+370)</option>
                                        <option value="352">Luxembourg (+352)</option>
                                        <option value="853">Macau (+853)</option>
                                        <option value="389">Macedonia (+389)</option>
                                        <option value="261">Madagascar (+261)</option>
                                        <option value="265">Malawi (+265)</option>
                                        <option value="60">Malaysia (+60)</option>
                                        <option value="960">Maldives (+960)</option>
                                        <option value="223">Mali (+223)</option>
                                        <option value="356">Malta (+356)</option>
                                        <option value="692">Marshall Islands (+692)</option>
                                        <option value="596">Martinique (+596)</option>
                                        <option value="222">Mauritania (+222)</option>
                                        <option value="230">Mauritius (+230)</option>
                                        <option value="262">Mayotte (+262)</option>
                                        <option value="52">Mexico (+52)</option>
                                        <option value="373">Moldova (+373)</option>
                                        <option value="377">Monaco (+377)</option>
                                        <option value="976">Mongolia (+976)</option>
                                        <option value="382">Montenegro (+382)</option>
                                        <option value="1664">Montserrat (+1664)</option>
                                        <option value="212">Morocco (+212)</option>
                                        <option value="258">Mozambique (+258)</option>
                                        <option value="95">Myanmar (+95)</option>
                                        <option value="264">Namibia (+264)</option>
                                        <option value="977">Nepal (+977)</option>
                                        <option value="31">Netherlands (+31)</option>
                                        <option value="687">New Caledonia (+687)</option>
                                        <option value="64">New Zealand (+64)</option>
                                        <option value="505">Nicaragua (+505)</option>
                                        <option value="227">Niger (+227)</option>
                                        <option value="234">Nigeria (+234)</option>
                                        <option value="683">Niue (+683)</option>
                                        <option value="672">Norfolk Island (+672)</option>
                                        <option value="1670">Northern Mariana Islands (+1670)</option>
                                        <option value="47">Norway (+47)</option>
                                        <option value="968">Oman (+968)</option>
                                        <option value="92">Pakistan (+92)</option>
                                        <option value="680">Palau (+680)</option>
                                        <option value="970">Palestinian Territory (+970)</option>
                                        <option value="507">Panama (+507)</option>
                                        <option value="675">Papua New Guinea (+675)</option>
                                        <option value="595">Paraguay (+595)</option>
                                        <option value="51">Peru (+51)</option>
                                        <option value="63">Philippines (+63)</option>
                                        <option value="48">Poland (+48)</option>
                                        <option value="351">Portugal (+351)</option>
                                        <option value="1787">Puerto Rico (+1787)</option>
                                        <option value="974">Qatar (+974)</option>
                                        <option value="243">Republic of Congo (+243)</option>
                                        <option value="262">Reunion Island (+262)</option>
                                        <option value="40">Romania (+40)</option>
                                        <option value="7">Russia (+7)</option>
                                        <option value="250">Rwanda (+250)</option>
                                        <option value="590">Saint Barthelemy (+590)</option>
                                        <option value="1">Saint Kitts And Nevis (+1)</option>
                                        <option value="1">Saint Lucia (+1)</option>
                                        <option value="590">Saint Martin (France) (+590)</option>
                                        <option value="508">Saint Pierre and Miquelon (+508)</option>
                                        <option value="685">Samoa (+685)</option>
                                        <option value="378">San Marino (+378)</option>
                                        <option value="239">Sao Tome and Principe (+239)</option>
                                        <option value="966">Saudi Arabia (+966)</option>
                                        <option value="221">Senegal (+221)</option>
                                        <option value="381">Serbia (+381)</option>
                                        <option value="248">Seychelles (+248)</option>
                                        <option value="232">Sierra Leone (+232)</option>
                                        <option value="65">Singapore (+65)</option>
                                        <option value="1">Sint Maarten (Netherlands) (+1)</option>
                                        <option value="421">Slovakia (+421)</option>
                                        <option value="386">Slovenia (+386)</option>
                                        <option value="677">Solomon Islands (+677)</option>
                                        <option value="27">South Africa (+27)</option>
                                        <option value="82">South Korea (+82)</option>
                                        <option value="211">South Sudan (+211)</option>
                                        <option value="34">Spain (+34)</option>
                                        <option value="94">Sri Lanka (+94)</option>
                                        <option value="1784">St. Vincent &amp; Grenadines (+1784)</option>
                                        <option value="597">Suriname (+597)</option>
                                        <option value="268">Swaziland (+268)</option>
                                        <option value="46">Sweden (+46)</option>
                                        <option value="41">Switzerland (+41)</option>
                                        <option value="886">Taiwan (+886)</option>
                                        <option value="992">Tajikistan (+992)</option>
                                        <option value="255">Tanzania (+255)</option>
                                        <option value="66">Thailand (+66)</option>
                                        <option value="670">Timor-Leste (+670)</option>
                                        <option value="228">Togo (+228)</option>
                                        <option value="676">Tonga (+676)</option>
                                        <option value="1868">Trinidad &amp; Tobago (+1868)</option>
                                        <option value="216">Tunisia (+216)</option>
                                        <option value="90">Turkey (+90)</option>
                                        <option value="1649">Turks &amp; Caicos Islands (+1649)</option>
                                        <option value="688">Tuvalu (+688)</option>
                                        <option value="1">U.S. Virgin Islands (+1)</option>
                                        <option value="256">Uganda (+256)</option>
                                        <option value="380">Ukraine (+380)</option>
                                        <option value="971">United Arab Emirates (+971)</option>
                                        <option value="44">United Kingdom (+44)</option>
                                        <option value="1">United States (+1)</option>
                                        <option value="598">Uruguay (+598)</option>
                                        <option value="998">Uzbekistan (+998)</option>
                                        <option value="678">Vanuatu (+678)</option>
                                        <option value="58">Venezuela (+58)</option>
                                        <option value="84">Vietnam (+84)</option>
                                        <option value="681">Wallis and Futuna (+681)</option>
                                        <option value="260">Zambia (+260)</option>
                                        <option value="263">Zimbabwe (+263)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label"><?php echo __('Phone Number'); ?></label>
                                    <input name="phone_number" type="tel" id="phoneNumber" class="form-control" value="<?= $user_datass->phone_number; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h6><?php echo __('Bank Account'); ?></h6>


                <div id="profile-name">
                    <div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label"><?php echo __('Bank Name'); ?></label>
                                    
                                    <?php if(!empty(@$edit_det->bank_name)){ ?>
                                            <script>
                                                $(document).ready(function(){
                                                    $('#bank_name').val('<?=@$edit_det->bank_name;?>');
                                                });
                                                
                                            </script>
                                            <?php }
                                            ?>
                                    <select name="bank_name" id="bank_name" class="form-control">
                                        <option value="0"><?php echo __('Bank Name'); ?></option>
                                        <option value="Banco Angolano de Investimentos (BAI)">Banco Angolano de Investimentos (BAI)</option>
                                        <option value="Banco Angolano de Negócios e Comércio (BANC)">Banco Angolano de Negócios e Comércio (BANC)</option>
                                        <option value="Banco Yetu (YETU)">Banco Yetu (YETU)</option>
                                        <option value="Banco BIC (BIC)">Banco BIC (BIC)</option>
                                        <option value="Banco Comercial Angolano (BCA)">Banco Comercial Angolano (BCA)</option>
                                        <option value="Banco de Comércio e Indústria (BCI)">Banco de Comércio e Indústria (BCI)</option>
                                        <option value="Banco Económico">Banco Económico</option>
                                        <option value="Banco de Fomento Angola (BFA)">Banco de Fomento Angola (BFA)</option>
                                        <option value="Banco de Poupança e Crédito (BPC)">Banco de Poupança e Crédito (BPC)</option>
                                        <option value="Banco de Negócios Internacional (BNI)">Banco de Negócios Internacional (BNI)</option>
                                        <option value="Banco Keve">Banco Keve</option>
                                        <option value="Banco Sol">Banco Sol</option>
                                        <option value="Banco Caixa Geral Totta">Banco Caixa Geral Totta</option>
                                        <option value="Banco Millennium Atlântico">Banco Millennium Atlântico</option>
                                        <option value="Banco VTB África">Banco VTB África</option>
                                        <option value="Finibanco">Finibanco</option>
                                        <option value="Banco BAI Micro Finanças (BMF)">Banco BAI Micro Finanças (BMF)</option>
                                        <option value="Banco Comercial do Huambo (BCH)">Banco Comercial do Huambo (BCH)</option>
                                        <option value="Standard Bank (SBA)">Standard Bank (SBA)</option>
                                        <option value="Banco Valor">Banco Valor</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="control-label">IBAN</label>
                                    <input name="account_iban" type="text" id="account_iban" placeholder="AO06 XXXX XXXX XXXX XXXX XXXX X" class="form-control" value="<?= $edit_det->account_iban; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h6><?php echo __('Your Location'); ?></h6>

                <div id="profile-name">
                    <label class="control-label"><?php echo __('Country'); ?></label>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <select id="country" name="nationality" class="form-control" onchange="mapCountryChecker(this.value)" required>
                                        <option selected disabled value=""><?php echo __('Select'); ?></option>
                                        <?php
                                        $countries = $this->User->allcountry();
                                        foreach ($countries as $val) {
                                            if (!empty($val->country_name)) {
                                                ?>                               
                                                <option value="<?= $val->country_name; ?>"><?= $val->country_name; ?></option>                                   
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                        </div>
                        
                        <div class="col-md-4 col-sm-6" style="margin-top: -26px;">
                            <label class="control-label"><?php echo __('Province'); ?></label>
                                <select id="state" name="state" class="form-control" onchange="mapChecker(this.value)" required>
                                        <option selected disabled value=""><?php echo __('Select'); ?></option>
                                        <?php
                                        $states = $this->User->allstate();
                                        foreach ($states as $val) {
                                            if (!empty($val->state_name)) {
                                                ?>                               
                                                <option value="<?= $val->state_name; ?>" ><?= $val->state_name; ?></option>                                   
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                        </div>
                        <div class="hidden-sm hidden-xs col-md-4" style="margin-top: -26px;">
                            <label class="control-label"><?php echo __('Municipality'); ?>
                               

                            </label>
                                <select id="city" name="city" class="form-control" onclick="($('#city option:selected').val()=='')?$('.erop').html('<p style=\'color:red;\'>Select Province first<p>'):$('.erop').html('');" required>
                                        <option selected disabled value=""><?php echo __('Select'); ?></option>
                                        <?php
                                        $city = $this->User->allcity();
                                        foreach ($city as $val) {
                                            if (!empty($val->city_name)) {
                                                ?>                               
                                                <option value="<?= $val->city_name; ?>"><?= $val->city_name; ?></option>                                
                                            <?php
                                            }
                                        }
                                        ?>
                                    </select>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h6><?php echo __('Describe Yourself'); ?></h6>
                <div id="profile-name">
                    <div class="form-group">
                        <div>
                            <textarea rows="5" name="description" type="text" id="userDescription" class="form-control" placeholder="Description"><?= $edit_det->description; ?></textarea>
                            <small class="form-control-counter-text pull-right m-t-1 p-l-3">200</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8">
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <div class="cancel" style="margin-left: 15px;margin-top: 25px;">
                    <span type="button" class="btn-next-save" onclick="openCity(event, 'Overview')"><?php echo __('Cancel'); ?></span>
                </div>
                <div class="save" style="float: left;padding-left: 25px;margin-top: 25px;">
                    <button type="submit" class="btn-next-save"><?php echo __('Save'); ?></button>
                </div>
            </div>
<?= $this->Form->end(); ?>
        </div>
    </div>

</div>


<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>

<script type="text/javascript">
    $(document).ready(function () {
         <?php if($edit_det->nationality != ''){ ?>
        mapCountryChecker('<?= $edit_det->nationality; ?>');
        mapChecker('<?= $edit_det->state; ?>');
       <?php } ?>

        $('[name=mobile_numer_country]').val('<?= $edit_det->mobile_numer_country; ?>');
        $('[name=mobile_sms_language]').val('<?= $edit_det->mobile_sms_language; ?>');
         $('[name=where_live]').val('<?= $edit_det->where_live; ?>');
        $('[name=state]').val('<?= $edit_det->state; ?>');
        $('[name=city]').val('<?= $edit_det->city; ?>');
        $('[name=nationality]').val('<?= $edit_det->nationality; ?>');





    });
</script>

<script>
    function mapChecker(id) {
       //alert(id);
        
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/get_city_states",
            dataType: 'html',
            data: {mainid: id},
            success: function (res) {
                $('#city').html('');
                $('#city').html(res);
                $('[name=city]').val('<?= $edit_det->city; ?>');
                //alert(res);
            }
        });
        
    }
</script>
<script>
    function mapCountryChecker(nm) {
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/get_states_name",
            dataType: 'html',
            data: {country_name: nm},
            success: function (res) {
                $('#state').html('');
                $('#state').html(res);
                $('[name=state]').val('<?= $edit_det->state; ?>');

            }
        });
    }
</script>
<script>
    function mapStateChecker(nm) {
        jQuery.ajax({
            type: "POST",
            url: "<?= HTTP_ROOT; ?>" + "extranets/get_city_name",
            dataType: 'html',
            data: {state_name: nm},
            success: function (res) {
                $('#city').html('');
                $('#city').html(res);

            }
        });
    }
</script>

<script>
    var croppicHeaderOptions = {
        //uploadUrl:'img_save_to_file.php',
        cropData: {
            "dummyData": 1,
            "dummyData2": "asdas"
        },
        cropUrl: '<?= HTTP_ROOT; ?>extranets/img_crop_to_file',
        customUploadButtonId: 'cropContainerHeaderButton',
        modal: false,
        processInline: true,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function () {
            console.log('onBeforeImgUpload');
        },
        onAfterImgUpload: function () {
            console.log('onAfterImgUpload')
        },
        onImgDrag: function () {
            console.log('onImgDrag')
        },
        onImgZoom: function () {
            console.log('onImgZoom')
        },
        onBeforeImgCrop: function () {
            console.log('onBeforeImgCrop')
        },
        onAfterImgCrop: function () {
            console.log('onAfterImgCrop')
        },
        onReset: function () {
            console.log('onReset')
        },
        onError: function (errormessage) {
            console.log('onError:' + errormessage)
        }
    }
    var croppic = new Croppic('croppic', croppicHeaderOptions);


    var croppicContainerModalOptions = {
        uploadUrl: '<?= HTTP_ROOT; ?>extranets/img_save_to_file',
        cropUrl: '<?= HTTP_ROOT; ?>extranets/img_crop_to_file',
        modal: true,
        imgEyecandyOpacity: 0.4,
        loaderHtml: '<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
        onBeforeImgUpload: function () {
            console.log('onBeforeImgUpload')
        },
        onAfterImgUpload: function () {
            console.log('onAfterImgUpload')
        },
        onImgDrag: function () {
            console.log('onImgDrag')
        },
        onImgZoom: function () {
            console.log('onImgZoom')
        },
        onBeforeImgCrop: function () {
            console.log('onBeforeImgCrop')
        },
        onAfterImgCrop: function () {
            console.log('onAfterImgCrop')
        },
        onReset: function () {
            console.log('onReset')
        },
        onError: function (errormessage) {
            console.log('onError:' + errormessage)
        }
    }
    var cropContainerModal = new Croppic('cropContainerModal', croppicContainerModalOptions);





</script>