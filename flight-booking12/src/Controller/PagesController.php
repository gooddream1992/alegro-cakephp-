<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;

class PagesController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Custom');
        $this->loadModel('Pages');
        $this->loadModel('Maps');
        $this->loadModel('Settings');
        $this->loadModel('Testimonials');
        $this->loadModel('Faqs');
    }

    public function beforeFilter(Event $event) {
        $this->Auth->allow(['aboutus', 'privacyPolicy', 'termsCondition', 'contactUs', 'faq', 'cookiesPolicy']);
    }

    public function aboutus() {
        $pageDetails = new \stdClass();
        $lan = $this->request->session()->read("lan");
        if (empty($lan)) {
            $lan = 'PT';
        }

        $this->viewBuilder()->layout('default');
        $pageDetails12 = $this->Pages->find('all')->where(['Pages.id' => 1])->first()->toArray();

        $pageDetails->page_title = $pageDetails12['page_title' . 'z' . strtolower($lan)];
        $pageDetails->page_desc = $pageDetails12['page_desc' . 'z' . strtolower($lan)];
        $pageDetails->meta_title = $pageDetails12['meta_title'];
        $pageDetails->meta_keyword = $pageDetails12['meta_keyword'];
        $pageDetails->meta_desc = $pageDetails12['meta_desc'];

        $testimonial = $this->Testimonials->find('all')->where(['Testimonials.is_active' => 1]);
        $this->set(compact('pageDetails', 'testimonial'));
    }

    public function faq() {
        $lan = $this->request->session()->read("lan");
        $pageDetails = new \stdClass();
        if (empty($lan)) {
            $lan = 'PT';
        }
        $this->viewBuilder()->layout('default');
        $pageDetails12 = $this->Pages->find('all')->where(['Pages.id' => 11])->first()->toArray();
        
        
        if ($lan == 'EN') {
            $getData = $this->Faqs->find('all')->where(['Faqs.is_active' => 1, 'Faqs.language' => 'EN'])->group('Faqs.category');
             $i=1;
            foreach($getData as $fq){
                $dataStore[$i]= $this->Faqs->find('all')->where(['Faqs.is_active' => 1, 'Faqs.language' => 'EN','Faqs.category'=>$fq->category]);
            $i++; }
            
            
        } elseif ($lan == 'PT') {
            $getData = $this->Faqs->find('all')->where(['Faqs.is_active' => 1, 'Faqs.language' => 'PT'])->group('Faqs.category');
            $i=1;
            foreach($getData as $fq){
                $dataStore[$i]= $this->Faqs->find('all')->where(['Faqs.is_active' => 1, 'Faqs.language' => 'PT','Faqs.category'=>$fq->category]);
            $i++; }
        } elseif ($lan == 'FR') {

            $getData = $this->Faqs->find('all')->where(['Faqs.is_active' => 1, 'Faqs.language' => 'FR'])->group('Faqs.category');
            $i=1;
            foreach($getData as $fq){
                $dataStore[$i]= $this->Faqs->find('all')->where(['Faqs.is_active' => 1, 'Faqs.language' => 'FR','Faqs.category'=>$fq->category]);
            $i++; }
        }

        $pageDetails->page_title = $pageDetails12['page_title' . 'z' . strtolower($lan)];
        $pageDetails->page_desc = $pageDetails12['page_desc' . 'z' . strtolower($lan)];
        $pageDetails->meta_title = $pageDetails12['meta_title'];
        $pageDetails->meta_keyword = $pageDetails12['meta_keyword'];
        $pageDetails->meta_desc = $pageDetails12['meta_desc'];
        $this->set(compact('pageDetails', 'getData','dataStore'));
    }

    public function airlineInvoices() {
        $lan = $this->request->session()->read("lan");
        if (empty($lan)) {
            $lan = 'PT';
        }
        $this->viewBuilder()->layout('default');
        $pageDetails12 = $this->Pages->find('all')->where(['Pages.id' => 3])->first()->toArray();

        $pageDetails->page_title = $pageDetails12['page_title' . 'z' . strtolower($lan)];
        $pageDetails->page_desc = $pageDetails12['page_desc' . 'z' . strtolower($lan)];
        $pageDetails->meta_title = $pageDetails12['meta_title'];
        $pageDetails->meta_keyword = $pageDetails12['meta_keyword'];
        $pageDetails->meta_desc = $pageDetails12['meta_desc'];
        $this->set(compact('pageDetails'));
    }

    public function companyInvoices() {
        $lan = $this->request->session()->read("lan");
        if (empty($lan)) {
            $lan = 'PT';
        }
        $this->viewBuilder()->layout('default');
        $pageDetails12 = $this->Pages->find('all')->where(['Pages.id' => 2])->first()->toArray();

        $pageDetails->page_title = $pageDetails12['page_title' . 'z' . strtolower($lan)];
        $pageDetails->page_desc = $pageDetails12['page_desc' . 'z' . strtolower($lan)];
        $pageDetails->meta_title = $pageDetails12['meta_title'];
        $pageDetails->meta_keyword = $pageDetails12['meta_keyword'];
        $pageDetails->meta_desc = $pageDetails12['meta_desc'];
        $this->set(compact('pageDetails'));
    }

    public function cookiesPolicy() {
        $pageDetails = new \stdClass();
        $lan = $this->request->session()->read("lan");
        if (empty($lan)) {
            $lan = 'PT';
        }
        $this->viewBuilder()->layout('default');
        $pageDetails12 = $this->Pages->find('all')->where(['Pages.id' => 6])->first()->toArray();

        $pageDetails->page_title = $pageDetails12['page_title' . 'z' . strtolower($lan)];
        $pageDetails->page_desc = $pageDetails12['page_desc' . 'z' . strtolower($lan)];
        $pageDetails->meta_title = $pageDetails12['meta_title'];
        $pageDetails->meta_keyword = $pageDetails12['meta_keyword'];
        $pageDetails->meta_desc = $pageDetails12['meta_desc'];
        $pageDetails->meta_desc = $pageDetails12['meta_desc'];
        $this->set(compact('pageDetails'));
    }

    public function privacyPolicy() {
        $pageDetails = new \stdClass();
        $lan = $this->request->session()->read("lan");
        if (empty($lan)) {
            $lan = 'PT';
        }
        $this->viewBuilder()->layout('default');
        $pageDetails12 = $this->Pages->find('all')->where(['Pages.id' => 4])->first()->toArray();

        $pageDetails->page_title = $pageDetails12['page_title' . 'z' . strtolower($lan)];
        $pageDetails->page_desc = $pageDetails12['page_desc' . 'z' . strtolower($lan)];
        $pageDetails->meta_title = $pageDetails12['meta_title'];
        $pageDetails->meta_keyword = $pageDetails12['meta_keyword'];
        $pageDetails->meta_desc = $pageDetails12['meta_desc'];
        $this->set(compact('pageDetails'));
    }

    public function termsCondition() {
        $pageDetails = new \stdClass();
        $lan = $this->request->session()->read("lan");
        if (empty($lan)) {
            $lan = 'PT';
        }
        $this->viewBuilder()->layout('default');
        $pageDetails12 = $this->Pages->find('all')->where(['Pages.id' => 8])->first()->toArray();

        $pageDetails->page_title = $pageDetails12['page_title' . 'z' . strtolower($lan)];
        $pageDetails->page_desc = $pageDetails12['page_desc' . 'z' . strtolower($lan)];
        $pageDetails->meta_title = $pageDetails12['meta_title'];
        $pageDetails->meta_keyword = $pageDetails12['meta_keyword'];
        $pageDetails->meta_desc = $pageDetails12['meta_desc'];
        $this->set(compact('pageDetails'));
    }

    // public function publishProperties(){
    //     var_dump("dfdsfdsf"); exit;
    //     $query=$this->loadModel('pages');
    //     $data=$result->find();
    //     //$this->set('publishPropertiesData',$data);
    //     foreach($data as $row){
    //         echo $row;
    //     }
    // }


    public function contactUs() {
        $lan = $this->request->session()->read("lan");
        if (empty($lan)) {
            $lan = 'PT';
        }
        $this->viewBuilder()->layout('default1');
        $pageDetails12 = $this->Pages->find('all')->where(['Pages.id' => 12])->first()->toArray();
        $pageDetails->page_title = $pageDetails12['page_title' . 'z' . strtolower($lan)];
        $pageDetails->page_desc = $pageDetails12['page_desc' . 'z' . strtolower($lan)];
        $pageDetails->meta_title = $pageDetails12['meta_title'];
        $pageDetails->meta_keyword = $pageDetails12['meta_keyword'];
        $pageDetails->meta_desc = $pageDetails12['meta_desc'];

        if ($this->request->is('post')) {
            $data = $this->request->data;

            /* Mail sending below code */
            $recaptcha = $_REQUEST['g-recaptcha-response'];
            /* if (empty($recaptcha)) {
              $this->Flash->error(__('Please enter correct captcha code'));
              return $this->redirect(HTTP_ROOT . 'contact-us');
              } else { */
            $emailTemplate = $this->Settings->find('all')->where(['Settings.name' => 'CONTACT_US'])->first();
            $emailFrom = $this->Settings->find('all')->where(['Settings.name' => 'FROM_EMAIL'])->first();
            $toAdminEmail = $this->Settings->find('all')->where(['Settings.name' => 'TO_EMAIL'])->first();
            $from = $emailFrom->value;
            $name = $data['firstName'];
            $email = $data['emailAddress'];
            $phone = $data['phoneNo'];
            $subject = $data['subject'];
            $msg = $data['message'];
            $subject = 'Request message from users';
            $message = $this->Custom->contactUs($emailTemplate->value, $name, $email, $phone, $subject, $msg, SITE_NAME);
            $this->Custom->sendEmail($toAdminEmail->value, $from, $subject, $message);
            /* Mail sending below code */
            $this->Flash->success(__('Thank you, We will get back to you soon.'));
            return $this->redirect(HTTP_ROOT . 'contact-us');
//}
        }
        $map = $this->Maps->find('all')->where(['Maps.id' => 1])->first();
        $this->set(compact('map', 'pageDetails'));
    }

}
