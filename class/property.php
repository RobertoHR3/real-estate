<?php
    namespace App;

    class Property {

        //Conection to database
        protected static $db;
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

        //Define the conection to database
        public static function setDB($database) {
            self::$db = $database;
        }

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
            //Sanitizar los datos
            $atributes = $this->sanitizeData();
            //Insert into database #16
            $query = " INSERT INTO properties (title, price, image, description, rooms, wc, parking, startDate, sellers_id ) VALUES ( '$this->title', '$this->price', '$this->image', '$this->description', '$this->rooms', '$this->wc', '$this->parking', '$this->startDate', '$this->sellers_id' ) ";

            
            $result = self::$db->query($query);

        }

        //Identify and join db atributes
        public function atributes() {
            $atributes = [];
            foreach (self::$columnDB as $column) {
                if ($column === 'id') continue; //#17
                $atributes[$column] = $this->$column; 
            }
            return $atributes;
        }
        

        public function sanitizeData() {
            $atributes = $this->atributes();
            $sanitize = [];

            foreach ($atributes as $key => $value) {
                $sanitize[$key] = self::$db->escape_string($value);///18
            }

            return $sanitize;
        }

        
    }    
?>