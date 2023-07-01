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
    
    public function validate() {
        if (!$this->title) {
            self::$errors[] = 'Add a title';
        }

        if (!$this->price) {
            self::$errors[] = 'Add a price';
        }

        if (!$this->description) {
            self::$errors[] = 'Add a description, 50 characters minimum';
        }

        if (!$this->rooms) {
            self::$errors[] = 'Add a number of rooms';
        }

        if (!$this->wc) {
            self::$errors[] = 'Add a number of wc';
        }

        if (!$this->parking) {
            self::$errors[] = 'Add a number of parking spaces';
        }

        if (!$this->sellers_id) {
            self::$errors[] = 'Choose a seller';
        }

        if (!$this->image) {
            self::$errors[] = 'Add a image';
        }

            

        return self::$errors;
    }
?>