<?php
    require 'functions.php';
    require 'config/database.php';
    require __DIR__ . '/../vendor/autoload.php';

    //Conection to database
    $db = dbConnection();

    use App\Property;
    Property::setDB($db);
?>