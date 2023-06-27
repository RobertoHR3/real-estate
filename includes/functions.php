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