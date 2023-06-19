<?php
    define('TEMPLATES_URL', __DIR__ . '/template');
    define('FUNCTIONS_URL', __DIR__ . 'functions.php');

    function includeTemplate(string $name, bool $first = false) {
        include TEMPLATES_URL . "/$name.php";
    }

    function isAuthenticate() {
        session_start();
        $auth = $_SESSION['login'];
        if ($auth) {
            return true;
        }

        return false;
        
    }