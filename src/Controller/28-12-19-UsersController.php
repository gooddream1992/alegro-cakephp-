<?php

namespace App\Controller;

ob_start();

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\TableRegistry;
use Cake\Core\App;
use Cake\Utility\Hash;
use Cake\I18n\I18n;
use App\View\Helper\UserHelper;
use Cake\Datasource\ConnectionManager;

//require_once(ROOT . '/vendor' . DS . 'Paypal' . DS . 'PaypalPro.php');
require_once(ROOT . '/vendor' . DS . 'Paypal' . DS . 'paypal_class.php');
require_once(ROOT . '/vendor/' . DS . '/mpdf/vendor/' . 'autoload.php');

//require_once(ROOT . '/vendor/' . DS . '/Services/Travelport/Flight/vendor/autoload.php');

use PaypalPro;

define('FACEBOOK_SDK_V4_SRC_DIR', ROOT . '/vendor/' . DS . '/fb/src/Facebook/');
require_once(ROOT . '/vendor/' . DS . '/fb/' . 'autoload.php');

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\GraphSessionInfo;
//-----------------------------------------------FOR GOOGLE PLUS LOGIN--------------------------------------------------------------//
use Google_Client;
use Google_PlusService;
use Google_Oauth2Service;
use oauth_client_class;
use MasoodRehman\Travelport\Flight;

class UsersController extends AppController {

    public function initialize() {
        parent::initialize();
        //date_default_timezone_set('Asia/kolkata');
        $this->loadComponent('Custom');
        $this->loadComponent('Roundtrip');
        $this->loadComponent('Onewaytrip');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Mpdf');
        $this->loadComponent('Paginator');
        $this->loadModel('Users');
        $this->loadModel('UserDetails');
        $this->loadModel('Pages');
        $this->loadModel('Settings');
        $this->loadModel('NotificationUsers');
        $this->loadModel('UserNotifications');
        $this->loadModel('NotificationDeacLists');
        $this->loadModel('Testimonials');
        $this->loadModel('Locations');
        $this->loadModel('Searchdatas');
        $this->loadModel('Journydetails');
        $this->loadModel('Fulljournydetails');
        $this->loadModel('UserBookDetails');
        $this->loadModel('UserFullBookingDetails');
        $this->loadModel('ServiceFee');
        $this->loadModel('Shareinfo');
        $this->loadModel('PassengerDetails');
        $this->loadModel('HotelCountryCitys');
        $this->loadModel('ExtranetsUserProperty');
        $this->loadModel('ExtranetsUserPropertyBed');
        $this->loadModel('ExtranetsUserPropertyLocation');
        $this->loadModel('ExtranetsUserPropertyDescription');
        $this->loadModel('ExtranetsUserPropertyAmenities');
        $this->loadModel('ExtranetsUserPropertyPricing');
        $this->loadModel('ExtranetsUserPropertyAvailability');
        $this->loadModel('ExtranetsUserPropertyPhotos');
        $this->loadModel('FeaturedServiceFee');
        $this->loadModel('HotelServiceFee');
        $this->loadModel('HotelBookingDetails');
        $this->loadModel('ExtranetsUserPropertySubBeds');
        $this->loadModel('HotelReviews');
        $this->loadModel('UserSettings');

        $cnt = array('AF' => "Air France", 'BA' => "British Airways", 'SN' => "Brussels Airlines", 'EK' => "Emirates", 'ET' => "Ethiopian Airlines", 'KL' => "KLM", 'TM' => "LAM", 'LH' => "Lufthansa", 'QR' => "Qatar Airways", 'AT' => "Royal Air Maroc", 'SA' => "South African Airways", 'SW' => "Air Namibia", 'DT' => "TAAG", 'TP' => "TAP Portugal", 'TU' => "Tunisair", 'TK' => "Turkish Airlines", 'KQ' => "Kenya Airways", 'IB' => "IBERIA", 'UA' => "United Airlines", 'BM' => "BMI Regional");
        $this->set(compact('cnt'));
    }

    protected $flightName = array('AF' => "Air France", 'BA' => "British Airways", 'SN' => "Brussels Airlines", 'EK' => "Emirates", 'ET' => "Ethiopian Airlines", 'KL' => "KLM", 'TM' => "LAM", 'LH' => "Lufthansa", 'QR' => "Qatar Airways", 'AT' => "Royal Air Maroc", 'SA' => "South African Airways", 'SW' => "Air Namibia", 'DT' => "TAAG", 'TP' => "TAP Portugal", 'TU' => "Tunisair", 'TK' => "Turkish Airlines", 'KQ' => "Kenya Airways", 'IB' => "IBERIA", 'UA' => "United Airlines", 'BM' => "BMI Regional");

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['currency', 'accountAlreadyExists', 'accountConfirmed', 'loginDirect', 'ajaxLogin', 'webrootRedirect', 'login', 'forget', 'index', 'ajaxCheckEmailAvail', 'ajaxRegistration', 'welcomePage', 'confirm', 'forgetPassword', 'changePassword', 'language', 'ajaxSearchResult', 'ajaxOneWayResult', 'ajaxLocations', 'ajaxHotelLocations', 'pagedata', 'pricedatas', 'airportdata', 'fareDetails', 'thankYou', 'routeReview', 'emailvalidate', 'ShareItenerary', 'invoicePdf', 'itineraryPdf', 'mailtests', 'cronJob', 'hotelSearchResult', 'hotelajaxsearchdata', 'preview', 'booking', 'thankYouHotelOrder', 'order', 'paypalProcess', 'paymentSuccess', 'ajaxCheckEmailStatus', 'hotelAjaxReview', 'fblogin', 'fbreturn', 'googlelogin', 'googleLoginReturn', 'testMailfun', 'hotelBookingPdf', 'paylocal', 'thankYouAtHotelOrder', 'hotelInvoicePdf','previewPrivate','previewEntire']);
    }

    public function settings() {
        $userid = $this->request->session()->read('Auth.User.id');
        $user_setting = $this->UserSettings->find('all')->where(['user_id' => $userid])->first();

        $pageDetails = new \stdClass();

        $pageDetails->meta_title = 'My settings' . ' | ' . SITE_NAME;
        $pageDetails->meta_keyword = ' | ' . SITE_NAME;
        $pageDetails->meta_desc = ' | ' . SITE_NAME;


        if ($this->request->is('post')) {
            $datas = $this->request->data;
            $new = $this->UserSettings->newEntity();
            $datas['user_id'] = $userid;
            if (!empty($user_setting->id)) {
                $datas['id'] = $user_setting->id;
            }
            $new = $this->UserSettings->patchEntity($new, $datas);
            if ($this->UserSettings->save($new)) {
                return $this->redirect(HTTP_ROOT . 'settings');
            }
        }
        $this->set(compact('user_setting', 'pageDetails'));
    }

    public function currency($param = null) {
        if (empty($param)) {
            $param = 'AOA';
        }

        $this->request->session()->write("CURRENCY", $param);
        $this->request->session()->read("CURRENCY");
        return $this->redirect($this->referer());
    }

    public function language($param = null) {
        if (empty($param)) {
            $param = 'PT';
        }
        if (!empty($this->request->session()->read("lan2"))) {
            if (!empty($param)) {
                $this->request->session()->write("lan2", $param);
            }
            $param = $this->request->session()->read("lan2");
        }
        $this->request->session()->write("lan", $param);
        $this->request->session()->read("lan");
        return $this->redirect($this->referer());
    }

    public function thankYou($id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
        }

        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 20])->first();
        $cabin = $this->Searchdatas->find('all')->where(['uniqueid' => $_COOKIE["UserId"]])->first()->toArray();
        $fligh_det = $this->UserBookDetails->find('all')->where(['id' => $id, 'uniqueid' => $_COOKIE["UserId"]])->first();
        $full_det = $this->UserFullBookingDetails->find('all')->where(['refid' => $id, 'uniqueid' => $_COOKIE["UserId"]]);


        if ($this->request->is('post')) {
            $urdt = $this->request->data();
            //echo"<pre>";print_r($urdt);echo"</pre>";
            $user_id = "";
            if (empty($this->Auth->user('id'))) {
                // echo "no user";

                $usersdat = $this->Users->newEntity();

                $urdt['unique_id'] = $this->Custom->generateUniqNumber();
                $urdt['type'] = 3;
                $urdt['name'] = "";
                $urdt['is_active'] = 0;
                $urdt['created_dt'] = date('Y-m-d h:i:s');
                $urdt['last_login_ip'] = $this->Custom->get_ip_address();
                $urdt['last_login_date'] = date('Y-m-d h:i:s');
                $urdt['email'] = $urdt['email'];
                $this->Users->patchEntity($usersdat, $urdt);
                $usersdat = $this->Users->save($usersdat);

                $usersdet = $this->UserDetails->newEntity();
                $urdt['user_id'] = $usersdat->id;
                $urdt['phone_number'] = $urdt['phonenumber'];
                $urdt['province'] = $urdt['location'];
                $urdt['country'] = "Angola";
                $urdt['is_update'] = 0;
                $usersdet = $this->UserDetails->patchEntity($usersdet, $urdt);
                $this->UserDetails->save($usersdet);
                $user_id = $usersdat->id;
            } else {
                $user_id = $this->Auth->user('id');
            }

            for ($i = 0; $i < $urdt['passengercount']; $i++) {

                $passdet = $this->PassengerDetails->newEntity();
                $urdt['userid'] = $user_id;
                $urdt['gender'] = $urdt[$i]['\'radio\''];
                $urdt['baggage'] = 0;
                $urdt['nationality'] = $urdt[$i]['\'nationality\''];
                $urdt['doctyp'] = $urdt[$i]['\'doctyp\''];
                $urdt['passportcountry'] = $urdt[$i]['\'passportcountry\''];
                $urdt['passportnumber'] = $urdt[$i]['\'passportnumber\''];
                $urdt['passportexpdate'] = $urdt[$i]['\'passportexpdate\''];
                $urdt['booking_details_ref'] = $id;
                $urdt['dob'] = date('Y-m-d', strtotime(str_replace('/', '-', $urdt[$i]['\'dob\''])));
                $urdt['name'] = $urdt[$i]['\'firstname\''] . " " . $urdt[$i]['\'lastname\''];
                $passdet = $this->PassengerDetails->patchEntity($passdet, $urdt);
                $this->PassengerDetails->save($passdet);
            }
            $flightPrices = $this->request->session()->read('flightPrice');

            //$refer_idd = $id;
            $refer_idd = time() . rand(11, 999);

            $payment = [
                "reference_id" => $refer_idd,
                "amount" => $flightPrices['total_peice']
            ];

            $data = json_encode($payment);

            $curl = curl_init();

            $httpHeader = [
                "Authorization: " . "Token " . "w3hc7lnsj4dtuhd72ogf4bpbimj3jf44",
                "Accept: application/vnd.proxypay.v2+json",
            ];

            $opts = [
                CURLOPT_URL => "https://api.sandbox.proxypay.co.ao/reference_ids",
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTPHEADER => $httpHeader
            ];

            curl_setopt_array($curl, $opts);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            $ss = json_decode($response);
            curl_close($curl);

            $refer_idd = $ss;
            $period_end_datetime = date('c', strtotime(date('Y-m-d H:i', strtotime('+4 hour +00 minutes'))));

            $reference1 = [
                "amount" => $flightPrices['total_peice'],
                "end_datetime" => $period_end_datetime,
            ];

            $data = json_encode($reference1);

            $curl1 = curl_init();

            $httpHeader1 = [
                "Authorization: " . "Token " . "w3hc7lnsj4dtuhd72ogf4bpbimj3jf44",
                "Accept: application/vnd.proxypay.v2+json",
                "Content-Type: application/json",
                "Content-Length: " . strlen($data)
            ];

            $opts1 = [
                CURLOPT_URL => "https://api.sandbox.proxypay.co.ao/references/$refer_idd",
                CURLOPT_CUSTOMREQUEST => "PUT",
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTPHEADER => $httpHeader1,
                CURLOPT_POSTFIELDS => $data
            ];

            curl_setopt_array($curl1, $opts1);

            $response1 = curl_exec($curl1);
            $err1 = curl_error($curl1);

            curl_close($curl1);

            // echo $refer_idd;exit;



            $this->UserBookDetails->updateAll(['is_active' => 0, 'user_id' => $user_id, 'total_fee' => $flightPrices['total_peice'], 'service_fee' => $flightPrices['service_fee'], 'passengers' => $flightPrices['passenger'], 'purches_date' => date('Y-m-d'), 'payment_id' => $ss, 'payment_ref_id' => $refer_idd], ['id' => $id]);

            $url = HTTP_ROOT . 'users/invoice_pdf/' . $id;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'cURL');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);

            $url1 = HTTP_ROOT . 'users/itinerary_pdf/' . $id;
            $ch1 = curl_init();
            curl_setopt($ch1, CURLOPT_URL, $url1);
            curl_setopt($ch1, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch1, CURLOPT_USERAGENT, 'cURL');
            curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
            $result1 = curl_exec($ch1);
            curl_close($ch1);

            $pay_idd = $ss;

            $to = $urdt['email'];
            $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $from = $fromvalue->value;
            $subject = __('Order Delivered');
            $name = $urdt['email'];

            $bookingdetails = $this->UserBookDetails->find('all')->where(['is_active' => 0, 'id' => $id])->first();
            $fullbookingdetails = $this->UserFullBookingDetails->find('all')->where(['refid' => $id]);
            $passangerdetails = $this->PassengerDetails->find('all')->where(['booking_details_ref' => $id]);
            $userdetails = $this->UserDetails->find('all')->where(['user_id' => $bookingdetails->user_id])->first();
            $usermail = $this->Users->find('all')->where(['id' => $bookingdetails->user_id])->first();

            $iooo = 1;
            $msg_det = "";
            foreach ($passangerdetails as $list) {
                $msg_det .= '<tr style=" display: inline-block; width: 96%; padding: 14px 16px;">
                    <td style=" width: 38px; text-align: left;">' . $iooo++ . '</td>
                    <td style=" width: 47%; text-align: left;">' . $list->name . '</td>
                    <td style=" width: 18%; text-align: left;">' . $bookingdetails->start_d_airline_name . '</td>
                    <td style=" width: 16%; text-align: left;">' . date_format($bookingdetails->purches_date, "d/M/Y") . '</td>
                    <td style=" width: 14%; text-align: right;">' . $bookingdetails->price . '</td></tr>';
            }
            $linkH = new UserHelper(new \Cake\View\View());

            $book_dett = "";
            foreach ($fullbookingdetails as $val) {
                $book_dett .= '<tr>
			<td style="padding: 10px 0;">' . $linkH->cityHelper($val->origin)->city . '</td>
			<td style="padding: 10px 0;">' . $linkH->cityHelper($val->destination)->city . '</td>
			<td style="padding: 10px 0;">' . $val->airline . ' - ' . $val->airnum . '</td>
			<td style="padding: 10px 0;">' . $val->airline . '</td>
			<td style="padding: 10px 0;">' . $bookingdetails->cabin . '</td>
			<td style="padding: 10px 0;">' . $val->dep_time->format('d M Y') . '</td>
			<td style="padding: 10px 0;">' . $val->dep_time->format('H:i') . '</td>
			<td style="padding: 10px 0;">' . $val->arr_time->format('H:i') . '</td>
		</tr>';
            }

            $message = '<body>
        <style>
            *{
                font-family: Arial, Helvetica, sans-serif;
            }
        </style>
        <div class="email-templ" style="border-bottom: 40px solid #f9d55c; padding-bottom: 50px;width: 800px; margin: 0 auto; box-shadow: 0px 0px 25px -4px #000; border-radius: 3px; overflow: hidden;">
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr style="background: url(' . HTTP_ROOT . "img/bg-1.png" . ') left top no-repeat; background-size: 100%;">
                    <td style="text-align: center; padding: 4% 18px 9%;">
                        <img style="float: left; margin-top: 14px;" width="200px;" src="' . HTTP_ROOT . "img/header-logo.png" . '" alt="">
                        <ul style="float: right; text-align: right;">
                            <li style="display:block; color: #fff; font-size: 15px;">Lar do Patriota | Luanda, Belas, Angola</li>
                            <li style="display:block; color: #fff; padding: 6px 0; font-size: 15px;">www.alegro.co.ao | info@alegro.co.ao</li>
                            <li style="display:block; color: #fff; font-size: 15px;">+555 7 789-1234 | +555 7 789-1344</li>
                        </ul>
                    </td>
                </tr>
            </table>
            <div style=" float: left; width: 95%; padding: 19px 20px;">
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                        <td style="text-align: center;">
                            <h1 style=" margin: 0; color: #000; font-size: 25px;">' . __("Invoice") . '</h1>
                            <p style="margin: 9px 0; color: #ccc; font-size: 17px;">#' . $bookingdetails->fare_key . '</p>
                            <h6 style="margin: 0; font-size: 17px; color: #000;">' . date_format($bookingdetails->purches_date, "d/M/Y") . '</h6>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <div style="margin-top: 25px; border-bottom:1px solid #000;float: left; width: 100%; padding-bottom: 10px;">
                                <h5 style=" margin: 0; text-align:left; color: #ccc; font-size: 16px; float: left; width: 70%; font-weight: normal;">' . __("Due Date:") . ' <span style="color: #000;">' . date_format($bookingdetails->purches_date, "d M Y") . '</span></h5>
                                <h5 style=" margin: 0; text-align:left; color: #ccc; font-size: 16px; float: right; width: 30%; font-weight: normal;">' . __("Bill to:") . '</h5>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <div style="float: right; width: 30%; padding-bottom: 10px;">
                                <p style="color: #6b6b6b; font-weight: normal; text-align: left; line-height: 22px;"><span style="font-weight: bold; color: #000;">' . $userdetails->first_name . " " . $userdetails->sur_name . '</span><br> ' . $userdetails->province . ',' . $userdetails->country . '<br>' . $userdetails->phone_number . '<br>' . $usermail->email . '<br>' . __("Attan:") . ' ' . $userdetails->first_name . " " . $userdetails->sur_name . '</p>
                            </div>
                        </td>
                    </tr>
                </table>
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr style=" display: inline-block; width: 96%; border-bottom: 4px solid #ffd456; background: #e4e4e3; padding: 14px 16px;">
                        <th style=" width: 38px; text-align: left;">' . __("ID") . '</th>
                        <th style=" width: 47%; text-align: left;">' . __("Panssenger") . '</th>
                        <th style=" width: 18%; text-align: left;">' . __("Airline") . '</th>
                        <th style=" width: 16%; text-align: left;">' . __("Date") . '</th>
                        <th style=" width: 14%; text-align: right;">' . __("Total Price") . '</th>
                    </tr>
                    ' . $msg_det . '
                    <tr style=" display: inline-block; width: 96%; padding: 14px 16px;">
                        <td style=" display: inline-block; width: 100%;">
                            <ul style=" margin: 0; padding: 0; width: 30%; float: right;">
                                <li style=" margin:5px 0; display: inline-block; width: 100%; font-weight: bold; font-size: 16px; color: #717070; text-align: left;">' . __("Subtotal:") . '<span style="float: right;">' . ($bookingdetails->total_fee - $bookingdetails->service_fee) . '</span></li>
                                <li style=" margin:5px 0;display: inline-block; width: 100%; font-weight: bold; font-size: 16px; color: #717070; text-align: left;">' . __("Tax") . '<span style="float: right;">' . $bookingdetails->service_fee . '</span></li>
                                <li style=" margin:5px 0;display: inline-block; width: 100%; font-weight: bold; font-size: 16px; color: #717070; text-align: left;">' . __("Total") . ' <span style="float: right;">' . $bookingdetails->total_fee . '</span></li>
                                <li style=" margin:5px 0;display: inline-block; width: 100%; font-weight: bold; font-size: 16px; color: #717070; text-align: left;">' . __("Paid") . '<span style="float: right;">' . $bookingdetails->total_fee . '</span></li>
                                <li style=" margin-top: 7px; background: #e4e4e3; padding: 10px 10px; border-bottom: 3px solid #f9d456; display: inline-block; width: 97%; color: #000; font-weight: bold;">' . __("AMOUNT DUE:") . ' <span style="float: right;">0</span></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-size: 16px; color: #000;">' . __("Invoice Terms:") . '</p>
                            <p style="font-size: 16px; color: #000;">' . __("Thank you very much. We really appreciate your business.") . '</p>
                            <p style="font-size: 16px; color: #000;">' . __("please send payments before the due date.") . '</p>
                            <p style="font-size: 16px; color: #000;">' . __("Payments ACC") . '-123006705 | IBAN - US100000060345 | SWIFT - BOA447</p>
                            <p style="font-size: 14px; color: #908f8f; font-style: italic; font-weight: bold;">' . __("All price are in AOA") . '</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
' . '<div style="margin-top:40px;padding-top:40px;background-color:#fff;"></div><div style="margin-top:20px;"></div>' . '
    <style type="text/css">
*{
font-family: Arial, Helvetica, sans-serif;
}
</style>
<div class="email-templ" style="width: 85%; margin: 0 auto;">
	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td style="padding-bottom: 25px;">
				<div style="float: left;">
					<h1 style="margin: 0;">' . __("ITENERARY") . '</h1>
					<p style=" margin: 0;">' . __("Please keep this document until the end of your trip") . '</p>
				</div>
				<div>
					<img style="width: 200px; float: right;" src="' . HTTP_ROOT . "img/header-logo.png" . '">
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<ul style="float: left; width: 30%; list-style-type: none; padding: 0; font-size: 18px;">
					<li style="margin: 5px 0;">' . __("Passenger Name:") . '<span style=" float: right;">' . $userdetails->first_name . " " . $userdetails->sur_name . '</span></li>
					<li style="margin: 5px 0;">' . __("E-Ticket Number:") . '<span style=" float: right;">' . $bookingdetails->payment_id . '</span></li>
					<li style="margin: 5px 0;">' . __("Booking Number:") . ' <span style=" float: right;">' . $bookingdetails->payment_ref_id . '</span></li>
					<li style="margin: 5px 0;">' . __("Airline:") . '<span style=" float: right;">' . $bookingdetails->start_d_airline_name . '</span></li>
					<li style="margin: 5px 0;">' . __("Issue Date:") . '<span style=" float: right;">' . $bookingdetails->purches_date->format('d M Y') . '</span></li>
				</ul>
				<ul style="float: right; width: 30%; list-style-type: none; padding: 0;">
					<li style="margin: 5px 0;">' . __("Agency:") . '<span style=" float: right;">' . __("ALEGRO") . '</span></li>
					<li style="margin: 5px 0;">' . __("Address:") . '<span style=" float: right;">' . __("Lar do Patriota") . '</span></li>
					<li style="margin: 5px 0;">' . __("Phone Number:") . ' <span style=" float: right;">+244 923 480 978</span></li>
					<li style="margin: 5px 0;">' . __("Email") . '<span style=" float: right;">info@alegro.co.ao</span></li>
					<li style="margin: 5px 0;">' . __("AITA:") . '<span style=" float: right;">0345666</span></li>
				</ul>
			</td>
		</tr>
	</table>
	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-top: 8%;">
		<tr style="text-align: left;">
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">' . __("FROM") . '</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">' . __("TO") . '</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">' . __("FLIGHT") . '</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">' . __("AIRLINE") . '</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">' . __("CABIN") . '</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">' . __("DATE") . '</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">' . __("DEPARTURE") . '</th>
			<th style=" padding-bottom: 10px; border-bottom:3px solid #000;">' . __("ARRIVAL") . '</th>
		</tr>
                ' . $book_dett . '
	</table>
	<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
		<tr>
			<td style="text-align: center;">
				<h5 style="margin: 6% 0 10%; padding: 12px 0; font-size: 19px; border-bottom: 3px solid #000; border-top: 3px solid #000;">
					<a style="color: #000; text-decoration: none;" href="' . HTTP_ROOT . 'faq">' . __("To Check-in go HERE") . '</a>
				</h5>
			</td>
		</tr>
		<tr>
			<td>
				<div style=" float: left; width: 27%; padding-right: 52px;">
					<div style="float: left; width: 100%; margin-bottom: 35px;">
						<div style="float: left; width: 102px;">
							<img src="' . HTTP_ROOT . "img/bag.png" . '" alt=""  width="90">
						</div>
						<div style=" float: left; width: 40%; margin-left: 25px;">
							<h2 style="font-size: 23px; margin-bottom: 0;">' . __("BAGGAGE DROP") . '</h2>
							<h5 style="font-size: 16px; margin-top: 10px; margin-bottom: 0;">' . __("2 hours before departure") . '</h5>
						</div>
					</div>
					<p style="float: left; width: 100%; margin-top: 5px; font-size: 17px; line-height: 23px;">' . __("Check-in baggage can be dropped off at departure hall 2.Economy Class:row 11-13.World Business Class/Europe Select:row 9/10.Platinum/Gold Flying Blue members: row 9/10.") . '</p>
				</div>
				<div style=" float: left; width: 27%; padding-left: 17px; padding-right: 52px; border-left: 2px solid #000; border-right: 2px solid #000;">
					<div style="float: left; width: 100%; margin-bottom: 35px;">
						<div style="float: left; width: 102px;">
							<img src="' . HTTP_ROOT . "img/boarding.png" . '" alt=""  width="90">
						</div>
						<div style=" float: left; width: 40%; margin-left: 25px;">
							<h2 style="font-size: 23px; margin-bottom: 0;">' . __("BOARDING") . '</h2>
							<h5 style="font-size: 16px; margin-top: 10px; margin-bottom: 0;">' . __("From") . ' 19:40</h5>
						</div>
					</div>
					<p style="float: left; width: 100%; margin-top: 5px; font-size: 17px; line-height: 23px;">' . __("If you have hand-baggage only you may go straight to the gate.In Amsterdam go to Departure hall 1 for Schengen countries and Departure Hall 2 for all other countries.") . '</p>
				</div>
				<div style=" float: left; width: 27%; padding-left: 20px;">
					<div style="float: left; width: 100%; margin-bottom: 35px;">
						<div style="float: left; width: 102px;">
                                                    <img src="' . HTTP_ROOT . "img/last-call.png" . '" alt="" width="90">
						</div>
						<div style=" float: left; width: 40%; margin-left: 25px;">
							<h2 style="font-size: 23px; margin-bottom: 0;">LAST CALL</h2>
							<h5 style="font-size: 16px; margin-top: 10px; margin-bottom: 0;">' . __("Check the monitors at the airport") . '</h5>
						</div>
					</div>
					<p style="float: left; width: 100%; margin-top: 5px; font-size: 17px; line-height: 23px;">' . __("Be aware that after boarding closure time you will be refused and your baggage offloaded.") . '</p>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<h4 style="text-align: center; font-size: 18px; margin-bottom: 50px;">' . $bookingdetails->start_d_airline_name . ' ' . __("wishes you a very nice flight") . '</h4>
			</td>
		</tr>
		<tr>
			<td>
				<div style=" float: left; width: 68%;">
					<h3 style="font-size: 23px;">' . __("Important departure information please read all instructions carefully!") . '</h3>
					<p>' . __("1.Check your baggage at least 120 minuts prior to departure for intercontinental flights and 90 minuts for European flights.") . '</p>
					<p>' . __("2.Please take waiting times into account during rush hours and holiday periods for both the baggage drop-off and security checks") . '</p>
					<p>' . __("3.Ensure your baggage is not left unsupervised.If it is left unattended or if you have been given something to carry by another person,you must inform KLM staff.Please check the latest baggage restrictions on KLM.com.") . '</p>
					<p>' . __("4.Flying Blue Platinum,Gold and Silver members travelling in Economy Class from Schiphol to a schengen destination are allowed to use the existing priority security check lane in Departure Hall 1 and 2.") . '</p>
					<p>' . __("5.For your safety,and to prevent delayed flights,hand baggage restrictions are strictly followed.") . '</p>
				</div>
				<div style=" float: left; width: 27%; border:2px solid #000;padding: 15px 15px 45px;text-align: center; ">
					<h4 style="color: rgb(239,56,66); font-size: 20px;">' . __("Visit blur.by/KLMBOOK") . '</h4>
					<div style=" opacity: .8;padding: 28px 0; width: 185px; height: 130px; background-color: rgb(239,56,66); border-radius: 95px; margin: 0 auto;">
						<h3 style="margin-bottom: 16px;color: #fff; font-size: 25px; font-style: italic;">' . __("Get") . ' <span style="font-size: 23px;">20%</span> off *</h3>
						<p style="font-size: 19px; color: #fff; font-weight: bold; margin: 0;">' . __("with code:") . '</p>
						<p style="font-size: 19px; color: #fff; font-weight: bold; margin: 7px 0;">' . __("KLM 20") . '</p>
					</div>
				</div>
			</td>
		</tr>
	</table>
</div>
</body>
' . FILES . 'INVOICE/' . date('d-m-Y') . '/' . $usermail->email . '/invoice.pdf' . ',' . FILES . 'ITENERARY/' . date('d-m-Y') . '/' . $usermail->email . '/itinerary.pdf';



            // $this->Custom->sendEmail($to, $from, $subject, $message);

            $to = 'bibhu268.phpdeveloper@gmail.com';
            $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $from = $fromvalue->value;

            $from_name = 'Alegro';
            $subject = 'Order Delivered';
            $aaa1 = 'files/INVOICE/' . date('d-m-Y') . '/' . $usermail->email . '/invoice.pdf';
            $aaa2 = 'files/ITENERARY/' . date('d-m-Y') . '/' . $usermail->email . '/itinerary.pdf';
//attachment files path array
            $files = array($aaa1, $aaa2);

            $this->Custom->multi_attach_mail($to, $subject, $message, $from, $from_name, $files);




            //echo "hii";exit;
            // $email = new Email('default');
            /* $email->from($from)
              ->attachments([FILES . 'INVOICE/' . date('d-m-Y') . '/' . $usermail->email.'/invoice.pdf',FILES . 'ITENERARY/' . date('d-m-Y') . '/' . $usermail->email.'/itinerary.pdf'])
              ->to($to)
              ->emailFormat('html')
              ->subject($subject)

              ->send($message); */
        }


        $this->set(compact('pageDetails', 'cabin', 'fligh_det', 'full_det', 'pay_idd'));
    }

    public function emailvalidate() {
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $res = $this->Users->find('all')->where(['email' => $data['email']])->count();
        }
        if ($res >= 1) {
            echo json_encode(array('status' => 'error', 'message' => 'Email already exists.'));
        } else if ($res == 0) {
            echo json_encode(array('status' => 'success', 'message' => 'Email is available.'));
        }
        exit;
    }

    public function routeReview($id = null, $arg2 = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
        }

        if (!empty($arg2) && $arg2 == "share") {
            $shr = $this->Shareinfo->find('all')->where(['ref_numb' => $id])->first();


            $_COOKIE["UserId"] = $shr->cookie;
        }
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 19])->first();
        $cabin = $this->Searchdatas->find('all')->where(['uniqueid' => $_COOKIE["UserId"]])->first()->toArray();
        $fligh_det = $this->UserBookDetails->find('all')->where(['id' => $id, 'uniqueid' => $_COOKIE["UserId"]])->first();
        $full_det = $this->UserFullBookingDetails->find('all')->where(['refid' => $id, 'uniqueid' => $_COOKIE["UserId"]]);
        $ubd = $this->UserBookDetails->find('all')->where(['id' => $id, 'uniqueid' => $_COOKIE["UserId"]])->first();
        $servicefee = $this->ServiceFee->find('all')->where(['id' => 1])->first();
        $this->set(compact('pageDetails', 'cabin', 'fligh_det', 'full_det', 'id', 'ubd', 'servicefee'));
    }

    public function index() {


        //$travelportFlight = new Flight();
        // echo($travelportFlight->AirLowFareSearchReq(array(
        //     "Origin"=> "LIS",
        //     "Destination"=> "LAD",
        //   "DepartureDate"=> "2020-02-08",
        //   "DepartureTime"=> "",
        //   "ArrivalDate"=> "",
        //   "ArrivalTime"=> "",
        //   "TripType"=> "oneway",
        //   "CabinClass"=> "",
        //   "Currency" => "AOA",
        //   "SearchPassenger"=> array(
        //       "Adult"=> 1,
        //       "Children"=> 0,
        //       "Infant"=> 0
        //     )
        // )));
        /*
          $origin = "LAD";
          $destination = "LIS";
          $request_details = [
          "Origin"=> $origin,
          "Destination"=> $destination,
          "DepartureDate"=> "2020-02-08",
          "DepartureTime"=> "10:00:00",
          "ArrivalDate"=> "2020-02-12",
          "ArrivalTime"=> "10:00:00",
          "TripType"=> "round",
          "CabinClass"=> "",
          "Currency" => "AOA",
          "SearchPassenger"=> [ "Adult"=> 1,"Children"=> 0,"Infant"=> 0 ],
          ];
          $round_trip = $this->Custom->flightDetailsApiData($travelportFlight,$request_details);
          $flightList=[];
          $flightList_data=[];
          $flight_list_count=1;
          foreach($round_trip->ResponseData as $lists){$numb_cnt=0;

          $flightList_data[$flight_list_count]['price']=$lists->TotalPrice['Currency'].$lists->TotalPrice['Amount'];
          $flightList_data[$flight_list_count]['total_price']=$lists->TotalPrice['Amount'];
          $flightList_data[$flight_list_count]['cancel_penalty']=!empty($lists->CancelPenalty->Percentage)?$lists->CancelPenalty->Percentage:$lists->CancelPenalty->Amount;
          $flightList_data[$flight_list_count]['cancel_penalty_type']=!empty($lists->CancelPenalty->Percentage)?'Percentage':'Amount';
          $flightList_data[$flight_list_count]['cancel_penalty_no_show']=!empty($lists->CancelPenalty->NoShow)?$lists->CancelPenalty->NoShow:false;
          $flightList_data[$flight_list_count]['cancel_penalty_applies']=$lists->CancelPenalty->PenaltyApplies;

          $flightList_data[$flight_list_count]['change_penalty']=!empty($lists->ChangePenalty->Percentage)?$lists->ChangePenalty->Percentage:$lists->ChangePenalty->Amount;
          $flightList_data[$flight_list_count]['change_penalty_type']=!empty($lists->ChangePenalty->Percentage)?'Percentage':'Amount';
          $flightList_data[$flight_list_count]['change_penalty_no_show']=!empty($lists->ChangePenalty->NoShow)?$lists->ChangePenalty->NoShow:false;
          $flightList_data[$flight_list_count]['change_penalty_applies']=$lists->ChangePenalty->PenaltyApplies;

          foreach($lists->TaxInfo as $taxs){
          if($taxs->Category == 'AO'){
          $flightList_data[$flight_list_count]['tax_key']=$taxs->Key;
          $flightList_data[$flight_list_count]['tax_category']=$taxs->Category;
          $flightList_data[$flight_list_count]['tax_amount']=$taxs->Amount;
          }
          }

          foreach($lists->FlightOptionsList->FlightOption as $key=>$seginfor){
          $flightList[$flight_list_count]=$flight_list_count;
          foreach($seginfor->Option as $key1=>$det){
          $numb_cnt++;
          $numb_cnt1=0;
          foreach($det->BookingInfo as $segments){
          $numb_cnt1++;
          if($segments->SegmentRef->Destination == $origin){
          $flightList_data[$flight_list_count][$numb_cnt][$numb_cnt1]['Journey_type'] = "Journey Details Return";
          }else{
          $flightList_data[$flight_list_count][$numb_cnt][$numb_cnt1]['Journey_type'] = "Journey Details Start";;
          }
          $flightList_data[$flight_list_count][$numb_cnt][$numb_cnt1]['origin']=$segments->SegmentRef->Origin;
          $flightList_data[$flight_list_count][$numb_cnt][$numb_cnt1]['destination']=$segments->SegmentRef->Destination;
          $flightList_data[$flight_list_count][$numb_cnt][$numb_cnt1]['departure_time']=$segments->SegmentRef->DepartureTime;
          $flightList_data[$flight_list_count][$numb_cnt][$numb_cnt1]['arrival_time']=$segments->SegmentRef->ArrivalTime;
          $flightList_data[$flight_list_count][$numb_cnt][$numb_cnt1]['flight_time']=$segments->SegmentRef->FlightTime;
          $flightList_data[$flight_list_count][$numb_cnt][$numb_cnt1]['carrier']=$segments->SegmentRef->Carrier;
          $flightList_data[$flight_list_count][$numb_cnt][$numb_cnt1]['flight_number']=$segments->SegmentRef->FlightNumber;
          // foreach($segments->SegmentRef->FlightDetailsRef as $keyz=>$var_data){
          //     echo $keyz.'<br>';
          //     var_dump($var_data);
          //     // foreach($var_data->SegmentRef as $flig){
          //     //     pj($flig);
          //     //     echo "<br>-----------------aaaa-----------------<br>";
          //     // }
          //      echo "<br>-----------------zzzz-----------------<br>";
          // }
          }
          }
          }
          $flight_list_count++;


          }
          pj($flightList_data);
          echo "<h1>FROM API</h1>";
          pj($round_trip->ResponseData);
          exit;
          echo "<br>-----------------OUTSIDE LOOP-----------------<br>";
          echo "<pre>";
          var_dump($round_trip);
          //exit;
         */
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
        }

        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 9])->first();
        $testimonial = $this->Testimonials->find('all')->where(['Testimonials.is_active' => 1]);
        $this->request->session()->read("lan");

        $UserBookDetails = $this->UserBookDetails->find('all')->where(['UserBookDetails.origin' => 'LAD'])->group('destination');

        $this->set(compact('pageDetails', 'testimonial', 'UserBookDetails'));
    }

    public function fareDetails($id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
        }

        $this->viewBuilder()->layout('default');
        $servicefee = $this->ServiceFee->find('all')->where(['id' => 1])->first();
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 18])->first();
        $cabin = $this->Searchdatas->find('all')->where(['uniqueid' => $_COOKIE["UserId"]])->first()->toArray();
        $datas = $this->Journydetails->find('all')->where(['id' => $id, 'uniqueid' => $_COOKIE["UserId"]])->first()->toArray();
        $fulldata = $this->Fulljournydetails->find('all')->where(['refid' => $id, 'uniqueid' => $_COOKIE["UserId"]])->order(['id' => 'ASC'])->toArray();
        $ubd = $this->UserBookDetails->find('all')->where(['link_id' => $id, 'uniqueid' => $_COOKIE["UserId"]])->first();
        if (empty($ubd)) {
            $dat = $this->UserBookDetails->newEntity();
            $datas1['id'] = '';
            $datas1['uniqueid'] = $datas['uniqueid'];
            $datas1['origin'] = $cabin['origin'];
            $datas1['destination'] = $cabin['destination'];
            $datas1['cabin'] = $cabin['cabin'];
            $datas1['start_d_airline_name'] = $datas['start_d_airline_name'];
            $datas1['start_d_airline_num'] = $datas['start_d_airline_num'];
            $datas1['start_depart_time'] = $datas['start_depart_time'];
            $datas1['start_arrival_time'] = $datas['start_arrival_time'];
            $datas1['return_d_airline_name'] = $datas['return_d_airline_name'];
            $datas1['return_d_airline_num'] = $datas['return_d_airline_num'];
            $datas1['return_depart_time'] = $datas['return_depart_time'];
            $datas1['return_arrival_time'] = $datas['return_arrival_time'];
            $datas1['price'] = $datas['price'];
            $datas1['refundable'] = $datas['refundable'];
            $datas1['fare_key'] = $datas['fare_key'];
            $datas1['passengers'] = explode(" ", $cabin['passenger'])[0];
            $datas1['link_id'] = $datas['id'];
            $datas1['user_id'] = $this->Auth->user('id');
            $dat = $this->UserBookDetails->patchEntity($dat, $datas1);
            $this->UserBookDetails->save($dat);
            $flight_view_id = $dat->id;
            foreach ($fulldata as $val) {

                $data = $this->UserFullBookingDetails->newEntity();
                $val1['refid'] = $dat->id;
                $val1['m_id'] = $val['m_id'];
                $val1['uniqueid'] = $val['uniqueid'];
                $val1['jor_typ'] = $val['jor_typ'];
                $val1['airline'] = $val['airline'];
                $val1['airnum'] = $val['airnum'];
                $val1['origin'] = $val['origin'];
                $val1['destination'] = $val['destination'];
                $val1['dep_time'] = $val['dep_time'];
                $val1['arr_time'] = $val['arr_time'];
                $data = $this->UserFullBookingDetails->patchEntity($data, $val1);
                $this->UserFullBookingDetails->save($data);
            }
            $ubd = $this->UserBookDetails->find('all')->where(['link_id' => $id, 'uniqueid' => $_COOKIE["UserId"]])->first();
        } else {
            $flight_view_id = $ubd->id;
        }
        $full_det = $this->UserFullBookingDetails->find('all')->where(['refid' => $id, 'uniqueid' => $_COOKIE["UserId"]]);
        $servicefee = $this->ServiceFee->find('all')->where(['id' => 1])->first();

        $this->set(compact('pageDetails', 'ubd', 'full_det', 'cabin', 'servicefee', 'id', 'flight_view_id'));
    }

    public function airportdata() {
        if ($this->request->is('post')) {
            $cookiunq = $_COOKIE["UserId"];
            $datas = $this->request->data;
            //pj($datas);
            $tt_tim = @$datas['depart'];
            if ($tt_tim == null) {
                $tt_tim = "00:00:01 to 23:59:59";
            }
            $st_tim = date('H:i:s', strtotime(explode('to', $tt_tim)[0]));
            $ed_tim = date('H:i:s', strtotime(explode('to', $tt_tim)[1]));
            if ($st_tim == null) {
                $st_tim = "00:00:01";
            }
            if ($ed_tim == null) {
                $ed_tim = "23:59:59";
            }
            $air_d = $datas['airport'];
            $air_dat = explode("|", $air_d);
            $orr = $datas['origin'];
            $dess = $datas['destination'];

            $cabi = $datas['cabin'];
            $st_pri = $datas['startprice'];
            $end_pri = $datas['endprice'];
            $offs = ($datas['page'] - 1) * 15;
            $limit = 15;
            $sort_data = $datas['sortby'];
            $st_v = @$datas['air_stops'];
            if ($st_v == null) {
                $st_v = 10;
            }
            if ($st_v == 0 || $st_v == 1) {
                $st_d = '<=';
                $st_dd = '>=';
            }
            if ($st_v == 2) {
                $st_d = '>=';
                $st_dd = '>=';
            }
            if ($st_v == 10) {
                $st_d = '<=';
                $st_dd = '<=';
            }

            $sort_d = explode(".", $datas['sortby'])[0];
            $sort_v = explode(".", $datas['sortby'])[1];
            //$ref = "true";
            $ref = "";
            if (($sort_d == 'refundable') && ($sort_v == 'ASC')) {
                $ref = "false";
            }
            if (($sort_d == 'refundable') && ($sort_v == 'DESC')) {
                $ref = "true";
            }
            $this->Journydetails->hasMany('Fulljournydetails', ['className' => 'Fulljournydetails', 'foreignKey' => 'refid', 'order' => ['id ASC']]);
            $START_Price = ($datas['startprice'] == 0) ? 0 : $this->Custom->priceConvert('AOA', $datas['startprice'], $this->request->session()->read("CURRENCY"));
            $END_Price = $this->Custom->priceConvert('AOA', $datas['endprice'], $this->request->session()->read("CURRENCY"));
            if (empty($ref)) {
                $search_det_dats = $this->Journydetails->find('all')->contain('Fulljournydetails')->where(['Journydetails.uniqueid' => $cookiunq, 'comp_price >=' => $START_Price, 'comp_price <=' => $END_Price, 'start_d_airline_name IN' => $air_dat, 'depart_time >=' => $st_tim, 'depart_time <=' => $ed_tim, "stops $st_d" => $st_v, "stops $st_dd" => $st_v])->order(["Journydetails.$sort_d" => "$sort_v"])->offset($offs)->limit($limit);

                $res_found = $this->Journydetails->find('all')->where(['Journydetails.uniqueid' => $cookiunq, 'comp_price >=' => $START_Price, 'comp_price <=' => $END_Price, 'start_d_airline_name IN' => $air_dat, 'depart_time >=' => $st_tim, 'depart_time <=' => $ed_tim, "stops $st_d" => $st_v, "stops $st_dd" => $st_v])->count();
            } else {
                $search_det_dats = $this->Journydetails->find('all')->contain('Fulljournydetails')->where(['Journydetails.uniqueid' => $cookiunq, 'comp_price >=' => $START_Price, 'comp_price <=' => $END_Price, 'start_d_airline_name IN' => $air_dat, 'depart_time >=' => $st_tim, 'depart_time <=' => $ed_tim, "stops $st_d" => $st_v, "stops $st_dd" => $st_v, 'refundable' => $ref])->order(["Journydetails.$sort_d" => "$sort_v"])->offset($offs)->limit($limit);

                $res_found = $this->Journydetails->find('all')->where(['Journydetails.uniqueid' => $cookiunq, 'comp_price >=' => $START_Price, 'comp_price <=' => $END_Price, 'start_d_airline_name IN' => $air_dat, 'depart_time >=' => $st_tim, 'depart_time <=' => $ed_tim, "stops $st_d" => $st_v, "stops $st_dd" => $st_v, 'refundable' => $ref])->count();
            }
        }
        //IN' => $arr_deac
        $this->set(compact('search_det_dats', 'orr', 'dess', 'res_found', 'cookiunq', 'st_pri', 'end_pri', 'air_d', 'tt_tim', 'st_v', 'cabi', 'sort_data'));
    }

    public function pricedatas() {

        if ($this->request->is('post')) {
            $cookiunq = $_COOKIE["UserId"];
            $datas = $this->request->data;
            $st_pri = $datas['startprice'];
            $end_pri = $datas['endprice'];
            $orr = $datas['origin'];
            $dess = $datas['destination'];
            $offs = ($datas['page'] - 1) * 15;
            $limit = 15;

            $this->Journydetails->hasMany('Fulljournydetails', ['className' => 'Fulljournydetails', 'foreignKey' => 'refid', 'order' => 'ASC']);
            $search_det_dats = $this->Journydetails->find('all')->contain('Fulljournydetails')->where(['Journydetails.uniqueid' => $cookiunq, 'comp_price >=' => $datas['startprice'], 'comp_price <=' => $datas['endprice']])->order(['Journydetails.id' => 'ASC'])->offset($offs)->limit($limit);

            $res_found = $this->Journydetails->find('all')->where(['Journydetails.uniqueid' => $cookiunq, 'comp_price >=' => $datas['startprice'], 'comp_price <=' => $datas['endprice']])->count();
        }
        //IN' => $arr_deac
        $this->set(compact('search_det_dats', 'orr', 'dess', 'res_found', 'cookiunq', 'st_pri', 'end_pri'));
    }

    public function pagedata() {
        if ($this->request->is('post')) {
            $datas = $this->request->data;
            $offs = ($datas['page'] - 1) * 15;
            $limit = 15;

            $orr = $datas['origin'];
            $cabin = $datas['cabin'];
            $dess = $datas['destination'];
            $this->Journydetails->hasMany('Fulljournydetails', ['className' => 'Fulljournydetails', 'foreignKey' => 'refid', 'order' => 'ASC']);
            $search_det_dats = $this->Journydetails->find('all')->contain('Fulljournydetails')->where(['Journydetails.uniqueid' => $datas['id']])->order(['Journydetails.id' => 'ASC'])->offset($offs)->limit($limit);

            $res_found = $this->Journydetails->find('all')->where(['Journydetails.uniqueid' => $_COOKIE["UserId"]])->count();
            $cookiunq = $_COOKIE["UserId"];
            $this->set(compact('search_det_dats', 'orr', 'dess', 'res_found', 'cookiunq', 'cabin'));
        }
    }

    public function myBooking() {
        $type = $this->request->session()->read('Auth.User.type');
        if (($type == 1) || ($type == 3)) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->viewBuilder()->layout('default');
        if (!empty($_GET['q']) && ($_GET['q'] == 'a')) {
            $all_pro_booking = $this->HotelBookingDetails->find('all')->where(['user_id' => $this->Auth->user('id'), 'payment_status IN' => [3, 6], 'user_htl_reach_status !=' => 5, 'check_out >=' => date('Y-m-d')])->order(['check_in' => 'DESC']);
        } elseif (!empty($_GET['q']) && ($_GET['q'] == 'p')) {
            $all_pro_booking = $this->HotelBookingDetails->find('all')->where(['user_id' => $this->Auth->user('id'), 'user_htl_reach_status !=' => 5, 'payment_status' => 1])->order(['check_in' => 'DESC']);
        } elseif (!empty($_GET['q']) && ($_GET['q'] == 'c')) {
            $all_pro_booking = $this->HotelBookingDetails->find('all')->where(['user_id' => $this->Auth->user('id'), 'user_htl_reach_status !=' => 5, 'payment_status IN' => [2, 4]])->order(['check_in' => 'DESC']);
        } elseif (!empty($_GET['q']) && ($_GET['q'] == 'past')) {
            $all_pro_booking = $this->HotelBookingDetails->find('all')->where(['user_id' => $this->Auth->user('id'), 'payment_status' => 3, 'user_htl_reach_status !=' => 5, 'check_out <=' => date('Y-m-d')])->order(['check_in' => 'DESC']);
        } elseif (!empty($_GET['q']) && ($_GET['q'] == 'r')) {
            $all_pro_booking = $this->HotelBookingDetails->find('all')->where(['user_id' => $this->Auth->user('id'), 'user_htl_reach_status' => 5])->order(['check_in' => 'DESC']);
        } else {
            $all_pro_booking = $this->HotelBookingDetails->find('all')->where(['user_id' => $this->Auth->user('id')])->order(['check_in' => 'DESC']);
        }
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 16])->first();
        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();

        $user_id = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if ($data['review_submit'] == 'review_submit') {

                $review = $this->HotelReviews->newEntity();
                $review = $this->HotelReviews->patchEntity($review, $data);
                $lastid = $this->HotelReviews->save($review);

                return $this->redirect(HTTP_ROOT . 'my-booking?r=success');
                exit;
            }
            $this->UserDetails->updateAll(['first_name' => $data['first_name'], 'sur_name' => $data['sur_name'], 'dateofbirth' => $data['dob'], 'gender' => $data['gender'], 'country' => $data['country']], ['user_id' => $user_id]);
            $this->Users->updateAll(['name' => $data['first_name']], ['id' => $user_id]);
            $this->Flash->success(__('Profile updated sucessfully.'));
            return $this->redirect(HTTP_ROOT . 'profile');
        }
        $this->UserBookDetails->hasMany('UserFullBookingDetails', ['className' => 'UserFullBookingDetails', 'foreignKey' => 'refid', 'order' => ['Fulljournydetails.id' => 'ASC']]);
//        $pendingdet = $this->UserBookDetails->find('all')->contain('UserFullBookingDetails')->where(['user_id' => $user_id, 'is_active' => 0])->order(['UserBookDetails.start_depart_time'=>'DESC']);
//        $pendingcount = $pendingdet->count();
//
//        $past = $this->UserBookDetails->find('all')->contain('UserFullBookingDetails')->where(['user_id' => $user_id, 'is_active' => 1, 'start_depart_time <=' => date('Y-m-d H:i:s')])->order(['UserBookDetails.start_depart_time'=>'DESC']);
//        $pastcount = $past->count();
//
//        $active = $this->UserBookDetails->find('all')->contain('UserFullBookingDetails')->where(['user_id' => $user_id, 'is_active' => 1, 'start_depart_time >=' => date('Y-m-d H:i:s')])->order(['UserBookDetails.start_depart_time'=>'DESC']);
//        $activecount = $active->count();
        if ((empty($_GET['q'])) || ($_GET['q'] == 'a')) {
            $active = $this->UserBookDetails->find('all')->contain('UserFullBookingDetails')->where(['user_id' => $user_id])->order(['UserBookDetails.start_depart_time' => 'ASC']);
            $fli_cnt = $activecount = $active->count();
        }
        if ((!empty($_GET['q'])) && ($_GET['q'] == 'past')) {

            $past = $this->UserBookDetails->find('all')->contain('UserFullBookingDetails')->where(['user_id' => $user_id, 'is_active' => 1])->order(['UserBookDetails.start_depart_time' => 'DESC']);
            $fli_cnt = $pastcount = $past->count();
        }

        if ((!empty($_GET['q'])) && ($_GET['q'] == 'p')) {
            $pendingdet = $this->UserBookDetails->find('all')->contain('UserFullBookingDetails')->where(['user_id' => $user_id, 'is_active' => 0])->order(['UserBookDetails.start_depart_time' => 'DESC']);
            $fli_cnt = $pendingcount = $pendingdet->count();
        }

        if ((!empty($_GET['q'])) && ($_GET['q'] == 'c')) {
            $canceldet = $this->UserBookDetails->find('all')->contain('UserFullBookingDetails')->where(['user_id' => $user_id, 'is_active' => 2])->order(['UserBookDetails.start_depart_time' => 'DESC']);
            $fli_cnt = $cancelcount = $canceldet->count();
        }


        $this->set(compact('pageDetails', 'userDetails', 'pendingdet', 'pendingcount', 'past', 'pastcount', 'active', 'activecount', 'all_pro_booking', 'fli_cnt', 'canceldet', 'cancelcount'));
    }

    public function hotelSearchResult() {
        $all_property = [];
        $pageDetails = new \stdClass();
        $city = @$_GET['from_location_name'];
        $country = $this->HotelCountryCitys->find('all')->where(['id' => @$_GET['state-name']])->first()->country_name;
        $pageDetails->meta_title = $city . ' - ' . $country . ', ' . __(date("D", strtotime(str_replace('/', ' - ', @$_GET['hotel_check_in'])))) . ' ' . __(date("d", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))) . ' ' . __(date("M", strtotime(str_replace('/', '-', @$_GET['hotel_check_in'])))) . ' - ' . __(date("D", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))) . ' ' . __(date("d", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))) . '-' . __(date("M", strtotime(str_replace('/', '-', @$_GET['hotel_check_out'])))) . ' | ' . SITE_NAME;
        $pageDetails->meta_keyword = $city . ' - ' . $country . ', ' . date("D, d M", strtotime(str_replace('/', ' - ', @$_GET['hotel_check_in']))) . '-' . date("D, d M", strtotime(str_replace('/', '-', @$_GET['hotel_check_out']))) . '| ' . SITE_NAME;
        $pageDetails->meta_desc = $city . '-' . $country . ',' . date("D, d M", strtotime(str_replace('/', '-', @$_GET['hotel_check_in']))) . '-' . date("D, d M", strtotime(str_replace('/', '-', @$_GET['hotel_check_out']))) . '| ' . SITE_NAME;

        $this->set(compact('pageDetails'));

        $this->viewBuilder()->layout('default');
        if ($this->request->is('get')) {
            $datas = $this->request->query;
            $this->request->session()->write('UserSearch', $datas);
            $hotel_check_in = date("Y-m-d", strtotime(str_replace('/', '-', $datas['hotel_check_in'])));
            $hotel_check_out = date("Y-m-d", strtotime(str_replace('/', '-', $datas['hotel_check_out'])));
            $date1 = date_create($hotel_check_in);
            $date2 = date_create($hotel_check_out);
            $diff = date_diff($date1, $date2);
            $totaldate = $diff->format("%a");

            if (isset($datas['from_location_name'])) {
                $locations = $datas['from_location_name'];
            }
            
            if (isset($datas['hotel_check_in'])) {
                $hotel_check_in = $datas['hotel_check_in'];
            }
            if (isset($datas['hotel_check_out'])) {
                $hotel_check_out = $datas['hotel_check_out'];
            }

            if (isset($datas['rooms'])) {
                $rooms = $datas['rooms'];
            }
            if (isset($datas['adult'])) {
                $adult = $datas['adult'];
            }
            if (isset($datas['children'])) {
                $children = $datas['children'];
            }

            if (isset($datas['star_rating'])) {
                $star_rating = $datas['star_rating'];
            }

            //echo $locations; exit;
            $this->ExtranetsUserPropertyLocation->belongsTo('main_tb', ['className' => 'ExtranetsUserProperty', 'foreignKey' => 'property_id']);
            $search_property = $this->ExtranetsUserPropertyLocation->find('all')->contain(['main_tb'])->where(['state' => $locations, 'main_tb.complete_ststus' => 1, 'main_tb.active_ststus' => 1]);


//pj($search_property); exit;


            if ($search_property->count() > 0) {
//                $check_already_booked = $this->HotelBookingDetails->find('all')->where(['check_in' => date('Y-m-d'), 'payment_status' => 3, 'location' => $locations]);
//                pj($check_already_booked);
//                pj($datas);
//
//                pj($search_property->extract('property_id')->toArray());
//                pj($search_property->count());

                $property_room_count = [];
                $all_available_properties = $search_property->extract('property_id')->toArray();
              //  pj($all_available_properties); exit;
                foreach ($all_available_properties as $available_property) {
                    $property_rooms = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id' => $available_property]);
                   //pj($property_rooms);
                    foreach ($property_rooms as $property_room) {
                       // echo $property_room->room_count;
                      //echo "<br>";
                      //echo $rooms;
                        if ($property_room->room_count >= $rooms) {
                            $property_room_count[$available_property][$property_room->id] = $property_room->room_count;
                        }
//                        else{
//                           echo $available_property.' - '.$property_room->id.' - '.$property_room->room_count.' | ';
//                        }
                    }
                }
//pj($property_room_count); 
//exit;

//                $chk_already_book_rooms_count_details = $this->HotelBookingDetails->find('all')->where(['check_in' => date("Y-m-d", strtotime(str_replace('/', '-', $datas['hotel_check_in']))), 'payment_status' => 3, 'location' => $locations])->select(['property_id', 'total_rooms_booked' => 'SUM(numb_rooms)', 'room_id'])->group(['room_id']); // Not REQUIRED NEED TO DELETE THIS LINE



                $conn = ConnectionManager::get('default');

                $ser_hotel_ck_in_dt = date("Y-m-d", strtotime(str_replace('/', '-', $datas['hotel_check_in'])));
                $ser_hotel_ck_out_dt = date("Y-m-d", strtotime(str_replace('/', '-', $datas['hotel_check_out'])));

                $chk_already_book_rooms_count_details = $conn->execute('SELECT SUM(numb_rooms) AS total_rooms_booked,room_id,property_id FROM hotel_booking_details WHERE "' . $ser_hotel_ck_in_dt . '" BETWEEN hotel_booking_details.check_in AND hotel_booking_details.check_out OR "' . $ser_hotel_ck_out_dt . '" BETWEEN hotel_booking_details.check_in AND hotel_booking_details.check_out AND payment_status=3 AND location="' . $locations . '" GROUP BY room_id')->fetchAll('assoc');


            //pj($chk_already_book_rooms_count_details);
             // exit;
                if (count($chk_already_book_rooms_count_details) > 0) {
                    // $chk_already_book_rooms_count_details = $chk_already_book_rooms_count_details->toArray();
                    foreach ($chk_already_book_rooms_count_details as $chk_rm_count_detail) {
//                        echo $chk_rm_count_detail['property_id'];
//                        exit;
                        // pj($property_room_count[$chk_rm_count_detail->property_id][$chk_rm_count_detail->room_id]);
                        if (!empty($property_room_count[$chk_rm_count_detail['property_id']][$chk_rm_count_detail['room_id']]) && (($property_room_count[$chk_rm_count_detail['property_id']][$chk_rm_count_detail['room_id']] - $chk_rm_count_detail['total_rooms_booked']) < $rooms)) {
                            //pj($property_room_count[$chk_rm_count_detail->property_id][$chk_rm_count_detail->room_id]);
                            unset($property_room_count[$chk_rm_count_detail['property_id']][$chk_rm_count_detail['room_id']]);
                        }
                    }
                }

//pj($property_room_count); exit;
                foreach ($property_room_count as $pro_det) {
                    foreach ($pro_det as $room => $avl_cnt) {
                        //echo $room . ' - ';  ///Need to check date is available or not
                        $room_date_check = $this->ExtranetsUserPropertyAvailability->find('all')->where(['sub_id' => $room])->first();
                        if (!empty($room_date_check->blocked_date_value)) {
                            if (in_array(date("Y/m/d", strtotime(str_replace('/', '-', $datas['hotel_check_in']))), explode(',', $room_date_check->blocked_date_value))) {
                                //pj($property_room_count[$room_date_check->property_id][$room_date_check->sub_id]);
                                unset($property_room_count[$room_date_check->property_id][$room_date_check->sub_id]);
                            }
                        }
                    }//echo ' | ';
                }
                //pj($property_room_count);
                $all_property = array_keys($property_room_count);
            }
       // echo "hi";
        //  pj($all_property); exit;

            /*
              //            exit();
              //
              ////            echo date("Y-m-d", strtotime(str_replace('/', '-', $datas['hotel_check_in'])));
              ////            echo date('Y-m-d');
              //            $already_booked_hotel = $this->HotelBookingDetails->find('all')->where(['check_in >=' => date('Y-m-d'), 'check_out <=' => date("Y-m-d", strtotime(str_replace('/', '-', $datas['hotel_check_in']))), 'payment_status' => 3, 'numb_rooms' => $rooms, 'location' => $locations]);
              //
              //
              //
              //            $this->ExtranetsUserProperty->hasMany('beds', ['className' => 'ExtranetsUserPropertyBed', 'foreignKey' => 'property_id'])->Conditions(['room_count >=' => $rooms]);
              //            $all_property_f = $this->ExtranetsUserProperty->find('all')->contain(['beds'])->where(['ExtranetsUserProperty.active_ststus' => 1]);
              //
              //            $all_property = [];
              //            foreach ($all_property_f as $ch_b) {
              //                if (!empty($ch_b->beds)) {
              //                    foreach ($ch_b->beds as $ch_be) {
              //                        if ($ch_be->room_count >= $rooms) {
              //                            $all_property[] = $ch_be->property_id;
              //                        }
              //                    }
              //                }
              //            }
              //            if ($already_booked_hotel->count() > 0) {
              //                $already_booked_hotel = $already_booked_hotel->extract('property_id');
              //                $all_property = array_merge($all_property, $already_booked_hotel->toArray());
              //            }

             */
            $all_property = array_unique($all_property);
//            pj($already_booked_hotel);
             //   pj($all_property); exit;
            $search_property = $this->ExtranetsUserPropertyLocation->find('all')->where(['state' => $locations])->extract('property_id');
            $search_property_count = $this->ExtranetsUserPropertyLocation->find('all')->where(['state' => $locations])->count();
            $intersect1 = [];



            if ($search_property_count > 0) {
                $intersect1 = array_intersect($all_property, $search_property->toArray());
            }

            $all_hotel_rating = [];
            if (!empty($datas['star_rating'])) {
                $st_r = explode(',', $datas['star_rating']);
                $all_hotel_rating = $this->ExtranetsUserPropertyDescription->find('all')->where(['rating IN' => $st_r, 'ExtranetsUserPropertyDescription.property_id IN' => $intersect1])->extract('property_id');

                $all_hotel_rating_count = $this->ExtranetsUserPropertyDescription->find('all')->where(['rating IN' => $st_r, 'ExtranetsUserPropertyDescription.property_id IN' => $intersect1])->count();

                $intersect = [];
                // pr($all_hotel_rating); exit;
                if ($all_hotel_rating_count > 0) {
                    //$intersect = array_merge($intersect1, $all_hotel_rating->toArray());
                    $intersect = $all_hotel_rating->toArray();
                } else {
                    $intersect = $intersect1;
                }
            } else {
                $intersect = $intersect1;
            }

            $all_filterarray = [];
            $all_ami = $this->ExtranetsUserPropertyAmenities->find('all');


           // pj($intersect1); exit;
            if (!empty($datas['top_amenities'])) {
                $final_result_Top = [];
                $htl_Top = explode(',', $datas['top_amenities']);
                $i = 1;
                foreach ($htl_Top as $val) {
                    $top[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Top) != null) {
                            if (in_array($val, json_decode($dats->Top))) {
                                array_push($top[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($top) > 0) {
                    $result_Top = call_user_func_array('array_merge', $top);
                    $final_result_Top = array_unique($result_Top);
                }

                //pj($final_result_Top);
                $all_filterarray = array_merge($all_filterarray, $final_result_Top);
            }


            if (!empty($datas['parking_transportation'])) {
                $final_result_ParkTrans = [];
                $htl_ParkTrans = explode(',', $datas['parking_transportation']);
                $i = 1;
                foreach ($htl_ParkTrans as $val) {
                    $ParkTrans[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Parking) != null) {
                            if (in_array($val, json_decode($dats->Parking))) {
                                array_push($ParkTrans[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($ParkTrans) > 0) {
                    $result_ParkTrans = call_user_func_array('array_merge', $ParkTrans);
                    $final_result_ParkTrans = array_unique($result_ParkTrans);
                }

                //pj($final_result_ParkTrans);
                $all_filterarray = array_merge($all_filterarray, $final_result_ParkTrans);
            }

            if (!empty($datas['guest_services'])) {
                $final_result_services = [];
                $htl_guest_services = explode(',', $datas['guest_services']);
                $i = 1;
                foreach ($htl_guest_services as $val) {
                    $guestServices[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Services) != null) {
                            if (in_array($val, json_decode($dats->Services))) {
                                array_push($guestServices[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($guestServices) > 0) {
                    $result_guestServices = call_user_func_array('array_merge', $guestServices);
                    $final_result_services = array_unique($result_guestServices);
                }

                //pj($final_result_services);
                $all_filterarray = array_merge($all_filterarray, $final_result_services);
            }

            if (!empty($datas['accessibility'])) {
                $final_result_accessibility = [];
                $htl_accessibility = explode(',', $datas['accessibility']);
                $i = 1;
                foreach ($htl_accessibility as $val) {
                    $accessibility[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Accessibility) != null) {
                            if (in_array($val, json_decode($dats->Accessibility))) {
                                array_push($accessibility[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($accessibility) > 0) {
                    $result_accessibility = call_user_func_array('array_merge', $accessibility);
                    $final_result_accessibility = array_unique($result_accessibility);
                }

                //pj($final_result_accessibility);
                $all_filterarray = array_merge($all_filterarray, $final_result_accessibility);
            }

            if (!empty($datas['facilities'])) {
                $final_result_facilities = [];
                $htl_facilities = explode(',', $datas['facilities']);
                $i = 1;
                foreach ($htl_facilities as $val) {
                    $facilities[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Facilities) != null) {
                            if (in_array($val, json_decode($dats->Facilities))) {
                                array_push($facilities[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($facilities) > 0) {
                    $result_facilities = call_user_func_array('array_merge', $facilities);
                    $final_result_facilities = array_unique($result_facilities);
                }

                //pj($final_result_facilities);
                $all_filterarray = array_merge($all_filterarray, $final_result_facilities);
            }

            if (!empty($datas['activities_entertainment'])) {
                $final_result_activities_entertainment = [];
                $htl_activities_entertainment = explode(',', $datas['activities_entertainment']);
                $i = 1;
                foreach ($htl_activities_entertainment as $val) {
                    $activities_entertainment[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Activities) != null) {
                            if (in_array($val, json_decode($dats->Activities))) {
                                array_push($activities_entertainment[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($activities_entertainment) > 0) {
                    $result_activities_entertainment = call_user_func_array('array_merge', $activities_entertainment);
                    $final_result_activities_entertainment = array_unique($result_activities_entertainment);
                }

                //pj($final_result_activities_entertainment);
                $all_filterarray = array_merge($all_filterarray, $final_result_activities_entertainment);
            }

            if (!empty($datas['food_drink'])) {
                $final_result_food_drink = [];
                $htl_food_drink = explode(',', $datas['food_drink']);
                $i = 1;
                foreach ($htl_food_drink as $val) {
                    $food_drink[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Food) != null) {
                            if (in_array($val, json_decode($dats->Food))) {
                                array_push($food_drink[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($food_drink) > 0) {
                    $result_food_drink = call_user_func_array('array_merge', $food_drink);
                    $final_result_food_drink = array_unique($result_food_drink);
                }

                //pj($final_result_food_drink);
                $all_filterarray = array_merge($all_filterarray, $final_result_food_drink);
            }

            if (!empty($datas['kitchen_dining'])) {
                $final_result_kitchen_dining = [];
                $htl_kitchen_dining = explode(',', $datas['kitchen_dining']);
                $i = 1;
                foreach ($htl_kitchen_dining as $val) {
                    $kitchen_dining[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Kitchen) != null) {
                            if (in_array($val, json_decode($dats->Kitchen))) {
                                array_push($kitchen_dining[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($kitchen_dining) > 0) {
                    $result_kitchen_dining = call_user_func_array('array_merge', $kitchen_dining);
                    $final_result_kitchen_dining = array_unique($result_kitchen_dining);
                }

                //pj($final_result_kitchen_dining);
                $all_filterarray = array_merge($all_filterarray, $final_result_kitchen_dining);
            }

            if (!empty($datas['media_technology'])) {
                $final_result_media_technology = [];
                $htl_media_technology = explode(',', $datas['media_technology']);
                $i = 1;
                foreach ($htl_media_technology as $val) {
                    $media_technology[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Media) != null) {
                            if (in_array($val, json_decode($dats->Media))) {
                                array_push($media_technology[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($media_technology) > 0) {
                    $result_media_technology = call_user_func_array('array_merge', $media_technology);
                    $final_result_media_technology = array_unique($result_media_technology);
                }

                //pj($final_result_media_technology);
                $all_filterarray = array_merge($all_filterarray, $final_result_media_technology);
            }

            if (!empty($datas['meetings_events'])) {
                $final_result_meetings_events = [];
                $htl_meetings_events = explode(',', $datas['meetings_events']);
                $i = 1;
                foreach ($htl_meetings_events as $val) {
                    $meetings_events[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Meetings) != null) {
                            if (in_array($val, json_decode($dats->Meetings))) {
                                array_push($meetings_events[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($meetings_events) > 0) {
                    $result_meetings_events = call_user_func_array('array_merge', $meetings_events);
                    $final_result_meetings_events = array_unique($result_meetings_events);
                }

                //pj($final_result_meetings_events);
                $all_filterarray = array_merge($all_filterarray, $final_result_meetings_events);
            }

            if (!empty($datas['essentials'])) {
                $final_result_essentials = [];
                $htl_essentials = explode(',', $datas['essentials']);
                $i = 1;
                foreach ($htl_essentials as $val) {
                    $essentials[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Essentials) != null) {
                            if (in_array($val, json_decode($dats->Essentials))) {
                                array_push($essentials[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($essentials) > 0) {
                    $result_essentials = call_user_func_array('array_merge', $essentials);
                    $final_result_essentials = array_unique($result_essentials);
                }

                //pj($final_result_essentials);
                $all_filterarray = array_merge($all_filterarray, $final_result_essentials);
            }

            if (!empty($datas['pools_wellness'])) {
                $final_result_pools_wellness = [];
                $htl_pools_wellness = explode(',', $datas['pools_wellness']);
                $i = 1;
                foreach ($htl_pools_wellness as $val) {
                    $pools_wellness[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Pools) != null) {
                            if (in_array($val, json_decode($dats->Pools))) {
                                array_push($pools_wellness[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($pools_wellness) > 0) {
                    $result_pools_wellness = call_user_func_array('array_merge', $pools_wellness);
                    $final_result_pools_wellness = array_unique($result_pools_wellness);
                }

                //pj($final_result_pools_wellness);
                $all_filterarray = array_unique(array_merge($all_filterarray, $final_result_pools_wellness));
            }
            if (!empty($all_filterarray)) {
                $intersect = array_intersect($all_filterarray, $intersect);
            }
//pj($intersect); exit;


            $this->ExtranetsUserProperty->hasOne('location', ['className' => 'ExtranetsUserPropertyLocation', 'foreignKey' => 'property_id']);

            $this->ExtranetsUserProperty->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);

            $result_property = [];
            //PJ($intersect);



            if (!empty($intersect)) {
                $result_property = $this->ExtranetsUserProperty->find('all')->contain(['location', 'description'])->where(['ExtranetsUserProperty.id IN' => $intersect/* , 'bedrooms >=' => $rooms */]);
            }

           //pj($result_property->extract('id'));
           // exit;

            if (!empty($result_property)) {
                if ($result_property->count()) {
                    $property_bed = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id IN' => $result_property->extract('id')->toArray()]);
                }
            }
            //pj($property_bed->extract(id));exit;

            if (!empty($property_bed)) {
                $bedCount = [];
                $all_beds_count = [];
                $person = 0;
                //pj($property_bed);exit;
                foreach ($property_bed as $bed) {

                    if (($bed->beds == 'single bed') || ($bed->beds == 'futon')) {
                        $person = $bed->num_bed * 1;
                    }

                    if (($bed->beds == 'double bed') || ($bed->beds == 'semi double-bed') || ($bed->beds == 'queen bed') || ($bed->beds == 'semi double-bed') || ($bed->beds == 'king bed') || ($bed->beds == 'super king bed') || ($bed->beds == 'bunk bed') || ($bed->beds == 'sofa bed')) {
                        $person = $bed->num_bed * 2;
                    }




                    $bedCount[$bed->id] = $person;
                    $sub_person_total = [];
                    $getSubBed = $this->ExtranetsUserPropertySubBeds->find('all')->where(['main_bed_id' => $bed->id]);
                    //pj($getSubBed); 

                    foreach ($getSubBed as $subBed) {

                        if (($subBed->beds == 'single bed') || ($subBed->beds == 'futon')) {
                            $sub_person = $subBed->num_beds * 1;
                        }

                        if (($subBed->beds == 'double bed') || ($subBed->beds == 'semi double-bed') || ($subBed->beds == 'queen bed') || ($subBed->beds == 'semi double-bed') || ($subBed->beds == 'king bed') || ($subBed->beds == 'super king bed') || ($subBed->beds == 'bunk bed') || ($subBed->beds == 'sofa bed')) {
                            $sub_person = $subBed->num_beds * 2;
                        }

                        @$sub_person_total[$subBed->main_bed_id] += $sub_person;
                    }
                    
                    
                    

                    if ((@$adult + @$children) == (@$sub_person_total[$bed->id] + @$bedCount[$bed->id])) {
                        @$all_beds_count[$bed->property_id][$bed->id] = $sub_person_total[$bed->id] + $bedCount[$bed->id];
                    }
                }
                $lisArr = [];
                
               
                if ($all_beds_count) {
                 //pj($all_beds_count); exit;
                    foreach ($all_beds_count as $keyz => $count) {
                        //echo $keyz;
                        array_push($lisArr, $keyz);
                        $result_property = $this->ExtranetsUserProperty->find('all')->contain(['location', 'description'])->where(['ExtranetsUserProperty.id IN' => $lisArr]);

                        $result_property_count = $result_property->count();
                        //pj($result_property);
                    }
                     //pj($lisArr);exit;
                }
                $rati_htl = [];
                $rati = [];
                
                
                if (@$result_property_count != 0) {
                    foreach ($result_property as $drt) {
                        array_push($rati, $drt->description->rating);
                    }
                    $rati_htl = array_unique($rati);
                }
            }


           //PJ($result_property); EXIT;

            $this->set(compact('result_property', 'country', 'city', 'result_property_count', 'rati_htl', 'search_property_count'));
        }
    }

    public function hotelajaxsearchdata() {
        $this->viewBuilder()->layout('ajax');
        $final_result_set = [];
        $all_hotel = [];
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if (isset($data['city'])) {
                $locations = $data['city'];
            }
            if (isset($data['hotel_check_in_date'])) {
                $hotel_check_in = $data['hotel_check_in_date'];
            }
            if (isset($data['hotel_check_out_date'])) {
                $hotel_check_out = $data['hotel_check_out_date'];
            }

            if (isset($data['rooms_count'])) {
                $rooms = $data['rooms_count'];
            }
            if (isset($data['adult'])) {
                $adult = $data['adult'];
            }
            if (isset($data['children'])) {
                $children = $data['children'];
            }

            $url_query_string = $data['url_query'];
            $srtBy = $data['sortby'];


            $this->ExtranetsUserPropertyLocation->belongsTo('main_tb', ['className' => 'ExtranetsUserProperty', 'foreignKey' => 'property_id']);
            $search_property = $this->ExtranetsUserPropertyLocation->find('all')->contain(['main_tb'])->where(['state' => $locations, 'main_tb.complete_ststus' => 1, 'main_tb.active_ststus' => 1]);



            if ($search_property->count() > 0) {
//                $check_already_booked = $this->HotelBookingDetails->find('all')->where(['check_in' => date('Y-m-d'), 'payment_status' => 3, 'location' => $locations]);
//                pj($check_already_booked);
//                pj($datas);
//
//                pj($search_property->extract('property_id')->toArray());
//                pj($search_property->count());

                $property_room_count = [];
                $all_available_properties = $search_property->extract('property_id')->toArray();
//                pj($all_available_properties);
                foreach ($all_available_properties as $available_property) {
                    $property_rooms = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id' => $available_property]);
                    foreach ($property_rooms as $property_room) {
                        if ($property_room->room_count > $rooms) {
                            $property_room_count[$available_property][$property_room->id] = $property_room->room_count;
                        }
//                        else{
//                           echo $available_property.' - '.$property_room->id.' - '.$property_room->room_count.' | ';
//                        }
                    }
                }


                $conn = ConnectionManager::get('default');

                $ser_hotel_ck_in_dt = date("Y-m-d", strtotime(str_replace('/', '-', $hotel_check_in)));
                $ser_hotel_ck_out_dt = date("Y-m-d", strtotime(str_replace('/', '-', $hotel_check_out)));

                $chk_already_book_rooms_count_details = $conn->execute('SELECT SUM(numb_rooms) AS total_rooms_booked,room_id,property_id FROM hotel_booking_details WHERE "' . $ser_hotel_ck_in_dt . '" BETWEEN hotel_booking_details.check_in AND hotel_booking_details.check_out OR "' . $ser_hotel_ck_out_dt . '" BETWEEN hotel_booking_details.check_in AND hotel_booking_details.check_out AND payment_status=3 AND location="' . $locations . '" GROUP BY room_id')->fetchAll('assoc');



                if (count($chk_already_book_rooms_count_details) > 0) {
                    foreach ($chk_already_book_rooms_count_details as $chk_rm_count_detail) {

                        if (!empty($property_room_count[$chk_rm_count_detail['property_id']][$chk_rm_count_detail['room_id']]) && (($property_room_count[$chk_rm_count_detail['property_id']][$chk_rm_count_detail['room_id']] - $chk_rm_count_detail['total_rooms_booked']) < $rooms)) {
                            unset($property_room_count[$chk_rm_count_detail['property_id']][$chk_rm_count_detail['room_id']]);
                        }
                    }
                }


                foreach ($property_room_count as $pro_det) {
                    foreach ($pro_det as $room => $avl_cnt) {
                        //echo $room . ' - ';  ///Need to check date is available or not
                        $room_date_check = $this->ExtranetsUserPropertyAvailability->find('all')->where(['sub_id' => $room])->first();
                        if (!empty($room_date_check->blocked_date_value)) {
                            if (in_array(date("Y/m/d", strtotime(str_replace('/', '-', $hotel_check_in))), explode(',', $room_date_check->blocked_date_value))) {
                                //pj($property_room_count[$room_date_check->property_id][$room_date_check->sub_id]);
                                unset($property_room_count[$room_date_check->property_id][$room_date_check->sub_id]);
                            }
                        }
                    }//echo ' | ';
                }

                //pj($property_room_count);
                $all_hotel = array_keys($property_room_count);
            }



            /*
              //$all_hotel = $this->ExtranetsUserProperty->find('all')->where(['complete_ststus' => 1, 'active_ststus' => 1])->extract('id');

              $already_booked_hotel = $this->HotelBookingDetails->find('all')->where(['check_in >=' => date('Y-m-d'), 'check_out <=' => date("Y-m-d", strtotime(str_replace('/', '-', $data['hotel_check_in_date']))), 'payment_status' => 3, 'numb_rooms' => $rooms, 'location' => $locations]);

              $this->ExtranetsUserProperty->hasMany('beds', ['className' => 'ExtranetsUserPropertyBed', 'foreignKey' => 'property_id'])->Conditions(['room_count >=' => $rooms]);
              $all_property_f = $this->ExtranetsUserProperty->find('all')->contain(['beds'])->where(['ExtranetsUserProperty.active_ststus' => 1]);

              $all_hotel = [];
              foreach ($all_property_f as $ch_b) {
              if (!empty($ch_b->beds)) {
              foreach ($ch_b->beds as $ch_be) {
              if ($ch_be->room_count >= $rooms) {
              $all_hotel[] = $ch_be->property_id;
              }
              }
              }
              }
              if ($already_booked_hotel->count() > 0) {
              $already_booked_hotel = $already_booked_hotel->extract('property_id');
              $all_hotel = array_merge($all_hotel, $already_booked_hotel->toArray());
              }

             */
            $all_hotel = array_unique($all_hotel);

            //pj($already_booked_hotel);
            //pj($all_hotel);

            $search_property_count = $this->ExtranetsUserPropertyLocation->find('all')->where(['state' => $locations])->count();
            $search_property = $this->ExtranetsUserPropertyLocation->find('all')->where(['state' => $locations])->extract('property_id');




            #####################
            $intersect2 = [];
            if ($search_property_count > 0) {
                $intersect2 = array_intersect($all_hotel, $search_property->toArray());
            }




            // $intersect1 = $intersect2;
            // if (sizeof($final_result_set1) > 0) {
            $this->ExtranetsUserProperty->hasOne('location', ['className' => 'ExtranetsUserPropertyLocation', 'foreignKey' => 'property_id']);
            $this->ExtranetsUserProperty->hasOne('pricing', ['className' => 'ExtranetsUserPropertyPricing', 'foreignKey' => 'property_id']);
            $this->ExtranetsUserProperty->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);
            // pj($intersect2); exit;
            if (!empty($intersect2)) {
                $result_property = $this->ExtranetsUserProperty->find('all')->contain(['location', 'description'])->where(['ExtranetsUserProperty.id IN' => $intersect2/* , 'bedrooms >=' => $rooms */]);
            }

            if (!empty($result_property)) {
                if ($result_property->count()) {
                    $property_bed = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id IN' => $result_property->extract('id')->toArray()]);
                }
            }

            if (!empty($property_bed)) {

                $bedCount = [];
                $all_beds_count = [];
                $person = 0;
                foreach ($property_bed as $bed) {

                    if (($bed->beds == 'single bed') || ($bed->beds == 'futon')) {
                        $person = $bed->num_bed * 1;
                    }

                    if (($bed->beds == 'double bed') || ($bed->beds == 'semi double-bed') || ($bed->beds == 'queen bed') || ($bed->beds == 'semi double-bed') || ($bed->beds == 'king bed') || ($bed->beds == 'super king bed') || ($bed->beds == 'bunk bed') || ($bed->beds == 'sofa bed')) {
                        $person = $bed->num_bed * 2;
                    }

                    $bedCount[$bed->id] = $person;
                    $sub_person_total = [];
                    $getSubBed = $this->ExtranetsUserPropertySubBeds->find('all')->where(['main_bed_id' => $bed->id]);
                    foreach ($getSubBed as $subBed) {

                        if (($subBed->beds == 'single bed') || ($subBed->beds == 'futon')) {
                            $sub_person = $subBed->num_beds * 1;
                        }

                        if (($subBed->beds == 'double bed') || ($subBed->beds == 'semi double-bed') || ($subBed->beds == 'queen bed') || ($subBed->beds == 'semi double-bed') || ($subBed->beds == 'king bed') || ($subBed->beds == 'super king bed') || ($subBed->beds == 'bunk bed') || ($subBed->beds == 'sofa bed')) {
                            $sub_person = $subBed->num_beds * 2;
                        }

                        @$sub_person_total[$subBed->main_bed_id] += $sub_person;
                    }

                    if ((@$adult + @$children) == (@$sub_person_total[$bed->id] + @$bedCount[$bed->id])) {
                        @$all_beds_count[$bed->property_id][$bed->id] = $sub_person_total[$bed->id] + $bedCount[$bed->id];
                    }
                }
                $lisArr = [];
                if ($all_beds_count) {
                    //pj($all_beds_count);
                    foreach ($all_beds_count as $keyz => $count) {
                        //echo $keyz;
                        array_push($lisArr, $keyz);
                    }
                }
            }


            ############################


            $htl_starts_price_s = ($data['start_price'] == 0) ? 0 : $this->Custom->priceConvert('AOA', $data['start_price'], $this->request->session()->read("CURRENCY"));
            $htl_ends_price_s = $this->Custom->priceConvert('AOA', $data['end_price'], $this->request->session()->read("CURRENCY"));
            if (!empty($lisArr)) {
                $all_filterarray = [];
                $all_ami = $this->ExtranetsUserPropertyAmenities->find('all');
                $priceListArr = $this->ExtranetsUserPropertyPricing->find('all')->where(['price_main >=' => $htl_starts_price_s, 'price_main <=' => $htl_ends_price_s, 'ExtranetsUserPropertyPricing.property_id IN' => $lisArr])->extract('property_id');
            }




            if (!empty($data['top_amenities'])) {
                $final_result_Top = [];
                $htl_Top = explode('|', $data['top_amenities']);
                $i = 1;
                foreach ($htl_Top as $val) {
                    $top[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Top) != null) {
                            if (in_array($val, json_decode($dats->Top))) {
                                array_push($top[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($top) > 0) {
                    $result_Top = call_user_func_array('array_merge', $top);
                    $final_result_Top = array_unique($result_Top);
                }

                //pj($final_result_Top);
                $all_filterarray = array_merge($all_filterarray, $final_result_Top);
            }


            if (!empty($data['parking_transportation'])) {
                $final_result_ParkTrans = [];
                $htl_ParkTrans = explode('|', $data['parking_transportation']);
                $i = 1;
                foreach ($htl_ParkTrans as $val) {
                    $ParkTrans[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Parking) != null) {
                            if (in_array($val, json_decode($dats->Parking))) {
                                array_push($ParkTrans[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($ParkTrans) > 0) {
                    $result_ParkTrans = call_user_func_array('array_merge', $ParkTrans);
                    $final_result_ParkTrans = array_unique($result_ParkTrans);
                }

                //pj($final_result_ParkTrans);
                $all_filterarray = array_merge($all_filterarray, $final_result_ParkTrans);
            }

            if (!empty($data['guest_services'])) {
                $final_result_services = [];
                $htl_guest_services = explode('|', $data['guest_services']);
                $i = 1;
                foreach ($htl_guest_services as $val) {
                    $guestServices[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Services) != null) {
                            if (in_array($val, json_decode($dats->Services))) {
                                array_push($guestServices[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($guestServices) > 0) {
                    $result_guestServices = call_user_func_array('array_merge', $guestServices);
                    $final_result_services = array_unique($result_guestServices);
                }

                //pj($final_result_services);
                $all_filterarray = array_merge($all_filterarray, $final_result_services);
            }

            if (!empty($data['accessibility'])) {
                $final_result_accessibility = [];
                $htl_accessibility = explode('|', $data['accessibility']);
                $i = 1;
                foreach ($htl_accessibility as $val) {
                    $accessibility[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Accessibility) != null) {
                            if (in_array($val, json_decode($dats->Accessibility))) {
                                array_push($accessibility[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($accessibility) > 0) {
                    $result_accessibility = call_user_func_array('array_merge', $accessibility);
                    $final_result_accessibility = array_unique($result_accessibility);
                }

                //pj($final_result_accessibility);
                $all_filterarray = array_merge($all_filterarray, $final_result_accessibility);
            }

            if (!empty($data['facilities'])) {
                $final_result_facilities = [];
                $htl_facilities = explode('|', $data['facilities']);
                $i = 1;
                foreach ($htl_facilities as $val) {
                    $facilities[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Facilities) != null) {
                            if (in_array($val, json_decode($dats->Facilities))) {
                                array_push($facilities[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($facilities) > 0) {
                    $result_facilities = call_user_func_array('array_merge', $facilities);
                    $final_result_facilities = array_unique($result_facilities);
                }

                //pj($final_result_facilities);
                $all_filterarray = array_merge($all_filterarray, $final_result_facilities);
            }

            if (!empty($data['activities_entertainment'])) {
                $final_result_activities_entertainment = [];
                $htl_activities_entertainment = explode('|', $data['activities_entertainment']);
                $i = 1;
                foreach ($htl_activities_entertainment as $val) {
                    $activities_entertainment[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Activities) != null) {
                            if (in_array($val, json_decode($dats->Activities))) {
                                array_push($activities_entertainment[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($activities_entertainment) > 0) {
                    $result_activities_entertainment = call_user_func_array('array_merge', $activities_entertainment);
                    $final_result_activities_entertainment = array_unique($result_activities_entertainment);
                }

                //pj($final_result_activities_entertainment);
                $all_filterarray = array_merge($all_filterarray, $final_result_activities_entertainment);
            }

            if (!empty($data['food_drink'])) {
                $final_result_food_drink = [];
                $htl_food_drink = explode('|', $data['food_drink']);
                $i = 1;
                foreach ($htl_food_drink as $val) {
                    $food_drink[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Food) != null) {
                            if (in_array($val, json_decode($dats->Food))) {
                                array_push($food_drink[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($food_drink) > 0) {
                    $result_food_drink = call_user_func_array('array_merge', $food_drink);
                    $final_result_food_drink = array_unique($result_food_drink);
                }

                //pj($final_result_food_drink);
                $all_filterarray = array_merge($all_filterarray, $final_result_food_drink);
            }

            if (!empty($data['kitchen_dining'])) {
                $final_result_kitchen_dining = [];
                $htl_kitchen_dining = explode('|', $data['kitchen_dining']);
                $i = 1;
                foreach ($htl_kitchen_dining as $val) {
                    $kitchen_dining[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Kitchen) != null) {
                            if (in_array($val, json_decode($dats->Kitchen))) {
                                array_push($kitchen_dining[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($kitchen_dining) > 0) {
                    $result_kitchen_dining = call_user_func_array('array_merge', $kitchen_dining);
                    $final_result_kitchen_dining = array_unique($result_kitchen_dining);
                }

                //pj($final_result_kitchen_dining);
                $all_filterarray = array_merge($all_filterarray, $final_result_kitchen_dining);
            }

            if (!empty($data['media_technology'])) {
                $final_result_media_technology = [];
                $htl_media_technology = explode('|', $data['media_technology']);
                $i = 1;
                foreach ($htl_media_technology as $val) {
                    $media_technology[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Media) != null) {
                            if (in_array($val, json_decode($dats->Media))) {
                                array_push($media_technology[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($media_technology) > 0) {
                    $result_media_technology = call_user_func_array('array_merge', $media_technology);
                    $final_result_media_technology = array_unique($result_media_technology);
                }

                //pj($final_result_media_technology);
                $all_filterarray = array_merge($all_filterarray, $final_result_media_technology);
            }

            if (!empty($data['meetings_events'])) {
                $final_result_meetings_events = [];
                $htl_meetings_events = explode('|', $data['meetings_events']);
                $i = 1;
                foreach ($htl_meetings_events as $val) {
                    $meetings_events[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Meetings) != null) {
                            if (in_array($val, json_decode($dats->Meetings))) {
                                array_push($meetings_events[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($meetings_events) > 0) {
                    $result_meetings_events = call_user_func_array('array_merge', $meetings_events);
                    $final_result_meetings_events = array_unique($result_meetings_events);
                }

                //pj($final_result_meetings_events);
                $all_filterarray = array_merge($all_filterarray, $final_result_meetings_events);
            }

            if (!empty($data['essentials'])) {
                $final_result_essentials = [];
                $htl_essentials = explode('|', $data['essentials']);
                $i = 1;
                foreach ($htl_essentials as $val) {
                    $essentials[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Essentials) != null) {
                            if (in_array($val, json_decode($dats->Essentials))) {
                                array_push($essentials[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($essentials) > 0) {
                    $result_essentials = call_user_func_array('array_merge', $essentials);
                    $final_result_essentials = array_unique($result_essentials);
                }

                //pj($final_result_essentials);
                $all_filterarray = array_merge($all_filterarray, $final_result_essentials);
            }

            if (!empty($data['pools_wellness'])) {
                $final_result_pools_wellness = [];
                $htl_pools_wellness = explode('|', $data['pools_wellness']);
                $i = 1;
                foreach ($htl_pools_wellness as $val) {
                    $pools_wellness[$i] = [];
                    foreach ($all_ami as $dats) {
                        if (json_decode($dats->Pools) != null) {
                            if (in_array($val, json_decode($dats->Pools))) {
                                array_push($pools_wellness[$i], $dats->property_id);
                            }
                        }
                    }
                    $i++;
                }

                if (count($pools_wellness) > 0) {
                    $result_pools_wellness = call_user_func_array('array_merge', $pools_wellness);
                    $final_result_pools_wellness = array_unique($result_pools_wellness);
                }

                //pj($final_result_pools_wellness);
                $all_filterarray = array_merge($all_filterarray, $final_result_pools_wellness);
            }


            //$all_filterarray = array_merge($all_filterarray, []);
            // var_dump($all_filterarray);
            //pj($all_filterarray);
            //$final_result_set = array_unique($all_filterarray);
            if (empty($all_filterarray)) {
                $final_result_set = $priceListArr->toArray();
            } else {
                $final_result_set = array_intersect($priceListArr->toArray(), $all_filterarray);
            }



            if (!empty($lisArr)) {
                $all_hotel_rating = [];
                if (!empty($data['star_rating'])) {
                    if ($data['star_rating'] == "any") {
                        $all_hotel_rating = $this->ExtranetsUserPropertyDescription->find('all')->where(['rating IN' => [1, 2, 3, 4, 5], 'ExtranetsUserPropertyDescription.property_id IN' => $lisArr])->extract('property_id');
                        $all_hotel_rating_count = $this->ExtranetsUserPropertyDescription->find('all')->where(['rating IN' => [1, 2, 3, 4, 5], 'ExtranetsUserPropertyDescription.property_id IN' => $lisArr])->count();
                    } else {
                        $st_r = explode(',', $data['star_rating']);
                        $all_hotel_rating = $this->ExtranetsUserPropertyDescription->find('all')->where(['rating IN' => $st_r, 'ExtranetsUserPropertyDescription.property_id IN' => $lisArr])->extract('property_id');
                        $all_hotel_rating_count = $this->ExtranetsUserPropertyDescription->find('all')->where(['rating IN' => $st_r, 'ExtranetsUserPropertyDescription.property_id IN' => $lisArr])->count();
                    }

                    if ($all_hotel_rating_count > 0) {
                        $all_hotel_rating = $all_hotel_rating->toArray();
                    } else {
                        $all_hotel_rating = [];
                    }
                }
            }



            if (empty($all_hotel_rating)) {
                $final_result_set1 = $final_result_set;
            } else {
                $final_result_set1 = array_intersect($final_result_set, $all_hotel_rating);
                if (empty($final_result_set1)) {
                    $final_result_set1 = [];
                }
            }



            $all_final_set1 = [];
            if (!empty($lisArr) && !empty($final_result_set1)) {

                $all_final_set1 = array_intersect($lisArr, $final_result_set1);
            }
        }








        //}
        //$intersect = [];
//        if ($search_property_count > 0) {
//            $intersect = array_intersect($intersect1, $search_property->toArray());
//        } else if (empty($data['star_rating']) && empty($data['top_amenities']) && empty($data['parking_transportation']) && empty($data['guest_services']) && empty($data['accessibility']) && empty($data['facilities']) && empty($data['activities_entertainment']) && empty($data['food_drink']) && empty($data['kitchen_dining']) && empty($data['media_technology']) && empty($data['meetings_events']) && empty($data['essentials']) && empty($data['pools_wellness'])) {
//
//            $intersect = [];
//            $intersect = $search_property->toArray();
//        }

        @$children = $data['children'];
        @$adult = $data['adult'];

        $guest = @$children + @$adult;

        if (!empty($data['sortby']) && !empty($all_final_set1)) {

            if (!empty($data['sortby'] == 'htl')) {
                $result_property = $this->ExtranetsUserPropertyPricing->find('all')->select(['main_price' => 'MIN(price_main)', 'property_id' => 'property_id', 'sub_id' => 'sub_id'])->where(['property_id IN' => $all_final_set1, 'people >= ' => @$children + @$adult])->order(['main_price' => 'desc'])->group('property_id');
                $result_property_count = $this->ExtranetsUserPropertyPricing->find('all')->select(['main_price' => 'MIN(price_main)', 'property_id' => 'property_id'])->where(['property_id IN' => $all_final_set1, 'people >= ' => @$children + @$adult])->group('property_id')->order(['price_main' => 'DESC'])->count();
            }
            if (!empty($data['sortby'] == 'lth')) {
                $result_property = $this->ExtranetsUserPropertyPricing->find('all')->select(['main_price' => 'MIN(price_main)', 'property_id' => 'property_id', 'sub_id' => 'sub_id'])->where(['property_id IN' => $all_final_set1, 'people >= ' => @$children + @$adult])->group('property_id')->order(['main_price' => 'ASC']);
                $result_property_count = $this->ExtranetsUserPropertyPricing->find('all')->select(['main_price' => 'MIN(price_main)', 'property_id' => 'property_id'])->where(['property_id IN' => $all_final_set1, 'people >= ' => @$children + @$adult])->group('property_id')->order(['price_main' => 'ASC'])->count();
                //pj($result_property); exit;
            }

            if (!empty($data['sortby'] == 'str')) {
                $result_property = $this->ExtranetsUserPropertyDescription->find('all')->select(['main_price' => '0', 'property_id' => 'property_id', 'sub_id' => '0'])->where(['rating IN' => [1, 2, 3, 4, 5], 'ExtranetsUserPropertyDescription.property_id IN' => $lisArr])->order(['rating' => 'DESC']);
                $result_property_count = $this->ExtranetsUserPropertyDescription->find('all')->where(['rating IN' => [1, 2, 3, 4, 5], 'ExtranetsUserPropertyDescription.property_id IN' => $lisArr])->order(['rating' => 'DESC'])->count();
            }
            if (!empty($data['sortby'] == 'rev')) {
                if (!empty($data['star_rating'])) {
                    $result_property = $this->ExtranetsUserPropertyDescription->find('all')->select(['main_price' => '0', 'property_id' => 'property_id', 'sub_id' => '0'])->where(['rating <=' => $data['star_rating'], 'ExtranetsUserPropertyDescription.property_id IN' => $lisArr])->order(['rating' => 'DESC']);
                    $result_property_count = $this->ExtranetsUserPropertyDescription->find('all')->where(['rating <=' => $data['star_rating'], 'ExtranetsUserPropertyDescription.property_id IN' => $lisArr])->order(['rating' => 'DESC'])->count();
                } else {
                    $result_property = $this->ExtranetsUserPropertyDescription->find('all')->select(['main_price' => '0', 'property_id' => 'property_id', 'sub_id' => '0'])->where(['rating IN' => [1, 2, 3, 4, 5], 'ExtranetsUserPropertyDescription.property_id IN' => $lisArr])->order(['rating' => 'DESC']);
                    $result_property_count = $this->ExtranetsUserPropertyDescription->find('all')->where(['rating IN' => [1, 2, 3, 4, 5], 'ExtranetsUserPropertyDescription.property_id IN' => $lisArr])->order(['rating' => 'DESC'])->count();
                }
            }
        } else {
            $result_property = [];
            if (!empty($all_final_set1)) {

                //pj($all_final_set1);
                $result_property = $this->ExtranetsUserProperty->find('all')->select(['property_id' => 'id'])->where(['id IN' => $all_final_set1]);
                $result_property_count = $this->ExtranetsUserProperty->find('all')->where(['id IN' => $all_final_set1])->count();
            }
        }
        $srtBy = $data['sortby'];


        $this->set(compact('result_property', 'result_property_count', 'url_query_string', 'srtBy', 'children', 'adult', 'guest'));
    }

    public function ajaxSearchResult() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 21])->first();
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
        }

        //$pageDetails = new \stdClass();

        $linkH = new UserHelper(new \Cake\View\View());

        $user = $this->Searchdatas->newEntity();

        if ($this->request->is('get')) {
            $datas = $this->request->query;

            $datas['origin'] = strtoupper($datas['origin']);
            $datas['destination'] = strtoupper($datas['destination']);
            $datas['departure_date'] = date("Y-m-d", strtotime(str_replace('/', '-', $datas['departure_date'])));
            //date_format(date_create($datas['departure_date']),"Y-m-d");
            $datas['return_date'] = date("Y-m-d", strtotime(str_replace('/', '-', $datas['return_date'])));
            $datas['cabin'] = $datas['cabin'];
            // $datas['passenger'] = explode(" ",$datas['passenger'])[0];
            $datas['passenger'] = $datas['passenger'];

            $uqid = $linkH->uuid();
            $cookiunq = "";
            if (empty($_COOKIE["UserId"])) {
                setcookie("UserId", $uqid, time() + (86400 * 30), "/");
                $datas['uniqueid'] = $uqid;
                $user = $this->Searchdatas->patchEntity($user, $datas);
                $this->Searchdatas->save($user);
                $cookiunq = $uqid;
//                echo "create";
            } else {
                $cookiunq = $_COOKIE["UserId"];
                $datas['uniqueid'] = $_COOKIE["UserId"];
//                echo "already exit";
            }
            $usr_search_d_details = $this->Searchdatas->find('all')->where(['uniqueid' => $cookiunq])->first();

            if ($usr_search_d_details->radio == $datas['radio'] && $usr_search_d_details->uniqueid == $cookiunq && $usr_search_d_details->origin == $datas['origin'] && $usr_search_d_details->destination == $datas['destination'] && date('Y-m-d', strtotime($usr_search_d_details->departure_date)) == $datas['departure_date'] && date('Y-m-d', strtotime($usr_search_d_details->return_date)) == $datas['return_date'] && $usr_search_d_details->cabin == $datas['cabin'] && $usr_search_d_details->passenger == $datas['passenger']) {
                //echo "matched";
                $this->Journydetails->deleteAll(['uniqueid' => $cookiunq]);
                $this->Fulljournydetails->deleteAll(['uniqueid' => $cookiunq]);
            } else {
                //echo "no";
                $this->Journydetails->deleteAll(['uniqueid' => $usr_search_d_details->uniqueid]);
                $this->Fulljournydetails->deleteAll(['uniqueid' => $usr_search_d_details->uniqueid]);
                $this->Searchdatas->updateAll(['origin' => $datas['origin'], 'radio' => $datas['radio'], 'destination' => $datas['destination'], 'departure_date' => $datas['departure_date'], 'return_date' => $datas['return_date'], 'cabin' => $datas['cabin'], 'passenger' => $datas['passenger']], ['uniqueid' => $cookiunq]);
            }

            if ($datas['radio'] == "One-Way Flight") {
                $lists = $this->Onewaytrip->tripdetails($datas);
                foreach ($lists as $vals) {
                    // echo "<pre>"; print_r($vals); echo "</pre>";
                    $j_st = ((count($vals[0]) - 2) / 6) - 1;

                    $jd = $this->Journydetails->newEntity();
                    $jd['uniqueid'] = $cookiunq;
                    $jd['start_d_airline_name'] = $vals[0][0];
                    $jd['start_d_airline_num'] = $vals[0][1];
                    $jd['start_depart_time'] = $vals[0][4];
                    $jd['start_arrival_time'] = $vals[0][count($vals[0]) - 3];

                    $jd['price'] = $vals[1]['TotalPrice'];
                    $jd['refundable'] = !empty($vals[1]['Refundable']) ? $vals[1]['Refundable'] : 'false';
                    $jd['fare_key'] = $vals[1]['Key'];
                    $jd['comp_price'] = @explode('AOA', @$vals[1]['TotalPrice'])[1];
                    $jd['depart_time'] = date("H:i:s", strtotime($vals[0][4]));
                    $jd['stops'] = $j_st;
                    $dt_start = date_create($vals[0][4]);
                    $dt_end = date_create($vals[0][count($vals[0]) - 3]);
                    $diff = date_diff($dt_end, $dt_start);
                    $d_det_full = $diff->format('%d');

                    $jd['time_diff'] = @$d_det_full * 24 + @$diff->format('%h %m');
                    $this->Journydetails->save($jd);
                    $xcv = $jd->id;

                    for ($i = 0; $i <= $j_st; $i++) {
                        $j_srt = $this->Fulljournydetails->newEntity();
                        $j_srt['m_id'] = $vals[0]['ID'];
                        $j_srt['uniqueid'] = $cookiunq;
                        $j_srt['refid'] = $xcv;
                        $j_srt['jor_typ'] = $vals[0]['Journey_Details'];
                        $j_srt['airline'] = $vals[0][0 + ($i * 6)];
                        $j_srt['airnum'] = $vals[0][1 + ($i * 6)];
                        $j_srt['origin'] = $vals[0][2 + ($i * 6)];
                        $j_srt['destination'] = $vals[0][3 + ($i * 6)];
                        $j_srt['dep_time'] = $vals[0][4 + ($i * 6)];
                        $j_srt['arr_time'] = $vals[0][5 + ($i * 6)];
                        $this->Fulljournydetails->save($j_srt);
                        //print_r($j_srt);
                    }
                }
            }
            if ($datas['radio'] == "Return Trip") {

                $lists = $this->Roundtrip->tripdetails($datas);
                //echo "<pre>"; print_r($lists); echo "</pre>";exit;
                foreach ($lists as $vals) {
                    // echo "<pre>"; print_r($vals); echo "</pre>";
                    $j_st = ((count($vals[0]) - 2) / 6) - 1;

                    $jd = $this->Journydetails->newEntity();
                    $jd['uniqueid'] = $cookiunq;
                    $jd['start_d_airline_name'] = $vals[0][0];
                    $jd['start_d_airline_num'] = $vals[0][1];
                    $jd['start_depart_time'] = $vals[0][4];
                    $jd['start_arrival_time'] = $vals[0][count($vals[0]) - 3];
                    $jd['return_d_airline_name'] = $vals[1][0];
                    $jd['return_d_airline_num'] = $vals[1][1];
                    $jd['return_depart_time'] = $vals[1][4];
                    $jd['return_arrival_time'] = $vals[1][count($vals[1]) - 3];
                    $jd['price'] = $vals[2]['TotalPrice'];
                    $jd['refundable'] = !empty($vals[2]['Refundable']) ? $vals[2]['Refundable'] : 'false';
                    $jd['fare_key'] = $vals[2]['Key'];
                    $jd['comp_price'] = @explode('AOA', $vals[2]['TotalPrice'])[1];
                    $jd['depart_time'] = date("H:i:s", strtotime($vals[0][4]));
                    $jd['stops'] = $j_st;
                    $dt_start = date_create($vals[0][4]);
                    $dt_end = date_create($vals[0][count($vals[0]) - 3]);
                    $diff = date_diff($dt_end, $dt_start);
                    $d_det_full = $diff->format('%d');

                    @$jd['time_diff'] = @$d_det_full * 24 + $diff->format('%h %m');
                    $this->Journydetails->save($jd);
                    $xcv = $jd->id;

                    for ($i = 0; $i <= $j_st; $i++) {
                        $j_srt = $this->Fulljournydetails->newEntity();
                        $j_srt['m_id'] = $vals[0]['ID'];
                        $j_srt['uniqueid'] = $cookiunq;
                        $j_srt['refid'] = $xcv;
                        $j_srt['jor_typ'] = $vals[0]['Journey_Details'];
                        $j_srt['airline'] = $vals[0][0 + ($i * 6)];
                        $j_srt['airnum'] = $vals[0][1 + ($i * 6)];
                        $j_srt['origin'] = $vals[0][2 + ($i * 6)];
                        $j_srt['destination'] = $vals[0][3 + ($i * 6)];
                        $j_srt['dep_time'] = $vals[0][4 + ($i * 6)];
                        $j_srt['arr_time'] = $vals[0][5 + ($i * 6)];
                        $this->Fulljournydetails->save($j_srt);
                        //print_r($j_srt);
                    }
                    $j_rt = ((count($vals[1]) - 2) / 6) - 1;
                    for ($i = 0; $i <= $j_rt; $i++) {
                        $j_rnt = $this->Fulljournydetails->newEntity();
                        $j_rnt['m_id'] = $vals[1]['ID'];
                        $j_rnt['uniqueid'] = $cookiunq;
                        $j_rnt['refid'] = $xcv;
                        $j_rnt['jor_typ'] = $vals[1]['Journey_Details'];
                        $j_rnt['airline'] = $vals[1][0 + ($i * 6)];
                        $j_rnt['airnum'] = $vals[1][1 + ($i * 6)];
                        $j_rnt['origin'] = $vals[1][2 + ($i * 6)];
                        $j_rnt['destination'] = $vals[1][3 + ($i * 6)];
                        $j_rnt['dep_time'] = $vals[1][4 + ($i * 6)];
                        $j_rnt['arr_time'] = $vals[1][5 + ($i * 6)];
                        $this->Fulljournydetails->save($j_rnt);
                        //print_r($j_rnt);
                    }
                }
            }

            $pageDetails->meta_title = $linkH->cityHelper(strtoupper($datas['origin']))->city . ' (' . strtoupper($datas['origin']) . ') ' . ' - ' . $linkH->cityHelper(strtoupper($datas['destination']))->city . ' (' . strtoupper($datas['destination']) . '), ' . ' ' . date("d/m", strtotime(str_replace('/', '-', $datas['departure_date']))) . ' - ' . date("d/m", strtotime(str_replace('/', '-', $datas['return_date']))) . '  |  ' . "  Alegro";

            $this->Journydetails->hasMany('Fulljournydetails', ['className' => 'Fulljournydetails', 'foreignKey' => 'refid', 'order' => ['Fulljournydetails.id' => 'ASC']]);

            $search_det_dats = $this->Journydetails->find('all')->contain('Fulljournydetails')->where(['Journydetails.uniqueid' => $cookiunq])->order(['Journydetails.id' => 'ASC'])->offset(0)->limit(15);

            //echo "<pre>";pj($search_det_dats);echo"</pre>";
            // $this->set(compact('lists','pageDetails'));
            $res_found = $this->Journydetails->find('all')->where(['Journydetails.uniqueid' => $cookiunq])->count();
            $air_li_det = $this->Journydetails->find()->select(['start_d_airline_name'])->where(['Journydetails.uniqueid' => $cookiunq])->toArray();
            $air_stops = $this->Journydetails->find()->select(['stops'])->where(['Journydetails.uniqueid' => $cookiunq])->order(['Journydetails.stops' => 'ASC'])->toArray();

            $top_price = $this->Journydetails->find()->select(['comp_price'])->where(['Journydetails.uniqueid' => $cookiunq])->order(["Journydetails.comp_price" => 'DESC'])->first();
        }

        $this->set(compact('pageDetails', 'search_det_dats', 'cookiunq', 'res_found', 'air_li_det', 'air_stops', 'top_price'));
    }

    public function ajaxLocations() {
        //$this->viewBuilder()->layout('default');
        if ($this->request->is('post')) {
            $datas = $this->request->data;
            $data = $this->Locations->find('all')->where(['city like' => '%' . $datas['origin'] . '%'])->toArray();
        }
        $this->set(compact('data', 'datas'));
        // $locations = [];
        // $data = $this->Locations->find('all')->toArray();
        // foreach ($data as  $value) {
        //     $dat=[];
        //     $dat['value'] = $value["value"];
        //     $dat['data'] = $value["data"];
        //     array_push($locations, $dat);
        // }
        // echo json_encode($locations);
        //exit;
    }

    public function ajaxHotelLocations() {
        if ($this->request->is('post')) {
            $datas = $this->request->data;
            $data = $this->HotelCountryCitys->find('all')->where(['state_name like' => '%' . $datas['origin'] . '%'])->group('state_name')->toArray();
        }
        $this->set(compact('data', 'datas'));
        //exit;
    }

    public function ajaxOneWayResult() {
        echo "one way result";
    }

    public function accountConfirmed() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
        $this->set(compact('pageDetails'));
    }

    public function accountAlreadyExists() {
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
        $this->set(compact('pageDetails'));
    }

    public function profile() {

        $this->viewBuilder()->layout('default');
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1 || $type == 3) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 10])->first();
        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
        if ($userDetails->user_detail->is_update == 0) {
            $this->Flash->success(__('profile_is_not_update'));
            //return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        //pj($userDetails); exit;
        $pageDetails['meta_title'] = $userDetails->user_detail->first_name . ' | ' . $pageDetails->meta_title;

        $this->set(compact('pageDetails', 'userDetails'));
    }

    public function isupdate() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        $this->UserDetails->updateAll(['is_update' => 1], ['user_id' => $data['userId']]);
        echo json_encode('success');
        exit;
    }

    public function editProfile() {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1 || $type == 3) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 10])->first();
        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
        $user_id = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $date = date('Y-m-d H:i:s', strtotime($data['dob']));
            $this->UserDetails->updateAll(['is_update' => 1, 'first_name' => $data['first_name'], 'phone_number' => $data['phone_number'], 'sur_name' => $data['sur_name'], 'dateofbirth' => $date, 'gender' => $data['gender'], 'country' => $data['country'], 'province' => $data['province']], ['user_id' => $user_id]);
            $this->Users->updateAll(['name' => $data['first_name'] . ' ' . $data['sur_name']], ['id' => $user_id]);
            $this->Flash->success(__('Profile updated sucessfully.'));

            return $this->redirect(HTTP_ROOT . 'profile');
        }

        $provincelists = [
            'Benguela' => 'Benguela',
            'Bengo' => 'Bengo',
            'Bié' => 'Bié',
            'Cabinda' => 'Cabinda',
            'Cuando Cubango' => 'Cuando Cubango',
            'Cuanza Norte' => 'Cuanza Norte',
            'Cuanza Sul' => 'Cuanza Sul',
            'Cunene' => 'Cunene',
            'Huambo' => 'Huambo',
            'Huíla' => 'Huíla',
            'Luanda' => 'Luanda',
            'Lunda Norte' => 'Lunda Norte',
            'Lunda Sul' => 'Lunda Sul',
            'Malanje' => 'Malanje',
            'Moxico' => 'Moxico',
            'Namibe' => 'Namibe',
            'Uíge' => 'Uíge',
            'Zaire' => 'Zaire'
        ];
        // pj($userDetails); exit;
        $pageDetails['meta_title'] = $userDetails->user_detail->first_name . ' ' . $userDetails->user_detail->sur_name . ' | ' . $pageDetails->meta_title;
        $this->set(compact('pageDetails', 'userDetails', 'provincelists'));
    }

    public function userChangePassword() {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1 || $type == 3) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 14])->first();
        $userId = $this->request->session()->read('Auth.User.id');
        $getCurPassword = $this->Users->find('all', ['fields' => ['password']])->where(['Users.id' => $userId])->first();
        $user = $this->Users->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $passCheck = $this->Users->check($data['current_password'], $getCurPassword->password);
            if ($passCheck != 1) {
                $this->Flash->error(__('Current password is incorrect.'));
                return $this->redirect(HTTP_ROOT . 'user-change-password');
            } else if ($data['password'] != $data['confirm_password']) {
                $this->Flash->error(__('Password and confirm password are not same.'));
            } else {
                $user->password = $data['password'];
                $user->id = $this->request->session()->read('Auth.User.id');

                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Password changed successfully.'));
                    return $this->redirect(HTTP_ROOT . 'user-change-password');
                } else {
                    $this->Flash->error(__('Password could not be update. Please, try again.'));
                    return $this->redirect(HTTP_ROOT . 'user-change-password');
                }
            }
        }

        $this->set(compact('pageDetails', 'userDetails'));
    }

    public function notification() {


        $type = $this->request->session()->read('Auth.User.type');
        $user_id = $this->request->session()->read('Auth.User.id');
        if ($type == 1 || $type == 3) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->viewBuilder()->layout('default');

        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 15])->first();
        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
        $email = $userDetails->email;



        $this->NotificationUsers->belongsTo('UserNotifications', ['className' => 'UserNotifications', 'foreignKey' => 'notification_id']);
        $deact = $this->NotificationDeacLists->find('all')->where(['NotificationDeacLists.email_id ' => $email])->toArray();

        $arr_deac = Hash::extract($deact, '{n}.notification_id');
        if (!empty($arr_deac)) {
            $notificationDetails = $this->NotificationUsers->find('all')->contain('UserNotifications')->where(['OR' => ['NotificationUsers.email_list' => 'all', 'NotificationUsers.email_list like' => '%' . $email . '%'], 'NotificationUsers.notification_id NOT IN' => $arr_deac]);
            $for_count = $this->NotificationUsers->find('all')->contain('UserNotifications')->where(['OR' => ['NotificationUsers.email_list' => 'all', 'NotificationUsers.email_list like' => '%' . $email . '%'], 'NotificationUsers.is_read' => 0, 'NotificationUsers.notification_id NOT IN' => $arr_deac]);
        } else {
            $notificationDetails = $this->NotificationUsers->find('all')->contain('UserNotifications')->where(['OR' => ['NotificationUsers.email_list' => 'all', 'NotificationUsers.email_list like' => '%' . $email . '%']]);
            $for_count = $this->NotificationUsers->find('all')->contain('UserNotifications')->where(['OR' => ['NotificationUsers.email_list' => 'all', 'NotificationUsers.email_list like' => '%' . $email . '%'], 'NotificationUsers.is_read' => 0]);
        }

        $hotel_message = $this->UserNotifications->find('all')->where(['OR' => ['receiver_id' => $user_id, 'sender_id' => $user_id]])->group('booking_no');
        $htl_msg_count = $this->UserNotifications->find('all')->where(['OR' => ['receiver_id' => $user_id, 'sender_id' => $user_id]])->group('booking_no')->count();

        $notifiyCount = $notificationDetails->count();
        $count_for_read = $for_count->count();
        if ($count_for_read) {
            $this->NotificationUsers->updateAll(['is_read' => 1], ['email_list' => $email]);
        }

        // pj($notificationDetails); exit;

        $this->set(compact('pageDetails', 'userDetails', 'notificationDetails', 'notifiyCount', 'hotel_message', 'htl_msg_count'));
    }

    public function message() {
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 15])->first();
        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
        $email = $userDetails->email;
        $user_id = $this->Auth->user('id');
        if (!empty($_GET['q'])) {
            $hotel_message = $this->UserNotifications->find('all')->where(['OR' => ['receiver_id' => $user_id, 'sender_id' => $user_id]]);
            if ($this->request->is('post')) {
                $data = $this->request->data;
                $new = $this->UserNotifications->newEntity();
                $data['notifi_date'] = date('Y-m-d H:i:s');
                $data['notifi_type'] = 5;
                $data['read_status'] = 0;
                $data['user_is_action'] = 0;
                $new = $this->UserNotifications->patchEntity($new, $data);
                $this->UserNotifications->save($new);
                $this->Flash->success('Message_send_successfully');
                return $this->redirect(HTTP_ROOT . 'message?q=' . @$_GET['q'] . '&p=' . @$_GET['p']);
            }
        } else {
            return $this->redirect(HTTP_ROOT . 'notification?q=p');
        }
        $this->set(compact('pageDetails', 'userDetails', 'hotel_message'));
    }

    public function ajaxDeleteNotification() {
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data;
        $user = $this->NotificationDeacLists->newEntity();
        $data['is_active'] = 1;
        $user = $this->NotificationDeacLists->patchEntity($user, $data);
        $lastid = $this->NotificationDeacLists->save($user);
        echo json_encode($data);
        exit;
    }

    public function ajaxCheckEmailAvail() {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1 || $type == 3) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->input('json_decode', TRUE);
        $email = $data['email'];
        $type = $data['type'];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

            echo json_encode(array('status' => 'error', 'msg' => ''));
        } else {

            $query = $this->Users->find('all')
                    ->select(['Users.id', 'Users.email'])
                    ->where(['Users.email' => $email, 'Users.type' => $type]);
            $count = $query->count();
            if ($count) {
                echo json_encode(array('status' => 'exits'));
            } else {
                echo json_encode(array('status' => 'success', 'msg' => 'Email id is available.'));
            }
        }
        exit;
    }

    public function ajaxCheckEmailStatus() {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1 || $type == 3) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->viewBuilder()->setLayout('ajax');
        $data = $this->request->data();
        $email = $data['email'];
        $type = $data['type'];

        if (!empty($email)) {
            $query = $this->Users->find('all')
                    ->select(['Users.id', 'Users.email'])
                    ->where(['Users.email' => $email, 'Users.type' => $type]);
            $count = $query->count();
            if ($count) {
                echo(json_encode(false));
                exit;
            } else {
                echo(json_encode(true));
                exit;
            }
        }
        exit;
    }

    public function login() {
        $this->viewBuilder()->layout('login');
        if ($this->request->session()->read('Auth.User.id') != '') {
            return $this->redirect(['controller' => 'users', 'action' => 'index']);
        }
        $title_for_layout = "LOGIN";
        $metaKeyword = "login";
        $metaDescription = "login";
        $this->set(compact('metaDescription', 'metaKeyword', 'title_for_layout'));

        if ($this->request->is('post')) {
            $data = $this->request->data;

            // $user = $this->Auth->identify();
            $user = $this->Users->find('all')->where(['Users.type IN' => [1, 3, 5, 6], 'Users.email' => $data['email']])->first();
            $passCheck = $this->Users->check($data['password'], $user->password);
            if ($passCheck != 1) {
                echo json_encode(['status' => 'error', 'msg' => 'You are not a valid user.']);
                exit;
            } else {
                // pj($data);exit;
                if ($data['email'] == "") {
                    $this->Flash->error(__('Please enter email'));
                } else if ($data['password'] == "") {
                    $this->Flash->error(__('Please enter password'));
                } else if ($data['email'] == "" && $data['password'] == "") {
                    $this->Flash->error(__('Please enter email and password'));
                } else {
                    if ($user) {
                        if ($data['email']) {
                            $isactive_check = $this->Users->find('all')->where(['Users.type IN' => [1, 3, 5, 6], 'Users.email' => $data['email'], 'Users.is_active' => true]);
                            $isactive_counter = $isactive_check->count();
                            if ($isactive_counter > 0) {

                                $this->Auth->setUser($user);
                                // pj($user);exit;
                                $type = $this->Auth->user('type');
                                $name = $this->Auth->user('name');
                                $email = $this->Auth->user('email');
                                $user_id = $this->Auth->user('id');
                                if ($type == 1) {
                                    $this->Flash->success(__('Login successful'));
                                    return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
                                } else if ($type == 2) {
                                    $this->Flash->success(__('Login successful'));
                                    return $this->redirect(HTTP_ROOT . 'profile');
                                } else {
                                    $this->Flash->success(__('Login successful'));
                                    return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
                                }
                            } else {
                                $this->Flash->error(__('Your have not permission please contacts your admin'));
                            }
                        } else {
                            $this->Flash->error(__('Invalid username or password, try again'));
                        }
                    } else {
                        $this->Flash->error(__('Invalid username or password, try again'));
                        //  return $this->redirect(['action' => 'login']);
                    }
                }
            }
        }
    }

    public function fblogin() {

        $this->autoRender = false;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI);
        $url = $helper->getLoginUrl(array('email'));

        return $this->redirect($url);
        exit;
    }

    public function fbreturn() {
        session_start();
        $this->viewBuilder()->layout('ajax');

        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI);

        $session = $helper->getSessionFromRedirect();
        if (isset($_SESSION['token'])) {
            $session = new FacebookSession($_SESSION['token']);
            try {
                $session->validate(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET);
            } catch (FacebookAuthorizationException $e) {
                echo $e->getMessage();
            }
        }

        $data = array();
        $fb_data = array();

        if (isset($session)) {
            $_SESSION['token'] = $session->getToken();
            $appsecret_proof = hash_hmac('sha256', $_SESSION['token'], FACEBOOK_APP_SECRET);
            $request = new FacebookRequest($session, 'GET', '/me?locale=en_US&fields=name,email,gender,age_range,first_name,last_name,link,locale,picture,location', array("appsecret_proof" => $appsecret_proof));

            $response = $request->execute();
            $graph = $response->getGraphObject(GraphUser::className());
            $fb_data = $graph->asArray();
            $id = $graph->getId();
            $email = $graph->getEmail();

            if (!empty($fb_data)) {
                if (@$fb_data['email']) {

                    $result = $this->Users->find('all')->where(['email' => $fb_data['email'], 'type' => 2])->count();
                    if ($result >= 1) {
                        $result_email = $this->Users->find('all')->where(['email' => $fb_data['email'], 'type' => 2])->first();
                        if (!empty($result_email->email)) {
                            $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id']])->first()->toArray();
                            $user_login_id = $this->Auth->user('id');

                            $user = $this->Users->newEntity();
                            $user->last_login_ip = $this->Custom->getRealIpAddress();
                            $user->last_login_date = date('Y-m-d H:i:s');
                            $user->id = $user_login_id;
                            $this->Users->save($user);


                            session_destroy();
                            $get_login = $this->Auth->setUser($getLoginConfirmation);

                            return $this->redirect(HTTP_ROOT);
                        }

//                        if (@$this->Auth->user('id') == '') {
//                            $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id']])->first()->toArray();
//                            session_destroy();
//                            $get_login = $this->Auth->setUser($getLoginConfirmation);
//                            $user_login_id = $this->Auth->user('id');
//                            if ($user_login_id) {
//                                $user = $this->Users->newEntity();
//                                $user->last_login_ip = $this->Custom->getRealIpAddress();
//                                $user->last_login_date = date('Y-m-d H:i:s');
//                                $user->id = $user_login_id;
//                                $user->name = $fb_data['first_name'];
//                                $this->Users->save($user);
//                                if ($this->Users->save($user)) {
//                                    $this->UserDetails->updateAll(['first_name' => $fb_data['first_name'], 'last_name' => $fb_data['last_name']], ['user_id' => $user_login_id]);
//
//
//
//                                    $this->Flash->success(__('Login successfull'));
//                                    return $this->redirect(HTTP_ROOT .'extranets/dashboard');
//                                }
//                            } else {
//                                $this->Flash->error(__('Login failed and you can register here also'));
//                                return $this->redirect(HTTP_ROOT. 'extranets');
//                            }
//                        }
                    } else {
                        $user = $this->Users->newEntity();
                        $user->email = $fb_data['email'];
                        $user->type = 2;
                        $user->unique_id = $this->Custom->generateUniqNumber();
                        $user->name = $fb_data['first_name'] . ' ' . $fb_data['last_name'];
                        $user->created_dt = date('Y-m-d H:i:s');
                        $user->last_login_date = date('Y-m-d H:i:s');
                        $user->is_active = 1;
                        $user->reg_ip = $this->Custom->get_ip_address();
                        $user->last_login_ip = $this->Custom->get_ip_address();
                        if ($last_id = $this->Users->save($user)) {
                            $data['id'] = $last_id->id;
                            session_destroy();
                            $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $last_id->id])->first()->toArray();
                            $get_login = $this->Auth->setUser($getLoginConfirmation);
                            $user_login_id = $this->Auth->user('id');
                            if ($user_login_id) {
                                $getId = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $last_id->id])->first();
                                if (!empty($getId->id)) {
                                    $data1['id'] = $getId->id;
                                } else {
                                    $data1['id'] = '';
                                }

                                $userDetailspatch = $this->UserDetails->newEntity();
                                $data1['user_id'] = $last_id->id;
                                $data1['first_name'] = $user->first_name;
                                $data1['last_name'] = $user->last_name;
                                $userDetailspatch = $this->UserDetails->patchEntity($userDetailspatch, $data1);
                                $this->UserDetails->save($userDetailspatch);

                                return $this->redirect(HTTP_ROOT);
                            } else {
                                $this->Flash->error(__('Login failed and you can register here also'));
                                return $this->redirect(HTTP_ROOT);
                            }
                        } else {
                            $this->Flash->error(__('Login failed and you can register here also'));
                            return $this->redirect(HTTP_ROOT);
                        }
                    }
                } else {
                    $this->Flash->error(__('Login failed due to email is not associate with your facebook! '));
                    return $this->redirect(HTTP_ROOT);
                }
            } else {
                $this->Flash->error(__('Login failed and you can register here also'));
                return $this->redirect(HTTP_ROOT);
            }
        }
    }

    public function ajaxLogin() {
        $this->viewBuilder()->layout('ajax');

        $data = $this->request->data;
        $userEmailCheck = $this->Users->find('all')->where(['Users.type' => 2, 'Users.email' => $data['email']])->count();
        if ($userEmailCheck == 0) {
            echo json_encode(['status' => 'errorLogin']);
            exit;
        }
        //$user = $this->Auth->identify();
        $user = $this->Users->find('all')->where(['Users.type' => 2, 'Users.email' => $data['email']])->first();
        $passCheck = $this->Users->check($data['password'], $user->password);
        if ($passCheck != 1) {
            echo json_encode(['status' => 'error', 'msg' => 'You are not a valid user.']);
            exit;
        } else {
            if ($user) {
                if ($data['email']) {
                    $isactive_check = $this->Users->find('all')->where(['Users.type' => 2, 'Users.email' => $data['email'], 'Users.is_active' => true]);
                    $isactive_counter = $isactive_check->count();
                    if ($isactive_counter > 0) {

                        $this->Auth->setUser($user);
                        // pj($user);exit;
                        $type = $this->Auth->user('type');
                        $name = $this->Auth->user('name');
                        $email = $this->Auth->user('email');
                        $user_id = $this->Auth->user('id');
                        $this->Users->updateAll(['last_login_date' => date('Y-m-d H:i:s')], ['id' => $user_id]);
                        if ($type == 1) {
                            echo json_encode(['status' => 'success', 'msg' => 'Login successful', 'url' => HTTP_ROOT . 'appadmins/index']);
                            exit;
                        } else if ($type == 2) {
                            echo json_encode(['status' => 'success', 'msg' => 'Login successful', 'url' => $this->referer()]);
                            exit;
                        } else {
                            echo json_encode(['status' => 'success', 'msg' => 'Login successful', 'url' => HTTP_ROOT]);
                            exit;
                        }
                    } else {
                        echo json_encode(['status' => 'error_per', 'msg' => 'Your have not permission please contacts your admin']);
                        exit;
                    }
                } else {

                    echo json_encode(['status' => 'error', 'msg' => 'Invalid username or password, try again']);
                    exit;
                }
            } else {

                echo json_encode(['status' => 'error', 'msg' => 'Invalid username or password, try again']);
                exit;
            }
        }

        exit;
    }

    public function googlelogin() {
        $this->autoRender = false;

// require_once(ROOT . '/config/google_login.php');
        require_once(ROOT . '/vendor' . DS . 'Google/src/' . 'Google_Client.php');
        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $client->setApprovalPrompt('auto');
        $url = $client->createAuthUrl();

        return $this->redirect($url);
    }

    public function googleLoginReturn() {
        $url = $_SERVER['REQUEST_URI'];
        $newUrl = $url; //str_replace('.profile', '.profilx', $url);
// echo (@$url!=@$newUrl);
        if (@$url != @$newUrl) {
            echo (@$url != @$newUrl);
            return $this->redirect(HTTP_ROOT . $newUrl);
        }

//echo $_GET['code']; exit;
        $this->autoRender = false;
        require_once(ROOT . '/config/google_login.php');

        $client = new Google_Client();
        $client->setScopes(array('https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/userinfo.email', 'https://www.googleapis.com/auth/plus.me'));
        $client->setApprovalPrompt('auto');

        $plus = new Google_PlusService($client);
        $oauth2 = new Google_Oauth2Service($client);
        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']); // Authenticate
            $_SESSION['access_token'] = $client->getAccessToken(); // get the access token here
        }

        if (isset($_SESSION['access_token'])) {
            $client->setAccessToken($_SESSION['access_token']);
        }

        if ($client->getAccessToken()) {
            $_SESSION['access_token'] = $client->getAccessToken();
            $google_data = $oauth2->userinfo->get();
            $token = json_decode($client->getAccessToken())->access_token;
//pj($google_data);exit;
//echo $user['email'];
            try {
                if (!empty($google_data)) {
                    $result = $this->Users->find('all')->where(['email' => $google_data['email'], 'type' => 2])->count();

                    if ($result >= 1) {
                        $result_email = $this->Users->find('all')->where(['email' => $google_data['email'], 'type' => 2])->first();
                        session_destroy();
                        $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id'], 'type' => 2])->first()->toArray();

                        $get_login = $this->Auth->setUser($getLoginConfirmation);

                        $user_login_id = $this->Auth->user('id');
                        if ($user_login_id) {
                            $user = $this->Users->newEntity();
                            $user->last_login_ip = $this->Custom->get_ip_address();
                            $user->type = 2;
                            $user->last_login_date = date('Y-m-d H:i:s');
                            $user->id = $user_login_id;
                            $this->Users->save($user);
                            if ($result_email['type'] == 2) {
                                return $this->redirect(HTTP_ROOT);
                            }
                        } else {
                            $this->Flash->error(__('Login failed and you can register here also'));
                            return $this->redirect(HTTP_ROOT);
                        }
// }
                    } else {
                        $user = $this->Users->newEntity();
                        $user->email = $google_data['email'];
                        $user->google_id = $google_data['id'];
                        $user->profile_photo = $google_data['picture'];
                        $user->token = $token;
                        $user->unique_id = $this->Custom->generateUniqNumber();
                        $user->name = $google_data['given_name'] . " " . $google_data['family_name'];
                        $user->created = date('Y-m-d H:i:s');
                        $user->last_login_date = date('Y-m-d H:i:s');
                        $user->is_active = 1;
                        $user->type = 2;
                        $user->reg_ip = $this->Custom->get_ip_address();
                        $user->last_login_ip = $this->Custom->get_ip_address();
                        if ($this->Users->save($user)) {
                            session_destroy();
                            $viewer_details = $this->UserDetails->newEntity();
                            $dataUser['user_id'] = $user->id;
                            $dataUser['first_name'] = $google_data['given_name'];
                            $dataUser['last_name'] = $google_data['family_name'];
                            $viewer_details = $this->UserDetails->patchEntity($viewer_details, $dataUser);
                            $this->UserDetails->save($viewer_details);
                            $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $user->id])->first()->toArray();
                            $get_login = $this->Auth->setUser($getLoginConfirmation);
                            $user_login_id = $this->Auth->user('id');
                            if ($user_login_id) {
                                return $this->redirect(HTTP_ROOT);
                            } else {
                                $this->Flash->error(__('Login failed and you can register here also'));
                                return $this->redirect(HTTP_ROOT);
                            }
                        } else {
                            $this->Flash->error(__('Login failed and you can register here also'));
                            return $this->redirect(HTTP_ROOT);
                        }
                    }
                } else {
                    $this->Flash->error(__('Login failed and you can register here also'));
                    return $this->redirect(HTTP_ROOT);
                }
            } catch (Exception $e) {
                $this->Flash->error(__('Login failed and you can register here also'));
                return $this->redirect(HTTP_ROOT);
            }
        }

        exit;
    }

    public function logout() {
        $type = $this->Auth->user('type');

        if ($this->Auth->logout()) {
            $this->Flash->success(__('logoutexter'));
            return $this->redirect(HTTP_ROOT);
        }
    }

    /* public function logout() {
      $this->Flash->success('logout');

      $type = $this->Auth->user('type');

      if ($this->Auth->logout()) {
      $this->request->session()->destroy();

      if ($type == 2) {
      return $this->redirect(HTTP_ROOT);
      } else {
      if (!empty($_GET['key'])) {
      return $this->redirect(HTTP_ROOT);
      } else {
      return $this->redirect(HTTP_ROOT . 'cgi-bin/login/');
      }
      }
      }
      } */

    public function webrootRedirect() {

        $this->viewBuilder()->layout('login');
        return $this->redirect(HTTP_ROOT . 'cgi-bin/login/');
    }

    public function updatePhoto() {
        $this->viewBuilder()->layout('');
        $data = $this->request->data;

        //pj($data); exit;
        if ($data) {// file uploading is handled in same file you can put this in seperate file
            sleep(2); //simulate 2 seconds delay to show progressbar for atleast 2 soconds+
            //minimum file upload and extension validation
            if (isset($_FILES) && !empty($_FILES['file']['name'])) {
                $allowed_ext = array('jpg', 'png', 'jpeg', 'gif');
                $filename = $_FILES['file']['name'];
                $ext = explode('.', $filename);
                $ext = end($ext);
                //echo $ext; exit;
                if (in_array($ext, $allowed_ext)) {
                    move_uploaded_file($_FILES['file']['tmp_name'], PHOTOS . $filename);
                    $user_id = $this->Auth->user('id');
                    $this->UserDetails->updateAll(['profile_photo' => $filename], ['user_id' => $user_id]);
                    echo PHOTOS . $filename;
                } else {

                    echo 'ERROR: Only jpg and png files are supported';
                }
            } else {
                echo 'ERROR: file not provided';
            }
            exit;
        }
        exit;
    }

    public function welcomePage($uniq_seo = null) {
        $this->viewBuilder()->setLayout('default');
        $LAN = $this->request->session()->read("lan");
        if ($LAN == "PT") {
            $valuez = "value_PT";
        } else if ($LAN == "FR") {
            $valuez = "value_FR";
        } else {
            $valuez = "value";
        }
        $title_for_layout = "Mail Resend";
        $metaKeyword = "Mail Resend";
        $metaDescription = "Mail Resend";
        if (isset($_REQUEST['success']) && !empty($_REQUEST['success'])) {
            $uniq = $_REQUEST['success'];
            $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 23])->first();
        }
        $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL']);
        $frm = $fromvalue->first();
        $from = $frm->value;
        if ($uniq) {
            $users = $this->Users->find('all')->contain('UserDetails')->where(['Users.unique_id' => $uniq]);
            $user = $users->first();
            //pj($user); exit;
            $email = $user->email;
            $domain_name = substr(strrchr($email, "@"), 1);
            $mail_url = HTTP_ROOT;
            //echo $domain_name;
            //exit;
            /* if ($domain_name == 'gmail.com') {
              $mail_url = 'https://mail.google.com/mail/u/0/';
              } else if ($domain_name == 'yandex.com') {
              $mail_url = 'https://mail.yandex.com/';
              } else if ($domain_name == 'hotmail.com') {
              $mail_url = 'https://login.live.com/';
              } else if ($domain_name == 'outlook.com') {
              $mail_url = 'https://login.live.com';
              } else if ($domain_name == 'yahoo.com') {
              $mail_url = 'https://login.yahoo.com/';
              } elseif ($domain_name == 'aol.com') {
              $mail_url = 'https://login.aol.com/';
              }
             */



            $this->loadModel('Settings');
            $emailTemp = $this->Settings->find('all')->where(['Settings.name' => 'WELCOME_EMAIL']);
            $emailTemplate = $emailTemp->first();
            $to = $user->email;
            $subject = $emailTemplate->display;
            $link = HTTP_ROOT . 'users/confirm/' . $user->unique_id;

            $getName = $this->Users->find('all')->contain(['UserDetails'])->first();
            $name = $getName->name;
            $message = $this->Custom->formatUserRegister($emailTemplate->value, $name, $link);
            $this->Custom->sendEmail($to, $from, $subject, $message);
            if ($option != NULL) {
                $this->Flash->success(__('Activation mail resent successfully.'));
            }

            $this->set(compact('user', 'from'));
        }
        $this->set(compact('mail_url', 'users', 'metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function ajaxRegistration() {
        $this->viewBuilder()->setLayout('ajax');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $exitEmail = $this->Users->find('all')->where(['Users.email' => $data['email'], 'Users.type' => 4])->count();
            //echo $exitEmail;exit;
//echo $data['email'];exit;
            if ($exitEmail >= 1) {
                echo json_encode(['status' => 'error', 'msg' => 'Account alredy exits']);
                exit;
            } else {

                $data['unique_id'] = $this->Custom->generateUniqNumber();
                $data['type'] = 4;
                $data['name'] = $data['first_name'];
                $data['is_active'] = 0;
                $data['created_dt'] = date('Y-m-d h:i:s');
                $data['last_login_ip'] = $this->Custom->get_ip_address();
                $data['last_login_date'] = date('Y-m-d h:i:s');
                $data['qstr'] = '';
                $user = $this->Users->patchEntity($user, $data);
                if ($lastid = $this->Users->save($user)) {
                    $userID = $user->id;
                    $userDetailspatch = $this->UserDetails->newEntity();
                    $userDetails['user_id'] = $userID;
                    $userDetails['first_name'] = $data['first_name'];
                    $userDetails['sur_name'] = !empty($data['surname']) ? $data['surname'] : '';
                    $userDetails['phone_number'] = !empty($data['phone']) ? $data['phone'] : '';
                    $userDetails['dateofbirth'] = '';
                    $userDetails['gender'] = '';
                    $userDetails['country'] = '';

                    $userDetailspatch = $this->UserDetails->patchEntity($userDetailspatch, $userDetails);
                    if ($this->UserDetails->save($userDetailspatch)) {
                        $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'WELCOME_EMAIL'])->first();
                        $to = $data['email'];
                        $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                        $from = $fromvalue->value;
                        $subject = "Welcome to Alegro";
                        $name = $data['first_name'];
                        $link = HTTP_ROOT . 'users/confirm/' . $lastid->unique_id;
                        $message = $this->Custom->formatUserRegister($emailTemplate->value, $name, $link);
                        $this->Custom->sendEmail($to, $from, $subject, $message);
                        //
                        $url = HTTP_ROOT . 'registration?success=' . $lastid->unique_id;
                        echo json_encode(['status' => 'success', 'msg' => 'Successfully Registered', 'url' => $url]);
                        exit;
                    }
                }
            }
        }
    }

    public function confirm($uniq_id = NULL) {
        if ($uniq_id) {
            $query = $this->Users->find('all')->where(['Users.unique_id' => $uniq_id]);
            $confirm = $query->count();
//
            if ($confirm) {
                $chkcive = $this->Users->find('all')->where(['Users.unique_id' => $uniq_id, 'Users.is_active' => 0]);
                if ($chkcive->count() != 0) {
                    $this->Users->query()->update()
                            ->set(['is_active' => 1])
                            ->where(['unique_id' => $uniq_id])
                            ->execute();
                    return $this->redirect(HTTP_ROOT . 'account-confirmed');
                    exit;
                } else {
                    $text = "account_already_activated";
                    $this->Flash->error(__('Your account already activated.'));
                    return $this->redirect(HTTP_ROOT . 'account-already-exists');
                    exit;
                }
            }
        } else {
            $this->Session->setFlash(__('Invalid Url'), 'error_message');
            return $this->redirect(HTTP_ROOT);
            exit;
        }
        exit;
    }

    public function forgetPassword() {
        $this->viewBuilder()->setLayout('ajax');
        $user = $this->Users->newEntity();
        if ($this->request->is(['post'])) {
            $data = $this->request->data;

            if ($data['email'] == "") {
                //$this->Flash->error(__('Email field is empty'));
                echo json_encode(['status' => 'erorr', 'msg' => 'Email field is empty']);
                exit;
            } else if (!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) {
                // $this->Flash->error(__('Please enter a valid email id'));
                echo json_encode(['status' => 'erorr', 'msg' => 'Please enter a valid email id']);
                exit;
            } else {
                $users = $this->Users->find('all')->where(['Users.email' => $data['email']]);
                $user = $users->first();
                if ($users->count() > 0) {
                    $this->Users->query()->update()->set(['qstr' => $this->Custom->generateUniqNumber()])->where(['id' => $user->id])->execute();
                    $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'FORGOT_PASSWORD'])->first();
                    $to = $user->email;
                    $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $from = $fromvalue->value;
                    $subject = $emailTemplate->display;
                    $link = '<a style="text-decoration:none;color:black;" target="_blank" href=' . HTTP_ROOT . 'change-password/' . $user->unique_id . '>' . __("Reset Password") . '</a>';
                    $message = $this->Custom->formatForgetPassword($emailTemplate->value, $user->name, $user->email, $link, SITE_NAME);
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    // $this->Flash->success(__('A link to reset your password has been set to your registered email address.'));
                    echo json_encode(['status' => 'successs', 'msg' => 'A link to reset your password has been set to your registered email address.']);
                    exit;
                } else {
                    echo json_encode(['status' => 'erorr', 'msg' => 'This email is not associated with our database']);
                    exit;
                }
            }
        }
        exit;
    }

    public function changePassword($uniq = null) {
        $this->viewBuilder()->layout('default');
        $title_for_layout = "Change password";
        $metaKeyword = "Change password";
        $metaDescription = "Change password";

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if ($data['password'] == "") {
                $this->Flash->error(__('Please enter password'), 'error_message');
            } else if (strlen($data['password']) < 5) {
                $this->Flash->error(__('Password must contain atleast 10 characters.'));
            } else if ($data['confirm_password'] == "") {
                $this->Flash->error(__('Please enter confirm password'), 'error_message');
            } else if (strlen($data['confirm_password']) < 5) {
                $this->Flash->error(__('Confirm password must contain atleast 10 characters.'));
            } else if ($data['password'] != $data['confirm_password']) {
                $this->Flash->error(__('Please enter confirm password same as password'), 'error_message');
            } else {
                $users = $this->Users->find('all')->where(['Users.unique_id' => $data['uniq']]);
                $uniq = $data['uniq'];
                $userData = $users->first();
                $data_can_be_passed_here = 12;
                $status = 34;

                if ($users->count() > 0 && $userData->qstr != '') {
                    $data['id'] = $userData->id;
                    $user->password = $data['password'];
                    $user->id = $userData->id;
                    if ($this->Users->save($user)) {

                        $this->Flash->success(__('Password changed successfully now you can login.'));
                        return $this->redirect(['controller' => 'users', 'action' => 'index', "?" => array("key" => "d56b699830e77ba53855679cb1d252da")]);
                    }
                } else {
                    $this->Flash->error(__('You have already used this link.'));
                    return $this->redirect(HTTP_ROOT . 'forgetPassword');
                }
            }
        }
        $this->set(compact('uniq', 'user', 'metaDescription', 'metaKeyword', 'title_for_layout'));
    }

    public function ShareItenerary() {
        $this->viewBuilder()->setLayout('ajax');
        $servicefee = $this->ServiceFee->find('all')->where(['id' => 1])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $datasave = $this->Shareinfo->newEntity();

            $data['cookie'] = $_COOKIE["UserId"];
            $data['rec1'] = $data['user_rec1'];
            $data['rec2'] = $data['user_rec2'];

            $share_data = $this->UserBookDetails->find('all')->where(['id' => $data['ref_id'], 'uniqueid' => $_COOKIE["UserId"]])->first();
            $userbokdet_dat = $this->UserFullBookingDetails->find('all')->where(['refid' => $data['ref_id']]);
            $reentry = $this->UserBookDetails->newEntity();
            $reentry->uniqueid = $share_data->uniqueid;
            $reentry->start_d_airline_name = $share_data->start_d_airline_name;
            $reentry->start_d_airline_num = $share_data->start_d_airline_num;
            $reentry->start_depart_time = $share_data->start_depart_time;
            $reentry->start_arrival_time = $share_data->start_arrival_time;
            $reentry->return_d_airline_name = $share_data->return_d_airline_name;
            $reentry->return_d_airline_num = $share_data->return_d_airline_num;
            $reentry->return_depart_time = $share_data->return_depart_time;
            $reentry->return_arrival_time = $share_data->return_arrival_time;
            $reentry->price = $share_data->price;
            $reentry->link_id = $share_data->link_id;
            $reentry->origin = $share_data->origin;
            $reentry->destination = $share_data->destination;
            $reentry->cabin = $share_data->cabin;
            $reentry->total_fee = $share_data->total_fee;
            $reentry->service_fee = $share_data->service_fee;
            $reentry->passengers = $share_data->passengers;
            $reentry->refundable = $share_data->refundable;
            $reentry->fare_key = $share_data->fare_key;

            $reentrys = $this->UserBookDetails->save($reentry);
            $xcidf = $reentrys->id;
            foreach ($userbokdet_dat as $keyz) {
                $reuser_book = $this->UserFullBookingDetails->newEntity();
                $reuser_book->m_id = $keyz->m_id;
                $reuser_book->refid = $xcidf;
                $reuser_book->uniqueid = $keyz->uniqueid;
                $reuser_book->jor_typ = $keyz->jor_typ;
                $reuser_book->airline = $keyz->airline;
                $reuser_book->airnum = $keyz->airnum;
                $reuser_book->origin = $keyz->origin;
                $reuser_book->destination = $keyz->destination;
                $reuser_book->dep_time = $keyz->dep_time;
                $reuser_book->arr_time = $keyz->arr_time;
                $this->UserFullBookingDetails->save($reuser_book);
            }
            $mainprice = explode("GBP", $share_data->price)[1];
            $ori_dat = $this->Locations->find('all')->where(['value' => $share_data->origin])->first();
            $desti_dat = $this->Locations->find('all')->where(['value' => $share_data->destination])->first();
            if (empty($share_data->return_d_airline_name)) {
                $price1 = explode("GBP", $share_data->price)[1];
            } elseif (!empty($share_data->return_d_airline_name)) {
                $price1 = explode("GBP", $share_data->price)[1] / 2;
            }

            $img_s = $share_data->start_d_airline_name . ".png";
            if (file_exists("img/flaglogos/" . $img_s)) {
                $img_dat1 = HTTP_ROOT . "img/flaglogos/" . $img_s;
            } else {
                $img_dat1 = HTTP_ROOT . "img/icone-1.gif";
            }

            $img_dat2 = HTTP_ROOT . "img/icone-1.gif";
            if (!empty($share_data->return_d_airline_name)) {
                $img_r = $share_data->return_d_airline_name . ".png";
                if (file_exists("img/flaglogos/" . $img_r)) {
                    $img_dat2 = HTTP_ROOT . "img/flaglogos/" . $img_r;
                } else {
                    $img_dat2 = HTTP_ROOT . "img/icone-1.gif";
                }
            }


            $dep_dtim = $share_data->start_depart_time;
            $dep_arr_dtim = $share_data->start_arrival_time;
            $dep_dtim->diff($dep_arr_dtim)->format('%Y-%m-%d %H:%i:%s');



            $retn_dtim = $share_data->return_depart_time;
            $retn_arr_dtim = $share_data->return_arrival_time;
            $data['ref_numb'] = $xcidf;
            $datasave = $this->Shareinfo->patchEntity($datasave, $data);
            if ($this->Shareinfo->save($datasave)) {
                $to = $data['user_rec1'];
                $to1 = $data['user_rec2'];
                $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $from = $fromvalue->value;
                $subject = 'A flight itenerary has been shared with you';
                $name = $data['user_name'];
                if (!empty($retn_dtim)) {
                    if ($ori_dat->country == "Angola" && $desti_dat->country == "Angola") {

                        $service_fee1 = $servicefee->domestic * $share_data->passengers;
                        $total_peice = $service_fee1 + (($price1 * 2) * $share_data->passengers);
                    } else {
                        $service_fee1 = $servicefee->international * $share_data->passengers;
                        $total_peice = $service_fee1 + (($price1 * 2) * $share_data->passengers);
                    }
                    $message = '<style type="text/css">
                      {
                      font-family: Arial, Helvetica, sans-serif;
                      }
                      </style>
                      <div class="email-templ" style="width: 600px; margin: 0 auto;">
                      <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                      <tr style="background-color: #f1c400;">
                      <td style="text-align: center; padding:10px 0;">
                      <img width="200" src="' . HTTP_ROOT . 'img/emailtemp/header-logo.png" alt="">
                      <h4 style="font-size: 18px; margin-top: 14px; margin-bottom: 0;">' . __("Get Your Travel Started") . '</h4>
                      </td>
                      </tr>
                      <tr>
                      <td style=" padding: 10px 15px;">
                     <p>' . __("Hi,") . ' </p>
                      <p>' . __("Check out the ticket information below for your next trip.") . '</p>
                      <p>' . __("Buy this ticket as soon as you can or else you will miss this opportunity.") . '</p>
                      </td>
                      </tr>
                      <tr>
                      <td style="background: #b0adadcc; padding: 7px 16px;">
                      <div style="float: left;">
                      <img style="float: left;" src="' . HTTP_ROOT . 'img/emailtemp/plain-icon2.png" alt="">
                      <h4 style="float:left; margin:12px 0 0 15px; ">' . __("Depart") . '</h4>
                      </div>
                      <div style="float: right;">
                      <h4 style="margin: 13px 0 0 0;">' . __($share_data->cabin) . '</h4>
                      </div>
                      </td>
                      </tr>
                      <tr>
                      <td>
                      <div style="float: left; width: 17%;">
                      <p><strong style="margin-bottom: 10px; display: inline-block;">' . __($dep_dtim->format('l')) . '</strong><br>' . __($dep_dtim->format('d M, Y')) . '</p>
                      </div>
                      <div style="float: right; width: 76%; border-left: 1px solid #ccc; padding-left: 26px;">
                      <ul style="list-style-type: none;float: left; width: 100%; padding: 0;">
                      <li style="float: left; width: 25%">
                      <p style=" margin:5px 0; font-size: 15px;">' . __($dep_dtim->format('h:i A')) . '</p>
                      <h5 style="margin: 0; font-size: 18px;">' . __($ori_dat->city) . '</h5>
                      <p style=" margin:5px 0; font-size: 15px;">' . __($ori_dat->country) . '</p>
                      </li>
                      <li style="float: left; width: 25%; text-align: center; padding-top: 25px;"><img style="width: 50px;" src="' . HTTP_ROOT . 'img/emailtemp/plain-icon-2.png" alt=""></li>
                      <li style="float: left; width: 25%">
                      <p style=" margin:5px 0; font-size: 15px;">' . __($dep_arr_dtim->format('h:i A')) . '</p>
                      <h5 style="margin: 0; font-size: 18px;">' . __($desti_dat->city) . '</h5>
                      <p style=" margin:5px 0; font-size: 15px;">' . __($desti_dat->country) . '</p>
                      </li>
                      </ul>
                      <ul style="float: left; width: 100%; padding: 0; list-style-type: none;">
                      <li style="float: left;">
                      <img style="width:45px;" src="' . $img_dat1 . '" alt="">
                      <p style="font-size: 15px;">' . __($share_data->start_d_airline_name) . '-' . __($share_data->start_d_airline_num) . '</p>
                      </li>
                      <li style=" float: right; width: 80%;">
                      <h5 style="margin-top: 0; font-size: 18px; margin-bottom: 10px;">' . __($dep_dtim->diff($dep_arr_dtim)->format('%d d %H h %i m')) . '</h5>
                      <p style="font-size: 15px; margin: 0;">Operated by: ' . __($this->flightName[$share_data->start_d_airline_name]) . '</p>
                      </li>
                      </ul>

                      </div>
                      </td>
                      </tr>
                      <tr>
                      <td style="background: #b0adadcc; padding: 7px 16px;">
                      <div style="float: left;">
                      <img style="float: left;" src="' . HTTP_ROOT . 'img/emailtemp/plain-icon3.png" alt="">
                      <h4 style="float:left; margin:12px 0 0 15px; ">' . __("Return") . '</h4>
                      </div>
                      </td>
                      </tr>
                      <tr>
                      <td>
                      <div style="float: left; width: 17%;">
                      <p><strong style="margin-bottom: 10px; display: inline-block;">' . __($retn_dtim->format('l')) . '</strong><br>' . __($retn_dtim->format('d M, Y')) . '</p>
                      </div>
                      <div style=" float: right; width: 76%; border-left: 1px solid #ccc; padding-left: 26px;">
                      <ul style="list-style-type: none;float: left; width: 100%; padding: 0;">
                      <li style="float: left; width: 25%">
                      <p style=" margin:5px 0; font-size: 15px;">' . __($retn_dtim->format('h:i A')) . '</p>
                      <h5 style="margin: 0; font-size: 18px;">' . __($desti_dat->city) . '</h5>
                      <p style=" margin:5px 0; font-size: 15px;">' . __($desti_dat->country) . '</p>
                      </li>
                      <li style="float: left; width: 25%; text-align: center; padding-top: 25px;"><img style="width: 50px;" src="' . HTTP_ROOT . 'img/emailtemp/plain-icon-2.png" alt=""></li>
                      <li style="float: left; width: 25%">
                      <p style=" margin:5px 0; font-size: 15px;">' . __($retn_arr_dtim->format('h:i A')) . '</p>
                      <h5 style="margin: 0; font-size: 18px;">' . __($ori_dat->city) . '</h5>
                      <p style=" margin:5px 0; font-size: 15px;">' . __($ori_dat->country) . '</p>
                      </li>
                      </ul>
                      <ul style="float: left; width: 100%; padding: 0; list-style-type: none;">
                      <li style="float: left;">
                      <img style="width:45px;" src="' . $img_dat2 . '" alt="">
                      <p style="font-size: 15px;">' . __($share_data->return_d_airline_name) . '-' . __($share_data->return_d_airline_num) . '</p>
                      </li>
                      <li style=" float: right; width: 80%;">
                      <h5 style="margin-top: 0; font-size: 18px; margin-bottom: 10px;">' . __($retn_dtim->diff($retn_arr_dtim)->format('%d d %H h %i m')) . '</h5>
                      <p style="font-size: 15px; margin: 0;">Operated by: ' . __($this->flightName[$share_data->return_d_airline_name]) . '</p>
                      </li>
                      </ul>

                      </div>
                      </td>
                      </tr>
                      <tr>
                      <td style="border-top: 1px solid #ccc;">
                      <ul style="padding: 0; margin: 20px 0 0 0; float: left; width: 100%; list-style-type: none;">
                      <li style="float: left; width: 100%; border-bottom: 1px solid #ccc; padding: 20px 0;"><h3 style="float: left; margin: 0;">' . __("Fare Summary") . '</h3> <span style="float: right;">' . $share_data->passengers . __("Passenger") . '</span></li>
                      <li style="float: left; width: 100%; border-bottom: 1px solid #ccc; padding: 20px 0;"><p style=" margin: 0; float: left;">' . __("Air Transportation Charges") . ' </p><span style="float: right;"> ' . number_format((($price1 * 2) * $share_data->passengers), 2) . ' AOA</span></li>
                      <li style="float: left; width: 100%; border-bottom: 1px solid #ccc; padding: 20px 0;"><p style="margin: 0; float: left;">' . __("Taxes, Fees and Chages") . ' </p><span style="float: right;"> ' . number_format($service_fee1, 2) . ' AOA</span></li>
                      <li style="float: left; width: 100%; padding: 20px 0;"><p style="margin: 0; float: left; font-weight: bold;">' . __("GRAND TOTAL") . ' </p><span style="float: right; font-weight: bold;">' . number_format($total_peice, 2) . ' AOA</span></li>
                      </ul>
                      </td>
                      </tr>
                      <tr>
                      <td style="padding-bottom: 30px;">
                      <a style="float: left; background: #ccc; padding: 17px 20px; color: #000; text-decoration: none;" href="#">' . __("Prices and availability are subject to change") . '</a>
                      <a style="float: right; padding: 17px 32px; text-decoration:none; background: #f1c400; color: #000; text-transform: uppercase; font-size: 15px;" href="' . HTTP_ROOT . 'route-review/' . $xcidf . '/share">' . __("Book Now") . '</a>
                      </td>
                      </tr>
                      <tr style="background-color: #f1c400; padding-top: 30px;">
                      <td style=" padding: 14px; margin-top: 30px;">
                      <p style="float: left; margin: 4px 0 0;">' . __("Call Centre:") . ' +244 923 480 978</p>
                      <img style="float: right; width: 100px;" width="200" src="' . HTTP_ROOT . 'img/emailtemp/header-logo.png" alt="">
                      </td>
                      </tr>
                      </table>
                      </div>';
                } else {
                    if ($ori_dat->country == "Angola" && $desti_dat->country == "Angola") {

                        $service_fee1 = $servicefee->domestic * $share_data->passengers;
                        $total_peice = $service_fee1 + ($price1 * $share_data->passengers);
                    } else {
                        $service_fee1 = $servicefee->international * $share_data->passengers;
                        $total_peice = $service_fee1 + ($price1 * $share_data->passengers);
                    }
                    $message = '<style type="text/css">
                      {
                      font-family: Arial, Helvetica, sans-serif;
                      }
                      </style>
                      <div class="email-templ" style="width: 600px; margin: 0 auto;">
                      <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                      <tr style="background-color: #f1c400;">
                      <td style="text-align: center; padding:10px 0;">
                      <img width="200" src="' . HTTP_ROOT . 'img/emailtemp/header-logo.png" alt="">
                      <h4 style="font-size: 18px; margin-top: 14px; margin-bottom: 0;">' . __("Get Your Travel Started") . '</h4>
                      </td>
                      </tr>
                      <tr>
                      <td style=" padding: 10px 15px;">
                      <p>' . __("Hi,") . ' </p>
                      <p>' . __("Check out the ticket information below for your next trip.") . '</p>
                      <p>' . __("Buy this ticket as soon as you can or else you will miss this opportunity.") . '</p>
                      </td>
                      </tr>
                      <tr>
                      <td style="background: #b0adadcc; padding: 7px 16px;">
                      <div style="float: left;">
                      <img style="float: left;" src="' . HTTP_ROOT . 'img/emailtemp/plain-icon2.png" alt="">
                      <h4 style="float:left; margin:12px 0 0 15px; ">Depart</h4>
                      </div>
                      <div style="float: right;">
                      <h4 style="margin: 13px 0 0 0;">' . __($share_data->cabin) . '</h4>
                      </div>
                      </td>
                      </tr>
                      <tr>
                      <td>
                      <div style="float: left; width: 17%;">
                      <p><strong style="margin-bottom: 10px; display: inline-block;">' . __($dep_dtim->format('l')) . '</strong><br>' . __($dep_dtim->format('d M, Y')) . '</p>
                      </div>
                      <div style="float: right; width: 76%; border-left: 1px solid #ccc; padding-left: 26px;">
                      <ul style="list-style-type: none;float: left; width: 100%; padding: 0;">
                      <li style="float: left; width: 25%">
                      <p style=" margin:5px 0; font-size: 15px;">' . __($dep_dtim->format('h:i A')) . '</p>
                      <h5 style="margin: 0; font-size: 18px;">' . __($ori_dat->city) . '</h5>
                      <p style=" margin:5px 0; font-size: 15px;">' . __($ori_dat->country) . '</p>
                      </li>
                      <li style="float: left; width: 25%; text-align: center; padding-top: 25px;"><img style="width: 50px;" src="' . HTTP_ROOT . 'img/emailtemp/plain-icon-2.png" alt=""></li>
                      <li style="float: left; width: 25%">
                      <p style=" margin:5px 0; font-size: 15px;">' . __($dep_arr_dtim->format('h:i A')) . '</p>
                      <h5 style="margin: 0; font-size: 18px;">' . __($desti_dat->city) . '</h5>
                      <p style=" margin:5px 0; font-size: 15px;">' . __($desti_dat->country) . '</p>
                      </li>
                      </ul>
                      <ul style="float: left; width: 100%; padding: 0; list-style-type: none;">
                      <li style="float: left;">
                      <img style="width:45px;" src="' . $img_dat1 . '" alt="">
                      <p style="font-size: 15px;">' . __($share_data->start_d_airline_name) . '-' . __($share_data->start_d_airline_num) . '</p>
                      </li>
                      <li style=" float: right; width: 80%;">
                      <h5 style="margin-top: 0; font-size: 18px; margin-bottom: 10px;">' . __($dep_dtim->diff($dep_arr_dtim)->format('%d d %H h %i m')) . '</h5>
                      <p style="font-size: 15px; margin: 0;">Operated by: ' . __($this->flightName[$share_data->start_d_airline_name]) . '</p>
                      </li>
                      </ul>

                      </div>
                      </td>
                      </tr>


                      <td style="border-top: 1px solid #ccc;">
                      <ul style="padding: 0; margin: 20px 0 0 0; float: left; width: 100%; list-style-type: none;">
                      <li style="float: left; width: 100%; border-bottom: 1px solid #ccc; padding: 20px 0;"><h3 style="float: left; margin: 0;">Fare Summary</h3> <span style="float: right;">' . $share_data->passengers . __("Passenger") . '</span></li>
                      <li style="float: left; width: 100%; border-bottom: 1px solid #ccc; padding: 20px 0;"><p style=" margin: 0; float: left;">' . __("Air Transportation Charges") . ' </p><span style="float: right;"> ' . number_format((($price1) * $share_data->passengers), 2) . ' AOA</span></li>
                      <li style="float: left; width: 100%; border-bottom: 1px solid #ccc; padding: 20px 0;"><p style="margin: 0; float: left;">' . __("Taxes, Fees and Chages") . ' </p><span style="float: right;"> ' . number_format($service_fee1, 2) . ' AOA</span></li>
                      <li style="float: left; width: 100%; padding: 20px 0;"><p style="margin: 0; float: left; font-weight: bold;">' . __("GRAND TOTAL") . ' </p><span style="float: right; font-weight: bold;">' . number_format($total_peice, 2) . ' AOA</span></li>
                      </ul>
                      </td>
                      </tr>
                      <tr>
                      <td style="padding-bottom: 30px;">
                      <a style="float: left; background: #ccc; padding: 17px 20px; color: #000; text-decoration: none;" href="#">' . __("Prices and availability are subject to change") . '</a>
                      <a style="float: right; padding: 17px 32px; text-decoration:none; background: #f1c400; color: #000; text-transform: uppercase; font-size: 15px;" href="' . HTTP_ROOT . 'route-review/' . $xcidf . '/share">' . __("Book Now") . '</a>
                      </td>
                      </tr>
                      <tr style="background-color: #f1c400; padding-top: 30px;">
                      <td style=" padding: 14px; margin-top: 30px;">
                      <p style="float: left; margin: 4px 0 0;">' . __("Call Centre") . ': +244 923 480 978</p>
                      <img style="float: right; width: 100px;" width="200" src="' . HTTP_ROOT . 'img/emailtemp/header-logo.png" alt="">
                      </td>
                      </tr>
                      </table>
                      </div>';
                }

                $this->Custom->sendEmail($to, $from, $subject, $message);
                $this->Custom->sendEmail($to1, $from, $subject, $message);
            }
        }
        echo json_encode(array('status' => $message));
        exit;
    }

    public function myPassengers($id = null) {

    }

    public function itineraryPdf($id = null) {
        $this->viewBuilder()->layout('');
        $bookingdetails = $this->UserBookDetails->find('all')->where(['id' => $id])->first();
        $fullbookingdetails = $this->UserFullBookingDetails->find('all')->where(['refid' => $id]);

        $userdetails = $this->UserDetails->find('all')->where(['user_id' => $bookingdetails->user_id])->first();
        $usermail = $this->Users->find('all')->where(['id' => $bookingdetails->user_id])->first();

        $this->set(compact('bookingdetails', 'passangerdetails', 'userdetails', 'usermail', 'fullbookingdetails'));
        $todatDate = date('d-m-Y');
        if (!file_exists($todatDate)) {
            mkdir(FILES . 'ITENERARY/' . $todatDate, 0777, true);
            chmod(FILES . 'ITENERARY/' . $todatDate, 0777);
            $mailfol = FILES . 'ITENERARY/' . $todatDate . '/' . $usermail->email;
            if (!file_exists($mailfol)) {
                mkdir($mailfol, 0777, true);
                chmod($mailfol, 0777);
            }
        } else {
            $mailfol = FILES . 'ITENERARY/' . $todatDate . '/' . $usermail->email;
            if (!file_exists($mailfol)) {
                mkdir($mailfol, 0777, true);
                chmod($mailfol, 0777);
            }
        }
        if (true) {
// initializing mPDF
            $this->Mpdf->init();
// setting filename of output pdf file
            $this->Mpdf->setFilename($mailfol . '/' . 'itinerary.pdf');
// setting output to I, D, F, S
            $this->Mpdf->setOutput('F');
// you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function invoicePdf($id = null) {
        $this->viewBuilder()->layout('');
        $bookingdetails = $this->UserBookDetails->find('all')->where(['id' => $id])->first();
        $passangerdetails = $this->PassengerDetails->find('all')->where(['booking_details_ref' => $id]);
        $userdetails = $this->UserDetails->find('all')->where(['user_id' => $bookingdetails->user_id])->first();
        $usermail = $this->Users->find('all')->where(['id' => $bookingdetails->user_id])->first();

        $this->set(compact('bookingdetails', 'passangerdetails', 'userdetails', 'usermail'));


        $todatDate = date('d-m-Y');

        if (!file_exists($todatDate)) {
            mkdir(FILES . 'INVOICE/' . $todatDate, 0777, true);
            chmod(FILES . 'INVOICE/' . $todatDate, 0777);
            $mailfol = FILES . 'INVOICE/' . $todatDate . '/' . $usermail->email;
            if (!file_exists($mailfol)) {
                mkdir($mailfol, 0777, true);
                chmod($mailfol, 0777);
            }
        } else {
            $mailfol = FILES . 'INVOICE/' . $todatDate . '/' . $usermail->email;
            if (!file_exists($mailfol)) {
                mkdir($mailfol, 0777, true);
                chmod($mailfol, 0777);
            }
        }
        if (true) {
// initializing mPDF
            $this->Mpdf->init();
// setting filename of output pdf file
            $this->Mpdf->setFilename($mailfol . '/' . 'invoice.pdf');
// setting output to I, D, F, S
            $this->Mpdf->setOutput('F');
// you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function mailtests() {
        $LAN = $this->request->session()->read("lan");
        if ($LAN == "PT") {
            $valuez = "value_PT";
        } else if ($LAN == "FR") {
            $valuez = "value_FR";
        } else {
            $valuez = "value";
        }
        $this->loadModel('Settings');
        $emailTemp = $this->Settings->find('all')->where(['Settings.name' => 'WELCOME_EMAIL']);
        $emailTemplate = $emailTemp->first();
        $to = "debmicrofinet@gmail.com";
        $subject = $emailTemplate->display;
        $link = "HTTP_ROOT . 'users/confirm/' . $user->unique_id";
        $name = "Name";
        $message = $this->Custom->formatUserRegister($emailTemplate->$valuez, $name, $link);
        echo $message;

        $this->Custom->sendEmail($to, $from, $subject, $message);
        exit;
    }

    public function previewPrivate($id = null) {
        $this->viewBuilder()->layout('default');


        $this->ExtranetsUserProperty->hasOne('location', ['className' => 'ExtranetsUserPropertyLocation', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('pricing', ['className' => 'ExtranetsUserPropertyPricing', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('availability', ['className' => 'ExtranetsUserPropertyAvailability', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('amenities', ['className' => 'ExtranetsUserPropertyAmenities', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasMany('beds', ['className' => 'ExtranetsUserPropertyBed', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasMany('photos', ['className' => 'ExtranetsUserPropertyPhotos', 'foreignKey' => 'property_id']);
        $result_property = $this->ExtranetsUserProperty->find('all')->contain(['availability', 'location', 'pricing', 'description', 'beds', 'amenities', 'photos'])->where(['ExtranetsUserProperty.id IN' => $id])->first();
        //pj($result_property);
        $city = @$_GET['from_location_name'];
        $country = $this->HotelCountryCitys->find('all')->where(['id' => @$_GET['state-name']])->first()->country_name;


        $pageDetails = new \stdClass();
        $city = @$_GET['from_location_name'];
        $country = $this->HotelCountryCitys->find('all')->where(['id' => @$_GET['state-name']])->first()->country_name;
        $pageDetails->meta_title = $result_property->description->propertyName . ' | Alegro';
        $pageDetails->meta_keyword = '';
        $pageDetails->meta_desc = '';
        $proper_loc = $this->ExtranetsUserPropertyLocation->find('all')->where(['property_id' => $id])->first();


        $this->set(compact('pageDetails', 'result_property', 'city', 'country', 'id', 'proper_loc'));
    }

    public function previewEntire($id = null) {
        $this->viewBuilder()->layout('default');


        $this->ExtranetsUserProperty->hasOne('location', ['className' => 'ExtranetsUserPropertyLocation', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('pricing', ['className' => 'ExtranetsUserPropertyPricing', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('availability', ['className' => 'ExtranetsUserPropertyAvailability', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('amenities', ['className' => 'ExtranetsUserPropertyAmenities', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasMany('beds', ['className' => 'ExtranetsUserPropertyBed', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasMany('photos', ['className' => 'ExtranetsUserPropertyPhotos', 'foreignKey' => 'property_id']);
        $result_property = $this->ExtranetsUserProperty->find('all')->contain(['availability', 'location', 'pricing', 'description', 'beds', 'amenities', 'photos'])->where(['ExtranetsUserProperty.id IN' => $id])->first();
        //pj($result_property);
        $city = @$_GET['from_location_name'];
        $country = $this->HotelCountryCitys->find('all')->where(['id' => @$_GET['state-name']])->first()->country_name;


        $pageDetails = new \stdClass();
        $city = @$_GET['from_location_name'];
        $country = $this->HotelCountryCitys->find('all')->where(['id' => @$_GET['state-name']])->first()->country_name;
        $pageDetails->meta_title = $result_property->description->propertyName . ' | Alegro';
        $pageDetails->meta_keyword = '';
        $pageDetails->meta_desc = '';
        $proper_loc = $this->ExtranetsUserPropertyLocation->find('all')->where(['property_id' => $id])->first();


        $this->set(compact('pageDetails', 'result_property', 'city', 'country', 'id', 'proper_loc'));
    }

    public function paylocal($id = null) {
        $user_id = $_COOKIE['user__id'];

        if (!empty($id)) {
            $RmDet = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => (int) $id])->first();
            $this->ExtranetsUserProperty->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);
            $this->ExtranetsUserProperty->hasMany('photos', ['className' => 'ExtranetsUserPropertyPhotos', 'foreignKey' => 'property_id']);
            $PrtDt = $this->ExtranetsUserProperty->find('all')->contain(['description', 'photos'])->where(['ExtranetsUserProperty.id' => $RmDet->property_id])->first();
        }
        if ($this->request->is('post')) {
            $dats = $this->request->data();
            $roomBookedUser = '';
            for ($ctr = 1; $ctr <= $dats['num_rooms']; $ctr++) {
                $roomBookedUser .= '<tr style="padding-bottom:20px;color:#666666; font-family:\'Open Sans\', Helvetica, Arial, sans-serif; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none;"><td>Room' . $ctr . ' </td><td>' . $dats['fnm'][$ctr - 1] . " " . $dats['lnm'][$ctr - 1] . '</td></tr>';
            }
            $roomBookedUser .= '<tr><td><hr></td><td><hr></td></tr><tr style="padding-bottom:20px;color:#666666; font-family:\'Open Sans\', Helvetica, Arial, sans-serif; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none;"><td></td><td>Room Fee : $' . $dats['total_room_fee'] . '</td></tr><tr style="padding-bottom:20px;color:#666666; font-family:\'Open Sans\', Helvetica, Arial, sans-serif; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none;"><td></td><td>Total taxs : $' . $dats['total_tax'] . '</td></tr><tr style="padding-bottom:20px;color:#666666; font-family:\'Open Sans\', Helvetica, Arial, sans-serif; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none;"><td></td><td>Total cost : $' . $dats['total_cost'] . '</td></tr>';
            $refer_idd = '';
            $process_id = '';
            $transaction_id = '';

            $newR = $this->HotelBookingDetails->newEntity();
            $newR->user_id = $user_id;

            $newR->payment_details = json_encode($ss);
            $newR->refer_id = $refer_idd;
            $newR->process_id = $process_id;
            $newR->transaction_id = $transaction_id;
            $newR->end_datetime = '';

            $newR->numb_rooms = $dats['num_rooms'];
            $newR->room_fnm = json_encode($dats['fnm']);
            $newR->room_lnm = json_encode($dats['lnm']);

            $newR->total_room_fee = $dats['total_room_fee'];
            $newR->total_tax = $dats['total_tax'];
            $newR->total_cost = $dats['total_cost'];
            $newR->user_firstname = $dats['firstname'];
            $newR->user_lastname = $dats['lastname'];
            $newR->cancel_policy = $dats['cancel_policy'];
            $newR->service_fee = $dats['service_fee'];
            $newR->service_fee_type = $dats['service_fee_type'];
            $newR->location = $dats['location_state'];
            $newR->payment_method = "No Alojamento";
            $newR->payment_status = 6;

            $newR->phone = $dats['mobile'];
            $newR->email = $dats['email'];


            $newR->check_in = $dats['htl_chk_in'];
            $newR->check_out = $dats['htl_chk_out'];
            $newR->booking_dt = date('Y-m-d');
            $newR->property_checkout_time = $PrtDt->description->checkout;


            $newR->property_user_id = $PrtDt->user_id;
            $newR->property_id = $PrtDt->id;
            $newR->booking_no = 'ALEX';

            $newR->room_id = $id;
            $gt_htl_id = $this->HotelBookingDetails->save($newR);


            $rm_ct = $RmDet->room_count - $gt_htl_id->numb_rooms;
            $rm_ct = ($rm_ct <= 0) ? 0 : $rm_ct;
            //$this->ExtranetsUserPropertyBed->updateAll(['room_count' => $rm_ct], ['id' => $id]);


            $bokNum = 'ALEX' . str_pad($this->HotelBookingDetails->find('all')->max('id')->id, 5, '0', STR_PAD_LEFT);
            $this->HotelBookingDetails->updateAll(['booking_no' => $bokNum], ['id' => $gt_htl_id->id]);

            //$to = 'debmicrofinet@gmail.com';
            $to = $dats['email'];
            $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $from = $fromvalue->value;
            $subject = __('Order On-Hold');
            $headerBg = HTTP_ROOT . 'img/bg-1.png';

            $LAN = $this->request->session()->read("lan");
            if ($LAN == "PT") {
                $valuez = "value_PT";
                $subject = "Ordem Aprovada";
            } else if ($LAN == "FR") {
                $valuez = "value_FR";
                $subject = 'Commande Approuvée';
            } else {
                $valuez = "value";
                $subject = 'Approved Order';
            }
            $linkH = new UserHelper(new \Cake\View\View());
            $htl_booking_details_email = $this->HotelBookingDetails->find('all')->where(['id' => $gt_htl_id->id])->first();

            $this->ExtranetsUserProperty->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);
            $propertyD_email = $this->ExtranetsUserProperty->find('all')->contain(['description'])->where(['ExtranetsUserProperty.id IN' => $htl_booking_details_email->property_id])->first();
            $guests = count(json_decode($htl_booking_details_email->room_fnm)) . __('Guests');
            $guest = count(json_decode($htl_booking_details_email->room_fnm));
            $hotel_guest = ' <i class="fas fa-users"></i> ' . $linkH->propertyPeople($htl_booking_details_email->property_id, $guest);
            $hotel_size = $propertyD_email->property_size;

            $getBetDetails = $linkH->propertyBedCount($htl_booking_details_email->property_id, $guest);


            $bedss = $getBetDetails->num_bed . 'x' . ' ' . __($getBetDetails->beds);
            foreach ($getBetDetails->extranets_user_property_sub_beds as $bes) {
                $bedss .= " + " . $bes->num_beds . 'x' . ' ' . __($bes->beds);
            }
            $hotel_rooms = '<i class="fas fa-bed"></i> ' . $bedss;
            $aminity = $linkH->propertyAmenitiesRoom($htl_booking_details_email->room_id);
            $aminityx = [];
            $geta = json_decode($aminity);
            $i = 1;
            foreach ($geta as $daee) {
                $aminityx[] = __($daee);
                if ($i++ == 3)
                    break;
            }

            $aminity = implode(', ', $aminityx);
            $price_night = $linkH->changeFormat(number_format($linkH->getRoomPrice($htl_booking_details_email->room_id, $guest), 2));
            $price_total = $linkH->changeFormat(number_format($htl_booking_details_email->total_cost, 2));
            $total_night = $linkH->timeago(date_format($htl_booking_details_email->check_in, 'Y-m-d'), date_format($htl_booking_details_email->check_out, 'Y-m-d'));
            $chk_in = date_format($htl_booking_details_email->check_in, 'd M Y');
            $chk_out = date_format($htl_booking_details_email->check_out, 'd M Y');
            $room_num = $htl_booking_details_email->numb_rooms;
            $room_type = __($RmDet->bed_name); //$propertyD_email->property_type;
            $pro_img = HTTP_ROOT . 'img/pro_pic/' . $linkH->getHotelImage($htl_booking_details_email->property_id);
            $review = $linkH->reviewCount($htl_booking_details_email->property_id);
            $rating = $linkH->totalRating($htl_booking_details_email->property_id);

            if ($propertyD_email->description->rating >= 4) {
                $qlt = '<h5 style="background-color:#8bc34a !important;font-size: 14px;color: #000 !important;margin-top: 0px;
                            margin-bottom: 0px;text-transform: capitalize;text-align: center;padding: 10px 0 8px;
                            border-radius: 3px;font-weight: 600;width:85%;font-family: Open Sans, sans-serif;"><span>' . __('High Quality') . '</span></h5>';
            } else if ($propertyD_email->description->rating >= 3) {
                $qlt = '<h5 style="background-color: #ffc107 !important;font-size: 14px;color: #000 !important;margin-top: 0px;
                            margin-bottom: 0px;text-transform: capitalize;text-align: center;padding: 10px 0 8px;
                            border-radius: 3px;font-weight: 600;width:85%;font-family: Open Sans, sans-serif;"><span>' . __('Medium Quality') . '</span></h5>';
            } else if ($propertyD_email->description->rating <= 2) {
                $qlt = '<h5 style="background-color: #f44336 !important;font-size: 14px;color: #000 !important;margin-top: 0px;
                            margin-bottom: 0px;text-transform: capitalize;text-align: center;padding: 10px 0 8px;
                            border-radius: 3px;font-weight: 600;width:85%;font-family: Open Sans, sans-serif;"><span>' . __('Low Quality') . ' </span></h5>';
            }
            $refId = $htl_booking_details_email->refer_id;
            $book_link = HTTP_ROOT . 'thank_you_hotel_order/' . $htl_booking_details_email->room_id . '/' . $htl_booking_details_email->property_id . '/' . $htl_booking_details_email->id;

            $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'APPROVED_HOTEL_BOOKING'])->first();
            $message = $this->Custom->bookingPending($emailTemplate->$valuez, date_format($htl_booking_details_email->booking_dt, 'd M Y'), $htl_booking_details_email->booking_no, $propertyD_email->description->propertyName, $hotel_size, $hotel_guest, $hotel_rooms, $aminity, $price_night, $price_total, $total_night, $guest, $chk_in, $chk_out, $room_num, $room_type, $qlt, $refId, $book_link, $pro_img, $review, $rating);




            $this->Custom->sendEmail($to, $from, $subject, $message);
            return $this->redirect(HTTP_ROOT . 'thank_you_at_hotel_order/' . $id . '/' . $RmDet->property_id . '/' . $gt_htl_id->id . '?' . $dats['qury_tri']);
        }

        exit;
    }

    public function booking($id = null) {


        if (!empty($id)) {
            $RmDet = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => (int) $id])->first();

            //$this->ExtranetsUserProperty->hasMany('photos', ['className' => 'ExtranetsUserPropertyPhotos', 'foreignKey' => 'property_id']);
            $this->ExtranetsUserProperty->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);
            $this->ExtranetsUserProperty->hasMany('photos', ['className' => 'ExtranetsUserPropertyPhotos', 'foreignKey' => 'property_id']);
            $PrtDt = $this->ExtranetsUserProperty->find('all')->contain(['description', 'photos'])->where(['ExtranetsUserProperty.id' => $RmDet->property_id])->first();

//            $propertyFee = $this->FeaturedServiceFee->find('all')->where(['property_id' => $RmDet->property_id])->first();
//            $propertyFee_count = $this->FeaturedServiceFee->find('all')->where(['property_id' => $RmDet->property_id])->count();
//            $propertyFee1 = $this->HotelServiceFee->find('all')->where(['id' => 1])->first();
        }


        $city = @$_GET['from_location_name'];
        @$country = $this->HotelCountryCitys->find('all')->where(['id' => @$_GET['state-name']])->first()->country_name;


        $pageDetails = new \stdClass();
        $city = @$_GET['from_location_name'];
        @$country = $this->HotelCountryCitys->find('all')->where(['id' => @$_GET['state-name']])->first()->country_name;
        $pageDetails->meta_title = $PrtDt->description->propertyName . ' | Alegro';
        $pageDetails->meta_keyword = '';
        $pageDetails->meta_desc = '';

        if (empty($propertyFee_count)) {
            $txFee = 0; //$propertyFee1->fee;
        } else {
            $txFee = 0; //$propertyFee->featured_fee;
        }
        $refer_idd = time() . rand(11, 999);
        setcookie("refer_id", $refer_idd, time() + (86400 * 30), "/");

        $user_id = time() . rand(11, 33);
        setcookie("user__id", $user_id, time() + (86400 * 30), "/");
        if (!empty($this->request->session()->read('Auth.User.id'))) {
            $user_id = $this->request->session()->read('Auth.User.id');
            setcookie("user__id", $user_id, time() + (86400 * 30), "/");
        }
        if ($this->request->is('post')) {
            $dats = $this->request->data();
            $roomBookedUser = '';
            for ($ctr = 1; $ctr <= $dats['num_rooms']; $ctr++) {
                $roomBookedUser .= '<tr style="padding-bottom:20px;color:#666666; font-family:\'Open Sans\', Helvetica, Arial, sans-serif; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none;"><td>Room' . $ctr . ' </td><td>' . $dats['fnm'][$ctr - 1] . " " . $dats['lnm'][$ctr - 1] . '</td></tr>';
            }
            $roomBookedUser .= '<tr><td><hr></td><td><hr></td></tr><tr style="padding-bottom:20px;color:#666666; font-family:\'Open Sans\', Helvetica, Arial, sans-serif; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none;"><td></td><td>Room Fee : $' . $dats['total_room_fee'] . '</td></tr><tr style="padding-bottom:20px;color:#666666; font-family:\'Open Sans\', Helvetica, Arial, sans-serif; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none;"><td></td><td>Total taxs : $' . $dats['total_tax'] . '</td></tr><tr style="padding-bottom:20px;color:#666666; font-family:\'Open Sans\', Helvetica, Arial, sans-serif; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none;"><td></td><td>Total cost : $' . $dats['total_cost'] . '</td></tr>';

            $payment = [
                "reference_id" => $refer_idd,
                "amount" => $dats['total_cost'],
            ];

            $data = json_encode($payment);
            /*
              $curl = curl_init();

              $httpHeader = [
              "Authorization: " . "Token " . "w3hc7lnsj4dtuhd72ogf4bpbimj3jf44",
              "Accept: application/vnd.proxypay.v2+json",
              "Content-Type: application/json",
              "Content-Length: " . strlen($data)
              ];

              $opts = [
              CURLOPT_URL => "https://api.sandbox.proxypay.co.ao/payments",
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTPHEADER => $httpHeader,
              CURLOPT_POSTFIELDS => $data
              ];

              curl_setopt_array($curl, $opts);

              $response = curl_exec($curl);
              $err = curl_error($curl);
              // echo $response;
              // echo $err;
              $ss = json_decode($response);
              // echo "<br>" . ($ss->id);
              // print_r($err);

              curl_close($curl);
             */


            $curl = curl_init();

            $httpHeader = [
                "Authorization: " . "Token " . "w3hc7lnsj4dtuhd72ogf4bpbimj3jf44",
                "Accept: application/vnd.proxypay.v2+json",
            ];

            $opts = [
                CURLOPT_URL => "https://api.sandbox.proxypay.co.ao/reference_ids",
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTPHEADER => $httpHeader
            ];

            curl_setopt_array($curl, $opts);

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            $refer_idd = $response;
            $period_end_datetime = date('c', strtotime(date('Y-m-d H:i', strtotime('+4 hour +00 minutes'))));
            //echo date('Y-m-d H:i');


            $reference1 = [
                "amount" => $dats['total_cost'],
                "end_datetime" => $period_end_datetime,
            ];

            $data = json_encode($reference1);

            $curl1 = curl_init();

            $httpHeader1 = [
                "Authorization: " . "Token " . "w3hc7lnsj4dtuhd72ogf4bpbimj3jf44",
                "Accept: application/vnd.proxypay.v2+json",
                "Content-Type: application/json",
                "Content-Length: " . strlen($data)
            ];

            $opts1 = [
                CURLOPT_URL => "https://api.sandbox.proxypay.co.ao/references/$refer_idd",
                CURLOPT_CUSTOMREQUEST => "PUT",
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTPHEADER => $httpHeader1,
                CURLOPT_POSTFIELDS => $data
            ];

            curl_setopt_array($curl1, $opts1);

            $response1 = curl_exec($curl1);
            $err1 = curl_error($curl1);

            curl_close($curl1);

            if (!empty($refer_idd)) {

                $process_id = $refer_idd;
                $transaction_id = '';

                $newR = $this->HotelBookingDetails->newEntity();
                $newR->user_id = $user_id;

                $newR->payment_details = json_encode($ss);
                $newR->refer_id = $refer_idd;
                $newR->process_id = $process_id;
                $newR->transaction_id = $transaction_id;
                $newR->end_datetime = $period_end_datetime;

                $newR->numb_rooms = $dats['num_rooms'];
                $newR->room_fnm = json_encode($dats['fnm']);
                $newR->room_lnm = json_encode($dats['lnm']);

                $newR->total_room_fee = $dats['total_room_fee'];
                $newR->total_tax = $dats['total_tax'];
                $newR->total_cost = $dats['total_cost'];
                $newR->user_firstname = $dats['firstname'];
                $newR->user_lastname = $dats['lastname'];
                $newR->cancel_policy = $dats['cancel_policy'];
                $newR->service_fee = $dats['service_fee'];
                $newR->service_fee_type = $dats['service_fee_type'];
                $newR->location = $dats['location_state'];
                $newR->payment_method = "MultiCaixa";

                $newR->phone = $dats['mobile'];
                $newR->email = $dats['email'];


                $newR->check_in = $dats['htl_chk_in'];
                $newR->check_out = $dats['htl_chk_out'];
                $newR->booking_dt = date('Y-m-d');
                $newR->property_checkout_time = $PrtDt->description->checkout;


                $newR->property_user_id = $PrtDt->user_id;
                $newR->property_id = $PrtDt->id;
                $newR->booking_no = 'ALEX';

                $newR->room_id = $id;
                $gt_htl_id = $this->HotelBookingDetails->save($newR);


                $rm_ct = $RmDet->room_count - $gt_htl_id->numb_rooms;
                $rm_ct = ($rm_ct <= 0) ? 0 : $rm_ct;
                //$this->ExtranetsUserPropertyBed->updateAll(['room_count' => $rm_ct], ['id' => $id]);


                $bokNum = 'ALEX' . str_pad($this->HotelBookingDetails->find('all')->max('id')->id, 5, '0', STR_PAD_LEFT);
                $this->HotelBookingDetails->updateAll(['booking_no' => $bokNum], ['id' => $gt_htl_id->id]);

                //$to = 'debmicrofinet@gmail.com';
                $to = $dats['email'];
                $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                $from = $fromvalue->value;
                $subject = __('Order On-Hold');
                $headerBg = HTTP_ROOT . 'img/bg-1.png';

                $LAN = $this->request->session()->read("lan");
                if ($LAN == "PT") {
                    $valuez = "value_PT";
                    $subject = "Ordem Pendente";
                } else if ($LAN == "FR") {
                    $valuez = "value_FR";
                    $subject = 'Commande en Attente';
                } else {
                    $valuez = "value";
                    $subject = 'Order On-Hold';
                }
                $linkH = new UserHelper(new \Cake\View\View());
                $htl_booking_details_email = $this->HotelBookingDetails->find('all')->where(['id' => $gt_htl_id->id])->first();

                $this->ExtranetsUserProperty->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);
                $propertyD_email = $this->ExtranetsUserProperty->find('all')->contain(['description'])->where(['ExtranetsUserProperty.id IN' => $htl_booking_details_email->property_id])->first();
                $guests = count(json_decode($htl_booking_details_email->room_fnm)) . __('Guests');
                $guest = count(json_decode($htl_booking_details_email->room_fnm));
                $hotel_guest = ' <i class="fas fa-users"></i> ' . $linkH->propertyPeople($htl_booking_details_email->property_id, $guest);
                $hotel_size = $propertyD_email->property_size;

                $getBetDetails = $linkH->propertyBedCount($htl_booking_details_email->property_id, $guest);


                $bedss = $getBetDetails->num_bed . 'x' . ' ' . __($getBetDetails->beds);
                foreach ($getBetDetails->extranets_user_property_sub_beds as $bes) {
                    $bedss .= " + " . $bes->num_beds . 'x' . ' ' . __($bes->beds);
                }
                $hotel_rooms = '<i class="fas fa-bed"></i> ' . $bedss;
                $aminity = $linkH->propertyAmenitiesRoom($htl_booking_details_email->room_id);
                $aminityx = [];
                $geta = json_decode($aminity);
                $i = 1;
                foreach ($geta as $daee) {
                    $aminityx[] = __($daee);
                    if ($i++ == 3)
                        break;
                }

                $aminity = implode(', ', $aminityx);
                $price_night = $linkH->changeFormat(number_format($linkH->getRoomPrice($htl_booking_details_email->room_id, $guest), 2));
                $price_total = $linkH->changeFormat(number_format($htl_booking_details_email->total_cost, 2));
                $total_night = $linkH->timeago(date_format($htl_booking_details_email->check_in, 'Y-m-d'), date_format($htl_booking_details_email->check_out, 'Y-m-d'));
                $chk_in = date_format($htl_booking_details_email->check_in, 'd M Y');
                $chk_out = date_format($htl_booking_details_email->check_out, 'd M Y');
                $room_num = $htl_booking_details_email->numb_rooms;
                $room_type = __($RmDet->bed_name); //$propertyD_email->property_type;
                $pro_img = HTTP_ROOT . 'img/pro_pic/' . $linkH->getHotelImage($htl_booking_details_email->property_id);
                $review = $linkH->reviewCount($htl_booking_details_email->property_id);
                $rating = $linkH->totalRating($htl_booking_details_email->property_id);

                if ($propertyD_email->description->rating >= 4) {
                    $qlt = '<h5 style="background-color:#8bc34a !important;font-size: 14px;color: #000 !important;margin-top: 0px;
                            margin-bottom: 0px;text-transform: capitalize;text-align: center;padding: 10px 0 8px;
                            border-radius: 3px;font-weight: 600;width:85%;font-family: Open Sans, sans-serif;"><span>' . __('High Quality') . '</span></h5>';
                } else if ($propertyD_email->description->rating >= 3) {
                    $qlt = '<h5 style="background-color: #ffc107 !important;font-size: 14px;color: #000 !important;margin-top: 0px;
                            margin-bottom: 0px;text-transform: capitalize;text-align: center;padding: 10px 0 8px;
                            border-radius: 3px;font-weight: 600;width:85%;font-family: Open Sans, sans-serif;"><span>' . __('Medium Quality') . '</span></h5>';
                } else if ($propertyD_email->description->rating <= 2) {
                    $qlt = '<h5 style="background-color: #f44336 !important;font-size: 14px;color: #000 !important;margin-top: 0px;
                            margin-bottom: 0px;text-transform: capitalize;text-align: center;padding: 10px 0 8px;
                            border-radius: 3px;font-weight: 600;width:85%;font-family: Open Sans, sans-serif;"><span>' . __('Low Quality') . ' </span></h5>';
                }
                $refId = $htl_booking_details_email->refer_id;
                $book_link = HTTP_ROOT . 'thank_you_hotel_order/' . $htl_booking_details_email->room_id . '/' . $htl_booking_details_email->property_id . '/' . $htl_booking_details_email->id;

                $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'PENDING_HOTEL_BOOKING'])->first();
                $message = $this->Custom->bookingPending($emailTemplate->$valuez, date_format($htl_booking_details_email->booking_dt, 'd M Y'), $htl_booking_details_email->booking_no, $propertyD_email->description->propertyName, $hotel_size, $hotel_guest, $hotel_rooms, $aminity, $price_night, $price_total, $total_night, $guest, $chk_in, $chk_out, $room_num, $room_type, $qlt, $refId, $book_link, $pro_img, $review, $rating);




                $this->Custom->sendEmail($to, $from, $subject, $message);
                return $this->redirect(HTTP_ROOT . 'thank_you_hotel_order/' . $id . '/' . $RmDet->property_id . '/' . $gt_htl_id->id . '?' . $dats['qury_tri']);
            } else {
                $this->Flash->error(__('Payment process fail'));
                return $this->redirect(HTTP_ROOT . 'booking/' . $id . '?' . $dats['qury_tri']);
            }
        }


        $this->set(compact('id', 'txFee', 'city', 'country', 'pageDetails', 'PrtDt', 'RmDet'));
    }

    function thankYouHotelOrder($room_id = null, $pro_id = null, $id = null) {

        $reff = $_COOKIE['refer_id'];
        $htl_booking_details = $this->HotelBookingDetails->find('all')->where(['id' => $id])->first();
        $room_count = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => $room_id])->first();
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 20])->first();

        $this->ExtranetsUserProperty->hasOne('location', ['className' => 'ExtranetsUserPropertyLocation', 'foreignKey' => 'property_id']);
        //$this->ExtranetsUserProperty->hasOne('pricing', ['className' => 'ExtranetsUserPropertyPricing', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('availability', ['className' => 'ExtranetsUserPropertyAvailability', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('amenities', ['className' => 'ExtranetsUserPropertyAmenities', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasMany('beds', ['className' => 'ExtranetsUserPropertyBed', 'foreignKey' => 'property_id']);

        $this->ExtranetsUserProperty->hasMany('photos', ['className' => 'ExtranetsUserPropertyPhotos', 'foreignKey' => 'property_id']);
        $propertyD = $this->ExtranetsUserProperty->find('all')->contain(['availability', 'location', 'description', 'beds', 'amenities', 'photos'])->where(['ExtranetsUserProperty.id IN' => $pro_id])->first();

        $this->set(compact('propertyD', 'reff', 'htl_booking_details', 'pro_id', 'id', 'room_id', 'pageDetails'));
    }

    function thankYouAtHotelOrder($room_id = null, $pro_id = null, $id = null) {

        $reff = $_COOKIE['refer_id'];
        $htl_booking_details = $this->HotelBookingDetails->find('all')->where(['id' => $id])->first();
        $room_count = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => $room_id])->first();
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 20])->first();

        $this->ExtranetsUserProperty->hasOne('location', ['className' => 'ExtranetsUserPropertyLocation', 'foreignKey' => 'property_id']);
        //$this->ExtranetsUserProperty->hasOne('pricing', ['className' => 'ExtranetsUserPropertyPricing', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('availability', ['className' => 'ExtranetsUserPropertyAvailability', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('description', ['className' => 'ExtranetsUserPropertyDescription', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasOne('amenities', ['className' => 'ExtranetsUserPropertyAmenities', 'foreignKey' => 'property_id']);
        $this->ExtranetsUserProperty->hasMany('beds', ['className' => 'ExtranetsUserPropertyBed', 'foreignKey' => 'property_id']);

        $this->ExtranetsUserProperty->hasMany('photos', ['className' => 'ExtranetsUserPropertyPhotos', 'foreignKey' => 'property_id']);
        $propertyD = $this->ExtranetsUserProperty->find('all')->contain(['availability', 'location', 'description', 'beds', 'amenities', 'photos'])->where(['ExtranetsUserProperty.id IN' => $pro_id])->first();

        $this->set(compact('propertyD', 'reff', 'htl_booking_details', 'pro_id', 'id', 'room_id', 'pageDetails'));
    }

    public function order($id = null) {
        $this->viewBuilder()->layout('default');

        $refer_idd = time() . rand(11, 999);
        setcookie("refer_id", $refer_idd, time() + (86400 * 30), "/");
        if ($this->request->is('post')) {
            $dats = $this->request->data();
            $this->request->session()->write('bookinginfoS', $dats);
        }
        $user = $this->Users->newEntity();
        $paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        //$paypal_url = 'https://www.paypal.com/cgi-bin/webscr';
        //Here we can used seller email id.
        $merchant_email = 'prusty.abhimanyu-facilitator@gmail.com';
        //here we can put cancle url when payment is not completed.
        $cancel_return = "http://" . $_SERVER['HTTP_HOST'] . '/paypal-ipn-php';
        //here we can put cancle url when payment is Successful.
        $success_return = HTTP_ROOT . 'thank_you_hotel_order/' . $id;
        //paypal call this file for ipn
        $notify_url = HTTP_ROOT . "users/paypal_process";

        $this->set(compact('paypal_url', 'merchant_email', 'cancel_return', 'success_return', 'notify_url', 'dats', 'refer_idd', 'id'));
    }

    public function paypalProcess($order_id = null) {
        $email = 'debmicrofinet@gmail.com';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <devtest@microfinet.com>' . "\r\n";
        $headers .= 'Cc: devtest@microfinet.com' . "\r\n";

        $p = new paypal_class();
        if (empty($_GET['action']))
            $_GET['action'] = 'process';
        switch ($_GET['action']) {
            case 'ipn':
                mail($email, "ipn", "success", $headers);
                break;
            case 'success':
                mail($email, "success", "success", $headers);
                break;
            case 'cancel':
                mail($email, "cancel", "cancel", $headers);
                break;
            case 'process':
                if ($p->validate_ipn()) {

                    // $or = $_REQUEST['item_name'];
                    $or = $order_id;
                    mail($email, "process", "process", $headers);
                }

                break;
        }
        exit;
    }

    public function hotelAjaxReview() {
        $this->viewBuilder()->layout('ajax');

        $data = $this->request->data;
        $result_propertyId = $data['propertyId'];
        $short = $data['short'];

        $this->set(compact('result_propertyId', 'short'));
    }

    public function testMailfun() {
        $LAN = $this->request->session()->read("lan");
        if ($LAN == "PT") {
            $valuez = "value_PT";
            $subject = "Order Complete 1";
        } else if ($LAN == "FR") {
            $valuez = "value_FR";
            $subject = "Order Complete 2";
        } else {
            $valuez = "value";
            $subject = "Order Complete 3";
        }

        $to = 'debmicrofinet@gmail.com';
        $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
        $from = $fromvalue->value;
        $emailTemplate = $this->Settings->find('all')->where(['name' => 'HOTEL_BOOKING_ITINERARY'])->first();
        $message = $this->Custom->format_htl_bok_ite($emailTemplate->$valuez);
        $this->Custom->sendEmail($to, $from, $subject, $message);
        exit();
    }

    public function hotelBookingPdf($id = null) {
        $this->viewBuilder()->layout('');

        $bookingdetails = $this->HotelBookingDetails->find('all')->where(['id' => $id])->first();
        $room_name = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => $bookingdetails->room_id])->first()->bed_name;
        $property_id = $bookingdetails->property_id;
        $property_bed = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => $bookingdetails->room_id])->first();
        $property_user = $this->UserDetails->find('all')->where(['user_id' => $bookingdetails->property_user_id])->first();
        $this->set(compact('bookingdetails', 'property_id', 'room_name', 'property_user', 'property_bed'));

        $todatDate = date_format($bookingdetails->booking_dt, 'd-m-Y');
        $email = $bookingdetails->email;

        if (!file_exists(FILES . 'HOTEL_BOOKED/' . $todatDate)) {
            mkdir(FILES . 'HOTEL_BOOKED/' . $todatDate, 0777, true);
            chmod(FILES . 'HOTEL_BOOKED/' . $todatDate, 0777);
            $mailfol = FILES . 'HOTEL_BOOKED/' . $todatDate . '/' . $email;
            if (!file_exists($mailfol)) {
                mkdir($mailfol, 0777, true);
                chmod($mailfol, 0777);
            }
        } else {
            $mailfol = FILES . 'HOTEL_BOOKED/' . $todatDate . '/' . $email;
            if (!file_exists($mailfol)) {
                mkdir($mailfol, 0777, true);
                chmod($mailfol, 0777);
            }
        }

        if (true) {
            // initializing mPDF
            $this->Mpdf->init();
            // setting filename of output pdf file
            $this->Mpdf->setFilename($mailfol . '/' . 'itinerary.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('F');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function hotelInvoicePdf($id) {
        $this->viewBuilder()->layout('');
        $bookingdetails = $this->HotelBookingDetails->find('all')->where(['id' => $id])->first();
        $room_name = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => $bookingdetails->room_id])->first()->bed_name;
        $property_id = $bookingdetails->property_id;
        $this->set(compact('bookingdetails', 'property_id', 'room_name'));
        //
        $todatDate = date_format($bookingdetails->booking_dt, 'd-m-Y');
        $email = $bookingdetails->email;

        if (!file_exists(FILES . 'HOTEL_BOOKED_INVOICE/' . $todatDate)) {
            mkdir(FILES . 'HOTEL_BOOKED_INVOICE/' . $todatDate, 0777, true);
            chmod(FILES . 'HOTEL_BOOKED_INVOICE/' . $todatDate, 0777);
            $mailfol = FILES . 'HOTEL_BOOKED_INVOICE/' . $todatDate . '/' . $email;
            if (!file_exists($mailfol)) {
                mkdir($mailfol, 0777, true);
                chmod($mailfol, 0777);
            }
        } else {
            $mailfol = FILES . 'HOTEL_BOOKED_INVOICE/' . $todatDate . '/' . $email;
            if (!file_exists($mailfol)) {
                mkdir($mailfol, 0777, true);
                chmod($mailfol, 0777);
            }
        }

        if (true) {
            // initializing mPDF
            $this->Mpdf->init();
            // setting filename of output pdf file
            $this->Mpdf->setFilename($mailfol . '/' . 'invoice.pdf');
            // setting output to I, D, F, S
            $this->Mpdf->setOutput('F');
            // you can call any mPDF method via component, for example:
            $this->Mpdf->SetWatermarkText("Draft");
        }
    }

    public function getItinerary($id = null) {
        $this->viewBuilder()->layout('ajax');
        $bookingdetails = $this->HotelBookingDetails->find('all')->where(['id' => $id])->first();

        $todatDate = date_format($bookingdetails->booking_dt, 'd-m-Y');
        $email = $bookingdetails->email;

        if ($bookingdetails->payment_status == 3) {

            $url = HTTP_ROOT . 'users/hotelBookingPdf/' . $id;
            $useragent = 'cURL';
            $headers = false;
            $follow_redirects = false;
            $debug = false;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            if ($headers == true) {
                curl_setopt($ch, CURLOPT_HEADER, 1);
            }
            if ($headers == 'headers only') {
                curl_setopt($ch, CURLOPT_NOBODY, 1);
            }
            if ($follow_redirects == true) {
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            }
            if ($debug == true) {
                $result['contents'] = curl_exec($ch);
                $result['info'] = curl_getinfo($ch);
            } else
                $result = curl_exec($ch);
            curl_close($ch);

            $file_data = FILES . 'HOTEL_BOOKED/' . $todatDate . '/' . $email . '/' . 'itinerary.pdf';

            if (file_exists($file_data)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($file_data));
                header('Content-Transfer-Encoding: binary');
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file_data));
                ob_clean();
                flush();
                readfile($file_data);
                echo '<script type="text/javascript"> setTimeout(function(){ window.close();  }, 15000);</script>';
                exit;
            }

            exit;
        }
        echo '<script type="text/javascript"> alert("File Not Found.");window.close();</script>';
        exit;
    }

}
