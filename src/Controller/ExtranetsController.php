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

class ExtranetsController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Custom');
        $this->loadComponent('Paginator');
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
        $this->loadModel('ExtranetsUserPropertySubBeds');
        $this->loadModel('HotelBookingDetails');
        $this->loadModel('HotelReviews');
        $this->loadModel('FeaturedServiceFee');
        $this->loadModel('HotelServiceFee');


        $this->viewBuilder()->layout('extranet');
    }

    public $paginate = ['limit' => 10,];

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['index', 'ajaxRegistration', 'ajaxLogin', 'confirm', 'accountAlreadyExists', 'accountConfirmed', 'forgetPassword', 'changePassword', 'setSubBed', 'updateSubBed', 'setBedrooms', 'loadmap', 'registration', 'resendEmailVerification', 'changeDate', 'fblogin', 'fbreturn', 'googlelogin', 'googleLoginReturn']);
    }

    public function resendEmailVerification() {
        $this->viewBuilder()->layout('ajax');
        $LAN = $this->request->session()->read("lan");
        if ($LAN == "PT") {
            $valuez = "value_PT";
            $subject = "Bem-Vindo ao Alegro Extranet";
            $btn_name = "Confirmar";
        } else if ($LAN == "FR") {
            $valuez = "value_FR";
            $subject = "Bienvenue sur l'extranet Alegro";
            $btn_name = "Confirmer";
        } else {
            $valuez = "value";
            $subject = "Welcome to Alegro Extranet";
            $btn_name = "Confirm";
        }
        if ($this->request->is('post')) {
            $data = $this->request->data;

            $user = $this->Users->find('all')->where(['Users.type' => 4, 'Users.email' => $data['email']])->first();

            $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'EXT_WELCOME_EMAIL'])->first();
            $to = $data['email'];
            $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $from = $fromvalue->value;

            $name = $user->name;
            $link = HTTP_ROOT . 'extranets/confirm/' . $user->unique_id;
            $message = $this->Custom->formatUserRegister($emailTemplate->$valuez, $name, $link, $btn_name);
            $this->Custom->sendEmail($to, $from, $subject, $message);
//
            $url = HTTP_ROOT . 'extranets/registration?success=' . $user->unique_id;
            echo json_encode(['status' => 'success', 'msg' => 'Successfully Registered', 'url' => $url]);
        }
        exit;
    }

    public function registration($uniq_seo = null) {

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
            $email = $user->email;

            if ($option != NULL) {
                $this->Flash->success(__('Activation mail resent successfully.'));
            }

            $this->set(compact('user', 'from'));
        }
        $this->set(compact('mail_url', 'users', 'metaDescription', 'metaKeyword', 'title_for_layout', 'pageDetails'));
    }

    public function index() {

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Welcome to Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));

        $type = $this->request->session()->read('Auth.User.type');
        if ($type == 1) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(['controller' => 'appadmins', 'action' => 'index']);
        } elseif ($type == 2) {
            $this->Flash->success(__('Your have not permission to access'));
            return $this->redirect(HTTP_ROOT);
        } elseif ($type == 4) {
            return $this->redirect(HTTP_ROOT . 'extranets/dashboard');
        } else {
            if (empty($_GET['t'])) {
                return $this->redirect(HTTP_ROOT . 'extranets?t=' . md5('12345'));
            }
        }



        $this->request->session()->read("lan");
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

                        $LAN = $this->request->session()->read("lan");
                        if ($LAN == "PT") {
                            $valuez = "value_PT";
                            $subject = "Bem-Vindo ao Alegro Extranet";
                            $btn_name = "Confirmar";
                        } else if ($LAN == "FR") {
                            $valuez = "value_FR";
                            $subject = "Bienvenue sur l'extranet Alegro";
                            $btn_name = "Confirmer";
                        } else {
                            $valuez = "value";
                            $subject = "Welcome to Alegro Extranet";
                            $btn_name = "Confirm";
                        }

                        $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'EXT_WELCOME_EMAIL'])->first();
                        $to = $data['email'];
                        $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                        $from = $fromvalue->value;
                        //$subject = __($emailTemplate->display);
                        $name = $data['fname'];
                        $link = HTTP_ROOT . 'extranets/confirm/' . $lastid->unique_id;
                        $message = $this->Custom->formatUserRegister($emailTemplate->$valuez, $name, $link, $btn_name);
                        $this->Custom->sendEmail($to, $from, $subject, $message);
//
                        $url = HTTP_ROOT . 'extranets/registration?success=' . $lastid->unique_id;
                        echo json_encode(['status' => 'success', 'msg' => 'Successfully Registered', 'url' => $url]);
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
            echo json_encode(['status' => 'error2', 'msg' => 'Unauthorized User']);
            exit;
        }

        //$user = $this->Auth->identify();
        $user = $this->Users->find('all')->where(['Users.type' => 4, 'Users.email' => $data['email']])->first();
        if ($user->is_active == 0) {
            echo json_encode(['status' => 'error3', 'msg' => 'Account not confirmed.']);
            exit;
        }
        $passCheck = $this->Users->check($data['password'], $user->password);
        if ($passCheck != 1) {
            echo json_encode(['status' => 'error', 'msg' => 'You are not a valid user.']);
            exit;
        } else {


            if ($user) {
                if ($data['email']) {
                    $isactive_check = $this->Users->find('all')->where(['type' => 4, 'email' => $data['email'], 'is_active' => 1]);
                    $isactive_counter = $isactive_check->count();
                    if ($isactive_counter > 0) {

                        $this->Auth->setUser($user);
                        // pj($user);exit;
                        $type = $this->Auth->user('type');
                        $name = $this->Auth->user('name');
                        $email = $this->Auth->user('email');
                        $user_id = $this->Auth->user('id');

                        $this->Users->updateAll(['last_login_date' => date('Y-m-d H:i:s')], ['id' => $user_id]);
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

    public function fblogin() {

        $this->autoRender = false;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID_EXT, FACEBOOK_APP_SECRET_EXT);
        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI_EXT);
        $url = $helper->getLoginUrl(array('email'));
        return $this->redirect($url);
        exit;
    }

    public function fbreturn() {
        session_start();
        $this->viewBuilder()->layout('ajax');

        FacebookSession::setDefaultApplication(FACEBOOK_APP_ID_EXT, FACEBOOK_APP_SECRET_EXT);
        $helper = new FacebookRedirectLoginHelper(FACEBOOK_REDIRECT_URI_EXT);

        $session = $helper->getSessionFromRedirect();
        if (isset($_SESSION['token'])) {
            $session = new FacebookSession($_SESSION['token']);
            try {
                $session->validate(FACEBOOK_APP_ID_EXT, FACEBOOK_APP_SECRET_EXT);
            } catch (FacebookAuthorizationException $e) {
                echo $e->getMessage();
            }
        }

        $data = array();
        $fb_data = array();

        if (isset($session)) {
            $_SESSION['token'] = $session->getToken();
            $appsecret_proof = hash_hmac('sha256', $_SESSION['token'], FACEBOOK_APP_SECRET_EXT);
            $request = new FacebookRequest($session, 'GET', '/me?locale=en_US&fields=name,email,gender,age_range,first_name,last_name,link,locale,picture,location', array("appsecret_proof" => $appsecret_proof));

            $response = $request->execute();
            $graph = $response->getGraphObject(GraphUser::className());
            $fb_data = $graph->asArray();
            $id = $graph->getId();
            $email = $graph->getEmail();

            if (!empty($fb_data)) {
                if (@$fb_data['email']) {

                    $result = $this->Users->find('all')->where(['email' => $fb_data['email'], 'type' => 4])->count();
                    if ($result >= 1) {
                        $result_email = $this->Users->find('all')->where(['email' => $fb_data['email'], 'type' => 4])->first();
                        if (!empty($result_email->email)) {
                            $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id']])->first()->toArray();
                            session_destroy();
                            $get_login = $this->Auth->setUser($getLoginConfirmation);

                            return $this->redirect(HTTP_ROOT . 'extranets/dashboard');
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
                        $user->type = 4;
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

                                return $this->redirect(HTTP_ROOT . 'extranets/dashboard');
                            } else {
                                $this->Flash->error(__('Login failed and you can register here also'));
                                return $this->redirect(HTTP_ROOT . 'extranets');
                            }
                        } else {
                            $this->Flash->error(__('Login failed and you can register here also'));
                            return $this->redirect(HTTP_ROOT);
                        }
                    }
                } else {
                    $this->Flash->error(__('Login failed due to email is not associate with your facebook! '));
                    return $this->redirect(HTTP_ROOT . 'extranets');
                }
            } else {
                $this->Flash->error(__('Login failed and you can register here also'));
                return $this->redirect(HTTP_ROOT . 'extranets');
            }
        }
    }

    public function googlelogin() {
        $this->autoRender = false;

// require_once(ROOT . '/config/google_login.php');
        require_once(ROOT . '/vendor' . DS . 'Google2/src/' . 'Google_Client.php');
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
        require_once(ROOT . '/config/google_login2.php');

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
                    $result = $this->Users->find('all')->where(['email' => $google_data['email'], 'type' => 4])->count();

                    if ($result >= 1) {
                        $result_email = $this->Users->find('all')->where(['email' => $google_data['email'], 'type' => 4])->first();
                        session_destroy();
                        $getLoginConfirmation = $this->Users->find('all')->where(['Users.id' => $result_email['id'], 'type' => 4])->first()->toArray();

                        $get_login = $this->Auth->setUser($getLoginConfirmation);
                        $user_login_id = $this->Auth->user('id');
                        if ($user_login_id) {
                            $user = $this->Users->newEntity();
                            $user->last_login_ip = $this->Custom->get_ip_address();
                            $user->type = 4;
                            $user->last_login_date = date('Y-m-d H:i:s');
                            $user->id = $user_login_id;
                            $this->Users->save($user);

                            if ($result_email['type'] == 4) {
                                return $this->redirect(HTTP_ROOT . 'extranets/');
                            }
                        } else {
                            $this->Flash->error(__('Login failed and you can register here also'));
                            return $this->redirect(HTTP_ROOT . 'extranets/');
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
                        $user->type = 4;
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

                                return $this->redirect(HTTP_ROOT . 'extranets/');
                            } else {
                                $this->Flash->error(__('Login failed and you can register here also'));
                                return $this->redirect(HTTP_ROOT . 'extranets/');
                            }
                        } else {
                            $this->Flash->error(__('Login failed and you can register here also'));
                            return $this->redirect(HTTP_ROOT . 'extranets/');
                        }
                    }
                } else {
                    $this->Flash->error(__('Login failed and you can register here also'));
                    return $this->redirect(HTTP_ROOT . 'extranets/');
                }
            } catch (Exception $e) {
                $this->Flash->error(__('Login failed and you can register here also'));
                return $this->redirect(HTTP_ROOT . 'extranets/');
            }
        }

        exit;
    }

    public function forgetPassword() {
        $this->viewBuilder()->setLayout('ajax');
        $LAN = $this->request->session()->read("lan");
        if ($LAN == "PT") {
            $valuez = "value_PT";
        } else if ($LAN == "FR") {
            $valuez = "value_FR";
        } else {
            $valuez = "value";
        }
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
                    $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'EXT_RESET_PASSWORD'])->first();
                    $to = $user->email;
                    $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
                    $from = $fromvalue->value;
                    $subject = __('Forgot your password?');
            $LAN = $this->request->session()->read("lan");
            if ($LAN == "PT") {
                $valuez = "value_PT";
                $subject = "Esqueceu a sua palavra-passe?";
            } else if ($LAN == "FR") {
                $valuez = "value_FR";
                $subject = "Mot de passe oublié?";
            } else {
                $valuez = "value";
                $subject = "Forgot your password?";
            }
                    //$link = /* '<a style="text-decoration:none;color:black;" target="_blank" href=' . */HTTP_ROOT . 'extranets/change_password/' . $user->unique_id /* . '>' . __("Reset Password") . '</a>' */;
                    $link = HTTP_ROOT . 'extranets/change_password/' . $user->unique_id;
                    $message = $this->Custom->formatForgetPassword($emailTemplate->$valuez, $user->name, $user->email, $link, SITE_NAME);
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
        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Change Password | Alegro Extranet';
		$LAN = $this->request->session()->read("lan");
            if ($LAN == "PT") {
                $valuez = "value_PT";
                $pageDetails->meta_title = "Altere a palavra-passe | Alegro Extranet";
            } else if ($LAN == "FR") {
                $valuez = "value_FR";
                $pageDetails->meta_title = "Changer le mot de passe | Alegro Extranet";
            } else {
                $valuez = "value";
                $pageDetails->meta_title = "Change Password | Alegro Extranet";
            }
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));

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
                        return $this->redirect(['controller' => 'extranets', 'action' => 'index', "?" => array("key" => "d56b699830e77ba53855679cb1d252da")]);
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
        $type = $this->Auth->user('type');

        if ($this->Auth->logout()) {
            $this->Flash->success(__('logoutexter'));
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

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Dashboard | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));

        $userId = $this->request->session()->read('Auth.User.id');
        $this->request->session()->write('PropertyId', '');
        $edit_det = $this->ExtranetsUserDetails->find('all')->where(['user_id' => $userId])->first();
        if (empty($edit_det->user_id)) {
            $this->Flash->success(__('ext_profile_is_not_update'));
        }
        $user_det = $this->UserDetails->find('all')->where(['user_id' => $userId])->first();
        $propertyList = $this->ExtranetsUserProperty->find('all')->where(['user_id' => $userId]);
        $propertyList_cnt = $propertyList->count();

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

        $this->set(compact('edit_det', 'nextname', 'propertyList', 'propertyList_cnt'));
    }

    public function profile($id = null) {

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Profile | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));

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
                // $this->Flash->success(__('Details updated successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                // $this->Flash->success(__('Details updated successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/publish/' . @$id);
            }
        }

        $this->set(compact('edit_det', 'id'));
    }

    public function publish($id = null) {

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Publish | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));

        if ($id == null) {
            if (!empty($this->request->session()->read('PropertyId'))) {
                $id = $this->request->session()->read('PropertyId');
            }
        }
        if ($this->request->is('post')) {
            $data = $this->request->data();
            //pj($data);
            $exitdata = $this->ExtranetsUserProperty->find('all')->where(['id' => $id])->first();
            $userID = $this->request->session()->read('Auth.User.id');
            $this->ExtranetsUserProperty->updateAll(['complete_ststus' => 1, 'active_ststus' => 0], ['user_id' => $userID, 'id' => $id]);

            if ($exitdata->complete_ststus != 1) {
                $this->Flash->success('Property added successfully');
            } else {
                $this->Flash->success('Property successfully editted');
            }

            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/');
            }
        }


        $this->set(compact('id'));
        // exit();
    }

    public function basicTab($id = null) {
        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Basics | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));

        $unqData = uniqid();
        $this->request->session()->write('For_Bed', $unqData);

        if (empty($this->request->session()->read('For_Bed'))) {
            $this->request->session()->write('For_Bed', $unqData);
        }

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
            $data['accommodates'] = @$data['accommodates'];
            $data['bathrooms'] = $data['bathrooms'];
            $data['bedrooms'] = $data['bedrooms'];
            $data['common_space_num'] = json_encode($data['mySpace']);
            $data['common_space_bed'] = json_encode($data['mySpaceBed']);
            $proData = $this->ExtranetsUserProperty->patchEntity($proData, $data);
            $this->ExtranetsUserProperty->save($proData);

            $property_id = $proData->id;

            $this->ExtranetsUserPropertyBed->updateAll(['property_id' => $property_id], ['temp_cookie' => $data['temp_cookie']]);
            $this->ExtranetsUserPropertySubBeds->updateAll(['property_id' => $property_id], ['temp_cookie' => $data['temp_cookie']]);

            $this->request->session()->write('PropertyId', $property_id);
            if ($id == null) {
                if (!empty($this->request->session()->read('PropertyId'))) {
                    $id = $this->request->session()->read('PropertyId');
                }
            }


            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                //$this->Flash->success(__('Your property added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "save next") {
                //$this->Flash->success(__('Your property added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/location/' . @$id);
            }
        }
        $this->set(compact('propertyData', 'id'));
    }

    public function location($id = null) {

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Location | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));


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
                //$this->Flash->success(__('Property location added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                //$this->Flash->success(__('Property location added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/description/' . @$id);
            }
        }

        $this->set(compact('proper_loc', 'id'));
    }

    public function description($id = null) {

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Description | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));


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
                //$this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                //$this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/amenities/' . @$id);
            }
        }
        $this->set(compact('properDes', 'id'));
    }

    public function amenities($id = null) {

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Amenities | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));


        if ($id == null) {
            if (!empty($this->request->session()->read('PropertyId'))) {
                $id = $this->request->session()->read('PropertyId');
            }
        }
        if ($id != null) {
            $propAme = $this->ExtranetsUserPropertyAmenities->find('all')->where(['property_id' => $id, 'sub_id' => 1])->first();
            $availableBeds = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id' => $id]);
            $mainPro = $this->ExtranetsUserProperty->find('all')->where(['id' => $id])->first();
        }


        if ($this->request->is('post')) {
            $data = $this->request->data();
            /// pj( $data);
            // exit;
            $getproperty_details = $this->ExtranetsUserProperty->find('all')->where(['id' => $id])->first();

            $ameniData = $this->ExtranetsUserPropertyAmenities->newEntity();
            if ($id != null) {
                $data['id'] = @$propAme->id;
            }
            if ($getproperty_details->booking_type == 1) {
                $bookingtp = "Entire Place";
            } else if ($getproperty_details->booking_type == 2) {
                $bookingtp = "Private Room";
            }

            $data['user_id'] = $this->request->session()->read('Auth.User.id');
            $data['property_id'] = $id;
            $data['sub_id'] = 1;
            $data['Top'] = @json_encode($data['Top']);
            $data['Parking'] = @json_encode($data['Parking']);
            $data['Services'] = @json_encode($data['Services']);
            $data['Accessibility'] = @json_encode($data['Accessibility']);
            $data['Facilities'] = @json_encode($data['Facilities']);
            $data['Activities'] = @json_encode($data['Activities']);
            $data['Food'] = @json_encode($data['Food']);
            $data['Kitchen'] = @json_encode($data['Kitchen']);
            $data['Media'] = @json_encode($data['Media']);
            $data['Meetings'] = @json_encode($data['Meetings']);
            $data['Essentials'] = @json_encode($data['Essentials']);
            $data['Pools'] = @json_encode($data['Pools']);
            $data['Pools'] = @json_encode($data['Pools']);
            $data['property_type'] = '[' . @json_encode($getproperty_details->property_type) . ']';
            $data['booking_type'] = '[' . @json_encode($bookingtp) . ']';

            $ameniData = $this->ExtranetsUserPropertyAmenities->patchEntity($ameniData, $data);
            $this->ExtranetsUserPropertyAmenities->save($ameniData);

            for ($i_cn = 0; $i_cn < $availableBeds->count(); $i_cn++) {

                $sub_prop = $this->ExtranetsUserPropertyAmenities->find('all')->where(['property_id' => $id, 'sub_id' => $data['subid' . ($i_cn + 2)]])->first();
                if (!empty($sub_prop->id)) {
                    $subIdd = $sub_prop->id;
                }
                $ameniData = $this->ExtranetsUserPropertyAmenities->newEntity();
                $data2s['user_id'] = $this->request->session()->read('Auth.User.id');
                $data2s['property_id'] = $id;
                $data2s['id'] = @$subIdd;
                $data2s['sub_id'] = $data['subid' . ($i_cn + 2)];
                $data2s['Top'] = @json_encode($data['Top' . ($i_cn + 2)]);
                $data2s['Parking'] = @json_encode($data['Parking' . ($i_cn + 2)]);
                $data2s['Services'] = @json_encode($data['Services' . ($i_cn + 2)]);
                $data2s['Accessibility'] = @json_encode($data['Accessibility' . ($i_cn + 2)]);
                $data2s['Facilities'] = @json_encode($data['Facilities' . ($i_cn + 2)]);
                $data2s['Activities'] = @json_encode($data['Activities' . ($i_cn + 2)]);
                $data2s['Food'] = @json_encode($data['Food' . ($i_cn + 2)]);
                $data2s['Kitchen'] = @json_encode($data['Kitchen' . ($i_cn + 2)]);
                $data2s['Media'] = @json_encode($data['Media' . ($i_cn + 2)]);
                $data2s['Meetings'] = @json_encode($data['Meetings' . ($i_cn + 2)]);
                $data2s['Essentials'] = @json_encode($data['Essentials' . ($i_cn + 2)]);
                $data2s['Pools'] = @json_encode($data['Pools' . ($i_cn + 2)]);
                $data2s['property_type'] = '[' . @json_encode($getproperty_details->property_type) . ']';
                $data2s['booking_type'] = '[' . @json_encode($bookingtp) . ']';

                $ameniData = $this->ExtranetsUserPropertyAmenities->patchEntity($ameniData, $data2s);
                $this->ExtranetsUserPropertyAmenities->save($ameniData);
            }

            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                //$this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                //$this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/pricing/' . @$id);
            }
        }

        $this->set(compact('propAme', 'id', 'availableBeds', 'mainPro'));
    }

    public function pricing($id = null) {

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Pricing | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));
        if ($id == null) {
            if (!empty($this->request->session()->read('PropertyId'))) {
                $id = $this->request->session()->read('PropertyId');
            }
        }
        if ($id != null) {
            //$propPri = $this->ExtranetsUserPropertyPricing->find('all')->where(['property_id' => $id])->first();
            $availableBeds = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id' => $id]);
        }

        if ($this->request->is('post')) {
            $data = $this->request->data();
            // pj($data);
            // exit;
            for ($i = 1; $i <= $data['count']; $i++) {
                $descrData = $this->ExtranetsUserPropertyPricing->newEntity();

                $data['user_id'] = $this->request->session()->read('Auth.User.id');
                $data['property_id'] = $id;
                $data['sub_id'] = @$data['sub_id' . $i];
                $data['price_main'] = @$data['price_main' . $i];
                $data['people'] = @$data['people' . $i];
                $data['two'] = @$data['two' . $i];
                $data['morethree'] = @$data['morethree' . $i];
                $descrData->long_days = $data['long_days'] = (!empty($data['long_days' . $i])) ? @$data['long_days' . $i] : NULL;
                $descrData->fix_price = $data['fix_price'] = (!empty($data['fix_price' . $i])) ? @$data['fix_price' . $i] : NULL;
                $data['boost_price'] = !empty($data['boost_price']) ? $data['boost_price'] : 0;
                if ($id != null) {
                    $propPri = $this->ExtranetsUserPropertyPricing->find('all')->where(['property_id' => $id, 'sub_id' => $data['sub_id' . $i]])->first();
                    $data['id'] = !empty($propPri->id) ? $propPri->id : '';
                }
                $descrData = $this->ExtranetsUserPropertyPricing->patchEntity($descrData, $data);

                $this->ExtranetsUserPropertyPricing->save($descrData);
            }
            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                //$this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                //$this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/availability/' . @$id);
            }
        }
        $this->set(compact('propPri', 'id', 'availableBeds'));
    }

    public function availability($id = null) {

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Availability | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));

        if ($id == null) {
            if (!empty($this->request->session()->read('PropertyId'))) {
                $id = $this->request->session()->read('PropertyId');
            }
        }

        if (!empty($id)) {
            $availableBeds = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id' => $id]);
            $propAvailability = $this->ExtranetsUserPropertyAvailability->find('all')->where(['property_id' => $id])->first();
        }

        if ($this->request->is('post')) {
            $data = $this->request->data();
            //pj($data);
            // exit;
            for ($i = 1; $i <= $data['counTER']; $i++) {
                $availData = $this->ExtranetsUserPropertyAvailability->newEntity();
                $data['user_id'] = $this->request->session()->read('Auth.User.id');
                $data['property_id'] = $id;
                $data['sub_id'] = $data['sub_id' . $i];
                $data['future_book'] = $data['future_book' . $i];
                $data['cancellation'] = $data['cancellation' . $i];
                $data['min_night'] = $data['min_night' . $i];
                $data['max_night'] = $data['max_night' . $i];
                $data['max_night_value'] = $data['max_night_value' . $i];
                $data['reservationRequestType'] = $data['reservationRequestType' . $i];
                $data['blocked_date'] = $data['blocked_date' . $i];
                if ($id != null) {
                    $availDatass = $this->ExtranetsUserPropertyAvailability->find('all')->where(['property_id' => $id, 'sub_id' => $data['sub_id' . $i]])->first();
                    $data['id'] = !empty($availDatass->id) ? $availDatass->id : '';
                }
                $data['blocked_date_value'] = '';
                foreach (explode(',', $data['dates1' . $i]) as $val) {
                    $data['blocked_date_value'] .= date_format(date_create($val), 'Y/m/d') . ',';
                }
                foreach (explode(',', $data['dates2' . $i]) as $val) {
                    $data['blocked_date_value'] .= date_format(date_create($val), 'Y/m/d') . ',';
                }
                foreach (explode(',', $data['dates3' . $i]) as $val) {
                    $data['blocked_date_value'] .= date_format(date_create($val), 'Y/m/d') . ',';
                }

                if ($data['max_night' . $i] != 2) {
                    $data['max_night_value'] = 1;
                }

                if ($data['blocked_date' . $i] != 2) {
                    $data['blocked_date_value'] = '';
                }


                $data['calendarName'] = ''; //json_encode($data['calendarName']);

                $data['calendarAddress'] = ''; //json_encode($data['calendarAddress']);
                $availData = $this->ExtranetsUserPropertyAvailability->patchEntity($availData, $data);

                $this->ExtranetsUserPropertyAvailability->save($availData);
            }
            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                //$this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                //$this->Flash->success(__('Property description added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/photos/' . @$id);
            }
        }
        $this->set(compact('propAvailability', 'id', 'availableBeds'));
    }

    public function photos($id = null) {

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Photos | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));

        $pro_pics = $this->ExtranetsUserPropertyPhotos->find('all')->where(['property_id' => $id])->toArray();
        $availableBeds = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id' => $id]);
        $propertyTypeName = $this->ExtranetsUserProperty->find('all')->where(['id' => $id])->first();
        if ($this->request->is('post')) {
            $data = $this->request->data();
            if ($data['saveexit'] == "save exit") {
                $this->request->session()->write('PropertyId', '');
                //$this->Flash->success(__('Property Photos added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');
            }
            if ($data['saveexit'] == "next") {
                //$this->Flash->success(__('Property Photos added successfully.'));
                return $this->redirect(HTTP_ROOT . 'extranets/profile/' . @$id);
            }
        }
        $this->set(compact('id', 'pro_pics', 'availableBeds', 'propertyTypeName'));
    }

    public function uploadphoto() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        //pj($data);exit;
        $userID = $this->request->session()->read('Auth.User.id');
        //ExtranetsUserPropertyPhotos
        $arr_ext = explode(".", $data['file']['name']);
        $extname = end($arr_ext);
        if ($extname == 'jpg' || $extname == "JPG" || $extname == "gif" || $extname == "png" || $extname == "PNG" || $extname == "JPEG" || $extname == "jpeg") {
            if ($data['file']['size'] >= 90485760) {
                echo json_encode(['status' => 'error', 'msg' => __('Photo size exceeded. Photo must be under 10MB.')]);
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
        $this->ExtranetsUserPropertyPhotos->updateAll(['is_main' => 0], ['property_id' => $pro_id->property_id, 'sub_id' => $pro_id->sub_id]);
        $this->ExtranetsUserPropertyPhotos->updateAll(['is_main' => 1], ['id' => $id]);
        echo json_encode(['status' => 'Success', 'msg' => 'Image set as main.']);
        exit;
    }

    public function getBedrooms() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        //echo $data['total'];
        if ($data['id'] != "") {
            $bedDet_count = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id' => $data['id']])->count();
        }
        $bedDet_count_cookie = $this->ExtranetsUserPropertyBed->find('all')->where(['temp_cookie' => $this->request->session()->read('For_Bed')])->count();
        for ($i = 1; $i <= ($data['total'] - ($bedDet_count_cookie + @$bedDet_count)); $i++) {
            $newEntry = $this->ExtranetsUserPropertyBed->newEntity();
            $newEntry->temp_cookie = $this->request->session()->read('For_Bed');
            $newEntry->user_id = $this->request->session()->read('Auth.User.id');
            $newEntry->num_bed = 1;
            $newEntry->beds = "single bed";
            $this->ExtranetsUserPropertyBed->save($newEntry);
        }
        $bed_cookie_Det = $this->ExtranetsUserPropertyBed->find('all')->where(['temp_cookie' => $this->request->session()->read('For_Bed')]);
        if ($data['id'] != "") {
            $bedDet_count = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id' => $data['id']])->count();
            $id = $data['id'];
            if ($data['total'] == 1) {
                $data['total'] = $bedDet_count;
            }

            $bedDet = $this->ExtranetsUserPropertyBed->find('all')->where(['property_id' => $data['id']]);
        }
        $this->set(compact('data', 'bedDet', 'bedDet_count', 'id', 'bedDet_count_cookie', 'bed_cookie_Det'));
    }

    public function setBedrooms() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;

        $newEntry = $this->ExtranetsUserPropertyBed->newEntity();
        $newEntry->id = $data['id'];
        $newEntry->temp_cookie = $this->request->session()->read('For_Bed');
        $newEntry->user_id = $this->request->session()->read('Auth.User.id');
        $newEntry->num_bed = $data['bedNum'];
        $newEntry->beds = $data['bedTyp'];
        $newEntry->bed_name = $data['bedName'];
        $newEntry->room_count = $data['room_count'];
        $this->ExtranetsUserPropertyBed->save($newEntry);
        // print_r($data);
        //echo json_encode(['status' => 'success']);
        $pricetb_dt = $this->ExtranetsUserPropertyPricing->find('all')->where(['sub_id' => $data['id']])->count();

        if ($pricetb_dt >= 1) {

            $main_bed = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => $data['id']])->first(); //pj($main_bed);
            $sub_person_total = 0;
            if (($main_bed->beds == 'single bed') || ($main_bed->beds == 'futon')) {
                $main_person = $main_bed->num_bed * 1;
            }

            if (($main_bed->beds == 'double bed') || ($main_bed->beds == 'semi double-bed') || ($main_bed->beds == 'queen bed') || ($main_bed->beds == 'semi double-bed') || ($main_bed->beds == 'king bed') || ($main_bed->beds == 'super king bed') || ($main_bed->beds == 'bunk bed') || ($main_bed->beds == 'sofa bed')) {
                $main_person = $main_bed->num_bed * 2;
            }

            $subData = $this->ExtranetsUserPropertySubBeds->find('all')->where(['main_bed_id' => $data['id']]);

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
            $this->ExtranetsUserPropertyPricing->updateAll(['people' => $total], ['sub_id' => $data['id']]);
        }
        echo json_encode(['status' => $newEntry]);
        exit;
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

        $data = $this->request->data;
        $resultset = $this->HotelCountryCitys->find('all')->where(['state_name' => $data['mainid']]);



        $vals = '<option selected disabled>Select Município</option>';
        foreach ($resultset as $val) {
            $vals .= '<option selected value="' . $val->city_name . '">' . $val->city_name . '</option>';
        }
        echo $vals;
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
            //$this->Flash->success(__('Property Activated successfully.'));
        }
        if ($status == "deactive") {
            $this->ExtranetsUserProperty->updateAll(['active_ststus' => 0], ['user_id' => $userID, 'id' => $id]);
            //$this->Flash->success(__('Property Deactivated successfully.'));
        }
        return $this->redirect(HTTP_ROOT . 'extranets/dashboard/Listings');

        exit;
    }

    public function bookings() {

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'My Bookings | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));

        $userID = $this->request->session()->read('Auth.User.id');

        if (empty($_GET['q']) || $_GET['q'] == 'all') {
            $getBookingDetails = $this->HotelBookingDetails->find('all')->where(['property_user_id' => $userID]);
            $getBookingOrder = $this->HotelBookingDetails->find('all')->where(['property_user_id' => $userID])->count();
            $getBookingPrice = $this->HotelBookingDetails->find('all')->where(['property_user_id' => $userID, 'payment_status IN' => [3, 5]]);
            $new = $this->HotelBookingDetails->find('all')->where(['property_user_id' => $userID])->group(['user_id'])->count();
        }

        if (!empty($_GET['q']) && $_GET['q'] == 'today') {
            $getBookingDetails = $this->HotelBookingDetails->find('all')->where(['booking_dt' => date('Y-m-d'), 'property_user_id' => $userID]);
            $getBookingOrder = $this->HotelBookingDetails->find('all')->where(['booking_dt' => date('Y-m-d'), 'property_user_id' => $userID])->count();
            $getBookingPrice = $this->HotelBookingDetails->find('all')->where(['booking_dt' => date('Y-m-d'), 'property_user_id' => $userID, 'payment_status IN' => [3, 5]]);
            $new = $this->HotelBookingDetails->find('all')->where(['booking_dt' => date('Y-m-d'), 'property_user_id' => $userID])->group(['user_id'])->count();
        }

        if (!empty($_GET['q']) && $_GET['q'] == 'yesterday') {
            $getBookingDetails = $this->HotelBookingDetails->find('all')->where(['booking_dt' => date('Y-m-d', strtotime('-1 days')), 'property_user_id' => $userID]);
            $getBookingOrder = $this->HotelBookingDetails->find('all')->where(['booking_dt' => date('Y-m-d', strtotime('-1 days')), 'property_user_id' => $userID])->count();
            $getBookingPrice = $this->HotelBookingDetails->find('all')->where(['booking_dt' => date('Y-m-d', strtotime('-1 days')), 'property_user_id' => $userID, 'payment_status IN' => [3, 5]]);
            $new = $this->HotelBookingDetails->find('all')->where(['booking_dt' => date('Y-m-d', strtotime('-1 days')), 'property_user_id' => $userID])->group(['user_id'])->count();
        }

        if (!empty($_GET['q']) && $_GET['q'] == 'weekly') {
            $getBookingDetails = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-7 days')), 'booking_dt <=' => date('Y-m-d'), 'property_user_id' => $userID]);
            $getBookingOrder = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-7 days')), 'booking_dt <=' => date('Y-m-d'), 'property_user_id' => $userID])->count();
            $getBookingPrice = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-7 days')), 'booking_dt <=' => date('Y-m-d'), 'property_user_id' => $userID, 'payment_status IN' => [3, 5]]);
            $new = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-7 days')), 'booking_dt <=' => date('Y-m-d'), 'property_user_id' => $userID])->group(['user_id'])->count();
        }

        if (!empty($_GET['q']) && $_GET['q'] == 'monthly') {
            $getBookingDetails = $this->HotelBookingDetails->find('all')->where(['MONTH(booking_dt)' => date('m-Y'), 'property_user_id' => $userID]);
            $getBookingOrder = $this->HotelBookingDetails->find('all')->where(['MONTH(booking_dt)' => date('m-Y'), 'property_user_id' => $userID])->count();
            $getBookingPrice = $this->HotelBookingDetails->find('all')->where(['MONTH(booking_dt)' => date('m-Y'), 'property_user_id' => $userID, 'payment_status IN' => [3, 5]]);
            $new = $this->HotelBookingDetails->find('all')->where(['MONTH(booking_dt)' => date('m-Y'), 'property_user_id' => $userID])->group(['user_id'])->count();
        }


        if (!empty($_GET['q']) && $_GET['q'] == '6month') {
            $getBookingDetails = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-7 months')), 'booking_dt <=' => date('Y-m-d', strtotime('-1 months')), 'property_user_id' => $userID]);
            $getBookingOrder = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-7 months')), 'booking_dt <=' => date('Y-m-d', strtotime('-1 months')), 'property_user_id' => $userID])->count();
            $getBookingPrice = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-7 months')), 'booking_dt <=' => date('Y-m-d', strtotime('-1 months')), 'property_user_id' => $userID, 'payment_status IN' => [3, 5]]);
            $new = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-7 months')), 'booking_dt <=' => date('Y-m-d', strtotime('-1 months')), 'property_user_id' => $userID])->group(['user_id'])->count();
        }

        if (!empty($_GET['q']) && $_GET['q'] == '3month') {
            $getBookingDetails = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-4 months')), 'booking_dt <=' => date('Y-m-d', strtotime('-1 months')), 'property_user_id' => $userID]);
            $getBookingOrder = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-4 months')), 'booking_dt <=' => date('Y-m-d', strtotime('-1 months')), 'property_user_id' => $userID])->count();
            $getBookingPrice = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-4 months')), 'booking_dt <=' => date('Y-m-d', strtotime('-1 months')), 'property_user_id' => $userID, 'payment_status IN' => [3, 5]]);
            $new = $this->HotelBookingDetails->find('all')->where(['booking_dt >=' => date('Y-m-d', strtotime('-4 months')), 'booking_dt <=' => date('Y-m-d', strtotime('-1 months')), 'property_user_id' => $userID])->group(['user_id'])->count();
        }

        if (!empty($_GET['q']) && $_GET['q'] == 'yearly') {
            $getBookingDetails = $this->HotelBookingDetails->find('all')->where(['YEAR(booking_dt)' => date('Y'), 'property_user_id' => $userID]);
            $getBookingOrder = $this->HotelBookingDetails->find('all')->where(['YEAR(booking_dt)' => date('Y'), 'property_user_id' => $userID])->count();
            $getBookingPrice = $this->HotelBookingDetails->find('all')->where(['YEAR(booking_dt)' => date('Y'), 'property_user_id' => $userID, 'payment_status IN' => [3, 5]]);
            $new = $this->HotelBookingDetails->find('all')->where(['YEAR(booking_dt)' => date('Y'), 'property_user_id' => $userID])->group(['user_id'])->count();
        }

        //echo $new;
        //echo $old;


        $this->set(compact('getBookingOrder', 'getBookingPrice', 'getBookingDetails', 'new', 'old'));
    }

    public function bookingDetails($id = null) {

        $pageDetails = new \stdClass();
        $pageDetails->meta_title = $id . ' | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));

        $all_data = $this->HotelBookingDetails->find('all')->where(['booking_no' => $id])->first();
        if (!empty($_GET['token'])) {
            $this->HotelBookingDetails->updateAll(['user_htl_reach_status' => $_GET['token']], ['booking_no' => $id]);
            if ($_GET['token'] == 3) {
                $rm_cnt = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => $all_data->room_id])->first();
                $this->ExtranetsUserPropertyBed->updateAll(['room_count' => $rm_cnt->room_count + $all_data->numb_rooms], ['id' => $all_data->room_id]);
                $this->HotelBookingDetails->updateAll(['payment_status' => 4], ['booking_no' => $id]);
            }
            if ($_GET['token'] == 5) {
                $this->HotelBookingDetails->updateAll(['user_htl_reach_status' => 5, 'refund_date' => date('Y-m-d h:i:s')], ['booking_no' => $id]);
            }
            if ($_GET['token'] == 2) {
                $this->HotelBookingDetails->updateAll(['user_htl_reach_status' => 2, 'payment_status' => 3], ['booking_no' => $id]);
                // if($all_data->payment_method == 'No Alojamento'){
                //     $this->HotelBookingDetails->updateAll(['property_payment_status' => 2], ['booking_no' => $id]);
                // }
            }
            if ($_GET['token'] == 1) {
                if ($all_data->cancel_policy == "Flexible") {
                    $this->HotelBookingDetails->updateAll(['payment_status' => 4], ['booking_no' => $id]);
                }
                $this->HotelBookingDetails->updateAll(['user_htl_reach_status' => 1], ['booking_no' => $id]);
            }
            return $this->redirect(HTTP_ROOT . 'extranets/booking_details/' . $id);
        }

        $all_msg = $this->UserNotifications->find('all')->where(['booking_no' => $id]);

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
            return $this->redirect(HTTP_ROOT . 'extranets/bookingDetails/' . @$id);
        }


        $this->set(compact('all_data', 'id', 'all_msg'));
    }

    public function reviews($review = null) {
        $pageDetails = new \stdClass();
        $pageDetails->meta_title = 'Reviews | Alegro Extranet';
        $pageDetails->meta_keyword = SITE_NAME;
        $pageDetails->meta_desc = SITE_NAME;
        $this->set(compact('pageDetails'));

        $allProperty = null;
        $review = @$_GET['q'];
        $user_id = $this->request->session()->read('Auth.User.id');
        $property = $this->ExtranetsUserProperty->find('all')->where(['user_id' => $user_id]);
        if ($property->count() > 0) {
            $allProperty = $this->ExtranetsUserProperty->find('all')->where(['user_id' => $user_id])->extract('id');
            $allProperty = $allProperty->toArray();

//            $query = $this->HotelReviews->find('all')->where(['property_id IN' => $allProperty])->order(['id' => 'DESC']);
//            if ($review == 'oldest') {
//                $query = $this->HotelReviews->find('all')->where(['property_id IN' => $allProperty])->order(['id' => 'ASC']);
//            }
            if (!empty($review)) {
                $query = $this->HotelReviews->find('all')->where(['property_id' => $review])->order(['id' => 'DESC']);
                $allReviewGet = $this->paginate($query);
            } else {
                if (!empty($allProperty)) {
                    foreach ($allProperty as $pro_data) {
                        $rev = $pro_data;
                        break;
                    }
                    return $this->redirect(HTTP_ROOT . 'extranets/reviews?q=' . $rev);
                }
            }
        }
        $this->set(compact('review', 'allProperty', 'allReviewGet'));
    }

    public function setSubBed() {

        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        $newEntry = $this->ExtranetsUserPropertySubBeds->newEntity();
        $newEntry->user_id = $data['user_id'];
        $newEntry->main_bed_id = $data['bed_id'];
        $newEntry->property_id = $data['property_id'];
        $newEntry->temp_cookie = $data['cookie'];
        $last = $this->ExtranetsUserPropertySubBeds->save($newEntry);
        echo json_encode(['status' => 'success', 'id' => $last->id]);
        exit;
    }

    public function updateSubBed() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        $this->ExtranetsUserPropertySubBeds->updateAll([$data['col'] => $data['val']], ['id' => $data['id']]);

        $main_bed_id = $this->ExtranetsUserPropertySubBeds->find('all')->where(['id' => $data['id']])->first();
        $pricetb_dt = $this->ExtranetsUserPropertyPricing->find('all')->where(['sub_id' => $main_bed_id->main_bed_id])->count();

        if ($pricetb_dt >= 1) {

            $main_bed = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => $main_bed_id->main_bed_id])->first(); //pj($main_bed);
            $sub_person_total = 0;
            if (($main_bed->beds == 'single bed') || ($main_bed->beds == 'futon')) {
                $main_person = $main_bed->num_bed * 1;
            }

            if (($main_bed->beds == 'double bed') || ($main_bed->beds == 'semi double-bed') || ($main_bed->beds == 'queen bed') || ($main_bed->beds == 'semi double-bed') || ($main_bed->beds == 'king bed') || ($main_bed->beds == 'super king bed') || ($main_bed->beds == 'bunk bed') || ($main_bed->beds == 'sofa bed')) {
                $main_person = $main_bed->num_bed * 2;
            }

            $subData = $this->ExtranetsUserPropertySubBeds->find('all')->where(['main_bed_id' => $main_bed_id->main_bed_id]);

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
            $this->ExtranetsUserPropertyPricing->updateAll(['people' => $total], ['sub_id' => $main_bed_id->main_bed_id]);
        }


        //echo json_encode(['status' => 'success']);
        echo json_encode(['status' => $data]);
        exit;
    }

    public function deleteSubBed() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        $this->ExtranetsUserPropertySubBeds->deleteAll(['id' => $data['id']]);
        echo json_encode(['status' => 'success']);
        exit();
    }

    public function deleteBedDetails() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        $alldata = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => $data['id']])->first();
        $ids = $alldata->property_id;
        $this->ExtranetsUserProperty->updateAll(['bedrooms' => $data['remain']], ['id' => $ids]);
        $this->ExtranetsUserPropertyBed->deleteAll(['id' => $data['id']]);
        $this->ExtranetsUserPropertySubBeds->deleteAll(['main_bed_id' => $data['id']]);
        $this->ExtranetsUserPropertyPricing->deleteAll(['sub_id' => $data['id']]);
        echo json_encode(['status' => 'success']);
        exit();
    }

    public function loadmap($country = null) {
        $this->viewBuilder()->layout('');
        $this->set(compact('country'));
    }

    public function changeDate() {
        $this->viewBuilder()->layout('ajax');
        $data = $this->request->data;
        $cnt = $this->HotelBookingDetails->find('all')->where(['booking_no' => $data['id']])->count();
        $all = $this->HotelBookingDetails->find('all')->where(['booking_no' => $data['id']])->first();

        $htl_bed = $this->ExtranetsUserPropertyBed->find('all')->where(['id' => $all->room_id, 'room_count >=' => $all->numb_rooms])->first();
        if (is_null($htl_bed)) {
            echo json_encode(['status' => 'error1']);
            exit;
        }

        if (empty($cnt)) {
            echo json_encode(['status' => 'error']);
            exit;
        }


        $dateGap = $this->Custom->dateGap(str_replace('/', '-', $data['checkIn']), str_replace('/', '-', $data['checkOut']));
        $longDay = $this->ExtranetsUserPropertyPricing->find('all')->where(['sub_id' => $all->room_id])->first();
        $longDays = 10000;
        $boosted_price = $longDay->boost_price;
        $service_fee_type = 2;
        if ($boosted_price == 0) {
            $servicefee_s = $this->HotelServiceFee->find('all')->where(['id' => 1])->first();
            $boosted_price = $servicefee_s->fee;
            $service_fee_type = 1;
        }


        $fee1 = $this->FeaturedServiceFee->find('all')->where(['property_id' => $all->property_id]);
        $sfee = 0;
        if (!empty($fee1->count())) {
            $sfee = $fee1->first()->featured_fee;
        }

        $htl_fixrm_pric = $longDay->fix_price;
        $htl_pri = $longDay->price_main;
        if ($sfee > 0) {
            $htl_pri = $longDay->price_main - ($longDay->price_main * ($sfee / 100));
        }


        if (!empty($longDay->long_days)) {
            $longDays = $longDay->long_days;
        }
        if ($dateGap >= $longDays) {
            $ttfee = $all->numb_rooms * ($htl_fixrm_pric * $dateGap);
        } else {
            $ttfee = $all->numb_rooms * ($htl_pri * $dateGap);
        }

        $to = $all->email;
        $fromvalue = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
        $from = $fromvalue->value;
        $subject = 'Hotel Reservation date changed by owner ';
        $headerBg = HTTP_ROOT . 'img/bg-1.png';
        $msg = '<table border="0" cellpadding="0" cellspacing="0" width="100%" style="table-layout:fixed;background-color:#F9F9F9;" id="bodyTable">
    <tr>
        <td align="center" valign="top" style="padding-right:10px;padding-left:10px;" id="bodyCell">

            <table border="0" cellpadding="0" cellspacing="0" style="max-width:600px;" width="100%" class="wrapperBody">
                <tr>
                    <td align="center" valign="top">

                        <table border="0" cellpadding="0" cellspacing="0" style="background-color:#FFFFFF;border-color:#E5E5E5; border-style:solid; border-width:0 1px 1px 1px;" width="100%" class="tableCard">



                            <tr>
                                <td align="center" valign="top" style="padding-left:80px;padding-right:120px;" class="containtTable">



                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableTitleDescription">

                                            <tr style="padding-bottom:20px;color:#666666; font-family:\'Open Sans\', Helvetica, Arial, sans-serif; font-size:16px; font-weight:500; font-style:normal; letter-spacing:normal; line-height:22px; text-transform:none;">
                                            Check in date : ' . date_format(date_create(str_replace('/', '-', $data['checkIn'])), 'Y-m-d') . '<br>Check out date: ' . date_format(date_create(str_replace('/', '-', $data['checkOut'])), 'Y-m-d') . '<br>
                                           </tr>
                                    </table>

                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="tableButton">
                                        <tr>
                                            <td align="center" valign="top" style="padding-top:20px;padding-bottom:20px;">
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>

                                 <tr style="background: url(' . $headerBg . ') left top no-repeat; background-size: 100%; ">
                    <td>
                        <img src="' . HTTP_ROOT . 'img/extranet/header-logo.png" style="float: left; margin-top: 14px;display:block;" width="200px;"  alt="">
                        <ul style="float: right; text-align: right;">
                            <li style="display:block; color: #fff; font-size: 15px;">Lar do Patriota | Luanda, Belas, Angola</li>
                            <li style="display:block; color: #fff; padding: 6px 0; font-size: 15px;">www.alegro.co.ao | info@alegro.co.ao</li>
                            <li style="display:block; color: #fff; font-size: 15px;">+555 7 789-1234 | +555 7 789-1344</li>
                        </ul>
                    </td>
                </tr>
            </table>
';
        $this->Custom->sendEmail($to, $from, $subject, $msg);

        $this->HotelBookingDetails->updateAll(['check_in' => date_format(date_create(str_replace('/', '-', $data['checkIn'])), 'Y-m-d'), 'check_out' => date_format(date_create(str_replace('/', '-', $data['checkOut'])), 'Y-m-d'), 'user_htl_reach_status' => 4, 'change_date_on' => date('Y-m-d H:i:s'), 'total_room_fee' => $ttfee, 'total_cost' => $ttfee, 'service_fee' => $boosted_price, 'service_fee_type' => $service_fee_type], ['booking_no' => $data['id']]);
        echo json_encode(['status' => 'success']);
        exit;
    }

}
