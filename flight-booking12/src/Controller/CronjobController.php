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
    }

    protected $flightName = array('AF' => "Air France", 'BA' => "British Airways", 'SN' => "Brussels Airlines", 'EK' => "Emirates", 'ET' => "Ethiopian Airlines", 'KL' => "KLM", 'TM' => "LAM", 'LH' => "Lufthansa", 'QR' => "Qatar Airways", 'AT' => "Royal Air Maroc", 'SA' => "South African Airways", 'DT' => "TAAG", 'TP' => "TAP Portugal", 'TU' => "Tunisair", 'TK' => "Turkish Airlines", 'KQ' => "Kenya Airways", 'IB' => "IBERIA", 'BM' => "BMI Regional");

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['beforeCheckin']);
    }

    public function beforeCheckin() {
        $this->UserBookDetails->belongsTo('Users', ['className' => 'Users', 'foreignKey' => 'user_id']);
        $active_booking = $this->UserBookDetails->find('all')->contain(['Users'])->where(['UserBookDetails.is_active' => 1]);
        foreach ($active_booking as $val){
            pj($val->user->email);
            pj(date_format($val->start_depart_time, "Y-m-d H:i:s"));
            
            if (date('Y-m-d H:i', strtotime('-24 hour -00 minutes', strtotime(date_format($val->start_depart_time, "Y-m-d H:i:s")))) <= date("Y-m-d H:i")) {
                echo("Mail");
            }
        }
        exit;
    }

}

?>
