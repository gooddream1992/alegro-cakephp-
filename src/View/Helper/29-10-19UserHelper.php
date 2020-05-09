<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;

class UserHelper extends Helper {

    function priceConvert($to = '', $price = '', $from = 'AOA') {

        /*$curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fixer-fixer-currency-v1.p.rapidapi.com/convert?from={$from}&to={$to}&amount={$price}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'x-rapidapi-host:fixer-fixer-currency-v1.p.rapidapi.com',
                'x-rapidapi-key:086b643ecemsh1b2cf527d744f12p115edejsne4d3d765cbc4'
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $res = json_decode($response,true);
            
            return $res['result'];
        }*/
        return $price;

    }

    function cityHelper($data) {
        $table = TableRegistry::get('Locations');
        $query = $table->find('all')->where(['value' => $data])->first();
        return $query;
    }

    function check_review($data) {
        $table = TableRegistry::get('HotelBookingDetails');
        $query = $table->find('all')->where(['booking_no' => $data])->count();
        return $query;
    }

    function getLastMessage($user_id, $booking_id) {
        $table = TableRegistry::get('UserNotifications');
        $query = $table->find('all')->where(['OR' => ['receiver_id' => $user_id, 'sender_id' => $user_id], 'booking_no' => $booking_id])->order(['id' => 'DESC'])->first();
        return $query;
    }

    function getHotelId($booking_no) {
        $table = TableRegistry::get('HotelBookingDetails');
        $query = $table->find('all')->where(['booking_no' => $booking_no])->first();
        return $query->property_id;
    }

    function getHotelName($booking_no) {
        $pro_id = $this->getHotelId($booking_no);
        $table = TableRegistry::get('ExtranetsUserPropertyDescription');
        $query = $table->find('all')->where(['property_id' => $pro_id])->first();
        return $query->propertyName;
    }
    
    function getHotelPerPrice($id) {
        $table = TableRegistry::get('HotelBookingDetails');
        $query = $table->find('all')->where(['id' => $id])->first();
        $total_room_fee=$query->total_cost;
            
        $percentagevalue = ($total_room_fee*$query->service_fee)/100;
        $total_value = $total_room_fee-$percentagevalue;
        return changeFormat(number_format($total_value,2));
        //return $total_value;
    }

    function makeSeoUrl($url) {
        if ($url) {
            $url = trim($url);
            $value = preg_replace("![^a-z0-9]+!i", "-", $url);
            $value = trim($value, "-");
            return strtolower($value);
        }
    }

    function luggageInfo($flightname, $flityp, $cabin) {
        $table = TableRegistry::get('LuggagePerFlights');
        $query = $table->find('all')->where(['airline_name' => $flightname, 'airport_type' => $flityp, 'cabin_type' => $cabin])->first();
        return $query;
    }

    function flightdetails($data) {
        $table = TableRegistry::get('Fulljournydetails');
        $query = $table->find('all')->where(['refid' => $data])->order(['id' => 'ASC'])->toArray();
        return $query;
    }

    function uuid() {

        $pr_bits = null;
        $fp = @fopen('/dev/urandom', 'rb');
        if ($fp !== false) {
            $pr_bits .= @fread($fp, 16);
            @fclose($fp);
        } else {
            $pr_bits = "";
            for ($cnt = 0; $cnt < 16; $cnt++) {
                $pr_bits .= chr(mt_rand(0, 255));
            }
        }

        $time_low = bin2hex(substr($pr_bits, 0, 4));
        $time_mid = bin2hex(substr($pr_bits, 4, 2));
        $time_hi_and_version = bin2hex(substr($pr_bits, 6, 2));
        $clock_seq_hi_and_reserved = bin2hex(substr($pr_bits, 8, 2));
        $node = bin2hex(substr($pr_bits, 10, 6));
        $time_hi_and_version = hexdec($time_hi_and_version);
        $time_hi_and_version = $time_hi_and_version >> 4;
        $time_hi_and_version = $time_hi_and_version | 0x4000;

        $clock_seq_hi_and_reserved = hexdec($clock_seq_hi_and_reserved);
        $clock_seq_hi_and_reserved = $clock_seq_hi_and_reserved >> 2;
        $clock_seq_hi_and_reserved = $clock_seq_hi_and_reserved | 0x8000;
        return sprintf('%08s-%04s-%04x-%04x-%012s', $time_low, $time_mid, $time_hi_and_version, $clock_seq_hi_and_reserved, $node);
    }

    function usrHelper($data) {
        $table = TableRegistry::get('Users');
        $query = $table->find('all')->where(['id' => $data])->first();
        return $query;
    }

    function usrdetHelper($data) {
        $table = TableRegistry::get('UserDetails');
        $query = $table->find('all')->where(['user_id' => $data])->first();
        return $query;
    }

    function bookingdet($refid, $uniqueid) {
        $table = TableRegistry::get('UserFullBookingDetails');
        $pend_full_det = $table->find('all')->where(['refid' => $refid, 'uniqueid' => $uniqueid]);
        return $pend_full_det;
    }

    function userjrdetails($data) {
        $table = TableRegistry::get('UserFullBookingDetails');
        $query = $table->find('all')->where(['refid' => $data])->order(['id' => 'ASC'])->toArray();
        return $query;
    }

    function checkInUrl($FlightName) {

        if ($FlightName == "AF") {
            $url = "https://www.airfrance.fr/FR/en/local/core/engine/echeckin/IciFormAction.do";
        } elseif ($FlightName == "BA") {
            $url = "https://www.britishairways.com/travel/olcilandingpageauthreq/public/en_gb?eid=104511";
        } elseif ($FlightName == "SN") {
            $url = "https://checkin.brusselsairlines.com/CI/WebForms/PaxByQuery.aspx";
        } elseif ($FlightName == "EK") {
            $url = "https://www.emirates.com/english/manage-booking/online-check-in.aspx";
        } elseif ($FlightName == "KL") {
            $url = "https://www.klm.com/ams/checkin/web/kl/pa/en";
        } elseif ($FlightName == "TM") {
            $url = "https://www.lam.co.mz/en/Travel-Information/Your-Trip/Check-In-Online";
        } elseif ($FlightName == "LH") {
            $url = "https://www.lufthansa.com/us/en/online-check-in";
        } elseif ($FlightName == "AT") {
            $url = "https://www.royalairmaroc.com/int-en/E-Services/Online-check-in";
        } elseif ($FlightName == "SA") {
            $url = "https://www.flysaa.com/manage-fly/manage/check-in";
        } elseif ($FlightName == "DT") {
            $url = "https://icheck.sita.aero/iCheckWebDT/";
        } elseif ($FlightName == "TP") {
            $url = "https://www.flytap.com/en-gb/check-in-flight";
        } else {
            $url = "#";
        }

        return $url;
    }

    public function getAccomodation($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyBed');
        $sub_table = TableRegistry::get('ExtranetsUserPropertySubBeds');
        $main_bed = $table->find('all')->where(['id' => $id])->first(); //pj($main_bed);
        $sub_person_total = 0;
        if (($main_bed->beds == 'single bed') || ($main_bed->beds == 'futon')) {
            $main_person = $main_bed->num_bed * 1;
        }

        if (($main_bed->beds == 'double bed') || ($main_bed->beds == 'semi double-bed') || ($main_bed->beds == 'queen bed') || ($main_bed->beds == 'semi double-bed') || ($main_bed->beds == 'king bed') || ($main_bed->beds == 'super king bed') || ($main_bed->beds == 'bunk bed') || ($main_bed->beds == 'sofa bed')) {
            $main_person = $main_bed->num_bed * 2;
        }

        $subData = $sub_table->find('all')->where(['main_bed_id' => $id]);

        foreach ($subData as $subBed) {

            if (($subBed->beds == 'single bed') || ($subBed->beds == 'futon')) {
                $sub_person = $subBed->num_beds * 1;
            }

            if (($subBed->beds == 'double bed') || ($subBed->beds == 'semi double-bed') || ($subBed->beds == 'queen bed') || ($subBed->beds == 'semi double-bed') || ($subBed->beds == 'king bed') || ($subBed->beds == 'super king bed') || ($subBed->beds == 'bunk bed') || ($subBed->beds == 'sofa bed')) {
                $sub_person = $subBed->num_beds * 2;
            }

            $sub_person_total += $sub_person;
        }
        $total = $sub_person_total + $main_person;
        return $total;
    }

    public function getProName($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyDescription');
        $property = $table->find('all')->where(['property_id' => $id])->first();
        $property_name = @$property->propertyName;
        if (empty($property_name)) {
            $property_name = "Unnamed property";
        }
        return $property_name;
    }

    public function getPropic($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyPhotos');
        $property = $table->find('all')->where(['property_id' => $id, 'is_main' => 1])->first();

        if ($property == null) {
            $property1 = $table->find('all')->where(['property_id' => $id])->first();

            if ($property1 == null) {
                $url = '<i class="fa fa-home" aria-hidden="true"></i>';
            } else {

                $url = '<img src="' . HTTP_ROOT . "img/pro_pic/" . @$property1->url . '" alt="" style="width: 85px;float: left;margin-right: 10px;">';
            }
        } else {
            $url = '<img src="' . HTTP_ROOT . "img/pro_pic/" . @$property->url . '" alt="" style="width: 85px;float: left;margin-right: 10px;">';
        }

        return $url;
    }

    function allcountry() {
        $table = TableRegistry::get('HotelCountryCitys');
        $query = $table->find('all')->group('country_name');
        return $query;
    }

    function allcity() {
        $table = TableRegistry::get('HotelCountryCitys');
        $query = $table->find('all')->group('city_name');
        return $query;
    }

    function allstate() {
        $table = TableRegistry::get('HotelCountryCitys');
        $query = $table->find('all')->group('state_name');
        return $query;
    }

    function getHotelImage($id) {
        $table = TableRegistry::get('ExtranetsUserPropertyPhotos');
        $query = $table->find('all')->where(['property_id' => $id, 'is_main' => 1])->count();
        if ($query > 0) {
            $query_main = $table->find('all')->where(['property_id' => $id, 'is_main' => 1])->first();
        } else {
            $query_main_count = $table->find('all')->where(['property_id' => $id, 'is_main' => 0])->count();
            if ($query_main_count > 0) {
                $query_main = $table->find('all')->where(['property_id' => $id, 'is_main' => 0])->first();
            } else {
                $query_main->url = "";
            }
        }
        return $query_main->url;
    }

    function extUserDetails($id) {
        $table = TableRegistry::get('ExtranetsUserDetails');
        $query = $table->find('all')->where(['user_id' => $id])->first();
        return $query;
    }

    function propertyName($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyDescription');
        $query = $table->find('all')->where(['property_id' => $id])->first();
        $name = "";
        if (!empty($query->propertyName)) {
            $name = $query->propertyName;
        }
        return $name;
    }

    function stateName($id = null) {

        $table = TableRegistry::get('ExtranetsUserPropertyLocation');
        $query = $table->find('all')->where(['property_id' => $id])->first();
        $name = "";
        if (!empty($query->state)) {
            $name = $query->state;
        }

        return $name;
    }
    
    function cityName($id = null) {

        $table = TableRegistry::get('ExtranetsUserPropertyLocation');
        $query = $table->find('all')->where(['property_id' => $id])->first();
        $name = "";
        if (!empty($query->city)) {
            $name = $query->city;
        }

        return $name;
    }

    function countryName($id = null) {
        $table = TableRegistry::get('HotelCountryCitys');
        $query = $table->find('all')->where(['id' => $id])->first();
        $name = "";
        if (!empty($query->state_name)) {
            $name = $query->state_name;
        }

        return $name;
    }

    function countryHtlName($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyLocation');
        $query = $table->find('all')->where(['property_id' => $id])->first();
        $name = "";
        if (!empty($query->country)) {
            $name = $query->country;
        }

        return $name;
    }

    function mainImage($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyPhotos');
        $query = $table->find('all')->where(['property_id' => $id, 'is_main' => 1])->first();
        $name = "";
        if (!empty($query->url)) {
            $name = $query->url;
        }

        return $name;
    }

    function mainImageposition($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyPhotos');
        $query = $table->find('all')->where(['property_id' => $id]);
        $i = 0;
        foreach ($query as $val) {

            if ($val->is_main == 1) {
                return $i;
            }
            $i++;
        }
    }

    function getRelated($state = null, $id = null) {
        $property = TableRegistry::get('ExtranetsUserProperty');
        $table = TableRegistry::get('ExtranetsUserPropertyLocation');
        $query = $table->find('all')->where(['state' => $state])->extract('property_id');
        $allData = $property->find('all')->where(['complete_ststus' => 1, 'active_ststus' => 1])->extract('id');
        $mydata = array($id);
        // $mydata = array_push($mydata, $id);

        $result = array_intersect($allData->toArray(), $query->toArray());
        $datas = array_diff($result, $mydata);
        return $datas;
    }

    function getDataForHotel($id = null) {
        $property = TableRegistry::get('ExtranetsUserProperty');
        $property->hasMany('photos', ['className' => 'ExtranetsUserPropertyPhotos', 'foreignKey' => 'property_id']);
        $property->hasOne('location', ['className' => 'ExtranetsUserPropertyLocation', 'foreignKey' => 'property_id']);
        $property->hasOne('pricing', ['className' => 'ExtranetsUserPropertyPricing', 'foreignKey' => 'property_id']);
        $property->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);
        $result_property = $property->find('all')->contain(['photos', 'location', 'pricing', 'description'])->where(['ExtranetsUserProperty.id IN' => $id])->first();
        return $result_property;
    }

    function subAminiti($id = null, $subid = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyAmenities');
        $result_property = $table->find('all')->where(['property_id' => $id, 'sub_id' => $subid])->first();
        return $result_property;
    }

    function proPrice($id = null, $subid = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyPricing');
        $result_property = $table->find('all')->where(['property_id' => $id, 'sub_id' => $subid])->first();
        return $result_property;
    }

    function availlity($id = null, $subid = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyAvailability');
        $result_property = $table->find('all')->where(['property_id' => $id, 'sub_id' => $subid])->first();
        return $result_property;
    }

    function allPhoto($id = null, $subid = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyPhotos');
        $result_property = $table->find('all')->where(['property_id' => $id]);
        if ($subid != null) {
            $result_property = $table->find('all')->where(['property_id' => $id, 'sub_id' => $subid]);
        }

        return $result_property;
    }

    function htlSidebar($id = null, $user_id = null, $tbl = null) {
        $table = TableRegistry::get($tbl);
        if ($tbl == 'ExtranetsUserProperty')
            $result_property = $table->find('all')->where(['id' => $id, 'user_id' => $user_id])->count();
        else if ($tbl == 'UserDetails')
            $result_property = $table->find('all')->where(['user_id' => $user_id])->count();
        else
            $result_property = $table->find('all')->where(['property_id' => $id, 'user_id' => $user_id])->count();
        if ($result_property >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

    function htlSidebar2($id = null, $user_id = null, $tbl = null) {
        $table = TableRegistry::get($tbl);
        if ($tbl == 'ExtranetsUserProperty')
            $result_property = $table->find('all')->where(['id' => $id, 'user_id' => $user_id, 'complete_ststus' => 1])->count();
        if ($result_property >= 1) {
            return 1;
        } else {
            return 0;
        }
    }

    function getSubbed($userId, $proId, $mainBedId, $temp_cookie = null) {
        $table = TableRegistry::get('ExtranetsUserPropertySubBeds');
        $result_property = $table->find('all')->where(['user_id' => $userId, 'main_bed_id' => $mainBedId])->count();
        $query = '';
        if ($result_property > 0) {
            $query = $table->find('all')->where(['user_id' => $userId, 'main_bed_id' => $mainBedId]);
        }

        return $query;
    }
    
    function chkBoost($id){
        $table = TableRegistry::get('ExtranetsUserPropertyPricing');
        $result_property = $table->find('all')->where(['property_id' => $id])->first();
        if($result_property->boost_price>0){
            return 1;
        }
        return 2;
    }
    
    function chkBoostDesc($result_property){
        $table = TableRegistry::get('ExtranetsUserPropertyPricing');
       
        $boots_property = $table->find('all')->where(['boost_price !=' => 0,'property_id IN' => $result_property->extract('id')->toArray()])->order(['boost_price' => 'DESC'])->group('property_id');
            $x= $boots_property;

        return $x;
    }
    
    function chkpriceAsc($result_property){
        $table = TableRegistry::get('ExtranetsUserPropertyPricing');
        $boots_property = $table->find('all')->where(['property_id IN' => $result_property->extract('id')->toArray()])->order(['price_main' => 'ASC'])->group('property_id');
        return $boots_property;       
        
    }
    function chkBoostajaxDesc($result_property){
        //$table = TableRegistry::get('ExtranetsUserPropertyPricing');
        //$boots_property = $table->find('all')->select(['main_price' => 'price_main','property_id'=>'property_id','sub_id'=>'sub_id'])->where(['boost_price !=' => 0,'property_id IN' => $result_property->extract('property_id')->toArray()])->order(['boost_price' => 'DESC'])->group('property_id');
        return $result_property;       
        
    }

    function getHotelprice($id = null, $totalsearch = 0) {
        $table = TableRegistry::get('ExtranetsUserPropertyPricing');
        $result_property = $table->find('all')->where(['property_id' => $id]);
        $min_val = null;
        $min_key = null;
        if ($result_property->count() > 0) {
            foreach ($result_property as $val) {
                $price[$val->sub_id] = $val->price_main;
            }
            asort($price);
            //$key = array_keys($price, min($price));
            //$fPri = min($price);
            //pj($price);
            unset($key);
            unset($pri);
            $price2 = [];
            foreach ($price as $key => $pri) {
                if ($totalsearch <= $this->getAccomodation($key)) {
                    $price2[$key] = $pri;
                }
            }
        }
        return min(@$price2);
    }
    function getHotelfixprice($id = null, $totalsearch = 0) {
        $table = TableRegistry::get('ExtranetsUserPropertyPricing');
        $result_property = $table->find('all')->where(['property_id' => $id]);
        $min_val = null;
        $min_key = null;
        if ($result_property->count() > 0) {
            foreach ($result_property as $val) {
                $price[$val->sub_id] = $val->fix_price;
            }
            asort($price);
            //$key = array_keys($price, min($price));
            //$fPri = min($price);
            //pj($price);
            unset($key);
            unset($pri);
            $price2 = [];
            foreach ($price as $key => $pri) {
                if ($totalsearch <= $this->getAccomodation($key)) {
                    $price2[$key] = $pri;
                }
            }
        }
        return min($price2);
    }
    function longDays($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyPricing');
        $query = $table->find('all')->where(['property_id' => $id])->first();
        $name = "";
        if (!empty($query->long_days)) {
            $name = $query->long_days;
        }
        return $name;
    }

    function userName($id = null) {
        $table = TableRegistry::get('Users');
        $query = $table->find('all')->where(['id' => $id])->first();
        $name = "";
        if (!empty($query->name)) {
            $name = $query->name;
        } else {
            $name = "Guest";
        }

        return $name;
    }

    function propertyRating($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyDescription');
        $query = $table->find('all')->where(['property_id' => $id])->first();
        $name = "";
        if (!empty($query->rating)) {
            $name = $query->rating;
        }
        return $name;
    }

    function propertySize($id = null) {
        $table = TableRegistry::get('ExtranetsUserProperty');
        $query = $table->find('all')->where(['id' => $id])->first();
        $name = "";
        if (!empty($query->property_size)) {
            $name = $query->property_size;
        }
        return $name;
    }

    function propertyPrice($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyPricing');
        $query = $table->find('all')->select(['main_price' => 'MIN(price_main)'])->where(['property_id' => $id])->first();
        $name = "";
        if (!empty($query->main_price)) {
            $name = $query->main_price;
        }
        return $name;
    }

    function propertyPeople($id = null, $guest = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyPricing');
        $queryx = $table->find('all')->select(['wid' => 'id', 'main_price' => 'MIN(price_main)', 'people' => 'people'])->where(['property_id' => $id, 'people' => $guest])->first();

        $queryy = $table->find('all')->select(['wid' => 'id', 'people' => 'people', 'sub_id' => 'sub_id'])->where(['property_id' => $id, 'price_main' => $queryx->main_price])->first();
        // pj($id); 
        //pj($queryy); exit;
        $name = "";
        if (!empty($queryy->people)) {
            $name = $queryy->people;
        }
        return $name;
    }

    function propertyBedCount($id = null, $guest = null) {

        $table1 = TableRegistry::get('ExtranetsUserPropertyPricing');
        $queryx = $table1->find('all')->select(['main_price' => 'MIN(price_main)', 'people' => 'people', 'sub_id' => 'sub_id'])->where(['property_id' => $id, 'people' => $guest])->first();
        //pj($queryx);
        $table = TableRegistry::get('ExtranetsUserPropertyBed');
        $table->hasMany('ExtranetsUserPropertySubBeds', ['className' => 'ExtranetsUserPropertySubBeds', 'foreignKey' => 'main_bed_id']);
        $query = $table->find('all')->contain(['ExtranetsUserPropertySubBeds'])->where(['id' => $queryx->sub_id])->first();

        return $query;
    }

    function propertyAmenities($id = null, $guest = null) {

        $table1 = TableRegistry::get('ExtranetsUserPropertyPricing');
        $queryx = $table1->find('all')->select(['main_price' => 'MIN(price_main)', 'people' => 'people', 'sub_id' => 'sub_id'])->where(['property_id' => $id, 'people' => $guest])->first();
        $queryy = $table1->find('all')->select(['people' => 'people', 'sub_id' => 'sub_id'])->where(['property_id' => $id, 'price_main' => $queryx->main_price])->first();
        $table = TableRegistry::get('ExtranetsUserPropertyAmenities');
        $query = $table->find('all')->where(['sub_id' => $queryy->sub_id])->first();
        return $query->Top;
    }

    function propertyAmenitiesAll($id = null, $guest = null) {
        $table1 = TableRegistry::get('ExtranetsUserPropertyPricing');
        $queryx = $table1->find('all')->select(['main_price' => 'MIN(price_main)', 'people' => 'people', 'sub_id' => 'sub_id'])->where(['property_id' => $id, 'people' => $guest])->first();
        $queryy = $table1->find('all')->select(['people' => 'people', 'sub_id' => 'sub_id'])->where(['property_id' => $id, 'price_main' => $queryx->main_price])->first();
        $table = TableRegistry::get('ExtranetsUserPropertyAmenities');
        $query = $table->find('all')->where(['sub_id' => $queryy->sub_id])->first();
        return $query;
    }

    function getAllRooms($property_id = null) {
        $table1 = TableRegistry::get('ExtranetsUserPropertyBed');
        $table1->hasOne('pricing', ['className' => 'ExtranetsUserPropertyPricing', 'foreignKey' => 'sub_id']);
        $query = $table1->find('all')->contain(['pricing'])->where(['ExtranetsUserPropertyBed.property_id' => $property_id])->order(['price_main' => 'ASC']);

        return $query;
    }

    function getDataForRoom($id = null) {

        $property = TableRegistry::get('ExtranetsUserPropertyBed');
        $property->hasMany('photos', ['className' => 'ExtranetsUserPropertyPhotos', 'foreignKey' => 'sub_id']);
        //$property->hasOne('location', ['className' => 'ExtranetsUserPropertyLocation', 'foreignKey' => 'property_id']);
        $property->hasOne('pricing', ['className' => 'ExtranetsUserPropertyPricing', 'foreignKey' => 'sub_id']);
        //$property->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);
        $result_property = $property->find('all')->contain(['photos', 'pricing'])->where(['ExtranetsUserPropertyBed.id' => $id])->first();
        // pj($result_property); exit;
        return $result_property;
    }

    function propertyAmenitiesRoom($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyAmenities');
        $query = $table->find('all')->where(['sub_id' => $id])->first();
        return $query->Top;
    }

    function propertyRoomAmenities($id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyAmenities');
        $query = $table->find('all')->where(['sub_id' => $id])->first();
        return $query;
    }

    function getAvailability($bed_id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyAvailability');
        $query = $table->find('all')->where(['sub_id' => $bed_id])->first();
        return $query;
    }
    
    function cancelPolicy($sub_id = null) {
        $table = TableRegistry::get('ExtranetsUserPropertyAvailability');
        $query = $table->find('all')->where(['sub_id' => $sub_id])->first();
        return $query->cancellation;
    }

    function getSeviceFee($pro_id = null) {
        $table1 = TableRegistry::get('FeaturedServiceFee');
        $table2 = TableRegistry::get('HotelServiceFee');
        $fee1 = $table1->find('all')->where(['property_id' => $pro_id]);
        $fee2 = $table2->find('all')->where(['id' => 1])->first();
        $sfee = 0;

        // if(!empty($fee1->count())){
        //     $sfee=$fee1->first()->featured_fee;
        // }else{
        $sfee = $fee2->fee;
        //}
        return $sfee;
    }

    function get_featured_fee($pro_id) {
        $table1 = TableRegistry::get('FeaturedServiceFee');
        $fee1 = $table1->find('all')->where(['property_id' => $pro_id]);
        $sfee = 0;
        if (!empty($fee1->count())) {
            $sfee = $fee1->first()->featured_fee;
        }
        return $sfee;
    }

    function htl_sugg($id = null, $guests = null, $rooms = null) {
        pj($this->factor_num($guests));
        return $guests . '-' . $rooms;
    }

    function factor_num($num) {
        $j = 0;
        $factor = array();
        for ($i = 1; $i <= $num; $i++) {
            if ($num % $i == 0) {
                $j++;
                $factor[$j] = $i;
            }
        }
        return $factor;
    }

    function reviewCount($id) {
        $table = TableRegistry::get('HotelReviews');
        $query = $table->find('all')->where(['property_id' => $id,])->count();
        if ($query > 0) {
            $count = $query;
        } else {
            $count = 0;
        }
        return $count;
    }

    function rating($id, $column) {
        $table = TableRegistry::get('HotelReviews');
        $query = $table->find('all')->where(['property_id' => $id,])->sumOf($column);
        $queryCount = $table->find('all')->where(['property_id' => $id])->count();
        if($queryCount>0){
            $count = $this->star_level(round($query / $queryCount, 1));
        }else{
            $count =0 ;
        }
        
        return $count;
    }

    function cReview($id) {
        $table = TableRegistry::get('HotelReviews');
        $query = $table->find('all')->where(['id' => $id]);
        $sumClean = $query->sumOf('cleanliness');
        $staff = $query->sumOf('staff');
        $location = $query->sumOf('location');
        $count = $this->star_level(round(($sumClean + $staff + $location) / 3, 1));
        return $count;
    }
    function hotelPropertyReview($property_id) {
        $table = TableRegistry::get('HotelReviews');
        $query = $table->find('all')->where(['property_id' => $property_id]);
        $total_rows = $query->count();
        $sumClean = $query->sumOf('cleanliness');
        $staff = $query->sumOf('staff');
        $location = $query->sumOf('location');
        $count = $this->star_level(round(($sumClean + $staff + $location) / (3*$total_rows), 1));
        
        return ['rating'=>$count,'count'=>$total_rows];
    }

    function totalRating($id) {
        $table = TableRegistry::get('HotelReviews');
        $queryCount = $table->find('all')->where(['property_id' => $id,])->count();
        $count=0;
        if($queryCount>0){
            $query1 = $table->find('all')->where(['property_id' => $id,])->sumOf('cleanliness') / $queryCount;
            $query2 = $table->find('all')->where(['property_id' => $id,])->sumOf('staff') / $queryCount;
            $query3 = $table->find('all')->where(['property_id' => $id,])->sumOf('location') / $queryCount;
            $count = $this->star_level(round(($query1 + $query2 + $query3) / 3, 1));
        }
        
       
        return $count;
    }

    function allReview($id, $short_by) {
        $table = TableRegistry::get('HotelReviews');
        if ($short_by == 'htl') {
            $query = $table->find('all')->where(['property_id' => $id])->order(['id' => 'DESC']);
        }
        if ($short_by == 'str') {
            $query = $table->find('all')->where(['property_id' => $id])->order(['id' => 'ASC']);
        }
        if ($short_by == 'rev') {
            $query = $table->find('all')->where(['property_id' => $id])->order(['id' => 'DESC']);
        } else {
            $query = $table->find('all')->where(['property_id' => $id])->order(['id' => 'DESC']);
        }
        return $query;
    }

    function allReviewExt($id, $short_by = null) {
        $table = TableRegistry::get('HotelReviews');
        $query = $table->find('all')->where(['property_id IN' => $id])->order(['id' => 'DESC']);
        if ($short_by == 'oldest') {
            $query = $table->find('all')->where(['property_id IN' => $id])->order(['id' => 'ASC']);
        }
        return $query;
    }

    function allReviewExtStarts($id) {
        $table = TableRegistry::get('HotelReviews');
        $query = $table->find('all')->where(['property_id' => $id]);
        $stras = [];
        foreach ($query as $val) {
            $total = floor(($val->cleanliness + $val->staff + $val->location) / 3);
            $stras[] = (int) $total;
        }

        return $stras;
    }

    function star_level($number) {
        $number = is_nan($number)?0:$number;
        $ss = $number / 0.5;
        $zx = floor($ss);
        return $zx * 0.5;
    }

    function proAminity($id) {
        $property_Beb = TableRegistry::get('ExtranetsUserPropertyBed');
        $property_Aminity = TableRegistry::get('ExtranetsUserPropertyAmenities');
        $property_Aminity->belongsTo('beds', ['className' => 'ExtranetsUserPropertyBed', 'foreignKey' => 'sub_id']);
        $result_property = $property_Aminity->find('all')->contain(['beds'])->where(['ExtranetsUserPropertyAmenities.property_id' => $id]);
        // pj($result_property); exit;
        return $result_property;
    }

    function changeFormat($pri) {
        $dat = explode('.', $pri);
        $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
        return $f;
    }

    function timeago($date1, $date2) {
        $date1_ts = strtotime($date1);
        $date2_ts = strtotime($date2);
        $diff = $date2_ts - $date1_ts;
        return round($diff / 86400);
    }

    function getRoomPrice($room_id) {
        $property = TableRegistry::get('ExtranetsUserPropertyPricing');
        $price = $property->find('all')->where(['sub_id' => $room_id])->first();
        return $price->price_main;
    }

}

?>