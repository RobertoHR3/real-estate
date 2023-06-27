<?php
    namespace App;

    class Property {

        //Conection to database
        protected static $db;
        protected static $columnDB = ['id', 'title', 'price', 'image', 'description', 'rooms', 'wc', 'parking', 'startDate', 'sellers_id'];

        //Errors
        protected static $errors = [];

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
            $this->image = $args['image'] ?? '';
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

            //#20
            $string_keys = join(', ', array_keys($atributes));
            $string_values = join("', '", array_values($atributes));
            //Insert into database #16
            $query = " INSERT INTO properties ( ";
            $query .= $string_keys;
            $query .= " ) VALUES (' "; 
            $query .= $string_values;
            $query .= " ') ";

            $result = self::$db->query($query);
            return $result;

        }

        //Identify and join db atributes
        public function atributes() {//#19
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
                $sanitize[$key] = self::$db->escape_string($value);//#18
            }

            return $sanitize;
        }

        //Upload to files #22
        public function setImage($image) {
            //Assign the image attribute, the name of the image
            if ($image) {
                $this->image = $image;
            }
        }

        //Validation #21
        public static function getErrors() {
            return self::$errors;
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

        //List all properties
        public static function all() {
            $query = "SELECT * FROM properties";
            $result = self::checkSQL($query);
            return $result;
        }

        public static function checkSQL($query) {
            //Check database
            $result = self::$db->query($query);
            //Iterate results
            $array = [];
            while($row = $result->fetch_assoc()) {
                $array[] = self::createObject($row);
            }
            //Free up memory #24
            $result->free();
            //Return results
            return $array;

        }

        protected static function createObject($register) {
            //#23
            $object = new self;
            foreach($register as $key => $value) {
                if (property_exists($object, $key)) {
                    $object->$key = $value;
                }
            }

            return $object;
        }
    }    
?>