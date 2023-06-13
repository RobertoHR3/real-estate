<?php
    
    require 'app.php';

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