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

require_once(ROOT . '/vendor' . DS . 'Paypal' . DS . 'PaypalPro.php');
require_once(ROOT . '/vendor/' . DS . '/mpdf/vendor/' . 'autoload.php');

use PaypalPro;

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
        $cnt = array('AF' => "Air France", 'BA' => "British Airways", 'SN' => "Brussels Airlines", 'EK' => "Emirates", 'ET' => "Ethiopian Airlines", 'KL' => "KLM", 'TM' => "LAM", 'LH' => "Lufthansa", 'QR' => "Qatar Airways", 'AT' => "Royal Air Maroc", 'SA' => "South African Airways", 'DT' => "TAAG", 'TP' => "TAP Portugal", 'TU' => "Tunisair", 'TK' => "Turkish Airlines", 'KQ' => "Kenya Airways", 'IB' => "IBERIA", 'BM' => "BMI Regional");
        $this->set(compact('cnt'));
    }

    protected $flightName = array('AF' => "Air France", 'BA' => "British Airways", 'SN' => "Brussels Airlines", 'EK' => "Emirates", 'ET' => "Ethiopian Airlines", 'KL' => "KLM", 'TM' => "LAM", 'LH' => "Lufthansa", 'QR' => "Qatar Airways", 'AT' => "Royal Air Maroc", 'SA' => "South African Airways", 'DT' => "TAAG", 'TP' => "TAP Portugal", 'TU' => "Tunisair", 'TK' => "Turkish Airlines", 'KQ' => "Kenya Airways", 'IB' => "IBERIA", 'BM' => "BMI Regional");

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['accountAlreadyExists', 'accountConfirmed', 'loginDirect', 'ajaxLogin', 'webrootRedirect', 'login', 'forget', 'index', 'ajaxCheckEmailAvail', 'ajaxRegistration', 'welcomePage', 'confirm', 'forgetPassword', 'changePassword', 'language', 'ajaxSearchResult', 'ajaxOneWayResult', 'ajaxLocations', 'pagedata', 'pricedatas', 'airportdata', 'fareDetails', 'thankYou', 'routeReview', 'emailvalidate', 'ShareItenerary', 'invoicePdf', 'itineraryPdf', 'mailtests', 'cronJob']);
    }

    public function language($param = null) {
        if (empty($param)) {
            $param = 'PT';
        }
        $this->request->session()->write("lan", $param);
        $this->request->session()->read("lan");
        $this->redirect($this->referer());
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

            $refer_idd = $id;
            $payment = [
                "reference_id" => $refer_idd,
                "amount" => $flightPrices['total_peice']
            ];

            $data = json_encode($payment);

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



            $this->UserBookDetails->updateAll(['is_active' => 1, 'user_id' => $user_id, 'total_fee' => $flightPrices['total_peice'], 'service_fee' => $flightPrices['service_fee'], 'passengers' => $flightPrices['passenger'], 'purches_date' => date('Y-m-d'), 'payment_id' => $ss->id, 'payment_ref_id' => $refer_idd], ['id' => $id]);

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

            $pay_idd = $ss->id;

            $to = $urdt['email'];
            $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $from = $fromvalue->value;
            $subject = __('Order Delivered');
            $name = $urdt['email'];

            $bookingdetails = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'id' => $id])->first();
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

            $to = 'debmicrofinet@gmail.com';
            $from = 'devtest@microfinet.com';
            $from_name = 'Debendra Kumar Sahoo';
            $subject = 'Order Delivered';
            $aaa1 = 'files/INVOICE/' . date('d-m-Y') . '/' . $usermail->email . '/invoice.pdf';
            $aaa2 = 'files/ITENERARY/' . date('d-m-Y') . '/' . $usermail->email . '/itinerary.pdf';
//attachment files path array
            $files = array($aaa1, $aaa2);

            $this->Custom->multi_attach_mail($to, $subject, $message, $from, $from_name, $files);









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

            $this->Journydetails->hasMany('Fulljournydetails', ['className' => 'Fulljournydetails', 'foreignKey' => 'refid', 'order' => ['id ASC']]);
            $search_det_dats = $this->Journydetails->find('all')->contain('Fulljournydetails')->where(['Journydetails.uniqueid' => $cookiunq, 'comp_price >=' => $datas['startprice'], 'comp_price <=' => $datas['endprice'], 'start_d_airline_name IN' => $air_dat, 'depart_time >=' => $st_tim, 'depart_time <=' => $ed_tim, "stops $st_d" => $st_v, "stops $st_dd" => $st_v])->order(["Journydetails.$sort_d" => "$sort_v"])->offset($offs)->limit($limit);

            $res_found = $this->Journydetails->find('all')->where(['Journydetails.uniqueid' => $cookiunq, 'comp_price >=' => $datas['startprice'], 'comp_price <=' => $datas['endprice'], 'start_d_airline_name IN' => $air_dat, 'depart_time >=' => $st_tim, 'depart_time <=' => $ed_tim, "stops $st_d" => $st_v, "stops $st_dd" => $st_v])->count();
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
        if ($type == 1) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
        }

        if ($type == 1 || $type == 3) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT . 'appadmins/');
        }
        $this->viewBuilder()->layout('default');
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 16])->first();
        $userDetails = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
        $user_id = $this->Auth->user('id');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $this->UserDetails->updateAll(['first_name' => $data['first_name'], 'sur_name' => $data['sur_name'], 'dateofbirth' => $data['dob'], 'gender' => $data['gender'], 'country' => $data['country']], ['user_id' => $user_id]);
            $this->Users->updateAll(['name' => $data['first_name']], ['id' => $user_id]);
            $this->Flash->success(__('Profile updated sucessfully.'));
            return $this->redirect(HTTP_ROOT . 'profile');
        }
        $this->UserBookDetails->hasMany('UserFullBookingDetails', ['className' => 'UserFullBookingDetails', 'foreignKey' => 'refid', 'order' => ['Fulljournydetails.id' => 'ASC']]);
        $pendingdet = $this->UserBookDetails->find('all')->contain('UserFullBookingDetails')->where(['user_id' => $user_id, 'is_active' => 0]);
        $pendingcount = $pendingdet->count();

        $past = $this->UserBookDetails->find('all')->contain('UserFullBookingDetails')->where(['user_id' => $user_id, 'is_active' => 1, 'start_depart_time <=' => date('Y-m-d H:i:s')]);
        $pastcount = $past->count();

        $active = $this->UserBookDetails->find('all')->contain('UserFullBookingDetails')->where(['user_id' => $user_id, 'is_active' => 1, 'start_depart_time >=' => date('Y-m-d H:i:s')]);
        $activecount = $active->count();

        $this->set(compact('pageDetails', 'userDetails', 'pendingdet', 'pendingcount', 'past', 'pastcount', 'active', 'activecount'));
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
                    $jd['comp_price'] = explode('GBP', $vals[1]['TotalPrice'])[1];
                    $jd['depart_time'] = date("H:i:s", strtotime($vals[0][4]));
                    $jd['stops'] = $j_st;
                    $dt_start = date_create($vals[0][4]);
                    $dt_end = date_create($vals[0][count($vals[0]) - 3]);
                    $diff = date_diff($dt_end, $dt_start);
                    $d_det_full = $diff->format('%d');

                    $jd['time_diff'] = $d_det_full * 24 + $diff->format('%h %m');
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
                    $jd['comp_price'] = explode('GBP', $vals[2]['TotalPrice'])[1];
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
        if ($this->request->is('post')) {
            $datas = $this->request->data;
            $data = $this->Locations->find('all')->where(['city like' => '%' . $datas['origin'] . '%'])->toArray();
            echo '<div class="close-g"><ul>';
            foreach ($data as $value) {

                echo "<li onclick='fill(&#39;" . $value['value'] . "&#39;,&#39;" . $datas['pos'] . "&#39;,&#39;" . $datas['hid'] . "&#39;)'><div class='city--main'>" . $value['city'] . " <span>" . $value['data'] . '</span></div><span class="sort-cart">' . $value['value'] . "</span></li>";
            }
            echo "</ul><div class='hideClose' onclick='hidefill(&#39;" . $datas['hid'] . "&#39;)'><a href='#'>close</a> </div> </div>";
        }
        // $locations = [];
        // $data = $this->Locations->find('all')->toArray();
        // foreach ($data as  $value) {
        //     $dat=[];
        //     $dat['value'] = $value["value"];
        //     $dat['data'] = $value["data"];
        //     array_push($locations, $dat);
        // }
        // echo json_encode($locations);
        exit;
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
        $pageDetails['meta_title'] = $userDetails->user_detail->first_name . ' ' . $userDetails->user_detail->sur_name . ' | ' . $pageDetails->meta_title;

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
            $this->Users->updateAll(['name' => $data['first_name']], ['id' => $user_id]);
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

        $notifiyCount = $notificationDetails->count();
        $count_for_read = $for_count->count();
        if ($count_for_read) {
            $this->NotificationUsers->updateAll(['is_read' => 1], ['email_list' => $email]);
        }
        // pj($notificationDetails); exit;

        $this->set(compact('pageDetails', 'userDetails', 'notificationDetails', 'notifiyCount'));
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
            $user = $this->Users->find('all')->where(['Users.type IN' => [1, 3], 'Users.email' => $data['email']])->first();
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
                            $isactive_check = $this->Users->find('all')->where(['Users.type IN' => [1, 3], 'Users.email' => $data['email'], 'Users.is_active' => true]);
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

    public function logout() {
        $this->Flash->success('logout');

        $type = $this->Auth->user('type');

        if ($this->Auth->logout()) {
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
    }

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
        $this->viewBuilder()->setLayout('default');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['unique_id'] = $this->Custom->generateUniqNumber();
            $data['type'] = 2;
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
                    $subject = $emailTemplate->display;
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
        $this->viewBuilder()->layout('ajax');
        $bookingdetails = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'payment_ref_id' => $id])->first();
        $fullbookingdetails = $this->UserFullBookingDetails->find('all')->where(['refid' => $id]);

        $userdetails = $this->UserDetails->find('all')->where(['user_id' => $bookingdetails->user_id])->first();
        $usermail = $this->Users->find('all')->where(['id' => $bookingdetails->user_id])->first();

        $this->set(compact('bookingdetails', 'passangerdetails', 'userdetails', 'usermail', 'fullbookingdetails'));
        $todatDate = date('d-m-Y');
        if (!file_exists($todatDate)) {
            mkdir(FILES . 'ITENERARY/' . $todatDate, 777, true);
            chmod(FILES . 'ITENERARY/' . $todatDate, 0777);
            $mailfol = FILES . 'ITENERARY/' . $todatDate . '/' . $usermail->email;
            if (!file_exists($mailfol)) {
                mkdir($mailfol, 777, true);
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
        $bookingdetails = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'payment_ref_id' => $id])->first();
        $passangerdetails = $this->PassengerDetails->find('all')->where(['booking_details_ref' => $id]);
        $userdetails = $this->UserDetails->find('all')->where(['user_id' => $bookingdetails->user_id])->first();
        $usermail = $this->Users->find('all')->where(['id' => $bookingdetails->user_id])->first();

        $this->set(compact('bookingdetails', 'passangerdetails', 'userdetails', 'usermail'));


        $todatDate = date('d-m-Y');

        if (!file_exists($todatDate)) {
            mkdir(FILES . 'INVOICE/' . $todatDate, 777, true);
            chmod(FILES . 'INVOICE/' . $todatDate, 0777);
            $mailfol = FILES . 'INVOICE/' . $todatDate . '/' . $usermail->email;
            if (!file_exists($mailfol)) {
                mkdir($mailfol, 777, true);
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

}
