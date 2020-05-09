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

class ExtranetsController extends AppController {

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
        $this->loadModel('ExtranetsUserDetails');
        $this->loadModel('ExtranetsUserProperty');
        $this->loadModel('ExtranetsUserPropertyBed');
        $this->loadModel('ExtranetsUserPropertyLocation');
        $this->loadModel('ExtranetsUserPropertyDescription');
        $this->loadModel('ExtranetsUserPropertyAmenities');
        $this->loadModel('ExtranetsUserPropertyPricing');
        $this->loadModel('ExtranetsUserPropertyAvailability');
        $this->loadModel('ExtranetsUserPropertyPhotos');
        $this->loadModel('HotelCountryCitys');
        $this->viewBuilder()->layout('extranet');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['index', 'ajaxRegistration', 'ajaxLogin', 'confirm', 'accountAlreadyExists', 'accountConfirmed', 'forgetPassword', 'changePassword']);
    }

    public function index() {
        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
        }
        if ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        }
        if ($type == 4) {
            return $this->redirect(HTTP_ROOT . 'extranets/dashboard');
        }


        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 9])->first();
        $this->request->session()->read("lan");
        $this->set(compact('pageDetails'));
    }

    public function ajaxRegistration() {
        $this->viewBuilder()->setLayout('ajax');
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $exitEmail = $this->Users->find('all')->where(['Users.email' => @$data['email'], 'Users.type' => 4])->count();

            if ($exitEmail >= 1) {
                echo json_encode(['status' => 'error', 'msg' => 'Account alredy exits']);
                exit;
            } else {
                $data['unique_id'] = $this->Custom->generateUniqNumber();
                $data['type'] = 4;
                $data['name'] = $data['fname'];
                $data['password'] = $data['password'];
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
                    $userDetails['first_name'] = $data['fname'];
                    $userDetails['sur_name'] = !empty($data['lname']) ? $data['lname'] : '';
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
                        $name = $data['fname'];
                        $link = HTTP_ROOT . 'extranets/confirm/' . $lastid->unique_id;
                        $message = $this->Custom->formatUserRegister($emailTemplate->value, $name, $link);
                        // $this->Custom->sendEmail($to, $from, $subject, $message);
//
                        $url = HTTP_ROOT . 'registration?success=' . $lastid->unique_id;
                        echo json_encode(['status' => 'success', 'msg' => 'Successfully Registered']);
                        exit;
                    }
                }
            }
        }
    }

    public function ajaxLogin() {
        $this->viewBuilder()->layout('ajax');

        $data = $this->request->data;
        $userEmailCheck = $this->Users->find('all')->where(['Users.type' => 4, 'Users.email' => $data['email']])->count();
        if ($userEmailCheck == 0) {
            echo json_encode(['status' => 'error', 'msg' => 'Unauthorized User']);
            exit;
        }

        //$user = $this->Auth->identify();
        $user = $this->Users->find('all')->where(['Users.type' => 4, 'Users.email' => $data['email']])->first();
        $passCheck = $this->Users->check($data['password'], $user->password);
        if ($passCheck != 1) {
            echo json_encode(['status' => 'error', 'msg' => 'You are not a valid user.']);
            exit;
        } else {


            if ($user) {
                if ($data['email']) {
                    $isactive_check = $this->Users->find('all')->where(['Users.type' => 4, 'Users.email' => $data['email'], 'Users.is_active' => 1]);
                    $isactive_counter = $isactive_check->count();
                    if ($isactive_counter > 0) {

                        $this->Auth->setUser($user);
                        // pj($user);exit;
                        $type = $this->Auth->user('type');
                        $name = $this->Auth->user('name');
                        $email = $this->Auth->user('email');
                        $user_id = $this->Auth->user('id');
                        if ($type == 4) {
                            echo json_encode(['status' => 'success', 'msg' => 'Login successful']);
                            exit;
                        } else {
                            echo json_encode(['status' => 'error', 'msg' => 'You are not a valid user.']);
                            exit;
                        }
                    } else {
                        echo json_encode(['status' => 'error', 'msg' => 'Your have not permission please contacts your admin']);
                        exit;
                    }
                } else {

                    echo json_encode(['status' => 'error', 'msg' => 'Invalid username or password, try again1']);
                    exit;
                }
            } else {

                echo json_encode(['status' => 'error', 'msg' => 'Invalid username or password, try again2']);
                exit;
            }
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
                $users = $this->Users->find('all')->where(['Users.email' => $data['email'], 'Users.type' => 4]);
                $user = $users->first();
                if ($users->count() > 0) {
                    $this->Users->query()->update()->set(['qstr' => $this->Custom->generateUniqNumber()])->where(['id' => $user->id])->execute();
                    $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'FORGOT_PASSWORD'])->first();
                    $to = $user->email;
                    $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $from = $fromvalue->value;
                    $subject = $emailTemplate->display;
                    $link = '<a style="text-decoration:none;color:black;" target="_blank" href=' . HTTP_ROOT . 'extranets/change_password/' . $user->unique_id . '>' . __("Reset Password") . '</a>';
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

    public function logout() {
        $this->Flash->success('logout');

        $type = $this->Auth->user('type');

        if ($this->Auth->logout()) {
            return $this->redirect(HTTP_ROOT . 'extranets');
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
                    return $this->redirect(HTTP_ROOT . 'extranets/account_confirmed');
                    exit;
                } else {
                    $text = "account_already_activated";
                    $this->Flash->error(__('Your account already activated.'));
                    return $this->redirect(HTTP_ROOT . 'extranets/account_already_exists');
                    exit;
                }
            }
        } else {
            $this->Session->setFlash(__('Invalid Url'), 'error_message');
            return $this->redirect(HTTP_ROOT . 'extranets');
            exit;
        }
        exit;
    }

    public function accountAlreadyExists() {
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
        $this->set(compact('pageDetails'));
    }

    public function accountConfirmed() {
        $pageDetails = $this->Pages->find('all')->where(['Pages.id' => 1])->first();
        $this->set(compact('pageDetails'));
    }

    public function dashboard($nextname = '') {
        $userId = $this->request->session()->read('Auth.User.id');
        $this->request->session()->write('PropertyId', '');
        $edit_det = $this->ExtranetsUserDetails->find('all')->where(['user_id' => $userId])->first();
        $user_det = $this->UserDetails->find('all')->where(['user_id' => $userId])->first();
        $propertyList = $this->ExtranetsUserProperty->find('all')->where(['user_id' => $userId]);
        if (!empty($this->request->session()->read('PropertyId'))) {
            $this->request->session()->write('PropertyId', '');
        }
        if ($this->request->is('post')) {
            $data = $this->request->data();

            $userdatasave = $this->UserDetails->newEntity();
            $data['id'] = @$user_det->id;
            $userdatasave = $this->UserDetails->patchEntity($userdatasave, $data);
            $this->UserDetails->save($userdatasave);

            $savedata = $this->ExtranetsUserDetails->newEntity();
            $data['user_id'] = $userId;
            $data['id'] = !empty(@$edit_det->id) ? @$edit_det->id : '';
            $savedata = $this->ExtranetsUserDetails->patchEntity($savedata, $data);
            $this->ExtranetsUserDetails->save($savedata);
            $this->Flash->success(__('Your details updated successfully.'));
            return $this->redirect(HTTP_ROOT . 'extranets/dashboard');
        }

        $this->set(compact('edit_det', 'nextname', 'propertyList'));
    }

    public function profile($id = null) {
        $userId = $this->request->session()->read('Auth.User.id');
        $edit_det = $this->ExtranetsUserDetails->find('all')->where(['user_id' => $userId])->first();
        $user_det = $this->UserDetails->find('all')->where(['user_id' => $userId])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data();

            $userdatasave = $this->UserDetails->newEntity();
            $data['id'] = @$user_det->id;
            $userdatasave = $this->UserDetails->patchEntity($userdatasave, $data);
            $this->UserDetails->save($userdatasave);

            $savedata = $this->ExtranetsUserDetails->newEntity();
            $data['user_id'] = $userId;
            $data['id'] = !empty(@$edit_det->id) ? @$edit_det->id : '';
            $savedata = $this->ExtranetsUserDetails->patchEntity($savedata, $data);
            $this->ExtranetsUserDetails->save($savedata);
            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                $this->Flash->success(__('Details updated successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                $this->Flash->success(__('Details updated successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/publish/' . @$id);
            }
        }

        $this->set(compact('edit_det', 'id'));
    }

    public function publish($id = null) {

        if ($id == null) {
            if (!empty($this->request->session()->read('PropertyId'))) {
                $id = $this->request->session()->read('PropertyId');
            }
        }
        if ($this->request->is('post')) {
            $data = $this->request->data();
            //pj($data);
            $userID = $this->request->session()->read('Auth.User.id');
            $this->ExtranetsUserProperty->updateAll(['complete_ststus' => 1, 'active_ststus' => 1], ['user_id' => $userID, 'id' => $id]);

            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                $this->Flash->success(__('Property added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                $this->Flash->success(__('Property added successfully'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/');
            }
        }


        $this->set(compact('id'));
        // exit();
    }

    public function basicTab($id = null) {
        if ($id == null) {
            if (!empty($this->request->session()->read('PropertyId'))) {
                $id = $this->request->session()->read('PropertyId');
            }
        }
        if ($id != null) {
            $propertyData = $this->ExtranetsUserProperty->find('all')->where(['id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data();
            $proData = $this->ExtranetsUserProperty->newEntity();
            $data['user_id'] = $this->request->session()->read('Auth.User.id');
            if ($id != null) {
                $data['id'] = $id;
            }
            $data['property_type'] = $data['property_type'];
            $data['property_size'] = $data['property_size'];
            $data['accommodates'] = $data['accommodates'];
            $data['bathrooms'] = $data['bathrooms'];
            $data['bedrooms'] = $data['bedrooms'];
            $data['common_space_num'] = json_encode($data['mySpace']);
            $data['common_space_bed'] = json_encode($data['mySpaceBed']);
            $proData = $this->ExtranetsUserProperty->patchEntity($proData, $data);
            $this->ExtranetsUserProperty->save($proData);
            if ($id != null) {
                $property_id = $id;
                $this->ExtranetsUserPropertyBed->deleteAll(['property_id' => $id]);
            } else {
                $property_id = $proData->id;
            }

            $this->request->session()->write('PropertyId', $property_id);
            if ($id == null) {
                if (!empty($this->request->session()->read('PropertyId'))) {
                    $id = $this->request->session()->read('PropertyId');
                }
            }
            for ($i = 1; $i <= $data['bedrooms']; $i++) {
                $beddata = [];
                $bedDetails = $this->ExtranetsUserPropertyBed->newEntity();
                $beddata['user_id'] = $data['user_id'];
                $beddata['property_id'] = $property_id;
                $beddata['num_bed'] = json_encode($data['numberofbed' . $i]);
                $beddata['beds'] = json_encode($data['numb' . $i]);
                $bedDetails = $this->ExtranetsUserPropertyBed->patchEntity($bedDetails, $beddata);
                $this->ExtranetsUserPropertyBed->save($bedDetails);
            }

            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                $this->Flash->success(__('Your property added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "save next") {
                $this->Flash->success(__('Your property added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/location/' . @$id);
            }
        }
        $this->set(compact('propertyData', 'id'));
    }

    public function location($id = null) {
        if ($id == null) {
            if (!empty($this->request->session()->read('PropertyId'))) {
                $id = $this->request->session()->read('PropertyId');
            }
        }
        if ($id != null) {
            $proper_loc = $this->ExtranetsUserPropertyLocation->find('all')->where(['property_id' => $id])->first();
        }
        if ($this->request->is('post')) {
            $data = $this->request->data();
            $locData = $this->ExtranetsUserPropertyLocation->newEntity();

            $data['user_id'] = $this->request->session()->read('Auth.User.id');
            $data['property_id'] = $this->request->session()->read('PropertyId');
            $data['user_id'] = $this->request->session()->read('Auth.User.id');
            if ($id != null) {
                $data['id'] = $proper_loc->id;
            }
            $locData = $this->ExtranetsUserPropertyLocation->patchEntity($locData, $data);
            //pj($locData);exit;
            $this->ExtranetsUserPropertyLocation->save($locData);

            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                $this->Flash->success(__('Property location added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                $this->Flash->success(__('Property location added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/description/' . @$id);
            }
        }

        $this->set(compact('proper_loc', 'id'));
    }

    public function description($id = null) {
        if ($id == null) {
            if (!empty($this->request->session()->read('PropertyId'))) {
                $id = $this->request->session()->read('PropertyId');
            }
        }
        if ($id != null) {
            $properDes = $this->ExtranetsUserPropertyDescription->find('all')->where(['property_id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data();
            $descrData = $this->ExtranetsUserPropertyDescription->newEntity();

            $data['user_id'] = $this->request->session()->read('Auth.User.id');
            $data['property_id'] = $this->request->session()->read('PropertyId');
            if ($id != null) {
                $data['id'] = $properDes->id;
            }
            $descrData = $this->ExtranetsUserPropertyDescription->patchEntity($descrData, $data);
            //pj($locData);exit;
            $this->ExtranetsUserPropertyDescription->save($descrData);

            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                $this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                $this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/amenities/' . @$id);
            }
        }
        $this->set(compact('properDes', 'id'));
    }

    public function amenities($id = null) {

        if ($id == null) {
            if (!empty($this->request->session()->read('PropertyId'))) {
                $id = $this->request->session()->read('PropertyId');
            }
        }
        if ($id != null) {
            $propAme = $this->ExtranetsUserPropertyAmenities->find('all')->where(['property_id' => $id])->first();
        }


        if ($this->request->is('post')) {
            $data = $this->request->data();
            $ameniData = $this->ExtranetsUserPropertyAmenities->newEntity();
            if ($id != null) {
                $data['id'] = $propAme->id;
            }
            $data['user_id'] = $this->request->session()->read('Auth.User.id');
            $data['property_id'] = $this->request->session()->read('PropertyId');
            $data['recommended'] = json_encode(@$data['recommended']);
            $data['internet'] = json_encode(@$data['internet']);
            $data['accessibility'] = json_encode(@$data['accessibility']);
            $data['kitchen'] = json_encode(@$data['kitchen']);
            $data['facilities'] = json_encode(@$data['facilities']);
            $data['safety'] = json_encode(@$data['safety']);
            $data['extras'] = json_encode(@$data['extras']);

            $ameniData = $this->ExtranetsUserPropertyAmenities->patchEntity($ameniData, $data);
            //pj($locData);exit;
            $this->ExtranetsUserPropertyAmenities->save($ameniData);

            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                $this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                $this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/pricing/' . @$id);
            }
        }

        $this->set(compact('propAme', 'id'));
    }

    public function pricing($id = null) {
        if ($id == null) {
            if (!empty($this->request->session()->read('PropertyId'))) {
                $id = $this->request->session()->read('PropertyId');
            }
        }
        if ($id != null) {
            $propPri = $this->ExtranetsUserPropertyPricing->find('all')->where(['property_id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data();
            $descrData = $this->ExtranetsUserPropertyPricing->newEntity();

            $data['user_id'] = $this->request->session()->read('Auth.User.id');
            $data['property_id'] = $this->request->session()->read('PropertyId');
            if ($id != null) {
                $data['id'] = $propPri->id;
            }
            $descrData = $this->ExtranetsUserPropertyPricing->patchEntity($descrData, $data);
            //pj($locData);exit;
            $this->ExtranetsUserPropertyPricing->save($descrData);

            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                $this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                $this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/availability/' . @$id);
            }
        }
        $this->set(compact('propPri', 'id'));
    }

    public function availability($id = null) {
        if ($id == null) {
            if (!empty($this->request->session()->read('PropertyId'))) {
                $id = $this->request->session()->read('PropertyId');
            }
        }
        if ($id != null) {
            $propAvailability = $this->ExtranetsUserPropertyAvailability->find('all')->where(['property_id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data();

            $availData = $this->ExtranetsUserPropertyAvailability->newEntity();
            $data['user_id'] = $this->request->session()->read('Auth.User.id');
            $data['property_id'] = $this->request->session()->read('PropertyId');
            if ($id != null) {
                $data['id'] = $propAvailability->id;
            }
            $data['blocked_date_value'] = '';
            foreach (explode(',', $data['dates1']) as $val) {
                $data['blocked_date_value'] .= date_format(date_create($val), 'Y/m/d') . ',';
            }
            foreach (explode(',', $data['dates2']) as $val) {
                $data['blocked_date_value'] .= date_format(date_create($val), 'Y/m/d') . ',';
            }
            foreach (explode(',', $data['dates3']) as $val) {
                $data['blocked_date_value'] .= date_format(date_create($val), 'Y/m/d') . ',';
            }

            $data['calendarName'] = json_encode($data['calendarName']);
            if ($data['max_night'] != 2) {
                $data['max_night_value'] = 1;
            }

            $data['calendarAddress'] = json_encode($data['calendarAddress']);
            $availData = $this->ExtranetsUserPropertyAvailability->patchEntity($availData, $data);

            $this->ExtranetsUserPropertyAvailability->save($availData);

            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                $this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                $this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/photos/' . @$id);
            }
        }
        $this->set(compact('propAvailability', 'id'));
    }

    public function photos($id = null) {
        $pro_pics = $this->ExtranetsUserPropertyPhotos->find('all')->where(['property_id' => $id])->toArray();

        if ($this->request->is('post')) {
            $data = $this->request->data();
            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                $this->Flash->success(__('Property Photos added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                $this->Flash->success(__('Property Photos added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/profile/' . @$id);
            }
        }
        $this->set(compact('id', 'pro_pics'));
    }

    public function uploadphoto() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        //pj($data);exit;
        $userID = $this->request->session()->read('Auth.User.id');
        //ExtranetsUserPropertyPhotos
        $arr_ext = explode(".", $data['file']['name']);
        $extname = end($arr_ext);
        if ($extname == 'jpg' || $extname == "JPG" || $extname == "png" || $extname == "PNG" || $extname == "JPEG" || $extname == "jpeg") {
            if ($data['file']['size'] >= 10485760) {
                echo json_encode(['status' => 'error', 'msg' => 'Photo size exceeded. Photo must be under 10MB.']);
                exit();
            } else {

                //$user_d = $this->UserDetails->find('all')->where(['user_id' => $userID])->first();
                //if (!empty($user_d->profile_photo))
                //unlink('img/pro_pic/' . $user_d->profile_photo);
                $path = 'img/pro_pic/';
                $customname = md5(time() . rand()) . '.' . $extname;
                move_uploaded_file($data['file']['tmp_name'], $path . $customname);

                $imgData = $this->ExtranetsUserPropertyPhotos->newEntity();
                $data['user_id'] = $userID;
                $data['property_id'] = $data['pro_id'];
                $data['url'] = $customname;
                $imgData = $this->ExtranetsUserPropertyPhotos->patchEntity($imgData, $data);
                $this->ExtranetsUserPropertyPhotos->save($imgData);

                //$this->UserDetails->updateAll(['profile_photo' => $customname], ['user_id' => $userID]);
                echo json_encode(['status' => 'success', 'msg' => 'Profile picture upload complete.', 'url' => HTTP_ROOT . $path . $customname, 'delete_url' => HTTP_ROOT . 'extranets/delete_pic/' . $imgData->id, 'rid' => $imgData->id]);
                // echo $this->request->session()->read('Auth.User.id');
                exit();
            }
        } else {
            echo json_encode(['status' => 'error', 'msg' => '.jpg & .png only allowed.']);
            exit();
        }
    }

    public function deletePic($id = null) {
        $this->viewBuilder()->layout('ajax');
        $user_d = $this->ExtranetsUserPropertyPhotos->find('all')->where(['id' => $id])->first();
        $this->ExtranetsUserPropertyPhotos->deleteAll(['id' => $id]);
        unlink('img/pro_pic/' . $user_d->url);
        echo json_encode(['status' => 'Success', 'msg' => 'Image Deleted']);
        exit;
    }

    public function setMainPic($id = null) {
        $this->viewBuilder()->layout('ajax');
        $pro_id = $this->ExtranetsUserPropertyPhotos->find('all')->where(['id' => $id])->first();
        $this->ExtranetsUserPropertyPhotos->updateAll(['is_main' => 0], ['property_id' => $pro_id->property_id]);
        $this->ExtranetsUserPropertyPhotos->updateAll(['is_main' => 1], ['id' => $id]);
        echo json_encode(['status' => 'Success', 'msg' => 'Image set as main.']);
        exit;
    }

    public function getBedrooms() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        if ($data['id'] != "") {
            $bedDet_count = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id' => $data['id']])->count();

            if ($data['total'] == 1) {
                $data['total'] = $bedDet_count;
            }

            $bedDet = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id' => $data['id']])->toArray();
        }
        $this->set(compact('data', 'bedDet', 'bedDet_count'));
    }

    public function searchData() {
        $this->viewBuilder()->layout('ajax');
        $user_id = $this->request->session()->read('Auth.User.id');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $key = is_numeric($data['search']);
            if ($key != 1) {
                $key = $data['search'];
                $dataList1 = $this->ExtranetsUserPropertyDescription->find('all')->select('property_id')->where(['propertyName LIKE' => '%' . $key . '%', 'user_id' => $user_id])->toArray();
                $dataList = [];
                foreach ($dataList1 as $list) {
                    $val = $this->ExtranetsUserProperty->find('all')->where(['id' => $list->property_id, 'user_id' => $user_id])->first();
                    array_push($dataList, $val);
                }
                //pj($dataList);exit;
            } else {
                $key = (int) $data['search'];
                $dataList = $this->ExtranetsUserProperty->find('all')->where(['id LIKE' => $key, 'user_id' => $user_id])->toArray();
            }
        }
        $this->set(compact('dataList'));
    }

    public function imgSaveToFile() {
        $this->viewBuilder()->layout('ajax');
        $imagePath = "img/pro_pic/";

        $allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
        $temp = explode(".", $_FILES["img"]["name"]);
        $extension = end($temp);

        //Check write Access to Directory

        if (!is_writable($imagePath)) {
            $response = Array(
                "status" => 'error',
                "message" => 'Can`t upload File; no write Access'
            );
            print json_encode($response);
            return;
        }

        if (in_array($extension, $allowedExts)) {
            if ($_FILES["img"]["error"] > 0) {
                $response = array(
                    "status" => 'error',
                    "message" => 'ERROR Return Code: ' . $_FILES["img"]["error"],
                );
            } else {
                $custom_name = time() . rand();
                $filename = $_FILES["img"]["tmp_name"];
                list($width, $height) = getimagesize($filename);

                move_uploaded_file($filename, $imagePath . $custom_name);

                $response = array(
                    "status" => 'success',
                    "url" => HTTP_ROOT . $imagePath . $custom_name,
                    "width" => $width,
                    "height" => $height
                );
            }
        } else {
            $response = array(
                "status" => 'error',
                "message" => 'something went wrong, most likely file is to large for upload. check upload_max_filesize, post_max_size and memory_limit in you php.ini',
            );
        }

        print json_encode($response);

        exit();
    }

    public function imgCropToFile() {
        $this->viewBuilder()->layout('ajax');
        $imgUrl = $_POST['imgUrl'];

// original sizes
        $imgInitW = $_POST['imgInitW'];
        $imgInitH = $_POST['imgInitH'];
// resized sizes
        $imgW = $_POST['imgW'];
        $imgH = $_POST['imgH'];
// offsets
        $imgY1 = $_POST['imgY1'];
        $imgX1 = $_POST['imgX1'];
// crop box
        $cropW = $_POST['cropW'];
        $cropH = $_POST['cropH'];
// rotation angle
        $angle = $_POST['rotation'];

        $jpeg_quality = 100;

        $output_filename = "img/pro_pic/croppedImg_" . rand();

// uncomment line below to save the cropped image in the same location as the original image.
//$output_filename = dirname($imgUrl). "/croppedImg_".rand();

        $what = getimagesize($imgUrl);

        switch (strtolower($what['mime'])) {
            case 'image/png':
                $img_r = imagecreatefrompng($imgUrl);
                $source_image = imagecreatefrompng($imgUrl);
                $type = '.png';
                break;
            case 'image/jpeg':
                $img_r = imagecreatefromjpeg($imgUrl);
                $source_image = imagecreatefromjpeg($imgUrl);
                error_log("jpg");
                $type = '.jpeg';
                break;
            case 'image/gif':
                $img_r = imagecreatefromgif($imgUrl);
                $source_image = imagecreatefromgif($imgUrl);
                $type = '.gif';
                break;
            default: die('image type not supported');
        }


//Check write Access to Directory

        if (!is_writable(dirname($output_filename))) {
            $response = Array(
                "status" => 'error',
                "message" => 'Can`t write cropped File'
            );
        } else {

            // resize the original image to size of editor
            $resizedImage = imagecreatetruecolor($imgW, $imgH);
            imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, $imgH, $imgInitW, $imgInitH);
            // rotate the rezized image
            $rotated_image = imagerotate($resizedImage, -$angle, 0);
            // find new width & height of rotated image
            $rotated_width = imagesx($rotated_image);
            $rotated_height = imagesy($rotated_image);
            // diff between rotated & original sizes
            $dx = $rotated_width - $imgW;
            $dy = $rotated_height - $imgH;
            // crop rotated image to fit into original rezized rectangle
            $cropped_rotated_image = imagecreatetruecolor($imgW, $imgH);
            imagecolortransparent($cropped_rotated_image, imagecolorallocate($cropped_rotated_image, 0, 0, 0));
            imagecopyresampled($cropped_rotated_image, $rotated_image, 0, 0, $dx / 2, $dy / 2, $imgW, $imgH, $imgW, $imgH);
            // crop image into selected area
            $final_image = imagecreatetruecolor($cropW, $cropH);
            imagecolortransparent($final_image, imagecolorallocate($final_image, 0, 0, 0));
            imagecopyresampled($final_image, $cropped_rotated_image, 0, 0, $imgX1, $imgY1, $cropW, $cropH, $cropW, $cropH);
            // finally output png image
            //imagepng($final_image, $output_filename.$type, $png_quality);
            imagejpeg($final_image, $output_filename . $type, $jpeg_quality);
            $response = Array(
                "status" => 'success',
                "url" => HTTP_ROOT . $output_filename . $type
            );
            $userID = $this->request->session()->read('Auth.User.id');
            $this->UserDetails->updateAll(['profile_photo' => $output_filename . $type], ['user_id' => $userID]);
        }
        print json_encode($response);
        exit();
    }

    public function getStatesName() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $resultset = $this->HotelCountryCitys->find('all')->where(['country_name' => $data['country_name']])->group('state_name');
        }
        $results = '<option selected disabled>Select State</option>';
        foreach ($resultset as $val) {
            if (!empty($val->state_name)) {
                $results .= '<option value="' . $val->state_name . '">' . $val->state_name . '</option>';
            }
        }
        echo $results;
        exit;
    }

    public function getCityStates() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $resultset = $this->HotelCountryCitys->find('all')->where(['id' => $data['mainid']])->first();
        }
        echo '<option selected value="' . $resultset->state_name . '">' . $resultset->state_name . '</option>';
        exit;
    }

    public function getCityName() {
        $this->viewBuilder()->layout('ajax');
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $resultset = $this->HotelCountryCitys->find('all')->where(['state_name' => $data['state_name']]);
        }
        $results = '<option selected disabled>Select City</option>';
        foreach ($resultset as $val) {
            if (!empty($val->city_name)) {
                $results .= '<option value="' . $val->city_name . '">' . $val->city_name . '</option>';
            }
        }
        echo $results;
        exit;
    }

    public function deleteProperty($id = null) {
        $this->viewBuilder()->layout('ajax');
        $userID = $this->request->session()->read('Auth.User.id');
        $this->ExtranetsUserProperty->deleteAll(['user_id' => $userID, 'id' => $id]);
        $this->ExtranetsUserPropertyBed->deleteAll(['user_id' => $userID, 'property_id' => $id]);
        $this->ExtranetsUserPropertyLocation->deleteAll(['user_id' => $userID, 'property_id' => $id]);
        $this->ExtranetsUserPropertyDescription->deleteAll(['user_id' => $userID, 'property_id' => $id]);
        $this->ExtranetsUserPropertyAmenities->deleteAll(['user_id' => $userID, 'property_id' => $id]);
        $this->ExtranetsUserPropertyPricing->deleteAll(['user_id' => $userID, 'property_id' => $id]);
        $this->ExtranetsUserPropertyAvailability->deleteAll(['user_id' => $userID, 'property_id' => $id]);
        $photos_count = $this->ExtranetsUserPropertyPhotos->find('all')->where(['user_id' => $userID, 'property_id' => $id])->count();
        $photos = $this->ExtranetsUserPropertyPhotos->find('all')->where(['user_id' => $userID, 'property_id' => $id]);
        if ($photos_count > 0) {
            foreach ($photos as $pho) {
                unlink('img/pro_pic/' . $pho->url);
            }
        }
        $this->ExtranetsUserPropertyPhotos->deleteAll(['user_id' => $userID, 'property_id' => $id]);

        return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
        exit;
    }

    public function propertyStatus($id = null, $status = null) {
        $this->viewBuilder()->layout('ajax');
        $userID = $this->request->session()->read('Auth.User.id');
        if ($status == "active") {
            $this->ExtranetsUserProperty->updateAll(['active_ststus' => 1], ['user_id' => $userID, 'id' => $id]);
            $this->Flash->success(__('Property Activated successfully.'));
        }
        if ($status == "deactive") {
            $this->ExtranetsUserProperty->updateAll(['active_ststus' => 0], ['user_id' => $userID, 'id' => $id]);
            $this->Flash->success(__('Property Deactivated successfully.'));
        }
        return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');

        exit;
    }

}
