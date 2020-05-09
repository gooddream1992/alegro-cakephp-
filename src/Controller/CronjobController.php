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

class CronjobController extends AppController {

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
        $this->loadModel('HotelBookingDetails');
        $this->loadModel('ExtranetsUserPropertyBed');
        $this->loadModel('FeaturedServiceFee');
    }

    protected $flightName = array('AF' => "Air France", 'BA' => "British Airways", 'SN' => "Brussels Airlines", 'EK' => "Emirates", 'ET' => "Ethiopian Airlines", 'KL' => "KLM", 'TM' => "LAM", 'LH' => "Lufthansa", 'QR' => "Qatar Airways", 'AT' => "Royal Air Maroc", 'SA' => "South African Airways", 'DT' => "TAAG", 'TP' => "TAP Portugal", 'TU' => "Tunisair", 'TK' => "Turkish Airlines", 'KQ' => "Kenya Airways", 'IB' => "IBERIA", 'BM' => "BMI Regional");

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['beforeCheckin', 'chkPayment', 'paym', 'validPay', 'createRef', 'cancelPayment', 'chkHotelServiceFee', 'checkAdminPaymentInfo']);
    }

    public function chkHotelServiceFee() {
        $alldata = $this->FeaturedServiceFee->find('all')->where(['to_date < ' => date('Y-m-d')]);
        foreach ($alldata as $vals) {
            $this->FeaturedServiceFee->deleteAll(['id' => $vals->id]);
        }
        exit;
    }

    public function beforeCheckin() {
        $this->UserBookDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $active_booking = $this->UserBookDetails->find('all')->contain(['Users'])->where(['UserBookDetails.is_active' => 1]);
        foreach ($active_booking as $val) {
            pj($val->user->email);
            pj(date_format($val->start_depart_time, "Y-m-d H:i:s"));

            if (date('Y-m-d H:i', strtotime('-24 hour -00 minutes', strtotime(date_format($val->start_depart_time, "Y-m-d H:i:s")))) <= date("Y-m-d H:i")) {
                echo("Mail");
            }
        }
        exit;
    }

    public function paym() {

        $payment = [
            "reference_id" => 934700000,
            "amount" => "18500.00",
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
        pj($response);
        pj($err);

        curl_close($curl);

        exit;
    }

    public function chkPayment() {
        $curl = curl_init();

        $httpHeader = [
            "Authorization: " . "Token " . "w3hc7lnsj4dtuhd72ogf4bpbimj3jf44",
            "Accept: application/vnd.proxypay.v2+json",
        ];

        $opts = [
            CURLOPT_URL => "https://api.sandbox.proxypay.co.ao/payments/609300000289",
            CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTPHEADER => $httpHeader
        ];

        curl_setopt_array($curl, $opts);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        pj($response);
        pj($err);
        exit;
    }

    public function validPay() {
        $api_key = "w3hc7lnsj4dtuhd72ogf4bpbimj3jf44";
        $input = @file_get_contents("php://input");
        $header_signature = $_SERVER['HTTP_X_SIGNATURE'];

        $signature = hash_hmac('sha256', $input, $api_key);
        $message = '';
        if ($signature == $header_signature) {
            $payment = json_decode($input);
            $all_data = json_encode($payment);
            // handle payment event
            $this->HotelBookingDetails->updateAll(['payment_status' => 3, 'payment_details' => json_encode($payment)], ['refer_id' => $payment->reference_id]);
            //$message = $payment['reference_id'] . '<br>' . $payment['amount'];
            $email = new Email('default');
            $email->from(['noreply@alegro.co.ao' => 'Proxypass Update'])
                    ->to('debmicrofinet@gmail.com')
                    ->subject('About')
                    ->send('Payment success:  ' . $payment->reference_id);


            http_response_code(204);
        } else {
            http_response_code(400);
        }

        exit;
    }

    public function createRef() {
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
        echo($response);
        //echo("https://api.sandbox.proxypay.co.ao/references/$response");


        $reference1 = [
            "amount" => "10000.00",
            "end_datetime" => date('c', strtotime(date('Y-m-d H:i', strtotime('+4 hour +00 minutes')))),
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
            CURLOPT_URL => "https://api.sandbox.proxypay.co.ao/references/$response",
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
        pj($response1);

        exit();
    }

    public function cancelPayment() {
        echo $curtim = date('Y-m-d H:i');
        $alldata = $this->HotelBookingDetails->find('all')->where(['payment_status' => 1, 'payment_method' => 'MultiCaixa']);
        foreach ($alldata as $val) {
            if ($curtim >= date_format($val->end_datetime, 'Y-m-d H:i')) {
                $rm_cnt = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => $val->room_id])->first();
                //$this->ExtranetsUserPropertyBed->updateAll(['room_count' => $rm_cnt->room_count + $val->numb_rooms], ['id' => $val->room_id]);
                $this->HotelBookingDetails->updateAll(['payment_status' => 2, 'user_htl_reach_status' => 3], ['id' => $val->id]);
            }
        }

        exit;
    }

    public function checkAdminPaymentInfo() {
        
        $getBookingDetails = $this->HotelBookingDetails->find('all')->where(['payment_status IN' => [3, 5], 'payment_method' => 'MultiCaixa']);
        
        foreach ($getBookingDetails as $details) {

            $Previous_date_x = date_format($details->check_in, 'Y-m-d');
            $Previous_date_x1 = date_create($Previous_date_x);
            date_sub($Previous_date_x1, date_interval_create_from_date_string('2 days'));
            $Previous_date_y= date_format($Previous_date_x1, 'Y-m-d');
            
            if($details->property_payment_status !=3){
            	if ($details->cancel_policy == 'Strict') {
                	$this->HotelBookingDetails->updateAll(['property_payment_status' => 2], ['id' => $details->id]);
            	}
            	if ($details->cancel_policy == 'Flexible') {
                	if (date('Y-m-d') >= $Previous_date_x) {
                    	$this->HotelBookingDetails->updateAll(['property_payment_status' => 2], ['id' => $details->id]);
                	}
            	}
            	if ($details->cancel_policy == 'Moderate') {
                	if (date('Y-m-d') >= $Previous_date_y ) {
                    	$this->HotelBookingDetails->updateAll(['property_payment_status' => 2], ['id' => $details->id]);
                	}
            	}
            }
            
        }
        exit();
    }

}

?>
