<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;

require_once(ROOT . '/vendor/' . DS . '/phpoffice/vendor/autoload.php');

use \PHPExcel_IOFactory;

class AppadminsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Custom');
//    $this->loadComponent('Phpoffice');
        $this->loadComponent('Flash');
        $this->loadModel('Users');
        $this->loadModel('Pages');
        $this->loadModel('UserDetails');
        $this->loadModel('UserNotifications');
        $this->loadModel('Settings');
        $this->loadModel('Maps');
        $this->loadModel('NotificationUsers');
        $this->loadModel('Testimonials');
        $this->loadModel('Locations');
        $this->loadModel('ServiceFee');
        $this->loadModel('UserBookDetails');
        $this->loadModel('UserFullBookingDetails');
        $this->loadModel('LuggagePerFlights');
        $this->loadModel('PassengerDetails');
        $this->loadModel('Faqs');
        $this->loadModel('FaqCategory');
        $this->viewBuilder()->layout('admin');
        $cnt = array('AF' => "Air France", 'BA' => "British Airways", 'SN' => "Brussels Airlines", 'EK' => "Emirates", 'ET' => "Ethiopian Airlines", 'KL' => "KLM", 'TM' => "LAM", 'LH' => "Lufthansa", 'QR' => "Qatar Airways", 'AT' => "Royal Air Maroc", 'SA' => "South African Airways", 'DT' => "TAAG Angola", 'TP' => "TAP Portugal", 'TU' => "Tunisair", 'TK' => "Turkish Airlines", 'KQ' => "Kenya Airways", 'IB' => "IBERIA", 'BM' => "BMI Regional");
        $this->set(compact('cnt'));
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['']);
    }

    public function revenue() {
//        $bookings = $this->UserBookDetails->find('all')->where(['is_active' => 1]);
//        $dayPurchase = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'DATE(purches_date)' => date('Y-m-d')])->count();
//        $monthPurchase = $this->UserBookDetails->find('all')->where(['id' => 14, 'MONTH(purches_date)' => date('m')]);
        $groupList = $this->UserBookDetails->find('all')->where(['is_active' => 1])->group('purches_date')->toArray();
        $totaltaxs = $this->UserBookDetails->find('all')->select(['total' => 'SUM(UserBookDetails.passengers*UserBookDetails.service_fee)'])->where(['is_active' => 1, 'MONTH(purches_date)' => date('m-Y')])->first();


        // echo $totaltaxs->total*(6.25/100);

        $this->set(compact('groupList'));
    }

    public function revn() {
        $a = [];
        if ($this->request->is('post')) {
            $datas = $this->request->data;
            if (!empty($datas['yearwise'])) {
                $totaltaxs = $this->UserBookDetails->find('all')->select(['total' => 'SUM(UserBookDetails.service_fee)'])->where(['is_active' => 1, 'YEAR(purches_date)' => $datas['yearwise']])->first();
                $grandtotal = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'YEAR(purches_date)' => $datas['yearwise']])->sumOf('total_fee');
                $airprice = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'YEAR(purches_date)' => $datas['yearwise']]);
                $air_tot = 0;
                foreach ($airprice as $rel) {
                    $air_tot += explode('GBP', $rel->price)[1] * $rel->passengers;
                }
                $a["yr_air_tot"] = $air_tot;
                $a["year"] = $totaltaxs->total;
                $a["year_total"] = $grandtotal;
            }
            if (!empty($datas['monthwise'])) {
                $totaltaxs1 = $this->UserBookDetails->find('all')->select(['total' => 'SUM(UserBookDetails.service_fee)'])->where(['is_active' => 1, 'MONTH(purches_date)' => $datas['monthwise']])->first();
                $grandtotal = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'MONTH(purches_date)' => $datas['monthwise']])->sumOf('total_fee');
                $airprice = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'MONTH(purches_date)' => $datas['monthwise']]);
                $air_tot = 0;
                foreach ($airprice as $rel) {
                    $air_tot += explode('GBP', $rel->price)[1] * $rel->passengers;
                }
                $a["mth_air_tot"] = $air_tot;
                $a["month"] = $totaltaxs1->total;
                $a["month_total"] = $grandtotal;
            }
            if (!empty($datas['datewise'])) {
                $totaltaxs2 = $this->UserBookDetails->find('all')->select(['total' => 'SUM(UserBookDetails.service_fee)'])->where(['is_active' => 1, 'Date(purches_date)' => date('Y-m-d', strtotime($datas['yearwise'] . '-' . $datas['monthwise'] . '-' . $datas['datewise']))])->first();
                $grandtotal = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'Date(purches_date)' => date('Y-m-d', strtotime($datas['yearwise'] . '-' . $datas['monthwise'] . '-' . $datas['datewise']))])->sumOf('total_fee');
                $airprice = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'Date(purches_date)' => date('Y-m-d', strtotime($datas['yearwise'] . '-' . $datas['monthwise'] . '-' . $datas['datewise']))]);
                $air_tot = 0;
                foreach ($airprice as $rel) {
                    $air_tot += explode('GBP', $rel->price)[1] * $rel->passengers;
                }
                $a["dat_air_tot"] = $air_tot;
                $a["date"] = $totaltaxs2->total;
                $a["date_total"] = $grandtotal;
            }
        }
        echo json_encode($a);
        exit;
    }

    public function index($id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        $this->viewBuilder()->layout('admin');
        $bookings = $this->UserBookDetails->find('all')->where(['is_active' => 1]);
        $bookings_count = $bookings->sumOf('passengers');
        $pass_count = $this->Users->find('all')->where(['type' => 2])->count();
        $revenuessum = $this->UserBookDetails->find('all')->select(['Total' => 'SUM(total_fee)'])->where(['is_active' => 1])->first();

        $this->set(compact('bookings_count', 'pass_count', 'revenuessum'));
    }

    public function serviceFee($id = null) {

        $data = $this->ServiceFee->find('all')->where(['id' => 1])->first();
        if ($this->request->is('post')) {
            $datas = $this->request->data;
            $this->ServiceFee->updateAll(['domestic' => $datas['domestic'], 'international' => $datas['international']], ['id' => 1]);
            $this->Flash->success(__('Service fee has been updated successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/service_fee/');
        }

        $this->set(compact('data'));
    }

    public function userLists($id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        if (isset($_REQUEST['formdate'])) {
            $datas = $this->request->query;
            $getDatas = $this->Users->find('all')->where(['Users.type' => 2, 'created_dt <=' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $datas['todate']))), 'created_dt >=' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $datas['formdate'])))])->order(['Users.id asc']);
        } else {
            $getDatas = $this->Users->find('all')->where(['Users.type' => 2])->order(['Users.id asc']);
        }

        //$dayPassanger = DATE(`timestamp`) = CURDATE();
        $dayPassanger = $this->Users->find('all')->where(['Users.type' => 2, 'DATE(created_dt)' => date('Y-m-d')])->count();
        $monthPassanger = $this->Users->find('all')->where(['Users.type' => 2, 'MONTH(created_dt)' => date('m')])->count();
        $yearPassanger = $this->Users->find('all')->where(['Users.type' => 2, 'YEAR(created_dt)' => date('Y-m-d')])->count();

        $this->set(compact('getDatas', 'dayPassanger', 'monthPassanger', 'yearPassanger'));
    }

    public function editPessanger($id = null) {
        $type = $this->request->session()->read('Auth.User.type');
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
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        if ($id) {
            $getDatas = $this->Users->find('all')->where(['Users.id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data;

            $name1 = explode(" ", $data['name']);
            $this->UserDetails->updateAll(['first_name' => $name1[0], 'sur_name' => $name1[1], 'province' => $data['province'], 'dateofbirth' => date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data['dateofbirth']))), 'gender' => $data['gender'], 'country' => $data['country'], 'phone_number' => $data['phone_number']], ['user_id' => $id]);
            $this->Users->updateAll(['name' => $name1[0]], ['id' => $id]);
            $this->Flash->success(__('Profile updated sucessfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/edit_pessanger/' . $id);
        }

        $this->set(compact('getDatas', 'provincelists', 'id'));
    }

    public function bookedTickets() {

        $bookings = $this->UserBookDetails->find('all')->where(['is_active' => 1]);
        $dayPurchase = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'DATE(purches_date)' => date('Y-m-d')])->count();
        $monthPurchase = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'MONTH(purches_date)' => date('m')])->count();
        $yearPurchase = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'YEAR(purches_date)' => date('Y-m-d')])->count();
        $this->set(compact('bookings', 'dayPurchase', 'monthPurchase', 'yearPurchase'));
    }

    public function createNotification($id = null) {
        $getDatas = $this->Users->find('all')->contain('UserDetails')->where(['Users.type' => 2, 'Users.is_active' => 1])->order(['Users.id asc']);
        
        $LAN = $this->request->session()->read("lan");
        if($LAN == "PT"){
            $valuez = "value_PT";
        }else if($LAN == "FR"){
            $valuez = "value_FR";
        }else{
            $valuez = "value";
        }

        $user = $this->UserNotifications->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            // pr($data);exit;
            $data['notifi_type'] = $data['notifi_type'];
            $data['notification_subject'] = $data['notification_subject'];
            $data['notifi_msg'] = $data['notifi_msg'];
            $data['notifi_date'] = date('Y-m-d H:i:s');
            $data['read_status'] = 0;
            $data['user_is_action'] = 0;
            $user = $this->UserNotifications->patchEntity($user, $data);
            $this->UserNotifications->save($user);
            if ($user) {

                $data2['notification_id'] = $user->id;
                if (@$data['users']) {
                    $emails_list = implode(',', $data['users']);
                    $user_email_list = explode(",", $emails_list);
                    foreach ($user_email_list as $uel) {
                        $notificationUsers = $this->NotificationUsers->newEntity();
                        $data2['email_list'] = $uel;
                        $data2['notification_type'] = 2;

                        $notificationUsers = $this->NotificationUsers->patchEntity($notificationUsers, $data2);
                        $this->NotificationUsers->save($notificationUsers);

                        $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'NOTIFICATION_EMAIL'])->first();
                        $to = $uel;
                        $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                        $from = $fromvalue->$valuez;
                        $subject = $emailTemplate->display;
                        $message = $this->Custom->formatUserNotification($emailTemplate->value, $data['notification_subject'], $data['notifi_msg']);
                        $this->Custom->sendEmail($to, $from, $data['notification_subject'], $data['notifi_msg']);
                    }
                } else {

                    foreach ($getDatas as $mail_list) {
                        $notificationUsers = $this->NotificationUsers->newEntity();
                        $data2['email_list'] = $mail_list['email'];
                        $data2['notification_type'] = 1;

                        $notificationUsers = $this->NotificationUsers->patchEntity($notificationUsers, $data2);
                        $this->NotificationUsers->save($notificationUsers);

                        $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'NOTIFICATION_EMAIL'])->first();
                        $to = $mail_list->email;
                        $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                        $from = $fromvalue->value;
                        $subject = $emailTemplate->display;
                        $message = $this->Custom->formatUserNotification($emailTemplate->value, $data['notification_subject'], $data['notifi_msg']);
                        $this->Custom->sendEmail($to, $from, $data['notification_subject'], $data['notifi_msg']);
                    }
                }
            }

            $this->Flash->success(__('Notification send successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/create_notification/');
        }


        foreach ($getDatas as $data) {
            $Jsondata[] = ['email' => $data->email, 'first_name' => $data->user_detail->first_name, 'last_name' => $data->user_detail->sur_name];
        }

        $successDetails = json_encode($Jsondata);
        //echo $successDetails; exit;

        $this->set(compact('user', 'successDetails'));
    }

    public function viewNotification($id = null) {

        $getDatas = $this->UserNotifications->find('all')->order(['UserNotifications.id asc']);
        $this->set(compact('getDatas'));
        //$this->redirect(HTTP_ROOT . 'appadmins/view_notification/');
    }

    public function profile($param = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        $user_id = $this->request->session()->read('Auth.User.id');
        $rowname = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $user_id])->first();
        // pj($rowname); exit;
        $getCurPassword = $this->Users->find('all', ['fields' => ['password']])->where(['Users.id' => $user_id])->first();

        $row = $this->Users->find('all')->where(['Users.id' => $user_id])->first();
        $type = $this->request->session()->read('Auth.User.type');
        $this->viewBuilder()->layout('admin');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;


            $user = $this->Users->patchEntity($user, $data);
            $user->id = $this->request->session()->read('Auth.User.id');
            if (!empty($data['map']) == 'Save') {
                $map = $this->Maps->newEntity();
                if ($data['code']) {
                    $map->code = $data['code'];
                    $map->id = 1;
                    $this->Maps->save($map);
                    $this->Flash->success(__('Map code is updated successfully.'));
                    return $this->redirect(['action' => 'profile/contact-map']);
                } else {
                    $this->Flash->error(__('Code fields is empty.'));
                    return $this->redirect(['action' => 'profile/contact-map']);
                }
            } else if (!empty($data['changepassword']) == 'Change password') {
                $passCheck = $this->Users->check($data['current_password'], $getCurPassword->password);
                if ($passCheck != 1) {
                    $this->Flash->error(__('Current password is incorrect.'));
                    return $this->redirect(['action' => 'profile/changepassword']);
                } else if ($data['password'] != $data['cpassword']) {
                    $this->Flash->error(__('Password and Confirm password fields do not match'));
                    return $this->redirect(['action' => 'profile/changepassword']);
                } else {
                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('Password has been chaged successfully.'));
                        return $this->redirect(['action' => 'profile/changepassword']);
                    } else {
                        $this->Flash->error(__('Password could not be change. Please, try again.'));
                        return $this->redirect(['action' => 'profile/changepassword']);
                    }
                }
            } else if ($data['general'] == 'save') {
                $set = $this->request->data;
                foreach ($set as $kehfhy => $value) {
                    $condition = array('name' => $kehfhy);
                    $this->Settings->updateAll(['value' => $value], ['name' => $kehfhy]);
                }
                $this->Flash->success(__('Communication emaill has been updated successfully.'));
                $this->redirect(HTTP_ROOT . 'appadmins/profile/communication');
            } else {
                if (@$data['name'] == '') {
                    $this->Flash->error(__("Please enter your name"));
                } else if ($data['email'] == '') {
                    $this->Flash->error(__("Please enter your email"));
                } else {
                    $id = $user_id;
                    $this->UserDetails->updateAll(['first_name' => $data['name'], 'phone_number' => $data['phone'], 'sur_name' => $data['sur_name']], ['user_id' => $id]);
                    $this->Users->updateAll(['name' => $data['name']], ['id' => $id]);
                    $this->Flash->success(__('The Profile has been update.'));
                    return $this->redirect(['action' => 'profile']);
                }
            }
        }

        $settingsEmailTempletes = $this->Settings->find('all')->where(['Settings.type' => 2]);
        $settings = $this->Settings->find('all', ['order' => 'Settings.id DESC'])
                ->where(['Settings.type' => 1, 'Settings.is_active' => 1]);
        $row = $this->Maps->find('all')->where(['Maps.id' => 1])->first();

        $this->set(compact('rowname', 'settings', 'settingsEmailTempletes', 'row', 'user', 'row', 'options', 'param'));
    }

    public function deactive($id = null, $table = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }

        if ($this->$table->query()->update()->set(['is_active' => 0])->where(['id' => $id])->execute()) {
            if ($table == 'Users') {
                $this->$table->query()->update()->set(['is_active' => 0])->where(['id' => $id])->execute();
                $this->Flash->success(__('Users is deactivated.'));
                $this->redirect($this->referer());
            }
            if ($table == 'Testimonials') {
                $this->$table->query()->update()->set(['is_active' => 0])->where(['id' => $id])->execute();
                $this->Flash->success(__('Testimonials is deactivated.'));
                $this->redirect($this->referer());
            }
            if ($table == 'Faqs') {
                $this->$table->query()->update()->set(['is_active' => 0])->where(['id' => $id])->execute();
                $this->Flash->success(__('Faqs is deactivated.'));
                $this->redirect($this->referer());
            }
            if ($table == 'FaqCategory') {
                $this->$table->query()->update()->set(['is_active' => 0])->where(['id' => $id])->execute();
                $this->Flash->success(__('Faq Category is deactivated.'));
                $this->redirect($this->referer());
            }
        }
    }

    public function active($id = null, $table = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        if ($this->$table->query()->update()->set(['is_active' => 1])->where(['id' => $id])->execute()) {
            if ($table == 'Users') {
                $this->Flash->success(__('Users is has been activated.'));
                $this->redirect($this->referer());
            }
            if ($table == 'Testimonials') {
                $this->Flash->success(__('Testimonials is has been activated.'));
                $this->redirect($this->referer());
            }
            if ($table == 'Faqs') {
                $this->Flash->success(__('Faqs is has been activated.'));
                $this->redirect($this->referer());
            }
            if ($table == 'FaqCategory') {
                $this->Flash->success(__('Faq Category is has been activated.'));
                $this->redirect($this->referer());
            }
        }
    }

    public function cmsPage() {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        $dataListings = $this->Pages->find('all')->where(['Pages.id NOT IN' => [1, 4, 5, 8, 9, 10, 11, 12]])->order(['Pages.id' => 'ASC']);
        $this->set(compact('dataListings'));
    }

    public function editpages($id = null, $sel = null) {

        $row->id = $id;
        $row->page_title = '';
        $row->page_desc = '';
        $row->meta_title = '';
        $row->meta_keyword = '';
        $row->meta_desc = '';
        if (empty($sel)) {
            $sel = 'PT';
        }
        $exnm = 'z' . strtolower($sel);
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        if ($id) {
            $list_data = $this->Pages->find('all')->where(['id' => $id])->first()->toArray();

            $row->page_title = $list_data['page_title' . $exnm];
            $row->page_desc = $list_data['page_desc' . $exnm];
            $row->meta_title = $list_data['meta_title'];
            $row->meta_keyword = $list_data['meta_keyword'];
            $row->meta_desc = $list_data['meta_desc'];
        }

        $dataEntity = $this->Pages->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['page_title' . $exnm] = $data['page_title'];
            $data['page_desc' . $exnm] = $data['page_desc'];
            $data['meta_title'] = $data['meta_title'];
            $data['meta_keyword'] = $data['meta_keyword'];
            $data['meta_desc'] = $data['meta_desc'];


            $dataEntity = $this->Pages->patchEntity($dataEntity, $data);
            $this->Pages->save($dataEntity);

            $this->Flash->success(__('Page data has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/editpages/' . $data['id']);
        }
        $dataListings = $this->Pages->find('all')->order(['Pages.id' => 'ASC']);

        $this->set(compact('dataListings', 'id', 'row', 'dataEntity', 'sel'));
    }

    public function delete($id = null, $table = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }

        $delete = $this->$table->get($id);
        $details = $this->$table->find()->where([$table . '.id' => $id])->first();
        if ($this->$table->delete($delete)) {
            if ($table == 'Users') {
                $this->UserDetails->deleteAll(['UserDetails.user_id' => $id]);
                $this->Flash->success(__('Data deleted successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/user_lists');
            }
            if ($table == 'UserNotifications') {
                $this->Flash->success(__('Data deleted successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/view_notification');
            }
            if ($table == 'Testimonials') {
                $this->Flash->success(__('Data deleted successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/view_testimonial');
            }
            if ($table == 'Faqs') {
                $this->Flash->success(__('Data deleted successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/view_faq');
            }
            if ($table == 'FaqCategory') {
                $this->Flash->success(__('Data deleted successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/view_category');
            } else {
                $this->Flash->success(__('Data deleted successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins');
            }
        }
    }

    public function deleteEmp($id = null, $table = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        $delete = $this->$table->get($id);
        $details = $this->$table->find()->where([$table . '.id' => $id])->first();
        if ($this->$table->delete($delete)) {
            if ($table == 'Users') {
                $this->UserDetails->deleteAll(['UserDetails.user_id' => $id]);
                $this->Flash->success(__('Data deleted successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/view_admin');
            } else {
                $this->Flash->success(__('Data deleted successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins');
            }
        }
    }

    public function createAdmin($id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        $user = $this->Users->newEntity();
        if ($id) {
            $editAdmin = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $id])->first();
            // pj($editAdmin); exit;
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email']])->count();
            $password = @$data['password'];
            $conpassword = @$data['cpassword'];
            if ($exitEmail >= 1) {
                $this->Flash->error(__('This  Email is already exists.'));
            }
            if ($password != $conpassword) {
                $this->Flash->error(__("Password and confirm password are not same"));
            } else {

                if ($id) {
                    //pj($data); exit;
                    $this->UserDetails->updateAll(['first_name' => $data['name'], 'phone_number' => $data['phone'], 'sur_name' => $data['surname']], ['user_id' => $id]);
                    $this->Users->updateAll(['name' => $data['name']], ['id' => $id]);
                    $this->Flash->success(__('Data updated successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/create_admin/' . $id);
                } else {

                    $data['unique_id'] = $this->Custom->generateUniqNumber();
                    $data['type'] = 3;
                    $data['name'] = $data['name'];
                    $data['is_active'] = 1;
                    $data['created_dt'] = date('Y-m-d h:i:s');
                    $data['last_login_ip'] = $this->Custom->get_ip_address();
                    $data['last_login_date'] = date('Y-m-d h:i:s');
                    $data['qstr'] = '';

                    $user = $this->Users->patchEntity($user, $data);
                    if ($this->Users->save($user)) {
                        $userID = $user->id;
                        $userDetailspatch = $this->UserDetails->newEntity();
                        if ($id) {
                            $getUserId = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $userID])->first();
                            if ($getUserId->id) {
                                $userDetails['id'] = $getUserId->id;
                            } else {
                                $userDetails['id'] = '';
                            }
                        } else {
                            $userDetails['id'] = '';
                        }

                        $userDetails['user_id'] = $userID;
                        $userDetails['first_name'] = $data['name'];
                        $userDetails['sur_name'] = !empty($data['surname']) ? $data['surname'] : '';
                        $userDetails['phone_number'] = !empty($data['phone']) ? $data['phone'] : '';
                        $userDetails['dateofbirth'] = '';
                        $userDetails['gender'] = '';
                        $userDetails['country'] = '';
                        $userDetailspatch = $this->UserDetails->patchEntity($userDetailspatch, $userDetails);

                        $this->UserDetails->save($userDetailspatch);

                        $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();
                        $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                        $to = $user->email;
                        $from = $fromMail->value;
                        $subject = $emailMessage->display;
                        $sitename = SITE_NAME;
                        $password = $password;
                        $message = $this->Custom->createAdminFormat($emailMessage->value, $user->name, $user->email, $password, $sitename);
                        //$this->Custom->sendEmail($to, $from, $subject, $message);
                        $this->Flash->success(__('Data add successfully.'));
                        return $this->redirect(HTTP_ROOT . 'appadmins/view_admin');
                    }
                }
            }
        }
        $this->set(compact('user', 'id', 'editAdmin'));
    }

    public function viewAdmin() {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        $adminLists = $this->Users->find('all')->where(['Users.type' => 3])->contain(['UserDetails'])->order('Users.id DESC');
        $this->set(compact('adminLists'));
    }

    public function luggagePerFlights($id = null) {
        if (!empty($id)) {
            $luggageperflightsdata = $this->LuggagePerFlights->find('all')->where(['LuggagePerFlights.id' => $id])->first();
        }
        //print_r($luggageperflightsdata);
        $LuggagePerFlightspatch = $this->LuggagePerFlights->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (isset($data['id']) && !empty($data['id'])) {
                $data['id'] = $data['id'];
            } else {
                $data['id'] = '';
            }


            $userflightdata = $this->LuggagePerFlights->patchEntity($LuggagePerFlightspatch, $data);
            $this->LuggagePerFlights->save($userflightdata);
            if (isset($data['id']) && !empty($data['id'])) {
                $this->Flash->success(__('Luggage Per Flights Successfully Updated.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/view_luggage_flights');
            } else {
                $this->Flash->success(__('Luggage Per Flights data successfully added.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/view_luggage_flights');
            }
        }



        $this->set(compact('luggageperflightsdata', 'LuggagePerFlightspatch'));
    }

    public function deleteLuggage($id = null, $table = null) {
        $delete = $this->$table->get($id);
        $details = $this->$table->find()->where([$table . '.id' => $id])->first();
        if ($this->$table->delete($delete)) {
            if ($table == 'LuggagePerFlights') {
                $this->LuggagePerFlights->deleteAll(['LuggagePerFlights.id' => $id]);
                $this->Flash->success(__('Data deleted successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins/view_luggage_flights');
            } else {
                $this->Flash->success(__('Data deleted successfully'));
                $this->redirect(HTTP_ROOT . 'appadmins');
            }
        }
    }

    public function viewLuggageFlights() {
        $datas = $this->LuggagePerFlights->find('all');
        $this->set(compact('datas'));
    }

    public function setPassword($id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        $passwordData = $this->Users->newEntity();
        $setPassword = $this->Users->find('all')->where(['Users.id' => $id])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $password = $data['password'];
            $conpassword = $data['cpassword'];
            if ($password != $conpassword) {
                $this->Flash->error(__("Password and confirm password are not same"));
            } else {

                $passwordData = $this->Users->patchEntity($passwordData, $data);
                $passwordData->id = $data['id'];

                if ($this->Users->save($passwordData)) {
                    $emailMessage = $this->Settings->find('all')->where(['Settings.name' => 'CREATE_ADMIN'])->first();
                    $fromMail = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $to = $setPassword->email;
                    $from = $fromMail->value;
                    $subject = $emailMessage->display;
                    $sitename = SITE_NAME;
                    $password = $password;
                    $message = $this->Custom->createAdminFormat($emailMessage->value, $setPassword->name, $to, $password, $sitename);
                    $this->Custom->sendEmail($to, $from, $subject, $message);
                    $this->Flash->success(__('Password set successfully.'));
                    return $this->redirect(HTTP_ROOT . 'appadmins/view_admin');
                }
            }
        }
        $this->set(compact('passwordData', 'setPassword'));
    }

    public function editUser($id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $this->Users->updateAll(['name' => $data['name']], ['id' => $data['id']]);
            $this->Flash->success(__('The user has been updated.'));
            return $this->redirect(['action' => 'view_admin']);
        }
        $row = $this->Users->find()->where(['Users.id' => $id])->first();
        $this->set(compact('row', 'id'));
    }

    public function editMailTempletes($id = null) {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        $this->viewBuilder()->layout('admin');
        $row = $this->Settings->find('all')->where(['Settings.id' => $id])->first();
        $dataEntity = $this->Settings->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $dataEntity = $this->Settings->patchEntity($dataEntity, $data);
            $this->Settings->save($dataEntity);
            $this->Flash->success(__('Email templet has been update successfully.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/profile/emailTemplete');
        }
        $this->set(compact('id', 'row'));
    }

    public function createTestimonial($id = null) {
        $user = $this->Testimonials->newEntity();

        if (!empty($id)) {
            $testimon = $this->Testimonials->newEntity();
            $testimon = $this->Testimonials->find('all')->where(['Testimonials.id' => $id])->first();
            if ($this->request->is('post')) {

                $udata = $this->request->data;
                if ($udata['photo']['tmp_name'] == '') {
                    $udata['photo'] = $testimon['photo'];
                } else {
                    $tmp_name = $udata['photo']['tmp_name'];
                    $name = $udata['photo']['name'];
                    $path = PHOTOS;
                    @$x = $this->Custom->uploadImageBanner($tmp_name, $name, $path, "300");
                    $udata['photo'] = @$x;
                }
                $this->Testimonials->updateAll(['name' => $udata['name'], 'photo' => $udata['photo'], 'description' => $udata['description']], ['id' => $id]);
                $this->Flash->success(__('Testimonial successfully updated.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/viewTestimonial/' . $id);
            }
        } else {
            if ($this->request->is('post')) {

                $data = $this->request->data;
                $tmp_name = $data['photo']['tmp_name'];
                $name = $data['photo']['name'];
                $path = PHOTOS;
                @$x = $this->Custom->uploadImageBanner($tmp_name, $name, $path, "300");
                $data['photo'] = @$x;
                $data['is_active'] = 1;
                $data['date'] = date('Y-m-d');
                $dataEntity = $this->Testimonials->patchEntity($user, $data);
                $this->Testimonials->save($dataEntity);

                $this->Flash->success(__('Testimonial created successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/viewTestimonial');
            }
        }
        $this->set(compact('id', 'user', 'testimon'));
    }

    public function viewTestimonial() {
        $testimonialLists = $this->Testimonials->find('all')->order('id DESC');
        $this->set(compact('testimonialLists'));
    }

    public function citycountry() {

        $locations = $this->Locations->find('all');
        $this->set(compact('locations'));
    }

    public function citycountryedit($id = null) {
        $locations = $this->Locations->find('all')->where(['Locations.id' => $id])->first();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['city'] = $data['city'];
            $data['data'] = $data['data'];
            $data['country'] = $data['country'];
            $this->Locations->updateAll(['city' => $data['city'], 'data' => $data['data'], 'country' => $data['country']], ['id' => $id]);
            $this->Flash->success(__('Location successfully updated.'));
            return $this->redirect(HTTP_ROOT . 'appadmins/citycountry');
        }

        $this->set(compact('locations'));
    }

    public function revenues() {
        $cnt = array('AF' => "Air France", 'BA' => "British Airways", 'SN' => "Brussels Airlines", 'EK' => "Emirates", 'ET' => "Ethiopian Airlines", 'KL' => "KLM", 'TM' => "LAM", 'LH' => "Lufthansa", 'QR' => "Qatar Airways", 'AT' => "Royal Air Maroc", 'SA' => "South African Airways", 'DT' => "TAAG Angola", 'TP' => "TAP Portugal", 'TU' => "Tunisair", 'TK' => "Turkish Airlines", 'KQ' => "Kenya Airways", 'IB' => "IBERIA", 'BM' => "BMI Regional");
        
        $yer =date('Y-m-d');
        $mon1= date('Y-m-d');
        $mon2=date("n");
        $dat1 = date('Y-m-d');
        $wk1 = date('Y-m-d', strtotime("-1 week"));
        $wk2 = date('Y-m-d');
        
        if ($this->request->is('post')) {
            $data = $this->request->data;
            
            if(isset($data['year_d'])){
                $yer = $data['year_d'];                
            }                 
            if(isset($data['month_d'])){
                $mon1 = explode('/',$data['month_d'])[1];                
                $mon2 = explode('/',$data['month_d'])[0];                
            }
            
            if(isset($data['daily_d'])){
                $dat1 = date('Y-m-d', strtotime(str_replace("/", "-", $data['daily_d'])));                               
            } 
            
            if(isset($data['week_d1']) && isset($data['week_d2'])){
                $wk1 = date('Y-m-d', strtotime(str_replace("/", "-", $data['week_d1'])));                               
                $wk2 = date('Y-m-d', strtotime(str_replace("/", "-", $data['week_d2'])));                               
            } 
           // print_r($data);
        }


        $xc = "<br>";
        $xc .= "<b>Grand Total : </b><br>";

        $grandtotal_yr = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'YEAR(purches_date)' => $yer])->sumOf('total_fee');
        $xc .= number_format($grandtotal_yr, 2) . " AOA ";
        $xc .= "<br><br><b>Airlines : </b><br>";
        $airliness_yr = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'YEAR(purches_date)' => $yer])->group('start_d_airline_name');
        foreach ($airliness_yr as $valls) {
            $air_pri = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'YEAR(purches_date)' => $yer, 'start_d_airline_name' => $valls->start_d_airline_name]);
            $air_pri_tot_year = 0;
            $yr_ar = !empty($cnt[$valls->start_d_airline_name]) ? $cnt[$valls->start_d_airline_name] : $valls->start_d_airline_name;
            $xc .= $yr_ar . " : ";
            foreach ($air_pri as $air_pri2) {
                $air_pri_tot_year += explode("GBP", $air_pri2->price)[1];
            }$xc .= number_format($air_pri_tot_year, 2) . " AOA <br>";
        }
        $Service_fee_yr = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'YEAR(purches_date)' => $yer])->sumOf('service_fee');
        $xc .= "<br><b> Alegro : </b><br>" . number_format($Service_fee_yr - $Service_fee_yr * (6.25 / 100), 2) . " AOA <br>";
        $xc .= "<b>Government Tax : </b><br>";
        
        $xc .= number_format($Service_fee_yr * (6.25 / 100), 2) . " AOA <br>";
        
        



        $xd = "<br>";
        $xd .= "<b>Grand Total : </b><br>";
        $grandtotal_mt = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'YEAR(purches_date)' => $mon1, 'MONTH(purches_date)' => $mon2])->sumOf('total_fee');
        $xd .= number_format($grandtotal_mt, 2) . " AOA "; 
        
        $xd .= "<br><br><b>Airlines : </b><br>";
        $airliness = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'YEAR(purches_date)' => $mon1, 'MONTH(purches_date)' => $mon2])->group('start_d_airline_name');
        foreach ($airliness as $vals) {
            $air_pri = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'YEAR(purches_date)' => $mon1, 'MONTH(purches_date)' => $mon2, 'start_d_airline_name' => $vals->start_d_airline_name]);
            $air_pri_tot = 0;
            $mt_dt = !empty($cnt[$vals->start_d_airline_name]) ? $cnt[$vals->start_d_airline_name] : $vals->start_d_airline_name;
            $xd .= $mt_dt . " : ";
            foreach ($air_pri as $air_pri1) {
                $air_pri_tot += explode("GBP", $air_pri1->price)[1];
            }$xd .= number_format($air_pri_tot, 2) . " AOA <br>";
        }
        
        $Service_fee_mt = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'YEAR(purches_date)' => $mon1, 'MONTH(purches_date)' => $mon2])->sumOf('service_fee');
        
        $xd .="<br><b> Alegro : </b><br>" . number_format($Service_fee_mt - $Service_fee_mt * (6.25 / 100), 2) . " AOA <br>";
        
        $xd .= "<b>Government Tax : </b><br>";

        
        $xd .= number_format($Service_fee_mt * (6.25 / 100), 2) . " AOA <br>";
        
        
        

        


        $xe = "<br>";
        $xe .= "<b>Grand Total : </b><br>";

        $grandtotal_wk = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'purches_date >=' => $wk1, 'purches_date <=' => $wk2])->sumOf('total_fee');

        $xe .= number_format($grandtotal_wk, 2) . " AOA <br>";
        $xe .= "<br><b>Airlines : </b><br>";
        $airliness_week = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'purches_date >=' => $wk1, 'purches_date <=' => $wk2])->group('start_d_airline_name');
        foreach ($airliness_week as $vall) {
            $wk_dt = !empty($cnt[$vall->start_d_airline_name]) ? $cnt[$vall->start_d_airline_name] : $vall->start_d_airline_name;
            $xe .= $wk_dt . " : ";
            $air_pri_we = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'purches_date >=' => $wk1, 'purches_date <=' => $wk2, 'start_d_airline_name' => $vall->start_d_airline_name]);
            $air_pri_tot_we = 0;

            foreach ($air_pri_we as $air_pri) {
                $air_pri_tot_we += explode("GBP", $air_pri->price)[1];
            }$xe .= number_format($air_pri_tot_we, 2) . " AOA <br>";
        }
        $Service_fee_wk = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'purches_date >=' => $wk1, 'purches_date <=' => $wk2])->sumOf('service_fee');
        $xe .= "<br><b> Alegro : </b><br>" . number_format($Service_fee_wk - $Service_fee_wk * (6.25 / 100), 2) . " AOA <br>";
        
        $xe .="<b>Government Tax : </b><br>";

        
        $xe .= number_format($Service_fee_wk * (6.25 / 100), 2) . " AOA <br>";
        

        


        $xf = "<br>";
        $xf .= "<b>Grand Total : </b><br>";
        $grandtotal_dt = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'purches_date' => $dat1])->sumOf('total_fee');
        $xf .= number_format($grandtotal_dt, 2) . " AOA"; 
        
        $xf .= "<br><br><b>Airlines : </b><br>";
        $airliness_day = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'purches_date' => $dat1])->group('start_d_airline_name');
        foreach ($airliness_day as $valll) {
            $dt_dt = !empty($cnt[$valll->start_d_airline_name]) ? $cnt[$valll->start_d_airline_name] : $valll->start_d_airline_name;
            $xf .= $dt_dt . " : ";
            $air_pri_day = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'purches_date' => $dat1, 'start_d_airline_name' => $valll->start_d_airline_name]);
            $air_pri_tot_day = 0;

            foreach ($air_pri_day as $air_pri) {
                $air_pri_tot_day += explode("GBP", $air_pri->price)[1];
            }$xf .= number_format($air_pri_tot_day, 2) . " AOA <br><br>";
        }
        $Service_fee_dt = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'purches_date' =>$dat1])->sumOf('service_fee');
        $xf .=" <b> Alegro : </b><br>" . number_format($Service_fee_dt - $Service_fee_dt * (6.25 / 100), 2) . " AOA <br>";
        
        $xf .=  "<b>Government Tax : </b><br>";
        
        $xf .= number_format($Service_fee_dt * (6.25 / 100), 2) . " AOA <br>"; 
        

        






//        $revenuessum = $this->UserBookDetails->find('all')->select(['Total' => 'SUM(total_fee)'])->where(['is_active' => 1])->first();
//        $revenues = $this->UserBookDetails->find('all')->where(['is_active' => 1]);
//        //pj($revenuessum);exit;
//        $dayPurchase = $this->UserBookDetails->find('all')->select(['Total' => 'SUM(total_fee)'])->where(['is_active' => 1, 'DATE(purches_date)' => date('Y-m-d')])->first();
//
//        $monthPurchase = $this->UserBookDetails->find('all')->select(['Total' => 'SUM(total_fee)'])->where(['is_active' => 1, 'MONTH(purches_date)' => date('m')])->first();
//
//        $yearPurchase = $this->UserBookDetails->find('all')->select(['Total' => 'SUM(total_fee)'])->where(['is_active' => 1, 'YEAR(purches_date)' => date('Y-m-d')])->first();
        $this->set(compact('revenues', 'revenuessum', 'dayPurchase', 'monthPurchase', 'yearPurchase', 'xc','xd','xe','xf'));
    }

    public function invoice($id = null) {
        $this->viewBuilder()->layout('ajax');
        $bookingdetails = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'payment_ref_id' => $id])->first();
        $passangerdetails = $this->PassengerDetails->find('all')->where(['booking_details_ref' => $id]);
        $userdetails = $this->UserDetails->find('all')->where(['user_id' => $bookingdetails->user_id])->first();
        $usermail = $this->Users->find('all')->where(['id' => $bookingdetails->user_id])->first();

        $this->set(compact('bookingdetails', 'passangerdetails', 'userdetails', 'usermail'));
    }

    public function createFaq($id = null) {

        $catoptions = $this->FaqCategory->find('list', ['keyField' => 'category_name', 'valueField' => 'category_name'])->where(['FaqCategory.is_active' => 1]);
        $user = $this->Faqs->newEntity();
        if (!empty($id)) {
            $editData = $this->Faqs->find('all')->where(['Faqs.id' => $id])->first();
            // pj($editData); exit;
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['id']) {
                $data['id'] = $data['id'];
            } else {
                $data['id'] = '';
            }

            $data['language'] = $data['language'];
            $data['category'] = $data['category'];
            $data['tittle'] = $data['tittle'];
            $data['description'] = $data['description'];
            $data['is_active'] = 1;
            $data['date'] = date('Y-m-d');
            $dataEntity = $this->Faqs->patchEntity($user, $data);
            $this->Faqs->save($dataEntity);
            if (@$data['id']) {
                $this->Flash->success(__('Faqs Update successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/create_faq/' . $data['id']);
            } else {
                $this->Flash->success(__('Faqs created successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/viewFaq');
            }
        }

        $this->set(compact('catoptions', 'id', 'user', 'editData'));
    }

    public function viewFaq() {
        $faqLists = $this->Faqs->find('all')->order('id DESC');
        $this->set(compact('faqLists'));
    }

    public function createCategory($id = null) {
        $user = $this->FaqCategory->newEntity();
        if (!empty($id)) {
            $editData = $this->FaqCategory->find('all')->where(['FaqCategory.id' => $id])->first();
            // pj($editData); exit;
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;
            if (@$data['id']) {
                $data['id'] = $data['id'];
            } else {
                $data['id'] = '';
            }


            $data['category_name'] = $data['category_name'];
            $data['is_active'] = 1;
            $data['date'] = date('Y-m-d');
            $dataEntity = $this->FaqCategory->patchEntity($user, $data);
            $this->FaqCategory->save($dataEntity);
            if (@$data['id']) {
                $this->Flash->success(__('Faq Category Update successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/create_category/' . $data['id']);
            } else {
                $this->Flash->success(__('Faqs created successfully.'));
                return $this->redirect(HTTP_ROOT . 'appadmins/view_category');
            }
        }

        $this->set(compact('id', 'user', 'editData'));
    }

    public function viewCategory() {
        $cafaqLists = $this->FaqCategory->find('all')->order('id DESC');
        $this->set(compact('cafaqLists'));
    }

    public function itinerary($id = null) {
        $this->viewBuilder()->layout('ajax');
        $bookingdetails = $this->UserBookDetails->find('all')->where(['is_active' => 1, 'payment_ref_id' => $id])->first();
        $fullbookingdetails = $this->UserFullBookingDetails->find('all')->where(['refid' => $id]);

        $userdetails = $this->UserDetails->find('all')->where(['user_id' => $bookingdetails->user_id])->first();
        $usermail = $this->Users->find('all')->where(['id' => $bookingdetails->user_id])->first();

        $this->set(compact('bookingdetails', 'passangerdetails', 'userdetails', 'usermail', 'fullbookingdetails'));
    }

}
