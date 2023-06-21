<?php
    
    function dbConnection() : mysqli {
        $db = new mysqli('localhost', 'root', 'root', 'realestates_crud');

        if (!$db) {
            echo "Failed connection";
            exit;
        }
        
        return $db;
    }