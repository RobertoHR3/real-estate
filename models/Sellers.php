<?php
    namespace Model;

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

        public function validate() {
            if (!$this->name) {
                self::$errors[] = 'Add a name';
            }

            if (!$this->lastName) {
                self::$errors[] = 'Add a last name';
            }

            if (!$this->phone) {
                self::$errors[] = 'Add a phone';
            }
            #28
            if (!preg_match('/[0-9]{10}/', $this->phone)) {
                self::$errors[] = 'Invalid format';
            }

            return self::$errors;
        }
    }
    
?>