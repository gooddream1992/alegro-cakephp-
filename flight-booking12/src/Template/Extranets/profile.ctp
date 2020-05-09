<?php
$usr_all_det = $this->User->usrdetHelper($this->request->session()->read('Auth.User.id'));
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


<section class="basics">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
<?= $this->element('extranet/sidebar'); ?>
            </div>

            <div class="col-md-10">
                <div class="head-section">
                    <div class="Profile ">

                        <h1>Tell us who you are<span>Please provide your full legal name here for your contract with Agoda. If additional information is needed to list your property, we will contact you.</span></h1>


                        <div class="recommended">
                            <h5>Add/Change profile photo (optional) <span>Put a face to your name! We’ll add this to your profile, and share it with future hosts and guests.</span></h5>
                            <div class="upload-section">
                                <ul>
                                    <li>
                                        <div>
                                            <div id="cropContainerModal"><?php if ($usr_all_det->profile_photo != "") { ?> <img src='<?= HTTP_ROOT . $usr_all_det->profile_photo; ?>' alt="usr"><?php } else { ?><i class="fas fa-user-circle"></i><?php } ?></div>

                                        </div>
                                    </li>
                                    <li><p>Your picture matters. Pick a clear and friendly-looking one, to increase bookings.</p></li>
                                    <li><span class='btn btn-default' class="btn btn-default" style="padding: 10px;" onclick="$('.cropControlUpload').click();">ADD/CHANGE PROFILE PHOTO</span></li>
                                </ul>
                            </div>
                        </div>
<?= $this->Form->create('', ['type' => 'post', 'id' => 'profile-page']); ?>
                        <div class="recommended">
                            <h5>Name</h5>
                            <div class="name">

                                <ul>							
                                    <li>
                                        <div>
                                            <label>First Name</label>
                                            <input type="text" name="first_name" value='<?= $usr_all_det->first_name; ?>'>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <label>Last Name</label>
                                            <input type="text" name="sur_name" value='<?= $usr_all_det->sur_name; ?>'>
                                        </div>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <div>
                                            <label>Display name (optional)<span>This is the name that will be shown on Agoda website and app.</span></label>
                                            <input maxlength="25" name="diapaly_name" type="text" id="displayName" class="form-control" value="<?= $edit_det->diapaly_name; ?>">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="recommended">
                            <h5>Contact Details</h5>
                            <div class="contact">
                                <ul>							
                                    <li>
                                        <label>Mobile phone number (we will send you an SMS to verify)</label>
                                    </li>
                                    <li>
                                        <div>
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
                                        <div>
                                            <input name="phone_number" type="tel" id="phoneNumber" class="form-control" value="<?= $usr_all_det->phone_number; ?>">
                                        </div>
                                    </li>									
                                </ul>
                                <ul>
                                    <li>
                                        <div>
                                            <div class="form-group" style="width: 100%;">
                                                <label for="preferenceLanguageId" class="control-label">Language preference</label>
                                                <p>This is the language which Agoda Homes will contact you.</p>
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
                                    </li>
                                </ul>										
                            </div>
                        </div>	
                        <div class="recommended">
                            <h5>Location Details</h5>
                            <div class="loacation-details">
                                <ul>							
                                    <li>
                                        <label>where you live</label>
                                    </li>
                                    <li>
                                        <div>
                                            <select name="where_live" id="countryId" class="form-control">
                                                <option value="0">Country</option>
                                                <option value="288">Afghanistan</option>
                                                <option value="53">Albania</option>
                                                <option value="143">Algeria</option>
                                                <option value="289">American Samoa</option>
                                                <option value="189">Andorra</option>
                                                <option value="290">Angola</option>
                                                <option value="150">Anguilla</option>
                                                <option value="50">Antigua &amp; Barbuda</option>
                                                <option value="5">Argentina</option>
                                                <option value="246">Armenia</option>
                                                <option value="66">Aruba</option>
                                                <option value="139">Australia</option>
                                                <option value="130">Austria</option>
                                                <option value="135">Azerbaijan</option>
                                                <option value="60">Bahamas</option>
                                                <option value="202">Bahrain</option>
                                                <option value="117">Bangladesh</option>
                                                <option value="94">Barbados</option>
                                                <option value="21">Belarus</option>
                                                <option value="118">Belgium</option>
                                                <option value="88">Belize</option>
                                                <option value="231">Benin</option>
                                                <option value="6">Bermuda</option>
                                                <option value="291">Bhutan</option>
                                                <option value="15">Bolivia</option>
                                                <option value="344">Bonaire, Sint Eustatius and Saba</option>
                                                <option value="103">Bosnia Herzegovina</option>
                                                <option value="206">Botswana</option>
                                                <option value="207">Brazil</option>
                                                <option value="77">British Virgin Islands</option>
                                                <option value="63">Brunei Darussalam</option>
                                                <option value="126">Bulgaria</option>
                                                <option value="237">Burkina Faso</option>
                                                <option value="229">Burundi</option>
                                                <option value="163">Cambodia</option>
                                                <option value="36">Cameroon</option>
                                                <option value="100">Canada</option>
                                                <option value="292">Cape Verde</option>
                                                <option value="142">Cayman Islands</option>
                                                <option value="236">Chad</option>
                                                <option value="69">Chile</option>
                                                <option value="191">China</option>
                                                <option value="321">Cocos (Keeling) Islands</option>
                                                <option value="10">Colombia</option>
                                                <option value="294">Comoros</option>
                                                <option value="225">Cook Islands</option>
                                                <option value="40">Costa Rica</option>
                                                <option value="165">Cote D'ivoire</option>
                                                <option value="128">Croatia</option>
                                                <option value="342">Curacao</option>
                                                <option value="24">Cyprus</option>
                                                <option value="13">Czech Republic</option>
                                                <option value="337">Democratic Republic of the&nbsp;Congo</option>
                                                <option value="158">Denmark</option>
                                                <option value="244">Djibouti</option>
                                                <option value="341">Dominica</option>
                                                <option value="134">Dominican Republic</option>
                                                <option value="52">Ecuador</option>
                                                <option value="16">Egypt</option>
                                                <option value="80">El Salvador</option>
                                                <option value="295">Equatorial Guinea</option>
                                                <option value="242">Eritrea</option>
                                                <option value="99">Estonia</option>
                                                <option value="240">Ethiopia</option>
                                                <option value="322">Falkland Islands</option>
                                                <option value="200">Faroe Islands</option>
                                                <option value="218">Federated States of Micronesia</option>
                                                <option value="109">Fiji</option>
                                                <option value="28">Finland</option>
                                                <option value="153">France</option>
                                                <option value="113">French Guiana</option>
                                                <option value="14">French Polynesia</option>
                                                <option value="234">Gabon</option>
                                                <option value="286">Gambia</option>
                                                <option value="71">Georgia</option>
                                                <option value="101">Germany</option>
                                                <option value="151">Ghana</option>
                                                <option value="4">Gibraltar</option>
                                                <option value="197">Greece</option>
                                                <option value="26">Greenland</option>
                                                <option value="184">Grenada</option>
                                                <option value="89">Guadeloupe</option>
                                                <option value="208">Guam</option>
                                                <option value="41">Guatemala</option>
                                                <option value="406">Guernsey</option>
                                                <option value="58">Guinea</option>
                                                <option value="296">Guinea-Bissau</option>
                                                <option value="243">Guyana</option>
                                                <option value="47">Haiti</option>
                                                <option value="39">Honduras</option>
                                                <option value="132">Hong Kong</option>
                                                <option value="37">Hungary</option>
                                                <option value="54">Iceland</option>
                                                <option value="35">India</option>
                                                <option value="192">Indonesia</option>
                                                <option value="188">Ireland</option>
                                                <option value="405">Isle Of Man</option>
                                                <option value="144">Israel</option>
                                                <option value="205">Italy</option>
                                                <option value="42">Jamaica</option>
                                                <option value="3">Japan</option>
                                                <option value="404">Jersey</option>
                                                <option value="152">Jordan</option>
                                                <option value="154">Kazakhstan</option>
                                                <option value="176">Kenya</option>
                                                <option value="298">Kiribati</option>
                                                <option value="402">Kosovo</option>
                                                <option value="43">Kuwait</option>
                                                <option value="156">Kyrgyzstan</option>
                                                <option value="190">Laos</option>
                                                <option value="145">Latvia</option>
                                                <option value="68">Lebanon</option>
                                                <option value="31">Lesotho</option>
                                                <option value="187">Liechtenstein</option>
                                                <option value="157">Lithuania</option>
                                                <option value="7">Luxembourg</option>
                                                <option value="169">Macau</option>
                                                <option value="84">Macedonia</option>
                                                <option value="209">Madagascar</option>
                                                <option value="87">Malawi</option>
                                                <option value="198">Malaysia</option>
                                                <option value="34">Maldives</option>
                                                <option value="204">Mali</option>
                                                <option value="57">Malta</option>
                                                <option value="300">Marshall Islands</option>
                                                <option value="83">Martinique</option>
                                                <option value="22">Mauritania</option>
                                                <option value="9">Mauritius</option>
                                                <option value="301">Mayotte</option>
                                                <option value="86">Mexico</option>
                                                <option value="141">Moldova</option>
                                                <option value="1">Monaco</option>
                                                <option value="302">Mongolia</option>
                                                <option value="340">Montenegro</option>
                                                <option value="303">Montserrat</option>
                                                <option value="2">Morocco</option>
                                                <option value="235">Mozambique</option>
                                                <option value="203">Myanmar</option>
                                                <option value="85">Namibia</option>
                                                <option value="120">Nepal</option>
                                                <option value="149">Netherlands</option>
                                                <option value="44">New Caledonia</option>
                                                <option value="25">New Zealand</option>
                                                <option value="92">Nicaragua</option>
                                                <option value="305">Niger</option>
                                                <option value="65">Nigeria</option>
                                                <option value="306">Niue</option>
                                                <option value="230">Norfolk Island</option>
                                                <option value="32">Northern Mariana Islands</option>
                                                <option value="129">Norway</option>
                                                <option value="155">Oman</option>
                                                <option value="19">Pakistan</option>
                                                <option value="133">Palau</option>
                                                <option value="401">Palestinian Territory</option>
                                                <option value="175">Panama</option>
                                                <option value="91">Papua New Guinea</option>
                                                <option value="111">Paraguay</option>
                                                <option value="186">Peru</option>
                                                <option value="70">Philippines</option>
                                                <option value="182">Poland</option>
                                                <option value="213">Portugal</option>
                                                <option value="166">Puerto Rico</option>
                                                <option value="105">Qatar</option>
                                                <option value="285">Republic of Congo</option>
                                                <option value="239">Reunion Island</option>
                                                <option value="75">Romania</option>
                                                <option value="33">Russia</option>
                                                <option value="131">Rwanda</option>
                                                <option value="348">Saint Barthelemy</option>
                                                <option value="8">Saint Kitts And Nevis</option>
                                                <option value="195">Saint Lucia</option>
                                                <option value="347">Saint Martin (France)</option>
                                                <option value="307">Saint Pierre and Miquelon</option>
                                                <option value="287">Samoa</option>
                                                <option value="241">San Marino</option>
                                                <option value="308">Sao Tome and Principe</option>
                                                <option value="74">Saudi Arabia</option>
                                                <option value="233">Senegal</option>
                                                <option value="339">Serbia</option>
                                                <option value="115">Seychelles</option>
                                                <option value="309">Sierra Leone</option>
                                                <option value="114">Singapore</option>
                                                <option value="343">Sint Maarten (Netherlands)</option>
                                                <option value="125">Slovakia</option>
                                                <option value="27">Slovenia</option>
                                                <option value="323">Solomon Islands</option>
                                                <option value="62">South Africa</option>
                                                <option value="212">South Korea</option>
                                                <option value="346">South Sudan</option>
                                                <option value="167">Spain</option>
                                                <option value="82">Sri Lanka</option>
                                                <option value="137">St. Vincent &amp; Grenadines</option>
                                                <option value="312">Suriname</option>
                                                <option value="18">Swaziland</option>
                                                <option value="49">Sweden</option>
                                                <option value="51">Switzerland</option>
                                                <option value="140">Taiwan</option>
                                                <option value="313">Tajikistan</option>
                                                <option value="199">Tanzania</option>
                                                <option value="106">Thailand</option>
                                                <option value="331">Timor-Leste</option>
                                                <option value="121">Togo</option>
                                                <option value="315">Tonga</option>
                                                <option value="95">Trinidad &amp; Tobago</option>
                                                <option value="56">Tunisia</option>
                                                <option value="45">Turkey</option>
                                                <option value="48">Turks &amp; Caicos Islands</option>
                                                <option value="317">Tuvalu</option>
                                                <option value="81">U.S. Virgin Islands</option>
                                                <option value="245">Uganda</option>
                                                <option value="79">Ukraine</option>
                                                <option value="64">United Arab Emirates</option>
                                                <option value="107">United Kingdom</option>
                                                <option value="181">United States</option>
                                                <option value="110">Uruguay</option>
                                                <option value="172">Uzbekistan</option>
                                                <option value="194">Vanuatu</option>
                                                <option value="146">Venezuela</option>
                                                <option value="38">Vietnam</option>
                                                <option value="318">Wallis and Futuna</option>
                                                <option value="171">Zambia</option>
                                                <option value="61">Zimbabwe</option>
                                            </select>
                                        </div>
                                        <div>
                                            <select name="state" id="stateId" class="form-control">
                                                <option value="0">State/Province</option>
                                                <option value="93">Afghanistan (+93)</option>
                                                <option value="355">Albania (+355)</option>
                                                <option value="213">Algeria (+213)</option>
                                                <option value="1684">American Samoa (+1684)</option>
                                                <option value="376">Andorra (+376)</option>
                                                <option value="244">Angola (+244)</option>
                                                <option value="1264">Anguilla (+1264)</option>
                                            </select>
                                        </div>
                                        <div>
                                            <select name="city" id="cityId" class="form-control">
                                                <option value="0">City</option>
                                                <option value="93">Afghanistan (+93)</option>
                                                <option value="355">Albania (+355)</option>
                                                <option value="213">Algeria (+213)</option>
                                                <option value="1684">American Samoa (+1684)</option>
                                                <option value="376">Andorra (+376)</option>
                                                <option value="244">Angola (+244)</option>
                                                <option value="1264">Anguilla (+1264)</option>
                                            </select>
                                        </div>
                                    </li>		
                                    <li>
                                        <div>
                                            <label>Nationality</label>
                                            <select name="nationality" id="nationalityId" class="form-control">
                                                <option value="0">Country</option>
                                                <option value="288">Afghanistan</option>
                                                <option value="53">Albania</option>
                                                <option value="143">Algeria</option>
                                                <option value="289">American Samoa</option>
                                                <option value="189">Andorra</option>
                                                <option value="290">Angola</option>
                                                <option value="150">Anguilla</option>
                                                <option value="50">Antigua and Barbuda</option>
                                                <option value="5">Argentina</option>
                                                <option value="246">Armenia</option>
                                                <option value="66">Aruba</option>
                                                <option value="139">Australia</option>
                                                <option value="130">Austria</option>
                                                <option value="135">Azerbaijan</option>
                                                <option value="60">Bahamas</option>
                                                <option value="202">Bahrain</option>
                                                <option value="117">Bangladesh</option>
                                                <option value="94">Barbados</option>
                                                <option value="21">Belarus</option>
                                                <option value="118">Belgium</option>
                                                <option value="88">Belize</option>
                                                <option value="231">Benin</option>
                                                <option value="6">Bermuda</option>
                                                <option value="291">Bhutan</option>
                                                <option value="15">Bolivia</option>
                                                <option value="344">Bonaire Sint Eustatius and Saba</option>
                                                <option value="103">Bosnia and Herzegovina</option>
                                                <option value="206">Botswana</option>
                                                <option value="207">Brazil</option>
                                                <option value="77">British Virgin Islands</option>
                                                <option value="63">Brunei Darussalam</option>
                                                <option value="126">Bulgaria</option>
                                                <option value="237">Burkina Faso</option>
                                                <option value="229">Burundi</option>
                                                <option value="163">Cambodia</option>
                                                <option value="36">Cameroon</option>
                                                <option value="100">Canada</option>
                                                <option value="292">Cape Verde</option>
                                                <option value="142">Cayman Islands</option>
                                                <option value="236">Chad</option>
                                                <option value="69">Chile</option>
                                                <option value="191">China</option>
                                                <option value="321">Cocos (Keeling) Islands</option>
                                                <option value="10">Colombia</option>
                                                <option value="294">Comoros</option>
                                                <option value="225">Cook Islands</option>
                                                <option value="40">Costa Rica</option>
                                                <option value="165">Cote D'ivoire</option>
                                                <option value="128">Croatia</option>
                                                <option value="342">Curacao</option>
                                                <option value="24">Cyphrus</option>
                                                <option value="13">Czech Republic</option>
                                                <option value="337">Democratic Republic of the&nbsp;Congo</option>
                                                <option value="158">Denmark</option>
                                                <option value="244">Djibouti</option>
                                                <option value="341">Dominica</option>
                                                <option value="134">Dominican Republic</option>
                                                <option value="52">Ecuador</option>
                                                <option value="16">Egypt</option>
                                                <option value="80">El Salvador</option>
                                                <option value="295">Equatorial Guinea</option>
                                                <option value="242">Eritrea</option>
                                                <option value="99">Estonia</option>
                                                <option value="240">Ethiopia</option>
                                                <option value="322">Falkland Islands</option>
                                                <option value="200">Faroe Islands</option>
                                                <option value="218">Micronesia</option>
                                                <option value="109">Fiji</option>
                                                <option value="28">Finland</option>
                                                <option value="153">France</option>
                                                <option value="113">French Guiana</option>
                                                <option value="14">French Polynesia</option>
                                                <option value="234">Gabon</option>
                                                <option value="286">Gambia</option>
                                                <option value="71">Georgia</option>
                                                <option value="101">Germany</option>
                                                <option value="151">Ghana</option>
                                                <option value="4">Gibraltar</option>
                                                <option value="197">Greece</option>
                                                <option value="26">Greenland</option>
                                                <option value="184">Grenada</option>
                                                <option value="89">Guadeloupe</option>
                                                <option value="208">Guam</option>
                                                <option value="41">Guatemala</option>
                                                <option value="406">Guernsey</option>
                                                <option value="58">Guinea</option>
                                                <option value="296">Guinea-Bissau</option>
                                                <option value="243">Guyana</option>
                                                <option value="47">Haiti</option>
                                                <option value="39">Honduras</option>
                                                <option value="132">Hong Kong</option>
                                                <option value="37">Hungary</option>
                                                <option value="54">Iceland</option>
                                                <option value="35">India</option>
                                                <option value="192">Indonesia</option>
                                                <option value="188">Ireland</option>
                                                <option value="405">Isle Of Man</option>
                                                <option value="144">Israel</option>
                                                <option value="205">Italy</option>
                                                <option value="42">Jamaica</option>
                                                <option value="3">Japan</option>
                                                <option value="404">Jersey</option>
                                                <option value="152">Jordan</option>
                                                <option value="154">Kazakhstan</option>
                                                <option value="176">Kenya</option>
                                                <option value="298">Kiribati</option>
                                                <option value="402">Kosovo</option>
                                                <option value="43">Kuwait</option>
                                                <option value="156">Kyrgyzstan</option>
                                                <option value="190">Laos</option>
                                                <option value="145">Latvia</option>
                                                <option value="68">Lebanon</option>
                                                <option value="31">Lesotho</option>
                                                <option value="187">Liechtenstein</option>
                                                <option value="157">Lithuania</option>
                                                <option value="7">Luxembourg</option>
                                                <option value="169">Macau</option>
                                                <option value="84">Macedonia</option>
                                                <option value="209">Madagascar</option>
                                                <option value="87">Malawi</option>
                                                <option value="198">Malaysia</option>
                                                <option value="34">Maldives</option>
                                                <option value="204">Mali</option>
                                                <option value="57">Malta</option>
                                                <option value="300">Marshall Islands</option>
                                                <option value="83">Martinique</option>
                                                <option value="22">Mauritania</option>
                                                <option value="9">Mauritius</option>
                                                <option value="301">Mayotte</option>
                                                <option value="86">Mexico</option>
                                                <option value="141">Moldova</option>
                                                <option value="1">Monaco</option>
                                                <option value="302">Mongolia</option>
                                                <option value="340">Montenegrin</option>
                                                <option value="303">Montserrat</option>
                                                <option value="2">Morocco</option>
                                                <option value="235">Mozambique</option>
                                                <option value="203">Myanmar</option>
                                                <option value="85">Namibia</option>
                                                <option value="120">Nepal</option>
                                                <option value="149">Netherlands</option>
                                                <option value="44">New Caledonia</option>
                                                <option value="25">New Zealand</option>
                                                <option value="92">Nicaragua</option>
                                                <option value="305">Niger</option>
                                                <option value="65">Nigeria</option>
                                                <option value="306">Niue</option>
                                                <option value="230">Norfolk Island</option>
                                                <option value="32">Northern Marianas</option>
                                                <option value="129">Norway</option>
                                                <option value="155">Oman</option>
                                                <option value="19">Pakistan</option>
                                                <option value="133">Palau</option>
                                                <option value="401">Palestinian Territory</option>
                                                <option value="175">Panama</option>
                                                <option value="91">Papua New Guinea</option>
                                                <option value="111">Paraguay</option>
                                                <option value="186">Peru</option>
                                                <option value="70">Philippines</option>
                                                <option value="182">Poland</option>
                                                <option value="213">Portugal</option>
                                                <option value="166">Puerto Rico</option>
                                                <option value="105">Qatar</option>
                                                <option value="285">Congo</option>
                                                <option value="239">Reunion Island</option>
                                                <option value="75">Romania</option>
                                                <option value="33">Russia</option>
                                                <option value="131">Rwanda</option>
                                                <option value="348">Saint Barthelemy</option>
                                                <option value="8">Saint Kitts and Nevis</option>
                                                <option value="195">Saint Lucia</option>
                                                <option value="347">Saint Martin</option>
                                                <option value="307">Saint Pierre and Miquelon</option>
                                                <option value="287">Samoa</option>
                                                <option value="241">San Marino</option>
                                                <option value="308">Sao Tome and Principe</option>
                                                <option value="74">Saudi Arabia</option>
                                                <option value="233">Senegal</option>
                                                <option value="339">Serbia</option>
                                                <option value="115">Seychelles</option>
                                                <option value="309">Sierra Leone</option>
                                                <option value="114">Singapore</option>
                                                <option value="343">Sint Maarten</option>
                                                <option value="125">Slovakia</option>
                                                <option value="27">Slovenia</option>
                                                <option value="323">Solomon Islands</option>
                                                <option value="62">South Africa</option>
                                                <option value="212">South Korea</option>
                                                <option value="346">South Sudan</option>
                                                <option value="167">Spain</option>
                                                <option value="82">Sri Lanka</option>
                                                <option value="137">St. Vincent &amp; Grenadines</option>
                                                <option value="312">Suriname</option>
                                                <option value="18">Swaziland</option>
                                                <option value="49">Sweden</option>
                                                <option value="51">Switzerland</option>
                                                <option value="140">Taiwan</option>
                                                <option value="313">Tajikistan</option>
                                                <option value="199">Tanzania</option>
                                                <option value="106">Thailand</option>
                                                <option value="331">Timor-Leste</option>
                                                <option value="121">Togo</option>
                                                <option value="315">Tonga</option>
                                                <option value="95">Trinidad and Tobago</option>
                                                <option value="56">Tunisia</option>
                                                <option value="45">Turkey</option>
                                                <option value="48">Turks and Caicos Islands</option>
                                                <option value="317">Tuvalu</option>
                                                <option value="81">U.S. Virgin Islands</option>
                                                <option value="245">Uganda</option>
                                                <option value="79">Ukraine</option>
                                                <option value="64">United Arab Emirates</option>
                                                <option value="107">United Kingdom</option>
                                                <option value="181">United States of America</option>
                                                <option value="110">Uruguay</option>
                                                <option value="172">Uzbekistan</option>
                                                <option value="194">Vanuatu</option>
                                                <option value="146">Venezuela</option>
                                                <option value="38">Vietnam</option>
                                                <option value="318">Wallis and Futuna</option>
                                                <option value="171">Zambia</option>
                                                <option value="61">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>															
                            </div>
                        </div>
                        <div class="recommended">	
                            <h5>Describ Your Self</h5>
                            <div class="about-you">
                                <textarea rows="5" name="description" type="text" id="userDescription" class="form-control" placeholder="Description"><?= $edit_det->description; ?></textarea>
                            </div>
                        </div>
                        <div class="last-section">
                            <input type="hidden" name="saveexit" id='saveexit' value="next">
                            <ul>
                                <li><span class='btn btn-success' onclick="gettForm()">SAVE AND EXIT </span></li>				                						
                                <li onclick="$('#saveexit').val('next');">
                                    <button class='btn btn-success' type="submit" >Next</button>
                                </li>
                                <li><a href="<?= HTTP_ROOT; ?>extranets/photos/<?= @$id; ?>">PREVIOUS</a></li>
                            </ul>
                        </div>									
<?= $this->Form->end(); ?>											
                    </div>	

                </div>
            </div>

        </div>
    </div>
</section>
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
<script>
    function gettForm() {
        $('#saveexit').val('save exit');
        $('#profile-page').submit();
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