<?php
    
    require 'app.php';

    function includeTemplate(string $name, bool $first = false) {
        include TEMPLATES_URL . "/$name.php";
    }