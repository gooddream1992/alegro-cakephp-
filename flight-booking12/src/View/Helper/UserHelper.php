<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;

class UserHelper extends Helper {

    function cityHelper($data) {
        $table = TableRegistry::get('Locations');
        $query = $table->find('all')->where(['value' => $data])->first();
        return $query;
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
        $table = TableRegistry::get('ExtranetsUserProperty');
        $accom = $table->find('all')->where(['id' => $id])->first();
        return $accom->accommodates;
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
            }else{
                $query_main->url="";
            }
        }
        return $query_main->url;
    }

    function extUserDetails($id) {
        $table = TableRegistry::get('ExtranetsUserDetails');
        $query = $table->find('all')->where(['user_id' => $id])->first();       
        return $query;
    }

}

?>
