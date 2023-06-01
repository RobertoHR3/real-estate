<?php
    
    function dbConnection() : mysqli {
        $db = mysqli_connect('localhost', 'root', 'root', 'realestates_crud');

        if (!$db) {
            echo "Failed connection";
            exit;
        }
        
        return $db;
    }