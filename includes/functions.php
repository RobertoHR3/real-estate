<?php
    define('TEMPLATES_URL', __DIR__ . '/template');
    define('FUNCTIONS_URL', __DIR__ . 'functions.php');
    define('FILES_IMAGES', __DIR__ . '/../images/');

    function includeTemplate(string $name, bool $first = false) {
        include TEMPLATES_URL . "/$name.php";
    }

    function isAuthenticate() {
        session_start();
        
        if (!$_SESSION['login']) {
            header('Location: /Project_RealEstates/index.php');
        }
        
    }

    function debuguear($variable) {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;
    }

    //Escape / Sanitize HTML #24
    function sanitize($html) {
        $sanitize = htmlspecialchars($html);
        return $sanitize;
    }

    //Validate Content type
    function validateTypeContent($type) {
        $types = ['property', 'seller'];
        return in_array($type, $types);
    }

    //Show the message alerts
    function showNotification($code) {
        $message = '';
        switch ($code) {
            case 1:
                $message = 'successfully created';
                break;
            case 2:
                $message = 'successfully updated';
                break;
            case 3:
                $message = 'successfully deleted';
                break;
            default:
                $message = false;
            
            
        }
        return $message;
    }
