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
        $this->loadModel('LuggagePerFlights');
        $this->viewBuilder()->layout('admin');
        $cnt = array('AF' => "Air France", 'BA' => "British Airways", 'SN' => "Brussels Airlines", 'EK' => "Emirates", 'ET' => "Ethiopian Airlines", 'KL' => "KLM", 'TM' => "LAM", 'LH' => "Lufthansa", 'QR' => "Qatar Airways", 'AT' => "Royal Air Maroc", 'SA' => "South African Airways", 'DT' => "TAAG Angola", 'TP' => "TAP Portugal", 'TU' => "Tunisair", 'TK' => "Turkish Airlines", 'KQ' => "Kenya Airways", 'IB' => "IBERIA", 'BM' => "BMI Regional");
        $this->set(compact('cnt'));
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['']);
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
        $revenuessum = $this->UserBookDetails->find('all')->select(['Total'=>'SUM(total_fee)'])->where(['is_active' => 1])->first();
         
        $this->set(compact('bookings_count', 'pass_count','revenuessum'));
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
        $this->set(compact('bookings','dayPurchase','monthPurchase','yearPurchase'));
    }

    public function createNotification($id = null) {
        $getDatas = $this->Users->find('all')->contain('UserDetails')->where(['Users.type' => 2, 'Users.is_active' => 1])->order(['Users.id asc']);

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
                        $from = $fromvalue->value;
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
        $revenuessum = $this->UserBookDetails->find('all')->select(['Total'=>'SUM(total_fee)'])->where(['is_active' => 1])->first();
        $revenues = $this->UserBookDetails->find('all')->where(['is_active' => 1]);
        //pj($revenuessum);exit;
        $dayPurchase = $this->UserBookDetails->find('all')->select(['Total'=>'SUM(total_fee)'])->where(['is_active' => 1, 'DATE(purches_date)' => date('Y-m-d')])->first();
        
        $monthPurchase = $this->UserBookDetails->find('all')->select(['Total'=>'SUM(total_fee)'])->where(['is_active' => 1, 'MONTH(purches_date)' => date('m')])->first();
        
        $yearPurchase = $this->UserBookDetails->find('all')->select(['Total'=>'SUM(total_fee)'])->where(['is_active' => 1, 'YEAR(purches_date)' => date('Y-m-d')])->first();
        $this->set(compact('revenues','revenuessum','dayPurchase','monthPurchase','yearPurchase'));
    }

}
