<?php
    namespace App;

    class Property extends ActiveRecord{
        protected static $table = 'properties';
        protected static $columnDB = ['id', 'title', 'price', 'image', 'description', 'rooms', 'wc', 'parking', 'startDate', 'sellers_id'];

        public $id;
        public $title;
        public $price;
        public $image;
        public $description;
        public $rooms;
        public $wc;
        public $parking;
        public $startDate;
        public $sellers_id;

        public function __construct($args = []) {

            $this->id = $args['id'] ?? null;
            $this->title = $args['title'] ?? '';
            $this->price = $args['price'] ?? '';
            $this->image = $args['image'] ?? '';
            $this->description = $args['description'] ?? '';
            $this->rooms = $args['rooms'] ?? '';
            $this->wc = $args['wc'] ?? '';
            $this->parking = $args['parking'] ?? '';
            $this->startDate = date('Ymd');
            $this->sellers_id = $args['sellers_id'] ?? '';
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
    }    
?>