<?php
    namespace App;

    class Property {

        //Conection to database
        protected static $db;


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

            $this->id = $args['id'] ?? '';
            $this->title = $args['title'] ?? '';
            $this->price = $args['price'] ?? '';
            $this->image = $args['image'] ?? 'image.jpg';
            $this->description = $args['description'] ?? '';
            $this->rooms = $args['rooms'] ?? '';
            $this->wc = $args['wc'] ?? '';
            $this->parking = $args['parking'] ?? '';
            $this->startDate = date('Ymd');
            $this->sellers_id = $args['sellers_id'] ?? '';
        }

        public function save() {
            //Insert into database #16
            $query = " INSERT INTO properties (title, price, image, description, rooms, wc, parking, startDate, sellers_id ) VALUES ( '$this->title', '$this->price', '$this->image', '$this->description', '$this->rooms', '$this->wc', '$this->parking', '$this->startDate', '$this->sellers_id' ) ";

            
            $result = self::$db->query($query);
            debuguear($result);

        }    

        //Define the conection to database
        public static function setDB($database) {
            self::$db = $database;
        }
    }    
?>