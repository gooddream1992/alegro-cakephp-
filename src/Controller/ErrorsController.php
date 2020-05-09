<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Request;

class ErrorsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('error404','error500');
    }

    public function error404() {
        $this->layout = 'default';
        $this->loadModel('Users');
        $this->loadModel('UserDetails');
        // echo $user_id = $this->Auth->user('id'); exit;
        if (isset($user_id) && !empty($user_id)) {
            $profilePhots = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
        }
        $this->set(compact('profilePhots'));
    }
    public function error500() {
        $this->layout = 'default';
        $this->loadModel('Users');
        $this->loadModel('UserDetails');
        // echo $user_id = $this->Auth->user('id'); exit;
        if (isset($user_id) && !empty($user_id)) {
            $profilePhots = $this->Users->find('all')->contain('UserDetails')->where(['Users.id' => $this->Auth->user('id')])->first();
        }
        $this->set(compact('profilePhots'));
    }
    

}
