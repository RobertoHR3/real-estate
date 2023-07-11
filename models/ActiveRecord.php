<?php	
    namespace Model;
    class ActiveRecord {
         //Conection to database
        protected static $db;
        protected static $columnDB = [];
        protected static $table = '';

        //Errors
        protected static $errors = [];

        //Define the conection to database
        public static function setDB($database) {
            self::$db = $database;
        }


        public function save() {
            if (!is_null($this->id)) {
                //Update
                $this->upadte();
            } else {
                //Create a register
                $this->create();
            }
        }

        public function create() {
            //Sanitizar los datos
            $atributes = $this->sanitizeData();

            //#20
            $string_keys = join(', ', array_keys($atributes));
            $string_values = join("', '", array_values($atributes));
            //Insert into database #16
            $query = " INSERT INTO " . static::$table . " ( ";
            $query .= $string_keys;
            $query .= " ) VALUES (' "; 
            $query .= $string_values;
            $query .= " ') ";

            $result = self::$db->query($query);
            //Message success or error
            if ($result) {
                //query_string to generate a alert
                header('Location: /Project_RealEstates/admin/index.php?result=1');
            } else {
                echo "Failed Insert";
            }
        }

        public function upadte() {
            //Sanitizar los datos
            $atributes = $this->sanitizeData();

            $values = [];
            foreach($atributes as $key => $value) {
                $values[] = "{$key}='{$value}'";
            }

            $query = "UPDATE " . static::$table . " SET ";
            $query .= join(', ', $values );
            $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
            $query .= " LIMIT 1 ";

            $result = self::$db->query($query);
            if ($result) {
                //query_string to generate a alert
                header('Location: /Project_RealEstates/admin/index.php?result=2');
            } else {
                echo "Failed Insert";
            }
        }

        //Delete a register
        public function delete() {
            $query = "DELETE FROM " . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
            $result = self::$db->query($query);
            if ($result) {
                $this->deleteImage();
                header('Location: /Project_RealEstates/admin/index.php?result=3');
            }
        }

        //Identify and join db atributes
        public function atributes() {//#19
            $atributes = [];
            foreach (static::$columnDB as $column) {
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
            //Delete the previous image
            if (!is_null($this->id)) {
                $this->deleteImage();
            }
            //Assign the image attribute, the name of the image
            if ($image) {
                $this->image = $image;
            }
        }

        //Delete file
        public function deleteImage() {
            //Check if the file exists
            $fileExists = file_exists(FILES_IMAGES . $this->image);
            if ($fileExists) {
                unlink(FILES_IMAGES . $this->image);
            }
        }

        //Validation #21
        public static function getErrors() {
            return static::$errors;
        }

        public function validate() {
            static::$errors = [];
            return static::$errors;
        }

        //List all registers
        public static function all() {
            $query = "SELECT * FROM " . static::$table;//#27
            $result = self::checkSQL($query);
            return $result;
        }

        //Get a certain number of records
        public static function get($count) {
            $query = "SELECT * FROM " . static::$table . " LIMIT " . $count;
            $result = self::checkSQL($query);
            return $result;
        }

        //Serch for a record by id #25
        public static function find($id) {
            $query = "SELECT * FROM " . static::$table . " WHERE id = $id";
            $result = self::checkSQL($query);
            return array_shift($result);
        }

        public static function checkSQL($query) {
            //Check database
            $result = self::$db->query($query);
            //Iterate results
            $array = [];
            while($row = $result->fetch_assoc()) {
                $array[] = static::createObject($row);
            }
            //Free up memory #24
            $result->free();
            //Return results
            return $array;

        }

        protected static function createObject($register) {
            //#23
            $object = new static;
            foreach($register as $key => $value) {
                if (property_exists($object, $key)) {
                    $object->$key = $value;
                }
            }

            return $object;
        }

        //Synchronizes the object in memory with the changes made by the user #
        public function sincronize($args = []) {
            foreach($args as $key => $value) {
                if (property_exists($this, $key) && !is_null($value)) {
                    $this->$key = $value;
                }
            }
        }
    }
?>