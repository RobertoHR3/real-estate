<?php
    define('TEMPLATES_URL', __DIR__ . '/template');
    define('FUNCTIONS_URL', __DIR__ . 'functions.php');
    define('FILES_IMAGES', __DIR__ . '/../images/');

    function includeTemplate(string $name, bool $first = false) {
        include TEMPLATES_URL . "/$name.php";
    }

    function isAuthenticate() : bool {
        session_start();
        
        $auth = $_SESSION['login'];
        if ($auth) {
            return true;
        }

        return false;
        
    }

    function debuguear($variable) {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;
    }