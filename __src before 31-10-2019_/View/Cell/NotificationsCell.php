<?php

  namespace App\View\Cell;

  use Cake\View\Cell;


  /**
   * Users cell
   */
  class NotificationsCell extends Cell
   {

   protected $_validCellOptions = [];

   /**
    * Default display method.
    *
    * @return void
    */
  public function header_count($id) {
      $this->loadModel('NotificationUsers');
      $this->loadModel('UserNotifications');
      
      $email = $id;
      $this->NotificationUsers->belongsTo('UserNotifications', ['className' => 'UserNotifications', 'foreignKey' => 'notification_id']);
      $for_count = $this->NotificationUsers->find('all')->contain('UserNotifications')->where(['OR'=>['NotificationUsers.email_list'=>'all','NotificationUsers.email_list like' => '%' . $email . '%'],'NotificationUsers.is_read'=>0])->count();
      $this->set(compact('for_count'));
   
  }

  public function sidebar_count($id) {
      $this->loadModel('NotificationUsers');
      $this->loadModel('UserNotifications');
      
      $email = $id;
      $this->NotificationUsers->belongsTo('UserNotifications', ['className' => 'UserNotifications', 'foreignKey' => 'notification_id']);
      $for_count = $this->NotificationUsers->find('all')->contain('UserNotifications')->where(['OR'=>['NotificationUsers.email_list'=>'all','NotificationUsers.email_list like' => '%' . $email . '%'],'NotificationUsers.is_read'=>0])->count();
      $this->set(compact('for_count'));
  }

  }

