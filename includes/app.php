<?php
    require 'functions.php';
    require 'config/database.php';
    require __DIR__ . '/../vendor/autoload.php';

    //Conection to database
    $db = dbConnection();

    use Model\ActiveRecord;
    ActiveRecord::setDB($db);
?>