<?php

  namespace App\Model\Table;

  use App\Model\Entity\User;
  use Cake\ORM\Query;
  use Cake\ORM\Table;
  use Cake\ORM\TableRegistry;

  /**
   * Users Model
   *
   */
  class EventBookingTicketsTable extends Table
   {

   /**
    * Initialize method
    *
    * @param array $config The configuration for the Table.
    * @return void
    */
   public function initialize(array $config) {
    parent::initialize($config);
    $this->belongsTo('EventTickets', [
       'className' => 'EventTickets',
       'foreignKey' => 'event_ticket_id',
       'bindingKey' => 'id'
         //'joinType' => 'LEFT',
    ]);

    //$this->hasOne('EventSchedules', ['className' => 'EventSchedules', 'foreignKey' => 'event_id']);

   }

   }
