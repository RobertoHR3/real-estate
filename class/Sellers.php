<?php
    namespace App;

    class Sellers extends ActiveRecord{
        protected static $table = 'sellers';
        protected static $columnDB = ['id', 'name', 'lastName', 'phone'];

        public $id;
        public $name;
        public $lastName;
        public $phone;


        public function __construct($args = []) {

            $this->id = $args['id'] ?? null;
            $this->name = $args['name'] ?? '';
            $this->lastName = $args['lastName'] ?? '';
            $this->phone = $args['phone'] ?? '';
        }
    }
    
?>