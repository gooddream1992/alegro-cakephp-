<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\I18n\I18n;

class AppController extends Controller {

    public function initialize() {
        parent::initialize();
        // date_default_timezone_set('Asia/Kolkata');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadModel('Users');

        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ]
        ]);
        if ($this->request->params['controller'] == "Extranets") {
            $this->loadComponent('Auth', [
                'loginRedirect' => ['controller' => 'Extranets', 'action' => 'index'],
                'logoutRedirect' => ['controller' => 'Extranets', 'action' => 'index',]
            ]);
        } else {
            $this->loadComponent('Auth', [
                'loginRedirect' => ['controller' => 'Users', 'action' => 'index'],
                'logoutRedirect' => ['controller' => 'Users', 'action' => 'index',]
            ]);
        }
    }

    public function beforeRender(Event $event) {
        $type = $this->Auth->user('type');
        $name = $this->Auth->user('name');
        $email = $this->Auth->user('email');
        $user_id = $this->Auth->user('id');
        $created_dt = $this->Auth->user('created_dt');
        if (isset($user_id) && !empty($user_id)) {
            $profilePhots = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
            $this->request->session()->write('profilePhoto', $profilePhots->user_detail->profile_photo);
            $this->request->getSession()->read('profilePhoto');
        }
        if (empty($this->request->session()->read("lan"))) {
            $this->request->session()->write("lan", "PT");
        }





        if (isset($_REQUEST['redirect']) && !empty($_REQUEST['redirect'])) {
            $redirect = $_REQUEST['redirect'];
            if ($redirect) {
                return $this->redirect(HTTP_ROOT);
            }
        }

        if ($this->request->session()->read("lan") == 'PT') {
            $lan = 'pt_PT';
        }
        if ($this->request->session()->read("lan") == 'EN') {
            $lan = 'en_US';
        }
        if ($this->request->session()->read("lan") == 'FR') {
            $lan = 'fr_FR';
        }
        // echo $lan;
        //  echo __('msg');

        I18n::setLocale($lan);



        $this->set(compact('type', 'name', 'email', 'user_id', 'created_dt', 'profilePhots'));
    }

}
