<?php

  namespace App\Model\Table;

  use App\Model\Entity\User;
  use Cake\ORM\Query;
  use Cake\ORM\RulesChecker;
  use Cake\ORM\Table;
  use Cake\Validation\Validator;
  use Cake\ORM\TableRegistry;

  /**
   * Users Model
   *
   */
  class EventsTable extends Table
   {

   /**
    * Initialize method
    *
    * @param array $config The configuration for the Table.
    * @return void
    */
   public function initialize(array $config) {
    parent::initialize($config);
    $this->hasMany('Photos', [
       'className' => 'Photos',
       'foreignKey' => 'event_id',
       'joinType' => 'LEFT'
    ]);
    $this->hasMany('Videos', [
       'className' => 'Videos',
       'foreignKey' => 'event_id',
       'joinType' => 'LEFT'
    ]);
    $this->hasMany('EventTickets', [
       'className' => 'EventTickets',
       'foreignKey' => 'event_id',
       'joinType' => 'LEFT'
    ]);

   }

   }
