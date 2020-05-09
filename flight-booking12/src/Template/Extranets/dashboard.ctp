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
                <h1><?= __("Welcome back"); ?>, <?= $this->request->session()->read('Auth.User.name'); ?>!</h1>
                <h6>Let's see what we can do today to get more bookings.</h6>
            </div>
        </div>
        <div class="row">
            <div class="overview-part">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <h3>Booking booster</h3>
                    <img src="<?= $this->Url->image('extranet/positiffeedback-small.png'); ?>">
                    <h2>Good job! Booking booster actions complete!</h2>
                    <p>Your listings are optimized. Check here regularly for more tips and insights.</p>
                </div>
                <div class="col-sm-4 col-md-4 col-lg-4">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h3>Host profile</h3>
                            <div class="host-profile">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3 col-lg-3">
<?php if ($user_datass->profile_photo != "") { ?> <img src='<?= HTTP_ROOT . $user_datass->profile_photo; ?>' alt="usr" width="90"><?php } else { ?> <i class="fa fa-user" aria-hidden="true"></i><?php } ?>

                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6"><h4><?= $user_datass->first_name; ?> <?= $user_datass->sur_name; ?></h4></div>
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        <span class="btn btn-outline-primary profile-summary__edit-btn" onclick="openCity(event, 'Profile')">
                                            <strong>Edit</strong>
                                        </span>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12 host-profile-middle">
                                        <div class="host-profile-left"><i class="fa fa-envelope" aria-hidden="true"></i>Response rate</div>
                                        <div class="host-profile-right"><i class="fa fa-envelope" aria-hidden="true"></i>Avg. response time</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h3>Feedback</h3>
                            <div class="feedback">
                                <div class="row">
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                        <img src="<?= $this->Url->image('extranet/announcment.png'); ?>">
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10">
                                        <p>Help us to improve the product you use</p>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="give-us"><a href="#">Give us feedback</a></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="agodaapp">
                <div class="col-sm-7 col-md-7 col-lg-7">
                    <h2>The Agoda app makes hosting even easier!</h2>
                    <p>The Agoda app’s Host Mode gives you on-the-go access to managing availability, prices, content, and more. Download it now!</p>
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
    </div>           
</div>

<div id="Listings" class="tabcontent">
    <div class="container">
        <div class="row">
            <div class="listings-tab">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <span class="search-container">
                        <input type="text" id="search-bar" placeholder="Search (property ID or name)" onkeyup="searchData(event, this.value)">
                        <a href="javascript:void();"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
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
                    <h2><a href="<?= HTTP_ROOT; ?>extranets/basic_tab">+ADD A NEW LISTING</a></h2>
                </div>
                <div id="original">
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        <div class="homes-left"></div>
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        Homes
                    </div>
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        <div class="homes-right"></div>
                    </div>
<?php foreach ($propertyList as $list) { ?>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="unnamed-property">
    <?= $this->User->getPropic($list->id); ?>                              
                                <div class="unnamed-property-text">[<?= sprintf('%07d', $list->id); ?>] <?= $this->User->getProName($list->id); ?> </div>
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
<?php } ?>
                    <!--                <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="unnamed-property">
                                            <i class="fa fa-home" aria-hidden="true"></i>
                                            <div class="unnamed-property-text">[6250140] goog hh</div>
                                            <div class="unfinished">Unfinished</div>
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
                <h2>Hosting</h2>
                <div class="button dropdown"> 
                    <select id="colorselector">
                        <option value="red">All hosting messages</option>
                        <option value="yellow">Unread</option>
                        <option value="blue">Read</option>
                    </select>
                </div>
                <div class="output">
                    <div id="red" class="colors red">  “Good artists copy, great artists steal” Pablo Picasso</div>
                    <div id="yellow" class="colors yellow"> “Art is the lie that enables us to realize the truth” Pablo Picasso</div>
                    <div id="blue" class="colors blue"> “If I don't have red, I use blue” Pablo Picasso</div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <img src="<?= $this->Url->image('extranet/no-message-yet.png'); ?>">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h4>No messages yet</h4>
                <h6>You haven’t received any message, try to optimize your content to make your property appealling.</h6>
            </div>
        </div>
    </div>
</div>

<div id="Profile" class="tabcontent">
    <div class="container">
        <div class="row">
<?= $this->Form->create('', ['type' => 'post']); ?>
            <div class="col-sm-12 col-md-12 col-lg-12 ">
                <h2>Add/Change profile photo (optional)</h2>
                <p>Put a face to your name! We’ll add this to your profile, and share it with future hosts and guests.</p>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div id="Profile-property">
                    <div>
                        <div id="cropContainerModal"><?php if ($user_datass->profile_photo != "") { ?> <img src='<?= HTTP_ROOT . $user_datass->profile_photo; ?>' alt="usr"><?php } else { ?><i class="fas fa-user-circle" style='font-size: 40px;'></i><?php } ?></div>

                    </div>
                    <div id="Profile-change-text">Your picture matters. Pick a clear and friendly-looking one, to increase bookings.</div>
                    <div class="change" onclick="$('.cropControlUpload').click();">
                        <span  class="btn btn-default" style="padding: 10px;border: 1px solid black;color: black;" >Add/Change profile photo</span></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h6>Name</h6>
                <div id="profile-name">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="firstName" class="control-label">First name</label>
                                <input maxlength="25" name="first_name" type="text" id="firstName" class="form-control" value="<?= $user_datass->first_name; ?>">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="lastName" class="control-label">Last name</label>
                                <input maxlength="25" name="sur_name" type="text" id="lastName" class="form-control" value=" <?= $user_datass->sur_name; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="displayName" class="control-label">Display name (optional)</label>
                                        <p class="m-b-2">This is the name that will be shown on Agoda website and app.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input maxlength="25" name="diapaly_name" type="text" id="displayName" class="form-control" value="<?= $edit_det->diapaly_name; ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12"></div>                                                
                                </div>                                            
                            </div>                                        
                        </div>                                    
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h6>Contact Details</h6>


                <div id="profile-name">
                    <div>
                        <label class="control-label">Mobile phone number (we will send you an SMS to verify)</label>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
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
                                    <input name="phone_number" type="tel" id="phoneNumber" class="form-control" value="<?= $user_datass->phone_number; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="preferenceLanguageId" class="control-label">Language preference</label>
                                <p class="m-b-2">This is the language which Agoda Homes will contact you.</p>
                                <select name="mobile_sms_language" id="preferenceLanguageId" class="form-control">
                                    <option value="1">English</option>
                                    <option value="2">Français</option>
                                    <option value="3">Deutsch</option>
                                    <option value="4">Italiano</option>
                                    <option value="5">Español</option>
                                    <option value="6">日本語</option>
                                    <option value="7">繁體中文 (香港)</option>
                                    <option value="8">简体中文</option>
                                    <option value="9">한국어</option>
                                    <option value="10">Ελληνικά</option>
                                    <option value="11">Русский</option>
                                    <option value="12">Português</option>
                                    <option value="13">Nederlands</option>
                                    <option value="20">繁體中文 (台灣)</option>
                                    <option value="22">ภาษาไทย</option>
                                    <option value="23">Bahasa Malaysia</option>
                                    <option value="24">Tiếng Việt</option>
                                    <option value="25">Svenska</option>
                                    <option value="26">Bahasa Indonesia</option>
                                    <option value="27">Język polski</option>
                                    <option value="28">Norsk</option>
                                    <option value="29">Dansk</option>
                                    <option value="30">Suomi</option>
                                    <option value="31">Čeština</option>
                                    <option value="32">Türkçe</option>
                                    <option value="33">Català</option>
                                    <option value="34">Magyar</option>
                                    <option value="36">Български език</option>
                                    <option value="38">Slovenski jezik</option>
                                    <option value="40">العربية</option>
                                    <option value="43">Português </option>
                                    <option value="35">हिन्दी</option>
                                    <option value="37">Română</option>
                                    <option value="39">עברית</option>
                                    <option value="46">Lietuvių</option>
                                    <option value="47">Latviešu</option>
                                    <option value="48">Hrvatski</option>
                                    <option value="49">Eesti</option>
                                    <option value="50">Українська</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h6>Location details</h6>


                <div id="profile-name">
                    <label class="control-label">Where you live</label>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <select name="where_live" id="countryId" class="form-control">
                                <option value="0">Country</option>
                                <?php
                                $countries = $this->User->allcountry();
                                foreach ($countries as $val) {
                                    if (!empty($val->country)) {
                                        ?>                               
                                        <option value="<?= $val->country; ?>"><?= $val->country; ?></option>                                   
                                        <?php
                                    }
                                }
                                ?>

                            </select>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <select name="state" id="stateId" class="form-control">
                                    <option value="0">State/Province</option>
                                    <?php
                                    $cities = $this->User->allcity();
                                    foreach ($cities as $val) {
                                        if (!empty($val->city)) {
                                            ?>                               
                                            <option value="<?= $val->city; ?>"><?= $val->city; ?></option>                                   
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="hidden-sm hidden-xs col-md-4">
                            <div class="form-group">
                                <select name="city" id="cityId" class="form-control">
                                    <option value="0">City</option>
                                    <?php
                                    $cities = $this->User->allcity();
                                    foreach ($cities as $val) {
                                        if (!empty($val->city)) {
                                            ?>                               
                                            <option value="<?= $val->city; ?>"><?= $val->city; ?></option>                                   
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <div class="form-group">
                                <label for="nationalityId" class="control-label">Nationality</label>
                                <select name="nationality" id="nationalityId" class="form-control">
                                    <option value="0">Country</option>
                                    <?php
                                    $countries = $this->User->allcountry();
                                    foreach ($countries as $val) {
                                        if (!empty($val->country)) {
                                            ?>                               
                                            <option value="<?= $val->country; ?>"><?= $val->country; ?></option>                                   
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <h6>Describe yourself</h6>
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
                <div class="cancel">
                    <span type="button" class=" text-uppercase btn btn-primary" onclick="openCity(event, 'Overview')">Cancel</span>
                </div>
                <div class="save" style="float: left;padding-left: 25px;">
                    <button type="submit" class="ladda-btn btn-min-width-160 text-uppercase submit-btn btn btn-primary">Save</button>
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
        $('[name=mobile_numer_country]').val('<?= $edit_det->mobile_numer_country; ?>');
        $('[name=mobile_sms_language]').val('<?= $edit_det->mobile_sms_language; ?>');
        $('[name=where_live]').val('<?= $edit_det->where_live; ?>');
        $('[name=state]').val('<?= $edit_det->state; ?>');
        $('[name=city]').val('<?= $edit_det->city; ?>');
        $('[name=nationality]').val('<?= $edit_det->nationality; ?>');
    });
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